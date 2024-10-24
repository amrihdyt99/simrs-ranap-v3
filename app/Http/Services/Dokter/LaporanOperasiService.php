<?php

namespace App\Http\Services\Dokter;

use App\Repository\LaporanOperasiRepository;
use App\Repository\MasterPyschianRepository;
use App\Repository\MasterRegistrationRepository;
use App\Repository\PatientRepository;
use App\Traits\ResponseDataTraits;
use App\Utils\UtilsHelper;

class LaporanOperasiService
{
    use ResponseDataTraits;
    protected $laporanOperasiRepo, $utils, $patientRepo, $registrationRepo, $masterPyschianRepository;
    public function __construct(
        LaporanOperasiRepository $laporanOperasiRepo,
        UtilsHelper $utils,
        PatientRepository $patientRepo,
        MasterRegistrationRepository $registrationRepo

    ) {
        $this->laporanOperasiRepo = $laporanOperasiRepo;
        $this->utils = $utils;
        $this->patientRepo = $patientRepo;
        $this->registrationRepo = $registrationRepo;
    }

    public function getDataLaporanOperasi($reg_no)
    {
        try {
            $data_laporan_operasi = $this->laporanOperasiRepo->getDataLaporanOperasi($reg_no);
            if (empty($data_laporan_operasi)) return $this->notFound("Data Laporan Operasi Tidak Ditemukan");
            return $this->responseData(200, 'OK', $data_laporan_operasi);
        } catch (\Throwable $th) {
            return $this->internalServerError($th->getMessage());
        }
    }

    public function storeRencanaPreOperasi($reg_no)
    {
        try {
            $operasi = request()->get('operasi');
            $data_pre_operasi = [
                'reg_no' => $reg_no,
                'alergi' => request()->get('alergi'),
                'catatan_alergi' => request()->get('catatan_alergi'),
                'pemeriksaan_fisik' => request()->get('pemeriksaan_fisik'),
                'diagnosa_pre_operasi' => request()->get('diagnosa_pre_operasi')
            ];
            $data_pre_operasi_tindakan = [];
            foreach ($operasi as $tindakan) {
                $data_pre_operasi_tindakan[] = [
                    'id' => $this->utils->generateUuid(),
                    'kode_tindakan' => $tindakan['kode'],
                    'reg_no' => $reg_no,
                    'persiapan_alat_khusus' => $tindakan['persiapan'],
                    'catatan_persiapan_alat_khusus' => $tindakan['catatan_persiapan']
                ];
            }
            $data_pre_operasi['operasi'] = $data_pre_operasi_tindakan;
            if ($this->laporanOperasiRepo->checkRencanaPreOperasiIsExist($reg_no))
                $res = $this->laporanOperasiRepo->updateRencanaPreOperasi($data_pre_operasi);
            else $res = $this->laporanOperasiRepo->storeRencanaPreOperasi($data_pre_operasi);
            return $this->responseData(200, 'OK', $res);
        } catch (\Throwable $th) {
            return $this->internalServerError($th->getMessage());
        }
    }

    private function getDataRequestRencanaOperasiTindakan()
    {
        return [
            'tanggal_operasi' => request()->get('tanggal_operasi'),
            'mulai_jam_operasi' => request()->get('mulai_jam_operasi'),
            'selesai_jam_operasi' => request()->get('selesai_jam_operasi'),
            'dokter_bedah' => request()->get('dokter_bedah'),
            'dokter_anastesi' => request()->get('dokter_anestesi'),
            'asisten_1' => request()->get('asisten_1'),
            'asisten_2' => request()->get('asisten_2'),
            'perawat_instrumen' => request()->get('perawat_instrumen'),
            'tipe_operasi' => request()->get('tipe_operasi'),
            'diagnosa_pasca_bedah' => request()->get('diagnosa_pasca_bedah'),
            'tipe_anestesi' => request()->get('tipe_anestesi'),
            'pengirim_spesimen_klinik_patologi' => request()->get('pengirim_spesimen_klinik_patologi'),
            'ket_spesimen_klinik_patologi' => request()->get('ket_spesimen_klinik_patologi'),
            'ket_spesimen_klinik_patologi_lainnya' => request()->get('ket_spesimen_klinik_patologi_lainnya'),
            'asal_spesimen' => request()->get('asal_spesimen'),
            'kultur' => request()->get('kultur'),
            'perkiraan_jumlah_pendarahan' => request()->get('perkiraan_jumlah_pendarahan'),
            'jumlah_transfusi_wb' => request()->get('transfusi_wb'),
            'jumlah_transfusi_ffp' => request()->get('transfusi_ffp'),
            'jumlah_transfusi_prc' => request()->get('transfusi_prc'),
            'jumlah_transfusi_cyro' => request()->get('transfusi_cyro'),
        ];
    }

    public function storeRencanaOperasiTindakan($reg_no)
    {
        try {
            $data_request = $this->getDataRequestRencanaOperasiTindakan();
            $data_request['reg_no'] = $reg_no;
            if (!$this->laporanOperasiRepo->checkRencanaLaporanOperasiTindakanIsExist($reg_no))
                $res = $this->laporanOperasiRepo->storeLaporanOperasiTindakan($data_request);
            else $res = $this->laporanOperasiRepo->updateLaporanOperasiTindakan($data_request);
            return $this->responseData(200, 'OK', request()->all());
        } catch (\Throwable $th) {
            return $this->internalServerError($th->getMessage());
        }
    }

    private function getDataRequestPenemuanKompilasi()
    {
        return [
            'catatan_prosedur' => request()->get('catatan_prosedur_penemuan_komplikasi'),
            'is_komplikasi' => request()->get('komplikasi'),
            'catatan_komplikasi' => request()->get('catatan_komplikasi'),
            'is_implant' => request()->get('implant'),
            'catatan_implant' => request()->get('catatan_implant'),
            'kode_dokter_operator' => request()->get('kode_dokter_operator'),
        ];
    }

    public function storeProsedurPenemuanKompilasi($reg_no)
    {
        try {
            $data_request = $this->getDataRequestPenemuanKompilasi();
            $data_request['reg_no'] = $reg_no;
            if (!$this->laporanOperasiRepo->checkPenemuanKompilasiIsExist($reg_no))
                $this->laporanOperasiRepo->storePenemuanKompilasiOperasi($data_request);
            else $this->laporanOperasiRepo->updatePenemuanKompilasiOperasi($data_request);
            return $this->responseData(200, 'OK', request()->all());
        } catch (\Throwable $th) {
            return $this->internalServerError($th->getMessage());
        }
    }

    private function getDataRencanaPascaOperasi()
    {
        return [
            'instruksi_rawat' => request()->get('instruksi_rawat'),
            'instruksi_posisi' => request()->get('instruksi_posisi'),
            'catatan_instruksi_posisi' => request()->get('catatan_instruksi_posisi'),
            'diet' => request()->get('diet'),
            'lama_hari_diet_total' => request()->get('lama_hari_diet_total'),
            'ket_boleh_diet' => request()->get('keterangan_boleh_diet'),
            'ket_setelah_diet' => request()->get('keterangan_setelah_diet'),
            'infus_sesuai_instruksi' => request()->get('infus_sesuai_instruksi_dokter_anestesi'),
            'infus_cairan' => request()->get('infus_cairan'),
            'infus_cairan_data' => request()->get('cairan_infus') ? json_encode(request()->get('cairan_infus')) : null,
            'pemberian_obat' => request()->get('instruksi_pemberian_obat'),
            'instruksi_pemberian_tranfusi' => request()->get('instruksi_pemberian_tranfusi'),
            'instruksi_drain' => request()->get('instruksi_drain'),
            'tampon' => request()->get('instruksi_tampon'),
            'tampon_letak' => request()->get('instruksi_tampon_letak'),
            'durasi_hari_tampon' => request()->get('durasi_hari_tampon'),
            'ngt' => request()->get('ngt'),
            'catatan_ngt' => request()->get('catatan_ngt'),
            'kateter_urin' => request()->get('kateter_urin'),
            'catatan_kateter_urin' => request()->get('catatan_kateter_urin'),
            'pemeriksaan_pasca_laboratorium' => request()->get('pemeriksaan_pasca_laboratorium'),
            'catatan_pemeriksaan_pasca_laboratorium' => request()->get('catatan_pemeriksaan_pasca_laboratorium'),
            'pemeriksaan_pasca_radiologi' => request()->get('pemeriksaan_pasca_radiologi'),
            'catatan_pemeriksaan_pasca_radiologi' => request()->get('catatan_pemeriksaan_pasca_radiologi'),
            'kebutuhan_terkait' => request()->get('kebutuhan_terkait'),
            'catatan_kebutuhan_terkait' => request()->get('catatan_kebutuhan_terkait'),
            'kode_dokter_operator' => request()->get('kode_dokter_operator'),
        ];
    }

    private function getDataDrain()
    {
        return request()->get('drain');
    }

    public function storeRencanaPascaOperasi($reg_no)
    {
        try {
            // return $this->responseData(200, 'OK', request()->all());
            $data_pasca_tindakan = $this->getDataRencanaPascaOperasi();
            $data_drain = $this->getDataDrain();
            $data_pasca_tindakan['reg_no'] = $reg_no;

            if (!$this->laporanOperasiRepo->checkLaporanPascaOperasiIsExist($reg_no))
                $this->laporanOperasiRepo->storeLaporanPascaOperasi($data_pasca_tindakan, $data_drain);
            else $this->laporanOperasiRepo->updateLaporanPascaOperasi($data_pasca_tindakan, $data_drain);
            return $this->responseData(200, 'OK', request()->all());
        } catch (\Throwable $th) {
            return $this->internalServerError($th->getMessage());
        }
    }

    public function output($reg_no)
    {
        $registration = $this->registrationRepo->findOneByRegNo($reg_no);
        $pasien = $this->patientRepo->findOneByMedrec($registration->reg_medrec);
        $data_laporan_operasi = $this->laporanOperasiRepo->getDataLaporanOperasi($reg_no);
        // dd($data_laporan_operasi);
        $context = [
            'reg_no' => $reg_no,
            'pasien' => $pasien,
            'laporan_operasi' => $data_laporan_operasi
        ];
        // dd($context);
        return view('new_dokter.laporan-operasi.components.output', $context);
    }
}
