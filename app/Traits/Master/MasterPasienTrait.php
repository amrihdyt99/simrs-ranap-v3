<?php

namespace App\Traits\Master;

use App\Models\Pasien;

trait MasterPasienTrait
{

    /**
     * Get patient by medical record from database master_siti_fatimah on table m_pasien
     * @param string $medicalRecord
     * @return Patient
     */
    public function getPatientByMedicalRecord(string $medicalRecord)
    {
        return Pasien::where('MedicalNo', $medicalRecord)->first();
    }
}
