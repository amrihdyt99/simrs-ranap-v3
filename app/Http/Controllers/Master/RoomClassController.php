<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\ClassCategory;
use App\Models\RoomClass;
use Carbon\Carbon;
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
        $ruangan = DB::connection('mysql2')->table('m_room_class')->select('m_room_class.*', 'm_class_category.ClassCategoryName')
            ->leftJoin('m_class_category', 'm_class_category.ClassCategoryCode', '=', 'm_room_class.ClassCategoryCode')->get();

        return DataTables()
            ->of($ruangan)
            ->addColumn('action', function ($row) {
                $editUrl = route('master.class.edit', [$row->ClassCode]);

                $actionBtn = '<div class="btn-group" role="group">';
                $actionBtn .= "<button type='button' class='btn btn-warning'><a href='$editUrl'><i class='fas fa-edit'></i> Edit</a></button>";
                $actionBtn .= "<button type='button' class='btn btn-danger' onclick='confirmDelete(this)' data-id='$row->ClassCode'><i class='fas fa-trash'></i> Hapus</button>";
                $actionBtn .= '</div>';

                return $actionBtn;
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function create()
    {

        $classCategory = ClassCategory::where('IsActive', 1)->get();

        return view('master.pages.class.create', compact('classCategory'));
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'ClassCode' => ['required', 'string'],
            'ClassName' => ['required', 'string'],
            'ShortName' => ['string'],
            'Initial' => ['string'],
            'ClassCategoryCode' => ['required', 'string'],
            'IsActive'  => ['numeric'],
        ]);

        $input['LastUpdatedBy'] = auth()->user()->username;
        $input['LastUpdatedDateTime'] = Carbon::now()->format('Y-m-d H:i:s');

        RoomClass::create($input);

        return redirect()->route('master.class.index');
    }

    public function edit(RoomClass $class)
    {
        $classCategory = ClassCategory::where('IsActive', 1)->get();
        return view('master.pages.class.update', ['room_class' => $class, 'classCategory' => $classCategory]);
    }

    public function update(Request $request, RoomClass $class)
    {
        $input = $request->validate([
            'ClassName' => ['required', 'string'],
            'ShortName' => ['string'],
            'Initial' => ['string'],
            'ClassCategoryCode' => ['required', 'string'],
            'IsActive'  => ['numeric'],
        ]);
        $input['LastUpdatedBy'] = auth()->user()->username;
        $input['LastUpdatedDateTime'] = Carbon::now()->format('Y-m-d H:i:s');

        $class->update($input);
        return redirect()->route('master.class.index');
    }

    public function destroy(RoomClass $class)
    {
        $class->delete();
        return redirect()->route('master.class.index');
    }
}
