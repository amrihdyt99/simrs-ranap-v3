<h3 class="bg-warning p-2">SIGN OUT</h3>
<form id="cathlab_sign_out">
    <div class="form-group">
        <label>Pukul</label>
        <input type="time" class="form-control" name="cath_signout_pukul" value="{{$sign_out->cath_signout_pukul}}">
    </div>
    <ol>
        <li>
            <div class="form-group">
                <label>Tindakan yang dilakukan</label>
                <input type="text" class="form-control" name="cath_signout_tindakan" value="{{$sign_out->cath_signout_tindakan}}">
            </div>
        </li>
        <li>
            <div class="form-group">
                <label>Implan yang terpasang</label>
                <input type="text" class="form-control" name="cath_signout_implan"  value="{{$sign_out->cath_signout_implan}}">
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-lg-8">
                    Pengecekan alat dan instrumen
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signout_alat_Ya" type="radio" class="custom-control-input" value="Ya"
                            name="cath_signout_alat" {{$sign_out->cath_signout_alat=='Ya' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signout_alat_Ya">Ya</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signout_alat_Tidak" type="radio" class="custom-control-input" value="Tidak"
                            name="cath_signout_alat" {{$sign_out->cath_signout_alat=='Tidak' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signout_alat_Tidak">Tidak</label>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <div class="row">
                <div class="col-lg-8">
                    Adakah masalah selama prosedur
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signout_prosedur_Ya" type="radio" class="custom-control-input" value="Ya"
                            name="cath_signout_prosedur" {{$sign_out->cath_signout_prosedur=='Ya' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signout_prosedur_Ya">Ya</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signout_prosedur_Tidak" type="radio" class="custom-control-input"
                            value="Tidak" name="cath_signout_prosedur" {{$sign_out->cath_signout_prosedur=='Tidak' ? 'checked' : ''}}>
                        <label class="custom-control-label" for="cath_signout_prosedur_Tidak">Tidak</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Ya :</label>
                <input type="text" class="form-control" name="cath_signout_prosedur_text" value="{{$sign_out->cath_signout_prosedur_text}}">
            </div>
        </li>
    </ol>
    <hr>
    <div class="form-group">
        <label>Dokter Operator</label>
        <input type="text" class="form-control" name="cath_signout_dokter_operator" value="{{$sign_out->cath_signout_dokter_operator}}">
    </div>
    <div class="form-group">
        <label>Dokter Anastesi</label>
        <input type="text" class="form-control" name="cath_signout_dokter_anastesi" value="{{$sign_out->cath_signout_dokter_anastesi}}">
    </div>
    <div class="form-group">
        <label>Perawat Sirkuler</label>
        <input type="text" class="form-control" name="cath_signout_perawat" value="{{$sign_out->cath_signout_perawat}}">
    </div>
    <button type="button" id="btn_cathlab" class="btn btn-success float-left" onclick="simpanCathlabSignOut()">Simpan</button>
</form>
