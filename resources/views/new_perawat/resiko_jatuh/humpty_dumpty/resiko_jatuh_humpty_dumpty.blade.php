<style>
    .table1 {
        width: 100%;
        border-collapse: collapse;
    }

    .table1 td {
        vertical-align: top;
        padding: 8px;
    }

    .radio-container {
        display: flex;
        align-items: center;
        /* Membuat checkbox dan label sejajar secara vertikal */
    }

    .radio-container input[type="checkbox"] {
        margin-right: 10px;
        /* Jarak antara checkbox dan label */
    }

    .table1 td:first-child {
        width: 40%;
        /* Atur lebar kolom pertama */
    }

    .table1 td:nth-child(2) {
        width: 70%;
        /* Atur lebar kolom kedua untuk teks lebih panjang */
    }
</style>

<div class="container">
    <div class="card card-primary">
        <h3 class="card-title mt-3 ml-3">LEMBAR MONITORING PENCEGAHAN PASIEN JATUH HUMPTY DUMPTY</h3>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-info mr-5" data-toggle="modal"
                data-target="#resikoJatuhModalHumptyDumpty">
                History
            </button>
        </div>

        <form id="entry-resiko-jatuh-humpty_dumpty">
            @csrf
            <div id="body-form" class="card-body">
                <div class="card-header">
                    <h3>Penilaian Risiko Jatuh Pasien Humty Dumpty</h3>
                </div>
                <table class="table1" id="humpty_dumpty_table">
                    <tbody>
                        <tr>
                            <td>Umur</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" id="umur_3thn" name="humpty_dumpty_umur" value="4">
                                    <label for="umur_3thn">a. &lt; 3 tahun</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="umur_3-6thn" name="humpty_dumpty_umur" value="3">
                                    <label for="umur_3-6thn">b. 3-6 tahun</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="umur_7-13thn" name="humpty_dumpty_umur" value="2">
                                    <label for="umur_7-13thn">c. 7-13 tahun</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="umur_13thn" name="humpty_dumpty_umur" value="1">
                                    <label for="umur_13thn">d. 13 tahun</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" id="laki_laki" name="humpty_dumpty_jenis_kelamin"
                                        value="2">
                                    <label for="laki_laki">a. Laki-laki</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="perempuan" name="humpty_dumpty_jenis_kelamin"
                                        value="1">
                                    <label for="perempuan">b. Perempuan</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Diagnosis</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" id="diagnosa_neurologi" name="humpty_dumpty_diagnosis"
                                        value="4">
                                    <label for="diagnosa_neurologi">a. Diagnosa neurologi</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="diagonosi_gangguan" name="humpty_dumpty_diagnosis"
                                        value="3">
                                    <label for="diagonosi_gangguan">b. Gangguan oksigenisasi</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="diagnosis_perilaku" name="humpty_dumpty_diagnosis"
                                        value="2">
                                    <label for="diagnosis_perilaku">c. Gangguan perilaku/jiwa</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="diagnosis_lain" name="humpty_dumpty_diagnosis"
                                        value="1">
                                    <label for="diagnosis_lain">d. Diagnosa lain-lain</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Gangguan Kognitif</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" id="tidak_waspada" name="humpty_dumpty_gangguan_kognitif"
                                        value="3">
                                    <label for="tidak_waspada">a. Tidak waspada terhadap keterbatasan</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="lupa_keterbatasan" name="humpty_dumpty_gangguan_kognitif"
                                        value="2">
                                    <label for="lupa_keterbatasan">b. Lupa akan keterbatasannya</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="berorientasi_diri" name="humpty_dumpty_gangguan_kognitif"
                                        value="1">
                                    <label for="berorientasi_diri">c. Berorientasi terhadap kemampuan diri</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Faktor Lingkungan</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" id="riwayat_jatuh_tidur"
                                        name="humpty_dumpty_faktor_lingkungan" value="4">
                                    <label for="riwayat_jatuh_tidur">a. Riwayat jatuh/bayi/anak-anak berada di tempat
                                        tidur dewasa</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="menggunakan_alat_bantu"
                                        name="humpty_dumpty_faktor_lingkungan" value="3">
                                    <label for="menggunakan_alat_bantu">b. Pasien menggunakan alat bantu</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="berada_tempat_tidur"
                                        name="humpty_dumpty_faktor_lingkungan" value="2">
                                    <label for="berada_tempat_tidur">c. Pasien berada di tempat tidur</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="area_rajal" name="humpty_dumpty_faktor_lingkungan"
                                        value="1">
                                    <label for="area_rajal">d. Area rawat jalan</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Respon Terhadap Anastesi</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" id="24jam"
                                        name="humpty_dumpty_respon_terhadap_anastesi" value="3">
                                    <label for="24jam">a. Dalam 24 jam</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="48jam"
                                        name="humpty_dumpty_respon_terhadap_anastesi" value="2">
                                    <label for="48jam">b. Dalam 48 jam</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="lebih48jam"
                                        name="humpty_dumpty_respon_terhadap_anastesi" value="1">
                                    <label for="lebih48jam">c. &gt; 48 jam/tidak</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Gangguan Obat-obatan</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" id="obat_risiko_tinggi_ya"
                                        name="humpty_dumpty_gangguan_obat" value="3">
                                    <label for="obat_risiko_tinggi_ya">a. Penggunaan: Sedatives, Hypnotics, Laxatives,
                                        Diuretics, Narcotics</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="obat_risiko_tinggi_tidak"
                                        name="humpty_dumpty_gangguan_obat" value="2">
                                    <label for="obat_risiko_tinggi_tidak">b. Satu dari obat tersebut di atas</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="obat_risiko_tinggi_lain"
                                        name="humpty_dumpty_gangguan_obat" value="1">
                                    <label for="obat_risiko_tinggi_lain">c. Tidak ada</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Total Skor Risiko Jatuh Humpty Dumpty : <label
                                    id="total_skor_humpty_dumpty"></td>
                        </tr>
                        <tr>
                            <td>Kategori Golongan Resiko Jatuh</td>
                            <td>
                                <div class="radio-container">
                                    <input type="radio" id="kategori_rendah_humpty_dumpty"
                                        name="kategori_humpty_dumpty" value="Resiko Rendah / RR (0-1)">
                                    <label for="kategori_rendah_humpty_dumpty">Resiko Rendah / RR (0-1)</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="kategori_sedang_humpty_dumpty"
                                        name="kategori_humpty_dumpty" value="Resiko Sedang / RS (2-3)">
                                    <label for="kategori_sedang_humpty_dumpty">Resiko Sedang / RS (2-3)</label>
                                </div>
                                <div class="radio-container">
                                    <input type="radio" id="kategori_tinggi_humpty_dumpty"
                                        name="kategori_humpty_dumpty" value="Resiko Tinggi / RT (4-5)">
                                    <label for="kategori_tinggi_humpty_dumpty">Resiko Tinggi / RT (4-5)</label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="card-header">
                    <h3>INTERVENSI PENCEGAHAN PASIEN HUMPTY DUMPTY</h3>
                </div>

                <table class="table1 w-100">
                    <!-- Risiko Rendah -->
                    <tr>
                        <td rowspan="14">
                            <h4>INTERVENSI JATUH RISIKO RENDAH</h4>
                        </td>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_rendah[]"
                                value="Orientasikan pasien ke ruangan" id="rendahdumpty1">
                            <label for="rendahdumpty1">Orientasikan pasien ke ruangan</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_rendah[]"
                                value="Mengatur tempat tidur pada posisi rendah dan terkunci" id="rendahdumpty2">
                            <label for="rendahdumpty2">Mengatur tempat tidur pada posisi rendah dan terkunci</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_rendah[]"
                                value="Pastikan pengaman tempat tidur selalu tertutup saat pasien tidur"
                                id="rendahdumpty3">
                            <label for="rendahdumpty3">Pastikan pengaman tempat tidur selalu tertutup saat pasien
                                tidur</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_rendah[]"
                                value="Menggunakan tempat tidur berpagar 2-4 x, memperhatikan untuk setiap celah 3 yang dapat membuat ekstremims/bagian tubuh lain terperangkap, mempertimbangkan penggunaan tindakan pencegahan keamanan tambahan, seperti guling"
                                id="rendahdumpty4">
                            <label for="rendahdumpty4">Menggunakan tempat tidur berpagar 2-4 x, memperhatikan untuk
                                setiap celah 3 yang dapat membuat ekstremims/bagian tubuh lain terperangkap,
                                mempertimbangkan penggunaan tindakan pencegahan keamanan tambahan, seperti
                                guling</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_rendah[]"
                                value="Kepala dan kaki berada dalm tempat tidur" id="rendahdumpty5">
                            <label for="rendahdumpty5">Kepala dan kaki berada dalm tempat tidur</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_rendah[]"
                                value="Menggunakan alas kaki non-slip untuk pasien ambulasi, menggunakan pakatan ukuran sesuai dengan badan untuk mencegah tersandung "
                                id="rendahdumpty6">
                            <label for="rendahdumpty6">Menggunakan alas kaki non-slip untuk pasien ambulasi,
                                menggunakan pakatan ukuran sesuai dengan badan untuk mencegah tersandung </label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_rendah[]"
                                value="Menilai kebutuhan eliminasi, membantu apabila dibutuhkan" id="rendahdumpty7">
                            <label for="rendahdumpty7">Menilai kebutuhan eliminasi, membantu apabila dibutuhkan</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_rendah[]"
                                value="Jika anak berjalan dengan menggunakan riang infus, pastikan peralatan medis ditempatkan dekat dengan pusat tiang dan garis aman"
                                id="rendahdumpty8">
                            <label for="rendahdumpty8">Jika anak berjalan dengan menggunakan riang infus, pastikan
                                peralatan medis ditempatkan dekat dengan pusat tiang dan garis aman</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_rendah[]"
                                value="Pastikan bel pemanggil dan lampu mudah dijangkau, jelaskan fungsinya kepada pasien dan keluarga"
                                id="rendahdumpty9">
                            <label for="rendahdumpty9">Pastikan bel pemanggil dan lampu mudah dijangkau, jelaskan
                                fungsinya kepada pasien dan keluarga</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_rendah[]"
                                value="Pastikan lingkungan bersih dari peralatan yang tidak digunakan, menjauhkan perabotan mebel, dan area tempat tidur bebas dari hazard"
                                id="rendahdumpty10">
                            <label for="rendahdumpty10">Pastikan lingkungan bersih dari peralatan yang tidak digunakan,
                                menjauhkan perabotan mebel, dan area tempat tidur bebas dari hazard</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_rendah[]"
                                value="Gorden ditarik supaya anak terlihat jelas" id="rendahdumpty11">
                            <label for="rendahdumpty11">Gorden ditarik supaya anak terlihat jelas</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_rendah[]"
                                value="Menilai penerangan yang adekuat, biarkan lampu hidup di malam hari"
                                id="rendahdumpty12">
                            <label for="rendahdumpty12">Menilai penerangan yang adekuat, biarkan lampu hidup di malam
                                hari</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_rendah[]"
                                value="Pastikan anak dan keluarga mendapatkan penjelasan tentang resiko jatuh"
                                id="rendahdumpty13">
                            <label for="rendahdumpty13">Pastikan anak dan keluarga mendapatkan penjelasan tentang
                                resiko jatuh</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_rendah[]"
                                value="Dokumentasikan pengajaran/penjelasan pencegahan jatuh ke dalam catatan kemajuan klinis dan termasuk rencana perawatan yang sesuai"
                                id="rendahdumpty14">
                            <label for="rendahdumpty14">Dokumentasikan pengajaran/penjelasan pencegahan jatuh ke dalam
                                catatan kemajuan klinis dan termasuk rencana perawatan yang sesuai</label>
                        </td>
                    </tr>

                    <!-- Risiko Tinggi -->
                    <tr>
                        <td rowspan="11">
                            <h4>INTERVENSI JATUH RISIKO TINGGI</h4>
                        </td>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_tinggi[]"
                                value="Mengidentifikasi pasien dengan tanda humpty dumpty di luar pintu pasien"
                                id="tinggi1">
                            <label for="tinggi1">Mengidentifikasi pasien dengan tanda "humpty dumpty" di luar pintu
                                pasien</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_tinggi[]"
                                value="Mengidentifikasi pasien dengan gelang berwarna kuning" id="tinggi2">
                            <label for="tinggi2">Mengidentifikasi pasien dengan gelang berwarna kuning</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_tinggi[]"
                                value="Menerapkan senua tindakan untuk anak jatuh resiko rendah" id="tinggi3">
                            <label for="tinggi3">Menerapkan senua tindakan untuk anak jatuh resiko rendah</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_tinggi[]"
                                value="Mendidik anak dan orangtua tentang protokol intervensi jatuh" id="tinggi4">
                            <label for="tinggi4">Mendidik anak dan orangtua tentang protokol intervensi jatuh</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_tinggi[]"
                                value="Cek anak minimal setiap jam jika mereka tanpa pengawasan" id="tinggi5">
                            <label for="tinggi5">Cek anak minimal setiap jam jika mereka tanpa pengawasan</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_tinggi[]"
                                value="Menemani anak ketika mereka ambulasi" id="tinggi6">
                            <label for="tinggi6">Menemani anak ketika mereka ambulasi</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_tinggi[]"
                                value="Menempatkan anak pada tempat tidur berukuran sesuai dengan tahapan"
                                id="tinggi7">
                            <label for="tinggi7">Menempatkan anak pada tempat tidur berukuran sesuai dengan
                                tahapan</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_tinggi[]"
                                value="perkembangan (tempar tidur yang rendah)" id="tinggi8">
                            <label for="tinggi8">perkembangan (tempar tidur yang rendah)</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_tinggi[]"
                                value="Pertimbangkan memindahkan anak ke dekat counter perawat" id="tinggi9">
                            <label for="tinggi9">Pertimbangkan memindahkan anak ke dekat counter perawat</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_tinggi[]"
                                value="menilai waktu administrasi obat-obatan" id="tinggi10">
                            <label for="tinggi10">Menilai waktu administrasi obat-obatan</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_humpty_dumpty_tinggi[]"
                                value="Pastikan pinta terbuka setiap saat kecuali tindakan pencerahan isolasi"
                                id="tinggi11">
                            <label for="tinggi11">Pastikan pinta terbuka setiap saat kecuali tindakan pencerahan
                                isolasi</label>
                        </td>
                    </tr>
                </table>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary"
                        onclick="addresikojatuhHumptyDumpty()">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function hitung() {
        let totalScore = 0;

        // Iterate over checked radio buttons in the humpty_dumpty_table
        $("#humpty_dumpty_table input[type='radio']:checked").each(function() {
            let score = parseInt($(this).val(), 10); // Specify radix 10
            if (!isNaN(score)) {
                totalScore += score;
            }
        });

        // Update the total score display
        $("#total_skor_humpty_dumpty").text(totalScore);

        // Determine and set the appropriate category based on total score
        if (totalScore >= 4) {
            $("#kategori_tinggi_humpty_dumpty").prop("checked", true);
        } else if (totalScore >= 2) {
            $("#kategori_sedang_humpty_dumpty").prop("checked", true);
        } else {
            $("#kategori_rendah_humpty_dumpty").prop("checked", true);
        }
    }

    // Bind the change event to radio buttons within the humpty_dumpty_table
    $("#humpty_dumpty_table input[type='radio']").on("change", function() {
        hitung();
    });
</script>
@include('new_perawat.resiko_jatuh.humpty_dumpty.history_resiko_jatuh_humpty_dumpty')
@include('new_perawat.resiko_jatuh.humpty_dumpty.detail_history_resiko_jatuh_humpty_dumpty')
