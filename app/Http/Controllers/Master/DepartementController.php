<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartementController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->ajax_index($request);
        }
        return view('master.pages.departement.index');
    }

    public function ajax_index($request)
    {
        $departement = DB::connection('mysql2')->table("m_unit_departemen");
        return DataTables()
            ->of($departement)
            ->editColumn('aksi_data', function ($query) use ($request) {
                $editUrl = route('master.departement.edit', [$query->ServiceUnitID]);

                $editButton = '<a href="' . $editUrl . '" class="protecc btn btn-sm btn-info mr-2 mb-2">
                            Edit
                        </a>';

                $deleteButton = '<button type="button" class="protecc btn btn-sm btn-danger mr-2 mb-2" 
                                onclick="confirmDelete(this)" 
                                data-id="' . $query->ServiceUnitID . '">
                                Hapus
                            </button>';

                return $editButton . $deleteButton;
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

    public function create()
    {

        return view('master.pages.departement.create');
    }

    public function store(Request $request)
    {

        DB::connection('mysql')->table('m_unit_departemen')
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

    public function edit(Request $request, $id)
    {
        $departement = DB::connection('mysql2')
            ->table("m_unit_departemen")
            ->where('ServiceUnitID', $id)
            ->first();
        return view('master.pages.departement.update', compact('departement'));
    }

    public function update(Request $request, $id)
    {
        DB::connection('mysql2')
            ->table('m_unit_departemen')
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
        $deleted = DB::connection('mysql2')
            ->table("m_unit_departemen")
            ->where('ServiceUnitID', $id)
            ->delete();

        if ($deleted) {
            return response()->json(['success' => 'Data berhasil dihapus.']);
        } else {
            return response()->json(['error' => 'Gagal menghapus data.'], 500);
        }
    }

    public function getServiceUnitLantai(Request $request) {
        $data = DB::connection('mysql2')
            ->table('m_unit');
            
        if (isset($request->serviceCode)) {
            $data = $data->whereIn('ServiceUnitCode', [$request->serviceCode]);
        } else {
            $data = $data->whereIn('ServiceUnitCode', ['P029', 'P066', 'RI06', 'RI07', 'lt09', 'pavvip']);
        }

        $data = $data->distinct('m_unit.ServiceUnitCode')
            ->get();
        
        return $data;
    }
}
