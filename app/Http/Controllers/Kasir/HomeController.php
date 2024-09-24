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

        $sql = "SELECT registrasi.*, m_pasien.PatientName, billing.pvalidation_code
                    FROM $dbMaster.m_registrasi AS registrasi
                    JOIN $dbMaster.m_pasien AS m_pasien  ON registrasi.reg_medrec = m_pasien.MedicalNo
                    LEFT JOIN $dbInap.rs_pasien_billing_validation AS billing  ON registrasi.reg_no = billing.pvalidation_reg
                ";

        $data['pasien'] = DB::select($sql);
        
        foreach ($data['pasien'] as $key => $value) {
            $serviceUnit = DB::connection('mysql2')
                ->table('m_unit')
                ->where('ServiceUnitCode', $value->service_unit)
                ->first();

            $payer = DB::connection('mysql2')
                ->table('businesspartner')
                ->where('id', $value->reg_cara_bayar)
                ->first();

            $room = DB::connection('mysql2')
                ->table('m_bed')
                ->where('bed_id', $value->bed)
                ->select([
                    DB::raw("(select RoomName from m_ruangan where RoomID = room_id limit 1) as RoomName")
                ])
                ->first();

            $data['pasien'][$key]->ServiceUnitName = $serviceUnit->ServiceUnitName ?? null;

            $data['pasien'][$key]->RoomName = $room->RoomName ?? null;
            $data['pasien'][$key]->Payer = $payer->BusinessPartnerName ?? null;
        }

        usort($data['pasien'], function($a, $b) {
            $timeA = strtotime($a->reg_tgl . ' ' . $a->reg_jam);
            $timeB = strtotime($b->reg_tgl . ' ' . $b->reg_jam);
            return $timeB - $timeA; // Sorting in descending order
        });

        // dd($data);
        // return $data;
        return view('kasir.billing.listtagihan', $data);
    }
}
