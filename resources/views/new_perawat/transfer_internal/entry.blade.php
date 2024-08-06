@empty($transfer_internal)
@php
   $transfer_internal = optional((object)[]);
@endphp
@endempty
<div class="text-black" style="font-size: 14px">
    <input type="hidden" name="kode_transfer_internal" value="">
    <div class="form-group row">
        <div class="col-lg-4">
            <div class="form-group"><label>Unit asal</label><input type="text" class="form-control"
                    name="transfer_unit_asal" value="{{ $transfer_internal->transfer_unit_asal }}"></div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"><label>Unit tujuan</label><input type="text" class="form-control"
                    name="transfer_unit_tujuan" value="{{ $transfer_internal->transfer_unit_tujuan }}"></div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"><label>Nama petugas unit tujuan yang dihubungi</label><input type="text"
                    class="form-control" name="transfer_unit_tujuan_petugas"
                    value="{{ $transfer_internal->transfer_unit_tujuan_petugas }}"></div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"><label>Tanggal dan waktu menghubungi</label><input type="datetime-local"
                    class="form-control" name="transfer_waktu_hubungi"
                    value="{{ $transfer_internal->transfer_waktu_hubungi }}"></div>
        </div>
        <div class="col-lg-4">
            <div class="form-group"><label>Tanggal dan waktu transfer</label><input type="datetime-local"
                    class="form-control" name="ditransfer_waktu" value="{{ $transfer_internal->ditransfer_waktu }}"></div>
        </div>
    </div>
    <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Kategori Pasien</legend>
        <div class="col-sm-10">
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_kategori_Level 0" type="radio" class="custom-control-input" value="Level 0"
                    name="transfer_kategori" {{ $transfer_internal->transfer_kategori == 'Level 0' ? 'checked' : '' }}>
                <label class="custom-control-label" for="transfer_kategori_Level 0">Level 0</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_kategori_Level 1" type="radio" class="custom-control-input" value="Level 1"
                    name="transfer_kategori" {{ $transfer_internal->transfer_kategori == 'Level 1' ? 'checked' : '' }}>
                <label class="custom-control-label" for="transfer_kategori_Level 1">Level 1</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_kategori_Level 2" type="radio" class="custom-control-input" value="Level 2"
                    name="transfer_kategori" {{ $transfer_internal->transfer_kategori == 'Level 2' ? 'checked' : '' }}>
                <label class="custom-control-label" for="transfer_kategori_Level 2">Level 2</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_kategori_Level 3" type="radio" class="custom-control-input" value="Level 3"
                    name="transfer_kategori" {{ $transfer_internal->transfer_kategori == 'Level 3' ? 'checked' : '' }}>
                <label class="custom-control-label" for="transfer_kategori_Level 3">Level 3</label>
            </div>
        </div>
    </div>
    <br>
    <h3>RINGKASAN KONDISI PASIEN</h3>
    <br>
    <div class="form-group"><label>Alasan pasien masuk</label><input type="text" class="form-control"
            name="transfer_alasan_masuk" value="{{ $transfer_internal->transfer_alasan_masuk }}"></div>
    <div class="form-group"><label>Diagnosis</label><input type="text" class="form-control" name="transfer_diagnosis"
            value="{{ $transfer_internal->transfer_diagnosis }}"></div>
    <div class="form-group"><label>Temuan penting (Pemeriksaan fisik dan penunjang) selama pasien dirawat di RSUD Siti
            Fatimahtra</label><input type="text" class="form-control" name="transfer_temuan"
            value="{{ $transfer_internal->transfer_temuan }}"></div>

    <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Alergi</legend>
        <div class="col-sm-10">
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_alergi_Tidak" type="radio" class="custom-control-input" value="Tidak"
                    name="transfer_alergi" {{ $transfer_internal->transfer_alergi == 'Tidak' ? 'checked' : '' }}>
                <label class="custom-control-label" for="transfer_alergi_Tidak">Tidak</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_alergi_Ya" type="radio" class="custom-control-input" value="Ya"
                    name="transfer_alergi" {{ $transfer_internal->transfer_alergi == 'Ya' ? 'checked' : '' }}>
                <label class="custom-control-label" for="transfer_alergi_Ya">Ya</label>
            </div>
        </div>
    </div>
    <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Kewaspadaan</legend>
        <div class="col-sm-10">
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_kewaspaan_Standar" type="radio" class="custom-control-input" value="Standar"
                    name="transfer_kewaspaan"
                    {{ $transfer_internal->transfer_kewaspaan == 'Standar' ? 'checked' : '' }}>
                <label class="custom-control-label" for="transfer_kewaspaan_Standar">Standar</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_kewaspaan_Contact" type="radio" class="custom-control-input" value="Contact"
                    name="transfer_kewaspaan"
                    {{ $transfer_internal->transfer_kewaspaan == 'Contact' ? 'checked' : '' }}>
                <label class="custom-control-label" for="transfer_kewaspaan_Contact"
                    {{ $transfer_internal->transfer_kewaspaan == 'Contact' ? 'checked' : '' }}>Contact</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_kewaspaan_Airbone" type="radio" class="custom-control-input" value="Airbone"
                    name="transfer_kewaspaan">
                <label class="custom-control-label" for="transfer_kewaspaan_Airbone">Airbone</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input id="transfer_kewaspaan_Drole" type="radio" class="custom-control-input" value="Drole"
                    name="transfer_kewaspaan">
                <label class="custom-control-label" for="transfer_kewaspaan_Drole">Drole</label>
            </div>
        </div>
    </div>
    <div class="row">
        <h5 class="col-sm-12 pt-0">Saat Berangkat :</h5>
        <legend class="col-form-label col-sm-2 pt-0">GCS</legend>
        <div class="col-lg-2">
            <div class="form-group"><label>E</label><input type="text" class="form-control"
                    value="{{ $transfer_internal->transfer_gcs_e }}" name="transfer_gcs_e"></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>M</label><input type="text" class="form-control"
                    value="{{ $transfer_internal->transfer_gcs_m }}" name="transfer_gcs_m"></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>V</label><input type="text" class="form-control"
                    value="{{ $transfer_internal->transfer_gcs_m }}"
                    value="{{ $transfer_internal->transfer_gcs_m }}" name="transfer_gcs_v"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <div class="form-group"><label>TD</label><input type="text" class="form-control"
                    value="{{ $transfer_internal->transfer_td }}" name="transfer_td"></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>N</label><input type="text" class="form-control"
                    value="{{ $transfer_internal->transfer_N }}" name="transfer_N"></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>Skala Nyeri</label><input type="text"
                    value="{{ $transfer_internal->transfer_skala_nyeri }}" class="form-control"
                    name="transfer_skala_nyeri"></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>Suhu</label><input type="text"
                    value="{{ $transfer_internal->transfer_suhu }}" class="form-control" name="transfer_suhu"></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>P</label><input type="text"
                    value="{{ $transfer_internal->transfer_p }}" class="form-control" name="transfer_p"></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>SpO2</label><input type="text"
                    value="{{ $transfer_internal->transfer_spo2 }}" class="form-control" name="transfer_spo2"></div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-6" style="border-right: 1px solid black">
            <h4>Alat-alat yang terpasang dan tanggal pemasangan</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group"><label>Nama Alat</label><input type="text" class="form-control"
                            name="transfer_alat_terpasang"></div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group"><label>Tanggal Terpasang</label><input type="date"
                            class="form-control" name="transfer_tanggal_terpasang"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group"><label>Nama Alat</label><input type="text" class="form-control"
                            name="transfer_alat_terpasang"></div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group"><label>Tanggal Terpasang</label><input type="date"
                            class="form-control" name="transfer_tanggal_terpasang"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group"><label>Nama Alat</label><input type="text" class="form-control"
                            name="transfer_alat_terpasang"></div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group"><label>Tanggal Terpasang</label><input type="date"
                            class="form-control" name="transfer_tanggal_terpasang"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group"><label>Nama Alat</label><input type="text" class="form-control"
                            name="transfer_alat_terpasang"></div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group"><label>Tanggal Terpasang</label><input type="date"
                            class="form-control" name="transfer_tanggal_terpasang"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group"><label>Nama Alat</label><input type="text" class="form-control"
                            name="transfer_alat_terpasang"></div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group"><label>Tanggal Terpasang</label><input type="date"
                            class="form-control" name="transfer_tanggal_terpasang"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <h4>Obat/cairan yang dibawa pada saat transfer</h4>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group"><label>Nama Cairan/obat</label><input type="text" class="form-control"
                            name="transfer_cairan_terpasang"></div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group"><label>Jumlah</label><input type="text" class="form-control"
                            name="transfer_jumlah_cairan"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group"><label>Nama Cairan/obat</label><input type="text" class="form-control"
                            name="transfer_cairan_terpasang"></div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group"><label>Jumlah</label><input type="text" class="form-control"
                            name="transfer_jumlah_cairan"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group"><label>Nama Cairan/obat</label><input type="text" class="form-control"
                            name="transfer_cairan_terpasang"></div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group"><label>Jumlah</label><input type="text" class="form-control"
                            name="transfer_jumlah_cairan"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group"><label>Nama Cairan/obat</label><input type="text" class="form-control"
                            name="transfer_cairan_terpasang"></div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group"><label>Jumlah</label><input type="text" class="form-control"
                            name="transfer_jumlah_cairan"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group"><label>Nama Cairan/obat</label><input type="text" class="form-control"
                            name="transfer_cairan_terpasang"></div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group"><label>Jumlah</label><input type="text" class="form-control"
                            name="transfer_jumlah_cairan"></div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Dokumen yang disertakan</legend>
        <div class="col-lg-2">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input id="transfer_dokumen_Rekam Medik" type="checkbox" class="custom-control-input"
                    value="Rekam Medik" name="transfer_dokumen">
                <label class="custom-control-label" for="transfer_dokumen_Rekam Medik">Rekam Medik</label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input id="transfer_dokumen_Hasil Pemeriksaan Laboratorium" type="checkbox"
                    class="custom-control-input" value="Hasil Pemeriksaan Laboratorium" name="transfer_dokumen">
                <label class="custom-control-label" for="transfer_dokumen_Hasil Pemeriksaan Laboratorium">Hasil
                    Pemeriksaan Laboratorium</label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input id="transfer_dokumen_Hasil Pemeriksaan Radiologi" type="checkbox" class="custom-control-input"
                    value="Hasil Pemeriksaan Radiologi" name="transfer_dokumen">
                <label class="custom-control-label" for="transfer_dokumen_Hasil Pemeriksaan Radiologi">Hasil
                    Pemeriksaan Radiologi</label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input id="transfer_dokumen_Lainnya" type="checkbox" class="custom-control-input" value="Lainnya"
                    name="transfer_dokumen">
                <label class="custom-control-label" for="transfer_dokumen_Lainnya">Lainnya</label>
            </div>
        </div>
    </div>
    <br>
    <h3>STATUS PASIEN SELAMA TRANSFER</h3>
    <br>
    <div class="row my-0 py-0">
        <div class="col-lg-2">
            <div class="form-group"><label>Tanggal/Jam</label><input type="datetime-local" class="form-control"
                    name="transfer_status_tanggal" value="2023-03-13T10:34"></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>Kesadaraan</label><input type="text" class="form-control"
                    name="transfer_status_tanggal"></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>TD(mmHg)</label><input type="text" class="form-control"
                    name="transfer_status_tanggal"></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>HR(x/mnt)</label><input type="text" class="form-control"
                    name="transfer_status_tanggal"></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>RR(x/mnt)</label><input type="text" class="form-control"
                    name="transfer_status_tanggal"></div>
        </div>
    </div>
    <div class="row my-0 py-0">
        <div class="col-lg-2">
            <div class="form-group"><label>Tanggal/Jam</label><input type="datetime-local" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>Kesadaraan</label><input type="text" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>TD(mmHg)</label><input type="text" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>HR(x/mnt)</label><input type="text" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>RR(x/mnt)</label><input type="text" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
    </div>
    <div class="row my-0 py-0">
        <div class="col-lg-2">
            <div class="form-group"><label>Tanggal/Jam</label><input type="datetime-local" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>Kesadaraan</label><input type="text" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>TD(mmHg)</label><input type="text" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>HR(x/mnt)</label><input type="text" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>RR(x/mnt)</label><input type="text" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
    </div>
    <div class="row my-0 py-0">
        <div class="col-lg-2">
            <div class="form-group"><label>Tanggal/Jam</label><input type="datetime-local" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>Kesadaraan</label><input type="text" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>TD(mmHg)</label><input type="text" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>HR(x/mnt)</label><input type="text" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>RR(x/mnt)</label><input type="text" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
    </div>
    <div class="row my-0 py-0">
        <div class="col-lg-2">
            <div class="form-group"><label>Tanggal/Jam</label><input type="datetime-local" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>Kesadaraan</label><input type="text" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>TD(mmHg)</label><input type="text" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>HR(x/mnt)</label><input type="text" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>RR(x/mnt)</label><input type="text" class="form-control"
                    name="transfer_status_tanggal" value=""></div>
        </div>
    </div>
    <div class="form-group">
        <label>Kejadian dan tindakan yang dilakukan selama transfer</label>
        <input type="text"
            class="form-control" name="transfer_kejadian_tindakan" value="tidak ada kejadian">
    </div>
    <br>
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

    <div class="float-right">
        <button class="btn btn-success btn_transfer_internal"  type="button">Simpan</button>
    </div>
</div>
