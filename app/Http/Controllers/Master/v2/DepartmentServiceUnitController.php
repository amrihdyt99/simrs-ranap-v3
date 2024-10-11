<?php

namespace App\Http\Controllers\Master\v2;

use App\Http\Controllers\Controller;
use App\Models\Master\DepartmentServiceUnit;
use App\Models\ServiceUnit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentServiceUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dsu = DB::connection('mysql2')->table("m_unit_departemen")
                ->select('m_unit_departemen.*', 'm_departemen.DepartmentName', 'm_unit.ServiceUnitName')
                ->leftJoin('m_site_departemen', function ($join) {
                    $join->on('m_site_departemen.SiteDepartmentID', '=', 'm_unit_departemen.SiteDepartmentID')
                        ->leftJoin('m_departemen', 'm_departemen.DepartmentCode', '=', 'm_site_departemen.DepartmentCode');
                })
                ->leftJoin('m_unit', 'm_unit.ServiceUnitCode', '=', 'm_unit_departemen.ServiceUnitCode')
                ->get();
            return DataTables()
                ->of($dsu)
                ->addColumn('action', function ($row) {
                    $editUrl = route('master.departement-service-unit.edit', [$row->ServiceUnitID]);

                    $actionBtn = '<div class="btn-group" role="group">';
                    $actionBtn .= "<button type='button' class='btn btn-warning'><a href='$editUrl'><i class='fas fa-edit'></i> Edit</a></button>";
                    $actionBtn .= '</div>';

                    return $actionBtn;
                })
                ->escapeColumns([])
                ->toJson();
        }
        return view('master.pages.departemen_service_unit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siteDepartment = DB::connection('mysql2')->table("m_site_departemen")
            ->select('m_site_departemen.*', 'm_departemen.DepartmentName')
            ->leftJoin('m_departemen', 'm_departemen.DepartmentCode', '=', 'm_site_departemen.DepartmentCode')
            ->where([
                ['m_site_departemen.IsDeleted', 0],
                ['m_site_departemen.IsActive', 1],
            ])->get();

        $serviceUnit = ServiceUnit::where('IsActive', 1)->get();

        return view('master.pages.departemen_service_unit.create', compact('siteDepartment', 'serviceUnit'));
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
            'SiteDepartmentID' => ['required', 'string'],
            'ServiceUnitCode' => ['required', 'string'],
            'ContactPerson1' => ['string'],
            'ContactPerson2' => ['string'],
            'IsActive'  => ['numeric'],
        ]);

        $input['LastUpdatedBy'] = auth()->user()->username;
        $input['LastUpdatedDateTime'] = Carbon::now()->format('Y-m-d H:i:s');

        DepartmentServiceUnit::create($input);

        return redirect()->route('master.departement-service-unit.index');
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

        $dsu = DepartmentServiceUnit::find($id);

        $siteDepartment = DB::connection('mysql2')->table("m_site_departemen")
            ->select('m_site_departemen.*', 'm_departemen.DepartmentName')
            ->leftJoin('m_departemen', 'm_departemen.DepartmentCode', '=', 'm_site_departemen.DepartmentCode')
            ->where([
                ['m_site_departemen.IsDeleted', 0],
                ['m_site_departemen.IsActive', 1],
            ])->get();

        $serviceUnit = ServiceUnit::where('IsActive', 1)->get();

        return view('master.pages.departemen_service_unit.update', compact('siteDepartment', 'serviceUnit', 'dsu'));
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
        $dsu = DepartmentServiceUnit::find($id);
        $input = $request->validate([
            'SiteDepartmentID' => ['required', 'string'],
            'ServiceUnitCode' => ['required', 'string'],
            'ContactPerson1' => ['string'],
            'ContactPerson2' => ['string'],
            'IsActive'  => ['numeric'],
        ]);

        $input['LastUpdatedBy'] = auth()->user()->username;
        $input['LastUpdatedDateTime'] = Carbon::now()->format('Y-m-d H:i:s');

        $dsu->update($input);

        return redirect()->route('master.departement-service-unit.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
