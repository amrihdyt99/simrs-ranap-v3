<label>*)Diisi Oleh Perawat</label><br />
<h3 class="bg-warning p-2">SIGN IN</h3>
<form id="cathlab_sign_in">
    <div class="form-group"><label>Pukul</label>
        <input type="time" class="form-control" name="cath_signin_pukul" value="{{$sign_in->cath_signin_pukul}}">
    </div>
    <ol>
        <li>
            <div class="row">
                <div class="col-lg-8">
                    Identifikasi pasien dengan minimal 2 identitas
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_identifikasi_Ya" type="radio" class="custom-control-input"
                            value="Ya" name="cath_signin_identifikasi" {{$sign_in->cath_signin_identifikasi=='Ya' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_identifikasi_Ya">Ya</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_identifikasi_Tidak" type="radio" class="custom-control-input"
                            value="Tidak" name="cath_signin_identifikasi" {{$sign_in->cath_signin_identifikasi=='Tidak' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_identifikasi_Tidak">Tidak</label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-lg-8">
                    Formulir persetujuan tindakan
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_persetujuan_Ya" type="radio" class="custom-control-input"
                            value="Ya" name="cath_signin_persetujuan" {{$sign_in->cath_signin_persetujuan=='Ya' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_persetujuan_Ya">Ya</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_persetujuan_Tidak" type="radio" class="custom-control-input"
                            value="Tidak" name="cath_signin_persetujuan" {{$sign_in->cath_signin_persetujuan=='Tidak' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_persetujuan_Tidak">Tidak</label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-lg-8">
                    Formulir persetujuan anastesi
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_anastesi_Ya" type="radio" class="custom-control-input" value="Ya"
                            name="cath_signin_anastesi" {{$sign_in->cath_signin_anastesi=='Ya' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_anastesi_Ya">Ya</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_anastesi_Tidak" type="radio" class="custom-control-input"
                            value="Tidak" name="cath_signin_anastesi" {{$sign_in->cath_signin_anastesi=='Tidak' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_anastesi_Tidak">Tidak</label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-lg-8">
                    Prosedur tindakan sesuai
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_prosedur_Ya" type="radio" class="custom-control-input" value="Ya"
                            name="cath_signin_prosedur" {{$sign_in->cath_signin_prosedur=='Ya' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_prosedur_Ya">Ya</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_prosedur_Tidak" type="radio" class="custom-control-input"
                            value="Tidak" name="cath_signin_prosedur" {{$sign_in->cath_signin_prosedur=='Tidak' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_prosedur_Tidak">Tidak</label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-lg-8">
                    Pasien sudah puasa 4/6/8 jam
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_puasa_Ya" type="radio" class="custom-control-input" value="Ya"
                            name="cath_signin_puasa" {{$sign_in->cath_signin_puasa=='Ya' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_puasa_Ya">Ya</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_puasa_Tidak" type="radio" class="custom-control-input" value="Tidak"
                            name="cath_signin_puasa" {{$sign_in->cath_signin_puasa=='Tidak' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_puasa_Tidak">Tidak</label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-lg-8">
                    Alergi <div class="form-group">
                        <label>Ya</label>
                        <input type="text" class="form-control" name="cath_signin_alergi_text" value="{{$sign_in->cath_signin_alergi_text}}">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_alergi_Ya" type="radio" class="custom-control-input" value="Ya"
                            name="cath_signin_alergi" {{$sign_in->cath_signin_alergi=='Ya' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_alergi_Ya">Ya</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_alergi_Tidak" type="radio" class="custom-control-input"
                            value="Tidak" name="cath_signin_alergi" {{$sign_in->cath_signin_alergi=='Tidak' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_alergi_Tidak">Tidak</label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-lg-8">
                    Pemberian antibiotik <div class="form-group">
                        <label>Ya</label>
                        <input type="text" class="form-control" name="cath_signin_antibiotik_text" value="{{$sign_in->cath_signin_antibiotik_text}}">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_antibiotik_Ya" type="radio" class="custom-control-input"
                            value="Ya" name="cath_signin_antibiotik" {{$sign_in->cath_signin_antibiotik=='Ya' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_antibiotik_Ya">Ya</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_antibiotik_Tidak" type="radio" class="custom-control-input"
                            value="Tidak" name="cath_signin_antibiotik" {{$sign_in->cath_signin_antibiotik=='Tidak' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_antibiotik_Tidak">Tidak</label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-lg-8">
                    Periksa Laboratorium
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>ureum</label>
                                <input type="text" class="form-control" name="cath_signin_ureum" value="{{$sign_in->cath_signin_ureum}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>creatinin</label>
                                <input type="text" class="form-control" name="cath_signin_creatinin" value="{{$sign_in->cath_signin_creatinin}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>pt</label>
                                <input type="text" class="form-control" name="cath_signin_pt" value="{{$sign_in->cath_signin_pt}}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>aptt</label>
                                <input type="text" class="form-control" name="cath_signin_aptt" value="{{$sign_in->cath_signin_aptt}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>lainnya</label>
                        <input type="text" class="form-control" name="cath_signin_lainnya" value="{{$sign_in->cath_signin_lainnya}}">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_laboratorium_Ya" type="radio" class="custom-control-input"
                            value="Ya" name="cath_signin_laboratorium" {{$sign_in->cath_signin_laboratorium=='Ya' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_laboratorium_Ya">Ya</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_laboratorium_Tidak" type="radio" class="custom-control-input"
                            value="Tidak" name="cath_signin_laboratorium" {{$sign_in->cath_signin_laboratorium=='Tidak' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_laboratorium_Tidak">Tidak</label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-lg-8">
                    Periksa EKG
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_ekg_Ya" type="radio" class="custom-control-input" value="Ya"
                            name="cath_signin_ekg" {{$sign_in->cath_signin_ekg=='Ya' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_ekg_Ya">Ya</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_ekg_Tidak" type="radio" class="custom-control-input" value="Tidak"
                            name="cath_signin_ekg" {{$sign_in->cath_signin_ekg=='Tidak' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_ekg_Tidak">Tidak</label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-lg-8">
                    Apakah pasien telah diinfus
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_infus_Ya" type="radio" class="custom-control-input" value="Ya"
                            name="cath_signin_infus" {{$sign_in->cath_signin_infus=='Ya' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_infus_Ya">Ya</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_infus_Tidak" type="radio" class="custom-control-input"
                            value="Tidak" name="cath_signin_infus" {{$sign_in->cath_signin_infus=='Tidak' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_infus_Tidak">Tidak</label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-lg-8">
                    Apakah pasien telah melepaskan gigi palus/lensa kontak
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_gigi_Ya" type="radio" class="custom-control-input" value="Ya"
                            name="cath_signin_gigi" {{$sign_in->cath_signin_gigi=='Ya' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_gigi_Ya">Ya</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_gigi_Tidak" type="radio" class="custom-control-input"
                            value="Tidak" name="cath_signin_gigi" {{$sign_in->cath_signin_gigi=='Tidak' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_gigi_Tidak">Tidak</label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-lg-8">
                    Mesin dan peralatan instrumen sudah siap digunakan
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_mesin_Ya" type="radio" class="custom-control-input" value="Ya"
                            name="cath_signin_mesin" {{$sign_in->cath_signin_mesin=='Ya' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_mesin_Ya">Ya</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_mesin_Tidak" type="radio" class="custom-control-input"
                            value="Tidak" name="cath_signin_mesin" {{$sign_in->cath_signin_mesin=='Tidak' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_mesin_Tidak">Tidak</label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-lg-8">
                    Alat dan bahan yang akan digunakan pada tindakan sudah lengkap
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_alat_Ya" type="radio" class="custom-control-input" value="Ya"
                            name="cath_signin_alat" {{$sign_in->cath_signin_alat=='Ya' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_alat_Ya">Ya</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signin_alat_Tidak" type="radio" class="custom-control-input"
                            value="Tidak" name="cath_signin_alat" {{$sign_in->cath_signin_alat=='Tidak' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signin_alat_Tidak">Tidak</label>
                    </div>
                </div>
            </div>
        </li>
    </ol>
    <hr>
    <div class="form-group">
        <label>Perawat Sirkuler</label>
        <input type="text" class="form-control" name="cath_signin_perawat" value="{{$sign_in->cath_signin_perawat}}">
    </div>
    <button type="button" id="btn_cathlab" class="btn btn-success float-left" onclick="simpanCathlabSignIn()">Simpan</button>
</form>
