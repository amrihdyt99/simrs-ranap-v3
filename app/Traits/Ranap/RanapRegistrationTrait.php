<?php

namespace App\Traits\Ranap;

use App\Models\Bed;
use App\Models\ICD10;
use App\Models\KelasKategori;
use App\Models\Pasien;
use App\Models\RegistrationInap;
use App\Models\RoomClass;
use App\Models\ServiceRoom;
use App\Models\ServiceUnit;
use Illuminate\Support\Facades\DB;

trait RanapRegistrationTrait
{

    public function getDataFormRegistration()
    {
        $data['service_unit'] = ServiceUnit::all();
        $data['service_room'] = ServiceRoom::all();
        $data['room_class'] = RoomClass::all();
        $data['ruangan_baru'] = DB::connection('mysql2')
            ->table('m_ruangan_baru')
            ->get();
        $data['kelas_baru'] = DB::connection('mysql2')
            ->table('m_kelas_ruangan_baru')
            ->get();
        $data['physician'] = DB::connection('mysql')->table("rs_m_paramedic")->where(['GCParamedicType' => "X0055^001"])->get();
        $data['bed'] = Bed::all();
        $data['icd10'] = ICD10::all();
        $data['cover_class'] = KelasKategori::all();

        return $data;
    }

    /**
     * Retrieves the registration data for a given registration number.
     * 
     * This method fetches the registration data for a patient based on their registration number.
     * It queries the database to retrieve the necessary information and returns it in a structured format.
     * 
     * @param string $reg_no The registration number of the patient.
     * @return mixed The registration data or null if not found.
     */
    public function getDataRegistrationRanap($reg_no)
    {
        $data_registrasi = RegistrationInap::where('reg_no', $reg_no)->first();
        return $data_registrasi;
    }

    public function parseRegNoByUnderScore($reg_no)
    {
        return str_replace("_", "/", $reg_no);
    }

    /**
     * Get the registration origin of a patient.
     * @param string $reg_lama The old registration number of the patient.
     */
    public function getRegistrationOrigin($reg_lama)
    {
        if (!$reg_lama) return "Directly To The Inpatient";
        $split_reg = explode("/", $reg_lama);
        $asal = $split_reg[1];
        if ($asal = "RJ") return "From Outpatient";
        else if ($asal = "IGD") return "From Emergency";
        else return "Directly To The Inpatient";
    }


    public function getParamPasien()
    {
        $paramspasien = array(
            'SSN' => request()->ssn,
            'PatientName' => request()->nama,
            // 'PatientCity' => request()->kota,
            // 'PatientProvince' => request()->provinsi,
            'PatientAddress' => request()->alamat,
            'GCBloodType' => request()->gol_darah,
            'BloodRhesus' => request()->rhesus,
            // 'GCNationality' => request()->kebangsaan,
            // 'GCRace' => request()->suku,
            'GCOccupation' => request()->pekerjaan,
            'GCReligion' => request()->agama,
            'MobilePhoneNo1' => request()->telepon_1,
            'CityOfBirth' => request()->tempat_lahir,
            'DateOfBirth' => request()->tanggal_lahir,
            'GCSex' => request()->jenis_kelamin,
            'GCMaritalStatus' => request()->status_nikah,
            'GCEducation' => request()->pendidikan,
            'PatientAddress' => request()->alamat,
        );
        return $paramspasien;
    }

    public function createNewPatient()
    {
        DB::beginTransaction();
        $paramspasien = $this->getParamPasien();
        $paramspasien['MedicalNo'] = request()->reg_medrec;
        DB::commit();
        try {
            Pasien::create($paramspasien);
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }

    public function updatePasien()
    {
        try {
            DB::beginTransaction();
            DB::connection('mysql2')
                ->table('m_pasien')
                ->where(['MedicalNo' => request()->reg_medrec])
                ->update($this->getParamPasien());
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }

    public function getDataPostRegistrationRanap($reg_no = "")
    {

        $data_bed = DB::connection('mysql2')->table('m_bed')->where(['bed_id' => request()->bed_id])->first();
        $tgl_lahir = DB::connection('mysql2')->table('m_pasien')->where('MedicalNo', request()->reg_medrec)->first()->DateOfBirth;
        $data_regisration = RegistrationInap::where('reg_no', $reg_no)->first();
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

        $registrasi['reg_no'] = $reg_no;
        $registrasi['reg_lama'] = $data_regisration->reg_lama;
        $registrasi['reg_tgl'] = date('Y-m-d');
        $registrasi['reg_jam'] = date('H:i:s');
        $registrasi['bed'] = $data_bed->bed_id;
        $registrasi['room_class'] = $data_bed->class_code;
        $registrasi['service_unit'] = $data_bed->service_unit_id;
        $registrasi['reg_cara_bayar'] = request()->reg_cara_bayar;
        $registrasi['reg_dokter'] = request()->reg_dokter;
        $registrasi['reg_no_dokumen'] = request()->reg_no_dokumen;
        $registrasi['departemen_asal'] = request()->departemen_asal;
        $registrasi['link_regis'] = request()->link_regis;
        $registrasi['reg_lama'] = request()->link_regis;
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

        return $registrasi;
    }

    public function updateRuangan($reg_no)
    {
        $paramruangan = array(
            'registration_no' => $reg_no,
            'bed_status' => '0116^O'
        );
        try {
            DB::beginTransaction();
            DB::connection('mysql2')
                ->table('m_bed')
                ->where(['bed_id' => request()->bed_id])
                ->update($paramruangan);
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }


    public function storeDataRegistration($data)
    {
        RegistrationInap::create($data);
    }

    public function updateDataRegistration($reg_no)
    {
        $data = $this->getDataPostRegistrationRanap($reg_no);
        RegistrationInap::where('reg_no', $reg_no)->update($data);
    }
}