<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\PasienPrescribe;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function index(RegistrationInap $patient)
    {
        $data['obat'] = PasienPrescribe::where('prescribe_reg', $patient->reg_no)->get();
        $data['patient'] = $patient;
        return view('dokter.pages.e-prescription.index', $data);
    }
}
