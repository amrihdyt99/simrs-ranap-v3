<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiMasterRajalController extends Controller
{
    public function daftar_masalah(Request $request)
    {
        $data = DB::connection('sqlsrv_rajal')->table('rs_m_daftar_masalah')->get();
        if ($data) {
            $json['code'] = 200;
            $json['msg'] = 'Ok';
            $json['data'] = $data;
        } else {
            $json['code'] = 201;
            $json['msg'] = 'Tidak ada pasien';
            $json['data'] = null;
        }
        return response()->json($json, $json['code']);
    }

    public function draft(Request $request)
    {
        $data = DB::connection('sqlsrv_rajal')->table('rs_m_draft')->get();
        if ($data) {
            $json['code'] = 200;
            $json['msg'] = 'Ok';
            $json['data'] = $data;
        } else {
            $json['code'] = 201;
            $json['msg'] = 'Tidak ada pasien';
            $json['data'] = null;
        }
        return response()->json($json, $json['code']);
    }

    public function dtd(Request $request)
    {
        $data = DB::connection('sqlsrv_rajal')->table('rs_m_dtd')->get();
        if ($data) {
            $json['code'] = 200;
            $json['msg'] = 'Ok';
            $json['data'] = $data;
        } else {
            $json['code'] = 201;
            $json['msg'] = 'Tidak ada pasien';
            $json['data'] = null;
        }
        return response()->json($json, $json['code']);
    }

    public function education(Request $request)
    {
        $data = DB::connection('sqlsrv_rajal')->table('rs_m_education')->get();
        if ($data) {
            $json['code'] = 200;
            $json['msg'] = 'Ok';
            $json['data'] = $data;
        } else {
            $json['code'] = 201;
            $json['msg'] = 'Tidak ada pasien';
            $json['data'] = null;
        }
        return response()->json($json, $json['code']);
    }

    public function m_item(Request $request)
    {
        $data = DB::connection('sqlsrv_rajal')->table('rs_m_item')->get();
        if ($data) {
            $json['code'] = 200;
            $json['msg'] = 'Ok';
            $json['data'] = $data;
        } else {
            $json['code'] = 201;
            $json['msg'] = 'Tidak ada pasien';
            $json['data'] = null;
        }
        return response()->json($json, $json['code']);
    }

    public function check_table(Request $request)
    {
        $data = DB::connection('sqlsrv_rajal')->table($request->tables)->get();
        if ($data) {
            $json['code'] = 200;
            $json['msg'] = 'Ok';
            $json['data'] = $data;
        } else {
            $json['code'] = 201;
            $json['msg'] = 'Tidak ada pasien';
            $json['data'] = null;
        }
        return response()->json($json, $json['code']);
    }

    public function m_item_group(Request $request)
    {
        $data = DB::connection('sqlsrv_rajal')->table('rs_m_item_group')->get();
        if ($data) {
            $json['code'] = 200;
            $json['msg'] = 'Ok';
            $json['data'] = $data;
        } else {
            $json['code'] = 201;
            $json['msg'] = 'Tidak ada pasien';
            $json['data'] = null;
        }
        return response()->json($json, $json['code']);
    }
}
