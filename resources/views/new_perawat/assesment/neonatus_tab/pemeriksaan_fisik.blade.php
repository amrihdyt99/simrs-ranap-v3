@empty($fisik)
@php
$fisik = optional((object)[]);
@endphp
@endempty

<input type="hidden" class="form-control" name="reg_no" value="{{ $reg }}">
<input type="hidden" class="form-control" name="med_rec" value="{{ $medrec }}">
<div class="form-group row ">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Riwayat Penyakit Ibu</label>
  <div class="input-group col-sm-8">
    <input id="darah" type="text" class="form-control" name="fisik[riwayat_penyakit_ibu]" value="{{ $fisik->riwayat_penyakit_ibu }}">
  </div>
</div>
<div class="header mb-3">
  <h4><b>Pemeriksaan Fisik Umum</b></h4>
</div>
<div class="form-group row ">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Jenis Kelamin</label>
  <div class="input-group col-sm-8">
    <input id="asper_sex" type="text" class="form-control" name="fisik[jenis_kelamin]" value="{{ $fisik->jenis_kelamin }}">
  </div>
</div>
<div class="form-group row ">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Berat Badan</label>
  <div class="input-group col-sm-8">
    <input id="asper_weight" type="number" class="form-control" name="fisik[berat_fisik]" value="{{ $fisik->berat_fisik }}">
  </div>
</div>
<div class="form-group row ">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Panjang Badan</label>
  <div class="input-group col-sm-8">
    <input id="asper_height" type="number" class="form-control" name="fisik[panjang_fisik]" value="{{ $fisik->panjang_fisik }}">
  </div>
</div>
<div class="form-group row ">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Lingkar Kepala</label>
  <div class="input-group col-sm-8">
    <input id="asper_lingkar_kepala" type="number" class="form-control" name="fisik[lingkar_kepala]" value="{{ $fisik->lingkar_kepala }}">
  </div>
</div>
<div class="form-group row ">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Lingkar Perut</label>
  <div class="input-group col-sm-8">
    <input id="asper_lingkar_perut" type="number" class="form-control" name="fisik[lingkar_perut]" value="{{ $fisik->lingkar_perut }}">
  </div>
</div>
<div class="form-group">
  <div class="row">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Aktifitas</legend>
    <div class="col-sm-10">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="aktif_aktivitas" value="Aktif" name="fisik[aktifitas]" {{ $fisik->aktifitas=='Aktif' ? 'checked' : '' }}>
        <label class="custom-control-label" for="aktif_aktivitas">Aktif</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="hipoaktif" value="Hipoaktif" name="fisik[aktifitas]" {{ $fisik->aktifitas=='Hipoaktif' ? 'checked' : '' }}>
        <label class="custom-control-label" for="hipoaktif">Hipoaktif</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="latergi" value="Latergi" name="fisik[aktifitas]" {{ $fisik->aktifitas=='Latergi' ? 'checked' : '' }}>
        <label class="custom-control-label" for="latergi">Latergi</label>
      </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Tangis</legend>
    <div class="col-sm-10">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="kuat_tangis" value="Kuat" name="fisik[tangis]" {{ $fisik->tangis=='Kuat' ? 'checked' : '' }}>
        <label class="custom-control-label" for="kuat_tangis">Kuat</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="sesak_tangis" value="Sedang" name="fisik[tangis]" {{ $fisik->tangis=='Sedang' ? 'checked' : '' }}>
        <label class="custom-control-label" for="sesak_tangis">Sedang</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="lemah_tangis" value="Lemah" name="fisik[tangis]" {{ $fisik->tangis=='Lemah' ? 'checked' : '' }}>
        <label class="custom-control-label" for="lemah_tangis">Lemah</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="merintih_tangis" value="Merintih" name="fisik[tangis]" {{ $fisik->tangis=='Merintih' ? 'checked' : '' }}>
        <label class="custom-control-label" for="merintih_tangis">Merintih</label>
      </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Refleks Hisap</legend>
    <div class="col-sm-10">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="kuat_reflek" value="Kuat" name="fisik[refleks_hisap]" {{ $fisik->refleks_hisap=='Kuat' ? 'checked' : '' }}>
        <label class="custom-control-label" for="kuat_reflek">Kuat</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="sesak_reflek" value="Sedang" name="fisik[refleks_hisap]" {{ $fisik->refleks_hisap=='Sedang' ? 'checked' : '' }}>
        <label class="custom-control-label" for="sesak_reflek">Sedang</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="lemah_reflek" value="Lemah" name="fisik[refleks_hisap]" {{ $fisik->refleks_hisap=='Lemah' ? 'checked' : '' }}>
        <label class="custom-control-label" for="lemah_reflek">Lemah</label>
      </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Anemia</legend>
    <div class="col-sm-10">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="positif_anemia" value="Positif" name="fisik[anemia]" {{ $fisik->anemia=='Positif' ? 'checked' : '' }}>
        <label class="custom-control-label" for="positif_anemia">Positif</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="negatif" value="Negatif" name="fisik[anemia]" {{ $fisik->anemia=='Negatif' ? 'checked' : '' }}>
        <label class="custom-control-label" for="negatif">Negatif</label>
      </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Ikterus</legend>
    <div class="col-sm-10">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="positif_ikterus" value="Positif" name="fisik[ikterus]" {{ $fisik->ikterus=='Positif' ? 'checked' : '' }}>
        <label class="custom-control-label" for="positif_ikterus">Positif</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="negatif_ikterus" value="Negatif" name="fisik[ikterus]" {{ $fisik->ikterus=='Positif' ? 'checked' : '' }}>
        <label class="custom-control-label" for="negatif_ikterus">Negatif</label>
      </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Sianosis</legend>
    <div class="col-sm-10">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="positif_sianosis" value="Positif" name="fisik[sianosis]" {{ $fisik->sianosis=='Positif' ? 'checked' : '' }}>
        <label class="custom-control-label" for="positif_sianosis">Positif</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="negatif_sianosis" value="Negatif" name="fisik[sianosis]" {{ $fisik->sianosis=='Positif' ? 'checked' : '' }}>
        <label class="custom-control-label" for="negatif_sianosis">Negatif</label>
      </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="row">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Dispnoe</legend>
    <div class="col-sm-10">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="positif_dispnoe" value="Positif" name="fisik[dispnoe]" {{ $fisik->dispnoe=='Positif' ? 'checked' : '' }}>
        <label class="custom-control-label" for="positif_dispnoe">Positif</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="negatif_dispnoe" value="Negatif" name="fisik[dispnoe]" {{ $fisik->dispnoe=='Negatif' ? 'checked' : '' }}>
        <label class="custom-control-label" for="negatif_dispnoe">Negatif</label>
      </div>
    </div>
  </div>
</div>
<div class="form-group row ">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Denyut Jantung</label>
  <div class="input-group col-sm-8">
    <input id="asper_denyut_jantung" type="string" class="form-control" name="fisik[denyut_jantung]" value="{{ $fisik->denyut_jantung }}">
  </div>
</div>
<div class="form-group row ">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Pernafasan</label>
  <div class="input-group col-sm-8">
    <input id="asper_pernafasan" type="string" class="form-control" name="fisik[pernafasan]" value="{{ $fisik->pernafasan }}">
  </div>
</div>
<div class="form-group row ">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Temperatur</label>
  <div class="input-group col-sm-8">
    <input id="asper_temperatur" type="number" class="form-control" name="fisik[temperatur]" value="{{ $fisik->temperatur }}">
  </div>
</div>

<div class="header mb-3">
  <h4><b>Keadaan Spesifik</b></h4>
</div>
<div class="form-group">
  <div class="row">
    <label class="col-form-label col-sm-4 ptx-0 pt-1">Kepala</label>
    <div class="col-sm-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="asper_kepala_caput" value="Kuat" name="fisik[spesifik_kepala]" {{ $fisik->spesifik_kepala=='Kuat' ? 'checked' : '' }}>
        <label class="custom-control-label" for="asper_kepala_caput">Caput Succedaneum</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="asper_kepala_chepal" value="Sedang" name="fisik[spesifik_kepala]" {{ $fisik->spesifik_kepala=='Sedang' ? 'checked' : '' }}>
        <label class="custom-control-label" for="asper_kepala_chepal">Chepal Hematoma</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" class="custom-control-input" id="lainnya_kepala" value="Lainnya" name="fisik[spesifik_kepala]" {{ $fisik->spesifik_kepala=='Lainnya' ? 'checked' : '' }}>
        <label class="custom-control-label" for="lainnya_kepala">Lainnya</label>
      </div>
      <input id="asper_pernafasan" type="text" class="form-control" name="fisik[spesifik_kepala_ket]" value="{{ $fisik->spesifik_kepala_ket }}" placeholder="Lainnya...">
    </div>
  </div>
</div>
<div class="form-group row ">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Leher</label>
  <div class="input-group col-sm-8 mt-2">
    <input id="asper_khusus_leher" type="text" class="form-control" name="fisik[spesifik_leher]" value="{{ $fisik->spesifik_leher }}">
  </div>
</div>
<div class="form-group row ">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Thoraks</label>
  <div class="input-group col-sm-8">
    <input id="asper_khusus_thoraks" type="text" class="form-control" name="fisik[spesifik_thoraks]" value="{{ $fisik->spesifik_thoraks }}">
  </div>
</div>
<div class="form-group row ">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Abdomen</label>
  <div class="input-group col-sm-8">
    <input id="asper_khusus_abdomen" type="text" class="form-control" name="fisik[spesifik_abdomen]" value="{{ $fisik->spesifik_abdomen }}">
  </div>
</div>
<div class="form-group row ">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Ekstremitas</label>
  <div class="input-group col-sm-8">
    <input id="asper_khusus_ekstremitas" type="text" class="form-control" name="fisik[spesifik_ekstremitas]" value="{{ $fisik->spesifik_ekstremitas }}">
  </div>
</div>
<div class="row ">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Urogenital :</label>
</div>
<div class="form-group row ml-4">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Anus</label>
  <div class="input-group col-sm-8">
    <input id="asper_khusus_anus" type="text" class="form-control" name="fisik[spesifik_anus]" value="{{ $fisik->spesifik_anus }}">
  </div>
</div>
<div class="form-group row ml-4">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Genitalia</label>
  <div class="input-group col-sm-8">
    <input id="asper_khusus_genitalia" type="text" class="form-control" name="fisik[spesifik_genitalia]" value="{{ $fisik->spesifik_genitalia }}">
  </div>
</div>
<div class="form-group row ">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Pemeriksaan Penunjang Pre Rawat Inap</label>
  <div class="input-group col-sm-8">
    <textarea class="form-control" id="asper_periksa_penunjang" name="fisik[spesifik_penunjang]" rows="3">{{ $fisik->spesifik_penunjang }}</textarea>
  </div>
</div>
<div class="form-group row ">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Daftar Masalah / Diagnosis Medik</label>
  <div class="input-group col-sm-8">
    <textarea class="form-control" id="asper_daftar_masalah" name="fisik[spesifik_daftar_masalah]" rows="3">{{ $fisik->spesifik_daftar_masalah }}</textarea>
  </div>
</div>
<div class="form-group row ">
  <label for="inputPassword3" class="col-sm-4 col-form-label">Tata Laksana Awal</label>
  <div class="input-group col-sm-8">
    <textarea class="form-control" id="asper_tata_laksana" name="fisik[spesifik_tata_laksana]" rows="3">{{ $fisik->spesifik_tata_laksana }}</textarea>
  </div>
</div>