<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransferInternalController extends Controller
{

    public function getRiwayatTransferInternal(Request $request)
    {
        if ($request->ajax()) {
            $dbMaster = DB::connection('mysql2')->getDatabaseName();
            $dbInap = DB::connection('mysql')->getDatabaseName();

            $query = "SELECT internal.transfer_id, internal.transfer_reg, pasien.PatientName, pasien.MedicalNo, internal.transfer_unit_asal, 
                             internal.transfer_unit_tujuan, internal.transfer_waktu_hubungi, internal.ditransfer_waktu, internal.diterima_oleh_user_id,
                             internal.status_transfer, internal.kode_transfer_internal, internal.ditransfer_oleh_user_id,
                             bed_asal.bed_code AS bed_code_asal, bed_asal.RoomName AS bed_asal_name , bed_asal.ServiceUnitName AS bed_asal_unit, bed_asal.ClassName AS bed_asal_class,
                             bed_tujuan.bed_code AS bed_code_tujuan, bed_tujuan.RoomName AS bed_tujuan_name, bed_tujuan.ServiceUnitName AS bed_tujuan_unit, bed_tujuan.ClassName AS bed_tujuan_class
                        FROM $dbInap.transfer_internal AS internal
                        LEFT JOIN $dbMaster.m_pasien AS pasien on pasien.MedicalNo = internal.medrec
                        LEFT JOIN (
                            SELECT $dbMaster.m_bed.bed_id, $dbMaster.m_bed.bed_code, $dbMaster.m_bed.class_code, 
                                    $dbMaster.m_ruangan.RoomName, $dbMaster.m_unit.ServiceUnitName, $dbMaster.m_room_class.ClassName
                            FROM $dbMaster.m_bed
                            LEFT JOIN $dbMaster.m_ruangan ON $dbMaster.m_ruangan.RoomID = $dbMaster.m_bed.room_id
                            LEFT JOIN $dbMaster.m_room_class ON $dbMaster.m_room_class.ClassCode = $dbMaster.m_bed.class_code
                            LEFT JOIN $dbMaster.m_unit_departemen ON 
                                ($dbMaster.m_unit_departemen.ServiceUnitID = $dbMaster.m_bed.service_unit_id OR $dbMaster.m_unit_departemen.ServiceUnitCode = $dbMaster.m_bed.service_unit_id)
                            LEFT JOIN $dbMaster.m_unit ON $dbMaster.m_unit.ServiceUnitCode = $dbMaster.m_unit_departemen.ServiceUnitCode
                            WHERE $dbMaster.m_unit_departemen.isActive = 1
                        ) AS bed_asal on bed_asal.bed_id = internal.transfer_unit_asal
                        LEFT JOIN (
                            SELECT $dbMaster.m_bed.bed_id, $dbMaster.m_bed.bed_code, $dbMaster.m_bed.class_code, 
                                    $dbMaster.m_ruangan.RoomName, $dbMaster.m_unit.ServiceUnitName, $dbMaster.m_room_class.ClassName
                            FROM $dbMaster.m_bed
                            LEFT JOIN $dbMaster.m_ruangan ON $dbMaster.m_ruangan.RoomID = $dbMaster.m_bed.room_id
                            LEFT JOIN $dbMaster.m_room_class ON $dbMaster.m_room_class.ClassCode = $dbMaster.m_bed.class_code
                            LEFT JOIN $dbMaster.m_unit_departemen ON
                                ($dbMaster.m_unit_departemen.ServiceUnitID = $dbMaster.m_bed.service_unit_id OR $dbMaster.m_unit_departemen.ServiceUnitCode = $dbMaster.m_bed.service_unit_id)
                            LEFT JOIN $dbMaster.m_unit ON $dbMaster.m_unit.ServiceUnitCode = $dbMaster.m_unit_departemen.ServiceUnitCode
                            WHERE $dbMaster.m_unit_departemen.isActive = 1
                        ) AS bed_tujuan on bed_tujuan.bed_id = internal.transfer_unit_tujuan
                        WHERE internal.transfer_reg = '$request->reg_no'
                        ORDER BY internal.transfer_id DESC";

            $data = DB::select($query);

            return DataTables()
                ->of($data)
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="btn-group" role="group" >';

                    if ($row->status_transfer == 1) {
                        $actionBtn .= "<button type='button' class='btn btn-success btn-detail-transfer' data-transfer_code='$row->kode_transfer_internal'><i class='far fa-eye'></i> Detail</button>";
                        $actionBtn .= "<button type='button' class='btn btn-info btn-print-transfer' data-transfer_code='$row->kode_transfer_internal'><i class='fas fa-print'></i> Print Riwayat Transfer</button>";
                    } else if ($row->status_transfer == 0 && $row->ditransfer_oleh_user_id == auth()->user()->username) {
                        $actionBtn = "<button type='button' class='btn btn-info btn-edit-transfer' data-transfer_code='$row->kode_transfer_internal'>Edit</button>";
                    } else if ($row->status_transfer == 0) {
                        $actionBtn .= "<button type='button' class='btn btn-success btn-detail-transfer' data-transfer_code='$row->kode_transfer_internal'><i class='far fa-eye'></i> Detail</button>";
                    }

                    $actionBtn .= '</div>';
                    return $actionBtn;
                })
                ->escapeColumns([])
                ->toJson();
        }
    }


    function getTerimaPasienData(Request $request)
    {
        $user_id = auth()->user()->username;
        if ($request->ajax()) {
            $dbMaster = DB::connection('mysql2')->getDatabaseName();
            $dbInap = DB::connection('mysql')->getDatabaseName();

            $query = "SELECT internal.transfer_id, internal.transfer_reg, pasien.PatientName, pasien.MedicalNo, internal.transfer_unit_asal, 
                             internal.transfer_unit_tujuan, internal.transfer_waktu_hubungi, internal.ditransfer_waktu, internal.diterima_oleh_user_id,
                             internal.status_transfer, internal.kode_transfer_internal, internal.ditransfer_oleh_user_id,
                             bed_asal.bed_code AS bed_code_asal, bed_asal.RoomName AS bed_asal_name , bed_asal.ServiceUnitName AS bed_asal_unit, bed_asal.ClassName AS bed_asal_class,
                             bed_tujuan.bed_code AS bed_code_tujuan, bed_tujuan.RoomName AS bed_tujuan_name, bed_tujuan.ServiceUnitName AS bed_tujuan_unit, bed_tujuan.ClassName AS bed_tujuan_class
                        FROM $dbInap.transfer_internal AS internal
                        LEFT JOIN $dbMaster.m_pasien AS pasien on pasien.MedicalNo = internal.medrec
                        LEFT JOIN (
                            SELECT $dbMaster.m_bed.bed_id, $dbMaster.m_bed.bed_code, $dbMaster.m_bed.class_code, 
                                    $dbMaster.m_ruangan.RoomName, $dbMaster.m_unit.ServiceUnitName, $dbMaster.m_room_class.ClassName
                            FROM $dbMaster.m_bed
                            LEFT JOIN $dbMaster.m_ruangan ON $dbMaster.m_ruangan.RoomID = $dbMaster.m_bed.room_id
                            LEFT JOIN $dbMaster.m_room_class ON $dbMaster.m_room_class.ClassCode = $dbMaster.m_bed.class_code
                            LEFT JOIN $dbMaster.m_unit_departemen ON 
                                ($dbMaster.m_unit_departemen.ServiceUnitID = $dbMaster.m_bed.service_unit_id OR $dbMaster.m_unit_departemen.ServiceUnitCode = $dbMaster.m_bed.service_unit_id)
                            LEFT JOIN $dbMaster.m_unit ON $dbMaster.m_unit.ServiceUnitCode = $dbMaster.m_unit_departemen.ServiceUnitCode
                            WHERE $dbMaster.m_unit_departemen.isActive = 1
                        ) AS bed_asal on bed_asal.bed_id = internal.transfer_unit_asal
                        LEFT JOIN (
                            SELECT $dbMaster.m_bed.bed_id, $dbMaster.m_bed.bed_code, $dbMaster.m_bed.class_code, 
                                    $dbMaster.m_ruangan.RoomName, $dbMaster.m_unit.ServiceUnitName, $dbMaster.m_room_class.ClassName
                            FROM $dbMaster.m_bed
                            LEFT JOIN $dbMaster.m_ruangan ON $dbMaster.m_ruangan.RoomID = $dbMaster.m_bed.room_id
                            LEFT JOIN $dbMaster.m_room_class ON $dbMaster.m_room_class.ClassCode = $dbMaster.m_bed.class_code
                            LEFT JOIN $dbMaster.m_unit_departemen ON
                                ($dbMaster.m_unit_departemen.ServiceUnitID = $dbMaster.m_bed.service_unit_id OR $dbMaster.m_unit_departemen.ServiceUnitCode = $dbMaster.m_bed.service_unit_id)
                            LEFT JOIN $dbMaster.m_unit ON $dbMaster.m_unit.ServiceUnitCode = $dbMaster.m_unit_departemen.ServiceUnitCode
                            WHERE $dbMaster.m_unit_departemen.isActive = 1
                        ) AS bed_tujuan on bed_tujuan.bed_id = internal.transfer_unit_tujuan
                            WHERE `internal`.`transfer_reg` = '$request->reg_no' 
                                AND `internal`.`diterima_oleh_user_id` = '$user_id'
                                AND `internal`.`status_transfer` = 0
                            ORDER BY `internal`.`transfer_id` DESC";

            $data = DB::select($query);

            // dd($data);
            return DataTables()
                ->of($data)
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="btn-group" role="group">';
                    if ($row->status_transfer == 1) {
                        $actionBtn = "<button type='button' class='btn btn-success'><i class='far fa-eye'></i> Detail</button>";
                    } else {

                        $actionBtn = "<button type='button' class='btn btn-warning btn-confirm-tf' data-transfer_code='$row->kode_transfer_internal'><i class='fas fa-user-check'></i> Konfirmasi Penerimaan</button>";
                    }

                    $actionBtn .= '</div>';

                    return $actionBtn;
                })
                ->escapeColumns([])
                ->toJson();
        }
    }

    public function confirmSerahTerima(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'transfer_terima_tanggal' => 'required',
            'transfer_terima_kondisi' => 'required',
        ]);
        if ($validator->passes()) {
            DB::beginTransaction();
            try {
                $tf_internal = DB::connection('mysql')->table('transfer_internal')->where([
                    ['transfer_reg', $request->transfer_reg],
                    ['kode_transfer_internal', $request->kode_transfer_internal],
                ])->first();

                // check bed status
                $bed = DB::connection('mysql2')->table('m_bed')->where('bed_id',  $tf_internal->transfer_unit_tujuan)->first();
                if ($bed->bed_status == "0116^O") {
                    return response()->json(
                        [
                            'status' => 'failed',
                            'message' => 'Gagal ! Bed sudah terisi !',
                        ]
                    );
                }
                // dd($bed);

                $reg = DB::connection('mysql2')->table('m_registrasi')->where('reg_no', $request->transfer_reg)->first();
                //get dokter dpjp
                $dokter = DB::connection('mysql2')->table('users')->where('dokter_id', $reg->reg_dokter)->first();
                $perawat_asal = DB::connection('mysql2')->table('users')->where('username', $tf_internal->ditransfer_oleh_user_id)->first();
                $perawat_tujuan = DB::connection('mysql2')->table('users')->where('username', $tf_internal->diterima_oleh_user_id)->first();

                $data = array(
                    'transfer_terima_tanggal' => $request->transfer_terima_tanggal,
                    'transfer_terima_kondisi' => $request->transfer_terima_kondisi,
                    'transfer_terima_gcs_e' => $request->transfer_terima_gcs_e,
                    'transfer_terima_gcs_m' => $request->transfer_terima_gcs_m,
                    'transfer_terima_gcs_v' => $request->transfer_terima_gcs_v,
                    'transfer_terima_td' => $request->transfer_terima_td,
                    'transfer_terima_n' => $request->transfer_terima_n,
                    'transfer_terima_suhu' => $request->transfer_terima_suhu,
                    'transfer_terima_p' => $request->transfer_terima_p,
                    'diterima_oleh_user_id' => auth()->user()->username,
                    'diterima_oleh_nama' => auth()->user()->name,
                    'status_transfer'   => 1,
                    'signature_doctor' => $dokter->signature,
                    'signature_nurse' => $perawat_asal->signature,
                    'signature_doctor_2' => $dokter->signature,
                    'signature_nurse_2' => $perawat_tujuan->signature,
                );


                DB::connection('mysql')->table('transfer_internal')
                    ->where([
                        ['transfer_reg', $request->transfer_reg],
                        ['kode_transfer_internal', $request->kode_transfer_internal]
                    ])
                    ->update($data);

                //update bed asal
                DB::connection('mysql2')->table('m_bed')
                    ->where('bed_id', $tf_internal->transfer_unit_asal)
                    ->update([
                        'registration_no' => '',
                        'bed_status' => '0116^R',
                    ]);

                //update bed tujuan
                DB::connection('mysql2')->table('m_bed')
                    ->where('bed_id', $tf_internal->transfer_unit_tujuan)
                    ->update([
                        'registration_no' => $tf_internal->transfer_reg,
                        'bed_status' => '0116^O',
                    ]);

                //Log History Bed

                $history = array(
                    'RegNo' => $request->transfer_reg,
                    'MedicalNo' => $request->medrec,
                    'HistoryRefCode' => $request->kode_transfer_internal,
                    'TableRef' => 'transfer_internal',
                    'FromBedID' => $request->transfer_unit_asal,
                    'ToBedID'   => $request->transfer_unit_tujuan,
                    'RequestTransferDate' => Carbon::parse($request->ditransfer_waktu)->toDateString(),
                    'RequestTransferTime'   => Carbon::parse($request->ditransfer_waktu)->toTimeString(),
                    'ReceiveTransferDate'   => Carbon::parse($request->transfer_terima_tanggal)->toDateString(),
                    'ReceiveTransferTime'   => Carbon::parse($request->transfer_terima_tanggal)->toTimeString(),
                    'Description'   => 'Transfer Internal',
                    'CreatedBy'     => auth()->user()->username,
                    'RequestedBy'   => $tf_internal->ditransfer_oleh_user_id,
                    'ReceivedBy'    => auth()->user()->username,
                    'created_at' => Carbon::now(),
                );

                DB::connection('mysql2')->table('m_bed_history')->insert($history);


                DB::commit();
                $response = response()->json([
                    'status' => 'success',
                    'message' => 'Data berhasil disimpan',
                ]);
            } catch (\Throwable $throw) {
                //throw $th;
                DB::rollBack();
                // dd($throw->getMessage());
                abort(500, $throw->getMessage());
            }
        } else {
            abort(402, json_encode($validator->errors()->all()));
        }
        return $response;
    }

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
            ->select('name', 'perawat_id', 'id', 'username')
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
