<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController;
use App\Models\PasienCPOEImaging;
use App\Models\PasienCPOELaboratory;
use App\Models\PasienSoapDok;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dttb_mode = $request->mode;
            if ($dttb_mode === 'index1') {
                return $this->ajax_index($request);
            } elseif ($dttb_mode === 'index2') {
                return $this->ajax_index2($request);
            }
        }
        return view('dokter.pages.dashboard');
    }

    public function data_table(Request $request, $type, $ruang)
    {
        $dokter_code = auth()->user()->dokter_id;
    
        if ($type == 'area') {
            $datamypatient = DB::connection('mysql2')
            ->table("m_registrasi")
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('m_bed', 'm_registrasi.reg_no', '=', 'm_bed.registration_no')
            ->leftJoin('m_ruangan', 'm_ruangan.RoomID', '=', 'm_bed.room_id')
            ->leftJoin('m_room_class', 'm_room_class.ClassCode', '=', 'm_bed.class_code')
            ->leftJoin('m_unit_departemen', 'm_unit_departemen.ServiceUnitCode', '=', 'm_bed.service_unit_id')
            ->leftJoin('m_unit', 'm_unit_departemen.ServiceUnitCode', '=', 'm_unit.ServiceUnitCode')
            ->leftJoin('businesspartner', 'businesspartner.id', '=', 'm_registrasi.reg_cara_bayar')
            ->leftJoin('m_physician_team', 'm_registrasi.reg_no', '=', 'm_physician_team.reg_no')
            ->leftJoin('m_paramedis as physician', 'm_physician_team.kode_dokter', '=', 'physician.ParamedicCode')
            ->where('m_registrasi.reg_discharge', '!=', '3')
            ->whereRaw("
                (reg_dokter_care is null or reg_dokter_care not like ?) 
                and (m_bed.service_unit_id = ? or m_registrasi.service_unit = ?)
            ", ['%' . $dokter_code . '%', $ruang, $ruang])
            ->where(function ($query) {
                $query->where('m_registrasi.reg_dokter', Auth::user()->dokter_id) // Dokter utama
                      ->orWhereExists(function ($subQuery) {
                          $subQuery->select(DB::raw(1))
                                   ->from('m_physician_team')
                                   ->where('m_physician_team.kode_dokter', Auth::user()->dokter_id)
                                   ->whereColumn('m_physician_team.reg_no', 'm_registrasi.reg_no');
                      });
            })
            ->select([
                'm_pasien.PatientName',
                'm_registrasi.reg_medrec',
                'm_registrasi.reg_no',
                'm_paramedis.ParamedicName',
                // 'ServiceUnitName as nama_ruangan',
                DB::raw("(select ServiceUnitName from m_unit where ServiceUnitCode = '".$ruang."') as nama_ruangan"),
                'businesspartner.BusinessPartnerName as reg_cara_bayar',
                'm_registrasi.reg_tgl',
                'm_registrasi.reg_jam',
                DB::raw('GROUP_CONCAT(DISTINCT physician.ParamedicName SEPARATOR "| ") as physician_team'),
                DB::raw("
                    (
                        select CONCAT('[', GROUP_CONCAT(CONCAT('\"', kategori, '\"') ORDER BY kategori ASC SEPARATOR ', '), ']')
                        from ".getUni()->db_connection_mysql2()->getDatabaseName().".m_physician_team 
                        where kode_dokter = '".$dokter_code."'
                        and reg_no = m_registrasi.reg_no
                    ) as physician_team_role
                ")
            ])
            ->groupBy([
                'm_pasien.PatientName',
                'm_registrasi.reg_medrec',
                'm_registrasi.reg_no',
                'm_paramedis.ParamedicName',
                'ServiceUnitName',
                'businesspartner.BusinessPartnerName',
                'm_registrasi.reg_tgl',
                'm_registrasi.reg_jam'
            ])
            ->orderByDesc('m_registrasi.reg_tgl');
        
        
        } else {
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
            ->leftJoin('m_paramedis as physician', 'm_physician_team.kode_dokter', '=', 'physician.ParamedicCode');

            if (isset($request->params)) {
                foreach ($request->params as $key => $value) {
                    $datamypatient = $datamypatient->where($value['key'], $value['value']);
                }
            }
            
            $datamypatient = $datamypatient->where('m_registrasi.reg_discharge', '!=', '3')
            ->whereRaw("
                (reg_dokter_care = '' or reg_dokter_care like ?) 
                and (m_bed.service_unit_id = ? or m_registrasi.service_unit = ?)
            ", ['%' . $dokter_code . '%', $ruang, $ruang])
            ->where(function ($query) {
                $query->where('m_registrasi.reg_dokter', Auth::user()->dokter_id)
                      ->orWhereExists(function ($subQuery) {
                          $subQuery->select(DB::raw(1))
                                   ->from('m_physician_team')
                                   ->where('m_physician_team.kode_dokter', Auth::user()->dokter_id)
                                   ->whereColumn('m_physician_team.reg_no', 'm_registrasi.reg_no');
                      });
            })
            ->select([
                'm_pasien.PatientName',
                'm_registrasi.reg_medrec',
                'm_registrasi.reg_no',
                'm_paramedis.ParamedicName',
                'ServiceUnitName as nama_ruangan',
                'businesspartner.BusinessPartnerName as reg_cara_bayar',
                'm_registrasi.reg_tgl',
                'm_registrasi.reg_jam',
                DB::raw('GROUP_CONCAT(DISTINCT physician.ParamedicName SEPARATOR "| ") as physician_team'),
                DB::raw("
                    (
                        select CONCAT('[', GROUP_CONCAT(CONCAT('\"', kategori, '\"') ORDER BY kategori ASC SEPARATOR ', '), ']')
                        from ".getUni()->db_connection_mysql2()->getDatabaseName().".m_physician_team 
                        where kode_dokter = '".$dokter_code."'
                        and reg_no = m_registrasi.reg_no
                    ) as physician_team_role
                ")
            ])
            ->groupBy([
                'm_pasien.PatientName',
                'm_registrasi.reg_medrec',
                'm_registrasi.reg_no',
                'm_paramedis.ParamedicName',
                'ServiceUnitName',
                'businesspartner.BusinessPartnerName',
                'm_registrasi.reg_tgl',
                'm_registrasi.reg_jam'
            ])
            ->orderByDesc('m_registrasi.reg_tgl');
        
        
        }
        $data = $datamypatient->get();

        if (isset($request->no_ajax)) {
            return $data;
        }

        return view('dokter.pages.table', compact('data', 'type'));
    }
    
    

    public function ajax_index($request)
    {
        $datamypatient = DB::connection('mysql2')
            ->table("m_registrasi")
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('m_ruangan_baru', 'm_registrasi.service_unit', '=', 'm_ruangan_baru.id')
            ->leftJoin('m_kelas_ruangan_baru', 'm_registrasi.bed', '=', 'm_kelas_ruangan_baru.id')
            ->where('m_registrasi.reg_discharge', '!=', '3')
            ->select([
                'm_pasien.PatientName',
                'm_registrasi.reg_medrec',
                'm_registrasi.reg_no',
                'm_paramedis.ParamedicName',
                'm_ruangan_baru.nama_ruangan',
                'm_registrasi.reg_cara_bayar',
                'm_registrasi.reg_tgl',
                'm_registrasi.reg_jam',
            ])
            ->orderByDesc('m_registrasi.reg_tgl');



        return DataTables()
            ->of($datamypatient)
            ->editColumn('aksi_data', function ($query) use ($request) {
                return ('<a href="'
                    . route('dokter.patient.summary', ['patient' => $query->reg_no])
                    . '" class="btn btn-sm btn-outline-primary"><i class="mr-2 fa fa-clipboard-check"></i>Periksa</a>');
            })
            // ->editColumn('PatientName', function ($query) use ($request) {
            //     return $query->registration ? ($query->registration->pasien ? $query->registration->pasien->PatientName :'') : '';
            // })
            ->escapeColumns([])
            ->toJson();
    }

    public function ajax_index2($request)
    {
        $datamyarea = DB::connection('mysql2')
            ->table('m_physician_team')
            ->leftJoin('m_paramedis', 'm_physician_team.kode_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('m_registrasi', 'm_physician_team.reg_no', '=', 'm_registrasi.reg_no')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_ruangan_baru', 'm_registrasi.service_unit', '=', 'm_ruangan_baru.id')
            ->leftJoin('m_kelas_ruangan_baru', 'm_registrasi.bed', '=', 'm_kelas_ruangan_baru.id')
            ->where('m_physician_team.kode_dokter', Auth::user()->dokter_id)
            ->where('m_registrasi.reg_discharge', '!=', '3')
            ->select([
                'm_pasien.PatientName',
                'm_registrasi.reg_medrec',
                'm_registrasi.reg_no',
                'm_paramedis.ParamedicName',
                'm_ruangan_baru.nama_ruangan',
                'm_registrasi.reg_cara_bayar',
            ])
            ->orderByDesc('m_registrasi.reg_tgl');

        return DataTables()
            ->of($datamyarea)
            ->editColumn('aksi_data', function ($query) use ($request) {
                return ('<a href="'
                    . route('dokter.patient.summary', ['patient' => $query->reg_no])
                    . '" class="btn btn-sm btn-outline-primary"><i class="mr-2 fa fa-clipboard-check"></i>Periksa</a>');
            })
            // ->editColumn('PatientName', function ($query) use ($request) {
            //     return $query->registration ? ($query->registration->pasien ? $query->registration->pasien->PatientName :'') : '';
            // })
            ->escapeColumns([])
            ->toJson();
    }

    // public function index_old()
    // {
    //     $datamypatient=DB::connection('mysql2')
    //         ->table('m_registrasi')
    //         ->leftJoin('m_pasien','m_registrasi.reg_medrec','=','m_pasien.MedicalNo')
    //         ->leftJoin('m_paramedis','m_registrasi.reg_dokter','=','m_paramedis.ParamedicCode')
    //         ->leftJoin('m_ruangan_baru','m_registrasi.service_unit','=','m_ruangan_baru.id')
    //         ->leftJoin('m_kelas_ruangan_baru','m_registrasi.bed','=','m_kelas_ruangan_baru.id')
    //         ->where('m_registrasi.reg_discharge','!=','3')
    //         ->orderByDesc('reg_tgl')
    //         ->get();

    //     $datamyarea=DB::connection('mysql2')
    //         ->table('m_physician_team')
    //         ->leftJoin('m_paramedis','m_physician_team.kode_dokter','=','m_paramedis.ParamedicCode')
    //         ->leftJoin('m_registrasi','m_physician_team.reg_no','=','m_registrasi.reg_no')
    //         ->leftJoin('m_pasien','m_registrasi.reg_medrec','=','m_pasien.MedicalNo')
    //         ->leftJoin('m_ruangan_baru','m_registrasi.service_unit','=','m_ruangan_baru.id')
    //         ->leftJoin('m_kelas_ruangan_baru','m_registrasi.bed','=','m_kelas_ruangan_baru.id')
    //         ->where('m_physician_team.kode_dokter',Auth::user()->dokter_id)
    //         ->where('m_registrasi.reg_discharge','!=','3')
    //         ->orderByDesc('reg_tgl')
    //         ->get();

    //     return view('dokter.pages.dashboard', ['myArea' => $datamyarea, 'myPatient' => $datamypatient]);
    // }

    public function show($reg_no)
    {
        $data['patient'] = RegistrationInap::find($reg_no);
        $data['previous_episode'] = RegistrationInap::where('reg_medrec', $reg_no)->get();
        $data['cpoe_labor'] = PasienCPOELaboratory::where('reg_no', $reg_no)->get();
        $data['cpoe_imaging'] = PasienCPOEImaging::where('reg_no', $reg_no)->get();
        $data['soap'] = PasienSoapDok::where('soapdok_reg', $reg_no)->latest()->get();

        return view('dokter.pages.patient.detail', $data);
    }

    public function takeOver(Request $request){
        try {
            $check_ = RegistrationInap::where('reg_no', $request->reg_no)
                ->first();

            $data = [];

            if (isset($check_->reg_dokter_care)) {
                foreach (json_decode($check_->reg_dokter_care, true) as $key => $value) {
                    if (!$request->type) {
                        if ($value['kode'] != $request->dokter_code) {
                            array_push($data, $value);
                        }
                    } else {
                        array_push($data, $value);
                    }
                }

                array_push($data, [
                    'kode' => $request->dokter_code,
                    'taken_at' => date('Y-m-d H:i:s')
                ]);

                if ($request->type == 'cancel') {
                    foreach ($data as $key => $object) {
                        if ($object['kode'] === $request->dokter_code) {
                            unset($data[$key]);
                        }
                    }
                }
            } else {
                $data = [
                    [
                        'kode' => $request->dokter_code,
                        'taken_at' => date('Y-m-d H:i:s')
                    ]
                ];
            }
            
            $update = RegistrationInap::where('reg_no', $request->reg_no)
                ->update([
                    'reg_dokter_care' => json_encode($data)
                ]);

            if ($update) {
                return [
                    'code' => 200,
                    'success' => true,
                    'message' => $request->type == 'cancel' ? 'Pelayanan pasien berhasil dibatalkan' : 'Pasien berhasil diambil alih'
                ];
            } else {
                return [
                    'code' => 500,
                    'success' => false,
                    'message' => $request->type == 'cancel' ? 'Pelayanan pasien gagal dibatalkan' : 'Pasien gagal diambil alih'
                ];
            }
            

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
