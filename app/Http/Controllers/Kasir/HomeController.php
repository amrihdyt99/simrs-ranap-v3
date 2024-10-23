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
            ->table('m_registrasi as a')
            ->leftjoin($dbInap.sqlServerConfig()[0].'.rs_pasien_billing_validation as b', 'pvalidation_reg', 'reg_no');

        if (isset($request->statusPayment) && $request->statusPayment != 'all') {
            if ($request->statusPayment == 'validated') {
                $data['pasien'] = $data['pasien']
                    ->whereRaw("(pvalidation_reg is not null and pvalidation_status = 1)")
                    ;
            } else if ($request->statusPayment == 'unvalidated'){
                $data['pasien'] = $data['pasien']
                    ->whereRaw("(pvalidation_reg is null or (pvalidation_status = 0 and pvalidation_reg is not null))")
                    ;
            }

            if ($request->start && $request->end) {
                $data['pasien'] = $data['pasien']
                    ->whereDate('a.reg_tgl', '>=', $request->start)
                    ->whereDate('a.reg_tgl', '<=', $request->end);
            } else {
                // $data['pasien'] = $data['pasien']
                //     ->whereDate('reg_tgl', date('Y-m-d'));
            }
        }

        $data['pasien'] = $data['pasien']
            ->select([
                'a.*',
                DB::raw("CONCAT(a.reg_tgl, ' ', a.reg_jam) as reg_datetime"),
                DB::raw("(select ".getLimit()[0]." PatientName from m_pasien where MedicalNo = a.reg_medrec ".getLimit()[1].") as PatientName"),
                DB::raw("(select ".getLimit()[0]." pvalidation_code from ".$dbInap.sqlServerConfig()[0].".rs_pasien_billing_validation where pvalidation_reg = a.reg_no ".getLimit()[1].") as pvalidation_code"),
                DB::raw("(select ".getLimit()[0]." pvalidation_status from ".$dbInap.sqlServerConfig()[0].".rs_pasien_billing_validation where pvalidation_reg = a.reg_no order by created_at desc ".getLimit()[1].") as pvalidation_status"),
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
                    DB::raw("(select ".getLimit()[0]." RoomName from m_ruangan where RoomID = room_id ".getLimit()[1].") as RoomName")
                ])
                ->first();

            $data['pasien'][$key]->ServiceUnitName = $serviceUnit->ServiceUnitName ?? null;

            $data['pasien'][$key]->RoomName = $room->RoomName ?? null;
            $data['pasien'][$key]->Payer = $payer->BusinessPartnerName ?? null;

            $data['pasien'][$key]->CurrentLocation = !empty(getCurrentLocation($value->reg_no)) ? getCurrentLocation($value->reg_no) : null;
        }

        // usort($data['pasien']->toArray(), function($a, $b) {
        //     $timeA = strtotime($a->reg_tgl . ' ' . $a->reg_jam);
        //     $timeB = strtotime($b->reg_tgl . ' ' . $b->reg_jam);
        //     return $timeB - $timeA; // Sorting in descending order
        // });

        // dd($data);
        // return $data;
        $data = [
            'pasien' => $data['pasien'],
            'status' => $request->statusPayment,
            'start' => $request->start,
            'end' => $request->end,
        ];

        return view('kasir.billing.listtagihan', $data);
    }

    public function indexReport(Request $request){
        return view('new_kasir.report.index');
    }

    public function indexReportPrint(Request $request){
        try {
            $start = date('Y-m-d H:i:s', strtotime($request->start));
            $end = date('Y-m-d H:i:s', strtotime($request->end));

            $request->merge([
                'start' => $start,
                'end' => $end,
            ]);

            $data['item'] = (new BillingController)->dataReport($request);
            $data['total'] = array_sum(array_column($data['item'],'total'));
            $data['cash'] = array_sum(array_column($data['item'],'cash'));
            $data['kredit'] = array_sum(array_column($data['item'],'kredit'));
            $data['debit'] = array_sum(array_column($data['item'],'debit'));
            $data['transfer'] = array_sum(array_column($data['item'],'transfer'));
            $data['discount'] = array_sum(array_column($data['item'],'discount'));
            $data['qris'] = array_sum(array_column($data['item'],'qris'));

            return view('new_kasir.report.print', compact('data', 'start', 'end'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
