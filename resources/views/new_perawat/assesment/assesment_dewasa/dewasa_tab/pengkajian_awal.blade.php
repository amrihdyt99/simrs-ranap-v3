<input type="hidden" class="form-control" name="reg_no" value="{{ $reg }}">
<input type="hidden" class="form-control" name="med_rec" value="{{ $medrec }}">
<input type="hidden" class="form-control" name="username" value="{{ auth()->user()->username }}">

<div class="form-group row">
    <div class="col-sm-2">
        <h4><b>ALERGI</b></h4>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="alergi_tidak" name="awal[alergi]" value="tidak" {{ $awal->alergi == 'tidak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="alergi_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="alergi_ya" name="awal[alergi]" value="ya" {{ $awal->alergi == 'ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="alergi_ya">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="alergi_tidak_tahu" name="awal[alergi]" value="tidak_tahu" {{ $awal->alergi == 'tidak_tahu' ? 'checked' : '' }}>
            <label class="custom-control-label" for="alergi_tidak_tahu">Tidak tahu</label>
        </div>
    </div>
</div>
 

<h5>Bila ya :</h5>
<div class="form-group row">
    <div class="col-sm-2 mt-2">
        <label for="alergi_obat">Alergi obat</label>
    </div>
    <div class="col-sm-10 mt-2">
        <input type="text" id="alergi_obat" name="awal[alergi_obat]" class="form-control" placeholder="Nama obat.." value="{{ $awal->alergi_obat ?? '' }}">
    </div>
    <div class="col-sm-2 mt-2">
        <label for="bentuk_reaksi_obat">Bentuk reaksi</label>
    </div>
    <div class="col-sm-10 mt-2">
        <input type="text" id="bentuk_reaksi_obat" name="awal[bentuk_reaksi_obat]" class="form-control" placeholder="Bentuk reaksi.." value="{{ $awal->bentuk_reaksi_obat ?? '' }}">
    </div>
</div>

<div class="form-group row mt-2">
    <div class="mt-2 col-sm-2">
        <label for="alergi_makanan">Alergi makanan</label>
    </div>
    <div class="mt-2 col-sm-10">
        <input type="text" id="alergi_makanan" name="awal[alergi_makanan]" class="form-control" placeholder="Nama makanan.." value="{{ $awal->alergi_makanan ?? '' }}">
    </div>
    <div class="mt-2 col-sm-2">
        <label for="bentuk_reaksi_makanan">Bentuk reaksi</label>
    </div>
    <div class="mt-2 col-sm-10">
        <input type="text" id="bentuk_reaksi_makanan" name="awal[bentuk_reaksi_makanan]" class="form-control" placeholder="Bentuk reaksi.." value="{{ $awal->bentuk_reaksi_makanan ?? '' }}">
    </div>
</div>

<div class="form-group row mt-2">
    <div class="mt-2 col-sm-2">  
        <label for="alergi_lainnya">Alergi lainnya</label>
    </div>
    <div class="mt-2 col-sm-10">
        <input type="text" id="alergi_lainnya" name="awal[alergi_lainnya]" class="form-control" placeholder="Nama lainnya.." value="{{ $awal->alergi_lainnya ?? '' }}">
    </div>
    <div class="mt-2 col-sm-2">
        <label for="bentuk_reaksi_lainnya">Bentuk reaksi</label>
    </div>
    <div class="mt-2 col-sm-10">
        <input type="text" id="bentuk_reaksi_lainnya" name="awal[bentuk_reaksi_lainnya]" class="form-control" placeholder="Bentuk reaksi lainnya.." value="{{ $awal->bentuk_reaksi_lainnya ?? '' }}">
    </div>
</div>


<div class="form-group row">
    <div class="col-sm-2">
        <label for="" class="mr-3">Diberitahukan kepada</label>
    </div>
    <div class="col-sm-10 d-flex align-items-center">
        @php
        $diberitahukan_kpd = explode(',', $awal->diberitahukan_kpd ?? '');
        @endphp
        <div class="custom-control custom-checkbox custom-control-inline">
            <input class="custom-control-input" type="checkbox" id="diberitahukan_dokter" name="awal[diberitahukan_kpd][]" value="dokter" {{ in_array('dokter', $diberitahukan_kpd) ? 'checked' : '' }}>
            <label class="custom-control-label" for="diberitahukan_dokter">Dokter</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input class="custom-control-input" type="checkbox" id="diberitahukan_farmasis" name="awal[diberitahukan_kpd][]" value="farmasis" {{ in_array(' farmasis', $diberitahukan_kpd) ? 'checked' : '' }}>
            <label class="custom-control-label" for="diberitahukan_farmasis">Farmasis (apoteker)</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input class="custom-control-input" type="checkbox" id="diberitahukan_dietisien" name="awal[diberitahukan_kpd][]" value="dietisien" {{ in_array(' dietisien', $diberitahukan_kpd) ? 'checked' : '' }}>
            <label class="custom-control-label" for="diberitahukan_dietisien">Dietisien</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="diberitahukan_ya" name="awal[diberitahukan_status]" value="ya" {{ $awal->diberitahukan_status == 'ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="diberitahukan_ya">Ya, Pukul</label>
        </div>
        <input type="time" id="diberitahukan_pukul" name="awal[diberitahukan_jam]" class="form-control mr-3" style="width: 100px;" value="{{ $awal->diberitahukan_jam ?? '' }}">
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="diberitahukan_tidak" name="awal[diberitahukan_status]" value="tidak" {{ $awal->diberitahukan_status == 'tidak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="diberitahukan_tidak">Tidak</label>
        </div>
    </div>
</div>

<h4><b>KEADAAN UMUM</b></h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="" class="mr-3">Kesadaran</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kesadaran_compos_mentis" name="awal[kesadaran]" value="Compos mentis" {{ $awal->kesadaran == 'Compos mentis' ? 'checked' : '' }}>
            <label class="custom-control-label" for="kesadaran_compos_mentis">Compos mentis</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kesadaran_delirium" name="awal[kesadaran]" value="Delirium" {{ $awal->kesadaran == 'Delirium' ? 'checked' : '' }}>
            <label class="custom-control-label" for="kesadaran_delirium">Delirium</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kesadaran_somnolen" name="awal[kesadaran]" value="Somnolen" {{ $awal->kesadaran == 'Somnolen' ? 'checked' : '' }}>
            <label class="custom-control-label" for="kesadaran_somnolen">Somnolen</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kesadaran_sopor" name="awal[kesadaran]" value="Sopor" {{ $awal->kesadaran == 'Sopor' ? 'checked' : '' }}>
            <label class="custom-control-label" for="kesadaran_sopor">Sopor</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kesadaran_koma" name="awal[kesadaran]" value="Koma" {{ $awal->kesadaran == 'Koma' ? 'checked' : '' }}>
            <label class="custom-control-label" for="kesadaran_koma">Koma</label>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="" class="mr-3">Kondisi Umum</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kondisi_baik" name="awal[kondisi_umum]" value="Baik" {{ $awal->kondisi_umum == 'Baik' ? 'checked' : '' }}>
            <label class="custom-control-label" for="kondisi_baik">Baik</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kondisi_tampak_sakit" name="awal[kondisi_umum]" value="Tampak sakit" {{ $awal->kondisi_umum == 'Tampak sakit' ? 'checked' : '' }}>
            <label class="custom-control-label" for="kondisi_tampak_sakit">Tampak sakit</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kondisi_sesak" name="awal[kondisi_umum]" value="Sesak" {{ $awal->kondisi_umum == 'Sesak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="kondisi_sesak">Sesak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kondisi_pucat" name="awal[kondisi_umum]" value="Pucat" {{ $awal->kondisi_umum == 'Pucat' ? 'checked' : '' }}>
            <label class="custom-control-label" for="kondisi_pucat">Pucat</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kondisi_lemah" name="awal[kondisi_umum]" value="Lemah" {{ $awal->kondisi_umum == 'Lemah' ? 'checked' : '' }}>
            <label class="custom-control-label" for="kondisi_lemah">Lemah</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kondisi_lainnya" name="awal[kondisi_umum]" value="Lainnya" {{ $awal->kondisi_umum == 'Lainnya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="kondisi_lainnya">Lainnya</label>
        </div>
        <input type="text" id="kondisi_lainnya_text" name="awal[kondisi_umum_lainnya_text]" placeholder="lainnya.." class="form-control" value="{{ $awal->kondisi_umum_lainnya_text ?? '' }}">
    </div>
</div>

<div class="form-group mt-3 row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-2">
        <label for="tekanan_darah">Tekanan Darah</label>
        <div class="input-group">
            <input type="number" id="tekanan_darah" name="awal[tekanan_darah]" class="form-control" value="{{ $awal->tekanan_darah ?? '' }}">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">mmHg</span>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <label for="nadi">Nadi</label>
        <div class="input-group">
            <input type="number" id="nadi" name="awal[nadi]" class="form-control" value="{{ $awal->nadi ?? '' }}">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">x/mnt</span>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <label for="suhu">Suhu</label>
        <div class="input-group">
            <input type="number" id="suhu" name="awal[suhu]" class="form-control" value="{{ $awal->suhu ?? '' }}">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">°C</span>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <label for="pernafasan">Pernafasan</label>
        <div class="input-group">
            <input type="number" id="pernafasan" name="awal[pernafasan]" class="form-control" value="{{ $awal->pernafasan ?? '' }}">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">x/mnt</span>
            </div>
        </div>
    </div>
</div>

<div class="form-group mt-3 row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-2">
        <label for="tinggi_badan">Tinggi badan</label>
        <div class="input-group">
            <input type="number" id="tinggi_badan" name="awal[tinggi_badan]" class="form-control" value="{{ $awal->tinggi_badan ?? '' }}">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">cm</span>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <label for="berat_badan">Berat badan</label>
        <div class="input-group">
            <input type="number" id="berat_badan" name="awal[berat_badan]" class="form-control" value="{{ $awal->berat_badan ?? '' }}">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">kg</span>
            </div>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Kebutuhan Khusus</label>
    </div>
    <div class="col-sm-10">
        @php
        $kebutuhan_khusus = explode(',', $awal->kebutuhan_khusus ?? '');
        @endphp
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_tidak_ada" name="awal[kebutuhan_khusus][]" value="Tidak ada" {{ in_array('Tidak ada', $kebutuhan_khusus) ? 'checked' : '' }}>
            <label class="custom-control-label" for="kebutuhan_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_alat_bantu_dengar" name="awal[kebutuhan_khusus][]" value="Alat bantu dengar" {{ in_array(' Alat bantu dengar', $kebutuhan_khusus) ? 'checked' : '' }}>
            <label class="custom-control-label" for="kebutuhan_alat_bantu_dengar">Alat bantu dengar</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_kaca_mata" name="awal[kebutuhan_khusus][]" value="Kaca mata" {{ in_array(' Kaca mata', $kebutuhan_khusus) ? 'checked' : '' }}>
            <label class="custom-control-label" for="kebutuhan_kaca_mata">Kaca mata</label>
        </div>  
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_tongkat" name="awal[kebutuhan_khusus][]" value="Tongkat" {{ in_array(' Tongkat', $kebutuhan_khusus) ? 'checked' : '' }}>
            <label class="custom-control-label" for="kebutuhan_tongkat">Tongkat</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_gigi_palsu" name="awal[kebutuhan_khusus][]" value="Gigi palsu" {{ in_array(' Gigi palsu', $kebutuhan_khusus) ? 'checked' : '' }}>
            <label class="custom-control-label" for="kebutuhan_gigi_palsu">Gigi palsu</label>
        </div>  
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_lainnya" name="awal[kebutuhan_khusus][]" value="Lainnya" {{ in_array(' Lainnya', $kebutuhan_khusus) ? 'checked' : '' }}>
            <label class="custom-control-label" for="kebutuhan_lainnya">Lainnya</label>
        </div>
        <input type="text" id="kebutuhan_khusus_lainnya_text" name="awal[kebutuhan_khusus_lainnya_text]" placeholder="lainnya.." class="form-control" value="{{ $awal->kebutuhan_khusus_lainnya_text ?? '' }}">
    </div>
</div>

<h4 class="mt-3"><b>DATA PSIKOLOGIS, SOSIAL, EKONOMI DAN SPIRITUAL</b></h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="status_emosional">Status emosional</label>
    </div>
    <div class="col-sm-10">
        @php
        $status_emosional = explode(',', $awal->status_emosional ?? '');
        @endphp
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="status_stabil" name="awal[status_emosional][]" value="Stabil/tenang" {{ in_array('Stabil/tenang', $status_emosional) ? 'checked' : '' }}>
            <label class="custom-control-label" for="status_stabil">Stabil/tenang</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="status_cemas" name="awal[status_emosional][]" value="Cemas/Takut" {{ in_array(' Cemas/Takut', $status_emosional) ? 'checked' : '' }}>
            <label class="custom-control-label" for="status_cemas">Cemas/Takut</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="status_marah" name="awal[status_emosional][]" value="Marah" {{ in_array(' Marah', $status_emosional) ? 'checked' : '' }}>
            <label class="custom-control-label" for="status_marah">Marah</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="status_sedih" name="awal[status_emosional][]" value="Sedih" {{ in_array(' Sedih', $status_emosional) ? 'checked' : '' }}>
            <label class="custom-control-label" for="status_sedih">Sedih</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="status_lainnya" name="awal[status_emosional][]" value="Lainnya" {{ in_array(' Lainnya', $status_emosional) ? 'checked' : '' }}>
            <label class="custom-control-label" for="status_lainnya">Lainnya</label>
        </div>
        <input type="text" id="status_lainnya_text" name="awal[status_emosional_text]" placeholder="lainnya.." class="form-control" value="{{ $awal->status_emosional_text ?? '' }}">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-1">
        <label for="kebiasaan">Kebiasaan</label>
    </div>
    <div class="col-sm-1">
        <label for="merokok">Merokok</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="merokok_tidak" name="awal[merokok]" value="Tidak" {{ $awal->merokok == 'Tidak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="merokok_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="merokok_ya" name="awal[merokok]" value="Ya" {{ $awal->merokok == 'Ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="merokok_ya">Ya</label>
            <div class="input-group ml-2">
                <input type="text" id="frekuensi_merokok" name="awal[frekuensi_merokok]" class="form-control" style="width: 60px;" value="{{ $awal->frekuensi_merokok ?? '' }}">
                <div class="input-group-append">
                    <span class="input-group-text bg-primary text-white" style="padding: 5px;">batang/hari</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-1">
        <label for=""></label>
    </div>
    <div class="col-sm-1">
        <label for="minuman_alkohol">Minuman Alkohol</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="alkohol_tidak" name="awal[minuman_alkohol]" value="Tidak" {{ $awal->minuman_alkohol == 'Tidak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="alkohol_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="alkohol_ya" name="awal[minuman_alkohol]" value="Ya" {{ $awal->minuman_alkohol == 'Ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="alkohol_ya">Ya</label>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-4">
        <label for="riwayat_gangguan_jiwa">Riwayat pernah mengalami gangguan jiwa di masa lalu</label>
    </div>
    <div class="col-sm-5">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="gangguan_jiwa_tidak" name="awal[riwayat_gangguan_jiwa]" value="Tidak" {{ $awal->riwayat_gangguan_jiwa == 'Tidak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="gangguan_jiwa_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="gangguan_jiwa_ya" name="awal[riwayat_gangguan_jiwa]" value="Ya" {{ $awal->riwayat_gangguan_jiwa == 'Ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="gangguan_jiwa_ya">Ya</label>
        </div>
    </div>
</div>

<table class="table1 w-100" id="sad_person_table">
    <thead>
        <tr>
            <th>No</th>
            <th width="700px" class="text-center">Parameter</th>
            <th>Skor: Ya(1) tidak(0)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Sex ( laki-laki )</td>
            <td>
                <input type="radio" id="sex_ya" name="sad_person[sex]" value="1" {{ $sad_person->sex == '1' ? 'checked' : '' }}>
                <label for="sex_ya">Ya</label>
                <input type="radio" id="sex_tidak" name="sad_person[sex]" value="0" {{ $sad_person->sex == '0' ? 'checked' : '' }}>
                <label for="sex_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Age ( < 19 th atau > 45 th )</td>
            <td>
                <input type="radio" id="age_ya" name="sad_person[age]" value="1" {{ $sad_person->age == '1' ? 'checked' : '' }}>
                <label for="age_ya">Ya</label>
                <input type="radio" id="age_tidak" name="sad_person[age]" value="0" {{ $sad_person->age == '0' ? 'checked' : '' }}>
                <label for="age_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Depresi ( pasien MRS dengan depresi atau penurunan konsentrasi, gangguan tidur, gangguan pola makan, dan gangguan libido )</td>
            <td>
                <input type="radio" id="depresi_ya" name="sad_person[depresi]" value="1" {{ $sad_person->depresi == '1' ? 'checked' : '' }}>
                <label for="depresi_ya">Ya</label>
                <input type="radio" id="depresi_tidak" name="sad_person[depresi]" value="0" {{ $sad_person->depresi == '0' ? 'checked' : '' }}>
                <label for="depresi_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Previous Suicide ( riwayat bunuh diri atau perawatan psikiatri )</td>
            <td>
                <input type="radio" id="suicide_ya" name="sad_person[suicide]" value="1" {{ $sad_person->suicide == '1' ? 'checked' : '' }}>
                <label for="suicide_ya">Ya</label>
                <input type="radio" id="suicide_tidak" name="sad_person[suicide]" value="0" {{ $sad_person->suicide == '0' ? 'checked' : '' }}>
                <label for="suicide_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>Excessive alcohol ( ketergantungan alkohol atau pemakai narkoba )</td>
            <td>
                <input type="radio" id="alcohol_ya" name="sad_person[alcohol]" value="1" {{ $sad_person->alcohol == '1' ? 'checked' : '' }}>
                <label for="alcohol_ya">Ya</label>
                <input type="radio" id="alcohol_tidak" name="sad_person[alcohol]" value="0" {{ $sad_person->alcohol == '0' ? 'checked' : '' }}>
                <label for="alcohol_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>Rational thinking loss ( kehilangan pikiran rasional, psikosis, organic brain syndrome )</td>
            <td>
                <input type="radio" id="thinking_loss_ya" name="sad_person[thinking_loss]" value="1" {{ $sad_person->thinking_loss == '1' ? 'checked' : '' }}>
                <label for="thinking_loss_ya">Ya</label>
                <input type="radio" id="thinking_loss_tidak" name="sad_person[thinking_loss]" value="0" {{ $sad_person->thinking_loss == '0' ? 'checked' : '' }}>
                <label for="thinking_loss_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>7</td>
            <td>Separated ( bercerai / janda )</td>
            <td>
                <input type="radio" id="separated_ya" name="sad_person[separated]" value="1" {{ $sad_person->separated == '1' ? 'checked' : '' }}>
                <label for="separated_ya">Ya</label>
                <input type="radio" id="separated_tidak" name="sad_person[separated]" value="0" {{ $sad_person->separated == '0' ? 'checked' : '' }}>
                <label for="separated_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>8</td>
            <td>Organized plan ( menunjukan rencana bunuh diri yang terorganisir / niat serius )</td>
            <td>
                <input type="radio" id="organized_plan_ya" name="sad_person[organized_plan]" value="1" {{ $sad_person->organized_plan == '1' ? 'checked' : '' }}>
                <label for="organized_plan_ya">Ya</label>
                <input type="radio" id="organized_plan_tidak" name="sad_person[organized_plan]" value="0" {{ $sad_person->organized_plan == '0' ? 'checked' : '' }}>
                <label for="organized_plan_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>9</td>
            <td>No Social Support ( tidak ada pendukung )</td>
            <td>
                <input type="radio" id="no_support_ya" name="sad_person[no_support]" value="1" {{ $sad_person->no_support == '1' ? 'checked' : '' }}>
                <label for="no_support_ya">Ya</label>
                <input type="radio" id="no_support_tidak" name="sad_person[no_support]" value="0" {{ $sad_person->no_support == '0' ? 'checked' : '' }}>
                <label for="no_support_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>10</td>
            <td>Sickness ( menderita penyakit kronis )</td>
            <td>
                <input type="radio" id="sickness_ya" name="sad_person[sickness]" value="1" {{ $sad_person->sickness == '1' ? 'checked' : '' }}>
                <label for="sickness_ya">Ya</label>
                <input type="radio" id="sickness_tidak" name="sad_person[sickness]" value="0" {{ $sad_person->sickness == '0' ? 'checked' : '' }}>
                <label for="sickness_tidak">Tidak</label>
            </td>
        </tr>
    </tbody>
</table>

<div class="form-group row mt-3">
    <div class="col-sm-2">
        <label for="">Skor Sad Person</label>
    </div>
    <div class="col-sm-2">
        <input type="text" class="form-control" name="sad_person[skor_sad_person]" id="skor_sad_person" readonly value="{{ $sad_person->skor_sad_person ?? '' }}">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Kategori</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="kategori_rendah" name="sad_person[kategori_sad_person]" value="Rendah ( 1-2 )" {{ $sad_person->kategori_sad_person == 'Rendah ( 1-2 )' ? 'checked' : '' }}>
            <label class="custom-control-label" for="kategori_rendah">Rendah ( 1-2 )</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="kategori_sedang" name="sad_person[kategori_sad_person]" value="Sedang ( 3-6 )" {{ $sad_person->kategori_sad_person == 'Sedang ( 3-6 )' ? 'checked' : '' }}>
            <label class="custom-control-label" for="kategori_sedang">Sedang ( 3-6 )</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="kategori_tinggi" name="sad_person[kategori_sad_person]" value="Tinggi ( 7 - 10 )" {{ $sad_person->kategori_sad_person == 'Tinggi ( 7 - 10 )' ? 'checked' : '' }}>
            <label class="custom-control-label" for="kategori_tinggi">Tinggi ( 7 - 10 )</label>
        </div>
    </div>
</div>

<div class="form-group row mt-3">
    <div class="col-sm-2">
        <label for="">Riwayat Keinginan dan Percobaan Bunuh Diri</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="riwayat_bunuh_diri_tidak" name="awal[riwayat_bunuh_diri]" value="Tidak" {{ $awal->riwayat_bunuh_diri == 'Tidak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="riwayat_bunuh_diri_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="riwayat_bunuh_diri_ya" name="awal[riwayat_bunuh_diri]" value="Ya" {{ $awal->riwayat_bunuh_diri == 'Ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="riwayat_bunuh_diri_ya">Ya</label>
        </div>
        <input type="text" class="form-control" name="awal[riwayat_bunuh_diri_text]" placeholder="jika ya,jelaskan..." value="{{ $awal->riwayat_bunuh_diri_text ?? '' }}">
    </div>
</div>

<div class="form-group row" style="margin-bottom: 0;">
    <div class="col-sm-2">
        <label for="">Riwayat Trauma psikis</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="riwayat_trauma_psikis_tidak" name="awal[riwayat_trauma_psikis]" value="Tidak" {{ $awal->riwayat_trauma_psikis == 'Tidak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="riwayat_trauma_psikis_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="riwayat_trauma_psikis_ada" name="awal[riwayat_trauma_psikis]" value="Ada" {{ $awal->riwayat_trauma_psikis == 'Ada' ? 'checked' : '' }}>
            <label class="custom-control-label" for="riwayat_trauma_psikis_ada">Ada</label>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-10">
        @php
        $riwayat_trauma_psikis_detail = explode(',', $awal->riwayat_trauma_psikis_detail ?? '');
        @endphp
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="anayaa_fisik_psikologis_kdr" name="awal[riwayat_trauma_psikis_detail][]" value="Aniaya fisik / psikologis/ KDRT" {{ in_array('Aniaya fisik / psikologis/ KDRT', $riwayat_trauma_psikis_detail) ? 'checked' : '' }}>
            <label class="custom-control-label" for="anayaa_fisik_psikologis_kdr">Aniaya fisik / psikologis/ KDRT</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="anayaa_seksual_perkosaan" name="awal[riwayat_trauma_psikis_detail][]" value="Aniaya Seksual/Perkosaan" {{ in_array(' Aniaya Seksual/Perkosaan', $riwayat_trauma_psikis_detail) ? 'checked' : '' }}>
            <label class="custom-control-label" for="anayaa_seksual_perkosaan">Aniaya Seksual/Perkosaan</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="tindakan_kriminal" name="awal[riwayat_trauma_psikis_detail][]" value="Tindakan Kriminal" {{ in_array(' Tindakan Kriminal', $riwayat_trauma_psikis_detail) ? 'checked' : '' }}>
            <label class="custom-control-label" for="tindakan_kriminal">Tindakan Kriminal</label>
        </div>
        <input type="text" name="awal[riwayat_trauma_psikis_detail_kriminal_text]" class="form-control" placeholder="tindakan kriminal...." value="{{ $awal->riwayat_trauma_psikis_detail_kriminal_text ?? '' }}">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="lainnya" name="awal[riwayat_trauma_psikis_detail][]" value="Lainnya" {{ in_array(' Lainnya', $riwayat_trauma_psikis_detail) ? 'checked' : '' }}>
            <label class="custom-control-label" for="lainnya">Lainnya</label>
        </div>
        <input type="text" name="awal[riwayat_trauma_psikis_detail_lain_text]" class="form-control" placeholder="lainnya...." value="{{ $awal->riwayat_trauma_psikis_detail_lain_text ?? '' }}">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Pekerjaan</label>
    </div>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="awal[pekerjaan]" value="{{ $awal->pekerjaan ?? '' }}" placeholder="pekerjaan...">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Hambatan sosial dan ekonomi</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="hambatan_sosial_ekonomi_tidak" name="awal[hambatan_sosial_ekonomi]" value="Tidak" {{ $awal->hambatan_sosial_ekonomi == 'Tidak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="hambatan_sosial_ekonomi_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="hambatan_sosial_ekonomi_ada" name="awal[hambatan_sosial_ekonomi]" value="Ada" {{ $awal->hambatan_sosial_ekonomi == 'Ada' ? 'checked' : '' }}>
            <label class="custom-control-label" for="hambatan_sosial_ekonomi_ada">Ada</label>
        </div>
    </div>
</div>

<h5 class="mt-3">Kebutuhan spiritual pasien dalam perawatan di rumah sakit :</h5>
<div class="form-group row">
    <div class="col-sm-3">
        <label for="">Pasien membutuhkan konseling spiritual/agama :</label>
    </div>
    <div class="col-sm-7">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="konseling_spiritual_tidak" name="awal[konseling_spiritual]" value="Tidak" {{ $awal->konseling_spiritual == 'Tidak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="konseling_spiritual_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="konseling_spiritual_ya" name="awal[konseling_spiritual]" value="Ya" {{ $awal->konseling_spiritual == 'Ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="konseling_spiritual_ya">Ya</label>
        </div>
        <input type="text" class="form-control" name="awal[konseling_spiritual_text]" placeholder="jika ya, jelaskan..." value="{{ $awal->konseling_spiritual_text ?? '' }}">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-3">
        <label for="">Pasien membutuhkan bantuan dalam menjalankan ibadah dan menyetujuinya :</label>
    </div>
    <div class="col-sm-7">
        <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="bantuan_ibadah_tidak" name="awal[bantuan_ibadah]" value="Tidak" {{ $awal->bantuan_ibadah == 'Tidak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="bantuan_ibadah_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="bantuan_ibadah_ya" name="awal[bantuan_ibadah]" value="Ya" {{ $awal->bantuan_ibadah == 'Ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="bantuan_ibadah_ya">Ya</label>
        </div>
        <input type="text" class="form-control" name="awal[bantuan_ibadah_text]" placeholder="jika ya, jelaskan..." value="{{ $awal->bantuan_ibadah_text ?? '' }}">
    </div>
</div>

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
                <input type="radio" id="bab_0" name="adl[bab]" value="0" {{ $adl->bab == '0' ? 'checked' : '' }}>
                <label for="bab_0">Tidak terkendali/tak teratur (perlu pencahar)</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="bab_1" name="adl[bab]" value="1" {{ $adl->bab == '1' ? 'checked' : '' }}>
                <label for="bab_1">Kadang-kadang tak terkendali (1 x / minggu)</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="bab_2" name="adl[bab]" value="2" {{ $adl->bab == '2' ? 'checked' : '' }}>
                <label for="bab_2">Terkendali teratur</label>
            </td>
        </tr>
        <tr>
            <td rowspan="3">2</td>
            <td rowspan="3">Mengendalikan rangsang BAK</td>
            <td>0</td>
            <td>
                <input type="radio" id="bak_0" name="adl[bak]" value="0" {{ $adl->bak == '0' ? 'checked' : '' }}>
                <label for="bak_0">Tak terkendali atau pakai kateter</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="bak_1" name="adl[bak]" value="1" {{ $adl->bak == '1' ? 'checked' : '' }}>
                <label for="bak_1">Kadang-kadang tak terkendali (hanya 1 x / 24 jam)</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="bak_2" name="adl[bak]" value="2" {{ $adl->bak == '2' ? 'checked' : '' }}>
                <label for="bak_2">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="2">3</td>
            <td rowspan="2">Membersihkan diri (seka, sisir, sikat gigi)</td>
            <td>0</td>
            <td>
                <input type="radio" id="membersihkan_diri_0" name="adl[membersihkan_diri]" value="0" {{ $adl->membersihkan_diri == '0' ? 'checked' : '' }}>
                <label for="membersihkan_diri_0">Butuh pertolongan orang lain</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="membersihkan_diri_1" name="adl[membersihkan_diri]" value="1" {{ $adl->membersihkan_diri == '1' ? 'checked' : '' }}>
                <label for="membersihkan_diri_1">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="3">4</td>
            <td rowspan="3">Penggunaan WC (in/out, lepas/pakai celana, siram)</td>
            <td>0</td>
            <td>
                <input type="radio" id="wc_0" name="adl[wc]" value="0" {{ $adl->wc == '0' ? 'checked' : '' }}>
                <label for="wc_0">Tergantung pertolongan orang lain</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="wc_1" name="adl[wc]" value="1" {{ $adl->wc == '1' ? 'checked' : '' }}>
                <label for="wc_1">Perlu pertolongan pada beberapa kegiatan tetapi dapat mengerjakan sendiri
                    beberapa kegiatan yang lain</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="wc_2" name="adl[wc]" value="2" {{ $adl->wc == '2' ? 'checked' : '' }}>
                <label for="wc_2">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="3">5</td>
            <td rowspan="3">Makan minum (jika makan harus berupa potongan, dianggap dibantu)</td>
            <td>0</td>
            <td>
                <input type="radio" id="makan_minum_0" name="adl[makan_minum]" value="0" {{ $adl->makan_minum == '0' ? 'checked' : '' }}>
                <label for="makan_minum_0">Tidak mampu</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="makan_minum_1" name="adl[makan_minum]" value="1" {{ $adl->makan_minum == '1' ? 'checked' : '' }}>
                <label for="makan_minum_1">Perlu ditolong memotong makanan</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="makan_minum_2" name="adl[makan_minum]" value="2" {{ $adl->makan_minum == '2' ? 'checked' : '' }}>
                <label for="makan_minum_2">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="4">6</td>
            <td rowspan="4">Bergerak dari kursi roda ke tempat tidur dan sebaliknya (termasuk duduk di tempat tidur)
            </td>
            <td>0</td>
            <td>
                <input type="radio" id="bergerak_0" name="adl[bergerak]" value="0" {{ $adl->bergerak == '0' ? 'checked' : '' }}>
                <label for="bergerak_0">Tidak mampu</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="bergerak_1" name="adl[bergerak]" value="1" {{ $adl->bergerak == '1' ? 'checked' : '' }}>
                <label for="bergerak_1">Perlu banyak bantuan untuk bisa duduk (2 orang)</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="bergerak_2" name="adl[bergerak]" value="2" {{ $adl->bergerak == '2' ? 'checked' : '' }}>
                <label for="bergerak_2">Bantuan minimal 1 orang</label>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>
                <input type="radio" id="bergerak_3" name="adl[bergerak]" value="3" {{ $adl->bergerak == '3' ? 'checked' : '' }}>
                <label for="bergerak_3">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="4">7</td>
            <td rowspan="4">Berjalan di tempat rata (atau jika tidak bisa berjalan, menjalankan kursi roda)</td>
            <td>0</td>
            <td>
                <input type="radio" id="berjalan_0" name="adl[berjalan]" value="0" {{ $adl->berjalan == '0' ? 'checked' : '' }}>
                <label for="berjalan_0">Tidak mampu</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="berjalan_1" name="adl[berjalan]" value="1" {{ $adl->berjalan == '1' ? 'checked' : '' }}>
                <label for="berjalan_1">Bisa (pindah) dengan kursi roda</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="berjalan_2" name="adl[berjalan]" value="2" {{ $adl->berjalan == '2' ? 'checked' : '' }}>
                <label for="berjalan_2">Berjalan dengan bantuan 1 orang</label>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>
                <input type="radio" id="berjalan_3" name="adl[berjalan]" value="3" {{ $adl->berjalan == '3' ? 'checked' : '' }}>
                <label for="berjalan_3">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="3">8</td>
            <td rowspan="3">Berpakaian (termasuk memasang tali sepatu, mengencangkan sabuk)</td>
            <td>0</td>
            <td>
                <input type="radio" id="berpakaian_0" name="adl[berpakaian]" value="0" {{ $adl->berpakaian == '0' ? 'checked' : '' }}>
                <label for="berpakaian_0">Tergantung orang lain</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="berpakaian_1" name="adl[berpakaian]" value="1" {{ $adl->berpakaian == '1' ? 'checked' : '' }}>
                <label for="berpakaian_1">Sebagian dibantu (mis: mengancing baju)</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="berpakaian_2" name="adl[berpakaian]" value="2" {{ $adl->berpakaian == '2' ? 'checked' : '' }}>
                <label for="berpakaian_2">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="3">9</td>
            <td rowspan="3">Naik turun tangga</td>
            <td>0</td>
            <td>
                <input type="radio" id="tangga_0" name="adl[tangga]" value="0" {{ $adl->tangga == '0' ? 'checked' : '' }}>
                <label for="tangga_0">Tidak mampu</label>
            </td>
        </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="tangga_1" name="adl[tangga]" value="1" {{ $adl->tangga == '1' ? 'checked' : '' }}>
                <label for="tangga_1">Butuh pertolongan</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>
                <input type="radio" id="tangga_2" name="adl[tangga]" value="2" {{ $adl->tangga == '2' ? 'checked' : '' }}>
                <label for="tangga_2">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td rowspan="2">10</td>
            <td rowspan="2">Mandi</td>
            <td>0</td>
            <td>
                <input type="radio" id="mandi_0" name="adl[mandi]" value="0" {{ $adl->mandi == '0' ? 'checked' : '' }}>
                <label for="mandi_0">Tergantung orang lain</label>
            </td>
      </tr>
        <tr>
            <td>1</td>
            <td>
                <input type="radio" id="mandi_1" name="adl[mandi]" value="1" {{ $adl->mandi == '1' ? 'checked' : '' }}>
                <label for="mandi_1">Mandiri</label>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="4">
                <label for="total_adl" class="mr-2">Total Skor ADL: </label>
                <input type="text" id="total_adl" name="adl[total_skor_adl]" value="{{ $adl->total_skor_adl ?? '0' }}"
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
                        <input type="radio" id="aks_20" name="awal[nilai_aks]" value="(20)Mandiri (A)" {{ $awal->nilai_aks == '(20)Mandiri (A)' ? 'checked' : '' }}>
                        <label for="aks_20">(20)Mandiri (A)</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="aks_12_19" name="awal[nilai_aks]" value="(12-19)Ketergantungan ringan (B)" {{ $awal->nilai_aks == '(12-19)Ketergantungan ringan (B)' ? 'checked' : '' }}>
                        <label for="aks_12_19">(12-19)Ketergantungan ringan (B)</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="aks_9_11" name="awal[nilai_aks]" value="(9-11)Ketergantungan sedang (B)" {{ $awal->nilai_aks == '(9-11)Ketergantungan sedang (B)' ? 'checked' : '' }}>
                        <label for="aks_9_11">(9-11)Ketergantungan sedang (B)</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="aks_5_8" name="awal[nilai_aks]" value="(5-8)Ketergantungan berat (C)" {{ $awal->nilai_aks == '(5-8)Ketergantungan berat (C)' ? 'checked' : '' }}>
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
                        <input type="radio" id="kategori_1" name="awal[kategori_perawatan]" value="Kategori I" {{ $awal->kategori_perawatan == 'Kategori I' ? 'checked' : '' }}>
                        <label for="kategori_1">Kategori I : Perawatan Minimal (self care), memerlukan waktu 1 - 2 jam / 24 jam</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="kategori_2" name="awal[kategori_perawatan]" value="Kategori II" {{ $awal->kategori_perawatan == 'Kategori II' ? 'checked' : '' }}>
                        <label for="kategori_2">Kategori II : Kriteria Perawatan Partial (Intermediate Care), memerlukan waktu 3 - 4 jam / 24 jam</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="kategori_3" name="awal[kategori_perawatan]" value="Kategori III" {{ $awal->kategori_perawatan == 'Kategori III' ? 'checked' : '' }}>
                        <label for="kategori_3">Kategori III : Kriteria Perawatan Maksimal ( Total Care / Intensif Care), memerlukan waktu 5 - 6 jam / 24 jam</label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<h4 class="mt-3"><b>PENGKAJIAN KEBUTUHAN AKTIFITAS DAN ISTIRAHAT</b></h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Rentang Gerak (ROM)</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="rentang_gerak_aktif" name="awal[rentang_gerak]" value="aktif" {{ $awal->rentang_gerak == 'aktif' ? 'checked' : '' }}>
            <label class="custom-control-label" for="rentang_gerak_aktif">Aktif</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="rentang_gerak_pasif" name="awal[rentang_gerak]" value="pasif" {{ $awal->rentang_gerak == 'pasif' ? 'checked' : '' }}>
            <label class="custom-control-label" for="rentang_gerak_pasif">Pasif</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="rentang_gerak_tidak_dapat_dinilai" name="awal[rentang_gerak]" value="tidak_dapat_dinilai" {{ $awal->rentang_gerak == 'tidak_dapat_dinilai' ? 'checked' : '' }}>
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
            <input type="radio" class="custom-control-input" id="deformitas_tidak_ada" name="awal[deformitas]" value="tidak ada" {{ $awal->deformitas == 'tidak ada' ? 'checked' : '' }}>
            <label class="custom-control-label" for="deformitas_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="deformitas_ada_regio" name="awal[deformitas]" value="ada regio" {{ $awal->deformitas == 'ada regio' ? 'checked' : '' }}>
            <label class="custom-control-label" for="deformitas_ada_regio">Ada regio</label>
        </div>
        <input type="text" class="form-control" name="awal[deformitas_text]" placeholder="jika ada, jelaskan..." value="{{ $awal->deformitas_text }}">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Gangguan Tidur</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="gangguan_tidur_tidak" name="awal[gangguan_tidur]" value="tidak" {{ $awal->gangguan_tidur == 'tidak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="gangguan_tidur_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="gangguan_tidur_ya" name="awal[gangguan_tidur]" value="ya" {{ $awal->gangguan_tidur == 'ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="gangguan_tidur_ya">Ya</label>
        </div>
        <input type="text" class="form-control" name="awal[gangguan_tidur_text]" placeholder="jika ya, jelaskan..." value="{{ $awal->gangguan_tidur_text }}">
    </div>
</div>

<h4 class="mt-3"><b>PENGKAJIAN KEBUTUHAN NUTRISI DAN CAIRAN</b></h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Keluhan</label>
    </div>
    <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_tidak_ada" name="awal[keluhan_nutrisi]" value="tidak ada" {{ $awal->keluhan_nutrisi == 'tidak ada' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_mual_muntah" name="awal[keluhan_nutrisi]" value="mual muntah" {{ $awal->keluhan_nutrisi == 'mual muntah' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_mual_muntah">Mual / muntah</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_gangguan_mengunyah" name="awal[keluhan_nutrisi]" value="gangguan mengunyah" {{ $awal->keluhan_nutrisi == 'gangguan mengunyah' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_gangguan_mengunyah">Gangguan mengunyah</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_gangguan_menelan" name="awal[keluhan_nutrisi]" value="gangguan menelan" {{ $awal->keluhan_nutrisi == 'gangguan menelan' ? 'checked' : '' }}>
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
            <input type="radio" class="custom-control-input" id="rasa_haus_berlebih_ya" name="awal[rasa_haus_berlebih]" value="ya" {{ $awal->rasa_haus_berlebih == 'ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="rasa_haus_berlebih_ya">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="rasa_haus_berlebih_tidak" name="awal[rasa_haus_berlebih]" value="tidak" {{ $awal->rasa_haus_berlebih == 'tidak' ? 'checked' : '' }}>
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
            <input type="radio" class="custom-control-input" id="mukosa_mulut_kering" name="awal[mukosa_mulut]" value="kering" {{ $awal->mukosa_mulut == 'kering' ? 'checked' : '' }}>
            <label class="custom-control-label" for="mukosa_mulut_kering">Kering</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="mukosa_mulut_lembab" name="awal[mukosa_mulut]" value="lembab" {{ $awal->mukosa_mulut == 'lembab' ? 'checked' : '' }}>
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
            <input type="radio" class="custom-control-input" id="turgor_kulit_elastis" name="awal[turgor_kulit]" value="elastis" {{ $awal->turgor_kulit == 'elastis' ? 'checked' : '' }}>
            <label class="custom-control-label" for="turgor_kulit_elastis">Elastis</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="turgor_kulit_tidak_elastis" name="awal[turgor_kulit]" value="tidak_elastis" {{ $awal->turgor_kulit == 'tidak_elastis' ? 'checked' : '' }}>
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
            <input type="radio" class="custom-control-input" id="endema_ya" name="awal[endema]" value="ya" {{ $awal->endema == 'ya' ? 'checked' : '' }}>
            <label class="custom-control-label" for="endema_ya">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="endema_tidak" name="awal[endema]" value="tidak" {{ $awal->endema == 'tidak' ? 'checked' : '' }}>
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
            <input type="text" id="frekuensi_bab" name="awal[frekuensi_bab]" class="form-control" style="width: 30px;" value="{{ $awal->frekuensi_bab != 'tidak_dapat_dikaji' ? $awal->frekuensi_bab : '' }}">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">x/hari</span>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="frekuensi_bab_tidak_dapat_dikaji" name="awal[frekuensi_bab]" value="tidak_dapat_dikaji" {{ $awal->frekuensi_bab == 'tidak_dapat_dikaji' ? 'checked' : '' }}>
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
            <input type="radio" class="custom-control-input" id="keluhan_bab_tidak_ada" name="awal[keluhan_bab]" value="tidak ada" {{ $awal->keluhan_bab == 'tidak_ada' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_bab_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bab_perdarahan" name="awal[keluhan_bab]" value="perdarahan" {{ $awal->keluhan_bab == 'perdarahan' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_bab_perdarahan">Perdarahan</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bab_hemorroid" name="awal[keluhan_bab]" value="hemorroid" {{ $awal->keluhan_bab == 'hemorroid' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_bab_hemorroid">Hemorroid</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bab_konstipasi" name="awal[keluhan_bab]" value="konstipasi" {{ $awal->keluhan_bab == 'konstipasi' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_bab_konstipasi">Konstipasi</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bab_diare" name="awal[keluhan_bab]" value="diare" {{ $awal->keluhan_bab == 'diare' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_bab_diare">Diare</label>
        </div>
        <input type="text" id="keluhan_bab_lainnya" name="awal[keluhan_bab_text]" class="form-control" placeholder="Lainnya..." value="{{ $awal->keluhan_bab_text }}">
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="karakteristik_feces">Karakteristik feces</label>
    </div>
    <div class="col-sm-6">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="karakteristik_feces_padat" name="awal[karakteristik_feces]" value="padat" {{ $awal->karakteristik_feces == 'padat' ? 'checked' : '' }}>
            <label class="custom-control-label" for="karakteristik_feces_padat">Padat</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="karakteristik_feces_lunak" name="awal[karakteristik_feces]" value="lunak" {{ $awal->karakteristik_feces == 'lunak' ? 'checked' : '' }}>
            <label class="custom-control-label" for="karakteristik_feces_lunak">Lunak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="karakteristik_feces_cair" name="awal[karakteristik_feces]" value="cair" {{ $awal->karakteristik_feces == 'cair' ? 'checked' : '' }}>
            <label class="custom-control-label" for="karakteristik_feces_cair">Cair</label>
        </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="warna_feces">Warna Feces</label>
    </div>
    <div class="col-sm-6">
        <input type="text" id="warna_feces" name="awal[warna_feces]" class="form-control" placeholder="Warna..." value="{{ $awal->warna_feces }}">
    </div>
</div>

<div class="form-group row mt-2">
    <div class="col-sm-2">
        <label for="frekuensi_bak">Frekuensi BAK</label>
    </div>
    <div class="col-sm-2">
        <div class="input-group">
            <input type="text" id="frekuensi_bak" name="awal[frekuensi_bak]" class="form-control" style="width: 30px;" value="{{ $awal->frekuensi_bak }}">
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
            <input type="text" id="jumlah_bak" name="awal[jumlah_bak]" class="form-control" style="width: 30px;" value="{{ $awal->jumlah_bak }}">
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
        <input type="text" id="warna_urin" name="awal[warna_urin]" class="form-control" placeholder="Warna..." value="{{ $awal->warna_urin }}">
    </div>
</div>

<div class="form-group row mt-2">
    <div class="col-sm-2">
        <label for="keluhan_bak">Keluhan BAK</label>
    </div>
    <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bak_tidak_ada" name="awal[keluhan_bak]" value="tidak_ada" {{ $awal->keluhan_bak == 'tidak_ada' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_bak_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bak_nyeri" name="awal[keluhan_bak]" value="nyeri" {{ $awal->keluhan_bak == 'nyeri' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_bak_nyeri">Nyeri</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="keluhan_bak_perdarahan" name="awal[keluhan_bak]" value="perdarahan" {{ $awal->keluhan_bak == 'perdarahan' ? 'checked' : '' }}>
            <label class="custom-control-label" for="keluhan_bak_perdarahan">Perdarahan</label>
        </div>
        <input type="text" id="keluhan_bak_lainnya" name="awal[keluhan_bak_lainnya]" class="form-control" placeholder="Lainnya..." value="{{ $awal->keluhan_bak_lainnya }}">
    </div>
</div>

<div class="container mt-3">
    <button class="btn btn-primary" type="button" onclick="storeAssesmentDewasa()">Simpan</button>
  </div>