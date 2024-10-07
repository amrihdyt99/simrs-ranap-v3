<h4><b>PENGKAJIAN KULIT</b></h4>
<table class="table1 w-100" id="pengkajian_kulit_table">
    <thead>
        <tr>
            <th class="text-center" width="20">No</th>
            <th class="text-center">Parameter</th>
            <th class="text-center">Skor</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td><b>PERSEPSI SENSORI</b><br>Kemampuan untuk merespon ketidaknyamanan tekanan</td>
            <td>
                <input type="radio" name="table8[persepsi_sensori]" value="1" id="persepsi_sensori_1" {{ $pengkajian_kulit->persepsi_sensori == '1' ? 'checked' : '' }}>
                <label for="persepsi_sensori_1">(1) Tidak berespon</label><br>
                <input type="radio" name="table8[persepsi_sensori]" value="2" id="persepsi_sensori_2" {{ $pengkajian_kulit->persepsi_sensori == '2' ? 'checked' : '' }}>
                <label for="persepsi_sensori_2">(2) Sangat terbatas</label><br>
                <input type="radio" name="table8[persepsi_sensori]" value="3" id="persepsi_sensori_3" {{ $pengkajian_kulit->persepsi_sensori == '3' ? 'checked' : '' }}>
                <label for="persepsi_sensori_3">(3) Sedikit terbatas</label><br>
                <input type="radio" name="table8[persepsi_sensori]" value="4" id="persepsi_sensori_4" {{ $pengkajian_kulit->persepsi_sensori == '4' ? 'checked' : '' }}>
                <label for="persepsi_sensori_4">(4) Tidak ada gangguan</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td><b>KELEMBABAN</b><br>Sejauh mana kulit terpapar kelembaban</td>
            <td>
                <input type="radio" name="table8[kelembaban]" value="1" id="kelembaban_1" {{ $pengkajian_kulit->kelembaban == '1' ? 'checked' : '' }}>
                <label for="kelembaban_1">(1) Kelembaban konstan</label><br>
                <input type="radio" name="table8[kelembaban]" value="2" id="kelembaban_2" {{ $pengkajian_kulit->kelembaban == '2' ? 'checked' : '' }}>
                <label for="kelembaban_2">(2) Sering lembab</label><br>
                <input type="radio" name="table8[kelembaban]" value="3" id="kelembaban_3" {{ $pengkajian_kulit->kelembaban == '3' ? 'checked' : '' }}>
                <label for="kelembaban_3">(3) Kadang lembab</label><br>
                <input type="radio" name="table8[kelembaban]" value="4" id="kelembaban_4" {{ $pengkajian_kulit->kelembaban == '4' ? 'checked' : '' }}>
                <label for="kelembaban_4">(4) Jarang lembab</label>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td><b>AKTIVITAS</b><br>Tingkat aktivitas fisik</td>
            <td>
                <input type="radio" name="table8[aktivitas]" value="1" id="aktivitas_1" {{ $pengkajian_kulit->aktivitas == '1' ? 'checked' : '' }}>
                <label for="aktivitas_1">(1) Tergeletak di tempat tidur</label><br>
                <input type="radio" name="table8[aktivitas]" value="2" id="aktivitas_2" {{ $pengkajian_kulit->aktivitas == '2' ? 'checked' : '' }}>
                <label for="aktivitas_2">(2) Tidak bisa berjalan</label><br>
                <input type="radio" name="table8[aktivitas]" value="3" id="aktivitas_3" {{ $pengkajian_kulit->aktivitas == '3' ? 'checked' : '' }}>
                <label for="aktivitas_3">(3) Berjalan pada jarak terbatas</label><br>
                <input type="radio" name="table8[aktivitas]" value="4" id="aktivitas_4" {{ $pengkajian_kulit->aktivitas == '4' ? 'checked' : '' }}>
                <label for="aktivitas_4">(4) Berjalan di sekitar ruangan</label>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td><b>MOBILITAS</b><br>Kemampuan untuk mengubah dan mengontrol posisi tubuh</td>
            <td>
                <input type="radio" name="table8[mobilitas]" value="1" id="mobilitas_1" {{ $pengkajian_kulit->mobilitas == '1' ? 'checked' : '' }}>
                <label for="mobilitas_1">(1) Tidak bisa bergerak</label><br>
                <input type="radio" name="table8[mobilitas]" value="2" id="mobilitas_2" {{ $pengkajian_kulit->mobilitas == '2' ? 'checked' : '' }}>
                <label for="mobilitas_2">(2) Sangat terbatas</label><br>
                <input type="radio" name="table8[mobilitas]" value="3" id="mobilitas_3" {{ $pengkajian_kulit->mobilitas == '3' ? 'checked' : '' }}>
                <label for="mobilitas_3">(3) Sedikit terbatas</label><br>
                <input type="radio" name="table8[mobilitas]" value="4" id="mobilitas_4" {{ $pengkajian_kulit->mobilitas == '4' ? 'checked' : '' }}>
                <label for="mobilitas_4">(4) Tidak ada batasan</label>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td><b>NUTRISI</b><br>Pola asupan makanan</td>
            <td>
                <input type="radio" name="table8[nutrisi]" value="1" id="nutrisi_1" {{ $pengkajian_kulit->nutrisi == '1' ? 'checked' : '' }}>
                <label for="nutrisi_1">(1) Sangat buruk</label><br>
                <input type="radio" name="table8[nutrisi]" value="2" id="nutrisi_2" {{ $pengkajian_kulit->nutrisi == '2' ? 'checked' : '' }}>
                <label for="nutrisi_2">(2) Kurang adekuat</label><br>
                <input type="radio" name="table8[nutrisi]" value="3" id="nutrisi_3" {{ $pengkajian_kulit->nutrisi == '3' ? 'checked' : '' }}>
                <label for="nutrisi_3">(3) Adekuat</label><br>
                <input type="radio" name="table8[nutrisi]" value="4" id="nutrisi_4" {{ $pengkajian_kulit->nutrisi == '4' ? 'checked' : '' }}>
                <label for="nutrisi_4">(4) Sangat baik</label>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td><b>FRIKSI DAN GESEKAN</b></td>
            <td>
                <input type="radio" name="table8[friksi_gesekan]" value="1" id="friksi_gesekan_1" {{ $pengkajian_kulit->friksi_gesekan == '1' ? 'checked' : '' }}>
                <label for="friksi_gesekan_1">(1) Masalah</label><br>
                <input type="radio" name="table8[friksi_gesekan]" value="2" id="friksi_gesekan_2" {{ $pengkajian_kulit->friksi_gesekan == '2' ? 'checked' : '' }}>
                <label for="friksi_gesekan_2">(2) Potensi Masalah</label><br>
                <input type="radio" name="table8[friksi_gesekan]" value="3" id="friksi_gesekan_3" {{ $pengkajian_kulit->friksi_gesekan == '3' ? 'checked' : '' }}>
                <label for="friksi_gesekan_3">(3) Tidak ada masalah</label>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <label for="total_parameter">Total Parameter:</label>
                <input type="text" name="table8[total_parameter]" id="total_parameter" style="border: none" value="{{ $pengkajian_kulit->total_parameter ?? '-' }}" readonly>
            </td>
        </tr>
    </tbody>
</table>

<div class="form-group row mt-3">
    <div class="col-sm-3 d-flex align-items-center">
        <label for="">Skor Braden</label>
        <input type="text" class="form-control ml-3" name="table8[skor_braden]" value="{{ $pengkajian_kulit->skor_braden ?? '' }}"><br>
    </div>
    <div class="col-sm-9">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="resiko_rendah" name="table8[resiko_braden]" value="Resiko Rendah (Skor 20 - 23)" {{ $pengkajian_kulit->resiko_braden == 'Resiko Rendah (Skor 20 - 23)' ? 'checked' : '' }}>
            <label class="custom-control-label" for="resiko_rendah">Resiko Rendah (Skor 20 - 23)</label>
        </div><br>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="resiko_sedang" name="table8[resiko_braden]" value="Resiko Sedang (Skor 15 - 19)" {{ $pengkajian_kulit->resiko_braden == 'Resiko Sedang (Skor 15 - 19)' ? 'checked' : '' }}>
            <label class="custom-control-label" for="resiko_sedang">Resiko Sedang (Skor 15 - 19)</label>
        </div><br>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="resiko_tinggi" name="table8[resiko_braden]" value="Resiko Tinggi (Skor 10 - 14)" {{ $pengkajian_kulit->resiko_braden == 'Resiko Tinggi (Skor 10 - 14)' ? 'checked' : '' }}>
            <label class="custom-control-label" for="resiko_tinggi">Resiko Tinggi (Skor 10 - 14)</label>
        </div><br>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="resiko_sangat_tinggi" name="table8[resiko_braden]" value="Sangat Tinggi (Skor 6-9)" {{ $pengkajian_kulit->resiko_braden == 'Sangat Tinggi (Skor 6-9)' ? 'checked' : '' }}>
            <label class="custom-control-label" for="resiko_sangat_tinggi">Sangat Tinggi (Skor 6-9)</label>
        </div>
    </div>
</div>

<div class="form-group row mt-3">
    <div class="col-sm-2">
        <label for="">Terdapat luka</label>
    </div>
    <div class="col-sm-5">
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" id="terdapat_luka_tidak" name="table8[terdapat_luka]" value="tidak" type="radio" {{ $pengkajian_kulit->terdapat_luka == 'tidak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="terdapat_luka_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" id="terdapat_luka_ya" name="table8[terdapat_luka]" value="ya" type="radio" {{ $pengkajian_kulit->terdapat_luka == 'ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="terdapat_luka_ya">Ya</label>
        </div>
    </div>
    <div class="col-sm-12">
        <label for="" class="text-danger">(Berikan tanda X / arsiran pada lokasi luka di tubuh pasien pada gambar)</label>
        <div id="signature-pad-luka" class="signature-pad">
            <div class="signature-pad--body">
                <canvas id="lokasi_luka" style="width: 400px; height: 400px; background: url('{{ asset('drawimage/gambar_orang.jpg') }}') no-repeat center center; background-size: cover;"></canvas>
                <input type="hidden" id="lokasi_luka_image" name="table8[lokasi_luka]" value="{{ $pengkajian_kulit->lokasi_luka }}">
            </div>
            <button type="button" id="clear_btn_luka" class="btn btn-danger mt-2">Hapus</button>
        </div>
    </div>
</div>

<h4><b>PENGKAJIAN KEBUTUHAN AKTIFITAS DAN ISTIRAHAT</b></h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Rentang Gerak (ROM)</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="rentang_gerak_aktif" name="table9[rentang_gerak]" value="aktif" {{ $pengkajian_kebutuhan->rentang_gerak == 'aktif' ? 'checked' : '' }}>
            <label class="custom-control-label" for="rentang_gerak_aktif">Aktif</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="rentang_gerak_pasif" name="table9[rentang_gerak]" value="pasif" {{ $pengkajian_kebutuhan->rentang_gerak == 'pasif' ? 'checked' : '' }}>
            <label class="custom-control-label" for="rentang_gerak_pasif">Pasif</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="rentang_gerak_tidak_dapat_dinilai" name="table9[rentang_gerak]" value="tidak_dapat_dinilai" {{ $pengkajian_kebutuhan->rentang_gerak == 'tidak_dapat_dinilai' ? 'checked' : '' }}>
            <label class="custom-control-label" for="rentang_gerak_tidak_dapat_dinilai">Tidak dapat dinilai</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Deformitas</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="deformitas_tidak_ada" name="table9[deformitas]" value="tidak_ada" {{ $pengkajian_kebutuhan->deformitas == 'tidak_ada' ? 'checked' : '' }}>
            <label class="custom-control-label" for="deformitas_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="deformitas_ada_regio" name="table9[deformitas]" value="ada_regio" {{ $pengkajian_kebutuhan->deformitas == 'ada_regio' ? 'checked' : '' }}>
            <label class="custom-control-label" for="deformitas_ada_regio">Ada regio</label>
        </div>
        <input type="text" class="form-control" name="table9[deformitas_text]" placeholder="jika ada, jelaskan..." value="{{ $pengkajian_kebutuhan->deformitas_text }}">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Gangguan Tidur</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="gangguan_tidur_tidak" name="table9[gangguan_tidur]" value="tidak" {{ $pengkajian_kebutuhan->gangguan_tidur == 'tidak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="gangguan_tidur_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="gangguan_tidur_ya" name="table9[gangguan_tidur]" value="ya" {{ $pengkajian_kebutuhan->gangguan_tidur == 'ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="gangguan_tidur_ya">Ya</label>
        </div>
        <input type="text" class="form-control" name="table9[gangguan_tidur_text]" placeholder="jika ya, jelaskan..." value="{{ $pengkajian_kebutuhan->gangguan_tidur_text }}">
    </div>
</div>

<h4 class="mt-3"><b>PENGKAJIAN KEBUTUHAN NUTRISI DAN CAIRAN</b></h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Keluhan</label>
    </div>
    <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_tidak_ada" name="table9[keluhan_nutrisi]" value="tidak_ada" {{ $pengkajian_kebutuhan->keluhan_nutrisi == 'tidak_ada' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_mual_muntah" name="table9[keluhan_nutrisi]" value="mual_muntah" {{ $pengkajian_kebutuhan->keluhan_nutrisi == 'mual_muntah' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_mual_muntah">Mual / muntah</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_gangguan_mengunyah" name="table9[keluhan_nutrisi]" value="gangguan_mengunyah" {{ $pengkajian_kebutuhan->keluhan_nutrisi == 'gangguan_mengunyah' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_gangguan_mengunyah">Gangguan mengunyah</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_gangguan_menelan" name="table9[keluhan_nutrisi]" value="gangguan_menelan" {{ $pengkajian_kebutuhan->keluhan_nutrisi == 'gangguan_menelan' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_gangguan_menelan">Gangguan menelan</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Rasa haus berlebihan</label>
    </div>
    <div class="col-sm-2">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="rasa_haus_berlebih_ya" name="table9[rasa_haus_berlebih]" value="ya" {{ $pengkajian_kebutuhan->rasa_haus_berlebih == 'ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="rasa_haus_berlebih_ya">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="rasa_haus_berlebih_tidak" name="table9[rasa_haus_berlebih]" value="tidak" {{ $pengkajian_kebutuhan->rasa_haus_berlebih == 'tidak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="rasa_haus_berlebih_tidak">Tidak</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Mukosa Mulut</label>
    </div>
    <div class="col-sm-6">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="mukosa_mulut_kering" name="table9[mukosa_mulut]" value="kering" {{ $pengkajian_kebutuhan->mukosa_mulut == 'kering' ? 'checked' : '' }}>
            <label class="custom-control-label" for="mukosa_mulut_kering">Kering</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="mukosa_mulut_lembab" name="table9[mukosa_mulut]" value="lembab" {{ $pengkajian_kebutuhan->mukosa_mulut == 'lembab' ? 'checked' : '' }}>
            <label class="custom-control-label" for="mukosa_mulut_lembab">Lembab</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Turgor Kulit</label>
    </div>
    <div class="col-sm-6">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="turgor_kulit_elastis" name="table9[turgor_kulit]" value="elastis" {{ $pengkajian_kebutuhan->turgor_kulit == 'elastis' ? 'checked' : '' }}>
            <label class="custom-control-label" for="turgor_kulit_elastis">Elastis</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="turgor_kulit_tidak_elastis" name="table9[turgor_kulit]" value="tidak_elastis" {{ $pengkajian_kebutuhan->turgor_kulit == 'tidak_elastis' ? 'checked' : '' }}>
            <label class="custom-control-label" for="turgor_kulit_tidak_elastis">Tidak Elastis</label>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Endema</label>
    </div>
    <div class="col-sm-6">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="endema_ya" name="table9[endema]" value="ya" {{ $pengkajian_kebutuhan->endema == 'ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="endema_ya">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="endema_tidak" name="table9[endema]" value="tidak" {{ $pengkajian_kebutuhan->endema == 'tidak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="endema_tidak">Tidak</label>
        </div>
    </div>
</div>

<h4 class="mt-3"><b>PENGKAJIAN KEBUTUHAN ELIMINASI</b></h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="frekuensi_bab">Frekuensi BAB</label>
    </div>
    <div class="col-sm-2">
        <div class="input-group">
            <input type="text" id="frekuensi_bab" name="table9[frekuensi_bab]" class="form-control" style="width: 30px;" value="{{ $pengkajian_kebutuhan->frekuensi_bab != 'tidak_dapat_dikaji' ? $pengkajian_kebutuhan->frekuensi_bab : '' }}">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">x/hari</span>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="frekuensi_bab_tidak_dapat_dikaji" name="table9[frekuensi_bab]" value="tidak_dapat_dikaji" {{ $pengkajian_kebutuhan->frekuensi_bab == 'tidak_dapat_dikaji' ? 'checked' : '' }}>
            <label class="custom-control-label" for="frekuensi_bab_tidak_dapat_dikaji">Tidak dapat dikaji</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="keluhan_bab">Keluhan BAB</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bab_tidak_ada" name="table9[keluhan_bab]" value="tidak_ada" {{ $pengkajian_kebutuhan->keluhan_bab == 'tidak_ada' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_bab_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bab_perdarahan" name="table9[keluhan_bab]" value="perdarahan" {{ $pengkajian_kebutuhan->keluhan_bab == 'perdarahan' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_bab_perdarahan">Perdarahan</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bab_hemorroid" name="table9[keluhan_bab]" value="hemorroid" {{ $pengkajian_kebutuhan->keluhan_bab == 'hemorroid' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_bab_hemorroid">Hemorroid</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bab_konstipasi" name="table9[keluhan_bab]" value="konstipasi" {{ $pengkajian_kebutuhan->keluhan_bab == 'konstipasi' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_bab_konstipasi">Konstipasi</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bab_diare" name="table9[keluhan_bab]" value="diare" {{ $pengkajian_kebutuhan->keluhan_bab == 'diare' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_bab_diare">Diare</label>
        </div>
        <input type="text" id="keluhan_bab_lainnya" name="table9[keluhan_bab_text]" class="form-control" placeholder="Lainnya..." value="{{ $pengkajian_kebutuhan->keluhan_bab_text }}">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="karakteristik_feces">Karakteristik feces</label>
    </div>
    <div class="col-sm-6">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="karakteristik_feces_padat" name="table9[karakteristik_feces]" value="padat" {{ $pengkajian_kebutuhan->karakteristik_feces == 'padat' ? 'checked' : '' }}>
            <label class="custom-control-label" for="karakteristik_feces_padat">Padat</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="karakteristik_feces_lunak" name="table9[karakteristik_feces]" value="lunak" {{ $pengkajian_kebutuhan->karakteristik_feces == 'lunak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="karakteristik_feces_lunak">Lunak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="karakteristik_feces_cair" name="table9[karakteristik_feces]" value="cair" {{ $pengkajian_kebutuhan->karakteristik_feces == 'cair' ? 'checked' : '' }}>
            <label class="custom-control-label" for="karakteristik_feces_cair">Cair</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="warna_feces">Warna Feces</label>
    </div>
    <div class="col-sm-6">
        <input type="text" id="warna_feces" name="table9[warna_feces]" class="form-control" placeholder="Warna..." value="{{ $pengkajian_kebutuhan->warna_feces }}">
    </div>
</div>

<div class="form-group row mt-2">
    <div class="col-sm-2">
        <label for="frekuensi_bak">Frekuensi BAK</label>
    </div>
    <div class="col-sm-2">
        <div class="input-group">
            <input type="text" id="frekuensi_bak" name="table9[frekuensi_bak]" class="form-control" style="width: 30px;" value="{{ $pengkajian_kebutuhan->frekuensi_bak }}">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">x/hari</span>
            </div>
        </div>
    </div>
</div>

<div class="form-group row mt-2">
    <div class="col-sm-2">
        <label for="jumlah_bak">Jumlah BAK</label>
    </div>
    <div class="col-sm-2">
        <div class="input-group">
            <input type="text" id="jumlah_bak" name="table9[jumlah_bak]" class="form-control" style="width: 30px;" value="{{ $pengkajian_kebutuhan->jumlah_bak }}">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">cc/jam</span>
            </div>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="warna_urin">Warna Urin</label>
    </div>
    <div class="col-sm-6">
        <input type="text" id="warna_urin" name="table9[warna_urin]" class="form-control" placeholder="Warna..." value="{{ $pengkajian_kebutuhan->warna_urin }}">
    </div>
</div>

<div class="form-group row mt-2">
    <div class="col-sm-2">
        <label for="keluhan_bak">Keluhan BAK</label>
    </div>
    <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bak_tidak_ada" name="table9[keluhan_bak]" value="tidak_ada" {{ $pengkajian_kebutuhan->keluhan_bak == 'tidak_ada' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_bak_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bak_nyeri" name="table9[keluhan_bak]" value="nyeri" {{ $pengkajian_kebutuhan->keluhan_bak == 'nyeri' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_bak_nyeri">Nyeri</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bak_perdarahan" name="table9[keluhan_bak]" value="perdarahan" {{ $pengkajian_kebutuhan->keluhan_bak == 'perdarahan' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_bak_perdarahan">Perdarahan</label>
        </div>
        <input type="text" id="keluhan_bak_lainnya" name="table9[keluhan_bak_lainnya]" class="form-control" placeholder="Lainnya..." value="{{ $pengkajian_kebutuhan->keluhan_bak_lainnya }}">
    </div>
</div>

<div class="container mt-3">
    <button class="btn btn-primary" type="button" onclick="storeObgyn()">Simpan</button>
  </div>