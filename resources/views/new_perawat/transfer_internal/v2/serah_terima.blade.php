<h3>SERAH TERIMA PASIEN</h3>
<br>
<div class="row">
    <div class="col-lg-6" style="border-right: 1px solid black">
        <div class="form-group">
            <label>Tanggal dan waktu serah terima</label>
            <input type="datetime-local" class="form-control" name="transfer_terima_tanggal" value="{{$transfer_internal->transfer_terima_tanggal}}">
        </div>
        <div class="form-group">
            <label>Kondisi Saat Ini</label>
            <input type="text" class="form-control" name="transfer_terima_kondisi" value="{{$transfer_internal->transfer_terima_kondisi}}">
        </div>
        <div class="row">
            <h5 class="col-sm-12 pt-0">Saat Tba :</h5>
            <legend class="col-form-label col-sm-3 pt-0">GCS</legend>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>E</label>
                    <input type="text" class="form-control" name="transfer_terima_gcs_e" value="{{$transfer_internal->transfer_terima_gcs_e}}">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>M</label>
                    <input type="text" class="form-control" name="transfer_terima_gcs_m" value="{{$transfer_internal->transfer_terima_gcs_m}}">
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>V</label>
                    <input type="text" class="form-control" name="transfer_terima_gcs_v" value="{{$transfer_internal->transfer_terima_gcs_v}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label>TD</label>
                    <input type="text" class="form-control" name="transfer_terima_td" value="{{$transfer_internal->transfer_terima_td}}">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>N</label>
                    <input type="text" class="form-control" name="transfer_terima_n" value="{{$transfer_internal->transfer_terima_n}}">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Suhu</label>
                    <input type="text" class="form-control" name="transfer_terima_suhu" value="{{$transfer_internal->transfer_terima_suhu}}">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>P</label>
                    <input type="text" class="form-control" name="transfer_terima_p" value="{{$transfer_internal->transfer_terima_p}}">
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        Hasil pemeriksaan diagnostik
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Lab (lembar)</label>
                    <input type="text" class="form-control" name="transfer_terima_lab" value="{{$transfer_internal->transfer_terima_lab}}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>X-Ray (lembar)</label>
                    <input type="text" class="form-control" name="transfer_terima_xray" value="{{$transfer_internal->transfer_terima_xray}}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>MRI (lembar)</label>
                    <input type="text" class="form-control" name="transfer_terima_mri" value="{{$transfer_internal->transfer_terima_mri}}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>CT Scan (lembar)</label>
                    <input type="text" class="form-control" name="transfer_terima_ct_scan" value="{{$transfer_internal->transfer_terima_ct_scan}}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"><label>EKG (lembar)</label>
                    <input type="text" class="form-control" name="transfer_terima_ekg" value="{{$transfer_internal->transfer_terima_ekg}}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Echo (lembar)</label>
                    <input type="text" class="form-control" name="transfer_terima_echo" value="{{$transfer_internal->transfer_terima_echo}}">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="float-left">
    <button class="btn btn-success btn_transfer_internal" type="button">Simpan</button>
</div>