<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paramedic;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PractitionerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->ajax_index($request);
        }
        return view('master.pages.practitioner.index');
    }

    public function ajax_index(Request $request)
    {
        $paramedic = Paramedic::query();

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
                $editUrl = route('master.practitioner.edit', [$query->ParamedicID]);

                $editButton = '<a href="' . $editUrl . '" class="protecc btn btn-sm btn-info mr-2 mb-2">Edit</a>';

                $deleteButton = '<button type="button" class="protecc btn btn-sm btn-danger mr-2 mb-2" 
                                onclick="confirmDelete(this)" 
                                data-id="' . $query->ParamedicID . '">Hapus</button>';

                    $activateButton = $query->IsActive == 0
                        ? '<button type="button" class="protecc btn btn-sm btn-success mr-2 mb-2" 
                                onclick="changeStatus(this)"
                                data-id="' . $query->ParamedicID . '">Aktifkan</button>'
                        : '';

                    $deactivateButton = $query->IsActive == 1
                        ? '<button type="button" class="protecc btn btn-sm btn-warning mr-2 mb-2" 
                                onclick="changeStatus(this)"
                                data-id="' . $query->ParamedicID . '">Nonaktifkan</button>'
                        : '';

                return $editButton . $deleteButton . $deactivateButton . $activateButton;
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function create()
    {
        $sites = DB::connection('mysql2')->table("m_site")->get();
        return view('master.pages.practitioner.create', compact('sites'));
    }

    public function store(Request $request)
    {
        Paramedic::insert([
            'ParamedicCode' => $request->ParamedicCode,
            'SiteCode' => $request->SiteCode,
            'FirstName' => $request->FirstName,
            'MiddleName' => $request->MiddleName,
            'LastName' => $request->LastName,
            'ParamedicName' => $request->ParamedicName,
            'ParamedicInitial' => $request->ParamedicInitial,
            'DateOfBirth' => $request->DateOfBirth,
            'GCSex' => $request->GCSex,
            'GCParamedicType' => $request->GCParamedicType,
            'GCEmploymentStatus' => $request->GCEmploymentStatus,
            'GCReligion' => $request->GCReligion,
            'GCNationality' => $request->GCNationality,
            'Title' => $request->Title,
            'Suffix' => $request->Suffix,
            'SpecialtyCode' => $request->SpecialtyCode,
            'HiredDate' => $request->HiredDate,
            'TerminatedDate' => $request->TerminatedDate,
            'StartExperienceDate' => $request->StartExperienceDate,
            'IsTaxRegistrant' => $request->IsTaxRegistrant,
            'TaxRegistrantNo' => $request->TaxRegistrantNo,
            'LastUpdatedBy' => auth()->user()->id,
            'LastUpdatedDateTime' => Carbon::now(),
            'IsDeleted' => 0,
            'IsActive' => 1,
        ]);

        return redirect()->route('master.practitioner.index')->with('success', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {
        $paramedic = Paramedic::findOrFail($id);
        $sites = DB::connection('mysql2')->table("m_site")->get();
        return view('master.pages.practitioner.update', compact('paramedic', 'sites'));
    }

    public function update(Request $request, $id)
    {
        $paramedic = Paramedic::findOrFail($id);

        $paramedic->update([
            'ParamedicCode' => $request->ParamedicCode,
            'SiteCode' => $request->SiteCode,
            'FirstName' => $request->FirstName,
            'MiddleName' => $request->MiddleName,
            'LastName' => $request->LastName,
            'ParamedicName' => $request->ParamedicName,
            'ParamedicInitial' => $request->ParamedicInitial,
            'DateOfBirth' => $request->DateOfBirth,
            'GCSex' => $request->GCSex,
            'GCParamedicType' => $request->GCParamedicType,
            'GCEmploymentStatus' => $request->GCEmploymentStatus,
            'GCReligion' => $request->GCReligion,
            'GCNationality' => $request->GCNationality,
            'Title' => $request->Title,
            'Suffix' => $request->Suffix,
            'SpecialtyCode' => $request->SpecialtyCode,
            'HiredDate' => $request->HiredDate,
            'TerminatedDate' => $request->TerminatedDate,
            'StartExperienceDate' => $request->StartExperienceDate,
            'IsTaxRegistrant' => $request->IsTaxRegistrant,
            'TaxRegistrantNo' => $request->TaxRegistrantNo,
            'LastUpdatedBy' => auth()->user()->id,
            'LastUpdatedDateTime' => Carbon::now(),
        ]);

        return redirect()->route('master.practitioner.index')->with('success', 'Data berhasil di update!');
    }



    public function destroy($id)
    {
        $paramedic = Paramedic::where('ParamedicID', $id)->first();

        $paramedic->update([
            'IsDeleted' => 1,
            'IsActive' => 0,
            'LastUpdatedBy' => auth()->user()->id,
            'LastUpdatedDateTime' => Carbon::now()
        ]);

        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    public function changeStatusActive(Request $request, $id)
    {
        $paramedic = Paramedic::find($id);

        if (!$paramedic) {
            return response()->json(['error' => 'Practitioner not found'], 404);
        }

        if ($paramedic->IsDeleted == 1) {
            return response()->json(['error' => 'Data sudah di hapus tidak bisa di aktifkan'], 400);
        }

        $newStatus = $paramedic->IsActive == 1 ? 0 : 1;

        $paramedic->IsActive = $newStatus;
        $paramedic->LastUpdatedBy = auth()->user()->id;
        $paramedic->LastUpdatedDateTime = Carbon::now();
        $paramedic->save();

        $statusText = $newStatus == 1 ? 'Aktif' : 'Nonaktif';

        return response()->json(['success' => "Status telah diubah menjadi $statusText"]);
    }
}
