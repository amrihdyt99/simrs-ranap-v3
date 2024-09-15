<script>
    function loadDatatableNews() {
        $('#historyNewsTable').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [10, 25, 50, 100, 200, 500],
            scrollX: true,
            ajax: {
                url: "{{ route('get.monitoringnews') }}",
                data: function(d) {
                    d.reg_no = "{{ $reg }}"; // Pass additional data if needed
                }
            },
            columns: [{
                    data: 'tanggal_dan_waktu',
                    name: 'tanggal_dan_waktu'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
    }

    function showDetailModal(id) {

        $.ajax({
            url: '{{ route('get.detail.monitoringnews', ':id') }}'.replace(':id', id),
            method: 'GET',
            success: function(response) {
                if (response.status === 'success') {
                    let detail = response.data;
                    let detailTable = $('#table_detail_news');

                    updateRadioButton(detailTable, 'pernafasaan', detail.pernafasaan);
                    updateRadioButton(detailTable, 'saturasi_oksigen', detail.saturasi_oksigen);
                    updateRadioButton(detailTable, 'o2_tambahan', detail.o2_tambahan);
                    updateRadioButton(detailTable, 'suhu', detail.suhu);
                    updateRadioButton(detailTable, 'tekanan_darah', detail.tekanan_darah);
                    updateRadioButton(detailTable, 'nadi', detail.nadi);
                    updateRadioButton(detailTable, 'tingkat_kesadaran', detail.tingkat_kesadaran);

                    detailTable.find('input[name="news_total"]').val(detail.news_total);
                    detailTable.find('input[name="news_gula_darah"]').val(detail.news_gula_darah);
                    detailTable.find('input[name="news_analisa_gas_darah"]').val(detail
                        .news_analisa_gas_darah);
                    detailTable.find('input[name="news_penilaian_tik"]').val(detail.news_penilaian_tik);

                    updateRadioButton(detailTable, 'news_kategori', detail.news_kategori);

                    $('#detailModal').modal('show');
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                $('#modalDetailContent').html('<p>Failed to fetch details.</p>');
                console.error(`Error: ${error}`);
            }
        });
    }

    function updateRadioButton(table, name, value) {
        table.find(`input[name="${name}"][value="${value}"]`).prop('checked', true);
    }
</script>
