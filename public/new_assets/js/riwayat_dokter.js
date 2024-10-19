$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {
    function getAssesmentAwalDokter() {
        $.ajax({
            url: $dom + "/api/assesment-awal-dokter",
            method: "GET",
            data: {
                reg_no: regno, // Pastikan regno sudah didefinisikan
            },
            success: function (response) {
                console.log(response);
                if (response.assesmentData) {
                    let assesment = response.assesmentData;

                    // Update view dengan data yang diambil
                    $("#data-diperoleh-dari").text(assesment.anamnesis || "-");
                    $("#keluhan-utama").text(assesment.keluhan_utama || "-");
                    $("#riwayat-perjalanan-penyakit").text(
                        assesment.riwayat_penyakit_sekarang || "-"
                    );
                    $("#riwayat-penyakit-dahulu").text(
                        assesment.riwayat_penyakit_dahulu || "-"
                    );
                    $("#riwayat-pengobatan").text(
                        assesment.riwayat_pengobatan || "-"
                    );
                    $("#riwayat-penyakit-dalam-keluarga").text(
                        assesment.riwayat_penyakit_keluarga || "-"
                    );
                    $("#pemeriksaan-multi-organ").text(
                        assesment.pemeriksaan_multi_organ || "-"
                    );
                    $("#kepala-dan-leher-toraks").text(assesment.toraks || "-");
                    $("#jantung").text(assesment.jantung || "-");
                    $("#abdomen").text(assesment.abdomen || "-");
                    $("#genitalia-dan-anus").text(
                        assesment.genetalia_dan_anus || "-"
                    );
                    $("#hasil-pemeriksaan-penunjang").text(
                        assesment.hasil_pemeriksaan_penunjang || "-"
                    );
                    $("#daftar-masalah-diagnosis-medik").text(
                        assesment.daftar_masalah_medik || "-"
                    );
                    $("#tata-laksana-awal").text(
                        assesment.tata_laksana_awal || "-"
                    );
                    $("#tanggal-pemberian").text(
                        assesment.tanggal_pemberian || "-"
                    );

                    // Tampilkan elemen yang mungkin tersembunyi
                    $("#p_s_asdok").show();
                } else {
                    console.error(
                        "Data asesmen tidak ditemukan dalam respons."
                    );
                }
            },
            error: function (xhr, status, error) {
                console.error("Terjadi kesalahan: ", error);
            },
        });
    }

    function getEdukasiDokter() {
        $.ajax({
            url: $dom + "/api/edukasi-dokter",
            type: "GET",
            data: {
                reg_no: regno,
            },
            success: function (response) {
                console.log(response); // Periksa apakah data diterima dengan benar
                if (response) {
                    // Isi form dengan data yang diterima
                    $("#edukasi_diagnosa_penyebab_dokter_").val(
                        response.edukasi_diagnosa_penyebab_dokter
                    );
                    $("#tgl_diagnosa_penyebab_dokter_").val(
                        response.tgl_diagnosa_penyebab_dokter
                    );

                    $("#edukasi_penatalaksanaan_dokter_").val(
                        response.edukasi_penatalaksanaan_dokter
                    );
                    $("#tgl_penatalaksanaan_dokter_").val(
                        response.tgl_penatalaksanaan_dokter
                    );

                    $("#edukasi_prosedur_diagnostik_dokter_").val(
                        response.edukasi_prosedur_diagnostik_dokter
                    );
                    $("#tgl_prosedur_diagnostik_dokter_").val(
                        response.tgl_prosedur_diagnostik_dokter
                    );

                    $("#edukasi_manajemen_nyeri_dokter_").val(
                        response.edukasi_manajemen_nyeri_dokter
                    );
                    $("#tgl_manajemen_nyeri_dokter_").val(
                        response.tgl_manajemen_nyeri_dokter
                    );

                    $("#edukasi_lain_lain_dokter_").val(
                        response.edukasi_lain_lain_dokter
                    );
                    $("#tgl_lain_lain_dokter").val(
                        response.tgl_lain_lain_dokter
                    );

                    // Set radio buttons untuk tingkat pemahaman
                    $(
                        `input[name="tingkat_paham_diagnosa_penyebab_dokter"][value="${response.tingkat_paham_diagnosa_penyebab_dokter}"]`
                    ).prop("checked", true);
                    $(
                        `input[name="tingkat_paham_penatalaksanaan_dokter"][value="${response.tingkat_paham_penatalaksanaan_dokter}"]`
                    ).prop("checked", true);
                    $(
                        `input[name="tingkat_paham_prosedur_diagnostik_dokter"][value="${response.tingkat_paham_prosedur_diagnostik_dokter}"]`
                    ).prop("checked", true);
                    $(
                        `input[name="tingkat_paham_manajemen_nyeri_dokter"][value="${response.tingkat_paham_manajemen_nyeri_dokter}"]`
                    ).prop("checked", true);
                    $(
                        `input[name="tingkat_paham_lain_lain_dokter"][value="${response.tingkat_paham_lain_lain_dokter}"]`
                    ).prop("checked", true);

                    $("#tingkat_paham_lain_lain_text_dokter_").val(
                        response.tingkat_paham_lain_lain_text_dokter
                    );

                    // Isi metode edukasi
                    $("#metode_edukasi_diagnosa_penyebab_dokter_").val(
                        response.metode_edukasi_diagnosa_penyebab_dokter
                    );
                    $("#metode_edukasi_penatalaksanaan_dokter_").val(
                        response.metode_edukasi_penatalaksanaan_dokter
                    );
                    $("#metode_edukasi_prosedur_diagnostik_dokter").val(
                        response.metode_edukasi_prosedur_diagnostik_dokter
                    );
                    $("#metode_edukasi_manajemen_nyeri_dokter_").val(
                        response.metode_edukasi_manajemen_nyeri_dokter
                    );
                    $("#edukasi_lain_lain_dokter_").val(
                        response.metode_edukasi_lain_lain_dokter
                    );

                    // Isi tanda tangan jika ada
                    if (response.ttd_dokter) {
                        $("#signature_edukator_dokter").attr(
                            "src",
                            response.ttd_dokter
                        );
                    }
                    if (response.ttd_pasien) {
                        $("#signature_sasaran_dokter").attr(
                            "src",
                            response.ttd_pasien
                        );
                    }

                    // Isi nama edukator dan sasaran
                    $("#nama_edukator_dokter").val(response.nama_edukator);
                    $("#nama_sasaran_dokter").val(response.nama_sasaran);
                }
            },
            error: function (xhr, status, error) {
                console.error("Terjadi kesalahan:", error);
            },
        });
    }

    function initTablePenunjang() {
        return $("#table-riwayat-penunjang").DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: $dom + "/api/getRiwayatPenunjang",
                type: "GET",
                data: function (d) {
                    d.regno = regno;
                },
                cache: true,
                error: function (xhr, error, thrown) {
                    console.log("Ajax error:", error);
                    console.log("XHR:", xhr);
                    console.log("Thrown:", thrown);
                    alert(
                        "Terjadi kesalahan saat memuat data. Silakan cek konsol browser untuk detail."
                    );
                },
                dataSrc: function (json) {
                    return json.data.filter(function (item) {
                        return (
                            item.jenis_order.toLowerCase() === "lab" ||
                            item.jenis_order.toLowerCase() === "radiologi"
                        );
                    });
                },
            },
            columns: [
                {
                    data: null,
                    render: function (data, type, row) {
                        if (
                            row.jenis_order.toLowerCase() === "lab" ||
                            row.jenis_order.toLowerCase() === "radiologi"
                        ) {
                            var url =
                                row.jenis_order.toLowerCase() === "lab"
                                    ? $dom +
                                      "/dokter/getHasillab?orderNo=" +
                                      row.order_no
                                    : $dom +
                                      "/dokter/getHasilRad?orderNo=" +
                                      row.order_no;
                            return (
                                '<button class="btn btn-sm btn-info view-detail" data-url="' +
                                url +
                                '">Detail</button>'
                            );
                        } else {
                            return '<button class="btn btn-sm btn-info view-detail" disabled>Detail</button>';
                        }
                    },
                },
                { data: "order_no" },
                { data: "waktu_order" },
                { data: "jenis_order" },
                { data: "nama_dokter" },
            ],
        });
    }

    function initTableRiwayatSoap() {
        return $("#table-riwayat-soaper").DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: $dom + "/api/getRiwayatSoap",
                type: "GET",
                data: function (d) {
                    d.regno = regno;
                },
                cache: true,
                error: function (xhr, error, thrown) {
                    console.log("Ajax error:", error);
                    console.log("XHR:", xhr);
                    console.log("Thrown:", thrown);
                    alert(
                        "Terjadi kesalahan saat memuat data. Silakan cek konsol browser untuk detail."
                    );
                },
            },
            columns: [
                { data: "tanggal_kunjungan" },
                {
                    data: "ppa",
                    render: function (data, type, row) {
                        let contentRoleSoap = "";
                        if (row.bertindak_sebagai) {
                            let roleSoap = JSON.parse(row.bertindak_sebagai);
                            if (roleSoap) {
                                contentRoleSoap = roleSoap.join(", ");
                            }
                        }
                        return (
                            data +
                            (contentRoleSoap
                                ? "<br><br>(" + contentRoleSoap + ")"
                                : row.is_dokter
                                ? "<br><br><b>( Dokter )</b>"
                                : "<br><br><b>( Perawat )</b>")
                        );
                    },
                },
                {
                    data: "pemeriksaan",
                    render: function (data, type, row) {
                        let html =
                            "<b>(S)</b> " +
                            (data.S || "") +
                            "<br><br>" +
                            "<b>(O)</b> " +
                            (data.O || "") +
                            "<br><br>" +
                            "<b>(A)</b> " +
                            (data.A || "") +
                            "<br><br>" +
                            "<b>(P)</b> " +
                            (data.P || "") +
                            "<br><br>";

                        html += "<b>Tindakan Penunjang & Obat :</b><br>";
                        ["lab", "radiologi", "obat", "lainnya"].forEach(
                            function (jenis) {
                                if (
                                    row.tindakan_penunjang[jenis] &&
                                    row.tindakan_penunjang[jenis].length > 0
                                ) {
                                    html +=
                                        "<br><b>" +
                                        jenis.charAt(0).toUpperCase() +
                                        jenis.slice(1) +
                                        "</b><br>";
                                    row.tindakan_penunjang[jenis].forEach(
                                        function (item) {
                                            html +=
                                                "- " + item.item_name + "<br>";
                                        }
                                    );
                                }
                            }
                        );

                        return html;
                    },
                },
                { data: "instruksi_ppa" },
            ],
        });
    }

    function initTableRiwayatObat() {
        return $("#table-riwayat-obat").DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: $dom + "/api/getRiwayatObat",
                type: "GET",
                data: function (d) {
                    d.regno = regno;
                },
                cache: true,
                error: function (xhr, error, thrown) {
                    console.log("Ajax error:", error);
                    console.log("XHR:", xhr);
                    console.log("Thrown:", thrown);
                    alert(
                        "Terjadi kesalahan saat memuat data. Silakan cek konsol browser untuk detail."
                    );
                },
            },
            columns: [
                { data: "waktu_order" },
                { data: "item_name" },
                { data: "qty" },
                { data: "aturan_pakai" },
                { data: "keterangan" },
                { data: "dpjp" },
            ],
        });
    }

    function triggerRiwayatDokter() {
        $("#tab-riwayat")
            .off("click")
            .on("click", function () {
                if (!tablesInitialized) {
                    initAllTables();
                    tablesInitialized = true;
                }
            });
    }

    let tablesInitialized = false;

    function initAllTables() {
        tablePenunjang = initTablePenunjang();
        tableRiwayatSoap = initTableRiwayatSoap();
        tableRiwayatObat = initTableRiwayatObat();
        getAssesmentAwalDokter();
        getEdukasiDokter();
    }

    $(".reload-penunjang").on("click", function () {
        tablePenunjang.ajax.reload();
    });

    $("#table-riwayat-penunjang").on("click", ".view-detail", function () {
        var data = tablePenunjang.row($(this).parents("tr")).data();
        var url = $(this).data("url");

        if (url) {
            $("#resultModal iframe").attr("src", url);
            $("#resultModal").modal("show");
        } else {
            console.log("Detail for order:", data.order_no);
        }
    });

    $(".reload-soap").on("click", function () {
        tableRiwayatSoap.ajax.reload();
    });

    $(".reload-obat").on("click", function () {
        tableRiwayatObat.ajax.reload();
    });

    $(".reload-edukasi").on("click", function () {
        getEdukasiDokter();
    });

    triggerRiwayatDokter();
});
