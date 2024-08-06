<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
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

    public function data_table($type, $ruang)
    {
        if ($type == 'area') {
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
                ->where('m_registrasi.reg_discharge', '!=', '3')
                ->where('m_bed.service_unit_id', $ruang)
                ->select([
                    'm_pasien.PatientName',
                    'm_registrasi.reg_medrec',
                    'm_registrasi.reg_no',
                    'm_paramedis.ParamedicName',
                    'ServiceUnitName as nama_ruangan',
                    'businesspartner.BusinessPartnerName as reg_cara_bayar',
                    'm_registrasi.reg_tgl',
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
                ->where('m_registrasi.reg_discharge', '!=', '3')
                ->select([
                    'm_pasien.PatientName',
                    'm_registrasi.reg_medrec',
                    'm_registrasi.reg_no',
                    'm_paramedis.ParamedicName',
                    'ServiceUnitName as nama_ruangan',
                    'businesspartner.BusinessPartnerName as reg_cara_bayar',
                    'm_registrasi.reg_tgl',
                ])
                ->orderByDesc('m_registrasi.reg_tgl');
        }
        $data = $datamypatient->get();
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
}
