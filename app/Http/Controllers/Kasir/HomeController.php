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

        $data['pasien'] = DB::connection('mysql2')
            ->table('m_registrasi as a');

        if ($request->start && $request->end) {
            $data['pasien'] = $data['pasien']
                ->whereRaw("CONCAT(a.reg_tgl, ' ', a.reg_jam) >= ?", [$request->start])
                ->whereRaw("CONCAT(a.reg_tgl, ' ', a.reg_jam) <= ?", [$request->end]);
        } else {
            // $data['pasien'] = $data['pasien']
            //     ->whereDate('reg_tgl', date('Y-m-d'));
        }

        $data['pasien'] = $data['pasien']
            ->select([
                'a.*',
                DB::raw("CONCAT(a.reg_tgl, ' ', a.reg_jam) as reg_datetime"),
                DB::raw("(select PatientName from m_pasien where MedicalNo = a.reg_medrec limit 1) as PatientName"),
                DB::raw("(select pvalidation_code from $dbInap.rs_pasien_billing_validation where pvalidation_reg = a.reg_no limit 1) as pvalidation_code"),
                DB::raw("(select pvalidation_status from $dbInap.rs_pasien_billing_validation where pvalidation_reg = a.reg_no order by created_at desc limit 1) as pvalidation_status"),
            ])
            ->orderBy('reg_datetime', 'desc')
            ->get();
        
        foreach ($data['pasien'] as $key => $value) {
            $serviceUnit = DB::connection('mysql2')
                ->table('m_unit as a')
                ->join('m_unit_departemen as b', 'a.ServiceUnitCode', 'b.ServiceUnitCode')
                ->where('b.ServiceUnitID', $value->service_unit)
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

        // usort($data['pasien']->toArray(), function($a, $b) {
        //     $timeA = strtotime($a->reg_tgl . ' ' . $a->reg_jam);
        //     $timeB = strtotime($b->reg_tgl . ' ' . $b->reg_jam);
        //     return $timeB - $timeA; // Sorting in descending order
        // });

        // dd($data);
        // return $data;
        return view('kasir.billing.listtagihan', $data);
    }
}
