<?php

namespace App\Repository;

use App\Utils\ConnectionDB;
use App\Utils\UtilsHelper;
use Illuminate\Support\Facades\DB;

class LaporanOperasiRepository
{
    protected $db, $utils, $masterPyschianRepository;
    public function __construct(
        ConnectionDB $conn,
        UtilsHelper $utils,
        MasterPyschianRepository $masterPyschianRepository
    ) {
        $this->db = $conn;
        $this->utils = $utils;
        $this->masterPyschianRepository = $masterPyschianRepository;
    }

    public function getDataLaporanOperasi($reg_no)
    {
        $assesment_awal = $this->db->connDbRanap()
            ->table('assesment_awal_dokter')
            ->where('no_reg', $reg_no)
            ->first();

        $pasien_prosedur = $this->db->connDbRanap()
            ->table('rs_pasien_prosedur')
            ->leftJoin('icd9cm_bpjs', 'rs_pasien_prosedur.pprosedur_prosedur', '=', 'icd9cm_bpjs.ID_TIND')
            ->leftJoin('lp_pre_operasi_tindakan', 'rs_pasien_prosedur.pprosedur_prosedur', '=', 'lp_pre_operasi_tindakan.kode_tindakan')
            ->where('pprosedur_reg', $reg_no)
            ->where('lp_pre_operasi_tindakan.reg_no', $reg_no)
            ->select(
                'rs_pasien_prosedur.*',
                'icd9cm_bpjs.NM_TINDAKAN as nama_tindakan',
                'lp_pre_operasi_tindakan.persiapan_alat_khusus',
                'lp_pre_operasi_tindakan.catatan_persiapan_alat_khusus'
            )
            ->get();

        $operasi_tindakan = $this->db->connDbRanap()
            ->table('lp_operasi_tindakan')
            ->where('reg_no', $reg_no)
            ->first();
        $penemuan_komplikasi = $this->getDataPenemuanKomplikasi($reg_no);
        $pasca_operasi = $this->getDataLaporanPascaOperasi($reg_no);
        $dokter_operator_penemuan_komplikasi = $this->masterPyschianRepository->findOneByCode($penemuan_komplikasi->kode_dokter_operator ?? '');
        $dokter_operator_pasca_operasi = $this->masterPyschianRepository->findOneByCode($pasca_operasi['pasca_operasi']->kode_dokter_operator ?? '');
        return [
            'assesment_awal' => $assesment_awal,
            'pasien_prosedur' => $pasien_prosedur,
            'rencana_pre_operasi' => $this->getDataRencanaPreOperasi($reg_no),
            'operasi_tindakan' => $operasi_tindakan,
            'penemuan_komplikasi' => $penemuan_komplikasi,
            'pasca_operasi' => $pasca_operasi,
            'dokter_operator_penemuan_komplikasi' => $dokter_operator_penemuan_komplikasi,
            'dokter_operator_pasca_operasi' => $dokter_operator_pasca_operasi
        ];
    }

    public function getDataRencanaPreOperasi($reg_no)
    {
        return $this->db->connDbRanap()->table('lp_pre_operasi')->where('reg_no', $reg_no)->first();
    }

    public function getDataPenemuanKomplikasi($reg_no)
    {
        return $this->db->connDbRanap()->table('lp_penemuan_komplikasi_operasi')->where('reg_no', $reg_no)->first();
    }

    public function getDataLaporanPascaOperasi($reg_no)
    {
        $pasca_operasi = $this->db->connDbRanap()->table('lp_pasca_operasi_tindakan')->where('reg_no', $reg_no)->first();
        $pasca_operasi_drain = $this->db->connDbRanap()->table('lp_pasca_operasi_tindakan_drain')->where('reg_no', $reg_no)->get();

        return [
            'data_pasca' => $pasca_operasi,
            'data_drain' => $pasca_operasi_drain
        ];
    }

    public function checkRencanaPreOperasiIsExist($reg_no)
    {
        return $this->db->connDbRanap()->table('lp_pre_operasi')->where('reg_no', $reg_no)->first();
    }

    public function checkRencanaLaporanOperasiTindakanIsExist($reg_no)
    {
        return $this->db->connDbRanap()->table('lp_operasi_tindakan')->where('reg_no', $reg_no)->exists();
    }

    public function storeRencanaPreOperasi($data)
    {
        $data['id'] = $this->utils->generateUuid();
        $data['created_at'] = now();
        $data['created_by'] = auth()->user()->name;
        try {
            DB::beginTransaction();
            $lp_pre_operasi = $this->db->connDbRanap()->table('lp_pre_operasi')->insert([
                'id' => $data['id'],
                'reg_no' => $data['reg_no'],
                'alergi' => $data['alergi'],
                'catatan_alergi' => $data['catatan_alergi'],
                'pemeriksaan_fisik' => $data['pemeriksaan_fisik'],
                'diagnosa_pre_operasi' => $data['diagnosa_pre_operasi'],
                'created_by' => auth()->user()->name
            ]);
            foreach ($data['operasi'] as $tindakan) {
                $data_pre_operasi_tindakan = [
                    'id' => $this->utils->generateUuid(),
                    'lp_pre_operasi_id' => $data['id'],
                    'reg_no' => $data['reg_no'],
                    'kode_tindakan' => $tindakan['kode_tindakan'],
                    'persiapan_alat_khusus' => $tindakan['persiapan_alat_khusus'],
                    'catatan_persiapan_alat_khusus' => $tindakan['catatan_persiapan_alat_khusus'],
                ];
                $lp_pre_operasi_tindakan = $this->db->connDbRanap()->table('lp_pre_operasi_tindakan')->insert($data_pre_operasi_tindakan);
            }
            DB::commit();
            return ['pre_operasi' => $lp_pre_operasi, 'pre_operasi_tindakan' => $lp_pre_operasi_tindakan];
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function updateRencanaPreOperasi($data)
    {
        try {
            DB::beginTransaction();
            $data_pre_operasi = $this->db->connDbRanap()->table('lp_pre_operasi')->where('reg_no', $data['reg_no'])->update([
                'alergi' => $data['alergi'],
                'catatan_alergi' => $data['catatan_alergi'],
                'pemeriksaan_fisik' => $data['pemeriksaan_fisik'],
                'diagnosa_pre_operasi' => $data['diagnosa_pre_operasi'],
                'updated_by' => auth()->user()->name,
                'updated_at' => now()
            ]);

            foreach ($data['operasi'] as $tindakan) {
                // update data tindakan
                $data_pre_operasi_tindakan = [
                    'persiapan_alat_khusus' => $tindakan['persiapan_alat_khusus'],
                    'catatan_persiapan_alat_khusus' => $tindakan['catatan_persiapan_alat_khusus'],
                    'updated_by' => auth()->user()->name,
                    'updated_at' => now()
                ];
                $lp_pre_operasi_tindakan = $this->db->connDbRanap()->table('lp_pre_operasi_tindakan')
                    ->where('reg_no', $data['reg_no'])
                    ->where('kode_tindakan', $tindakan['kode_tindakan'])
                    ->update($data_pre_operasi_tindakan);
            }
            DB::commit();
            return ['pre_operasi' => $data_pre_operasi, 'pre_operasi_tindakan' => $lp_pre_operasi_tindakan];
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function storeLaporanOperasiTindakan($data)
    {
        try {
            DB::beginTransaction();
            $data['id'] = $this->utils->generateUuid();
            $data['created_at'] = now();
            $data['created_by'] = auth()->user()->name;
            $lp_operasi_tindakan = $this->db->connDbRanap()->table('lp_operasi_tindakan')->insert($data);
            DB::commit();
            return $lp_operasi_tindakan;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function updateLaporanOperasiTindakan($data)
    {
        try {
            DB::beginTransaction();
            $data['updated_by'] = auth()->user()->name;
            $data['updated_at'] = now();
            $lp_operasi_tindakan = $this->db->connDbRanap()->table('lp_operasi_tindakan')
                ->where('reg_no', $data['reg_no'])
                ->update($data);
            DB::commit();
            return $lp_operasi_tindakan;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function storePenemuanKompilasiOperasi($data)
    {
        try {
            DB::beginTransaction();
            $data['id'] = $this->utils->generateUuid();
            $data['created_at'] = now();
            $data['created_by'] = auth()->user()->name;
            $lp_penemuan_kompilasi_operasi = $this->db->connDbRanap()->table('lp_penemuan_komplikasi_operasi')->insert($data);
            DB::commit();
            return $lp_penemuan_kompilasi_operasi;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function updatePenemuanKompilasiOperasi($data)
    {
        try {
            DB::beginTransaction();
            $data['updated_by'] = auth()->user()->name;
            $data['updated_at'] = now();
            $lp_penemuan_kompilasi_operasi = $this->db->connDbRanap()->table('lp_penemuan_komplikasi_operasi')
                ->where('reg_no', $data['reg_no'])
                ->update($data);
            DB::commit();
            return $lp_penemuan_kompilasi_operasi;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function checkPenemuanKompilasiIsExist($reg_no)
    {
        return $this->db->connDbRanap()->table('lp_penemuan_komplikasi_operasi')->where('reg_no', $reg_no)->exists();
    }

    public function storeLaporanPascaOperasi($data, $drain)
    {
        try {
            $data['id'] = $this->utils->generateUuid();
            $data['created_at'] = now();
            $data['created_by'] = auth()->user()->name;
            DB::beginTransaction();
            $lp_pasca_operasi_tindakan = $this->db->connDbRanap()->table('lp_pasca_operasi_tindakan')->insert($data);
            $lp_pasca_operasi_tindakan_drain = null;
            if (!empty($drain)) {
                foreach ($drain as $item) {
                    $data_drain['id'] = $this->utils->generateUuid();
                    $data_drain['lp_pasca_operasi_tindakan_id'] = $data['id'];
                    $data_drain['reg_no'] = $data['reg_no'];
                    $data_drain['jenis_drain'] = $item['jenis'];
                    $data_drain['letak_pemasangan'] = $item['letak_pemasangan'];
                    $data_drain['lama_pemasanngan'] = $item['lama_pemasangan'];
                    $data_drain['created_by'] = auth()->user()->name;
                    $data_drain['created_at'] = now();
                    $lp_pasca_operasi_tindakan_drain = $this->db->connDbRanap()->table('lp_pasca_operasi_tindakan_drain')->insert($data_drain);
                }
            }
            DB::commit();
            return ['pasca_operasi' => $lp_pasca_operasi_tindakan, 'pasca_operasi_drain' => $lp_pasca_operasi_tindakan_drain];
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function updateLaporanPascaOperasi($data, $drain)
    {
        try {
            DB::beginTransaction();
            $data['updated_by'] = auth()->user()->name;
            $data['updated_at'] = now();
            $lp_pasca_operasi_tindakan = $this->db->connDbRanap()->table('lp_pasca_operasi_tindakan')
                ->where('reg_no', $data['reg_no'])
                ->update($data);
            $lp_pasca_operasi_tindakan_drain = null;
            // delete all drain
            if (!empty($drain)) {
                $this->db->connDbRanap()->table('lp_pasca_operasi_tindakan_drain')->where('reg_no', $data['reg_no'])->delete();
                foreach ($drain as $item) {
                    $data_drain['jenis_drain'] = $item['jenis'];
                    $data_drain['letak_pemasangan'] = $item['letak_pemasangan'];
                    $data_drain['lama_pemasanngan'] = $item['lama_pemasangan'];
                    $data_drain['updated_by'] = auth()->user()->name;
                    $data_drain['updated_at'] = now();
                    $lp_pasca_operasi_tindakan_drain = $this->db->connDbRanap()->table('lp_pasca_operasi_tindakan_drain')
                        ->where('reg_no', $data['reg_no'])
                        ->update($data_drain);
                }
            }
            DB::commit();
            return ['pasca_operasi' => $lp_pasca_operasi_tindakan, 'pasca_operasi_drain' => $lp_pasca_operasi_tindakan_drain];
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function checkLaporanPascaOperasiIsExist($reg_no)
    {
        return $this->db->connDbRanap()->table('lp_pasca_operasi_tindakan')->where('reg_no', $reg_no)->exists();
    }
}
