<?php

namespace App\Http\Services\Ranap;

use App\Http\Services\TarifKamarService;
use App\Models\RegistrasiPJawab;
use App\Models\RegistrationInap;
use App\Repository\MasterBedRepository;
use App\Repository\MasterBusinessPartnerRepository;
use App\Repository\MasterRegistrationPasienPJ;
use App\Repository\MasterRuanganRepository;
use App\Repository\PatientRepository;
use App\Traits\Ranap\RanapRegistrationTrait;
use App\Utils\ConnectionDB;
use App\Utils\UtilsHelper;
use Illuminate\Support\Facades\DB;

class RegistrationRanapService
{
    use RanapRegistrationTrait;
    protected $utils, $db, $patientRepo, $businessPartnerRepo,
        $bedRepo, $roomRepo, $pasienPjRepo, $tarifKamarService;
    public function __construct(
        UtilsHelper $utilsHelper,
        ConnectionDB $connDb,
        PatientRepository $patientRepository,
        MasterBusinessPartnerRepository $masterBusinessPartnerRepository,
        MasterBedRepository $masterBedRepository,
        MasterRuanganRepository $masterRuanganRepository,
        MasterRegistrationPasienPJ $masterRegistrationPasienPJ,
        TarifKamarService $tarifKamarService
    ) {
        $this->db = $connDb;
        $this->utils = $utilsHelper;
        $this->bedRepo = $masterBedRepository;
        $this->roomRepo = $masterRuanganRepository;
        $this->patientRepo = $patientRepository;
        $this->pasienPjRepo = $masterRegistrationPasienPJ;
        $this->businessPartnerRepo = $masterBusinessPartnerRepository;
        $this->tarifKamarService = $tarifKamarService;
    }

    public function storeRegistrationRanap($request)
    {
        try {

            $pasien = DB::connection('mysql2')
                ->table('m_pasien')
                ->where(['MedicalNo' => $request->reg_medrec])
                ->first();


            if ($request->mrn_category === 'newborn') {
                $request->merge(['reg_medrec' => $this->generateMRN()]);
            }
            //update data pasien
            $paramspasien = array(
                'SSN' => $request->ssn,
                'PatientName' => $request->nama,
                // 'PatientCity' => $request->kota,
                // 'PatientProvince' => $request->provinsi,
                'PatientAddress' => $request->alamat,
                'GCBloodType' => $request->gol_darah,
                'BloodRhesus' => $request->rhesus,
                // 'GCNationality' => $request->kebangsaan,
                // 'GCRace' => $request->suku,
                'GCOccupation' => $request->pekerjaan,
                'GCReligion' => $request->agama,
                'MobilePhoneNo1' => $request->telepon_1,
                'CityOfBirth' => $request->tempat_lahir,
                'DateOfBirth' => $request->tanggal_lahir,
                'GCSex' => $request->jenis_kelamin,
                'GCMaritalStatus' => $request->status_nikah,
                'GCEducation' => $request->pendidikan,
                'PatientAddress' => $request->alamat,

            );


            if ($pasien) {
                // Update data pasien
                DB::connection('mysql2')
                    ->table('m_pasien')
                    ->where(['MedicalNo' => $request->reg_medrec])
                    ->update($paramspasien);
            } else {
                DB::connection('mysql2')
                    ->table('m_pasien')
                    ->insert(array_merge($paramspasien, ['MedicalNo' => $request->reg_medrec]));
            }
            $data_bed = DB::connection('mysql2')->table('m_bed')->where(['bed_id' => $request->bed_id])->first();

            $tgl_lahir = DB::connection('mysql2')->table('m_pasien')->where('MedicalNo', $request->reg_medrec)->first()->DateOfBirth;
            $date1 = date_create($tgl_lahir);
            $date2 = date_create(date('Y-m-d'));
            $diff = date_diff($date1, $date2);
            $tahun = $diff->y;
            $bulan = $diff->m;
            $hari = $diff->d;
            if ($tahun == 0 && $bulan == 0 && $hari <= 28) {
                $kategori = "A";
            } elseif ($tahun <= 17) {
                $kategori = "R";
            } else {
                $kategori = "D";
            }

            $registerNumber = RegistrationInap::generateCode();
            $registrasi['reg_no'] = $registerNumber;
            $registrasi['reg_tgl'] = date('Y-m-d');
            $registrasi['reg_jam'] = date('H:i:s');
            $registrasi['bed'] = $data_bed->bed_id;
            $registrasi['room_class'] = $data_bed->class_code;
            $registrasi['service_unit'] = $data_bed->service_unit_id;
            $registrasi['reg_cara_bayar'] = request()->reg_cara_bayar;
            $registrasi['reg_dokter'] = request()->reg_dokter;
            $registrasi['reg_no_dokumen'] = request()->reg_no_dokumen;
            $registrasi['reg_no_kartu'] = request()->reg_no_kartu;
            $registrasi['reg_sep_no'] = request()->reg_sep_no;
            $registrasi['departemen_asal'] = request()->departemen_asal;
            $registrasi['link_regis'] = request()->link_regis;
            $registrasi['reg_diagnosis'] = request()->reg_diagnosis;
            $registrasi['reg_medrec'] = request()->reg_medrec;
            $registrasi['reg_class'] = request()->reg_class;
            $registrasi['reg_pjawab'] = request()->reg_pjawab;
            $registrasi['reg_pjawab_nik'] = request()->reg_pjawab_nik;
            $registrasi['reg_pjawab_alamat'] = request()->reg_pjawab_alamat ?? '-';
            $registrasi['reg_pjawab_nohp'] = request()->reg_pjawab_nohp;
            $registrasi['reg_pjawab_hub'] = request()->reg_hub_pasien;
            $registrasi['reg_ketersidaan_kamar'] = request()->reg_ketersidaan_kamar;
            $registrasi['reg_info_kewajiban'] = request()->reg_info_hak_kewajiban;
            $registrasi['reg_info_general_consent'] = request()->reg_info_general_consent;
            $registrasi['reg_info_carabayar'] = request()->reg_info_carabayar;
            $registrasi['reg_cttn'] = request()->reg_cttn;
            $registrasi['charge_class_code'] = request()->charge_class_code ?? '-';
            $registrasi['kategori_pasien'] = request()->kategori_pasien;
            $registrasi['asal_rujukan'] = request()->asal_rujukan;
            $registrasi['kasus_polisi'] = request()->kasus_polisi;
            // $registrasi['reg_kategori'] = $kategori; // belum ada kolom kategori di database
            RegistrationInap::create($registrasi);

            //update data ruangan
            $paramruangan = array(
                'registration_no' => $registerNumber,
                'bed_status' => '0116^O'
            );
            $updateruangan = DB::connection('mysql2')
                ->table('m_bed')
                ->where(['bed_id' => $request->bed_id])
                ->update($paramruangan);

            //ADD PENANGGUNG JAWAB PASIEN
            $pj_pasien = request()->pj_pasien;

            foreach ($pj_pasien as $pj) {
                $pj['reg_no'] = $registerNumber;
                RegistrasiPJawab::create($pj);
            }

            //tambahkan ini juga karena akan menyimpan data pj pasien ke tabel nya anjay
            $pjawab_pasien = RegistrasiPJawab::where('reg_no', $this->parseRegNoByUnderScore($registerNumber))->get();

            $this->createBedHistoryFirstTime($registerNumber);
            $this->tarifKamarService->storeTarifKamar([
                'reg_no' => $registerNumber,
                'charge_class' => $registrasi['charge_class_code']
            ]);

            return redirect()->route('register.ranap.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function ringkasanMasukKeluarPasien($reg_no)
    {
        try {
            $data_registration = $this->db->connDbMaster()->table('m_registrasi')->where('reg_no', $reg_no)->first();
            $data_patient = $this->db->connDbMaster()->table('m_pasien')->where('MedicalNo', $data_registration->reg_medrec)->first();
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
                'patient_pj' => $this->pasienPjRepo->getPjPasien($reg_no),
                'diagnosa_utama' => $this->patientRepo->getPatientDiagnoseByRegistrationNumber($reg_no, 'utama'),
                'diagnosa_sekunder' => $this->patientRepo->getPatientDiagnoseByRegistrationNumber($reg_no, 'sekunder'),
                'diagnosa_klausa' => $this->patientRepo->getPatientDiagnoseByRegistrationNumber($reg_no, 'klausa'),
                'procedure' => $this->patientRepo->getPatientProcedure($reg_no),
                'discharge' => $this->patientRepo->getPatientDischarge($reg_no)
            ];
            // dd($context['registration'], $context['discharge']);
            // dd([$context['diagnosa_utama'], $context['diagnosa_sekunder'], $context['diagnosa_klausa'], $context['procedure']]);
            return view('register.pages.ranap.ringkasan-masuk-keluar', $context);
            // $payment_method = 
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return abort(500, $th->getMessage());
        }
    }

    private function generateMRN()
    {

        $latestMRN = DB::connection('mysql2')->table('m_pasien')->orderByDesc('MedicalNo')->first()->MedicalNo;
        $parts = explode('-', $latestMRN);
        $parts[3] = str_pad((int)$parts[3] + 1, 2, '0', STR_PAD_LEFT);
        $newMRN = implode('-', $parts);

        return $newMRN;
    }
}
