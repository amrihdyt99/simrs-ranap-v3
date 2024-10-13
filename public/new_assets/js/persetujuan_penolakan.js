$(document).ready(function () {
    let urlOrigin = window.location.origin;
    let domUrl = "";
    // check if urlOrigin is from rsud.sumselprov.go.id
    if (urlOrigin == "https://rsud.sumselprov.go.id")
        domUrl = urlOrigin + "/simrs_ranap/nyx-sistem/select2/m-paramedic";
    else domUrl = urlOrigin + "/nyx-sistem/select2/m-paramedic";
    triggerGetPersetujuanPenolakanDokter();

    neko_select2_init_data(domUrl, "ParamedicCode", {
        placeholder: "Pilih Dokter",
    });

    ttd_pemberian_informasi_tindakan_medis();
    ttd_penolakan_tindakan_medis();
    ttd_persetujuan_tindakan_medis();

    function simpanInformasiTindakanMedis() {
        neko_proses();
        var formData = new FormData($("#InformasiTindakanMedis")[0]);

        formData.append("reg_no", regno);
        formData.append("medrec", medrec);
        formData.append("ttdDokter", signatureIPadDokterInformasi.toDataURL());
        formData.append(
            "ttdPenerima",
            signaturePadPenerimaInformasi.toDataURL()
        );

        $.ajax({
            url: "{{route('add.InformasiTindakanMedis')}}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                getPersetujuanPenolakanDokter();
                neko_simpan_success();
            },
            error: function (data) {
                neko_simpan_error_noreq();
            },
        });
    }

    function simpanPersetujuanTindakanMedis() {
        neko_proses();
        var formData = new FormData($("#PersetujuanTindakanMedis")[0]);

        formData.append("reg_no", regno);
        formData.append("medrec", medrec);
        formData.append(
            "ttd_penerima_setuju",
            signaturePadPenerimaSetuju.toDataURL()
        );
        formData.append(
            "ttd_dokter_setuju",
            signaturePadDokterSetuju.toDataURL()
        );
        formData.append(
            "ttd_keluarga_setuju",
            signaturePadKeluargaSetuju.toDataURL()
        );
        formData.append(
            "ttd_perawat_setuju",
            signaturePadPerawatSetuju.toDataURL()
        );

        $.ajax({
            url: "{{route('add.PersetujuanTindakanMedis')}}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                getPersetujuanPenolakanDokter();
                neko_simpan_success();
            },
            error: function (data) {
                neko_simpan_error_noreq();
            },
        });
    }

    function simpanPenolakanTindakanMedis() {
        neko_proses();
        var formData = new FormData($("#PenolakanTindakanMedis")[0]);

        formData.append("reg_no", regno);
        formData.append("medrec", medrec);
        formData.append(
            "ttd_penerima_penolakan",
            signaturePadPenerimaPenolakan.toDataURL()
        );
        formData.append(
            "ttd_dokter_penolakan",
            signaturePadDokterPenolakan.toDataURL()
        );
        formData.append(
            "ttd_keluarga_penolakan",
            signaturePadKeluargaPenolakan.toDataURL()
        );
        formData.append(
            "ttd_perawat_penolakan",
            signaturePadPerawatPenolakan.toDataURL()
        );

        $.ajax({
            url: "{{route('add.PenolakanTindakanMedis')}}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                getPersetujuanPenolakanDokter();
                neko_simpan_success();
            },
            error: function (data) {
                neko_simpan_error_noreq();
            },
        });
    }

    function getPersetujuanPenolakanDokter() {
        $.ajax({
            url: $dom + "/api/persetujuan-penolakan-dokter",
            method: "GET",
            data: {
                reg_no: regno,
            },
            success: function (response) {
                console.log(response);
                if (response.status) {
                    let informasi = response.data.informasi;
                    let persetujuan = response.data.persetujuan;
                    let penolakan = response.data.penolakan;
                    // mengisi data informasi tindakan medis
                    $("#kode_tindakan_medis_setuju_tolak").val(
                        informasi.kode_tindakan_medis_setuju_tolak
                    );

                    $("#informasi_nama_tindakan").val(
                        informasi.informasi_nama_tindakan
                    );
                    $("#ParamedicCode")
                        .val(informasi.ParamedicCode)
                        .prop("selected", true)
                        .trigger("change");
                    $("#informasi_pemberi_info").val(
                        informasi.informasi_pemberi_info
                    );
                    $("#informasi_penerima_info").val(
                        informasi.informasi_penerima_info
                    );
                    $("#informasi_diberikan_pada").val(
                        informasi.informasi_diberikan_pada
                    );
                    $("#informasi_diagnosis_text").val(
                        informasi.informasi_diagnosis_text
                    );
                    $("#informasi_dasar_diagnosis_text").val(
                        informasi.informasi_dasar_diagnosis_text
                    );
                    $("#informasi_tindakan_kedokteran_text").val(
                        informasi.informasi_tindakan_kedokteran_text
                    );
                    $("#informasi_indikasi_tindakan_text").val(
                        informasi.informasi_indikasi_tindakan_text
                    );
                    $("#informasi_tata_cara_text").val(
                        informasi.informasi_tata_cara_text
                    );
                    $("#informasi_tujuan_text").val(
                        informasi.informasi_tujuan_text
                    );
                    $("#informasi_risiko_text").val(
                        informasi.informasi_risiko_text
                    );
                    $("#informasi_komplikasi_text").val(
                        informasi.informasi_komplikasi_text
                    );
                    $("#informasi_prognosis_text").val(
                        informasi.informasi_prognosis_text
                    );
                    $("#informasi_alternatif_text").val(
                        informasi.informasi_alternatif_text
                    );
                    $("#informasi_lain_lain_text").val(
                        informasi.informasi_lain_lain_text
                    );
                    $("#signature_dokter").val(informasi.informasi_ttd_dokter);
                    $("#nama_dokter").val(informasi.nama_dokter);
                    $("#signature_penerima").val(
                        informasi.informasi_ttd_penerima_informasi
                    );
                    $("#nama_penerima_informasi").val(
                        informasi.nama_penerima_informasi
                    );

                    //persetujuan tindakan medissssssssssssss es

                    $("#persetujuan_nama_1").val(
                        persetujuan.persetujuan_nama_1
                    );
                    $(
                        "input[name='persetujuan_jenis_kelamin_1'][value='" +
                            persetujuan.persetujuan_jenis_kelamin_1 +
                            "']"
                    ).prop("checked", true);
                    $("#persetujuan_tanggal_lahir_1").val(
                        persetujuan.persetujuan_tanggal_lahir_1
                    );
                    $("#persetujuan_alamat_1").val(
                        persetujuan.persetujuan_alamat_1
                    );
                    $("#persetujuan_pernyataan").val(
                        persetujuan.persetujuan_pernyataan
                    );
                    $(
                        "input[name='persetujuan_terhadap'][value='" +
                            persetujuan.persetujuan_terhadap +
                            "']"
                    ).prop("checked", true);
                    $("#persetujuan_nama_2").val(
                        persetujuan.persetujuan_nama_2
                    );
                    $(
                        "input[name='persetujuan_jenis_kelamin_2'][value='" +
                            persetujuan.persetujuan_jenis_kelamin_2 +
                            "']"
                    ).prop("checked", true);
                    $("#persetujuan_tanggal_lahir_2").val(
                        persetujuan.persetujuan_tanggal_lahir_2
                    );
                    $("#persetujuan_alamat_2").val(
                        persetujuan.persetujuan_alamat_2
                    );
                    $("#persetujuan_tanggal_waktu_ttd").val(
                        persetujuan.persetujuan_tanggal_waktu_ttd
                    );
                    $("#signature_persetujuan_penerima").val(
                        persetujuan.persetujuan_ttd_yg_menyatakan
                    );
                    $("#nama_persetujuan_penerima").val(
                        persetujuan.nama_persetujuan_penerima
                    );
                    $("#signature_persetujuan_dokter").val(
                        persetujuan.persetujuan_ttd_dokter
                    );
                    $("#nama_persetujuan_dokter").val(
                        persetujuan.nama_persetujuan_dokter
                    );
                    $("#signature_persetujuan_keluarga").val(
                        persetujuan.persetujuan_ttd_keluarga
                    );
                    $("#nama_persetujuan_keluarga").val(
                        persetujuan.nama_persetujuan_keluarga
                    );
                    $("#signature_persetujuan_perawat").val(
                        persetujuan.persetujuan_ttd_perawat
                    );
                    $("#nama_persetujuan_perawat").val(
                        persetujuan.nama_persetujuan_perawat
                    );

                    // penolakan tindakan medissssssssssssss

                    $("#penolakan_nama_1").val(penolakan.penolakan_nama_1);
                    $(
                        "input[name='penolakan_jenis_kelamin_1'][value='" +
                            penolakan.penolakan_jenis_kelamin_1 +
                            "']"
                    ).prop("checked", true);
                    $("#penolakan_tanggal_lahir_1").val(
                        penolakan.penolakan_tanggal_lahir_1
                    );
                    $("#penolakan_alamat_1").val(penolakan.penolakan_alamat_1);
                    $("#penolakan_pernyataan").val(
                        penolakan.penolakan_pernyataan
                    );
                    $(
                        "input[name='penolakan_terhadap'][value='" +
                            penolakan.penolakan_terhadap +
                            "']"
                    ).prop("checked", true);
                    $("#penolakan_nama_2").val(penolakan.penolakan_nama_2);
                    $(
                        "input[name='penolakan_jenis_kelamin_2'][value='" +
                            penolakan.penolakan_jenis_kelamin_2 +
                            "']"
                    ).prop("checked", true);
                    $("#penolakan_tanggal_lahir_2").val(
                        penolakan.penolakan_tanggal_lahir_2
                    );
                    $("#penolakan_alamat_2").val(penolakan.penolakan_alamat_2);
                    $("#penolakan_tanggal_ttd").val(
                        penolakan.penolakan_tanggal_ttd
                    );
                    $("#signature_penolakan_penerima").val(
                        penolakan.penolakan_ttd_yg_menyatakan
                    );
                    $("#nama_penolakan_penerima").val(
                        penolakan.nama_penolakan_penerima
                    );
                    $("#signature_penolakan_dokter").val(
                        penolakan.penolakan_ttd_dokter
                    );
                    $("#nama_penolakan_dokter").val(
                        penolakan.nama_penolakan_dokter
                    );
                    $("#signature_penolakan_keluarga").val(
                        penolakan.penolakan_ttd_keluarga
                    );
                    $("#nama_penolakan_keluarga").val(
                        penolakan.nama_penolakan_keluarga
                    );
                    $("#signature_penolakan_perawat").val(
                        penolakan.penolakan_ttd_perawat
                    );
                    $("#nama_penolakan_perawat").val(
                        penolakan.nama_penolakan_perawat
                    );
                }
            },
            error: function (xhr, status, error) {
                console.error("Terjadi kesalahan: ", error);
            },
        });
    }

    function triggerGetPersetujuanPenolakanDokter() {
        $("#tab-persetujuan-penolakan").on("click", function () {
            getPersetujuanPenolakanDokter();
        });
    }
});
