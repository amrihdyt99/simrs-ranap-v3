<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title text-sm">Resume Pasien</h3>
    </div>

    <div class="card-body">
        <div>
            <span class="text-sm text-muted">Nomor Registrasi</span><br>
            <strong class="text-sm">
                {{$patient->reg_no}}
            </strong>
        </div>
        <hr style="margin: 10px 0px 10px 0px">
        <div>
            <span class="text-muted text-sm">MRN</span><br>
            <strong class="text-sm">{{$patient->medrec}}</strong>
        </div>
        <hr style="margin: 10px 0px 10px 0px">
        <div>
            <span class="text-muted text-sm">Nama Pasien</span><br>
            <strong class="text-sm">{{$patient->pasien->PatientName}}</strong>
        </div>
        <hr style="margin: 10px 0px 10px 0px">
        <div>
            <span class="text-muted text-sm">Departemen</span><br>
            <strong class="text-sm">Inpatient</strong>
        </div>
        <hr style="margin: 10px 0px 10px 0px">
        <div>
            <span class="text-muted text-sm">Status</span><br>
            <strong class="text-sm">{{$patient->departemen_asal}}</strong>
        </div>
        <hr style="margin: 10px 0px 10px 0px">
        <div>
            <span class="text-muted text-sm">Tanggal Lahir</span><br>
            <strong class="text-sm">{{$patient->pasien->DateOfBirth}}</strong>
        </div>
        <hr style="margin: 10px 0px 10px 0px">
        <div>
            <span class="text-muted text-sm">Jenis Kelamin</span><br>
            <strong class="text-sm">{{$patient->pasien->GCSex}}</strong>
        </div>
        <hr style="margin: 10px 0px 10px 0px">
        <div>
            <span class="text-muted text-sm">Umur</span><br>
            <strong class="text-sm">{{ $patient->pasien->age }}</strong>
        </div>
        <hr style="margin: 10px 0px 10px 0px">
        <div>
            <span class="text-muted text-sm">Metode Pembayaran</span><br>
            <strong class="text-sm">{{ $patient->metode_bayar }}</strong>
        </div>
    </div>
    <!-- /.card-body -->
</div>
