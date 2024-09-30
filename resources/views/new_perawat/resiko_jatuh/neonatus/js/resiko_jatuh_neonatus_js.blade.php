<script>
    function ttd_resiko_jatuh_neonatus() {
        // Keluarga
        let $wrapperKeluargaNeonatus = $("#resiko_jatuh_neonatus_ttd_signature_pad_keluarga");
        let $clearButtonKeluargaNeonatus = $wrapperKeluargaNeonatus.find("#resiko_jatuh_neonatus_ttd_clear_btn_keluarga");
        let $canvasKeluargaNeonatus = $wrapperKeluargaNeonatus.find("canvas")[0];

        signaturePadKeluargaNeonatus = new SignaturePad($canvasKeluargaNeonatus);

        // Load signature if available
        let signatureKeluargaDataURLNeonatus = $("#resiko_jatuh_neonatus_ttd_signature_keluarga").val();
        if (signatureKeluargaDataURLNeonatus) {
            signaturePadKeluargaNeonatus.fromDataURL(signatureKeluargaDataURLNeonatus);
        }

        $clearButtonKeluargaNeonatus.on("click", function(event) {
            signaturePadKeluargaNeonatus.clear();
        });

        // Petugas
        let $wrapperPetugasNeonatus = $("#resiko_jatuh_neonatus_ttd_signature_pad_petugas");
        let $clearButtonPetugasNeonatus = $wrapperPetugasNeonatus.find("#resiko_jatuh_neonatus_ttd_clear_btn_petugas");
        let $canvasPetugasNeonatus = $wrapperPetugasNeonatus.find("canvas")[0];

        signaturePadPetugasNeonatus = new SignaturePad($canvasPetugasNeonatus);

        // Load signature if available
        let signaturePetugasDataURLNeonatus = $("#resiko_jatuh_neonatus_ttd_signature_petugas").val();
        if (signaturePetugasDataURLNeonatus) {
            signaturePadPetugasNeonatus.fromDataURL(signaturePetugasDataURLNeonatus);
        }

        $clearButtonPetugasNeonatus.on("click", function(event) {
            signaturePadPetugasNeonatus.clear();
            var userSignatureNeonatus = "{{ auth()->user()->signature }}";
            signaturePadPetugasNeonatus.fromDataURL(userSignatureNeonatus);
        });

        $('#save-resiko-jatuh-neonatus').click(function() {
            addresikojatuhNeonatus();
        });
    }

    function modal_resiko_jatuh_neonatus() {
        $('#resikoJatuhModalNeonatus').on('show.bs.modal', function() {
            initializeDataTableNeonatus('#resiko_jatuh_table_neonatus');
        });
    }

    function initializeDataTableNeonatus(selector) {
        if ($.fn.DataTable.isDataTable(selector)) {
            $(selector).DataTable().clear().destroy();
        }

        $(selector).DataTable({
            ajax: {
                url: "{{ route('get.resiko.jatuh.neonatus') }}",
                type: 'POST',
                data: function(d) {
                    d.reg_no = regno;
                    d.med_rec = medrec;
                    d.user_id = $user_;
                    d._token = $('meta[name="csrf-token"]').attr('content');
                },
                dataSrc: 'data'
            },
            columns: [
                {
                    data: 'created_at',
                    render: function(data) {
                        return formatDateTime(data) || 'N/A';
                    }
                },
                {
                    data: 'id',
                    render: function(data) {
                        return `<button class="btn btn-primary lihat-btn-neonatus" data-id="${data}">Lihat</button>
                        <button class="btn btn-danger hapus-btn-neonatus" data-id="${data}">Hapus</button>`;

                    }
                }
            ],
            columnDefs: [
                {
                    targets: 1,
                    orderable: false,
                    searchable: false
                }
            ],
            searching: true,
            paging: true,
            info: true,
            deferRender: true // Optional: Improve performance for large datasets
        });

        handleLihatButtonClickNeonatus();
        handleHapusButtonClickNeonatus();
    }

    function fetchResikoJatuhDetailNeonatus(id) {
        $.ajax({
            url: "{{ route('get.detail.resiko.jatuh.neonatus') }}",
            method: 'POST',
            data: {
                reg_no: regno, // Replace with your variable or value
                med_rec: medrec, // Replace with your variable or value
                user_id: "{{ auth()->user()->id }}",
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#resikoJatuhDetailModalLabelNeonatus').text('Detail Risiko Jatuh pada ' + formatDateTime(response.data.created_at));

                let detailTable1 = $('#resiko_jatuh_neonatus_table1');

                let intervensiTidakBeresiko = JSON.parse(response.data.internvensi_tidak_beresiko_neonatus || "[]");
                let edukasi = JSON.parse(response.data.edukasi || "[]");
                let evaluasi = JSON.parse(response.data.evaluasi || "[]");

                intervensiTidakBeresiko.forEach(function(item) {
                    detailTable1.find(
                        `input[name="internvensi_tidak_beresiko_neonatus[]"][value="${item}"]`
                    ).prop('checked', true);
                });

                edukasi.forEach(function(item) {
                    detailTable1.find(`input[name="edukasi[]"][value="${item}"]`).prop('checked', true);
                });

                evaluasi.forEach(function(item) {
                    detailTable1.find(`input[name="evaluasi[]"][value="${item}"]`).prop('checked', true);
                });

                $('#tgl_ttd_keluarga_neonatus_detail').val(response.data.tgl_ttd_keluarga);
                $('#nama_keluarga_detail').val(response.data.nama_keluarga);
                $('#nama_petugas_detail').val(response.data.nama_petugas);
                let signaturePadKeluargaDetail = new SignaturePad(document.getElementById(
                    'resiko_jatuh_neonatus_ttd_canvas_keluarga_detail'));
                signaturePadKeluargaDetail.fromDataURL(response.data.ttd_keluarga);
                signaturePadKeluargaDetail.off();
                $('#tgl_ttd_petugas_neonatus_detail').val(response.data.tgl_ttd_petugas);
                let signaturePadPetugasDetail = new SignaturePad(document.getElementById(
                    'resiko_jatuh_neonatus_ttd_canvas_petugas_detail'));
                signaturePadPetugasDetail.fromDataURL(response.data.ttd_petugas);
                signaturePadPetugasDetail.off();

                $('#resikoJatuhDetailNeonatus').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
                alert('Failed to fetch data for the selected item.');
            }
        });
    }

    function handleLihatButtonClickNeonatus() {
        $(document).off('click', '.lihat-btn-neonatus').on('click', '.lihat-btn-neonatus', function() {
            var id = $(this).data('id');
            fetchResikoJatuhDetailNeonatus(id);
        });
    }

    function handleHapusButtonClickNeonatus() {
        $(document).off('click', '.hapus-btn-neonatus').on('click', '.hapus-btn-neonatus', function() {
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
                        url: "{{ route('delete.resiko.jatuh.neonatus') }}",
                        method: 'POST',
                        data: {
                            reg_no: regno,
                            med_rec: medrec,
                            user_id: "{{ auth()->user()->id }}",
                            id: id,
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            neko_notify('success','Berhasil dihapus')
                            $('#resiko_jatuh_table_neonatus').DataTable().ajax.reload();
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
