<?php

namespace App\Http\Controllers\Farmasi;

use App\Http\Controllers\Controller;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;
use App\Traits\HttpRequestTraits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    use HttpRequestTraits;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->ajax_index($request);
        }
        return view('farmasi.dashboard');
    }

    public function ajax_index($request)
    {
        // $business_partner = (object)$this->fetchApi('http://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/business')['data'] ?? [];

        $datamypatient = DB::connection('mysql2')
            ->table("m_registrasi")
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('m_ruangan', 'm_registrasi.reg_ruangan', '=', 'm_ruangan.RoomID')
            ->leftJoin('m_kelas_ruangan_baru', 'm_registrasi.bed', '=', 'm_kelas_ruangan_baru.id')
            ->where('m_registrasi.reg_discharge', '!=', '3')
            ->whereNull('m_registrasi.reg_deleted')
            ->when($request->nama_ruangan !== null, function ($query) use ($request) {
                return $query->where('m_ruangan.RoomID', $request->nama_ruangan);
            })
            ->when($request->reg_tgl !== null, function ($query) use ($request) {
                return $query->where('m_registrasi.reg_tgl', Carbon::createFromFormat('d/m/Y', $request->reg_tgl)->format('Y-m-d'));
            })
            ->select([
                'm_pasien.PatientName',
                'm_registrasi.reg_medrec',
                'm_registrasi.reg_no',
                'm_paramedis.ParamedicName',
                'm_ruangan.RoomName',
                'm_registrasi.reg_cara_bayar',
                'm_registrasi.reg_tgl',
            ])
            ->orderByDesc('m_registrasi.reg_tgl');

        return DataTables()
            ->of($datamypatient)
            ->editColumn('reg_cara_bayar', function ($query) {
                $businessPartner = DB::connection('mysql2')
                    ->table('businesspartner')
                    ->where('id', $query->reg_cara_bayar)
                    ->first();

                return $businessPartner ? $businessPartner->BusinessPartnerName : '-';
            })
            ->editColumn('aksi_data', function ($query) use ($request) {
                return ('<a href="'
                    . route('farmasi.patient.summary-v2', ['reg_no' => $query->reg_no])
                    . '" class="btn btn-sm btn-outline-primary"><i class="mr-2 fa fa-clipboard-check"></i>Periksa</a>');
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function data_table(Request $request, $ruang)
    {
        $dokter_code = auth()->user()->dokter_id;

        $datamypatient = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin(
                DB::raw('(SELECT RegNo, ToUnitServiceID, ToClassCode
                                FROM m_bed_history
                                WHERE id = (SELECT MAX(id) FROM m_bed_history bh WHERE bh.RegNo = m_bed_history.RegNo))
                                as m_bed_history'),
                'm_registrasi.reg_no',
                'm_bed_history.RegNo'
            )
            ->leftJoin('m_unit_departemen as udep', 'udep.ServiceUnitID', 'm_bed_history.ToUnitServiceID')
            ->leftJoin('m_unit', 'udep.ServiceUnitCode', 'm_unit.ServiceUnitCode');

        $datamypatient = $datamypatient->where('m_registrasi.reg_discharge', '!=', '3')
            ->whereRaw("
                    (m_bed_history.ToUnitServiceID = ? or m_unit.ServiceUnitCode = ?)
                ", [(int) $ruang, $ruang]);

        $datamypatient = $datamypatient
            ->select([
                'm_registrasi.reg_medrec',
                'm_registrasi.reg_no',
                'm_registrasi.reg_tgl',
                'm_registrasi.reg_jam',
                'm_registrasi.reg_dokter_care',
                'm_registrasi.reg_perawat_care',

                DB::raw("(select " . getLimit()[0] . " PatientName from " . getDatabase('master') . ".m_pasien where MedicalNo = reg_medrec " . getLimit()[1] . ") as PatientName"),
                DB::raw("(select " . getLimit()[0] . " ParamedicName from " . getDatabase('master') . ".m_paramedis where ParamedicCode = reg_dokter " . getLimit()[1] . ") as ParamedicName"),
                DB::raw("(select " . getLimit()[0] . " BusinessPartnerName from " . getDatabase('master') . ".businesspartner where id = reg_cara_bayar " . getLimit()[1] . ") as reg_cara_bayar"),
            ])
            ->limit(200)
            ->get();


        foreach ($datamypatient as $key => $value) {
            $current = getCurrentLocation($value->reg_no);

            $datamypatient[$key]->service_unit = $current['ServiceUnitID'] ?? null;
            $datamypatient[$key]->ServiceUnitName = $current['ServiceUnitName'] ?? null;
            $datamypatient[$key]->RoomName = $current['RoomName'] ?? null;
            $datamypatient[$key]->room_id = $current['RoomID'] ?? null;
            $datamypatient[$key]->currentdt = $current;

            $datamypatient[$key]->physicianTeam = DB::connection('mysql2')
                ->table('m_physician_team')
                ->where('reg_no', $value->reg_no)
                ->select([
                    DB::raw("(select " . getLimit()[0] . " ParamedicName from " . getDatabase('master') . ".m_paramedis where ParamedicCode = kode_dokter " . getLimit()[1] . ") as ParamedicName"),
                    'kategori',
                    'kode_dokter'
                ])
                ->get() ?? [];
        }


        if (isset($request->no_ajax)) {
            return $datamypatient;
        }

        $noData = $datamypatient->isEmpty();

        return view('farmasi.table', compact('datamypatient', 'noData'));
    }


    public function data_table_(Request $request, $ruang)
    {
        $datamypatient = DB::connection('mysql2')
            ->table("m_registrasi")
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('m_bed', 'm_registrasi.reg_no', '=', 'm_bed.registration_no')
            ->leftJoin('m_ruangan', 'm_ruangan.RoomID', '=', 'm_bed.room_id')
            ->leftJoin('m_room_class', 'm_room_class.ClassCode', '=', 'm_bed.class_code')
            ->leftJoin('m_unit_departemen', 'm_unit_departemen.ServiceUnitID', '=', 'm_bed.service_unit_id')
            ->leftJoin('m_unit', 'm_unit_departemen.ServiceUnitCode', '=', 'm_unit.ServiceUnitCode')
            ->leftJoin('businesspartner', 'businesspartner.id', '=', 'm_registrasi.reg_cara_bayar')
            ->leftJoin('m_physician_team', 'm_registrasi.reg_no', '=', 'm_physician_team.reg_no')
            ->leftJoin('m_paramedis as physician', 'm_physician_team.kode_dokter', '=', 'physician.ParamedicCode')
            ->where('m_registrasi.reg_discharge', '!=', '3')
            ->whereNull('m_registrasi.reg_deleted')
            ->whereRaw("(m_bed.service_unit_id = ? or m_unit.ServiceUnitCode = ?)", [$ruang, $ruang])
            ->select([
                'm_pasien.PatientName',
                'm_registrasi.reg_medrec',
                'm_registrasi.reg_no',
                'm_registrasi.reg_dokter',
                'm_paramedis.ParamedicName',
                DB::raw("(select ServiceUnitName from m_unit where ServiceUnitCode = '" . $ruang . "') as ServiceUnitName"),
                'businesspartner.BusinessPartnerName as reg_cara_bayar',
                'm_registrasi.reg_tgl',
                'm_registrasi.reg_jam',
                'm_ruangan.RoomName',
                'm_registrasi.service_unit',
                'm_registrasi.reg_perawat_care',
                'm_bed.room_id',
                DB::raw('GROUP_CONCAT(DISTINCT CASE WHEN m_physician_team.kode_dokter != m_registrasi.reg_dokter THEN physician.ParamedicName END SEPARATOR "|") as physician_team'),
            ])
            ->groupBy([
                'm_pasien.PatientName',
                'm_registrasi.reg_medrec',
                'm_registrasi.reg_no',
                'm_registrasi.reg_dokter',
                'm_paramedis.ParamedicName',
                'businesspartner.BusinessPartnerName',
                'm_registrasi.reg_tgl',
                'm_registrasi.reg_jam',
                'm_ruangan.RoomName',
                'm_bed.room_id',
                'm_registrasi.service_unit',
                'm_registrasi.reg_perawat_care',
            ])
            ->orderByDesc('m_registrasi.reg_tgl')
            ->get();

        $noData = $datamypatient->isEmpty();

        return view('farmasi.table', compact('datamypatient', 'noData'));
    }

    // public function dashboard()
    // {
    //     $datamypatient=DB::connection('mysql2')
    //         ->table('m_registrasi')
    //         ->leftJoin('m_pasien','m_registrasi.reg_medrec','=','m_pasien.MedicalNo')
    //         ->leftJoin('m_paramedis','m_registrasi.reg_dokter','=','m_paramedis.ParamedicCode')
    //         ->leftJoin('m_ruangan_baru','m_registrasi.service_unit','=','m_ruangan_baru.id')
    //         ->leftJoin('m_kelas_ruangan_baru','m_registrasi.bed','=','m_kelas_ruangan_baru.id')
    //         ->where('m_registrasi.reg_discharge','!=','3')
    //         ->orderByDesc('m_registrasi.reg_tgl')
    //         ->get();
    //     return view('perawat.pages.dashboard',['myPatient' => $datamypatient, 'myArea' => $datamypatient]);
    // }

    public function saveShift(Request $request)
    {
        $request->validate([
            'shift' => 'required|string',
        ]);

        session()->forget('user_shift');

        session(['user_shift' => $request->shift]);

        return response()->json(['success' => true]);
    }





    // public function dashboard()
    // {
    //     $datamypatient=DB::connection('mysql2')
    //         ->table('m_registrasi')
    //         ->leftJoin('m_pasien','m_registrasi.reg_medrec','=','m_pasien.MedicalNo')
    //         ->leftJoin('m_paramedis','m_registrasi.reg_dokter','=','m_paramedis.ParamedicCode')
    //         ->leftJoin('m_ruangan_baru','m_registrasi.service_unit','=','m_ruangan_baru.id')
    //         ->leftJoin('m_kelas_ruangan_baru','m_registrasi.bed','=','m_kelas_ruangan_baru.id')
    //         ->where('m_registrasi.reg_discharge','!=','3')
    //         ->orderByDesc('m_registrasi.reg_tgl')
    //         ->get();
    //     return view('perawat.pages.dashboard',['myPatient' => $datamypatient, 'myArea' => $datamypatient]);
    // }
}
