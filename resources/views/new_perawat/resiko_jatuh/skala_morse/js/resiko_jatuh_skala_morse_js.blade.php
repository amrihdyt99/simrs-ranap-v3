<script>
    function modal_resiko_jatuh_skala_morse() {
        $('#resikoJatuhModalSkalaMorse').on('show.bs.modal', function() {
            initializeDataTableMorse('#resiko_jatuh_table_skala_morse');
        });
    }

    function initializeDataTableMorse(selector) {
        if ($.fn.DataTable.isDataTable(selector)) {
            $(selector).DataTable().clear().destroy();
        }

        $(selector).DataTable({
            ajax: {
                url: "{{ route('get.resiko.jatuh.skalamorse') }}",
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
                        return `
                            <button class="btn btn-primary lihat-btn-morse" data-id="${data}">Lihat</button>
                            <button class="btn btn-danger hapus-btn-morse" data-id="${data}">Hapus</button>
                        `;
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
            deferRender: true
        });

        handleLihatButtonClickSkalaMorse();
        handleHapusButtonClickSkalaMorse();
    }

    function fetchResikoJatuhDetailMorse(id) {
        $.ajax({
            url: "{{ route('get.detail.resiko.jatuh.skalamorse') }}",
            method: 'POST',
            data: {
                reg_no: regno,
                med_rec: medrec,
                user_id: "{{ auth()->user()->id }}",
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#resikoJatuhDetailModalLabelMorse').text('Detail Risiko Jatuh pada ' + formatDateTime(response.data.created_at));

                let detailTable = $('#skala_morse1');
                detailTable.find('input[name="resiko_jatuh_morse_bulan_terakhir"][value="' + response.data.resiko_jatuh_morse_bulan_terakhir + '"]').prop('checked', true);
                detailTable.find('input[name="resiko_jatuh_morse_medis_sekunder"][value="' + response.data.resiko_jatuh_morse_medis_sekunder + '"]').prop('checked', true);
                detailTable.find('input[name="resiko_jatuh_morse_alat_bantu_jalan"][value="' + response.data.resiko_jatuh_morse_alat_bantu_jalan + '"]').prop('checked', true);
                detailTable.find('input[name="resiko_jatuh_morse_infus"][value="' + response.data.resiko_jatuh_morse_infus + '"]').prop('checked', true);
                detailTable.find('input[name="resiko_jatuh_morse_berjalan"][value="' + response.data.resiko_jatuh_morse_berjalan + '"]').prop('checked', true);
                detailTable.find('input[name="resiko_jatuh_morse_mental"][value="' + response.data.resiko_jatuh_morse_mental + '"]').prop('checked', true);
                detailTable.find('input[name="resiko_jatuh_morse_ketegori"][value="' + response.data.resiko_jatuh_morse_ketegori + '"]').prop('checked', true);

                $('#resiko_jatuh_morse_total_skor_detail').text(response.data.resiko_jatuh_morse_total_skor);

                let detailTable2 = $('#skala_morse_2');
                let rendahArray = JSON.parse(response.data.intervensi_resiko_jatuh_skala_morse_rendah);
                rendahArray.forEach(function(item) {
                    detailTable2.find('input[name="intervensi_resiko_jatuh_skala_morse_rendah[]"][value="' + item + '"]').prop('checked', true);
                });

                let sedangArray = JSON.parse(response.data.intervensi_resiko_jatuh_skala_morse_sedang);
                sedangArray.forEach(function(item) {
                    detailTable2.find('input[name="intervensi_resiko_jatuh_skala_morse_sedang[]"][value="' + item + '"]').prop('checked', true);
                });

                let tinggiArray = JSON.parse(response.data.intervensi_resiko_jatuh_skala_morse_tinggi);
                tinggiArray.forEach(function(item) {
                    detailTable2.find('input[name="intervensi_resiko_jatuh_skala_morse_tinggi[]"][value="' + item + '"]').prop('checked', true);
                });

                $('#resikoJatuhDetailModalMorse').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
                alert('Failed to fetch data for the selected item.');
            }
        });
    }

    function handleLihatButtonClickSkalaMorse() {
        $(document).off('click', '.lihat-btn-morse').on('click', '.lihat-btn-morse', function() {
            var id = $(this).data('id');
            fetchResikoJatuhDetailMorse(id);
        });
    }

    function handleHapusButtonClickSkalaMorse() {
        $(document).off('click', '.hapus-btn-morse').on('click', '.hapus-btn-morse', function() {
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
                        url: "{{ route('delete.resiko.jatuh.skalamorse') }}",
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
                            $('#resiko_jatuh_table_skala_morse').DataTable().ajax.reload();
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
