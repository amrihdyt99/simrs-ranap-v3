<?php

namespace App\Http\Controllers\NewPerawat;

use App\Http\Controllers\Controller;
use App\Models\FluidBalance;
use App\Models\Gejala;
use App\Models\Paramedic;
use App\Models\PasienPemberianObat;
use App\Models\RegistrationInap;
use App\Models\VitalSign;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewNursingController extends Controller
{
    public function nursing($reg_no)
    {
        $registrationInap = RegistrationInap::find($reg_no);
        $transfusi = FluidBalance::with(['fluid_balance_data' => function ($q) {
            $q->whereDate("created_at", Carbon::now()->toDateString());
        }])->where(['intake' => "transfusi"])->get();
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
        $dataTransfusi = DB::connection('mysql')
            ->table('fluid_balance')
            ->where(['intake' => 'transfusi'])
            ->get();
        $dataFluidBalanceBaru = DB::connection('mysql')
            ->table('fluid_balance_data_baru')
            ->where('no_reg', $reg_no)
            ->get();
        $obatdaridokter = DB::connection('mysql')
            ->table('job_orders_dt')
            ->where([
                ['reg_no', '=', $reg_no],
                ['jenis_order', 'LIKE', 'obat%']
            ])->get();

        $datamypatient = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('m_ruangan_baru', 'm_registrasi.service_unit', '=', 'm_ruangan_baru.id')
            ->leftJoin('m_kelas_ruangan_baru', 'm_registrasi.bed', '=', 'm_kelas_ruangan_baru.id')
            ->get();
        //        $soap = PasienSoaper::where('reg_no',$reg_no)->latest()->first();
        //var_dump($vitalsigndata[0]['kategori']);
        /*return view('perawat.pages.patient.nursing',['registrationInap'=>$registrationInap,'vitaldata'=>$vitalsigndata,
            'gejaladata'=>$gejaladata,'dokter'=>$dokter]);*/
        //var_dump($obat);
        return view('new_perawat.nursing.new_nursing_page', compact("registrationInap", "transfusi", "makan", "parental", "output", "fluid_balance", "gejaladata", "vitaldata", "dokter", "obat", "dataTransfusi", "dataFluidBalanceBaru", "obatdaridokter", "datamypatient"));
    }

    public function nursing_drugs_store(Request $request)
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
        ]);
        $valData['nama_dokter'] = $request->nama_dokter;
        $valData['nama_obat'] = $request->kode_obat;

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

    public function addVitalSign(Request $request)
    {
        $dateTimeNow = Carbon::now();

        $params = array(
            'reg_no' => $request->reg_no,
            'kategori' => $request->kategori,
            'tanggal_pemberian' => $dateTimeNow->toDateTimeString(),
            'data' => $request->data,
            'med_rec' => $request->med_rec,
            'jam_pemberian' => $dateTimeNow->toTimeString()
        );
        //$sql="SELECT * FROM vital_sign WHERE id_pasien=? AND tanggal=?";
        /* if($request->kategori=="blood pressure"){
            $params=array(
                'reg_no'=>$request->reg_no,
                'kategori'=>$request->kategori,
                'tanggal_pemberian'=>$dateTimeNow->toDateTimeString(),
                'data'=>$request->data1."/".$request->data2
            );
        }else if($request->kategori=="GCS"){
            $valuedata="{E:".$request->data_e.",V:".$request->data_v.",M:".$request->data_m."}";
            $params=array(
                'reg_no'=>$request->reg_no,
                'kategori'=>$request->kategori,
                'tanggal_pemberian'=>$dateTimeNow->toDateTimeString(),
                'data'=>$valuedata
            );
        }
        else{
            $params=array(
                'reg_no'=>$request->reg_no,
                'kategori'=>$request->kategori,
                'tanggal_pemberian'=>$dateTimeNow->toDateTimeString(),
                'data'=>$request->data
            );
        }*/

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

        $simpan = DB::connection('mysql')
            ->table('vital_sign')
            ->insert($params);
        //VitalSign::create($params);

        //return redirect()->route('perawat.patient.nursing',['reg_no'=>$request->reg_no]);
        //$data['registrationInap'] = RegistrationInap::find($reg_no);
        //$data['obat'] = PasienPemberianObat::where('reg_no', $reg_no)->get();
        //return view('perawat.pages.patient.nursing', $data);
        return response()->json([
            'success' => $simpan
        ]);
    }

    function addFluidBalanceBaru(Request $request)
    {
        $totalJumlahIntake = $request->jumlah_transfusi + $request->minum + $request->sonde;
        $totalJumlahOutput = $request->urine + $request->drain + $request->iwl_muntah;
        $totalBalance = $totalJumlahIntake - $totalJumlahOutput;
        $params = array(
            'no_reg' => $request->reg_no,
            'med_rec' => $request->med_rec,
            'tanggal' => $request->tanggal_pemberian,
            'jam' => $request->tanggal,
            'cairan_transfusi' => $request->cairan_transfusi,
            'jumlah_cairan' => $request->jumlah_transfusi,
            'minum' => $request->minum,
            'sonde' => $request->sonde,
            'urine' => $request->urine,
            'drain' => $request->drain,
            'iwl_muntah' => $request->iwl_muntah,
            'jumlah' => $request->jumlah,
            'balance' => $totalBalance
        );

        $simpan = DB::connection('mysql')
            ->table('fluid_balance_data_baru')
            ->insert($params);
        if ($simpan) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }

    function getFluidBalance(Request $request)
    {
        $data = DB::connection('mysql')
            ->table('fluid_balance_data_baru')
            ->where('no_reg', $request->reg_no)
            ->get();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function getFluidBalanceTransfusi(Request $request)
    {
        $data = DB::connection('mysql')
            ->table('fluid_balance')
            ->where(['intake' => 'transfusi'])
            ->get();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function addasessmentawal(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->asper_reg,
            'reg_medrec' => $request->medrec,
        );

        $paramsawal = array(
            'asper_poli' => $request->asper_poli,
            'asper_kondisi_umum_lain' => $request->asper_kondisi_umum_lain,
            'asper_hpht' => $request->asper_hpht,
            'asper_tp' => $request->asper_tp,
            'asper_kbthn_khusus_lain' => $request->asper_kbthn_khusus_lain,
            'asper_status_emosi_lain' => $request->asper_status_emosi_lain,
            'asper_hambatan_ekonomi_lain' => $request->asper_hambatan_ekonomi_lain,
            'bunuh_diri_depresi' => $request->bunuh_diri_depresi,
            'bunuh_diri_cerai' => $request->bunuh_diri_cerai,
            'alergi' => $request->asper_riwayat_alergi,
            'nama_alergi' => $request->asper_riwayat_alergi_lain,
            'reaksi_alergi' => $request->reaksi_alergi,
            'diberitauhkan_dokter' => "tidak",
            'kesadaran' => $request->asper_kesadaran,
            'kondisi_umum' => $request->asper_kondisi_umum,
            'tekanan_darah' => $request->asper_tekanan_darah,
            'nadi' => $request->asper_nadi,
            'penafasan' => $request->asper_pernapasan,
            'suhu' => $request->asper_suhu,
            'berat_badan' => $request->asper_berat_badan,
            'tinggi_badan' => $request->asper_tinggi_bdn,
            'kebutuhan_khusus' => json_encode($request->asper_kbthn_khusus),
            'status_emosional' => json_encode($request->asper_status_emosi),
            'kebiasaan' => $request->kebiasaan,
            'frekuensi_kebiasaan' => $request->frekuensi,
            'riwayat_gangguan_jiwa' => $request->riwayat_gangguan_jiwa,
            'keinginan_percobaan_bunuh_diri' => $request->keinginan_percobaan_bunuh_diri,
            'bunuh_diri_sex' => $request->bunuh_diri_sex,
            'bunuh_diri_age' => $request->bunuh_diri_age,
            'bunuh_diri_previous_suicide' => $request->bunuh_diri_previous_suicide,
            'bunuh_diri_alkohol' => $request->bunuh_diri_alkohol,
            'bunuh_diri_loss' => $request->bunuh_diri_loss,
            'bunuh_diri_terorganisir' => $request->bunuh_diri_terorganisir,
            'bunuh_diri_pendukung' => $request->bunuh_diri_pendukung,
            'bunuh_diri_penyakit_kronis' => $request->bunuh_diri_penyakit_kronis,
            'riwayat_trauma' => $request->asper_kondisi_umum_b,
            'hambatan_sosial_ekonomi' => $request->asper_hambatan_ekonomi,
            'kebutuhan_konseling_spiritual' => $request->kebutuhan_konseling_spiritual,
            'bantuan_menjalankan_ibadah' => $request->bantuan_menjalankan_ibadah,
            "ketegori_percobaan_bunuh_diri" => $request->ketegori_percobaan_bunuh_diri,
            "nyeri_status" => $request->nyeri_status,
            "nyeri_durasi_waktu" => $request->nyeri_durasi_waktu,
            "nyeri_penyebab" => $request->nyeri_penyebab,
            "nyeri_deskripsi" => json_encode($request->nyeri_deskripsi),
            "nyeri_deskripsi_lain" => $request->nyeri_deskripsi_lain,
            "lokasi_penjalaran" => $request->lokasi_penjalaran,
            "nyeri_skala_ukur" => $request->nyeri_skala_ukur,
            "nyeri_skala" => $request->nyeri_skala,
            "nyeri_waktu" => $request->nyeri_waktu,
            "nyeri_frekuensi" => $request->nyeri_frekuensi,
            "asper_brjln_seimbang" => $request->asper_brjln_seimbang,
            "asper_altban_duduk" => $request->asper_altban_duduk,
            "asper_hasil" => $request->asper_hasil,
            "asper_keluhan_nutrisi" => json_encode($request->asper_keluhan_nutrisi),
            "asper_keluhan_nutrisi_lain" => $request->asper_keluhan_nutrisi_lain,
            "asper_haus_berlebih" => $request->asper_haus_berlebih,
            "asper_mukosa_mulut" => $request->asper_mukosa_mulut,
            "asper_turgor_kulit" => $request->asper_turgor_kulit,
            "asper_edema" => $request->asper_edema,
            "asper_diagnosa_kprwtn_text" => $request->asper_diagnosa_kprwtn_text,
            "asper_diagnosa_kprwtn" => json_encode($request->asper_diagnosa_kprwtn),
            "kebutuhan_konseling_spiritual_lain" => $request->kebutuhan_konseling_spiritual_lain,
            "bantuan_menjalankan_ibadah_lain" => $request->bantuan_menjalankan_ibadah_lain,

        );

        $simpan = DB::connection('mysql')
            ->table('pengkajian_awal_pasien_perawat')
            ->updateOrInsert($paramsawalsearch, $paramsawal);
        return response()->json([
            'success' => $simpan
        ]);
    }


    function getAssesmentAwalPerawat(Request $request)
    {
        $regno = $request->reg_no;
    }

    function addSkrinningGizi(Request $request)
    {

        $paramsawalsearch = array(
            'reg_no' => $request->asper_reg,
            'reg_medrec' => $request->medrec,
        );

        $paramsgizi = array(
            'turun_berat_badan' => $request->asper_penurunan_bb_dewasa,
            'turun_nafsu_makan' => $request->asper_penurunan_nafsu_dewasa,
            'ketegori' => $request->asper_kategori_dewasa,
            'total_skor' => $request->total_skor_dewasa,
            'catatan' => ""
        );

        $simpan = DB::connection('mysql')
            ->table('skrining_gizi')
            ->updateOrInsert($paramsawalsearch, $paramsgizi);
        return response()->json([
            'success' => $simpan
        ]);
    }

    function addSkrinningGiziAnak(Request $request)
    {

        $paramsawalsearch = array(
            'reg_no' => $request->asper_reg,
            'reg_medrec' => $request->medrec,
        );

        $paramsgizi = array(
            'asper_kurus_anak' => $request->asper_kurus_anak,
            'asper_penurunan_bb_anak' => $request->asper_penurunan_bb_anak,
            'asper_kondisi_anak' => $request->asper_kondisi_anak,
            'asper_penyakit_anak' => $request->asper_penyakit_anak,
            'asper_skor_anak' => $request->asper_skor_anak,
            'asper_sebab_malnutrisi_lain' => $request->asper_sebab_malnutrisi_lain,
            'asper_sebab_malnutrisi' => json_encode($request->asper_sebab_malnutrisi),
            'total_skor_gizi_anak' => $request->total_skor_anak,
        );

        $simpan = DB::connection('mysql')
            ->table('skrining_gizi_anak')
            ->updateOrInsert($paramsawalsearch, $paramsgizi);
        return response()->json([
            'success' => $simpan
        ]);
    }

    function addMasalah(Request $request)
    {
        $drf_s = array(
            'pmasalah_reg' => $request->asper_reg,
            'pmasalah_medrec' => $request->medrec,
        );
        $drf = array(
            'pmasalah_masalah' => json_encode($request->pmasalah_masalah),
            'pintervensi_intervensi' => json_encode($request->pintervensi_intervensi),
            'updated_at' => app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->carbon_generate_datetime_now(),
        );

        $simpan = DB::connection('mysql')
            ->table('rs_pasien_asper_masalah')
            ->updateOrInsert($drf_s, $drf);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function addSkrinningNyeri(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->reg_no,
            'reg_medrec' => $request->medrec,
        );

        $paramsnyeri = $request->all();
        // forget
        unset($paramsnyeri['medrec']);
        unset($paramsnyeri['reg_no']);
        // set
        $paramsnyeri['reg_medrec'] = $request->medrec;

        $simpan = DB::connection('mysql')
            ->table('skrining_nyeri')
            ->updateOrInsert($paramsawalsearch, $paramsnyeri);

        return response()->json([
            'success' => $simpan
        ]);
    }


    function addedukasipasien(Request $request)
    {

        $paramsawalsearch = array(
            'reg_no' => $request->reg_no,
            'reg_medrec' => $request->medrec,
            'user_id' => $request->user_id,
        );

        // $paramsawalsearch2 = array(
        //     'reg_no' => $request->reg_no,
        //     'med_rec' => $request->medrec,
        // );

        // $paramsawalsearch3 = array(
        //     'reg_no' => $request->reg_no,
        //     'med_rec' => $request->medrec,
        // );

        // $paramsawalsearch4 = array(
        //     'reg_no' => $request->reg_no,
        //     'med_rec' => $request->medrec,
        // );

        // $paramsawalsearch5 = array(
        //     'reg_no' => $request->reg_no,
        //     'med_rec' => $request->medrec,
        // );

        // $paramsawalsearch6 = array(
        //     'reg_no' => $request->reg_no,
        //     'med_rec' => $request->medrec,
        // );

        //     $bahasa = implode(",", $request->bahasa);
        //     $pendidikan_pasien = implode(",", $request->pendidikan_pasien);
        //     $baca_tulis = implode(",", $request->baca_tulis);
        //     $pilihan_tipe_belajar = implode(",", $request->pilihan_tipe_belajar);
        //     $hambatan_belajar = implode(",", $request->hambatan_belajar);
        //     $kebutuhan_belajar = implode(",", $request->kebutuhan_belajar);

        //     //var_dump($request->kebutuhan_belajar);
        //    $params=$request->all();
        //     unset($params['_token']);
        //     unset($params['medrec']);
        //     $params['reg_medrec']=$request->medrec;
        //     $params['bahasa']=$bahasa;
        //     $params['pendidikan_pasien']=$pendidikan_pasien;
        //     $params['baca_tulis']=$baca_tulis;
        //     $params['pilihan_tipe_belajar']=$pilihan_tipe_belajar;
        //     $params['hambatan_belajar']=$hambatan_belajar;
        //     $params['kebutuhan_belajar']=$kebutuhan_belajar;
        //     $params['user_id']=$request->user_id;

        //     $cekdata=DB::connection('mysql')
        //         ->table('rs_edukasi_pasien')
        //         ->where('reg_medrec',$request->medrec)
        //         ->where('reg_no',$request->reg_no)
        //         ->count();

        //     if($cekdata>0) {
        //         $simpan = DB::connection('mysql')
        //             ->table('rs_edukasi_pasien')
        //             ->where('reg_medrec', $request->medrec)
        //             ->where('reg_no', $request->reg_no)
        //             ->update($params);
        //     }else{
        //         $simpan=DB::connection('mysql')
        //             ->table('rs_edukasi_pasien')
        //             ->insert($params);
        //     }

        //insert utama
        $simpan = DB::connection('mysql')
            ->table('rs_edukasi_pasien')
            ->updateOrInsert($paramsawalsearch, [
                "bahasa" => implode(",", $request->bahasa),
                "kebutuhan_penerjemah" => $request->kebutuhan_penerjemah,
                "pendidikan_pasien" => implode(",", $request->pendidikan_pasien),
                "baca_tulis" => implode(",", $request->baca_tulis),
                "pilihan_tipe_belajar" => implode(",", $request->pilihan_tipe_belajar),
                "hambatan_belajar" => implode(",", $request->hambatan_belajar),
                "kebutuhan_belajar" => implode(",", $request->kebutuhan_belajar),
                "kesediaan_pasien" => $request->kesediaan_pasien,
            ]);

        // $simpan_dokter = DB::connection('mysql')
        //     ->table('rs_edukasi_pasien_dokter')
        //     ->updateOrInsert($paramsawalsearch2, [
        //         "edukasi_diagnosa_penyebab_dokter" => $request->edukasi_diagnosa_penyebab_dokter,
        //         "edukasi_penatalaksanaan_dokter" => $request->edukasi_penatalaksanaan_dokter,
        //         "edukasi_prosedur_diagnostik_dokter" => $request->edukasi_prosedur_diagnostik_dokter,
        //         "edukasi_manajemen_nyeri_dokter" => $request->edukasi_manajemen_nyeri_dokter,
        //         "edukasi_lain_lain_dokter" => $request->edukasi_lain_lain_dokter,
        //         "tgl_diagnosa_penyebab_dokter" => $request->tgl_diagnosa_penyebab_dokter,
        //         "tgl_penatalaksanaan_dokter" => $request->tgl_penatalaksanaan_dokter,
        //         "tgl_prosedur_diagnostik_dokter" => $request->tgl_prosedur_diagnostik_dokter,
        //         "tgl_manajemen_nyeri_dokter" => $request->tgl_manajemen_nyeri_dokter,
        //         "tgl_lain_lain_dokter" => $request->tgl_lain_lain_dokter,
        //         "tingkat_paham_diagnosa_penyebab_dokter" => $request->tingkat_paham_diagnosa_penyebab_dokter,
        //         "tingkat_paham_penatalaksanaan_dokter" => $request->tingkat_paham_penatalaksanaan_dokter,
        //         "tingkat_paham_prosedur_diagnostik_dokter" => $request->tingkat_paham_prosedur_diagnostik_dokter,
        //         "tingkat_paham_manajemen_nyeri_dokter" => $request->tingkat_paham_manajemen_nyeri_dokter,
        //         "tingkat_paham_lain_lain_dokter" => $request->tingkat_paham_lain_lain_dokter,
        //         "tingkat_paham_lain_lain_text_dokter" => $request->tingkat_paham_lain_lain_text_dokter,
        //         "metode_edukasi_diagnosa_penyebab_dokter" => $request->metode_edukasi_diagnosa_penyebab_dokter,
        //         "metode_edukasi_penatalaksanaan_dokter" => $request->metode_edukasi_penatalaksanaan_dokter,
        //         "metode_edukasi_prosedur_diagnostik_dokter" => $request->metode_edukasi_prosedur_diagnostik_dokter,
        //         "metode_edukasi_manajemen_nyeri_dokter" => $request->metode_edukasi_manajemen_nyeri_dokter,
        //         "edukasi_lain_lain_dokter" => $request->edukasi_lain_lain_dokter,
        //     ]);

        // $simpan_perawat = DB::connection('mysql')
        //     ->table('rs_edukasi_pasien_perawat')
        //     ->updateOrInsert($paramsawalsearch3, [
        //         "edukasi_penggunaan_peralatan_perawat" => $request->edukasi_penggunaan_peralatan_perawat,
        //         "edukasi_pencegahan_perawat" => $request->edukasi_pencegahan_perawat,
        //         "edukasi_manajemen_nyeri_ringan_perawat" => $request->edukasi_manajemen_nyeri_ringan_perawat,
        //         "edukasi_lain_lain_perawat" => $request->edukasi_lain_lain_perawat,
        //         "tgl_penggunaan_peralatan_perawat" => $request->tgl_penggunaan_peralatan_perawat,
        //         "tgl_pencegahan_perawat" => $request->tgl_pencegahan_perawat,
        //         "tgl_manajemen_nyeri_ringan_perawat" => $request->tgl_manajemen_nyeri_ringan_perawat,
        //         "tgl_lain_lain_perawat" => $request->tgl_lain_lain_perawat,
        //         "tingkat_paham_penggunaan_peralatan_perawat" => $request->tingkat_paham_penggunaan_peralatan_perawat,
        //         "tingkat_paham_pencegahan_perawat" => $request->tingkat_paham_pencegahan_perawat,
        //         "tingkat_paham_manajemen_nyeri_ringan_perawat" => $request->tingkat_paham_manajemen_nyeri_ringan_perawat,
        //         "tingkat_paham_lain_lain_perawat" => $request->tingkat_paham_lain_lain_perawat,
        //         "tingkat_paham_lain_lain_text_perawat" => $request->tingkat_paham_lain_lain_text_perawat,
        //         "metode_edukasi_penggunaan_peralatan_perawat" => $request->metode_edukasi_penggunaan_peralatan_perawat,
        //         "metode_edukasi_pencegahan_perawat" => $request->metode_edukasi_pencegahan_perawat,
        //         "metode_edukasi_manajemen_nyeri_ringan_perawat" => $request->metode_edukasi_manajemen_nyeri_ringan_perawat,
        //         "metode_edukasi_lain_lain_perawat" => $request->metode_edukasi_lain_lain_perawat,
        //     ]);

        // $simpan_gizi = DB::connection('mysql')
        //     ->table('rs_edukasi_pasien_gizi')
        //     ->updateOrInsert($paramsawalsearch4, [
        //         "edukasi_pentingnya_nutrisi_gizi" => $request->edukasi_pentingnya_nutrisi_gizi,
        //         "edukasi_diet_gizi" => $request->edukasi_diet_gizi,
        //         "edukasi_lain_lain_gizi" => $request->edukasi_lain_lain_gizi,
        //         "tgl_pentingnya_nutrisi_gizi" => $request->tgl_pentingnya_nutrisi_gizi,
        //         "tgl_diet_gizi" => $request->tgl_diet_gizi,
        //         "tgl_lain_lain_gizi" => $request->tgl_lain_lain_gizi,
        //         "tingkat_paham_pentingnya_nutrisi_gizi" => $request->tingkat_paham_pentingnya_nutrisi_gizi,
        //         "tingkat_paham_diet_gizi" => $request->tingkat_paham_diet_gizi,
        //         "tingkat_paham_lain_lain_gizi" => $request->tingkat_paham_lain_lain_gizi,
        //         "tingkat_paham_lain_lain_text_gizi" => $request->tingkat_paham_lain_lain_text_gizi,
        //         "metode_edukasi_pentingnya_nutrisi_gizi" => $request->metode_edukasi_pentingnya_nutrisi_gizi,
        //         "metode_edukasi_diet_gizi" => $request->metode_edukasi_diet_gizi,
        //         "metode_edukasi_lain_lain_gizi" => $request->metode_edukasi_lain_lain_gizi,

        //     ]);

        // $simpan_farmasi = DB::connection('mysql')
        //     ->table('rs_edukasi_pasien_farmasi')
        //     ->updateOrInsert($paramsawalsearch5, [
        //         "edukasi_obat_diberikan_farmasi" => $request->edukasi_obat_diberikan_farmasi,
        //         "edukasi_efek_samping_farmasi" => $request->edukasi_efek_samping_farmasi,
        //         "edukasi_interaksi_farmasi" => $request->edukasi_interaksi_farmasi,
        //         "edukasi_lain_lain_farmasi" => $request->edukasi_lain_lain_farmasi,
        //         "tgl_obat_diberikan_farmasi" => $request->tgl_obat_diberikan_farmasi,
        //         "tgl_efek_samping_farmasi" => $request->tgl_efek_samping_farmasi,
        //         "tgl_interaksi_farmasi" => $request->tgl_interaksi_farmasi,
        //         "tgl_lain_lain_farmasi" => $request->tgl_lain_lain_farmasi,
        //         "tingkat_paham_obat_diberikan_farmasi" => $request->tingkat_paham_obat_diberikan_farmasi,
        //         "tingkat_paham_efek_samping_farmasi" => $request->tingkat_paham_efek_samping_farmasi,
        //         "tingkat_paham_interaksi_farmasi" => $request->tingkat_paham_interaksi_farmasi,
        //         "tingkat_paham_lain_lain_farmasi" => $request->tingkat_paham_lain_lain_farmasi,
        //         "tingkat_paham_lain_lain_text_farmasi" => $request->tingkat_paham_lain_lain_text_farmasi,
        //         "metode_edukasi_obat_diberikan_farmasi" => $request->metode_edukasi_obat_diberikan_farmasi,
        //         "metode_edukasi_efek_samping_farmasi" => $request->metode_edukasi_efek_samping_farmasi,
        //         "metode_edukasi_interaksi_farmasi" => $request->metode_edukasi_interaksi_farmasi,
        //         "metode_edukasi_lain_lain_farmasi" => $request->metode_edukasi_lain_lain_farmasi,
        //     ]);

        // $simpan_rehab = DB::connection('mysql')
        //     ->table('rs_edukasi_pasien_rehab')
        //     ->updateOrInsert($paramsawalsearch6, [
        //         "edukasi_tehnik_rehabilitasi" => $request->edukasi_tehnik_rehabilitasi,
        //         "edukasi_lain_lain_rehabilitasi" => $request->edukasi_lain_lain_rehabilitasi,
        //         "tgl_tehnik_rehabilitasi" => $request->tgl_tehnik_rehabilitasi,
        //         "tgl_lain_lain_rehabilitasi" => $request->tgl_lain_lain_rehabilitasi,
        //         "tingkat_paham_tehnik_rehabilitasi" => $request->tingkat_paham_tehnik_rehabilitasi,
        //         "tingkat_paham_lain_lain_rehabilitasi" => $request->tingkat_paham_lain_lain_rehabilitasi,
        //         "tingkat_paham_lain_lain_text_rehabilitasi" => $request->tingkat_paham_lain_lain_text_rehabilitasi,
        //         "metode_edukasi_tehnik_rehabilitasi" => $request->metode_edukasi_tehnik_rehabilitasi,
        //         "metode_edukasi_lain_lain_rehabilitasi" => $request->metode_edukasi_lain_lain_rehabilitasi,
        //     ]);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function addEdukasiPasienPerawat(Request $request){
        $paramsawalsearch3 = array(
            'reg_no' => $request->reg_no,
            'med_rec' => $request->medrec,
        );

        DB::connection('mysql')
        ->table('rs_edukasi_pasien_perawat')
        ->updateOrInsert($paramsawalsearch3, [
            "edukasi_penggunaan_peralatan_perawat" => $request->edukasi_penggunaan_peralatan_perawat,
            "edukasi_pencegahan_perawat" => $request->edukasi_pencegahan_perawat,
            "edukasi_manajemen_nyeri_ringan_perawat" => $request->edukasi_manajemen_nyeri_ringan_perawat,
            "edukasi_lain_lain_perawat" => $request->edukasi_lain_lain_perawat,
            "tgl_penggunaan_peralatan_perawat" => $request->tgl_penggunaan_peralatan_perawat,
            "tgl_pencegahan_perawat" => $request->tgl_pencegahan_perawat,
            "tgl_manajemen_nyeri_ringan_perawat" => $request->tgl_manajemen_nyeri_ringan_perawat,
            "tgl_lain_lain_perawat" => $request->tgl_lain_lain_perawat,
            "tingkat_paham_penggunaan_peralatan_perawat" => $request->tingkat_paham_penggunaan_peralatan_perawat,
            "tingkat_paham_pencegahan_perawat" => $request->tingkat_paham_pencegahan_perawat,
            "tingkat_paham_manajemen_nyeri_ringan_perawat" => $request->tingkat_paham_manajemen_nyeri_ringan_perawat,
            "tingkat_paham_lain_lain_perawat" => $request->tingkat_paham_lain_lain_perawat,
            "tingkat_paham_lain_lain_text_perawat" => $request->tingkat_paham_lain_lain_text_perawat,
            "metode_edukasi_penggunaan_peralatan_perawat" => $request->metode_edukasi_penggunaan_peralatan_perawat,
            "metode_edukasi_pencegahan_perawat" => $request->metode_edukasi_pencegahan_perawat,
            "metode_edukasi_manajemen_nyeri_ringan_perawat" => $request->metode_edukasi_manajemen_nyeri_ringan_perawat,
            "metode_edukasi_lain_lain_perawat" => $request->metode_edukasi_lain_lain_perawat,
            "ttd_sasaran" => $request->ttd_sasaran,
            "ttd_edukator" => $request->ttd_edukator,
            "user_id" => $request->user_id,
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    function getRsEdukasiPasien(Request $request)
    {
        $regno = $request->reg_no;
        $medrec = $request->medrec;

        $data = DB::connection('mysql')
            ->table('rs_edukasi_pasien')
            ->where('reg_medrec', $medrec)
            ->where('reg_no', $regno)
            ->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function checklist(Request $request)
    {
        $regno = $request->reg_no;
        $medrec = $request->medrec;
        $cek = DB::table('rm3')->where('MedicalNo', $medrec);
        $hitung = $cek->count();
        $datamypatient = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('m_ruangan_baru', 'm_registrasi.service_unit', '=', 'm_ruangan_baru.id')
            ->leftJoin('m_kelas_ruangan_baru', 'm_registrasi.bed', '=', 'm_kelas_ruangan_baru.id')
            ->where(['m_registrasi.reg_no' => $regno])
            ->get()->first();
        // echo $hitung;
        if ($hitung == 0) {
            return view('new_perawat.checklist.checklist', ['datapasien' => $datamypatient, 'hitung' => $hitung]);
        } else {
            return view('new_perawat.checklist.checklist', ['datapasien' => $datamypatient, 'hitung' => $hitung, 'data' => $cek->first()]);
        }
    }

    public function simpan_rm3(Request $r)
    {
        $paramsawalsearch = array(
            'reg_no' => $r->reg_no,
            'MedicalNo' => $r->medrec,
        );

        try {
            $uang = $r->uang;
            $barang_lain = $r->barang_lain;
            $uang_bawa = $r->uang_bawa;
            $gigi = $r->gigi;
            $lokasi_gigi = $r->lokasi_gigi;
            $bawa_gigi = $r->bawa_gigi;
            $alat = $r->alat;
            $lokasi_alat = $r->lokasi_alat;
            $bawa_alat = $r->bawa_alat;
            $sampai = $r->sampai;
            $tidak = $r->tidak;
            $alasan_tidak = $r->alasan_tidak;
            $id = $r->id;
            $regno = $r->reg_no;
            $satu = json_encode($r->satu);
            $kepada = json_encode($r->kepada);
            $dua = json_encode($r->dua);
            $tiga = json_encode($r->tiga);
            $empat = json_encode($r->empat);
            $nama_pihak_pasien = $r->nama_pihak_pasien;
            $sebagai_pihak_pasien = $r->sebagai_pihak_pasien;
            $ttdPerawat = $r->ttd_perawat;
            $ttdPasien = $r->ttd_pasien;

            // dd($regno);
            $simpan = DB::table('rm3')->updateOrInsert($paramsawalsearch, [
                // 'reg_no' => $regno,
                // 'MedicalNo' => $id,
                'sampai' => $sampai,
                'uang' => $uang,
                'uang_bawa' => $uang_bawa,
                'barang_lain' => $barang_lain,
                'gigi' => $gigi,
                'lokasi_gigi' => $lokasi_gigi,
                'bawa_gigi' => $bawa_gigi,
                'bawa_alat' => $bawa_alat,
                'alat' => $alat,
                'lokasi_alat' => $lokasi_alat,
                'tidak' => $tidak,
                'alasan_tidak' => $alasan_tidak,
                'kepada' => $kepada,
                'satu' => $satu,
                'dua' => $dua,
                'tiga' => $tiga,
                'empat' => $empat,
                'nama_pihak_pasien' => $nama_pihak_pasien,
                'sebagai_pihak_pasien' => $sebagai_pihak_pasien,
                'ttd_perawat' => $ttdPerawat,
                'ttd_pasien' => $ttdPasien,
            ]);
            return response()->json([
                'success' => $simpan
            ]);
            //redirect()->back()->with('success', 'Data berhasil disimpan');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function addNursingNote(Request $request)
    {
        $regno = $request->reg_no;
        $medrec = $request->medrec;
        $params = array(
            'id_nurse' => $request->kode_perawat,
            'reg_no' => $regno,
            'med_rec' => $medrec,
            'catatan' => $request->catatan,
            'tgl_note' => date('Y-m-d', strtotime($request->tgl_pemberian)),
            'jam_note' => date('H:i:s', strtotime($request->tgl_pemberian)),
            'created_at' => date('Y-m-d H:i:s'),
        );

        $simpan = DB::connection('mysql')
            ->table('nurse_note')
            ->insert($params);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getNursingNote(Request $request)
    {
        $regno = $request->reg_no;
        $medrec = $request->medrec_no;

        $data = DB::connection('mysql')
            ->table('nurse_note')
            ->where('reg_no', $regno)
            ->where('med_rec', $medrec)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function getPhysician()
    {
        $datadokter = DB::connection('mysql2')
            ->table('m_paramedis')
            ->where(['GCParamedicType' => "X0055^001"])
            ->get();

        return response()->json([
            'success' => true,
            'data' => $datadokter
        ]);
    }

    function addPhysicianTeam(Request $request)
    {
        // cek

        if (
            !$request->regno
            || !$request->kategori
            || !$request->kode_dokter
        ) {
            return abort(404);
        }

        $cdata = DB::connection('mysql2')
            ->table('m_paramedis')
            ->where('ParamedicCode', $request->kode_dokter)
            ->first();
        if (!$cdata) {
            return abort(404);
        }

        $params = array(
            'reg_no' => $request->regno,
            'kategori' => $request->kategori,

            // m_paramedis
            'kode_dokter' => $cdata->ParamedicCode,
        );

        $simpan = DB::connection('mysql2')
            ->table('m_physician_team')
            ->insert($params);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getPhysicianTeam(Request $request)
    {
        $regno = $request->regno;
        $data = DB::connection('mysql2')
            ->table('m_physician_team')
            ->leftJoin('m_paramedis', 'm_physician_team.kode_dokter', '=', 'm_paramedis.ParamedicCode')
            ->where('m_physician_team.reg_no', $regno)
            ->select([
                'm_physician_team.*',
                'm_physician_team.id as m_physician_team_id',
                'm_paramedis.*',
            ])
            ->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function addTindakanIntra(Request $request)
    {

        $data_s = [
            'no_reg' => $request->regno,
        ];

        $data = [
            'no_reg' => $request->regno,
            'petugas_id' => 999,
            'pasien_tiba' => $request->pasien_tiba,
            'time_out' => $request->time_out,
            'cek_fungsi_peralatan' => $request->cek_fungsi_peralatan,
            'preparasi_di' => $request->preparasi_di,
            'desinfektan_dengan' => $request->desinfektan_dengan,
            'tipe_pembiusan' => $request->tipe_pembiusan,
            'puncture_di' => 'Femoral kanan/kiri',
            'akses' => $request->akses,
            'catheter_diagnostik' => $request->catheter_diagnostik,
            'value_diagnostik' => $request->value_diagnostik,
            'kontras' => $request->kontras,
            'guiding_chateter' => $request->guiding_catheter,
            'guide_wire_intervensi' => 'BMW',
            'kateter_aspirasi' => 'Tidak',
            'balon_ukuran' => $request->balon_ukuran,
            'balon_jumlah' => $request->balon_jumlah,
            'balon_jenis' => $request->balon_jenis,
            'stent_jumlah' => $request->jumlah_stent,
            'stent_jenis' => $request->jenis_stent,
            'stent_lokasi' => $request->lokasi_stent,
            'pacing' => $request->pacing,
            'iabp' => $request->iabp,
            'kondisi_pasien' => $request->kondisi_pasien,
            'pasien_pci' => $request->pasien_pci,
            'obat_obatan' => $request->obat_obatan,
            'tanggal_simpan' => date('Y-m-d H:i:s'),
            'created_at' => now(),
            'updated_at' => now()
        ];

        $simpan = DB::connection('mysql')
            ->table('rs_pasien_intra_tindakan')
            ->updateOrInsert($data_s, $data);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getTindakanIntra(Request $request)
    {
        $regno = $request->regno;
        $data = DB::connection('mysql')
            ->table('rs_pasien_intra_tindakan')
            ->where('no_reg', $regno)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }


    function addIntraPemantauan(Request $request)
    {
        $paramsawalsearch = array(
            'no_reg' => $request->regno,
            // 'med_rec'=>$request->med_rec,
        );
        // dd(auth()->user());
        $params = [
            // 'no_reg'=>$request->regno,
            'petugas_id' => 999,
            'tekanan_darah' => json_encode($request->tekanan_darah),
            'nadi' => json_encode($request->nadi),
            'pernapasan' => json_encode($request->pernapasan),
            'spo2' => json_encode($request->spo2),
            'perubahan_kondisi' => $request->perubahan_kondisi,
            'tanggal_simpan' => date('Y-m-d H:i:s'),
            'tanda_tangan' => '',
        ];

        // Add timestamps
        $params['created_at'] = now();
        $params['updated_at'] = now();

        try {
            $simpan = DB::table('rs_pasien_intra_pemantuan')
                ->updateOrInsert($paramsawalsearch, $params);
            return response()->json([
                'success' => $simpan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error inserting data: ' . $e->getMessage()
            ], 500);
        }
    }

    function addresikojatuh(Request $request)
    {
        $params_dx = [
            'reg_medrec' => $request->medrec,
            'reg_no' => $request->regno,
        ];

        $total_resiko_jatuh_dewasa = 
        $request->resiko_jatuh_bulan_terakhir +
        $request->resiko_jatuh_medis_sekunder +
        $request->resiko_jatuh_alat_bantu_jalan +
        $request->resiko_jatuh_infus +
        $request->resiko_jatuh_berjalan +
        $request->resiko_jatuh_mental;

        $total_resiko_jatuh_geriatri =
        $request->resiko_jatuh_geriatri_gangguan_gaya_berjalan +
        $request->resiko_jatuh_geriatri_pusing +
        $request->resiko_jatuh_geriatri_kebingungan +
        $request->resiko_jatuh_geriatri_nokturia +
        $request->resiko_jatuh_geriatri_kebingungan_intermiten +
        $request->resiko_jatuh_geriatri_kelemahan_umum +
        $request->resiko_jatuh_geriatri_obat_beresiko_tinggi +
        $request->resiko_jatuh_geriatri_riwayat_jatuh_12_bulan +
        $request->resiko_jatuh_geriatri_osteoporosis +
        $request->resiko_jatuh_geriatri_pendengaran_dan_pengeliatan +
        $request->resiko_jatuh_geriatri_70_tahun_keatas;

        $params = [
            'resiko_jatuh_bulan_terakhir' => $request->resiko_jatuh_bulan_terakhir,
            'resiko_jatuh_medis_sekunder' => $request->resiko_jatuh_medis_sekunder,
            'resiko_jatuh_alat_bantu_jalan' => $request->resiko_jatuh_alat_bantu_jalan,
            'resiko_jatuh_infus' => $request->resiko_jatuh_infus,
            'resiko_jatuh_berjalan' => $request->resiko_jatuh_berjalan,
            'resiko_jatuh_mental' => $request->resiko_jatuh_mental,
            'total_resiko_jatuh_dewasa' => $total_resiko_jatuh_dewasa,

            // default
            'resiko_jatuh_geriatri_gangguan_gaya_berjalan' => $request->resiko_jatuh_geriatri_gangguan_gaya_berjalan,
            'resiko_jatuh_geriatri_pusing' => $request->resiko_jatuh_geriatri_pusing,
            'resiko_jatuh_geriatri_kebingungan' => $request->resiko_jatuh_geriatri_kebingungan,
            'resiko_jatuh_geriatri_nokturia' => $request->resiko_jatuh_geriatri_nokturia,
            'resiko_jatuh_geriatri_kebingungan_intermiten' => $request->resiko_jatuh_geriatri_kebingungan_intermiten,
            'resiko_jatuh_geriatri_kelemahan_umum' => $request->resiko_jatuh_geriatri_kelemahan_umum,
            'resiko_jatuh_geriatri_obat_beresiko_tinggi' => $request->resiko_jatuh_geriatri_obat_beresiko_tinggi,
            'resiko_jatuh_geriatri_riwayat_jatuh_12_bulan' => $request->resiko_jatuh_geriatri_riwayat_jatuh_12_bulan,
            'resiko_jatuh_geriatri_osteoporosis' => $request->resiko_jatuh_geriatri_osteoporosis,
            'resiko_jatuh_geriatri_pendengaran_dan_pengeliatan' => $request->resiko_jatuh_geriatri_pendengaran_dan_pengeliatan,
            'resiko_jatuh_geriatri_70_tahun_keatas' => $request->resiko_jatuh_geriatri_70_tahun_keatas,
            'total_resiko_jatuh_geriatri' => $total_resiko_jatuh_geriatri,
        ];

        $simpan = DB::connection('mysql')
            ->table('skrining_resiko_jatuh')
            ->updateOrInsert($params_dx, $params);

        return response()->json([
            'success' => $simpan
        ]);
    }


    function getSkrinningJatuh(Request $request)
    {
        $regno = $request->regno;
        $datajatuh = DB::connection('mysql')
            ->table('skrining_resiko_jatuh')
            ->where('reg_no', $regno)
            ->first();


        return response()->json([
            'success' => true,
            'data' => $datajatuh
        ]);
    }


    //obgyn

    function addAssesmentObgyn(Request $request)
    {
        $paramsawalsearch = array(
            'no_reg' => $request->no_reg,
            'med_rec' => $request->med_rec,
        );

        $paramsobgyn = $request->all();
        unset($paramsobgyn['user_id']);
        unset($paramsobgyn['med_rec']);
        unset($paramsobgyn['no_reg']);

        $paramsobgyn['med_rec'] = $request->med_rec;
        $paramsobgyn['no_reg'] = $request->no_reg;

        $simpan = DB::connection('mysql')
            ->table("pengkajian_awal_bidan")
            ->updateOrInsert($paramsawalsearch, $paramsobgyn);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getAssesmentObgyn(Request $request)
    {
        $regno = $request->regno;
        $data = DB::connection('mysql')
            ->table('pengkajian_awal_bidan')
            ->where('no_reg', '=', $regno)
            ->get()->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function addSkorSadPerson(Request $request)
    {
        $paramsawalsearch = array(
            'no_reg' => $request->no_reg,
            'med_rec' => $request->med_rec,
        );

        $paramsobgyn = $request->all();
        unset($paramsobgyn['user_id']);
        unset($paramsobgyn['med_rec']);
        unset($paramsobgyn['no_reg']);

        $paramsobgyn['med_rec'] = $request->med_rec;
        $paramsobgyn['no_reg'] = $request->no_reg;

        $simpan = DB::connection('mysql')
            ->table("skor_sad_person")
            ->updateOrInsert($paramsawalsearch, $paramsobgyn);

        // $params=$request->all();
        // unset($params['user_id']);
        // $simpan=DB::connection('mysql')
        //     ->table('skor_sad_person')
        //     ->insert($params);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getSkorSadPerson(Request $request)
    {
        $regno = $request->regno;
        $data = DB::connection('mysql')
            ->table('skor_sad_person')
            ->where('no_reg', '=', $regno)
            ->get()->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function addriwayatmensturasi(Request $request)
    {
        $paramsawalsearch = array(
            'no_reg' => $request->no_reg,
            'med_rec' => $request->med_rec,
        );

        $paramsobgyn = $request->all();
        unset($paramsobgyn['user_id']);
        unset($paramsobgyn['med_rec']);
        unset($paramsobgyn['no_reg']);

        $paramsobgyn['med_rec'] = $request->med_rec;
        $paramsobgyn['no_reg'] = $request->no_reg;

        $simpan = DB::connection('mysql')
            ->table("riwayat_menstruasi")
            ->updateOrInsert($paramsawalsearch, $paramsobgyn);

        // $params=$request->all();
        // unset($params['user_id']);
        // $simpan=DB::connection('mysql')
        //     ->table('riwayat_menstruasi')
        //     ->insert($params);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getRiwayatMenstruasi(Request $request)
    {
        $regno = $request->regno;
        $data = DB::connection('mysql')
            ->table('riwayat_menstruasi')
            ->where('no_reg', '=', $regno)
            ->get()->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function addstatusperkawinan(Request $request)
    {
        $paramsawalsearch = array(
            'no_reg' => $request->no_reg,
            'med_rec' => $request->med_rec,
        );

        $paramsobgyn = $request->all();
        unset($paramsobgyn['user_id']);
        unset($paramsobgyn['med_rec']);
        unset($paramsobgyn['no_reg']);

        $paramsobgyn['med_rec'] = $request->med_rec;
        $paramsobgyn['no_reg'] = $request->no_reg;

        $simpan = DB::connection('mysql')
            ->table("riwayat_perkawinan")
            ->updateOrInsert($paramsawalsearch, $paramsobgyn);

        // $params=$request->all();
        // unset($params['user_id']);
        // $simpan=DB::connection('mysql')
        //     ->table('riwayat_perkawinan')
        //     ->insert($params);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getStatusPerkawinan(Request $request)
    {
        $regno = $request->regno;
        $data = DB::connection('mysql')
            ->table('riwayat_perkawinan')
            ->where('no_reg', '=', $regno)
            ->get()->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function addriwayatkehamilan(Request $request)
    {
        $paramsawalsearch = array(
            'no_reg' => $request->no_reg,
            'med_rec' => $request->med_rec,
        );

        $paramsobgyn = $request->all();
        unset($paramsobgyn['user_id']);
        unset($paramsobgyn['med_rec']);
        unset($paramsobgyn['no_reg']);

        $paramsobgyn['med_rec'] = $request->med_rec;
        $paramsobgyn['no_reg'] = $request->no_reg;

        $simpan = DB::connection('mysql')
            ->table("riwayat_kehamilan")
            ->updateOrInsert($paramsawalsearch, $paramsobgyn);

        // $params=$request->all();
        // unset($params['user_id']);
        // $simpan=DB::connection('mysql')
        //     ->table('riwayat_kehamilan')
        //     ->insert($params);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getriwayatkehamilan(Request $request)
    {
        $regno = $request->regno;
        $data = DB::connection('mysql')
            ->table('riwayat_kehamilan')
            ->where('no_reg', '=', $regno)
            ->get()->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function addskrininggiziobgyn(Request $request)
    {
        $paramsawalsearch = array(
            'no_reg' => $request->no_reg,
            'med_rec' => $request->med_rec,
        );

        $paramsobgyn = $request->all();
        unset($paramsobgyn['user_id']);
        unset($paramsobgyn['med_rec']);
        unset($paramsobgyn['no_reg']);

        $paramsobgyn['med_rec'] = $request->med_rec;
        $paramsobgyn['no_reg'] = $request->no_reg;

        $simpan = DB::connection('mysql')
            ->table("skrining_gizi_obgyn")
            ->updateOrInsert($paramsawalsearch, $paramsobgyn);

        // $params=$request->all();
        // unset($params['user_id']);
        // $simpan=DB::connection('mysql')
        //     ->table('skrining_gizi_obgyn')
        //     ->insert($params);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getskrininggiziobgyn(Request $request)
    {
        $regno = $request->regno;
        $data = DB::connection('mysql')
            ->table('skrining_gizi_obgyn')
            ->where('no_reg', '=', $regno)
            ->get()->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function addskalawongbaker(Request $request)
    {
        $paramsawalsearch = array(
            'no_reg' => $request->no_reg,
            'med_rec' => $request->med_rec,
        );

        $paramsobgyn = $request->all();
        unset($paramsobgyn['user_id']);
        unset($paramsobgyn['med_rec']);
        unset($paramsobgyn['no_reg']);

        $paramsobgyn['med_rec'] = $request->med_rec;
        $paramsobgyn['no_reg'] = $request->no_reg;

        $simpan = DB::connection('mysql')
            ->table("skala_wong_baker")
            ->updateOrInsert($paramsawalsearch, $paramsobgyn);

        // $params=$request->all();
        // unset($params['user_id']);
        // $simpan=DB::connection('mysql')
        //     ->table('skala_wong_baker')
        //     ->insert($params);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getskalawongbaker(Request $request)
    {
        $regno = $request->regno;
        $data = DB::connection('mysql')
            ->table('skala_wong_baker')
            ->where('no_reg', '=', $regno)
            ->get()->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function addbehaviorscalepainobgyn(Request $request)
    {
        $paramsawalsearch = array(
            'no_reg' => $request->no_reg,
            'med_rec' => $request->med_rec,
        );

        $paramsobgyn = $request->all();
        unset($paramsobgyn['user_id']);
        unset($paramsobgyn['med_rec']);
        unset($paramsobgyn['no_reg']);

        $paramsobgyn['med_rec'] = $request->med_rec;
        $paramsobgyn['no_reg'] = $request->no_reg;

        $simpan = DB::connection('mysql')
            ->table("behavior_pain_scale_obgyn")
            ->updateOrInsert($paramsawalsearch, $paramsobgyn);

        // $params=$request->all();
        // unset($params['user_id']);
        // $simpan=DB::connection('mysql')
        //     ->table('behavior_pain_scale_obgyn')
        //     ->insert($params);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getbehaviorscalepainobgyn(Request $request)
    {
        $regno = $request->regno;
        $data = DB::connection('mysql')
            ->table('behavior_pain_scale_obgyn')
            ->where('no_reg', '=', $regno)
            ->get()->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }


    function addadlobgyn(Request $request)
    {
        $paramsawalsearch = array(
            'no_reg' => $request->no_reg,
            'med_rec' => $request->med_rec,
        );

        $paramsobgyn = $request->all();
        unset($paramsobgyn['user_id']);
        unset($paramsobgyn['med_rec']);
        unset($paramsobgyn['no_reg']);

        $paramsobgyn['med_rec'] = $request->med_rec;
        $paramsobgyn['no_reg'] = $request->no_reg;

        $simpan = DB::connection('mysql')
            ->table("adl_obgyn")
            ->updateOrInsert($paramsawalsearch, $paramsobgyn);

        // $params=$request->all();
        // unset($params['user_id']);
        // $simpan=DB::connection('mysql')
        //     ->table('adl_obgyn')
        //     ->insert($params);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getadlobgyn(Request $request)
    {
        $regno = $request->regno;
        $data = DB::connection('mysql')
            ->table('adl_obgyn')
            ->where('no_reg', '=', $regno)
            ->get()->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function addskriningresikojatuhobgyn(Request $request)
    {
        $paramsawalsearch = array(
            'no_reg' => $request->no_reg,
            'med_rec' => $request->med_rec,
        );

        $paramsobgyn = $request->all();
        unset($paramsobgyn['user_id']);
        unset($paramsobgyn['med_rec']);
        unset($paramsobgyn['no_reg']);

        $paramsobgyn['med_rec'] = $request->med_rec;
        $paramsobgyn['no_reg'] = $request->no_reg;

        $simpan = DB::connection('mysql')
            ->table("skrining_resiko_jatuh_obgyn")
            ->updateOrInsert($paramsawalsearch, $paramsobgyn);

        // $params=$request->all();
        // unset($params['user_id']);
        // $simpan=DB::connection('mysql')
        //     ->table('skrining_resiko_jatuh_obgyn')
        //     ->insert($params);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getskriningresikojatuhobgyn(Request $request)
    {
        $regno = $request->regno;
        $data = DB::connection('mysql')
            ->table('skrining_resiko_jatuh_obgyn')
            ->where('no_reg', '=', $regno)
            ->get()->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function addpengkajiankulit(Request $request)
    {
        $paramsawalsearch = array(
            'no_reg' => $request->no_reg,
            'med_rec' => $request->med_rec,
        );

        $paramsobgyn = $request->all();
        unset($paramsobgyn['user_id']);
        unset($paramsobgyn['med_rec']);
        unset($paramsobgyn['no_reg']);

        $paramsobgyn['med_rec'] = $request->med_rec;
        $paramsobgyn['no_reg'] = $request->no_reg;

        $simpan = DB::connection('mysql')
            ->table("pengkajian_kulit")
            ->updateOrInsert($paramsawalsearch, $paramsobgyn);

        // $params=$request->all();
        // unset($params['user_id']);
        // $simpan=DB::connection('mysql')
        //     ->table('pengkajian_kulit')
        //     ->insert($params);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getpengkajiankulit(Request $request)
    {
        $regno = $request->regno;
        $data = DB::connection('mysql')
            ->table('pengkajian_kulit')
            ->where('no_reg', '=', $regno)
            ->get()->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function addpengkajiankebutuhanaktifitas(Request $request)
    {
        $paramsawalsearch = array(
            'no_reg' => $request->no_reg,
            'med_rec' => $request->med_rec,
        );

        $paramsobgyn = $request->all();
        unset($paramsobgyn['user_id']);
        unset($paramsobgyn['med_rec']);
        unset($paramsobgyn['no_reg']);

        $paramsobgyn['med_rec'] = $request->med_rec;
        $paramsobgyn['no_reg'] = $request->no_reg;

        $simpan = DB::connection('mysql')
            ->table("pengkajian_kebutuhan_aktifitas")
            ->updateOrInsert($paramsawalsearch, $paramsobgyn);

        // $params=$request->all();
        // unset($params['user_id']);
        // $simpan=DB::connection('mysql')
        //     ->table('pengkajian_kebutuhan_aktifitas')
        //     ->insert($params);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getpengkajiankebutuhanaktifitas(Request $request)
    {
        $regno = $request->regno;
        $data = DB::connection('mysql')
            ->table('pengkajian_kebutuhan_aktifitas')
            ->where('no_reg', '=', $regno)
            ->get()->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function addpengkajiankebutuhannutrisi(Request $request)
    {
        $paramsawalsearch = array(
            'no_reg' => $request->no_reg,
            'med_rec' => $request->med_rec,
        );

        $paramsobgyn = $request->all();
        unset($paramsobgyn['user_id']);
        unset($paramsobgyn['med_rec']);
        unset($paramsobgyn['no_reg']);

        $paramsobgyn['med_rec'] = $request->med_rec;
        $paramsobgyn['no_reg'] = $request->no_reg;

        $simpan = DB::connection('mysql')
            ->table("pengkajian_kebutuhan_nutrisi")
            ->updateOrInsert($paramsawalsearch, $paramsobgyn);

        // $params=$request->all();
        // unset($params['user_id']);
        // $simpan=DB::connection('mysql')
        //     ->table('pengkajian_kebutuhan_nutrisi')
        //     ->insert($params);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getpengkajiankebutuhannutrisi(Request $request)
    {
        $regno = $request->regno;
        $data = DB::connection('mysql')
            ->table('pengkajian_kebutuhan_nutrisi')
            ->where('no_reg', '=', $regno)
            ->get()->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function addpengkajiankebutuhaneliminasi(Request $request)
    {
        $paramsawalsearch = array(
            'no_reg' => $request->no_reg,
            'med_rec' => $request->med_rec,
        );

        $paramsobgyn = $request->all();
        unset($paramsobgyn['user_id']);
        unset($paramsobgyn['med_rec']);
        unset($paramsobgyn['no_reg']);

        $paramsobgyn['med_rec'] = $request->med_rec;
        $paramsobgyn['no_reg'] = $request->no_reg;

        $simpan = DB::connection('mysql')
            ->table("pengkajian_kebutuhan_eliminasi")
            ->updateOrInsert($paramsawalsearch, $paramsobgyn);

        // $params=$request->all();
        // unset($params['user_id']);
        // $simpan=DB::connection('mysql')
        //     ->table('pengkajian_kebutuhan_eliminasi')
        //     ->insert($params);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getpengkajiankebutuhaneliminasi(Request $request)
    {
        $regno = $request->regno;
        $data = DB::connection('mysql')
            ->table('pengkajian_kebutuhan_eliminasi')
            ->where('no_reg', '=', $regno)
            ->get()->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function addPengkajianPasienAnak(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->reg_no,
            'reg_medrec' => $request->medrec,
        );

        $paramspasienanak = array(
            'hospitalisasi' => $request->hospitalisasi,
            'jumlah_hospitalisasi' => $request->jumlah_hospitalisasi,
            'pola_asuh' => $request->pola_asuh,
            'orang_terdekat' => $request->orang_terdekat,
            'tipe_anak' => $request->tipe_anak,
            'kebiasaan_perilaku_unik' => $request->kebiasaan_perilaku_unik,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'provocating' => $request->provocating,
            'quality' => $request->quality,
            'region' => $request->region,
            'saverity' => $request->saverity,
            'understanding' => $request->understanding,
            'value' => $request->value,
            'face' => $request->face,
            'legs' => $request->legs,
            'activity' => $request->activity,
            'cry' => $request->cry,
            'consolability' => $request->consolability,
            'onset' => $request->onset,
            // 'pilihan_menit'=>$request->pilihan_menit,
        );

        $simpan = DB::connection('mysql')
            ->table('pengkajian_awal_anak_perawat')
            ->updateOrInsert($paramsawalsearch, $paramspasienanak);
        // ->insert($paramspasienanak);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function addMonitoringTransfusiDarah(Request $request)
    {
        $paramsmonitoringdarah = array(
            'reg_no' => $request->reg_no,
            'reg_medrec' => $request->medrec,
            'nomor_kantong' => $request->nomor_kantong,
            'golongan_darah' => $request->golongan_darah,
            'jenis_darah' => $request->jenis_darah,
            'tanggal_kadarluarsa' => $request->tanggal_kadarluarsa,
            'penerima_darah' => $request->penerima_darah,
            'waktu_transfusi' => $request->waktu_transfusi,
            'keadaan_umum' => $request->keadaan_umum,
            'suhu_tubuh' => $request->suhu_tubuh,
            'nadi' => $request->nadi,
            'tekanan_darah' => $request->tekanan_darah,
            'respiratory_rate' => $request->respiratory_rate,
            'volume_warna_urin' => $request->volume_warna_urin,
            'gejala_reaksi_transfusi' => $request->gejala_reaksi_transfusi,
            'pilihan_menit' => $request->pilihan_menit,
        );

        $simpan = DB::connection('mysql')
            ->table('monitoring_transfusi_darah')
            ->Insert($paramsmonitoringdarah);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function addLaporanPersalinanObgyn(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->reg_no,
            'reg_medrec' => $request->reg_medrec,
        );

        $paramsobgyn = $request->all();
        unset($paramsobgyn['user_id']);
        unset($paramsobgyn['reg_medrec']);
        unset($paramsobgyn['reg_no']);

        $paramsobgyn['reg_medrec'] = $request->reg_medrec;
        $paramsobgyn['reg_no'] = $request->reg_no;

        $simpan = DB::connection('mysql')
            ->table("laporan_persalinan")
            ->updateOrInsert($paramsawalsearch, $paramsobgyn);

        // $params=$request->all();
        // unset($params['user_id']);
        // $simpan=DB::connection('mysql')
        //     ->table('laporan_persalinan')
        //     ->insert($params);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function getLaporanPersalinanObgyn(Request $request)
    {
        $regno = $request->regno;
        $data = DB::connection('mysql')
            ->table('laporan_persalinan')
            ->where('reg_no', '=', $regno)
            ->get()->first();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    function simpan_pra_tindakan(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->reg_no,
            'med_rec' => $request->medrec,
        );

        $paramsawalpratindakan = array(
            'pra_suhu' => $request->pra_suhu,
            'pra_nadi' => $request->pra_nadi,
            'pra_rr' => $request->pra_rr,
            'pra_td' => $request->pra_td,
            'pra_skor_nyeri' => $request->pra_skor_nyeri,
            'pra_tb' => $request->pra_tb,
            'pra_bb' => $request->pra_bb,
            'pra_status_mental' => json_encode($request->pra_status_mental),
            'pra_penyakit_dahulu' => json_encode($request->pra_penyakit_dahulu),
            'pra_pengobatan_saat_ini' => $request->pra_pengobatan_saat_ini,
            'pra_katerisasi' => $request->pra_katerisasi,
            'pra_stent' => json_encode($request->pra_stent),
            'pra_stent_di' => $request->pra_stent_di,
            'pra_jenis' => $request->pra_jenis,
            'pra_kapan' => $request->pra_kapan,
            'pra_di' => $request->pra_di,
            'pra_alergi' => $request->pra_alergi,
            'pra_alergi_text' => $request->pra_alergi_text,
            'cath_signin_ureum' => $request->cath_signin_ureum,
            'cath_signin_creatinin' => $request->cath_signin_creatinin,
            'cath_signin_hbsag' => $request->cath_signin_hbsag,
            'cath_signin_gds' => $request->cath_signin_gds,
            'cath_signin_trombosit' => $request->cath_signin_trombosit,
            'cath_signin_pt' => $request->cath_signin_pt,
            'cath_signin_hb' => $request->cath_signin_hb,
            'cath_signin_aptt' => $request->cath_signin_aptt,
            'ceklist_kesiapan_ruang' => $request->ceklist_kesiapan_ruang,

            'verif_ruangan_1' => $request->verif_ruangan_1,
            'verif_cathlab_1' => $request->verif_cathlab_1,
            'verif_keterangan_1' => $request->verif_keterangan_1,
            'verif_ruangan_2' => $request->verif_ruangan_2,
            'verif_cathlab_2' => $request->verif_cathlab_2,
            'verif_keterangan_2' => $request->verif_keterangan_2,
            'verif_ruangan_3' => $request->verif_ruangan_3,
            'verif_cathlab_3' => $request->verif_cathlab_3,
            'verif_keterangan_3' => $request->verif_keterangan_3,
            'verif_ruangan_4' => $request->verif_ruangan_4,
            'verif_cathlab_4' => $request->verif_cathlab_4,
            'verif_keterangan_4' => $request->verif_keterangan_4,
            'verif_ruangan_5' => $request->verif_ruangan_5,
            'verif_cathlab_5' => $request->verif_cathlab_5,
            'verif_keterangan_5' => $request->verif_keterangan_5,
            'verif_ruangan_6' => $request->verif_ruangan_6,
            'verif_cathlab_6' => $request->verif_cathlab_6,
            'verif_keterangan_6' => $request->verif_keterangan_6,
            'verif_ruangan_7' => $request->verif_ruangan_7,
            'verif_cathlab_7' => $request->verif_cathlab_7,
            'verif_keterangan_7' => $request->verif_keterangan_7,
            'verif_ruangan_8' => $request->verif_ruangan_8,
            'verif_cathlab_8' => $request->verif_cathlab_8,
            'verif_keterangan_8' => $request->verif_keterangan_8,

            'persiapan_ruangan_1' => $request->persiapan_ruangan_1,
            'persiapan_cathlab_1' => $request->persiapan_cathlab_1,
            'persiapan_keterangan_1' => $request->persiapan_keterangan_1,
            'persiapan_ruangan_2' => $request->persiapan_ruangan_2,
            'persiapan_cathlab_2' => $request->persiapan_cathlab_2,
            'persiapan_keterangan_2' => $request->persiapan_keterangan_2,
            'persiapan_ruangan_3' => $request->persiapan_ruangan_3,
            'persiapan_cathlab_3' => $request->persiapan_cathlab_3,
            'persiapan_keterangan_3' => $request->persiapan_keterangan_3,
            'persiapan_ruangan_4' => $request->persiapan_ruangan_4,
            'persiapan_cathlab_4' => $request->persiapan_cathlab_4,
            'persiapan_keterangan_4' => $request->persiapan_keterangan_4,
            'persiapan_ruangan_5' => $request->persiapan_ruangan_5,
            'persiapan_cathlab_5' => $request->persiapan_cathlab_5,
            'persiapan_keterangan_5' => $request->persiapan_keterangan_5,
            'persiapan_ruangan_6' => $request->persiapan_ruangan_6,
            'persiapan_cathlab_6' => $request->persiapan_cathlab_6,
            'persiapan_keterangan_6' => $request->persiapan_keterangan_6,
            'persiapan_ruangan_7' => $request->persiapan_ruangan_7,
            'persiapan_cathlab_7' => $request->persiapan_cathlab_7,
            'persiapan_keterangan_7' => $request->persiapan_keterangan_7,
            'persiapan_ruangan_8' => $request->persiapan_ruangan_8,
            'persiapan_cathlab_8' => $request->persiapan_cathlab_8,
            'persiapan_keterangan_8' => $request->persiapan_keterangan_8,
            'persiapan_ruangan_9' => $request->persiapan_ruangan_9,
            'persiapan_cathlab_9' => $request->persiapan_cathlab_9,
            'persiapan_keterangan_9' => $request->persiapan_keterangan_9,
            'persiapan_ruangan_10' => $request->persiapan_ruangan_10,
            'persiapan_cathlab_10' => $request->persiapan_cathlab_10,
            'persiapan_keterangan_10' => $request->persiapan_keterangan_10,
            'persiapan_ruangan_11' => $request->persiapan_ruangan_11,
            'persiapan_cathlab_11' => $request->persiapan_cathlab_11,
            'persiapan_keterangan_11' => $request->persiapan_keterangan_11,
            'persiapan_ruangan_12' => $request->persiapan_ruangan_12,
            'persiapan_cathlab_12' => $request->persiapan_cathlab_12,
            'persiapan_keterangan_12' => $request->persiapan_keterangan_12,

            'tgl_jam_ruangan' => $request->tgl_jam_ruangan,
            'perawat_ruangan' => $request->perawat_ruangan,
            'tgl_jam_cathlab' => $request->tgl_jam_cathlab,
            'perawat_cathlab' => $request->perawat_cathlab,

        );

        $simpan = DB::connection('mysql')
            ->table('rs_catatan_keperawatan_pra_tindakan')
            ->updateOrInsert($paramsawalsearch, $paramsawalpratindakan);
        // ->insert($paramspasienanak);

        return response()->json([
            'success' => $simpan
        ]);
    }

    function simpan_paska_tindakan(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->reg_no,
            'med_rec' => $request->medrec,
        );

        $paramspaska = array(
            'dokter_yang_merawat' => $request->dokter_yang_merawat,
            'diagnosa_medis' => $request->diagnosa_medis,
            'masalah_keperawatan' => $request->masalah_keperawatan,
            'prosedur_yang_dilakukan' => $request->prosedur_yang_dilakukan,
            'hasil_prosedur' => $request->hasil_prosedur,
            'keadaan_umum' => $request->keadaan_umum,
            'gcs' => $request->gcs,
            'pupil_reaksi_kanan' => $request->pupil_reaksi_kanan,
            'pupil_reaksi_kiri' => $request->pupil_reaksi_kiri,
            'td' => $request->td,
            'nadi' => $request->nadi,
            'rr' => $request->rr,
            'suhu' => $request->suhu,
            'spo2' => $request->spo2,
            'skala_nyeri' => $request->skala_nyeri,
            'akses' => json_encode($request->akses),
            'sheat_aff' => $request->sheat_aff,
            'teknik_hemostasis' => json_encode($request->teknik_hemostasis),
            'komplikasi' => $request->komplikasi,
            'total_kontras' => $request->total_kontras,
            'diet' => json_encode($request->diet),
            'bab' => $request->bab,
            'bak' => $request->bak,
            'mobilisasi' => json_encode($request->mobilisasi),
            'hal_istimewa_pasien' => $request->hal_istimewa_pasien,
            'assessment' => $request->assessment,
            'akses_femoralis_text' => $request->akses_femoralis_text,
            'teknik_hemostasis_text' => $request->teknik_hemostasis_text,
            'diet_khusus_text' => $request->diet_khusus_text,
            'recommendations' => json_encode($request->recommendations),
        );

        $simpan = DB::connection('mysql')
            ->table('rs_paska_tindakan')
            ->updateOrInsert($paramsawalsearch, $paramspaska);
    }

    function simpan_observasi_paska_tindakan(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->reg_no,
            'med_rec' => $request->medrec,
        );

        $paramsobservasi = array(
            'tanggal_observasi' => $request->tanggal_observasi,
            'waktu_observasi' => $request->waktu_observasi,
            'tekanan_darah' => $request->tekanan_darah,
            'nadi' => $request->nadi,
            'pernapasan' => $request->pernapasan,
            'spo2' => $request->spo2,
            'tanggal_sirkulasi' => $request->tanggal_sirkulasi,
            'waktu_sirkulasi' => $request->waktu_sirkulasi,
            'nadi_sirkulasi' => $request->nadi_sirkulasi,
            'suhu_kulit' => $request->suhu_kulit,
            'warna' => $request->warna,
            'isi_nadi' => $request->isi_nadi,
            'sensasi' => $request->sensasi,
            'pergerakan' => $request->pergerakan,
            'pendarahan_lipat_paha' => $request->pendarahan_lipat_paha,
            'hematoma' => $request->hematoma,
        );

        $simpan = DB::connection('mysql')
            ->table('rs_observasi_paska_tindakan')
            ->updateOrInsert($paramsawalsearch, $paramsobservasi);
    }

    function simpan_assesment_bayi(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->reg_no,
            'med_rec' => $request->medrec,
        );

        $paramsbayi = array(
            'no_rm_bayi' => $request->no_rm_bayi,
            'no_rm_ibu' => $request->no_rm_ibu,
            'nama_bayi' => $request->nama_bayi,
            'tempat_lahir_bayi' => $request->tempat_lahir_bayi,
            'tanggal_lahir_bayi' => $request->tanggal_lahir_bayi,
            'jenis_kelamin_bayi' => $request->jenis_kelamin_bayi,
            'nama_ibu' => $request->nama_ibu,
            'umur_ibu' => $request->umur_ibu,
            'agama_ibu' => $request->agama_ibu,
            'suku_bangsa_ibu' => $request->suku_bangsa_ibu,
            'pendidikan_ibu' => $request->pendidikan_ibu,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'alamat_ibu' => $request->alamat_ibu,
            'nama_ayah' => $request->nama_ayah,
            'umur_ayah' => $request->umur_ayah,
            'agama_ayah' => $request->agama_ayah,
            'suku_bangsa_ayah' => $request->suku_bangsa_ayah,
            'pendidikan_ayah' => $request->pendidikan_ayah,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'alamat_ayah' => $request->alamat_ayah,
            'pendarahan' => $request->pendarahan,
            'pre_eklampsia' => $request->pre_eklampsia,
            'eklampsia' => $request->eklampsia,
            'penyakit_kelamin' => $request->penyakit_kelamin,
            'lain_lain_riwayat_kehamilan' => $request->lain_lain_riwayat_kehamilan,
            'makanan' => $request->makanan,
            'obat_obatan' => $request->obat_obatan,
            'merokok' => $request->merokok,
            'lain_lain_kebiasaan' => $request->lain_lain_kebiasaan,
            'jenis_persalinan' => $request->jenis_persalinan,
            'ditolong_oleh' => $request->ditolong_oleh,
            'kala_satu' => $request->kala_satu,
            'kala_dua' => $request->kala_dua,
            'ketuban_Pecah' => $request->ketuban_Pecah,
            'warna' => $request->warna,
            'bau' => $request->bau,
            'komplikasi_persalinan_ibu' => $request->komplikasi_persalinan_ibu,
            'komplikasi_persalinan_bayi' => $request->komplikasi_persalinan_bayi,
            'warna_kulit_1_menit' => $request->warna_kulit_1_menit,
            'denyut_nadi_1_menit' => $request->denyut_nadi_1_menit,
            'reaksi_rangsangan_1_menit' => $request->reaksi_rangsangan_1_menit,
            'warna_kulit_5_menit' => $request->warna_kulit_5_menit,
            'denyut_nadi_5_menit' => $request->denyut_nadi_5_menit,
            'reaksi_rangsangan_5_menit' => $request->reaksi_rangsangan_5_menit,
            'pengisapan_lendir' => $request->pengisapan_lendir,
            'ambu' => $request->ambu,
            'lama_ambu' => $request->lama_ambu,
            'massage_jantung' => $request->massage_jantung,
            'lama_massage_jantung' => $request->lama_massage_jantung,
            'intubasi' => $request->intubasi,
            'lama_intubasi' => $request->lama_intubasi,
            'pemakaian_oksigen' => $request->pemakaian_oksigen,
            'lama_pemakaian_oksigen' => $request->lama_pemakaian_oksigen,
            'therapy' => $request->therapy,
            'keterangan' => $request->keterangan,
        );

        $simpan = DB::connection('mysql')
            ->table('rs_assesment_bayi')
            ->updateOrInsert($paramsawalsearch, $paramsbayi);
    }

    function simpan_pemeriksaan_bayi(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->reg_no,
            'med_rec' => $request->medrec,
        );

        $paramsbayi2 = array(
            'keadaan_umum' => $request->keadaan_umum,
            'suhu' => $request->suhu,
            'pernafasan' => $request->pernafasan,
            'denyut_nadi' => $request->denyut_nadi,
            'berat_badan' => $request->berat_badan,
            'panjang_badan' => $request->panjang_badan,
            'bentuk_kepala' => $request->bentuk_kepala,
            'fontanel' => $request->fontanel,
            'molding' => $request->molding,
            'caput_succedaneum' => $request->caput_succedaneum,
            'chepal_hematoom' => $request->chepal_hematoom,
            'muka' => $request->muka,
            'conjungtiva' => $request->conjungtiva,
            'sklera' => $request->sklera,
            'bola_mata' => $request->bola_mata,
            'gerakan_bola_mata' => $request->gerakan_bola_mata,
            'bentuk_telinga' => $request->bentuk_telinga,
            'posisi_telinga' => $request->posisi_telinga,
            'lobang_telinga' => $request->lobang_telinga,
            'bibir' => $request->bibir,
            'leher' => $request->leher,
            'dada' => $request->dada,
            'tali_pusat' => $request->tali_pusat,
            'posisi_punggung' => $request->posisi_punggung,
            'fleksibilitas_tulang_punggung' => $request->fleksibilitas_tulang_punggung,
            'kelainan_punggung' => $request->kelainan_punggung,
            'ekstermitas_atas' => $request->ekstermitas_atas,
            'ekstermitas_bawah' => $request->ekstermitas_bawah,
            'abdomen_bentuk' => $request->abdomen_bentuk,
            'abdomen_palpasi' => $request->abdomen_palpasi,
            'kelainan_abdomen' => $request->kelainan_abdomen,
            'genetalia_jenis_kelamin' => $request->genetalia_jenis_kelamin,
            'genetalia_kelainan' => $request->genetalia_kelainan,
            'anus' => $request->anus,
            'menghisap' => $request->menghisap,
            'menoleh' => $request->menoleh,
            'menggenggam' => $request->menggenggam,
            'babinski' => $request->babinski,
            'moro' => $request->moro,
            'tonic_nack' => $request->tonic_nack,
            'lingkar_kepala' => $request->lingkar_kepala,
            'lingkar_dada' => $request->lingkar_dada,
            'lingkar_lengan_atas' => $request->lingkar_lengan_atas,
            'miksi' => $request->miksi,
            'meconeum' => $request->meconeum,
            'hb' => $request->hb,
            'golongan_darah' => $request->golongan_darah,
            'ht' => $request->ht,
            'pengobatan' => $request->pengobatan,
        );

        $simpan = DB::connection('mysql')
            ->table('rs_pemeriksaan_bayi')
            ->updateOrInsert($paramsawalsearch, $paramsbayi2);
    }

    function simpan_cathlab_signin(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->reg_no,
            'med_rec' => $request->medrec,
        );

        $paramssignin = array(
            'cath_signin_pukul' => $request->cath_signin_pukul,
            'cath_signin_identifikasi' => $request->cath_signin_identifikasi,
            'cath_signin_persetujuan' => $request->cath_signin_persetujuan,
            'cath_signin_anastesi' => $request->cath_signin_anastesi,
            'cath_signin_prosedur' => $request->cath_signin_prosedur,
            'cath_signin_puasa' => $request->cath_signin_puasa,
            'cath_signin_alergi' => $request->cath_signin_alergi,
            'cath_signin_alergi_text' => $request->cath_signin_alergi_text,
            'cath_signin_antibiotik' => $request->cath_signin_antibiotik,
            'cath_signin_antibiotik_text' => $request->cath_signin_antibiotik_text,
            'cath_signin_ureum' => $request->cath_signin_ureum,
            'cath_signin_creatinin' => $request->cath_signin_creatinin,
            'cath_signin_pt' => $request->cath_signin_pt,
            'cath_signin_aptt' => $request->cath_signin_aptt,
            'cath_signin_lainnya' => $request->cath_signin_lainnya,
            'cath_signin_laboratorium' => $request->cath_signin_laboratorium,
            'cath_signin_ekg' => $request->cath_signin_ekg,
            'cath_signin_infus' => $request->cath_signin_infus,
            'cath_signin_gigi' => $request->cath_signin_gigi,
            'cath_signin_mesin' => $request->cath_signin_mesin,
            'cath_signin_alat' => $request->cath_signin_alat,
            'cath_signin_perawat' => $request->cath_signin_perawat,

        );

        $simpan = DB::connection('mysql')
            ->table('rs_cathlab_sign_in')
            ->updateOrInsert($paramsawalsearch, $paramssignin);
    }

    function simpan_cathlab_timeout(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->reg_no,
            'med_rec' => $request->medrec,
        );

        $paramssignin = array(
            'cath_timeout_pukul' => $request->cath_timeout_pukul,
            'cath_timeout_nama_pasien' => $request->cath_timeout_nama_pasien,
            'cath_timeout_tgl_lahir' => $request->cath_timeout_tgl_lahir,
            'cath_timeout_diagnostik' => $request->cath_timeout_diagnostik,
            'cath_timeout_intervensi' => $request->cath_timeout_intervensi,
            'cath_timeout_tim' => $request->cath_timeout_tim,
            'cath_timeout_tim_dokter' => $request->cath_timeout_tim_dokter,
            'cath_timeout_tim_scrub' => $request->cath_timeout_tim_scrub,
            'cath_timeout_tim_circulating' => $request->cath_timeout_tim_circulating,
            'cath_timeout_tim_dokter_anastesi' => $request->cath_timeout_tim_dokter_anastesi,
            'cath_timeout_tim_petugas_lain' => $request->cath_timeout_tim_petugas_lain,
            'cath_timeout_obat' => $request->cath_timeout_obat,
            'cath_timeout_ureum' => $request->cath_timeout_ureum,
            'cath_timeout_kreatinin' => $request->cath_timeout_kreatinin,
            'cath_timeout_akses' => $request->cath_timeout_akses,
            'cath_timeout_estimasi' => $request->cath_timeout_estimasi,
            'cath_timeout_tindakan' => $request->cath_timeout_tindakan,
            'cath_timeout_pertanyaan' => $request->cath_timeout_pertanyaan,
            'cath_timeout_tim_siap' => $request->cath_timeout_tim_siap,
            'cath_timeout_perawat' => $request->cath_timeout_perawat,

        );

        $simpan = DB::connection('mysql')
            ->table('rs_cathlab_time_out')
            ->updateOrInsert($paramsawalsearch, $paramssignin);
    }

    function simpan_cathlab_signout(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->reg_no,
            'med_rec' => $request->medrec,
        );

        $paramssignin = array(
            'cath_signout_pukul' => $request->cath_signout_pukul,
            'cath_signout_tindakan' => $request->cath_signout_tindakan,
            'cath_signout_implan' => $request->cath_signout_implan,
            'cath_signout_alat' => $request->cath_signout_alat,
            'cath_signout_prosedur' => $request->cath_signout_prosedur,
            'cath_signout_prosedur_text' => $request->cath_signout_prosedur_text,
            'cath_signout_dokter_operator' => $request->cath_signout_dokter_operator,
            'cath_signout_dokter_anastesi' => $request->cath_signout_dokter_anastesi,
            'cath_signout_perawat' => $request->cath_signout_perawat,

        );

        $simpan = DB::connection('mysql')
            ->table('rs_cathlab_sign_out')
            ->updateOrInsert($paramsawalsearch, $paramssignin);
    }

    function addpemulanganpasien(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->regno,
            'reg_medrec' => $request->medrec,
        );

        // $pengelolaan_penyakit_secara_berkelanjutan = implode(",", $request->pengelolaan_penyakit_secara_berkelanjutan);
        $params = array(
            'user_id' => $request->user_id,
            'diagnosis_utama' => $request->diagnosis_utama,
            'diagnosis_sekunder' => $request->diagnosis_sekunder,
            'ppsb_tempat' => $request->ppsb_tempat,
            'ppsb_tujuan' => $request->ppsb_tujuan,
            'bantuan_dalam_aktifitas' => json_encode($request->bantuan_dalam_aktifitas),
            'edukasi_gizi' => json_encode($request->edukasi_gizi),
            'penanganan_nyeri_kronis' => json_encode($request->penanganan_nyeri_kronis),
            'kebutuhan_lainnya_check' => json_encode($request->kebutuhan_lainnya_check),
            'kebutuhan_lainnya' => $request->kebutuhan_lainnya,
            'waktu' => $request->waktu,
            'tanggal' => $request->tanggal,

        );
        $simapn = DB::connection('mysql')
            ->table('rs_pemulangan_pasien')
            ->updateOrInsert($paramsawalsearch, $params);

        if ($simapn == true) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }

    function addmonitoring_news(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->reg_no,
            'med_rec' => $request->medrec,
            'news_jam' => $request->news_jam,
            'news_tanggal' => $request->news_tanggal,
        );

        $params = array(
            'news_tanggal' => $request->news_tanggal,
            'news_jam' => $request->news_jam,
            'pernafasaan_3' => $request->pernafasaan_3,
            'pernafasaan_2' => $request->pernafasaan_2,
            'pernafasaan_1' => $request->pernafasaan_1,
            'pernafasaan_0' => $request->pernafasaan_0,
            'saturasi_3' => $request->saturasi_3,
            'saturasi_2' => $request->saturasi_2,
            'saturasi_1' => $request->saturasi_1,
            'saturasi_0' => $request->saturasi_0,
            'O2_tambahan_0' => $request->O2_tambahan_0,
            'O2_tambahan_2' => $request->O2_tambahan_2,
            'suhu_3' => $request->suhu_3,
            'suhu_2' => $request->suhu_2,
            'suhu_1' => $request->suhu_1,
            'suhu_0' => $request->suhu_0,
            'tekanan_darah_3' => $request->tekanan_darah_3,
            'tekanan_darah_2' => $request->tekanan_darah_2,
            'tekanan_darah_1' => $request->tekanan_darah_1,
            'tekanan_darah_0' => $request->tekanan_darah_0,
            'nadi_3' => $request->nadi_3,
            'nadi_2' => $request->nadi_2,
            'nadi_1' => $request->nadi_1,
            'nadi_0' => $request->nadi_0,
            'tingkat_kesadaran_3' => $request->tingkat_kesadaran_3,
            'tingkat_kesadaran_0' => $request->tingkat_kesadaran_0,
            'news_total' => $request->news_total,
            'news_kategori' => $request->news_kategori,
            'news_gula_darah' => $request->news_gula_darah,
            'news_analisa_gas_darah' => $request->news_analisa_gas_darah,
            'news_penilaian_tik' => $request->news_penilaian_tik,
            'user_name' => $request->user_name,
        );
        $simpan = DB::connection('mysql')
            ->table('rs_monitoring_news')
            ->updateOrInsert($paramsawalsearch, $params);
    }

    function addchecklist_kepulangan(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->reg_no,
            'med_rec' => $request->medrec,
        );

        $params = array(
            'satu' => json_encode($request->satu),
            'dua' => json_encode($request->dua),
            'tiga' => json_encode($request->tiga),
            'empat' => json_encode($request->empat),
            'lima' => json_encode($request->lima),

        );
        $simpan = DB::connection('mysql')
            ->table('rs_checklist_kepulangan')
            ->updateOrInsert($paramsawalsearch, $params);
    }

    public function addNursingSpecialtyAll(Request $request)
    {
        $dateTimeNow = Carbon::now();

        $params = array(
            'reg_no' => $request->reg_no,
            'med_rec' => $request->med_rec,
            'kategori' => $request->kategori,
            'data' => $request->data,
            'tanggal_pemberian' => $dateTimeNow->toDateTimeString(),
            'jam_pemberian' => $dateTimeNow->toTimeString()
        );

        $simpan = DB::connection('mysql')
            ->table('vital_sign')
            ->insert($params);

        return response()->json([
            //    'success'=>$simpan
            'success' => 'ok'

        ]);
    }

    function addInformasiTindakanMedis(Request $request)
    {
        try {
            $data = [
                'reg_no' => $request->reg_no,
                'med_rec' => $request->medrec,
                'informasi_kode_tindakan' => $request->informasi_kode_tindakan,
                'informasi_nama_tindakan' => $request->informasi_nama_tindakan,
                'ParamedicCode' => $request->ParamedicCode,
                'informasi_pemberi_info' => $request->informasi_pemberi_info,
                'informasi_penerima_info' => $request->informasi_penerima_info,
                'informasi_diberikan_pada' => $request->informasi_diberikan_pada,
                'informasi_diagnosis_text' => $request->informasi_diagnosis_text,
                'informasi_dasar_diagnosis_text' => $request->informasi_dasar_diagnosis_text,
                'informasi_tindakan_kedokteran_text' => $request->informasi_tindakan_kedokteran_text,
                'informasi_indikasi_tindakan_text' => $request->informasi_indikasi_tindakan_text,
                'informasi_tata_cara_text' => $request->informasi_tata_cara_text,
                'informasi_tujuan_text' => $request->informasi_tujuan_text,
                'informasi_risiko_text' => $request->informasi_risiko_text,
                'informasi_komplikasi_text' => $request->informasi_komplikasi_text,
                'informasi_prognosis_text' => $request->informasi_prognosis_text,
                'informasi_alternatif_text' => $request->informasi_alternatif_text,
                'informasi_lain_lain_text' => $request->informasi_lain_lain_text,
                'informasi_diagnosis_paraf' => $request->informasi_diagnosis_paraf,
                'informasi_diagnosis_paraf' => $request->informasi_diagnosis_paraf,
                'informasi_dasar_diagnosis_paraf' => $request->informasi_dasar_diagnosis_paraf,
                'informasi_tindakan_kedokteran_paraf' => $request->informasi_tindakan_kedokteran_paraf,
                'informasi_indikasi_tindakan_paraf' => $request->informasi_indikasi_tindakan_paraf,
                'informasi_tata_cara_paraf' => $request->informasi_tata_cara_paraf,
                'informasi_tujuan_paraf' => $request->informasi_tujuan_paraf,
                'informasi_risiko_paraf' => $request->informasi_risiko_paraf,
                'informasi_komplikasi_paraf' => $request->informasi_komplikasi_paraf,
                'informasi_prognosis_paraf' => $request->informasi_prognosis_paraf,
                'informasi_alternatif_paraf' => $request->informasi_alternatif_paraf,
                'informasi_lain_lain_paraf' => $request->informasi_lain_lain_paraf,
                'informasi_ttd_dokter' => $request->informasi_ttd_dokter,
                'informasi_ttd_penerima_informasi' => $request->informasi_ttd_penerima_informasi,

            ];

            $check = DB::connection('mysql')
                ->table('rs_tindakan_medis_informasi')
                ->where('reg_no', $request->reg_no)
                ->first();

            if ($check) {
                $update = DB::connection('mysql')
                    ->table('rs_tindakan_medis_informasi')
                    ->where('reg_no', $request->reg_no)
                    ->update($data);
            } else {
                // $data['kode_tindakan_medis_setuju_tolak'] = app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->generate_datetimeuuid4();
                $data['kode_tindakan_medis_setuju_tolak'] = app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->generate_code_tindakan_medis();
                $store = DB::connection('mysql')
                    ->table('rs_tindakan_medis_informasi')
                    ->insert($data);
            }

            return response()->json(200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    function addPersetujuanTindakanMedis(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->reg_no,
            'med_rec' => $request->medrec,
            'kode_tindakan_medis_setuju_tolak' => $request->kode_tindakan_medis_setuju_tolak,
        );

        $params = array(
            'persetujuan_nama_1' => $request->persetujuan_nama_1,
            'persetujuan_jenis_kelamin_1' => $request->persetujuan_jenis_kelamin_1,
            'persetujuan_tanggal_lahir_1' => $request->persetujuan_tanggal_lahir_1,
            'persetujuan_alamat_1' => $request->persetujuan_alamat_1,
            'persetujuan_pernyataan' => $request->persetujuan_pernyataan,
            'persetujuan_terhadap' => $request->persetujuan_terhadap,
            'persetujuan_nama_2' => $request->persetujuan_nama_2,
            'persetujuan_jenis_kelamin_2' => $request->persetujuan_jenis_kelamin_2,
            'persetujuan_tanggal_lahir_2' => $request->persetujuan_tanggal_lahir_2,
            'persetujuan_alamat_2' => $request->persetujuan_alamat_2,
            'persetujuan_tanggal_waktu_ttd' => $request->persetujuan_tanggal_waktu_ttd,
            'persetujuan_ttd_yg_menyatakan' => $request->persetujuan_ttd_yg_menyatakan,
            'persetujuan_ttd_dokter' => $request->persetujuan_ttd_dokter,
            'persetujuan_ttd_keluarga' => $request->persetujuan_ttd_keluarga,
            'persetujuan_ttd_perawat' => $request->persetujuan_ttd_perawat,

        );
        $simpan = DB::connection('mysql')
            ->table('rs_tindakan_medis_persetujuan')
            ->updateOrInsert($paramsawalsearch, $params);
    }

    function addPenolakanTindakanMedis(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->reg_no,
            'med_rec' => $request->medrec,
            'kode_tindakan_medis_setuju_tolak' => $request->kode_tindakan_medis_setuju_tolak,
        );

        $params = array(
            'penolakan_nama_1' => $request->penolakan_nama_1,
            'penolakan_jenis_kelamin_1' => $request->penolakan_jenis_kelamin_1,
            'penolakan_tanggal_lahir_1' => $request->penolakan_tanggal_lahir_1,
            'penolakan_alamat_1' => $request->penolakan_alamat_1,
            'penolakan_pernyataan' => $request->penolakan_pernyataan,
            'penolakan_terhadap' => $request->penolakan_terhadap,

            'penolakan_nama_2' => $request->penolakan_nama_2,
            'penolakan_jenis_kelamin_2' => $request->penolakan_jenis_kelamin_2,
            'penolakan_tanggal_lahir_2' => $request->penolakan_tanggal_lahir_2,
            'penolakan_alamat_2' => $request->penolakan_alamat_2,
            'penolakan_tanggal_ttd' => $request->penolakan_tanggal_ttd,

            'penolakan_ttd_yg_menyatakan' => $request->penolakan_ttd_yg_menyatakan,
            'penolakan_ttd_dokter' => $request->penolakan_ttd_dokter,
            'penolakan_ttd_keluarga' => $request->penolakan_ttd_keluarga,
            'penolakan_ttd_perawat' => $request->penolakan_ttd_perawat,

        );
        $simpan = DB::connection('mysql')
            ->table('rs_tindakan_medis_penolakan')
            ->updateOrInsert($paramsawalsearch, $params);
    }

    function addRujukanPersiapanPasien(Request $request)
    {
        try {
            $data = [
                'reg_no' => $request->reg_no,
                'med_rec' => $request->medrec,
                'rujukan_rs_asal' => $request->rujukan_rs_asal,
                'rujukan_pemberi_informasi' => $request->rujukan_pemberi_informasi,
                'ParamedicCode' => $request->ParamedicCode,
                'rujukan_rs_tujuan' => $request->rujukan_rs_tujuan,
                'rujukan_penerima_informasi' => $request->rujukan_penerima_informasi,
                'rujukan_nama_petugas' => $request->rujukan_nama_petugas,
                'rujukan_hubungi_tanggal' => $request->rujukan_hubungi_tanggal,
                'rujukan_hubungi_jam' => $request->rujukan_hubungi_jam,
                'rujukan_alasan_transfer' => $request->rujukan_alasan_transfer,
                'rujukan_transfer_tanggal' => $request->rujukan_transfer_tanggal,
                'rujukan_transfer_jam' => $request->rujukan_transfer_jam,
                'rujukan_kategori' => $request->rujukan_kategori,
                'rujukan_transportasi' => $request->rujukan_transportasi,
                'rujukan_ringkasan_tanggal' => $request->rujukan_ringkasan_tanggal,
                'rujukan_ringkasan_jam' => $request->rujukan_ringkasan_jam,
                'rujukan_keluhan' => $request->rujukan_keluhan,
                'rujukan_alergi' => $request->rujukan_alergi,
                'rujukan_kewaspaan' => $request->rujukan_kewaspaan,
                'rujukan_gcs_e' => $request->rujukan_gcs_e,
                'rujukan_gcs_m' => $request->rujukan_gcs_m,
                'rujukan_gcs_v' => $request->rujukan_gcs_v,
                'rujukan_td' => $request->rujukan_td,
                'rujukan_N' => $request->rujukan_N,
                'rujukan_skala_nyeri' => $request->rujukan_skala_nyeri,
                'rujukan_suhu' => $request->rujukan_suhu,
                'rujukan_p' => $request->rujukan_p,
                'rujukan_spo2' => $request->rujukan_spo2,

            ];
            $check = DB::connection('mysql')
                ->table('rs_rujukan_persiapan_pasien')
                ->where('reg_no', $request->reg_no)
                ->first();

            if ($check) {
                $update = DB::connection('mysql')
                    ->table('rs_rujukan_persiapan_pasien')
                    ->where('reg_no', $request->reg_no)
                    ->update($data);
            } else {
                // $data['kode_surat_rujukan'] = app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->generate_datetimeuuid4();
                $data['kode_surat_rujukan'] = app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->generate_code_surat_rujukan();
                $store = DB::connection('mysql')
                    ->table('rs_rujukan_persiapan_pasien')
                    ->insert($data);
            }
            return response()->json(200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function addRujukanSerahTerima(Request $request)
    {
        $paramsawalsearch = array(
            'reg_no' => $request->reg_no,
            'med_rec' => $request->medrec,
            'kode_surat_rujukan' => $request->kode_surat_rujukan,
        );

        $params = array(
            'rujukan_terima_tanggal' => $request->rujukan_terima_tanggal,
            'rujukan_terima_jam' => $request->rujukan_terima_jam,
            'rujukan_terima_kondisi' => $request->rujukan_terima_kondisi,
            'rujukan_terima_gcs_e' => $request->rujukan_terima_gcs_e,
            'rujukan_terima_gcs_m' => $request->rujukan_terima_gcs_m,
            'rujukan_terima_gcs_v' => $request->rujukan_terima_gcs_v,
            'rujukan_terima_td' => $request->rujukan_terima_td,
            'rujukan_terima_n' => $request->rujukan_terima_n,
            'rujukan_terima_suhu' => $request->rujukan_terima_suhu,
            'rujukan_terima_p' => $request->rujukan_terima_p,
            'rujukan_terima_sp02' => $request->rujukan_terima_sp02,
            'rujukan_terima_skala_nyeri' => $request->rujukan_terima_skala_nyeri,
            'rujukan_terima_lab' => $request->rujukan_terima_lab,
            'rujukan_terima_xray' => $request->rujukan_terima_xray,
            'rujukan_terima_mri' => $request->rujukan_terima_mri,
            'rujukan_terima_ct_scan' => $request->rujukan_terima_ct_scan,
            'rujukan_terima_ekg' => $request->rujukan_terima_ekg,
            'rujukan_terima_echo' => $request->rujukan_terima_echo,

        );
        $simpan = DB::connection('mysql')
            ->table('rs_rujukan_serah_terima')
            ->updateOrInsert($paramsawalsearch, $params);
    }
}
