<style>
    canvas {
        cursor: crosshair;
    }
</style>
<script type="text/javascript" src="{{asset('new_assets/signature/signature.js')}}"></script>
<h3>Persiapan Pasien</h3>
<input type="hidden" name="kode_transfer_internal" value="{{ $transfer_internal->kode_transfer_internal }}">
<div class="card">
    <div class="form-group row">
        <div class="col-lg-6">
            <div class="form-group">
                <label>Unit asal</label>
                @if (isset($ruangan_asal))
                <input type="hidden"
                    class="form-control" name="transfer_unit_asal" value="{{$ruangan_asal->bed_id}}">
                <input type="text"
                    class="form-control" value="{{ $ruangan_asal->bed_code . ' - ' . $ruangan_asal->ruang . ' - ' . $ruangan_asal->kelompok . ' - ' . $ruangan_asal->kelas }}" disabled>
                @else
                <input type="text"
                    class="form-control" value="" disabled>
                @endif
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group"><label>Unit tujuan</label>
                @if ($type == 'terima' || $type == 'detail')
                <input type="hidden" class="form-control" name="transfer_unit_tujuan" value="{{ $ruangan_tujuan->bed_id }}">
                <input type="text" id="bed-tujuan" class="form-control" value="{{ ($ruangan_tujuan->bed_code ?? '') . ' - ' . ($ruangan_tujuan->ruang ?? '') . ' - ' . ($ruangan_tujuan->kelompok ?? '') . ' - ' . ($ruangan_tujuan->kelas ?? '') }}" disabled>
                @else
                <select name="transfer_unit_tujuan" id="select-bed-tujuan" class="form-control">
                    @if (isset($ruangan_tujuan))
                    <option value="{{$ruangan_tujuan->bed_id}}"
                        selected>{{ $ruangan_tujuan->bed_code . ' - ' . $ruangan_tujuan->ruang . ' - ' . $ruangan_tujuan->kelompok . ' - ' . $ruangan_tujuan->kelas }}</option>
                    @endif
                </select>
                @endif
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Nama petugas unit tujuan yang dihubungi</label>
                <select name="perawat_tujuan" id="select-petugas-tujuan" class="form-control">
                    @if (isset($transfer_internal))
                    <option value="{{ $transfer_internal->diterima_oleh_user_id }}"
                        selected>{{ $transfer_internal->diterima_oleh_nama }}</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group"><label>Tanggal dan waktu menghubungi</label><input type="datetime-local"
                    class="form-control" name="transfer_waktu_hubungi"
                    value="{{ $transfer_internal->transfer_waktu_hubungi }}"></div>
        </div>
        <div class="col-lg-6">
            <div class="form-group"><label>Tanggal dan waktu transfer</label>
                <input type="datetime-local"
                    class="form-control" name="ditransfer_waktu" value="{{ $transfer_internal->ditransfer_waktu }}">
            </div>
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
            <div class="form-group mt-2">
                <label for="transfer_alergi_text">Detail Alergi Jika Ya</label>
                <input type="text" class="form-control" id="transfer_alergi_text" name="transfer_alergi_text" value="{{ $transfer_internal->transfer_alergi_text }}">
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
            <div class="form-group"><label>E</label><input type="number" class="form-control"
                    value="{{ $transfer_internal->transfer_gcs_e }}" name="transfer_gcs_e"></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>M</label><input type="number" class="form-control"
                    value="{{ $transfer_internal->transfer_gcs_m }}" name="transfer_gcs_m"></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>V</label><input type="number" class="form-control"
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
            <div class="form-group"><label>N</label><input type="number" class="form-control"
                    value="{{ $transfer_internal->transfer_N }}" name="transfer_N"></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>Skala Nyeri</label><input type="number"
                    value="{{ $transfer_internal->transfer_skala_nyeri }}" class="form-control"
                    name="transfer_skala_nyeri"></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>Suhu</label><input type="number"
                    value="{{ $transfer_internal->transfer_suhu }}" class="form-control" name="transfer_suhu"></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>P</label><input type="number"
                    value="{{ $transfer_internal->transfer_p }}" class="form-control" name="transfer_p"></div>
        </div>
        <div class="col-lg-2">
            <div class="form-group"><label>SpO2</label><input type="number"
                    value="{{ $transfer_internal->transfer_spo2 }}" class="form-control" name="transfer_spo2"></div>
        </div>
    </div>

    @php
    $transfer_dokumen_yang_disertakan = json_decode($transfer_internal->transfer_dokumen_yang_disertakan) ?? [];
    @endphp

    <div class="row">
        <legend class="col-form-label col-sm-2 pt-0">Dokumen yang disertakan</legend>
        <div class="col-lg-2">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input id="transfer_dokumen_a" type="checkbox" class="custom-control-input" value="Rekam Medik"
                    name="transfer_dokumen_yang_disertakan[]"
                    {{ in_array('Rekam Medik', $transfer_dokumen_yang_disertakan) ? 'checked' : '' }}>
                <label class="custom-control-label" for="transfer_dokumen_a">Rekam Medik</label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input id="transfer_dokumen_b" type="checkbox" class="custom-control-input"
                    value="Hasil Pemeriksaan Laboratorium" name="transfer_dokumen_yang_disertakan[]"
                    {{ in_array('Hasil Pemeriksaan Laboratorium', $transfer_dokumen_yang_disertakan) ? 'checked' : '' }}>
                <label class="custom-control-label" for="transfer_dokumen_b">Hasil Pemeriksaan Laboratorium</label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input id="transfer_dokumen_c" type="checkbox" class="custom-control-input"
                    value="Hasil Pemeriksaan Radiologi" name="transfer_dokumen_yang_disertakan[]"
                    {{ in_array('Hasil Pemeriksaan Radiologi', $transfer_dokumen_yang_disertakan) ? 'checked' : '' }}>
                <label class="custom-control-label" for="transfer_dokumen_c">Hasil Pemeriksaan Radiologi</label>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="custom-control custom-checkbox custom-control-inline">
                <input id="transfer_dokumen_d" type="checkbox" class="custom-control-input" value="Lainnya"
                    name="transfer_dokumen_yang_disertakan[]"
                    {{ in_array('Lainnya', $transfer_dokumen_yang_disertakan) ? 'checked' : '' }}>
                <label class="custom-control-label" for="transfer_dokumen_d">Lainnya</label>
            </div>
        </div>

    </div>
    @if ($type != 'terima' && $type != 'detail')
    <div class="float-left">
        <button class="btn btn-success btn_transfer_internal" type="button">Simpan</button>
    </div>
    @endif
</div>