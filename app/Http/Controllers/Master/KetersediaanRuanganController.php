<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\RoomClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KetersediaanRuanganController extends Controller
{
    function index(Request $request)
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


        if ($request->ajax()) {
            return $this->ajax_index($request);
        }

        return view('master.pages.ketersediaan_ruangan.index', $data);
    }

    public function ajax_index($request)
    {
        $bedQuery = Bed::with([
            'd_service_unit.unit',
            'room',
            'class',
            'registration',
            'registration.pasien',
            'bed_history',
        ])
            ->where('is_deleted', 0);
        // ->whereHas('bed_history', function ($query) {
        //     $query->whereNotNull('m_bed_history.ToBedID');
        // })


        if ($request->has('service_unit_id') && $request->service_unit_id != '') {
            $bedQuery->where('service_unit_id', $request->service_unit_id);
        }

        if ($request->has('room_id') && $request->room_id != '') {
            $bedQuery->where('room_id', $request->room_id);
        }

        if ($request->has('class_code') && $request->class_code != '') {
            $bedQuery->where('class_code', $request->class_code);
        }

        $bedQuery->get();
        // dd($bedQuery);
        return DataTables()
            ->of($bedQuery)
            ->editColumn('aksi_data', function ($query) use ($request) {
                $editUrl = route('master.ketersediaanruangan.edit', [$query->bed_id]);

                $editButton = '<a href="' . $editUrl . '" class="protecc btn btn-sm btn-info mr-2 mb-2">
                            Edit
                        </a>';

                $deleteButton = '<button type="button" class="protecc btn btn-sm btn-danger mr-2 mb-2" 
                                onclick="confirmDelete(this)" 
                                data-id="' . $query->id . '">
                                Hapus
                            </button>';

                return $editButton . $deleteButton;
            })
            ->escapeColumns([])
            ->toJson();
    }

    function create()
    {
        $ruangan = DB::connection('mysql2')
            ->table('m_ruangan_baru')
            ->get();
        $serviceunit = DB::connection('mysql')
            ->table('rs_m_service_room')
            ->get();
        return view('master.pages.ketersediaan_ruangan.create', compact('ruangan', 'serviceunit'));
    }

    function store(Request $request)
    {
        $exPaviliun = explode('::', $request->id_paviliun);
        //var_dump($exPaviliun[0]);
        $idpaviliun = $exPaviliun[0];
        $namapaviliun = $exPaviliun[1];
        $exRuangan = explode('::', $request->id_ruangan);
        $roomcode = $exRuangan[0];
        $roomname = $exRuangan[1];
        $nomor_bed = $request->nomor_bed;
        $status_ketersediaan = $request->status_ketersediaan;
        $is_temporary = $request->is_temporary;

        $params = array();
        $params['id_paviliun'] = $idpaviliun;
        $params['nama_pavilun'] = $namapaviliun;
        $params['room_code'] = $roomcode;
        $params['nama_ruangan'] = $roomname;
        $params['nomor_bed'] = $nomor_bed;
        $nama_kelas = "";
        if ($request->id_kelas == "1") {
            $nama_kelas = "Kelas I";
        } else if ($request->id_kelas == "2") {
            $nama_kelas = "Kelas II";
        } else if ($request->id_kelas == "3") {
            $nama_kelas = "Kelas III";
        } else if ($request->id_kelas == "4") {
            $nama_kelas = "VIP";
        } else if ($request->id_kelas == "5") {
            $nama_kelas = "VVIP";
        }
        $params['nama_kelas'] = $nama_kelas;
        $params['status_ketersediaan'] = $status_ketersediaan;
        $params['is_temporary'] = $is_temporary;
        $params['harga_perhari'] = $request->harga_perhari;
        $simpan = DB::connection('mysql2')->table('ketersediaan_ruangan')
            ->insert($params);

        return redirect()->route('master.ketersediaanruangan.index')->with("success", "Data User Berhasil Disimpan.");
    }

    public function edit(Request $request, $id)
    {
        $bed = Bed::with([
            'd_service_unit.unit',
            'room',
            'class',
            'registration',
            'registration.pasien',
            'bed_history',
        ])->where('bed_id', $id)->first();

        $pasien = null;
        if (isset($bed->bed_history)) {
            $pasien = DB::connection('mysql2')->table('m_registrasi')
                ->select('m_pasien.*')
                ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
                ->leftjoin('m_bed_history', 'm_bed_history.RegNo', '=', 'm_registrasi.reg_no')
                ->where('m_registrasi.reg_no', $bed->bed_history->RegNo)
                ->orderBy('m_bed_history.ReceiveTransferDate', 'desc')
                ->orderBy('m_bed_history.ReceiveTransferTime', 'desc')
                ->first();
        }

        return view('master.pages.ketersediaan_ruangan.v2.update', compact('bed', 'pasien'));
    }

    public function update(Request $request, $id)
    {
        $ruangan_tersedia = DB::connection('mysql2')
            ->table("m_bed")
            ->where('id', $id)
            ->first();

        if (
            !$ruangan_tersedia
        ) {
            return abort(404);
        }

        $rules = [
            'bed_status' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                "status"    => "error",
                "message"   => "validation error !"
            ]);
        }

        $exPaviliun = explode('::', $request->id_paviliun);
        //var_dump($exPaviliun[0]);
        $idpaviliun = $exPaviliun[0];
        $namapaviliun = $exPaviliun[1];
        $exRuangan = explode('::', $request->id_ruangan);
        $roomcode = $exRuangan[0];
        $roomname = $exRuangan[1];
        $nomor_bed = $request->nomor_bed;
        $status_ketersediaan = $request->status_ketersediaan;
        $is_temporary = $request->is_temporary;

        $params = array();
        $params['id_paviliun'] = $idpaviliun;
        $params['nama_pavilun'] = $namapaviliun;
        $params['room_code'] = $roomcode;
        $params['nama_ruangan'] = $roomname;
        $params['nomor_bed'] = $nomor_bed;
        $nama_kelas = "";
        if ($request->id_kelas == "1") {
            $nama_kelas = "Kelas I";
        } else if ($request->id_kelas == "2") {
            $nama_kelas = "Kelas II";
        } else if ($request->id_kelas == "3") {
            $nama_kelas = "Kelas III";
        } else if ($request->id_kelas == "4") {
            $nama_kelas = "VIP";
        } else if ($request->id_kelas == "5") {
            $nama_kelas = "VVIP";
        }
        $params['nama_kelas'] = $nama_kelas;
        $params['status_ketersediaan'] = $status_ketersediaan;
        $params['is_temporary'] = $is_temporary;
        $params['harga_perhari'] = $request->harga_perhari;
        $simpan = DB::connection('mysql2')->table('ketersediaan_ruangan')
            ->where('id', $id)
            ->update($params);

        return redirect()->route('master.ketersediaanruangan.index')->with("success", "Data User Berhasil Disimpan.");
    }

    public function update_old(Request $request, $id)
    {
        $ruangan_tersedia = DB::connection('mysql2')
            ->table("ketersediaan_ruangan")
            ->where('id', $id)
            ->first();

        if (
            !$ruangan_tersedia
        ) {
            return abort(404);
        }

        $rules = [
            'id_paviliun' => 'required',
            'id_ruangan' => 'required',
            'nomor_bed' => 'required',
            'status_ketersediaan' => 'required',
            'is_temporary' => 'required',
            'id_kelas' => 'required',
            'harga_perhari' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('master.ketersediaanruangan.edit', [$ruangan_tersedia->id]);
        }

        $exPaviliun = explode('::', $request->id_paviliun);
        //var_dump($exPaviliun[0]);
        $idpaviliun = $exPaviliun[0];
        $namapaviliun = $exPaviliun[1];
        $exRuangan = explode('::', $request->id_ruangan);
        $roomcode = $exRuangan[0];
        $roomname = $exRuangan[1];
        $nomor_bed = $request->nomor_bed;
        $status_ketersediaan = $request->status_ketersediaan;
        $is_temporary = $request->is_temporary;

        $params = array();
        $params['id_paviliun'] = $idpaviliun;
        $params['nama_pavilun'] = $namapaviliun;
        $params['room_code'] = $roomcode;
        $params['nama_ruangan'] = $roomname;
        $params['nomor_bed'] = $nomor_bed;
        $nama_kelas = "";
        if ($request->id_kelas == "1") {
            $nama_kelas = "Kelas I";
        } else if ($request->id_kelas == "2") {
            $nama_kelas = "Kelas II";
        } else if ($request->id_kelas == "3") {
            $nama_kelas = "Kelas III";
        } else if ($request->id_kelas == "4") {
            $nama_kelas = "VIP";
        } else if ($request->id_kelas == "5") {
            $nama_kelas = "VVIP";
        }
        $params['nama_kelas'] = $nama_kelas;
        $params['status_ketersediaan'] = $status_ketersediaan;
        $params['is_temporary'] = $is_temporary;
        $params['harga_perhari'] = $request->harga_perhari;
        $simpan = DB::connection('mysql2')->table('ketersediaan_ruangan')
            ->where('id', $id)
            ->update($params);

        return redirect()->route('master.ketersediaanruangan.index')->with("success", "Data User Berhasil Disimpan.");
    }

    public function destroy($id)
    {
        $deleted = DB::connection('mysql2')
            ->table('ketersediaan_ruangan')
            ->where('id', $id)
            ->delete();

        if ($deleted) {
            return response()->json([
                'success' => 'Data berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'success' => 'Data tidak ditemukan atau gagal dihapus.',
            ]);
        }
    }


    public function status_ketersediaan($id)
    {
        $status_ketersediaan = [
            "0116^R" => 'Kosong',
            "0116^O" => 'Sedang Dipakai',
            '0116^C' => 'Cleaning',
        ];
        if (array_key_exists($id, $status_ketersediaan)) {
            return $status_ketersediaan[$id];
        }
        return '';
    }
}
