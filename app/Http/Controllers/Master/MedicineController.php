<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $data['medicines'] = Medicine::all();
        return view('master.pages.medicine.index', $data);
    }

    public function create()
    {
        return view('master.pages.medicine.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'kode' => ['required', 'string'],
            'nama' => ['required', 'string'],
            'harga' => ['required'],
            'stok' => ['required'],
        ]);

        Medicine::create($input);

        return redirect()->route('master.medicine.index');
    }

    public function edit(Medicine $medicine)
    {
        return view('master.pages.medicine.update', ['medicine' => $medicine]);
    }

    public function update(Request $request, Medicine $medicine)
    {
        $input = $request->validate([
            'kode' => ['required', 'string'],
            'nama' => ['required', 'string'],
            'harga' => ['required'],
            'stok' => ['required'],
        ]);

        $medicine->update($input);
        return redirect()->route('master.medicine.index');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('master.medicine.index');
    }
}
