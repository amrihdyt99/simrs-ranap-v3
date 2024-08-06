<?php

namespace App\Http\Controllers\CaseManager;

use App\Http\Controllers\Controller;
use App\Models\Paramedic;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index()
    {
        $data['paramedics'] = Paramedic::all();
        $data['myArea'] = RegistrationInap::all();
        $data['myPatient'] = RegistrationInap::where('reg_dokter', Auth::user()->dokter_id)->get();
        return view('case-manager.pages.dashboard', $data);
    }

    public function patientList($paramedic)
    {
        $data['myPatient'] = RegistrationInap::where('reg_dokter', $paramedic)->get();
        return view('case-manager.pages.patient-list', $data);
    }

    public function show($reg_no)
    {
        $patient = RegistrationInap::find($reg_no);

        return view('dokter.pages.patient.detail', ['patient' => $patient]);
    }

}
