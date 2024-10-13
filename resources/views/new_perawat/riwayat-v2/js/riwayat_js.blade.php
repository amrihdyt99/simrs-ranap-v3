<script>

    function yaTidakParser(input) {
        return input === 1 ? "Ya" : input === 0 ? "Tidak" : "Input tidak valid";
    }

    function kategoriSadPersonParser(input) {
        return input === 1 ? "Rendah ( 1-2 )" : input === 2 ? "Sedang ( 3-6 )" : input === 3 ? "Tinggi ( 7 - 10 )" : "Input tidak valid";
    }

    function kategoriAdlParser(input) {
        switch (input) {
            case 1:
                return "Kategori I: Perawatan Minimal (Self Care), memerlukan waktu 1-2 jam / 24 jam";
            case 2:
                return "Kategori II: Kriteria Perawatan Partial (Intermediate Care), memerlukan waktu 3-4 jam / 24 jam";
            case 3:
                return "Kategori III: Kriteria Perawatan Maksimal (Total Care / Intensif Care), memerlukan waktu 5-6 jam / 24 jam";
            default:
                return "Input tidak valid";
        }
    }

    function parseUnderscoreToSpace(input) {
        if (typeof input === 'string') {
            return input.replace(/_/g, ' ');
        }
        return input;
    }

    // Fungsi untuk mengisi checkbox
    const setCheckboxes = (selector, values) => {
        if (values) {
            const valuesArray = values.split(',');
            valuesArray.forEach(function(value) {
                $(selector + '[value="'+value.trim()+'"]').prop('checked', true);
            });
        }
    };

    const setCustomCheckboxes = (selector, values) => {
        const parsedValues = JSON.parse(values); // Parse JSON terlebih dahulu
        if (Array.isArray(parsedValues) && parsedValues.length > 0) {
            parsedValues.forEach(function(value) {
                const checkbox = $(selector + '[value="'+value+'"]');
                if (checkbox.length) {
                    checkbox.prop('disabled', false); // Hapus atribut disabled sementara
                    checkbox.prop('checked', true);
                    checkbox.prop('disabled', true); // Kembalikan atribut disabled
                }
            });
        }
    };

    // Fungsi untuk mengisi radio button
    const setRadioButton = (tableId, name, value) => {
        if (value) {
            $('#'+tableId+' input[name="'+name+'"][value="'+value+'"]').prop('checked', true);
        }
    };

    const setRadioButton2 = (name, value) => {
        if (value) {
            $('input[name="'+name+'"][value="'+value+'"]').prop('checked', true);
        }
    };

    // Fungsi untuk mengisi textarea
    const setTextarea = (selector, value) => {
        if (value) {
            $(selector).val(value);
        }
    };

    // Fungsi untuk mengisi text
    const setInputText = (selector, value) => {
        if (value) {
            $(selector).val(value);
        }
    };

    // Fungsi untuk mengisi input date
    const setInputDate = (selector, value) => {
        if (value) {
            $(selector).val(value);
        }
    };

    // Fungsi untuk mengisi tanda tangan
    const setSignature = (imgId, signatureData) => {
        if (signatureData) {
            const $img = $('#' + imgId);
            $img.attr('src', signatureData);
        }
    };

    function parseGenderSphaira(data) {
        return data === '0001^M' ? 'Laki-Laki' : data === '0001^F' ? 'Perempuan' : 'Tidak Diketahui';
    }

    function parseDateToIndonesian(dateString) {
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const date = new Date(dateString);
        return date.toLocaleDateString('id-ID', options);
    }

    function parseDateTimeToIndonesian(dateString) {
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
        const date = new Date(dateString);
        return date.toLocaleDateString('id-ID', options);
    }

    function loadDtRiwayatTiDiagnostik() {
        // Hapus DataTable jika sudah ada
        if ($.fn.DataTable.isDataTable('#dt_serah_terima_diagnostik')) {
            $('#dt_serah_terima_diagnostik').DataTable().clear().destroy();
        }

        let dt_riwayat_ti_diagnostik = $('#dt_serah_terima_diagnostik').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [10, 25, 50, 100, 200, 500],
            scrollX: true,
            ajax: {
                url: "{{ route('perawat.dt-riwayat-ti-diagnostik') }}",
                data: function(d) {
                    d.reg_no = "{{ $reg }}";
                },
            },
            columns: [{
                data: "lab",
                name: "lab",
                orderable: true,
                searchable: true,
            },
            {
                data: "xray",
                name: "xray",
                orderable: true,
                searchable: true,
            },
            {
                data: "mri",
                name: "mri",
                orderable: true,
                searchable: true,
            },
            {
                data: "ct_scan",
                name: "ct_scan",
                orderable: true,
                searchable: true,
            },
            {
                data: "ekg",
                name: "ekg",
                orderable: true,
                searchable: true,
            },
            {
                data: "echo",
                name: "echo",
                orderable: true,
                searchable: true,
            }],
        });
    }

    function getSerahTerimaTI() {
        $.ajax({
            url: "{{ route('perawat.serah-terima-ti') }}",
            method: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                // console.log(response);
                if (response.status) {
                    let data = response.data;
                    $('#transfer_terima_tanggal').val(data.transfer_terima_tanggal);
                    $('#transfer_terima_kondisi').val(data.transfer_terima_kondisi);
                    $('#transfer_terima_gcs_e').val(data.transfer_terima_gcs_e);
                    $('#transfer_terima_gcs_m').val(data.transfer_terima_gcs_m);
                    $('#transfer_terima_gcs_v').val(data.transfer_terima_gcs_v);
                    $('#transfer_terima_td').val(data.transfer_terima_td);
                    $('#transfer_terima_n').val(data.transfer_terima_n);
                    $('#transfer_terima_suhu').val(data.transfer_terima_suhu);
                    $('#transfer_terima_p').val(data.transfer_terima_p);
                }
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan: ', error);
            }
        })
    }

    function loadDtRiwayatTiStatus() {
        // Hapus DataTable jika sudah ada
        if ($.fn.DataTable.isDataTable('#riwayat_ti_status')) {
            $('#riwayat_ti_status').DataTable().clear().destroy();
        }

        let dt_riwayat_ti_status = $('#riwayat_ti_status').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [10, 25, 50, 100, 200, 500],
            scrollX: true,
            ajax: {
                url: "{{ route('perawat.dt-riwayat-ti-status') }}",
                data: function(d) {
                    d.reg_no = "{{ $reg }}";
                },
            },
            columns: [{
                data: "waktu",
                name: "waktu",
                orderable: true,
                searchable: true,
            },
            {
                data: "kesadaran",
                name: "kesadaran",
                orderable: true,
                searchable: true,
            },
            {
                data: "td",
                name: "td",
                orderable: true,
                searchable: true,
            },
            {
                data: "hr",
                name: "hr",
                orderable: true,
                searchable: true,
            },
            {
                data: "rr",
                name: "rr",
                orderable: true,
                searchable: true,
            },
            {
                data: "spo2",
                name: "spo2",
                orderable: true,
                searchable: true,
            }],
        });
    }

    function loadDtRiwayatTiObat() {
        // Hapus DataTable jika sudah ada
        if ($.fn.DataTable.isDataTable('#riwayat_ti_obat')) {
            $('#riwayat_ti_obat').DataTable().clear().destroy();
        }

        let dt_riwayat_ti_obat = $('#riwayat_ti_obat').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [10, 25, 50, 100, 200, 500],
            scrollX: true,
            ajax: {
                url: "{{ route('perawat.dt-riwayat-ti-obat') }}",
                data: function(d) {
                    d.reg_no = "{{ $reg }}";
                },
            },
            columns: [{
                data: "item_id",
                name: "item_id",
                orderable: true,
                searchable: true,
            },
            {
                data: "quantity",
                name: "quantity",
                orderable: true,
                searchable: true,
            },
            {
                data: "item_unit_code",
                name: "item_unit_code",
                orderable: true,
                searchable: true,
            }],
        });
    }

    function loadDtRiwayatTiAlat() {
        // Hapus DataTable jika sudah ada
        if ($.fn.DataTable.isDataTable('#riwayat_ti_alat')) {
            $('#riwayat_ti_alat').DataTable().clear().destroy();
        }

        let dt_riwayat_ti_alat = $('#riwayat_ti_alat').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [10, 25, 50, 100, 200, 500],
            scrollX: true,
            ajax: {
                url: "{{ route('perawat.dt-riwayat-ti-alat') }}",
                data: function(d) {
                    d.reg_no = "{{ $reg }}";
                },
            },
            columns: [{
                data: "nama_alat_terpasang",
                name: "nama_alat_terpasang",
                orderable: true,
                searchable: true,
            },
            {
                data: "nama_alat_terpasang",
                name: "nama_alat_terpasang",
                orderable: true,
                searchable: true,
            }],
        });
    }

    function getPersiapanPasienTI() {
        $.ajax({
            url: "{{ route('perawat.persiapan-pasien-ti') }}",
            method: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                // console.log(response);
                if (response.status) {
                    let persiapan = response.persiapan_pasien;
                    let ruangan_asal = response.ruangan_asal;
                    let ruangan_tujuan = response.ruangan_tujuan;

                    $('#transfer_unit_asal').val(ruangan_asal.bed_code + ' - ' + ruangan_asal.ruang + ' - ' + ruangan_asal.kelompok + ' - ' + ruangan_asal.kelas);
                    $('#transfer_unit_tujuan').val(ruangan_tujuan.bed_code + ' - ' + ruangan_tujuan.ruang + ' - ' + ruangan_tujuan.kelompok + ' - ' + ruangan_tujuan.kelas);
                    $('#transfer_class').val(persiapan.class_name);
                    $('#transfer_charge_class').val(persiapan.charge_class_name);
                    $('#perawat_tujuan_input').val(persiapan.diterima_oleh_nama);
                    $('#transfer_waktu_hubungi').val(persiapan.transfer_waktu_hubungi);
                    $('#ditransfer_waktu').val(persiapan.ditransfer_waktu);
                    setRadioButton2('transfer_kategori', persiapan.transfer_kategori);
                    $('#transfer_alasan_masuk').val(persiapan.transfer_alasan_masuk);
                    $('#transfer_diagnosis').val(persiapan.transfer_diagnosis);
                    $('#transfer_temuan').val(persiapan.transfer_temuan);
                    setRadioButton2('transfer_alergi', persiapan.transfer_alergi);
                    $('#transfer_alergi_text').val(persiapan.transfer_alergi_text);
                    setRadioButton2('transfer_kewaspaan', persiapan.transfer_kewaspaan);
                    $('#transfer_gcs_e').val(persiapan.transfer_gcs_e);
                    $('#transfer_gcs_m').val(persiapan.transfer_gcs_m);
                    $('#transfer_gcs_v').val(persiapan.transfer_gcs_v);
                    $('#transfer_td').val(persiapan.transfer_td);
                    $('#transfer_N').val(persiapan.transfer_N);
                    $('#transfer_skala_nyeri').val(persiapan.transfer_skala_nyeri);
                    $('#transfer_suhu').val(persiapan.transfer_suhu);
                    $('#transfer_p').val(persiapan.transfer_p);
                    $('#transfer_spo2').val(persiapan.transfer_spo2);
                    setCustomCheckboxes('input[name="transfer_dokumen_yang_disertakan[]"]', persiapan.transfer_dokumen_yang_disertakan);
                }
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan: ', error);
            }
        });
    }

    function loadDtRiwayatTfInternal() {
        // Hapus DataTable jika sudah ada
        if ($.fn.DataTable.isDataTable('#table_riwayat_tf_internal')) {
            $('#table_riwayat_tf_internal').DataTable().clear().destroy();
        }

        let dt_riwayat_tf_internal = $('#table_riwayat_tf_internal').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [10, 25, 50, 100, 200, 500],
            scrollX: true,
            ajax: {
                url: "{{ route('perawat.dt-riwayat-tf-internal') }}",
                data: function(d) {
                    d.reg_no = "{{ $reg }}";
                }
            },
            columns: [{
                data: "transfer_reg",
                name: "transfer_reg",
                orderable: true,
                searchable: true,
            },
            {
                data: "PatientName",
                name: "PatientName",
                orderable: true,
                searchable: true,
            },
            {
                data: "MedicalNo",
                name: "MedicalNo",
                orderable: true,
                searchable: true,
            },
            {
                data: "bed_code_asal",
                name: "bed_code_asal",
                orderable: true,
                searchable: true,
                render: function(data, type, row, meta) {
                    return '[' + row.bed_code_asal + '] ' + row.bed_asal_name + ' - ' + row.bed_asal_unit + ' - ' + row.bed_asal_class;
                }
            }, {
                data: "bed_code_tujuan",
                name: "bed_code_tujuan",
                orderable: true,
                searchable: true,
                render: function(data, type, row, meta) {
                    return '[' + row.bed_code_tujuan + '] ' + row.bed_tujuan_name + ' - ' + row.bed_tujuan_unit + ' - ' + row.bed_tujuan_class;
                }
            }, {
                data: "transfer_waktu_hubungi",
                name: "transfer_waktu_hubungi",
                orderable: true,
                searchable: true,
            }, {
                data: "ditransfer_waktu",
                name: "ditransfer_waktu",
                orderable: true,
                searchable: true,
            }, {
                data: 'status_transfer',
                name: 'status_transfer',
                render: function(columnData, type, rowData, meta) {
                    if (columnData) {
                        return `<span class="badge badge-success text-white">Sudah Diterima</span>`;
                    } else {
                        return `<span class="badge badge-danger">Belum Diterima</span>`;
                    }
                }
            }],
        });
    }

    function getCaseManager() {
        $.ajax({
            url: "{{ route('perawat.case-manager') }}",
            type: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                console.log(response);
                if(response.status){
                    let case_manager = response.case_manager;
                    let case_manager_evaluasi = response.case_manager_evaluasi;

                    // Mengisi data ke dalam form
                    setCheckboxes('input[name="identifikasi_masalah[]"]', case_manager.identifikasi_masalah);
                    $('#keadaan_fungsional').val(case_manager.keadaan_fungsional);
                    $('#riwayat_kesehatan').val(case_manager.riwayat_kesehatan);
                    $('#perilaku_psiko_sosial').val(case_manager.perilaku_psiko_sosial);
                    $('#masalah_isu_sosial').val(case_manager.masalah_isu_sosial);
                    $('#kendala_pembiayaan').val(case_manager.kendala_pembiayaan);
                    $('#kebutuhan_discharge').val(case_manager.kebutuhan_discharge);
                    $('#potensi_penundaan').val(case_manager.potensi_penundaan);
                    $('#potensi_komplain').val(case_manager.potensi_komplain);
                    $('#perencanaan_manegemen').val(case_manager.perencanaan_manegemen);
                    $('#target_hasil').val(case_manager.target_hasil);
                    setSignature('riwayat_case_ttd_perawat', case_manager.ttd_perawat);
                    setSignature('riwayat_case_ttd_pasien', case_manager.ttd_pasien);
                    setSignature('riwayat_case_ttd_saksi', case_manager.ttd_saksi);
                    $('#nama_saksi_asses').val(case_manager.saksi_name);
                    $('#nama_perawat_asses').val(case_manager.perawat_name);
                    $('#nama_pasien_asses').val(case_manager.pasien_name);
                    $('#tanggal_ttd_asses').val(case_manager.tanggal_ttd);

                    setSignature('riwayat_eval_ttd_perawat', case_manager_evaluasi.ttd_perawat);
                    setSignature('riwayat_eval_ttd_pasien', case_manager_evaluasi.ttd_pasien);
                    setSignature('riwayat_eval_ttd_saksi', case_manager_evaluasi.ttd_saksi);
                    $('#tgl_evaluasi').val(case_manager_evaluasi.tgl_akumulasi);
                    $('#nama_perawat_eval').val(case_manager_evaluasi.perawat_name);
                    $('#nama_pasien_eval').val(case_manager_evaluasi.pasien_name);
                    $('#nama_saksi_eval').val(case_manager_evaluasi.saksi_name);
                    $('#tanggal_ttd_eval').val(case_manager_evaluasi.tgl_ttd);
                    $('textarea[name="pelaksanaan"]').val(case_manager_evaluasi.pelaksanaan);
                    $('textarea[name="hasil"]').val(case_manager_evaluasi.hasil);
                    $('input[name="terminasi"]').val(case_manager_evaluasi.terminasi);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
            } 
        });
    }

    function getPersetujuanTindakanMedis() {
        $.ajax({
            url: "{{ route('perawat.persetujuan-tindakan-medis') }}",
            type: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                console.log(response);
                if (response.status) {
                    let informasi = response.informasi;
                    let setuju = response.setuju;
                    let tolak = response.tolak;

                    // Mengisi data ke dalam form
                    $('#informasi_nama_tindakan').val(informasi.informasi_nama_tindakan);
                    $('#ParamedicCode').val(informasi.ParamedicName);
                    $('#informasi_pemberi_info').val(informasi.informasi_pemberi_info);
                    $('#informasi_penerima_info').val(informasi.informasi_penerima_info);
                    $('#informasi_diberikan_pada').val(informasi.informasi_diberikan_pada);
                    $('#informasi_diagnosis_text').val(informasi.informasi_diagnosis_text);
                    $('#informasi_dasar_diagnosis_text').val(informasi.informasi_dasar_diagnosis_text);
                    $('#informasi_tindakan_kedokteran_text').val(informasi.informasi_tindakan_kedokteran_text);
                    $('#informasi_indikasi_tindakan_text').val(informasi.informasi_indikasi_tindakan_text);
                    $('#informasi_tata_cara_text').val(informasi.informasi_tata_cara_text);
                    $('#informasi_tujuan_text').val(informasi.informasi_tujuan_text);
                    $('#informasi_risiko_text').val(informasi.informasi_risiko_text);
                    $('#informasi_komplikasi_text').val(informasi.informasi_komplikasi_text);
                    $('#informasi_prognosis_text').val(informasi.informasi_prognosis_text);
                    $('#informasi_alternatif_text').val(informasi.informasi_alternatif_text);
                    $('#informasi_lain_lain_text').val(informasi.informasi_lain_lain_text);
                    setSignature('ttd_info_dokter', informasi.informasi_ttd_dokter);
                    setSignature('ttd_info_penerima', informasi.informasi_ttd_penerima_informasi);
                    $('#nama_dokter').val(informasi.nama_dokter);
                    $('#nama_penerima_informasi').val(informasi.nama_penerima_informasi);

                    $('#persetujuan_nama_1').val(setuju.persetujuan_nama_1);
                    setRadioButton('riwayat_setuju_tindakan','persetujuan_jenis_kelamin_1', setuju.persetujuan_jenis_kelamin_1);
                    $('#persetujuan_tanggal_lahir_1').val(setuju.persetujuan_tanggal_lahir_1);
                    $('#persetujuan_alamat_1').val(setuju.persetujuan_alamat_1);
                    $('#persetujuan_pernyataan').val(setuju.persetujuan_pernyataan);
                    setRadioButton('riwayat_setuju_tindakan','persetujuan_terhadap', setuju.persetujuan_terhadap);
                    
                    $('#persetujuan_nama_2').val(setuju.persetujuan_nama_2);
                    setRadioButton('riwayat_setuju_tindakan','persetujuan_jenis_kelamin_2', setuju.persetujuan_jenis_kelamin_2);
                    $('#persetujuan_tanggal_lahir_2').val(setuju.persetujuan_tanggal_lahir_2);
                    $('#persetujuan_alamat_2').val(setuju.persetujuan_alamat_2);
                    $('#persetujuan_tanggal_waktu_ttd').val(setuju.persetujuan_tanggal_waktu_ttd);
                    setSignature('ttd_setuju_menyatakan', setuju.persetujuan_ttd_yg_menyatakan);
                    setSignature('ttd_setuju_dokter', setuju.persetujuan_ttd_dokter);
                    setSignature('ttd_setuju_keluarga', setuju.persetujuan_ttd_keluarga);
                    setSignature('ttd_setuju_perawat', setuju.persetujuan_ttd_perawat);
                    $('#nama_persetujuan_penerima').val(setuju.nama_persetujuan_penerima);
                    $('#nama_persetujuan_dokter').val(setuju.nama_persetujuan_dokter);
                    $('#nama_persetujuan_keluarga').val(setuju.nama_persetujuan_keluarga);
                    $('#nama_persetujuan_perawat').val(setuju.nama_persetujuan_perawat);

                    $('#penolakan_nama_1').val(tolak.penolakan_nama_1);
                    setRadioButton('riwayat_tolak_tindakan','penolakan_jenis_kelamin_1', tolak.penolakan_jenis_kelamin_1);
                    $('#penolakan_tanggal_lahir_1').val(tolak.penolakan_tanggal_lahir_1);
                    $('#penolakan_alamat_1').val(tolak.penolakan_alamat_1);
                    $('#penolakan_pernyataan').val(tolak.penolakan_pernyataan);
                    setRadioButton('riwayat_tolak_tindakan','penolakan_terhadap', tolak.penolakan_terhadap);
                    
                    $('#penolakan_nama_2').val(tolak.penolakan_nama_2);
                    setRadioButton('riwayat_tolak_tindakan','penolakan_jenis_kelamin_2', tolak.penolakan_jenis_kelamin_2);
                    $('#penolakan_tanggal_lahir_2').val(tolak.penolakan_tanggal_lahir_2);
                    $('#penolakan_alamat_2').val(tolak.penolakan_alamat_2);
                    $('#penolakan_tanggal_ttd').val(tolak.penolakan_tanggal_ttd);
                    setSignature('ttd_penolakan_menyatakan', tolak.penolakan_ttd_yg_menyatakan);
                    setSignature('ttd_penolakan_dokter', tolak.penolakan_ttd_dokter);
                    setSignature('ttd_penolakan_keluarga', tolak.penolakan_ttd_keluarga);
                    setSignature('ttd_penolakan_perawat', tolak.penolakan_ttd_perawat);
                    $('#nama_penolakan_penerima').val(tolak.nama_penolakan_penerima);
                    $('#nama_penolakan_dokter').val(tolak.nama_penolakan_dokter);
                    $('#nama_penolakan_keluarga').val(tolak.nama_penolakan_keluarga);
                    $('#nama_penolakan_perawat').val(tolak.nama_penolakan_perawat);

                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
            }
        });
    }

    function getMonitoringTransfusiDarah() {
        $.ajax({
            url: "{{ route('perawat.monitoring-transfusi-darah') }}",
            type: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                if (response.status) {
                    let data = response.data;
                    console.log(data);
                    let tbody = $('#riwayat-moni-darah tbody');
                    tbody.empty(); // Hapus data sebelumnya
                    data.forEach(item => {
                        tbody.append(`
                            <tr>
                                <td class="text-center">${item.nomor_kantong}</td>
                                <td class="text-center">${item.golongan_darah}</td>
                                <td class="text-center">${item.jenis_darah}</td>
                                <td class="text-center">${parseDateToIndonesian(item.tanggal_kadarluarsa)}</td>
                                <td class="text-center">${item.penerima_darah}</td>
                                <td class="text-center">${parseDateToIndonesian(item.waktu_transfusi)}</td>
                                <td class="text-center">${item.keadaan_umum}</td>
                                <td class="text-center">${item.suhu_tubuh}</td>
                                <td class="text-center">${item.nadi}</td>
                                <td class="text-center">${item.tekanan_darah}</td>
                                <td class="text-center">${item.respiratory_rate}</td>
                                <td class="text-center">${item.volume_warna_urin}</td>
                                <td class="text-center">${item.gejala_reaksi_transfusi}</td>
                                <td class="text-center">${item.pilihan_menit}</td>
                            </tr>
                        `);
                    });
                } else {
                    console.error('Gagal mengambil data');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
            }
        });
    }
        

    function getRiwayatFluidBalance() {
        $.ajax({
            url: "{{ route('perawat.fluid-balance') }}",
            type: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                if (response.status) {
                    let data = response.data;
                    let tbody = $('#data-fluid-balance');
                    tbody.empty(); // Hapus data sebelumnya

                    data.forEach(item => {
                        tbody.append(`
                            <tr>
                                <td class="text-center">${parseDateTimeToIndonesian(item.tanggal_waktu_pemberian)}</td>
                                <td class="text-center">${item.cairan_transfusi}</td>
                                <td class="text-center">${item.jumlah_cairan}</td>
                                <td class="text-center">${item.minum}</td>
                                <td class="text-center">${item.sonde}</td>
                                <td class="text-center">${item.urine}</td>
                                <td class="text-center">${item.drain}</td>
                                <td class="text-center">${item.iwl_muntah}</td>
                                <td class="text-center">${item.balance}</td>
                            </tr>
                        `);
                    });
                } else {
                    console.error('Gagal mengambil data');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
            }
        });
    }

    function loadDatatableMoniNews() {
        // Hapus DataTable jika sudah ada
        if ($.fn.DataTable.isDataTable('#dt_riwayat_moni_news')) {
            $('#dt_riwayat_moni_news').DataTable().clear().destroy();
        }

        let dt_riwayat_moni_news = $('#dt_riwayat_moni_news').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [10, 25, 50, 100, 200, 500],
            scrollX: true,
            ajax: {
                url: "{{ route('perawat.dt-monitoring-news') }}",
                data: function(d) {
                    d.reg_no = "{{ $reg }}";
                }
            },
            columns: [
                {
                    data: "created_at",
                    name: "created_at",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: "shift",
                    name: "shift",
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'action',
                    name: 'action',
                    className: 'text-center',
                    orderable: false,
                    searchable: false,
                }
            ]
        });
    }

    function detailRiwayatMoniNews(id) {
        $.ajax({
            url: `{{ route('get.detail.monitoringnews', ':id') }}`.replace(':id', id),
            method: 'GET',
            success: function(response) {
                // console.log('inixx',response);
                if (response.status === 'success') {
                    let detail = response.data;
                    let detailTable = $('#table_riwayat_detail_news');

                    $('#table_riwayat_detail_news #aktual_pernafasaan').val(detail.aktual_pernafasaan);
                    $('#table_riwayat_detail_news #aktual_saturasi_oksigen').val(detail.aktual_saturasi_oksigen);
                    $('#table_riwayat_detail_news #aktual_suhu').val(detail.aktual_suhu);
                    $('#table_riwayat_detail_news #aktual_tekanan_darah').val(detail.aktual_tekanan_darah);
                    $('#table_riwayat_detail_news #aktual_nadi').val(detail.aktual_nadi);
                    detailTable.find('input[name="news_total"]').val(detail.news_total);
                    detailTable.find('input[name="news_gula_darah"]').val(detail.news_gula_darah);
                    detailTable.find('input[name="news_analisa_gas_darah"]').val(detail.news_analisa_gas_darah);
                    detailTable.find('input[name="news_penilaian_tik"]').val(detail.news_penilaian_tik);

                    updateRadioButton(detailTable, 'pernafasaan', detail.pernafasaan);
                    updateRadioButton(detailTable, 'saturasi_oksigen', detail.saturasi_oksigen);
                    updateRadioButton(detailTable, 'o2_tambahan', detail.o2_tambahan);
                    updateRadioButton(detailTable, 'suhu', detail.suhu);
                    updateRadioButton(detailTable, 'tekanan_darah', detail.tekanan_darah);
                    updateRadioButton(detailTable, 'nadi', detail.nadi);
                    updateRadioButton(detailTable, 'tingkat_kesadaran', detail.tingkat_kesadaran);
                    updateRadioButton(detailTable, 'news_kategori', detail.news_kategori);

                    $('#riwayatdetailnews').modal('show');
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                $('#riwayatdetailnews').html('<p>Gagal mengambil detail.</p>');
                console.error(`Error: ${error}`);
            }
        });
    }

    function getNurseNote() {
        $.ajax({
            url: '{{ route('perawat.nurse-note') }}',
            type: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                console.log(response);
                const tableBody = $('#riwayat-nurse-note tbody');
                tableBody.empty();
                
                response.data.forEach(function(item) {
                    const row = `
                        <tr>
                            <td>${parseDateToIndonesian(item.tgl_note)}</td>
                            <td>${item.jam_note}</td>
                            <td>${item.catatan}</td>
                            <td>${item.id_nurse} <img src="${item.ttd_perawat}" alt="Tanda Tangan Perawat" style="width: 100px; height: auto;"></td>
                        </tr>
                    `;
                    tableBody.append(row);
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    function getResikoJatuhNeonatus() {
        $.ajax({
            url: '{{ route('perawat.resiko-jatuh-neonatus') }}',
            type: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                // console.log(response);
                if (response.status) {
                    const tableBody = $('#table-riwayat-neonatus tbody');
                    tableBody.empty();
                    
                    response.data.forEach(function(item) {
                        const row = `
                            <tr>
                                <td>${parseDateTimeToIndonesian(item.created_at)}</td>
                                <td>${item.shift}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm view-detail" data-id="${item.id}">Lihat Detail</button>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });

                    $('.view-detail').on('click', function() {
                        const id = $(this).data('id');
                        showNeonatusDetail(id);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    function showNeonatusDetail(id) {
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
                $('#resikoJatuhDetailModalLabelNeonatus').text('Detail Risiko Jatuh pada ' + (response.data.created_at ? formatDateTime(response.data.created_at) : ''));

                let detailTable1 = $('#riwayat-data-neonatus');

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

                $('#riwayat-neonatus-show').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
                alert('Failed to fetch data for the selected item.');
            }
        });
    }

    function getResikoJatuhGeriatri() {
        $.ajax({
            url: '{{ route('perawat.resiko-jatuh-geriatri') }}',
            type: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                // console.log(response);
                if (response.status) {
                    const tableBody = $('#table-riwayat-geriatri tbody');
                    tableBody.empty();
                    
                    response.data.forEach(function(item) {
                        const row = `
                            <tr>
                                <td>${parseDateTimeToIndonesian(item.created_at)}</td>
                                <td>${item.shift}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm view-detail" data-id="${item.resiko_jatuh_geriatri_id}">Lihat Detail</button>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });

                    $('.view-detail').on('click', function() {
                        const id = $(this).data('id');
                        showGeriatriDetail(id);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    function showGeriatriDetail(id) {
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
                // console.log('ini isi',response);
                $('#resikoJatuhDetailModalLabel').text('Detail Risiko Jatuh ' + 'Pada ' + (response.data.created_at ? formatDateTime(response.data.created_at) : ''));

                let detailTable = $('#riwayat-data-geriatri');

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

                let detailTable2 = $('#riwayat-data-geriatri2');

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

                $('#riwayat-geriatri-show').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
                alert('Failed to fetch data for the selected item.');
            }
        });
    }

    function getResikoJatuhHumpty() {
        $.ajax({
            url: '{{ route('perawat.resiko-jatuh-humpty') }}',
            type: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                if (response.status) {
                    const tableBody = $('#table-riwayat-humpty tbody');
                    tableBody.empty();
                    
                    response.data.forEach(function(item) {
                        const row = `
                            <tr>
                                <td>${parseDateTimeToIndonesian(item.created_at)}</td>
                                <td>${item.shift}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm view-detail" data-id="${item.id}">Lihat Detail</button>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });

                    $('.view-detail').on('click', function() {
                        const id = $(this).data('id');
                        showHumptyDetail(id);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    function showHumptyDetail(id) {
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

                let detailTable = $('#riwayat-data-humpty');

                detailTable.find('input[name="humpty_dumpty_umur"][value="' + response.data.humpty_dumpty_umur + '"]').prop('checked', true);
                detailTable.find('input[name="humpty_dumpty_jenis_kelamin"][value="' + response.data.humpty_dumpty_jenis_kelamin + '"]').prop('checked', true);
                detailTable.find('input[name="humpty_dumpty_diagnosis"][value="' + response.data.humpty_dumpty_diagnosis + '"]').prop('checked', true);
                detailTable.find('input[name="humpty_dumpty_gangguan_kognitif"][value="' + response.data.humpty_dumpty_gangguan_kognitif + '"]').prop('checked', true);
                detailTable.find('input[name="humpty_dumpty_faktor_lingkungan"][value="' + response.data.humpty_dumpty_faktor_lingkungan + '"]').prop('checked', true);
                detailTable.find('input[name="humpty_dumpty_respon_terhadap_anastesi"][value="' + response.data.humpty_dumpty_respon_terhadap_anastesi + '"]').prop('checked', true);
                detailTable.find('input[name="humpty_dumpty_gangguan_obat"][value="' + response.data.humpty_dumpty_gangguan_obat + '"]').prop('checked', true);
                detailTable.find('input[name="kategori_humpty_dumpty"][value="' + response.data.kategori_humpty_dumpty + '"]').prop('checked', true);

                $('#total_skor_humpty_dumpty_detail').text(response.data.total_skor_humpty_dumpty);

                let detailTable2 = $('#riwayat-data-humpty2');

                let rendahArray = JSON.parse(response.data.intervensi_resiko_jatuh_humpty_dumpty_rendah);
                rendahArray.forEach(function(item) {
                    detailTable2.find('input[name="intervensi_resiko_jatuh_humpty_dumpty_rendah[]"][value="' + item + '"]').prop('checked', true);
                });

                let tinggiArray = JSON.parse(response.data.intervensi_resiko_jatuh_humpty_dumpty_tinggi);
                tinggiArray.forEach(function(item) {
                    detailTable2.find('input[name="intervensi_resiko_jatuh_humpty_dumpty_tinggi[]"][value="' + item + '"]').prop('checked', true);
                });

                $('#riwayat-humpty-show').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
                alert('Failed to fetch data for the selected item.');
            }
        });
    }

    function getResikoJatuhMorse() {
        $.ajax({
            url: '{{ route('perawat.resiko-jatuh-morse') }}',
            type: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                // console.log(response);
                if (response.status) {
                    const tableBody = $('#table-riwayat-morse tbody');
                    tableBody.empty();
                    
                    response.data.forEach(function(item) {
                        const row = `
                            <tr>
                                <td>${parseDateTimeToIndonesian(item.created_at)}</td>
                                <td>${item.shift}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm view-detail" data-id="${item.id}">Lihat Detail</button>
                                </td>
                            </tr>
                        `;
                        tableBody.append(row);
                    });

                    $('.view-detail').on('click', function() {
                        const id = $(this).data('id');
                        showMorseDetail(id);
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    function showMorseDetail(id) {
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
                // console.log('showMorseDetail', response);
                $('#resikoJatuhDetailModalLabelMorse').text('Detail Risiko Jatuh pada ' + (response.data.created_at ? formatDateTime(response.data.created_at) : ''));

                let detailTable = $('#riwayat-data-morse');
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

                $('#riwayat-morse-show').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
                alert('Failed to fetch data for the selected item.');
            }
        });
    }

    function getChecklistOrientasi() {
        $.ajax({
            url: '{{ route('perawat.checklist-orientasi') }}',
            type: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                // console.log(response);
                if (response.status) {
                    const checklistData = response.data;
                    // Mengisi data checklist
                    $('#riwayat-checklist #no_medrec').text(checklistData.MedicalNo);
                    $('#riwayat-checklist #nama_lengkap').text(checklistData.PatientName);
                    $('#riwayat-checklist #tgl_lahir').text(checklistData.DateOfBirth);
                    $('#riwayat-checklist #jenis_kelamin').text(parseGenderSphaira(checklistData.GCSex));
                    $('#riwayat-checklist #lantai').text(checklistData.kelompok);
                    $('#riwayat-checklist #bed_code').text(checklistData.bed_code);
                    $('#riwayat-checklist #tgl_masuk').text(parseDateToIndonesian(checklistData.tgl_masuk_inap));
                    $('#riwayat-checklist #tgl_assesment').text(parseDateToIndonesian(checklistData.tgl_assesment_awal));
                    setInputText('#riwayat-checklist #sampai', checklistData.sampai);
                    setCustomCheckboxes('#riwayat-checklist input[name="kepada[]"]', checklistData.kepada);
                    setInputText('#riwayat-checklist #kepada_lain', checklistData.kepada_lain);
                    setCheckboxes('#riwayat-checklist input[name="tidak"]', checklistData.tidak);
                    setCustomCheckboxes('#riwayat-checklist input[name="satu[]"]', checklistData.satu);
                    setCustomCheckboxes('#riwayat-checklist input[name="dua[]"]', checklistData.dua);
                    setCustomCheckboxes('#riwayat-checklist input[name="tiga[]"]', checklistData.tiga);
                    setCustomCheckboxes('#riwayat-checklist input[name="empat[]"]', checklistData.empat);
                    setCustomCheckboxes('#riwayat-checklist input[name="empat[]"]', checklistData.empat);
                    setCheckboxes('#riwayat-checklist input[name="gigi"]', checklistData.gigi);
                    setCheckboxes('#riwayat-checklist input[name="lokasi_gigi"]', checklistData.lokasi_gigi);
                    setInputText('#riwayat-checklist #bawa_gigi', checklistData.bawa_gigi);
                    setCheckboxes('#riwayat-checklist input[name="alat"]', checklistData.alat);
                    setCheckboxes('#riwayat-checklist input[name="lokasi_alat"]', checklistData.lokasi_alat);
                    setInputText('#riwayat-checklist #bawa_alat', checklistData.bawa_alat);
                    setCheckboxes('#riwayat-checklist input[name="uang"]', checklistData.uang);
                    setCheckboxes('#riwayat-checklist input[name="uang_bawa"]', checklistData.uang_bawa);
                    setInputText('#riwayat-checklist #barang_lain', checklistData.barang_lain);
                    setInputText('#riwayat-checklist #nama_pihak_pasien', checklistData.nama_pihak_pasien);
                    setInputText('#riwayat-checklist #sebagai_pihak_pasien', checklistData.sebagai_pihak_pasien);
                    setSignature('signature_perawat_img', checklistData.ttd_perawat);
                    setSignature('signature_pasien_img', checklistData.ttd_pasien);
                    setInputText('#ttd_riwayat_checklist #nama_perawat', checklistData.nama_perawat);
                    setInputText('#ttd_riwayat_checklist #nama_keluarga_pasien', checklistData.nama_keluarga_pasien);
                }
            }
        });
    }

    

    function getRekonObat() {
        $.ajax({
            url: '{{ route('perawat.rekonsiliasi-obat') }}',
            type: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                if (response.status) {
                    const rekonData = response.data.rekon_obat || {};
                    const rekonObatItems = response.data.rekon_obat_items || [];
                    
                    // Mengisi radio button penggunaan obat sebelum admisi
                    $(`input[name="penggunaan_sebelum_admisi"][value="${rekonData.penggunaan_sebelum_admisi || 0}"]`).prop('checked', true);
                    
                    // Mengisi tabel rekonsiliasi obat
                    const tableBody = $('#riwayat-rekonsiliasi-obat tbody');
                    tableBody.empty();
                    
                    rekonObatItems.forEach(function(obat) {
                        tableBody.append(`
                            <tr>
                                <td>${obat.nama_obat}</td>
                                <td>${obat.dosis}</td>
                                <td>${obat.frekuensi}</td>
                                <td>${obat.cara_beri}</td>
                                <td>${obat.waktu_beri_terakhir}</td>
                                <td>${obat.tindak_lanjut}</td>
                                <td>${obat.aturan_ubah_pakai}</td>
                            </tr>
                        `);
                    });
                    
                    // Mengisi tanggal dan waktu tanda tangan
                    $('#time_ttd_dpjp').val(rekonData.time_ttd_dpjp || '');
                    $('#time_ttd_farmasi').val(rekonData.time_ttd_farmasi || '');
                    $('#time_ttd_perawat').val(rekonData.time_ttd_perawat || '');
                    
                    // Mengisi tanda tangan
                    setSignature('ttd_dpjp', rekonData.ttd_dpjp);
                    setSignature('ttd_farmasi', rekonData.ttd_farmasi);
                    setSignature('ttd_perawat', rekonData.ttd_perawat);

                    // Mengisi username
                    $('#dokter_username').val(response.data.dokter?.username || '');
                    $('#farmasi_username').val(response.data.farmasi?.username || '');
                    $('#perawat_username').val(response.data.perawat?.username || '');
                }
            }
        });
    }

    function getEdukasiPasien() {
        $.ajax({
            url: '{{ route('perawat.edukasi-pasien') }}',
            type: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                if (response.status) {
                    const pasien = response.data.edukasi_pasien || {};
                    const perawat = response.data.edukasi_perawat || {};
                    const dokter = response.data.edukasi_dokter || {};
                    const gizi = response.data.edukasi_gizi || {};
                    const farmasi = response.data.edukasi_farmasi || {};
                    const rehabilitasi = response.data.edukasi_rehab || {};

                    // Mengisi data table rs_edukasi_pasien
                    setCheckboxes('#table-edukasi-riwayat input[name="bahasa[]"]', pasien.bahasa);
                    setRadioButton('table-edukasi-riwayat','kebutuhan_penerjemah', pasien.kebutuhan_penerjemah);
                    setCheckboxes('#table-edukasi-riwayat input[name="pendidikan_pasien[]"]', pasien.pendidikan_pasien);
                    setCheckboxes('#table-edukasi-riwayat input[name="baca_tulis[]"]', pasien.baca_tulis);
                    setCheckboxes('#table-edukasi-riwayat input[name="pilihan_tipe_belajar[]"]', pasien.pilihan_tipe_belajar);
                    setCheckboxes('#table-edukasi-riwayat input[name="hambatan_belajar[]"]', pasien.hambatan_belajar);
                    setCheckboxes('#table-edukasi-riwayat input[name="kebutuhan_belajar[]"]', pasien.kebutuhan_belajar);
                    setRadioButton('table-edukasi-riwayat','kesediaan_pasien', pasien.kesediaan_pasien);

                    // Mengisi data table rs_edukasi_pasien_perawat
                    setTextarea('#table-edukasi-perawat #edukasi_penggunaan_peralatan_perawat', perawat.edukasi_penggunaan_peralatan_perawat);
                    setInputDate('#table-edukasi-perawat #tgl_penggunaan_peralatan_perawat', perawat.tgl_penggunaan_peralatan_perawat);
                    setRadioButton('table-edukasi-perawat','tingkat_paham_penggunaan_peralatan_perawat', perawat.tingkat_paham_penggunaan_peralatan_perawat);
                    setTextarea('#table-edukasi-perawat #metode_edukasi_penggunaan_peralatan_perawat', perawat.metode_edukasi_penggunaan_peralatan_perawat);
                    setTextarea('#table-edukasi-perawat #edukasi_pencegahan_perawat', perawat.edukasi_pencegahan_perawat);
                    setInputDate('#table-edukasi-perawat #tgl_pencegahan_perawat', perawat.tgl_pencegahan_perawat);
                    setRadioButton('table-edukasi-perawat','tingkat_paham_pencegahan_perawat', perawat.tingkat_paham_pencegahan_perawat);
                    setTextarea('#table-edukasi-perawat #metode_edukasi_pencegahan_perawat', perawat.metode_edukasi_pencegahan_perawat);

                    setTextarea('#table-edukasi-perawat #edukasi_manajemen_nyeri_ringan_perawat', perawat.edukasi_manajemen_nyeri_ringan_perawat);
                    setInputDate('#table-edukasi-perawat #tgl_manajemen_nyeri_ringan_perawat', perawat.tgl_manajemen_nyeri_ringan_perawat);
                    setRadioButton('table-edukasi-perawat','tingkat_paham_manajemen_nyeri_ringan_perawat', perawat.tingkat_paham_manajemen_nyeri_ringan_perawat);
                    setTextarea('#table-edukasi-perawat #metode_edukasi_manajemen_nyeri_ringan_perawat', perawat.metode_edukasi_manajemen_nyeri_ringan_perawat);

                    setTextarea('#table-edukasi-perawat #edukasi_lain_lain_perawat', perawat.edukasi_lain_lain_perawat);
                    setInputDate('#table-edukasi-perawat #tgl_lain_lain_perawat', perawat.tgl_lain_lain_perawat);
                    setRadioButton('table-edukasi-perawat','tingkat_paham_lain_lain_perawat', perawat.tingkat_paham_lain_lain_perawat);
                    setTextarea('#table-edukasi-perawat #metode_edukasi_lain_lain_perawat', perawat.metode_edukasi_lain_lain_perawat);
                    setTextarea('#table-edukasi-perawat #tingkat_paham_lain_lain_text_perawat', perawat.tingkat_paham_lain_lain_text_perawat);

                    
                    // Mengisi data table edukasi dokter
                    setTextarea('#table-edukasi-dokter #edukasi_diagnosa_penyebab_dokter', dokter.edukasi_diagnosa_penyebab_dokter);
                    setInputDate('#table-edukasi-dokter #tgl_diagnosa_penyebab_dokter', dokter.tgl_diagnosa_penyebab_dokter);
                    setRadioButton('table-edukasi-dokter','tingkat_paham_diagnosa_penyebab_dokter', dokter.tingkat_paham_diagnosa_penyebab_dokter);
                    setTextarea('#table-edukasi-dokter #metode_edukasi_diagnosa_penyebab_dokter', dokter.metode_edukasi_diagnosa_penyebab_dokter);

                    setTextarea('#table-edukasi-dokter #edukasi_penatalaksanaan_dokter', dokter.edukasi_penatalaksanaan_dokter);
                    setInputDate('#table-edukasi-dokter #tgl_penatalaksanaan_dokter', dokter.tgl_penatalaksanaan_dokter);
                    setRadioButton('table-edukasi-dokter','tingkat_paham_penatalaksanaan_dokter', dokter.tingkat_paham_penatalaksanaan_dokter);
                    setTextarea('#table-edukasi-dokter #metode_edukasi_penatalaksanaan_dokter', dokter.metode_edukasi_penatalaksanaan_dokter);

                    setTextarea('#table-edukasi-dokter #edukasi_prosedur_diagnostik_dokter', dokter.edukasi_prosedur_diagnostik_dokter);
                    setInputDate('#table-edukasi-dokter #tgl_prosedur_diagnostik_dokter', dokter.tgl_prosedur_diagnostik_dokter);
                    setRadioButton('table-edukasi-dokter','tingkat_paham_prosedur_diagnostik_dokter', dokter.tingkat_paham_prosedur_diagnostik_dokter);
                    setTextarea('#table-edukasi-dokter #metode_edukasi_prosedur_diagnostik_dokter', dokter.metode_edukasi_prosedur_diagnostik_dokter);

                    setTextarea('#table-edukasi-dokter #edukasi_manajemen_nyeri_dokter', dokter.edukasi_manajemen_nyeri_dokter);
                    setInputDate('#table-edukasi-dokter #tgl_manajemen_nyeri_dokter', dokter.tgl_manajemen_nyeri_dokter);
                    setRadioButton('table-edukasi-dokter','tingkat_paham_manajemen_nyeri_dokter', dokter.tingkat_paham_manajemen_nyeri_dokter);
                    setTextarea('#table-edukasi-dokter #metode_edukasi_manajemen_nyeri_dokter', dokter.metode_edukasi_manajemen_nyeri_dokter);

                    setTextarea('#table-edukasi-dokter #edukasi_lain_lain_dokter', dokter.edukasi_lain_lain_dokter);
                    setInputDate('#table-edukasi-dokter #tgl_lain_lain_dokter', dokter.tgl_lain_lain_dokter);
                    setRadioButton('table-edukasi-dokter','tingkat_paham_lain_lain_dokter', dokter.tingkat_paham_lain_lain_dokter);
                    setTextarea('#table-edukasi-dokter #tingkat_paham_lain_lain_text_dokter', dokter.tingkat_paham_lain_lain_text_dokter);

                    // Mengisi data table edukasi gizi
                    setTextarea('#table-edukasi-gizi #edukasi_pentingnya_nutrisi_gizi', gizi.edukasi_pentingnya_nutrisi_gizi);
                    setInputDate('#table-edukasi-gizi #tgl_pentingnya_nutrisi_gizi', gizi.tgl_pentingnya_nutrisi_gizi);
                    setRadioButton('table-edukasi-gizi','tingkat_paham_pentingnya_nutrisi_gizi', gizi.tingkat_paham_pentingnya_nutrisi_gizi);
                    setTextarea('#table-edukasi-gizi #metode_edukasi_pentingnya_nutrisi_gizi', gizi.metode_edukasi_pentingnya_nutrisi_gizi);

                    setTextarea('#table-edukasi-gizi #edukasi_diet_gizi', gizi.edukasi_diet_gizi);
                    setInputDate('#table-edukasi-gizi #tgl_diet_gizi', gizi.tgl_diet_gizi);
                    setRadioButton('table-edukasi-gizi','tingkat_paham_diet_gizi', gizi.tingkat_paham_diet_gizi);
                    setTextarea('#table-edukasi-gizi #metode_edukasi_diet_gizi', gizi.metode_edukasi_diet_gizi);

                    setTextarea('#table-edukasi-gizi #edukasi_lain_lain_gizi', gizi.edukasi_lain_lain_gizi);
                    setInputDate('#table-edukasi-gizi #tgl_lain_lain_gizi', gizi.tgl_lain_lain_gizi);
                    setRadioButton('table-edukasi-gizi','tingkat_paham_lain_lain_gizi', gizi.tingkat_paham_lain_lain_gizi);
                    setTextarea('#table-edukasi-gizi #metode_edukasi_lain_lain_gizi', gizi.metode_edukasi_lain_lain_gizi);
                    setTextarea('#table-edukasi-gizi #tingkat_paham_lain_lain_text_gizi', gizi.tingkat_paham_lain_lain_text_gizi);

                    // Mengisi data table edukasi farmasi
                    setTextarea('#table-edukasi-farmasi #edukasi_obat_diberikan_farmasi', farmasi.edukasi_obat_diberikan_farmasi);
                    setInputDate('#table-edukasi-farmasi #tgl_obat_diberikan_farmasi', farmasi.tgl_obat_diberikan_farmasi);
                    setRadioButton('table-edukasi-farmasi','tingkat_paham_obat_diberikan_farmasi', farmasi.tingkat_paham_obat_diberikan_farmasi);
                    setTextarea('#table-edukasi-farmasi #metode_edukasi_obat_diberikan_farmasi', farmasi.metode_edukasi_obat_diberikan_farmasi);

                    setTextarea('#table-edukasi-farmasi #edukasi_efek_samping_farmasi', farmasi.edukasi_efek_samping_farmasi);
                    setInputDate('#table-edukasi-farmasi #tgl_efek_samping_farmasi', farmasi.tgl_efek_samping_farmasi);
                    setRadioButton('table-edukasi-farmasi','tingkat_paham_efek_samping_farmasi', farmasi.tingkat_paham_efek_samping_farmasi);
                    setTextarea('#table-edukasi-farmasi #metode_edukasi_efek_samping_farmasi', farmasi.metode_edukasi_efek_samping_farmasi);

                    setTextarea('#table-edukasi-farmasi #edukasi_interaksi_farmasi', farmasi.edukasi_interaksi_farmasi);
                    setInputDate('#table-edukasi-farmasi #tgl_interaksi_farmasi', farmasi.tgl_interaksi_farmasi);
                    setRadioButton('table-edukasi-farmasi','tingkat_paham_interaksi_farmasi', farmasi.tingkat_paham_interaksi_farmasi);
                    setTextarea('#table-edukasi-farmasi #metode_edukasi_interaksi_farmasi', farmasi.metode_edukasi_interaksi_farmasi);

                    setTextarea('#table-edukasi-farmasi #edukasi_lain_lain_farmasi', farmasi.edukasi_lain_lain_farmasi);
                    setInputDate('#table-edukasi-farmasi #tgl_lain_lain_farmasi', farmasi.tgl_lain_lain_farmasi);
                    setRadioButton('table-edukasi-farmasi','tingkat_paham_lain_lain_farmasi', farmasi.tingkat_paham_lain_lain_farmasi);
                    setTextarea('#table-edukasi-farmasi #metode_edukasi_lain_lain_farmasi', farmasi.metode_edukasi_lain_lain_farmasi);
                    setTextarea('#table-edukasi-farmasi #tingkat_paham_lain_lain_text_farmasi', farmasi.tingkat_paham_lain_lain_text_farmasi);

                    // Mengisi data table edukasi rehabilitasi
                    setTextarea('#table-edukasi-rehabilitasi #edukasi_tehnik_rehabilitasi', rehabilitasi.edukasi_tehnik_rehabilitasi);
                    setInputDate('#table-edukasi-rehabilitasi #tgl_tehnik_rehabilitasi', rehabilitasi.tgl_tehnik_rehabilitasi);
                    setRadioButton('table-edukasi-rehabilitasi','tingkat_paham_tehnik_rehabilitasi', rehabilitasi.tingkat_paham_tehnik_rehabilitasi);
                    setTextarea('#table-edukasi-rehabilitasi #metode_edukasi_tehnik_rehabilitasi', rehabilitasi.metode_edukasi_tehnik_rehabilitasi);

                    setTextarea('#table-edukasi-rehabilitasi #edukasi_lain_lain_rehabilitasi', rehabilitasi.edukasi_lain_lain_rehabilitasi);
                    setInputDate('#table-edukasi-rehabilitasi #tgl_lain_lain_rehabilitasi', rehabilitasi.tgl_lain_lain_rehabilitasi);
                    setRadioButton('table-edukasi-rehabilitasi','tingkat_paham_lain_lain_rehabilitasi', rehabilitasi.tingkat_paham_lain_lain_rehabilitasi);
                    setTextarea('#table-edukasi-rehabilitasi #metode_edukasi_lain_lain_rehabilitasi', rehabilitasi.metode_edukasi_lain_lain_rehabilitasi);
                    setTextarea('#table-edukasi-rehabilitasi #tingkat_paham_lain_lain_text_rehabilitasi', rehabilitasi.tingkat_paham_lain_lain_text_rehabilitasi);

                    // Mengisi tanda tangan
                    setSignature('signature_sasaran_perawat', perawat.ttd_sasaran);
                    setSignature('signature_edukator_perawat', perawat.ttd_edukator);
                    setTextarea('#table-edukasi-ttd-perawat #nama_edukator_perawat', perawat.nama_edukator);
                    setTextarea('#table-edukasi-ttd-perawat #nama_sasaran_perawat', perawat.nama_sasaran);
                    setSignature('signature_sasaran_dokter', dokter.ttd_pasien);
                    setSignature('signature_edukator_dokter', dokter.ttd_dokter);
                    setTextarea('#table-edukasi-ttd-dokter #nama_edukator_dokter', dokter.nama_edukator);
                    setTextarea('#table-edukasi-ttd-dokter #nama_sasaran_dokter', dokter.nama_sasaran);
                    setSignature('signature_sasaran_farmasi', farmasi.ttd_sasaran);
                    setSignature('signature_edukator_farmasi', farmasi.ttd_edukator);
                    setTextarea('#table-edukasi-ttd-farmasi #nama_edukator_farmasi', farmasi.nama_edukator);
                    setTextarea('#table-edukasi-ttd-farmasi #nama_sasaran_farmasi', farmasi.nama_sasaran);
                    setSignature('signature_sasaran_gizi', gizi.ttd_sasaran);
                    setSignature('signature_edukator_gizi', gizi.ttd_edukator);
                    setTextarea('#table-edukasi-ttd-gizi #nama_edukator_gizi', gizi.nama_edukator);
                    setTextarea('#table-edukasi-ttd-gizi #nama_sasaran_gizi', gizi.nama_sasaran);
                    setSignature('signature_sasaran_rehabilitasi', rehabilitasi.ttd_sasaran);
                    setSignature('signature_edukator_rehabilitasi', rehabilitasi.ttd_edukator);
                    setTextarea('#table-edukasi-ttd-rehab #nama_edukator_rehab', rehabilitasi.nama_edukator);
                    setTextarea('#table-edukasi-ttd-rehab #nama_sasaran_rehab', rehabilitasi.nama_sasaran);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error: ", error);
            }
        });
    }

    //assesment awal
    function getAssesmentNeonatus(){
        $.ajax({
            url: '{{ route('perawat.assesment-neonatus') }}',
            type: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                console.log(response)
                if(response.status){
                $('#tgl-assesment').text(response.data.created_at);
                $('#table-awal-neonatus #riwayat_penyakit_ibu').text(response.data.riwayat_penyakit_ibu);
                $('#table-awal-neonatus #jenis_kelamin').text(response.data.jenis_kelamin);
                $('#table-awal-neonatus #berat_fisik').text(response.data.berat_fisik);
                $('#table-awal-neonatus #panjang_fisik').text(response.data.panjang_fisik);
                $('#table-awal-neonatus #lingkar_kepala').text(response.data.lingkar_kepala);
                $('#table-awal-neonatus #lingkar_perut').text(response.data.lingkar_perut);
                $('#table-awal-neonatus #aktifitas').text(response.data.aktifitas);
                $('#table-awal-neonatus #tangis').text(response.data.tangis);
                $('#table-awal-neonatus #refleks_hisap').text(response.data.refleks_hisap);
                $('#table-awal-neonatus #anemia').text(response.data.anemia);
                $('#table-awal-neonatus #ikterus').text(response.data.ikterus);
                $('#table-awal-neonatus #sianosis').text(response.data.sianosis);
                $('#table-awal-neonatus #dispnoe').text(response.data.dispnoe);
                $('#table-awal-neonatus #denyut_jantung').text(response.data.denyut_jantung);
                $('#table-awal-neonatus #pernafasan').text(response.data.pernafasan);
                $('#table-awal-neonatus #temperatur').text(response.data.temperatur);
                $('#table-awal-neonatus #spesifik_kepala').text(response.data.spesifik_kepala);
                $('#table-awal-neonatus #spesifik_kepala_ket').text(response.data.spesifik_kepala_ket);
                $('#table-awal-neonatus #spesifik_leher').text(response.data.spesifik_leher);
                $('#table-awal-neonatus #spesifik_thoraks').text(response.data.spesifik_thoraks);
                $('#table-awal-neonatus #spesifik_abdomen').text(response.data.spesifik_abdomen);
                $('#table-awal-neonatus #spesifik_ekstremitas').text(response.data.spesifik_ekstremitas);
                $('#table-awal-neonatus #spesifik_anus').text(response.data.spesifik_anus);
                $('#table-awal-neonatus #spesifik_genitalia').text(response.data.spesifik_genitalia);
                $('#table-awal-neonatus #spesifik_penunjang').text(response.data.spesifik_penunjang);
                $('#table-awal-neonatus #spesifik_daftar_masalah').text(response.data.spesifik_daftar_masalah);
                $('#table-awal-neonatus #spesifik_tata_laksana').text(response.data.spesifik_tata_laksana);

                $('#table-nyeri-eliminasi-neonatus #ekspresi').text(response.data.ekspresi);
                $('#table-nyeri-eliminasi-neonatus #menangis').text(response.data.menangis);
                $('#table-nyeri-eliminasi-neonatus #pola_nafas').text(response.data.pola_nafas);
                $('#table-nyeri-eliminasi-neonatus #lengan').text(response.data.lengan);
                $('#table-nyeri-eliminasi-neonatus #kaki').text(response.data.kaki);
                $('#table-nyeri-eliminasi-neonatus #rangsangan').text(response.data.rangsangan);
                $('#table-nyeri-eliminasi-neonatus #heart_rate').text(response.data.heart_rate);
                $('#table-nyeri-eliminasi-neonatus #saturasi_oksigen').text(response.data.saturasi_oksigen);
                $('#table-nyeri-eliminasi-neonatus #frekuensi_bab').text(response.data.frekuensi_bab);
                $('#table-nyeri-eliminasi-neonatus #frekuensi_bab_no').text(response.data.frekuensi_bab_no);
                $('#table-nyeri-eliminasi-neonatus #gangguan_bab').text(response.data.gangguan_bab);
                $('#table-nyeri-eliminasi-neonatus #gangguan_bab_ket').text(response.data.gangguan_bab_ket);
                $('#table-nyeri-eliminasi-neonatus #karakter_bab').text(response.data.karakter_bab);
                $('#table-nyeri-eliminasi-neonatus #frekuensi_bab_hari').text(response.data.frekuensi_bab_hari);
                $('#table-nyeri-eliminasi-neonatus #frekuensi_bab_jumlah').text(response.data.frekuensi_bab_jumlah);
                $('#table-nyeri-eliminasi-neonatus #warna_feces').text(response.data.warna_feces);
                $('#table-nyeri-eliminasi-neonatus #warna_urin').text(response.data.warna_urin);
                $('#table-nyeri-eliminasi-neonatus #bahasa').text(response.data.bahasa);
                $('#table-nyeri-eliminasi-neonatus #bahasa_lain').text(response.data.bahasa_lain);
                $('#table-nyeri-eliminasi-neonatus #penerjemah_ortu').text(response.data.penerjemah_ortu);
                $('#table-nyeri-eliminasi-neonatus #hambatan_ortu').text(response.data.hambatan_ortu);
                $('#table-nyeri-eliminasi-neonatus #hambatan_ortu_lain').text(response.data.hambatan_ortu_lain);
                $('#table-nyeri-eliminasi-neonatus #edukasi_ortu').text(response.data.edukasi_ortu);
                $('#table-nyeri-eliminasi-neonatus #edukasi_ortu_ket').text(response.data.edukasi_ortu_ket);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }
    

    function getAssesmentAnak(){
        $.ajax({
            url: '{{ route('perawat.assesment-anak') }}',
            type: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                // console.log(response);
                if(response.status){
                    $('#tgl-assesment').text(response.data.created_at);
                    $('#riwayat-assesment-anak #alergi').text(yaTidakParser(response.data.alergi));
                    $('#riwayat-assesment-anak #alergi_obat').text(response.data.alergi_obat);
                    $('#riwayat-assesment-anak #reaksi_alergi_obat').text(response.data.reaksi_alergi_obat);
                    $('#riwayat-assesment-anak #alergi_makanan').text(response.data.alergi_makanan);
                    $('#riwayat-assesment-anak #reaksi_alergi_makanan').text(response.data.reaksi_alergi_makanan);
                    $('#riwayat-assesment-anak #alergi_lainnya').text(response.data.alergi_lainnya);
                    $('#riwayat-assesment-anak #reaksi_alergi_lainnya').text(response.data.reaksi_alergi_lainnya);
                    $('#riwayat-assesment-anak #kesadaran').text(response.data.kesadaran);
                    $('#riwayat-assesment-anak #kondisi_umum').text(response.data.kondisi_umum);
                    $('#riwayat-assesment-anak #kondisi_umum_lainnya').text(response.data.kondisi_umum_lainnya);
                    $('#riwayat-assesment-anak #kondisi_umum_lainnya_text').text(response.data.kondisi_umum_lainnya_text);
                    $('#riwayat-assesment-anak #tekanan_darah').text(response.data.tekanan_darah);
                    $('#riwayat-assesment-anak #nadi').text(response.data.nadi);
                    $('#riwayat-assesment-anak #suhu').text(response.data.suhu);
                    $('#riwayat-assesment-anak #pernafasan').text(response.data.pernafasan);
                    $('#riwayat-assesment-anak #tinggi_badan').text(response.data.tinggi_badan);
                    $('#riwayat-assesment-anak #berat_badan').text(response.data.berat_badan);
                    $('#riwayat-assesment-anak #kebutuhan_khusus').text(response.data.kebutuhan_khusus);
                    $('#riwayat-assesment-anak #kebutuhan_khusus_lainnya').text(response.data.kebutuhan_khusus_lainnya);
                    $('#riwayat-assesment-anak #status_emosional').text(response.data.status_emosional);
                    $('#riwayat-assesment-anak #status_emosi_lainnya').text(response.data.status_emosi_lainnya);
                    $('#riwayat-assesment-anak #merokok').text(yaTidakParser(response.data.merokok));
                    $('#riwayat-assesment-anak #frekuensi_merokok').text(response.data.frekuensi_merokok);
                    $('#riwayat-assesment-anak #alkohol').text(yaTidakParser(response.data.alkohol));
                    $('#riwayat-assesment-anak #riwayat_gangguan_jiwa').text(yaTidakParser(response.data.riwayat_gangguan_jiwa));
                    $('#riwayat-assesment-anak #gangguan_jiwa_waktu').text(response.data.gangguan_jiwa_waktu);

                    $('#riwayat-assesment-anak #sex').text(response.data.sex);
                    $('#riwayat-assesment-anak #age').text(response.data.age);
                    $('#riwayat-assesment-anak #depresi').text(response.data.depresi);
                    $('#riwayat-assesment-anak #suicide').text(response.data.suicide);
                    $('#riwayat-assesment-anak #alcohol').text(response.data.alcohol);
                    $('#riwayat-assesment-anak #thinking_loss').text(response.data.thinking_loss);
                    $('#riwayat-assesment-anak #separated').text(response.data.separated);
                    $('#riwayat-assesment-anak #organized_plan').text(response.data.organized_plan);
                    $('#riwayat-assesment-anak #no_social_support').text(response.data.no_social_support);
                    $('#riwayat-assesment-anak #sickness').text(response.data.sickness);
                    $('#riwayat-assesment-anak #skor_sad_person').text(response.data.skor_sad_person);
                    $('#riwayat-assesment-anak #kategori').text(kategoriSadPersonParser(response.data.kategori));

                    $('#riwayat-assesment-anak #riwayat_bunuh_diri').text(yaTidakParser(response.data.riwayat_bunuh_diri));
                    $('#riwayat-assesment-anak #riwayat_bunuh_diri_ket').text(response.data.riwayat_bunuh_diri_ket);
                    $('#riwayat-assesment-anak #riwayat_trauma_psikis').text(response.data.riwayat_trauma_psikis);
                    $('#riwayat-assesment-anak #tindakan_kriminal_ket').text(response.data.tindakan_kriminal_ket);
                    $('#riwayat-assesment-anak #riwayat_trauma_psikis_ket').text(response.data.riwayat_trauma_psikis_ket);
                    $('#riwayat-assesment-anak #riwayat_trauma_psikis_detail_lain_text').text(response.data.riwayat_trauma_psikis_detail_lain_text);
                    $('#riwayat-assesment-anak #hambatan_sosial_ekonomi').text(yaTidakParser(response.data.hambatan_sosial_ekonomi));
                    $('#riwayat-assesment-anak #konseling_spiritual').text(yaTidakParser(response.data.konseling_spiritual));
                    $('#riwayat-assesment-anak #konseling_spiritual_ket').text(response.data.konseling_spiritual_ket);
                    $('#riwayat-assesment-anak #bantuan_ibadah').text(yaTidakParser(response.data.bantuan_ibadah));
                    $('#riwayat-assesment-anak #bantuan_ibadah_ket').text(response.data.bantuan_ibadah_ket);

                    
                    $('#riwayat-assesment-anak #resiko_riwayat_ibu').text(yaTidakParser(response.data.resiko_riwayat_ibu));
                    $('#riwayat-assesment-anak #list_res_riwayat_ibu').text(response.data.list_res_riwayat_ibu);
                    $('#riwayat-assesment-anak #res_ibu_ket_infeksi').text(response.data.res_ibu_ket_infeksi);
                    $('#riwayat-assesment-anak #perinatal').text(yaTidakParser(response.data.perinatal));
                    $('#riwayat-assesment-anak #perinatal_detail').text(response.data.perinatal_detail);
                    $('#riwayat-assesment-anak #postnatal').text(yaTidakParser(response.data.postnatal));
                    $('#riwayat-assesment-anak #list_postnatal').text(response.data.list_postnatal);
                    $('#riwayat-assesment-anak #hospitalisasi').text(response.data.hospitalisasi);
                    $('#riwayat-assesment-anak #hospitalisasi_lainnya').text(response.data.hospitalisasi_lainnya);
                    $('#riwayat-assesment-anak #hospitalisasi_times').text(response.data.hospitalisasi_times);
                    $('#riwayat-assesment-anak #pola_asuh').text(response.data.pola_asuh);
                    $('#riwayat-assesment-anak #org_terdekat').text(response.data.org_terdekat);
                    $('#riwayat-assesment-anak #org_terdekat_lainnya').text(response.data.org_terdekat_lainnya);
                    $('#riwayat-assesment-anak #tipe_anak').text(response.data.tipe_anak);
                    $('#riwayat-assesment-anak #tipe_anak_lainnya').text(response.data.tipe_anak_lainnya);
                    $('#riwayat-assesment-anak #perilaku_unik').text(yaTidakParser(response.data.perilaku_unik));
                    $('#riwayat-assesment-anak #perilaku_unik_lainnya').text(response.data.perilaku_unik_lainnya);
                    $('#riwayat-assesment-anak #pekerjaan_ayah').text(response.data.pekerjaan_ayah);
                    $('#riwayat-assesment-anak #pekerjaan_ibu').text(response.data.pekerjaan_ibu);

                    $('#riwayat-assesment-anak #rangsang_bab').text(response.data.rangsang_bab);
                    $('#riwayat-assesment-anak #rangsang_bab').text(response.data.rangsang_bab);
                    $('#riwayat-assesment-anak #membersihkan_diri').text(response.data.membersihkan_diri);
                    $('#riwayat-assesment-anak #penggunaan_wc').text(response.data.penggunaan_wc);
                    $('#riwayat-assesment-anak #makan_minum').text(response.data.makan_minum);
                    $('#riwayat-assesment-anak #bergerak_kursi_roda').text(response.data.bergerak_kursi_roda);
                    $('#riwayat-assesment-anak #berjalan').text(response.data.berjalan);
                    $('#riwayat-assesment-anak #berpakaian').text(response.data.berpakaian);
                    $('#riwayat-assesment-anak #tangga').text(response.data.tangga);
                    $('#riwayat-assesment-anak #mandi').text(response.data.mandi);
                    $('#riwayat-assesment-anak #total_skor_adl').text(response.data.total_skor_adl);
                    $('#riwayat-assesment-anak #kategori_status_fungsional').text(kategoriAdlParser(response.data.kategori_status_fungsional));

                    $('#riwayat-assesment-anak #rentang_gerak').text(yaTidakParser(response.data.rentang_gerak));
                    $('#riwayat-assesment-anak #deformitas').text(yaTidakParser(response.data.deformitas));
                    $('#riwayat-assesment-anak #deformitas_text').text(response.data.deformitas_text);
                    $('#riwayat-assesment-anak #gangguan_tidur').text(yaTidakParser(response.data.gangguan_tidur));
                    $('#riwayat-assesment-anak #gangguan_tidur_text').text(response.data.gangguan_tidur_text);
                    $('#riwayat-assesment-anak #keluhan_nutrisi').text(parseUnderscoreToSpace(response.data.keluhan_nutrisi));
                    $('#riwayat-assesment-anak #rasa_haus_berlebih').text(yaTidakParser(response.data.rasa_haus_berlebih));
                    $('#riwayat-assesment-anak #mukosa_mulut').text(response.data.mukosa_mulut);
                    $('#riwayat-assesment-anak #turgor_kulit').text(response.data.turgor_kulit);
                    $('#riwayat-assesment-anak #endema').text(yaTidakParser(response.data.endema));

                    $('#riwayat-assesment-anak-gizi #tampak_kurus').text(response.data.tampak_kurus);
                    $('#riwayat-assesment-anak-gizi #penurunan_bb').text(response.data.penurunan_bb);
                    $('#riwayat-assesment-anak-gizi #kondisi_anak').text(response.data.kondisi_anak);
                    $('#riwayat-assesment-anak-gizi #resiko_malnutrisi').text(response.data.resiko_malnutrisi);
                    $('#riwayat-assesment-anak-gizi #skor_gizi_anak').text(response.data.skor_gizi_anak);
                    $('#riwayat-assesment-anak-gizi #kategori_gizi').text(response.data.kategori_gizi);
                    $('#riwayat-assesment-anak-gizi #sebab_malnutrisi').text(JSON.parse(response.data.sebab_malnutrisi));
                    $('#riwayat-assesment-anak-gizi #sebab_malnutrisi_lain').text(response.data.sebab_malnutrisi_lain);

                    $('#riwayat-assesment-anak-nyeri #skala_wong_baker').text(yaTidakParser(response.data.skala_wong_baker));
                    $('#riwayat-assesment-anak-nyeri #nyeri_skala').text(response.data.nyeri_skala);
                    $('#riwayat-assesment-anak-nyeri #merasa_nyeri').text(yaTidakParser(response.data.merasa_nyeri));
                    $('#riwayat-assesment-anak-nyeri #lokasi_nyeri').text(response.data.lokasi_nyeri);
                    $('#riwayat-assesment-anak-nyeri #detail_skala_nyeri').text(response.data.detail_skala_nyeri);
                    $('#riwayat-assesment-anak-nyeri #durasi_nyeri').text(response.data.durasi_nyeri);
                    $('#riwayat-assesment-anak-nyeri #frekuensi_nyeri').text(response.data.frekuensi_nyeri);
                    $('#riwayat-assesment-anak-nyeri #pencetus_nyeri').text(response.data.pencetus_nyeri);
                    $('#riwayat-assesment-anak-nyeri #tipe_nyeri').text(response.data.tipe_nyeri);
                    $('#riwayat-assesment-anak-nyeri #menjalar_ket').text(response.data.menjalar_ket);
                    $('#riwayat-assesment-anak-nyeri #ekspresi_wajah').text(response.data.ekspresi_wajah);
                    $('#riwayat-assesment-anak-nyeri #skala_flacc').text(yaTidakParser(response.data.skala_flacc));
                    $('#riwayat-assesment-anak-nyeri #wajah').text(response.data.wajah);
                    $('#riwayat-assesment-anak-nyeri #ekstremitas').text(response.data.ekstremitas);
                    $('#riwayat-assesment-anak-nyeri #gerakan').text(response.data.gerakan);
                    $('#riwayat-assesment-anak-nyeri #menangis').text(response.data.menangis);
                    $('#riwayat-assesment-anak-nyeri #ketenangan').text(response.data.ketenangan);
                    $('#riwayat-assesment-anak-nyeri #total_skor_flacc').text(response.data.total_skor_flacc);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    function getAssesmentObgyn(){
        $.ajax({
            url: '{{ route('perawat.assesment-obgyn') }}',
            type: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                // console.log(response);
                if(response.status){
                    $('#tgl-assesment').text(response.data.created_at);
                    $('#riwayat-assesment-obgyn #alergi').text(response.data.alergi);
                    $('#riwayat-assesment-obgyn #alergi_obat').text(response.data.alergi_obat);
                    $('#riwayat-assesment-obgyn #bentuk_reaksi_obat').text(response.data.bentuk_reaksi_obat);
                    $('#riwayat-assesment-obgyn #alergi_makanan').text(response.data.alergi_makanan);
                    $('#riwayat-assesment-obgyn #bentuk_reaksi_makanan').text(response.data.bentuk_reaksi_makanan);
                    $('#riwayat-assesment-obgyn #alergi_lainnya').text(response.data.alergi_lainnya);
                    $('#riwayat-assesment-obgyn #bentuk_reaksi_lainnya').text(response.data.bentuk_reaksi_lainnya);
                    $('#riwayat-assesment-obgyn #kesadaran').text(response.data.kesadaran);
                    $('#riwayat-assesment-obgyn #kondisi_umum').text(response.data.kondisi_umum);
                    $('#riwayat-assesment-obgyn #kondisi_umum_lainnya_text').text(response.data.kondisi_umum_lainnya_text);
                    $('#riwayat-assesment-obgyn #tekanan_darah').text(response.data.tekanan_darah);
                    $('#riwayat-assesment-obgyn #nadi').text(response.data.nadi);
                    $('#riwayat-assesment-obgyn #suhu').text(response.data.suhu);
                    $('#riwayat-assesment-obgyn #pernafasan').text(response.data.pernafasan);
                    $('#riwayat-assesment-obgyn #tinggi_badan').text(response.data.tinggi_badan);
                    $('#riwayat-assesment-obgyn #berat_badan').text(response.data.berat_badan);
                    $('#riwayat-assesment-obgyn #kebutuhan_khusus').text(response.data.kebutuhan_khusus);
                    $('#riwayat-assesment-obgyn #kebutuhan_khusus_lainnya_text').text(response.data.kebutuhan_khusus_lainnya_text);

                    $('#riwayat-assesment-obgyn #status_emosional').text(response.data.status_emosional);
                    $('#riwayat-assesment-obgyn #status_emosional_text').text(response.data.status_emosional_text);
                    $('#riwayat-assesment-obgyn #merokok').text(response.data.merokok);
                    $('#riwayat-assesment-obgyn #frekuensi_merokok').text(response.data.frekuensi_merokok);
                    $('#riwayat-assesment-obgyn #minuman_alkohol').text(response.data.minuman_alkohol);
                    $('#riwayat-assesment-obgyn #riwayat_gangguan_jiwa').text(response.data.riwayat_gangguan_jiwa);

                    $('#riwayat-assesment-obgyn #sex').text(response.data.sex);
                    $('#riwayat-assesment-obgyn #age').text(response.data.age);
                    $('#riwayat-assesment-obgyn #depresi').text(response.data.depresi);
                    $('#riwayat-assesment-obgyn #suicide').text(response.data.suicide);
                    $('#riwayat-assesment-obgyn #alcohol').text(response.data.alcohol);
                    $('#riwayat-assesment-obgyn #thinking_loss').text(response.data.thinking_loss);
                    $('#riwayat-assesment-obgyn #separated').text(response.data.separated);
                    $('#riwayat-assesment-obgyn #organized_plan').text(response.data.organized_plan);
                    $('#riwayat-assesment-obgyn #no_support').text(response.data.no_support);
                    $('#riwayat-assesment-obgyn #sickness').text(response.data.sickness);
                    $('#riwayat-assesment-obgyn #skor_sad_person').text(response.data.skor_sad_person);
                    $('#riwayat-assesment-obgyn #kategori_sad_person').text(response.data.kategori_sad_person);

                    $('#riwayat-assesment-obgyn #riwayat_bunuh_diri').text(response.data.riwayat_bunuh_diri);
                    $('#riwayat-assesment-obgyn #riwayat_bunuh_diri_text').text(response.data.riwayat_bunuh_diri_text);
                    $('#riwayat-assesment-obgyn #riwayat_trauma_psikis').text(response.data.riwayat_trauma_psikis);
                    $('#riwayat-assesment-obgyn #riwayat_trauma_psikis_detail').text(response.data.riwayat_trauma_psikis_detail);
                    $('#riwayat-assesment-obgyn #riwayat_trauma_psikis_detail_kriminal_text').text(response.data.riwayat_trauma_psikis_detail_kriminal_text);
                    $('#riwayat-assesment-obgyn #riwayat_trauma_psikis_detail_lain_text').text(response.data.riwayat_trauma_psikis_detail_lain_text);
                    $('#riwayat-assesment-obgyn #hambatan_sosial_ekonomi').text(response.data.hambatan_sosial_ekonomi);
                    $('#riwayat-assesment-obgyn #konseling_spiritual').text(response.data.konseling_spiritual);
                    $('#riwayat-assesment-obgyn #konseling_spiritual_text').text(response.data.konseling_spiritual_text);
                    $('#riwayat-assesment-obgyn #bantuan_ibadah').text(response.data.bantuan_ibadah);
                    $('#riwayat-assesment-obgyn #bantuan_ibadah_text').text(response.data.bantuan_ibadah_text);

                    $('#riwayat-assesment-obgyn #umur_menarche').text(response.data.umur_menarche);
                    $('#riwayat-assesment-obgyn #lamanya_haid').text(response.data.lamanya_haid);
                    $('#riwayat-assesment-obgyn #jumlah_darah_haid').text(response.data.jumlah_darah_haid);
                    $('#riwayat-assesment-obgyn #hpht').text(response.data.hpht);
                    $('#riwayat-assesment-obgyn #tp').text(response.data.tp);
                    $('#riwayat-assesment-obgyn #gangguan_haid').text(response.data.gangguan_haid);
                    $('#riwayat-assesment-obgyn #gangguan_haid_text').text(response.data.gangguan_haid_text);
                    $('#riwayat-assesment-obgyn #status_kawin').text(response.data.status_kawin);
                    $('#riwayat-assesment-obgyn #usia_perkawinan').text(response.data.usia_perkawinan);
                    $('#riwayat-assesment-obgyn #jumlah_perkawinan').text(response.data.jumlah_perkawinan);

                    $('#riwayat-kehamilan-obgyn #tgl_tahun_partus').text(response.data.tgl_tahun_partus);
                    $('#riwayat-kehamilan-obgyn #tempat_partus').text(response.data.tempat_partus);
                    $('#riwayat-kehamilan-obgyn #umur_hamil').text(response.data.umur_hamil);
                    $('#riwayat-kehamilan-obgyn #jenis_persalinan').text(response.data.jenis_persalinan);
                    $('#riwayat-kehamilan-obgyn #penolong_persalinan').text(response.data.penolong_persalinan);
                    $('#riwayat-kehamilan-obgyn #penyulit').text(response.data.penyulit);
                    $('#riwayat-kehamilan-obgyn #bb_anak').text(response.data.bb_anak);
                    $('#riwayat-kehamilan-obgyn #keadaan_sekarang').text(response.data.keadaan_sekarang);

                    $('#riwayat-gizi-obgyn #asupan_makan').text(response.data.asupan_makan);
                    $('#riwayat-gizi-obgyn #gangguan_metabolisme').text(response.data.gangguan_metabolisme);
                    $('#riwayat-gizi-obgyn #pertambahan_bb').text(response.data.pertambahan_bb);
                    $('#riwayat-gizi-obgyn #nilai_hb').text(response.data.nilai_hb);
                    $('#riwayat-gizi-obgyn #total_skor_gizi_obgyn').text(response.data.total_skor_gizi_obgyn);
                    $('#riwayat-gizi-obgyn #kategori_gizi').text(response.data.kategori_gizi);

                    $('#riwayat-nyeri-obgyn #nyeri_skala').text(response.data.nyeri_skala);
                    $('#riwayat-nyeri-obgyn #skala_wong_baker').text(response.data.skala_wong_baker);
                    $('#riwayat-nyeri-obgyn #onset').text(response.data.onset);
                    $('#riwayat-nyeri-obgyn #pencetus_nyeri').text(response.data.pencetus_nyeri);
                    $('#riwayat-nyeri-obgyn #tipe_nyeri').text(response.data.tipe_nyeri);
                    $('#riwayat-nyeri-obgyn #menjalar').text(response.data.menjalar);
                    $('#riwayat-nyeri-obgyn #skala_nyeri').text(response.data.skala_nyeri);
                    $('#riwayat-nyeri-obgyn #treatment').text(response.data.treatment);
                    $('#riwayat-nyeri-obgyn #understanding').text(response.data.understanding);
                    $('#riwayat-nyeri-obgyn #value').text(response.data.value);
                    $('#riwayat-nyeri-obgyn #bps').text(response.data.bps);
                    $('#riwayat-nyeri-obgyn #ekspresi_wajah').text(response.data.ekspresi_wajah);
                    $('#riwayat-nyeri-obgyn #ekstremitas_atas').text(response.data.ekstremitas_atas);
                    $('#riwayat-nyeri-obgyn #compliance_ventilator').text(response.data.compliance_ventilator);
                    $('#riwayat-nyeri-obgyn #skor_total_bps').text(response.data.skor_total_bps);

                    $('#riwayat-fungsional-obgyn #bab').text(response.data.bab);
                    $('#riwayat-fungsional-obgyn #bak').text(response.data.bak);
                    $('#riwayat-fungsional-obgyn #membersihkan_diri').text(response.data.membersihkan_diri);
                    $('#riwayat-fungsional-obgyn #wc').text(response.data.wc);
                    $('#riwayat-fungsional-obgyn #makan_minum').text(response.data.makan_minum);
                    $('#riwayat-fungsional-obgyn #bergerak').text(response.data.bergerak);
                    $('#riwayat-fungsional-obgyn #berjalan').text(response.data.berjalan);
                    $('#riwayat-fungsional-obgyn #berpakaian').text(response.data.berpakaian);
                    $('#riwayat-fungsional-obgyn #tangga').text(response.data.tangga);
                    $('#riwayat-fungsional-obgyn #mandi').text(response.data.mandi);
                    $('#riwayat-fungsional-obgyn #total_skor_adl').text(response.data.total_skor_adl);
                    $('#riwayat-fungsional-obgyn #nilai_aks').text(response.data.nilai_aks);
                    $('#riwayat-fungsional-obgyn #kategori_perawatan').text(response.data.kategori_perawatan);

                    $('#riwayat-kulit-obgyn #persepsi_sensori').text(response.data.persepsi_sensori);
                    $('#riwayat-kulit-obgyn #kelembaban').text(response.data.kelembaban);
                    $('#riwayat-kulit-obgyn #aktivitas').text(response.data.aktivitas);
                    $('#riwayat-kulit-obgyn #mobilitas').text(response.data.mobilitas);
                    $('#riwayat-kulit-obgyn #nutrisi').text(response.data.nutrisi);
                    $('#riwayat-kulit-obgyn #friksi_gesekan').text(response.data.friksi_gesekan);
                    $('#riwayat-kulit-obgyn #total_parameter').text(response.data.total_parameter);
                    $('#riwayat-kulit-obgyn #skor_braden').text(response.data.skor_braden);
                    $('#riwayat-kulit-obgyn #resiko_braden').text(response.data.resiko_braden);
                    $('#riwayat-kulit-obgyn #terdapat_luka').text(response.data.terdapat_luka);
                    $('#riwayat-kulit-obgyn #lokasi_luka').attr('src',response.data.lokasi_luka);

                    $('#riwayat-kulit-obgyn #rentang_gerak').text(response.data.rentang_gerak);
                    $('#riwayat-kulit-obgyn #deformitas').text(response.data.deformitas);
                    $('#riwayat-kulit-obgyn #deformitas_text').text(response.data.deformitas_text);
                    $('#riwayat-kulit-obgyn #gangguan_tidur').text(response.data.gangguan_tidur);
                    $('#riwayat-kulit-obgyn #gangguan_tidur_text').text(response.data.gangguan_tidur_text);
                    $('#riwayat-kulit-obgyn #keluhan_nutrisi').text(response.data.keluhan_nutrisi);
                    $('#riwayat-kulit-obgyn #rasa_haus_berlebih').text(response.data.rasa_haus_berlebih);
                    $('#riwayat-kulit-obgyn #mukosa_mulut').text(response.data.mukosa_mulut);
                    $('#riwayat-kulit-obgyn #turgor_kulit').text(response.data.turgor_kulit);
                    $('#riwayat-kulit-obgyn #endema').text(response.data.endema);
                    $('#riwayat-kulit-obgyn #frekuensi_bab').text(response.data.frekuensi_bab);
                    $('#riwayat-kulit-obgyn #keluhan_bab').text(response.data.keluhan_bab);
                    $('#riwayat-kulit-obgyn #keluhan_bab_text').text(response.data.keluhan_bab_text);
                    $('#riwayat-kulit-obgyn #karakteristik_feces').text(response.data.karakteristik_feces);
                    $('#riwayat-kulit-obgyn #warna_feces').text(response.data.warna_feces);
                    $('#riwayat-kulit-obgyn #frekuensi_bak').text(response.data.frekuensi_bak);
                    $('#riwayat-kulit-obgyn #jumlah_bak').text(response.data.jumlah_bak);
                    $('#riwayat-kulit-obgyn #warna_urin').text(response.data.warna_urin);
                    $('#riwayat-kulit-obgyn #keluhan_bak').text(response.data.keluhan_bak);
                    $('#riwayat-kulit-obgyn #keluhan_bak_lainnya').text(response.data.keluhan_bak_lainnya);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    function getAssesmentDewasa(){
        $.ajax({
            url: '{{ route('perawat.assesment-dewasa') }}',
            type: 'GET',
            data: {
                reg_no: regno,
            },
            success: function(response) {
                // console.log(response);
                if(response.status){
                    $('#tgl-assesment').text(response.data.created_at);
                    $('#riwayat-assesment-dewasa #age').text(response.data.age);
                    $('#riwayat-assesment-dewasa #alcohol').text(response.data.alcohol);
                    $('#riwayat-assesment-dewasa #alergi').text(response.data.alergi);                    
                    $('#riwayat-assesment-dewasa #alergi_lainnya').text(response.data.alergi_lainnya);
                    $('#riwayat-assesment-dewasa #alergi_makanan').text(response.data.alergi_makanan);
                    $('#riwayat-assesment-dewasa #alergi_obat').text(response.data.alergi_obat);
                    $('#riwayat-assesment-dewasa #bab').text(response.data.bab);
                    $('#riwayat-assesment-dewasa #bak').text(response.data.bak);
                    $('#riwayat-assesment-dewasa #bantuan_ibadah').text(response.data.bantuan_ibadah);
                    $('#riwayat-assesment-dewasa #bantuan_ibadah_text').text(response.data.bantuan_ibadah_text);
                    $('#riwayat-assesment-dewasa #bentuk_reaksi_lainnya').text(response.data.bentuk_reaksi_lainnya);
                    $('#riwayat-assesment-dewasa #bentuk_reaksi_makanan').text(response.data.bentuk_reaksi_makanan);
                    $('#riwayat-assesment-dewasa #bentuk_reaksi_obat').text(response.data.bentuk_reaksi_obat);
                    $('#riwayat-assesment-dewasa #berat_badan').text(response.data.berat_badan);
                    $('#riwayat-assesment-dewasa #bergerak').text(response.data.bergerak);
                    $('#riwayat-assesment-dewasa #berjalan').text(response.data.berjalan);
                    $('#riwayat-assesment-dewasa #berpakaian').text(response.data.berpakaian);
                    $('#riwayat-assesment-dewasa #deformitas').text(response.data.deformitas);
                    $('#riwayat-assesment-dewasa #deformitas_text').text(response.data.deformitas_text);
                    $('#riwayat-assesment-dewasa #depresi').text(response.data.depresi);
                    $('#riwayat-assesment-dewasa #diberitahukan_jam').text(response.data.diberitahukan_jam);
                    $('#riwayat-assesment-dewasa #diberitahukan_kpd').text(response.data.diberitahukan_kpd);
                    $('#riwayat-assesment-dewasa #diberitahukan_status').text(response.data.diberitahukan_status);
                    $('#riwayat-assesment-dewasa #endema').text(response.data.endema);
                    $('#riwayat-assesment-dewasa #frekuensi_bab').text(response.data.frekuensi_bab);
                    $('#riwayat-assesment-dewasa #frekuensi_bak').text(response.data.frekuensi_bak);
                    $('#riwayat-assesment-dewasa #frekuensi_merokok').text(response.data.frekuensi_merokok);
                    $('#riwayat-assesment-dewasa #gangguan_tidur').text(response.data.gangguan_tidur);
                    $('#riwayat-assesment-dewasa #gangguan_tidur_text').text(response.data.gangguan_tidur_text);
                    $('#riwayat-assesment-dewasa #hambatan_sosial_ekonomi').text(response.data.hambatan_sosial_ekonomi);
                    $('#riwayat-assesment-dewasa #jumlah_bak').text(response.data.jumlah_bak);
                    $('#riwayat-assesment-dewasa #karakteristik_feces').text(response.data.karakteristik_feces);
                    $('#riwayat-assesment-dewasa #kategori_perawatan').text(response.data.kategori_perawatan);
                    $('#riwayat-assesment-dewasa #kategori_sad_person').text(response.data.kategori_sad_person);
                    $('#riwayat-assesment-dewasa #kebutuhan_khusus').text(response.data.kebutuhan_khusus);
                    $('#riwayat-assesment-dewasa #kebutuhan_khusus_lainnya_text').text(response.data.kebutuhan_khusus_lainnya_text);
                    $('#riwayat-assesment-dewasa #keluhan_bab').text(response.data.keluhan_bab);
                    $('#riwayat-assesment-dewasa #keluhan_bab_text').text(response.data.keluhan_bab_text);
                    $('#riwayat-assesment-dewasa #keluhan_bak').text(response.data.keluhan_bak);
                    $('#riwayat-assesment-dewasa #keluhan_bak_lainnya').text(response.data.keluhan_bak_lainnya);
                    $('#riwayat-assesment-dewasa #keluhan_nutrisi').text(response.data.keluhan_nutrisi);
                    $('#riwayat-assesment-dewasa #kesadaran').text(response.data.kesadaran);
                    $('#riwayat-assesment-dewasa #kondisi_umum').text(response.data.kondisi_umum);
                    $('#riwayat-assesment-dewasa #kondisi_umum_lainnya_text').text(response.data.kondisi_umum_lainnya_text);
                    $('#riwayat-assesment-dewasa #konseling_spiritual').text(response.data.konseling_spiritual);
                    $('#riwayat-assesment-dewasa #konseling_spiritual_text').text(response.data.konseling_spiritual_text);
                    $('#riwayat-assesment-dewasa #makan_minum').text(response.data.makan_minum);
                    $('#riwayat-assesment-dewasa #mandi').text(response.data.mandi);
                    $('#riwayat-assesment-dewasa #membersihkan_diri').text(response.data.membersihkan_diri);
                    $('#riwayat-assesment-dewasa #merokok').text(response.data.merokok);
                    $('#riwayat-assesment-dewasa #minuman_alkohol').text(response.data.minuman_alkohol);
                    $('#riwayat-assesment-dewasa #mukosa_mulut').text(response.data.mukosa_mulut);
                    $('#riwayat-assesment-dewasa #nadi').text(response.data.nadi);
                    $('#riwayat-assesment-dewasa #nilai_aks').text(response.data.nilai_aks);
                    $('#riwayat-assesment-dewasa #no_support').text(response.data.no_support);
                    $('#riwayat-assesment-dewasa #organized_plan').text(response.data.organized_plan);
                    $('#riwayat-assesment-dewasa #pekerjaan').text(response.data.pekerjaan);
                    $('#riwayat-assesment-dewasa #pernafasan').text(response.data.pernafasan);
                    $('#riwayat-assesment-dewasa #rasa_haus_berlebih').text(response.data.rasa_haus_berlebih);
                    $('#riwayat-assesment-dewasa #rentang_gerak').text(response.data.rentang_gerak);
                    $('#riwayat-assesment-dewasa #riwayat_bunuh_diri').text(response.data.riwayat_bunuh_diri);
                    $('#riwayat-assesment-dewasa #riwayat_bunuh_diri_text').text(response.data.riwayat_bunuh_diri_text);
                    $('#riwayat-assesment-dewasa #riwayat_gangguan_jiwa').text(response.data.riwayat_gangguan_jiwa);
                    $('#riwayat-assesment-dewasa #riwayat_trauma_psikis').text(response.data.riwayat_trauma_psikis);
                    $('#riwayat-assesment-dewasa #riwayat_trauma_psikis_detail').text(response.data.riwayat_trauma_psikis_detail);
                    $('#riwayat-assesment-dewasa #riwayat_trauma_psikis_detail_kriminal_text').text(response.data.riwayat_trauma_psikis_detail_kriminal_text);
                    $('#riwayat-assesment-dewasa #riwayat_trauma_psikis_detail_lain_text').text(response.data.riwayat_trauma_psikis_detail_lain_text);
                    $('#riwayat-assesment-dewasa #separated').text(response.data.separated);
                    $('#riwayat-assesment-dewasa #sex').text(response.data.sex);
                    $('#riwayat-assesment-dewasa #sickness').text(response.data.sickness);
                    $('#riwayat-assesment-dewasa #skor_sad_person').text(response.data.skor_sad_person);
                    $('#riwayat-assesment-dewasa #status_emosional').text(response.data.status_emosional);
                    $('#riwayat-assesment-dewasa #status_emosional_text').text(response.data.status_emosional_text);
                    $('#riwayat-assesment-dewasa #suhu').text(response.data.suhu);
                    $('#riwayat-assesment-dewasa #suicide').text(response.data.suicide);
                    $('#riwayat-assesment-dewasa #tangga').text(response.data.tangga);
                    $('#riwayat-assesment-dewasa #tekanan_darah').text(response.data.tekanan_darah);
                    $('#riwayat-assesment-dewasa #thinking_loss').text(response.data.thinking_loss);
                    $('#riwayat-assesment-dewasa #tinggi_badan').text(response.data.tinggi_badan);
                    $('#riwayat-assesment-dewasa #total_skor_adl').text(response.data.total_skor_adl);
                    $('#riwayat-assesment-dewasa #turgor_kulit').text(response.data.turgor_kulit);
                    $('#riwayat-assesment-dewasa #warna_feces').text(response.data.warna_feces);
                    $('#riwayat-assesment-dewasa #warna_urin').text(response.data.warna_urin);
                    $('#riwayat-assesment-dewasa #wc').text(response.data.wc);

                    $('#riwayat-assesment-dewasa-nyeri #nyeri_skala').text(response.data.nyeri_skala);
                    $('#riwayat-assesment-dewasa-nyeri #skala_wong_baker').text(response.data.skala_wong_baker);
                    $('#riwayat-assesment-dewasa-nyeri #onset').text(response.data.onset);
                    $('#riwayat-assesment-dewasa-nyeri #pencetus_nyeri').text(response.data.pencetus_nyeri);
                    $('#riwayat-assesment-dewasa-nyeri #tipe_nyeri').text(response.data.tipe_nyeri);
                    $('#riwayat-assesment-dewasa-nyeri #menjalar').text(response.data.menjalar);
                    $('#riwayat-assesment-dewasa-nyeri #skala_nyeri').text(response.data.skala_nyeri);
                    $('#riwayat-assesment-dewasa-nyeri #treatment').text(response.data.treatment);
                    $('#riwayat-assesment-dewasa-nyeri #understanding').text(response.data.understanding);
                    $('#riwayat-assesment-dewasa-nyeri #value').text(response.data.value);
                    $('#riwayat-assesment-dewasa-nyeri #bps').text(response.data.bps);
                    $('#riwayat-assesment-dewasa-nyeri #ekspresi_wajah').text(response.data.ekspresi_wajah);
                    $('#riwayat-assesment-dewasa-nyeri #ekstremitas_atas').text(response.data.ekstremitas_atas);
                    $('#riwayat-assesment-dewasa-nyeri #compliance_ventilator').text(response.data.compliance_ventilator);
                    $('#riwayat-assesment-dewasa-nyeri #skor_total_bps').text(response.data.skor_total_bps);

                    if(response.data.penurunan_bb || response.data.penurunan_bb_jumlah) {
                        $('#riwayat-assesment-dewasa-gizi #penurunan_bb').text(response.data.penurunan_bb ? response.data.penurunan_bb : '');
                        $('#riwayat-assesment-dewasa-gizi #penurunan_bb_jumlah').text(response.data.penurunan_bb_jumlah ? response.data.penurunan_bb_jumlah : '');
                    }
                    $('#riwayat-assesment-dewasa-gizi #asupan_makan').text(response.data.asupan_makan);
                    $('#riwayat-assesment-dewasa-gizi #diagnosis_khusus').text(response.data.diagnosis_khusus);
                    $('#riwayat-assesment-dewasa-gizi #total_skor_gizi').text(response.data.total_skor_gizi);
                    $('#riwayat-assesment-dewasa-gizi #kategori_gizi').text(response.data.kategori_gizi);
                } else {
                    console.error('Gagal mengambil data');
                }
            }
        });

    }

    function loadAllFunctionRiwayat(){
        if(kategori_pasien === 'dewasa'){
            getAssesmentDewasa();
        } else if(kategori_pasien === 'kebidanan'){
            getAssesmentObgyn();
        } else if(kategori_pasien === 'anak'){
            getAssesmentAnak();
        } else if(kategori_pasien === 'bayi'){
            getAssesmentNeonatus();
        }

        $('#riwayat-edukasi-pasien-tab').on('click', function() {
            getEdukasiPasien();
        });

        $('#riwayat-rekonsiliasi-obat-tab').on('click', function() {
            getRekonObat();
        });

        $('#riwayat-checklist-orientasi-tab').on('click', function() {
            getChecklistOrientasi();
        });

        $('#riwayat-resiko-jatuh-tab').on('click', function() {
            getResikoJatuhMorse();
            getResikoJatuhHumpty();
            getResikoJatuhGeriatri();
            getResikoJatuhNeonatus();
        });

        $('#riwayat-nurse-note-tab').on('click', function() {
            getNurseNote();
        });

        $('#riwayat-monitoring-news-tab').on('click', function() {
            loadDatatableMoniNews();
        });

        $('#riwayat-fluid-balance-tab').on('click', function() {
            getRiwayatFluidBalance();
        });

        $('#riwayat-transfusi-darah-tab').on('click', function() {
            getMonitoringTransfusiDarah();
        });

        $('#riwayat-persetujuan-tab').on('click', function() {
            getPersetujuanTindakanMedis();
        });

        $('#riwayat-case-manager-tab').on('click', function() {
            getCaseManager();
        });

        $('#riwayat-tf-internal-tab').on('click', function() {
            loadDtRiwayatTfInternal();
            getPersiapanPasienTI();
            getSerahTerimaTI();
        });

        $('#riwayat_transfer_tab').on('click', function() {
            loadDtRiwayatTfInternal();
        });

        $('#alat_terpasang_tab').on('click', function() {
            loadDtRiwayatTiAlat();
        });

        $('#obat_cairan_tab').on('click', function() {
            loadDtRiwayatTiObat();
        });

        $('#status_pasien_tab').on('click', function() {
            loadDtRiwayatTiStatus();
        });

        $('#serah_terima_tab').on('click', function() {
            loadDtRiwayatTiDiagnostik();
        });
    }
</script>