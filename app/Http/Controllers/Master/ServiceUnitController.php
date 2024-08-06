<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ServiceUnit;
use Illuminate\Support\Facades\Validator;

class ServiceUnitController extends Controller
{

    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->ajax_index($request);
        }
        return view('master.pages.serviceunit.index');
    }

    public function ajax_index($request)
    {
        $serviceunit = DB::connection('mysql2')->table("m_unit");
        return DataTables()
            ->queryBuilder($serviceunit)
            ->editColumn('aksi_data', function ($query) use ($request) {
                return
                ( '<a href="'
                . route('master.serviceunit.edit', [$query->ServiceUnitCode])
                . '" class="btn btn-sm"><i class="fas fa-edit text-info"></i></a>' )
                .
                '<form action="'
                . route('master.serviceunit.destroy', [$query->ServiceUnitCode])
                . '" method="POST">'
                . csrf_field()
                . method_field('DELETE')
                . '<button class="btn btn-sm" type="submit" onclick="return confirm(\'Apakah yakin ingin menghapus?\')"><i class="fas fa-trash text-danger"></i></button></form>';
            })
            ->editColumn('IsUsingJobOrder', function ($query) use ($request) {
                return app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->request_ya_tidak_parser($query->IsUsingJobOrder);
            })
            ->editColumn('IsBor', function ($query) use ($request) {
                return app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->request_ya_tidak_parser($query->IsBor);
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function create(){
        $serviceunit=DB::connection('mysql2')->table('m_unit')
        ->get();
        return view('master.pages.serviceunit.create', compact('serviceunit'));
    }

    public function store(Request $request){

        DB::connection('mysql2')->table('m_unit')
        ->insert([
			'ServiceUnitCode' => $request->ServiceUnitCode,
			'ServiceUnitName' => $request->ServiceUnitName,
			'ShortName' => $request->ShortName,
			'Initial' => $request->Initial,
			'IsUsingJobOrder' => $request->IsUsingJobOrder,
			'PatientServiceInterval' => $request->PatientServiceInterval,
			'IsBor' => $request->IsBor,
		]);

        return redirect()->route('master.serviceunit.index')->with("success", "Data User Berhasil Ditambah.");
    }

    public function edit(Request $request, $id){
        $serviceunit = DB::connection('mysql2')
        ->table("m_unit")
        ->where('ServiceUnitCode', $id)
        ->first();
        return view('master.pages.serviceunit.update', compact('serviceunit'));
    }

    public function update(Request $request, $id)
    {
        DB::connection('mysql2')->table('m_unit')
        ->where('ServiceUnitCode', $id)
        ->update([
			'ServiceUnitCode' => $request->ServiceUnitCode,
			'ServiceUnitName' => $request->ServiceUnitName,
			'ShortName' => $request->ShortName,
			'Initial' => $request->Initial,
			'IsUsingJobOrder' => $request->IsUsingJobOrder,
			'PatientServiceInterval' => $request->PatientServiceInterval,
			'IsBor' => $request->IsBor,
		]);
        return redirect()->route('master.serviceunit.index')->with("success", "Data User Berhasil Diubah.");
    }

    public function destroy($id)
    {
        DB::connection('mysql2')
        ->table("m_unit")
        ->where('ServiceUnitCode', $id)
        ->delete();
        return redirect()->route('master.serviceunit.index')->with("success", "Data User Berhasil Dihapus.");
    }
}
