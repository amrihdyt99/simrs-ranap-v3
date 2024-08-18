<?php

namespace App\Traits\Master;

use App\Models\Pasien;
use App\Traits\HttpRequestTraits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

trait MasterPasienTrait
{
    use HttpRequestTraits;

    /**
     * Get patient by medical record from database master_siti_fatimah on table m_pasien
     * @param string $medicalRecord
     * @return Patient
     */
    public function getPatientByMedicalRecord(string $medicalRecord)
    {
        return Pasien::where('MedicalNo', $medicalRecord)->first();
    }

    /**
     * Store patient by medical record from database master_siti_fatimah on table m_pasien
     * @param string $medicalRecord
     * @return void
     */
    public function storePatientByMedicalRecord(string $medicalRecord)
    {
        $api_url = 'http://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/patient/' . $medicalRecord;
        $response = $this->fetchApi($api_url);

        if (!$response || !$response['data']) return;
        $data = (object)$response['data'];
        try {
            DB::beginTransaction();
            $pasien = new Pasien();
            $pasien->MedicalNo = $data->MedicalNo;
            // $pasien->SiteCode = $data->SiteCode; // SiteCode is only 1 character long
            $pasien->SSN = $data->SSN;
            $pasien->Since = $data->Since;
            $pasien->FirstName = $data->FirstName;
            $pasien->MiddleName = $data->MiddleName;
            $pasien->LastName = $data->LastName;
            $pasien->PatientName = $data->PatientName;
            $pasien->PreferredName = $data->PreferredName;
            $pasien->PatientNameOnCard = $data->PatientNameOnCard;
            $pasien->CityOfBirth = $data->CityOfBirth;
            $pasien->DateOfBirth = $data->DateOfBirth;
            $pasien->IsApproximateDOB = $data->IsApproximateDOB;
            $pasien->GCSex = $data->GCSex;
            $pasien->GCBloodType = $data->GCBloodType;
            $pasien->BloodRhesus = $data->BloodRhesus;
            $pasien->GCEducation = $data->GCEducation;
            $pasien->GCMaritalStatus = $data->GCMaritalStatus;
            $pasien->GCNationality = $data->GCNationality;
            $pasien->GCRace = $data->GCRace;
            $pasien->SpokenLanguage = $data->SpokenLanguage;
            $pasien->WrittenLanguage = $data->WrittenLanguage;
            $pasien->GCOccupation = $data->GCOccupation;
            $pasien->Title = $data->Title;
            $pasien->Suffix = $data->Suffix;
            $pasien->GCPatientCategory = $data->GCPatientCategory;
            $pasien->GCDependentType = $data->GCDependentType;
            $pasien->GCReligion = $data->GCReligion;
            $pasien->Company = $data->Company;
            $pasien->MobilePhoneNo1 = $data->MobilePhoneNo1;
            $pasien->MobilePhoneNo2 = $data->MobilePhoneNo2;
            $pasien->OldMedicalNo = $data->OldMedicalNo;
            $pasien->Picture = $data->Picture;
            $pasien->PictureFileName = $data->PictureFileName;
            $pasien->IsBlackList = $data->IsBlackList;
            $pasien->BlackListBy = $data->BlackListBy;
            $pasien->BlackListDateTime = $data->BlackListDateTime;
            $pasien->BlackListNotes = $data->BlackListNotes;
            $pasien->IsAlive = $data->IsAlive;
            $pasien->DateOfDeath = $data->DateOfDeath;
            $pasien->LastVisitDate = $data->LastVisitDate;
            $pasien->NumberOfVisit = $data->NumberOfVisit;
            $pasien->Notes = $data->Notes;
            $pasien->RegistrationNoOfDeath = $data->RegistrationNoOfDeath;
            $pasien->BpjsCardNo = $data->BpjsCardNo;
            $pasien->IsPatientConfidential = $data->IsPatientConfidential;
            $pasien->IsActive = $data->IsActive;
            $pasien->IsDeleted = $data->IsDeleted;


            $pasien->save();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
            // dd($th);
        }
    }
}
