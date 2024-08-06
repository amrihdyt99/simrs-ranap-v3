<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\RoomClass;
use Illuminate\Http\Request;

class RoomClassController extends Controller
{
    public function index()
    {
        $data['classes'] = RoomClass::all();
        return view('master.pages.class.index', $data);
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
