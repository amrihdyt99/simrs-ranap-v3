$(document).ready(function () {
    let urlOrigin = window.location.origin;
    let domUrl = "";
    // check if urlOrigin is from rsud.sumselprov.go.id
    if (urlOrigin == "https://rsud.sumselprov.go.id")
        domUrl = urlOrigin + "/simrs_ranap/nyx-sistem/select2/m-paramedic";
    else domUrl = urlOrigin + "/nyx-sistem/select2/m-paramedic";
    triggerGetSuratRujukanDokter();

    neko_select2_init_data(domUrl, "ParamedicCodeRujukan", {
        placeholder: "Pilih Dokter",
    });

    var currentUserName = "{{auth()->user()->id}}";

    init_SuratRujukan();

    function simpanRujukanPersiapanPasien() {
        neko_proses();
        $.ajax({
            url: "{{route('add.RujukanPersiapanPasien')}}",
            type: "POST",
            data:
                $("#rujukan_persiapan_pasien").serialize() +
                "&reg_no=" +
                regno +
                "&medrec=" +
                medrec,
            success: function (data) {
                neko_simpan_success();
                $(".left-tab.active").click();
            },
            error: function (data) {
                neko_simpan_error_noreq();
            },
        });
    }

    function simpanRujukanSerahTerima() {
        neko_proses();
        $.ajax({
            url: "{{route('add.RujukanSerahTerima')}}",
            type: "POST",
            data:
                $("#RujukanSerahTerima").serialize() +
                "&reg_no=" +
                regno +
                "&medrec=" +
                medrec,
            success: function (data) {
                neko_simpan_success();
                // $('.left-tab.active').click();
            },
            error: function (data) {
                neko_simpan_error_noreq();
            },
        });
    }

    function getSuratRujukanDokter() {
        $.ajax({
            url: $dom + "/api/dokter/surat-rujukan-dokter",
            method: "GET",
            data: {
                reg_no: regno,
                medrec: medrec,
            },
            success: function (response) {
                console.log(response);
                if (response.status && response.data) {
                    let informasi = response.data.surat_rujukan || {};

                    $("input[name='kode_surat_rujukan']").val(
                        informasi.kode_surat_rujukan || ""
                    );

                    $("input[name='rujukan_rs_asal']").val(
                        informasi.rujukan_rs_asal || ""
                    );
                    $("input[name='rujukan_pemberi_informasi']").val(
                        informasi.rujukan_pemberi_informasi || ""
                    );
                    $("#ParamedicCodeRujukan").val(informasi.ParamedicCode).trigger('change');
                    if (informasi.ParamedicCode) {
                        var $option = $('<option selected>').val(informasi.ParamedicCode).text(informasi.ParamedicName);
                        $("#ParamedicCodeRujukan").append($option).trigger('change');
                    }
                    $("input[name='rujukan_rs_tujuan']").val(
                        informasi.rujukan_rs_tujuan || ""
                    );
                    $("input[name='rujukan_penerima_informasi']").val(
                        informasi.rujukan_penerima_informasi || ""
                    );
                    $("input[name='rujukan_nama_petugas']").val(
                        informasi.rujukan_nama_petugas || ""
                    );

                    $("input[name='rujukan_hubungi_tanggal']").val(
                        informasi.rujukan_hubungi_tanggal || ""
                    );
                    const jamHub = informasi.rujukan_hubungi_jam;
                    const jamHubFormatted = jamHub
                        ? jamHub.substring(0, 5)
                        : "";

                    $("input[name='rujukan_hubungi_jam']").val(jamHubFormatted);

                    $("textarea[name='rujukan_alasan_transfer']").val(
                        informasi.rujukan_alasan_transfer || ""
                    );

                    $("input[name='rujukan_transfer_tanggal']").val(
                        informasi.rujukan_transfer_tanggal || ""
                    );
                    const jamTrans = informasi.rujukan_transfer_jam;
                    const jamTransFormatted = jamTrans
                        ? jamTrans.substring(0, 5)
                        : "";
                    $("input[name='rujukan_transfer_jam']").val(
                        jamTransFormatted
                    );

                    if (informasi.rujukan_kategori) {
                        $(
                            "input[name='rujukan_kategori'][value='" +
                                informasi.rujukan_kategori +
                                "']"
                        ).prop("checked", true);
                    }

                    $("input[name='rujukan_transportasi']").val(
                        informasi.rujukan_transportasi || ""
                    );

                    $("input[name='rujukan_ringkasan_tanggal']").val(
                        informasi.rujukan_ringkasan_tanggal || ""
                    );
                    const jamKondisi = informasi.rujukan_ringkasan_jam;
                    const jamKondisiFormatted = jamKondisi
                        ? jamKondisi.substring(0, 5)
                        : "";
                    $("input[name='rujukan_ringkasan_jam']").val(
                        jamKondisiFormatted
                    );

                    $("input[name='rujukan_keluhan']").val(
                        informasi.rujukan_keluhan || ""
                    );

                    if (informasi.rujukan_alergi) {
                        $(
                            "input[name='rujukan_alergi'][value='" +
                                informasi.rujukan_alergi +
                                "']"
                        ).prop("checked", true);
                    }
                    if (informasi.rujukan_kewaspaan) {
                        $(
                            "input[name='rujukan_kewaspaan'][value='" +
                                informasi.rujukan_kewaspaan +
                                "']"
                        ).prop("checked", true);
                    }

                    $("input[name='rujukan_gcs_e']").val(
                        informasi.rujukan_gcs_e || ""
                    );
                    $("input[name='rujukan_gcs_m']").val(
                        informasi.rujukan_gcs_m || ""
                    );
                    $("input[name='rujukan_gcs_v']").val(
                        informasi.rujukan_gcs_v || ""
                    );
                    $("input[name='rujukan_td']").val(
                        informasi.rujukan_td || ""
                    );
                    $("input[name='rujukan_N']").val(informasi.rujukan_N || "");
                    $("input[name='rujukan_skala_nyeri']").val(
                        informasi.rujukan_skala_nyeri || ""
                    );
                    $("input[name='rujukan_suhu']").val(
                        informasi.rujukan_suhu || ""
                    );
                    $("input[name='rujukan_p']").val(informasi.rujukan_p || "");
                    $("input[name='rujukan_spo2']").val(
                        informasi.rujukan_spo2 || ""
                    );

                    if (informasi.ParamedicCode) {
                        $("#ParamedicCode")
                            .val(informasi.ParamedicCode)
                            .trigger("change");
                    }

                    $("input[name='rujukan_terima_tanggal']").val(
                        informasi.rujukan_terima_tanggal || ""
                    );
                    $("input[name='rujukan_terima_jam']").val(
                        informasi.rujukan_terima_jam || ""
                    );
                    $("input[name='rujukan_terima_kondisi']").val(
                        informasi.rujukan_terima_kondisi || ""
                    );
                    $("input[name='rujukan_terima_gcs_e']").val(
                        informasi.rujukan_terima_gcs_e || ""
                    );
                    $("input[name='rujukan_terima_gcs_m']").val(
                        informasi.rujukan_terima_gcs_m || ""
                    );
                    $("input[name='rujukan_terima_gcs_v']").val(
                        informasi.rujukan_terima_gcs_v || ""
                    );
                    $("input[name='rujukan_terima_td']").val(
                        informasi.rujukan_terima_td || ""
                    );
                    $("input[name='rujukan_terima_n']").val(
                        informasi.rujukan_terima_n || ""
                    );
                    $("input[name='rujukan_terima_suhu']").val(
                        informasi.rujukan_terima_suhu || ""
                    );
                    $("input[name='rujukan_terima_p']").val(
                        informasi.rujukan_terima_p || ""
                    );
                    $("input[name='rujukan_terima_sp02']").val(
                        informasi.rujukan_terima_sp02 || ""
                    );
                    $("input[name='rujukan_terima_skala_nyeri']").val(
                        informasi.rujukan_terima_skala_nyeri || ""
                    );
                    $("input[name='rujukan_terima_lab']").val(
                        informasi.rujukan_terima_lab || ""
                    );
                    $("input[name='rujukan_terima_xray']").val(
                        informasi.rujukan_terima_xray || ""
                    );
                    $("input[name='rujukan_terima_mri']").val(
                        informasi.rujukan_terima_mri || ""
                    );
                    $("input[name='rujukan_terima_ct_scan']").val(
                        informasi.rujukan_terima_ct_scan || ""
                    );
                    $("input[name='rujukan_terima_ekg']").val(
                        informasi.rujukan_terima_ekg || ""
                    );
                    $("input[name='rujukan_terima_echo']").val(
                        informasi.rujukan_terima_echo || ""
                    );

                    // console.log("Data Serah Terima Pasien:", response.data.surat_rujukan_terima);

                    let serahTerima = response.data.surat_rujukan_terima;
                    if (serahTerima) {
                        $("input[name='rujukan_terima_tanggal']").val(
                            serahTerima.rujukan_terima_tanggal || ""
                        );
                        const jamSQL = serahTerima.rujukan_terima_jam;
                        const jamFormatted = jamSQL
                            ? jamSQL.substring(0, 5)
                            : "";

                        $("input[name='rujukan_terima_jam']").val(jamFormatted);
                        // $("input[name='rujukan_terima_jam']").val(str || "");
                        $("input[name='rujukan_terima_kondisi']").val(
                            serahTerima.rujukan_terima_kondisi || ""
                        );
                        $("input[name='rujukan_terima_gcs_e']").val(
                            serahTerima.rujukan_terima_gcs_e || ""
                        );
                        $("input[name='rujukan_terima_gcs_m']").val(
                            serahTerima.rujukan_terima_gcs_m || ""
                        );
                        $("input[name='rujukan_terima_gcs_v']").val(
                            serahTerima.rujukan_terima_gcs_v || ""
                        );
                        $("input[name='rujukan_terima_td']").val(
                            serahTerima.rujukan_terima_td || ""
                        );
                        $("input[name='rujukan_terima_n']").val(
                            serahTerima.rujukan_terima_n || ""
                        );
                        $("input[name='rujukan_terima_suhu']").val(
                            serahTerima.rujukan_terima_suhu || ""
                        );
                        $("input[name='rujukan_terima_p']").val(
                            serahTerima.rujukan_terima_p || ""
                        );
                        $("input[name='rujukan_terima_sp02']").val(
                            serahTerima.rujukan_terima_sp02 || ""
                        );
                        $("input[name='rujukan_terima_skala_nyeri']").val(
                            serahTerima.rujukan_terima_skala_nyeri || ""
                        );
                        $("input[name='rujukan_terima_lab']").val(
                            serahTerima.rujukan_terima_lab || ""
                        );
                        $("input[name='rujukan_terima_xray']").val(
                            serahTerima.rujukan_terima_xray || ""
                        );
                        $("input[name='rujukan_terima_mri']").val(
                            serahTerima.rujukan_terima_mri || ""
                        );
                        $("input[name='rujukan_terima_ct_scan']").val(
                            serahTerima.rujukan_terima_ct_scan || ""
                        );
                        $("input[name='rujukan_terima_ekg']").val(
                            serahTerima.rujukan_terima_ekg || ""
                        );
                        $("input[name='rujukan_terima_echo']").val(
                            serahTerima.rujukan_terima_echo || ""
                        );
                    }

                    if (response.data.surat_rujukan) {
                        $("#tanggal_mrs").text(
                            response.data.surat_rujukan
                                .rujukan_ringkasan_tanggal || ""
                        );
                        $("#jam_mrs").text(
                            response.data.surat_rujukan.rujukan_ringkasan_jam ||
                                ""
                        );
                        $("#keluhan").text(
                            response.data.surat_rujukan.rujukan_keluhan || ""
                        );
                        $("#alergi").text(
                            response.data.surat_rujukan.rujukan_alergi || ""
                        );
                        $("#kewaspadaan").text(
                            response.data.surat_rujukan.rujukan_kewaspaan || ""
                        );

                        $("#td_pindah").text(
                            response.data.surat_rujukan.rujukan_td || ""
                        );
                        $("#n_pindah").text(
                            response.data.surat_rujukan.rujukan_N || ""
                        );
                        $("#skala_nyeri_pindah").text(
                            response.data.surat_rujukan.rujukan_skala_nyeri ||
                                ""
                        );
                        $("#gcs_e_pindah").text(
                            response.data.surat_rujukan.rujukan_gcs_e || ""
                        );
                        $("#gcs_m_pindah").text(
                            response.data.surat_rujukan.rujukan_gcs_m || ""
                        );
                        $("#gcs_v_pindah").text(
                            response.data.surat_rujukan.rujukan_gcs_v || ""
                        );
                        $("#suhu_pindah").text(
                            response.data.surat_rujukan.rujukan_suhu || ""
                        );
                        $("#p_pindah").text(
                            response.data.surat_rujukan.rujukan_p || ""
                        );
                        $("#spo2_pindah").text(
                            response.data.surat_rujukan.rujukan_spo2 || ""
                        );

                        $("#anamnesis_pemeriksaan_fisik").text(
                            response.data.surat_rujukan
                                .rujukan_anamnesis_pemeriksaan_fisik || ""
                        );
                        $("#diagnosis").text(
                            response.data.surat_rujukan.rujukan_diagnosis || ""
                        );
                        $("#pemeriksaan_penunjang").text(
                            response.data.surat_rujukan
                                .rujukan_pemeriksaan_penunjang || ""
                        );
                    }
                    let data = response.data;

                    if (data.surat_rujukan) {
                        $("#rs_asal").text(data.surat_rujukan.rujukan_rs_asal);
                        $("#rs_tujuan").text(
                            data.surat_rujukan.rujukan_rs_tujuan
                        );
                        $("#pemberi_informasi").text(
                            data.surat_rujukan.rujukan_pemberi_informasi
                        );
                        $("#penerima_informasi").text(
                            data.surat_rujukan.rujukan_penerima_informasi
                        );
                        $("#alasan_transfer").text(
                            data.surat_rujukan.rujukan_alasan_transfer
                        );
                        $("#kategori_pasien_transfer").text(
                            data.surat_rujukan.rujukan_kategori
                        );
                        $("#transportasi").text(
                            data.surat_rujukan.rujukan_transportasi
                        );
                        $("#dpjp").text(data.surat_rujukan.ParamedicName);
                        $("#petugas_rs_tujuan").text(
                            data.surat_rujukan.rujukan_nama_petugas
                        );
                        $("#tanggal_menghubungi").text(
                            data.surat_rujukan.rujukan_hubungi_tanggal
                        );
                        $("#jam_menghubungi").text(
                            data.surat_rujukan.rujukan_hubungi_jam
                        );
                    }

                    let prosedurOperasiHtml = "";
                    data.surat_rujukan_prosedur_operasi.forEach(function (
                        item
                    ) {
                        if (item.aktif && !item.hapus) {
                            prosedurOperasiHtml += `<tr>
                                    <td>${item.detail_prosedur_operasi}</td>
                                    <td>${item.waktu_prosedur_operasi}</td>
                                </tr>`;
                        }
                    });
                    $("#tabelProsedurOperasi tbody").html(prosedurOperasiHtml);

                    let alatTerpasangHtml = "";
                    data.surat_rujukan_alat_terpasang.forEach(function (item) {
                        if (item.aktif && !item.hapus) {
                            alatTerpasangHtml += `<tr>
                                    <td>${item.nama_alat_terpasang}</td>
                                    <td>${item.waktu_alat_terpasang}</td>
                                </tr>`;
                        }
                    });
                    $("#tabelAlatTerpasang tbody").html(alatTerpasangHtml);

                    let obatDiterimaHtml = "";
                    data.surat_rujukan_obat_diterima.forEach(function (item) {
                        if (item.aktif && !item.hapus) {
                            obatDiterimaHtml += `<tr>
                                    <td>${item.item_id_terima}</td>
                                    <td>${item.quantity_terima}</td>
                                    <td>${item.item_unit_code_terima}</td>
                                </tr>`;
                        }
                    });
                    $("#tabelObatDiterima tbody").html(obatDiterimaHtml);

                    let obatDibawaHtml = "";
                    data.surat_rujukan_obat_dibawa.forEach(function (item) {
                        if (item.aktif && !item.hapus) {
                            obatDibawaHtml += `<tr>
                                    <td>${item.item_id}</td>
                                    <td>${item.quantity}</td>
                                    <td>${item.item_unit_code}</td>
                                </tr>`;
                        }
                    });
                    $("#tabelObatDibawa tbody").html(obatDibawaHtml);

                    let statusPasienHtml = "";
                    data.surat_rujukan_status_pasien.forEach(function (item) {
                        if (item.aktif && !item.hapus) {
                            statusPasienHtml += `<tr>
                                    <td>${item.waktu}</td>
                                    <td>${item.kesadaran}</td>
                                    <td>${item.td}</td>
                                    <td>${item.hr}</td>
                                    <td>${item.rr}</td>
                                </tr>`;
                        }
                    });
                    $("#tabelStatusPasien tbody").html(statusPasienHtml);

                    if (data.surat_rujukan_terima) {
                        $("#tanggal_serah_terima").text(
                            data.surat_rujukan_terima.rujukan_terima_tanggal
                        );
                        $("#jam_serah_terima").text(
                            data.surat_rujukan_terima.rujukan_terima_jam
                        );
                        $("#kondisi_saat_ini").text(
                            data.surat_rujukan_terima.rujukan_terima_kondisi
                        );
                        $("#gcs_e").text(
                            data.surat_rujukan_terima.rujukan_terima_gcs_e
                        );
                        $("#gcs_m").text(
                            data.surat_rujukan_terima.rujukan_terima_gcs_m
                        );
                        $("#gcs_v").text(
                            data.surat_rujukan_terima.rujukan_terima_gcs_v
                        );
                        $("#td_serah_terima").text(
                            data.surat_rujukan_terima.rujukan_terima_td
                        );
                        $("#n_serah_terima").text(
                            data.surat_rujukan_terima.rujukan_terima_n
                        );
                        $("#suhu_serah_terima").text(
                            data.surat_rujukan_terima.rujukan_terima_suhu
                        );
                        $("#p_serah_terima").text(
                            data.surat_rujukan_terima.rujukan_terima_p
                        );
                        $("#spo2_serah_terima").text(
                            data.surat_rujukan_terima.rujukan_terima_sp02
                        );
                        $("#skala_nyeri_serah_terima").text(
                            data.surat_rujukan_terima.rujukan_terima_skala_nyeri
                        );
                        $("#lab_serah_terima").text(
                            data.surat_rujukan_terima.rujukan_terima_lab
                        );
                        $("#xray_serah_terima").text(
                            data.surat_rujukan_terima.rujukan_terima_xray
                        );
                        $("#mri_serah_terima").text(
                            data.surat_rujukan_terima.rujukan_terima_mri
                        );
                        $("#ct_scan_serah_terima").text(
                            data.surat_rujukan_terima.rujukan_terima_ct_scan
                        );
                        $("#ekg_serah_terima").text(
                            data.surat_rujukan_terima.rujukan_terima_ekg
                        );
                        $("#echo_serah_terima").text(
                            data.surat_rujukan_terima.rujukan_terima_echo
                        );
                    }
                } else {
                    console.log(
                        "Data surat rujukan tidak ditemukan atau kosong"
                    );
                }
            },
            error: function (xhr, status, error) {
                console.error(
                    "Terjadi kesalahan saat memuat data surat rujukan: ",
                    error
                );
            },
        });
    }

    function triggerGetSuratRujukanDokter() {
        $("#tab-surat-rujukan")
            .off("click")
            .on("click", function () {
                getSuratRujukanDokter();
                initAllTables();
            });
    }

    function initAllTables() {
        initProsedurOperasiTable();
        initAlatTerpasangTable();
        initObatDiterimaTable();
        initObatDibawaTable();
        initStatusPasienTable();
    }

    function simpanSuratRujukan() {
        // console.log("Fungsi simpanSuratRujukan() dipanggil");
    }

    function initProsedurOperasiTable() {
        if ($.fn.DataTable.isDataTable("#tableProsedurOperasi")) {
            $("#tableProsedurOperasi").DataTable().destroy();
        }
        let table = $("#tableProsedurOperasi").DataTable({
            columns: [
                { data: "aksi", orderable: false, searchable: false },
                { data: "detail_prosedur_operasi" },
                { data: "waktu_prosedur_operasi" },
            ],
        });

        function loadProsedurOperasiData() {
            $.ajax({
                url: $dom + "/api/dokter/surat-rujukan-dokter",
                method: "GET",
                data: {
                    reg_no: regno,
                    medrec: medrec,
                },
                success: function (response) {
                    // console.log("Data prosedur operasi loaded:", response);
                    if (
                        response.status &&
                        response.data &&
                        response.data.surat_rujukan_prosedur_operasi
                    ) {
                        let prosedurOperasiData =
                            response.data.surat_rujukan_prosedur_operasi;
                        table.clear();
                        prosedurOperasiData.forEach(function (item) {
                            if (item.aktif == 1 && item.hapus == 0) {
                                table.row.add({
                                    aksi:
                                        '<button class="btn btn-sm btn-danger delete-prosedur" data-id="' +
                                        item.id +
                                        '">Hapus</button>',
                                    detail_prosedur_operasi:
                                        item.detail_prosedur_operasi,
                                    waktu_prosedur_operasi:
                                        item.waktu_prosedur_operasi_formatted,
                                });
                            }
                        });
                        table.draw();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(
                        "Terjadi kesalahan saat memuat data prosedur operasi: ",
                        error
                    );
                },
            });
        }
        loadProsedurOperasiData();

        $(document)
            .off("click", "#simpanProsedurOperasi")
            .on("click", "#simpanProsedurOperasi", function () {
                // console.log("Tombol Simpan Prosedur Operasi diklik");
                let formData = new FormData($("#formProsedurOperasi")[0]);
                formData.append("dt_mode", "add");
                formData.append("reg_no", regno);
                formData.append("med_rec", medrec);
                formData.append("user_id", currentUserName);

                $.ajax({
                    url: $dom + "/api/dokter/simpan-prosedur-operasi",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // console.log("Respon simpan prosedur operasi:", response);
                        if (response.status === "success") {
                            $("#modalProsedurOperasi").modal("hide");
                            loadProsedurOperasiData();
                            alert(response.message);
                        } else {
                            alert(
                                "Gagal menyimpan data prosedur operasi: " +
                                    response.message
                            );
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(
                            "Terjadi kesalahan saat menyimpan data prosedur operasi: ",
                            error
                        );
                        alert(
                            "Terjadi kesalahan saat menyimpan data prosedur operasi: " +
                                xhr.responseText
                        );
                    },
                });
            });

        $(document)
            .off("click", ".delete-prosedur")
            .on("click", ".delete-prosedur", function () {
                let id = $(this).data("id");

                if (
                    confirm(
                        "Apakah Anda yakin ingin menghapus data prosedur operasi ini?"
                    )
                ) {
                    let formData = new FormData();
                    formData.append("dt_mode", "hapus");
                    formData.append("dtid", id);
                    formData.append("reg_no", regno);
                    formData.append("med_rec", medrec);
                    formData.append("user_id", currentUserName);

                    $.ajax({
                        url: $dom + "/api/dokter/simpan-prosedur-operasi",
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            if (response.status === "success") {
                                loadProsedurOperasiData();
                                alert(response.message);
                            } else {
                                console.error(
                                    "Gagal menghapus data prosedur operasi:",
                                    response
                                );
                                alert(
                                    "Gagal menghapus data prosedur operasi. Silakan coba lagi."
                                );
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(
                                "Terjadi kesalahan saat menghapus data prosedur operasi:",
                                xhr.responseText
                            );
                            alert(
                                "Terjadi kesalahan saat menghapus data prosedur operasi. Silakan coba lagi."
                            );
                        },
                    });
                }
            });
    }

    function initAlatTerpasangTable() {
        if ($.fn.DataTable.isDataTable("#tableAlatTerpasang")) {
            $("#tableAlatTerpasang").DataTable().destroy();
        }
        let table = $("#tableAlatTerpasang").DataTable({
            columns: [
                { data: "aksi", orderable: false, searchable: false },
                { data: "nama_alat_terpasang" },
                { data: "waktu_alat_terpasang" },
            ],
        });

        function loadAlatTerpasangData() {
            $.ajax({
                url: $dom + "/api/dokter/surat-rujukan-dokter",
                method: "GET",
                data: {
                    reg_no: regno,
                    medrec: medrec,
                },
                success: function (response) {
                    // console.log("Data alat terpasang loaded:", response);
                    if (
                        response.status &&
                        response.data &&
                        response.data.surat_rujukan_alat_terpasang
                    ) {
                        let alatTerpasangData =
                            response.data.surat_rujukan_alat_terpasang;
                        table.clear();
                        alatTerpasangData.forEach(function (item) {
                            if (item.aktif == 1 && item.hapus == 0) {
                                table.row.add({
                                    aksi:
                                        '<button class="btn btn-sm btn-danger delete-alat" data-id="' +
                                        item.id +
                                        '">Hapus</button>',
                                    nama_alat_terpasang:
                                        item.nama_alat_terpasang,
                                    waktu_alat_terpasang:
                                        item.waktu_alat_terpasang_formatted,
                                });
                            }
                        });
                        table.draw();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(
                        "Terjadi kesalahan saat memuat data alat terpasang: ",
                        error
                    );
                },
            });
        }
        loadAlatTerpasangData();

        $(document)
            .off("click", "#simpanAlatTerpasang")
            .on("click", "#simpanAlatTerpasang", function () {
                // console.log("Tombol Simpan Alat Terpasang diklik");
                let formData = new FormData($("#formAlatTerpasang")[0]);
                formData.append("dt_mode", "add");
                formData.append("reg_no", regno);
                formData.append("med_rec", medrec);
                formData.append("user_id", currentUserName);

                $.ajax({
                    url: $dom + "/api/dokter/simpan-alat-terpasang",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // console.log("Respon simpan alat terpasang:", response);
                        if (response.status === "success") {
                            $("#modalAlatTerpasang").modal("hide");
                            loadAlatTerpasangData();
                            alert(response.message);
                        } else {
                            alert(
                                "Gagal menyimpan data alat terpasang: " +
                                    response.message
                            );
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(
                            "Terjadi kesalahan saat menyimpan data alat terpasang: ",
                            error
                        );
                        alert(
                            "Terjadi kesalahan saat menyimpan data alat terpasang: " +
                                xhr.responseText
                        );
                    },
                });
            });

        $(document)
            .off("click", ".delete-alat")
            .on("click", ".delete-alat", function () {
                let id = $(this).data("id");

                if (
                    confirm(
                        "Apakah Anda yakin ingin menghapus data alat terpasang ini?"
                    )
                ) {
                    $.ajax({
                        url: $dom + "/api/dokter/simpan-alat-terpasang",
                        method: "POST",
                        data: {
                            dt_mode: "hapus",
                            dtid: id,
                            reg_no: regno,
                            med_rec: medrec,
                        },
                        success: function (response) {
                            if (response.status === "success") {
                                loadAlatTerpasangData();
                                alert(response.message);
                            } else {
                                alert(
                                    "Gagal menghapus data alat terpasang: " +
                                        response.message
                                );
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(
                                "Terjadi kesalahan saat menghapus data alat terpasang: ",
                                error
                            );
                            alert(
                                "Terjadi kesalahan saat menghapus data alat terpasang: " +
                                    xhr.responseText
                            );
                        },
                    });
                }
            });
    }

    function initObatDiterimaTable() {
        if ($.fn.DataTable.isDataTable("#tableObatDiterima")) {
            $("#tableObatDiterima").DataTable().destroy();
        }
        let table = $("#tableObatDiterima").DataTable({
            columns: [
                { data: "aksi", orderable: false, searchable: false },
                { data: "nama_obat" },
                { data: "qty" },
                { data: "satuan" },
            ],
        });

        function loadObatDiterimaData() {
            $.ajax({
                url: $dom + "/api/dokter/surat-rujukan-dokter",
                method: "GET",
                data: {
                    reg_no: regno,
                    medrec: medrec,
                },
                success: function (response) {
                    // console.log("Data obat diterima loaded:", response);
                    if (
                        response.status &&
                        response.data &&
                        response.data.surat_rujukan_obat_diterima
                    ) {
                        let obatDiterimaData =
                            response.data.surat_rujukan_obat_diterima;
                        table.clear();
                        obatDiterimaData.forEach(function (item) {
                            if (item.aktif == 1 && item.hapus == 0) {
                                table.row.add({
                                    aksi:
                                        '<button class="btn btn-sm btn-danger delete-obat" data-id="' +
                                        item.id +
                                        '">Hapus</button>',
                                    nama_obat:
                                        item.item_id_terima || item.nama_obat,
                                    qty: item.quantity_terima || item.qty,
                                    satuan:
                                        item.item_unit_code_terima ||
                                        item.satuan,
                                });
                            }
                        });
                        table.draw();
                    } else {
                        console.log(
                            "Tidak ada data obat diterima atau format respons tidak sesuai"
                        );
                    }
                },
                error: function (xhr, status, error) {
                    console.error(
                        "Terjadi kesalahan saat memuat data obat diterima: ",
                        error
                    );
                },
            });
        }

        loadObatDiterimaData();

        $(document)
            .off("click", "#simpanObatDiterima")
            .on("click", "#simpanObatDiterima", function () {
                // console.log("Tombol Simpan Obat Diterima diklik");
                let formData = new FormData($("#formObatDiterima")[0]);
                formData.append("dt_mode", "add");
                formData.append("reg_no", regno);
                formData.append("med_rec", medrec);
                formData.append("user_id", currentUserName);

                $.ajax({
                    url: $dom + "/api/dokter/simpan-obat-diterima",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // console.log("Respon simpan obat diterima:", response);
                        if (response.status === "success") {
                            $("#modalObatDiterima").modal("hide");
                            loadObatDiterimaData();
                            alert(response.message);
                        } else {
                            alert(
                                "Gagal menyimpan data obat diterima: " +
                                    response.message
                            );
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(
                            "Terjadi kesalahan saat menyimpan data obat diterima: ",
                            error
                        );
                        alert(
                            "Terjadi kesalahan saat menyimpan data obat diterima: " +
                                xhr.responseText
                        );
                    },
                });
            });

        $(document)
            .off("click", ".delete-obat")
            .on("click", ".delete-obat", function () {
                let id = $(this).data("id");

                if (
                    confirm(
                        "Apakah Anda yakin ingin menghapus data obat diterima ini?"
                    )
                ) {
                    $.ajax({
                        url: $dom + "/api/dokter/simpan-obat-diterima",
                        method: "POST",
                        data: {
                            dt_mode: "hapus",
                            dtid: id,
                            reg_no: regno,
                            med_rec: medrec,
                        },
                        success: function (response) {
                            if (response.status === "success") {
                                loadObatDiterimaData();
                                alert(response.message);
                            } else {
                                alert(
                                    "Gagal menghapus data obat diterima: " +
                                        response.message
                                );
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(
                                "Terjadi kesalahan saat menghapus data obat diterima: ",
                                error
                            );
                            alert(
                                "Terjadi kesalahan saat menghapus data obat diterima: " +
                                    xhr.responseText
                            );
                        },
                    });
                }
            });
    }

    function initObatDibawaTable() {
        if ($.fn.DataTable.isDataTable("#tableObatDibawa")) {
            $("#tableObatDibawa").DataTable().destroy();
        }
        let table = $("#tableObatDibawa").DataTable({
            columns: [
                { data: "aksi", orderable: false, searchable: false },
                { data: "nama_obat" },
                { data: "qty" },
                { data: "satuan" },
            ],
        });

        function loadObatDibawaData() {
            $.ajax({
                url: $dom + "/api/dokter/surat-rujukan-dokter",
                method: "GET",
                data: {
                    reg_no: regno,
                    medrec: medrec,
                },
                success: function (response) {
                    // console.log("Data obat dibawa loaded:", response);
                    if (
                        response.status &&
                        response.data &&
                        response.data.surat_rujukan_obat_dibawa
                    ) {
                        let obatDibawaData =
                            response.data.surat_rujukan_obat_dibawa;
                        table.clear();
                        obatDibawaData.forEach(function (item) {
                            if (item.aktif == 1 && item.hapus == 0) {
                                table.row.add({
                                    aksi:
                                        '<button class="btn btn-sm btn-danger delete-obat-dibawa" data-id="' +
                                        item.id +
                                        '">Hapus</button>',
                                    nama_obat: item.item_id,
                                    qty: item.quantity,
                                    satuan: item.item_unit_code,
                                });
                            }
                        });
                        table.draw();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(
                        "Terjadi kesalahan saat memuat data obat dibawa: ",
                        error
                    );
                },
            });
        }

        // Load data saat inisialisasi
        loadObatDibawaData();

        $(document)
            .off("click", "#simpanObatDibawa")
            .on("click", "#simpanObatDibawa", function () {
                // console.log("Tombol Simpan Obat Dibawa diklik");
                let formData = new FormData($("#formObatDibawa")[0]);
                formData.append("dt_mode", "add");
                formData.append("reg_no", regno);
                formData.append("med_rec", medrec);
                formData.append("user_id", currentUserName);

                $.ajax({
                    url: $dom + "/api/dokter/simpan-obat-dibawa",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // console.log("Respon simpan obat dibawa:", response);
                        if (response.status === "success") {
                            $("#modalObatDibawa").modal("hide");
                            loadObatDibawaData();
                            alert(response.message);
                        } else {
                            alert(
                                "Gagal menyimpan data obat dibawa: " +
                                    response.message
                            );
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(
                            "Terjadi kesalahan saat menyimpan data obat dibawa: ",
                            error
                        );
                        alert(
                            "Terjadi kesalahan saat menyimpan data obat dibawa: " +
                                xhr.responseText
                        );
                    },
                });
            });

        $(document)
            .off("click", ".delete-obat-dibawa")
            .on("click", ".delete-obat-dibawa", function () {
                let id = $(this).data("id");

                if (
                    confirm(
                        "Apakah Anda yakin ingin menghapus data obat dibawa ini?"
                    )
                ) {
                    $.ajax({
                        url: $dom + "/api/dokter/simpan-obat-dibawa",
                        method: "POST",
                        data: {
                            dt_mode: "hapus",
                            dtid: id,
                            reg_no: regno,
                            med_rec: medrec,
                        },
                        success: function (response) {
                            if (response.status === "success") {
                                loadObatDibawaData();
                                alert(response.message);
                            } else {
                                alert(
                                    "Gagal menghapus data obat dibawa: " +
                                        response.message
                                );
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(
                                "Terjadi kesalahan saat menghapus data obat dibawa: ",
                                error
                            );
                            alert(
                                "Terjadi kesalahan saat menghapus data obat dibawa: " +
                                    xhr.responseText
                            );
                        },
                    });
                }
            });
    }

    function initStatusPasienTable() {
        if ($.fn.DataTable.isDataTable("#tableStatusPasien")) {
            $("#tableStatusPasien").DataTable().destroy();
        }
        let table = $("#tableStatusPasien").DataTable({
            columns: [
                { data: "aksi", orderable: false, searchable: false },
                { data: "waktu" },
                { data: "kesadaran" },
                { data: "td" },
                { data: "hr" },
                { data: "rr" },
            ],
        });

        function loadStatusPasienData() {
            $.ajax({
                url: $dom + "/api/dokter/surat-rujukan-dokter",
                method: "GET",
                data: {
                    reg_no: regno,
                    medrec: medrec,
                },
                success: function (response) {
                    if (
                        response.status &&
                        response.data &&
                        response.data.surat_rujukan_status_pasien
                    ) {
                        let statusPasienData =
                            response.data.surat_rujukan_status_pasien;
                        table.clear();
                        statusPasienData.forEach(function (item) {
                            if (item.aktif == 1 && item.hapus == 0) {
                                table.row.add({
                                    aksi:
                                        '<button class="btn btn-sm btn-danger delete-status-pasien" data-id="' +
                                        item.id +
                                        '">Hapus</button>',
                                    waktu: item.waktu_formatted,
                                    kesadaran: item.kesadaran,
                                    td: item.td,
                                    hr: item.hr,
                                    rr: item.rr,
                                });
                            }
                        });
                        table.draw();
                    }
                },
                error: function (xhr, status, error) {
                    console.error(
                        "Terjadi kesalahan saat memuat data status pasien: ",
                        error
                    );
                },
            });
        }

        loadStatusPasienData();

        $(document)
            .off("click", "#simpanStatusPasien")
            .on("click", "#simpanStatusPasien", function () {
                let formData = new FormData($("#formStatusPasien")[0]);
                formData.append("dt_mode", "add");
                formData.append("reg_no", regno);
                formData.append("med_rec", medrec);
                formData.append("user_id", currentUserName);

                $.ajax({
                    url: $dom + "/api/dokter/simpan-status-pasien",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        // console.log("Respon simpan status pasien:", response);
                        if (response.status === "success") {
                            $("#modalStatusPasien").modal("hide");
                            loadStatusPasienData();
                            alert(response.message);
                        } else {
                            alert(
                                "Gagal menyimpan data status pasien: " +
                                    response.message
                            );
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(
                            "Terjadi kesalahan saat menyimpan data status pasien: ",
                            error
                        );
                        alert(
                            "Terjadi kesalahan saat menyimpan data status pasien: " +
                                xhr.responseText
                        );
                    },
                });
            });

        $(document)
            .off("click", ".delete-status-pasien")
            .on("click", ".delete-status-pasien", function () {
                let id = $(this).data("id");

                if (
                    confirm(
                        "Apakah Anda yakin ingin menghapus data status pasien ini?"
                    )
                ) {
                    $.ajax({
                        url: $dom + "/api/dokter/simpan-status-pasien",
                        method: "POST",
                        data: {
                            dt_mode: "hapus",
                            dtid: id,
                            reg_no: regno,
                            med_rec: medrec,
                        },
                        success: function (response) {
                            if (response.status === "success") {
                                loadStatusPasienData();
                                alert(response.message);
                            } else {
                                alert(
                                    "Gagal menghapus data status pasien: " +
                                        response.message
                                );
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(
                                "Terjadi kesalahan saat menghapus data status pasien: ",
                                error
                            );
                            alert(
                                "Terjadi kesalahan saat menghapus data status pasien: " +
                                    xhr.responseText
                            );
                        },
                    });
                }
            });
    }
});
