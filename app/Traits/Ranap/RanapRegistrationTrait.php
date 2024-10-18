<?php

namespace App\Traits\Ranap;

use App\Http\Services\TarifKamarService;
use App\Models\Bed;
use App\Models\ICD10;
use App\Models\KelasKategori;
use App\Models\Pasien;
use App\Models\RegistrasiPJawab;
use App\Models\RegistrationInap;
use App\Models\RoomClass;
use App\Models\ServiceRoom;
use App\Models\ServiceUnit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Milon\Barcode\DNS1D;
use Milon\Barcode\Facades\DNS1DFacade;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


trait RanapRegistrationTrait
{

    protected $tarifKamarService;
    public function getDataFormRegistration()
    {
        $data['service_unit'] = ServiceUnit::all();
        $data['service_room'] = ServiceRoom::all();
        // $data['room_class'] = RoomClass::where('isActive', 1)->select('ClassCode', 'ClassName', 'ClassCategoryCode')->get();
        $data['ruangan_baru'] = DB::connection('mysql2')
            ->table('m_ruangan_baru')
            ->get();
        $data['kelas_baru'] = DB::connection('mysql2')
            ->table('m_kelas_ruangan_baru')
            ->get();
        $data['physician'] = DB::connection('mysql2')->table("m_paramedis")->where(['GCParamedicType' => "X0055^001"])->where('IsActive', 1)->get();
        $data['bed'] = Bed::all();
        $data['icd10'] = ICD10::all();
        $data['cover_class'] = DB::connection('mysql2')->table('m_room_class')->where('IsDeleted', 0)->get();

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

        $data_registration = RegistrationInap::where('reg_no', $reg_no)->first();
        if ($data_registration->bed) $data_bed = DB::connection('mysql2')->table('m_bed')->where(['bed_id' => $data_registration->bed])->first();
        else $data_bed = DB::connection('mysql2')->table('m_bed')->where(['bed_id' => request()->bed_id])->first();
        $tgl_lahir = DB::connection('mysql2')->table('m_pasien')->where('MedicalNo', request()->reg_medrec)->first()->DateOfBirth;
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
        $registrasi['reg_lama'] = $data_registration->reg_lama ?? request()->link_regis;
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
        $this->updateRuangan($reg_no);
        $this->updatePasien();
    }

    /**
     * Get data patient origin from registration number
     * @param string $reg_no The registration number of the patient.
     * @return string The patient origin.
     */
    public function getDepartemenAsalPasien($reg_no)
    {
        if (!$reg_no) return null;
        $split_by_slash = explode("/", $reg_no);
        $departemen_asal = $split_by_slash[1];

        $asal = "";
        switch ($departemen_asal) {
            case 'RI':
                $asal = "Directly To The Inpatient";
                break;
            case 'RJ':
                $asal = "From Outpatient";
                break;
            case 'ER':
                $asal = "From Emergency";
                break;
            default:
                $asal = "-";
                break;
        }
        return $asal;
    }

    public function createBedHistoryFirstTime($reg_no)
    {
        $registration = RegistrationInap::where('reg_no', $reg_no)->first();
        $bedHistoryExist = DB::connection('mysql2')->table('m_bed_history')->where('RegNo', $reg_no)->first();
        $bed = DB::connection('mysql2')->table('m_bed')->where('bed_id', $registration->bed)->first();
        $serviceUnitRoom = DB::connection('mysql2')->table('m_service_unit_room')->where('RoomID', $bed->room_id)->first();
        if (!$bedHistoryExist) {
            $paramBedHistory = array(
                'RegNo' => $registration->reg_no,
                'MedicalNo' => $registration->reg_medrec,
                'HistoryRefCode' => $registration->reg_lama,
                'ToUnitServiceID' => $bed->service_unit_id ?? null,
                'ToBedID' => $registration->bed,
                'ToClassCode' => $registration->reg_class,
                'ToChargeClassCode' => $registration->charge_class_code,
                'CreatedBy' => auth()->user()->name,
                'ReceiveTransferDate' => now()->toDateString(),
                'ReceiveTransferTime' => now()->toTimeString(),
                'TableRef' => 'm_registrasi'
            );
            DB::connection('mysql2')->table('m_bed_history')->insert($paramBedHistory);
        }
    }

    public function getDataPersetujuanMedis($regno)
    {
        $datamypatient = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_room_class', 'm_registrasi.reg_class', '=', 'm_room_class.ClassCode')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->where('m_registrasi.reg_no', $this->parseRegNoByUnderScore($regno))
            ->select(
                'm_registrasi.reg_no',
                'm_pasien.MedicalNo as no_medrec',
                'm_pasien.PatientName as nama_lengkap',
                'm_pasien.DateOfBirth as tgl_lahir',
                'm_pasien.GCSex as jenis_kelamin',
                'm_paramedis.ParamedicName as reg_dokter',
                'm_registrasi.reg_tgl',
                'm_room_class.ClassName as room_class'
            )
            ->first();

        if ($datamypatient) {
            $penanggungJawab = DB::connection('mysql2')
                ->table('m_registrasi_pj')
                ->where('reg_no', $this->parseRegNoByUnderScore($regno))
                ->select(
                    'reg_pjawab_nama as familyname',
                    'reg_hub_pasien as gcrelationShip',
                    'reg_pjawab_alamat as keluarga_alamat',
                    'tanggal_lahir as tanggal_lahir_pj'
                )
                ->get();

            $datamypatient->penanggung_jawab = $penanggungJawab;

            foreach ($penanggungJawab as $pj) {
                if ($pj->tanggal_lahir_pj) {
                    $pj->umur_pj = Carbon::parse($pj->tanggal_lahir_pj)->age;
                }
            }

            $penanggungJawabList = DB::connection('mysql2')
                ->table('m_registrasi_pj')
                ->where('reg_no', $this->parseRegNoByUnderScore($regno))
                ->pluck('reg_pjawab_nama')
                ->toArray();

            if (empty($penanggungJawabList)) {
                $penanggungJawabList[] = $datamypatient->nama_lengkap;
            } elseif (!in_array($datamypatient->nama_lengkap, $penanggungJawabList)) {
                $penanggungJawabList[] = $datamypatient->nama_lengkap;
            }

            $datamypatient->penanggung_jawab_list = $penanggungJawabList;
            $user = auth()->user();
            $datamypatient->ttd_user = $user->signature;
            $datamypatient->nama_user = $user->name;

            // Check if data already exists in surat_persetujuan_medis
            $suratPersetujuanMedis = DB::connection('mysql2')
                ->table('surat_persetujuan_medis')
                ->where('reg_no', $this->parseRegNoByUnderScore($regno))
                ->first();

            if ($suratPersetujuanMedis) {
                $datamypatient->surat_persetujuan_medis = $suratPersetujuanMedis;
            }
        }

        return $datamypatient;
    }

    public function getDataSlipAdmisi($regno)
    {
        $datamypatient = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('m_ruangan_baru', 'm_registrasi.service_unit', '=', 'm_ruangan_baru.id')
            ->leftJoin('businesspartner', 'm_registrasi.reg_cara_bayar', '=', 'businesspartner.id')
            ->leftJoin('m_room_class', 'm_registrasi.reg_class', '=', 'm_room_class.ClassCode')
            ->leftJoin('m_registrasi_pj', 'm_registrasi.reg_no', '=', 'm_registrasi_pj.reg_no')
            ->where('m_registrasi.reg_no', $this->parseRegNoByUnderScore($regno))
            ->select(
                'm_registrasi.*',
                'm_pasien.*',
                'm_paramedis.ParamedicName',
                'm_paramedis.FeeAmount',
                'm_ruangan_baru.*',
                'businesspartner.BusinessPartnerName as reg_cara_bayar_name',
                'm_room_class.ClassName as reg_class_name'
            )
            ->first();

        if ($datamypatient) {
            $ranap_reg = $datamypatient->reg_lama;
            if ($ranap_reg) {
                $response = \Illuminate\Support\Facades\Http::get('http://rsud.sumselprov.go.id/simrs-rajal/api/rajal/pendaftaran/' . str_replace('/', '_', $ranap_reg));
                if ($response->successful()) {
                    $dataFromApi = $response->json();
                    if (!empty($dataFromApi)) {
                        $datamypatient->poli_asal = $dataFromApi['poli_asal'] ?? null;
                        $datamypatient->ranap_diagnosa = $dataFromApi['ranap_diagnosa'] ?? null;
                    } else {
                        $datamypatient->poli_asal = null;
                        $datamypatient->ranap_diagnosa = null;
                    }
                } else {
                    $datamypatient->poli_asal = null;
                    $datamypatient->ranap_diagnosa = null;
                }
            } else {
                $datamypatient->poli_asal = null;
                $datamypatient->ranap_diagnosa = null;
            }

            $penanggungJawab = DB::connection('mysql2')
                ->table('m_registrasi_pj')
                ->where('reg_no', $this->parseRegNoByUnderScore($regno))
                ->pluck('reg_pjawab_nama')
                ->toArray();

            if (empty($penanggungJawab)) {
                $penanggungJawab[] = $datamypatient->PatientName;
            } else {
                if (!in_array($datamypatient->PatientName, $penanggungJawab)) {
                    $penanggungJawab[] = $datamypatient->PatientName;
                }
            }

            $datamypatient->penanggung_jawab_list = $penanggungJawab;
        }

        $user = auth()->user();
        $data['datamypatient'] = $datamypatient;
        $data['datapasien'] = $datamypatient;
        $data['user_name'] = $user->name;
        $data['user_signature'] = $user->signature;
        $url_qr = route('agreement.admisi', $regno);
        $data['qrcode'] = QrCode::size(150)->generate($url_qr);
        return $data;
    }

    public function getDataGeneralConsent($regno)
    {
        $datamypatient = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('m_ruangan_baru', 'm_registrasi.service_unit', '=', 'm_ruangan_baru.id')
            ->leftJoin('m_kelas_ruangan_baru', 'm_registrasi.bed', '=', 'm_kelas_ruangan_baru.id')
            ->where('m_registrasi.reg_no', $this->parseRegNoByUnderScore($regno))
            ->select('m_registrasi.*', 'm_pasien.*', 'm_paramedis.ParamedicName', 'm_ruangan_baru.*', 'm_kelas_ruangan_baru.*')
            ->get()->first();

        $penanggungJawab = DB::connection('mysql2')
            ->table('m_registrasi_pj')
            ->where('reg_no', $this->parseRegNoByUnderScore($regno))
            ->pluck('reg_pjawab_nama')
            ->toArray();

        if (empty($penanggungJawab)) {
            $penanggungJawab[] = $datamypatient->PatientName;
        } else {
            if (!in_array($datamypatient->PatientName, $penanggungJawab)) {
                $penanggungJawab[] = $datamypatient->PatientName;
            }
        }

        $datamypatient->penanggung_jawab_list = $penanggungJawab;

        $pj_pasien = RegistrasiPJawab::where('reg_no', $this->parseRegNoByUnderScore($regno))->get();

        $data['datapasien'] = $datamypatient;
        $data['pj_pasien'] = $pj_pasien;
        $url_qr = route('agreement.general-consent', $regno);
        $data['qrcode'] = QrCode::size(150)->generate($url_qr);

        $user = auth()->user();
        $data['user_name'] = $user->name;
        $data['user_signature'] = $user->signature;

        return $data;
    }

    public function getDataSuratRawatIntensif($reg_no)
    {
        $data_pasien = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->where('m_registrasi.reg_no', $this->parseRegNoByUnderScore($reg_no))
            ->select(
                'm_pasien.PatientName as nama',
                'm_pasien.DateOfBirth as tanggal_lahir',
                'm_pasien.GCSex as jenis_kelamin',
                'm_pasien.PatientAddress as alamat',
                'm_pasien.MedicalNo as nomor_rm',
                'm_registrasi.reg_no as reg_no'
            )
            ->first();

        $penanggungJawab = DB::connection('mysql2')
            ->table('m_registrasi_pj')
            ->where('reg_no', $this->parseRegNoByUnderScore($reg_no))
            ->select(
                'reg_pjawab_nama as familyname',
                'jenis_kelamin as jenis_kelamin',
                'reg_pjawab_alamat as keluarga_alamat',
                'tanggal_lahir as tanggal_lahir_pj'
            )
            ->get();

        foreach ($penanggungJawab as $pj) {
            if ($pj->tanggal_lahir_pj) {
                $pj->umur_pj = Carbon::parse($pj->tanggal_lahir_pj)->age;
            }
        }

        $penanggungJawabList = $penanggungJawab->pluck('familyname')->toArray();

        if (empty($penanggungJawabList)) {
            $penanggungJawabList[] = $data_pasien->nama;
        } elseif (!in_array($data_pasien->nama, $penanggungJawabList)) {
            $penanggungJawabList[] = $data_pasien->nama;
        }

        $data_pasien->penanggung_jawab_list = $penanggungJawabList;
        $data_pasien->penanggung_jawab = $penanggungJawab;
        $url = route('agreement.rawat-intensif', $reg_no);
        $data_pasien->qrcode = QrCode::size(150)->generate($url);

        return $data_pasien;
    }

    private function formatUsia($dateOfBirth)
    {
        $date1 = new \DateTime($dateOfBirth);
        $date2 = new \DateTime();
        $diff = $date1->diff($date2);
        return "{$diff->y} Y {$diff->m} m {$diff->d} d";
    }
}
