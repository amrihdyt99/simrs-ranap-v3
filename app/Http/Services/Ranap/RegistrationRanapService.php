<?php

namespace App\Http\Services\Ranap;

use App\Repository\MasterBedRepository;
use App\Repository\MasterBusinessPartnerRepository;
use App\Repository\MasterRuanganRepository;
use App\Repository\PatientRepository;
use App\Utils\ConnectionDB;
use App\Utils\UtilsHelper;

class RegistrationRanapService
{
    protected $utils, $db, $patientRepo, $businessPartnerRepo, $bedRepo, $roomRepo;
    public function __construct(
        UtilsHelper $utilsHelper,
        ConnectionDB $connDb,
        PatientRepository $patientRepository,
        MasterBusinessPartnerRepository $masterBusinessPartnerRepository,
        MasterBedRepository $masterBedRepository,
        MasterRuanganRepository $masterRuanganRepository
    ) {
        $this->db = $connDb;
        $this->utils = $utilsHelper;
        $this->bedRepo = $masterBedRepository;
        $this->roomRepo = $masterRuanganRepository;
        $this->patientRepo = $patientRepository;
        $this->businessPartnerRepo = $masterBusinessPartnerRepository;
    }
    public function ringkasanMasukKeluarPasien($reg_no)
    {
        try {
            $data_registration = $this->db->connDbMaster()->table('m_registrasi')
                ->where('reg_no', $reg_no)->first();
            $data_patient = $this->db->connDbMaster()->table('m_pasien')
                ->where('MedicalNo', $data_registration->reg_medrec)->first();
            $count_visit = $this->patientRepo->countVisitRanap($data_registration->reg_medrec);
            $data_payment = $this->businessPartnerRepo->findOneById($data_registration->reg_cara_bayar);
            $bed = $this->bedRepo->findOne($data_registration->bed);
            $room = $this->roomRepo->findOneByRoomID($bed->room_id);
            $context = [
                'registration' => $data_registration,
                'patient' => $data_patient,
                'count_visit' => $count_visit,
                'payment' => $data_payment,
                'bed' => $bed,
                'room' => $room,
                'origin_care_service' => $this->utils->getOriginCareService($data_registration->reg_lama),
                'patient_education' => $this->utils->parsePatientEducation($data_patient->GCEducation),
                'patient_marital_status' => $this->utils->parseMaritalStatus($data_patient->GCMaritalStatus),
                'patient_occupation' => $this->utils->parseOccupation($data_patient->GCOccupation),
            ];
            // dd($context);
            return view('register.pages.ranap.ringkasan-masuk-keluar', $context);
            // $payment_method = 
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return abort(500, $th->getMessage());
        }
    }
}
