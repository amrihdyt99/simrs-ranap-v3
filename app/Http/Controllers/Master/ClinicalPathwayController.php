<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\ClinicalPathway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClinicalPathwayController extends Controller
{
    public function index()
    {
        $data['clinicalPathway'] = ClinicalPathway::all();
        return view('master.pages.clinical_pathway.index', $data);
    }

    public function create()
    {
        return view('master.pages.clinical_pathway.create');
    }

    public function store(Request $request)
    {
        $username=Auth::user()->username;
        $request['username']=$username;
        $input = $request->validate([
            'kode_path' => ['required'],
            'nama_path' => ['required'],
            'username' => ['required'],
        ]);

        ClinicalPathway::create($input);

        return redirect()->route('master.clinical_pathway.index');
    }

    public function edit(ClinicalPathway $clinical_pathway)
    {
        $data['clinicalPathway'] = $clinical_pathway;

        return view('master.pages.clinical_pathway.update', $data);
    }

    public function update(Request $request, ClinicalPathway $clinical_pathway)
    {
        $username=Auth::user()->username;
        $request['username']=$username;
        $input = $request->validate([
            'kode_path' => ['required'],
            'nama_path' => ['required'],
        ]);

        $clinical_pathway->update($input);
        return redirect()->route('master.clinical_pathway.index');
    }

    public function destroy(ClinicalPathway $clinical_pathway)
    {
        $clinical_pathway->delete();
        return redirect()->route('master.clinical_pathway.index');
    }
}
