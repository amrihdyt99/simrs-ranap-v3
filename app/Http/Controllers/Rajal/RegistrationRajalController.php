<?php

namespace App\Http\Controllers\Rajal;

use App\Http\Controllers\Controller;
use App\Models\RegistrationCancelation;
use App\Models\RegistrationInap;
use App\Models\SlipPernyataanRanap;
use App\Traits\Master\MasterPasienTrait;
use App\Traits\Ranap\RanapRegistrationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class RegistrationRajalController extends Controller
{

    use MasterPasienTrait, RanapRegistrationTrait;
    /**
     * * Menampilkan data registrasi pasien yang berasal dari rawat jalan
     */
    public function indexRajal()
    {
        // dd(auth()->user());
        try {
            $response = Http::get('http://rsud.sumselprov.go.id/simrs-rajal/api/rajal/pendaftaran');
            $data = json_decode($response->body(), true);
        } catch (\Throwable $th) {
            $data = [];
        }

        $non_exist_data_reg = collect($data)->filter(function ($value, $key) {
            return !$this->findExistRegistrationData($value['ranap_reg']) && !$this->findExistRegistrationCancelation($value['ranap_reg']);
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
                $pasien = $this->getPatientByMedicalRecord(request()->reg_medrec);
                if (!$pasien) $this->storePatientByMedicalRecord(request()->reg_medrec);
                DB::beginTransaction();
                $register_ranap = new RegistrationInap();
                $register_ranap->reg_no = $register_ranap->generateCode();
                $register_ranap->reg_lama = request()->ranap_reg;
                $register_ranap->reg_medrec = request()->reg_medrec;
                $register_ranap->departemen_asal = $this->getDepartemenAsalPasien(request()->ranap_reg);
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

    private function findExistRegistrationCancelation($reg_no)
    {
        $cancelation_registration = RegistrationCancelation::where('reg_no', $reg_no)->first();
        return $cancelation_registration;
    }

    public function slipRegister($reg_no)
    {
        $reg_no = str_replace('/', '_', $reg_no);

        $data_reg = Http::get('http://rsud.sumselprov.go.id/simrs-rajal/api/rajal/pendaftaran/' . $reg_no);
        $data = json_decode($data_reg->body(), true);
        $data_pasien = Http::get('http://rsud.sumselprov.go.id/simrs-rajal/api/master/getPasien?medrec=' . $data['reg_medrec']);
        $data_pasien = json_decode($data_pasien->body(), true);

        $userSignature = DB::connection('mysql2')
            ->table('users')
            ->where('dokter_id', $data['dokter_poli_kode'])
            ->value('signature');
        $data['pasien'] = $data_pasien[0] ?? null;
        $data['pasien']['date_of_birth'] = date('d-m-Y', strtotime($data['pasien']['DateOfBirth']));

        $slipPernyataanRanap = SlipPernyataanRanap::where('reg_no', $reg_no)->first();
        $signature = $slipPernyataanRanap ? $slipPernyataanRanap->ttd_dokter : $userSignature;

        return response()->view('register.pages.rajal.slip-pernyataan-ranap', [
            'data' => $data,
            'reg_no' => $data['ranap_reg'],
            'medrec' => $data['reg_medrec'],
            'signature' => $signature
        ]);
    }

    public function saveSignature(Request $request)
    {
        if ($request->ajax()) {
            try {
                $ttd_dokter = $request->input('ttd_dokter');
                $reg_no = $request->input('reg_no');
                $medrec = $request->input('medrec');

                // Simpan ke database
                $slipPernyataanRanap = new SlipPernyataanRanap;
                $slipPernyataanRanap->reg_no = $reg_no;
                $slipPernyataanRanap->medrec = $medrec;
                $slipPernyataanRanap->ttd_dokter = $ttd_dokter;  // Simpan Base64 string
                $slipPernyataanRanap->save();

                return response()->json(['success' => true, 'message' => 'Signature saved successfully.']);
            } catch (\Throwable $th) {
                return response()->json(['success' => false, 'message' => $th->getMessage()], 500);
            }
        }
    }
}
