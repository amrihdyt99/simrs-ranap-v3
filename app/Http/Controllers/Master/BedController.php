<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Services\masterBedServices;
use App\Models\Bed;
use App\Models\Master\DepartmentServiceUnit;
use App\Models\RoomClass;
use App\Models\ServiceRoom;
use App\Models\ServiceUnit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BedController extends Controller
{
    protected $bedServices;
    public function __construct(MasterBedServices $bedServices)
    {
        $this->bedServices = $bedServices;
    }
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
            'd_service_unit.unit',
            'room',
            'class',
            'registration',
            'registration.pasien',
        ]);

        if ($request->has('is_temporary') && $request->is_temporary !== '') {
            if ($request->is_temporary == '1') {
                $bedQuery->where('is_temporary', 1);
            } else if ($request->is_temporary == '0') {
                $bedQuery->where('is_temporary', 0);
            }
        }

        if ($request->has('is_deleted') && $request->is_deleted !== '') {
            if ($request->is_deleted == '1') {
                $bedQuery->where('m_bed.is_deleted', "1");
            } else if ($request->is_deleted == '0') {
                $bedQuery->where('m_bed.is_deleted', "0");
            }
        }

        if ($request->has('is_active') && $request->is_active !== '') {
            if ($request->is_active == '1') {
                $bedQuery->where('is_active', '1');
            } else if ($request->is_active == '0') {
                $bedQuery->where('is_active', '0');
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
            ->escapeColumns([])
            ->toJson();
    }

    public function create()
    {
        $data['service_unit'] = DB::connection('mysql2')->table('m_unit_departemen')
            ->leftJoin('m_unit', 'm_unit.ServiceUnitCode', '=', 'm_unit_departemen.ServiceUnitCode')
            ->where('m_unit_departemen.IsActive', 1)->get();
        $data['room'] = DB::connection('mysql2')->table('m_ruangan')->where([
            ['IsActive', 1],
            ['IsDeleted', 0],
        ])->get();
        $data['class'] = RoomClass::where([
            ['IsActive', 1],
            ['IsDeleted', 0],
        ])->get();
        $data['site'] = DB::connection('mysql2')->table("m_site")->where([['IsActive', 1], ['IsDeleted', 0]])->get();
        return view('master.pages.bed.create', $data);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'service_unit_id' => ['required'],
            'room_id' => ['required'],
            'bed_code' => ['required'],
            'class_code' => ['required'],
            'site_code' => ['required'],
            'is_temporary' => ['required'],
        ]);

        $input['is_deleted'] = '0';
        $input['is_active'] = '1';
        $input['bed_status'] = 'ready';
        $input['gc_type_of_bed'] = $request->gc_type_of_bed;
        $input['last_updated_by'] = auth()->user()->id;
        $input['last_updated_datetime'] = Carbon::now();
        $input['created_date_time'] = Carbon::now();

        Bed::create($input);

        return redirect()->route('master.bed.index')->with("success", "Data User Berhasil Ditambah.");
    }

    public function edit(Bed $bed)
    {
        $data['service_unit'] = DB::connection('mysql2')->table('m_unit_departemen')
            ->leftJoin('m_unit', 'm_unit.ServiceUnitCode', '=', 'm_unit_departemen.ServiceUnitCode')
            ->where('m_unit_departemen.IsActive', 1)->get();
        $data['room'] = DB::connection('mysql2')->table('m_ruangan')->where([
            ['IsActive', 1],
            ['IsDeleted', 0],
        ])->get();
        $data['class'] = RoomClass::where([
            ['IsActive', 1],
            ['IsDeleted', 0],
        ])->get();
        $data['site'] = DB::connection('mysql2')->table("m_site")->where([['IsActive', 1], ['IsDeleted', 0]])->get();
        $data['bed'] = $bed;

        return view('master.pages.bed.update', $data);
    }

    public function update(Request $request, $id)
    {
        $bed = Bed::where('bed_id', $id)->first();

        $input = $request->validate([
            'service_unit_id' => ['required'],
            'room_id' => ['required'],
            'bed_code' => ['required'],
            'class_code' => ['required'],
            'site_code' => ['required'],
            'is_temporary' => ['required'],
        ]);

        $input['gc_type_of_bed'] = $request->gc_type_of_bed;
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

        if ($bed->is_deleted == 1) {
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

    public function getBedByClassCode($class_code)
    {

        return $this->bedServices->getBedByClassCode($class_code);
    }
}
