<script>
    function loadAllFunctionAssesmentGiziDewasa() {
        loadDatatableDiagnosaGizi();
        loadDatatableMonitoringAsuhanGiziDewasa();
    }

    function objectifyForm(formArray) {
        var returnArray = {};
        for (var i = 0; i < formArray.length; i++) {
            returnArray[formArray[i]['name']] = formArray[i]['value'];
        }
        return returnArray;
    }

    // Fungsi untuk memuat DataTable
    function loadDatatableDiagnosaGizi() {
        let data_diagnosa_gizi = JSON.parse($('#diagnosa_gizi_data').val() || "[]");
        $('#t_diagnosa_gizi_dewasa').DataTable({
            ordering: false,
            info: false,
            paging: false,
            searching: false,
            serverSide: false,
            autoWidth: false,
            data: data_diagnosa_gizi,
            columns: [
                {
                    data: 'masalah',
                    render: function(columnData, type, rowData, meta) {
                        return `<textarea class="form-control" name="diagnosa[${meta.row}][masalah]" required readonly>${columnData}</textarea>`;
                    }
                },
                {
                    data: 'berkaitan_dengan',
                    render: function(columnData, type, rowData, meta) {
                        return `<textarea class="form-control" name="diagnosa[${meta.row}][berkaitan_dengan]" required readonly>${columnData}</textarea>`;
                    }
                },
                {
                    data: 'ditandai_dengan',
                    render: function(columnData, type, rowData, meta) {
                        return `<textarea class="form-control" name="diagnosa[${meta.row}][ditandai_dengan]" required readonly>${columnData}</textarea>`;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        return '<button type="button" class="btn btn-danger btn-sm delete-row" data-row="' + meta.row + '"><i class="fa fa-minus"></i></button>';
                    }
                }
            ],
            rowCallback: function(row, data, index) {
                $(row).find('.delete-row').on('click', function() {
                    let rowIndex = $(this).data('row');
                    data_diagnosa_gizi.splice(rowIndex, 1);
                    $('#diagnosa_gizi_data').val(JSON.stringify(data_diagnosa_gizi));
                    $('#t_diagnosa_gizi_dewasa').DataTable().row($(this).parents('tr')).remove().draw();
                });
            }
        });
    }

    function submitFormDiagnosaGizi() {
        let data_diagnosa_gizi = JSON.parse($('#diagnosa_gizi_data').val() || "[]");

        var newDiagnosa = $("#formDiagnosaGizi").serializeArray();
        data_diagnosa_gizi.push(objectifyForm(newDiagnosa));

        $('#diagnosa_gizi_data').val(JSON.stringify(data_diagnosa_gizi));

        $('#t_diagnosa_gizi_dewasa').DataTable().clear(); // Hapus data lama
        $('#t_diagnosa_gizi_dewasa').DataTable().rows.add(data_diagnosa_gizi); // Tambah data baru
        $('#t_diagnosa_gizi_dewasa').DataTable().draw(); // Gambar ulang DataTable

        $('#formDiagnosaGizi')[0].reset(); // Reset input modal

        $('#modalDiagnosaGizi').modal('hide');
    }

    // Fungsi untuk memuat DataTable Monitoring Asuhan Gizi Dewasa
    function loadDatatableMonitoringAsuhanGiziDewasa() {
        let data_monitoring_asuhan_gizi = JSON.parse($('#monitoring_evaluasi_gizi_data').val() || "[]");
        $('#t_monitoring_asuhan_gizi_dewasa').DataTable({
            ordering: false,
            info: false,
            paging: false,
            searching: false,
            serverSide: false,
            autoWidth: false,
            data: data_monitoring_asuhan_gizi,
            columns: [
                {
                    data: 'tanggal',
                    render: function(columnData, type, rowData, meta) {
                        return `<input type="date" class="form-control" name="monitoring[${meta.row}][tanggal]" value="${columnData}" required readonly>`;
                    }
                },
                {
                    data: 'monitoring_evaluasi',
                    render: function(columnData, type, rowData, meta) {
                        return `<textarea class="form-control" name="monitoring[${meta.row}][monitoring_evaluasi]" required readonly>${columnData}</textarea>`;
                    }
                },
                {
                    data: 'terapi_diet',
                    render: function(columnData, type, rowData, meta) {
                        return `<textarea class="form-control" name="monitoring[${meta.row}][terapi_diet]" required readonly>${columnData}</textarea>`;
                    }
                },
                {
                    data: 'nama_dietisien',
                    render: function(columnData, type, rowData, meta) {
                        return `<input type="text" class="form-control" name="monitoring[${meta.row}][nama_dietisien]" value="${columnData}" required readonly>`;
                    }
                },
                {
                    data: 'paraf_dietisien', 
                    render: function(columnData, type, rowData, meta) {
                        return `<img src="${columnData}" alt="Paraf Dietisien" style="width: 100px; height: 100px;">
                                <input type="hidden" name="monitoring[${meta.row}][paraf_dietisien]" value="${columnData}">`;
                    }
                },
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        return '<button type="button" class="btn btn-danger btn-sm delete-row" data-row="' + meta.row + '"><i class="fa fa-minus"></i></button>';
                    }
                }
            ],
            rowCallback: function(row, data, index) {
                $(row).find('.delete-row').on('click', function() {
                    let rowIndex = $(this).data('row');
                    data_monitoring_asuhan_gizi.splice(rowIndex, 1);
                    $('#monitoring_evaluasi_gizi_data').val(JSON.stringify(data_monitoring_asuhan_gizi));
                    $('#t_monitoring_asuhan_gizi_dewasa').DataTable().row($(this).parents('tr')).remove().draw();
                });
            }
        });
    }

    function submitFormMonitoringAsuhanGizi() {
        let data_monitoring_asuhan_gizi = JSON.parse($('#monitoring_evaluasi_gizi_data').val() || "[]");

        var newMonitoring = $("#formMonitoringEvaluasiGizi").serializeArray();
        data_monitoring_asuhan_gizi.push(objectifyForm(newMonitoring));

        $('#monitoring_evaluasi_gizi_data').val(JSON.stringify(data_monitoring_asuhan_gizi));

        $('#t_monitoring_asuhan_gizi_dewasa').DataTable().clear(); // Hapus data lama
        $('#t_monitoring_asuhan_gizi_dewasa').DataTable().rows.add(data_monitoring_asuhan_gizi); // Tambah data baru
        $('#t_monitoring_asuhan_gizi_dewasa').DataTable().draw(); // Gambar ulang DataTable

        $('#formMonitoringEvaluasiGizi')[0].reset(); // Reset input modal

        $('#modalMonitoringEvaluasiGizi').modal('hide');
    }

    function StoreAsuhanGiziDewasa() {
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
                    url: "{{ route('perawat.asuhan-gizi-dewasa.store') }}",
                    type: "POST",
                    data: $('#form_asuhan_gizi_dewasa').serialize(),
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
