<?php

namespace App\Http\Controllers\NewDokter;

use App\Http\Controllers\Controller;
use App\Models\PasienDiagnosa;
use App\Models\PasienProsedur;
use Illuminate\Http\Request;

class NewDiagnoseController extends Controller
{
    public function storeDiagnose(Request $request)
    {
        $patient = $request->input('pdiag_reg');
        $diagnosa = $request->input('pdiag_diagnosa');
        foreach ($diagnosa as $d){
            $data['pdiag_reg'] = $request->input('pdiag_reg');
            $data['pdiag_dokter'] = $request->input('pdiag_dokter');
            $data['pdiag_deleted'] = $request->input('pdiag_deleted', 0);
            $data['pdiag_diagnosa'] = $d;

            PasienDiagnosa::create($data);
        }
       /* return response()->json([
           'success'=>true
        ]);*/

        return redirect()->route('dokter.patient.summary',['patient'=>$patient]);
        //return redirect()->route('dokter.patient.discharge', $patient);
    }

    public function storeProcedure(Request $request)
    {
        $patient = $request->input('pprosedur_reg');
        $prosedur = $request->input('pprosedur_prosedur');
        foreach ($prosedur as $p) {
            $data['pprosedur_reg'] = $request->input('pprosedur_reg');
            $data['pprosedur_dokter'] = $request->input('pprosedur_dokter');
            $data['pprosedur_deleted'] = $request->input('pprosedur_deleted', 0);
            $data['pprosedur_prosedur'] = $p;

            PasienProsedur::create($data);
        }
        return redirect()->route('dokter.patient.summary',['patient'=>$patient]);
        //return redirect()->route('dokter.patient.discharge', $patient);
    }
}
