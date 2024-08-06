<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\ClinicalPathway;
use App\Models\Diagnosis;
use App\Models\Outcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OutcomeController extends Controller
{
    public function index(ClinicalPathway $clinical_pathway)
    {
        $data['clinicalPathway'] = $clinical_pathway;
        return view('master.pages.outcome.index', $data);
    }

    public function create(ClinicalPathway $clinical_pathway)
    {
        return view('master.pages.outcome.create', ['clinicalPathway' => $clinical_pathway]);
    }

    public function store(Request $request, ClinicalPathway $clinical_pathway)
    {
        $username=Auth::user()->username;
        $request['username']=$username;
        $input = $request->validate([
            'nama_outcome' => ['required'],
        ]);

        $input['kode_path'] = $clinical_pathway->kode_path;

        Outcome::create($input);

        return redirect()->route('master.clinical_pathway.outcome.index', ['clinical_pathway' => $clinical_pathway->id]);
    }

    public function edit(Outcome $outcome)
    {

        $data['outcome'] = $outcome;

        return view('master.pages.outcome.update', $data);
    }

    public function update(Request $request, Outcome $outcome)
    {
        $username=Auth::user()->username;
        $request['username']=$username;
        $input = $request->validate([
            'nama_outcome' => ['required'],
        ]);

        $outcome->update($input);
        return redirect()->route('master.clinical_pathway.outcome.index', ['clinical_pathway' => $outcome->clinicalPathway->id]);
    }

    public function destroy(Outcome $outcome)
    {
        $outcome->delete();
        return redirect()->route('master.clinical_pathway.outcome.index', ['clinical_pathway' => $outcome->clinicalPathway->id]);
    }
}
