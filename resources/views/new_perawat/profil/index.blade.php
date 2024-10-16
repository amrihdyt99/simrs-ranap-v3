<span class="badge badge-warning blink" id="alert_blink">alert</span>
<div class="form-group-left text-center" id="alert_indikator">

</div>
<div class="form-group-left">
    <h6>Early Warning System (EWS)</h6>
    <div class="text-center mb-2" id="ews_info">
    </div>
</div>
<div class="form-group-left">
    <h6>No Registrasi</h6>
    <h3>{{$reg}}</h3>
</div>
<div class="form-group-left">
    <h6>No Rekam Medis</h6>
    <h3 id="p_medrec">{{$dataPasien->MedicalNo}}</h3>
</div>
<div class="form-group-left">
    <h6>Nama Pasien</h6>
    <h3 id="p_nama">{{$dataPasien->PatientName}}</h3>
    <a class="btn btn-secondary btn-sm" href="{{ route('perawat.patient_detail', [$dataPasien->MedicalNo]) }}" target="_blank">Detail Pasien</a>
</div>
<div class="form-group-left">
    <h6>Tanggal lahir</h6>
    <h3 id="p_tgl_lahir">{{app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->carbon_format_day_date_id($dataPasien->DateOfBirth)}}</h3>
</div>
<div class="form-group-left">
    <h6>Jenis Kelamin</h6>
    <h3 id="p_jk">{{app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->jenis_kelamin_sphaira($dataPasien->GCSex)}}</h3>
</div>
<div class="form-group-left">
    <h6>Umur</h6>
    <h3 id="p_umur">{{app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->kalkulasi_umur($dataPasien->DateOfBirth,'tahun_bulan_hari')}}</h3>
</div>
<div class="form-group-left">
    <h6>Tanggal Masuk</h6>
    <h3 id="p_tgl_kunjungan">{{app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->carbon_format_day_date_id($dataPasien->reg_tgl)}}</h3>
</div>
@php
$dokter = DB::connection('mysql2')->table('m_paramedis')->where('ParamedicCode',$dataPasien->reg_dokter)->first();
if(!$dokter){
$dokter = optional((object)[]);
}
@endphp
<div class="form-group-left">
    <h6>DPJP Utama</h6>
    <h3 id="p_dokter">{{ $dokter->ParamedicName}}</h3>
</div>
<div class="form-group-left">
    <h6>Ruang Rawat</h6>
    @php
    $latest = DB::connection('mysql2')->table('m_bed_history')
        ->where('m_bed_history.RegNo', $dataPasien->reg_no)
        ->orderBy('m_bed_history.ReceiveTransferDate', 'desc')
        ->orderBy('m_bed_history.ReceiveTransferTime', 'desc')
        ->first();

    if ($latest) {
        $ruang = DB::connection('mysql2')->table('m_bed')
            ->join('m_ruangan', 'm_ruangan.RoomID', '=', 'm_bed.room_id')
            ->join('m_room_class', 'm_room_class.ClassCode', '=', 'm_bed.class_code')
            ->join('m_unit_departemen', 'm_unit_departemen.ServiceUnitID', '=', 'm_bed.service_unit_id')
            ->join('m_unit', 'm_unit_departemen.ServiceUnitCode', '=', 'm_unit.ServiceUnitCode')
            ->select('bed_id', 'bed_code', 'room_id', 'class_code', 'RoomName as ruang', 'ServiceUnitName as kelompok', 'm_room_class.ClassName as kelas')
            ->where('bed_id', $latest->ToBedID)
            ->first();
    }

    if (!isset($ruang) || !$ruang) {
        $ruang = optional((object)[]);
    }
    @endphp
    <h3 id="p_poli">
        {{$ruang->kelompok}} [{{$ruang->bed_code}}]
    </h3>
</div>