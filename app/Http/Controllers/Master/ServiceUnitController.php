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
        $serviceunit = DB::connection('mysql2')->table("m_service_unit_room");
        return DataTables()
            ->queryBuilder($serviceunit)
            ->editColumn('aksi_data', function ($query) use ($request) {
                return
                ( '<a href="'
                . route('master.serviceunit.edit', [$query->RoomID])
                . '" class="btn btn-sm"><i class="fas fa-edit text-info"></i></a>' )
                .
                '<form action="'
                . route('master.serviceunit.destroy', [$query->RoomID])
                . '" method="POST">'
                . csrf_field()
                . method_field('DELETE')
                . '<button class="btn btn-sm" type="submit" onclick="return confirm(\'Apakah yakin ingin menghapus?\')"><i class="fas fa-trash text-danger"></i></button></form>';
            })
            ->editColumn('RoomID', function ($query) use ($request) {
                $room = DB::connection('mysql2')
                    ->table("m_ruangan")
                    ->where('RoomID', $query->RoomID)
                    ->select('RoomName')
                    ->first();
                
                return $room->RoomName;
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function create(){
        
        return view('master.pages.serviceunit.create', compact('serviceunit'));
    }

    public function store(Request $request){

        DB::connection('mysql2')->table('m_service_unit_room')
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
        DB::connection('mysql2')->table('m_service_unit_room')
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
