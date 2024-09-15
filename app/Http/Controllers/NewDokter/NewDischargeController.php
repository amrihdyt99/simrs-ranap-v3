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
            // DB::connection('mysql')->table('rs_pasien_resume')->where('reg_no', $no)->delete();
            return response()->json([
                'success' => true
            ]);
        } catch (\Throwable $th) {
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

        $simpandischarge = DB::connection('mysql')
            ->table('rs_pasien_discharge')
            ->insert($paramsdischarge);

        if ($simpandischarge) {
            // Update status reg_discharge pada tabel m_registrasi
            $updateRegDischarge = DB::connection('mysql2')
                ->table('m_registrasi')
                ->where('reg_no', $request->reg_no)
                ->update(['reg_discharge' => 1]);

            if ($updateRegDischarge) {
                return response()->json([
                    'success' => true
                ]);
            } else {
                return response()->json([
                    'success' => false
                ]);
            }
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }
}
