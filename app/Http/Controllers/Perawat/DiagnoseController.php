<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use App\Models\PasienSoaper;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;

class DiagnoseController extends Controller
{
    public function diagnose($reg_no)
    {
        $data['registrationInap'] = RegistrationInap::find($reg_no);
        $data['soap'] = PasienSoaper::where('soaper_reg', $reg_no)->latest()->get();
//        dd($data);
        return view('perawat.pages.patient.diagnose', $data);
    }

    public function storeSOAP(Request $request)
    {
        $val_data = $request->validate([
            'soaper_subject' => ['string'],
            'soaper_object' => ['string'],
            'soaper_assesment' => ['string'],
            'soaper_planning' => ['string'],
            'soaper_reg' => [''],
            'soaper_perawat' => [''],
            'soaper_poli' => ['']
        ]);

        $val_data['soaper_deleted'] = $request->input('soaper_deleted', 0);

        PasienSoaper::create($val_data);
        return redirect()->back();
    }

}


