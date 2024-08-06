<h4><b>Serah Terima Pasien</b></h4>
<br>
<form id="RujukanSerahTerima">
    <input name="kode_surat_rujukan" value="{{ $surat_rujukan->kode_surat_rujukan }}" type="hidden">
    <div class="row">
        <div class="col-lg-6" style="border-right: 1px solid black">
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="rujukan_terima_tanggal" value="{{ $surat_rujukan_terima->rujukan_terima_tanggal }}">
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Jam</label>
                        <input type="time" class="form-control" name="rujukan_terima_jam" value="{{ $surat_rujukan_terima->rujukan_terima_jam }}">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label>Kondisi Saat Ini</label>
                <input type="text" class="form-control" name="rujukan_terima_kondisi" value="{{ $surat_rujukan_terima->rujukan_terima_kondisi }}">
            </div>
            <div class="row">
                <legend class="col-form-label col-sm-3 pt-0">GCS</legend>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>E</label>
                        <input type="text" class="form-control" name="rujukan_terima_gcs_e" value="{{ $surat_rujukan_terima->rujukan_terima_gcs_e }}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>M</label>
                        <input type="text" class="form-control" name="rujukan_terima_gcs_m" value="{{ $surat_rujukan_terima->rujukan_terima_gcs_m }}">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>V</label>
                        <input type="text" class="form-control" name="rujukan_terima_gcs_v" value="{{ $surat_rujukan_terima->rujukan_terima_gcs_v }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>TD</label>
                        <input type="text" class="form-control" name="rujukan_terima_td" value="{{ $surat_rujukan_terima->rujukan_terima_td }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>N</label>
                        <input type="text" class="form-control" name="rujukan_terima_n" value="{{ $surat_rujukan_terima->rujukan_terima_n }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Suhu</label>
                        <input type="text" class="form-control" name="rujukan_terima_suhu" value="{{ $surat_rujukan_terima->rujukan_terima_suhu }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>P</label>
                        <input type="text" class="form-control" name="rujukan_terima_p" value="{{ $surat_rujukan_terima->rujukan_terima_p }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Sp02</label>
                        <input type="text" class="form-control" name="rujukan_terima_sp02" value="{{ $surat_rujukan_terima->rujukan_terima_sp02 }}">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Skala nyeri</label>
                        <input type="text" class="form-control" name="rujukan_terima_skala_nyeri" value="{{ $surat_rujukan_terima->rujukan_terima_skala_nyeri }}">
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
        <div class="col-lg-6">
            Hasil pemeriksaan diagnostik
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Lab (lembar)</label>
                        <input type="text" class="form-control" name="rujukan_terima_lab" value="{{ $surat_rujukan_terima->rujukan_terima_lab }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>X-Ray (lembar)</label>
                        <input type="text" class="form-control" name="rujukan_terima_xray" value="{{ $surat_rujukan_terima->rujukan_terima_xray }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>MRI (lembar)</label>
                        <input type="text" class="form-control" name="rujukan_terima_mri" value="{{ $surat_rujukan_terima->rujukan_terima_mri }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>CT Scan (lembar)</label>
                        <input type="text" class="form-control" name="rujukan_terima_ct_scan" value="{{ $surat_rujukan_terima->rujukan_terima_ct_scan }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group"><label>EKG (lembar)</label>
                        <input type="text" class="form-control" name="rujukan_terima_ekg" value="{{ $surat_rujukan_terima->rujukan_terima_ekg }}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Echo (lembar)</label>
                        <input type="text" class="form-control" name="rujukan_terima_echo" value="{{ $surat_rujukan_terima->rujukan_terima_echo }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="float-left">
        <button class="btn btn-success btn_transfer_internal" onclick="simpanRujukanSerahTerima()" type="button">Simpan</button>
    </div>
</form>
