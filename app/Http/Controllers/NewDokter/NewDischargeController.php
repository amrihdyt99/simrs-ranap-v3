<?php

namespace App\Http\Controllers\NewDokter;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewDischargeController extends Controller
{
    function reset_discharge($no)
    {
        $no = str_replace("_", "/", $no);
        try {
            DB::connection('mysql')->table('rs_pasien_discharge')->where('pdischarge_reg', $no)->delete();
            DB::connection('mysql')->table('rs_m_resume_pasien')->where('reg_no', $no)->delete();
            return response()->json([
                'success' => true
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'success' => false
            ]);
        }
    }
    function add_discharge(Request $request)
    {
        $paramsdischarge = array(
            'pdischarge_reg' => $request->reg_no,
            'pdischarge_dokter' => $request->kode_dokter,
            'pdischarge_tgl_mati' => $request->tgl_mati,
            'pdischarge_jam_mati' => $request->jam_mati,
            'pdischarge_condition' => $request->condition,
            'pdischarge_method' => $request->alasan,
            'pdischarge_med_notes' => $request->med_note,
            'pdischarge_notes' => $request->note,
            'pdischarge_tgl' => $request->tgl,
            'pdischarge_jam' => $request->jam,
            'created_at' => date('Y-m-d')
        );

        $paramsresume = array(
            'reg_no' => $request->reg_no,
            'kode_dokter' => $request->kode_dokter,
            'terapi_yang_diberikan' => $request->terapi_yang_diberikan,
            'tindakan_atau_operasi' => $request->tindakan_atau_operasi,
            'tanggal_tindakan' => $request->tanggal_tindakan,
            'icd_9_tindakan' => $request->icd_9_tindakan,
            'penyebab_luar' => $request->penyebab_luar,
            'icd_10_penyebab' => $request->icd_10_penyebab,
            'alasan_pulang' => $request->alasan,
            'kondisi_pasien' => $request->condition,
            'obat_dibawa' => $request->obat_dibawa,
            'tanggal_resume' => date('Y-m-d'),

            'klinik' => $request->klinik,
            'dokter' => $request->dokter,
            'tanggal_kontrol_rsud' => $request->tanggal_kontrol_rsud,
            'tanggal_rs_lain' => $request->tanggal_rs_lain,
            'nama_rs_lain' => $request->nama_rs_lain,
            'tanggal_rujuk_balik' => $request->tanggal_rujuk_balik,
            'nama_rs_rujuk_balik' => $request->nama_rs_rujuk_balik,
            'edukasi_penyakit' => $request->edukasi_penyakit,
            'edukasi_diet' => $request->edukasi_diet,
            'puskesmas' => $request->puskesmas,
            'edukasi_alat_bantu' => $request->edukasi_alat_bantu,
            'dokter_pribadi' => $request->dokter_pribadi,
            'created_at' => date('Y-m-d')

        );

        $simpandischarge = DB::connection('mysql')
            ->table('rs_pasien_discharge')
            ->insert($paramsdischarge);

        //update data ruangan
        // $paramruangan = array(
        //     'status_ketersediaan' => '1'
        // );
        //kurang where id_ketersediaan
        // $updateruangan = DB::connection('mysql2')
        //     ->table('ketersediaan_ruangan')
        //     ->update($paramruangan);
        if ($simpandischarge == TRUE) {
            //insert rs_m_resume_pasien from database mysql
            $simpanresume = DB::connection('mysql')
                ->table('rs_m_resume_pasien')
                ->insert($paramsresume);

            //update reg_discharge to 1 from table m_registrasi from database mysql2
            $updateRegDischarge = DB::connection('mysql2')
                ->table('m_registrasi')
                ->where('reg_no', $request->reg_no)
                ->update(['reg_discharge' => 1]);


            if ($simpanresume == TRUE && $updateRegDischarge == TRUE) {
                return response()->json([
                    'success' => true
                ]);
            } else {
                return response()->json([
                    'success' => false
                ]);
            }
        }
    }
}
