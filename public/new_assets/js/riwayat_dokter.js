$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    function initTablePenunjang() {
        return $('#table-riwayat-penunjang').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: $dom + '/api/getRiwayatPenunjang',
                type: 'GET',
                data: function(d) {
                    d.regno = regno;
                },
                cache: true,
                error: function (xhr, error, thrown) {
                    console.log('Ajax error:', error);
                    console.log('XHR:', xhr);
                    console.log('Thrown:', thrown);
                    alert('Terjadi kesalahan saat memuat data. Silakan cek konsol browser untuk detail.');
                },
                dataSrc: function(json) {
                    return json.data.filter(function(item) {
                        return item.jenis_order.toLowerCase() === 'lab' || item.jenis_order.toLowerCase() === 'radiologi';
                    });
                }
            },
            columns: [
                {
                    data: null,
                    render: function(data, type, row) {
                        if (row.jenis_order.toLowerCase() === 'lab' || row.jenis_order.toLowerCase() === 'radiologi') {
                            var url = row.jenis_order.toLowerCase() === 'lab' 
                                ? $dom + "/dokter/getHasillab?orderNo=" + row.order_no 
                                : $dom + "/dokter/getHasilRad?orderNo=" + row.order_no;
                            return '<button class="btn btn-sm btn-info view-detail" data-url="' + url + '">Detail</button>';
                        } else {
                            return '<button class="btn btn-sm btn-info view-detail" disabled>Detail</button>';
                        }
                    }
                },
                { data: 'order_no' },
                { data: 'waktu_order' },
                { data: 'jenis_order' },
                { data: 'nama_dokter' }
            ]
        });
    }

    function initTableRiwayatSoap() {
        return $('#table-riwayat-soaper').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: $dom + '/api/getRiwayatSoap',
                type: 'GET',
                data: function(d) {
                    d.regno = regno;
                },
                cache: true,
                error: function (xhr, error, thrown) {
                    console.log('Ajax error:', error);
                    console.log('XHR:', xhr);
                    console.log('Thrown:', thrown);
                    alert('Terjadi kesalahan saat memuat data. Silakan cek konsol browser untuk detail.');
                }
            },
            columns: [
                { data: 'tanggal_kunjungan' },
                { 
                    data: 'ppa',
                    render: function(data, type, row) {
                        let contentRoleSoap = '';
                        if (row.bertindak_sebagai) {
                            let roleSoap = JSON.parse(row.bertindak_sebagai);
                            if (roleSoap) {
                                contentRoleSoap = roleSoap.join(', ');
                            }
                        }
                        return data + (contentRoleSoap ? '<br><br>(' + contentRoleSoap + ')' : 
                               (row.is_dokter ? '<br><br><b>( Dokter )</b>' : '<br><br><b>( Perawat )</b>'));
                    }
                },
                { 
                    data: 'pemeriksaan',
                    render: function(data, type, row) {
                        let html = '<b>(S)</b> ' + (data.S || '') + '<br><br>' +
                                   '<b>(O)</b> ' + (data.O || '') + '<br><br>' +
                                   '<b>(A)</b> ' + (data.A || '') + '<br><br>' +
                                   '<b>(P)</b> ' + (data.P || '') + '<br><br>';

                        html += '<b>Tindakan Penunjang & Obat :</b><br>';
                        ['lab', 'radiologi', 'obat', 'lainnya'].forEach(function(jenis) {
                            if (row.tindakan_penunjang[jenis] && row.tindakan_penunjang[jenis].length > 0) {
                                html += '<br><b>' + jenis.charAt(0).toUpperCase() + jenis.slice(1) + '</b><br>';
                                row.tindakan_penunjang[jenis].forEach(function(item) {
                                    html += '- ' + item.item_name + '<br>';
                                });
                            }
                        });

                        return html;
                    }
                },
                { data: 'instruksi_ppa' }
            ]
        });
    }

    function initTableRiwayatObat() {
        return $('#table-riwayat-obat').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: $dom + '/api/getRiwayatObat',
                type: 'GET',
                data: function(d) {
                    d.regno = regno;
                },
                cache: true,
                error: function (xhr, error, thrown) {
                    console.log('Ajax error:', error);
                    console.log('XHR:', xhr);
                    console.log('Thrown:', thrown);
                    alert('Terjadi kesalahan saat memuat data. Silakan cek konsol browser untuk detail.');
                }
            },
            columns: [
                { data: 'waktu_order' },
                { data: 'item_name' },
                { data: 'qty' },
                { data: 'aturan_pakai' },
                { data: 'keterangan' },
                { data: 'dpjp' }
            ]
        });
    }

    function triggerRiwayatDokter() {
        $("#tab-riwayat").off('click').on("click", function () {
            if (!tablesInitialized) {
                initAllTables();
                tablesInitialized = true;
            }
        });
    }

    let tablesInitialized = false;

    function initAllTables() {
        tablePenunjang = initTablePenunjang();
        tableRiwayatSoap = initTableRiwayatSoap();
        tableRiwayatObat = initTableRiwayatObat();
    }

    $('.reload-penunjang').on('click', function() {
        tablePenunjang.ajax.reload();
    });

    $('#table-riwayat-penunjang').on('click', '.view-detail', function() {
        var data = tablePenunjang.row($(this).parents('tr')).data();
        var url = $(this).data('url');
        
        if (url) {
            $('#resultModal iframe').attr('src', url);
            $('#resultModal').modal('show');
        } else {
            console.log('Detail for order:', data.order_no);
        }
    });

    $('.reload-soap').on('click', function() {
        tableRiwayatSoap.ajax.reload();
    });

    $('.reload-obat').on('click', function() {
        tableRiwayatObat.ajax.reload();
    });

    triggerRiwayatDokter();
});
