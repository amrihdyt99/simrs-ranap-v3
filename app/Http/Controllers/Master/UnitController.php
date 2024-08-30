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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->ajax_index($request);
        }

        return view('master.pages.unit.index');
    }

    public function ajax_index(Request $request)
    {
        $ruangan = DB::connection('mysql2')->table('m_unit');

        if ($request->has('IsDeleted') && $request->IsDeleted !== '') {
            if ($request->IsDeleted == '1') {
                $ruangan->where('IsDeleted', 1);
            } else if ($request->IsDeleted == '0') {
                $ruangan->where('IsDeleted', 0);
            }
        }

        if ($request->has('IsActive') && $request->IsActive !== '') {
            if ($request->IsActive == '1') {
                $ruangan->where('IsActive', 1);
            } else if ($request->IsActive == '0') {
                $ruangan->where('IsActive', 0);
            }
        }

        return DataTables()
            ->of($ruangan)
            ->editColumn('aksi_data', function ($query) {
                $editUrl = route('master.unit.edit', [$query->ServiceUnitCode]);

                $editButton = '<a href="' . $editUrl . '" class="protecc btn btn-sm btn-info mr-2 mb-2">
                            Edit
                        </a>';

                $deleteButton = '<button type="button" class="protecc btn btn-sm btn-danger mr-2 mb-2" 
                                onclick="confirmDelete(this)" 
                                data-id="' . $query->ServiceUnitCode . '">
                                Hapus
                            </button>';

                $activateButton = $query->IsActive == 0
                    ? '<button type="button" class="protecc btn btn-sm btn-success mr-2 mb-2" 
                                            onclick="changeStatus(this)"
                                            data-id="' . $query->ServiceUnitCode . '">Aktifkan</button>'
                    : '';

                $deactivateButton = $query->IsActive == 1
                    ? '<button type="button" class="protecc btn btn-sm btn-warning mr-2 mb-2" 
                                            onclick="changeStatus(this)"
                                            data-id="' . $query->ServiceUnitCode . '">Nonaktifkan</button>'
                    : '';

                return $editButton . $deleteButton . $deactivateButton . $activateButton;
            })
            ->escapeColumns([])
            ->toJson();
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
