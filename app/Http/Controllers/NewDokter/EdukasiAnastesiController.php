<?php

namespace App\Http\Controllers\NewDokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EdukasiAnastesiController extends Controller
{
    public function addEdukasiAnastesi(Request $request)
    {
        $params = $request->only([
            'medrec',
            'dilakukan_ke',
            'nama',
            'umur',
            'jenis_kelamin',
            'no_telp',
            'no_rekam_medis',
            'diagonsa',
            'tindakan',
            'jenis_anastesi',
            'tgl_ttd',
            'nama_pihak_pasien',
            'nama_dokter',
        ]);
        
        $reg_no = $request->reg_no;
        $params['ttd_pihak_pasien'] = $request->ttd_pihak_pasien_anastesi;
        $params['ttd_dokter'] = $request->ttd_dokter_anastesi;
        $params['reg_no'] = $reg_no;
        $params['created_at'] = now();
        $params['created_by'] = $request->username;

        $cek = DB::connection('mysql')->table('rs_edukasi_pasien_anastesi')->where('reg_no', $reg_no)->count();
        if ($cek > 0) {
            $params['updated_at'] = now(); 
            $params['updated_by'] = $request->username;
        }

        $simpan = DB::connection('mysql')->table('rs_edukasi_pasien_anastesi')->updateOrInsert(['reg_no' => $reg_no], $params);

        return response()->json([
            'status' => $simpan
        ]);
    }
}
