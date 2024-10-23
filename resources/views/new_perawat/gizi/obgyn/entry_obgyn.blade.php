@empty($assesment_gizi_dewasa)
@php
   $assesment_gizi_dewasa = optional((object)[]);
@endphp
@endempty
<h4><b>ANTROPOMETRI DEWASA</b></h4>
<input type="hidden" name="dewasa_reg" value="{{$reg}}">
<div class="form-group row">
    <div class="col-lg-3">
        <label for="">BB (Kg)</label>
        <input type="number" name="dewasa_bb" value="{{$assesment_gizi_dewasa->dewasa_bb}}" class="form-control" placeholder="BB">
    </div>
    <div class="col-lg-3">
        <label for="">BBI (cm)</label>
        <input type="number" name="bbi" value="{{$assesment_gizi_dewasa->bbi}}" class="form-control" placeholder="BBI">
    </div>
    <div class="col-lg-3">
        <label for="">TL (cm)</label>
        <input type="number" name="dewasa_tl" value="{{$assesment_gizi_dewasa->dewasa_tl}}" class="form-control" placeholder="TL">
    </div>
    <div class="col-lg-3">
        <label for="">LLA (cm)</label>
        <input type="number" name="dewasa_lla" value="{{$assesment_gizi_dewasa->dewasa_lla}}" class="form-control" placeholder="LLA">
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-3">
        <label for="">TB (cm)</label>
        <input type="number" name="dewasa_tb" value="{{$assesment_gizi_dewasa->dewasa_tb}}" class="form-control" placeholder="TB">
    </div>
    <div class="col-lg-3">
        <label for="">IMT (kg/m)</label>
        <input type="number" name="dewasa_imt" value="{{$assesment_gizi_dewasa->dewasa_imt}}" class="form-control" placeholder="IMT">
    </div>
    <div class="col-lg-3">
        <label for="">%LLA</label>
        <input type="number" name="dewasa_lla_lainnya" value="{{$assesment_gizi_dewasa->dewasa_lla_lainnya}}" class="form-control" placeholder="%LLA">
    </div>
    <div class="col-lg-3">
        <label for="">LILA(CM)</label>
        <input type="number" name="dewasa_lila" value="" class="form-control" placeholder="LILA(CM)">
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-3">
        <label for="">Status Gizi</label>
        <input type="text" name="dewasa_status_gizi" value="" class="form-control" placeholder="Status Gizi">
        </div>
    </div>
</div>

<div class="row">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1 text-left"><b>A. BIOKIMIA</b></legend>
    <div class="col-sm-8">
        <input id="dewasa_biokimia" type="text" class="form-control" value="{{$assesment_gizi_dewasa->dewasa_biokimia}}" name="dewasa_biokimia" placeholder="Masukkan hasil biokimia">
    </div>
</div>
<div class="row mt-2">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1 text-left"><b>B. FISIK - KLINIK</b></legend>
    <div class="col-sm-8">
        <input id="dewasa_fisik" type="text" class="form-control" value="{{$assesment_gizi_dewasa->dewasa_fisik}}" name="dewasa_fisik" placeholder="Masukkan hasil fisik klinik">
    </div>
</div>

<h6><b>C. RIWAYAT GIZI</b></h6>
<div class="row mt-3">
    <legend class="col-form-label col-sm-12 pt-0">Dahulu : </legend>
    <div class="col-sm-3">
        @php
        $dewasa_riwayat_dahulu=json_decode($assesment_gizi_dewasa->dewasa_riwayat_dahulu)??[];
        @endphp
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Tidak ada alergi makanan" type="checkbox" class="custom-control-input" id="Tidak ada alergi makanan" value="Tidak ada alergi makanan" {{in_array('Tidak ada alergi makanan',$dewasa_riwayat_dahulu) ? 'checked' : ''}} name="dewasa_riwayat_dahulu[]" >
            <label class="custom-control-label" for="Tidak ada alergi makanan">Tidak ada alergi makanan</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Pola makan teratur" type="checkbox" class="custom-control-input" id="Pola makan teratur" value="Pola makan teratur" {{in_array('Pola makan teratur',$dewasa_riwayat_dahulu) ? 'checked' : ''}} name="dewasa_riwayat_dahulu[]" >
            <label class="custom-control-label" for="Pola makan teratur">Pola makan teratur</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Susunan menu seimbang" type="checkbox" class="custom-control-input" id="Susunan menu seimbang" value="Susunan menu seimbang" {{in_array('Susunan menu seimbang',$dewasa_riwayat_dahulu) ? 'checked' : ''}} name="dewasa_riwayat_dahulu[]" >
            <label class="custom-control-label" for="Susunan menu seimbang">Susunan menu seimbang</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Diberikan ASI" type="checkbox" class="custom-control-input" id="Diberikan ASI" value="Diberikan ASI" {{in_array('Diberikan ASI',$dewasa_riwayat_dahulu) ? 'checked' : ''}} name="dewasa_riwayat_dahulu[]" >
            <label class="custom-control-label" for="Diberikan ASI">Diberikan ASI</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Ada alergi makanan" type="checkbox" class="custom-control-input" id="Ada alergi makanan" value="Ada alergi makanan" {{in_array('Ada alergi makanan',$dewasa_riwayat_dahulu) ? 'checked' : ''}} name="dewasa_riwayat_dahulu[]" >
            <label class="custom-control-label" for="Ada alergi makanan">Ada alergi makanan</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Susunan menu tidak seimbang" type="checkbox" class="custom-control-input" id="Susunan menu tidak seimbang" value="Susunan menu tidak seimbang" {{in_array('Susunan menu tidak seimbang',$dewasa_riwayat_dahulu) ? 'checked' : ''}} name="dewasa_riwayat_dahulu[]" >
            <label class="custom-control-label" for="Susunan menu tidak seimbang">Susunan menu tidak seimbang</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Tidak diberikan ASI" type="checkbox" class="custom-control-input" id="Tidak diberikan ASI" value="Tidak diberikan ASI" {{in_array('Tidak diberikan ASI',$dewasa_riwayat_dahulu) ? 'checked' : ''}} name="dewasa_riwayat_dahulu[]" >
            <label class="custom-control-label" for="Tidak diberikan ASI">Tidak diberikan ASI</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Lain-lain" type="checkbox" class="custom-control-input" id="Lain-lain" value="Lain-lain" {{in_array('Lain-lain',$dewasa_riwayat_dahulu) ? 'checked' : ''}} name="dewasa_riwayat_dahulu[]" >
            <label class="custom-control-label" for="Lain-lain">Lain-lain</label>
        </div>
    </div>
</div>
<div class="row mt-3">
    <legend class="col-form-label col-sm-12 pt-0">Sekarang, nafus makan : </legend>
    <div class="col-sm-3">
        @php
        $dewasa_riwayat_sekarang=json_decode($assesment_gizi_dewasa->dewasa_riwayat_sekarang)??[];
        @endphp
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Baik" type="checkbox" class="custom-control-input" id="Baik" value="Baik" {{in_array('Baik',$dewasa_riwayat_sekarang) ? 'checked' : ''}} name="dewasa_riwayat_sekarang[]" >
            <label class="custom-control-label" for="Baik">Baik</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Kurang" type="checkbox" class="custom-control-input" id="Kurang" value="Kurang" {{in_array('Kurang',$dewasa_riwayat_sekarang) ? 'checked' : ''}} name="dewasa_riwayat_sekarang[]" >
            <label class="custom-control-label" for="Kurang">Kurang</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Sulit menelan" type="checkbox" class="custom-control-input" id="Sulit menelan" value="Sulit menelan" {{in_array('Sulit menelan',$dewasa_riwayat_sekarang) ? 'checked' : ''}} name="dewasa_riwayat_sekarang[]" >
            <label class="custom-control-label" for="Sulit menelan">Sulit menelan</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Sulit mengunyah" type="checkbox" class="custom-control-input" id="Sulit mengunyah" value="Sulit mengunyah" {{in_array('Sulit mengunyah',$dewasa_riwayat_sekarang) ? 'checked' : ''}} name="dewasa_riwayat_sekarang[]" >
            <label class="custom-control-label" for="Sulit mengunyah">Sulit mengunyah</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Mual" type="checkbox" class="custom-control-input" id="Mual" value="Mual" {{in_array('Mual',$dewasa_riwayat_sekarang) ? 'checked' : ''}} name="dewasa_riwayat_sekarang[]" >
            <label class="custom-control-label" for="Mual">Mual</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Muntah" type="checkbox" class="custom-control-input" id="Muntah" value="Muntah" {{in_array('Muntah',$dewasa_riwayat_sekarang) ? 'checked' : ''}} name="dewasa_riwayat_sekarang[]" >
            <label class="custom-control-label" for="Muntah">Muntah</label>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-3">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Panenteral" type="checkbox" class="custom-control-input" id="Panenteral" value="Panenteral" name="dewasa_panenteral" >
            <label class="custom-control-label" for="Panenteral">Panenteral, berupa </label>
        </div>
    </div>
    <div class="col-lg-9">
        <input type="text" name="dewasa_panenteral_lainnya" class="form-control" value="{{$assesment_gizi_dewasa->dewasa_panenteral_lainnya}}">
    </div>
</div>
<div class="row mt-3">
    <div class="col-sm-3">
        @php
        $dewasa_sekarang_lainnya=json_decode($assesment_gizi_dewasa->dewasa_sekarang_lainnya)??[];
        @endphp
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Enteral" type="checkbox" class="custom-control-input" id="Enteral" value="Enteral" {{in_array('Enteral',$dewasa_sekarang_lainnya) ? 'checked' : ''}} name="dewasa_sekarang_lainnya[]" >
            <label class="custom-control-label" for="Enteral">Enteral</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Oral" type="checkbox" class="custom-control-input" id="Oral" value="Oral" {{in_array('Oral',$dewasa_sekarang_lainnya) ? 'checked' : ''}} name="dewasa_sekarang_lainnya[]" >
            <label class="custom-control-label" for="Oral">Oral</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="NGT" type="checkbox" class="custom-control-input" id="NGT" value="NGT" {{in_array('NGT',$dewasa_sekarang_lainnya) ? 'checked' : ''}} name="dewasa_sekarang_lainnya[]" >
            <label class="custom-control-label" for="NGT">NGT</label>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Lain-lain2" type="checkbox" class="custom-control-input" id="Lain-lain2" value="Lain-lain" {{in_array('Lain-lain',$dewasa_sekarang_lainnya) ? 'checked' : ''}} name="dewasa_sekarang_lainnya[]" >
            <label class="custom-control-label" for="Lain-lain2">Lain-lain, berupa </label>
            <input type="text" class="form-control" name="dewasa_lain_lain" value="{{$assesment_gizi_dewasa->dewasa_lain_lain}}">
        </div>
    </div>
</div>

<h6 class="mt-3"><b>D. RIWAYAT PERSONAL</b></h6>
<div class="row mt-3">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Riwayat penyakit dahulu</legend>
    <div class="col-sm-2">
        @php
        $dewasa_penyakit_dahulu=json_decode($assesment_gizi_dewasa->dewasa_penyakit_dahulu)??[];
        @endphp
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Hipertensi" type="checkbox" class="custom-control-input" id="Hipertensi" value="Hipertensi" {{in_array('Hipertensi',$dewasa_penyakit_dahulu) ? 'checked' : ''}} name="dewasa_penyakit_dahulu[]" >
            <label class="custom-control-label" for="Hipertensi">Hipertensi</label>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="DM" type="checkbox" class="custom-control-input" id="DM" value="DM" name="dewasa_penyakit_dahulu[]" {{in_array('DM',$dewasa_penyakit_dahulu) ? 'checked' : ''}}>
            <label class="custom-control-label" for="DM">DM</label>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Jantung" type="checkbox" class="custom-control-input" id="Jantung" value="Jantung" name="dewasa_penyakit_dahulu[]" {{in_array('Jantung',$dewasa_penyakit_dahulu) ? 'checked' : ''}} >
            <label class="custom-control-label" for="Jantung">Jantung</label>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Stroke" type="checkbox" class="custom-control-input" id="Stroke" value="Stroke" name="dewasa_penyakit_dahulu[]" {{in_array('Stroke',$dewasa_penyakit_dahulu) ? 'checked' : ''}} >
            <label class="custom-control-label" for="Stroke">Stroke</label>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Lain-lain3" type="checkbox" class="custom-control-input" id="Lain-lain3" value="Lain-lain" name="dewasa_penyakit_dahulu[]" {{in_array('Lain-lain',$dewasa_penyakit_dahulu) ? 'checked' : ''}} >
            <label class="custom-control-label" for="Lain-lain3">Lain-lain</label>
            <input type="text" name="dewasa_penyakit_dahulu_lainnya" class="form-control" value="{{$assesment_gizi_dewasa->dewasa_penyakit_dahulu_lainnya}}">
        </div>
    </div>
</div>
<div class="row mt-3">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Riwayat penyakit sekarang</legend>
    <div class="col-sm-10">
        <div class="form-group">
            <input type="text" name="dewasa_penyakit_sekarang" class="form-control" value="{{$assesment_gizi_dewasa->dewasa_penyakit_sekarang}}">
        </div>
    </div>
</div>
<div class="row mt-3">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Diet</legend>
    <div class="col-sm-10">
        <div class="form-group">
            <input type="text" name="dewasa_diet" class="form-control" value="{{$assesment_gizi_dewasa->dewasa_diet}}">
        </div>
    </div>
</div>
<div class="row mt-3">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Preskripsi</legend>
    <div class="col-sm-10">
        <div class="form-group">
            <input type="text" name="dewasa_diet_preskripsi" class="form-control" value="{{$assesment_gizi_dewasa->dewasa_diet_preskripsi}}">
        </div>
    </div>
</div>
<div class="row mt-3">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Tindak lanjut</legend>
    <div class="col-sm-2">
        @php
        $dewasa_tindak_lanjut=json_decode($assesment_gizi_dewasa->dewasa_tindak_lanjut)??[];
        @endphp
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Edukasi gizi" type="checkbox" class="custom-control-input" id="Edukasi gizi" value="Edukasi gizi" {{in_array('Edukasi gizi',$dewasa_tindak_lanjut) ? 'checked' : ''}} name="dewasa_tindak_lanjut[]" >
            <label class="custom-control-label" for="Edukasi gizi">Edukasi gizi</label>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Asuhan Gizi" type="checkbox" class="custom-control-input" id="Asuhan Gizi" value="Asuhan Gizi" {{in_array('Asuhan Gizi',$dewasa_tindak_lanjut) ? 'checked' : ''}} name="dewasa_tindak_lanjut[]" >
            <label class="custom-control-label" for="Asuhan Gizi">Asuhan Gizi : tidak diisi jika hasil skrinning gizi kategori resiko malnutrisi rendah</label>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="custom-control custom-checkbox custom-control-inline">
            <input id="Konseling gizi" type="checkbox" class="custom-control-input" id="Konseling gizi" value="Konseling gizi" {{in_array('Konseling gizi',$dewasa_tindak_lanjut) ? 'checked' : ''}} name="dewasa_tindak_lanjut[]" >
            <label class="custom-control-label" for="Konseling gizi">Konseling gizi</label>
        </div>
    </div>
</div>
<div class="float-right mt-5">
    <button type="button" class="btn btn-success" id="save_asesmen_gizi">Simpan</button>
</div>

