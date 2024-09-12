<!-- Modal for showing details -->
<div class="modal fade" id="resikoJatuhDetailModal" tabindex="-1" role="dialog" aria-labelledby="resikoJatuhDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resikoJatuhDetailModalLabel">Detail Risiko Jatuh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <h3><b>Penilaian Risiko Jatuh Pasien Geriatri</b></h3>
                <table id="detail_resiko_jatuh_geriatri" class="table1 table-striped">
                    <tbody id="detailTableBody">
                        <tr>
                            <td style="width: 550px">Gangguan gaya berjalan (diseret, menghentak, berayun)</td>
                            <td>
                                <input type="radio" id="gangguan_berjalan_ya" name="resiko_jatuh_geriatri_gangguan_gaya_berjalan" value="4" disabled>
                                <label for="gangguan_berjalan_ya">Ya (4)</label>
                                <input type="radio" id="gangguan_berjalan_tidak" name="resiko_jatuh_geriatri_gangguan_gaya_berjalan" value="0" disabled>
                                <label for="gangguan_berjalan_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Pusing / pingsan pada posisi tegak</td>
                            <td>
                                <input type="radio" id="pusing_ya" name="resiko_jatuh_geriatri_pusing" value="3" disabled>
                                <label for="pusing_ya">Ya (3)</label>
                                <input type="radio" id="pusing_tidak" name="resiko_jatuh_geriatri_pusing" value="0" disabled>
                                <label for="pusing_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Kebingungan setiap saat</td>
                            <td>
                                <input type="radio" id="kebingungan_ya" name="resiko_jatuh_geriatri_kebingungan" value="3" disabled>
                                <label for="kebingungan_ya">Ya (3)</label>
                                <input type="radio" id="kebingungan_tidak" name="resiko_jatuh_geriatri_kebingungan" value="0" disabled>
                                <label for="kebingungan_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Nokturia / Inkontinen</td>
                            <td>
                                <input type="radio" id="nokturia_ya" name="resiko_jatuh_geriatri_nokturia" value="3" disabled>
                                <label for="nokturia_ya">Ya (3)</label>
                                <input type="radio" id="nokturia_tidak" name="resiko_jatuh_geriatri_nokturia" value="0" disabled>
                                <label for="nokturia_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Kebingungan Intermiten</td>
                            <td>
                                <input type="radio" id="kebingungan_intermiten_ya" name="resiko_jatuh_geriatri_kebingungan_intermiten" value="3" disabled>
                                <label for="kebingungan_intermiten_ya">Ya (3)</label>
                                <input type="radio" id="kebingungan_intermiten_tidak" name="resiko_jatuh_geriatri_kebingungan_intermiten" value="0" disabled>
                                <label for="kebingungan_intermiten_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Kelemahan Umum</td>
                            <td>
                                <input type="radio" id="kelemahan_ya" name="resiko_jatuh_geriatri_kelemahan_umum" value="2" disabled>
                                <label for="kelemahan_ya">Ya (2)</label>
                                <input type="radio" id="kelemahan_tidak" name="resiko_jatuh_geriatri_kelemahan_umum" value="0" disabled>
                                <label for="kelemahan_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Obat-obat berisiko tinggi (diuretik, narkotik, sedatif, anti psikotik, laksatif, vasodilator, antiaritmia, anti hypertensi, obat hypoglikemik, antidepresan, neuroleptik, NSAID)</td>
                            <td>
                                <input type="radio" id="obat_risiko_tinggi_ya" name="resiko_jatuh_geriatri_obat_beresiko_tinggi" value="2" disabled>
                                <label for="obat_risiko_tinggi_ya">Ya (2)</label>
                                <input type="radio" id="obat_risiko_tinggi_tidak" name="resiko_jatuh_geriatri_obat_beresiko_tinggi" value="0" disabled>
                                <label for="obat_risiko_tinggi_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Riwayat jatuh dalam waktu 12 bulan sebelumnya</td>
                            <td>
                                <input type="radio" id="riwayat_jatuh_ya" name="resiko_jatuh_geriatri_riwayat_jatuh_12_bulan" value="2" disabled>
                                <label for="riwayat_jatuh_ya">Ya (2)</label>
                                <input type="radio" id="riwayat_jatuh_tidak" name="resiko_jatuh_geriatri_riwayat_jatuh_12_bulan" value="0" disabled>
                                <label for="riwayat_jatuh_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Osteoporosis</td>
                            <td>
                                <input type="radio" id="osteoporosis_ya" name="resiko_jatuh_geriatri_osteoporosis" value="1" disabled>
                                <label for="osteoporosis_ya">Ya (1)</label>
                                <input type="radio" id="osteoporosis_tidak" name="resiko_jatuh_geriatri_osteoporosis" value="0" disabled>
                                <label for="osteoporosis_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Gangguan pendengaran dan atau penglihatan</td>
                            <td>
                                <input type="radio" id="gangguan_pendengaran_ya" name="resiko_jatuh_geriatri_pendengaran_dan_pengeliatan" value="1" disabled>
                                <label for="gangguan_pendengaran_ya">Ya (1)</label>
                                <input type="radio" id="gangguan_pendengaran_tidak" name="resiko_jatuh_geriatri_pendengaran_dan_pengeliatan" value="0" disabled>
                                <label for="gangguan_pendengaran_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Usia 70 tahun keatas</td>
                            <td>
                                <input type="radio" id="usia_70_keatas_ya" name="resiko_jatuh_geriatri_70_tahun_keatas" value="1" disabled>
                                <label for="usia_70_keatas_ya">Ya (1)</label>
                                <input type="radio" id="usia_70_keatas_tidak" name="resiko_jatuh_geriatri_70_tahun_keatas" value="0" disabled>
                                <label for="usia_70_keatas_tidak">Tidak (0)</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Total Skor Risiko Jatuh Pasien Geriatri > 60 Tahun :</td>
                            <td>
                                <span id="total_skor_geriatri_detail"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>Kategori Golongan Resiko Jatuh:</td>
                            <td>
                                <input type="radio" id="kategori_rendah_geriatri" name="kategori_geriatri" value="Resiko Rendah / RR (0-1)" disabled>
                                <label for="kategori_rendah_geriatri">Resiko Rendah / RR (0-1)</label><br>
                                <input type="radio" id="kategori_sedang_geriatri" name="kategori_geriatri" value="Resiko Sedang / RS (2-3)" disabled>
                                <label for="kategori_sedang_geriatri">Resiko Sedang / RS (2-3)</label><br>
                                <input type="radio" id="kategori_tinggi_geriatri" name="kategori_geriatri" value="Resiko Tinggi / RR (>4)" disabled> 
                                <label for="kategori_tinggi_geriatri">Resiko Tinggi / RR (>4)</label><br>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
