$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {
    //assesment awal
    function getAssesmentNeonatus() {
        $.ajax({
            url: $dom + "/api/perawat/assesment-neonatus",
            type: "GET",
            data: {
                reg_no: regno,
            },
            success: function (response) {
                console.log(response);
                if (response.status) {
                    $("#tgl-assesment").text(response.data.created_at);
                    $("#table-awal-neonatus #riwayat_penyakit_ibu").text(
                        response.data.riwayat_penyakit_ibu
                    );
                    $("#table-awal-neonatus #jenis_kelamin").text(
                        response.data.jenis_kelamin
                    );
                    $("#table-awal-neonatus #berat_fisik").text(
                        response.data.berat_fisik
                    );
                    $("#table-awal-neonatus #panjang_fisik").text(
                        response.data.panjang_fisik
                    );
                    $("#table-awal-neonatus #lingkar_kepala").text(
                        response.data.lingkar_kepala
                    );
                    $("#table-awal-neonatus #lingkar_perut").text(
                        response.data.lingkar_perut
                    );
                    $("#table-awal-neonatus #aktifitas").text(
                        response.data.aktifitas
                    );
                    $("#table-awal-neonatus #tangis").text(
                        response.data.tangis
                    );
                    $("#table-awal-neonatus #refleks_hisap").text(
                        response.data.refleks_hisap
                    );
                    $("#table-awal-neonatus #anemia").text(
                        response.data.anemia
                    );
                    $("#table-awal-neonatus #ikterus").text(
                        response.data.ikterus
                    );
                    $("#table-awal-neonatus #sianosis").text(
                        response.data.sianosis
                    );
                    $("#table-awal-neonatus #dispnoe").text(
                        response.data.dispnoe
                    );
                    $("#table-awal-neonatus #denyut_jantung").text(
                        response.data.denyut_jantung
                    );
                    $("#table-awal-neonatus #pernafasan").text(
                        response.data.pernafasan
                    );
                    $("#table-awal-neonatus #temperatur").text(
                        response.data.temperatur
                    );
                    $("#table-awal-neonatus #spesifik_kepala").text(
                        response.data.spesifik_kepala
                    );
                    $("#table-awal-neonatus #spesifik_kepala_ket").text(
                        response.data.spesifik_kepala_ket
                    );
                    $("#table-awal-neonatus #spesifik_leher").text(
                        response.data.spesifik_leher
                    );
                    $("#table-awal-neonatus #spesifik_thoraks").text(
                        response.data.spesifik_thoraks
                    );
                    $("#table-awal-neonatus #spesifik_abdomen").text(
                        response.data.spesifik_abdomen
                    );
                    $("#table-awal-neonatus #spesifik_ekstremitas").text(
                        response.data.spesifik_ekstremitas
                    );
                    $("#table-awal-neonatus #spesifik_anus").text(
                        response.data.spesifik_anus
                    );
                    $("#table-awal-neonatus #spesifik_genitalia").text(
                        response.data.spesifik_genitalia
                    );
                    $("#table-awal-neonatus #spesifik_penunjang").text(
                        response.data.spesifik_penunjang
                    );
                    $("#table-awal-neonatus #spesifik_daftar_masalah").text(
                        response.data.spesifik_daftar_masalah
                    );
                    $("#table-awal-neonatus #spesifik_tata_laksana").text(
                        response.data.spesifik_tata_laksana
                    );

                    $("#table-nyeri-eliminasi-neonatus #ekspresi").text(
                        response.data.ekspresi
                    );
                    $("#table-nyeri-eliminasi-neonatus #menangis").text(
                        response.data.menangis
                    );
                    $("#table-nyeri-eliminasi-neonatus #pola_nafas").text(
                        response.data.pola_nafas
                    );
                    $("#table-nyeri-eliminasi-neonatus #lengan").text(
                        response.data.lengan
                    );
                    $("#table-nyeri-eliminasi-neonatus #kaki").text(
                        response.data.kaki
                    );
                    $("#table-nyeri-eliminasi-neonatus #rangsangan").text(
                        response.data.rangsangan
                    );
                    $("#table-nyeri-eliminasi-neonatus #heart_rate").text(
                        response.data.heart_rate
                    );
                    $("#table-nyeri-eliminasi-neonatus #saturasi_oksigen").text(
                        response.data.saturasi_oksigen
                    );
                    $("#table-nyeri-eliminasi-neonatus #frekuensi_bab").text(
                        response.data.frekuensi_bab
                    );
                    $("#table-nyeri-eliminasi-neonatus #frekuensi_bab_no").text(
                        response.data.frekuensi_bab_no
                    );
                    $("#table-nyeri-eliminasi-neonatus #gangguan_bab").text(
                        response.data.gangguan_bab
                    );
                    $("#table-nyeri-eliminasi-neonatus #gangguan_bab_ket").text(
                        response.data.gangguan_bab_ket
                    );
                    $("#table-nyeri-eliminasi-neonatus #karakter_bab").text(
                        response.data.karakter_bab
                    );
                    $(
                        "#table-nyeri-eliminasi-neonatus #frekuensi_bab_hari"
                    ).text(response.data.frekuensi_bab_hari);
                    $(
                        "#table-nyeri-eliminasi-neonatus #frekuensi_bab_jumlah"
                    ).text(response.data.frekuensi_bab_jumlah);
                    $("#table-nyeri-eliminasi-neonatus #warna_feces").text(
                        response.data.warna_feces
                    );
                    $("#table-nyeri-eliminasi-neonatus #warna_urin").text(
                        response.data.warna_urin
                    );
                    $("#table-nyeri-eliminasi-neonatus #bahasa").text(
                        response.data.bahasa
                    );
                    $("#table-nyeri-eliminasi-neonatus #bahasa_lain").text(
                        response.data.bahasa_lain
                    );
                    $("#table-nyeri-eliminasi-neonatus #penerjemah_ortu").text(
                        response.data.penerjemah_ortu
                    );
                    $("#table-nyeri-eliminasi-neonatus #hambatan_ortu").text(
                        response.data.hambatan_ortu
                    );
                    $(
                        "#table-nyeri-eliminasi-neonatus #hambatan_ortu_lain"
                    ).text(response.data.hambatan_ortu_lain);
                    $("#table-nyeri-eliminasi-neonatus #edukasi_ortu").text(
                        response.data.edukasi_ortu
                    );
                    $("#table-nyeri-eliminasi-neonatus #edukasi_ortu_ket").text(
                        response.data.edukasi_ortu_ket
                    );
                }
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            },
        });
    }

    function getAssesmentAnak() {
        $.ajax({
            url: $dom + "/api/perawat/assesment-anak",
            type: "GET",
            data: {
                reg_no: regno,
            },
            success: function (response) {
                // console.log(response);
                if (response.status) {
                    $("#tgl-assesment").text(response.data.created_at);
                    $("#riwayat-assesment-anak #alergi").text(
                        yaTidakParser(response.data.alergi)
                    );
                    $("#riwayat-assesment-anak #alergi_obat").text(
                        response.data.alergi_obat
                    );
                    $("#riwayat-assesment-anak #reaksi_alergi_obat").text(
                        response.data.reaksi_alergi_obat
                    );
                    $("#riwayat-assesment-anak #alergi_makanan").text(
                        response.data.alergi_makanan
                    );
                    $("#riwayat-assesment-anak #reaksi_alergi_makanan").text(
                        response.data.reaksi_alergi_makanan
                    );
                    $("#riwayat-assesment-anak #alergi_lainnya").text(
                        response.data.alergi_lainnya
                    );
                    $("#riwayat-assesment-anak #reaksi_alergi_lainnya").text(
                        response.data.reaksi_alergi_lainnya
                    );
                    $("#riwayat-assesment-anak #kesadaran").text(
                        response.data.kesadaran
                    );
                    $("#riwayat-assesment-anak #kondisi_umum").text(
                        response.data.kondisi_umum
                    );
                    $("#riwayat-assesment-anak #kondisi_umum_lainnya").text(
                        response.data.kondisi_umum_lainnya
                    );
                    $(
                        "#riwayat-assesment-anak #kondisi_umum_lainnya_text"
                    ).text(response.data.kondisi_umum_lainnya_text);
                    $("#riwayat-assesment-anak #tekanan_darah").text(
                        response.data.tekanan_darah
                    );
                    $("#riwayat-assesment-anak #nadi").text(response.data.nadi);
                    $("#riwayat-assesment-anak #suhu").text(response.data.suhu);
                    $("#riwayat-assesment-anak #pernafasan").text(
                        response.data.pernafasan
                    );
                    $("#riwayat-assesment-anak #tinggi_badan").text(
                        response.data.tinggi_badan
                    );
                    $("#riwayat-assesment-anak #berat_badan").text(
                        response.data.berat_badan
                    );
                    $("#riwayat-assesment-anak #kebutuhan_khusus").text(
                        response.data.kebutuhan_khusus
                    );
                    $("#riwayat-assesment-anak #kebutuhan_khusus_lainnya").text(
                        response.data.kebutuhan_khusus_lainnya
                    );
                    $("#riwayat-assesment-anak #status_emosional").text(
                        response.data.status_emosional
                    );
                    $("#riwayat-assesment-anak #status_emosi_lainnya").text(
                        response.data.status_emosi_lainnya
                    );
                    $("#riwayat-assesment-anak #merokok").text(
                        yaTidakParser(response.data.merokok)
                    );
                    $("#riwayat-assesment-anak #frekuensi_merokok").text(
                        response.data.frekuensi_merokok
                    );
                    $("#riwayat-assesment-anak #alkohol").text(
                        yaTidakParser(response.data.alkohol)
                    );
                    $("#riwayat-assesment-anak #riwayat_gangguan_jiwa").text(
                        yaTidakParser(response.data.riwayat_gangguan_jiwa)
                    );
                    $("#riwayat-assesment-anak #gangguan_jiwa_waktu").text(
                        response.data.gangguan_jiwa_waktu
                    );

                    $("#riwayat-assesment-anak #sex").text(response.data.sex);
                    $("#riwayat-assesment-anak #age").text(response.data.age);
                    $("#riwayat-assesment-anak #depresi").text(
                        response.data.depresi
                    );
                    $("#riwayat-assesment-anak #suicide").text(
                        response.data.suicide
                    );
                    $("#riwayat-assesment-anak #alcohol").text(
                        response.data.alcohol
                    );
                    $("#riwayat-assesment-anak #thinking_loss").text(
                        response.data.thinking_loss
                    );
                    $("#riwayat-assesment-anak #separated").text(
                        response.data.separated
                    );
                    $("#riwayat-assesment-anak #organized_plan").text(
                        response.data.organized_plan
                    );
                    $("#riwayat-assesment-anak #no_social_support").text(
                        response.data.no_social_support
                    );
                    $("#riwayat-assesment-anak #sickness").text(
                        response.data.sickness
                    );
                    $("#riwayat-assesment-anak #skor_sad_person").text(
                        response.data.skor_sad_person
                    );
                    $("#riwayat-assesment-anak #kategori").text(
                        kategoriSadPersonParser(response.data.kategori)
                    );

                    $("#riwayat-assesment-anak #riwayat_bunuh_diri").text(
                        yaTidakParser(response.data.riwayat_bunuh_diri)
                    );
                    $("#riwayat-assesment-anak #riwayat_bunuh_diri_ket").text(
                        response.data.riwayat_bunuh_diri_ket
                    );
                    $("#riwayat-assesment-anak #riwayat_trauma_psikis").text(
                        response.data.riwayat_trauma_psikis
                    );
                    $("#riwayat-assesment-anak #tindakan_kriminal_ket").text(
                        response.data.tindakan_kriminal_ket
                    );
                    $(
                        "#riwayat-assesment-anak #riwayat_trauma_psikis_ket"
                    ).text(response.data.riwayat_trauma_psikis_ket);
                    $(
                        "#riwayat-assesment-anak #riwayat_trauma_psikis_detail_lain_text"
                    ).text(
                        response.data.riwayat_trauma_psikis_detail_lain_text
                    );
                    $("#riwayat-assesment-anak #hambatan_sosial_ekonomi").text(
                        yaTidakParser(response.data.hambatan_sosial_ekonomi)
                    );
                    $("#riwayat-assesment-anak #konseling_spiritual").text(
                        yaTidakParser(response.data.konseling_spiritual)
                    );
                    $("#riwayat-assesment-anak #konseling_spiritual_ket").text(
                        response.data.konseling_spiritual_ket
                    );
                    $("#riwayat-assesment-anak #bantuan_ibadah").text(
                        yaTidakParser(response.data.bantuan_ibadah)
                    );
                    $("#riwayat-assesment-anak #bantuan_ibadah_ket").text(
                        response.data.bantuan_ibadah_ket
                    );

                    $("#riwayat-assesment-anak #resiko_riwayat_ibu").text(
                        yaTidakParser(response.data.resiko_riwayat_ibu)
                    );
                    $("#riwayat-assesment-anak #list_res_riwayat_ibu").text(
                        response.data.list_res_riwayat_ibu
                    );
                    $("#riwayat-assesment-anak #res_ibu_ket_infeksi").text(
                        response.data.res_ibu_ket_infeksi
                    );
                    $("#riwayat-assesment-anak #perinatal").text(
                        yaTidakParser(response.data.perinatal)
                    );
                    $("#riwayat-assesment-anak #perinatal_detail").text(
                        response.data.perinatal_detail
                    );
                    $("#riwayat-assesment-anak #postnatal").text(
                        yaTidakParser(response.data.postnatal)
                    );
                    $("#riwayat-assesment-anak #list_postnatal").text(
                        response.data.list_postnatal
                    );
                    $("#riwayat-assesment-anak #hospitalisasi").text(
                        response.data.hospitalisasi
                    );
                    $("#riwayat-assesment-anak #hospitalisasi_lainnya").text(
                        response.data.hospitalisasi_lainnya
                    );
                    $("#riwayat-assesment-anak #hospitalisasi_times").text(
                        response.data.hospitalisasi_times
                    );
                    $("#riwayat-assesment-anak #pola_asuh").text(
                        response.data.pola_asuh
                    );
                    $("#riwayat-assesment-anak #org_terdekat").text(
                        response.data.org_terdekat
                    );
                    $("#riwayat-assesment-anak #org_terdekat_lainnya").text(
                        response.data.org_terdekat_lainnya
                    );
                    $("#riwayat-assesment-anak #tipe_anak").text(
                        response.data.tipe_anak
                    );
                    $("#riwayat-assesment-anak #tipe_anak_lainnya").text(
                        response.data.tipe_anak_lainnya
                    );
                    $("#riwayat-assesment-anak #perilaku_unik").text(
                        yaTidakParser(response.data.perilaku_unik)
                    );
                    $("#riwayat-assesment-anak #perilaku_unik_lainnya").text(
                        response.data.perilaku_unik_lainnya
                    );
                    $("#riwayat-assesment-anak #pekerjaan_ayah").text(
                        response.data.pekerjaan_ayah
                    );
                    $("#riwayat-assesment-anak #pekerjaan_ibu").text(
                        response.data.pekerjaan_ibu
                    );

                    $("#riwayat-assesment-anak #rangsang_bab").text(
                        response.data.rangsang_bab
                    );
                    $("#riwayat-assesment-anak #rangsang_bab").text(
                        response.data.rangsang_bab
                    );
                    $("#riwayat-assesment-anak #membersihkan_diri").text(
                        response.data.membersihkan_diri
                    );
                    $("#riwayat-assesment-anak #penggunaan_wc").text(
                        response.data.penggunaan_wc
                    );
                    $("#riwayat-assesment-anak #makan_minum").text(
                        response.data.makan_minum
                    );
                    $("#riwayat-assesment-anak #bergerak_kursi_roda").text(
                        response.data.bergerak_kursi_roda
                    );
                    $("#riwayat-assesment-anak #berjalan").text(
                        response.data.berjalan
                    );
                    $("#riwayat-assesment-anak #berpakaian").text(
                        response.data.berpakaian
                    );
                    $("#riwayat-assesment-anak #tangga").text(
                        response.data.tangga
                    );
                    $("#riwayat-assesment-anak #mandi").text(
                        response.data.mandi
                    );
                    $("#riwayat-assesment-anak #total_skor_adl").text(
                        response.data.total_skor_adl
                    );
                    $(
                        "#riwayat-assesment-anak #kategori_status_fungsional"
                    ).text(
                        kategoriAdlParser(
                            response.data.kategori_status_fungsional
                        )
                    );

                    $("#riwayat-assesment-anak #rentang_gerak").text(
                        yaTidakParser(response.data.rentang_gerak)
                    );
                    $("#riwayat-assesment-anak #deformitas").text(
                        yaTidakParser(response.data.deformitas)
                    );
                    $("#riwayat-assesment-anak #deformitas_text").text(
                        response.data.deformitas_text
                    );
                    $("#riwayat-assesment-anak #gangguan_tidur").text(
                        yaTidakParser(response.data.gangguan_tidur)
                    );
                    $("#riwayat-assesment-anak #gangguan_tidur_text").text(
                        response.data.gangguan_tidur_text
                    );
                    $("#riwayat-assesment-anak #keluhan_nutrisi").text(
                        parseUnderscoreToSpace(response.data.keluhan_nutrisi)
                    );
                    $("#riwayat-assesment-anak #rasa_haus_berlebih").text(
                        yaTidakParser(response.data.rasa_haus_berlebih)
                    );
                    $("#riwayat-assesment-anak #mukosa_mulut").text(
                        response.data.mukosa_mulut
                    );
                    $("#riwayat-assesment-anak #turgor_kulit").text(
                        response.data.turgor_kulit
                    );
                    $("#riwayat-assesment-anak #endema").text(
                        yaTidakParser(response.data.endema)
                    );

                    $("#riwayat-assesment-anak-gizi #tampak_kurus").text(
                        response.data.tampak_kurus
                    );
                    $("#riwayat-assesment-anak-gizi #penurunan_bb").text(
                        response.data.penurunan_bb
                    );
                    $("#riwayat-assesment-anak-gizi #kondisi_anak").text(
                        response.data.kondisi_anak
                    );
                    $("#riwayat-assesment-anak-gizi #resiko_malnutrisi").text(
                        response.data.resiko_malnutrisi
                    );
                    $("#riwayat-assesment-anak-gizi #skor_gizi_anak").text(
                        response.data.skor_gizi_anak
                    );
                    $("#riwayat-assesment-anak-gizi #kategori_gizi").text(
                        response.data.kategori_gizi
                    );
                    $("#riwayat-assesment-anak-gizi #sebab_malnutrisi").text(
                        JSON.parse(response.data.sebab_malnutrisi)
                    );
                    $(
                        "#riwayat-assesment-anak-gizi #sebab_malnutrisi_lain"
                    ).text(response.data.sebab_malnutrisi_lain);

                    $("#riwayat-assesment-anak-nyeri #skala_wong_baker").text(
                        yaTidakParser(response.data.skala_wong_baker)
                    );
                    $("#riwayat-assesment-anak-nyeri #nyeri_skala").text(
                        response.data.nyeri_skala
                    );
                    $("#riwayat-assesment-anak-nyeri #merasa_nyeri").text(
                        yaTidakParser(response.data.merasa_nyeri)
                    );
                    $("#riwayat-assesment-anak-nyeri #lokasi_nyeri").text(
                        response.data.lokasi_nyeri
                    );
                    $("#riwayat-assesment-anak-nyeri #detail_skala_nyeri").text(
                        response.data.detail_skala_nyeri
                    );
                    $("#riwayat-assesment-anak-nyeri #durasi_nyeri").text(
                        response.data.durasi_nyeri
                    );
                    $("#riwayat-assesment-anak-nyeri #frekuensi_nyeri").text(
                        response.data.frekuensi_nyeri
                    );
                    $("#riwayat-assesment-anak-nyeri #pencetus_nyeri").text(
                        response.data.pencetus_nyeri
                    );
                    $("#riwayat-assesment-anak-nyeri #tipe_nyeri").text(
                        response.data.tipe_nyeri
                    );
                    $("#riwayat-assesment-anak-nyeri #menjalar_ket").text(
                        response.data.menjalar_ket
                    );
                    $("#riwayat-assesment-anak-nyeri #ekspresi_wajah").text(
                        response.data.ekspresi_wajah
                    );
                    $("#riwayat-assesment-anak-nyeri #skala_flacc").text(
                        yaTidakParser(response.data.skala_flacc)
                    );
                    $("#riwayat-assesment-anak-nyeri #wajah").text(
                        response.data.wajah
                    );
                    $("#riwayat-assesment-anak-nyeri #ekstremitas").text(
                        response.data.ekstremitas
                    );
                    $("#riwayat-assesment-anak-nyeri #gerakan").text(
                        response.data.gerakan
                    );
                    $("#riwayat-assesment-anak-nyeri #menangis").text(
                        response.data.menangis
                    );
                    $("#riwayat-assesment-anak-nyeri #ketenangan").text(
                        response.data.ketenangan
                    );
                    $("#riwayat-assesment-anak-nyeri #total_skor_flacc").text(
                        response.data.total_skor_flacc
                    );
                }
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            },
        });
    }

    function getAssesmentObgyn() {
        $.ajax({
            url: $dom + "/api/perawat/assesment-obgyn",
            type: "GET",
            data: {
                reg_no: regno,
            },
            success: function (response) {
                // console.log(response);
                if (response.status) {
                    $("#tgl-assesment").text(response.data.created_at);
                    $("#riwayat-assesment-obgyn #alergi").text(
                        response.data.alergi
                    );
                    $("#riwayat-assesment-obgyn #alergi_obat").text(
                        response.data.alergi_obat
                    );
                    $("#riwayat-assesment-obgyn #bentuk_reaksi_obat").text(
                        response.data.bentuk_reaksi_obat
                    );
                    $("#riwayat-assesment-obgyn #alergi_makanan").text(
                        response.data.alergi_makanan
                    );
                    $("#riwayat-assesment-obgyn #bentuk_reaksi_makanan").text(
                        response.data.bentuk_reaksi_makanan
                    );
                    $("#riwayat-assesment-obgyn #alergi_lainnya").text(
                        response.data.alergi_lainnya
                    );
                    $("#riwayat-assesment-obgyn #bentuk_reaksi_lainnya").text(
                        response.data.bentuk_reaksi_lainnya
                    );
                    $("#riwayat-assesment-obgyn #kesadaran").text(
                        response.data.kesadaran
                    );
                    $("#riwayat-assesment-obgyn #kondisi_umum").text(
                        response.data.kondisi_umum
                    );
                    $(
                        "#riwayat-assesment-obgyn #kondisi_umum_lainnya_text"
                    ).text(response.data.kondisi_umum_lainnya_text);
                    $("#riwayat-assesment-obgyn #tekanan_darah").text(
                        response.data.tekanan_darah
                    );
                    $("#riwayat-assesment-obgyn #nadi").text(
                        response.data.nadi
                    );
                    $("#riwayat-assesment-obgyn #suhu").text(
                        response.data.suhu
                    );
                    $("#riwayat-assesment-obgyn #pernafasan").text(
                        response.data.pernafasan
                    );
                    $("#riwayat-assesment-obgyn #tinggi_badan").text(
                        response.data.tinggi_badan
                    );
                    $("#riwayat-assesment-obgyn #berat_badan").text(
                        response.data.berat_badan
                    );
                    $("#riwayat-assesment-obgyn #kebutuhan_khusus").text(
                        response.data.kebutuhan_khusus
                    );
                    $(
                        "#riwayat-assesment-obgyn #kebutuhan_khusus_lainnya_text"
                    ).text(response.data.kebutuhan_khusus_lainnya_text);

                    $("#riwayat-assesment-obgyn #status_emosional").text(
                        response.data.status_emosional
                    );
                    $("#riwayat-assesment-obgyn #status_emosional_text").text(
                        response.data.status_emosional_text
                    );
                    $("#riwayat-assesment-obgyn #merokok").text(
                        response.data.merokok
                    );
                    $("#riwayat-assesment-obgyn #frekuensi_merokok").text(
                        response.data.frekuensi_merokok
                    );
                    $("#riwayat-assesment-obgyn #minuman_alkohol").text(
                        response.data.minuman_alkohol
                    );
                    $("#riwayat-assesment-obgyn #riwayat_gangguan_jiwa").text(
                        response.data.riwayat_gangguan_jiwa
                    );

                    $("#riwayat-assesment-obgyn #sex").text(response.data.sex);
                    $("#riwayat-assesment-obgyn #age").text(response.data.age);
                    $("#riwayat-assesment-obgyn #depresi").text(
                        response.data.depresi
                    );
                    $("#riwayat-assesment-obgyn #suicide").text(
                        response.data.suicide
                    );
                    $("#riwayat-assesment-obgyn #alcohol").text(
                        response.data.alcohol
                    );
                    $("#riwayat-assesment-obgyn #thinking_loss").text(
                        response.data.thinking_loss
                    );
                    $("#riwayat-assesment-obgyn #separated").text(
                        response.data.separated
                    );
                    $("#riwayat-assesment-obgyn #organized_plan").text(
                        response.data.organized_plan
                    );
                    $("#riwayat-assesment-obgyn #no_support").text(
                        response.data.no_support
                    );
                    $("#riwayat-assesment-obgyn #sickness").text(
                        response.data.sickness
                    );
                    $("#riwayat-assesment-obgyn #skor_sad_person").text(
                        response.data.skor_sad_person
                    );
                    $("#riwayat-assesment-obgyn #kategori_sad_person").text(
                        response.data.kategori_sad_person
                    );

                    $("#riwayat-assesment-obgyn #riwayat_bunuh_diri").text(
                        response.data.riwayat_bunuh_diri
                    );
                    $("#riwayat-assesment-obgyn #riwayat_bunuh_diri_text").text(
                        response.data.riwayat_bunuh_diri_text
                    );
                    $("#riwayat-assesment-obgyn #riwayat_trauma_psikis").text(
                        response.data.riwayat_trauma_psikis
                    );
                    $(
                        "#riwayat-assesment-obgyn #riwayat_trauma_psikis_detail"
                    ).text(response.data.riwayat_trauma_psikis_detail);
                    $(
                        "#riwayat-assesment-obgyn #riwayat_trauma_psikis_detail_kriminal_text"
                    ).text(
                        response.data.riwayat_trauma_psikis_detail_kriminal_text
                    );
                    $(
                        "#riwayat-assesment-obgyn #riwayat_trauma_psikis_detail_lain_text"
                    ).text(
                        response.data.riwayat_trauma_psikis_detail_lain_text
                    );
                    $("#riwayat-assesment-obgyn #hambatan_sosial_ekonomi").text(
                        response.data.hambatan_sosial_ekonomi
                    );
                    $("#riwayat-assesment-obgyn #konseling_spiritual").text(
                        response.data.konseling_spiritual
                    );
                    $(
                        "#riwayat-assesment-obgyn #konseling_spiritual_text"
                    ).text(response.data.konseling_spiritual_text);
                    $("#riwayat-assesment-obgyn #bantuan_ibadah").text(
                        response.data.bantuan_ibadah
                    );
                    $("#riwayat-assesment-obgyn #bantuan_ibadah_text").text(
                        response.data.bantuan_ibadah_text
                    );

                    $("#riwayat-assesment-obgyn #umur_menarche").text(
                        response.data.umur_menarche
                    );
                    $("#riwayat-assesment-obgyn #lamanya_haid").text(
                        response.data.lamanya_haid
                    );
                    $("#riwayat-assesment-obgyn #jumlah_darah_haid").text(
                        response.data.jumlah_darah_haid
                    );
                    $("#riwayat-assesment-obgyn #hpht").text(
                        response.data.hpht
                    );
                    $("#riwayat-assesment-obgyn #tp").text(response.data.tp);
                    $("#riwayat-assesment-obgyn #gangguan_haid").text(
                        response.data.gangguan_haid
                    );
                    $("#riwayat-assesment-obgyn #gangguan_haid_text").text(
                        response.data.gangguan_haid_text
                    );
                    $("#riwayat-assesment-obgyn #status_kawin").text(
                        response.data.status_kawin
                    );
                    $("#riwayat-assesment-obgyn #usia_perkawinan").text(
                        response.data.usia_perkawinan
                    );
                    $("#riwayat-assesment-obgyn #jumlah_perkawinan").text(
                        response.data.jumlah_perkawinan
                    );

                    $("#riwayat-kehamilan-obgyn #tgl_tahun_partus").text(
                        response.data.tgl_tahun_partus
                    );
                    $("#riwayat-kehamilan-obgyn #tempat_partus").text(
                        response.data.tempat_partus
                    );
                    $("#riwayat-kehamilan-obgyn #umur_hamil").text(
                        response.data.umur_hamil
                    );
                    $("#riwayat-kehamilan-obgyn #jenis_persalinan").text(
                        response.data.jenis_persalinan
                    );
                    $("#riwayat-kehamilan-obgyn #penolong_persalinan").text(
                        response.data.penolong_persalinan
                    );
                    $("#riwayat-kehamilan-obgyn #penyulit").text(
                        response.data.penyulit
                    );
                    $("#riwayat-kehamilan-obgyn #bb_anak").text(
                        response.data.bb_anak
                    );
                    $("#riwayat-kehamilan-obgyn #keadaan_sekarang").text(
                        response.data.keadaan_sekarang
                    );

                    $("#riwayat-gizi-obgyn #asupan_makan").text(
                        response.data.asupan_makan
                    );
                    $("#riwayat-gizi-obgyn #gangguan_metabolisme").text(
                        response.data.gangguan_metabolisme
                    );
                    $("#riwayat-gizi-obgyn #pertambahan_bb").text(
                        response.data.pertambahan_bb
                    );
                    $("#riwayat-gizi-obgyn #nilai_hb").text(
                        response.data.nilai_hb
                    );
                    $("#riwayat-gizi-obgyn #total_skor_gizi_obgyn").text(
                        response.data.total_skor_gizi_obgyn
                    );
                    $("#riwayat-gizi-obgyn #kategori_gizi").text(
                        response.data.kategori_gizi
                    );

                    $("#riwayat-nyeri-obgyn #nyeri_skala").text(
                        response.data.nyeri_skala
                    );
                    $("#riwayat-nyeri-obgyn #skala_wong_baker").text(
                        response.data.skala_wong_baker
                    );
                    $("#riwayat-nyeri-obgyn #onset").text(response.data.onset);
                    $("#riwayat-nyeri-obgyn #pencetus_nyeri").text(
                        response.data.pencetus_nyeri
                    );
                    $("#riwayat-nyeri-obgyn #tipe_nyeri").text(
                        response.data.tipe_nyeri
                    );
                    $("#riwayat-nyeri-obgyn #menjalar").text(
                        response.data.menjalar
                    );
                    $("#riwayat-nyeri-obgyn #skala_nyeri").text(
                        response.data.skala_nyeri
                    );
                    $("#riwayat-nyeri-obgyn #treatment").text(
                        response.data.treatment
                    );
                    $("#riwayat-nyeri-obgyn #understanding").text(
                        response.data.understanding
                    );
                    $("#riwayat-nyeri-obgyn #value").text(response.data.value);
                    $("#riwayat-nyeri-obgyn #bps").text(response.data.bps);
                    $("#riwayat-nyeri-obgyn #ekspresi_wajah").text(
                        response.data.ekspresi_wajah
                    );
                    $("#riwayat-nyeri-obgyn #ekstremitas_atas").text(
                        response.data.ekstremitas_atas
                    );
                    $("#riwayat-nyeri-obgyn #compliance_ventilator").text(
                        response.data.compliance_ventilator
                    );
                    $("#riwayat-nyeri-obgyn #skor_total_bps").text(
                        response.data.skor_total_bps
                    );

                    $("#riwayat-fungsional-obgyn #bab").text(response.data.bab);
                    $("#riwayat-fungsional-obgyn #bak").text(response.data.bak);
                    $("#riwayat-fungsional-obgyn #membersihkan_diri").text(
                        response.data.membersihkan_diri
                    );
                    $("#riwayat-fungsional-obgyn #wc").text(response.data.wc);
                    $("#riwayat-fungsional-obgyn #makan_minum").text(
                        response.data.makan_minum
                    );
                    $("#riwayat-fungsional-obgyn #bergerak").text(
                        response.data.bergerak
                    );
                    $("#riwayat-fungsional-obgyn #berjalan").text(
                        response.data.berjalan
                    );
                    $("#riwayat-fungsional-obgyn #berpakaian").text(
                        response.data.berpakaian
                    );
                    $("#riwayat-fungsional-obgyn #tangga").text(
                        response.data.tangga
                    );
                    $("#riwayat-fungsional-obgyn #mandi").text(
                        response.data.mandi
                    );
                    $("#riwayat-fungsional-obgyn #total_skor_adl").text(
                        response.data.total_skor_adl
                    );
                    $("#riwayat-fungsional-obgyn #nilai_aks").text(
                        response.data.nilai_aks
                    );
                    $("#riwayat-fungsional-obgyn #kategori_perawatan").text(
                        response.data.kategori_perawatan
                    );

                    $("#riwayat-kulit-obgyn #persepsi_sensori").text(
                        response.data.persepsi_sensori
                    );
                    $("#riwayat-kulit-obgyn #kelembaban").text(
                        response.data.kelembaban
                    );
                    $("#riwayat-kulit-obgyn #aktivitas").text(
                        response.data.aktivitas
                    );
                    $("#riwayat-kulit-obgyn #mobilitas").text(
                        response.data.mobilitas
                    );
                    $("#riwayat-kulit-obgyn #nutrisi").text(
                        response.data.nutrisi
                    );
                    $("#riwayat-kulit-obgyn #friksi_gesekan").text(
                        response.data.friksi_gesekan
                    );
                    $("#riwayat-kulit-obgyn #total_parameter").text(
                        response.data.total_parameter
                    );
                    $("#riwayat-kulit-obgyn #skor_braden").text(
                        response.data.skor_braden
                    );
                    $("#riwayat-kulit-obgyn #resiko_braden").text(
                        response.data.resiko_braden
                    );
                    $("#riwayat-kulit-obgyn #terdapat_luka").text(
                        response.data.terdapat_luka
                    );
                    $("#riwayat-kulit-obgyn #lokasi_luka").attr(
                        "src",
                        response.data.lokasi_luka
                    );

                    $("#riwayat-kulit-obgyn #rentang_gerak").text(
                        response.data.rentang_gerak
                    );
                    $("#riwayat-kulit-obgyn #deformitas").text(
                        response.data.deformitas
                    );
                    $("#riwayat-kulit-obgyn #deformitas_text").text(
                        response.data.deformitas_text
                    );
                    $("#riwayat-kulit-obgyn #gangguan_tidur").text(
                        response.data.gangguan_tidur
                    );
                    $("#riwayat-kulit-obgyn #gangguan_tidur_text").text(
                        response.data.gangguan_tidur_text
                    );
                    $("#riwayat-kulit-obgyn #keluhan_nutrisi").text(
                        response.data.keluhan_nutrisi
                    );
                    $("#riwayat-kulit-obgyn #rasa_haus_berlebih").text(
                        response.data.rasa_haus_berlebih
                    );
                    $("#riwayat-kulit-obgyn #mukosa_mulut").text(
                        response.data.mukosa_mulut
                    );
                    $("#riwayat-kulit-obgyn #turgor_kulit").text(
                        response.data.turgor_kulit
                    );
                    $("#riwayat-kulit-obgyn #endema").text(
                        response.data.endema
                    );
                    $("#riwayat-kulit-obgyn #frekuensi_bab").text(
                        response.data.frekuensi_bab
                    );
                    $("#riwayat-kulit-obgyn #keluhan_bab").text(
                        response.data.keluhan_bab
                    );
                    $("#riwayat-kulit-obgyn #keluhan_bab_text").text(
                        response.data.keluhan_bab_text
                    );
                    $("#riwayat-kulit-obgyn #karakteristik_feces").text(
                        response.data.karakteristik_feces
                    );
                    $("#riwayat-kulit-obgyn #warna_feces").text(
                        response.data.warna_feces
                    );
                    $("#riwayat-kulit-obgyn #frekuensi_bak").text(
                        response.data.frekuensi_bak
                    );
                    $("#riwayat-kulit-obgyn #jumlah_bak").text(
                        response.data.jumlah_bak
                    );
                    $("#riwayat-kulit-obgyn #warna_urin").text(
                        response.data.warna_urin
                    );
                    $("#riwayat-kulit-obgyn #keluhan_bak").text(
                        response.data.keluhan_bak
                    );
                    $("#riwayat-kulit-obgyn #keluhan_bak_lainnya").text(
                        response.data.keluhan_bak_lainnya
                    );
                }
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
            },
        });
    }

    function getAssesmentDewasa() {
        $.ajax({
            url: $dom + "/api/perawat/assesment-dewasa",
            type: "GET",
            data: {
                reg_no: regno,
            },
            success: function (response) {
                // console.log(response);
                if (response.status) {
                    $("#tgl-assesment").text(response.data.created_at);
                    $("#riwayat-assesment-dewasa #age").text(response.data.age);
                    $("#riwayat-assesment-dewasa #alcohol").text(
                        response.data.alcohol
                    );
                    $("#riwayat-assesment-dewasa #alergi").text(
                        response.data.alergi
                    );
                    $("#riwayat-assesment-dewasa #alergi_lainnya").text(
                        response.data.alergi_lainnya
                    );
                    $("#riwayat-assesment-dewasa #alergi_makanan").text(
                        response.data.alergi_makanan
                    );
                    $("#riwayat-assesment-dewasa #alergi_obat").text(
                        response.data.alergi_obat
                    );
                    $("#riwayat-assesment-dewasa #bab").text(response.data.bab);
                    $("#riwayat-assesment-dewasa #bak").text(response.data.bak);
                    $("#riwayat-assesment-dewasa #bantuan_ibadah").text(
                        response.data.bantuan_ibadah
                    );
                    $("#riwayat-assesment-dewasa #bantuan_ibadah_text").text(
                        response.data.bantuan_ibadah_text
                    );
                    $("#riwayat-assesment-dewasa #bentuk_reaksi_lainnya").text(
                        response.data.bentuk_reaksi_lainnya
                    );
                    $("#riwayat-assesment-dewasa #bentuk_reaksi_makanan").text(
                        response.data.bentuk_reaksi_makanan
                    );
                    $("#riwayat-assesment-dewasa #bentuk_reaksi_obat").text(
                        response.data.bentuk_reaksi_obat
                    );
                    $("#riwayat-assesment-dewasa #berat_badan").text(
                        response.data.berat_badan
                    );
                    $("#riwayat-assesment-dewasa #bergerak").text(
                        response.data.bergerak
                    );
                    $("#riwayat-assesment-dewasa #berjalan").text(
                        response.data.berjalan
                    );
                    $("#riwayat-assesment-dewasa #berpakaian").text(
                        response.data.berpakaian
                    );
                    $("#riwayat-assesment-dewasa #deformitas").text(
                        response.data.deformitas
                    );
                    $("#riwayat-assesment-dewasa #deformitas_text").text(
                        response.data.deformitas_text
                    );
                    $("#riwayat-assesment-dewasa #depresi").text(
                        response.data.depresi
                    );
                    $("#riwayat-assesment-dewasa #diberitahukan_jam").text(
                        response.data.diberitahukan_jam
                    );
                    $("#riwayat-assesment-dewasa #diberitahukan_kpd").text(
                        response.data.diberitahukan_kpd
                    );
                    $("#riwayat-assesment-dewasa #diberitahukan_status").text(
                        response.data.diberitahukan_status
                    );
                    $("#riwayat-assesment-dewasa #endema").text(
                        response.data.endema
                    );
                    $("#riwayat-assesment-dewasa #frekuensi_bab").text(
                        response.data.frekuensi_bab
                    );
                    $("#riwayat-assesment-dewasa #frekuensi_bak").text(
                        response.data.frekuensi_bak
                    );
                    $("#riwayat-assesment-dewasa #frekuensi_merokok").text(
                        response.data.frekuensi_merokok
                    );
                    $("#riwayat-assesment-dewasa #gangguan_tidur").text(
                        response.data.gangguan_tidur
                    );
                    $("#riwayat-assesment-dewasa #gangguan_tidur_text").text(
                        response.data.gangguan_tidur_text
                    );
                    $(
                        "#riwayat-assesment-dewasa #hambatan_sosial_ekonomi"
                    ).text(response.data.hambatan_sosial_ekonomi);
                    $("#riwayat-assesment-dewasa #jumlah_bak").text(
                        response.data.jumlah_bak
                    );
                    $("#riwayat-assesment-dewasa #karakteristik_feces").text(
                        response.data.karakteristik_feces
                    );
                    $("#riwayat-assesment-dewasa #kategori_perawatan").text(
                        response.data.kategori_perawatan
                    );
                    $("#riwayat-assesment-dewasa #kategori_sad_person").text(
                        response.data.kategori_sad_person
                    );
                    $("#riwayat-assesment-dewasa #kebutuhan_khusus").text(
                        response.data.kebutuhan_khusus
                    );
                    $(
                        "#riwayat-assesment-dewasa #kebutuhan_khusus_lainnya_text"
                    ).text(response.data.kebutuhan_khusus_lainnya_text);
                    $("#riwayat-assesment-dewasa #keluhan_bab").text(
                        response.data.keluhan_bab
                    );
                    $("#riwayat-assesment-dewasa #keluhan_bab_text").text(
                        response.data.keluhan_bab_text
                    );
                    $("#riwayat-assesment-dewasa #keluhan_bak").text(
                        response.data.keluhan_bak
                    );
                    $("#riwayat-assesment-dewasa #keluhan_bak_lainnya").text(
                        response.data.keluhan_bak_lainnya
                    );
                    $("#riwayat-assesment-dewasa #keluhan_nutrisi").text(
                        response.data.keluhan_nutrisi
                    );
                    $("#riwayat-assesment-dewasa #kesadaran").text(
                        response.data.kesadaran
                    );
                    $("#riwayat-assesment-dewasa #kondisi_umum").text(
                        response.data.kondisi_umum
                    );
                    $(
                        "#riwayat-assesment-dewasa #kondisi_umum_lainnya_text"
                    ).text(response.data.kondisi_umum_lainnya_text);
                    $("#riwayat-assesment-dewasa #konseling_spiritual").text(
                        response.data.konseling_spiritual
                    );
                    $(
                        "#riwayat-assesment-dewasa #konseling_spiritual_text"
                    ).text(response.data.konseling_spiritual_text);
                    $("#riwayat-assesment-dewasa #makan_minum").text(
                        response.data.makan_minum
                    );
                    $("#riwayat-assesment-dewasa #mandi").text(
                        response.data.mandi
                    );
                    $("#riwayat-assesment-dewasa #membersihkan_diri").text(
                        response.data.membersihkan_diri
                    );
                    $("#riwayat-assesment-dewasa #merokok").text(
                        response.data.merokok
                    );
                    $("#riwayat-assesment-dewasa #minuman_alkohol").text(
                        response.data.minuman_alkohol
                    );
                    $("#riwayat-assesment-dewasa #mukosa_mulut").text(
                        response.data.mukosa_mulut
                    );
                    $("#riwayat-assesment-dewasa #nadi").text(
                        response.data.nadi
                    );
                    $("#riwayat-assesment-dewasa #nilai_aks").text(
                        response.data.nilai_aks
                    );
                    $("#riwayat-assesment-dewasa #no_support").text(
                        response.data.no_support
                    );
                    $("#riwayat-assesment-dewasa #organized_plan").text(
                        response.data.organized_plan
                    );
                    $("#riwayat-assesment-dewasa #pekerjaan").text(
                        response.data.pekerjaan
                    );
                    $("#riwayat-assesment-dewasa #pernafasan").text(
                        response.data.pernafasan
                    );
                    $("#riwayat-assesment-dewasa #rasa_haus_berlebih").text(
                        response.data.rasa_haus_berlebih
                    );
                    $("#riwayat-assesment-dewasa #rentang_gerak").text(
                        response.data.rentang_gerak
                    );
                    $("#riwayat-assesment-dewasa #riwayat_bunuh_diri").text(
                        response.data.riwayat_bunuh_diri
                    );
                    $(
                        "#riwayat-assesment-dewasa #riwayat_bunuh_diri_text"
                    ).text(response.data.riwayat_bunuh_diri_text);
                    $("#riwayat-assesment-dewasa #riwayat_gangguan_jiwa").text(
                        response.data.riwayat_gangguan_jiwa
                    );
                    $("#riwayat-assesment-dewasa #riwayat_trauma_psikis").text(
                        response.data.riwayat_trauma_psikis
                    );
                    $(
                        "#riwayat-assesment-dewasa #riwayat_trauma_psikis_detail"
                    ).text(response.data.riwayat_trauma_psikis_detail);
                    $(
                        "#riwayat-assesment-dewasa #riwayat_trauma_psikis_detail_kriminal_text"
                    ).text(
                        response.data.riwayat_trauma_psikis_detail_kriminal_text
                    );
                    $(
                        "#riwayat-assesment-dewasa #riwayat_trauma_psikis_detail_lain_text"
                    ).text(
                        response.data.riwayat_trauma_psikis_detail_lain_text
                    );
                    $("#riwayat-assesment-dewasa #separated").text(
                        response.data.separated
                    );
                    $("#riwayat-assesment-dewasa #sex").text(response.data.sex);
                    $("#riwayat-assesment-dewasa #sickness").text(
                        response.data.sickness
                    );
                    $("#riwayat-assesment-dewasa #skor_sad_person").text(
                        response.data.skor_sad_person
                    );
                    $("#riwayat-assesment-dewasa #status_emosional").text(
                        response.data.status_emosional
                    );
                    $("#riwayat-assesment-dewasa #status_emosional_text").text(
                        response.data.status_emosional_text
                    );
                    $("#riwayat-assesment-dewasa #suhu").text(
                        response.data.suhu
                    );
                    $("#riwayat-assesment-dewasa #suicide").text(
                        response.data.suicide
                    );
                    $("#riwayat-assesment-dewasa #tangga").text(
                        response.data.tangga
                    );
                    $("#riwayat-assesment-dewasa #tekanan_darah").text(
                        response.data.tekanan_darah
                    );
                    $("#riwayat-assesment-dewasa #thinking_loss").text(
                        response.data.thinking_loss
                    );
                    $("#riwayat-assesment-dewasa #tinggi_badan").text(
                        response.data.tinggi_badan
                    );
                    $("#riwayat-assesment-dewasa #total_skor_adl").text(
                        response.data.total_skor_adl
                    );
                    $("#riwayat-assesment-dewasa #turgor_kulit").text(
                        response.data.turgor_kulit
                    );
                    $("#riwayat-assesment-dewasa #warna_feces").text(
                        response.data.warna_feces
                    );
                    $("#riwayat-assesment-dewasa #warna_urin").text(
                        response.data.warna_urin
                    );
                    $("#riwayat-assesment-dewasa #wc").text(response.data.wc);

                    $("#riwayat-assesment-dewasa-nyeri #nyeri_skala").text(
                        response.data.nyeri_skala
                    );
                    $("#riwayat-assesment-dewasa-nyeri #skala_wong_baker").text(
                        response.data.skala_wong_baker
                    );
                    $("#riwayat-assesment-dewasa-nyeri #onset").text(
                        response.data.onset
                    );
                    $("#riwayat-assesment-dewasa-nyeri #pencetus_nyeri").text(
                        response.data.pencetus_nyeri
                    );
                    $("#riwayat-assesment-dewasa-nyeri #tipe_nyeri").text(
                        response.data.tipe_nyeri
                    );
                    $("#riwayat-assesment-dewasa-nyeri #menjalar").text(
                        response.data.menjalar
                    );
                    $("#riwayat-assesment-dewasa-nyeri #skala_nyeri").text(
                        response.data.skala_nyeri
                    );
                    $("#riwayat-assesment-dewasa-nyeri #treatment").text(
                        response.data.treatment
                    );
                    $("#riwayat-assesment-dewasa-nyeri #understanding").text(
                        response.data.understanding
                    );
                    $("#riwayat-assesment-dewasa-nyeri #value").text(
                        response.data.value
                    );
                    $("#riwayat-assesment-dewasa-nyeri #bps").text(
                        response.data.bps
                    );
                    $("#riwayat-assesment-dewasa-nyeri #ekspresi_wajah").text(
                        response.data.ekspresi_wajah
                    );
                    $("#riwayat-assesment-dewasa-nyeri #ekstremitas_atas").text(
                        response.data.ekstremitas_atas
                    );
                    $(
                        "#riwayat-assesment-dewasa-nyeri #compliance_ventilator"
                    ).text(response.data.compliance_ventilator);
                    $("#riwayat-assesment-dewasa-nyeri #skor_total_bps").text(
                        response.data.skor_total_bps
                    );

                    if (
                        response.data.penurunan_bb ||
                        response.data.penurunan_bb_jumlah
                    ) {
                        $("#riwayat-assesment-dewasa-gizi #penurunan_bb").text(
                            response.data.penurunan_bb
                                ? response.data.penurunan_bb
                                : ""
                        );
                        $(
                            "#riwayat-assesment-dewasa-gizi #penurunan_bb_jumlah"
                        ).text(
                            response.data.penurunan_bb_jumlah
                                ? response.data.penurunan_bb_jumlah
                                : ""
                        );
                    }
                    $("#riwayat-assesment-dewasa-gizi #asupan_makan").text(
                        response.data.asupan_makan
                    );
                    $("#riwayat-assesment-dewasa-gizi #diagnosis_khusus").text(
                        response.data.diagnosis_khusus
                    );
                    $("#riwayat-assesment-dewasa-gizi #total_skor_gizi").text(
                        response.data.total_skor_gizi
                    );
                    $("#riwayat-assesment-dewasa-gizi #kategori_gizi").text(
                        response.data.kategori_gizi
                    );
                } else {
                    console.error("Gagal mengambil data");
                }
            },
        });
    }

    function loadAllFunctionRiwayat() {
        if (kategori_pasien === "dewasa") {
            getAssesmentDewasa();
        } else if (kategori_pasien === "kebidanan") {
            getAssesmentObgyn();
        } else if (kategori_pasien === "anak") {
            getAssesmentAnak();
        } else if (kategori_pasien === "bayi") {
            getAssesmentNeonatus();
        }
    }

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
        loadAllFunctionRiwayat();
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
