<h3 class="bg-warning p-2">SIGN OUT</h3>
<form id="cathlab_sign_out">
    <div class="form-group">
        <label>Pukul</label>
        <input type="time" class="form-control" name="cath_signout_pukul" id="cath_signout_pukul" value="" disabled>
    </div>
    <ol>
        <li>
            <div class="form-group">
                <label>Tindakan yang dilakukan</label>
                <textarea class="form-control" name="cath_signout_tindakan" id="cath_signout_tindakan" disabled></textarea>
            </div>
        </li>
        <li>
            <div class="form-group">
                <label>Implan yang terpasang</label>
                <input type="text" class="form-control" name="cath_signout_implan" id="cath_signout_implan" value="" disabled>
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
                            name="cath_signout_alat" disabled>
                        <label class="custom-control-label" for="cath_signout_alat_Ya">Ya</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signout_alat_Tidak" type="radio" class="custom-control-input" value="Tidak"
                            name="cath_signout_alat" disabled>
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
                            name="cath_signout_prosedur" disabled>
                        <label class="custom-control-label" for="cath_signout_prosedur_Ya">Ya</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input id="cath_signout_prosedur_Tidak" type="radio" class="custom-control-input"
                            value="Tidak" name="cath_signout_prosedur" disabled>
                        <label class="custom-control-label" for="cath_signout_prosedur_Tidak">Tidak</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Ya :</label>
                <input type="text" class="form-control" name="cath_signout_prosedur_text" id="cath_signout_prosedur_text" value="" disabled>
            </div>
        </li>
    </ol>
    <hr>
    <div class="form-group">
        <label>Dokter Operator</label>
        <input type="text" class="form-control" name="cath_signout_dokter_operator" id="cath_signout_dokter_operator" value="" disabled>
    </div>
    <div class="form-group">
        <label>Dokter Anastesi</label>
        <input type="text" class="form-control" name="cath_signout_dokter_anastesi" id="cath_signout_dokter_anastesi" value="" disabled>
    </div>
    <div class="form-group">
        <label>Perawat Anastesi</label>
        <input type="text" class="form-control" name="cath_signout_perawat_anastesi" id="cath_signout_perawat_anastesi" value="" disabled>
    </div>
    <div class="form-group">
        <label>Perawat Sirkuler</label>
        <input type="text" class="form-control" name="cath_signout_perawat" id="cath_signout_perawat" value="" disabled>
    </div>
    <div class="form-group">
        <label>Perawat Scrub</label>
        <input type="text" class="form-control" name="cath_signout_perawat_scrub" id="cath_signout_perawat_scrub" value="" disabled>
    </div>
    <div class="form-group">
        <label>Perawat Hemodinamic</label>
        <input type="text" class="form-control" name="cath_signout_perawat_hemodinamic" id="cath_signout_perawat_hemodinamic" value="" disabled>
    </div>
    <div class="form-group">
        <label>Petugas Lainnya</label>
        <input type="text" class="form-control" name="cath_timeout_tim_petugas_lain" id="cath_timeout_tim_petugas_lain" value="" disabled>
    </div>
</form>
