<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\ItemGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $serviceunit = DB::connection('mysql2')->table("m_item_group")->where('IsDeleted', 0)->get();
            return DataTables()
                ->of($serviceunit)
                ->addColumn('action', function ($row) {
                    $editUrl = route('master.item-group.edit', [$row->ItemGroupCode]);

                    $actionBtn = '<div class="btn-group" role="group">';
                    $actionBtn .= "<button type='button' class='btn btn-warning'><a href='$editUrl'><i class='fas fa-edit'></i> Edit</a></button>";
                    $actionBtn .= "<button type='button' class='btn btn-danger' onclick='confirmDelete(this)' data-id='$row->ItemGroupCode'><i class='fas fa-trash'></i> Hapus</button>";
                    $actionBtn .= '</div>';

                    return $actionBtn;
                })
                ->escapeColumns([])
                ->toJson();
        }
        return view('master.pages.item_group.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.pages.item_group.create');
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
            'ItemGroupCode' => ['required', 'string'],
            'GCItemType' => ['required', 'string'],
            'ItemGroupName1' => ['required', 'string'],
            'ItemGroupName2' => ['nullable', 'string'],
            'IsActive'  => ['numeric'],
        ]);

        $cek = ItemGroup::find($request->ItemGroupCode);
        if ($cek) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Kode Item Group sudah digunakan !',
            ]);
        }

        $validation['LastUpdatedBy'] = auth()->user()->username;
        $validation['LastUpdatedDateTime'] = Carbon::now()->toDateTimeString();

        ItemGroup::create($validation);
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

        $itemGroup = ItemGroup::find($id);
        return view('master.pages.item_group.update', compact('itemGroup'));
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
        $itemGroup = ItemGroup::find($id);
        $validation = $request->validate([
            'GCItemType' => ['required', 'string'],
            'ItemGroupName1' => ['required', 'string'],
            'ItemGroupName2' => ['nullable', 'string'],
            'IsActive'  => ['numeric'],
        ]);

        $validation['LastUpdatedBy'] = auth()->user()->username;
        $validation['LastUpdatedDateTime'] = Carbon::now()->toDateTimeString();
        $itemGroup->update($validation);

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
        $itemGroup = DB::connection('mysql2')
            ->table('m_item_group')
            ->where('ItemGroupCode', $id)
            ->first();

        if (!$itemGroup) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        DB::connection('mysql2')
            ->table('m_item_group')
            ->where('ItemGroupCode', $id)
            ->update([
                'IsDeleted' => 1,
                'LastUpdatedBy' => auth()->user()->username,
                'LastUpdatedDateTime' => Carbon::now()->toDateTimeString(),
            ]);

        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
