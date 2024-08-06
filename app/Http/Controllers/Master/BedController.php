<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\RoomClass;
use App\Models\ServiceRoom;
use App\Models\ServiceUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BedController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->ajax_index($request);
        }
        return view('master.pages.bed.index');
    }

    public function ajax_index($request)
    {
        $bed = Bed::with([
            'unit',
            'room',
            'class_category',
            'registration',
            'registration.pasien',
        ]);
        return DataTables()
            ->eloquent($bed)
            ->editColumn('aksi_data', function ($query) use ($request) {
                return
                ( '<a href="'
                . route('master.bed.edit', [$query->bed_id])
                . '" class="btn btn-sm"><i class="fas fa-edit text-info"></i></a>' )
                .
                '<form action="'
                . route('master.bed.destroy', [$query->bed_id])
                . '" method="POST">'
                . csrf_field()
                . method_field('DELETE')
                . '<button class="btn btn-sm" type="submit" onclick="return confirm(\'Apakah yakin ingin menghapus?\')"><i class="fas fa-trash text-danger"></i></button></form>';
            })
            ->editColumn('reg_no', function ($query) use ($request) {
                if($query->registration){
                    return $query->registration->reg_no;
                }else{
                    return '';
                }
            })
            ->editColumn('medrec', function ($query) use ($request) {
                return $query->registration ? $query->registration->medrec : '';
            })
            ->editColumn('RoomName', function ($query) use ($request) {
                return $query->room ? $query->room->RoomName : '';
            })
            ->editColumn('PatientName', function ($query) use ($request) {
                return $query->registration ? ($query->registration->pasien ? $query->registration->pasien->PatientName :'') : '';
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function create()
    {
        $data['service_unit'] = DB::connection('mysql')->table('rs_m_service_unit')->get();
        $data['room'] = DB::connection('mysql')->table('rs_m_service_room')->get();
        $data['class'] = RoomClass::all();
        return view('master.pages.bed.create', $data);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'bed_id' => ['required'],
            'service_unit_id' => ['required'],
            'room_id' => ['required'],
            'class_code' => ['required'],
        ]);

        $input['bed_status'] = 'ready';
        $input['bed_code'] = $request->bed_code;

        Bed::create($input);

        return redirect()->route('master.bed.index')->with("success", "Data User Berhasil Ditambah.");
    }

    public function edit(Bed $bed)
    {
        $data['service_unit'] = ServiceUnit::all();
        $data['room'] = ServiceRoom::all();
        $data['class'] = RoomClass::all();
        $data['bed'] = $bed;

        return view('master.pages.bed.update', $data);
    }

    public function update(Request $request, Bed $bed)
    {
        $input = $request->validate([
            'bed_id ' => ['required', 'string'],
            'service_unit_id' => ['required', 'string'],
            'room_id' => ['required', 'string'],
            'class_code' => ['required', 'string'],
            'bed_status' => ['required', 'string'],
        ]);

        $bed->update($input);
        return redirect()->route('master.bed.index')->with("success", "Data User Berhasil Diubah.");
    }

    public function destroy(Bed $bed)
    {
        $bed->delete();
        return redirect()->route('master.bed.index')->with("success", "Data User Berhasil Dihapus.");;
    }
}
