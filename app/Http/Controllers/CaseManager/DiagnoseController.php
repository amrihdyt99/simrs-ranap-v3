<?php

namespace App\Http\Controllers\CaseManager;

use App\Http\Controllers\Controller;
use App\Models\FormA;
use App\Models\MFormA;
use App\Models\PasienSoapDok;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;

class DiagnoseController extends Controller
{
    public function diagnose(RegistrationInap $patient)
    {
        $data['patient'] = $patient;
        $data['soap'] = PasienSoapDok::where('soapdok_reg', $patient->reg_no)->latest()->first();
        $data['m_section_1'] = MFormA::where(['section'=>"1"])->get();
        $data['m_section_2'] = MFormA::where(['section'=>"2"])->get();
        $data['m_section_3'] = MFormA::where(['section'=>"3"])->get();
        $data['section_1'] = FormA::with(['m_form_a'=>function($q){
            $q->where(['section'=>"1"]);
        }])->where(['reg_no'=>$patient->reg_no])->get();
        $data['section_2'] = FormA::with(['m_form_a'=>function($q){
            $q->where(['section'=>"2"]);
        }])->where(['reg_no'=>$patient->reg_no])->get();
        $data['section_3'] = FormA::with(['m_form_a'=>function($q){
            $q->where(['section'=>"3"]);
        }])->where(['reg_no'=>$patient->reg_no])->get();

        return view('case-manager.pages.patient.diagnose', $data);
    }

    public function save_form_a(Request $request, $reg_no)
    {
        FormA::where(['reg_no'=>$reg_no])->delete();
        $section1 = $request->input("section_1",[]);
        $section2 = $request->input("section_2",[]) ;
        $section3 = $request->input("section_3",[]);
        foreach ($section1 as $item) {
            $formA = new FormA;
            $formA->reg_no = $reg_no;
            $formA->m_form_a_id = $item;
            $formA->save();
        }
        foreach ($section2 as $item) {
            $formA = new FormA;
            $formA->reg_no = $reg_no;
            $formA->m_form_a_id = $item;
            $formA->save();
        }
        foreach ($section3 as $item) {
            $formA = new FormA;
            $formA->reg_no = $reg_no;
            $formA->m_form_a_id = $item;
            $formA->save();
        }
        return response()->json([
            "message" => "success"
        ]);
    }

    public function storeSOAP(Request $request, RegistrationInap $patient)
    {
        $val_data = $request->validate([
            'soapdok_subject' => ['string'],
            'soapdok_object' => ['string'],
            'soapdok_assesment' => ['string'],
            'soapdok_planning' => ['string'],
            'soapdok_reg' => [''],
            'soapdok_dokter' => [''],
            'soapdok_poli' => ['']
        ]);

        $val_data['soapdok_deleted'] = $request->input('soapdok_deleted', 0);

        PasienSoapDok::create($val_data);
        return redirect()->back();
    }
}
