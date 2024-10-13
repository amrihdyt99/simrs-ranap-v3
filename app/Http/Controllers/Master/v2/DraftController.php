<?php

namespace App\Http\Controllers\Master\v2;

use App\Http\Controllers\Controller;
use App\Models\Master\Draft;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $serviceunit = DB::connection('mysql2')->table("m_draft")->get();
            return DataTables()
                ->of($serviceunit)
                ->addColumn('action', function ($row) {
                    $editUrl = route('master.draft.edit', [$row->draft_id]);

                    $actionBtn = '<div class="btn-group" role="group">';
                    $actionBtn .= "<button type='button' class='btn btn-warning'><a href='$editUrl'><i class='fas fa-edit'></i> Edit</a></button>";
                    $actionBtn .= "<button type='button' class='btn btn-danger' onclick='confirmDelete(this)' data-id='$row->draft_id'><i class='fas fa-trash'></i> Hapus</button>";
                    $actionBtn .= '</div>';

                    return $actionBtn;
                })
                ->escapeColumns([])
                ->toJson();
        }
        return view('master.pages.draft.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.pages.draft.create');
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
            'draft_nama' => ['required', 'string'],
            'draft_jenis' => ['required', 'string'],
            'draft_kategori'  => ['string', 'nullable'],
        ]);

        $validation['draft_user'] = auth()->user()->id;
        $validation['created_at'] = Carbon::now();

        Draft::create($validation);
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
        $draft = Draft::find($id);
        return view('master.pages.draft.update', compact('draft'));
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
        $draft = Draft::find($id);
        $validation = $request->validate([
            'draft_nama' => ['required', 'string'],
            'draft_jenis' => ['required', 'string'],
            'draft_kategori'  => ['string', 'nullable'],
        ]);

        $validation['draft_user'] = auth()->user()->id;
        $validation['created_at'] = Carbon::now();
        $draft->update($validation);

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


        $draft = Draft::find($id);
        $draft->delete();

        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
