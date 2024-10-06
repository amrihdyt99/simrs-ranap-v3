<?php

namespace App\Http\Services;

use App\Repository\PatientRepository;
use App\Traits\ResponseDataTraits;

class PatientService
{
    use ResponseDataTraits;
    protected $patientRepo;
    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepo = $patientRepository;
    }

    public function visitHistoryPatient($medrec)
    {
        $data_pasien = $this->patientRepo->findOneByMedrec($medrec);
        return view('register.pages.informasi-pasien.visit-history', compact('data_pasien'));
    }
    public function visitHistoryRanap($medrec)
    {
        try {
            if (!$this->patientRepo->findOneByMedrec($medrec))  return $this->notFound('Data pasien tidak ditemukan');
            return $this->responseData(200, 'OK', $this->patientRepo->visitHistoryRanap($medrec));
        } catch (\Throwable $th) {
            return $this->internalServerError($th->getMessage());
        }
    }

    public function visitHistoryRajal($medrec)
    {
        try {
            $data = $this->patientRepo->visitHistoryRajal($medrec);
            return $this->responseData(200, 'OK', $data);
        } catch (\Throwable $th) {
            return $this->internalServerError($th->getMessage());
        }
    }

    public function visitHistoryIGD($medrec)
    {
        try {
            $data = $this->patientRepo->visitHistoryIGD($medrec);
            return $this->responseData(200, 'OK', $data);
        } catch (\Throwable $th) {
            return $this->internalServerError($th->getMessage());
        }
    }

    public function dataTableVisitHistoryRanap($medrec)
    {
        try {
            $data = $this->patientRepo->visitHistoryRanap($medrec);
            return datatables()->of($data)
                ->editColumn('reg_tgl', function ($data) {
                    return date('d F Y', strtotime($data->reg_tgl));
                })
                ->make(true);
        } catch (\Throwable $th) {
            return $this->internalServerError($th->getMessage());
        }
    }

    public function dataTableVisitHistoryRajal($medrec)
    {
        try {
            $data = $this->patientRepo->visitHistoryRajal($medrec);
            return datatables()->of($data)
                ->editColumn('reg_date', function ($data) {
                    return date('d F Y', strtotime($data['reg_date']));
                })
                ->addColumn('reg_time', function ($data) {
                    return date('H:i', strtotime($data['reg_date']));
                })
                ->make(true);
        } catch (\Throwable $th) {
            return $this->internalServerError($th->getMessage());
        }
    }
    public function dataTableVisitHistoryIGD($medrec)
    {
        try {
            $data = $this->patientRepo->visitHistoryIGD($medrec);
            return datatables()->of($data)
                ->make(true);
        } catch (\Throwable $th) {
            return $this->internalServerError($th->getMessage());
        }
    }
}
