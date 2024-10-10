<?php

namespace App\Repository;

use App\Utils\ConnectionDB;
use App\Utils\UtilsHelper;
use Illuminate\Support\Facades\Http;

class PatientRepository
{
    protected $utils, $db, $roomClass, $businessPartnerRepo, $icd10, $icd9;
    public function __construct(
        ConnectionDB $connectioDb,
        RoomClassRepository $roomClassRepository,
        MasterBusinessPartnerRepository $masterBusinessPartnerRepository,
        UtilsHelper $utilsHelper,
        ICD10Repository $icd10Repository,
        ICD9Repository $icd9Repository
    ) {
        $this->db = $connectioDb;
        $this->roomClass = $roomClassRepository;
        $this->businessPartnerRepo = $masterBusinessPartnerRepository;
        $this->utils = $utilsHelper;
        $this->icd10 = $icd10Repository;
        $this->icd9 = $icd9Repository;
    }


    private function urlHistoryRajal($medrec)
    {
        $start_date = request()->query('start') ?? date('Y-m-d');
        $end_date = request()->query('end') ?? date('Y-m-d');
        return 'https://rsud.sumselprov.go.id/simrs-rajal/api/emr/registration/medicalHistory/' . $medrec . '?start=' . $start_date . '&end=' . $end_date;
    }

    private function urlHistoryIgd($medrec)
    {
        return 'https://rsud.sumselprov.go.id/simrs-rajal/api/igd/pendaftaran?medrec=' . $medrec;
    }

    public function findOneByMedrec($medrec)
    {
        try {
            return $this->db->connDbMaster()->table('m_pasien')
                ->where('MedicalNo', $medrec)
                ->first();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function visitHistoryRanap($medrec)
    {
        try {
            $start_date = request()->query('start');
            $end_date = request()->query('end');
            $limit = request()->query('limit') ?? 10;

            $data = $this->db->connDbMaster()->table('m_registrasi')
                ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
                ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
                ->leftJoin('m_bed', 'm_registrasi.bed', '=', 'm_bed.bed_id')
                ->leftJoin('m_ruangan', 'm_bed.room_id', '=', 'm_ruangan.RoomID')
                ->leftJoin('businesspartner', 'm_registrasi.reg_cara_bayar', '=', 'businesspartner.BusinessPartnerCode')
                ->leftJoin('m_room_class', 'm_registrasi.reg_class', '=', 'm_room_class.ClassCode')
                ->where('reg_medrec', $medrec)
                ->when($start_date, function ($query, $start_date) {
                    return $query->whereDate('reg_tgl', '>=', $start_date);
                })
                ->when($end_date, function ($query, $end_date) {
                    return $query->whereDate('reg_tgl', '<=', $end_date);
                })
                ->when($limit, function ($query, $limit) {
                    return $query->limit($limit);
                })
                ->select(
                    'm_registrasi.reg_no',
                    'm_registrasi.reg_medrec',
                    'm_registrasi.reg_lama',
                    'm_registrasi.reg_tgl',
                    'm_registrasi.reg_jam',
                    'm_registrasi.departemen_asal as asal_pasien',
                    'm_paramedis.ParamedicName as dokter',
                    'm_pasien.PatientName as nama_pasien',
                    'm_ruangan.RoomName as ruangan',
                    'businesspartner.BusinessPartnerName as cara_bayar',
                    'm_room_class.ClassName as kelas',
                )
                ->orderBy('reg_tgl', 'desc')
                ->get();
            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function visitHistoryRajal($medrec)
    {
        try {
            $data = Http::get($this->urlHistoryRajal($medrec));
            $data = json_decode($data->body(), true);
            if (isset($data['code'])) return [];
            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function visitHistoryIgd($medrec)
    {
        try {
            $data = Http::get($this->urlHistoryIgd($medrec));
            $data = json_decode($data->body(), true);
            $result = collect();
            foreach ($data as $item) {
                $room_class = $this->roomClass->findOne($item['original_class']);
                $charge_class = $this->roomClass->findOne($item['original_charge_class']);
                $business_partner = $this->businessPartnerRepo->findOneById($item['original_business_partner']);
                $result->push((object)[
                    'reg_medrec' => $item['reg_medrec'],
                    'nama_pasien' => $item['nama_pasien'],
                    'reg_no' => $item['original_reg'],
                    'poli' => $item['original_poli'],
                    'kelas' => $room_class->ClassName ?? '-',
                    'kelas_bayar' => $charge_class->ClassName ?? '-',
                    'dokter' => $item['original_dokter_poli'],
                    'tanggal' => $this->utils->dateFormatter($this->utils->getDateByRegistrationNumber($item['original_reg'])),
                    'cara_bayar' => $business_partner->BusinessPartnerName ?? '-',
                ]);
            }
            return $result;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function countVisitRanap($medrec)
    {
        try {
            return $this->db->connDbMaster()->table('m_registrasi')
                ->where('reg_medrec', $medrec)
                ->count();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Get patient diagnose by registration number and type
     * @param string $reg_no
     * @param string $type is one of 'utama', 'sekunder', 'klausa' and 'icdo'
     * @return mixed
     */
    public function getPatientDiagnoseByRegistrationNumber($reg_no, $type)
    {
        try {
            return $this->db->connDbRanap()->table('rs_pasien_diagnosa')
                ->leftJoin('icd10_bpjs', 'rs_pasien_diagnosa.pdiag_diagnosa', '=', 'icd10_bpjs.ID_ICD10')
                ->where('rs_pasien_diagnosa.pdiag_reg', $reg_no)
                ->where('pdiag_kategori', $type)
                ->where('pdiag_deleted', 0)
                ->select('icd10_bpjs.ID_ICD10 as code', 'icd10_bpjs.NM_ICD10 as name')
                ->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getPatientProcedure($reg_no)
    {
        try {
            return $this->db->connDbRanap()->table('rs_pasien_prosedur')
                ->leftJoin('icd9cm_bpjs', 'rs_pasien_prosedur.pprosedur_prosedur', '=', 'icd9cm_bpjs.ID_TIND')
                ->where('pprosedur_reg', $reg_no)
                ->where('pprosedur_deleted', 0)
                ->select('icd9cm_bpjs.ID_TIND as code', 'icd9cm_bpjs.NM_TINDAKAN as name')
                ->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getPatientDischarge($reg_no)
    {
        try {
            return $this->db->connDbRanap()->table('rs_pasien_discharge')->where('pdischarge_reg', $reg_no)->where('pdischarge_deleted', 0)->first();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
