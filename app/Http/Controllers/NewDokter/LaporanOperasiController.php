<?php

namespace App\Http\Controllers\NewDokter;

use App\Http\Controllers\Controller;
use App\Http\Services\Dokter\LaporanOperasiService;
use App\Traits\ResponseDataTraits;
use Illuminate\Http\Request;

class LaporanOperasiController extends Controller
{
    use ResponseDataTraits;
    protected $service;
    public function __construct(LaporanOperasiService $laporanOperasiService)
    {
        $this->service = $laporanOperasiService;
    }

    public function index($reg_no)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            return $this->internalServerError($th->getMessage());
        }
    }
}
