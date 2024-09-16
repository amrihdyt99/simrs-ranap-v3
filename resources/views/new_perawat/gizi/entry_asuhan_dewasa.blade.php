@empty($asuhan_gizi_dewasa)
@php
   $asuhan_gizi_dewasa = optional((object)[]);
@endphp
@endempty
<div class="form-group mt-3">
    <label for="" class="d-flex justify-content-center"><h4><b>(A) Asesmen Gizi</b></h4></label>
    <textarea name="asdewasa_assesment" cols="30" rows="4" class="form-control">{{$asuhan_gizi_dewasa->asdewasa_assesment}}</textarea>
</div>
<div class="form-group mt-3">
    <label for="" class="d-flex justify-content-center"><h4><b>(D) Diagnosa Gizi</b></h4></label>
</div>
<table class="table table-bordered">
    <thead class="bg-warning font-weight-bold text-center">
        <tr>
            <th>Masalah</th>
            <th>Berkaitan Dengan</th>
            <th>Ditandai Dengan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="t_asuhan_gizi_dewasa">
        {!!$asuhan_gizi_dewasa->asdewasa_diagnosa!!}
        <tr>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td class="bg-info text-center text-white" id="add-row-asuhan-dewasa" style="cursor: pointer"><i class="fas fa-plus"></i></td>
        </tr>
    </tbody>
</table>
<div class="form-group mt-3">
    <label for="" class="d-flex justify-content-center"><h4><b>(I) Intervensi Gizi</b></h4></label>
</div>
<div class="row mt-3">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Tujuan</legend>
    <div class="col-sm-10">
        <div class="form-group">
            <textarea name="asdewasa_tujuan" cols="30" rows="4" class="form-control">{{$asuhan_gizi_dewasa->asdewasa_tujuan}}</textarea>
        </div>
    </div>
</div>
<div class="row mt-3">
    <legend class="col-form-label col-sm-2 ptx-0 pt-1">Kebutuhan</legend>
    <div class="col-sm-10">
        <div class="form-group row">
            <div class="col-sm-3 pr-0">
                <label for="">Energi (kkal/hari)</label>
                <input type="number" name="asdewasa_energi" class="form-control" value="{{$asuhan_gizi_dewasa->asdewasa_energi}}">
            </div>
            <div class="col-sm-3 pr-0">
                <label for="">Protein (g/hari)</label>
                <input type="number" name="asdewasa_protein" class="form-control" value="{{$asuhan_gizi_dewasa->asdewasa_protein}}">
            </div>
            <div class="col-sm-3 pr-0">
                <label for="">KH (gr/kkal)</label>
                <input type="number" name="asdewasa_kh" class="form-control" value="{{$asuhan_gizi_dewasa->asdewasa_kh}}">
            </div>
            <div class="col-sm-3">
                <label for="">Lemak (gr/kkal)</label>
                <input type="number" name="asdewasa_lemak" class="form-control" value="{{$asuhan_gizi_dewasa->asdewasa_lemak}}">
            </div>
        </div>
    </div>
</div>
<div class="form-group row mt-3">
    <div class="col-sm-12">
        <label for="">Rute</label>
        <input type="text" name="asdewasa_rute" class="form-control" value="{{$asuhan_gizi_dewasa->asdewasa_rute}}">
    </div>
</div>
<div class="form-group row mt-3">
    <div class="col-sm-4 pr-0">
        <label for="">Jenis Makanan / Diet</label>
        <input type="text" name="asdewasa_jenis_makanan" class="form-control" value="{{$asuhan_gizi_dewasa->asdewasa_jenis_makanan}}">
    </div>
    <div class="col-sm-4 pr-0">
        <label for="">Frekuensi</label>
        <input type="text" name="asdewasa_frekuensi" class="form-control" value="{{$asuhan_gizi_dewasa->asdewasa_frekuensi}}">
    </div>
    <div class="col-sm-4">
        <label for="">Jadwal Makanan</label>
        <input type="text" name="asdewasa_jadwal_makanan" class="form-control" value="{{$asuhan_gizi_dewasa->asdewasa_jadwal_makanan}}">
    </div>
</div>
<div class="form-group mt-3">
    <label for="" class="d-flex justify-content-center"><h4><b>(ME) Monitoring dan Evaluasi</b></h4></label>
</div>
<table class="table table-bordered">
    <thead class="bg-warning font-weight-bold text-center">
        <tr>
            <th>Tanggal</th>
            <th>Monitoring dan evaluasi gizi</th>
            <th>Terapi Diet</th>
            <th>Nama dan Paraf Dietisien</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="t_monitoring_asuhan_gizi_dewasa">
        {!!$asuhan_gizi_dewasa->asdewasa_monitoring_evaluasi!!}
        <tr>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td contenteditable="true"></td>
            <td class="bg-info text-center text-white" id="add-row-monitoring-asuhan-dewasa" style="cursor: pointer"><i class="fas fa-plus"></i></td>
        </tr>
    </tbody>
</table>
<div class="float-right mt-5">
    <button type="button" class="btn btn-success" id="save_asesmen_gizi">Simpan</button>
</div>
