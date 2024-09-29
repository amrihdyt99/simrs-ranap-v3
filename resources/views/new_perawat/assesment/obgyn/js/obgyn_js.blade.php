<script>
    function loadAllFunction() {
        drawImageLuka();
        loadDatatableRiwayatKehamilan();

        const nyeriSkala = document.getElementById('nyeri_skala');
        setSkala(nyeriSkala);
    }

    function setSkala(element) {
        const value = element.value;
        const skalaText = document.getElementById('skala');
        const imgSkala = document.querySelectorAll('.img_skala');

        imgSkala.forEach(img => {
            if (img.getAttribute('data-value') == value) {
                img.style.display = 'block'; 
            } else {
                img.style.display = 'none'; 
            }
        });

        let skalaDescription = '';
        if (value == 0) {
            skalaDescription = value + ' TIDAK NYERI';
        } else if (value >= 1 && value <= 3) {
            skalaDescription = value + ' NYERI RINGAN';
        } else if (value >= 4 && value <= 5) {
            skalaDescription = value + ' NYERI YANG MENGGANGGU';
        } else if (value == 6) {
            skalaDescription = value + ' NYERI YANG MENYUSAHKAN';
        } else if (value >= 7 && value <= 9) {
            skalaDescription = value + ' NYERI HEBAT';
        } else if (value == 10) {
            skalaDescription = value + ' NYERI SANGAT HEBAT';
        }

        skalaText.innerText = skalaDescription;
    }



    // Fungsi untuk serialize form menjadi object
    function objectifyForm(formArray) {
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++) {
            returnArray[formArray[i]['name']] = formArray[i]['value'];
        }
        return returnArray;
    }

    // Fungsi untuk memuat DataTable
    function loadDatatableRiwayatKehamilan() {
        let data_riwayat_kehamilan = JSON.parse($('#riwayat_kehamilan_data').val());
        $('#riwayat-kehamilan-table').DataTable({
            ordering: false,
            info: false,
            paging: false,
            searching: false,
            serverSide: false,
            data: data_riwayat_kehamilan,
            columns: [{
                    data: 'tgl_tahun_partus',
                    render: function(columnData, type, rowData, meta) {
                        return `<input class="form-control" style="width: 150px;" name="table4[` +
                            meta.row +
                            `][tgl_tahun_partus]" value="` + columnData + `" required readonly>`;
                    }
                },
                {
                    data: 'tempat_partus',
                    render: function(columnData, type, rowData, meta) {
                        return `<input class="form-control" style="width: 150px;" name="table4[` +
                            meta.row +
                            `][tempat_partus]" value="` + columnData + `" required readonly>`;
                    }
                },
                {
                    data: 'umur_hamil',
                    render: function(columnData, type, rowData, meta) {
                        return `<input class="form-control" style="width: 150px;" name="table4[` +
                            meta.row +
                            `][umur_hamil]" value="` + columnData + `" required readonly>`;
                    }
                },
                {
                    data: 'jenis_persalinan',
                    render: function(columnData, type, rowData, meta) {
                        return `<input class="form-control" style="width: 150px;" name="table4[` +
                            meta.row +
                            `][jenis_persalinan]" value="` + columnData + `" required readonly>`;
                    }
                },
                {
                    data: 'penolong_persalinan',
                    render: function(columnData, type, rowData, meta) {
                        return `<input class="form-control" style="width: 150px;" name="table4[` +
                            meta.row +
                            `][penolong_persalinan]" value="` + columnData + `" required readonly>`;
                    }
                },
                {
                    data: 'penyulit',
                    render: function(columnData, type, rowData, meta) {
                        return `<input class="form-control" style="width: 200px;" name="table4[` +
                            meta.row +
                            `][penyulit]" value="` + columnData + `" required readonly>`;
                    }
                },
                {
                    data: 'bb_anak',
                    render: function(columnData, type, rowData, meta) {
                        return `<input class="form-control" style="width: 150px;" name="table4[` +
                            meta.row +
                            `][bb_anak]" value="` + columnData + `" required readonly>`;
                    }
                },
                {
                    data: 'keadaan_sekarang',
                    render: function(columnData, type, rowData, meta) {
                        return `<input class="form-control" style="width: 200px;" name="table4[` +
                            meta.row +
                            `][keadaan_sekarang]" value="` + columnData + `" required readonly>`;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        return '<button type="button" class="btn btn-danger btn-sm delete-row" data-row="' +
                            meta.row + '"><i class="fa fa-minus"></i></button>';
                    }
                }
            ],
            rowCallback: function(row, data, index) {
                $(row).find('.delete-row').on('click', function() {
                    let rowIndex = $(this).data('row');
                    data_riwayat_kehamilan.splice(rowIndex, 1);
                    $('#riwayat_kehamilan_data').val(JSON.stringify(data_riwayat_kehamilan));
                    $('#riwayat-kehamilan-table').DataTable().row($(this).parents('tr')).remove()
                        .draw();
                });
            }
        });
    }


    function submitFormRiwayatKehamilan() {
        let data_riwayat_kehamilan = JSON.parse($('#riwayat_kehamilan_data').val() || "[]");

        var newRiwayat = $("#formRiwayatKehamilan").serializeArray();
        data_riwayat_kehamilan.push(objectifyForm(newRiwayat));

        $('#riwayat_kehamilan_data').val(JSON.stringify(data_riwayat_kehamilan));

        $('#riwayat-kehamilan-table').DataTable().clear(); // Hapus data lama
        $('#riwayat-kehamilan-table').DataTable().rows.add(data_riwayat_kehamilan); // Tambah data baru
        $('#riwayat-kehamilan-table').DataTable().draw(); // Gambar ulang DataTable

        $('#formRiwayatKehamilan')[0].reset(); // Reset input modal

        $('#riwayat-kehamilan-modal').modal('hide');
    }

    let signaturePadLuka;

    function drawImageLuka() {
        let $canvasLuka = $('#lokasi_luka')[0];
        $canvasLuka.width = 400;
        $canvasLuka.height = 400;

        signaturePadLuka = new SignaturePad($canvasLuka, {
            backgroundColor: 'rgba(0, 0, 0, 0)',
            penColor: 'black'
        });

        const existingDrawing = $('#lokasi_luka_image').val();
        if (existingDrawing) {
            const img = new Image();
            img.src = existingDrawing;
            img.onload = function() {
                const context = $canvasLuka.getContext('2d');
                context.drawImage(img, 0, 0, $canvasLuka.width, $canvasLuka.height);
            };
        }

        $('#clear_btn_luka').on('click', function() {
            signaturePadLuka.clear();
            $('#lokasi_luka_image').val('');
        });

    }

    function getDrawingData() {
        if (!signaturePadLuka.isEmpty()) {
            $('#lokasi_luka_image').val(signaturePadLuka.toDataURL());
        }
    }

    function storeObgyn() {
        getDrawingData();

        neko_proses();
        Swal.fire({
            title: "Simpan pengkajian awal Obgyn?",
            icon: 'warning',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: "Ya, simpan !",
            cancelButtonText: "Tidak, Batalkan",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "{{ route('perawat.obgyn.store') }}",
                    type: "POST",
                    data: $('#obgyn_form').serialize(),
                    success: function(data) {
                        neko_simpan_success();
                        $('.left-tab.active').click();
                    },
                    error: function(data) {
                        neko_simpan_error_noreq();
                    },
                })
            }
        });
    }
</script>
