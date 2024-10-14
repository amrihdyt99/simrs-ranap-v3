<?php

namespace App\Http\Controllers\Master\v2;

use App\Http\Controllers\Controller;
use App\Models\Master\DTD;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DTDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $serviceunit = DB::connection('mysql2')->table("m_dtd")->get();
            return DataTables()
                ->of($serviceunit)
                ->addColumn('action', function ($row) {
                    $editUrl = route('master.dtd.edit', [$row->DTDNo]);

                    $actionBtn = '<div class="btn-group" role="group">';
                    $actionBtn .= "<button type='button' class='btn btn-warning'><a href='$editUrl'><i class='fas fa-edit'></i> Edit</a></button>";
                    $actionBtn .= "<button type='button' class='btn btn-danger' onclick='confirmDelete(this)' data-id='$row->DTDNo'><i class='fas fa-trash'></i> Hapus</button>";
                    $actionBtn .= '</div>';

                    return $actionBtn;
                })
                ->escapeColumns([])
                ->toJson();
        }
        return view('master.pages.dtd.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.pages.dtd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'DTDNo' => ['required', 'string'],
            'DTDName' => ['required', 'string'],
            'DTDLabel' => ['required', 'string'],
            'IsActive'  => ['numeric'],
        ]);

        $cek = DTD::find($request->DTDNo);
        if ($cek) {
            return response()->json([
                'status' => 'failed',
                'message' => 'DTD No. sudah digunakan !',
            ]);
        }

        $validation['LastUpdatedBy'] = auth()->user()->username;
        $validation['LastUpdatedDateTime'] = Carbon::now()->toDateTimeString();

        DTD::create($validation);
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil disimpan !',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $dtd = DTD::find($id);
        return view('master.pages.dtd.update', compact('dtd'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $dtd = DTD::find($id);
        $validation = $request->validate([
            'DTDNo' => ['required', 'string'],
            'DTDName' => ['required', 'string'],
            'DTDLabel' => ['required', 'string'],
            'IsActive'  => ['numeric'],
        ]);

        $validation['LastUpdatedBy'] = auth()->user()->username;
        $validation['LastUpdatedDateTime'] = Carbon::now()->toDateTimeString();
        $dtd->update($validation);

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil disimpan !',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dtd = DTD::find($id);
        $dtd->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
