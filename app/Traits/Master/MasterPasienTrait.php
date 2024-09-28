<?php

namespace App\Traits\Master;

use App\Http\Controllers\IGD\IGDServices;
use App\Models\Pasien;
use App\Traits\HttpRequestTraits;
use Carbon\Carbon;
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


    public function getDataVisitHistoryPatient($medical_record_number)
    {
        $queryParams = request()->query();
        $page = $queryParams['page'] ?? 1;
        $limit = $queryParams['limit'] ?? 10;
        $offset = ($page - 1) * $limit;
        $start_date = $queryParams['start_date'] ?? Carbon::now()->subMonth()->format('Y-m-d');
        $end_date = $queryParams['end_date'] ?? Carbon::now()->format('Y-m-d');

        $data = DB::connection('mysql2')->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->where('reg_medrec', $medical_record_number)
            ->whereBetween('reg_tgl', [$start_date, $end_date]) // Added date filtering
            ->select(
                'm_registrasi.reg_no',
                'm_registrasi.reg_medrec',
                'm_registrasi.reg_lama',
                'm_registrasi.reg_tgl',
                'm_registrasi.reg_jam',
                'm_registrasi.departemen_asal as asal_pasien',
                // 'm_registrasi.reg_dokter',
                'm_paramedis.ParamedicName as dokter',
                'm_pasien.PatientName',
            )
            ->orderBy('reg_tgl', 'desc')
            // ->offset($offset) // Added pagination offset
            // ->limit($limit) // Added pagination limit
            ->get();

        $data_igd = [];
        if (!empty($data->reg_lama_igd)) $data_igd = $this->getDataIGDByMedrec($data->reg_medrec);
        // merge data igd to data
        $data = $data->merge($data_igd);
        return $data;
    }
    public function getDataIGDByMedrec($medrec)
    {
        try {
            $data = Http::get('https://rsud.sumselprov.go.id/simrs-rajal/api/igd/pendaftaran?medrec=' . $medrec);
            $data = json_decode($data->body(), true);
            return collect($data)->map(function ($item) {
                list(
                    $business_partner,
                    $room,
                    $reg_class,
                    $charge_class
                ) = [
                    $this->masterBusinessPartner->findOneById($item['ranap_business_partner']),
                    $this->masterRuangan->findOneByRoomID($item['ranap_room']),
                    $this->roomClass->findOne($item['ranap_class']),
                    $this->roomClass->findOne($item['ranap_charge_class']),
                ];

                return (object)[
                    'reg_medrec' => $item['reg_medrec'],
                    'reg_lama' => $item['original_reg'],
                    'ranap_class' => $reg_class->ClassName ?? '-',
                    'ranap_charge_class' => $charge_class->ClassName ?? '-',
                    'ranap_room' => $room->RoomName ?? '-',
                    'ranap_business_partner' => $business_partner->BusinessPartnerName ?? '-',
                    'ranap_diagnosa' => $item['original_indikasi'],
                    'reg_tgl' => Carbon::parse($this->getDateFromRegistrationNumber($item['ranap_reg']))->format('d-M-Y'),
                    'dokter' => $item['ranap_dpjp'],
                ];
            })->all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
