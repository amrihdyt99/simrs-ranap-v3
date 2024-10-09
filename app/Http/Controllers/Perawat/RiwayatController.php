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

    
}

