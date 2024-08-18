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

        $non_exist_data_reg = collect($data)->filter(function ($value, $key) {
            return !$this->findExistRegistrationData($value['ranap_reg']);
        })->values()->all();

        // dd($non_exist_data_reg);

        return view('register.pages.rajal.index', [
            'data' => $non_exist_data_reg
        ]);
    }

    public function indexRajalLegacy()
    {

        $response = Http::get('http://rsud.sumselprov.go.id/simrs-rajal/api/rajal/pendaftaran');
        $data = json_decode($response->body(), true);
        // dd($data);

        return view('register.pages.rajal.index', compact('data'));
    }

    /**
     * Store data outpatient registration into inpatient registration
     */
    public function storeRajal()
    {
        if (request()->ajax()) {
            try {
                DB::beginTransaction();
                $register_ranap = new RegistrationInap();
                $register_ranap->reg_no = $register_ranap->generateCode();
                $register_ranap->reg_lama = request()->ranap_reg;
                $register_ranap->reg_medrec = request()->reg_medrec;
                $register_ranap->reg_tgl = date('Y-m-d');
                $register_ranap->reg_jam = date('H:i:s');
                $register_ranap->reg_poli = request()->poli_kode_asal;
                $register_ranap->reg_dokter = request()->dokter_poli_kode;
                $register_ranap->reg_cttn = request()->ranap_diagnosa;
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

    private function findExistRegistrationData($reg_no)
    {
        $register_ranap = RegistrationInap::where('reg_lama', $reg_no)->first();
        return $register_ranap;
    }
}
