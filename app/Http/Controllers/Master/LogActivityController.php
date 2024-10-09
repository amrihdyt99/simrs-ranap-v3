<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogActivityController extends Controller
{
    public function data(Request $request){
        try {
            $data = DB::connection('mysql2')
                ->table('m_log_activity as a');

            if ($request->reg) {
                $data = $data->where('log_reg', $request->reg);
            }

            $data = $data
                ->select([
                    'a.*',
                ])
                ->get();

            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request){
        try {
            $data = [
                'log_reg' => $request->reg,
                'log_medrec' => $request->medrec,
                'log_title' => $request->title,
                'log_desc' => $request->desc,
                'log_user_id' => $request->user_id,
                'log_user_name' => $request->user_name,
                'log_desc_revision' => $request->desc_revision,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $store = DB::connection('mysql2')
                ->table('m_log_activity')
                ->insert($data);

            return [
                'success' => true,
                'msg' => 'Data berhasil disimpan'
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
