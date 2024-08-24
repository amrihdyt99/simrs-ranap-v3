<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\RoomClass;
use App\Models\ServiceRoom;
use App\Models\ServiceUnit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BedController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->ajax_index($request);
        }
        return view('master.pages.bed.index');
    }

    public function ajax_index(Request $request)
    {
        $bedQuery = Bed::with([
            'unit',
            'room',
            'class_category',
            'registration',
            'registration.pasien',
        ])->orderBy('last_updated_datetime', 'desc');

        if ($request->has('is_temporary') && $request->is_temporary !== '') {
            if ($request->is_temporary == '1') {
                $bedQuery->whereNotNull('is_temporary');
            } else if ($request->is_temporary == '0') {
                $bedQuery->whereNull('is_temporary');
            }
        }

        if ($request->has('is_deleted') && $request->is_deleted !== '') {
            if ($request->is_deleted == '1') {
                $bedQuery->whereNotNull('is_deleted');
            } else if ($request->is_deleted == '0') {
                $bedQuery->whereNull('is_deleted');
            }
        }


        if ($request->has('is_active') && $request->is_active !== '') {
            if ($request->is_active == '1') {
                $bedQuery->where('is_active', 1);
            } else if ($request->is_active == '0') {
                $bedQuery->where('is_active', 0);
            }
        }

        return DataTables()
            ->eloquent($bedQuery)
            ->editColumn('aksi_data', function ($query) {
                $editUrl = route('master.bed.edit', [$query->bed_id]);

                $editButton = '<a href="' . $editUrl . '" class="protecc btn btn-sm btn-info mr-2 mb-2">
                            Edit
                        </a>';

                $deleteButton = '<button type="button" class="protecc btn btn-sm btn-danger mr-2 mb-2" 
                                onclick="confirmDelete(this)" 
                                data-id="' . $query->bed_id . '">
                                Hapus
                            </button>';

                $activateButton = $query->is_active == 0
                    ? '<button type="button" class="protecc btn btn-sm btn-success mr-2 mb-2" 
                                    onclick="changeStatus(this)"
                                    data-id="' . $query->bed_id . '">Aktifkan</button>'
                    : '';

                $deactivateButton = $query->is_active == 1
                    ? '<button type="button" class="protecc btn btn-sm btn-warning mr-2 mb-2" 
                                    onclick="changeStatus(this)"
                                    data-id="' . $query->bed_id . '">Nonaktifkan</button>'
                    : '';

                return $editButton . $deleteButton . $deactivateButton . $activateButton;
            })
            ->editColumn('reg_no', function ($query) {
                return $query->registration ? $query->registration->reg_no : '';
            })
            ->editColumn('medrec', function ($query) {
                return $query->registration ? $query->registration->medrec : '';
            })
            ->editColumn('RoomName', function ($query) {
                return $query->room ? $query->room->RoomName : '';
            })
            ->editColumn('PatientName', function ($query) {
                return $query->registration ? ($query->registration->pasien ? $query->registration->pasien->PatientName : '') : '';
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function create()
    {
        $data['service_unit'] = DB::connection('mysql')->table('rs_m_service_unit')->get();
        $data['room'] = DB::connection('mysql')->table('rs_m_service_room')->get();
        $data['class'] = RoomClass::all();
        $data['site'] = DB::connection('mysql2')->table("m_site")->get();
        return view('master.pages.bed.create', $data);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'bed_id' => ['required'],
            'service_unit_id' => ['required'],
            'room_id' => ['required'],
            'class_code' => ['required'],
            'site_code' => ['required'],
        ]);

        $input['is_active'] = '1';
        $input['bed_status'] = 'ready';
        $input['bed_code'] = $request->bed_code;
        $input['last_updated_by'] = auth()->user()->id;
        $input['last_updated_datetime'] = Carbon::now();
        $input['created_date_time'] = Carbon::now();

        Bed::create($input);

        return redirect()->route('master.bed.index')->with("success", "Data User Berhasil Ditambah.");
    }

    public function edit(Bed $bed)
    {
        $data['service_unit'] = ServiceUnit::all();
        $data['room'] = ServiceRoom::all();
        $data['class'] = RoomClass::all();
        $data['bed'] = $bed;
        $data['site'] = DB::connection('mysql2')->table("m_site")->get();

        return view('master.pages.bed.update', $data);
    }

    public function update(Request $request, $id)
    {
        $bed = Bed::where('bed_id', $id)->first();

        $input = $request->validate([
            'bed_id' => 'required',
            'service_unit_id' => 'required',
            'room_id' => 'required',
            'class_code' => 'required',
        ]);

        $input['bed_code'] = $request->bed_code;
        $input['last_updated_by'] = auth()->user()->id;
        $input['last_updated_datetime'] = Carbon::now();

        $bed->update($input);

        return redirect()->route('master.bed.index')->with("success", "Data Bed Berhasil Diubah.");
    }


    public function destroy($id)
    {
        $bed = Bed::where('bed_id', $id)->first();

        $patientsExist = bed::where('bed_id', $id)
            ->whereNotNull('registration_no')
            ->exists();

        if ($patientsExist) {
            return response()->json(['error' => 'Data tidak bisa di hapus karena sedang ada pasien'], 400);
        }

        $bed->update([
            'is_deleted' => 1,
            'is_active' => 0,
            'last_updated_by' => auth()->user()->id,
            'last_updated_datetime' => Carbon::now()
        ]);

        return response()->json(['success' => 'Data berhasil dihapus']);
    }

    public function changeStatusActive(Request $request, $id)
    {
        $bed = Bed::where('bed_id', $id)->first();

        $patientsExist = bed::where('bed_id', $id)
            ->whereNotNull('registration_no')
            ->exists();

        if ($patientsExist) {
            return response()->json(['error' => 'Data tidak bisa di nonaktifkan karena sedang ada pasien'], 400);
        }

        if (!$bed) {
            return response()->json(['error' => 'Bed tidak ditemukan'], 404);
        }

        if ($bed->IsDeleted == 1) {
            return response()->json(['error' => 'Data sudah di hapus tidak bisa di aktifkan'], 404);
        }

        $newStatus = $bed->is_active == 1 ? 0 : 1;

        $bed->is_active = $newStatus;
        $bed->last_updated_by = auth()->user()->id;
        $bed->last_updated_datetime = Carbon::now();
        $bed->save();

        $statusText = $newStatus == 1 ? 'Aktif' : 'Nonaktif';

        return response()->json(['success' => "Status telah diubah menjadi $statusText"]);
    }
}
