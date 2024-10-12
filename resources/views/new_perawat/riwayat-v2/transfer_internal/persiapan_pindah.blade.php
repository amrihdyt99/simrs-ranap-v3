<h3>Persiapan Pasien</h3>
<div class="card">
    <div class="form-group row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Unit asal</label>
                <input type="text" class="form-control" name="transfer_unit_asal" id="transfer_unit_asal" value="" disabled>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group"><label>Unit tujuan</label>
                <input type="text" name="transfer_unit_tujuan" id="transfer_unit_tujuan" class="form-control"
                    placeholder="Masukkan unit tujuan" disabled>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group"><label>Class</label>
                <input type="text" name="transfer_class" id="transfer_class" class="form-control"
                    placeholder="Masukkan class" disabled>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group">
                <label>Charge Class</label>
                <input type="text" name="transfer_charge_class" id="transfer_charge_class" class="form-control"
                    placeholder="Masukkan charge class" disabled>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Nama petugas unit tujuan yang dihubungi</label>
                <input type="text" name="perawat_tujuan_input" id="perawat_tujuan_input" class="form-control"
                    placeholder="Masukkan nama petugas" disabled>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group"><label>Tanggal dan waktu menghubungi</label><input type="datetime-local"
                    class="form-control" name="transfer_waktu_hubungi" id="transfer_waktu_hubungi" value="" disabled></div>
        </div>
        <div class="col-lg-6">
            <div class="form-group"><label>Tanggal dan waktu transfer</label>
                <input type="datetime-local" class="form-control" name="ditransfer_waktu" id="ditransfer_waktu" value="" disabled>
            </div>
        </div>
    </div>
    <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Kategori Pasien</legend>
        <div class="col-sm-10">
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_kategori_Level_0" type="radio" class="custom-control-input" value="Level 0"
                    name="transfer_kategori" disabled>
                <label class="custom-control-label" for="transfer_kategori_Level_0">Level 0</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_kategori_Level_1" type="radio" class="custom-control-input" value="Level 1"
                    name="transfer_kategori" disabled>
                <label class="custom-control-label" for="transfer_kategori_Level_1">Level 1</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_kategori_Level_2" type="radio" class="custom-control-input" value="Level 2"
                    name="transfer_kategori" disabled>
                <label class="custom-control-label" for="transfer_kategori_Level_2">Level 2</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_kategori_Level_3" type="radio" class="custom-control-input" value="Level 3"
                    name="transfer_kategori" disabled>
                <label class="custom-control-label" for="transfer_kategori_Level_3">Level 3</label>
            </div>
        </div>
    </div>
    <br>
    <h3>RINGKASAN KONDISI PASIEN</h3>
    <br>
    <div class="form-group"><label>Alasan pasien masuk</label><input type="text" class="form-control"
            name="transfer_alasan_masuk" id="transfer_alasan_masuk" value="" disabled></div>
    <div class="form-group"><label>Diagnosis</label><input type="text" class="form-control"
            name="transfer_diagnosis" id="transfer_diagnosis" value="" disabled></div>
    <div class="form-group"><label>Temuan penting (Pemeriksaan fisik dan penunjang) selama pasien dirawat di RSUD Siti
            Fatimahtra</label><input type="text" class="form-control" name="transfer_temuan" id="transfer_temuan" value="" disabled>
    </div>

    <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Alergi</legend>
        <div class="col-sm-10">
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_alergi_Tidak" type="radio" class="custom-control-input" value="Tidak"
                    name="transfer_alergi" disabled>
                <label class="custom-control-label" for="transfer_alergi_Tidak">Tidak</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_alergi_Ya" type="radio" class="custom-control-input" value="Ya"
                    name="transfer_alergi" disabled>
                <label class="custom-control-label" for="transfer_alergi_Ya">Ya</label>
            </div>
            <div class="form-group mt-2">
                <label for="transfer_alergi_text">Detail Alergi Jika Ya</label>
                <input type="text" class="form-control" id="transfer_alergi_text" name="transfer_alergi_text"
                    value="" disabled>
            </div>
        </div>
    </div>
    <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Kewaspadaan</legend>
        <div class="col-sm-10">
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_kewaspaan_Standar" type="radio" class="custom-control-input" value="Standar"
                    name="transfer_kewaspaan" disabled>
                <label class="custom-control-label" for="transfer_kewaspaan_Standar">Standar</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_kewaspaan_Contact" type="radio" class="custom-control-input" value="Contact"
                    name="transfer_kewaspaan" disabled>
                <label class="custom-control-label" for="transfer_kewaspaan_Contact">Contact</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_kewaspaan_Airbone" type="radio" class="custom-control-input" value="Airbone"
                    name="transfer_kewaspaan" disabled>
                <label class="custom-control-label" for="transfer_kewaspaan_Airbone">Airbone</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_kewaspaan_Drole" type="radio" class="custom-control-input" value="Drole"
                    name="transfer_kewaspaan" disabled>
                <label class="custom-control-label" for="transfer_kewaspaan_Drole">Drole</label>
            </div>
        </div>
    </div>
    <div class="row">
        <h5 class="col-sm-12 pt-0">Saat Berangkat :</h5>
        <legend class="col-form-label col-sm-2 pt-0">GCS</legend>
        <div class="col-lg-2">
            <div class="form-group"><label>E</label><input type="number" class="form-control" value=""
                    name="transfer_gcs_e" id="transfer_gcs_e" disabled></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>M</label><input type="number" class="form-control" value=""
                    name="transfer_gcs_m" id="transfer_gcs_m" disabled></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>V</label><input type="number" class="form-control" value=""
                    name="transfer_gcs_v" id="transfer_gcs_v" disabled></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <div class="form-group"><label>TD</label><input type="text" class="form-control" value=""
                    name="transfer_td" id="transfer_td" disabled></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>N</label><input type="number" class="form-control" value=""
                    name="transfer_N" id="transfer_N" disabled></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>Skala Nyeri</label><input type="number" value=""
                    class="form-control" name="transfer_skala_nyeri" id="transfer_skala_nyeri" disabled></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>Suhu</label><input type="number" value="" class="form-control"
                    name="transfer_suhu" id="transfer_suhu" disabled></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>P</label><input type="number" value="" class="form-control"
                    name="transfer_p" id="transfer_p" disabled></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>SpO2</label><input type="number" value="" class="form-control"
                    name="transfer_spo2" id="transfer_spo2" disabled></div>
        </div>
    </div>

    <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Dokumen yang disertakan</legend>
        <div class="col-lg-2">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input id="transfer_dokumen_a" type="checkbox" class="custom-control-input" value="Rekam Medik"
                    name="transfer_dokumen_yang_disertakan[]" disabled>
                <label class="custom-control-label" for="transfer_dokumen_a">Rekam Medik</label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input id="transfer_dokumen_b" type="checkbox" class="custom-control-input"
                    value="Hasil Pemeriksaan Laboratorium" name="transfer_dokumen_yang_disertakan[]" disabled>
                <label class="custom-control-label" for="transfer_dokumen_b">Hasil Pemeriksaan Laboratorium</label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input id="transfer_dokumen_c" type="checkbox" class="custom-control-input"
                    value="Hasil Pemeriksaan Radiologi" name="transfer_dokumen_yang_disertakan[]" disabled>
                <label class="custom-control-label" for="transfer_dokumen_c">Hasil Pemeriksaan Radiologi</label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input id="transfer_dokumen_d" type="checkbox" class="custom-control-input" value="Lainnya"
                    name="transfer_dokumen_yang_disertakan[]" disabled>
                <label class="custom-control-label" for="transfer_dokumen_d">Lainnya</label>
            </div>
        </div>

    </div>
</div>
