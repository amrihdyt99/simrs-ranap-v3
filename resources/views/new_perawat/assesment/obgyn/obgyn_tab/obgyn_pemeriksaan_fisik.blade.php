<input type="hidden" class="form-control" name="reg_no" value="{{ $reg }}">
<input type="hidden" class="form-control" name="med_rec" value="{{ $medrec }}">
<div class="form-group row">
    <div class="col-sm-2">
        <h4><b>ALERGI</b></h4>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="alergi_tidak" name="table1[alergi]" value="tidak" {{$alergi_keadaan_umum->alergi=="tidak" ? 'checked' : ''}}>
            <label class="custom-control-label" for="alergi_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="alergi_ya" name="table1[alergi]" value="ya" {{$alergi_keadaan_umum->alergi=="ya" ? 'checked' : ''}}>
            <label class="custom-control-label" for="alergi_ya">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="alergi_tidak_tahu" name="table1[alergi]" value="tidak_tahu" {{$alergi_keadaan_umum->alergi=="tidak_tahu" ? 'checked' : ''}}>
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
        <input type="text" id="alergi_obat" name="table1[alergi_obat]" class="form-control" placeholder="Nama obat.." value="{{$alergi_keadaan_umum->alergi_obat}}">
    </div>
    <div class="col-sm-2 mt-2">
        <label for="bentuk_reaksi_obat">Bentuk reaksi</label>
    </div>
    <div class="col-sm-10 mt-2">
        <input type="text" id="bentuk_reaksi_obat" name="table1[bentuk_reaksi_obat]" class="form-control" placeholder="Bentuk reaksi.." value="{{$alergi_keadaan_umum->bentuk_reaksi_obat}}">
    </div>
</div>

<div class="form-group row mt-2">
    <div class="mt-2 col-sm-2">
        <label for="alergi_makanan">Alergi makanan</label>
    </div>
    <div class="mt-2 col-sm-10">
        <input type="text" id="alergi_makanan" name="table1[alergi_makanan]" class="form-control" placeholder="Nama makanan.." value="{{$alergi_keadaan_umum->alergi_makanan}}">
    </div>
    <div class="mt-2 col-sm-2">
        <label for="bentuk_reaksi_makanan">Bentuk reaksi</label>
    </div>
    <div class="mt-2 col-sm-10">
        <input type="text" id="bentuk_reaksi_makanan" name="table1[bentuk_reaksi_makanan]" class="form-control" placeholder="Bentuk reaksi.." value="{{$alergi_keadaan_umum->bentuk_reaksi_makanan}}">
    </div>
</div>

<div class="form-group row mt-2">
    <div class="mt-2 col-sm-2">  
        <label for="alergi_lainnya">Alergi lainnya</label>
    </div>
    <div class="mt-2 col-sm-10">
        <input type="text" id="alergi_lainnya" name="table1[alergi_lainnya]" class="form-control" placeholder="Nama lainnya.." value="{{$alergi_keadaan_umum->alergi_lainnya}}">
    </div>
    <div class="mt-2 col-sm-2">
        <label for="bentuk_reaksi_lainnya">Bentuk reaksi</label>
    </div>
    <div class="mt-2 col-sm-10">
        <input type="text" id="bentuk_reaksi_lainnya" name="table1[bentuk_reaksi_lainnya]" class="form-control" placeholder="Bentuk reaksi lainnya.." value="{{$alergi_keadaan_umum->bentuk_reaksi_lainnya}}">
    </div>
</div>

@php
    $diberitahukan=explode(', ',$alergi_keadaan_umum->diberitahukan)??[];
@endphp

<div class="form-group row">
    <div class="col-sm-2">
        <label for="" class="mr-3">Diberitahukan kepada</label>
    </div>
    <div class="col-sm-10 d-flex align-items-center">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input class="custom-control-input" type="checkbox" id="diberitahukan_dokter" name="table1[diberitahukan][]" value="dokter" {{in_array('dokter',$diberitahukan) ? 'checked' : ''}}>
            <label class="custom-control-label" for="diberitahukan_dokter">Dokter</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input class="custom-control-input" type="checkbox" id="diberitahukan_farmasis" name="table1[diberitahukan][]" value="farmasis" {{in_array('farmasis',$diberitahukan) ? 'checked' : ''}}>
            <label class="custom-control-label" for="diberitahukan_farmasis">Farmasis (apoteker)</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input class="custom-control-input" type="checkbox" id="diberitahukan_dietisien" name="table1[diberitahukan][]" value="dietisien" {{in_array('dietisien',$diberitahukan) ? 'checked' : ''}}>
            <label class="custom-control-label" for="diberitahukan_dietisien">Dietisien</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="diberitahukan_ya" name="table1[diberitahukan_status]" value="ya" {{$alergi_keadaan_umum->diberitahukan_status=="ya" ? 'checked' : ''}}>
            <label class="custom-control-label" for="diberitahukan_ya">Ya, Pukul</label>
        </div>
        <input type="time" id="diberitahukan_pukul" name="table1[diberitahukan_jam]" class="form-control mr-3" style="width: 100px;" value="{{$alergi_keadaan_umum->diberitahukan_jam}}">
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="diberitahukan_tidak" name="table1[diberitahukan_status]" value="tidak" {{$alergi_keadaan_umum->diberitahukan_status=="tidak" ? 'checked' : ''}}>
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
            <input class="custom-control-input" type="radio" id="kesadaran_compos_mentis" name="table1[kesadaran]" value="Compos mentis" {{$alergi_keadaan_umum->kesadaran=="Compos mentis" ? 'checked' : ''}}>
            <label class="custom-control-label" for="kesadaran_compos_mentis">Compos mentis</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kesadaran_delirium" name="table1[kesadaran]" value="Delirium" {{$alergi_keadaan_umum->kesadaran=="Delirium" ? 'checked' : ''}}>
            <label class="custom-control-label" for="kesadaran_delirium">Delirium</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kesadaran_somnolen" name="table1[kesadaran]" value="Somnolen" {{$alergi_keadaan_umum->kesadaran=="Somnolen" ? 'checked' : ''}}>
            <label class="custom-control-label" for="kesadaran_somnolen">Somnolen</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kesadaran_sopor" name="table1[kesadaran]" value="Sopor" {{$alergi_keadaan_umum->kesadaran=="Sopor" ? 'checked' : ''}}>
            <label class="custom-control-label" for="kesadaran_sopor">Sopor</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kesadaran_koma" name="table1[kesadaran]" value="Koma" {{$alergi_keadaan_umum->kesadaran=="Koma" ? 'checked' : ''}}>
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
            <input class="custom-control-input" type="radio" id="kondisi_baik" name="table1[kondisi_umum]" value="Baik" {{$alergi_keadaan_umum->kondisi_umum=="Baik" ? 'checked' : ''}}>
            <label class="custom-control-label" for="kondisi_baik">Baik</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kondisi_tampak_sakit" name="table1[kondisi_umum]" value="Tampak sakit" {{$alergi_keadaan_umum->kondisi_umum=="Tampak sakit" ? 'checked' : ''}}>
            <label class="custom-control-label" for="kondisi_tampak_sakit">Tampak sakit</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kondisi_sesak" name="table1[kondisi_umum]" value="Sesak" {{$alergi_keadaan_umum->kondisi_umum=="Sesak" ? 'checked' : ''}}>
            <label class="custom-control-label" for="kondisi_sesak">Sesak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kondisi_pucat" name="table1[kondisi_umum]" value="Pucat" {{$alergi_keadaan_umum->kondisi_umum=="Pucat" ? 'checked' : ''}}>
            <label class="custom-control-label" for="kondisi_pucat">Pucat</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kondisi_lemah" name="table1[kondisi_umum]" value="Lemah" {{$alergi_keadaan_umum->kondisi_umum=="Lemah" ? 'checked' : ''}}>
            <label class="custom-control-label" for="kondisi_lemah">Lemah</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" id="kondisi_lainnya" name="table1[kondisi_umum]" value="Lainnya" {{$alergi_keadaan_umum->kondisi_umum=="Lainnya" ? 'checked' : ''}}>
            <label class="custom-control-label" for="kondisi_lainnya">Lainnya</label>
        </div>
        <input type="text" id="kondisi_lainnya_text" name="table1[kondisi_umum_lainnya_text]" placeholder="lainnya.." class="form-control" value="{{$alergi_keadaan_umum->kondisi_umum_lainnya_text}}">
    </div>
</div>

<div class="form-group mt-3 row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-2">
        <label for="tekanan_darah">Tekanan Darah</label>
        <div class="input-group">
            <input type="number" id="tekanan_darah" name="table1[tekanan_darah]" class="form-control" value="{{$alergi_keadaan_umum->tekanan_darah}}">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">mmHg</span>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <label for="nadi">Nadi</label>
        <div class="input-group">
            <input type="number" id="nadi" name="table1[nadi]" class="form-control" value="{{$alergi_keadaan_umum->nadi}}">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">x/mnt</span>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <label for="suhu">Suhu</label>
        <div class="input-group">
            <input type="number" id="suhu" name="table1[suhu]" class="form-control" value="{{$alergi_keadaan_umum->suhu}}">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">°C</span>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <label for="pernafasan">Pernafasan</label>
        <div class="input-group">
            <input type="number" id="pernafasan" name="table1[pernafasan]" class="form-control" value="{{$alergi_keadaan_umum->pernafasan}}">
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
            <input type="number" id="tinggi_badan" name="table1[tinggi_badan]" class="form-control" value="{{$alergi_keadaan_umum->tinggi_badan}}">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">cm</span>
            </div>
        </div>
    </div>
    <div class="col-sm-2">
        <label for="berat_badan">Berat badan</label>
        <div class="input-group">
            <input type="number" id="berat_badan" name="table1[berat_badan]" class="form-control" value="{{$alergi_keadaan_umum->berat_badan}}">
            <div class="input-group-append">
                <span class="input-group-text bg-primary text-white" style="padding: 5px;">kg</span>
            </div>
        </div>
    </div>
</div>

@php
    $kebutuhan_khusus=explode(', ',$alergi_keadaan_umum->kebutuhan_khusus)??[];
@endphp

<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Kebutuhan Khusus</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_tidak_ada" name="table1[kebutuhan_khusus][]" value="Tidak ada" {{in_array('Tidak ada',$kebutuhan_khusus) ? 'checked' : ''}}>
            <label class="custom-control-label" for="kebutuhan_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_alat_bantu_dengar" name="table1[kebutuhan_khusus][]" value="Alat bantu dengar" {{in_array('Alat bantu dengar',$kebutuhan_khusus) ? 'checked' : ''}}>
            <label class="custom-control-label" for="kebutuhan_alat_bantu_dengar">Alat bantu dengar</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_kaca_mata" name="table1[kebutuhan_khusus][]" value="Kaca mata" {{in_array('Kaca mata',$kebutuhan_khusus) ? 'checked' : ''}}>
            <label class="custom-control-label" for="kebutuhan_kaca_mata">Kaca mata</label>
        </div>  
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_tongkat" name="table1[kebutuhan_khusus][]" value="Tongkat" {{in_array('Tongkat',$kebutuhan_khusus) ? 'checked' : ''}}>
            <label class="custom-control-label" for="kebutuhan_tongkat">Tongkat</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_gigi_palsu" name="table1[kebutuhan_khusus][]" value="Gigi palsu" {{in_array('Gigi palsu',$kebutuhan_khusus) ? 'checked' : ''}}>
            <label class="custom-control-label" for="kebutuhan_gigi_palsu">Gigi palsu</label>
        </div>  
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="kebutuhan_lainnya" name="table1[kebutuhan_khusus][]" value="Lainnya" {{in_array('Lainnya',$kebutuhan_khusus) ? 'checked' : ''}}>
            <label class="custom-control-label" for="kebutuhan_lainnya">Lainnya</label>
        </div>
        <input type="text" id="kebutuhan_khusus_lainnya_text" name="table1[kebutuhan_khusus_lainnya_text]" placeholder="lainnya.." class="form-control" value="{{$alergi_keadaan_umum->kebutuhan_khusus_lainnya_text}}">
    </div>
</div>

@php
    $status_emosional=explode(', ',$data_psikologis->status_emosional)??[];
@endphp

<h4 class="mt-3"><b>DATA PSIKOLOGIS, SOSIAL, EKONOMI DAN SPIRITUAL</b></h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="status_emosional">Status emosional</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="status_stabil" name="table2[status_emosional][]" value="Stabil/tenang" {{in_array('Stabil/tenang',$status_emosional) ? 'checked' : ''}}>
            <label class="custom-control-label" for="status_stabil">Stabil/tenang</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="status_cemas" name="table2[status_emosional][]" value="Cemas/Takut" {{in_array('Cemas/Takut',$status_emosional) ? 'checked' : ''}}>
            <label class="custom-control-label" for="status_cemas">Cemas/Takut</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="status_marah" name="table2[status_emosional][]" value="Marah" {{in_array('Marah',$status_emosional) ? 'checked' : ''}}>
            <label class="custom-control-label" for="status_marah">Marah</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="status_sedih" name="table2[status_emosional][]" value="Sedih" {{in_array('Sedih',$status_emosional) ? 'checked' : ''}}>
            <label class="custom-control-label" for="status_sedih">Sedih</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="status_lainnya" name="table2[status_emosional][]" value="Lainnya" {{in_array('Lainnya',$status_emosional) ? 'checked' : ''}}>
            <label class="custom-control-label" for="status_lainnya">Lainnya</label>
        </div>
        <input type="text" id="status_lainnya_text" name="table2[status_emosional_text]" placeholder="lainnya.." class="form-control" value="{{$data_psikologis->status_emosional_text}}">
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
            <input type="radio" class="custom-control-input" id="merokok_tidak" name="table2[merokok]" value="Tidak" {{$data_psikologis->merokok == 'Tidak' ? 'checked' : ''}}>
            <label class="custom-control-label" for="merokok_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="merokok_ya" name="table2[merokok]" value="Ya" {{$data_psikologis->merokok == 'Ya' ? 'checked' : ''}}>
            <label class="custom-control-label" for="merokok_ya">Ya</label>
            <div class="input-group ml-2">
                <input type="text" id="frekuensi_merokok" name="table2[frekuensi_merokok]" class="form-control" style="width: 60px;" value="{{$data_psikologis->frekuensi_merokok}}">
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
            <input type="radio" class="custom-control-input" id="alkohol_tidak" name="table2[minuman_alkohol]" value="Tidak" {{$data_psikologis->minuman_alkohol == 'Tidak' ? 'checked' : ''}}>
            <label class="custom-control-label" for="alkohol_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="alkohol_ya" name="table2[minuman_alkohol]" value="Ya" {{$data_psikologis->minuman_alkohol == 'Ya' ? 'checked' : ''}}>
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
            <input type="radio" class="custom-control-input" id="gangguan_jiwa_tidak" name="table2[riwayat_gangguan_jiwa]" value="Tidak" {{$data_psikologis->riwayat_gangguan_jiwa == 'Tidak' ? 'checked' : ''}}>
            <label class="custom-control-label" for="gangguan_jiwa_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="gangguan_jiwa_ya" name="table2[riwayat_gangguan_jiwa]" value="Ya" {{$data_psikologis->riwayat_gangguan_jiwa == 'Ya' ? 'checked' : ''}}>
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
                <input type="radio" id="sex_ya" name="table2[sex]" value="1" {{$data_psikologis->sex == '1' ? 'checked' : ''}}>
                <label for="sex_ya">Ya</label>
                <input type="radio" id="sex_tidak" name="table2[sex]" value="0" {{$data_psikologis->sex == '0' ? 'checked' : ''}}>
                <label for="sex_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Age ( < 19 th atau > 45 th )</td>
            <td>
                <input type="radio" id="age_ya" name="table2[age]" value="1" {{$data_psikologis->age == '1' ? 'checked' : ''}}>
                <label for="age_ya">Ya</label>
                <input type="radio" id="age_tidak" name="table2[age]" value="0" {{$data_psikologis->age == '0' ? 'checked' : ''}}>
                <label for="age_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Depresi ( pasien MRS dengan depresi atau penurunan konsentrasi, gangguan tidur, gangguan pola makan, dan gangguan libido )</td>
            <td>
                <input type="radio" id="depresi_ya" name="table2[depresi]" value="1" {{$data_psikologis->depresi == '1' ? 'checked' : ''}}>
                <label for="depresi_ya">Ya</label>
                <input type="radio" id="depresi_tidak" name="table2[depresi]" value="0" {{$data_psikologis->depresi == '0' ? 'checked' : ''}}>
                <label for="depresi_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td>Previous Suicide ( riwayat bunuh diri atau perawatan psikiatri )</td>
            <td>
                <input type="radio" id="suicide_ya" name="table2[suicide]" value="1" {{$data_psikologis->suicide == '1' ? 'checked' : ''}}>
                <label for="suicide_ya">Ya</label>
                <input type="radio" id="suicide_tidak" name="table2[suicide]" value="0" {{$data_psikologis->suicide == '0' ? 'checked' : ''}}>
                <label for="suicide_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td>Excessive alcohol ( ketergantungan alkohol atau pemakai narkoba )</td>
            <td>
                <input type="radio" id="alcohol_ya" name="table2[alcohol]" value="1" {{$data_psikologis->alcohol == '1' ? 'checked' : ''}}>
                <label for="alcohol_ya">Ya</label>
                <input type="radio" id="alcohol_tidak" name="table2[alcohol]" value="0" {{$data_psikologis->alcohol == '0' ? 'checked' : ''}}>
                <label for="alcohol_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>6</td>
            <td>Rational thinking loss ( kehilangan pikiran rasional, psikosis, organic brain syndrome )</td>
            <td>
                <input type="radio" id="thinking_loss_ya" name="table2[thinking_loss]" value="1" {{$data_psikologis->thinking_loss == '1' ? 'checked' : ''}}>
                <label for="thinking_loss_ya">Ya</label>
                <input type="radio" id="thinking_loss_tidak" name="table2[thinking_loss]" value="0" {{$data_psikologis->thinking_loss == '0' ? 'checked' : ''}}>
                <label for="thinking_loss_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>7</td>
            <td>Separated ( bercerai / janda )</td>
            <td>
                <input type="radio" id="separated_ya" name="table2[separated]" value="1" {{$data_psikologis->separated == '1' ? 'checked' : ''}}>
                <label for="separated_ya">Ya</label>
                <input type="radio" id="separated_tidak" name="table2[separated]" value="0" {{$data_psikologis->separated == '0' ? 'checked' : ''}}>
                <label for="separated_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>8</td>
            <td>Organized plan ( menunjukan rencana bunuh diri yang terorganisir / niat serius )</td>
            <td>
                <input type="radio" id="organized_plan_ya" name="table2[organized_plan]" value="1" {{$data_psikologis->organized_plan == '1' ? 'checked' : ''}}>
                <label for="organized_plan_ya">Ya</label>
                <input type="radio" id="organized_plan_tidak" name="table2[organized_plan]" value="0" {{$data_psikologis->organized_plan == '0' ? 'checked' : ''}}>
                <label for="organized_plan_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>9</td>
            <td>No Social Support ( tidak ada pendukung )</td>
            <td>
                <input type="radio" id="no_support_ya" name="table2[no_support]" value="1" {{$data_psikologis->no_support == '1' ? 'checked' : ''}}>
                <label for="no_support_ya">Ya</label>
                <input type="radio" id="no_support_tidak" name="table2[no_support]" value="0" {{$data_psikologis->no_support == '0' ? 'checked' : ''}}>
                <label for="no_support_tidak">Tidak</label>
            </td>
        </tr>
        <tr>
            <td>10</td>
            <td>Sickness ( menderita penyakit kronis )</td>
            <td>
                <input type="radio" id="sickness_ya" name="table2[sickness]" value="1" {{$data_psikologis->sickness == '1' ? 'checked' : ''}}>
                <label for="sickness_ya">Ya</label>
                <input type="radio" id="sickness_tidak" name="table2[sickness]" value="0" {{$data_psikologis->sickness == '0' ? 'checked' : ''}}>
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
        <input type="text" class="form-control" name="table2[skor_sad_person]" id="skor_sad_person" value="{{$data_psikologis->skor_sad_person}}" readonly>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Kategori</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="kategori_rendah" name="table2[kategori_sad_person]" value="Rendah ( 1-2 )" {{$data_psikologis->kategori_sad_person == 'Rendah ( 1-2 )' ? 'checked' : ''}}>
            <label class="custom-control-label" for="kategori_rendah">Rendah ( 1-2 )</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="kategori_sedang" name="table2[kategori_sad_person]" value="Sedang ( 3-6 )" {{$data_psikologis->kategori_sad_person == 'Sedang ( 3-6 )' ? 'checked' : ''}}>
            <label class="custom-control-label" for="kategori_sedang">Sedang ( 3-6 )</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="kategori_tinggi" name="table2[kategori_sad_person]" value="Tinggi ( 7 - 10 )" {{$data_psikologis->kategori_sad_person == 'Tinggi ( 7 - 10 )' ? 'checked' : ''}}>
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
            <input type="radio" class="custom-control-input" id="riwayat_bunuh_diri_tidak" name="table2[riwayat_bunuh_diri]" value="Tidak" {{$data_psikologis->riwayat_bunuh_diri == 'Tidak' ? 'checked' : ''}}>
            <label class="custom-control-label" for="riwayat_bunuh_diri_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="riwayat_bunuh_diri_ya" name="table2[riwayat_bunuh_diri]" value="Ya" {{$data_psikologis->riwayat_bunuh_diri == 'Ya' ? 'checked' : ''}}>
            <label class="custom-control-label" for="riwayat_bunuh_diri_ya">Ya</label>
        </div>
        <input type="text" class="form-control" name="table2[riwayat_bunuh_diri_text]" placeholder="jika ya,jelaskan..." value="{{$data_psikologis->riwayat_bunuh_diri_text}}">
    </div>
</div>

<div class="form-group row" style="margin-bottom: 0;">
    <div class="col-sm-2">
        <label for="">Riwayat Trauma psikis</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="riwayat_trauma_psikis_tidak" name="table2[riwayat_trauma_psikis]" value="Tidak" {{$data_psikologis->riwayat_trauma_psikis == 'Tidak' ? 'checked' : ''}}>
            <label class="custom-control-label" for="riwayat_trauma_psikis_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="riwayat_trauma_psikis_ada" name="table2[riwayat_trauma_psikis]" value="Ada" {{$data_psikologis->riwayat_trauma_psikis == 'Ada' ? 'checked' : ''}}>
            <label class="custom-control-label" for="riwayat_trauma_psikis_ada">Ada</label>
        </div>
    </div>
</div>

@php
    $riwayat_trauma_psikis_detail = explode(', ', $data_psikologis->riwayat_trauma_psikis_detail);
@endphp

<div class="form-group row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-10">
        
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="anayaa_fisik_psikologis_kdr" name="table2[riwayat_trauma_psikis_detail][]" value="Aniaya fisik / psikologis/ KDRT" {{in_array('Aniaya fisik / psikologis/ KDRT', $riwayat_trauma_psikis_detail) ? 'checked' : ''}}>
            <label class="custom-control-label" for="anayaa_fisik_psikologis_kdr">Aniaya fisik / psikologis/ KDRT</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="anayaa_seksual_perkosaan" name="table2[riwayat_trauma_psikis_detail][]" value="Aniaya Seksual/Perkosaan" {{in_array('Aniaya Seksual/Perkosaan', $riwayat_trauma_psikis_detail) ? 'checked' : ''}}>
            <label class="custom-control-label" for="anayaa_seksual_perkosaan">Aniaya Seksual/Perkosaan</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="tindakan_kriminal" name="table2[riwayat_trauma_psikis_detail][]" value="Tindakan Kriminal" {{in_array('Tindakan Kriminal', $riwayat_trauma_psikis_detail) ? 'checked' : ''}}>
            <label class="custom-control-label" for="tindakan_kriminal">Tindakan Kriminal</label>
        </div>
        <input type="text" name="table2[riwayat_trauma_psikis_detail_kriminal_text]" class="form-control" placeholder="tindakan kriminal...." value="{{$data_psikologis->riwayat_trauma_psikis_detail_kriminal_text}}">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="lainnya" name="table2[riwayat_trauma_psikis_detail][]" value="Lainnya" {{in_array('Lainnya', $riwayat_trauma_psikis_detail) ? 'checked' : ''}}>
            <label class="custom-control-label" for="lainnya">Lainnya</label>
        </div>
        <input type="text" name="table2[riwayat_trauma_psikis_detail_lain_text]" class="form-control" placeholder="lainnya...." value="{{$data_psikologis->riwayat_trauma_psikis_detail_lain_text}}">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Hambatan sosial dan ekonomi</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="hambatan_sosial_ekonomi_tidak" name="table2[hambatan_sosial_ekonomi]" value="Tidak" {{$data_psikologis->hambatan_sosial_ekonomi == 'Tidak' ? 'checked' : ''}}>
            <label class="custom-control-label" for="hambatan_sosial_ekonomi_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="hambatan_sosial_ekonomi_ada" name="table2[hambatan_sosial_ekonomi]" value="Ada" {{$data_psikologis->hambatan_sosial_ekonomi == 'Ada' ? 'checked' : ''}}>
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
            <input type="radio" class="custom-control-input" id="konseling_spiritual_tidak" name="table2[konseling_spiritual]" value="Tidak" {{$data_psikologis->konseling_spiritual == 'Tidak' ? 'checked' : ''}}>
            <label class="custom-control-label" for="konseling_spiritual_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="konseling_spiritual_ya" name="table2[konseling_spiritual]" value="Ya" {{$data_psikologis->konseling_spiritual == 'Ya' ? 'checked' : ''}}>
            <label class="custom-control-label" for="konseling_spiritual_ya">Ya</label>
        </div>
        <input type="text" class="form-control" name="table2[konseling_spiritual_text]" placeholder="jika ya, jelaskan..." value="{{$data_psikologis->konseling_spiritual_text}}">
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-3">
        <label for="">Pasien membutuhkan bantuan dalam menjalankan ibadah dan menyetujuinya :</label>
    </div>
    <div class="col-sm-7">
        <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="bantuan_ibadah_tidak" name="table2[bantuan_ibadah]" value="Tidak" {{$data_psikologis->bantuan_ibadah == 'Tidak' ? 'checked' : ''}}>
            <label class="custom-control-label" for="bantuan_ibadah_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="bantuan_ibadah_ya" name="table2[bantuan_ibadah]" value="Ya" {{$data_psikologis->bantuan_ibadah == 'Ya' ? 'checked' : ''}}>
            <label class="custom-control-label" for="bantuan_ibadah_ya">Ya</label>
        </div>
        <input type="text" class="form-control" name="table2[bantuan_ibadah_text]" placeholder="jika ya, jelaskan..." value="{{$data_psikologis->bantuan_ibadah_text}}">
    </div>
</div>

<h4 class="mt-3"><b>RIWAYAT MENSTRUASI</b></h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Umur menarche</label>
    </div>
    <div class="col-sm-10 d-flex align-items-center">
        <input type="number" class="form-control mr-2" name="table3[umur_menarche]" style="width: 100px;" value="{{$menstruasi_dan_perkawinan->umur_menarche}}">
        <label for="" class="mr-2">tahun, lamanya haid</label>
        <input type="number" class="form-control mr-2" name="table3[lamanya_haid]" style="width: 100px;" value="{{$menstruasi_dan_perkawinan->lamanya_haid}}">
        <label for="" class="mr-2">hari, jumlah darah haid</label>
        <input type="number" class="form-control mr-2" name="table3[jumlah_darah_haid]" style="width: 100px;" value="{{$menstruasi_dan_perkawinan->jumlah_darah_haid}}">
        <label for="" class="mr-2">kali ganti pembalut</label>
    </div>
</div>

<div class="form-group row mt-2">
    <div class="col-sm-2">
        <label for="">HPHT</label>
    </div>
    <div class="col-sm-10 d-flex align-items-center">
        <input type="date" class="form-control" name="table3[hpht]" style="width: 130px;" value="{{$menstruasi_dan_perkawinan->hpht}}">
    </div>
    <div class="col-sm-2 mt-2">
        <label for="">TP</label>
    </div>
    <div class="col-sm-10 d-flex align-items-center mt-2">
        <input type="date" class="form-control" name="table3[tp]" style="width: 130px;" value="{{$menstruasi_dan_perkawinan->tp}}">
    </div>
</div>

<div class="form-group row mt-2">
    <div class="col-sm-2">
        <label for="">Gangguan Haid</label>
    </div>
    <div class="col-sm-10">
        @php
            $gangguan_haid = explode(', ', $menstruasi_dan_perkawinan->gangguan_haid);
        @endphp
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="dismenorhoe" name="table3[gangguan_haid][]" value="Dismenorhoe" {{in_array('Dismenorhoe', $gangguan_haid) ? 'checked' : ''}}>
            <label class="custom-control-label" for="dismenorhoe">Dismenorhoe</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="spotting" name="table3[gangguan_haid][]" value="Spotting" {{in_array('Spotting', $gangguan_haid) ? 'checked' : ''}}>
            <label class="custom-control-label" for="spotting">Spotting</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="menorragia" name="table3[gangguan_haid][]" value="Menorragia" {{in_array('Menorragia', $gangguan_haid) ? 'checked' : ''}}>
            <label class="custom-control-label" for="menorragia">Menorragia</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="metrorhagia" name="table3[gangguan_haid][]" value="Metrorhagia" {{in_array('Metrorhagia', $gangguan_haid) ? 'checked' : ''}}>
            <label class="custom-control-label" for="metrorhagia">Metrorhagia</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="pre_menstruasi_syndrome" name="table3[gangguan_haid][]" value="Pre menstruasi syndrome" {{in_array('Pre menstruasi syndrome', $gangguan_haid) ? 'checked' : ''}}>
            <label class="custom-control-label" for="pre_menstruasi_syndrome">Pre menstruasi syndrome</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="gangguan_haid_lainnya" name="table3[gangguan_haid][]" value="Lainnya" {{in_array('Lainnya', $gangguan_haid) ? 'checked' : ''}}>
            <label class="custom-control-label" for="gangguan_haid_lainnya">Lainnya</label>
        </div>
        <input type="text" class="form-control" name="table3[gangguan_haid_text]" placeholder="jika ya, jelaskan..." value="{{$menstruasi_dan_perkawinan->gangguan_haid_text}}">
    </div>
</div>

<h4 class="mt-3"><b>RIWAYAT PERKAWINAN</b></h4>
<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Status Perkawinan</label>
    </div>
    <div class="col-sm-10 d-flex align-items-center">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="kawin" name="table3[status_kawin]" value="Kawin" {{$menstruasi_dan_perkawinan->status_kawin == 'Kawin' ? 'checked' : ''}}>
            <label class="custom-control-label" for="kawin">Kawin, usia perkawinan</label>
            <input type="text" class="form-control ml-2" name="table3[usia_perkawinan]" placeholder="usia perkawinan...." style="width: 100px;" value="{{$menstruasi_dan_perkawinan->usia_perkawinan}}">
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="belum_kawin" name="table3[status_kawin]" value="Belum Kawin" {{$menstruasi_dan_perkawinan->status_kawin == 'Belum Kawin' ? 'checked' : ''}}>
            <label class="custom-control-label" for="belum_kawin">Belum Kawin</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="janda" name="table3[status_kawin]" value="janda" {{$menstruasi_dan_perkawinan->status_kawin == 'janda' ? 'checked' : ''}}>
            <label class="custom-control-label" for="janda">Janda</label>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2">
        <label for="">Jumlah Perkawinan</label>
    </div>
    <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="1x" name="table3[jumlah_perkawinan]" value="1x" {{$menstruasi_dan_perkawinan->jumlah_perkawinan == '1x' ? 'checked' : ''}}>
            <label class="custom-control-label" for="1x">1x</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="2x" name="table3[jumlah_perkawinan]" value="2x" {{$menstruasi_dan_perkawinan->jumlah_perkawinan == '2x' ? 'checked' : ''}}>
            <label class="custom-control-label" for="2x">2x</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id=">2x" name="table3[jumlah_perkawinan]" value=">2x" {{$menstruasi_dan_perkawinan->jumlah_perkawinan == '>2x' ? 'checked' : ''}}>
            <label class="custom-control-label" for=">2x">>2x</label>
        </div>
    </div>
</div>

<h4 class="mt-3"><b>RIWAYAT KEHAMILAN, PERSALINAN DAN NIFAS YANG LALU</b></h4>
<input type="hidden" id="riwayat_kehamilan_data" value="{{$riwayat_kehamilan}}">
<div class="btn-group mb-3">
    <button type="button" class="btn btn-warning btn-add-row" data-toggle="modal" data-target="#riwayat-kehamilan-modal">
        <i class="fa fa-plus"></i>
        Tambah Riwayat Kehamilan
    </button>
</div>

<div class="table-responsive">
    <table id="riwayat-kehamilan-table" class="w-100 table table-bordered">
        <thead>
            <tr>
                <th>Tgl/Tahun Partus</th>
                <th>Tempat Partus</th>
                <th>Umur Hamil</th>
                <th>Jenis Persalinan</th>
                <th>Penolong Persalinan</th>
                <th>Penyulit</th>
                <th>BB Anak</th>
                <th>Keadaan Sekarang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
