<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index(Request $request)
    {
        $dbMaster = DB::connection('mysql2')->getDatabaseName();
        $dbInap = DB::connection('mysql')->getDatabaseName();

        $sql = "SELECT registrasi.*, m_pasien.PatientName, billing.*
                    FROM $dbMaster.m_registrasi AS registrasi
                    JOIN $dbMaster.m_pasien AS m_pasien  ON registrasi.reg_medrec = m_pasien.MedicalNo
                    LEFT JOIN $dbInap.rs_pasien_billing_validation AS billing  ON registrasi.reg_no = billing.pvalidation_reg";
        $data['pasien'] = DB::select($sql);

        usort($data['pasien'], function($a, $b) {
            $timeA = strtotime($a->reg_tgl . ' ' . $a->reg_jam);
            $timeB = strtotime($b->reg_tgl . ' ' . $b->reg_jam);
            return $timeB - $timeA; // Sorting in descending order
        });

        // dd($data);
        return view('kasir.billing.listtagihan', $data);
    }
}
