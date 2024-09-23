<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use App\Models\FluidBalance;
use App\Models\FluidBalanceData;
use App\Models\Medicine;
use App\Models\Paramedic;
use App\Models\PasienPemberianObat;
use App\Models\PasienSoaper;
use App\Models\RegistrationInap;
use App\Models\Gejala;
use App\Models\VitalSign;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NursingController extends Controller
{
    public function nursing($reg_no)
    {
        $registrationInap = RegistrationInap::find($reg_no);
        $transfusi = FluidBalance::with(['fluid_balance_data' => function ($q) {
            $q->whereDate("created_at", Carbon::now()->toDateString());
        }])->where(['reg_no' => $reg_no, 'intake' => "transfusi"])->get();
        $makan = FluidBalance::with(['fluid_balance_data' => function ($q) {
            $q->whereDate("created_at", Carbon::now()->toDateString());
        }])->where(['reg_no' => $reg_no, 'intake' => "makan"])->get();
        $parental = FluidBalance::with(['fluid_balance_data' => function ($q) {
            $q->whereDate("created_at", Carbon::now()->toDateString());
        }])->where(['reg_no' => $reg_no, 'intake' => "parental"])->get();
        $output = FluidBalance::with(['fluid_balance_data' => function ($q) {
            $q->whereDate("created_at", Carbon::now()->toDateString());
        }])->where(['reg_no' => $reg_no, 'intake' => "output"])->get();
        $fluid_balance = FluidBalance::with(['fluid_balance_data' => function ($q) {
            $q->whereDate("created_at", Carbon::now()->toDateString());
        }])->where(['reg_no' => $reg_no, 'intake' => "fluid_balance"])->get();
        //ambil data dari vitalsign kemudian kirim melalui array
        $vitaldata = VitalSign::where('reg_no', $reg_no)->get();
        $gejaladata = Gejala::all();
        $dokter = Paramedic::all();
        $obat = PasienPemberianObat::where('reg_no', $reg_no)->get();
        //        $soap = PasienSoaper::where('reg_no',$reg_no)->latest()->first();
        //var_dump($vitalsigndata[0]['kategori']);
        /*return view('perawat.pages.patient.nursing',['registrationInap'=>$registrationInap,'vitaldata'=>$vitalsigndata,
            'gejaladata'=>$gejaladata,'dokter'=>$dokter]);*/
        //var_dump($obat);
        return view('perawat.pages.patient.nursing', compact("registrationInap", "transfusi", "makan", "parental", "output", "fluid_balance", "gejaladata", "vitaldata", "dokter", "obat"));
    }

    public function add_fluid_balance(Request $request)
    {
        FluidBalance::create([
            "reg_no" => $request->reg_no,
            "intake" => $request->intake,
            "jenis" => $request->jenis,
        ]);

        return redirect()->route('perawat.patient.nursing', ['reg_no' => $request->reg_no]);
    }

    public function add_fluid_balance_data(Request $request)
    {
        $fluid_balance = FluidBalance::find($request->fluid_balance_id);
        $fluid_balance_data = $fluid_balance->fluid_balance_data()->whereDate('created_at', Carbon::now()->toDateString())->first();
        if (!empty($fluid_balance_data)) {
            $fluid_balance_data->data = $request->data;
            $fluid_balance_data->save();
        } else {
            FluidBalanceData::create([
                'fluid_balance_id' => $request->fluid_balance_id,
                'data' => $request->data,
            ]);
        }
    }

    public function addVitalSign(Request $request)
    {
        $dateTimeNow = Carbon::now();
        $sql = "SELECT * FROM vital_sign WHERE id_pasien=? AND tanggal=?";
        if ($request->kategori == "blood pressure") {
            $params = array(
                'reg_no' => $request->reg_no,
                'kategori' => $request->kategori,
                'tanggal_pemberian' => $dateTimeNow->toDateTimeString(),
                'data' => $request->data1 . "/" . $request->data2
            );
        } else if ($request->kategori == "GCS") {
            $valuedata = "{E:" . $request->data_e . ",V:" . $request->data_v . ",M:" . $request->data_m . "}";
            $params = array(
                'reg_no' => $request->reg_no,
                'kategori' => $request->kategori,
                'tanggal_pemberian' => $dateTimeNow->toDateTimeString(),
                'data' => $valuedata
            );
        } else {
            $params = array(
                'reg_no' => $request->reg_no,
                'kategori' => $request->kategori,
                'tanggal_pemberian' => $dateTimeNow->toDateTimeString(),
                'data' => $request->data
            );
        }

        //$dataVitalSign = DB::select($sql,[$patient->reg_no,$dateTimeNow->toDateTimeString()]);
        //var_dump($request);
        /*$params=array(
            'weight'=>$request->weight,
            'blood_pressure'=>$request->blood_pressure,
            'height'=>$request->height,
            'temperature'=>$request->temperature,
            'pulse'=>$request->pulse,
            'respiration_rate'=>$request->respiration_rate,
            'gcs'=>$request->gcs,
            'refleks_pupil'=>$request->refleks_pupil,
            'spo2'=>$request->spo2,
            'map'=>$request->map,
            'diameter_pupil'=>$request->diameter_pupil,
            'first_day_lmp'=>$request->first_day_lmp,
            'paint_level'=>$request->paint_level,
            'gambaran_ekg'=>$request->gambaran_ekg,
            'crown_rump'=>$request->crown_rump,
            'gestational_sac'=>$request->gestational_sac,
            'yolc_sac'=>$request->yolc_sac,
            'biparietal'=>$request->biparietal,
            'head_circumference'=>$request->head_circumference,
            'femur_length'=>$request->femur_length,
            'abdominal_circumference'=>$request->abdominal_circumference,
            'estimated_fetal_weght'=>$request->estimated_fetal_weght,
            'amniotic_fluid'=>$request->amniotic_fluid,
            'follicle'=>$request->follicle,
            'cua'=>$request->cua,
            'cvp'=>$request->cvp,
            'endomentrium_thickness'=>$request->endomentrium_thickness,
            'uterus_length'=>$request->uterus_length,
            'uterus_hight'=>$request->uterus_hight,
            'uterus_width'=>$request->uterus_width,
            'ovary_length'=>$request->ovary_length,
            'ovary_height'=>$request->ovary_height,
            'ovary_width'=>$request->ovary_width,
            'left_ovarial'=>$request->left_ovarial,
            'left_ovarium_height'=>$request->left_ovarium_height,
            'left_ovarium_length'=>$request->left_ovarium_length,
            'left_ovarium_volume'=>$request->left_ovarium_volume,
            'left_ovarium_width'=>$request->left_ovarium_width,
            'right_ovarial_cyst'=>$request->right_ovarial_cyst,
            'right_ovarium_height'=>$request->right_ovarium_height,
            'right_ovarium_length'=>$request->right_ovarium_length,
            'right_ovarium_volume'=>$request->right_ovarium_volume,
            'right_ovarium_width'=>$request->right_ovarium_width,
            'cervix_length'=>$request->cervix_length,
            'cervix_height'=>$request->cervix_height,
            'occiputofrontal'=>$request->occiputofrontal,
            'hermus_length'=>$request->hermus_length,
            'duration_per_contraction'=>$request->duration_per_contraction,
            'number_of_contratction'=>$request->number_of_contratction,
            'fetus_hearth'=>$request->fetus_hearth,
            'swan_ganz'=>$request->swan_ganz,
            'id_pasien'=>$request->reg_no,
            'tanggal'=>$dateTimeNow->toDateTimeString()
            );*/



        VitalSign::create($params);

        return redirect()->route('perawat.patient.nursing', ['reg_no' => $request->reg_no]);
        //$data['registrationInap'] = RegistrationInap::find($reg_no);
        //$data['obat'] = PasienPemberianObat::where('reg_no', $reg_no)->get();
        //return view('perawat.pages.patient.nursing', $data);
    }

    public function create_drugs($reg_no)
    {
        $data['registrationInap'] = RegistrationInap::find($reg_no);
        $data['physician'] = Paramedic::all();
        $data['obat'] = Medicine::all();
        return view('perawat.pages.drugs.create', $data);
    }

    public function store_drugs(Request $request)
    {
        $patient = $request->reg_no;
        $valData = $request->validate([
            'dosis' => ['required'],
            'frekuensi' => ['required'],
            'reg_no' => '',
            'kode_obat' => '',
            'cara_pemberian' => '',
            'antibiotik' => '',
            'kode_dokter' => '',
            'verifikasi_nurse' => '',
            //            'tgl_pemberian' => '',
            //            'tipe_jam' => ''
        ]);
        $valData['nama_dokter'] = $request->nama_dokter;
        $valData['nama_obat'] = $request->kode_obat;
        // $rentang_jam = $request->rentang_jam??[];
        // $tipe_jam = $request->tipe_jam??[];
        // $i=0;
        // //var_dump($tipe_jam);
        // foreach ($rentang_jam as $row) {
        //     $nama_kolom_tanggal='tgl_pemberian_'.$i;
        //     $kolom_rentang_jam='rentang_jam_'.$i;
        //     $valData[$kolom_rentang_jam] = $row;
        //     $valData[$nama_kolom_tanggal]=date('Y-m-d');
        //     $i=$i+1;
        // }
        // $j=0;
        // foreach ($tipe_jam as $row2){
        //     $kolom_jam='tipe_jam_'.$j;
        //     $valData[$kolom_jam] = $row2;
        //     $j=$j+1;
        // }
        $data_perjam = $request->data_perjam ?? [];
        $form_pemberian_obat_display = [
            0 => '00',
            1 => '01',
            2 => '02',
            3 => '03',
            4 => '04',
            5 => '05',
            6 => '06',
            7 => '07',
            8 => '08',
            9 => '09',
            10 => '10',
            11 => '11',
            12 => '12',
            13 => '13',
            14 => '14',
            15 => '15',
            16 => '16',
            17 => '17',
            18 => '18',
            19 => '19',
            20 => '20',
            21 => '21',
            22 => '22',
            23 => '23',
        ];
        foreach ($form_pemberian_obat_display as $data_perjam_key => $data_perjam_value) {
            $valData['tgl_pemberian_' . $data_perjam_key] = $request->tgl_pemberian;
            $valData['rentang_jam_' . $data_perjam_key] = null;
            $valData['tipe_jam_' . $data_perjam_key] = null;

            if (array_key_exists($data_perjam_key, $data_perjam)) {
                if (array_key_exists('rentang_jam', $data_perjam[$data_perjam_key])) {
                    if ($data_perjam[$data_perjam_key]['rentang_jam'] !== null) {
                        if (array_key_exists($data_perjam_key, $data_perjam)) {
                            if (array_key_exists('rentang_jam', $data_perjam[$data_perjam_key])) {
                                $valData['rentang_jam_' . $data_perjam_key] = $data_perjam[$data_perjam_key]['rentang_jam'];
                            }
                        }
                        if (array_key_exists($data_perjam_key, $data_perjam)) {
                            if (array_key_exists('tipe_jam', $data_perjam[$data_perjam_key])) {
                                $valData['tipe_jam_' . $data_perjam_key] = $data_perjam[$data_perjam_key]['tipe_jam'];
                            }
                        }
                    }
                }
            }
        }


        $valData['is_deleted'] = $request->is_deleted ?? 0;
        PasienPemberianObat::create($valData);
        return redirect()->route('perawat.patient.summary', ['reg_no' => $request->reg_no]);
    }

    public function update_drugs($id)
    {

        // $data['drugs']=DB::select("SELECT * FROM rs_pasien_pemberian_obat WHERE id=?",[$reg_no]);
        // $data['obatdaridokter']=DB::connection('mysql')
        //     ->table('job_orders_dt')
        //     ->where([
        //         ['reg_no','=',$reg_no],
        //         ['jenis_order','LIKE', 'obat%']
        //     ])->get();
        // $data['datamypatient']=DB::connection('mysql2')
        // ->table('m_registrasi')
        // ->leftJoin('m_pasien','m_registrasi.reg_medrec','=','m_pasien.MedicalNo')
        // ->leftJoin('m_paramedis','m_registrasi.reg_dokter','=','m_paramedis.ParamedicCode')
        // ->leftJoin('m_ruangan_baru','m_registrasi.service_unit','=','m_ruangan_baru.id')
        // ->leftJoin('m_kelas_ruangan_baru','m_registrasi.bed','=','m_kelas_ruangan_baru.id')
        // ->get();
        //$data['registrationInap'] = RegistrationInap::find($reg_no);
        //$data['physician'] = Paramedic::all();
        // $data['obat'] = Medicine::all();
        //var_dump($data);

        $data_detail_pemberian_obat = DB::table("rs_pasien_pemberian_obat")
            ->where('id', $id)
            ->first();
        if (!$data_detail_pemberian_obat) {
            return abort(404);
        }

        $obatdaridokter = DB::connection('mysql')
            ->table('job_orders_dt')
            ->where([
                ['reg_no', '=', $data_detail_pemberian_obat->reg_no],
                ['jenis_order', 'LIKE', 'obat%']
            ])->get();

        $context = [
            'data_detail_pemberian_obat' => $data_detail_pemberian_obat,
            'obatdaridokter' => $obatdaridokter,
            'reg_no' => $data_detail_pemberian_obat->reg_no,
            'data_id' => $data_detail_pemberian_obat->id,
        ];
        return view('perawat.pages.drugs.edit', $context);
    }

    public function ubah_drugs(Request $request)
    {

        $id = $request->id;
        $reg_no = $request->input('reg_no');
        $valData = $request->validate([
            'dosis' => '',
            'frekuensi' => '',
            'reg_no' => '',
            'kode_obat' => '',
            'cara_pemberian' => '',
            'antibiotik' => '',
            'kode_dokter' => '',
            'verifikasi_nurse' => '',
            //            'tgl_pemberian' => '',
            //            'tipe_jam' => ''
        ]);
        // $rentang_jam = $request->input('rentang_jam');
        // $tipe_jam = $request->input('tipe_jam');
        // $i=0;
        // //var_dump($tipe_jam);
        // foreach ($rentang_jam as $row) {
        //     $nama_kolom_tanggal='tgl_pemberian_'.$i;
        //     $kolom_rentang_jam='rentang_jam_'.$i;
        //     $valData[$kolom_rentang_jam] = $row;
        //     $valData[$nama_kolom_tanggal]=date('Y-m-d');
        //     $i=$i+1;
        // }
        // $j=0;
        // foreach ($tipe_jam as $row2){
        //     $kolom_jam='tipe_jam_'.$j;
        //     $valData[$kolom_jam] = $row2;
        //     $j=$j+1;
        // }

        $data_perjam = $request->data_perjam ?? [];
        // dd($data_perjam);
        $form_pemberian_obat_display = [
            0 => '00',
            1 => '01',
            2 => '02',
            3 => '03',
            4 => '04',
            5 => '05',
            6 => '06',
            7 => '07',
            8 => '08',
            9 => '09',
            10 => '10',
            11 => '11',
            12 => '12',
            13 => '13',
            14 => '14',
            15 => '15',
            16 => '16',
            17 => '17',
            18 => '18',
            19 => '19',
            20 => '20',
            21 => '21',
            22 => '22',
            23 => '23',
        ];
        foreach ($form_pemberian_obat_display as $data_perjam_key => $data_perjam_value) {
            // dd($data_perjam_value);
            $valData['tgl_pemberian_' . $data_perjam_key] = $request->tgl_pemberian;
            $valData['rentang_jam_' . $data_perjam_key] = null;
            $valData['tipe_jam_' . $data_perjam_key] = null;

            if (array_key_exists($data_perjam_key, $data_perjam)) {
                if (array_key_exists('rentang_jam', $data_perjam[$data_perjam_key])) {
                    if ($data_perjam[$data_perjam_key]['rentang_jam'] !== null) {
                        if (array_key_exists($data_perjam_key, $data_perjam)) {
                            if (array_key_exists('rentang_jam', $data_perjam[$data_perjam_key])) {
                                $valData['rentang_jam_' . $data_perjam_key] = $data_perjam[$data_perjam_key]['rentang_jam'];
                            }
                        }
                        if (array_key_exists($data_perjam_key, $data_perjam)) {
                            if (array_key_exists('tipe_jam', $data_perjam[$data_perjam_key])) {
                                $valData['tipe_jam_' . $data_perjam_key] = $data_perjam[$data_perjam_key]['tipe_jam'];
                            }
                        }
                    }
                }
            }
        }
        $valData['is_deleted'] = $request->is_deleted ?? 0;
        //var_dump($valData);
        DB::table("rs_pasien_pemberian_obat")
            ->where("id", $id)
            ->update($valData);
        // return redirect()->route('perawat.patient.nursing', $patient);
        return redirect()->route('perawat.patient.summary-v2', [$reg_no])
            ->with('success_message', 'Data pemberian obat di nursing berhasil di ubah.');
    }

    // NEW
    public function data_pengkajian_dewasa(Request $request)
    {
        try {
            $data = DB::table('rs_ranap.pengkajian_awal_pasien_perawat')
                ->leftjoin('rs_ranap.assesment_awal_dokter', 'rs_ranap.pengkajian_awal_pasien_perawat.reg_no', 'no_reg')
                ->leftjoin('rs_ranap.skrining_gizi', 'rs_ranap.pengkajian_awal_pasien_perawat.reg_no', 'rs_ranap.skrining_gizi.reg_no')
                ->leftjoin('rs_ranap.skrining_nyeri', 'rs_ranap.pengkajian_awal_pasien_perawat.reg_no', 'rs_ranap.skrining_nyeri.reg_no')
                ->join('rs_ranap.rs_m_pasien', 'rs_ranap.pengkajian_awal_pasien_perawat.reg_medrec', 'MedicalNo')
                ->join('rs_ranap_master.m_registrasi as db2', 'rs_ranap.pengkajian_awal_pasien_perawat.reg_no', 'db2.reg_no')
                ->join('rs_ranap_master.m_ruangan as db3', 'reg_ruangan', 'db3.RoomID')
                ->where('rs_ranap.pengkajian_awal_pasien_perawat.reg_no', $request->reg)
                ->select([
                    'pengkajian_awal_pasien_perawat.*',
                    'assesment_awal_dokter.*',
                    'skrining_gizi.ketegori',
                    'PatientName',
                    'merasakan_nyeri',
                    'durasi',
                    'frekuensi',
                    'pencetus_nyeri',
                    'kapan_terjadi_nyeri',
                    'tipe_nyeri',
                    'ekspresi_wajah',
                    'bps_wajah',
                    'bps_ekstremitas_atas',
                    'bps_compleance_atas',
                    'MedicalNo',
                    'GCSex',
                    'DateOfBirth',
                    'reg_tgl',
                    'reg_jam',
                    'RoomName'
                ])
                ->first();

            return response()->json($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function data_assesment_dewasa(Request $request)
    {
        try {
            $data = DB::table('assesment_dewasa')->where('asdew_reg', $request->reg)->latest()->first();

            return response()->json($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function data_transfer_internal(Request $request)
    {
        try {
            $data = DB::connection('mysql')->table('transfer_internal')->where('transfer_reg', $request->reg)->latest()->first();

            return response()->json($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function data_pra_tindakan(Request $request)
    {
        try {
            $data = DB::connection('mysql')->table('keperawatan_pra_tindakan')->where('pra_reg', $request->reg)->latest()->first();

            return response()->json($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function data_cathlab(Request $request)
    {
        try {
            $data = DB::connection('mysql')->table('cathlab')->where('cathlab_reg', $request->reg)->latest()->first();

            return response()->json($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function data_assesment_gizi(Request $request)
    {
        try {
            $data['assesment'] = DB::table('assesment_gizi_dewasa')->where('dewasa_reg', $request->reg)->latest()->first();
            $data['asuhan'] = DB::table('asuhan_gizi_dewasa')->where('asdewasa_reg', $request->reg)->latest()->first();

            return response()->json($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store_assesment_dewasa(Request $request)
    {
        try {
            $data = [
                'asdew_reg' => $request->asdew_reg,
                'asdew_sensori' => $request->asdew_sensori,
                'asdew_lembab' => $request->asdew_lembab,
                'asdew_aktivitas' => $request->asdew_aktivitas,
                'asdew_mobilitas' => $request->asdew_mobilitas,
                'asdew_nutrisi' => $request->asdew_nutrisi,
                'asdew_friksi' => $request->asdew_friksi,
                'asdew_skor_braden' => $request->asdew_skor_braden,
                'asdew_kategori' => $request->asdew_kategori,
                'asdew_luka' => $request->asdew_luka,
                'asdew_rom' => $request->asdew_rom,
                'asdew_deformitas' => $request->asdew_deformitas,
                'asdew_deformitas_lainnya' => $request->asdew_deformitas_lainnya,
                'asdew_ggtidur' => $request->asdew_ggtidur,
                'asdew_ggtidur_lainnya' => $request->asdew_ggtidur_lainnya,
                'asdew_keluhan' => json_encode($request->asdew_keluhan),
                'asdew_keluhan_lainnya' => $request->asdew_keluhan_lainnya,
                'asdew_haus' => $request->asdew_haus,
                'asdew_mukosa' => $request->asdew_mukosa,
                'asdew_tugor' => $request->asdew_tugor,
                'asdew_edema' => $request->asdew_edema,
                'asdew_bab_kali' => $request->asdew_bab_kali,
                'asdew_bab' => $request->asdew_bab,
                'asdew_keluhan_bab' => json_encode($request->asdew_keluhan_bab),
                'asdew_keluhan_bab_lainnya' => $request->asdew_keluhan_bab_lainnya,
                'asdew_feces' => $request->asdew_feces,
                'asdew_feces_lainnya' => $request->asdew_feces_lainnya,
                'asdew_frekuensi_bak' => $request->asdew_frekuensi_bak,
                'asdew_jumlah_bak' => $request->asdew_jumlah_bak,
                'asdew_warna_urin' => $request->asdew_warna_urin,
                'asdew_keluhan_bak' => $request->asdew_keluhan_bak,
                'asdew_keluhan_bak_lainnya' => $request->asdew_keluhan_bak_lainnya,
                'asdew_bahasa' => $request->asdew_bahasa,
                'asdew_bahasa_lainnya' => $request->asdew_bahasa_lainnya,
                'asdew_penterjemah' => $request->asdew_penterjemah,
                'asdew_pendidikan' => $request->asdew_pendidikan,
                'asdew_pendidikan_lainnya' => $request->asdew_pendidikan_lainnya,
                'asdew_baca' => $request->asdew_baca,
                'asdew_belajar' => $request->asdew_belajar,
                'asdew_budaya' => $request->asdew_budaya,
                'asdew_hambatan' => json_encode($request->asdew_hambatan),
                'asdew_hambatan_lainnya' => $request->asdew_hambatan_lainnya,
                'asdew_user' => auth()->user()->id,
                'created_at' => date('Y-m-d H:m:s'),
            ];

            $check_ = DB::table('assesment_dewasa')
                ->where('asdew_reg', $request->asdew_reg)
                ->where('asdew_user', auth()->user()->id)
                ->where('created_at', 'like', '%' . date('Y-m-d H') . '%')
                ->first();

            if (isset($check_)) {
                $store = DB::table('assesment_dewasa')->where('asdew_id', $check_->asdew_id)->update($data);
            } else {
                $store = DB::table('assesment_dewasa')->insert($data);
            }

            return response()->json(200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store_assesment_gizi(Request $request)
    {
        try {

            $data['assesment'] = [
                'dewasa_reg' => $request->dewasa_reg,
                'dewasa_bb' => $request->dewasa_bb,
                'bbi' => $request->bbi,
                'dewasa_tl' => $request->dewasa_tl,
                'dewasa_lla' => $request->dewasa_lla,
                'dewasa_tb' => $request->dewasa_tb,
                'dewasa_imt' => $request->dewasa_imt,
                'dewasa_lla_lainnya' => $request->dewasa_lla_lainnya,
                'dewasa_biokimia' => $request->dewasa_biokimia,
                'dewasa_fisik' => $request->dewasa_fisik,
                'dewasa_riwayat_dahulu' => json_encode($request->dewasa_riwayat_dahulu),
                'dewasa_riwayat_sekarang' => json_encode($request->dewasa_riwayat_sekarang),
                'dewasa_panenteral' => $request->dewasa_panenteral,
                'dewasa_panenteral_lainnya' => $request->dewasa_panenteral_lainnya,
                'dewasa_sekarang_lainnya' => json_encode($request->dewasa_sekarang_lainnya),
                'dewasa_lain_lain' => $request->dewasa_lain_lain,
                'dewasa_penyakit_dahulu' => json_encode($request->dewasa_penyakit_dahulu),
                'dewasa_penyakit_dahulu_lainnya' => $request->dewasa_penyakit_dahulu_lainnya,
                'dewasa_penyakit_sekarang' => $request->dewasa_penyakit_sekarang,
                'dewasa_diet' => $request->dewasa_diet,
                'dewasa_diet_preskripsi' => $request->dewasa_diet_preskripsi,
                'dewasa_tindak_lanjut' => json_encode($request->dewasa_tindak_lanjut),
                'dewasa_user' => auth()->user()->id,
                'created_at' => date('Y-m-d H:m:s'),
            ];

            $data['asuhan'] = [
                'asdewasa_reg' => $request->dewasa_reg,
                'asdewasa_assesment' => $request->asdewasa_assesment,
                'asdewasa_diagnosa' => $request->diagnosa,
                'asdewasa_tujuan' => $request->asdewasa_tujuan,
                'asdewasa_energi' => $request->asdewasa_energi,
                'asdewasa_protein' => $request->asdewasa_protein,
                'asdewasa_kh' => $request->asdewasa_kh,
                'asdewasa_lemak' => $request->asdewasa_lemak,
                'asdewasa_rute' => $request->asdewasa_rute,
                'asdewasa_jenis_makanan' => $request->asdewasa_jenis_makanan,
                'asdewasa_frekuensi' => $request->asdewasa_frekuensi,
                'asdewasa_jadwal_makanan' => $request->asdewasa_jadwal_makanan,
                'asdewasa_monitoring_evaluasi' => $request->monitoring,
                'asdewasa_user' => auth()->user()->id,
                'created_at' => date('Y-m-d H:m:s'),
            ];

            $check_assesment = DB::table('assesment_gizi_dewasa')
                ->where('dewasa_reg', $request->dewasa_reg)
                ->where('dewasa_user', auth()->user()->id)
                ->where('created_at', 'like', '%' . date('Y-m-d H') . '%')
                ->first();

            $check_asuhan = DB::table('asuhan_gizi_dewasa')
                ->where('asdewasa_reg', $request->dewasa_reg)
                ->where('asdewasa_user', auth()->user()->id)
                ->where('created_at', 'like', '%' . date('Y-m-d H') . '%')
                ->first();

            if (isset($check_assesment)) {
                $store = DB::table('assesment_gizi_dewasa')->where('dewasa_id', $check_assesment->dewasa_id)->update($data['assesment']);
            } else {
                $store = DB::table('assesment_gizi_dewasa')->insert($data['assesment']);
            }

            if (isset($check_asuhan)) {
                $store = DB::table('asuhan_gizi_dewasa')->where('asdewasa_id', $check_asuhan->asdewasa_id)->update($data['asuhan']);
            } else {
                $store = DB::table('asuhan_gizi_dewasa')->insert($data['asuhan']);
            }

            return response()->json(200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store_transfer_internal(Request $request)
    {
        try {

            // $validatedData = $request->validate([
            //     'transfer_gcs_e' => 'required|integer|min:1|max:4',
            //     'transfer_gcs_m' => 'required|integer|min:1|max:6',
            //     'transfer_gcs_v' => 'required|integer|min:1|max:5',
            //     'transfer_td' => 'required|string|max:10',
            //     'transfer_N' => 'required|integer|min:0|max:200',
            //     'transfer_skala_nyeri' => 'required|integer|min:0|max:10',
            //     'transfer_suhu' => 'required|numeric|min:34|max:42',
            //     'transfer_p' => 'required|integer|min:0|max:150',
            //     'transfer_spo2' => 'required|integer|min:0|max:100',
            // ]);

            $perawat = DB::connection('mysql2')->table('users')->where('username', $request->perawat_tujuan)->first();

            $data = [
                'medrec' => $request->medrec,
                // 'kode_transfer_internal' => app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->generate_datetimeuuid4(),
                'transfer_reg' => $request->transfer_reg,
                'transfer_data' => $request->data,
                'transfer_unit_asal' => $request->transfer_unit_asal,
                'transfer_unit_tujuan' => $request->transfer_unit_tujuan,
                'class' => $request->transfer_class,
                'charge_class' => $request->transfer_charge_class,
                'transfer_waktu_hubungi' => $request->transfer_waktu_hubungi,
                'transfer_kategori' => $request->transfer_kategori,
                'transfer_alasan_masuk' => $request->transfer_alasan_masuk,
                'transfer_diagnosis' => $request->transfer_diagnosis,
                'transfer_temuan' => $request->transfer_temuan,
                'transfer_alergi' => $request->transfer_alergi,
                'transfer_alergi_text' => $request->transfer_alergi_text,
                'transfer_kewaspaan' => $request->transfer_kewaspaan,
                'transfer_gcs_e' => $request->transfer_gcs_e,
                'transfer_gcs_m' => $request->transfer_gcs_m,
                'transfer_gcs_v' => $request->transfer_gcs_v,
                'transfer_td' => $request->transfer_td,
                'transfer_N' => $request->transfer_N,
                'transfer_skala_nyeri' => $request->transfer_skala_nyeri,
                'transfer_suhu' => $request->transfer_suhu,
                'transfer_p' => $request->transfer_p,
                'transfer_spo2' => $request->transfer_spo2,
                'transfer_dokumen_yang_disertakan' => json_encode($request->transfer_dokumen_yang_disertakan),
                'transfer_alat_terpasang' => $request->transfer_alat_terpasang,
                'transfer_deleted' => 0,
                'ditransfer_oleh_user_id' => auth()->user()->username,
                'ditransfer_oleh_nama' => auth()->user()->name,
                'ditransfer_waktu' => Carbon::now(),
                'diterima_oleh_user_id' => $perawat->username,
                'diterima_oleh_nama' => $perawat->name,
                // 'diterima_waktu' => $request->diterima_waktu,
                'transfer_terima_tanggal' => $request->transfer_terima_tanggal,
                'transfer_terima_kondisi' => $request->transfer_terima_kondisi,
                'transfer_terima_gcs_e' => $request->transfer_terima_gcs_e,
                'transfer_terima_gcs_m' => $request->transfer_terima_gcs_m,
                'transfer_terima_gcs_v' => $request->transfer_terima_gcs_v,
                'transfer_terima_td' => $request->transfer_terima_td,
                'transfer_terima_n' => $request->transfer_terima_n,
                'transfer_terima_suhu' => $request->transfer_terima_suhu,
                'transfer_terima_p' => $request->transfer_terima_p,
                'transfer_terima_lab' => $request->transfer_terima_lab,
                'transfer_terima_xray' => $request->transfer_terima_xray,
                'transfer_terima_mri' => $request->transfer_terima_mri,
                'transfer_terima_ct_scan' => $request->transfer_terima_ct_scan,
                'transfer_terima_ekg' => $request->transfer_terima_ekg,
                'transfer_terima_echo' => $request->transfer_terima_echo,
                // 'signature_doctor' => $request->signature_doctor,
                // 'signature_nurse' => $request->signature_nurse,
                // 'signature_doctor_2' => $request->signature_doctor_2,
                // 'signature_nurse_2' => $request->signature_nurse_2,
                'created_at' => Carbon::now(),
            ];

            $update = DB::connection('mysql')->table('transfer_internal')
                ->where([
                    ['transfer_reg', $request->transfer_reg],
                    ['kode_transfer_internal', $request->kode_transfer_internal]
                ])
                ->update($data);

            // Save signatures
            $this->saveSignature($request);

            return response()->json(200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // public function saveSignature(Request $request)
    // {
    //     try {
    //         \Log::info('Request received:', $request->all());  // Tambahkan log untuk debugging

    //         $data = [
    //             'signature_doctor' => $request->input('signature_doctor'),
    //             'signature_nurse' => $request->input('signature_nurse'),
    //             'signature_doctor_2' => $request->input('signature_doctor_2'),
    //             'signature_nurse_2' => $request->input('signature_nurse_2'),
    //             'updated_at' => Carbon::now(),
    //         ];

    //         \Log::info('Data to be saved:', $data);  // Tambahkan log untuk debugging

    //         DB::table('transfer_internal')
    //             ->where('transfer_reg', $request->input('reg'))
    //             ->update($data);

    //         \Log::info('Data saved successfully');  // Tambahkan log untuk debugging

    //         return response()->json(200);
    //     } catch (\Throwable $th) {
    //         \Log::error('Error saving signature:', ['error' => $th->getMessage()]);  // Tambahkan log untuk error
    //         return response()->json(['error' => $th->getMessage()], 500);
    //     }
    // }

    public function saveSignature(Request $request)
    {
        $transfer_reg = $request->input('reg'); // Retrieve the 'reg' value from the request

        $signature_doctor = $request->input('signature_doctor');
        $signature_nurse = $request->input('signature_nurse');
        $signature_doctor_2 = $request->input('signature_doctor_2');
        $signature_nurse_2 = $request->input('signature_nurse_2');

        DB::table('transfer_internal')
            ->where('transfer_reg', $transfer_reg)
            ->update([
                'signature_doctor' => $signature_doctor,
                'signature_nurse' => $signature_nurse,
                'signature_doctor_2' => $signature_doctor_2,
                'signature_nurse_2' => $signature_nurse_2
            ]);

        return response()->json(200);
    }
    public function store_cathlab(Request $request)
    {
        try {
            $data = [
                'cathlab_reg' => $request->reg,
                'cathlab_data' => $request->data,
                'cathlab_deleted' => 0,
                'created_at' => Carbon::now(),
            ];

            $check_ = DB::connection('mysql')
                ->table('cathlab')
                ->where('cathlab_reg', $request->reg)
                ->first();

            if (isset($check_)) {
                $update = DB::connection('mysql')->table('cathlab')
                    ->where('cathlab_id', $check_->cathlab_id)
                    ->update($data);
            } else {
                $store = DB::connection('mysql')->table('cathlab')
                    ->insert($data);
            }

            return response()->json(200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store_pra_tindakan(Request $request)
    {
        try {
            $data = [
                'pra_reg' => $request->reg,
                'pra_data' => $request->data,
                'pra_deleted' => 0,
                'created_at' => Carbon::now(),
            ];

            $check_ = DB::connection('mysql')
                ->table('keperawatan_pra_tindakan')
                ->where('pra_reg', $request->reg)
                ->first();

            if (isset($check_)) {
                $update = DB::connection('mysql')->table('keperawatan_pra_tindakan')
                    ->where('pra_id', $check_->pra_id)
                    ->update($data);
            } else {
                $store = DB::connection('mysql')->table('keperawatan_pra_tindakan')
                    ->insert($data);
            }

            return response()->json(200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
