<div class="container">
    <div class="card card-primary">
        <h3 class="card-title mt-3 ml-3">LEMBAR MONITORING PENCEGAHAN PASIEN JATUH GERIATRI</h3>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-info mr-5" data-toggle="modal" data-target="#resikoJatuhModalGeriatri">
                History
            </button>
        </div>

        <form id="entry-resiko-jatuh-geriatri">
            @csrf
            <div id="body-form" class="card-body">

                <div class="card-header">
                    <h3>Penilaian Risiko Jatuh Pasien Geriatri</h3>
                </div>
                <table class="table1 w-100" id="geriatri_table">
                    <tbody>
                        <tr>
                            <td>Gangguan gaya berjalan (diseret, menghentak, berayun)</td>
                            <td>
                                <input type="radio" id="gangguan_berjalan_ya"
                                    name="resiko_jatuh_geriatri_gangguan_gaya_berjalan" value="4">
                                <label for="gangguan_berjalan_ya">Ya (4)</label>
                                <input type="radio" id="gangguan_berjalan_tidak"
                                    name="resiko_jatuh_geriatri_gangguan_gaya_berjalan" value="0">
                                <label for="gangguan_berjalan_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Pusing / pingsan pada posisi tegak</td>
                            <td>
                                <input type="radio" id="pusing_ya" name="resiko_jatuh_geriatri_pusing"
                                    value="3">
                                <label for="pusing_ya">Ya (3)</label>
                                <input type="radio" id="pusing_tidak" name="resiko_jatuh_geriatri_pusing"
                                    value="0">
                                <label for="pusing_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Kebingungan setiap saat</td>
                            <td>
                                <input type="radio" id="kebingungan_ya" name="resiko_jatuh_geriatri_kebingungan"
                                    value="3">
                                <label for="kebingungan_ya">Ya (3)</label>
                                <input type="radio" id="kebingungan_tidak" name="resiko_jatuh_geriatri_kebingungan"
                                    value="0">
                                <label for="kebingungan_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Nokturia / Inkontinen</td>
                            <td>
                                <input type="radio" id="nokturia_ya" name="resiko_jatuh_geriatri_nokturia"
                                    value="3">
                                <label for="nokturia_ya">Ya (3)</label>
                                <input type="radio" id="nokturia_tidak" name="resiko_jatuh_geriatri_nokturia"
                                    value="0">
                                <label for="nokturia_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Kebingungan Intermiten</td>
                            <td>
                                <input type="radio" id="kebingungan_intermiten_ya"
                                    name="resiko_jatuh_geriatri_kebingungan_intermiten" value="3">
                                <label for="kebingungan_intermiten_ya">Ya (3)</label>
                                <input type="radio" id="kebingungan_intermiten_tidak"
                                    name="resiko_jatuh_geriatri_kebingungan_intermiten" value="0">
                                <label for="kebingungan_intermiten_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Kelemahan Umum</td>
                            <td>
                                <input type="radio" id="kelemahan_ya" name="resiko_jatuh_geriatri_kelemahan_umum"
                                    value="2">
                                <label for="kelemahan_ya">Ya (2)</label>
                                <input type="radio" id="kelemahan_tidak"
                                    name="resiko_jatuh_geriatri_kelemahan_umum" value="0">
                                <label for="kelemahan_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Obat-obat berisiko tinggi (diuretik, narkotik, sedatif, anti psikotik,
                                laksatif, vasodilator, antiaritmia, anti hypertensi, obat hypoglikemik, antidepresan,
                                neuroleptik, NSAID)</td>
                            <td>
                                <input type="radio" id="obat_risiko_tinggi_ya"
                                    name="resiko_jatuh_geriatri_obat_beresiko_tinggi" value="2">
                                <label for="obat_risiko_tinggi_ya">Ya (2)</label>
                                <input type="radio" id="obat_risiko_tinggi_tidak"
                                    name="resiko_jatuh_geriatri_obat_beresiko_tinggi" value="0">
                                <label for="obat_risiko_tinggi_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Riwayat jatuh dalam waktu 12 bulan sebelumnya</td>
                            <td>
                                <input type="radio" id="riwayat_jatuh_ya"
                                    name="resiko_jatuh_geriatri_riwayat_jatuh_12_bulan" value="2">
                                <label for="riwayat_jatuh_ya">Ya (2)</label>
                                <input type="radio" id="riwayat_jatuh_tidak"
                                    name="resiko_jatuh_geriatri_riwayat_jatuh_12_bulan" value="0">
                                <label for="riwayat_jatuh_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Osteoporosis</td>
                            <td>
                                <input type="radio" id="osteoporosis_ya" name="resiko_jatuh_geriatri_osteoporosis"
                                    value="1">
                                <label for="osteoporosis_ya">Ya (1)</label>
                                <input type="radio" id="osteoporosis_tidak"
                                    name="resiko_jatuh_geriatri_osteoporosis" value="0">
                                <label for="osteoporosis_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Gangguan pendengaran dan atau penglihatan</td>
                            <td>
                                <input type="radio" id="gangguan_pendengaran_ya"
                                    name="resiko_jatuh_geriatri_pendengaran_dan_pengeliatan" value="1">
                                <label for="gangguan_pendengaran_ya">Ya (1)</label>
                                <input type="radio" id="gangguan_pendengaran_tidak"
                                    name="resiko_jatuh_geriatri_pendengaran_dan_pengeliatan" value="0">
                                <label for="gangguan_pendengaran_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Usia 70 tahun keatas</td>
                            <td>
                                <input type="radio" id="usia_70_keatas_ya"
                                    name="resiko_jatuh_geriatri_70_tahun_keatas" value="1">
                                <label for="usia_70_keatas_ya">Ya (1)</label>
                                <input type="radio" id="usia_70_keatas_tidak"
                                    name="resiko_jatuh_geriatri_70_tahun_keatas" value="0">
                                <label for="usia_70_keatas_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">Total Skor Risiko Jatuh Pasien Geriatri > 60 Tahun :
                            </td>
                            <td>
                                <label id="total_skor_geriatri">
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>Kategori Golongan Resiko Jatuh: </td>
                            <td>
                                <input type="radio" id="kategori_rendah_geriatri" name="kategori_geriatri"
                                    value="Resiko Rendah / RR (0-1)">
                                <label for="kategori_rendah_geriatri">Resiko Rendah / RR (0-1)</label> <br>
                                <input type="radio" id="kategori_sedang_geriatri" name="kategori_geriatri"
                                    value="Resiko Sedang / RS (2-3)">
                                <label for="kategori_sedang_geriatri">Resiko Sedang / RS (2-3)</label><br>
                                <input type="radio" id="kategori_tinggi_geriatri" name="kategori_geriatri"
                                    value="Resiko Tinggi / RR (>4)">
                                <label for="kategori_tinggi_geriatri">Resiko Tinggi / RR (>4)</label><br>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="card-header">
                    <h3>INTERVENSI PENCEGAHAN PASIEN JATUH GERIATRI</h3>
                </div>
                <table class="table1 w-100">
                    <!-- Risiko Rendah -->
                    <tr>
                        <td rowspan="3">
                            <h4>INTERVENSI JATUH RISIKO RENDAH</h4>
                        </td>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_rendah[]" value="Jelaskan dan letakkan protokol risiko jatuh di dekat pasien dan atau keluarga" id="rendah1">
                            <label for="rendah1">Jelaskan dan letakkan protokol risiko jatuh di dekat pasien dan atau
                                keluarga</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_rendah[]" value="Monitor Kondisi Umum Pasien dan Tanda Vital" id="rendah2">
                            <label for="rendah2">Monitor Kondisi Umum Pasien dan Tanda Vital</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_rendah[]" value="Pastikan pengaman tempat tidur selalu tertutup saat pasien tidur" id="rendah3">
                            <label for="rendah3">Pastikan pengaman tempat tidur selalu tertutup saat pasien
                                tidur</label>
                        </td>
                    </tr>

                    <!-- Risiko Sedang -->
                    <tr>
                        <td rowspan="9">
                            <h4>INTERVENSI JATUH RISIKO SEDANG</h4>
                        </td>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_sedang[]" value="Jelaskan dan letakkan protokol risiko jatuh di dekat pasien dan atau keluarga" id="sedang1">
                            <label for="sedang1">Jelaskan dan letakkan protokol risiko jatuh di dekat pasien dan atau
                                keluarga</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_sedang[]" value="Sarankan untuk minta bantuan" id="sedang2">
                            <label for="sedang2">Sarankan untuk minta bantuan</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_sedang[]" value="Tempatkan bel panggilan dalam jangkauan tangan pasien" id="sedang3">
                            <label for="sedang3">Tempatkan bel panggilan dalam jangkauan tangan pasien</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_sedang[]" value="Tempatkan benda-benda milik pasien di dekat pasien" id="sedang4">
                            <label for="sedang4">Tempatkan benda-benda milik pasien di dekat pasien</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_sedang[]" value="Pastikan tempat tidur dalam posisi rendah dan roda terkunci" id="sedang5">
                            <label for="sedang5">Pastikan tempat tidur dalam posisi rendah dan roda terkunci</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_sedang[]" value="Pastikan pakaian yang digunakan pasien di atas mata kaki" id="sedang6">
                            <label for="sedang6">Pastikan pakaian yang digunakan pasien di atas mata kaki</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_sedang[]" value="Bantu pasien saat transfer atau ambulasi" id="sedang7">
                            <label for="sedang7">Bantu pasien saat transfer atau ambulasi</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_sedang[]" value="Pasangkan pengaman sisi tempat tidur" id="sedang8">
                            <label for="sedang8">Pasangkan pengaman sisi tempat tidur</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_sedang[]" value="Pastikan klip pasien risiko jatuh terpasang pada gelang pasien dan lambang risiko" id="sedang9">
                            <label for="sedang9">Pastikan klip pasien risiko jatuh terpasang pada gelang pasien dan
                                lambang risiko</label>
                        </td>
                    </tr>

                    <!-- Risiko Tinggi -->
                    <tr>
                        <td rowspan="13">
                            <h4>INTERVENSI PASIEN RISIKO TINGGI</h4>
                        </td>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_tinggi[]" value="Jelaskan dan letakkan protokol risiko jatuh di dekat pasien dan atau keluarga" id="tinggi1">
                            <label for="tinggi1">Jelaskan dan letakkan protokol risiko jatuh di dekat pasien dan atau
                                keluarga</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_tinggi[]" value="Sarankan untuk minta bantuan" id="tinggi2">
                            <label for="tinggi2">Sarankan untuk minta bantuan</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_tinggi[]" value="Tempatkan bel panggilan dalam jangkauan tangan pasien" id="tinggi3">
                            <label for="tinggi3">Tempatkan bel panggilan dalam jangkauan tangan pasien</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_tinggi[]" value="Tempatkan benda-benda milik pasien di dekat pasien" id="tinggi4">
                            <label for="tinggi4">Tempatkan benda-benda milik pasien di dekat pasien</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_tinggi[]" value="Pastikan tempat tidur dalam posisi rendah dan roda terkunci" id="tinggi5">
                            <label for="tinggi5">Pastikan tempat tidur dalam posisi rendah dan roda terkunci</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_tinggi[]" value="Pastikan pakaian yang digunakan pasien di atas mata kaki" id="tinggi6">
                            <label for="tinggi6">Pastikan pakaian yang digunakan pasien di atas mata kaki</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_tinggi[]" value="Bantu pasien saat transfer atau ambulasi" id="tinggi7">
                            <label for="tinggi7">Bantu pasien saat transfer atau ambulasi</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_tinggi[]" value="Pasangkan pengaman sisi tempat tidur" id="tinggi8">
                            <label for="tinggi8">Pasangkan pengaman sisi tempat tidur</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_tinggi[]" value="Pastikan klip pasien risiko jatuh terpasang pada gelang pasien dan lambang risiko" id="tinggi9">
                            <label for="tinggi9">Pastikan klip pasien risiko jatuh terpasang pada gelang pasien dan
                                lambang risiko</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_tinggi[]" value="Tawarkan ke pasien untuk ke toilet setiap 4 jam" id="tinggi10">
                            <label for="tinggi10">Tawarkan ke pasien untuk ke toilet setiap 4 jam</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_tinggi[]" value="Pasangkan tali pengaman bila perlu" id="tinggi11">
                            <label for="tinggi11">Pasangkan tali pengaman bila perlu</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_tinggi[]" value="Berikan efek dari obat anestesi kepada pasien atau keluarga" id="tinggi12">
                            <label for="tinggi12">Berikan efek dari obat anestesi kepada pasien atau keluarga</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="intervensi_resiko_jatuh_tinggi[]" value="Berikan orientasi ruangan sekitar kepada pasien" id="tinggi13">
                            <label for="tinggi13">Berikan orientasi ruangan sekitar kepada pasien</label>
                        </td>
                    </tr>
                </table>

                <div class="card-footer">
                    <button type="button" class="btn btn-primary" onclick="addresikojatuhGeriatri()">Simpan</button>
                </div>
        </form>
    </div>
</div>

@include('new_perawat.resiko_jatuh.geriatri.history_resiko_jatuh_geriatri')
@include('new_perawat.resiko_jatuh.geriatri.detail_history_resiko_jatuh_geriatri')

<script>
    function hitungSkorGeriatri() {
        let totalSkor = 0;

        $("#geriatri_table input[type='radio']:checked").each(function() {
            let nilai = parseInt($(this).val(), 10); // Ensure radix 10
            if (!isNaN(nilai)) {
                totalSkor += nilai;
            }
        });

        $('#total_skor_geriatri').text(totalSkor);

        if (totalSkor <= 1) {
            $('#kategori_rendah_geriatri').prop('checked', true);
        } else if (totalSkor <= 3) {
            $('#kategori_sedang_geriatri').prop('checked', true);
        } else {
            $('#kategori_tinggi_geriatri').prop('checked', true);
        }
    }

    $("#geriatri_table input[type='radio']").change(function() {
        hitungSkorGeriatri();
    });

    hitungSkorGeriatri();
</script>
