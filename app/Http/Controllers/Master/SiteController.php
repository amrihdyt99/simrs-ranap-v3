<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->ajax_index($request);
        }
        return view('master.pages.site.index');
    }

    public function ajax_index($request)
    {
        $site = DB::connection('mysql2')->table("m_site");
        return DataTables()
            ->queryBuilder($site)
            ->editColumn('aksi_data', function ($query) use ($request) {
                return
                ( '<a href="'
                . route('master.site.edit', [$query->SiteCode])
                . '" class="btn btn-sm"><i class="fas fa-edit text-info"></i></a>' )
                .
                '<form action="'
                . route('master.site.destroy', [$query->SiteCode])
                . '" method="POST">'
                . csrf_field()
                . method_field('DELETE')
                . '<button class="btn btn-sm" type="submit" onclick="return confirm(\'Apakah yakin ingin menghapus?\')"><i class="fas fa-trash text-danger"></i></button></form>';
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function create(){
        $site=DB::connection('mysql2')->table('m_site')
        ->get();
        return view('master.pages.site.create', compact('site'));
    }

    public function store(Request $request){

        DB::connection('mysql2')->table('m_site')
        ->insert([
			'SiteCode' => $request->SiteCode,
			'SiteName' => $request->SiteName,
			'ShortName' => $request->ShortName,
			'Initial' => $request->Initial,
			'TaxRegistrantNo' => $request->TaxRegistrantNo,
		]);

        return redirect()->route('master.site.index')->with("success", "Data User Berhasil Ditambah.");
    }

    public function edit(Request $request, $id){
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
        DB::connection('mysql2')
        ->table("m_site")
        ->where('SiteCode', $id)
        ->delete();
        return redirect()->route('master.site.index')->with("success", "Data User Berhasil Dihapus.");
    }
}
