@empty($observasi_paska)
@php
   $observasi_paska = optional((object)[]);
@endphp
@endempty
<form id="observasi_paska_tindakan">
    <div class="container">
        <h2>Lembar Observasi Paska Kateterisasi</h2>

        <div class="form-group">
            <label class="label-bold">Observasi TD, Nadi, dan Pernafasan, Saturasi Oksigen:</label>
        </div>

        <div class="form-group">
            <label for="tanggal_observasi">Tanggal Observasi:</label>
            <input type="date" class="form-control" id="tanggal_observasi" name="tanggal_observasi" value="{{$observasi_paska->tanggal_observasi}}">
        </div>

        <div class="form-group">
            <label for="waktu_observasi">Waktu Observasi:</label>
            <input type="time" class="form-control" id="waktu_observasi" name="waktu_observasi" min="09:00" max="23:59" value="{{$observasi_paska->waktu_observasi}}">
        </div>

        <div class="form-group">
            <label for="tekanan_darah">Tekanan Darah:</label>
            <input type="text" class="form-control" id="tekanan_darah" name="tekanan_darah" value="{{$observasi_paska->tekanan_darah}}">
        </div>

        <div class="form-group">
            <label for="nadi">Nadi:</label>
            <input type="text" class="form-control" id="nadi" name="nadi" value="{{$observasi_paska->nadi}}">
        </div>

        <div class="form-group">
            <label for="pernapasan">Pernafasan:</label>
            <input type="text" class="form-control" id="pernapasan" name="pernapasan" value="{{$observasi_paska->pernapasan}}">
        </div>

        <div class="form-group">
            <label for="spo2">Saturasi Oksigen:</label>
            <input type="text" class="form-control" id="spo2" name="spo2" value="{{$observasi_paska->spo2}}">
        </div>

        <div class="form-group">
            <label class="label-bold">Sirkulasi:</label>
        </div>

        <div class="form-group">
            <label for="tanggal_sirkulasi">Tanggal Sirkulasi:</label>
            <input type="date" class="form-control" id="tanggal_sirkulasi" name="tanggal_sirkulasi" value="{{$observasi_paska->tanggal_sirkulasi}}">
        </div>

        <div class="form-group">
            <label for="waktu_sirkulasi">Waktu Sirkulasi:</label>
            <input type="time" class="form-control" id="waktu_sirkulasi" name="waktu_sirkulasi" value="{{$observasi_paska->waktu_sirkulasi}}">
        </div>

        <div class="form-group">
            <label for="nadi_sirkulasi">Nadi Sirkulasi:</label>
            <input type="text" class="form-control" id="nadi_sirkulasi" name="nadi_sirkulasi" value="{{$observasi_paska->nadi_sirkulasi}}">
        </div>

        <div class="form-group">
            <label for="suhu_kulit">Suhu Kulit:</label>
            <input type="text" class="form-control" id="suhu_kulit" name="suhu_kulit" value="{{$observasi_paska->suhu_kulit}}">
        </div>

        <div class="form-group">
            <label for="warna">Warna:</label>
            <input type="text" class="form-control" id="warna" name="warna" value="{{$observasi_paska->warna}}">
        </div>

        <div class="form-group">
            <label for="isi_nadi">Isi Nadi:</label>
            <input type="text" class="form-control" id="isi_nadi" name="isi_nadi" value="{{$observasi_paska->isi_nadi}}">
        </div>

        <div class="form-group">
            <label for="sensasi">Sensasi:</label>
            <input type="text" class="form-control" id="sensasi" name="sensasi" value="{{$observasi_paska->sensasi}}">
        </div>

        <div class="form-group">
            <label for="pergerakan">Pergerakan:</label>
            <input type="text" class="form-control" id="pergerakan" name="pergerakan" value="{{$observasi_paska->pergerakan}}">
        </div>

        <div class="form-group">
            <label for="pendarahan_lipat_paha">Pendarahan Lipat Paha:</label>
            <input type="text" class="form-control" id="pendarahan_lipat_paha" name="pendarahan_lipat_paha" value="{{$observasi_paska->pendarahan_lipat_paha}}">
        </div>

        <div class="form-group">
            <label for="hematoma">Hematoma:</label>
            <input type="text" class="form-control" id="hematoma" name="hematoma" value="{{$observasi_paska->hematoma}}">
        </div>

        <div class="form-group">
            <button type="button" class="btn btn-primary" onclick="simpanObservasiPaskaTindakan()">Submit</button>
        </div>
    </div>
</form>
