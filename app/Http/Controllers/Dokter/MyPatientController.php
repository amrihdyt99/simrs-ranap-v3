<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyPatientController extends Controller
{
    public function index()
    {
        $datamypatient=DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien','m_registrasi.reg_medrec','=','m_pasien.medrec')
            ->leftJoin('m_paramedis','m_registrasi.reg_dokter','=','m_paramedis.ParamedicCode')
            ->leftJoin('m_ruangan_baru','m_registrasi.service_unit','=','m_ruangan_baru.ruangan_baru_id')
            ->leftJoin('m_kelas_ruangan_baru','m_registrasi.bed','=','m_kelas_ruangan_baru.kelas_ruangan_baru_id')
            ->where('m_registrasi.reg_discharge','!=','3')
            ->get();
        //$data['myPatient'] = RegistrationInap::where('dokter', Auth::user()->dokter_id)->get();
        $data['myPatient'] = $datamypatient;
        return view('dokter.pages.my-patient.index',$data);
    }
}
