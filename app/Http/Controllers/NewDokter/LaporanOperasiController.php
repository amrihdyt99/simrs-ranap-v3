<?php

namespace App\Http\Controllers\NewDokter;

use App\Http\Controllers\Controller;
use App\Http\Services\Dokter\LaporanOperasiService;
use Illuminate\Http\Request;

class LaporanOperasiController extends Controller
{
    protected $service;
    public function __construct(LaporanOperasiService $laporanOperasiService)
    {
        $this->service = $laporanOperasiService;
    }

    public function index() {}
}
