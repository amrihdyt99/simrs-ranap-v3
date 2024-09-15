<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransferInternalController extends Controller
{

    public function getRiwayatTransferInternal(Request $request)
    {
        if ($request->ajax()) {
            $query = "SELECT `internal`.`transfer_id`, `internal`.`transfer_reg`, `pasien`.`PatientName`, `pasien`.`MedicalNo`, `unit_asal`.`ServiceUnitName` as `UnitAsal`, 
                             `unit_asal`.`ServiceUnitName` as `UnitTujuan`, `internal`.`transfer_waktu_hubungi`, `internal`.`ditransfer_waktu`, `internal`.`diterima_oleh_user_id`,
                             `internal`.`status_transfer`
                      FROM `sim_rs_inap`.`transfer_internal` as `internal`
                      LEFT JOIN `sim_rs_master`.`m_pasien` as `pasien` on `pasien`.`MedicalNo` = `internal`.`medrec`
                      LEFT JOIN `sim_rs_master`.`m_unit_departemen` as `unit_dep_asal` on `internal`.`transfer_unit_asal` = `unit_dep_asal`.`ServiceUnitID`
                      LEFT JOIN `sim_rs_master`.`m_unit` as `unit_asal` on `unit_dep_asal`.`ServiceUnitCode` = `unit_asal`.`ServiceUnitCode`
                      LEFT JOIN `sim_rs_master`.`m_unit_departemen` as `unit_dep_tujuan` on `internal`.`transfer_unit_tujuan` = `unit_dep_tujuan`.`ServiceUnitID`
                      LEFT JOIN `sim_rs_master`.`m_unit` as `unit_tujuan` on `unit_dep_tujuan`.`ServiceUnitCode` = `unit_tujuan`.`ServiceUnitCode`
                      WHERE `internal`.`transfer_reg` = '$request->reg_no' 
                      ORDER BY `internal`.`transfer_id` DESC";

            $data = DB::select($query);

            // dd($data);
            return DataTables()
                ->of($data)
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="btn-group">
                                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="">Edit</a></li>
                                        <li><a class="dropdown-item btn-delete" href="#" data-id ="' . $row->transfer_id . '" >Hapus</a></li>
                                    </ul>
                                </div>';
                    return $actionBtn;
                })
                ->escapeColumns([])
                ->toJson();
        }
    }


    function getTerimaTerimaPasienData(Request $request)
    {
        $user_id = auth()->user()->id;
        if ($request->ajax()) {
            $query = "SELECT `internal`.`transfer_id`, `internal`.`transfer_reg`, `pasien`.`PatientName`, `pasien`.`MedicalNo`, `unit_asal`.`ServiceUnitName` as `UnitAsal`, 
                             `unit_asal`.`ServiceUnitName` as `UnitTujuan`, `internal`.`transfer_waktu_hubungi`, `internal`.`ditransfer_waktu`, `internal`.`diterima_oleh_user_id`,
                             `internal`.`status_transfer`
                      FROM `sim_rs_inap`.`transfer_internal` as `internal`
                      LEFT JOIN `sim_rs_master`.`m_pasien` as `pasien` on `pasien`.`MedicalNo` = `internal`.`medrec`
                      LEFT JOIN `sim_rs_master`.`m_unit_departemen` as `unit_dep_asal` on `internal`.`transfer_unit_asal` = `unit_dep_asal`.`ServiceUnitID`
                      LEFT JOIN `sim_rs_master`.`m_unit` as `unit_asal` on `unit_dep_asal`.`ServiceUnitCode` = `unit_asal`.`ServiceUnitCode`
                      LEFT JOIN `sim_rs_master`.`m_unit_departemen` as `unit_dep_tujuan` on `internal`.`transfer_unit_tujuan` = `unit_dep_tujuan`.`ServiceUnitID`
                      LEFT JOIN `sim_rs_master`.`m_unit` as `unit_tujuan` on `unit_dep_tujuan`.`ServiceUnitCode` = `unit_tujuan`.`ServiceUnitCode`
                      WHERE `internal`.`transfer_reg` = '$request->reg_no' AND `internal`.`diterima_oleh_user_id` = '$user_id'
                      ORDER BY `internal`.`transfer_id` DESC";

            $data = DB::select($query);

            // dd($data);
            return DataTables()
                ->of($data)
                ->addColumn('action', function ($row) {
                    $actionBtn = '';
                    if ($row->status_transfer == 1) {
                        $actionBtn = "<button type='button' class='btn btn-success'><i class='far fa-eye'></i> Detail</button>";
                    } else {

                        $actionBtn = "<button type='button' class='btn btn-warning btn-confirm-tf'><i class='fas fa-user-check'></i> Konfirmasi Penerimaan</button>";
                    }
                    return $actionBtn;
                })
                ->escapeColumns([])
                ->toJson();
        }
    }

    public function store(Request $request) {}

    public function getUnitRoom(Request $request)
    {
        $ruangan = DB::connection('mysql2')
            ->table('m_bed')
            ->leftJoin('m_ruangan', 'm_ruangan.RoomID', '=', 'm_bed.room_id')
            ->leftJoin('m_room_class', 'm_room_class.ClassCode', '=', 'm_bed.class_code')
            // ->join('m_unit_departemen', 'm_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitCode')
            ->leftJoin('m_unit_departemen', function ($join) {
                $join->on('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitCode')
                    ->orOn('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitID');
            })
            ->leftJoin('m_unit', 'm_unit_departemen.ServiceUnitCode', '=', 'm_unit.ServiceUnitCode')
            ->select('bed_id', 'bed_code', 'room_id', 'class_code', 'RoomName as ruang', 'ServiceUnitName as kelompok', 'm_room_class.ClassName as kelas')
            ->whereNull('registration_no')
            ->where(function ($query) {
                $query->where('is_active', 1)
                    ->orWhereNull('is_active'); // menambahkan kondisi manampilkan data jika NULL
            })
            ->where(function ($query) {
                $query->where('bed_status', 'ready') // menampilkan data dengan status ready
                    ->orWhere('bed_status', '0116^R'); // menampilkan jika status 0116^R
            })
            ->get();
        // dd($ruangan[1]);
        return response()->json([
            'data' => $ruangan
        ]);
    }

    public function getPerawat(Request $request)
    {
        $perawat = DB::connection('mysql2')
            ->table('users')
            ->select('name', 'id')
            ->where([
                ['is_deleted', 0],
                ['is_active', 1],
                ['level_user', 'perawat']
            ])
            ->get();

        return response()->json([
            'data' => $perawat
        ]);
    }
}
