<?php

namespace App\Http\Controllers\Rajal;

use App\Http\Controllers\Controller;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class RegistrationRajalController extends Controller
{

    /**
     * * Menampilkan data registrasi pasien yang berasal dari rawat jalan
     */
    public function indexRajal()
    {
        $response = Http::get('http://rsud.sumselprov.go.id/simrs-rajal/api/rajal/pendaftaran');
        $data = json_decode($response->body(), true);
        // dd($data);

        return view('register.pages.rajal.index', compact('data'));
    }

    public function storeRajal()
    {
        if (request()->ajax()) {
            try {
                DB::beginTransaction();
                $register_ranap = new RegistrationInap();
                $register_ranap->reg_no = request()->ranap_reg;
                $register_ranap->reg_medrec = request()->reg_medrec;
                $register_ranap->reg_tgl = date('Y-m-d');
                $register_ranap->reg_jam = date('H:i:s');
                $register_ranap->save();
                DB::commit();
                return response()->json([
                    'status_code' => 200,
                    'status_message' => 'OK',
                    'success' => true,
                    'message' => 'Data berhasil disimpan',
                    'data' => request()->all()
                ], 200);
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollBack();
                return response()->json([
                    'status_code' => 500,
                    'status_message' => 'Internal Server Error',
                    'success' => false,
                    'message' => $th->getMessage()
                ], 500);
            }
        }
    }
}