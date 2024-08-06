<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title text-sm">Resume Pasien</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div>
            <span class="text-sm text-muted">Registration No</span><br>
            <strong class="text-sm">
                {{$registrationInap->reg_no}}
            </strong>
        </div>
        <hr style="margin: 10px 0px 10px 0px">
        <div>
            <span class="text-muted text-sm">MRN</span><br>
            <strong class="text-sm">{{$registrationInap->medrec}}</strong>
        </div>
        <hr style="margin: 10px 0px 10px 0px">
        <div>
            <span class="text-muted text-sm">Patient's Name</span><br>
            <strong class="text-sm">{{$registrationInap->pasien->PatientName}}</strong>
        </div>
        <hr style="margin: 10px 0px 10px 0px">
        <div>
            <span class="text-muted text-sm">Department</span><br>
            <strong class="text-sm">Inpatient</strong>
        </div>
        <hr style="margin: 10px 0px 10px 0px">
        <div>
            <span class="text-muted text-sm">Status</span><br>
            <strong class="text-sm">{{$registrationInap->departemen_asal}}</strong>
        </div>
        <hr style="margin: 10px 0px 10px 0px">
        <div>
            <span class="text-muted text-sm">Born Date</span><br>
            <strong class="text-sm">{{$registrationInap->pasien->DateOfBirth}}</strong>
        </div>
        <hr style="margin: 10px 0px 10px 0px">
        <div>
            <span class="text-muted text-sm">Sex</span><br>
            <strong class="text-sm">{{$registrationInap->pasien->GCSex}}</strong>
        </div>
        <hr style="margin: 10px 0px 10px 0px">
        <div>
            <span class="text-muted text-sm">Age</span><br>
            <strong class="text-sm">{{ $registrationInap->pasien->age }}</strong>
        </div>
        <hr style="margin: 10px 0px 10px 0px">
        <div>
            <span class="text-muted text-sm">Payer</span><br>
            <strong class="text-sm">{{ $registrationInap->metode_bayar }}</strong>
        </div>
    </div>
    <!-- /.card-body -->
</div>
