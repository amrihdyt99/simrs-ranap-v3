<?php

namespace App\Http\Controllers\Master\v2;

use App\Http\Controllers\Controller;
use App\Models\ServiceUnit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewServiceUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $serviceunit = DB::connection('mysql2')->table("m_unit")->where('IsDeleted', 0)->get();
            return DataTables()
                ->of($serviceunit)
                ->addColumn('action', function ($row) {
                    $editUrl = route('master.serviceunit.edit', [$row->ServiceUnitCode]);

                    $actionBtn = '<div class="btn-group" role="group">';
                    $actionBtn .= "<button type='button' class='btn btn-warning'><a href='$editUrl'><i class='fas fa-edit'></i> Edit</a></button>";
                    $actionBtn .= "<button type='button' class='btn btn-danger' onclick='confirmDelete(this)' data-id='$row->ServiceUnitCode'><i class='fas fa-trash'></i> Hapus</button>";
                    $actionBtn .= '</div>';

                    return $actionBtn;
                })
                ->escapeColumns([])
                ->toJson();
        }
        return view('master.pages.serviceunit.v2.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.pages.serviceunit.v2.create');
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
            'IsActive'  => ['numeric'],
        ]);


        $validation['LastUpdatedBy'] = auth()->user()->username;
        $validation['created_at'] = Carbon::now();

        ServiceUnit::create($validation);
        return redirect()->route('master.serviceunit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = ServiceUnit::find($id);
        return view('master.pages.serviceunit.v2.update', ['unit' => $unit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $unit = ServiceUnit::find($id);
        $validation = $request->validate([
            'ServiceUnitName' => ['required', 'string'],
            'ShortName' => ['required', 'string'],
            'Initial' => ['required', 'string'],
            'IsActive'  => ['numeric'],
        ]);

        $unit->update($validation);
        return redirect()->route('master.serviceunit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = DB::connection('mysql2')
            ->table('m_unit')
            ->where('ServiceUnitCode', $id)
            ->first();

        if (!$unit) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        DB::connection('mysql2')
            ->table('m_unit')
            ->where('ServiceUnitCode', $id)
            ->update([
                'IsDeleted' => 1,
                'LastUpdatedBy' => auth()->user()->username,
                'LastUpdatedDateTime' => Carbon::now(),
            ]);

        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
