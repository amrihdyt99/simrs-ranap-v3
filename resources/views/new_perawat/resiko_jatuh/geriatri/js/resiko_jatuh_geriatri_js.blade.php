<script>
    function modal_resiko_jatuh_geriatri() {
        $('#resikoJatuhModalGeriatri').on('show.bs.modal', function() {
            initializeDataTable('#resiko_jatuh_table_geriatri', {
                ajax: {
                    url: "{{ route('get.resiko.jatuh.geriatri') }}",
                    type: 'POST',
                    data: function(d) {
                        d.reg_no = regno;
                        d.med_rec = medrec;
                        d.user_id = $user_;
                        d._token = $('meta[name="csrf-token"]').attr('content');
                    },
                    dataSrc: 'data'
                },
                columns: [{
                        data: 'created_at',
                        render: function(data) {
                            return formatDateTime(data) || 'N/A';
                        }
                    },
                    {
                        data: 'resiko_jatuh_geriatri_id',
                        render: function(data) {
                            return `<button class="btn btn-primary lihat-btn-geriatri" data-id="${data}">Lihat</button>
                            <button class="btn btn-danger hapus-btn-geriatri" data-id="${data}">Hapus</button>`;
                        }
                    }
                ],
                columnDefs: [{
                    targets: 1,
                    orderable: false,
                    searchable: false
                }],
                searching: true,
                paging: true,
                info: true,
                deferRender: true // For performance optimization
            });

            handleLihatButtonClick();
            handleHapusButtonClickGeriatri();
        });
    }

    function initializeDataTable(selector, options) {
        if ($.fn.DataTable.isDataTable(selector)) {
            $(selector).DataTable().clear().destroy();
        }
        $(selector).DataTable(options);
    }

    function fetchResikoJatuhDetail(id) {
        $.ajax({
            url: "{{ route('get.detail.resiko.jatuh.geriatri') }}",
            method: 'POST',
            data: {
                regno: regno,
                medrec: medrec,
                user_id: "{{ auth()->user()->id }}",
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#resikoJatuhDetailModalLabel').text('Detail Risiko Jatuh ' + 'Pada ' + formatDateTime(
                    response.data.created_at));

                let detailTable = $('#detail_resiko_jatuh_geriatri');

                detailTable.find('input[name="resiko_jatuh_geriatri_gangguan_gaya_berjalan"][value="' +
                    response.data.resiko_jatuh_geriatri_gangguan_gaya_berjalan + '"]').prop('checked',
                    true);
                detailTable.find('input[name="resiko_jatuh_geriatri_pusing"][value="' + response.data
                    .resiko_jatuh_geriatri_pusing + '"]').prop('checked', true);
                detailTable.find('input[name="resiko_jatuh_geriatri_kebingungan"][value="' + response.data
                    .resiko_jatuh_geriatri_kebingungan + '"]').prop('checked', true);
                detailTable.find('input[name="resiko_jatuh_geriatri_nokturia"][value="' + response.data
                    .resiko_jatuh_geriatri_nokturia + '"]').prop('checked', true);
                detailTable.find('input[name="resiko_jatuh_geriatri_kebingungan_intermiten"][value="' +
                    response.data.resiko_jatuh_geriatri_kebingungan_intermiten + '"]').prop('checked',
                    true);
                detailTable.find('input[name="resiko_jatuh_geriatri_kelemahan_umum"][value="' + response
                    .data.resiko_jatuh_geriatri_kelemahan_umum + '"]').prop('checked', true);
                detailTable.find('input[name="resiko_jatuh_geriatri_obat_beresiko_tinggi"][value="' +
                    response.data.resiko_jatuh_geriatri_obat_beresiko_tinggi + '"]').prop('checked',
                    true);
                detailTable.find('input[name="resiko_jatuh_geriatri_riwayat_jatuh_12_bulan"][value="' +
                    response.data.resiko_jatuh_geriatri_riwayat_jatuh_12_bulan + '"]').prop('checked',
                    true);
                detailTable.find('input[name="resiko_jatuh_geriatri_osteoporosis"][value="' + response.data
                    .resiko_jatuh_geriatri_osteoporosis + '"]').prop('checked', true);
                detailTable.find('input[name="resiko_jatuh_geriatri_pendengaran_dan_pengeliatan"][value="' +
                    response.data.resiko_jatuh_geriatri_pendengaran_dan_pengeliatan + '"]').prop(
                    'checked', true);
                detailTable.find('input[name="resiko_jatuh_geriatri_70_tahun_keatas"][value="' + response
                    .data.resiko_jatuh_geriatri_70_tahun_keatas + '"]').prop('checked', true);

                $('#total_skor_geriatri_detail').text(response.data.skor_total_geriatri);

                detailTable.find('input[name="kategori_geriatri"][value="' + response.data
                    .kategori_geriatri + '"]').prop('checked', true);

                let detailTable2 = $('#detail_resiko_jatuh_geriatri2');

                let rendahArray = JSON.parse(response.data.intervensi_resiko_jatuh_rendah);
                rendahArray.forEach(function(item) {
                    detailTable2.find('input[name="intervensi_resiko_jatuh_rendah[]"][value="' +
                        item + '"]').prop('checked', true);
                });

                let sedangArray = JSON.parse(response.data.intervensi_resiko_jatuh_sedang);
                sedangArray.forEach(function(item) {
                    detailTable2.find('input[name="intervensi_resiko_jatuh_sedang[]"][value="' +
                        item + '"]').prop('checked', true);
                });

                let tinggiArray = JSON.parse(response.data.intervensi_resiko_jatuh_tinggi);
                tinggiArray.forEach(function(item) {
                    detailTable2.find('input[name="intervensi_resiko_jatuh_tinggi[]"][value="' +
                        item + '"]').prop('checked', true);
                });

                $('#resikoJatuhDetailModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
                alert('Failed to fetch data for the selected item.');
            }
        });
    }

    function handleLihatButtonClick() {
        $(document).off('click', '.lihat-btn-geriatri').on('click', '.lihat-btn-geriatri', function() {
            var id = $(this).data('id');
            fetchResikoJatuhDetail(id);
        });
    }

    function handleHapusButtonClickGeriatri() {
        $(document).off('click', '.hapus-btn-geriatri').on('click', '.hapus-btn-geriatri', function() {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Apa anda yakin?',
                text: 'Tindakan ini tidak dapat dibatalkan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('delete.resiko.jatuh.geriatri') }}",
                        method: 'POST',
                        data: {
                            reg_no: regno,
                            med_rec: medrec,
                            user_id: "{{ auth()->user()->id }}",
                            id: id,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            neko_notify('success', 'Berhasil dihapus')
                            $('#resiko_jatuh_table_geriatri').DataTable().ajax
                        .reload();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', status, error);
                            Swal.fire(
                                'Error!',
                                'Failed to delete the item.',
                                'error'
                            );
                        }
                    });
                }
            });
        });
    }
</script>
