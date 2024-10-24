<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\PasienCPOEImaging;
use App\Models\PasienCPOELaboratory;
use App\Models\PasienSoapDok;
use App\Models\PasienSoaper;
use App\Models\RegistrationInap;
use App\Repository\LaporanOperasiRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SummaryController extends Controller
{

    protected $laporanOperasiRepo;
    public function __construct(LaporanOperasiRepository $laporanOperasiRepo)
    {
        $this->laporanOperasiRepo = $laporanOperasiRepo;
        if (!auth()->check()) return redirect()->route('login');
    }

    public function get_id_cppt($reg_no, $soapdok_dokter, $med_rec, $nama_ppa, $bed, $dpjp_utama)
    {
        $cek = DB::connection('mysql')->table('rs_pasien_cppt')->where('status_review', '99')->where('soapdok_reg', $reg_no)->where('soapdok_dokter', $soapdok_dokter)->first();
        if ($cek) {
            $kode = $cek->soapdok_id;
            return $kode;
        }
        $paramscppt = array(
            'dpjp_utama' => $dpjp_utama,
            'soapdok_reg' => $reg_no,
            'med_rec' => $med_rec,
            'status_review' => '99',
            'soapdok_dokter' => $soapdok_dokter,
            'nama_ppa' => $nama_ppa,
            'soapdok_bed' => $bed,
        );

        $simpancppt = DB::connection('mysql')
            ->table('rs_pasien_cppt')
            ->insert($paramscppt);

        $data = DB::connection('mysql')
            ->table('rs_pasien_cppt')
            ->where($paramscppt)->first();

        if ($simpancppt == true) {
            $kode = $data->soapdok_id;
            return $kode;
        }
    }
    public function summary(RegistrationInap $patient)
    {
        // $data['previous_episode'] = RegistrationInap::where('reg_medrec', $patient->reg_medrec)->get();
        // $data['cpoe_labor'] = PasienCPOELaboratory::where('reg_no', $patient->reg_no)->get();
        // $data['cpoe_imaging'] = PasienCPOEImaging::where('reg_no', $patient->reg_no)->get();
        // $data['soap_dok'] = PasienSoapDok::where('soapdok_reg', $patient->reg_no)->latest()->get();
        // $data['soap_per'] = PasienSoaper::where('soaper_reg', $patient->reg_no)->latest()->get();

        // $data['patient'] = $patient;

        $data = [];
        $reg = $patient->reg_no;
        $dataPasien = DB::connection('mysql2')
            ->table('m_registrasi as a')
            ->leftJoin('m_pasien as b', 'a.reg_medrec', '=', 'b.MedicalNo')
            ->where(['a.reg_no' => $reg])
            ->select([
                // 'a.*',
                // 'b.*',
                'MedicalNo',
                'GCSex',
                'PatientName',
                'DateOfBirth',

                'service_unit',
                'reg_no',
                'reg_medrec',
                'reg_tgl',
                'reg_dokter',
                'reg_discharge',
                'bed',
                'kategori_pasien',
                'reg_class',
            ])
            ->first();

        $dataPasien->discharge = DB::table('rs_pasien_discharge_open')->where('reg_no', $reg)->latest()->first();
        $dataPasien->currentLocation = getCurrentLocation($reg);
        $dataPasien->dpjpName = DB::connection('mysql2')
            ->table('m_paramedis')
            ->where('ParamedicCode', $dataPasien->reg_dokter)
            ->first()
            ->ParamedicName ?? '-';

        // return $dataPasien;

        $id_cppt = $this->get_id_cppt($dataPasien->reg_no, auth()->user()->dokter_id, $dataPasien->reg_medrec, auth()->user()->name, $dataPasien->bed, $dataPasien->reg_dokter);

        $icd9cm = DB::table('icd9cm_bpjs')->select('*')->limit(10)->get();
        $icd10 = DB::table('icd10_bpjs')->select('*')->limit(10)->get();
        // $diagnosa = DB::table(env('DB_DATABASE') . '.rs_pasien_diagnosa')
        //     ->leftJoin(env('DB_DATABASE2') . '.m_paramedis', env('DB_DATABASE') . '.rs_pasien_diagnosa.pdiag_dokter', '=', env('DB_DATABASE2') . '.m_paramedis.ParamedicCode')
        //     ->leftJoin(env('DB_DATABASE') . '.icd10_bpjs', env('DB_DATABASE') . '.icd10_bpjs.ID_ICD10', '=', env('DB_DATABASE') . '.rs_pasien_diagnosa.pdiag_diagnosa')
        //     ->where(['pdiag_reg' => $reg])
        //     ->get();

        // $prosedur = DB::table(env('DB_DATABASE') . '.rs_pasien_prosedur')
        //     ->leftJoin(env('DB_DATABASE2') . '.m_paramedis', env('DB_DATABASE') . '.rs_pasien_prosedur.pprosedur_dokter', '=', env('DB_DATABASE2') . '.m_paramedis.ParamedicCode')
        //     ->leftJoin(env('DB_DATABASE') . '.icd9cm_bpjs', env('DB_DATABASE') . '.icd9cm_bpjs.ID_TIND', '=', env('DB_DATABASE') . '.rs_pasien_prosedur.pprosedur_prosedur')
        //     ->where(['pprosedur_reg' => $reg])
        //     ->get();
        $diagnosa = null;
        $prosedur = null;
        $subs = substr($reg, 6, 20);
        $physician_team_role = DB::connection('mysql2')
            ->table('m_physician_team')
            ->where('reg_no', $patient->reg_no)
            ->where('kode_dokter', Auth::user()->dokter_id)
            ->pluck('kategori')
            ->toArray();

        $data['physician'] = DB::connection('mysql2')->table("m_paramedis")->where(['GCParamedicType' => "X0055^001"])->where('IsActive', 1)->get();
        $data['physician_team_role'] = $physician_team_role;
        $data_laporan_operasi = $this->laporanOperasiRepo->getDataLaporanOperasi($reg);
        $data_laporan_pasca_operasi = $this->laporanOperasiRepo->getDataLaporanPascaOperasi($reg);
        $data['assesment_awal_dokter'] = $data_laporan_operasi['assesment_awal'];
        $data['pasien_prosedur'] = $data_laporan_operasi['pasien_prosedur'];
        $data['rencana_pre_operasi'] = $data_laporan_operasi['rencana_pre_operasi'];
        $data['operasi_tindakan'] = $data_laporan_operasi['operasi_tindakan'];
        $data['penemuan_komplikasi'] = $data_laporan_operasi['penemuan_komplikasi'];
        $data['pasca_operasi'] = $data_laporan_pasca_operasi;

        // dd($data);

        return view('new_dokter.assesment', compact('data', 'reg', 'patient', 'dataPasien', 'icd9cm', 'icd10', 'diagnosa', 'prosedur', 'subs', 'id_cppt', 'physician_team_role'));
    }

    function summaryteam(RegistrationInap $patient)
    {
        $data = [];
        $reg = $patient->reg_no;
        $dataPasien = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->where(['m_registrasi.reg_no' => $reg])
            ->first();
        $icd9cm = DB::table('icd9cm_bpjs')->select('*')->limit(10)->get();
        $icd10 = DB::table('icd10_bpjs')->select('*')->limit(10)->get();
        $diagnosa = DB::table(env('DB_DATABASE') . '.rs_pasien_diagnosa')
            ->leftJoin(env('DB_DATABASE2') . '.m_paramedis', env('DB_DATABASE') . '.rs_pasien_diagnosa.pdiag_dokter', '=', env('DB_DATABASE2') . '.m_paramedis.ParamedicCode')
            ->leftJoin(env('DB_DATABASE') . '.icd10_bpjs', env('DB_DATABASE') . '.icd10_bpjs.ID_ICD10', '=', env('DB_DATABASE') . '.rs_pasien_diagnosa.pdiag_diagnosa')
            ->get();

        $prosedur = DB::table(env('DB_DATABASE') . '.rs_pasien_prosedur')
            ->leftJoin(env('DB_DATABASE2') . '.m_paramedis', env('DB_DATABASE') . '.rs_pasien_prosedur.pprosedur_dokter', '=', env('DB_DATABASE2') . '.m_paramedis.ParamedicCode')
            ->leftJoin(env('DB_DATABASE') . '.icd9cm_bpjs', env('DB_DATABASE') . '.icd9cm_bpjs.ID_TIND', '=', env('DB_DATABASE') . '.rs_pasien_prosedur.pprosedur_prosedur')
            ->get();
        $myarea = "area";
        return view('new_dokter.assesment', compact('data', 'reg', 'patient', 'dataPasien', 'icd9cm', 'icd10', 'diagnosa', 'prosedur', 'myarea'));
    }

    public function detail_pc_compare(RegistrationInap $patient)
    {
        $data['patient'] = $patient;
        $data['cpoe_labor'] = PasienCPOELaboratory::where('reg_no', $patient->reg_no)->get();
        $data['cpoe_imaging'] = PasienCPOEImaging::where('reg_no', $patient->reg_no)->get();
        $data['soap'] = PasienSoapDok::where('soapdok_reg', $patient->reg_no)->latest()->get();

        return view('dokter.pages.patient.detail-pc-compare', $data);
    }

    public function detail_prev_episode(RegistrationInap $patient)
    {
        $data['patient'] = $patient;
        $data['cpoe_labor'] = PasienCPOELaboratory::where('reg_no', $patient->reg_no)->get();
        $data['cpoe_imaging'] = PasienCPOEImaging::where('reg_no', $patient->reg_no)->get();
        $data['soap'] = PasienSoapDok::where('soapdok_reg', $patient->reg_no)->latest()->get();

        return view('dokter.pages.patient.detail-prev-episode', $data);
    }
}
