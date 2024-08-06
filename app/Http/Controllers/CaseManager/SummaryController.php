<?php

namespace App\Http\Controllers\CaseManager;

use App\Http\Controllers\Controller;
use App\Models\PasienCPOEImaging;
use App\Models\PasienCPOELaboratory;
use App\Models\PasienSoapDok;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function summary(RegistrationInap $patient)
    {
        $data['previous_episode'] = RegistrationInap::where('reg_medrec', $patient->medrec)->get();
        $data['cpoe_labor'] = PasienCPOELaboratory::where('reg_no', $patient->reg_no)->get();
        $data['cpoe_imaging'] = PasienCPOEImaging::where('reg_no', $patient->reg_no)->get();
        $data['soap'] = PasienSoapDok::where('soapdok_reg', $patient->reg_no)->latest()->first();
        $data['patient'] = $patient;
        return view('case-manager.pages.patient.summary',$data);
    }
}
