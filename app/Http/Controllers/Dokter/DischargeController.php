<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\ICD10;
use App\Models\ICD9CM;
use App\Models\PasienDiagnosa;
use App\Models\PasienDischarge;
use App\Models\PasienProsedur;
use App\Models\RegistrationInap;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DischargeController extends Controller
{
    public function discharge(RegistrationInap $patient)
    {
        $data['patient'] = $patient;
        $data['diagnoses'] = PasienDiagnosa::where('pdiag_reg', $patient->reg_no)->where('pdiag_deleted', 0)->get();
        $data['procedures'] = PasienProsedur::where('pprosedur_reg', $patient->reg_no)->where('pprosedur_deleted', 0)->get();
        $data['discharge'] = PasienDischarge::where('pdischarge_reg', $patient->reg_no)->get();

        return view('dokter.pages.patient.discharge', $data);
    }

    public function createDiagnose(RegistrationInap $patient)
    {
        $data['patient'] = $patient;
//        $data['icd10'] = ICD10::all();
        $data['icd10'] = DB::table('icd10_bpjs')->select('*')->get();
        return view('dokter.pages.diagnose-procedure.create-diagnose', $data);
    }

    public function createProcedure(RegistrationInap $patient)
    {
        $data['patient'] = $patient;
//        $data['icd9cm'] = ICD9CM::all();
        $data['icd9cm'] = DB::table('icd9cm_bpjs')->select('*')->get();

        return view('dokter.pages.diagnose-procedure.create-procedure', $data);
    }

    public function dischargeInfo(RegistrationInap $patient)
    {
        $data['patient'] = $patient;

        return view('dokter.pages.discharge-info.create', $data);
    }

    public function storeDischargeInfo(Request $request)
    {
        $patient = $request->input('pdischarge_reg');
        $data = $request->validate([
            'pdischarge_condition' => ['required', 'string'],
            'pdischarge_method' => ['required', 'string'],
            'pdischarge_med_notes' => ['required', 'string'],
            'pdischarge_notes' => ['required', 'string']
        ]);
        $data['pdischarge_reg'] = $request->input('pdischarge_reg');
        $data['pdischarge_dokter'] = $request->input('pdischarge_dokter');
        $data['pdischarge_deleted'] = $request->input('pdiag_deleted', 0);
        $data['pdischarge_tgl_mati'] = $request->input('pdischarge_tgl_mati', NULL);
        $data['pdischarge_jam_mati'] = $request->input('pdischarge_jam_mati', NULL);

        PasienDischarge::create($data);
        return redirect()->route('dokter.patient.discharge', $patient);
    }

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

        return redirect()->route('dokter.patient.discharge', $patient);
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

        return redirect()->route('dokter.patient.discharge', $patient);
    }

    public function deleteProcedure($id)
    {
        $prosedur = PasienProsedur::find($id);
        $prosedur->update(['pprosedur_deleted'=> 1]);
        return redirect()->back();
    }

    public function deleteDiagnose($id)
    {
        $diagnosa = PasienDiagnosa::find($id);
        $diagnosa->update(['pdiag_deleted'=> 1]);
        return redirect()->back();
    }
}
