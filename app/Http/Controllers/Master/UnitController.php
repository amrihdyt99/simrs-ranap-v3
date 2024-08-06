<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\ServiceUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$unit = ServiceUnit::all();
        $unit =DB::connection('mysql')
            ->table('rs_m_service_unit')
            ->get();
        return view('master.pages.unit.index', ['unit' => $unit]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.pages.unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'ServiceUnitCode' => ['required', 'string'],
            'ServiceUnitName' => ['required', 'string'],
            'ShortName' => ['required', 'string'],
            'Initial' => ['required', 'string'],
        ]);

        $validation['IsDeleted'] = $request->input('IsDeleted', 0);

        ServiceUnit::create($validation);
        return redirect()->route('master.unit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceUnit  $serviceUnit
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceUnit $unit)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceUnit  $serviceUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceUnit $unit)
    {
        return view('master.pages.unit.update', ['unit' => $unit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceUnit  $serviceUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceUnit $unit)
    {
        $validation = $request->validate([
            'ServiceUnitName' => ['required', 'string'],
            'ShortName' => ['required', 'string'],
            'Initial' => ['required', 'string'],
        ]);

        $unit->update($validation);
        return redirect()->route('master.unit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceUnit  $serviceUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceUnit $unit)
    {
        $unit->delete();
        return redirect()->route('master.unit.index');
    }
}
