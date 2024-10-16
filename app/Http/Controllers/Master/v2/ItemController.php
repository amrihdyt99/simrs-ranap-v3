<?php

namespace App\Http\Controllers\Master\v2;

use App\Http\Controllers\Controller;
use App\Models\Master\Item;
use App\Models\Master\ItemGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $item = DB::connection('mysql2')->table("m_item")
                ->select('m_item.*', 'm_item_group.ItemGroupName1')
                ->leftJoin('m_item_group', 'm_item_group.ItemGroupCode', '=', 'm_item.ItemGroupCode')
                ->where('m_item.IsDeleted', 0)->get();
            return DataTables()
                ->of($item)
                ->addColumn('action', function ($row) {
                    $editUrl = route('master.item.edit', [$row->ItemID]);

                    $actionBtn = '<div class="btn-group" role="group">';
                    $actionBtn .= "<button type='button' class='btn btn-warning'><a href='$editUrl'><i class='fas fa-edit'></i> Edit</a></button>";
                    $actionBtn .= "<button type='button' class='btn btn-danger' onclick='confirmDelete(this)' data-id='$row->ItemID'><i class='fas fa-trash'></i> Hapus</button>";
                    $actionBtn .= '</div>';

                    return $actionBtn;
                })
                ->escapeColumns([])
                ->toJson();
        }
        return view('master.pages.item.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemGroup = ItemGroup::where([
            ['IsActive', 1],
            ['IsDeleted', 0],
        ])->get();

        return view('master.pages.item.create', compact('itemGroup'));
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
            'ItemCode' => ['required', 'string'],
            'GCItemType' => ['required', 'string'],
            'ItemGroupCode' => ['required', 'string'],
            'ItemName1' => ['required', 'string'],
            'ItemName2' => ['nullable', 'string'],
            'IsActive'  => ['numeric'],
        ]);

        $cek = Item::find($request->ItemGroupCode);
        if ($cek) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Kode Item sudah digunakan !',
            ]);
        }

        $validation['IsDeleted'] = '0';
        $validation['LastUpdatedBy'] = auth()->user()->username;
        $validation['LastUpdatedDateTime'] = Carbon::now()->toDateTimeString();

        Item::create($validation);
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

        $item = Item::find($id);

        $itemGroup = ItemGroup::where([
            ['IsActive', 1],
            ['IsDeleted', 0],
        ])->get();

        return view('master.pages.item.update', compact('item', 'itemGroup'));
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
        $item = Item::find($id);
        $validation = $request->validate([
            'ItemCode' => ['required', 'string'],
            'GCItemType' => ['required', 'string'],
            'ItemGroupCode' => ['required', 'string'],
            'ItemName1' => ['required', 'string'],
            'ItemName2' => ['nullable', 'string'],
            'IsActive'  => ['numeric'],
        ]);

        $validation['LastUpdatedBy'] = auth()->user()->username;
        $validation['LastUpdatedDateTime'] = Carbon::now()->toDateTimeString();
        $item->update($validation);

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
        $item = DB::connection('mysql2')
            ->table('m_item')
            ->where('ItemID', $id)
            ->first();

        if (!$item) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        DB::connection('mysql2')
            ->table('m_item')
            ->where('ItemID', $id)
            ->update([
                'IsDeleted' => '1',
                'LastUpdatedBy' => auth()->user()->username,
                'LastUpdatedDateTime' => Carbon::now()->toDateTimeString(),
            ]);

        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    public function select2Item(Request $request)
    {
        $page = $request->page;
        $resultCount = 10;
        $offset = ($page - 1) * $resultCount;
        $data = DB::connection('mysql2')->table("m_item")
            ->select('m_item.*', 'm_item_group.ItemGroupName1')
            ->leftJoin('m_item_group', 'm_item_group.ItemGroupCode', '=', 'm_item.ItemGroupCode')
            ->where([['m_item.IsActive', 1], ['m_item.IsDeleted', 0]])
            ->where(DB::raw("CONCAT(m_item.ItemName1,' [',m_item_group.ItemGroupName1, ']')"), 'LIKE', '%' . $request->q . '%')
            ->skip($offset)
            ->take($resultCount)
            ->get();

        $count = Item::where('ItemName1', 'LIKE', '%' . $request->q . '%')
            ->get()
            ->count();

        $endCount = $offset + $resultCount;
        $morePages = $count > $endCount;

        $results = array(
            "results" => $data,
            "pagination" => array(
                "more" => $morePages
            )
        );

        return response()->json($results);
    }
}
