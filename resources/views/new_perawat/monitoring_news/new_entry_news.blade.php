<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">MONITORING NATIONAL EARLY WARNING SYSTEM (NEWS)</h3>
        </div>

        <body>
            <form id="entry-news">
                <table id="table_moni_news" class="table1 w-100" style="text-align: justify-center;">
                    <tbody>
                        <tr>
                            <td></td>
                            <td style="text-align: left; font-weight:bold;">Nilai Aktual</td>
                            <td style="text-align: center; font-weight:bold;">Score EWS</td>
                            <td style="text-align: left; font-weight:bold;">Parameter</td>
                        </tr>
                        <tr>
                            <!-- Pernafasaan -->
                            <td rowspan="4">Pernafasaan</td>
                            <td rowspan="4">
                                <input type="number" class="form-control" size="1" name="aktual_pernafasaan" value="">
                            </td>
                            <td style="text-align: center;">3</td>
                            <td>
                                <label><input type="radio" name="pernafasaan" value="3" id="pernafasaan-3" />
                                    < 8 atau ≥ 25</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>
                                <label><input type="radio" name="pernafasaan" value="2" id="pernafasaan-2" /> 21-24</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td>
                                <label><input type="radio" name="pernafasaan" value="1" id="pernafasaan-1" /> 9-11</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">0</td>
                            <td>
                                <label><input type="radio" name="pernafasaan" value="0" id="pernafasaan-0" /> 12-20</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- Saturasi Oksigen -->
                            <td rowspan="4">Saturasi Oksigen</td>
                            <td rowspan="4">
                                <input type="number" class="form-control" size="1" name="aktual_saturasi_oksigen" value="">
                            </td>
                            <td style="text-align: center;">3</td>
                            <td>
                                <label><input type="radio" name="saturasi_oksigen" value="3" id="saturasi_oksigen-3" /> ≤ 91</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>
                                <label><input type="radio" name="saturasi_oksigen" value="2" id="saturasi_oksigen-2" /> 92 - 93</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td>
                                <label><input type="radio" name="saturasi_oksigen" value="1" id="saturasi_oksigen-1" /> 94 - 95</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">0</td>
                            <td>
                                <label><input type="radio" name="saturasi_oksigen" value="0" id="saturasi_oksigen-0" /> ≥ 96</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- O2 Tambahan (NRM/RM) -->
                            <td rowspan="2" colspan="2">O2 Tambahan (NRM/RM)</td>
                            <td style="text-align: center;">0</td>
                            <td>
                                <label><input type="radio" name="o2_tambahan" value="0" id="o2_tambahan-0" /> Ya</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>
                                <label><input type="radio" name="o2_tambahan" value="2" id="o2_tambahan-2" /> Tidak</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- Suhu -->
                            <td rowspan="4">Suhu</td>
                            <td rowspan="4">
                                <input type="number" class="form-control" size="1" name="aktual_suhu" value="">
                            </td>
                            <td style="text-align: center;">3</td>
                            <td>
                                <label><input type="radio" name="suhu" value="3" id="suhu-3" /> ≤35,0</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>
                                <label><input type="radio" name="suhu" value="2" id="suhu-2" /> ≥ 39,1</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td>
                                <label><input type="radio" name="suhu" value="1" id="suhu-1" /> 35,1-35,9 atau 38,1 - 39,0</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">0</td>
                            <td>
                                <label><input type="radio" name="suhu" value="0" id="suhu-0" /> 36,0 - 38</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- Tekanan darah sitosik -->
                            <td rowspan="4">Tekanan darah sistolik</td>
                            <td rowspan="4">
                                <input type="number" class="form-control" size="1" name="aktual_tekanan_darah" value="">
                            </td>
                            <td style="text-align: center;">3</td>
                            <td>
                                <label><input type="radio" name="tekanan_darah" value="3" id="tekanan_darah-3" /> ≤85 atau ≥220</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>
                                <label><input type="radio" name="tekanan_darah" value="2" id="tekanan_darah-2" /> 86-95 atau 201-219</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td>
                                <label><input type="radio" name="tekanan_darah" value="1" id="tekanan_darah-1" /> 96-99 atau 180-200</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">0</td>
                            <td>
                                <label><input type="radio" name="tekanan_darah" value="0" id="tekanan_darah-0" /> 100-179</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- Nadi -->
                            <td rowspan="4">Nadi</td>
                            <td rowspan="4">
                                <input type="number" class="form-control" size="1" name="aktual_nadi" value="">
                            </td>
                            <td style="text-align: center;">3</td>
                            <td>
                                <label><input type="radio" name="nadi" value="3" id="nadi-3" /> ≤ 40 atau ≥ 131</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2</td>
                            <td>
                                <label><input type="radio" name="nadi" value="2" id="nadi-2" /> 111 - 130</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">1</td>
                            <td>
                                <label><input type="radio" name="nadi" value="1" id="nadi-1" /> 41- 50 atau 91 - 110</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">0</td>
                            <td>
                                <label><input type="radio" name="nadi" value="0" id="nadi-0" /> 51 - 90</label>
                            </td>
                        </tr>
                        <tr>
                            <!-- Tingkat Kesadaran -->
                            <td rowspan="2" colspan="2">Tingkat Kesadaran</td>
                            <td style="text-align: center;">3</td>
                            <td colspan="2">
                                <label><input type="radio" name="tingkat_kesadaran" value="3" id="tingkat_kesadaran-3" /> V, P, U</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">0</td>
                            <td colspan="2">
                                <label><input type="radio" name="tingkat_kesadaran" value="0" id="tingkat_kesadaran-0" /> Alert</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">TOTAL EARLY WARNING SISTEM</td>
                            <td><input type="number" disabled class="form-control" size="1" name="news_total" value=""></td>
                        </tr>
                        <tr>
                            <td colspan="3">Kategori:</td>
                            <td colspan="3">
                                <input type="radio" name="news_kategori" value="TTV di Zona Merah atau ≥7" id="newskategori1">
                                <label for="newskategori1">TTV di Zona Merah atau ≥7</label><br>
                                <input type="radio" name="news_kategori" value="TTV di Zona Orange atau 5-6" id="newskategori2">
                                <label for="newskategori2">TTV di Zona Orange atau 5-6</label><br>
                                <input type="radio" name="news_kategori" value="TTV di Zona Kuning atau total 1-4" id="newskategori3">
                                <label for="newskategori3">TTV di Zona Kuning atau total 1-4</label><br>
                                <input type="radio" name="news_kategori" value="TTV di Zona Hijau atau total 0" id="newskategori4">
                                <label for="newskategori4">TTV di Zona Hijau atau total 0</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">Gula Darah</td>
                            <td><input type="text" class="form-control" size="1" name="news_gula_darah" value="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">Analisa Gas Darah</td>
                            <td><input type="text" class="form-control" size="1" name="news_analisa_gas_darah" value="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">Penilaian TIK : MAP</td>
                            <td><input type="text" class="form-control" size="1" name="news_penilaian_tik" value="">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary" onclick="simpanMonitoringNews()">Simpan</button>
                </div>
            </form>

            {{-- <p style="text-align: right"> RM RI 012.1/Rev.01</p> --}}
        </body>
    </div>
</div>
<script>
    function calculateNewsScore() {
        let totalScore = 0;

        let pernafasaan = $("#table_moni_news input[name='pernafasaan']:checked").val();
        let saturasiOksigen = $("#table_moni_news input[name='saturasi_oksigen']:checked").val();
        let o2Tambahan = $("#table_moni_news input[name='o2_tambahan']:checked").val();
        let suhu = $("#table_moni_news input[name='suhu']:checked").val();
        let tekananDarah = $("#table_moni_news input[name='tekanan_darah']:checked").val();
        let nadi = $("#table_moni_news input[name='nadi']:checked").val();
        let tingkatKesadaran = $("#table_moni_news input[name='tingkat_kesadaran']:checked").val();

        totalScore += parseInt(pernafasaan || 0);
        totalScore += parseInt(saturasiOksigen || 0);
        totalScore += parseInt(o2Tambahan || 0);
        totalScore += parseInt(suhu || 0);
        totalScore += parseInt(tekananDarah || 0);
        totalScore += parseInt(nadi || 0);
        totalScore += parseInt(tingkatKesadaran || 0);

        $("#table_moni_news input[name='news_total']").val(totalScore);

        if (totalScore >= 7) {
            $("#newskategori1").prop("checked", true);
        } else if (totalScore >= 5 && totalScore <= 6) {
            $("#newskategori2").prop("checked", true);
        } else if (totalScore >= 1 && totalScore <= 4) {
            $("#newskategori3").prop("checked", true);
        } else {
            $("#newskategori4").prop("checked", true);
        }
    }

    $("input[type=radio]").on("change", function() {
        calculateNewsScore();
    });
</script>