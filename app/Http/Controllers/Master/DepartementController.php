<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartementController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->ajax_index($request);
        }
        return view('master.pages.departement.index');
    }

    public function ajax_index($request)
    {
        $departement = DB::connection('mysql2')->table("m_unit_departemen");
        return DataTables()
            ->queryBuilder($departement)
            ->editColumn('aksi_data', function ($query) use ($request) {
                return
                ( '<a href="'
                . route('master.departement.edit', [$query->ServiceUnitID])
                . '" class="btn btn-sm"><i class="fas fa-edit text-info"></i></a>' )
                .
                '<form action="'
                . route('master.departement.destroy', [$query->ServiceUnitID])
                . '" method="POST">'
                . csrf_field()
                . method_field('DELETE')
                . '<button class="btn btn-sm" type="submit" onclick="return confirm(\'Apakah yakin ingin menghapus?\')"><i class="fas fa-trash text-danger"></i></button></form>';
            })
            ->editColumn('LocationID', function ($query) use ($request) {
                $location = DB::connection('mysql2')
                    ->table("m_location")
                    ->where('LocationID', $query->LocationID)
                    ->select('LocationName')
                    ->first();
                
                return $location->LocationName;
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function create(){
        $departement=DB::connection('mysql')->table('rs_m_department')
        ->get();
        return view('master.pages.departement.create', compact('departement'));
    }

    public function store(Request $request){

        DB::connection('mysql')->table('rs_m_department')
        ->insert([
			'DepartmentCode' => $request->DepartmentCode,
			'DepartmentName' => $request->DepartmentName,
			'ShortName' => $request->ShortName,
			'Initial' => $request->Initial,
			'IsHasRegistration' => $request->IsHasRegistration,
			'IsHasPrescription' => $request->IsHasPrescription,
			'IsGenerateMedicalNo' => $request->IsGenerateMedicalNo,
		]);

        return redirect()->route('master.departement.index')->with("success", "Data User Berhasil Ditambah.");
    }

    public function edit(Request $request, $id){
        $departement = DB::connection('mysql')
        ->table("rs_m_department")
        ->where('DepartmentCode', $id)
        ->first();
        return view('master.pages.departement.update', compact('departement'));
    }

    public function update(Request $request, $id)
    {
        DB::connection('mysql')
        ->table('rs_m_department')
        ->where('DepartmentCode', $id)
        ->update([
			'DepartmentCode' => $request->DepartmentCode,
			'DepartmentName' => $request->DepartmentName,
			'ShortName' => $request->ShortName,
			'Initial' => $request->Initial,
			'IsHasRegistration' => $request->IsHasRegistration,
			'IsHasPrescription' => $request->IsHasPrescription,
			'IsGenerateMedicalNo' => $request->IsGenerateMedicalNo,
		]);
        return redirect()->route('master.departement.index')->with("success", "Data User Berhasil Diubah.");
    }

    public function destroy($id)
    {
        DB::connection('mysql')
        ->table("rs_m_department")
        ->where('DepartmentCode', $id)
        ->delete();
        return redirect()->route('master.departement.index')->with("success", "Data User Berhasil Dihapus.");
    }

}
