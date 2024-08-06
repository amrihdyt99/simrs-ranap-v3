<h3 class="bg-warning p-2">TIME OUT</h3>
<form id="cathlab_time_out">
<div class="form-group">
    <label>Pukul</label>
    <input type="time" class="form-control" name="cath_timeout_pukul" value="{{$time_out->cath_timeout_pukul}}">
</div>
<ol>
    <li>
        Dokter/perawat melakukan secara verbal
        <div class="form-group">
            <label>Nama Pasien</label>
            <input type="text" class="form-control" name="cath_timeout_nama_pasien" value="{{$time_out->cath_timeout_nama_pasien}}">
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" class="form-control" name="cath_timeout_tgl_lahir" value="{{$time_out->cath_timeout_tgl_lahir}}">
        </div>
    </li>
    <li>
        Prosedur Tindakan
        <div class="form-group">
            <label>Diagnostik</label>
            <input type="text" class="form-control" name="cath_timeout_diagnostik" value="{{$time_out->cath_timeout_diagnostik}}">
        </div>
        <div class="form-group">
            <label>Internvensi</label>
            <input type="text" class="form-control" name="cath_timeout_intervensi" value="{{$time_out->cath_timeout_intervensi}}">
        </div>
    </li>
    <li>
        <div class="row">
            <div class="col-lg-8">
                Tim sudah lengkap
            </div>
            <div class="col-lg-2">
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="cath_timeout_tim_Ya" type="radio" class="custom-control-input" value="Ya"
                        name="cath_timeout_tim" {{$time_out->cath_timeout_tim=='Ya' ? : ''}}>
                    <label class="custom-control-label" for="cath_timeout_tim_Ya">Ya</label>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="custom-control custom-radio custom-control-inline">
                    <input id="cath_timeout_tim_Tidak" type="radio" class="custom-control-input" value="Tidak"
                        name="cath_timeout_tim" {{$time_out->cath_timeout_tim=='Tidak' ? : ''}}>
                    <label class="custom-control-label" for="cath_timeout_tim_Tidak">Tidak</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Dokter Operator</label>
            <input type="text" class="form-control" name="cath_timeout_tim_dokter" value="{{$time_out->cath_timeout_tim_dokter}}">
        </div>
        <div class="form-group">
            <label>Dokter Operator</label>
            <input type="text" class="form-control" name="cath_timeout_tim_scrub" value="{{$time_out->cath_timeout_tim_scrub}}">
        </div>
        <div class="form-group">
            <label>Circulating Nurse</label>
            <input type="text" class="form-control" name="cath_timeout_tim_circulating" value="{{$time_out->cath_timeout_tim_circulating}}">
        </div>
        <div class="form-group">
            <label>Dokter Anastesi</label>
            <input type="text" class="form-control" name="cath_timeout_tim_dokter_anastesi" value="{{$time_out->cath_timeout_tim_dokter_anastesi}}">
        </div>
        <div class="form-group">
            <label>Perawat Anastesi</label>
            <input type="text" class="form-control" name="cath_timeout_tim_perawat_anastesi" value="{{$time_out->cath_timeout_tim_perawat_anastesi}}">
        </div>
        <div class="form-group">
            <label>Petugas Lainnya</label>
            <input type="text" class="form-control" name="cath_timeout_tim_petugas_lain" value="{{$time_out->cath_timeout_tim_petugas_lain}}">
        </div>
    </li>
    <li>
        Konfirmasi
        <div class="form-group">
            <label>Obat anti platelet</label>
            <input type="text" class="form-control" name="cath_timeout_obat" value="{{$time_out->cath_timeout_obat}}">
        </div>
        <div class="form-group">
            <label>Ureum Serum</label>
            <input type="text" class="form-control" name="cath_timeout_ureum" value="{{$time_out->cath_timeout_ureum}}">
        </div>
        <div class="form-group">
            <label>Kreatinin Serum</label>
            <input type="text" class="form-control" name="cath_timeout_kreatinin" value="{{$time_out->cath_timeout_kreatinin}}">
        </div>
    </li>
    <li>
        <div class="form-group">
            <label>Akses tindakan di</label>
            <input type="text" class="form-control" name="cath_timeout_akses"value="{{$time_out->cath_timeout_akses}}">
        </div>
    </li>
    <li>
        <div class="form-group">
            <label>Estimasi waktu tindakan</label>
            <input type="text" class="form-control" name="cath_timeout_estimasi" value="{{$time_out->cath_timeout_estimasi}}">
        </div>
    </li>
    <li>
        <div class="form-group">
            <label>Tindakan pencegahan</label>
            <input type="text" class="form-control" name="cath_timeout_tindakan" value="{{$time_out->cath_timeout_tindakan}}">
        </div>
    </li>
    <li>
        <div class="form-group">
            <label>Ada pertanyaan ?</label>
            <input type="text" class="form-control" name="cath_timeout_pertanyaan" value="{{$time_out->cath_timeout_pertanyaan}}">
        </div>
    </li>
    <li>
        <div class="form-group">
            <label>Apakah semua tim sudah siap ?</label>
            <input type="text" class="form-control" name="cath_timeout_tim_siap" value="{{$time_out->cath_timeout_tim_siap}}">
        </div>
    </li>
</ol>
<hr>
<div class="form-group">
    <label>Perawat Sirkuler</label>
    <input type="text" class="form-control" name="cath_timeout_perawat" value="{{$time_out->cath_timeout_perawat}}">
</div>
<button type="button" id="btn_cathlab" class="btn btn-success float-left" onclick="simpanCathlabTimeOut()">Simpan</button>
</form>
