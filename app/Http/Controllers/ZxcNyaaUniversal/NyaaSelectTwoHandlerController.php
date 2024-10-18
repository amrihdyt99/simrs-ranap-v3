<?php

namespace App\Http\Controllers\ZxcNyaaUniversal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NyaaSelectTwoHandlerController extends Controller
{
    public function select2_take()
    {
        return 50;
    }

    public function businesspartner(Request $request)
    {
        $cxx = DB::connection('mysql2')
            ->table('businesspartner')
            ->where('BusinessPartnerName', 'LIKE', '%' . $request->input('term', '') . '%')
            ->where('aktif', 1)
            ->take($this->select2_take())
            ->get();

        $cxy = array();
        foreach ($cxx as $data) {
            $a['id'] = $data->id;
            $a['text'] = $data->BusinessPartnerName;
            array_push($cxy, $a);
        }
        return ['results' => $cxy];
    }

    public function corporate(Request $request)
    {
        $cxx = DB::table('corporate')
            ->where('BusinessPartnerName', 'LIKE', '%' . $request->input('term', '') . '%')
            ->where('aktif', 1)
            ->take($this->select2_take())
            ->get();

        $cxy = array();
        foreach ($cxx as $data) {
            $a['id'] = $data->id;
            $a['text'] = ($data->IsBlackList == '1' ? '[BlackList] ' : '') . $data->BusinessPartnerName;
            array_push($cxy, $a);
        }
        return ['results' => $cxy];
    }

    public function m_paramedic(Request $request)
    {
        $cxx = app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->db_connection_mysql2()
            ->table('m_paramedis')
            ->where('ParamedicName', 'LIKE', '%' . $request->input('term', '') . '%')
            ->where('IsActive', '=','1')
            ->where('IsDeleted', '=','0')
            ->take($this->select2_take())
            ->get();

        $cxy = array();
        foreach ($cxx as $data) {
            $a['id'] = $data->ParamedicCode;
            $a['text'] = $data->ParamedicName;
            array_push($cxy, $a);
        }
        return ['results' => $cxy];
    }

    public function m_ruangan_baru(Request $request)
    {
        $cxx = app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->db_connection_mysql2()
            ->table('m_bed')
            ->join('m_unit_departemen', 'm_unit_departemen.ServiceUnitID', '=', 'm_bed.service_unit_id')
            ->join('m_unit', 'm_unit.ServiceUnitCode', '=', 'm_unit_departemen.ServiceUnitCode')
            ->select('m_unit.ServiceUnitName', 'm_bed.service_unit_id as id')
            ->where('m_unit.ServiceUnitName', 'LIKE', '%' . $request->input('term', '') . '%')
            ->where('bed_status', '0116^O')
            ->take($this->select2_take())
            ->distinct()
            ->get();

        $cxy = array();
        foreach ($cxx as $data) {
            $a['id'] = $data->id;
            $a['text'] = $data->ServiceUnitName;
            array_push($cxy, $a);
        }
        return ['results' => $cxy];
    }

    public function m_ruangan_baru_all(Request $request)
    {
        // $cxx = app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->db_connection_mysql2()
        //     ->table('m_bed')
        //     ->join('m_unit_departemen', 'm_unit_departemen.ServiceUnitID', '=', 'm_bed.service_unit_id')
        //     ->join('m_unit', 'm_unit.ServiceUnitCode', '=', 'm_unit_departemen.ServiceUnitCode')
        //     ->select('m_unit.ServiceUnitName', 'm_bed.service_unit_id as id')
        //     ->where('m_unit.ServiceUnitName', 'LIKE', '%' . $request->input('term', '') . '%')
        //     // ->where('bed_status', '0116^O')
        //     ->take($this->select2_take())
        //     ->distinct()
        //     ->get();

        $cxx = DB::connection('mysql2')
            ->table('m_ruangan')
            ->select('m_ruangan.RoomName', 'm_ruangan.RoomID');
        // ->where('bed_status', '0116^O')


        if ($request->has('term')) {
            $cxx = $cxx->where('RoomName', 'LIKE', '%' . $request->term . '%');
        }

        $cxx = $cxx->take($this->select2_take())
            ->distinct()
            ->get();

        $cxy = array();
        foreach ($cxx as $data) {
            $a['id'] = $data->RoomID;
            $a['text'] = $data->RoomName;
            array_push($cxy, $a);
        }
        return ['results' => $cxy];
    }

    public function data_tindakan_baru(Request $request)
    {
        $cxx = DB::table('rs_m_item')
            ->leftJoin("rs_m_item_tarif", "rs_m_item.ItemID", '=', 'rs_m_item_tarif.ItemID')
            ->where([
                'rs_m_item.GCItemType' => $request->type,
                'rs_m_item_tarif.ClassCategoryCode' => $request->class,
                'rs_m_item.IsActive' => '1',
                'rs_m_item.IsDeleted' => '0',
            ])
            ->where(function ($query) use ($request) {
                $query->where('ItemCode', 'LIKE', '%' . $request->input('term', '') . '%')
                    ->orWhere('ItemName1', 'LIKE', '%' . $request->input('term', '') . '%');
            })
            ->take($this->select2_take())
            ->get();

        $cxy = array();
        foreach ($cxx as $data) {
            $a['id'] = $data->ItemCode;
            $a['text'] = '[' . $data->ItemCode . '] ' . $data->ItemName1;

            // CUSTOM
            $a['data_id'] = $data->ItemCode;
            $a['data_type'] = 'lainnya';
            $a['data_name'] = $data->ItemName1;
            $a['data_price'] = $data->PersonalPrice;

            array_push($cxy, $a);
        }
        return ['results' => $cxy];
    }

    public function data_tindakan_baru_v2(Request $request)
    {
        $type = $request->type;
        $class = $request->class;
        $reg = $request->reg;
        $search = $request->input('searchParams', '');

        $reg = preg_replace('/\//', '_', $reg);
        
        if ($type == 'X0001^04') {
            $type = 'LAB';
        } else if ($type == 'X0001^05') {
            $type = 'RAD';
        } else if ($type == 'X0001^08') {
            $type = 'FISIO';
        } else {
            $type = 'LAIN';
        }
        
        $url = urlSimrs().'api/emr/cpoe/data_all_item/'.$type.'/'.$reg.'?classParams='.$class;
        
        if (!empty($search)) {
            $url .= '&searchParams='.$search;
        }
        
        $data = getService($url);

        return response()->json([
            'data' => json_decode($data)
        ]);
    }
}
