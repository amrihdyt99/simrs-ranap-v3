<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\ClinicalPathway;
use App\Models\Diagnosis;
use App\Models\Intervention;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InterventionController extends Controller
{
    public function index(ClinicalPathway $clinical_pathway)
    {
        $data['clinicalPathway'] = $clinical_pathway;
        return view('master.pages.intervention.index', $data);
    }

    public function create(ClinicalPathway $clinical_pathway)
    {
        return view('master.pages.intervention.create', ['clinicalPathway' => $clinical_pathway]);
    }

    public function store(Request $request, ClinicalPathway $clinical_pathway)
    {
        $username=Auth::user()->username;
        $request['username']=$username;
        $input = $request->validate([
            'nama_intervention' => ['required'],
        ]);

        $input['kode_path'] = $clinical_pathway->kode_path;

        Intervention::create($input);

        return redirect()->route('master.clinical_pathway.intervention.index', ['clinical_pathway' => $clinical_pathway->id]);
    }

    public function edit(Intervention $intervention)
    {
        $data['intervention'] = $intervention;

        return view('master.pages.intervention.update', $data);
    }

    public function update(Request $request, Intervention $intervention)
    {
        $username=Auth::user()->username;
        $request['username']=$username;
        $input = $request->validate([
            'nama_intervention' => ['required'],
        ]);

        $intervention->update($input);
        return redirect()->route('master.clinical_pathway.intervention.index', ['clinical_pathway' => $intervention->clinicalPathway->id]);
    }

    public function destroy(Intervention $intervention)
    {
        $intervention->delete();
        return redirect()->route('master.clinical_pathway.intervention.index', ['clinical_pathway' => $intervention->clinicalPathway->id]);
    }
}
