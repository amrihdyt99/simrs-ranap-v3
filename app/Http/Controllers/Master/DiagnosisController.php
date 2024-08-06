<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\ClinicalPathway;
use App\Models\Diagnosis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiagnosisController extends Controller
{
    public function index(ClinicalPathway $clinical_pathway)
    {
        $data['clinicalPathway'] = $clinical_pathway;
        return view('master.pages.diagnosis.index', $data);
    }

    public function create(ClinicalPathway $clinical_pathway)
    {
        return view('master.pages.diagnosis.create', ['clinicalPathway' => $clinical_pathway]);
    }

    public function store(Request $request, ClinicalPathway $clinical_pathway)
    {
        $username=Auth::user()->username;
        $request['username']=$username;
        $input = $request->validate([
            'nama_diagnosis' => ['required'],
        ]);

        $input['kode_path'] = $clinical_pathway->kode_path;

        Diagnosis::create($input);

        return redirect()->route('master.clinical_pathway.diagnosis.index', ['clinical_pathway' => $clinical_pathway->id]);
    }

    public function edit(Diagnosis $diagnosi)
    {
        $data['diagnosis'] = $diagnosi;

        return view('master.pages.diagnosis.update', $data);
    }

    public function update(Request $request, Diagnosis $diagnosi)
    {
        $username=Auth::user()->username;
        $request['username']=$username;
        $input = $request->validate([
            'nama_diagnosis' => ['required'],
        ]);

        $diagnosi->update($input);
        return redirect()->route('master.clinical_pathway.diagnosis.index', ['clinical_pathway' => $diagnosi->clinicalPathway->id]);
    }

    public function destroy(Diagnosis $diagnosi)
    {
        $diagnosi->delete();
        return redirect()->route('master.clinical_pathway.diagnosis.index', ['clinical_pathway' => $diagnosi->clinicalPathway->id]);
    }
}
