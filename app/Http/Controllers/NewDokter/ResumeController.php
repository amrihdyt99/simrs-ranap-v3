<?php

namespace App\Http\Controllers\NewDokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
