<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">News Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalDetailContent">
                <table id="table_detail_news" class="table1 w-100" style="text-align: justify-center;">
                    <tbody>
                        <tr>
                            <td></td>
                            <td style="text-align: center; font-weight:bold;">Score EWS</td>
                            <td colspan="2" style="text-align: left; font-weight:bold;">Parameter</td>
                        </tr>
                        <tr>
                            <!-- Pernafasaan -->
                            <td rowspan="4">Pernafasaan</td>
                            <td rowspan="4">
                                <input type="number" id="aktual_pernafasaan" class="form-control" size="1" name="aktual_pernafasaan" value="" readonly>
                            </td>
                            <td style="text-align: center;">3</td>
                            <td>
                                <label><input type="radio" disabled name="pernafasaan" value="3" id="pernafasaan-3" />
                                    < 8 atau ≥ 25</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td colspan="2">
                                <label><input type="radio" disabled name="pernafasaan" value="2" id="pernafasaan-2" /> 21-24</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td colspan="2">
                                <label><input type="radio" disabled name="pernafasaan" value="1" id="pernafasaan-1" /> 9-11</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">0</td>
                            <td colspan="2">
                                <label><input type="radio" disabled name="pernafasaan" value="0" id="pernafasaan-0" /> 12-20</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- Saturasi Oksigen -->
                            <td rowspan="4">Saturasi Oksigen</td>
                            <td rowspan="4">
                                <input type="number" class="form-control" size="1" id="aktual_saturasi_oksigen" name="aktual_saturasi_oksigen" value="" readonly>
                            </td>
                            <td style="text-align: center;">3</td>
                            <td>
                                <label><input type="radio" disabled name="saturasi_oksigen" value="3" id="saturasi_oksigen-3" /> ≤ 91</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>
                                <label><input type="radio" disabled name="saturasi_oksigen" value="2" id="saturasi_oksigen-2" /> 92 - 93</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td>
                                <label><input type="radio" disabled name="saturasi_oksigen" value="1" id="saturasi_oksigen-1" /> 94 - 95</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">0</td>
                            <td>
                                <label><input type="radio" disabled name="saturasi_oksigen" value="0" id="saturasi_oksigen-0" /> ≥ 96</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- O2 Tambahan (NRM/RM) -->
                            <td rowspan="2" colspan="2">O2 Tambahan (NRM/RM)</td>
                            <td style="text-align: center;">0</td>
                            <td colspan="2">
                                <label><input type="radio" disabled name="o2_tambahan" value="0" id="o2_tambahan-0" /> Ya</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td colspan="2">
                                <label><input type="radio" disabled name="o2_tambahan" value="2" id="o2_tambahan-2" /> Tidak</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- Suhu -->
                            <td rowspan="4">Suhu</td>
                            <td rowspan="4">
                                <input type="number" class="form-control" size="1" id="aktual_suhu" name="aktual_suhu" value="" readonly>
                            </td>
                            <td style="text-align: center;">3</td>
                            <td>
                                <label><input type="radio" disabled name="suhu" value="3" id="suhu-3" /> ≤35,0</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>
                                <label><input type="radio" disabled name="suhu" value="2" id="suhu-2" /> ≥ 39,1</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td>
                                <label><input type="radio" disabled name="suhu" value="1" id="suhu-1" /> 35,1-35,9 atau 38,1 - 39,0</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">0</td>
                            <td>
                                <label><input type="radio" disabled name="suhu" value="0" id="suhu-0" /> 36,0 - 38</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- Tekanan darah sitosik -->
                            <td rowspan="4">Tekanan darah sistolik</td>
                            <td rowspan="4">
                                <input type="number" class="form-control" size="1" id="aktual_tekanan_darah" name="aktual_tekanan_darah" value="" readonly>
                            </td>
                            <td style="text-align: center;">3</td>
                            <td>
                                <label><input type="radio" disabled name="tekanan_darah" value="3" id="tekanan_darah-3" /> ≤85 atau ≥220</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>
                                <label><input type="radio" disabled name="tekanan_darah" value="2" id="tekanan_darah-2" /> 86-95 atau 201-219</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td>
                                <label><input type="radio" disabled name="tekanan_darah" value="1" id="tekanan_darah-1" /> 96-99 atau 180-200</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">0</td>
                            <td>
                                <label><input type="radio" disabled name="tekanan_darah" value="0" id="tekanan_darah-0" /> 100-179</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- Nadi -->
                            <td rowspan="4">Nadi</td>
                            <td rowspan="4">
                                <input type="number" class="form-control" size="1" name="aktual_nadi" id="aktual_nadi" value="" readonly>
                            </td>
                            <td style="text-align: center;">3</td>
                            <td>
                                <label><input type="radio" disabled name="nadi" value="3" id="nadi-3" /> ≤ 40 atau ≥ 131</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>
                                <label><input type="radio" disabled name="nadi" value="2" id="nadi-2" /> 111 - 130</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td>
                                <label><input type="radio" disabled name="nadi" value="1" id="nadi-1" /> 41- 50 atau 91 - 110</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">0</td>
                            <td>
                                <label><input type="radio" disabled name="nadi" value="0" id="nadi-0" /> 51 - 90</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- Tingkat Kesadaran -->
                            <td rowspan="2" colspan="2">Tingkat Kesadaran</td>
                            <td style="text-align: center;">3</td>
                            <td colspan="2">
                                <label><input type="radio" disabled name="tingkat_kesadaran" value="3" id="tingkat_kesadaran-3" /> V, P, U</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">0</td>
                            <td colspan="2">
                                <label><input type="radio" disabled name="tingkat_kesadaran" value="0" id="tingkat_kesadaran-0" /> Alert</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">TOTAL EARLY WARNING SISTEM</td>
                            <td><input type="number" disabled class="form-control" size="1" name="news_total" value=""></td>
                        </tr>
                        <tr>
                            <td colspan="2">Kategori:</td>
                            <td colspan="2">
                                <input type="radio" disabled name="news_kategori" value="TTV di Zona Merah atau ≥7" id="newskategori1">
                                <label for="newskategori1">TTV di Zona Merah atau ≥7</label><br>
                                <input type="radio" disabled name="news_kategori" value="TTV di Zona Orange atau 5-6" id="newskategori2">
                                <label for="newskategori2">TTV di Zona Orange atau 5-6</label><br>
                                <input type="radio" disabled name="news_kategori" value="TTV di Zona Kuning atau total 1-4" id="newskategori3">
                                <label for="newskategori3">TTV di Zona Kuning atau total 1-4</label><br>
                                <input type="radio" disabled name="news_kategori" value="TTV di Zona Hijau atau total 0" id="newskategori4">
                                <label for="newskategori4">TTV di Zona Hijau atau total 0</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">Gula Darah</td>
                            <td><input type="text" disabled class="form-control" size="1" name="news_gula_darah" value="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">Analisa Gas Darah</td>
                            <td><input type="text" disabled class="form-control" size="1" name="news_analisa_gas_darah" value="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">Penilaian TIK : MAP</td>
                            <td><input type="text" disabled class="form-control" size="1" name="news_penilaian_tik" value="">
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