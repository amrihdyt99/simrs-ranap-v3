<div class="modal fade" id="resikoJatuhDetailModalMorse" tabindex="-1" role="dialog"
    aria-labelledby="resikoJatuhDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resikoJatuhDetailModalLabelMorse">Detail Risiko Jatuh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-header">
                    <h3 class="text-black">Penilaian Risiko Jatuh Pasien Skala Morse</h3>
                </div>
                <table class="table1" id="skala_morse1">
                    <tbody>
                        <tr>
                            <td>Riwayat Jatuh</td>
                            <td><input class="" type="radio" disabled value="25" id="riwayat_jatuh_ya"
                                    name="resiko_jatuh_morse_bulan_terakhir">
                                <label for="riwayat_jatuh_ya">Ya (25)</label>
                            </td>
                            <td><input class="" type="radio" disabled value="0" id="riwayat_jatuh_tidak"
                                    name="resiko_jatuh_morse_bulan_terakhir">
                                <label for="riwayat_jatuh_tidak">Tidak (0)</label>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Diagnosa Sekunder</td>
                            <td><input class="" type="radio" disabled value="15" id="diagnosa_sekunder_ya"
                                    name="resiko_jatuh_morse_medis_sekunder">
                                <label for="diagnosa_sekunder_ya">Ya (15)</label>
                            </td>
                            <td><input class="" type="radio" disabled value="0" id="diagnosa_sekunder_tidak"
                                    name="resiko_jatuh_morse_medis_sekunder">
                                <label for="diagnosa_sekunder_tidak">Tidak (0)</label>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Bantuan Ambulasi</td>
                            <td><input class="" type="radio" disabled value="0" id="bantuan_ambulasi_tidak"
                                    name="resiko_jatuh_morse_alat_bantu_jalan">
                                <label for="bantuan_ambulasi_tidak">Tidak ada/ bed rest/ bantuan perawat (0)</label>
                            </td>
                            <td><input class="" type="radio" disabled value="15" id="bantuan_ambulasi_kruk"
                                    name="resiko_jatuh_morse_alat_bantu_jalan">
                                <label for="bantuan_ambulasi_kruk">Kruk/ tongkat/ alat bantu berjalan (15)</label>
                            </td>
                            <td><input class="" type="radio" disabled value="30" id="bantuan_ambulasi_meja"
                                    name="resiko_jatuh_morse_alat_bantu_jalan">
                                <label for="bantuan_ambulasi_meja">Meja/ kursi (30)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Terpasang Infus</td>
                            <td><input class="" type="radio" disabled value="25" id="terpasang_infus_ya"
                                    name="resiko_jatuh_morse_infus">
                                <label for="terpasang_infus_ya">Ya (25)</label>
                            </td>
                            <td><input class="" type="radio" disabled value="0" id="terpasang_infus_tidak"
                                    name="resiko_jatuh_morse_infus">
                                <label for="terpasang_infus_tidak">Tidak (0)</label>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Cara/ gaya berjalan</td>
                            <td><input class="" type="radio" disabled value="0" id="cara_berjalan_normal"
                                    name="resiko_jatuh_morse_berjalan">
                                <label for="cara_berjalan_normal">Normal/ bed rest/ kursi roda (0)</label>
                            </td>
                            <td><input class="" type="radio" disabled value="15" id="cara_berjalan_lemah"
                                    name="resiko_jatuh_morse_berjalan">
                                <label for="cara_berjalan_lemah">Lemah (15)</label>
                            </td>
                            <td><input class="" type="radio" disabled value="30" id="cara_berjalan_terganggu"
                                    name="resiko_jatuh_morse_berjalan">
                                <label for="cara_berjalan_terganggu">Terganggu (30)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Status Mental</td>
                            <td><input class="" type="radio" disabled value="0" id="status_mental_berorientasi"
                                    name="resiko_jatuh_morse_mental">
                                <label for="status_mental_berorientasi">Berorientasi pada kemampuannya (0)</label>
                            </td>
                            <td><input class="" type="radio" disabled value="15" id="status_mental_lupa"
                                    name="resiko_jatuh_morse_mental">
                                <label for="status_mental_lupa">Lupa akan keterbatasannya (15)</label>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="4"><b>Total Skor Risiko Jatuh Pasien Dewasa Hall Morse Scale : <label
                                        id="resiko_jatuh_morse_total_skor_detail"></label></b>
                            </td>
                        </tr>
                        <tr>
                            <td>Kategori Golongan Resiko Jatuh: </td>
                            <td> <input type="radio" disabled id="kategori_rendah_geriatri" name="resiko_jatuh_morse_ketegori"
                                    value="Resiko Rendah / RR (0-1)">
                                <label for="kategori_rendah_geriatri">Resiko Rendah / RR (0-1)</label>
                            </td>
                            <td><input type="radio" disabled id="kategori_sedang_geriatri" name="resiko_jatuh_morse_ketegori"
                                    value="Resiko Sedang / RS (2-3)">
                                <label for="kategori_sedang_geriatri">Resiko Sedang / RS (2-3)</label>
                            </td>
                            <td>
                                <input type="radio" disabled id="kategori_tinggi_geriatri" name="resiko_jatuh_morse_ketegori"
                                    value="Resiko Tinggi / RR (>4)">
                                <label for="kategori_tinggi_geriatri">Resiko Tinggi / RR (>4)</label>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="card-header mt-5">
                    <h3 class="text-black">INTERVENSI PENCEGAHAN PASIEN SKALA MORSE</h3>
                </div>
                <table class="table1 w-100" id="skala_morse_2">
                    <tr>
                        <td rowspan="13">
                            <h5>INTERVENSI JATUH RISIKO RENDAH/STANDAR</h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_rendah[]"
                                value="Tingkatkan observasi bantuan yang sesuai saat ambulasi" id="rendahmorse1">
                            <label for="rendahmorse1">Tingkatkan observasi bantuan yang sesuai saat ambulasi</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_rendah[]"
                                value="Mengatur tempat tidur pada posisi rendah dan terkunci" id="rendahmorse2">
                            <label for="rendahmorse2">Mengatur tempat tidur pada posisi rendah dan terkunci</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_rendah[]"
                                value="Orientasikan pasien terhadap lingkungan dan rutinitas RS:" id="rendahmorse3">
                            <label for="rendahmorse3">Orientasikan pasien terhadap lingkungan dan rutinitas RS:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_rendah[]"
                                value="a. Tunjukkan lokasi kamar mandi" id="rendahmorse4">
                            <label for="rendahmorse4" style="text-indent: 20px">a. Tunjukkan lokasi kamar
                                mandi</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_rendah[]"
                                value="b. Jika pasien linglung, orientasi dilaksanakan bertahap" id="rendahmorse5">
                            <label for="rendahmorse5" style="text-indent: 20px">b. Jika pasien linglung, orientasi
                                dilaksanakan bertahap</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_rendah[]"
                                value="c. Instruksikan meminta bantuan perawat sebelum turun dari tempat tidur"
                                id="rendahmorse6">
                            <label for="rendahmorse6" style="text-indent: 20px">c. Instruksikan meminta bantuan
                                perawat sebelum turun dari tempat tidur</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_rendah[]"
                                value="Pagar pengaman tempat tidur dinaikkan" id="rendahmorse7">
                            <label for="rendahmorse7">Pagar pengaman tempat tidur dinaikkan</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_rendah[]"
                                value="Tempat tidur dalam posisi rendah terkunci." id="rendahmorse8">
                            <label for="rendahmorse8">Tempat tidur dalam posisi rendah terkunci.</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_rendah[]"
                                value="Edukasi perilaku yang lebih aman saat jatuh atau transfer" id="rendahmorse9">
                            <label for="rendahmorse9">Edukasi perilaku yang lebih aman saat jatuh atau transfer</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_rendah[]"
                                value="Monitor kebutuhan pasien secara berkala (minimalnya tiap 2 jam)"
                                id="rendahmorse10">
                            <label for="rendahmorse10">Monitor kebutuhan pasien secara berkala (minimalnya tiap 2
                                jam)</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_rendah[]"
                                value="Anjurkan pasien tidak menggunakan kaus kaki atau sepatu yang licin"
                                id="rendahmorse11">
                            <label for="rendahmorse11">Anjurkan pasien tidak menggunakan kaus kaki atau sepatu yang
                                licin</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_rendah[]"
                                value="Lantai kamar mandi dengan karpet antislip, tidak licin" id="rendahmorse12">
                            <label for="rendahmorse12">Lantai kamar mandi dengan karpet antislip, tidak licin</label>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="8">INTERVENSI JATUH RISIKO SEDANG</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_sedang[]"
                                value="Lakukan SEMUA intervensi jatuh resiko rendah atau standar" id="sedangmorse1">
                            <label for="sedangmorse1">Lakukan SEMUA intervensi jatuh resiko rendah atau standar</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_sedang[]"
                                value="Pakailah gelang risiko jatuh berwarna kuning" id="sedangmorse2">
                            <label for="sedangmorse2">Pakailah gelang risiko jatuh berwarna kuning</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_sedang[]"
                                value="Pasang gambar risiko jatuh diatas tempat tidur pasien dan pada pintu kamar pasien"
                                id="sedangmorse3">
                            <label for="sedangmorse3">Pasang gambar risiko jatuh diatas tempat tidur pasien dan pada
                                pintu kamar pasien</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_sedang[]"
                                value="Tempatkan tanda resiko pasien jatuh pada daftar nama pasein (warna kuning)"
                                id="sedangmorse4">
                            <label for="sedangmorse4">Tempatkan tanda resiko pasien jatuh pada daftar nama pasein
                                (warna kuning)</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_sedang[]"
                                value="Pertimbangkan riwayat obat-obatan dan suplemen untuk mengevaluasi pengobatan"
                                id="sedangmorse5">
                            <label for="sedangmorse5">Pertimbangkan riwayat obat-obatan dan suplemen untuk mengevaluasi
                                pengobatan</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_sedang[]"
                                value="Gunakan alat bantu jalan (walker, handrail)" id="sedangmorse6">
                            <label for="sedangmorse6">Gunakan alat bantu jalan (walker, handrail)</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_sedang[]"
                                value="Dorong partisipasi keluarga dalam keselamatan pasien" id="sedangmorse7">
                            <label for="sedangmorse7">Dorong partisipasi keluarga dalam keselamatan pasien</label>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="4">INTERVENSI JATUH RISIKO TINGGI</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_tinggi[]"
                                value="Lakukan SEMUA intervensi jatuh resiko rendah / standar dan resiko sedang"
                                id="tinggimorse1">
                            <label for="tinggimorse1">Lakukan SEMUA intervensi jatuh resiko rendah / standar dan resiko
                                sedang</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_tinggi[]"
                                value="Jangan tinggalkan pasien saat di ruangan diagnostic atau tindakan"
                                id="tinggimorse2">
                            <label for="tinggimorse2">Jangan tinggalkan pasien saat di ruangan diagnostic atau
                                tindakan</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" disabled name="intervensi_resiko_jatuh_skala_morse_tinggi[]"
                                value="Penempatan pasien dekat nurse station untuk memudahkan observasi (24-48 jam)"
                                id="tinggimorse3">
                            <label for="tinggimorse3">Penempatan pasien dekat nurse station untuk memudahkan observasi
                                (24-48 jam)</label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
