<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use App\Models\RegistrationInap;
use App\Traits\HttpRequestTraits;
use Illuminate\Http\Request;
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
        return view('perawat.pages.dashboard');
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
                    . route('perawat.patient.summary-v2', ['reg_no' => $query->reg_no])
                    . '" class="btn btn-sm btn-outline-primary"><i class="mr-2 fa fa-clipboard-check"></i>Periksa</a>');
            })
            ->escapeColumns([])
            ->toJson();
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

}
