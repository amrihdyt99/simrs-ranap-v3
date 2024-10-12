<h3><b>SERAH TERIMA PASIEN</b></h3>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label>Tanggal dan waktu serah terima</label>
            <input type="datetime-local" class="form-control" name="transfer_terima_tanggal" id="transfer_terima_tanggal"
                disabled>
        </div>
        <div class="form-group">
            <label>Kondisi Saat Ini</label>
            <input type="text" class="form-control" name="transfer_terima_kondisi" id="transfer_terima_kondisi"
                disabled>
        </div>
        <div class="row">
            <h5 class="col-sm-12 pt-0">Saat Tba :</h5>
            <legend class="col-form-label col-sm-3 pt-0">GCS</legend>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>E</label>
                    <input type="text" class="form-control" name="transfer_terima_gcs_e" id="transfer_terima_gcs_e"
                        disabled>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>M</label>
                    <input type="text" class="form-control" name="transfer_terima_gcs_m" id="transfer_terima_gcs_m"
                        disabled>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>V</label>
                    <input type="text" class="form-control" name="transfer_terima_gcs_v" id="transfer_terima_gcs_v"
                        disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label>TD</label>
                    <input type="text" class="form-control" name="transfer_terima_td" id="transfer_terima_td"
                        disabled>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>N</label>
                    <input type="text" class="form-control" name="transfer_terima_n" id="transfer_terima_n" disabled>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>Suhu</label>
                    <input type="text" class="form-control" name="transfer_terima_suhu" id="transfer_terima_suhu"
                        disabled>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label>P</label>
                    <input type="text" class="form-control" name="transfer_terima_p" id="transfer_terima_p" disabled>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<h3><b>Hasil Pemeriksaan Diagnostik</b></h3>
<table id="dt_serah_terima_diagnostik" class="table table-bordered w-100">
    <thead>
        <tr class="bg-primary text-white">
            <th>Lab (lembar)</th>
            <th>X-Ray (lembar)</th>
            <th>MRI (lembar)</th>
            <th>CT Scan (lembar)</th>
            <th>EKG (lembar)</th>
            <th>Echo (lembar)</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
