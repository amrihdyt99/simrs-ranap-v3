<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CaseManagerController extends Controller
{
    function store_case_manager(Request $request){
        extract($request->all());

        if (isset($case['identifikasi_masalah'])) {
            $case['identifikasi_masalah'] = implode(', ', $case['identifikasi_masalah']);
        } else {
            $case['identifikasi_masalah'] = '';
        }

        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), []);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => $validator->errors()->all()
                ], 422);
            }

            $cekCase = DB::connection('mysql')->table('case_manager')
                ->where([
                    ['reg_no', $case['reg_no']],
                    ['med_rec', $case['med_rec']],
                ])->count();

            if ($cekCase > 0) {
                $case['updated_at'] = Carbon::now();
                $case['updated_by'] = $username;
                $caseData = DB::connection('mysql')->table('case_manager')->where('reg_no', $case['reg_no'])->update($case);
            } else {
                $case['created_at'] = Carbon::now();
                $case['created_by'] = $username;
                $caseData = DB::connection('mysql')->table('case_manager')->insert($case);
            }

            DB::commit();
            $response = response()->json([
                'status' => 'success',
                'message' => 'Data berhasil diperbarui',
            ]);
            
            return $response;
        } catch (\Throwable $throw) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => $throw->getMessage()
            ], 500);
        }
    }
}
