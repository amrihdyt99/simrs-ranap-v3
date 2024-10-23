@empty($asuhan_gizi_dewasa)
@php
   $asuhan_gizi_dewasa = optional((object)[]);
@endphp
@endempty

<input type="hidden" class="form-control" name="reg_no" value="{{ $reg }}">
<input type="hidden" class="form-control" name="med_rec" value="{{ $medrec }}">
<div class="form-group mt-3">
    <label for="" class="d-flex justify-content-center"><h4><b>(A) Asesmen Gizi</b></h4></label>
    <textarea name="asuhan[asdewasa_assesment]" cols="30" rows="4" class="form-control">{{$asuhan_gizi_dewasa->asdewasa_assesment}}</textarea>
</div>
<div class="form-group mt-3">
    <label for="" class="d-flex justify-content-center"><h4><b>(D) Diagnosa Gizi</b></h4></label>
</div>
<div class="form-group">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDiagnosaGizi">
        Tambah Diagnosa Gizi
    </button>
</div>
<input type="hidden" id="diagnosa_gizi_data" value="{{$diagnosa_gizi_dewasa}}">
<table class="table table-bordered w-100" id="t_diagnosa_gizi_dewasa">
    <thead class="bg-warning font-weight-bold text-center text-black">
        <tr>
            <th>Masalah</th>
            <th>Berkaitan Dengan</th>
            <th>Ditandai Dengan</th>
            <th style="width: 2px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>
<div class="form-group mt-3">
    <label for="" class="d-flex justify-content-center"><h4><b>(I) Intervensi Gizi</b></h4></label>
</div>
<div class="row mt-3">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Tujuan</legend>
    <div class="col-sm-10">
        <div class="form-group">
            <textarea name="asuhan[asdewasa_tujuan]" cols="30" rows="4" class="form-control">{{$asuhan_gizi_dewasa->asdewasa_tujuan}}</textarea>
        </div>
    </div>
</div>
<div class="row mt-3">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Kebutuhan</legend>
    <div class="col-sm-10">
        <div class="form-group row">
            <div class="col-sm-3 pr-0">
                <label for="">Energi (kkal/hari)</label>
                <input type="number" name="asuhan[asdewasa_energi]" class="form-control" value="{{$asuhan_gizi_dewasa->asdewasa_energi}}">
            </div>
            <div class="col-sm-3 pr-0">
                <label for="">Protein (g/hari)</label>
                <input type="number" name="asuhan[asdewasa_protein]" class="form-control" value="{{$asuhan_gizi_dewasa->asdewasa_protein}}">
            </div>
            <div class="col-sm-3 pr-0">
                <label for="">KH (gr/kkal)</label>
                <input type="number" name="asuhan[asdewasa_kh]" class="form-control" value="{{$asuhan_gizi_dewasa->asdewasa_kh}}">
            </div>
            <div class="col-sm-3">
                <label for="">Lemak (gr/kkal)</label>
                <input type="number" name="asuhan[asdewasa_lemak]" class="form-control" value="{{$asuhan_gizi_dewasa->asdewasa_lemak}}">
            </div>
        </div>
    </div>
</div>
<div class="form-group row mt-3">
    <div class="col-sm-12">
        <label for="">Rute</label>
        <input type="text" name="asuhan[asdewasa_rute]" class="form-control" value="{{$asuhan_gizi_dewasa->asdewasa_rute}}">
    </div>
</div>
<div class="form-group row mt-3">
    <div class="col-sm-4 pr-0">
        <label for="">Jenis Makanan / Diet</label>
        <input type="text" name="asuhan[asdewasa_jenis_makanan]" class="form-control" value="{{$asuhan_gizi_dewasa->asdewasa_jenis_makanan}}">
    </div>
    <div class="col-sm-4 pr-0">
        <label for="">Frekuensi</label>
        <input type="text" name="asuhan[asdewasa_frekuensi]" class="form-control" value="{{$asuhan_gizi_dewasa->asdewasa_frekuensi}}">
    </div>
    <div class="col-sm-4">
        <label for="">Jadwal Makanan</label>
        <input type="text" name="asuhan[asdewasa_jadwal_makanan]" class="form-control" value="{{$asuhan_gizi_dewasa->asdewasa_jadwal_makanan}}">
    </div>
</div>
<div class="form-group mt-3">
    <label for="" class="d-flex justify-content-center"><h4><b>(ME) Monitoring dan Evaluasi</b></h4></label>
</div>
<div class="btn-group mb-3">
    <button type="button" class="btn btn-primary btn-add-row" data-toggle="modal" data-target="#modalMonitoringEvaluasiGizi">
        Tambah Monitoring dan Evaluasi Gizi
    </button>
</div>
<input type="hidden" id="monitoring_evaluasi_gizi_data" value="{{$monitoring_evaluasi_gizi_dewasa}}">

<div class="table-responsive">
    <table class="table table-bordered w-100" id="t_monitoring_asuhan_gizi_dewasa">
        <thead class="bg-warning font-weight-bold text-center text-black">
            <tr>
                <th style="10px">Tanggal</th>
                <th>Monitoring dan evaluasi gizi</th>
                <th>Terapi Diet</th>
                <th>Nama Dietisien</th>
                <th>Paraf Dietisien</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>
</div>

<div class="form-group mt-3 text-right">
    <button type="button" class="btn btn-primary" onclick="StoreAsuhanGiziDewasa()">
         Simpan
    </button>
</div>
