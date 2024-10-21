<?php

namespace App\Http\Controllers\Master\v2;

use App\Http\Controllers\Controller;
use App\Models\Master\ClassCategory;
use App\Models\Master\ItemTarif;
use App\Models\Master\Site;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemTarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $item = DB::connection('mysql2')->table("m_item_tarif")
                ->select('m_item_tarif.*', 'm_item.ItemName1', 'm_item.GCItemType', 'm_item_group.ItemGroupName1', 'm_class_category.ClassCategoryName')
                ->join('m_item', 'm_item_tarif.ItemID', '=', 'm_item.ItemID')
                ->leftJoin('m_item_group', 'm_item_group.ItemGroupCode', '=', 'm_item.ItemGroupCode')
                ->leftJoin('m_class_category', 'm_item_tarif.ClassCategoryCode', '=', 'm_class_category.ClassCategoryCode')
                ->where('m_item_tarif.IsDeleted', 0)->get();
            return DataTables()
                ->of($item)
                ->addColumn('action', function ($row) {
                    $editUrl = route('master.item-tarif.edit', [$row->tarif_id]);

                    $actionBtn = '<div class="btn-group" role="group">';
                    $actionBtn .= "<a href='$editUrl'><button type='button' class='btn btn-info text-white'><i class='fas fa-eye'></i> Detail</button></a>";
                    $actionBtn .= "<button type='button' class='btn btn-danger' onclick='confirmDelete(this)' data-id='$row->tarif_id'><i class='fas fa-trash'></i> Hapus</button>";
                    $actionBtn .= '</div>';

                    return $actionBtn;
                })
                ->escapeColumns([])
                ->toJson();
        }
        return view('master.pages.item_tarif.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classCategory = ClassCategory::where([['IsActive', 1], ['IsDeleted', 0]])->get();
        $site = Site::where([
            ['IsActive', 1],
            ['IsDeleted', 0],
        ])->get();

        $data = [
            'classCategory' => $classCategory,
            'site'          => $site,
        ];

        return view('master.pages.item_tarif.create', $data);
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
            'SiteCode' => ['required', 'string'],
            'ItemID' => ['required', 'string'],
            'ClassCategoryCode' => ['required', 'string'],
            'DocumentNo' => ['nullable', 'string'],
            'GCMember' => ['nullable', 'string'],
            'RevisionNo' => ['nullable', 'string'],
            'DocumentDate' => ['nullable'],
            'StartingDate' => ['nullable'],
            'EndingDate' => ['nullable'],
            'StandardPrice' => ['required'],
            'CustomerPrice' => ['nullable'],
            'PersonalPrice' => ['nullable'],
            'DiscountPrice' => ['nullable'],
            'Remarks' => ['nullable', 'string'],
            'IsActive'  => ['numeric'],
        ]);


        $validation['IsDeleted'] = '0';
        $validation['LastUpdatedBy'] = auth()->user()->username;
        $validation['LastUpdatedDateTime'] = Carbon::now()->toDateTimeString();

        DB::connection('mysql2')->beginTransaction();
        try {
            ItemTarif::create($validation);

            DB::connection('mysql2')->commit();


            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan !',
            ]);
        } catch (\Throwable $throw) {
            //throw $th;
            DB::connection('mysql2')->rollBack();
            //dd($th->getMessage());
            abort(500, $throw->getMessage());
        }
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
        $tarif = DB::connection('mysql2')->table('m_item_tarif')
            ->select('m_item_tarif.*', 'm_item.ItemName1', 'm_class_category.ClassCategoryName', 'm_site.SiteName')
            ->leftJoin('m_item', 'm_item.ItemID', '=', 'm_item_tarif.ItemID')
            ->leftJoin('m_site', 'm_site.SiteCode', '=', 'm_item_tarif.SiteCode')
            ->leftJoin('m_class_category', 'm_class_category.ClassCategoryCode', '=', 'm_item_tarif.ClassCategoryCode')
            ->where('m_item_tarif.tarif_id', $id)->first();


        $classCategory = ClassCategory::where([['IsActive', 1], ['IsDeleted', 0]])->get();
        $site = Site::where([
            ['IsActive', 1],
            ['IsDeleted', 0],
        ])->get();

        $data = [
            'classCategory' => $classCategory,
            'site'          => $site,
            'tarif'         => $tarif,
        ];

        return view('master.pages.item_tarif.update', $data);
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
        $tarif = ItemTarif::find($id);
        $validation = $request->validate([
            'SiteCode' => ['required', 'string'],
            'ItemID' => ['required', 'string'],
            'ClassCategoryCode' => ['required', 'string'],
            'DocumentNo' => ['nullable', 'string'],
            'GCMember' => ['nullable', 'string'],
            'RevisionNo' => ['nullable', 'string'],
            'DocumentDate' => ['nullable'],
            'StartingDate' => ['nullable'],
            'EndingDate' => ['nullable'],
            'StandardPrice' => ['required'],
            'CustomerPrice' => ['nullable'],
            'PersonalPrice' => ['nullable'],
            'DiscountPrice' => ['nullable'],
            'Remarks' => ['nullable', 'string'],
            'IsActive'  => ['numeric'],
        ]);


        $validation['LastUpdatedBy'] = auth()->user()->username;
        $validation['LastUpdatedDateTime'] = Carbon::now()->toDateTimeString();


        DB::connection('mysql2')->beginTransaction();
        try {
            $tarif->update($validation);

            DB::connection('mysql2')->commit();


            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan !',
            ]);
        } catch (\Throwable $throw) {
            //throw $th;
            DB::connection('mysql2')->rollBack();
            //dd($th->getMessage());
            abort(500, $throw->getMessage());
        }
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
            ->table('m_item_tarif')
            ->where('tarif_id', $id)
            ->first();

        if (!$item) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        DB::connection('mysql2')
            ->table('m_item_tarif')
            ->where('tarif_id', $id)
            ->update([
                'IsDeleted' => '1',
                'LastUpdatedBy' => auth()->user()->username,
                'LastUpdatedDateTime' => Carbon::now()->toDateTimeString(),
            ]);

        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
