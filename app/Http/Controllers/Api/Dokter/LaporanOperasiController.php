<?php

namespace App\Http\Controllers\Api\Dokter;

use App\Http\Controllers\Controller;
use App\Http\Services\Dokter\LaporanOperasiService;
use Illuminate\Http\Request;

class LaporanOperasiController extends Controller
{
    protected $laporanOperasiService;
    public function __construct(LaporanOperasiService $laporanOperasiService)
    {
        $this->laporanOperasiService = $laporanOperasiService;
    }

    public function index($reg_no)
    {
        return $this->laporanOperasiService->getDataLaporanOperasi($reg_no);
    }

    public function storeRencanaPreOperasi($reg_no)
    {
        return $this->laporanOperasiService->storeRencanaPreOperasi($reg_no);
    }

    public function storeRencanaOperasiTindakan($reg_no)
    {
        return $this->laporanOperasiService->storeRencanaOperasiTindakan($reg_no);
    }

    public function storeProsedurPenemuanKompilasi($reg_no)
    {
        return $this->laporanOperasiService->storeProsedurPenemuanKompilasi($reg_no);
    }

    public function storeRencanaPascaOperasi($reg_no)
    {
        return $this->laporanOperasiService->storeRencanaPascaOperasi($reg_no);
    }

    public function output($reg_no)
    {
        return $this->laporanOperasiService->output($reg_no);
    }
}
