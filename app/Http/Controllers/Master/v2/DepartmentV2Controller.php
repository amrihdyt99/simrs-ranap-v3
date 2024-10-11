<?php

namespace App\Http\Controllers\Master\v2;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentV2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $serviceunit = DB::connection('mysql2')->table("m_departemen")->where('IsDeleted', 0)->get();
            return DataTables()
                ->of($serviceunit)
                ->addColumn('action', function ($row) {
                    $editUrl = route('master.departement.edit', [$row->DepartmentCode]);

                    $actionBtn = '<div class="btn-group" role="group">';
                    $actionBtn .= "<button type='button' class='btn btn-warning'><a href='$editUrl'><i class='fas fa-edit'></i> Edit</a></button>";
                    $actionBtn .= "<button type='button' class='btn btn-danger' onclick='confirmDelete(this)' data-id='$row->DepartmentCode'><i class='fas fa-trash'></i> Hapus</button>";
                    $actionBtn .= '</div>';

                    return $actionBtn;
                })
                ->escapeColumns([])
                ->toJson();
        }
        return view('master.pages.departement.v2.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('master.pages.departement.v2.create');
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
            'DepartmentCode' => ['required', 'string'],
            'DepartmentName' => ['required', 'string'],
            'ShortName' => ['required', 'string'],
            'Initial' => ['required', 'string'],
            'IsActive'  => ['numeric'],
        ]);

        $validation['LastUpdatedBy'] = auth()->user()->username;
        $validation['created_at'] = Carbon::now();

        Department::create($validation);
        return redirect()->route('master.departement.index');
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
        $department = Department::find($id);
        return view('master.pages.departement.v2.update', ['department' => $department]);
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

        $department = Department::find($id);
        $validation = $request->validate([
            'DepartmentName' => ['required', 'string'],
            'ShortName' => ['required', 'string'],
            'Initial' => ['required', 'string'],
            'IsActive'  => ['numeric'],
        ]);

        $validation['LastUpdatedBy'] = auth()->user()->username;
        $validation['updated_at'] = Carbon::now();
        $department->update($validation);

        return redirect()->route('master.departement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = DB::connection('mysql2')
            ->table('m_departemen')
            ->where('DepartmentCode', $id)
            ->first();

        if (!$department) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        DB::connection('mysql2')
            ->table('m_departemen')
            ->where('DepartmentCode', $id)
            ->update([
                'IsDeleted' => 1,
                'LastUpdatedBy' => auth()->user()->username,
                'updated_at' => Carbon::now(),
            ]);

        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
