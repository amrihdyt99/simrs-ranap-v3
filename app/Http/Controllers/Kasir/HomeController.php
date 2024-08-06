<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index(){
        $sql="SELECT m_registrasi.*,m_pasien.PatientName FROM m_registrasi JOIN m_pasien ON
                m_registrasi.reg_medrec=m_pasien.MedicalNo";
        $data['pasien']=DB::connection('mysql2')->select($sql);
        return view('kasir.billing.listtagihan',$data);
    }
}
