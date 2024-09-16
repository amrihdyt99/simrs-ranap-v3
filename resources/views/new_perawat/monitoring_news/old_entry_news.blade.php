@php

@endphp
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">MONITORING NATIONAL EARLY WARNING SYSTEM (NEWS)</h3>
        </div>

        <body>
            <form id="entry-news">
                <table class="w-100" border="1">
                    <input type="hidden" name="user_name" class="form-control" value="{{auth()->user()->name}}">
                    <tbody>
                        <tr>
                            <td rowspan="3">Tanda Tanda Vital</td>
                            <td colspan="3">Tanggal</td>
                            <td><input type="date" name="news_tanggal" class="form-control" value="{{$tanggal_sekarang}}"></td>

                        </tr>
                        <tr>
                            <td colspan="3">Jam</td>
                            <td><input type="number" min="0" max="23" name="news_jam" class="form-control" value="{{$jam_sekarang}}"></td>


                        </tr>
                        <tr>
                            <td colspan="3">Pengkajian Awal</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3" rowspan="1" style="text-align: center;">Parameter</td>
                            <td>Score EWS</td>
                            <td></td>
                        </tr>
                        <tr>

                        </tr>
                        <tr style="text-align: center;">
                            <td rowspan="4">Pernafasaan</td>
                            <td colspan="2">
                                < 8 atau> 25
                            </td>
                            <td>3</td>
                            <td><input type="text" class="form-control" size="1" name="pernafasaan_3" value="{{$monitoring_news->pernafasaan_3}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2">21-24</td>
                            <td>2</td>
                            <td><input type="text" class="form-control" size="1" name="pernafasaan_2" value="{{$monitoring_news->pernafasaan_2}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2">9-11</td>
                            <td>1</td>
                            <td><input type="text" class="form-control" size="1" name="pernafasaan_1" value="{{$monitoring_news->pernafasaan_1}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2">12-20</td>
                            <td>0</td>
                            <td><input type="text" class="form-control" size="1" name="pernafasaan_0" value="{{$monitoring_news->pernafasaan_0}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td rowspan="4">Saturasi Oksigen</td>
                            <td colspan="2">
                                ≤ 91
                            </td>
                            <td>3</td>
                            <td><input type="text" class="form-control" size="1" name="saturasi_3" value="{{$monitoring_news->saturasi_3}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2">92 - 93</td>
                            <td>2</td>
                            <td><input type="text" class="form-control" size="1" name="saturasi_2" value="{{$monitoring_news->saturasi_2}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2">94 - 95</td>
                            <td>1</td>
                            <td><input type="text" class="form-control" size="1" name="saturasi_1" value="{{$monitoring_news->saturasi_1}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2">≥ 96</td>
                            <td>0</td>
                            <td><input type="text" class="form-control" size="1" name="saturasi_0" value="{{$monitoring_news->saturasi_0}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td rowspan="2">O2 Tambahan (NRM/RM)</td>
                            <td colspan="2">
                                Ya
                            </td>
                            <td>0</td>
                            <td><input type="text" class="form-control" size="1" name="O2_tambahan_0" value="{{$monitoring_news->O2_tambahan_0}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2">Tidak</td>
                            <td>2</td>
                            <td><input type="text" class="form-control" size="1" name="O2_tambahan_2" value="{{$monitoring_news->O2_tambahan_2}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td rowspan="4">Suhu</td>
                            <td colspan="2">
                                ≤35,0
                            </td>
                            <td>3</td>
                            <td><input type="text" class="form-control" size="1" name="suhu_3" value="{{$monitoring_news->suhu_3}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2">≥ 39,1</td>
                            <td>2</td>
                            <td><input type="text" class="form-control" size="1" name="suhu_2" value="{{$monitoring_news->suhu_2}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2">35,1-35,9 atau 38,1 - 39,0</td>
                            <td>1</td>
                            <td><input type="text" class="form-control" size="1" name="suhu_1" value="{{$monitoring_news->suhu_1}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2">36,0 - 38</td>
                            <td>0</td>
                            <td><input type="text" class="form-control" size="1" name="suhu_0" value="{{$monitoring_news->suhu_0}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td rowspan="4">Tekanan darah sitosik</td>
                            <td colspan="2">
                                ≤85 atau ≥220
                            </td>
                            <td>3</td>
                            <td><input type="text" class="form-control" size="1" name="tekanan_darah_3" value="{{$monitoring_news->tekanan_darah_3}}">
                            </td>

                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2">86-95 atau 201-219</td>
                            <td>2</td>
                            <td><input type="text" class="form-control" size="1" name="tekanan_darah_2" value="{{$monitoring_news->tekanan_darah_2}}">
                            </td>

                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2">96-99 atau 180-200</td>
                            <td>1</td>
                            <td><input type="text" class="form-control" size="1" name="tekanan_darah_1" value="{{$monitoring_news->tekanan_darah_1}}">
                            </td>

                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2">100-179</td>
                            <td>0</td>
                            <td><input type="text" class="form-control" size="1" name="tekanan_darah_0" value="{{$monitoring_news->tekanan_darah_0}}">
                            </td>

                        </tr>
                        <tr style="text-align: center;">
                            <td rowspan="4">Nadi</td>
                            <td colspan="2">
                                ≤ 40 atau ≥ 131
                            </td>
                            <td>3</td>
                            <td><input type="text" class="form-control" size="1" name="nadi_3" value="{{$monitoring_news->nadi_3}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2">111 - 130</td>
                            <td>2</td>
                            <td><input type="text" class="form-control" size="1" name="nadi_2" value="{{$monitoring_news->nadi_2}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2">41- 50 atau 91 - 110</td>
                            <td>1</td>
                            <td><input type="text" class="form-control" size="1" name="nadi_1" value="{{$monitoring_news->nadi_1}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2">51 - 90</td>
                            <td>0</td>
                            <td><input type="text" class="form-control" size="1" name="nadi_0" value="{{$monitoring_news->nadi_0}}"></td>

                        </tr>
                        <tr style="text-align: center;">
                            <td rowspan="2">Tingkat Kesadaran</td>
                            <td colspan="2">
                                V,P, U
                            </td>
                            <td>3</td>
                            <td><input type="text" class="form-control" size="1"
                                    name="tingkat_kesadaran_3" value="{{$monitoring_news->tingkat_kesadaran_3}}">
                            </td>

                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="2">Alert</td>
                            <td>0</td>
                            <td><input type="text" class="form-control" size="1"
                                    name="tingkat_kesadaran_0" value="{{$monitoring_news->tingkat_kesadaran_0}}">
                            </td>

                        </tr>
                        <tr>
                            <td colspan="4">TOTAL EARLY WARNING SISTEM</td>
                            <td><input type="number" class="form-control" size="1" name="news_total" value="{{$monitoring_news->news_total}}"></td>
                        </tr>
                        <tr>
                            <td colspan="4">Kategori: Hijau/ Kuning/ Orange/ Merah</td>
                            <td>
                                <select id="" class="form-control" name="news_kategori">
                                    <option value="merah" {{$monitoring_news->news_kategori=='merah' ? 'selected' : ''}}>TTV di Zona Merah atau ≥7</option>
                                    <option value="orange" {{$monitoring_news->news_kategori=='orange' ? 'selected' : ''}}>TTV di Zona Orange atau 5-6</option>
                                    <option value="kuning" {{$monitoring_news->news_kategori=='kuning' ? 'selected' : ''}}>TTV di Zona Kuning atau total 1-4</option>
                                    <option value="hijau" {{$monitoring_news->news_kategori=='hijau' ? 'selected' : ''}}>TTV di Zona Hijau atau total 0</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">Gula Darah</td>
                            <td><input type="text" class="form-control" size="1" name="news_gula_darah" value="{{$monitoring_news->news_gula_darah}}">
                            </td>

                        </tr>
                        <tr>
                            <td colspan="4">Analisa Gas Darah</td>
                            <td><input type="text" class="form-control" size="1"
                                    name="news_analisa_gas_darah" value="{{$monitoring_news->news_analisa_gas_darah}}">
                            </td>

                        </tr>
                        <tr>
                            <td colspan="4">Penilaian TIK : MAP</td>
                            <td><input type="text" class="form-control" size="1" name="news_penilaian_tik" value="{{$monitoring_news->news_penilaian_tik}}">
                            </td>

                        </tr>
                        {{-- <tr>
                        <td colspan="4">NAMA PERAWAT </td>
                        <td></td>

                    </tr>
                    <tr>
                        <td colspan="4">PARAF</td>
                        <td></td>

                    </tr> --}}
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
