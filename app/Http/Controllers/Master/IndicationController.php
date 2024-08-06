<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Indication;
use Illuminate\Http\Request;

class IndicationController extends Controller
{
    public function index()
    {
        $data['indications'] = Indication::all();
        return view('master.pages.indication.index', $data);
    }

    public function create()
    {
        return view('master.pages.indication.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'kode' => ['required', 'string'],
            'gejala' => ['required', 'string']
        ]);

        Indication::create($input);

        return redirect()->route('master.indication.index');
    }

    public function edit(Indication $indication)
    {
        return view('master.pages.indication.update', ['indication' => $indication]);
    }

    public function update(Request $request, Indication $indication)
    {
        $input = $request->validate([
            'kode' => ['required', 'string'],
            'gejala' => ['required', 'string']
        ]);

        $indication->update($input);
        return redirect()->route('master.indication.index');
    }

    public function destroy(Indication $indication)
    {
        $indication->delete();
        return redirect()->route('master.indication.index');
    }
}
