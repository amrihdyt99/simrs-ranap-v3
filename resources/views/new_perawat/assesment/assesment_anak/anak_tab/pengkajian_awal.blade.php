@empty($assesment)
@php
$assesment = optional((object)[]);
@endphp
@endempty

@empty($skor_sad)
@php
$skor_sad = optional((object)[]);
@endphp
@endempty

@empty($adl_anak)
@php
$adl_anak = optional((object)[]);
@endphp
@endempty
<form id="assesment_awal_anak_form">
  @csrf
  <div class="text-black" style="font-size: 14px">
    <input type="hidden" class="form-control" name="awal[reg_no]" value="{{ $reg }}">
    <input type="hidden" class="form-control" name="awal[med_rec]" value="{{ $medrec }}">
    <input type="hidden" class="form-control" name="username" value="{{ auth()->user()->username }}">

    <div class="form-group row">
      <div class="col-sm-2">
        <h4><b>ALERGI</b></h4>
      </div>
      <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
          <input class="custom-control-input" type="radio" id="alergi_tidak" value="0" name="awal[alergi]" {{ $assesment->alergi == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="alergi_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input class="custom-control-input" type="radio" id="alergi_ya" value="1" name="awal[alergi]" {{ $assesment->alergi == 1 ? 'checked' : '' }}>
          <label class="custom-control-label" for="alergi_ya">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input class="custom-control-input" type="radio" id="alergi_tidak_tahu" value="2" name="awal[alergi]" {{ $assesment->alergi == 2 ? 'checked' : '' }}>
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
        <input type="text" id="alergi_obat" name="awal[alergi_obat]" class="form-control" placeholder="Nama obat.." value="{{ $assesment->alergi_obat ?? '' }}">
      </div>
      <div class="col-sm-2 mt-2">
        <label for="bentuk_reaksi_obat">Bentuk reaksi</label>
      </div>
      <div class="col-sm-10 mt-2">
        <input type="text" id="bentuk_reaksi_obat" name="awal[reaksi_alergi_obat]" class="form-control" placeholder="Bentuk reaksi.." value="{{ $assesment->reaksi_alergi_obat ?? '' }}">
      </div>
    </div>

    <div class="form-group row mt-2">
      <div class="mt-2 col-sm-2">
        <label for="alergi_makanan">Alergi makanan</label>
      </div>
      <div class="mt-2 col-sm-10">
        <input type="text" id="alergi_makanan" name="awal[alergi_makanan]" class="form-control" placeholder="Nama makanan.." value="{{ $assesment->alergi_makanan ?? '' }}">
      </div>
      <div class="mt-2 col-sm-2">
        <label for="bentuk_reaksi_makanan">Bentuk reaksi</label>
      </div>
      <div class="mt-2 col-sm-10">
        <input type="text" id="bentuk_reaksi_makanan" name="awal[reaksi_alergi_makanan]" class="form-control" placeholder="Bentuk reaksi.." value="{{ $assesment->reaksi_alergi_makanan ?? '' }}">
      </div>
    </div>

    <div class="form-group row mt-2">
      <div class="mt-2 col-sm-2">
        <label for="alergi_lainnya">Alergi lainnya</label>
      </div>
      <div class="mt-2 col-sm-10">
        <input type="text" id="alergi_lainnya" name="awal[alergi_lainnya]" class="form-control" placeholder="Nama lainnya.." value="{{ $assesment->alergi_lainnya ?? '' }}">
      </div>
      <div class="mt-2 col-sm-2">
        <label for="bentuk_reaksi_lainnya">Bentuk reaksi</label>
      </div>
      <div class="mt-2 col-sm-10">
        <input type="text" id="bentuk_reaksi_lainnya" name="awal[reaksi_alergi_lainnya]" class="form-control" placeholder="Bentuk reaksi lainnya.." value="{{ $assesment->reaksi_alergi_lainnya ?? '' }}">
      </div>
    </div>

    @php
    $diberitahukan_kpd=explode(', ',$assesment->diberitahukan_kpd)??[];
    @endphp
    <div class="form-group row">
      <div class="col-sm-2">
        <label for="" class="mr-3">Diberitahukan kepada</label>
      </div>
      <div class="col-sm-10 d-flex align-items-center">
        <div class="custom-control custom-checkbox custom-control-inline">
          <input class="custom-control-input" type="checkbox" id="diberitahukan_dokter" name="awal[diberitahukan_kpd][]" value="Dokter" {{in_array('Dokter',$diberitahukan_kpd) ? 'checked' : ''}}>
          <label class="custom-control-label" for="diberitahukan_dokter">Dokter</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input class="custom-control-input" type="checkbox" id="diberitahukan_farmasis" name="awal[diberitahukan_kpd][]" value="Farmasis (apoteker)" {{in_array('Farmasis (apoteker)',$diberitahukan_kpd) ? 'checked' : ''}}>
          <label class="custom-control-label" for="diberitahukan_farmasis">Farmasis (apoteker)</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input class="custom-control-input" type="checkbox" id="diberitahukan_dietisien" name="awal[diberitahukan_kpd][]" value="Dietisien" {{in_array('Dietisien',$diberitahukan_kpd) ? 'checked' : ''}}>
          <label class="custom-control-label" for="diberitahukan_dietisien">Dietisien</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input class="custom-control-input" type="radio" id="diberitahukan_ya" name="awal[diberitahukan]" value="1" {{ $assesment->diberitahukan == 1 ? 'checked' : '' }}>
          <label class="custom-control-label" for="diberitahukan_ya">Ya, Pukul</label>
        </div>
        <input type="time" id="diberitahukan_pukul" name="awal[diberitahukan_pukul]" class="form-control mr-3" style="width: 100px;" value="{{ $assesment->diberitahukan_pukul ?? '' }}">
        <div class="custom-control custom-radio custom-control-inline">
          <input class="custom-control-input" type="radio" id="diberitahukan_tidak" name="awal[diberitahukan]" value="0" {{ $assesment->diberitahukan == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="diberitahukan_tidak">Tidak</label>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-2">
        <label for="" class="mr-3">Kondisi Umum</label>
      </div>
      <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
          <input class="custom-control-input" type="radio" id="kondisi_baik" name="awal[kondisi_umum]" value="Baik" {{ $assesment->kondisi_umum == 'Baik' ? 'checked' : '' }}>
          <label class="custom-control-label" for="kondisi_baik">Baik</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input class="custom-control-input" type="radio" id="kondisi_tampak_sakit" name="awal[kondisi_umum]" value="Tampak sakit" {{ $assesment->kondisi_umum == "Tampak sakit" ? 'checked' : '' }}>
          <label class="custom-control-label" for="kondisi_tampak_sakit">Tampak sakit</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input class="custom-control-input" type="radio" id="kondisi_sesak" name="awal[kondisi_umum]" value="Sesak" {{ $assesment->kondisi_umum == 'Sesak' ? 'checked' : '' }}>
          <label class="custom-control-label" for="kondisi_sesak">Sesak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input class="custom-control-input" type="radio" id="kondisi_pucat" name="awal[kondisi_umum]" value="Pucat" {{ $assesment->kondisi_umum == 'Pucat' ? 'checked' : '' }}>
          <label class="custom-control-label" for="kondisi_pucat">Pucat</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input class="custom-control-input" type="radio" id="kondisi_lemah" name="awal[kondisi_umum]" value="Lemah" {{ $assesment->kondisi_umum == 'Lemah' ? 'checked' : '' }}>
          <label class="custom-control-label" for="kondisi_lemah">Lemah</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input class="custom-control-input" type="radio" id="kondisi_lainnya" name="awal[kondisi_umum]" value="Lainnya" {{ $assesment->kondisi_umum == 'Lainnya' ? 'checked' : '' }}>
          <label class="custom-control-label" for="kondisi_lainnya">Lainnya</label>
        </div>
        <input type="text" id="kondisi_lainnya_text" name="awal[kondisi_umum_lainnya]" placeholder="lainnya.." class="form-control" value="{{ $assesment->kondisi_umum_lainnya ?? '' }}">
      </div>
    </div>

    <div class="form-group mt-3 row">
      <div class="col-sm-2">
      </div>
      <div class="col-sm-2">
        <label for="tekanan_darah">Tekanan Darah</label>
        <div class="input-group">
          <input type="number" id="tekanan_darah" name="awal[tekanan_darah]" class="form-control" value="{{ $assesment->tekanan_darah ?? '' }}">
          <div class="input-group-append">
            <span class="input-group-text bg-primary text-white" style="padding: 5px;">mmHg</span>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <label for="nadi">Nadi</label>
        <div class="input-group">
          <input type="number" id="nadi" name="awal[nadi]" class="form-control" value="{{ $assesment->nadi ?? '' }}">
          <div class="input-group-append">
            <span class="input-group-text bg-primary text-white" style="padding: 5px;">x/mnt</span>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <label for="suhu">Suhu</label>
        <div class="input-group">
          <input type="number" id="suhu" name="awal[suhu]" class="form-control" value="{{ $assesment->suhu ?? '' }}">
          <div class="input-group-append">
            <span class="input-group-text bg-primary text-white" style="padding: 5px;">°C</span>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <label for="pernafasan">Pernafasan</label>
        <div class="input-group">
          <input type="number" id="pernafasan" name="awal[pernafasan]" class="form-control" value="{{ $assesment->pernafasan ?? '' }}">
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
          <input type="number" id="tinggi_badan" name="awal[tinggi_badan]" class="form-control" value="{{ $assesment->tinggi_badan ?? '' }}">
          <div class="input-group-append">
            <span class="input-group-text bg-primary text-white" style="padding: 5px;">cm</span>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <label for="berat_badan">Berat badan</label>
        <div class="input-group">
          <input type="number" id="berat_badan" name="awal[berat_badan]" class="form-control" value="{{ $assesment->berat_badan ?? '' }}">
          <div class="input-group-append">
            <span class="input-group-text bg-primary text-white" style="padding: 5px;">kg</span>
          </div>
        </div>
      </div>
    </div>
    @php
    $khusus=explode(', ',$assesment->kebutuhan_khusus)??[];
    @endphp
    <div class="form-group row">
      <div class="col-sm-2">
        <label for="">Kebutuhan Khusus</label>
      </div>
      <div class="col-sm-10">
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="kebutuhan_tidak_ada" name="awal[kebutuhan_khusus][]" value="Tidak ada" {{in_array('Tidak ada',$khusus) ? 'checked' : ''}}>
          <label class="custom-control-label" for="kebutuhan_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="kebutuhan_alat_bantu_dengar" name="awal[kebutuhan_khusus][]" value="Alat bantu dengar" {{in_array('Alat bantu dengar',$khusus) ? 'checked' : ''}}>
          <label class="custom-control-label" for="kebutuhan_alat_bantu_dengar">Alat bantu dengar</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="kebutuhan_kaca_mata" name="awal[kebutuhan_khusus][]" value="Kacamata" {{in_array('Kacamata',$khusus) ? 'checked' : ''}}>
          <label class="custom-control-label" for="kebutuhan_kaca_mata">Kacamata</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="kebutuhan_tongkat" name="awal[kebutuhan_khusus][]" value="Tongkat" {{in_array('Tongkat',$khusus) ? 'checked' : ''}}>
          <label class="custom-control-label" for="kebutuhan_tongkat">Tongkat</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="kebutuhan_gigi_palsu" name="awal[kebutuhan_khusus][]" value="Gigi palsu" {{in_array('Gigi palsu',$khusus) ? 'checked' : ''}}>
          <label class="custom-control-label" for="kebutuhan_gigi_palsu">Gigi palsu</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="kebutuhan_lainnya" name="awal[kebutuhan_khusus][]" value="Lainnya" {{in_array('Lainnya',$khusus) ? 'checked' : ''}}>
          <label class="custom-control-label" for="kebutuhan_lainnya">Lainnya</label>
        </div>
        <input type="text" id="kebutuhan_lainnya_text" name="awal[kebutuhan_khusus_lainnya]" placeholder="lainnya.." class="form-control" value="{{ $assesment->kebutuhan_khusus_lainnya ?? '' }}">
      </div>
    </div>

    <h4 class="mt-3"><b>DATA PSIKOLOGIS, SOSIAL, EKONOMI DAN SPIRITUAL</b></h4>
    <div class="form-group row">
      <div class="col-sm-2">
        <label for="status_emosional">Status emosional</label>
      </div>
      <div class="col-sm-10">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="status_stabil" name="awal[status_emosional]" value="Stabil/tenang" {{ $assesment->status_emosional == 'Stabil/tenang' ? 'checked' : '' }}>
          <label class="custom-control-label" for="status_stabil">Stabil/tenang</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="status_cemas" name="awal[status_emosional]" value="Cemas/Takut" {{ $assesment->status_emosional == 'Cemas/Takut' ? 'checked' : '' }}>
          <label class="custom-control-label" for="status_cemas">Cemas/Takut</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="status_marah" name="awal[status_emosional]" value="Marah" {{ $assesment->status_emosional == 'Marah' ? 'checked' : '' }}>
          <label class="custom-control-label" for="status_marah">Marah</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="status_sedih" name="awal[status_emosional]" value="Sedih" {{ $assesment->status_emosional == 'Sedih' ? 'checked' : '' }}>
          <label class="custom-control-label" for="status_sedih">Sedih</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="status_lainnya" name="awal[status_emosional]" value="Lainnya" {{ $assesment->status_emosional == 'Lainnya' ? 'checked' : '' }}>
          <label class="custom-control-label" for="status_lainnya">Lainnya</label>
        </div>
        <input type="text" id="status_lainnya_text" name="awal[status_emosi_lainnya]" placeholder="lainnya.." class="form-control" value="{{ $assesment->status_emosi_lainnya ?? '' }}">
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
          <input type="radio" class="custom-control-input" id="merokok_tidak" name="awal[merokok]" value="0" {{ $assesment->merokok == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="merokok_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="merokok_ya" name="awal[merokok]" value="1" {{ $assesment->merokok == 1 ? 'checked' : '' }}>
          <label class="custom-control-label" for="merokok_ya">Ya</label>
          <div class="input-group ml-2">
            <input type="text" id="frekuensi_merokok" name="awal[frekuensi_merokok]" class="form-control" style="width: 60px;" value="{{ $assesment->frekuensi_merokok ?? '' }}">
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
          <input type="radio" class="custom-control-input" id="alkohol_tidak" name="awal[alkohol]" value="0" {{ $assesment->alkohol == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="alkohol_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="alkohol_ya" name="awal[alkohol]" value="1" {{ $assesment->alkohol == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="alkohol_ya">Ya</label>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-4">
        <label for="riwayat_gangguan_jiwa">Riwayat pernah mengalami gangguan jiwa di masa lalu</label>
      </div>
      <div class="col-sm-2">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="gangguan_jiwa_tidak" name="awal[riwayat_gangguan_jiwa]" value="0" {{ $assesment->riwayat_gangguan_jiwa == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="gangguan_jiwa_tidak">Tidak</label>
        </div>
      </div>
      <div class="col-sm-5">
        <div class="row">
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="gangguan_jiwa_ya" name="awal[riwayat_gangguan_jiwa]" value="1" {{ $assesment->riwayat_gangguan_jiwa == 1 ? 'checked' : '' }}>
            <label class="custom-control-label" for="gangguan_jiwa_ya">Ya, kapan</label>
          </div>
          <input type="text" id="gangguan_jiwa_waktu" name="awal[gangguan_jiwa_waktu]" class="form-control" style="width: 300px;" value="{{ $assesment->gangguan_jiwa_waktu ?? '' }}">
        </div>
      </div>
    </div>

    <h4 class="mt-3"><b>SKOR SAD PERSON</b></h4>
    <table class="table1 w-100">
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
            <input type="radio" class="skor_sad" id="sex_ya" name="skor_sad[sex]" value="1" {{ $skor_sad->sex == 1 ? 'checked' : '' }}>
            <label for="sex_ya">Ya</label>
            <input type="radio" class="skor_sad" id="sex_tidak" name="skor_sad[sex]" value="0" {{ $skor_sad->sex == 0 ? 'checked' : '' }}>
            <label for="sex_tidak">Tidak</label>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Age ( < 19 th atau> 45 th )</td>
          <td>
            <input type="radio" class="skor_sad" id="age_ya" name="skor_sad[age]" value="1" {{ $skor_sad->age == 1 ? 'checked' : '' }}>
            <label for="age_ya">Ya</label>
            <input type="radio" class="skor_sad" id="age_tidak" name="skor_sad[age]" value="0" {{ $skor_sad->age == 0 ? 'checked' : '' }}>
            <label for="age_tidak">Tidak</label>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td>Depresi ( pasien MRS dengan depresi atau penurunan konsentrasi, gangguan tidur, gangguan pola makan, dan gangguan libido )</td>
          <td>
            <input type="radio" class="skor_sad" id="depresi_ya" name="skor_sad[depresi]" value="1" {{ $skor_sad->depresi == 1 ? 'checked' : '' }}>
            <label for="depresi_ya">Ya</label>
            <input type="radio" class="skor_sad" id="depresi_tidak" name="skor_sad[depresi]" value="0" {{ $skor_sad->depresi == 0 ? 'checked' : '' }}>
            <label for="depresi_tidak">Tidak</label>
          </td>
        </tr>
        <tr>
          <td>4</td>
          <td>Previous Suicide ( riwayat bunuh diri atau perawatan psikiatri )</td>
          <td>
            <input type="radio" class="skor_sad" id="suicide_ya" name="skor_sad[suicide]" value="1" {{ $skor_sad->suicide == 1 ? 'checked' : '' }}>
            <label for="suicide_ya">Ya</label>
            <input type="radio" class="skor_sad" id="suicide_tidak" name="skor_sad[suicide]" value="0" {{ $skor_sad->suicide == 0 ? 'checked' : '' }}>
            <label for="suicide_tidak">Tidak</label>
          </td>
        </tr>
        <tr>
          <td>5</td>
          <td>Excessive alcohol ( ketergantungan alkohol atau pemakai narkoba )</td>
          <td>
            <input type="radio" class="skor_sad" id="alcohol_ya" name="skor_sad[alcohol]" value="1" {{ $skor_sad->alcohol == 1 ? 'checked' : '' }}>
            <label for="alcohol_ya">Ya</label>
            <input type="radio" class="skor_sad" id="alcohol_tidak" name="skor_sad[alcohol]" value="0" {{ $skor_sad->alcohol == 0 ? 'checked' : '' }}>
            <label for="alcohol_tidak">Tidak</label>
          </td>
        </tr>
        <tr>
          <td>6</td>
          <td>Rational thinking loss ( kehilangan pikiran rasional, psikosis, organic brain syndrome )</td>
          <td>
            <input type="radio" class="skor_sad" id="thinking_loss_ya" name="skor_sad[thinking_loss]" value="1" {{ $skor_sad->thinking_loss == 1 ? 'checked' : '' }}>
            <label for="thinking_loss_ya">Ya</label>
            <input type="radio" class="skor_sad" id="thinking_loss_tidak" name="skor_sad[thinking_loss]" value="0" {{ $skor_sad->thinking_loss == 0 ? 'checked' : '' }}>
            <label for="thinking_loss_tidak">Tidak</label>
          </td>
        </tr>
        <tr>
          <td>7</td>
          <td>Separated ( bercerai / janda )</td>
          <td>
            <input type="radio" class="skor_sad" id="separated_ya" name="skor_sad[separated]" value="1" {{ $skor_sad->separated == 1 ? 'checked' : '' }}>
            <label for="separated_ya">Ya</label>
            <input type="radio" class="skor_sad" id="separated_tidak" name="skor_sad[separated]" value="0" {{ $skor_sad->separated == 0 ? 'checked' : '' }}>
            <label for="separated_tidak">Tidak</label>
          </td>
        </tr>
        <tr>
          <td>8</td>
          <td>Organized plan ( menunjukan rencana bunuh diri yang terorganisir / niat serius )</td>
          <td>
            <input type="radio" class="skor_sad" id="organized_plan_ya" name="skor_sad[organized_plan]" value="1" {{ $skor_sad->organized_plan == 1 ? 'checked' : '' }}>
            <label for="organized_plan_ya">Ya</label>
            <input type="radio" class="skor_sad" id="organized_plan_tidak" name="skor_sad[organized_plan]" value="0" {{ $skor_sad->organized_plan == 0 ? 'checked' : '' }}>
            <label for="organized_plan_tidak">Tidak</label>
          </td>
        </tr>
        <tr>
          <td>9</td>
          <td>No Social Support ( tidak ada pendukung )</td>
          <td>
            <input type="radio" class="skor_sad" id="no_support_ya" name="skor_sad[no_social_support]" value="1" {{ $skor_sad->no_social_support == 1 ? 'checked' : '' }}>
            <label for="no_support_ya">Ya</label>
            <input type="radio" class="skor_sad" id="no_support_tidak" name="skor_sad[no_social_support]" value="0" {{ $skor_sad->no_social_support == 0 ? 'checked' : '' }}>
            <label for="no_support_tidak">Tidak</label>
          </td>
        </tr>
        <tr>
          <td>10</td>
          <td>Sickness ( menderita penyakit kronis )</td>
          <td>
            <input type="radio" class="skor_sad" id="sickness_ya" name="skor_sad[sickness]" value="1" {{ $skor_sad->sickness == 1 ? 'checked' : '' }}>
            <label for="sickness_ya">Ya</label>
            <input type="radio" class="skor_sad" id="sickness_tidak" name="skor_sad[sickness]" value="0" {{ $skor_sad->sickness == 0 ? 'checked' : '' }}>
            <label for="sickness_tidak">Tidak</label>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <td colspan="2">
          <p class="text-right"><b>Skor Sad Person</b></p>
        </td>
        <td>
          <input type="text" class="form-control" id="total_skor_sad" name="skor_sad[skor_sad_person]" value="{{ $skor_sad->skor_sad_person ?? '' }}" readonly>
        </td>
      </tfoot>
    </table>

    <div class="form-group row mt-3">
      <div class="col-sm-4">
        <label for="">Kategori</label>
      </div>
      <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="kategori_rendah" name="awal[kategori]" value="1" {{ $assesment->kategori == 1 ? 'checked' : '' }}>
          <label class="custom-control-label" for="kategori_rendah">Rendah ( 1-2 )</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="kategori_sedang" name="awal[kategori]" value="2" {{ $assesment->kategori == 2 ? 'checked' : '' }}>
          <label class="custom-control-label" for="kategori_sedang">Sedang ( 3-6 )</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="kategori_tinggi" name="awal[kategori]" value="3" {{ $assesment->kategori == 3 ? 'checked' : '' }}>
          <label class="custom-control-label" for="kategori_tinggi">Tinggi ( 7 - 10 )</label>
        </div>
      </div>
    </div>

    <div class="form-group row mt-3">
      <div class="col-sm-4">
        <label for="">Riwayat Keinginan dan Percobaan Bunuh Diri</label>
      </div>
      <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="riwayat_bunuh_diri_tidak" name="awal[riwayat_bunuh_diri]" value="0" {{ $assesment->riwayat_bunuh_diri == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="riwayat_bunuh_diri_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="riwayat_bunuh_diri_ya" name="awal[riwayat_bunuh_diri]" value="1" {{ $assesment->riwayat_bunuh_diri == 1 ? 'checked' : '' }}>
          <label class="custom-control-label" for="riwayat_bunuh_diri_ya">Ya</label>
        </div>
        <input type="text" class="form-control" name="awal[riwayat_bunuh_diri_ket]" placeholder="jika ya,jelaskan..." value="{{ $assesment->riwayat_bunuh_diri_ket ?? '' }}">
      </div>
    </div>

    @php
    $trauma=explode(', ',$assesment->riwayat_trauma_psikis)??[];
    @endphp
    <div class="form-group row">
      <div class=" col-sm-4">
        <label for="">Riwayat Trauma psikis</label>
      </div>
      <div class="col-sm-8">
        <div class="row">
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="anayaa_fisik_psikologis_kdr" name="awal[riwayat_trauma_psikis][]" value="Aniaya fisik / psikologis/ KDRT" {{in_array('Aniaya fisik / psikologis/ KDRT',$trauma) ? 'checked' : ''}}>
            <label class="custom-control-label" for="anayaa_fisik_psikologis_kdr">Aniaya fisik / psikologis/ KDRT</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="anayaa_seksual_perkosaan" name="awal[riwayat_trauma_psikis][]" value="Aniaya Seksual/Perkosaan" {{in_array('Aniaya Seksual/Perkosaan',$trauma) ? 'checked' : ''}}>
            <label class="custom-control-label" for="anayaa_seksual_perkosaan">Aniaya Seksual/Perkosaan</label>
          </div>
        </div>
        <div class="row">
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="tindakan_kriminal" name="awal[riwayat_trauma_psikis][]" value="Tindakan Kriminal" {{in_array('Tindakan Kriminal',$trauma) ? 'checked' : ''}}>
            <label class="custom-control-label" for="tindakan_kriminal">Tindakan Kriminal</label>
          </div>
          <input type="text" name="awal[tindakan_kriminal_ket]" class="form-control" placeholder="detail tindakan kriminal...." value="{{ $assesment->tindakan_kriminal_ket ?? '' }}">
        </div>
        <div class="row">
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="lainnya" name="awal[riwayat_trauma_psikis][]" value="lainnya" {{in_array('lainnya',$trauma) ? 'checked' : ''}}>
            <label class="custom-control-label" for="lainnya">Lainnya</label>
          </div>
          <input type="text" name="awal[riwayat_trauma_psikis_ket]" class="form-control" placeholder="lainnya...." value="{{ $assesment->riwayat_trauma_psikis_ket ?? '' }}">
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-4">
        <label for="">Hambatan sosial dan ekonomi</label>
      </div>
      <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="hambatan_sosial_ekonomi_tidak" name="awal[hambatan_sosial_ekonomi]" value="0" {{ $assesment->hambatan_sosial_ekonomi == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="hambatan_sosial_ekonomi_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="hambatan_sosial_ekonomi_ada" name="awal[hambatan_sosial_ekonomi]" value="1" {{ $assesment->hambatan_sosial_ekonomi == 1 ? 'checked' : '' }}>
          <label class="custom-control-label" for="hambatan_sosial_ekonomi_ada">Ada</label>
        </div>
      </div>
    </div>

    <h5 class="mt-3">Kebutuhan spiritual pasien dalam perawatan di rumah sakit :</h5>
    <div class="form-group row">
      <div class="col-sm-4">
        <label for="">Pasien membutuhkan konseling spiritual/agama :</label>
      </div>
      <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="konseling_spiritual_tidak" name="awal[konseling_spiritual]" value="0" {{ $assesment->konseling_spiritual == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="konseling_spiritual_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="konseling_spiritual_ya" name="awal[konseling_spiritual]" value="1" {{ $assesment->konseling_spiritual == 1 ? 'checked' : '' }}>
          <label class="custom-control-label" for="konseling_spiritual_ya">Ya</label>
        </div>
        <input type="text" class="form-control" name="awal[konseling_spiritual_ket]" placeholder="jika ya, jelaskan..." value="{{ $assesment->konseling_spiritual_ket ?? '' }}">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-4">
        <label for="">Pasien membutuhkan bantuan dalam menjalankan ibadah dan menyetujuinya :</label>
      </div>
      <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="bantuan_ibadah_tidak" name="awal[bantuan_ibadah]" value="0" {{ $assesment->bantuan_ibadah == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="bantuan_ibadah_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="bantuan_ibadah_ya" name="awal[bantuan_ibadah]" value="1" {{ $assesment->bantuan_ibadah == 1 ? 'checked' : '' }}>
          <label class="custom-control-label" for="bantuan_ibadah_ya">Ya</label>
        </div>
        <input type="text" class="form-control" name="awal[bantuan_ibadah_ket]" placeholder="jika ya, jelaskan..." value="{{ $assesment->bantuan_ibadah_ket ?? '' }}">
      </div>
    </div>

    <h4 class="mt-3"><b>FAKTOR RESIKO</b></h4>
    <div class="form-group row">
      <div class="col-sm-4">
        <label for="">Prenatal - Riwayat Ibu</label>
      </div>
      <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="resiko_riwayat_ibu_none" name="awal[resiko_riwayat_ibu]" value="0" {{ $assesment->bantuan_ibadah == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="resiko_riwayat_ibu_none">Tidak ada gangguan</label>
        </div>
        <div class="row">
          <div class="col-sm-5">
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="resiko_riwayat_ibu_ada" name="awal[resiko_riwayat_ibu]" value="1" {{ $assesment->bantuan_ibadah == 0 ? 'checked' : '' }}>
              <label class="custom-control-label" for="resiko_riwayat_ibu_ada">Ada gangguan berupa :</label>
            </div>
          </div>
          @php
          $list_ibu=explode(', ',$assesment->list_res_riwayat_ibu)??[];
          @endphp
          <div class="col-sm-7">
            <div class="row">
              <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" id="res_ibu_gangguan_hipermesis" name="awal[list_res_riwayat_ibu][]" value="Hiperemesis" {{in_array('Hiperemesis',$list_ibu) ? 'checked' : ''}}>
                <label class="custom-control-label" for="res_ibu_gangguan_hipermesis">Hiperemesis</label>
              </div>
              <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" id="res_ibu_gangguan_hipertensi" name="awal[list_res_riwayat_ibu][]" value="Hipertensi" {{in_array('Hipertensi',$list_ibu) ? 'checked' : ''}}>
                <label class="custom-control-label" for="res_ibu_gangguan_hipertensi">Hipertensi</label>
              </div>
            </div>
            <div class="row">
              <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" id="res_ibu_gangguan_perdarahan" name="awal[list_res_riwayat_ibu][]" value="Perdarahan" {{in_array('Perdarahan',$list_ibu) ? 'checked' : ''}}>
                <label class="custom-control-label" for="res_ibu_gangguan_perdarahan">Perdarahan</label>
              </div>
              <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" id="res_ibu_gangguan_infeksi" name="awal[list_res_riwayat_ibu][]" value="Infeksi" {{in_array('Infeksi',$list_ibu) ? 'checked' : ''}}>
                <label class="custom-control-label" for="res_ibu_gangguan_infeksi">Infeksi</label>
              </div>
              <input type="text" class="form-control" name="awal[res_ibu_ket_infeksi]" placeholder="detail infeksi..." value="{{ $assesment->res_ibu_ket_infeksi ?? '' }}">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-4">
        <label for="">Perinatal</label>
      </div>
      <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="perinatal_none" name="awal[perinatal]" value="0" {{ $assesment->perinatal == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="perinatal_none">Tidak ada gangguan</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="perinatal_ada" name="awal[perinatal]" value="1" {{ $assesment->perinatal == 1 ? 'checked' : '' }}>
          <label class="custom-control-label" for="perinatal_ada">Ada gangguan berupa : </label>
        </div>
        <input type="text" class="form-control" name="awal[perinatal_detail]" placeholder="detail gangguan..." value="{{ $assesment->perinatal_detail ?? '' }}">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-4">
        <label for="">Postnatal</label>
      </div>
      <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="postnatal_none" name="awal[postnatal]" value="0" {{ $assesment->postnatal == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="postnatal_none">Tidak ada gangguan</label>
        </div>
        <div class="row">
          <div class="col-sm-5">
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" class="custom-control-input" id="postnatal_ada" name="awal[postnatal]" value="1" {{ $assesment->postnatal == 1 ? 'checked' : '' }}>
              <label class="custom-control-label" for="postnatal_ada">Ada gangguan berupa :</label>
            </div>
          </div>
          @php
          $postnatal=explode(', ',$assesment->list_postnatal)??[];
          @endphp
          <div class="col-sm-7">
            <div class="row">
              <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" id="postnatal_asfiksia" name="awal[list_postnatal][]" value="Asfiksia" {{in_array('Asfiksia',$postnatal) ? 'checked' : ''}}>
                <label class="custom-control-label" for="postnatal_asfiksia">Asfiksia</label>
              </div>
              <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" id="postnatal_hiperbilirubinemia" name="awal[list_postnatal][]" value="Hiperbilirubinemia" {{in_array('Hiperbilirubinemia',$postnatal) ? 'checked' : ''}}>
                <label class="custom-control-label" for="postnatal_hiperbilirubinemia">Hiperbilirubinemia</label>
              </div>
            </div>
            <div class="row">
              <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" id="postnatal_kongenital" name="awal[list_postnatal][]" value="Kelainan Kongenital" {{in_array('Kelainan Kongenital',$postnatal) ? 'checked' : ''}}>
                <label class="custom-control-label" for="postnatal_kongenital">Kelainan Kongenital</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @php
    $hospitalisasi=explode(', ',$assesment->hospitalisasi)??[];
    @endphp
    <div class="form-group row">
      <div class="col-sm-4">
        <label for="">Hospitalisasi</label>
      </div>
      <div class="col-sm-8">
        <div class="row">
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="hospitalisasi_riwayat_sakit_berat" name="awal[hospitalisasi][]" value="Riwayat sakit berat" {{in_array('Riwayat sakit berat',$hospitalisasi) ? 'checked' : ''}}>
            <label class="custom-control-label" for="hospitalisasi_riwayat_sakit_berat">Riwayat sakit berat</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="hospitalisasi_kejang" name="awal[hospitalisasi][]" value="Kejang" {{in_array('Kejang',$hospitalisasi) ? 'checked' : ''}}>
            <label class="custom-control-label" for="hospitalisasi_kejang">Kejang</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="hospitalisasi_trauma" name="awal[hospitalisasi][]" value="Trauma" {{in_array('Trauma',$hospitalisasi) ? 'checked' : ''}}>
            <label class="custom-control-label" for="hospitalisasi_trauma">Trauma</label>
          </div>
          <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" class="custom-control-input" id="hospitalisasi_lainnya" name="awal[hospitalisasi][]" value="Kelainan Lain" {{in_array('Kelainan Lain',$hospitalisasi) ? 'checked' : ''}}>
            <label class="custom-control-label" for="hospitalisasi_lainnya">Kelainan Lain</label>
          </div>
        </div>
        <input type="text" class="form-control mt-2" name="awal[hospitalisasi_lainnya]" placeholder="Kelainan lainnya..." value="{{ $assesment->hospitalisasi_lainnya ?? '' }}">
        <div class="row mt-2">
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="hospitalisasi_1_kali" name="awal[hospitalisasi_times]" value="1 kali" {{ $assesment->hospitalisasi_times == '1 kali' ? 'checked' : '' }}>
            <label class="custom-control-label" for="hospitalisasi_1_kali">1 Kali</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="hospitalisasi_2_kali" name="awal[hospitalisasi_times]" value="2 kali" {{ $assesment->hospitalisasi_times == '2 kali' ? 'checked' : '' }}>
            <label class="custom-control-label" for="hospitalisasi_2_kali">2 Kali</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="hospitalisasi_3_kali" name="awal[hospitalisasi_times]" value="3 kali" {{ $assesment->hospitalisasi_times == '3 kali' ? 'checked' : '' }}>
            <label class="custom-control-label" for="hospitalisasi_3_kali">3 Kali</label>
          </div>
          <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" class="custom-control-input" id="hospitalisasi_lebih_3" name="awal[hospitalisasi_times]" value="lebih dari 3 kali" {{ $assesment->hospitalisasi_times == 'lebih dari 3 Kali' ? 'checked' : '' }}>
            <label class="custom-control-label" for="hospitalisasi_lebih_3">> dari 3 Kali</label>
          </div>
        </div>
      </div>
    </div>

    <h4 class="mt-3"><b>LINGKUNGAN KELUARGA</b></h4>
    <div class="form-group row">
      <div class="col-sm-4">
        <label for="">Pola Asuh</label>
      </div>
      <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="pola_asuh_demokratis" name="awal[pola_asuh]" value="Demokratis" {{ $assesment->pola_asuh == 'Demokratis' ? 'checked' : '' }}>
          <label class="custom-control-label" for="pola_asuh_demokratis">Demokratis</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="pola_asuh_otoriter" name="awal[pola_asuh]" value="Otoriter" {{ $assesment->pola_asuh == 'Otoriter' ? 'checked' : '' }}>
          <label class="custom-control-label" for="pola_asuh_otoriter">Otoriter</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="pola_asuh_campuran" name="awal[pola_asuh]" value="Campuran" {{ $assesment->pola_asuh == 'Campuran' ? 'checked' : '' }}>
          <label class="custom-control-label" for="pola_asuh_campuran">Campuran</label>
        </div>
      </div>
    </div>


    <div class="form-group row">
      <div class="col-sm-4">
        <label for="">Orang terdekat dengan anak</label>
      </div>
      <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="org_terdekat_ortu" name="awal[org_terdekat]" value="Orang Tua" {{ $assesment->org_terdekat == 'Orang Tua' ? 'checked' : '' }}>
          <label class="custom-control-label" for="org_terdekat_ortu">Kedua Orang Tua</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="org_terdekat_ayah" name="awal[org_terdekat]" value="Ayah" {{ $assesment->org_terdekat == 'Ayah' ? 'checked' : '' }}>
          <label class="custom-control-label" for="org_terdekat_ayah">Ayah</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="org_terdekat_ibu" name="awal[org_terdekat]" value="Ibu" {{ $assesment->org_terdekat == 'Ibu' ? 'checked' : '' }}>
          <label class="custom-control-label" for="org_terdekat_ibu">Ibu</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="org_terdekat_nenek" name="awal[org_terdekat]" value="Nenek" {{ $assesment->org_terdekat == 'Nenek' ? 'checked' : '' }}>
          <label class="custom-control-label" for="org_terdekat_nenek">Nenek</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="org_terdekat_saudara" name="awal[org_terdekat]" value="Saudara" {{ $assesment->org_terdekat == 'Saudara' ? 'checked' : '' }}>
          <label class="custom-control-label" for="org_terdekat_saudara">Saudara</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="org_terdekat_lainnya" name="awal[org_terdekat]" value="Lainnya" {{ $assesment->org_terdekat == 'Lainnya' ? 'checked' : '' }}>
          <label class="custom-control-label" for="org_terdekat_lainnya">Lainnya</label>
        </div>
        <input type="text" class="form-control mt-2" name="awal[org_terdekat_lainnya]" placeholder="Orang terdekat lainnya..." value="{{ $assesment->org_terdekat_lainnya ?? '' }}">
      </div>
    </div>
    @php
    $tipe_anak=explode(', ',$assesment->tipe_anak)??[];
    @endphp
    <div class="form-group row">
      <div class="col-sm-4">
        <label for="">Tipe anak</label>
      </div>
      <div class="col-sm-8">
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="tipe_anak_periang" name="awal[tipe_anak]" value="Periang" {{in_array('Periang',$tipe_anak) ? 'checked' : ''}}>
          <label class="custom-control-label" for="tipe_anak_periang">Periang</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="tipe_anak_minta_perhatian" name="awal[tipe_anak]" value="Minta perhatian lebih" {{in_array('Minta perhatian lebih',$tipe_anak) ? 'checked' : ''}}>
          <label class="custom-control-label" for="tipe_anak_minta_perhatian">Minta perhatian lebih</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="tipe_anak_pemalu" name="awal[tipe_anak]" value="Pemalu" {{in_array('Pemalu',$tipe_anak) ? 'checked' : ''}}>
          <label class="custom-control-label" for="tipe_anak_pemalu">Pemalu</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="tipe_anak_pemberani" name="awal[tipe_anak]" value="Pemberani" {{in_array('Pemberani',$tipe_anak) ? 'checked' : ''}}>
          <label class="custom-control-label" for="tipe_anak_pemberani">Pemberani</label>
        </div>
        <div class="custom-control custom-checkbox custom-control-inline">
          <input type="checkbox" class="custom-control-input" id="tipe_anak_lainnya" name="awal[tipe_anak]" value="Lainnya" {{in_array('Lainnya',$tipe_anak) ? 'checked' : ''}}>
          <label class="custom-control-label" for="tipe_anak_lainnya">Lainnya</label>
        </div>
        <input type="text" class="form-control mt-2" name="awal[tipe_anak_lainnya]" placeholder="Tipe anak lainnya..." value="{{ $assesment->tipe_anak_lainnya ?? '' }}">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-4">
        <label for="">Kebiasaan perilaku unik</label>
      </div>
      <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="perilaku_unik_none" name="awal[perilaku_unik]" value="0" {{ $assesment->perilaku_unik == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="perilaku_unik_none">Tidak Ada</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="perilaku_unik_ada" name="awal[perilaku_unik]" value="1" {{ $assesment->perilaku_unik == 1 ? 'checked' : '' }}>
          <label class="custom-control-label" for="perilaku_unik_ada">Ada, jelaskan</label>
        </div>
        <input type="text" class="form-control mt-2" name="awal[perilaku_unik_lainnya]" placeholder="Jelaksan perilaku uniknya..." value="{{ $assesment->perilaku_unik_lainnya ?? '' }}">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-4">
        <label for="">Pekerjaan Ayah</label>
      </div>
      <div class="col-sm-8">
        <input type="text" class="form-control mt-2" name="awal[pekerjaan_ayah]" placeholder="Isi pekerjaan ayah..." value="{{ $assesment->pekerjaan_ayah ?? '' }}">
      </div>
    </div>


    <div class="form-group row">
      <div class="col-sm-4">
        <label for="">Pekerjaan Ibu</label>
      </div>
      <div class="col-sm-8">
        <input type="text" class="form-control mt-2" name="awal[pekerjaan_ibu]" placeholder="Isi pekerjaan ibu..." value="{{ $assesment->pekerjaan_ibu ?? '' }}">
      </div>
    </div>

    <h4 class="mt-3"><b>SKRINNING STATUS FUNGSIONAL</b></h4>
    <div class="form-group">
      <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="kategori_status_fungsional_1" name="awal[kategori_status_fungsional]" value="1" {{ $assesment->kategori_status_fungsional == 1 ? 'checked' : '' }}>
        <label class="custom-control-label" for="kategori_status_fungsional_1">Kategori I : Perawatan Minimal (Self Care), memerlukan waktu 1 - 2 jam / 24 jam</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="kategori_status_fungsional_2" name="awal[kategori_status_fungsional]" value="2" {{ $assesment->kategori_status_fungsional == 2 ? 'checked' : '' }}>
        <label class="custom-control-label" for="kategori_status_fungsional_2">Kategori II : Kriteria Perawatan Partial (Intermediate Care), memerlukan waktu 3-4 jam / 24 jam</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" id="kategori_status_fungsional_3" name="awal[kategori_status_fungsional]" value="3" {{ $assesment->kategori_status_fungsional == 3 ? 'checked' : '' }}>
        <label class="custom-control-label" for="kategori_status_fungsional_3">Kategori III : Kriteria Perawatan Maksimal (Total Care / Intensif Care), memerlukan waktu 5-6 jam / 24 jam</label>
      </div>
    </div>

    <label class="text-center">
      <p><b>PENILAIAN ACTIVITY OF DAILY LIVING (ADL) DENGAN INSTRUMENT INDEKS BATHEL MODIFIKASI</b></p>
    </label>
    <table class="table1 w-100 mb-3">
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
            <input type="radio" class="adl_skor" id="bab_0" name="adl[rangsang_bab]" value="0" {{ $adl_anak->rangsang_bab == 0 ? 'checked' : '' }}>
            <label for="bab_0">Tidak terkendali/tak teratur (perlu pencahar)</label>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>
            <input type="radio" class="adl_skor" id="bab_1" name="adl[rangsang_bab]" value="1" {{ $adl_anak->rangsang_bab == 1 ? 'checked' : '' }}>
            <label for="bab_1">Kadang-kadang tak terkendali (1 x / minggu)</label>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>
            <input type="radio" class="adl_skor" id="bab_2" name="adl[rangsang_bab]" value="2" {{ $adl_anak->rangsang_bab == 2 ? 'checked' : '' }}>
            <label for="bab_2">Terkendali teratur</label>
          </td>
        </tr>
        <tr>
          <td rowspan="3">2</td>
          <td rowspan="3">Mengendalikan rangsang BAK</td>
          <td>0</td>
          <td>
            <input type="radio" class="adl_skor" id="bak_0" name="adl[rangsang_bak]" value="0" {{ $adl_anak->rangsang_bak == 0 ? 'checked' : '' }}>
            <label for="bak_0">Tak terkendali atau pakai kateter</label>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>
            <input type="radio" class="adl_skor" id="bak_1" name="adl[rangsang_bak]" value="1" {{ $adl_anak->rangsang_bak == 1 ? 'checked' : '' }}>
            <label for="bak_1">Kadang-kadang tak terkendali (hanya 1 x / 24 jam)</label>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>
            <input type="radio" class="adl_skor" id="bak_2" name="adl[rangsang_bak]" value="2" {{ $adl_anak->rangsang_bak == 2 ? 'checked' : '' }}>
            <label for="bak_2">Mandiri</label>
          </td>
        </tr>
        <tr>
          <td rowspan="2">3</td>
          <td rowspan="2">Membersihkan diri (seka, sisir, sikat gigi)</td>
          <td>0</td>
          <td>
            <input type="radio" class="adl_skor" id="membersihkan_diri_0" name="adl[membersihkan_diri]" value="0" {{ $adl_anak->membersihkan_diri == 0 ? 'checked' : '' }}>
            <label for="membersihkan_diri_0">Butuh pertolongan orang lain</label>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>
            <input type="radio" class="adl_skor" id="membersihkan_diri_1" name="adl[membersihkan_diri]" value="1" {{ $adl_anak->membersihkan_diri == 1 ? 'checked' : '' }}>
            <label for="membersihkan_diri_1">Mandiri</label>
          </td>
        </tr>
        <tr>
          <td rowspan="3">4</td>
          <td rowspan="3">Penggunaan WC (in/out, lepas/pakai celana, siram)</td>
          <td>0</td>
          <td>
            <input type="radio" class="adl_skor" id="wc_0" name="adl[penggunaan_wc]" value="0" {{ $adl_anak->penggunaan_wc == 0 ? 'checked' : '' }}>
            <label for="wc_0">Tergantung pertolongan orang lain</label>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>
            <input type="radio" class="adl_skor" id="wc_1" name="adl[penggunaan_wc]" value="1" {{ $adl_anak->penggunaan_wc == 1 ? 'checked' : '' }}>
            <label for="wc_1">Perlu pertolongan pada beberapa kegiatan tetapi dapat mengerjakan sendiri beberapa kegiatan yang lain</label>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>
            <input type="radio" class="adl_skor" id="wc_2" name="adl[penggunaan_wc]" value="2" {{ $adl_anak->penggunaan_wc == 2 ? 'checked' : '' }}>
            <label for="wc_2">Mandiri</label>
          </td>
        </tr>
        <tr>
          <td rowspan="3">5</td>
          <td rowspan="3">Makan minum (jika makan harus berupa potongan, dianggap dibantu)</td>
          <td>0</td>
          <td>
            <input type="radio" class="adl_skor" id="makan_minum_0" name="adl[makan_minum]" value="0" {{ $adl_anak->makan_minum == 0 ? 'checked' : '' }}>
            <label for="makan_minum_0">Tidak mampu</label>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>
            <input type="radio" class="adl_skor" id="makan_minum_1" name="adl[makan_minum]" value="1" {{ $adl_anak->makan_minum == 1 ? 'checked' : '' }}>
            <label for="makan_minum_1">Perlu ditolong memotong makanan</label>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>
            <input type="radio" class="adl_skor" id="makan_minum_2" name="adl[makan_minum]" value="2" {{ $adl_anak->makan_minum == 2 ? 'checked' : '' }}>
            <label for="makan_minum_2">Mandiri</label>
          </td>
        </tr>
        <tr>
          <td rowspan="4">6</td>
          <td rowspan="4">Bergerak dari kursi roda ke tempat tidur dan sebaliknya (termasuk duduk di tempat tidur)</td>
          <td>0</td>
          <td>
            <input type="radio" class="adl_skor" id="bergerak_0" name="adl[bergerak_kursi_roda]" value="0" {{ $adl_anak->bergerak_kursi_roda == 0 ? 'checked' : '' }}>
            <label for="bergerak_0">Tidak mampu</label>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>
            <input type="radio" class="adl_skor" id="bergerak_1" name="adl[bergerak_kursi_roda]" value="1" {{ $adl_anak->bergerak_kursi_roda == 1 ? 'checked' : '' }}>
            <label for="bergerak_1">Perlu banyak bantuan untuk bisa duduk (2 orang)</label>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>
            <input type="radio" class="adl_skor" id="bergerak_2" name="adl[bergerak_kursi_roda]" value="2" {{ $adl_anak->bergerak_kursi_roda == 2 ? 'checked' : '' }}>
            <label for="bergerak_2">Bantuan minimal 1 orang</label>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td>
            <input type="radio" class="adl_skor" id="bergerak_3" name="adl[bergerak_kursi_roda]" value="3" {{ $adl_anak->bergerak_kursi_roda == 3 ? 'checked' : '' }}>
            <label for="bergerak_3">Mandiri</label>
          </td>
        </tr>
        <tr>
          <td rowspan="4">7</td>
          <td rowspan="4">Berjalan di tempat rata (atau jika tidak bisa berjalan, menjalankan kursi roda)</td>
          <td>0</td>
          <td>
            <input type="radio" class="adl_skor" id="berjalan_0" name="adl[berjalan]" value="0" {{ $adl_anak->berjalan == 0 ? 'checked' : '' }}>
            <label for="berjalan_0">Tidak mampu</label>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>
            <input type="radio" class="adl_skor" id="berjalan_1" name="adl[berjalan]" value="1" {{ $adl_anak->berjalan == 1 ? 'checked' : '' }}>
            <label for="berjalan_1">Bisa (pindah) dengan kursi roda</label>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>
            <input type="radio" class="adl_skor" id="berjalan_2" name="adl[berjalan]" value="2" {{ $adl_anak->berjalan == 2 ? 'checked' : '' }}>
            <label for="berjalan_2">Berjalan dengan bantuan 1 orang</label>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td>
            <input type="radio" class="adl_skor" id="berjalan_3" name="adl[berjalan]" value="3" {{ $adl_anak->berjalan == 3 ? 'checked' : '' }}>
            <label for="berjalan_3">Mandiri</label>
          </td>
        </tr>
        <tr>
          <td rowspan="3">8</td>
          <td rowspan="3">Berpakaian (termasuk memasang tali sepatu, mengencangkan sabuk)</td>
          <td>0</td>
          <td>
            <input type="radio" class="adl_skor" id="berpakaian_0" name="adl[berpakaian]" value="0" {{ $adl_anak->berpakaian == 0 ? 'checked' : '' }}>
            <label for="berpakaian_0">Tergantung orang lain</label>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>
            <input type="radio" class="adl_skor" id="berpakaian_1" name="adl[berpakaian]" value="1" {{ $adl_anak->berpakaian == 1 ? 'checked' : '' }}>
            <label for="berpakaian_1">Sebagian dibantu (mis: mengancing baju)</label>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>
            <input type="radio" class="adl_skor" id="berpakaian_2" name="adl[berpakaian]" value="2" {{ $adl_anak->berpakaian == 2 ? 'checked' : '' }}>
            <label for="berpakaian_2">Mandiri</label>
          </td>
        </tr>
        <tr>
          <td rowspan="3">9</td>
          <td rowspan="3">Naik turun tangga</td>
          <td>0</td>
          <td>
            <input type="radio" class="adl_skor" id="tangga_0" name="adl[tangga]" value="0" {{ $adl_anak->tangga == 0 ? 'checked' : '' }}>
            <label for="tangga_0">Tidak mampu</label>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>
            <input type="radio" class="adl_skor" id="tangga_1" name="adl[tangga]" value="1" {{ $adl_anak->tangga == 1 ? 'checked' : '' }}>
            <label for="tangga_1">Butuh pertolongan</label>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>
            <input type="radio" class="adl_skor" id="tangga_2" name="adl[tangga]" value="2" {{ $adl_anak->tangga == 2 ? 'checked' : '' }}>
            <label for="tangga_2">Mandiri</label>
          </td>
        </tr>
        <tr>
          <td rowspan="2">10</td>
          <td rowspan="2">Mandi</td>
          <td>0</td>
          <td>
            <input type="radio" class="adl_skor" id="mandi_0" name="adl[mandi]" value="0" {{ $adl_anak->mandi == 0 ? 'checked' : '' }}>
            <label for="mandi_0">Tergantung orang lain</label>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>
            <input type="radio" class="adl_skor" id="mandi_1" name="adl[mandi]" value="1" {{ $adl_anak->mandi == 1 ? 'checked' : '' }}>
            <label for="mandi_1">Mandiri</label>
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2">
            <label for="total_adl" class="mr-2">Total Skor ADL</label>
          </td>
          <td>
            <input type="text" id="total_adl_skor" class="form-control" name="adl[total_skor_adl]" value="{{ $adl_anak->total_skor_adl ?? '' }}" readonly style="width: 100px;">
          </td>
        </tr>
      </tfoot>
    </table>

    <h4><b>PENGKAJIAN KEBUTUHAN AKTIFITAS DAN ISTIRAHAT</b></h4>
    <div class="form-group row">
      <div class="col-sm-3">
        <label for="">Rentang Gerak (ROM)</label>
      </div>
      <div class="col-sm-9">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="rentang_gerak_aktif" name="awal[rentang_gerak]" value="1" {{ $assesment->rentang_gerak == 1 ? 'checked' : '' }}>
          <label class="custom-control-label" for="rentang_gerak_aktif">Aktif</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="rentang_gerak_pasif" name="awal[rentang_gerak]" value="0" {{ $assesment->rentang_gerak == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="rentang_gerak_pasif">Pasif</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="rentang_gerak_tidak_dapat_dinilai" name="awal[rentang_gerak]" value="2" {{ $assesment->rentang_gerak == 2 ? 'checked' : '' }}>
          <label class="custom-control-label" for="rentang_gerak_tidak_dapat_dinilai">Tidak dapat dinilai</label>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-3">
        <label for="">Deformitas</label>
      </div>
      <div class="col-sm-9">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="deformitas_tidak_ada" name="awal[deformitas]" value="0" {{ $assesment->deformitas == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="deformitas_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="deformitas_ada_regio" name="awal[deformitas]" value="1" {{ $assesment->deformitas == 1 ? 'checked' : '' }}>
          <label class="custom-control-label" for="deformitas_ada_regio">Ada regio</label>
        </div>
        <input type="text" class="form-control" name="awal[deformitas_ket]" placeholder="jika ada, jelaskan..." value="{{ $assesment->deformitas_ket ?? '' }}">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-3">
        <label for="">Gangguan Tidur</label>
      </div>
      <div class="col-sm-9">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="gangguan_tidur_tidak" name="awal[gangguan_tidur]" value="0" {{ $assesment->gangguan_tidur == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="gangguan_tidur_tidak">Tidak</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="gangguan_tidur_ya" name="awal[gangguan_tidur]" value="1" {{ $assesment->gangguan_tidur == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="gangguan_tidur_ya">Ya</label>
        </div>
        <input type="text" class="form-control" name="awal[gangguan_tidur_ket]" placeholder="jika ya, jelaskan..." value="{{ $assesment->gangguan_tidur_ket ?? '' }}">
      </div>
    </div>

    <h4 class="mt-3"><b>PENGKAJIAN KEBUTUHAN NUTRISI DAN CAIRAN</b></h4>
    <div class="form-group row">
      <div class="col-sm-2">
        <label for="">Keluhan</label>
      </div>
      <div class="col-sm-8">
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="keluhan_tidak_ada" name="awal[keluhan_nutrisi]" value="tidak_ada" {{ $assesment->keluhan_nutrisi == 'tidak_ada' ? 'checked' : '' }}>
          <label class="custom-control-label" for="keluhan_tidak_ada">Tidak ada</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="keluhan_mual_muntah" name="awal[keluhan_nutrisi]" value="mual_muntah" {{ $assesment->keluhan_nutrisi == 'mual_muntah' ? 'checked' : '' }}>
          <label class="custom-control-label" for="keluhan_mual_muntah">Mual / muntah</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="keluhan_gangguan_mengunyah" name="awal[keluhan_nutrisi]" value="gangguan_mengunyah" {{ $assesment->keluhan_nutrisi == 'gangguan_mengunyah' ? 'checked' : '' }}>
          <label class="custom-control-label" for="keluhan_gangguan_mengunyah">Gangguan mengunyah</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="keluhan_gangguan_menelan" name="awal[keluhan_nutrisi]" value="gangguan_menelan" {{ $assesment->keluhan_nutrisi == 'gangguan_menelan' ? 'checked' : '' }}>
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
          <input type="radio" class="custom-control-input" id="rasa_haus_berlebih_ya" name="awal[rasa_haus_berlebih]" value="1" {{ $assesment->rasa_haus_berlebih == 1 ? 'checked' : '' }}>
          <label class="custom-control-label" for="rasa_haus_berlebih_ya">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="rasa_haus_berlebih_tidak" name="awal[rasa_haus_berlebih]" value="0" {{ $assesment->rasa_haus_berlebih == 0 ? 'checked' : '' }}>
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
          <input type="radio" class="custom-control-input" id="mukosa_mulut_kering" name="awal[mukosa_mulut]" value="Kering" {{ $assesment->mukosa_mulut == 'Kering' ? 'checked' : '' }}>
          <label class="custom-control-label" for="mukosa_mulut_kering">Kering</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="mukosa_mulut_lembab" name="awal[mukosa_mulut]" value="Lembab" {{ $assesment->mukosa_mulut == 'Lembab' ? 'checked' : '' }}">
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
          <input type="radio" class="custom-control-input" id="turgor_kulit_elastis" name="awal[turgor_kulit]" value="Elastis" {{ $assesment->turgor_kulit == 'Elastis' ? 'checked' : '' }}>
          <label class="custom-control-label" for="turgor_kulit_elastis">Elastis</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="turgor_kulit_tidak_elastis" name="awal[turgor_kulit]" value="Tidak Elastis" {{ $assesment->turgor_kulit == 'Tidak Elastis' ? 'checked' : '' }}>
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
          <input type="radio" class="custom-control-input" id="endema_ya" name="awal[endema]" value="0" {{ $assesment->endema == 0 ? 'checked' : '' }}>
          <label class="custom-control-label" for="endema_ya">Ya</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" class="custom-control-input" id="endema_tidak" name="awal[endema]" value="1" {{ $assesment->endema == 1 ? 'checked' : '' }}>
          <label class="custom-control-label" for="endema_tidak">Tidak</label>
        </div>
      </div>
    </div>

    <hr>
    <div class="container mt-3">
      <button class="btn btn-primary" type="button" onclick="storeAssesmentAwalAnak()">Simpan</button>
    </div>

  </div>
</form>

<script>
  $('.skor_sad').change(function() {
    let total_skor = 0
    // Iterate over each radio button group
    $('.skor_sad:checked').each(function() {
      total_skor += parseInt($(this).val());
    });
    $('#total_skor_sad').val(total_skor);
  })

  $('.adl_skor').change(function() {
    let total_skor_adl = 0
    // Iterate over each radio button group
    $('.adl_skor:checked').each(function() {
      total_skor_adl += parseInt($(this).val());
    });
    $('#total_adl_skor').val(total_skor_adl);
  })
</script>