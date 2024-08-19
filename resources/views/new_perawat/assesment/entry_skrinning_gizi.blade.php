@empty($skrining_gizi)
    @php
        $skrining_gizi = optional((object) []);
    @endphp
@endempty
@empty($skrining_gizi_anak)
    @php
        $skrining_gizi_anak = optional((object) []);
    @endphp
@endempty

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>SKRINNING GIZI (DEWASA) : Berdasarkan Malnutrisi Screening Test</h4>
            </div>
            <div class="card-body">
                <div class="row mt-3">
                    <table class="table tabled">
                        <thead>
                            <tr>
                                <th>Parameter</th>
                                <th>Skor</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><b>1 Apakah pasien mengalami penurunan berat badan yag tidak direncanakan/tidak
                                        diinginkan dalam 6 bulan terakhir ?</b></td>
                                <td></td>
                                <td></td>
                            <tr>
                                <td>a. Tidak</td>
                                <td>0</td>
                                <td><input type="radio" name="asper_penurunan_bb_dewasa" value="Tidak" data-id="0"
                                        class="gizi_dewasa"
                                        {{ $skrining_gizi->turun_berat_badan == 'Tidak' ? 'checked' : '' }}></td>
                            </tr>
                            <tr>
                                <td>b. Tidak yakin (ada tanda kelonggaran baju/celana)</td>
                                <td>2</td>
                                <td><input type="radio" name="asper_penurunan_bb_dewasa" value="Tidak Yakin"
                                        data-id="2" class="gizi_dewasa"
                                        {{ $skrining_gizi->turun_berat_badan == 'Tidak Yakin' ? 'checked' : '' }}></td>
                            </tr>
                            <tr>
                                <td>c. Ya, penurunan sebanyak : <br>
                            <tr>
                                <td>- 1-6 Kg</td>
                                <td>1</td>
                                <td><input type="radio" name="asper_penurunan_bb_dewasa" value="1-6 Kg" data-id="1"
                                        class="gizi_dewasa"
                                        {{ $skrining_gizi->turun_berat_badan == '1-6 Kg' ? 'checked' : '' }}></td>
                            </tr>
                            <tr>
                                <td>- 6-10 Kg</td>
                                <td>2</td>
                                <td><input type="radio" name="asper_penurunan_bb_dewasa" value="6-10 Kg"
                                        data-id="2" class="gizi_dewasa"
                                        {{ $skrining_gizi->turun_berat_badan == '6-10 Kg' ? 'checked' : '' }}></td>
                            </tr>
                            <tr>
                                <td>- 11-15 Kg</td>
                                <td>3</td>
                                <td><input type="radio" name="asper_penurunan_bb_dewasa" value="11-15 Kg"
                                        data-id="3" class="gizi_dewasa"
                                        {{ $skrining_gizi->turun_berat_badan == '11-15 Kg' ? 'checked' : '' }}></td>
                            </tr>
                            <tr>
                                <td>- > 15 Kg</td>
                                <td>3</td>
                                <td><input type="radio" name="asper_penurunan_bb_dewasa" value="> 15 Kg"
                                        data-id="3" class="gizi_dewasa"
                                        {{ $skrining_gizi->turun_berat_badan == '> 15 Kg' ? 'checked' : '' }}></td>
                            </tr>
                            <tr>
                                <td>- Tidak tahu berapa kg penurunannya</td>
                                <td>4</td>
                                <td><input type="radio" name="asper_penurunan_bb_dewasa" value="Tidak tahu"
                                        data-id="4" class="gizi_dewasa"
                                        {{ $skrining_gizi->turun_berat_badan == 'Tidak tahu' ? 'checked' : '' }}></td>
                            </tr>
                            </td>
                            </tr>
                            </tr>
                            <tr>
                                <td><b>2. Apakah asupan makan pasien berkurang karena penurunan nafsu makan / kesulitan
                                        menerima makanan</b></td>
                                <td></td>
                                <td></td>
                            <tr>
                                <td>a. Ya</td>
                                <td>0</td>
                                <td><input type="radio" name="asper_penurunan_nafsu_dewasa" value="Ya"
                                        data-id="0" class="gizi_dewasa"
                                        {{ $skrining_gizi->turun_nafsu_makan == 'Ya' ? 'checked' : '' }}>
                                </td>
                            </tr>
                            <tr>
                                <td>b. Tidak</td>
                                <td>1</td>
                                <td><input type="radio" name="asper_penurunan_nafsu_dewasa" value="Tidak"
                                        data-id="1" class="gizi_dewasa"
                                        {{ $skrining_gizi->turun_nafsu_makan == 'Tidak' ? 'checked' : '' }}></td>
                            </tr>
                            </tr>
                            <tr>
                                <td class="float-right">Total Skor : <input type="text" name="asper_skor_dewasa"
                                        id="total_skor_dewasa" style="border: none" value="-" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr style="border: rgb(90, 90, 90) 1px solid">
                <div class="float-right">
                    <h4>KATEGORI : <input type="text" name="asper_kategori_dewasa" id="kategori"
                            style="border: none" value="-" readonly></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<hr style="border: rgb(90, 90, 90) 1px solid">
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>SKRINNING GIZI (ANAK) : Berdasarkan adaptasi STRONG-KIDS</h4>
            </div>
            <div class="card-body">
                <div class="row mt-3">
                    <table class="table tabled">
                        <thead>
                            <tr>
                                <th>Parameter</th>
                                <th>Skor</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><b>1 Apakah pasien tampak kurus ?</b></td>
                                <td></td>
                                <td></td>
                            <tr>
                                <td>a. Tidak</td>
                                <td>0</td>
                                <td><input type="radio" name="asper_kurus_anak" value="Tidak" data-id="0"
                                        class="gizi_anak" {{ $skrining_gizi_anak->asper_kurus_anak == 'Tidak' ? 'checked' : '' }}></td>
                            </tr>
                            <tr>
                                <td>b. Ya</td>
                                <td>1</td>
                                <td><input type="radio" name="asper_kurus_anak" value="Ya" data-id="1"
                                        class="gizi_anak" {{ $skrining_gizi_anak->asper_kurus_anak == 'Ya' ? 'checked' : '' }}></td>
                            </tr>
                            </tr>
                            <tr>
                                <td>
                                    <b>
                                        2. Apakah terdapat penurunan BB selama satu bulan terakhir ? <br>
                                        (Berdasarkan penilaian objektif BB bila ada ATAU penilaian subjektif
                                        orangtua pasien
                                        ATAU untuk bayi < 1 tahun: BBtidak naik selama 3 bulan terakhir) </b>
                                </td>
                                <td></td>
                                <td></td>
                            <tr>
                                <td>a. Tidak</td>
                                <td>0</td>
                                <td>
                                    <input type="radio" name="asper_penurunan_bb_anak" value="Tidak" data-id="0"
                                        class="gizi_anak" {{ $skrining_gizi_anak->asper_penurunan_bb_anak == 'Tidak' ? 'checked' : '' }}>
                                    </td>
                            </tr>
                            <tr>
                                <td>b. Ya</td>
                                <td>1</td>
                                <td><input type="radio" name="asper_penurunan_bb_anak" value="Ya" data-id="1"
                                        class="gizi_anak" {{ $skrining_gizi_anak->asper_penurunan_bb_anak == 'Ya' ? 'checked' : '' }}></td>
                            </tr>
                            </tr>
                            <tr>
                                <td>
                                    <b>
                                        3. Apakah terdapat salah satu dari kondisi berikut ? <br>
                                        <ul>
                                            <li>Diare >= 5 kali/ hari dan atau muntah > 3 kali/hari dalam seminggu
                                                terakhir
                                            </li>
                                            <li>Asupan makanan berkurang selama 1 minggu terakhir</li>
                                        </ul>
                                    </b>
                                </td>
                                <td></td>
                                <td></td>
                            <tr>
                                <td>a. Tidak</td>
                                <td>0</td>=
                                <td><input type="radio" name="asper_kondisi_anak" value="Tidak" data-id="0"
                                        class="gizi_anak" {{ $skrining_gizi_anak->asper_kondisi_anak == 'Tidak' ? 'checked' : '' }}></td>
                            </tr>
                            <tr>
                                <td>b. Ya</td>
                                <td>1</td>
                                <td><input type="radio" name="asper_kondisi_anak" value="Ya" data-id="1"
                                        class="gizi_anak" {{ $skrining_gizi_anak->asper_kondisi_anak == 'Ya' ? 'checked' : '' }}></td>
                            </tr>
                            </tr>
                            <tr>
                                <td><b>4. Apakah terdapat penyakit atau keadaan yang mengakibatkan pasien berisiko
                                        mengalami
                                        malnutrisi ?</b></td>
                                <td></td>
                                <td></td>
                            <tr>
                                <td>a. Tidak</td>
                                <td>0</td>
                                <td><input type="radio" name="asper_penyakit_anak" value="Tidak" data-id="0"
                                        class="gizi_anak" {{ $skrining_gizi_anak->asper_penyakit_anak == 'Tidak' ? 'checked' : '' }}></td>
                            </tr>
                            <tr>
                                <td>b. Ya</td>
                                <td>2</td>
                                <td><input type="radio" name="asper_penyakit_anak" value="Ya" data-id="2"
                                        class="gizi_anak" {{ $skrining_gizi_anak->asper_penyakit_anak == 'Ya' ? 'checked' : '' }}></td>
                            </tr>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="float-right">
                    <h4>TOTAL SKOR : <input type="text" name="asper_skor_anak" id="total_skor_anak"
                            style="border: none" value="-" readonly></h4>
                </div>

                <hr style="border: rgb(90, 90, 90) 1px solid">
                {{-- <div class="row"> --}}
                {{-- <div class="col"> --}}
                <h4>Riwayat penyakit/ keadaan yang berisiko mengakibatkan malnutrisi :</h4>
                <hr>
                @php
                    $data_malnutrisi=json_decode($skrining_gizi_anak->asper_sebab_malnutrisi)??[];
                @endphp
                <div class="row">
                    <div class="col-lg-6">
                        <ul style="list-style-type: none;">
                            <li><input type="checkbox" name="asper_sebab_malnutrisi[]"
                                    value="Diare Kronik (lebih dari 2 minggu)" {{ in_array('Diare Kronik (lebih dari 2 minggu)', $data_malnutrisi) ? 'checked' : '' }}> Diare Kronik (lebih dari 2 minggu)
                            </li>
                            <li><input type="checkbox" name="asper_sebab_malnutrisi[]"
                                    value="(Tersangka) Penyakit jantung bawaan" {{ in_array('(Tersangka) Penyakit jantung bawaan', $data_malnutrisi) ? 'checked' : '' }}> (Tersangka) Penyakit jantung
                                bawaan
                            </li>
                            <li><input type="checkbox" name="asper_sebab_malnutrisi[]"
                                    value="(Tersangka) Infeksi Human Immunodeficiency Virus (HIV)" {{ in_array('(Tersangka) Infeksi Human Immunodeficiency Virus (HIV)', $data_malnutrisi) ? 'checked' : '' }}> (Tersangka)
                                Infeksi
                                Human
                                Immunodeficiency Virus (HIV)</li>
                            <li><input type="checkbox" name="asper_sebab_malnutrisi[]" value="(Tersangka) Kanker" {{ in_array('(Tersangka) Kanker', $data_malnutrisi) ? 'checked' : '' }}>
                                (Tersangka) Kanker</li>
                            <li><input type="checkbox" name="asper_sebab_malnutrisi[]" value="Penyakit hati kronik" {{ in_array('Penyakit hati kronik', $data_malnutrisi) ? 'checked' : '' }}>
                                Penyakit
                                hati kronik</li>
                            <li><input type="checkbox" name="asper_sebab_malnutrisi[]"
                                    value="Penyakit ginjal kronik" {{ in_array('Penyakit ginjal kronik', $data_malnutrisi) ? 'checked' : '' }}>
                                Penyakit ginjal kronik</li>
                            <li><input type="checkbox" name="asper_sebab_malnutrisi[]" value="TB Paru" {{ in_array('TB Paru', $data_malnutrisi) ? 'checked' : '' }}> TB Paru
                            </li>
                            <li><input type="checkbox" name="asper_sebab_malnutrisi[]" value="Luka bakar luas" {{ in_array('Luka bakar luas', $data_malnutrisi) ? 'checked' : '' }}>
                                Luka
                                bakar
                                luas</li>
                            <li><input type="text" name="asper_sebab_malnutrisi_lain" class="form-control"
                                    placeholder="Lain-lain (berdasarkan pertimbangan dokter)" value="{{$skrining_gizi_anak->asper_sebab_malnutrisi_lain}}"></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul style="list-style-type: none;">
                            <li><input type="checkbox" name="asper_sebab_malnutrisi[]"
                                    value="Kelainan anatomi daerah mulut yang menyebabkan kesulitan makan (misal: bibir sumbing)" {{ in_array('Kelainan anatomi daerah mulut yang menyebabkan kesulitan makan (misal: bibir sumbing)', $data_malnutrisi) ? 'checked' : '' }}>
                                Kelainan anatomi daerah mulut yang menyebabkan kesulitan makan (misal: bibir
                                sumbing)
                            </li>
                            <li><input type="checkbox" name="asper_sebab_malnutrisi[]" value="Trauma" {{ in_array('Trauma', $data_malnutrisi) ? 'checked' : '' }}> Trauma
                            </li>
                            <li><input type="checkbox" name="asper_sebab_malnutrisi[]"
                                    value="Kelainan metabolik bawaan (inborn error matabolism)" {{ in_array('Kelainan metabolik bawaan (inborn error matabolism)', $data_malnutrisi) ? 'checked' : '' }}> Kelainan metabolik
                                bawaan
                                (inborn error matabolism)</li>
                            <li><input type="checkbox" name="asper_sebab_malnutrisi[]" value="Retardasi mental" {{ in_array('Retardasi mental', $data_malnutrisi) ? 'checked' : '' }}>
                                Retardasi
                                mental</li>
                            <li><input type="checkbox" name="asper_sebab_malnutrisi[]"
                                    value="Keterlambatan perkembangan" {{ in_array('Keterlambatan perkembangan', $data_malnutrisi) ? 'checked' : '' }}>
                                Keterlambatan perkembangan</li>
                            <li><input type="checkbox" name="asper_sebab_malnutrisi[]"
                                    value="Rencana/paska operasi mayor" {{ in_array('Rencana/paska operasi mayor', $data_malnutrisi) ? 'checked' : '' }}>
                                Rencana/paska operasi mayor</li>
                            <li><input type="checkbox" name="asper_sebab_malnutrisi[]" value="Terpasang stoma" {{ in_array('Terpasang stoma', $data_malnutrisi) ? 'checked' : '' }}>
                                Terpasang
                                stoma</li>
                            <li><input type="checkbox" name="asper_sebab_malnutrisi[]"
                                    value="Tidak ada riwayat penyakit" {{ in_array('Tidak ada riwayat penyakit', $data_malnutrisi) ? 'checked' : '' }}>
                                Tidak ada riwayat penyakit</li>
                        </ul>
                    </div>
                </div>
                {{-- </div> --}}
                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>
<button type="button" class="btn btn-primary" onclick="addskrinninggizi()">Simpan Skrining Gizi</button>

