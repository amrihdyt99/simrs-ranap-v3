<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayatController extends Controller
{
    public function getAssesmentDewasa(Request $request)
    {
        $assesment_dewasa = DB::table('pengkajian_dewasa_awal')
            ->leftJoin('pengkajian_dewasa_skor_sad_person', 'pengkajian_dewasa_awal.reg_no', '=', 'pengkajian_dewasa_skor_sad_person.reg_no')
            ->leftJoin('pengkajian_dewasa_adl', 'pengkajian_dewasa_awal.reg_no', '=', 'pengkajian_dewasa_adl.reg_no')
            ->leftJoin('pengkajian_dewasa_skrining_gizi', 'pengkajian_dewasa_awal.reg_no', '=', 'pengkajian_dewasa_skrining_gizi.reg_no')
            ->leftJoin('pengkajian_dewasa_skrining_nyeri', 'pengkajian_dewasa_awal.reg_no', '=', 'pengkajian_dewasa_skrining_nyeri.reg_no')
            ->where('pengkajian_dewasa_awal.reg_no', $request->reg_no)
            ->select(
                'pengkajian_dewasa_awal.*',
                'pengkajian_dewasa_skor_sad_person.*',
                'pengkajian_dewasa_adl.*',
                'pengkajian_dewasa_skrining_gizi.*',
                'pengkajian_dewasa_skrining_nyeri.*'
            )
            ->first();

        if (!$assesment_dewasa) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'data' => $assesment_dewasa
            ],
            200
        );
    }

    public function getAssesmentObgyn(Request $request)
    {
        $assesment_obgyn = DB::table('pengkajian_obgyn_alergi_dan_keadaan_umum')
            ->leftJoin('pengkajian_obgyn_data_psikologis', 'pengkajian_obgyn_alergi_dan_keadaan_umum.reg_no', '=', 'pengkajian_obgyn_data_psikologis.reg_no')
            ->leftJoin('pengkajian_obgyn_pengkajian_kebutuhan', 'pengkajian_obgyn_alergi_dan_keadaan_umum.reg_no', '=', 'pengkajian_obgyn_pengkajian_kebutuhan.reg_no')
            ->leftJoin('pengkajian_obgyn_pengkajian_kulit', 'pengkajian_obgyn_alergi_dan_keadaan_umum.reg_no', '=', 'pengkajian_obgyn_pengkajian_kulit.reg_no')
            ->leftJoin('pengkajian_obgyn_riwayat_kehamilan', 'pengkajian_obgyn_alergi_dan_keadaan_umum.reg_no', '=', 'pengkajian_obgyn_riwayat_kehamilan.reg_no')
            ->leftJoin('pengkajian_obgyn_riwayat_menstruasi_dan_perkawinan', 'pengkajian_obgyn_alergi_dan_keadaan_umum.reg_no', '=', 'pengkajian_obgyn_riwayat_menstruasi_dan_perkawinan.reg_no')
            ->leftJoin('pengkajian_obgyn_skrining_gizi', 'pengkajian_obgyn_alergi_dan_keadaan_umum.reg_no', '=', 'pengkajian_obgyn_skrining_gizi.reg_no')
            ->leftJoin('pengkajian_obgyn_skrining_nyeri', 'pengkajian_obgyn_alergi_dan_keadaan_umum.reg_no', '=', 'pengkajian_obgyn_skrining_nyeri.reg_no')
            ->leftJoin('pengkajian_obgyn_skrining_status_fungsional', 'pengkajian_obgyn_alergi_dan_keadaan_umum.reg_no', '=', 'pengkajian_obgyn_skrining_status_fungsional.reg_no')
            ->where('pengkajian_obgyn_alergi_dan_keadaan_umum.reg_no', $request->reg_no)
            ->select(
                'pengkajian_obgyn_alergi_dan_keadaan_umum.*',
                'pengkajian_obgyn_data_psikologis.*',
                'pengkajian_obgyn_pengkajian_kebutuhan.*',
                'pengkajian_obgyn_pengkajian_kulit.*',
                'pengkajian_obgyn_riwayat_kehamilan.*',
                'pengkajian_obgyn_riwayat_menstruasi_dan_perkawinan.*',
                'pengkajian_obgyn_skrining_gizi.*',
                'pengkajian_obgyn_skrining_nyeri.*',
                'pengkajian_obgyn_skrining_status_fungsional.*',
            )
            ->first();

        if (!$assesment_obgyn) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'data' => $assesment_obgyn
            ],
            200
        );
    }

    public function getAssesmentAnak(Request $request)
    {
        $assesment_anak = DB::table('pengkajian_awal_anak_perawat')
            ->leftJoin('skor_sad_person_anak', 'pengkajian_awal_anak_perawat.reg_no', '=', 'skor_sad_person_anak.reg_no')
            ->leftJoin('pengkajian_dewasa_adl', 'pengkajian_awal_anak_perawat.reg_no', '=', 'pengkajian_dewasa_adl.reg_no')
            ->leftJoin('skrining_gizi_anak', 'pengkajian_awal_anak_perawat.reg_no', '=', 'skrining_gizi_anak.reg_no')
            ->leftJoin('skrining_nyeri_anak', 'pengkajian_awal_anak_perawat.reg_no', '=', 'skrining_nyeri_anak.reg_no')
            ->leftJoin('activity_daily_living_anak', 'pengkajian_awal_anak_perawat.reg_no', '=', 'activity_daily_living_anak.reg_no')
            ->where('pengkajian_awal_anak_perawat.reg_no', $request->reg_no)
            ->select(
                'pengkajian_awal_anak_perawat.*',
                'skor_sad_person_anak.*',
                'pengkajian_dewasa_adl.*',
                'skrining_gizi_anak.*',
                'activity_daily_living_anak.*',
                'skrining_nyeri_anak.*',
            )
            ->first();

        if (!$assesment_anak) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'data' => $assesment_anak
            ],
            200
        );
    }

    public function getAssesmentNeonatus(Request $request)
    {
        $assesment_neonatus = DB::table('pengkajian_neonatus_fisik')
            ->leftJoin('pengkajian_neonatus_nyeri', 'pengkajian_neonatus_fisik.reg_no', '=', 'pengkajian_neonatus_nyeri.reg_no')
            ->where('pengkajian_neonatus_fisik.reg_no', $request->reg_no)
            ->select(
                'pengkajian_neonatus_fisik.*',
                'pengkajian_neonatus_nyeri.*',
            )
            ->first();

        if (!$assesment_neonatus) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'data' => $assesment_neonatus
            ],
            200
        );
    }

    public function getEdukasiPasien(Request $request)
    {
        $edukasi_pasien = DB::table('rs_edukasi_pasien')
            ->where('rs_edukasi_pasien.reg_no', $request->reg_no)
            ->first();

        $edukasi_gizi = DB::table('rs_edukasi_pasien_gizi')
            ->where('rs_edukasi_pasien_gizi.reg_no', $edukasi_pasien->reg_no)
            ->first();

        $edukasi_dokter = DB::table('rs_edukasi_pasien_dokter')
            ->where('rs_edukasi_pasien_dokter.reg_no', $edukasi_pasien->reg_no)
            ->first();

        $edukasi_farmasi = DB::table('rs_edukasi_pasien_farmasi')
            ->where('rs_edukasi_pasien_farmasi.reg_no', $edukasi_pasien->reg_no)
            ->first();

        $edukasi_perawat = DB::table('rs_edukasi_pasien_perawat')
            ->where('rs_edukasi_pasien_perawat.reg_no', $edukasi_pasien->reg_no)
            ->first();

        $edukasi_rehab = DB::table('rs_edukasi_pasien_rehab')
            ->where('rs_edukasi_pasien_rehab.reg_no', $edukasi_pasien->reg_no)
            ->first();

        if (!$edukasi_pasien) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'data' => [
                    'edukasi_pasien' => $edukasi_pasien,
                    'edukasi_gizi' => $edukasi_gizi,
                    'edukasi_dokter' => $edukasi_dokter,
                    'edukasi_farmasi' => $edukasi_farmasi,
                    'edukasi_perawat' => $edukasi_perawat,
                    'edukasi_rehab' => $edukasi_rehab,
                ]
            ],
            200
        );
    }

    public function getRekonObat(Request $request)
    {
        $rekon_obat = DB::table('rekonsiliasi_obat')
            ->where('reg_no', $request->reg_no)
            ->first();

        $rekon_obat_items = DB::table('rekonsiliasi_obat_item')
            ->where('reg_no', $request->reg_no)
            ->get();

        if (!$rekon_obat) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'data' => [
                    'rekon_obat' => $rekon_obat,
                    'rekon_obat_items' => $rekon_obat_items
                ]
            ],
            200
        );
    }

    public function getChecklistOrientasi(Request $request)
    {
        $dbMaster = DB::connection('mysql2')->getDatabaseName();
        $dbInap = DB::connection('mysql')->getDatabaseName();

        $checklist_orientasi = DB::table($dbInap . '.rm3')
            ->leftJoin($dbMaster . '.m_registrasi', 'rm3.reg_no', '=', 'm_registrasi.reg_no')
            ->leftJoin($dbMaster . '.m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin($dbMaster . '.m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin($dbMaster . '.m_ruangan_baru', 'm_registrasi.service_unit', '=', 'm_ruangan_baru.id')
            ->leftJoin($dbMaster . '.m_kelas_ruangan_baru', 'm_registrasi.bed', '=', 'm_kelas_ruangan_baru.id')
            ->leftJoin($dbMaster . '.m_bed', 'm_registrasi.bed', '=', 'm_bed.bed_id')
            ->leftJoin($dbMaster . '.m_ruangan', 'm_bed.room_id', '=', 'm_ruangan.RoomID')
            ->leftJoin($dbMaster . '.m_room_class', 'm_bed.class_code', '=', 'm_room_class.ClassCode')
            ->leftJoin($dbMaster . '.m_unit_departemen', 'm_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitID')
            ->leftJoin($dbMaster . '.m_unit', 'm_unit_departemen.ServiceUnitCode', '=', 'm_unit.ServiceUnitCode')
            ->where('rm3.reg_no', $request->reg_no)
            ->select(
                'rm3.*',
                'm_registrasi.reg_tgl as tgl_masuk_inap',
                'm_pasien.PatientName',
                'm_pasien.DateOfBirth',
                'm_pasien.GCSex',
                'm_paramedis.ParamedicName',
                'm_bed.bed_code',
                'm_ruangan.RoomName as ruang',
                'm_unit.ServiceUnitName as kelompok',
                'm_room_class.ClassName as kelas'
            )
            ->first();

        if (!$checklist_orientasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'data' => $checklist_orientasi
            ],
            200
        );
    }

    public function getResikoJatuhMorse(Request $request)
    {
        $resiko_jatuh_morse = DB::table('resiko_jatuh_skala_morse')
            ->where('reg_no', $request->reg_no)
            ->get();
        
        if (!$resiko_jatuh_morse) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'data' => $resiko_jatuh_morse
            ],
            200
        );
    }

    public function getResikoJatuhHumpty(Request $request)
    {
        $resiko_jatuh_morse = DB::table('resiko_jatuh_humpty_dumpty')
            ->where('reg_no', $request->reg_no)
            ->get();
        
        if (!$resiko_jatuh_morse) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'data' => $resiko_jatuh_morse
            ],
            200
        );
    }

    public function getResikoJatuhGeriatri(Request $request)
    {
        $resiko_jatuh_geriatri = DB::table('resiko_jatuh_geriatri')
            ->where('reg_no', $request->reg_no)
            ->get();
        
        if (!$resiko_jatuh_geriatri) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'data' => $resiko_jatuh_geriatri
            ],
            200
        );
    }

    public function getResikoJatuhNeonatus(Request $request)
    {
        $resiko_jatuh_neonatus = DB::table('resiko_jatuh_neonatus')
            ->where('reg_no', $request->reg_no)
            ->get();
        
        if (!$resiko_jatuh_neonatus) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'data' => $resiko_jatuh_neonatus
            ],
            200
        );
    }

    public function getNurseNote(Request $request)
    {
        $nurse_note = DB::table('nurse_note')
            ->where('reg_no', $request->reg_no)
            ->get();

        if (!$nurse_note) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'data' => $nurse_note
            ],
            200
        );
    }

    public function getDatatableMoniNews(Request $request)
    {
        if ($request->ajax()) {
            $moni_news = DB::connection('mysql')->table('monitoring_news')
                ->where([
                    ['reg_no', $request->reg_no],
                ])->get();
            return DataTables()
                ->of($moni_news)
                ->addColumn('action', function ($row) {
                    $actionBtn = '<div class="btn-group" role="group">';
                    $actionBtn .= '<button type="button" class="btn btn-sm btn-info" onclick="detailRiwayatMoniNews(' . $row->id . ')">Details</button>';
                    $actionBtn .= '</div>';

                    return $actionBtn;
                })
                ->escapeColumns([])
                ->toJson();
        }
    }
    
    public function getFluidBalance(Request $request)
    {
        $fluid_balance = DB::table('fluid_balance_data_baru')
            ->where('no_reg', $request->reg_no)
            ->get();

        if (!$fluid_balance) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'data' => $fluid_balance
            ],
            200
        );
    }

    
    public function getDrugHistory(Request $request)
    {
        $drug_history = DB::table('drug_history')
            ->where('reg_no', $request->reg_no)
            ->get();

        if (!$drug_history) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'data' => $drug_history
            ],
            200
        );
    }

    public function getMonitoringTransfusiDarah(Request $request)
    {
        $moni_darah = DB::table('monitoring_transfusi_darah')
            ->where('reg_no', $request->reg_no)
            ->get();
            
        if (!$moni_darah) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'data' => $moni_darah
            ],
            200
        );
    }

    public function getPersetujuanTindakanMedis(Request $request)
    {
        $dbMaster = DB::connection('mysql2')->getDatabaseName();
        $dbInap = DB::connection('mysql')->getDatabaseName();

        $informasi = DB::table($dbInap . '.rs_tindakan_medis_informasi')
            ->leftJoin($dbMaster . '.m_paramedis', 'rs_tindakan_medis_informasi.ParamedicCode', '=', 'm_paramedis.ParamedicCode')
            ->where('rs_tindakan_medis_informasi.reg_no', $request->reg_no)
            ->select(
                'rs_tindakan_medis_informasi.*',
                'm_paramedis.ParamedicName'
            )
            ->first();

        $setuju = DB::table('rs_tindakan_medis_persetujuan')
            ->where('reg_no', $request->reg_no)
            ->first();

        $tolak = DB::table('rs_tindakan_medis_penolakan')
            ->where('reg_no', $request->reg_no)
            ->first();
            
        if (!$informasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'informasi' => $informasi,
                'setuju' => $setuju,
                'tolak' => $tolak,
            ],
            200
        );
    }

    public function getCaseManager(Request $request)
    {
        $case_manager = DB::table('case_manager')
            ->where('reg_no', $request->reg_no)
            ->first();

        $case_manager_evaluasi = DB::table('case_manager_akumulasi')
            ->where('reg_no', $request->reg_no)
            ->first();
        
        if (!$case_manager) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'case_manager' => $case_manager,
                'case_manager_evaluasi' => $case_manager_evaluasi
            ],
            200
        );
    }

    public function getDtRiwayatTfInternal(Request $request)
    {
        if ($request->ajax()) {
            $dbMaster = DB::connection('mysql2')->getDatabaseName();
            $dbInap = DB::connection('mysql')->getDatabaseName();

            $query = "SELECT internal.transfer_id, internal.transfer_reg, pasien.PatientName, pasien.MedicalNo, internal.transfer_unit_asal, 
                             internal.transfer_unit_tujuan, internal.transfer_waktu_hubungi, internal.ditransfer_waktu, internal.diterima_oleh_user_id,
                             internal.status_transfer, internal.kode_transfer_internal, internal.ditransfer_oleh_user_id,
                             bed_asal.bed_code AS bed_code_asal, bed_asal.RoomName AS bed_asal_name , bed_asal.ServiceUnitName AS bed_asal_unit, bed_asal.ClassName AS bed_asal_class,
                             bed_tujuan.bed_code AS bed_code_tujuan, bed_tujuan.RoomName AS bed_tujuan_name, bed_tujuan.ServiceUnitName AS bed_tujuan_unit, bed_tujuan.ClassName AS bed_tujuan_class,
                             internal.transfer_rawat_intensif
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
                ->escapeColumns([])
                ->toJson();
        }
    }

    public function getPersiapanPasienTI(Request $request)
    {
        $dbMaster = DB::connection('mysql2')->getDatabaseName();
        $dbInap = DB::connection('mysql')->getDatabaseName();

        $persiapan_pasien = DB::table($dbInap . '.transfer_internal')
            ->leftJoin($dbMaster . '.m_room_class AS class', 'class.ClassCode', '=', 'transfer_internal.class')
            ->leftJoin($dbMaster . '.m_room_class AS charge_class', 'charge_class.ClassCode', '=', 'transfer_internal.charge_class')
            ->where('transfer_reg', $request->reg_no)
            ->select('transfer_internal.*', 'class.ClassName as class_name', 'charge_class.ClassName as charge_class_name')
            ->first();
        
        $ruangan_asal = DB::connection('mysql2')
            ->table('m_registrasi')
            ->join('m_bed_history', 'm_bed_history.RegNo', '=', 'm_registrasi.reg_no')
            ->join('m_bed', 'm_bed.bed_id', '=', 'm_bed_history.ToBedID')
            ->leftJoin('m_ruangan', 'm_ruangan.RoomID', '=', 'm_bed.room_id')
            ->leftJoin('m_room_class', 'm_room_class.ClassCode', '=', 'm_bed.class_code')
            // ->join('m_unit_departemen', 'm_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitCode')
            ->leftJoin('m_unit_departemen', function ($join) {
                $join->on('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitCode')
                    ->orOn('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitID');
            })
            ->leftJoin('m_unit', 'm_unit_departemen.ServiceUnitCode', '=', 'm_unit.ServiceUnitCode')
            ->select('bed_id', 'bed_code', 'room_id', 'class_code', 'RoomName as ruang', 'ServiceUnitName as kelompok', 'm_room_class.ClassName as kelas')
            ->where('m_registrasi.reg_no', $request->reg_no)
            ->orderBy('m_bed_history.ReceiveTransferDate', 'desc')
            ->orderBy('m_bed_history.ReceiveTransferTime', 'desc')
            ->first();
        
        $ruangan_tujuan = DB::connection('mysql2')
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
            ->where('bed_id', $persiapan_pasien->transfer_unit_tujuan)
            ->first();

        if (!$persiapan_pasien) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'persiapan_pasien' => $persiapan_pasien,
                'ruangan_asal' => $ruangan_asal,
                'ruangan_tujuan' => $ruangan_tujuan
            ],
            200
        );
    }

    public function getDtRiwayatTiAlat(Request $request)
    {
        if ($request->ajax()) {
            $riwayat_ti_alat = DB::table('transfer_internal_alat_terpasang')
                ->where('reg_no', $request->reg_no)
                ->get(); 
            return DataTables()
                ->of($riwayat_ti_alat) 
                ->escapeColumns([])
                ->toJson();
        }
    }

    public function getDtRiwayatTiObat(Request $request)
    {
        if ($request->ajax()) {
            $riwayat_ti_obat = DB::table('transfer_internal_obat_dibawa')
                ->where('reg_no', $request->reg_no)
                ->get(); 
            return DataTables()
                ->of($riwayat_ti_obat) 
                ->escapeColumns([])
                ->toJson();
        }
    }

    public function getDtRiwayatTiStatus(Request $request)
    {
        if ($request->ajax()) {
            $riwayat_ti_status = DB::table('transfer_internal_status_pasien')
                ->where('reg_no', $request->reg_no)
                ->get(); 
            return DataTables()
                ->of($riwayat_ti_status) 
                ->escapeColumns([])
                ->toJson();
        }
    }

    public function getSerahTerimaTI(Request $request)
    {
        $terima = DB::table('transfer_internal')
            ->where('transfer_reg', $request->reg_no)
            ->select(
                'transfer_terima_tanggal', 
                'transfer_terima_kondisi', 
                'transfer_terima_gcs_e', 
                'transfer_terima_gcs_m', 
                'transfer_terima_gcs_v', 
                'transfer_terima_td', 
                'transfer_terima_n', 
                'transfer_terima_suhu', 
                'transfer_terima_p')
            ->first();
        
        return response()->json(
            [
                'status' => true,
                'data' => $terima
            ],
            200
        );
    }

    public function getDtRiwayatTiDiagnostik(Request $request)
    {
        if ($request->ajax()) {
            $riwayat_ti_diagnostik = DB::table('transfer_internal_diagnostik')
                ->where('reg_no', $request->reg_no)
                ->get(); 
            return DataTables()
                ->of($riwayat_ti_diagnostik) 
                ->escapeColumns([])
                ->toJson();
        }
    }
    
}

