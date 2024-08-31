<?php

namespace App\Http\Controllers\NewDokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PerawatanSelanjutnya;

class ResumeController extends Controller
{
    public function baseData(Request $request){
        try {
            $call_assesment = new AssesmentAwalDokterController;
            $call_obat = new OrderObatController;

            $data['assesment'] = $call_assesment->getAssesmentDokter($request);
            $data['diagnosa'] = $call_assesment->get_diagnosa($request, $request->reg_no);
            $data['prosedur'] = $call_assesment->get_prosedur($request, $request->reg_no);
            $data['obat'] = $call_obat->getFinalOrder($request);
            
            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function storePerawatanSelanjutnya(Request $request)
    {
        try {
            $data = [
                'id_dokter' => $request->input('id_dokter'),
                'reg_no' => $request->input('reg_no'),
                'tipe' => $request->input('tipe'),
                'klinik' => $request->input('klinik'),
                'dokter' => $request->input('dokter'),
                'tanggal_kontrol_rsud' => $request->input('tanggal_kontrol_rsud'),
                'tanggal_rs_lain' => $request->input('tanggal_rs_lain'),
                'nama_rs_lain' => $request->input('nama_rs_lain'),
                'tanggal_rujuk_balik' => $request->input('tanggal_rujuk_balik'),
                'nama_rs_rujuk_balik' => $request->input('nama_rs_rujuk_balik'),
                'puskesmas' => $request->input('puskesmas'),
                'dokter_pribadi' => $request->input('dokter_pribadi'),
                'pergantian_catheter_detail' => $request->input('pergantian_catheter_detail'),
                'tanggal_pergantian_catheter' => $request->input('tanggal_pergantian_catheter'),
                'terapi_rehabilitan_detail' => $request->input('terapi_rehabilitan_detail'),
                'tanggal_terapi_rehabilitan' => $request->input('tanggal_terapi_rehabilitan'),
                'rawat_luka_detail' => $request->input('rawat_luka_detail'),
                'tanggal_rawat_luka' => $request->input('tanggal_rawat_luka'),
                'perawatan_lainnya_detail' => $request->input('perawatan_lainnya_detail'),
                'tanggal_perawatan_lainnya' => $request->input('tanggal_perawatan_lainnya'),
            ];

            $existingData = PerawatanSelanjutnya::where('reg_no', $request->input('reg_no'))->first();

            if ($existingData) {
                $existingData->update($data);
            } else {
                PerawatanSelanjutnya::create($data);
            }

            return response()->json(['message' => 'Data perawatan selanjutnya berhasil disimpan.'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $th->getMessage()], 500);
        }
    }
}
