<?php

namespace App\Http\Controllers\Ranap;

use App\Http\Controllers\Controller;
use App\Traits\Ranap\RanapRegistrationTrait;
use Illuminate\Http\Request;

class AgreementController extends Controller
{
    use RanapRegistrationTrait;
    
    public function slipAdmisi($reg_no)
    {
        $data = $this->getDataSlipAdmisi($reg_no);
        return view('rekam_medis.slip_admisi', $data);
    }

    public function generalConsent($reg_no)
    {
        $data = $this->getDataGeneralConsent($reg_no);
        return view('document.general_consentbaru', $data);
    }

    public function rawatIntensif($reg_no)
    {
        $data_pasien = $this->getDataSuratRawatIntensif($reg_no);
        return view('register.pages.ranap.rawat-intensif', compact('data_pasien'));
    }

    public function persetujuanMedis($reg_no)
    {
        $data_pasien = $this->getDataPersetujuanMedis($reg_no);
        return view('register.pages.ranap.persetujuan-medis', compact('data_pasien'));
    }
}
