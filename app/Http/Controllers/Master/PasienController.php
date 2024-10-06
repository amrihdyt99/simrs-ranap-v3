<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Services\PatientService;
use App\Traits\Master\MasterPasienTrait;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    use MasterPasienTrait;
    protected $patienService;
    public function __construct(PatientService $patientService)
    {
        $this->patienService = $patientService;
    }

    public function visitHistoryPatient($medrec)
    {
        if (!auth()->user()) return redirect()->route('login');
        return $this->patienService->visitHistoryPatient($medrec);
    }

    public function visitHistory($medicalNo)
    {
        return $this->getDataVisitHistoryPatient($medicalNo);
    }
    public function webVisitHistory($medicalNo)
    {
        if (request()->ajax()) {
            $data = $this->getDataVisitHistoryPatient($medicalNo);
            return response()->view("register.pages.visit-pasien.table-visit", compact('data'));
        }
    }

    public function visitHistoryRanap($medrec)
    {
        if (request()->ajax()) return $this->patienService->dataTableVisitHistoryRanap($medrec);
        return $this->patienService->visitHistoryRanap($medrec);
    }

    public function visitHistoryRajal($medrec)
    {
        if (request()->ajax()) return $this->patienService->dataTableVisitHistoryRajal($medrec);
        return $this->patienService->visitHistoryRajal($medrec);
    }

    public function visitHistoryIGD($medrec)
    {
        if (request()->ajax()) return $this->patienService->dataTableVisitHistoryIGD($medrec);
        return $this->patienService->visitHistoryIGD($medrec);
    }
}
