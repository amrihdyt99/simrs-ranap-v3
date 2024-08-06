<?php

namespace App\Http\Controllers\CaseManager;

use App\Http\Controllers\Controller;
use App\Models\PasienSoapDok;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;

class FormBController extends Controller
{
    public function index(RegistrationInap $patient)
    {
        $data['patient'] = $patient;
        // $data['soap'] = PasienSoapDok::where('soapdok_reg', $patient->reg_no)->latest()->first();

        return view('case-manager.pages.patient.formb', $data);
    }
}
