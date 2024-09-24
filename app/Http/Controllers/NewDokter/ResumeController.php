<?php

namespace App\Http\Controllers\NewDokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PerawatanSelanjutnya;
use Illuminate\Support\Facades\DB;

class ResumeController extends Controller
{
    public function data(Request $request){
        try {
            $data = DB::table('rs_pasien_resume as a')
                ->leftJoin('perawatan_selanjutnya as b', 'a.reg_no', 'b.reg_no')
                ->where('a.reg_no', $request->reg_no)
                ->select([
                    'a.*',
                    'tipe',
                    'klinik',
                    'dokter',
                    'tanggal_kontrol_rsud',
                    'tanggal_rs_lain',
                    'nama_rs_lain',
                    'tanggal_rujuk_balik',
                    'nama_rs_rujuk_balik',
                    'puskesmas',
                    'dokter_pribadi',
                    'pergantian_catheter_detail',
                    'tanggal_pergantian_catheter',
                    'terapi_rehabilitan_detail',
                    'tanggal_terapi_rehabilitan',
                    'rawat_luka_detail',
                    'tanggal_rawat_luka',
                    'perawatan_lainnya_detail',
                    'tanggal_perawatan_lainnya',
                ])
                ->first();

            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function baseData(Request $request){
        try {
            $call_assesment = new AssesmentAwalDokterController;
            $call_obat = new OrderObatController;

            $old_reg = DB::connection('mysql2')
                ->table('m_registrasi')
                ->where('reg_no', $request->reg_no)
                ->select([
                    'reg_lama'
                ])
                ->first();

            $data['assesment'] = $call_assesment->getAssesmentDokter($request);
            $data['diagnosa'] = $call_assesment->get_diagnosa($request, $request->reg_no);
            $data['prosedur'] = $call_assesment->get_prosedur($request, $request->reg_no);
            $data['terapi'] = $call_obat->getFinalOrder($request);
            $data['instruksi_ranap'] = $old_reg->reg_lama ? json_decode(getService('http://rsud.sumselprov.go.id/simrs-rajal/api/rajal/pendaftaran/'.str_replace('/', '_', $old_reg->reg_lama))) : null;
            
            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request){
        try {
            $data = [
                'reg_no' => $request->reg_no,
                'riwayat_alergi' => $request->riwayat_alergi,
                'riwayat_alergi_lain' => $request->riwayat_alergi_lain,
                'keluhan_utama' => $request->keluhan_utama,
                'riwayat_penyakit' => $request->riwayat_penyakit,
                'pemeriksaan_fisik' => $request->pemeriksaan_fisik,
                'temuan_klinik' => $request->temuan_klinik,
                'pemeriksaan_lab' => $request->pemeriksaan_lab,
                'pemeriksaan_radiologi' => $request->pemeriksaan_radiologi,
                'radiologi_keterangan' => $request->radiologi_keterangan,
                'pemeriksaan_pa' => $request->pemeriksaan_pa,
                'pa_keterangan' => $request->pa_keterangan,
                'terpasang_implant' => $request->terpasang_implant,
                'implant_keterangan' => $request->implant_keterangan,
                'lain_lain' => $request->lain_lain,
                'pemeriksaan_penunjang_yang_tertunda' => $request->pemeriksaan_penunjang_yang_tertunda,
                'penunjang_keterangan' => $request->penunjang_keterangan,
                'alasan_penundaan' => $request->alasan_penundaan,
                'tanggal_pengembalian' => $request->tanggal_pengembalian,
                'lokasi_pengembalian' => $request->lokasi_pengembalian,
                'indikasi_rawat' => $request->indikasi_rawat,
                'diagnosis_masuk' => $request->diagnosis_masuk,
                'diagnosa' => $request->diagnosa,
                'prosedur' => $request->prosedur,
                'terapi' => $request->terapi,
                'tindakan' => json_encode($request->tindakan),
                'alasan_pulang' => json_encode($request->alasan_pulang),
                'rs_lain_ke' => $request->rs_lain_ke,
                'rs_lain_alasan' => $request->rs_lain_alasan,
                'kondisi_pulang' => json_encode($request->kondisi_pulang),
                'alat_bantu_sebutkan' => $request->alat_bantu_sebutkan,
                'td' => $request->td,
                'hr' => $request->hr,
                'rr' => $request->rr,
                't' => $request->t,
                'edukasi_penyakit' => $request->edukasi_penyakit,
                'edukasi_diet' => $request->edukasi_diet,
                'edukasi_alat_bantu' => $request->edukasi_alat_bantu,
                'penyebab_luar' => json_encode($request->penyebab_luar),
                'penyebab_luar_icd' => json_encode($request->penyebab_luar_icd),
                'dokter_id' => $request->dokter_id,
            ];

            $check_ = DB::table('rs_pasien_resume')
                ->where('reg_no', $request->reg_no)
                ->first();

            if (isset($check_)) {
                $data['updated_at'] = date('Y-m-d');

                $store = DB::table('rs_pasien_resume')
                    ->where('id', $check_->id)
                    ->update($data);
            } else {
                $data['created_at'] = date('Y-m-d');

                $store = DB::table('rs_pasien_resume')
                    ->insert($data);
            }

            if ($request->tipe_perawatan_lanjutan || $request->pergantian_catheter_detail || $request->terapi_rehabilitan_detail || $request->rawat_luka_detail || $request->perawatan_lainnya_detail) {
                $this->storePerawatanSelanjutnya($request);
            }
            

            return [
                'code' => 200,
                'success' => true,
                'msg' => 'Data berhasil disimpan'
            ];
            
        } catch (\Throwable $th) {
            return [
                'code' => 500,
                'success' => false,
                'msg' => $th
            ];
        }
    }

    public function storePerawatanSelanjutnya(Request $request)
    {
        try {
            $data = [
                'id_dokter' => $request->input('dokter_id'),
                'reg_no' => $request->input('reg_no'),
                'tipe' => $request->input('tipe_perawatan_lanjutan'),
                'klinik' => $request->input('klinik'),
                'dokter' => $request->input('dokter'),
                'tanggal_kontrol_rsud' => $request->input('tanggal_kontrol_rsud'),
                'tanggal_rs_lain' => $request->input('tanggal_rs_lain'),
                'nama_rs_lain' => $request->input('nama_rs_lain'),
                'tanggal_rujuk_balik' => $request->input('tanggal_rujuk_balik'),
                'nama_rs_rujuk_balik' => $request->input('nama_rs_rujuk_balik'),
                'puskesmas' => $request->input('puskesmas'),
                'dokter_pribadi' => $request->input('dokter_pribadi'),
                'pergantian_catheter_detail' => $request->input('pergantian_catheter_detail'),
                'tanggal_pergantian_catheter' => $request->input('tanggal_pergantian_catheter'),
                'terapi_rehabilitan_detail' => $request->input('terapi_rehabilitan_detail'),
                'tanggal_terapi_rehabilitan' => $request->input('tanggal_terapi_rehabilitan'),
                'rawat_luka_detail' => $request->input('rawat_luka_detail'),
                'tanggal_rawat_luka' => $request->input('tanggal_rawat_luka'),
                'perawatan_lainnya_detail' => $request->input('perawatan_lainnya_detail'),
                'tanggal_perawatan_lainnya' => $request->input('tanggal_perawatan_lainnya'),
            ];

            $existingData = PerawatanSelanjutnya::where('reg_no', $request->input('reg_no'))->first();

            if ($existingData) {
                $existingData->update($data);
            } else {
                PerawatanSelanjutnya::create($data);
            }

            return response()->json(['message' => 'Data perawatan selanjutnya berhasil disimpan.'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $th->getMessage()], 500);
        }
    }
    public function showDokumenResume(Request $request)
    {
        $resumeData = DB::table('rs_pasien_resume')
            ->where('reg_no', $request->reg_no)
            ->first();
        
        $perawatanSelanjutnya = DB::table('perawatan_selanjutnya')
            ->where('reg_no', $request->reg_no)
            ->first();
 
        $additionalData = DB::connection('mysql2')
            ->table('m_registrasi as m')
            ->leftJoin('m_pasien as p', 'm.reg_medrec', '=', 'p.MedicalNo')
            ->where('m.reg_no', $request->reg_no)
            ->select([
                'p.PatientName as nama_lengkap',
                'p.DateOfBirth as tanggal_lahir',
                'p.GCSex as jenis_kelamin',
                'm.reg_ruangan as ruang_rawat',
                'm.reg_tgl as tgl_masuk_rawat_inap',
                'p.MedicalNo as reg_medrec'
            ])
            ->first();

        $userSignature = null;
        if ($resumeData) {
            $userSignature = DB::connection('mysql2')
                ->table('users')
                ->where('dokter_id', $resumeData->dokter_id)
                ->value('signature');
        }

        if ($resumeData && empty($resumeData->ttd_dokter) && !empty($userSignature)) {
            DB::table('rs_pasien_resume')
                ->where('reg_no', $request->reg_no)
                ->update(['ttd_dokter' => $userSignature]);
            $resumeData->ttd_dokter = $userSignature;
        }

        if ($resumeData && $additionalData) {
            $data = (object) array_merge((array) $resumeData, (array) $additionalData);
        } else {
            $data = $resumeData ?: $additionalData;
        }
        if ($perawatanSelanjutnya) {
            $data = (object) array_merge((array) $data, (array) $perawatanSelanjutnya);
        }

        $data->signature_exists = !empty($resumeData->ttd_dokter) && !empty($resumeData->ttd_pasien);
        
        $diagnosisUtama = isset($data->diagnosa) ? collect(json_decode($data->diagnosa))->firstWhere('pdiag_kategori', 'utama') : null;
        $diagnosisSekunder = isset($data->diagnosa) ? collect(json_decode($data->diagnosa))->where('pdiag_kategori', 'sekunder') : collect();
        $diagnosisKlausa = isset($data->diagnosa) ? collect(json_decode($data->diagnosa))->where('pdiag_kategori', 'klausa') : collect();
        $tindakan = isset($data->tindakan) ? collect(json_decode($data->tindakan))->values() : collect();
        $prosedur = isset($data->prosedur) ? collect(json_decode($data->prosedur)) : collect();
        $terapi = isset($data->terapi) ? collect(json_decode($data->terapi)) : collect();

        $penyebab_luar = isset($data->penyebab_luar) ? collect(json_decode($data->penyebab_luar)) : collect();
        $penyebab_luar_icd = isset($data->penyebab_luar_icd) ? collect(json_decode($data->penyebab_luar_icd)) : collect();
        
        $data->penyebab_luar = $penyebab_luar;
        $data->penyebab_luar_icd = $penyebab_luar_icd;
        $data->diagnosis_utama = $diagnosisUtama;
        $data->diagnosis_sekunder = $diagnosisSekunder;
        $data->diagnosis_klausa = $diagnosisKlausa;
        $data->tindakan = $tindakan;
        $data->prosedur = $prosedur; 
        $data->terapi = $terapi;

        return view('new_dokter.resume.dokumen-resume', compact('data'));
    }

    public function saveSignature(Request $request)
    {
        $reg_no = $request->query('reg_no') ?? $request->input('reg_no');
        // dd($request->path(), $request->all());

        $signatureDokter = $request->input('ttd_dokter');
        $signaturePasien = $request->input('ttd_pasien');
        $namaPasienKeluarga = $request->input('nama_pasien_keluarga');

        DB::table('rs_pasien_resume')
            ->where('reg_no', $reg_no)
            ->update(['ttd_dokter' => $signatureDokter, 'ttd_pasien' => $signaturePasien, 'nama_pasien_keluarga' => $namaPasienKeluarga]);

            return redirect()->route('resume.dokumen', ['reg_no' => $reg_no])
            ->with('signatures_saved', true);
}


}
