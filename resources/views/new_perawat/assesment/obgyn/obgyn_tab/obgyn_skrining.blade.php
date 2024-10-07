<h4><b>SKRINING GIZI</b></h4>
<table class="table1 w-100" id="skrining_gizi_obgyn">
    <thead>
        <tr>
            <th>Parameter</th>
            <th>Skor</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width: 800px;" rowspan="2"><b>1. Apakah asupan makan berkurang karena tidak nafsu makan ?</b></td>
            <td>
                <input type="radio" id="tidak_1" name="table5[asupan_makan]" value="0" {{ $skrining_gizi->asupan_makan == '0' ? 'checked' : '' }}>
                <label for="tidak_1">(0) a. Tidak</label>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" id="ya_1" name="table5[asupan_makan]" value="1" {{ $skrining_gizi->asupan_makan == '1' ? 'checked' : '' }}>
                <label for="ya_1">(1) b. Ya</label>
            </td>
        </tr>
        <tr>
            <td style="width: 800px;" rowspan="2"><b>2. Ada gangguan metabolisme ( DM, gangguan fungsi tiroid, infeksi kronis spt HIV/AIDS, TB, Lupus ), preeklamsia berat, eklampsia, hiperemesis ?</b></td>
            <td>
                <input type="radio" id="tidak_2" name="table5[gangguan_metabolisme]" value="0" {{ $skrining_gizi->gangguan_metabolisme == '0' ? 'checked' : '' }}>
                <label for="tidak_2">(0) a. Tidak</label>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" id="ya_2" name="table5[gangguan_metabolisme]" value="1" {{ $skrining_gizi->gangguan_metabolisme == '1' ? 'checked' : '' }}>
                <label for="ya_2">(1) b. Ya</label>
            </td>
        </tr>
        <tr>
            <td style="width: 800px;" rowspan="2"><b>3. Ada pertambahan BB yang kurang atau lebih selama kehamilan ?</b></td>
            <td>
                <input type="radio" id="tidak_3" name="table5[pertambahan_bb]" value="0" {{ $skrining_gizi->pertambahan_bb == '0' ? 'checked' : '' }}>
                <label for="tidak_3">(0) a. Tidak</label>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" id="ya_3" name="table5[pertambahan_bb]" value="1" {{ $skrining_gizi->pertambahan_bb == '1' ? 'checked' : '' }}>
                <label for="ya_3">(1) b. Ya</label>
            </td>
        </tr>
        <tr>
            <td style="width: 800px;" rowspan="2"><b>4. Nilai HB < 10 g/dl atau HCT < 30 % ?</b></td>
            <td>
                <input type="radio" id="tidak_4" name="table5[nilai_hb]" value="0" {{ $skrining_gizi->nilai_hb == '0' ? 'checked' : '' }}>
                <label for="tidak_4">(0) a. Tidak</label>
            </td>
        </tr>
        <tr>
            <td>
                <input type="radio" id="ya_4" name="table5[nilai_hb]" value="1" {{ $skrining_gizi->nilai_hb == '1' ? 'checked' : '' }}>
                <label for="ya_4">(1) b. Ya</label>
            </td>
        </tr>
        <tr>
            <td class="float-left">Total Skor : <input type="text" name="table5[total_skor_gizi_obgyn]" id="total_skor_skrining_gizi_obgyn" style="border: none" value="{{ $skrining_gizi->total_skor_gizi_obgyn ?? '-' }}" readonly></td>
        </tr>
    </tbody>
</table>

<div class="form-group row mt-3">
    <div class="col-sm-2">
        <label for="">Kategori</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="a" name="table5[kategori_gizi]" value="A : 0-1 = Status gizi baik" {{ $skrining_gizi->kategori_gizi == 'A : 0-1 = Status gizi baik' ? 'checked' : '' }}>
            <label class="custom-control-label" for="a">A : 0-1 = Status gizi baik</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="b" name="table5[kategori_gizi]" value="B : 2-3 = beresiko malnutrisi" {{ $skrining_gizi->kategori_gizi == 'B : 2-3 = beresiko malnutrisi' ? 'checked' : '' }}>
            <label class="custom-control-label" for="b">B : 2-3 = beresiko malnutrisi</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="c" name="table5[kategori_gizi]" value="C : 4 = Risiko malnutrisi Tinggi" {{ $skrining_gizi->kategori_gizi == 'C : 4 = Risiko malnutrisi Tinggi' ? 'checked' : '' }}>
            <label class="custom-control-label" for="c">C : 4 = Risiko malnutrisi Tinggi</label>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Sudah dibaca dan diketahui oleh Dietisien</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="ya_dietisien" name="table5[diketahui_dietisien]" value="Ya" {{ $skrining_gizi->diketahui_dietisien == 'Ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="ya_dietisien">Ya, pukul</label>
            <input type="time" class="form-control ml-2" name="table5[waktu_diketahui]" style="width: 100px;" value="{{ $skrining_gizi->waktu_diketahui }}">
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="tidak_dietisien" name="table5[diketahui_dietisien]" value="Tidak" {{ $skrining_gizi->diketahui_dietisien == 'Tidak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="tidak_dietisien">Tidak</label>
        </div>
    </div>
    <label class="ml-3" for="">Catatan: Pasien dengan <b>B dan C</b> dilakukan Asesmen Lanjut oleh
        dietisien</label>
</div>

<h4 class="mt-3"><b>SKRINING NYERI</b></h4>
<label for="">Skala Wong Baker</label>
<div class="row">
    <div class="col-sm-10" id="img_skala">
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/1.jpg') }}" class="img_skala" data-value="0" width="50px"
                height="55px" style="display: block;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/2.jpg') }}" class="img_skala" data-value="1" width="50px"
                height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/2.jpg') }}" class="img_skala" data-value="2" width="50px"
                height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/2.jpg') }}" class="img_skala" data-value="3" width="50px"
                height="55px" style="display: none;" />
        </label>

        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/3.jpg') }}" class="img_skala" data-value="4" width="50px"
                height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/3.jpg') }}" class="img_skala" data-value="5" width="50px"
                height="55px" style="display: none;" />
        </label>

        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/4.jpg') }}" class="img_skala" data-value="6" width="50px"
                height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/5.jpg') }}" class="img_skala" data-value="7" width="50px"
                height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/5.jpg') }}" class="img_skala" data-value="8" width="50px"
                height="55px" style="display: none;" />
        </label>
        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/5.jpg') }}" class="img_skala" data-value="9" width="50px"
                height="55px" style="display: none;" />
        </label>

        <label>
            <img src="{{ asset('drawimage/ekspresi_nyeri/6.jpg') }}" class="img_skala" data-value="10"
                width="50px" height="55px" style="display: none;" />
        </label>

        <div class="row">
            <div class="col">
                <div class="range-wrap" style="width: 300px; margin-left: 0">
                    <input type="range" class="range" id="nyeri_skala" name="table6[nyeri_skala]" min="0"
                        max="10" value="{{ $skrining_nyeri->nyeri_skala ?? '0' }}" step="1" oninput="setSkala(this)" />
                    <br />
                    <label for=""></label>
                    <output class="bubble" for="fader" id="skala">{{ $skrining_nyeri->nyeri_skala ?? '0' }} TIDAK NYERI</output>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <table class="table1 w-100">
            <tbody>
                <tr>
                    <td>O</td>
                    <td style="width: 200px;">(Onset) Kapan terjadi, berapa lama, dan berapa sering :
                    </td>
                    <td>
                        <input type="text" class="form-control" name="table6[onset]" value="{{ $skrining_nyeri->onset ?? '' }}">
                    </td>
                </tr>
                <tr>
                    <td>P</td>
                    <td>(Provocating / Palliating) Pencetus nyeri:
                    </td>
                    <td>
                        <input type="text" class="form-control" name="table6[pencetus_nyeri]" value="{{ $skrining_nyeri->pencetus_nyeri ?? '' }}">
                    </td>
                </tr>
                <tr>
                    <td>Q</td>
                    <td>(Quality) Tipe nyeri :
                    </td>
                    <td>
                        @php
                            $tipe_nyeri = explode(',', $skrining_nyeri->tipe_nyeri ?? '');
                        @endphp
                        <input type="checkbox" id="tekanan" name="table6[tipe_nyeri][]" value="Tekanan" {{ in_array('Tekanan', $tipe_nyeri) ? 'checked' : '' }}>
                        <label for="tekanan">Tekanan</label>
                        <input type="checkbox" id="tajam_tusukan" name="table6[tipe_nyeri][]" value="Tajam tusukan" {{ in_array(' Tajam tusukan', $tipe_nyeri) ? 'checked' : '' }}>
                        <label for="tajam_tusukan">Tajam tusukan</label>
                        <input type="checkbox" id="mencengkeram" name="table6[tipe_nyeri][]" value="Mencengkeram" {{ in_array(' Mencengkeram', $tipe_nyeri) ? 'checked' : '' }}>
                        <label for="mencengkeram">Mencengkeram</label>
                        <input type="checkbox" id="melilit" name="table6[tipe_nyeri][]" value="Melilit" {{ in_array(' Melilit', $tipe_nyeri) ? 'checked' : '' }}>
                        <label for="melilit">Melilit</label>
                    </td>
                </tr>
                <tr>
                    <td>R</td>
                    <td>(Region) Menjalar :
                    </td>
                    <td>
                        <input type="text" class="form-control" name="table6[menjalar]" value="{{ $skrining_nyeri->menjalar ?? '' }}">
                    </td>
                </tr>
                <tr>
                    <td>S</td>
                    <td>(Severity) skala nyeri :
                    </td>
                    <td>
                        <input type="text" class="form-control" name="table6[skala_nyeri]" value="{{ $skrining_nyeri->skala_nyeri ?? '' }}">
                    </td>
                </tr>
                <tr>
                    <td>T</td>
                    <td>(Treatment) :
                    </td>
                    <td>
                        <input type="text" class="form-control" name="table6[treatment]" value="{{ $skrining_nyeri->treatment ?? '' }}">
                    </td>
                </tr>
                <tr>
                    <td>U</td>
                    <td>(Understanding) :
                    </td>
                    <td>
                        <input type="text" class="form-control" name="table6[understanding]" value="{{ $skrining_nyeri->understanding ?? '' }}">
                    </td>
                </tr>
                <tr>
                    <td>V</td>
                    <td>(Value) :
                    </td>
                    <td>
                        <input type="text" class="form-control" name="table6[value]" value="{{ $skrining_nyeri->value ?? '' }}">
                    </td>
                </tr>
            </tbody>
        </table>
        <label for="">*) Catatan: Bila pasien tidak sadar maka gunakan formulir penilaian nyeri dengan Skala
            BPS ( Behavior Pain Scale )</label>
    </div>
</div>

<h6 class="text-center"><b>Behavior Pain Scale</b></h6>
<table class="table1 w-100" id="bps_table">
    <thead>
        <tr>
            <th>Parameter</th>
            <th>Score 1</th>
            <th>Score 2</th>
            <th>Score 3</th>
            <th>Score 4</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Ekspresi wajah</td>
            <td>
                <label class="d-inline"><input type="radio" id="ekspresi_wajah_1" name="table6[ekspresi_wajah]" value="1" {{ $skrining_nyeri->ekspresi_wajah == '1' ? 'checked' : '' }}> Normal</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="ekspresi_wajah_2" name="table6[ekspresi_wajah]" value="2" {{ $skrining_nyeri->ekspresi_wajah == '2' ? 'checked' : '' }}> Mengencang sebagian (alis mengerut)</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="ekspresi_wajah_3" name="table6[ekspresi_wajah]" value="3" {{ $skrining_nyeri->ekspresi_wajah == '3' ? 'checked' : '' }}> Mengencang total (kelopak mata mengatup rapat)</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="ekspresi_wajah_4" name="table6[ekspresi_wajah]" value="4" {{ $skrining_nyeri->ekspresi_wajah == '4' ? 'checked' : '' }}> Meringis</label>
            </td>
        </tr>
        <tr>
            <td>Ekstremitas atas</td>
            <td>
                <label class="d-inline"><input type="radio" id="ekstremitas_atas_1" name="table6[ekstremitas_atas]" value="1" {{ $skrining_nyeri->ekstremitas_atas == '1' ? 'checked' : '' }}> Tidak ada pergerakan</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="ekstremitas_atas_2" name="table6[ekstremitas_atas]" value="2" {{ $skrining_nyeri->ekstremitas_atas == '2' ? 'checked' : '' }}> Tertekuk sebagian</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="ekstremitas_atas_3" name="table6[ekstremitas_atas]" value="3" {{ $skrining_nyeri->ekstremitas_atas == '3' ? 'checked' : '' }}> Tertekuk total dengan fleksi jari</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="ekstremitas_atas_4" name="table6[ekstremitas_atas]" value="4" {{ $skrining_nyeri->ekstremitas_atas == '4' ? 'checked' : '' }}> Retraksi permanen</label>
            </td>
        </tr>
        <tr>
            <td>Compliance terhadap ventilator</td>
            <td>
                <label class="d-inline"><input type="radio" id="compliance_ventilator_1" name="table6[compliance_ventilator]" value="1" {{ $skrining_nyeri->compliance_ventilator == '1' ? 'checked' : '' }}> Toleransi terhadap ventilator</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="compliance_ventilator_2" name="table6[compliance_ventilator]" value="2" {{ $skrining_nyeri->compliance_ventilator == '2' ? 'checked' : '' }}> Sesekali terbatuk, namun masih toleransi terhadap ventilator</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="compliance_ventilator_3" name="table6[compliance_ventilator]" value="3" {{ $skrining_nyeri->compliance_ventilator == '3' ? 'checked' : '' }}> Melawan ventilator</label>
            </td>
            <td>
                <label class="d-inline"><input type="radio" id="compliance_ventilator_4" name="table6[compliance_ventilator]" value="4" {{ $skrining_nyeri->compliance_ventilator == '4' ? 'checked' : '' }}> Tidak dapat mengendalikan pola napas</label>
            </td>
        </tr>
        <tr>
            <td colspan="3"> <label>Skor Total Behavior Pain Scale : </label><input type="text" class="ml-2"
                style="width: 100px; border: none;" name="table6[skor_total_bps]" id="skor_total_bps" value="{{ $skrining_nyeri->skor_total_bps ?? '-' }}" readonly></td>
        </tr>
    </tbody>
</table>

<h4 class="mt-5"><b>SKRINING STATUS FUNGSIONAL</b></h4>
<label class="text-center">PENILAIAN ACTIVITY OF DAILY LIVING (ADL) DENGAN INSTRUMENT INDEKS BATHEL MODIFIKASI</label>
<table class="table1 w-100" id="adl_table">
    <thead>
        <tr>
            <th>NO</th>
            <th>FUNGSI</th>
            <th>SKOR</th>
            <th>KETERANGAN</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="3">1</td>
            <td rowspan="3">Mengendalikan rangsang BAB</td>
            <td>0</td>
            <td>
                <input type="radio" id="bab_0" name="table7[bab]" value="0" {{ $skrining_fungsional->bab == '0' ? 'checked' : '' }}>
                <label for="bab_0">Tidak terkendali/tak teratur (perlu pencahar)</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="bab_1" name="table7[bab]" value="1" {{ $skrining_fungsional->bab == '1' ? 'checked' : '' }}>
                <label for="bab_1">Kadang-kadang tak terkendali (1 x / minggu)</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="bab_2" name="table7[bab]" value="2" {{ $skrining_fungsional->bab == '2' ? 'checked' : '' }}>
                <label for="bab_2">Terkendali teratur</label>
            </td>
        </tr>
        <tr>
            <td rowspan="3">2</td>
            <td rowspan="3">Mengendalikan rangsang BAK</td>
            <td>0</td>
            <td>
                <input type="radio" id="bak_0" name="table7[bak]" value="0" {{ $skrining_fungsional->bak == '0' ? 'checked' : '' }}>
                <label for="bak_0">Tak terkendali atau pakai kateter</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="bak_1" name="table7[bak]" value="1" {{ $skrining_fungsional->bak == '1' ? 'checked' : '' }}>
                <label for="bak_1">Kadang-kadang tak terkendali (hanya 1 x / 24 jam)</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="bak_2" name="table7[bak]" value="2" {{ $skrining_fungsional->bak == '2' ? 'checked' : '' }}>
                <label for="bak_2">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="2">3</td>
            <td rowspan="2">Membersihkan diri (seka, sisir, sikat gigi)</td>
            <td>0</td>
            <td>
                <input type="radio" id="membersihkan_diri_0" name="table7[membersihkan_diri]" value="0" {{ $skrining_fungsional->membersihkan_diri == '0' ? 'checked' : '' }}>
                <label for="membersihkan_diri_0">Butuh pertolongan orang lain</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="membersihkan_diri_1" name="table7[membersihkan_diri]" value="1" {{ $skrining_fungsional->membersihkan_diri == '1' ? 'checked' : '' }}>
                <label for="membersihkan_diri_1">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="3">4</td>
            <td rowspan="3">Penggunaan WC (in/out, lepas/pakai celana, siram)</td>
            <td>0</td>
            <td>
                <input type="radio" id="wc_0" name="table7[wc]" value="0" {{ $skrining_fungsional->wc == '0' ? 'checked' : '' }}>
                <label for="wc_0">Tergantung pertolongan orang lain</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="wc_1" name="table7[wc]" value="1" {{ $skrining_fungsional->wc == '1' ? 'checked' : '' }}>
                <label for="wc_1">Perlu pertolongan pada beberapa kegiatan tetapi dapat mengerjakan sendiri
                    beberapa kegiatan yang lain</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="wc_2" name="table7[wc]" value="2" {{ $skrining_fungsional->wc == '2' ? 'checked' : '' }}>
                <label for="wc_2">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="3">5</td>
            <td rowspan="3">Makan minum (jika makan harus berupa potongan, dianggap dibantu)</td>
            <td>0</td>
            <td>
                <input type="radio" id="makan_minum_0" name="table7[makan_minum]" value="0" {{ $skrining_fungsional->makan_minum == '0' ? 'checked' : '' }}>
                <label for="makan_minum_0">Tidak mampu</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="makan_minum_1" name="table7[makan_minum]" value="1" {{ $skrining_fungsional->makan_minum == '1' ? 'checked' : '' }}>
                <label for="makan_minum_1">Perlu ditolong memotong makanan</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="makan_minum_2" name="table7[makan_minum]" value="2" {{ $skrining_fungsional->makan_minum == '2' ? 'checked' : '' }}>
                <label for="makan_minum_2">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="4">6</td>
            <td rowspan="4">Bergerak dari kursi roda ke tempat tidur dan sebaliknya (termasuk duduk di tempat tidur)
            </td>
            <td>0</td>
            <td>
                <input type="radio" id="bergerak_0" name="table7[bergerak]" value="0" {{ $skrining_fungsional->bergerak == '0' ? 'checked' : '' }}>
                <label for="bergerak_0">Tidak mampu</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="bergerak_1" name="table7[bergerak]" value="1" {{ $skrining_fungsional->bergerak == '1' ? 'checked' : '' }}>
                <label for="bergerak_1">Perlu banyak bantuan untuk bisa duduk (2 orang)</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="bergerak_2" name="table7[bergerak]" value="2" {{ $skrining_fungsional->bergerak == '2' ? 'checked' : '' }}>
                <label for="bergerak_2">Bantuan minimal 1 orang</label>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>
                <input type="radio" id="bergerak_3" name="table7[bergerak]" value="3" {{ $skrining_fungsional->bergerak == '3' ? 'checked' : '' }}>
                <label for="bergerak_3">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="4">7</td>
            <td rowspan="4">Berjalan di tempat rata (atau jika tidak bisa berjalan, menjalankan kursi roda)</td>
            <td>0</td>
            <td>
                <input type="radio" id="berjalan_0" name="table7[berjalan]" value="0" {{ $skrining_fungsional->berjalan == '0' ? 'checked' : '' }}>
                <label for="berjalan_0">Tidak mampu</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="berjalan_1" name="table7[berjalan]" value="1" {{ $skrining_fungsional->berjalan == '1' ? 'checked' : '' }}>
                <label for="berjalan_1">Bisa (pindah) dengan kursi roda</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="berjalan_2" name="table7[berjalan]" value="2" {{ $skrining_fungsional->berjalan == '2' ? 'checked' : '' }}>
                <label for="berjalan_2">Berjalan dengan bantuan 1 orang</label>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>
                <input type="radio" id="berjalan_3" name="table7[berjalan]" value="3" {{ $skrining_fungsional->berjalan == '3' ? 'checked' : '' }}>
                <label for="berjalan_3">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="3">8</td>
            <td rowspan="3">Berpakaian (termasuk memasang tali sepatu, mengencangkan sabuk)</td>
            <td>0</td>
            <td>
                <input type="radio" id="berpakaian_0" name="table7[berpakaian]" value="0" {{ $skrining_fungsional->berpakaian == '0' ? 'checked' : '' }}>
                <label for="berpakaian_0">Tergantung orang lain</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="berpakaian_1" name="table7[berpakaian]" value="1" {{ $skrining_fungsional->berpakaian == '1' ? 'checked' : '' }}>
                <label for="berpakaian_1">Sebagian dibantu (mis: mengancing baju)</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="berpakaian_2" name="table7[berpakaian]" value="2" {{ $skrining_fungsional->berpakaian == '2' ? 'checked' : '' }}>
                <label for="berpakaian_2">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="3">9</td>
            <td rowspan="3">Naik turun tangga</td>
            <td>0</td>
            <td>
                <input type="radio" id="tangga_0" name="table7[tangga]" value="0" {{ $skrining_fungsional->tangga == '0' ? 'checked' : '' }}>
                <label for="tangga_0">Tidak mampu</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="tangga_1" name="table7[tangga]" value="1" {{ $skrining_fungsional->tangga == '1' ? 'checked' : '' }}>
                <label for="tangga_1">Butuh pertolongan</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="tangga_2" name="table7[tangga]" value="2" {{ $skrining_fungsional->tangga == '2' ? 'checked' : '' }}>
                <label for="tangga_2">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="2">10</td>
            <td rowspan="2">Mandi</td>
            <td>0</td>
            <td>
                <input type="radio" id="mandi_0" name="table7[mandi]" value="0" {{ $skrining_fungsional->mandi == '0' ? 'checked' : '' }}>
                <label for="mandi_0">Tergantung orang lain</label>
            </td>
      </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="mandi_1" name="table7[mandi]" value="1" {{ $skrining_fungsional->mandi == '1' ? 'checked' : '' }}>
                <label for="mandi_1">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="4">
                <label for="total_adl" class="mr-2">Total Skor ADL: </label>
                <input type="text" id="total_adl" name="table7[total_skor_adl]" value="{{ $skrining_fungsional->total_skor_adl ?? '0' }}"
                    readonly style="width: 100px; border: none;">
            </td>
        </tr>
    </tbody>
</table>

<div class="row mt-3">
    <div class="col-sm-4">
        <table class="table1">
            <thead>
                <tr>
                    <th colspan="2">Skor Modifikasi Barthel Indeks (Nilai AKS):</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="radio" id="aks_20" name="table7[nilai_aks]" value="(20)Mandiri (A)" {{ $skrining_fungsional->nilai_aks == '(20)Mandiri (A)' ? 'checked' : '' }}>
                        <label for="aks_20">(20)Mandiri (A)</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="aks_12_19" name="table7[nilai_aks]" value="(12-19)Ketergantungan ringan (B)" {{ $skrining_fungsional->nilai_aks == '(12-19)Ketergantungan ringan (B)' ? 'checked' : '' }}>
                        <label for="aks_12_19">(12-19)Ketergantungan ringan (B)</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="aks_9_11" name="table7[nilai_aks]" value="(9-11)Ketergantungan sedang (B)" {{ $skrining_fungsional->nilai_aks == '(9-11)Ketergantungan sedang (B)' ? 'checked' : '' }}>
                        <label for="aks_9_11">(9-11)Ketergantungan sedang (B)</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="aks_5_8" name="table7[nilai_aks]" value="(5-8)Ketergantungan berat (C)" {{ $skrining_fungsional->nilai_aks == '(5-8)Ketergantungan berat (C)' ? 'checked' : '' }}>
                        <label for="aks_5_8">(5-8)Ketergantungan berat (C)</label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-sm-8">
        <table class="table1">
            <tbody>
                <tr>
                    <td>
                        <input type="radio" id="kategori_1" name="table7[kategori_perawatan]" value="Kategori I" {{ $skrining_fungsional->kategori_perawatan == 'Kategori I' ? 'checked' : '' }}>
                        <label for="kategori_1">Kategori I : Perawatan Minimal (self care), memerlukan waktu 1 - 2 jam / 24 jam</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="kategori_2" name="table7[kategori_perawatan]" value="Kategori II" {{ $skrining_fungsional->kategori_perawatan == 'Kategori II' ? 'checked' : '' }}>
                        <label for="kategori_2">Kategori II : Kriteria Perawatan Partial (Intermediate Care), memerlukan waktu 3 - 4 jam / 24 jam</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="kategori_3" name="table7[kategori_perawatan]" value="Kategori III" {{ $skrining_fungsional->kategori_perawatan == 'Kategori III' ? 'checked' : '' }}>
                        <label for="kategori_3">Kategori III : Kriteria Perawatan Maksimal ( Total Care / Intensif Care), memerlukan waktu 5 - 6 jam / 24 jam</label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="pagination d-flex justify-content-between mt-2">
    <button type="button" class="btn btn-secondary prev" data-toggle="tab">Previous</button>
    <button type="button" class="btn btn-secondary next" data-toggle="tab">Next</button>
</div>