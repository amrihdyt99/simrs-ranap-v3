<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->ajax_index($request);
        }
        return view('master.pages.site.index');
    }

    public function ajax_index($request)
    {
        $site = DB::connection('mysql2')
            ->table('m_site')
            ->where('IsDeleted', 0);
        return DataTables()
            ->queryBuilder($site)
            ->editColumn('aksi_data', function ($query) use ($request) {
                $editUrl = route('master.site.edit', [$query->SiteCode]);

                $editButton = '<a href="' . $editUrl . '" class="protecc btn btn-sm btn-info mr-2 mb-2">
                            Edit
                        </a>';

                $deleteButton = '<button type="button" class="protecc btn btn-sm btn-danger mr-2 mb-2" 
                                onclick="confirmDelete(this)" 
                                data-id="' . $query->SiteCode . '">
                                Hapus
                            </button>';

                return $editButton . $deleteButton;
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function create()
    {
        $site = DB::connection('mysql2')->table('m_site')
            ->get();
        return view('master.pages.site.create', compact('site'));
    }

    public function store(Request $request)
    {

        DB::connection('mysql2')->table('m_site')
            ->insert([
                'SiteCode' => $request->SiteCode,
                'SiteName' => $request->SiteName,
                'ShortName' => $request->ShortName,
                'Initial' => $request->Initial,
                'TaxRegistrantNo' => $request->TaxRegistrantNo,
                'IsDeleted' => 0,
            ]);

        return redirect()->route('master.site.index')->with("success", "Data User Berhasil Ditambah.");
    }

    public function edit(Request $request, $id)
    {
        $site = DB::connection('mysql2')
            ->table("m_site")
            ->where('SiteCode', $id)
            ->first();
        return view('master.pages.site.update', compact('site'));
    }

    public function update(Request $request, $id)
    {
        DB::connection('mysql2')
            ->table('m_site')
            ->where('SiteCode', $id)
            ->update([
                'SiteCode' => $request->SiteCode,
                'SiteName' => $request->SiteName,
                'ShortName' => $request->ShortName,
                'Initial' => $request->Initial,
                'TaxRegistrantNo' => $request->TaxRegistrantNo,
            ]);
        return redirect()->route('master.site.index')->with("success", "Data User Berhasil Diubah.");
    }

    public function destroy($id)
    {
        $site = DB::connection('mysql2')
            ->table('m_site')
            ->where('SiteCode', $id)
            ->first();

        if (!$site) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        DB::connection('mysql2')
            ->table('m_site')
            ->where('SiteCode', $id)
            ->update([
                'IsDeleted' => 1,
                'LastUpdatedBy' => auth()->user()->id,
                'LastUpdatedDateTime' => Carbon::now(),
            ]);

        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
