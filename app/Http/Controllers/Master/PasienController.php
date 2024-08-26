<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Traits\Master\MasterPasienTrait;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    use MasterPasienTrait;
    public function visitHistory($medicalNo)
    {
        return $this->getDataVisitHistoryPatient($medicalNo);
    }
    public function webVisitHistory() {}
}
