<?php

namespace App\Http\Controllers\NewDokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EdukasiAnastesiController extends Controller
{
    public function addEdukasiAnastesi(Request $request)
    {
        $params = $request->all();
        $reg_no = $request->reg_no;

        $simpan = DB::connection('mysql')->table('rs_edukasi_pasien_anastesi')->updateOrInsert(['reg_no' => $reg_no], $params);

        return response()->json([
            'success' => $simpan
        ]);
    }
}
