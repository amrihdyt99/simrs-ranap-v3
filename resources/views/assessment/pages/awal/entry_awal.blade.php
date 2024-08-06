
@extends('register.layouts.app')

@section('content')
<form id="form-entry-assesment">
    @csrf
   {{-- <input type="hidden" name="asdok_reg" value="{{$reg->reg_no}}">
    <input type="hidden" name="asdok_poli" value="{{$reg->reg_poli}}">--}}
    <fieldset class="form-group">
        <label for="exampleFormControlTextarea1">Anamnesis</label>
        <div class="row">
            <div class="col">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="ortu" name="asdok_amnesis" value="Orang tua">
                    <label class="custom-control-label" for="ortu" >Orang Tua</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="pasien" name="asdok_amnesis" value="Pasien" >
                    <label class="custom-control-label" for="pasien">Pasien</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="lainnya" name="asdok_amnesis" value="orang lain hubungan dengan pasien">
                    <label class="custom-control-label" for="lainnya">orang lain hubungan dengan pasien</label>
                </div>
            </div>
        </div>
        <div class="form-group row mt-2">
            <div class="col">
                <input id="amnesis_lain" type="text" class="form-control" name="asdok_amnesis_lain">
            </div>
        </div>
    </fieldset>
    <div class="form-group">
        <label for="keluhan_utama">Keluhan Utama</label>
        <textarea class="form-control"  id="keluhan_utama" rows="3" name="asdok_keluhan_utama"></textarea>
    </div>
    <div class="form-group">
        <label for="riwayat_penyakit_sekarang">Riwayat Penyakit Sekarang</label>
        <textarea class="form-control" id="riwayat_penyakit_sekarang" rows="3" name="asdok_penyakit_sekarang"></textarea>
    </div>
    <fieldset class="form-group">
        <label>Riwayat Penyakit Dahulu</label>
        <div class="row">
            <div class="col">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="pnyakit_dulu_tidak" name="asdok_penyakit_dahulu" value="Tidak">
                    <label class="custom-control-label" for="pnyakit_dulu_tidak" >Tidak</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="pnyakit_dulu_ya" name="asdok_penyakit_dahulu" value="Ya" >
                    <label class="custom-control-label" for="pnyakit_dulu_ya">Ya</label>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="form-group row">
        <div class="col-sm-12">
            <input id="asdok_penyakit_dahulu_ket" rows="3" class="form-control" name="asdok_penyakit_dahulu_ket">
        </div>
    </div>

    <fieldset class="form-group">
        <label>Riwayat Pengobatan</label>
        <div class="row">
            <div class="col">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="pengobatan_tidak" name="asdok_pengobatan" value="Tidak">
                    <label class="custom-control-label" for="pengobatan_tidak" >Tidak</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="pengobatan_ya" name="asdok_pengobatan" value="Ya" >
                    <label class="custom-control-label" for="pengobatan_ya">Ya</label>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="form-group row">
        <div class="col-sm-12">
            <input id="asdok_pengobatan_ket" rows="3" class="form-control" name="asdok_pengobatan_ket">
        </div>
    </div>

    <fieldset class="form-group">
        <label>Alat Implant</label>
        <div class="row">
            <div class="col">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="implant_tidak" name="asdok_implant" value="Tidak">
                    <label class="custom-control-label" for="implant_tidak" >Tidak</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="implant_ya" name="asdok_implant" value="Ya" >
                    <label class="custom-control-label" for="implant_ya">Ya</label>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="form-group row">
        <div class="col-sm-12">
            <input id="implant_lain" type="text" class="form-control" name="asdok_implant_lain">
        </div>
    </div>
    <fieldset class="form-group">
        <label>Riwayat penyakit Dalam Keluarga(Menular)</label>
        <div class="row">
            <div class="col">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="pengobatan_keluarga_tidak" name="asdok_penyakit_dlm_klrg" value="Tidak">
                    <label class="custom-control-label" for="pengobatan_keluarga_tidak" >Tidak</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="pengobatan_keluarga_ya" name="asdok_penyakit_dlm_klrg" value="Ya" >
                    <label class="custom-control-label" for="pengobatan_keluarga_ya">Ya</label>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="form-group row">
        <div class="col-sm-12">
            <input id="asdok_penyakit_dlm_klrg_ket" rows="3" class="form-control" name="asdok_penyakit_dlm_klrg_ket">
        </div>
    </div>

    <div class="form-group">
        <label for="multi_organ">Pemeriksaan organ yang terkait dengan keluhan saat ini</label>
        <textarea class="form-control" id="multi_organ" rows="3" name="asdok_penyakit_multiorgan"></textarea>
    </div>
    <div class="form-group">
        <label for="diagnosis_medik">Daftar Masalah / Diagnosis Medik</label>
        <textarea class="form-control" id="diagnosis_medik" rows="3" name="asdok_diagnosis_medik"></textarea>
    </div>
    <div class="form-group">
        <label for="instruksi_awal">Instruksi Awal</label>
        <textarea class="form-control" id="instruksi_awal" rows="3" name="asdok_instruksi_awal"></textarea>
    </div>
    <fieldset class="form-group">
        <label for="exampleFormControlTextarea1">Kontrol Ulang</label>
        <div class="row">
            <div class="col-sm-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="kontrol-ya" value="Ya" name="asdok_kontrol_ulang" >
                    <label class="custom-control-label" for="kontrol-ya">Ya</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="kontrol_tidak" value="Tidak" name="asdok_kontrol_ulang" >
                    <label class="custom-control-label" for="kontrol_tidak">Tidak</label>
                </div>
            </div>
        </div>
    </fieldset>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <input placeholder="Select date" type="date" id="tanggal_kontrol" class="form-control" name="asdok_kontrol_ulang_tgl" value="">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Masuk Rawat Inap</label>
        <div class="row">
            <div class="col-sm-10">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="inap-ya" value="Ya" name="asdok_rawat_inap">
                    <label class="custom-control-label" for="inap-ya">Ya</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="inap_tidak" value="Tidak" name="asdok_rawat_inap">
                    <label class="custom-control-label" for="inap_tidak">Tidak</label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-12">
                <input type="date" id="ruang" class="form-control" name="asdok_rawat_inap_ket">
            </div>
        </div>
    </div>
    <div class="form-group" style="text-align:right">
        <button type="button"  class="btn btn-success" onclick="storeDoctor('assesment', '#form-entry-assesment')">Simpan</button>
    </div>

</form>
    @endsection
