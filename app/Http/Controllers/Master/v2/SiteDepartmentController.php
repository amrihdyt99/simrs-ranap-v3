<?php

namespace App\Http\Controllers\Master\v2;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Master\Site;
use App\Models\Master\SiteDepartment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteDepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $serviceunit = DB::connection('mysql2')->table("m_site_departemen")
                ->select('m_site_departemen.*', 'm_site.SiteName', 'm_departemen.DepartmentName')
                ->leftJoin('m_site', 'm_site.SiteCode', '=', 'm_site_departemen.SiteCode')
                ->leftJoin('m_departemen', 'm_departemen.DepartmentCode', '=', 'm_site_departemen.DepartmentCode')
                ->where('m_site_departemen.IsDeleted', 0)->get();
            return DataTables()
                ->of($serviceunit)
                ->addColumn('action', function ($row) {
                    $editUrl = route('master.site-departement.edit', [$row->SiteDepartmentID]);

                    $actionBtn = '<div class="btn-group" role="group">';
                    $actionBtn .= "<button type='button' class='btn btn-warning'><a href='$editUrl'><i class='fas fa-edit'></i> Edit</a></button>";
                    $actionBtn .= "<button type='button' class='btn btn-danger' onclick='confirmDelete(this)' data-id='$row->SiteDepartmentID'><i class='fas fa-trash'></i> Hapus</button>";
                    $actionBtn .= '</div>';

                    return $actionBtn;
                })
                ->escapeColumns([])
                ->toJson();
        }
        return view('master.pages.site_departemen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $site = Site::where('IsActive', 1)->get();
        $department = Department::where('IsActive', 1)->get();
        return view('master.pages.site_departemen.create', compact('site', 'department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->validate([
            'SiteCode' => ['required', 'string'],
            'DepartmentCode' => ['required', 'string'],
            'OfficerName' => ['string', 'nullable'],
            'IsActive'  => ['numeric'],
        ]);

        $input['LastUpdatedBy'] = auth()->user()->username;
        $input['created_at'] = Carbon::now();

        SiteDepartment::create($input);

        return redirect()->route('master.site-departement.index');
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
        $siteDepartment = SiteDepartment::find($id);
        $site = Site::where('IsActive', 1)->get();
        $department = Department::where('IsActive', 1)->get();
        return view('master.pages.site_departemen.update', compact('site', 'department', 'siteDepartment'));
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
        $siteDepartment = SiteDepartment::find($id);
        $input = $request->validate([
            'SiteCode' => ['required', 'string'],
            'DepartmentCode' => ['required', 'string'],
            'OfficerName' => ['string', 'nullable'],
            'IsActive'  => ['numeric'],
        ]);
        $input['LastUpdatedBy'] = auth()->user()->username;
        $input['updated_at'] = Carbon::now();

        $siteDepartment->update($input);
        return redirect()->route('master.site-departement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $classCategory = DB::connection('mysql2')
            ->table('m_site_departemen')
            ->where('SiteDepartmentID', $id)
            ->first();

        if (!$classCategory) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        DB::connection('mysql2')
            ->table('m_site_departemen')
            ->where('SiteDepartmentID', $id)
            ->update([
                'IsDeleted' => 1,
                'LastUpdatedBy' => auth()->user()->username,
                'updated_at' => Carbon::now(),
            ]);

        return response()->json(['success' => 'Data berhasil dihapus']);
    }
}
