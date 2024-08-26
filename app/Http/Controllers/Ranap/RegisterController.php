<?php

namespace App\Http\Controllers\Ranap;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\ICD10;
use App\Models\KelasKategori;
use App\Models\Paramedic;
use App\Models\Pasien;
use App\Models\RegistrationInap;
use App\Models\RoomClass;
use App\Models\ServiceRoom;
use App\Models\ServiceUnit;
use App\Traits\HttpRequestTraits;
use App\Traits\Master\MasterBedTraits;
use App\Traits\Master\MasterPasienTrait;
use App\Traits\Ranap\RanapRegistrationTrait;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RanapRegistrationTrait, MasterPasienTrait, HttpRequestTraits, MasterBedTraits;

    public function index(Request $request)
    {
        if ($request->ajax()) return $this->ajax_index($request);
        return view('register.pages.ranap.index');
    }

    public function lengkapiPendaftaran($reg_no)
    {
        $data = $this->getDataFormRegistration();
        $registration = $this->getDataRegistrationRanap($this->parseRegNoByUnderScore($reg_no));
        $data_bed = $this->getDataBedById($registration->bed ?? '');
        $pasien = $this->getPatientByMedicalRecord($registration->reg_medrec);
        $asal_pasien = $this->getRegistrationOrigin($registration->reg_lama);
        $context = [
            'pasien' => $pasien,
            'registration' => $registration,
            'asal_pasien' => $asal_pasien,
            'service_unit' => $data['service_unit'],
            'service_room' => $data['service_room'],
            'room_class' => $data['room_class'],
            'ruangan_baru' => $data['ruangan_baru'],
            'physician' => $data['physician'],
            'bed' => $data['bed'],
            'icd10' => $data['icd10'],
            'cover_class' => $data['cover_class'],
            'bed_name' => $data_bed ? $data_bed->bed_code . ' ' . $data_bed->ruang . ' ' . $data_bed->kelompok . ' ' . $data_bed->kelas : '-'
        ];
        //dd($context['registration']);
        return  view('register.pages.ranap.lengkapi_pendaftaran', $context);
    }

    public function ajax_index($request)
    {
        $business_partner = (object)$this->fetchApi('http://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/business')['data'] ?? [];
        $data = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('businesspartner', 'm_registrasi.reg_cara_bayar', '=', 'businesspartner.id')
            ->select([
                'm_registrasi.reg_tgl',
                'm_registrasi.reg_no',
                'm_registrasi.reg_medrec',
                'm_pasien.PatientName',
                'm_paramedis.ParamedicName',
                // 'businesspartner.BusinessPartnerName as reg_cara_bayar',
                'm_registrasi.reg_status',
                'm_registrasi.reg_cara_bayar',
            ])
            ->whereNull('reg_deleted')
            ->orderByDesc('reg_tgl');

        return DataTables()
            ->of($data)
            ->editColumn('aksi_data', function ($query) use ($request) {
                $query->reg_no = str_replace("/", "_", $query->reg_no);
                $btn_admisi = '<a href="'
                    . route('register.ranap.slipadmisi', ['reg_no' => $query->reg_no])
                    . '" class="btn btn-sm btn-outline-primary"><i class="mr-2 fa fa-print"></i>Admisi</a>';
                $btn_lengkapi_pendaftaran = '<a href="'
                    . route('register.ranap.lengkapi-pendaftaran', ['reg_no' => $query->reg_no])
                    . '" class="btn btn-sm btn-outline-primary ml-1" target="_blank"><i class="mr-2 fa fa-edit"></i>Lengkapi Pendaftaran</a>';
                return $btn_admisi . $btn_lengkapi_pendaftaran;
            })
            ->editColumn('dok_data', function ($query) use ($request) {
                $reg_no = $query->reg_no;
                $gc1Url = route('register.ranap.gc1', ['reg_no' => $reg_no]);
                $gc2Url = route('register.ranap.gc2', ['reg_no' => $reg_no]);

                return ('<a href="#" class="btn btn-sm btn-outline-primary" id="viewGcBtn-' . $reg_no . '"><i class="mr-2 fa fa-print"></i>General Consent</a>'
                    . '<script>
                document.getElementById("viewGcBtn-' . $reg_no . '").addEventListener("click", function(e) {
                    e.preventDefault();
                    Promise.all([
                        fetch("' . $gc1Url . '").then(response => response.text()),
                        fetch("' . $gc2Url . '").then(response => response.text())
                    ]).then(contents => {
                        const combinedContent = contents.join("<hr>");
                        const viewWindow = window.open("", "_blank");
                        viewWindow.document.write(combinedContent);
                        viewWindow.document.close();
                    }).catch(error => console.error("Error:", error));
                });
            </script>');
            })
            ->editColumn('status', function ($query) use ($request) {
                if ($query->reg_status == null) {
                    $reg = str_replace("/", "_", $query->reg_no);
                    return '<button onclick="hapus_pasien(' . "'$reg'" . ')" class="btn btn-sm btn-danger "><i class="fa fa-trash"></i> Batal</button>';
                } else {
                    return '<button class="btn btn-sm btn-warning">Dalam Perawatan</button>';
                }
            })
            ->editColumn('reg_cara_bayar', function ($query) use ($business_partner) {
                $partner = collect($business_partner)->firstWhere('BusinessPartnerID', $query->reg_cara_bayar);
                return $partner ? $partner['BusinessPartnerName'] : '-';
            })
            ->escapeColumns([])
            ->toJson();
    }


    public function batal_ranap($no)
    {
        $reg = str_replace("_", "/", $no);
        DB::connection('mysql2')->table('m_registrasi')->where('reg_no', $reg)->update([
            'reg_deleted' => '1',
            'reg_deleted_by' => Auth::user()->id
        ]);

        DB::connection('mysql2')->table('m_bed')->where('registration_no', $reg)->update([
            'registration_no' => null,
            'bed_status' => '0116^R',
            'last_updated_datetime' => now()
        ]);
        return response()->json(200);
    }

    public function index_old()
    {
        //$data['inap'] = RegistrationInap::all();
        $data['inap'] = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->orderByDesc('reg_tgl')
            ->get();
        return view('register.pages.ranap.index', $data);
    }

    public function formRegisterInap()
    {
        $data = $this->getDataFormRegistration();
        //return view('register.pages.baru.pilih_pasien',$data);
        return view('register.pages.ranap.create', $data);
    }

    public function newformRegisterInap()
    {
        $data = $this->getDataFormRegistration();
        //return view('register.pages.baru.pilih_pasien',$data);
        return view('register.pages.ranap.newpatient', $data);
    }

    public function simpanDataPasien(Request $request)
    {
        $paramspasien = array(
            'MedicalNo' => $request->reg_medrec,
            'SSN' => $request->ssn,
            'PatientCity' => $request->kota,
            'PatientProvince' => $request->provinsi,
            'PatientAddress' => $request->alamat,
            'GCBloodType' => $request->gol_darah,
            'BloodRhesus' => $request->rhesus,
            'GCNationality' => $request->kebangsaan,
            'GCRace' => $request->suku,
            'GCOccupation' => $request->pekerjaan,
            'GCReligion' => $request->agama,
            'MobilePhoneNo1' => $request->telepon_1,
            'MobilePhoneNo2' => $request->telepon_2,
            'CityOfBirth' => $request->tempat_lahir,
            'DateOfBirth' => $request->tanggal_lahir
        );

        //cek pasien
        $cekpasien = Pasien::where('MedicalNo', $request->reg_medrec)->first();
        if ($cekpasien) {
            //update
            $updatepasien = Pasien::where('MedicalNo', $request->reg_medrec)->update($paramspasien);
        } else {
            //insert
            $insertpasien = Pasien::create($paramspasien);
        }

        return response()->json(
            ['success' => true, 'message' => 'Data Pasien Berhasil Disimpan', 'data' => $paramspasien]
        );
    }

    public function generateMRN()
{
    // Ambil MRN tertinggi dari database
    $latestMRN = DB::connection('mysql2')->table('m_pasien')->orderByDesc('MedicalNo')->first()->MedicalNo;

    // Pisahkan MRN menjadi 4 bagian
    $parts = explode('-', $latestMRN);

    // Tambahkan 1 pada bagian terakhir
    $parts[3] = str_pad((int)$parts[3] + 1, 2, '0', STR_PAD_LEFT);

    // Gabungkan kembali menjadi format XX-XX-XX-XX
    $newMRN = implode('-', $parts);

    return $newMRN;
}

public function storeRegisterInap(Request $request)
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
            // Simpan pasien baru
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
        $registrasi['reg_cara_bayar'] = $request->reg_cara_bayar;
        $registrasi['reg_dokter'] = $request->reg_dokter;
        $registrasi['reg_no_dokumen'] = $request->reg_no_dokumen;
        $registrasi['departemen_asal'] = $request->departemen_asal;
        $registrasi['link_regis'] = $request->link_regis;
        $registrasi['reg_lama'] = $request->link_regis;
        $registrasi['reg_diagnosis'] = $request->reg_diagnosis;
        $registrasi['reg_medrec'] = $request->reg_medrec;
        $registrasi['reg_class'] = $request->reg_class;
        $registrasi['reg_pjawab_alamat'] = $request->reg_pjawab_alamat ?? '-';
        $registrasi['reg_pjawab_nohp'] = $request->reg_pjawab_nohp;
        $registrasi['reg_pjawab_hub'] = $request->reg_hub_pasien;
        $registrasi['reg_ketersidaan_kamar'] = $request->reg_ketersidaan_kamar;
        $registrasi['reg_info_kewajiban'] = $request->reg_info_hak_kewajiban;
        $registrasi['reg_info_general_consent'] = $request->reg_info_general_consent;
        $registrasi['reg_info_carabayar'] = $request->reg_info_carabayar;
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
        return redirect()->route('register.ranap.index');
    } catch (\Throwable $th) {
        throw $th;
    }
        }
    /*

    */
    //return $this->cetakRegistrasi($registerNumber);


    // public function storeRegisterInap(Request $request)
    // {
    //     try {
    //         //update data pasien
    //         $paramspasien = array(
    //             'SSN' => $request->ssn,
    //             'PatientName' => $request->nama,
    //             // 'PatientCity' => $request->kota,
    //             // 'PatientProvince' => $request->provinsi,
    //             'PatientAddress' => $request->alamat,
    //             'GCBloodType' => $request->gol_darah,
    //             'BloodRhesus' => $request->rhesus,
    //             // 'GCNationality' => $request->kebangsaan,
    //             // 'GCRace' => $request->suku,
    //             'GCOccupation' => $request->pekerjaan,
    //             'GCReligion' => $request->agama,
    //             'MobilePhoneNo1' => $request->telepon_1,
    //             'CityOfBirth' => $request->tempat_lahir,
    //             'DateOfBirth' => $request->tanggal_lahir,
    //             'GCSex' => $request->jenis_kelamin,
    //             'GCMaritalStatus' => $request->status_nikah,
    //             'GCEducation' => $request->pendidikan,
    //             'PatientAddress' => $request->alamat,

    //         );


    //         $updatepasien = DB::connection('mysql2')
    //             ->table('m_pasien')
    //             ->where(['MedicalNo' => $request->reg_medrec])
    //             ->update($paramspasien);
    //         $data_bed = DB::connection('mysql2')->table('m_bed')->where(['bed_id' => $request->bed_id])->first();

    //         $tgl_lahir = DB::connection('mysql2')->table('m_pasien')->where('MedicalNo', $request->reg_medrec)->first()->DateOfBirth;
    //         $date1 = date_create($tgl_lahir);
    //         $date2 = date_create(date('Y-m-d'));
    //         $diff = date_diff($date1, $date2);
    //         $tahun = $diff->y;
    //         $bulan = $diff->m;
    //         $hari = $diff->d;
    //         if ($tahun == 0 && $bulan == 0 && $hari <= 28) {
    //             $kategori = "A";
    //         } elseif ($tahun <= 17) {
    //             $kategori = "R";
    //         } else {
    //             $kategori = "D";
    //         }

    //         $registerNumber = RegistrationInap::generateCode();
    //         $registrasi['reg_no'] = $registerNumber;
    //         $registrasi['reg_tgl'] = date('Y-m-d');
    //         $registrasi['reg_jam'] = date('H:i:s');
    //         $registrasi['bed'] = $data_bed->bed_id;
    //         $registrasi['room_class'] = $data_bed->class_code;
    //         $registrasi['service_unit'] = $data_bed->service_unit_id;
    //         $registrasi['reg_cara_bayar'] = $request->reg_cara_bayar;
    //         $registrasi['reg_dokter'] = $request->reg_dokter;
    //         $registrasi['reg_no_dokumen'] = $request->reg_no_dokumen;
    //         $registrasi['departemen_asal'] = $request->departemen_asal;
    //         $registrasi['link_regis'] = $request->link_regis;
    //         $registrasi['reg_lama'] = $request->link_regis;
    //         $registrasi['reg_diagnosis'] = $request->reg_diagnosis;
    //         $registrasi['reg_medrec'] = $request->reg_medrec;
    //         $registrasi['reg_class'] = $request->reg_class;
    //         $registrasi['reg_pjawab_alamat'] = $request->reg_pjawab_alamat ?? '-';
    //         $registrasi['reg_pjawab_nohp'] = $request->reg_pjawab_nohp;
    //         $registrasi['reg_pjawab_hub'] = $request->reg_hub_pasien;
    //         $registrasi['reg_ketersidaan_kamar'] = $request->reg_ketersidaan_kamar;
    //         $registrasi['reg_info_kewajiban'] = $request->reg_info_hak_kewajiban;
    //         $registrasi['reg_info_general_consent'] = $request->reg_info_general_consent;
    //         $registrasi['reg_info_carabayar'] = $request->reg_info_carabayar;
    //         // $registrasi['reg_kategori'] = $kategori; // belum ada kolom kategori di database
    //         RegistrationInap::create($registrasi);

    //         //update data ruangan
    //         $paramruangan = array(
    //             'registration_no' => $registerNumber,
    //             'bed_status' => '0116^O'
    //         );
    //         $updateruangan = DB::connection('mysql2')
    //             ->table('m_bed')
    //             ->where(['bed_id' => $request->bed_id])
    //             ->update($paramruangan);
    //         return redirect()->route('register.ranap.index');
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }

    //     /*

    //     */
    //     //return $this->cetakRegistrasi($registerNumber);
    // }

    public function getPasien(Request $request)
    
    {
        $search = $request->query("search", "");
        $pasien = Pasien::where("MedicalNo", "like", "%$search%")
            ->orWhere("PatientName", "like", "%$search%")
            ->limit(100)
            ->get();
        return response()->json($pasien);
    }

    public function getICD10(Request $request)
    {
        $search = $request->query("search", "");
        $icd10 = ICD10::where("ID_ICD10", "like", "%$search%")
            ->orWhere("NM_ICD10", "like", "%$search%")
            ->limit(10)
            ->get();
        return response()->json($icd10);
    }

    public function getRegistrasiInap(Request $request)
    {
        $search = $request->query("search", "");
        $pasien = RegistrationInap::with(['pasien'])->whereHas('pasien', function ($q) use ($search) {
            $q->where("MedicalNo", "LIKE", "%$search%")->orWhere("PatientName", "LIKE", "%$search%");
        })
            ->get();
        return response()->json($pasien);
    }

    function cetakRegistrasi($regno)
    {
        $sql = "SELECT m_registrasi.*,m_paramedis.ParamedicName FROM m_registrasi LEFT JOIN m_paramedis ON
                m_registrasi.reg_dokter=m_paramedis.ParamedicCode WHERE
                m_registrasi.reg_no=?";
        $dataregister = DB::connection("mysql2")->select($sql, [$regno]);
        //var_dump($dataregister);
        $data['register'] = $dataregister;
        $pdf = Pdf::loadView('pdf', $data);
        $pdf->setPaper('latter', 'landscape');
        $pdf->setOption(['dpi' => 96]);
        //return $pdf->download('cetak.pdf');
        //return view('pdf',$data);
        return $pdf->stream();
    }

    function cetakSlipAdmisi($regno)
    {

        $datamypatient = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('m_ruangan_baru', 'm_registrasi.service_unit', '=', 'm_ruangan_baru.id')
            ->leftJoin('m_kelas_ruangan_baru', 'm_registrasi.bed', '=', 'm_kelas_ruangan_baru.id')
            ->where('m_registrasi.reg_no', $this->parseRegNoByUnderScore($regno))
            ->select('m_registrasi.*', 'm_pasien.*', 'm_paramedis.ParamedicName', 'm_paramedis.FeeAmount', 'm_ruangan_baru.*', 'm_kelas_ruangan_baru.*')
            ->get()->first();

        $data['datapasien'] = $datamypatient;

        // dd($data['datapasien']);
        return view('rekam_medis.slip_admisi', $data);
    }

    function cekTarifRuanganBaru(Request $request)
    {
        $data['kelas_baru'] = DB::connection('mysql2')
            ->table('m_kelas_ruangan_baru')
            ->where(['id' => $request->idruangan])
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }

    function gc1($regno)
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

        $data['datapasien'] = $datamypatient;
        return view('document.general_consentbaru', $data);
    }
    function gc2($regno)
    {
        $datamypatient = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('m_ruangan_baru', 'm_registrasi.service_unit', '=', 'm_ruangan_baru.id')
            ->leftJoin('m_kelas_ruangan_baru', 'm_registrasi.bed', '=', 'm_kelas_ruangan_baru.id')
            ->where(['m_registrasi.reg_no' => $this->parseRegNoByUnderScore($regno)])
            ->get()->first();

        $data['datapasien'] = $datamypatient;
        return view('document.general_consent_hal_2', $data);
    }

    function uploadTtdAdmisi(Request $request)
    {
        $regno = $request->reg_no;
        //$file=$request->file('signature');
        //$file->move(public_path('uploads/ttd_admisi'),$filename);
        //$data['ttd_admisi']='admisi_'.str_replace('/','_',$regno).'.png';
        $data['ttd_admisi'] = $request->signature;
        DB::connection('mysql2')->table('m_registrasi')->where(['reg_no' => $regno])->update($data);
        return redirect()->back();
    }
    function uploadGc2(Request $request)
    {
        $regno = $request->reg_no;
        //$file=$request->file('signature');
        //$file->move(public_path('uploads/ttd_admisi'),$filename);
        //$data['ttd_admisi']='admisi_'.str_replace('/','_',$regno).'.png';
        $data['ttd_gc_hal_dua'] = $request->signature;
        DB::connection('mysql2')->table('m_registrasi')->where(['reg_no' => $regno])->update($data);
        return redirect()->back();
    }

    function addPasienBaru(Request $request)
    {
        $params = array(
            'MedicalNo' => $request->medicalno,
            'PatientName' => $request->namapasien,
            'PatientCity' => "",
            'PatientProvince' => "",
            'PatientAddress' => "",
        );

        $cek = DB::connection('mysql2')->table('m_pasien')->where(['MedicalNo' => $request->medicalno])->get()->first();
        if ($cek) {
            return response()->json([
                'status' => false,
                'message' => 'Medical No Sudah Ada'
            ]);
        } else {
            DB::connection('mysql2')->table('m_pasien')->insert($params);
            return response()->json([
                'status' => true,
                'message' => 'Data Berhasil Disimpan'
            ]);
        }
    }

    //api untuk 
    function getRuangan()
    {
        $ruangan = DB::connection('mysql2')
            ->table('m_bed')
            ->join('m_ruangan', 'm_ruangan.RoomID', '=', 'm_bed.room_id')
            ->join('m_room_class', 'm_room_class.ClassCode', '=', 'm_bed.class_code')
            ->join('m_unit_departemen', 'm_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitCode')
            ->join('m_unit', 'm_unit_departemen.ServiceUnitCode', '=', 'm_unit.ServiceUnitCode')
            ->select('bed_id', 'bed_code', 'room_id', 'class_code', 'RoomName as ruang', 'ServiceUnitName as kelompok', 'm_room_class.ClassName as kelas')
            ->whereNull('registration_no')
            ->where(function ($query) {
                $query->where('is_active', 1)
                    ->orWhereNull('is_active'); // menambahkan kondisi manampilkan data jika NULL
            })
            ->where(function ($query) {
                $query->where('bed_status', 'ready') // menampilkan data dengan status ready
                    ->orWhere('bed_status', '0116^R'); // menampilkan jika status 0116^R
            })
            ->get();
        // dd($ruangan[1]);
        return response()->json([
            'data' => $ruangan
        ]);
    }

    function getRuanganRawat()
    {
        $ruangan = DB::connection('mysql2')
            ->table('m_bed')
            ->join('m_ruangan', 'm_ruangan.RoomID', '=', 'm_bed.room_id')
            ->join('m_unit_departemen', 'm_unit_departemen.ServiceUnitCode', '=', 'm_bed.service_unit_id')
            ->join('m_unit', 'm_unit_departemen.ServiceUnitCode', '=', 'm_unit.ServiceUnitCode')
            ->select('m_bed.service_unit_id', 'ServiceUnitName as kelompok')
            ->where(function ($query) {
                $query->where('is_active', 1)
                    ->orWhereNull('is_active');
            })
            ->distinct()->get();
        return response()->json([
            'data' => $ruangan
        ]);
    }

    function getBussinessPartner()
    {
        // $data = DB::connection('mysql')
        //     ->table('businesspartner')
        //     ->get();

        $data = $this->url_api('http://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/business');
        return response()->json([
            'data' => $data ? $data['data'] : []
        ]);
    }

    function getNoDocument(Request $request)
    {
        $idbussines = $request->id_bussines;
        $data = $this->url_api('http://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/contract/' . $idbussines);

        return response()->json([
            'data' => $data ? $data['data'] : []
        ]);
    }

    function url_api($url)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $r = curl_exec($curl);

        curl_close($curl);
        $arr = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $r), true);
        return $arr;
    }

    function getProvinsi()
    {
        $data = $this->url_api('http://rsud.sumselprov.go.id/simrs-rajal/api/master/provinsi');

        return response()->json([
            'data' => $data
        ]);
    }

    function getRegency(Request $request)
    {
        $idprovinsi = $request->id_provinsi;
        $data = $this->url_api('http://rsud.sumselprov.go.id/simrs-rajal/api/master/kota/' . $idprovinsi);

        return response()->json([
            'data' => $data
        ]);
    }

    function getDistricts(Request $request)
    {
        $idkabupaten = $request->id_kota;
        $data = $this->url_api('http://rsud.sumselprov.go.id/simrs-rajal/api/master/kecamatan/' . $idkabupaten);

        return response()->json([
            'data' => $data
        ]);
    }

    function getVillages(Request $request)
    {
        $idkecamatan = $request->id_kecamatan;
        $data = $this->url_api('http://rsud.sumselprov.go.id/simrs-rajal/api/master/kelurahan/' . $idkecamatan);

        return response()->json([
            'data' => $data
        ]);
    }

    public function get_data_sphaira()
    {
        $now = date('Y-m-d');
        $dat = DB::connection('sqlsrv_sphaira')->table('registration')
            ->whereDate('RegistrationDateTime', $now)
            ->where('RegistrationNo', 'like', 'QREG/RI%')
            ->get();

        if ($dat) {
            $data = [];
            foreach ($dat as $a) {
                $strtotime = strtotime($a->RegistrationDateTime);
                $arr['reg_no'] = $a->RegistrationNo;
                $arr['medrec'] = $a->MedicalNo;
                $arr['reg_tgl'] = date('Y-m-d', $strtotime);
                $arr['reg_jam'] = date('H:i:s', $strtotime);
                $arr['service unit'] = $a->ServiceUnitID;
                $arr['dokter'] = $a->ParamedicID;
                $arr['ruangan'] =  $a->RoomID;
                $arr['bed'] = $a->BedID;
                $arr['no_dokumen'] = $a->CustomerDocumentNo;
                $arr['departemen_asal'] = $a->CustomerDocumentNo;
                $arr['link_regis'] = $a->LinkRegistrationNo;
                $arr['kelas_kategori'] = $a->LinkRegistrationNo;
                $arr['cover_class'] = $a->CoveredClassCode;
                array_push($data, $arr);
            }
            $json['code'] = 200;
            $json['msg'] = 'Ok';
            $json['data'] = $data;
        } else {
            $json['code'] = 201;
            $json['msg'] = 'Tidak ada pasien';
            $json['data'] = null;
        }

        return response()->json($json, $json['code']);
    }

    public function storeLengkapiPendaftaran()
    {
        try {
            $pasien = $this->getPatientByMedicalRecord(request()->reg_medrec);
            if (!$pasien) $this->createNewPatient();
            else $this->updatePasien();
            DB::beginTransaction();
            $this->updateDataRegistration(request()->reg_no);
            // dd($param_pasien);
            DB::commit();

            return redirect()->route('register.ranap.index');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            //dd($th->getMessage());
            abort(500, $th->getMessage());
        }
    }


    public function viewVClaimManual(Request $request)
    {

        if ($request->ajax()) {
            $business_partner = (object)$this->fetchApi('http://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/business')['data'] ?? [];
            $data = DB::connection('mysql2')
                ->table('m_pasien_vclaim')
                ->join('m_registrasi', 'm_registrasi.reg_no', '=', 'm_pasien_vclaim.reg_no')
                ->join('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
                ->select(
                    'm_pasien.PatientName',
                    'm_pasien_vclaim.*',
                )->get();

            return DataTables()
                ->of($data)
                ->editColumn('business_partner', function ($query) use ($business_partner) {
                    $partner = collect($business_partner)->firstWhere('BusinessPartnerID', $query->business_partner_id);
                    return $partner ? $partner['BusinessPartnerName'] : '-';
                })
                ->escapeColumns([])
                ->toJson();
        }

        return  view('register.pages.ranap.vclaim');
    }

    public function viewFormVClaimManual()
    {
        return  view('register.pages.ranap.vclaim_form');
    }

    public function storeVClaim(Request $request)
    {
        DB::beginTransaction();
        try {

            $validator = Validator::make($request->all(), [
                'business_partner_id' => 'required',
                'reg_no' => 'required',
                'card_no' => 'required',
                'sep_no' => 'required',
            ]);


            if ($validator->passes()) {

                $check_reg = DB::connection('mysql2')->table('m_pasien_vclaim')->where('reg_no', $request->reg_no)->count();
                if ($check_reg) {
                    return response()->json([
                        'status' => 'false',
                        'message' => 'Nomor registrasi telah dipakai',
                    ]);
                }

                $vclaim = array(
                    'business_partner_id' => $request->business_partner_id,
                    'reg_no' => $request->reg_no,
                    'card_no' => $request->card_no,
                    'sep_no' => $request->sep_no,
                );


                DB::connection('mysql2')->table('m_pasien_vclaim')->insert($vclaim);

                DB::commit();
                $response = response()->json([
                    'status' => 'success',
                    'message' => 'Data berhasil disimpan',
                ]);
            } else {
                abort(402, json_encode($validator->errors()->all()));
            }
            return $response;
        } catch (\Throwable $throw) {
            //throw $th;
            DB::rollBack();
            //dd($th->getMessage());
            abort(500, $throw->getMessage());
        }
    }

}
    public function getVisitHistory($medicalNo)
    {
        return $this->getDataVisitHistoryPatient($medicalNo);
    }
}