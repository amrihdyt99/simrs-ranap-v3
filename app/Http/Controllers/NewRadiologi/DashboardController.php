<?php

namespace App\Http\Controllers\NewRadiologi;

use App\Http\Controllers\Controller;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;
use App\Traits\HttpRequestTraits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;
use App\Models\MRegistrasi;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    use HttpRequestTraits;

    public function index(Request $request)
    {
        try {
            $startDate = $request->input('start_date', date('Y-m-d', strtotime('-7 days')));
            $endDate = $request->input('end_date', date('Y-m-d'));

            $apiUrl = 'https://rsud.sumselprov.go.id/simrs-rajal/api/lab/patient';
            $params = [
                'params' => [
                    [
                        'key' => 'a.created_at',
                        'value' => $startDate,
                        'method' => 'whereDate',
                        'range' => '>='
                    ],
                    [
                        'key' => 'a.created_at',
                        'value' => $endDate,
                        'method' => 'whereDate',
                        'range' => '<='
                    ]
                ]
            ];

            Log::info('API Request:', ['url' => $apiUrl, 'params' => $params]);

            $response = Http::get($apiUrl, $params);

            Log::info('API Response Status: ' . $response->status());
            Log::info('API Response Headers:', $response->headers());
            Log::info('API Response Body:', ['body' => $response->body()]);

            if ($response->successful()) {
                $labOrders = $response->json();

                if (empty($labOrders) || !is_array($labOrders)) {
                    Log::warning('API returned empty or invalid response', ['response' => $labOrders]);
                    return view('radiologi.dashboard', ['mergedData' => collect(), 'message' => 'Tidak ada data yang ditemukan atau format respons tidak valid.']);
                }
                $regNos = collect($labOrders)->pluck('registration_no')->toArray();

                $registrations = DB::connection('mysql2')
                    ->table('m_registrasi')
                    ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
                    ->whereIn('m_registrasi.reg_lama', $regNos)
                    ->select('m_registrasi.reg_lama', 'm_registrasi.reg_no', 'm_pasien.PatientName', 'm_registrasi.reg_medrec')
                    ->get();

                Log::info('Local database query result:', $registrations->toArray());

                $mergedData = collect($labOrders)->map(function ($order) use ($registrations) {
                    $registration = $registrations->firstWhere('reg_lama', $order['registration_no']);
                    $mergedOrder = array_merge($order, [
                        'local_reg_no' => $registration ? $registration->reg_no : null,
                        'patient_name' => $registration ? $registration->PatientName : null,
                    ]);
                    Log::info('Merged order:', $mergedOrder);
                    return $mergedOrder;
                });

                return view('radiologi.dashboard', compact('mergedData', 'startDate', 'endDate'));
            } else {
                Log::error('API request failed', ['status' => $response->status(), 'body' => $response->body()]);
                return view('radiologi.dashboard', ['mergedData' => collect(), 'error' => 'Gagal mengambil data dari API. Status: ' . $response->status()]);
            }
        } catch (\Exception $e) {
            Log::error('Error in dashboard: ' . $e->getMessage());
            return view('radiologi.dashboard', ['mergedData' => collect(), 'error' => 'Terjadi kesalahan saat mengambil data: ' . $e->getMessage()]);
        }
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
                    . route('radiologi.patient.summary-v2', ['reg_no' => $query->reg_no])
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