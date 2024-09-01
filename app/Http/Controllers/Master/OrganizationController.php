<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrganizationController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            return $this->ajax_index($request);
        }

        return view('master.pages.organization.index');
    }

    public function ajax_index(Request $request)
    {
        $paramedic = Organization::query();

        if ($request->has('IsDeleted') && $request->IsDeleted !== '') {
            if ($request->IsDeleted == '0') {
                $paramedic->where('IsDeleted', 0);
            } else if ($request->IsDeleted == '1') {
                $paramedic->where('IsDeleted', 1);
            }
        }

        if ($request->has('IsActive') && $request->IsActive !== '') {
            if ($request->IsActive == '1') {
                $paramedic->where('IsActive', 1);
            } else if ($request->IsActive == '0') {
                $paramedic->where('IsActive', 0);
            }
        }

        return DataTables()
            ->eloquent($paramedic)
            ->editColumn('aksi_data', function ($query) {
                $editButton = '<button type="button" class="btn btn-sm btn-info mr-2 mb-2 edit-btn" data-id="' . $query->OrganizationCode . '">Edit</button>';

                $deleteButton = '<button type="button" class="btn btn-sm btn-danger mr-2 mb-2" 
                            onclick="confirmDelete(this)" 
                            data-id="' . $query->OrganizationCode . '">Hapus</button>';

                $activateButton = $query->IsActive == 0
                    ? '<button type="button" class="btn btn-sm btn-success mr-2 mb-2" 
                            onclick="changeStatus(this)"
                            data-id="' . $query->OrganizationCode . '">Aktifkan</button>'
                    : '';

                $deactivateButton = $query->IsActive == 1
                    ? '<button type="button" class="btn btn-sm btn-warning mr-2 mb-2" 
                            onclick="changeStatus(this)"
                            data-id="' . $query->OrganizationCode . '">Nonaktifkan</button>'
                    : '';

                return $editButton . $deleteButton . $deactivateButton . $activateButton;
            })
            ->escapeColumns([])
            ->toJson();
    }


    public function create()
    {
        return view('master.pages.organization.create');
    }

    public function store(Request $request)
    {
        try {
            Organization::create([
                'OrganizationCode' => $request->OrganizationCode,
                'OrganizationName' => $request->OrganizationName,
                'OrganizationLevel' => $request->OrganizationLevel,
                'ParentOrganization' => $request->ParentOrganization,
                'OrganizationPercentage' => $request->OrganizationPercentage,
                'IsActive' => 1,
                'IsDeleted' => 0,
                'LastUpdatedBy' => auth()->user()->id,
                'LastUpdatedDateTime' => Carbon::now(),
            ]);

            return response()->json([
                'success' => 'Data berhasil ditambah!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Data gagal ditambah! ' . $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $organization = Organization::findOrFail($id);

        try {
            $organization->update([
                'OrganizationCode' => $request->OrganizationCode,
                'OrganizationName' => $request->OrganizationName,
                'OrganizationLevel' => $request->OrganizationLevel,
                'ParentOrganization' => $request->ParentOrganization,
                'OrganizationPercentage' => $request->OrganizationPercentage,
                'LastUpdatedBy' => auth()->user()->id,
                'LastUpdatedDateTime' => Carbon::now(),
            ]);

            return response()->json([
                'success' => 'Data berhasil diubah!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Data gagal diubah! ' . $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        $organization = Organization::where('OrganizationCode', $id)->first();

        $organization->update([
            'IsDeleted' => 1,
            'IsActive' => 0,
            'LastUpdatedBy' => auth()->user()->id,
            'LastUpdatedDateTime' => Carbon::now()
        ]);

        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    public function changeStatusActive(Request $request, $id)
    {
        $organization = Organization::find($id);

        if (!$organization) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        if ($organization->IsDeleted == 1) {
            return response()->json(['error' => 'Data sudah dihapus tidak bisa di aktifkan'], 400);
        }

        $newStatus = $organization->IsActive == 1 ? 0 : 1;

        $organization->IsActive = $newStatus;
        $organization->LastUpdatedBy = auth()->user()->id;
        $organization->LastUpdatedDateTime = Carbon::now();
        $organization->save();

        $statusText = $newStatus == 1 ? 'Aktif' : 'Nonaktif';

        return response()->json(['success' => "Status telah diubah menjadi $statusText"]);
    }
}
