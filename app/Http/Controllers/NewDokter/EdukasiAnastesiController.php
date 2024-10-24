<?php

namespace App\Http\Controllers\NewDokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EdukasiAnastesiController extends Controller
{
    public function addEdukasiAnastesi(Request $request)
    {
        $params = $request->only([
            'medrec',
            'dilakukan_ke',
            'nama',
            'umur',
            'jenis_kelamin',
            'no_telp',
            'no_rekam_medis',
            'diagonsa',
            'tindakan',
            'jenis_anastesi',
            'tgl_ttd',
            'nama_pihak_pasien',
            'nama_dokter',
        ]);
        
        $reg_no = $request->reg_no;
        $params['ttd_pihak_pasien'] = $request->ttd_pihak_pasien_anastesi;
        $params['ttd_dokter'] = $request->ttd_dokter_anastesi;
        $params['reg_no'] = $reg_no;
        

        $cek = DB::connection('mysql')->table('rs_edukasi_pasien_anastesi')->where('reg_no', $reg_no)->count();
        if ($cek > 0) {
            $params['updated_at'] = now(); 
            $params['updated_by'] = $request->username;
        }else{
            $params['created_at'] = now();
            $params['created_by'] = $request->username;
        }

        $simpan = DB::connection('mysql')->table('rs_edukasi_pasien_anastesi')->updateOrInsert(['reg_no' => $reg_no], $params);

        return response()->json([
            'status' => $simpan
        ]);
    }

    public function getEdukasiAnastesi(Request $request)
    {
        $reg_no = $request->reg_no;

        $data_edukasi = DB::connection('mysql')
            ->table('rs_edukasi_pasien_anastesi')
            ->where('reg_no', $reg_no)
            ->first();

        $dbMaster = DB::connection('mysql2')->getDatabaseName();
        $dbInap = DB::connection('mysql')->getDatabaseName();

        $data_pasien = DB::table($dbMaster . '.m_registrasi')
            ->leftJoin($dbMaster . '.m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin($dbMaster . '.m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin($dbInap . '.icd10_bpjs', 'm_registrasi.reg_diagnosis', '=', 'icd10_bpjs.ID_ICD10')
            ->select(
                'm_registrasi.reg_medrec', 
                'm_pasien.PatientName',
                'm_pasien.DateOfBirth',
                'm_pasien.GCSex',
                'm_pasien.MobilePhoneNo1',
                'm_paramedis.ParamedicName', 
                'icd10_bpjs.NM_ICD10')
            ->where('m_registrasi.reg_no', $reg_no)
            ->first();

        return response()->json([
            'data_edukasi' => $data_edukasi,
            'data_pasien' => $data_pasien
        ]);
    }
}
