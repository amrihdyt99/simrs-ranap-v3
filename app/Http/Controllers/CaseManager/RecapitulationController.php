<?php

namespace App\Http\Controllers\CaseManager;

use App\Http\Controllers\Controller;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;

class RecapitulationController extends Controller
{
    public function recapitulation(RegistrationInap $patient)
    {
        $data['patient'] = $patient;

        return view('case-manager.pages.patient.recapitulation', $data);
    }
}
