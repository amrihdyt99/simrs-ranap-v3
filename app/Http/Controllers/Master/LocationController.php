<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->ajax_index($request);
        }
        return view('master.pages.location.index');
    }

    public function ajax_index($request)
    {
        $location = DB::connection('mysql2')->table("m_location");
        return DataTables()
            ->queryBuilder($location)
            ->editColumn('aksi_data', function ($query) use ($request) {
                return
                ( '<a href="'
                . route('master.location.edit', [$query->LocationID])
                . '" class="protecc btn btn-sm btn-info mr-2 mb-2"">Edit</a>' )
                .
                '<form action="'
                . route('master.location.destroy', [$query->LocationID])
                . '" method="POST">'
                . csrf_field()
                . method_field('DELETE')
                . '<button class="protecc btn btn-sm btn-danger mr-2 mb-2" type="submit" onclick="return confirm(\'Apakah yakin ingin menghapus?\')">Hapus</button></form>';
            })
            ->editColumn('IsAllowOverIssued', function ($query) use ($request) {
                return app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->request_ya_tidak_parser($query->IsAllowOverIssued);
            })
            ->editColumn('IsNettable', function ($query) use ($request) {
                return app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->request_ya_tidak_parser($query->IsNettable);
            })
            ->editColumn('IsHoldForTransaction', function ($query) use ($request) {
                return app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->request_ya_tidak_parser($query->IsHoldForTransaction);
            })
            ->editColumn('IsDisplayStock', function ($query) use ($request) {
                return app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->request_ya_tidak_parser($query->IsDisplayStock);
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function create(){
        $location=DB::connection('mysql2')->table('m_location')
        ->get();
        return view('master.pages.location.create', compact('location'));
    }

    public function store(Request $request){

        DB::connection('mysql2')->table('m_location')
        ->insert([
			'LocationID' => $request->LocationID,
			'SiteCode' => $request->SiteCode,
			'LocationCode' => $request->LocationCode,
			'LocationName' => $request->LocationName,
			'ShortName' => $request->ShortName,
			'Initial' => $request->Initial,
			'PermissionCode' => $request->PermissionCode,
			'ParentID' => $request->ParentID,
			'Remarks' => $request->Remarks,
			'IsAllowOverIssued' => $request->IsAllowOverIssued,
			'IsNettable' => $request->IsNettable,
			'IsHoldForTransaction' => $request->IsHoldForTransaction,
			'IsDisplayStock' => $request->IsDisplayStock,
		]);

        return redirect()->route('master.location.index')->with("success", "Data User Berhasil Ditambah.");
    }

    public function edit(Request $request, $id){
        $location = DB::connection('mysql2')
        ->table("m_location")
        ->where('LocationID', $id)
        ->first();
        return view('master.pages.location.update', compact('location'));
    }

    public function update(Request $request, $id)
    {
        DB::connection('mysql2')
        ->table('m_location')
        ->where('LocationID', $id)
        ->update([
			'LocationID' => $request->LocationID,
			'SiteCode' => $request->SiteCode,
			'LocationCode' => $request->LocationCode,
			'LocationName' => $request->LocationName,
			'ShortName' => $request->ShortName,
			'Initial' => $request->Initial,
			'PermissionCode' => $request->PermissionCode,
			'ParentID' => $request->ParentID,
			'Remarks' => $request->Remarks,
			'IsAllowOverIssued' => $request->IsAllowOverIssued,
			'IsNettable' => $request->IsNettable,
			'IsHoldForTransaction' => $request->IsHoldForTransaction,
			'IsDisplayStock' => $request->IsDisplayStock,
		]);
        return redirect()->route('master.location.index')->with("success", "Data User Berhasil Diubah.");
    }

    public function destroy($id)
    {
        DB::connection('mysql2')
        ->table("m_location")
        ->where('LocationID', $id)
        ->delete();
        return redirect()->route('master.location.index')->with("success", "Data User Berhasil Dihapus.");
    }

}
