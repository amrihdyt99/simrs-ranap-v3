<?php

namespace App\Http\Services\Dokter;

use App\Repository\LaporanOperasiRepository;

class LaporanOperasiService
{
    protected $laporanOperasiRepo;
    public function __construct(LaporanOperasiRepository $laporanOperasiRepo)
    {
        $this->laporanOperasiRepo = $laporanOperasiRepo;
    }
}
