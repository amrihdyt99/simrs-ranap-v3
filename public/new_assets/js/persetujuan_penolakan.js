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

                    $("#ParamedicName").text(informasi.ParamedicName);
                    $("#informasi_pemberi_info").text(
                        informasi.informasi_pemberi_info
                    );
                    $("#informasi_penerima_info").text(
                        informasi.informasi_penerima_info
                    );
                    $("#informasi_diberikan_pada").text(
                        informasi.informasi_diberikan_pada
                    );
                    $("#informasi_diagnosis_text").text(
                        informasi.informasi_diagnosis_text
                    );
                    $("#informasi_dasar_diagnosis_text").text(
                        informasi.informasi_dasar_diagnosis_text
                    );
                    $("#informasi_tindakan_kedokteran_text").text(
                        informasi.informasi_tindakan_kedokteran_text
                    );
                    $("#informasi_indikasi_tindakan_text").text(
                        informasi.informasi_indikasi_tindakan_text
                    );
                    $("#informasi_tata_cara_text").text(
                        informasi.informasi_tata_cara_text
                    );
                    $("#informasi_tujuan_text").text(
                        informasi.informasi_tujuan_text
                    );
                    $("#informasi_risiko_text").text(
                        informasi.informasi_risiko_text
                    );
                    $("#informasi_komplikasi_text").text(
                        informasi.informasi_komplikasi_text
                    );
                    $("#informasi_prognosis_text").text(
                        informasi.informasi_prognosis_text
                    );
                    $("#informasi_alternatif_text").text(
                        informasi.informasi_alternatif_text
                    );
                    $("#informasi_lain_lain_text").text(
                        informasi.informasi_lain_lain_text
                    );
                    $("#ParamedicName").text(informasi.ParamedicName || "N/A");
                    $("#informasi_pemberi_info_").text(
                        informasi.informasi_pemberi_info || "N/A"
                    );
                    $("#informasi_penerima_info_").text(
                        informasi.informasi_penerima_info || "N/A"
                    );
                    $("#informasi_diberikan_pada_").text(
                        informasi.informasi_diberikan_pada || "N/A"
                    );
                    $("#informasi_diagnosis_text_").text(
                        informasi.informasi_diagnosis_text || "N/A"
                    );
                    $("#informasi_dasar_diagnosis_text_").text(
                        informasi.informasi_dasar_diagnosis_text || "N/A"
                    );
                    $("#informasi_tindakan_kedokteran_text_").text(
                        informasi.informasi_tindakan_kedokteran_text || "N/A"
                    );
                    $("#informasi_indikasi_tindakan_text_").text(
                        informasi.informasi_indikasi_tindakan_text || "N/A"
                    );
                    $("#informasi_tata_cara_text_").text(
                        informasi.informasi_tata_cara_text || "N/A"
                    );
                    $("#informasi_tujuan_text_").text(
                        informasi.informasi_tujuan_text || "N/A"
                    );
                    $("#informasi_risiko_text_").text(
                        informasi.informasi_risiko_text || "N/A"
                    );
                    $("#informasi_komplikasi_text_").text(
                        informasi.informasi_komplikasi_text || "N/A"
                    );
                    $("#informasi_prognosis_text_").text(
                        informasi.informasi_prognosis_text || "N/A"
                    );
                    $("#informasi_alternatif_text_").text(
                        informasi.informasi_alternatif_text || "N/A"
                    );
                    $("#informasi_lain_lain_text_").text(
                        informasi.informasi_lain_lain_text || "N/A"
                    );

                    // Display the signature on a canvas
                    var canvasDokter = document.getElementById("canvas_dokter");
                    var contextDokter = canvasDokter.getContext("2d");
                    var imageDokter = new Image();
                    imageDokter.src = informasi.informasi_ttd_dokter;
                    imageDokter.onload = function () {
                        contextDokter.clearRect(
                            0,
                            0,
                            canvasDokter.width,
                            canvasDokter.height
                        ); // Clear the canvas
                        contextDokter.drawImage(imageDokter, 0, 0);
                    };
                    imageDokter.onerror = function () {
                        console.error("Failed to load dokter signature image.");
                    };

                    var canvasPenerima =
                        document.getElementById("canvas_penerima");
                    var contextPenerima = canvasPenerima.getContext("2d");
                    var imagePenerima = new Image();
                    imagePenerima.src =
                        informasi.informasi_ttd_penerima_informasi;
                    imagePenerima.onload = function () {
                        contextPenerima.clearRect(
                            0,
                            0,
                            canvasPenerima.width,
                            canvasPenerima.height
                        ); // Clear the canvas
                        contextPenerima.drawImage(imagePenerima, 0, 0);
                    };
                    imagePenerima.onerror = function () {
                        console.error(
                            "Failed to load penerima signature image."
                        );
                    };

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

                    $("#persetujuan_nama_1_").text(
                        persetujuan.persetujuan_nama_1
                    );
                    $(
                        "input[name='persetujuan_jenis_kelamin_1'][value='" +
                            persetujuan.persetujuan_jenis_kelamin_1 +
                            "']"
                    ).prop("checked", true);
                    $("#persetujuan_tanggal_lahir_1_").text(
                        persetujuan.persetujuan_tanggal_lahir_1
                    );
                    $("#persetujuan_alamat_1_").text(
                        persetujuan.persetujuan_alamat_1
                    );
                    $("#persetujuan_pernyataan_").text(
                        persetujuan.persetujuan_pernyataan
                    );
                    $(
                        "input[name='persetujuan_terhadap'][value='" +
                            persetujuan.persetujuan_terhadap +
                            "']"
                    ).prop("checked", true);
                    $("#persetujuan_nama_2_").text(
                        persetujuan.persetujuan_nama_2
                    );
                    $(
                        "input[name='persetujuan_jenis_kelamin_2'][value='" +
                            persetujuan.persetujuan_jenis_kelamin_2 +
                            "']"
                    ).prop("checked", true);
                    $("#persetujuan_tanggal_lahir_2_").text(
                        persetujuan.persetujuan_tanggal_lahir_2
                    );
                    $("#persetujuan_alamat_2_").text(
                        persetujuan.persetujuan_alamat_2
                    );
                    $("#persetujuan_tanggal_waktu_ttd").text(
                        persetujuan.persetujuan_tanggal_waktu_ttd
                    );

                    var canvasPersetujuanPenerima = document.getElementById(
                        "canvas_persetujuan_penerima"
                    );
                    var contextPersetujuanPenerima =
                        canvasPersetujuanPenerima.getContext("2d");
                    var imagePersetujuanPenerima = new Image();
                    imagePersetujuanPenerima.src =
                        persetujuan.persetujuan_ttd_yg_menyatakan;
                    imagePersetujuanPenerima.onload = function () {
                        contextPersetujuanPenerima.clearRect(
                            0,
                            0,
                            canvasPersetujuanPenerima.width,
                            canvasPersetujuanPenerima.height
                        ); // Clear the canvas
                        contextPersetujuanPenerima.drawImage(
                            imagePersetujuanPenerima,
                            0,
                            0
                        );
                    };
                    imagePersetujuanPenerima.onerror = function () {
                        console.error(
                            "Failed to load persetujuan penerima signature image."
                        );
                    };

                    var canvasPersetujuanDokter = document.getElementById(
                        "canvas_persetujuan_dokter"
                    );
                    var contextPersetujuanDokter =
                        canvasPersetujuanDokter.getContext("2d");
                    var imagePersetujuanDokter = new Image();
                    imagePersetujuanDokter.src =
                        persetujuan.persetujuan_ttd_dokter;
                    imagePersetujuanDokter.onload = function () {
                        contextPersetujuanDokter.clearRect(
                            0,
                            0,
                            canvasPersetujuanDokter.width,
                            canvasPersetujuanDokter.height
                        ); // Clear the canvas
                        contextPersetujuanDokter.drawImage(
                            imagePersetujuanDokter,
                            0,
                            0
                        );
                    };
                    imagePersetujuanDokter.onerror = function () {
                        console.error(
                            "Failed to load persetujuan dokter signature image."
                        );
                    };

                    var canvasPersetujuanKeluarga = document.getElementById(
                        "canvas_persetujuan_keluarga"
                    );
                    var contextPersetujuanKeluarga =
                        canvasPersetujuanKeluarga.getContext("2d");
                    var imagePersetujuanKeluarga = new Image();
                    imagePersetujuanKeluarga.src =
                        persetujuan.persetujuan_ttd_keluarga;
                    imagePersetujuanKeluarga.onload = function () {
                        contextPersetujuanKeluarga.clearRect(
                            0,
                            0,
                            canvasPersetujuanKeluarga.width,
                            canvasPersetujuanKeluarga.height
                        ); // Clear the canvas
                        contextPersetujuanKeluarga.drawImage(
                            imagePersetujuanKeluarga,
                            0,
                            0
                        );
                    };
                    imagePersetujuanKeluarga.onerror = function () {
                        console.error(
                            "Failed to load persetujuan keluarga signature image."
                        );
                    };

                    var canvasPersetujuanPerawat = document.getElementById(
                        "canvas_persetujuan_perawat"
                    );
                    var contextPersetujuanPerawat =
                        canvasPersetujuanPerawat.getContext("2d");
                    var imagePersetujuanPerawat = new Image();
                    imagePersetujuanPerawat.src =
                        persetujuan.persetujuan_ttd_perawat;
                    imagePersetujuanPerawat.onload = function () {
                        contextPersetujuanPerawat.clearRect(
                            0,
                            0,
                            canvasPersetujuanPerawat.width,
                            canvasPersetujuanPerawat.height
                        ); // Clear the canvas
                        contextPersetujuanPerawat.drawImage(
                            imagePersetujuanPerawat,
                            0,
                            0
                        );
                    };
                    imagePersetujuanPerawat.onerror = function () {
                        console.error(
                            "Failed to load persetujuan perawat signature image."
                        );
                    };

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
                    $("#penolakan_nama_1_").text(penolakan.penolakan_nama_1);
                    $("#penolakan_jenis_kelamin_1_").text(
                        penolakan.penolakan_jenis_kelamin_1
                    );
                    $("#penolakan_tanggal_lahir_1_").text(
                        penolakan.penolakan_tanggal_lahir_1
                    );
                    $("#penolakan_alamat_1_").text(
                        penolakan.penolakan_alamat_1
                    );
                    $("#penolakan_pernyataan_").text(
                        penolakan.penolakan_pernyataan
                    );
                    $("#penolakan_nama_2_").text(penolakan.penolakan_nama_2);
                    $("#penolakan_jenis_kelamin_2_").text(
                        penolakan.penolakan_jenis_kelamin_2
                    );
                    $("#penolakan_tanggal_lahir_2_").text(
                        penolakan.penolakan_tanggal_lahir_2
                    );
                    $("#penolakan_alamat_2_").text(
                        penolakan.penolakan_alamat_2
                    );

                    // Display the signature on a canvas for penolakan
                    var canvasPenolakanPenerima = document.getElementById(
                        "canvas_penolakan_penerima"
                    );
                    var contextPenolakanPenerima =
                        canvasPenolakanPenerima.getContext("2d");
                    var imagePenolakanPenerima = new Image();
                    imagePenolakanPenerima.src =
                        penolakan.penolakan_ttd_yg_menyatakan;
                    imagePenolakanPenerima.onload = function () {
                        contextPenolakanPenerima.clearRect(
                            0,
                            0,
                            canvasPenolakanPenerima.width,
                            canvasPenolakanPenerima.height
                        ); // Clear the canvas
                        contextPenolakanPenerima.drawImage(
                            imagePenolakanPenerima,
                            0,
                            0
                        );
                    };
                    imagePenolakanPenerima.onerror = function () {
                        console.error(
                            "Failed to load penolakan penerima signature image."
                        );
                    };

                    var canvasPenolakanDokter = document.getElementById(
                        "canvas_penolakan_dokter"
                    );
                    var contextPenolakanDokter =
                        canvasPenolakanDokter.getContext("2d");
                    var imagePenolakanDokter = new Image();
                    imagePenolakanDokter.src = penolakan.penolakan_ttd_dokter;
                    imagePenolakanDokter.onload = function () {
                        contextPenolakanDokter.clearRect(
                            0,
                            0,
                            canvasPenolakanDokter.width,
                            canvasPenolakanDokter.height
                        ); // Clear the canvas
                        contextPenolakanDokter.drawImage(
                            imagePenolakanDokter,
                            0,
                            0
                        );
                    };
                    imagePenolakanDokter.onerror = function () {
                        console.error(
                            "Failed to load penolakan dokter signature image."
                        );
                    };

                    var canvasPenolakanKeluarga = document.getElementById(
                        "canvas_penolakan_keluarga"
                    );
                    var contextPenolakanKeluarga =
                        canvasPenolakanKeluarga.getContext("2d");
                    var imagePenolakanKeluarga = new Image();
                    imagePenolakanKeluarga.src =
                        penolakan.penolakan_ttd_keluarga;
                    imagePenolakanKeluarga.onload = function () {
                        contextPenolakanKeluarga.clearRect(
                            0,
                            0,
                            canvasPenolakanKeluarga.width,
                            canvasPenolakanKeluarga.height
                        ); // Clear the canvas
                        contextPenolakanKeluarga.drawImage(
                            imagePenolakanKeluarga,
                            0,
                            0
                        );
                    };
                    imagePenolakanKeluarga.onerror = function () {
                        console.error(
                            "Failed to load penolakan keluarga signature image."
                        );
                    };

                    var canvasPenolakanPerawat = document.getElementById(
                        "canvas_penolakan_perawat"
                    );
                    var contextPenolakanPerawat =
                        canvasPenolakanPerawat.getContext("2d");
                    var imagePenolakanPerawat = new Image();
                    imagePenolakanPerawat.src = penolakan.penolakan_ttd_perawat;
                    imagePenolakanPerawat.onload = function () {
                        contextPenolakanPerawat.clearRect(
                            0,
                            0,
                            canvasPenolakanPerawat.width,
                            canvasPenolakanPerawat.height
                        ); // Clear the canvas
                        contextPenolakanPerawat.drawImage(
                            imagePenolakanPerawat,
                            0,
                            0
                        );
                    };
                    imagePenolakanPerawat.onerror = function () {
                        console.error(
                            "Failed to load penolakan perawat signature image."
                        );
                    };

                    // Update the view with the fetched data

                    // ... update other fields similarly
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
