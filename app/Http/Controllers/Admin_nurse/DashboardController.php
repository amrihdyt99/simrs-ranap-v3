<?php

namespace App\Http\Controllers\Admin_nurse;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $sql="SELECT m_registrasi.*,m_pasien.* FROM m_registrasi JOIN m_pasien ON
                m_registrasi.reg_medrec=m_pasien.MedicalNo";
//        $data['pasien'] = Pasien::limit(1000)->get();
        $data['pasien']=DB::connection('mysql2')->select($sql);
        return view('nurse.dashboard', $data);
    }
}
