<script>
    function modal_resiko_jatuh_humpty_dumpty() {
        $('#resikoJatuhModalHumptyDumpty').on('show.bs.modal', function() {
            initializeDataTable('#resiko_jatuh_table_humpty_dumpty', {
                ajax: {
                    url: "{{ route('get.resiko.jatuh.humptydumpty') }}",
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
                            return `<button class="btn btn-primary lihat-btn-humpty" data-id="${data}">Lihat</button>
                            <button class="btn btn-danger hapus-btn-humpty" data-id="${data}">Hapus</button>`;
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

            handleLihatButtonClickHumptyDumpty();
            handleHapusButtonClickDumpty();
        });
    }

    function initializeDataTable(selector, options) {
        if ($.fn.DataTable.isDataTable(selector)) {
            $(selector).DataTable().clear().destroy();
        }
        $(selector).DataTable(options);
    }

    function fetchResikoJatuhDetailHumptyDumpty(id) {
        $.ajax({
            url: "{{ route('get.detail.resiko.jatuh.humptydumpty') }}",
            method: 'POST',
            data: {
                reg_no: regno,
                med_rec: medrec,
                user_id: "{{ auth()->user()->id }}",
                id: id,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#resikoJatuhDetailModalLabel').text('Detail Risiko Jatuh pada ' + formatDateTime(response.data.created_at));

                let detailTable = $('#detail_resiko_jatuh_humpty_dumpty');

                detailTable.find('input[name="humpty_dumpty_umur"][value="' + response.data.humpty_dumpty_umur + '"]').prop('checked', true);
                detailTable.find('input[name="humpty_dumpty_jenis_kelamin"][value="' + response.data.humpty_dumpty_jenis_kelamin + '"]').prop('checked', true);
                detailTable.find('input[name="humpty_dumpty_diagnosis"][value="' + response.data.humpty_dumpty_diagnosis + '"]').prop('checked', true);
                detailTable.find('input[name="humpty_dumpty_gangguan_kognitif"][value="' + response.data.humpty_dumpty_gangguan_kognitif + '"]').prop('checked', true);
                detailTable.find('input[name="humpty_dumpty_faktor_lingkungan"][value="' + response.data.humpty_dumpty_faktor_lingkungan + '"]').prop('checked', true);
                detailTable.find('input[name="humpty_dumpty_respon_terhadap_anastesi"][value="' + response.data.humpty_dumpty_respon_terhadap_anastesi + '"]').prop('checked', true);
                detailTable.find('input[name="humpty_dumpty_gangguan_obat"][value="' + response.data.humpty_dumpty_gangguan_obat + '"]').prop('checked', true);
                detailTable.find('input[name="kategori_humpty_dumpty"][value="' + response.data.kategori_humpty_dumpty + '"]').prop('checked', true);

                $('#total_skor_humpty_dumpty_detail').text(response.data.total_skor_humpty_dumpty);

                let detailTable2 = $('#detail_resiko_jatuh_humpty_dumpty2');

                let rendahArray = JSON.parse(response.data.intervensi_resiko_jatuh_humpty_dumpty_rendah);
                rendahArray.forEach(function(item) {
                    detailTable2.find('input[name="intervensi_resiko_jatuh_humpty_dumpty_rendah[]"][value="' + item + '"]').prop('checked', true);
                });

                let tinggiArray = JSON.parse(response.data.intervensi_resiko_jatuh_humpty_dumpty_tinggi);
                tinggiArray.forEach(function(item) {
                    detailTable2.find('input[name="intervensi_resiko_jatuh_humpty_dumpty_tinggi[]"][value="' + item + '"]').prop('checked', true);
                });

                $('#resikoJatuhDetailModalHumptyDumpty').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
                alert('Failed to fetch data for the selected item.');
            }
        });
    }

    function handleLihatButtonClickHumptyDumpty() {
        $(document).off('click', '.lihat-btn-humpty').on('click', '.lihat-btn-humpty', function() {
            var id = $(this).data('id');
            fetchResikoJatuhDetailHumptyDumpty(id);
        });
    }

    function handleHapusButtonClickDumpty() {
        $(document).off('click', '.hapus-btn-humpty').on('click', '.hapus-btn-humpty', function() {
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
                        url: "{{ route('delete.resiko.jatuh.humptydumpty') }}",
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
                            $('#resiko_jatuh_table_humpty_dumpty').DataTable().ajax.reload();
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
