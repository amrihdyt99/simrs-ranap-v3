<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NurserCarePlanController extends Controller
{
    public function diagnosapenyakit(Request $request){
        $arrayGejala=$request->arrayGejala;
        $arrImplode=implode(", ", $arrayGejala);    //prints 1, 2, 3
        $arrJoin=join(',', $arrayGejala);
        $dataPenyakit=DB::table("penyakit")->whereIn("id_gejala",$arrayGejala)->get();
        //$dataPenyakit=DB::table("penyakit")->select('nama_penyakit')->where('id_gejala',$arrayGejala[0])->get();
        //$dataPenyakit=DB::select("SELECT * FROM penyakit WHERE id_gejala IN (?)",[$arrJoin]);
        //$dataPenyakit=DB::select("SELECT nama_penyakit FROM penyakit WHERE id_gejala=?",[$arrayGejala[0]]);
        $response['data']=$dataPenyakit;
        return json_encode($response);
    }
}
