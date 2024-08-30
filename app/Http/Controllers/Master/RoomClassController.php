<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\RoomClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomClassController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->ajax_index($request);
        }

        return view('master.pages.class.index');
    }

    public function ajax_index(Request $request)
    {
        $ruangan = DB::connection('mysql2')->table('m_room_class');

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
                $editUrl = route('master.ruangan.edit', [$query->ClassCode]);

                $editButton = '<a href="' . $editUrl . '" class="protecc btn btn-sm btn-info mr-2 mb-2">
                            Edit
                        </a>';

                $deleteButton = '<button type="button" class="protecc btn btn-sm btn-danger mr-2 mb-2" 
                                onclick="confirmDelete(this)" 
                                data-id="' . $query->ClassCode . '">
                                Hapus
                            </button>';

                $activateButton = $query->IsActive == 0
                    ? '<button type="button" class="protecc btn btn-sm btn-success mr-2 mb-2" 
                                            onclick="changeStatus(this)"
                                            data-id="' . $query->ClassCode . '">Aktifkan</button>'
                    : '';

                $deactivateButton = $query->IsActive == 1
                    ? '<button type="button" class="protecc btn btn-sm btn-warning mr-2 mb-2" 
                                            onclick="changeStatus(this)"
                                            data-id="' . $query->ClassCode . '">Nonaktifkan</button>'
                    : '';

                return $editButton . $deleteButton . $deactivateButton . $activateButton;
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function create()
    {
        return view('master.pages.class.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'ClassCode' => ['required', 'string'],
            'ClassName' => ['required', 'string']
        ]);

        RoomClass::create($input);

        return redirect()->route('master.class.index');
    }

    public function edit(RoomClass $class)
    {
        return view('master.pages.class.update', ['room_class' => $class]);
    }

    public function update(Request $request, RoomClass $class)
    {
        $input = $request->validate([
            'ClassCode' => ['required', 'string'],
            'ClassName' => ['required', 'string']
        ]);

        $class->update($input);
        return redirect()->route('master.class.index');
    }

    public function destroy(RoomClass $class)
    {
        $class->delete();
        return redirect()->route('master.class.index');
    }
}
