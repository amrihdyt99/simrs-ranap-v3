<?php

namespace App\Http\Controllers\ZxcNyaaUniversal;

use App\Http\Controllers\ZxcNyaaUniversal\AaaBaseController;
use App\Models\Pasien;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Exception;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Support\Facades\Schema;
use GuzzleHttp\Client as GuzzleClient;

class NyaaViewInjectorController extends AaaBaseController
{
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
            ->first();
        $datacek = $cek->first();
        if (!$datacek) {
            $datacek = optional((object)[]);
        }
        return view('new_perawat.checklist.checklist_index', ['datapasien' => $datamypatient, 'hitung' => $hitung, 'data' => $datacek]);
        // if($hitung==0){
        //     return view('new_perawat.checklist.checklist',['datapasien'=>$datamypatient,'hitung'=>$hitung]);
        // }else{
        //     return view('new_perawat.checklist.checklist',['datapasien'=>$datamypatient,'hitung'=>$hitung,'data'=>$cek->first()]);
        // }
    }

    function assesment_perawat(Request $request)
    {

        $pengkajian_awal = DB::connection('mysql')
            ->table('pengkajian_awal_pasien_perawat')
            ->where('reg_no', $request->reg_no)
            ->first();

        $skrining_gizi = DB::connection('mysql')
            ->table('skrining_gizi')
            ->where('reg_no', $request->reg_no)
            ->first();

        $skrining_gizi_anak = DB::connection('mysql')
            ->table('skrining_gizi_anak')
            ->where('reg_no', $request->reg_no)
            ->first();

        $asper_masalah = DB::connection('mysql')
            ->table('rs_pasien_asper_masalah')
            ->where('pmasalah_reg', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'pengkajian_awal' => optional($pengkajian_awal),
            'skrining_gizi' => optional($skrining_gizi),
            'asper_masalah' => optional($asper_masalah),
            'skrining_gizi_anak' => optional($skrining_gizi_anak),

        );
        return view('new_perawat.assesment.index')
            ->with($context);
    }

    function assesment_entry_skrinning_nyeri(Request $request)
    {
        $skrining_nyeri = DB::connection('mysql')
            ->table('skrining_nyeri')
            ->where('reg_no', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'skrining_nyeri' => optional($skrining_nyeri),

        );
        return view('new_perawat.assesment.entry_skrinning_nyeri')
            ->with($context);
    }

    function assesment_entry_edukasi_pasien(Request $request)
    {
        $edukasi_pasien = DB::connection('mysql')
            ->table('rs_edukasi_pasien')
            ->where('reg_no', $request->reg_no)
            ->first();

        $edukasi_pasien_dokter = DB::connection('mysql')
            ->table('rs_edukasi_pasien_dokter')
            ->where('reg_no', $request->reg_no)
            ->first();

        $edukasi_pasien_perawat = DB::connection('mysql')
            ->table('rs_edukasi_pasien_perawat')
            ->where('reg_no', $request->reg_no)
            ->first();

        $edukasi_pasien_gizi = DB::connection('mysql')
            ->table('rs_edukasi_pasien_gizi')
            ->where('reg_no', $request->reg_no)
            ->first();

        $edukasi_pasien_farmasi = DB::connection('mysql')
            ->table('rs_edukasi_pasien_farmasi')
            ->where('reg_no', $request->reg_no)
            ->first();

        $edukasi_pasien_rehab = DB::connection('mysql')
            ->table('rs_edukasi_pasien_rehab')
            ->where('reg_no', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'edukasi_pasien' => optional($edukasi_pasien),
            'edukasi_pasien_dokter' => optional($edukasi_pasien_dokter),
            'edukasi_pasien_perawat' => optional($edukasi_pasien_perawat),
            'edukasi_pasien_gizi' => optional($edukasi_pasien_gizi),
            'edukasi_pasien_farmasi' => optional($edukasi_pasien_farmasi),
            'edukasi_pasien_rehab' => optional($edukasi_pasien_rehab),
        );
        return view('new_perawat.edukasi.entry_edukasi_pasien')
            ->with($context);
    }

    function assesment_resiko_jatuh(Request $request)
    {
        $data_pasien = DB::connection('mysql2')
        ->table('m_registrasi')
        ->leftJoin('m_pasien','m_registrasi.reg_medrec','=','m_pasien.MedicalNo')
        ->where(['m_registrasi.reg_no'=>$request->reg_no])
        ->first();

        $universalFunctionController = app(UniversalFunctionController::class);
        $age = $universalFunctionController->kalkulasi_umur($data_pasien->DateOfBirth, 'tahun');

        // $skrining_resiko_jatuh = DB::connection('mysql')
        // ->table('skrining_resiko_jatuh')
        // ->where('reg_no', $request->reg_no)
        // ->where('user_id', $request->user_id)
        // ->orderBy('created_at', 'desc')  
        // ->first();  

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            // 'skrining_resiko_jatuh' => optional($skrining_resiko_jatuh),
            'age' => $age,
        );
        return view('new_perawat.resiko_jatuh.form_resiko_jatuh')
            ->with($context);
    }

    function assesment_cppt_soap_perawat(Request $request)
    {
        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
        );
        return view('new_perawat.soap.index')
            ->with($context);
    }

    function assesment_awal_dewasa(Request $request)
    {
        $reg = RegistrationInap::find($request->reg_no);
        $pasien = Pasien::find($reg->reg_medrec);
        $dateDiff = Carbon::now()->diff($pasien->DateOfBirth);

        if ($dateDiff->y > 18) {
            $context = array(
                'reg' => $request->reg_no,
                'medrec' => $request->medrec,
            );
            return view('new_perawat.assesment.index_dewasa')
                ->with($context);
        } else {
            return view('new_perawat.assesment.error.assesment_dewasa');
        }
    }

    function assesment_awal_anak(Request $request)
    {

        $reg = RegistrationInap::find($request->reg_no);
        $pasien = Pasien::find($reg->reg_medrec);
        $dateDiff = Carbon::now()->diff($pasien->DateOfBirth);
        // dd($dateDiff->y . ' Year ' . $dateDiff->m . ' Month ' . $dateDiff->d . ' Day');
        if (($dateDiff->y > 0 && $dateDiff->y <= 18) ||  $dateDiff->m > 0 || $dateDiff->d >= 28) {
            $assesment_awal_anak = DB::connection('mysql')
                ->table('pengkajian_awal_anak_perawat')
                ->where('reg_no', $request->reg_no)
                ->first();

            $context = array(
                'reg' => $request->reg_no,
                'medrec' => $request->medrec,
                'assesment_awal_anak' => optional($assesment_awal_anak),
            );
            return view('new_perawat.assesment.index_anak')
                ->with($context);
        } else {
            return view('new_perawat.assesment.error.assesment_anak');
        }
    }

    function assesment_gizi_dewasa(Request $request)
    {
        $assesment_gizi_dewasa = DB::connection('mysql')
            ->table('assesment_gizi_dewasa')
            ->where('dewasa_reg', $request->reg_no)
            ->latest()->first();
        // dd($assesment_gizi_dewasa);
        $asuhan_gizi_dewasa = DB::connection('mysql')
            ->table('asuhan_gizi_dewasa')
            ->where('asdewasa_reg', $request->reg_no)
            ->latest()->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'assesment_gizi_dewasa' => optional($assesment_gizi_dewasa),
            'asuhan_gizi_dewasa' => optional($asuhan_gizi_dewasa),

        );
        return view('new_perawat.gizi.index_dewasa')
            ->with($context);
    }

    function assesment_nurrse_note(Request $request)
    {
        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
        );
        return view('new_perawat.nursing.index_nnote_new')
            ->with($context);
    }

    function nurse_transfer_internal(Request $request)
    {
        $datapasien = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('m_ruangan_baru', 'm_registrasi.service_unit', '=', 'm_ruangan_baru.id')
            ->leftJoin('m_kelas_ruangan_baru', 'm_registrasi.bed', '=', 'm_kelas_ruangan_baru.id')
            ->where('m_registrasi.reg_medrec', $request->medrec)
            ->where('m_registrasi.reg_no', $request->reg_no)
            ->select([
                'm_registrasi.*',
                'm_pasien.*',
                'm_paramedis.ParamedicName',
                'm_paramedis.FeeAmount',
                'm_ruangan_baru.*',
                'm_kelas_ruangan_baru.*',
            ])
            ->first();

        $transfer_internal = DB::connection('mysql')
            ->table('transfer_internal')
            ->where('transfer_reg', $request->reg_no)
            ->first();

        $transfer_internal_alat_terpasang = DB::connection('mysql')
            ->table('transfer_internal_alat_terpasang')
            ->where('reg_no', $request->reg_no)
            ->when($transfer_internal && $transfer_internal->kode_transfer_internal, function ($query) use ($transfer_internal) {
                return $query->where('kode_transfer_internal', $transfer_internal->kode_transfer_internal);
            })
            ->get();

        $transfer_internal_kejadian = DB::connection('mysql')
            ->table('transfer_internal_kejadian')
            ->where('reg_no', $request->reg_no)
            ->when($transfer_internal && $transfer_internal->kode_transfer_internal, function ($query) use ($transfer_internal) {
                return $query->where('kode_transfer_internal', $transfer_internal->kode_transfer_internal);
            })
            ->get();

        $transfer_internal_obat_dibawa = DB::connection('mysql')
            ->table('transfer_internal_obat_dibawa')
            ->where('reg_no', $request->reg_no)
            ->when($transfer_internal && $transfer_internal->kode_transfer_internal, function ($query) use ($transfer_internal) {
                return $query->where('kode_transfer_internal', $transfer_internal->kode_transfer_internal);
            })
            ->get();

        $transfer_internal_status_pasien = DB::connection('mysql')
            ->table('transfer_internal_status_pasien')
            ->where('reg_no', $request->reg_no)
            ->when($transfer_internal && $transfer_internal->kode_transfer_internal, function ($query) use ($transfer_internal) {
                return $query->where('kode_transfer_internal', $transfer_internal->kode_transfer_internal);
            })
            ->get();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'transfer_internal' => optional($transfer_internal),
            'datapasien' => optional($datapasien),
            'transfer_internal_alat_terpasang' => $transfer_internal_alat_terpasang,
            'transfer_internal_obat_dibawa' => $transfer_internal_obat_dibawa,
            'transfer_internal_status_pasien' => $transfer_internal_status_pasien,
            'transfer_internal_kejadian' => $transfer_internal_kejadian,
        );
        return view('new_perawat.transfer_internal.index-v2')
            ->with($context);
    }

    function nurse_admin_nurse(Request $request)
    {
        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
        );
        return view('new_perawat.admin_nurse.index_order_admin_nurse')
            ->with($context);
    }

    function nurse_transfusi_darah(Request $request)
    {
        $nurse_transfusi_darah = DB::connection('mysql')
            ->table('monitoring_transfusi_darah')
            ->where('reg_no', $request->reg_no)
            ->where('reg_medrec', $request->medrec)
            ->orderBy('waktu_transfusi', 'desc')
            ->orderBy('id', 'desc')
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'nurse_transfusi_darah' => optional($nurse_transfusi_darah),

        );
        return view('new_perawat.transfusi_darah.index')
            ->with($context);
    }

    function nurse_obgyn(Request $request)
    {
        $pengkajian_awal_bidan = DB::connection('mysql')
            ->table('pengkajian_awal_bidan')
            ->where('no_reg', $request->reg_no)
            ->first();

        $skor_sad_person = DB::connection('mysql')
            ->table('skor_sad_person')
            ->where('no_reg', $request->reg_no)
            ->first();

        $riwayat_menstruasi = DB::connection('mysql')
            ->table('riwayat_menstruasi')
            ->where('no_reg', $request->reg_no)
            ->first();

        $riwayat_perkawinan = DB::connection('mysql')
            ->table('riwayat_perkawinan')
            ->where('no_reg', $request->reg_no)
            ->first();

        $riwayat_kehamilan = DB::connection('mysql')
            ->table('riwayat_kehamilan')
            ->where('no_reg', $request->reg_no)
            ->first();

        $skrining_gizi_obgyn = DB::connection('mysql')
            ->table('skrining_gizi_obgyn')
            ->where('no_reg', $request->reg_no)
            ->first();

        $skala_wong_baker = DB::connection('mysql')
            ->table('skala_wong_baker')
            ->where('no_reg', $request->reg_no)
            ->first();

        $behavior_pain_scale_obgyn = DB::connection('mysql')
            ->table('behavior_pain_scale_obgyn')
            ->where('no_reg', $request->reg_no)
            ->first();

        $adl_obgyn = DB::connection('mysql')
            ->table('adl_obgyn')
            ->where('no_reg', $request->reg_no)
            ->first();

        $skrining_resiko_jatuh_obgyn = DB::connection('mysql')
            ->table('skrining_resiko_jatuh_obgyn')
            ->where('no_reg', $request->reg_no)
            ->first();

        $pengkajian_kulit = DB::connection('mysql')
            ->table('pengkajian_kulit')
            ->where('no_reg', $request->reg_no)
            ->first();

        $pengkajian_kebutuhan_aktifitas = DB::connection('mysql')
            ->table('pengkajian_kebutuhan_aktifitas')
            ->where('no_reg', $request->reg_no)
            ->first();

        $pengkajian_kebutuhan_nutrisi = DB::connection('mysql')
            ->table('pengkajian_kebutuhan_nutrisi')
            ->where('no_reg', $request->reg_no)
            ->first();

        $pengkajian_kebutuhan_eliminasi = DB::connection('mysql')
            ->table('pengkajian_kebutuhan_eliminasi')
            ->where('no_reg', $request->reg_no)
            ->first();

        $laporan_persalinan = DB::connection('mysql')
            ->table('laporan_persalinan')
            ->where('reg_no', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'pengkajian_awal_bidan' => optional($pengkajian_awal_bidan),
            'skor_sad_person' => optional($skor_sad_person),
            'riwayat_menstruasi' => optional($riwayat_menstruasi),
            'riwayat_perkawinan' => optional($riwayat_perkawinan),
            'riwayat_kehamilan' => optional($riwayat_kehamilan),
            'skrining_gizi_obgyn' => optional($skrining_gizi_obgyn),
            'skala_wong_baker' => optional($skala_wong_baker),
            'behavior_pain_scale_obgyn' => optional($behavior_pain_scale_obgyn),
            'adl_obgyn' => optional($adl_obgyn),
            'skrining_resiko_jatuh_obgyn' => optional($skrining_resiko_jatuh_obgyn),
            'pengkajian_kulit' => optional($pengkajian_kulit),
            'pengkajian_kebutuhan_aktifitas' => optional($pengkajian_kebutuhan_aktifitas),
            'pengkajian_kebutuhan_nutrisi' => optional($pengkajian_kebutuhan_nutrisi),
            'pengkajian_kebutuhan_eliminasi' => optional($pengkajian_kebutuhan_eliminasi),
            'laporan_persalinan' => optional($laporan_persalinan),
        );
        return view('new_perawat.obgyn.index_master')
            ->with($context);
    }

    function nyaa_dokumen_kelengkapan_pasien(Request $request)
    {

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,

            'dt_judul' => 'Dokumen Kelengkapan Pasien',
            'datatable_route' => route('nyaa_universal.view_injector_support.perawat.nyaa_dokumen_kelengkapan_pasien'),
        );
        $context['form_view'] = view('nyaa-universal.assesment_perawat.form.dokumen-general', $context);

        return view('nyaa-universal.assesment_perawat.general-noindex')
            ->with($context);
    }

    function nyaa_dokumen_tindakan(Request $request)
    {
        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,

            'dt_judul' => 'Dokumen Tindakan',
            'datatable_route' => route('nyaa_universal.view_injector_support.perawat.nyaa_dokumen_tindakan'),
        );
        $context['form_view'] = view('nyaa-universal.assesment_perawat.form.dokumen-general', $context);

        return view('nyaa-universal.assesment_perawat.general-noindex')
            ->with($context);
    }

    public function nursing_full(Request $request)
    {
        // init
        $reg_no = $request->reg_no;

        // mulai
        $registrationInap = \App\Models\RegistrationInap::find($reg_no);
        $transfusi = \App\Models\FluidBalance::with(['fluid_balance_data' => function ($q) {
            $q->whereDate("created_at", Carbon::now()->toDateString());
        }])->where(['intake' => "transfusi"])->get();
        $makan = \App\Models\FluidBalance::with(['fluid_balance_data' => function ($q) {
            $q->whereDate("created_at", Carbon::now()->toDateString());
        }])->where(['reg_no' => $reg_no, 'intake' => "makan"])->get();
        $parental = \App\Models\FluidBalance::with(['fluid_balance_data' => function ($q) {
            $q->whereDate("created_at", Carbon::now()->toDateString());
        }])->where(['reg_no' => $reg_no, 'intake' => "parental"])->get();
        $output = \App\Models\FluidBalance::with(['fluid_balance_data' => function ($q) {
            $q->whereDate("created_at", Carbon::now()->toDateString());
        }])->where(['reg_no' => $reg_no, 'intake' => "output"])->get();
        $fluid_balance = \App\Models\FluidBalance::with(['fluid_balance_data' => function ($q) {
            $q->whereDate("created_at", Carbon::now()->toDateString());
        }])->where(['reg_no' => $reg_no, 'intake' => "fluid_balance"])->get();

        $vitaldata = \App\Models\VitalSign::where('reg_no', $reg_no)->get();
        $gejaladata = \App\Models\Gejala::all();
        $dokter = \App\Models\Paramedic::all();
        $obat = \App\Models\PasienPemberianObat::where('reg_no', $reg_no)->get();

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
            ->where('m_registrasi.reg_no', "=", $reg_no)
            ->get();

        return view(
            'new_perawat.nursing.index_new_nursing_page',
            compact(
                "registrationInap",
                "transfusi",
                "makan",
                "parental",
                "output",
                "fluid_balance",
                "gejaladata",
                "vitaldata",
                "dokter",
                "obat",
                "dataTransfusi",
                "dataFluidBalanceBaru",
                "obatdaridokter",
                "datamypatient"
            )
        );
    }

    function nurse_intra_tindakan_kateterisasi(Request $request)
    {
        $rs_pasien_intra_tindakan = DB::connection('mysql')
            ->table('rs_pasien_intra_tindakan')
            ->where('no_reg', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'rs_pasien_intra_tindakan' => optional($rs_pasien_intra_tindakan),

        );
        return view('new_perawat.catatan_keperawatan_intra.index_intra_kateterisasi')
            ->with($context);
    }

    function nurse_pemantauan_hemodinamik_intra(Request $request)
    {
        $rs_pasien_intra_pemantuan = DB::connection('mysql')
            ->table('rs_pasien_intra_pemantuan')
            ->where('no_reg', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'rs_pasien_intra_pemantuan' => optional($rs_pasien_intra_pemantuan),

        );
        return view('new_perawat.catatan_keperawatan_intra.index_pemantauan_hemodinamik_intra')
            ->with($context);
    }

    function nurse_physician_team(Request $request)
    {
        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
        );
        return view('new_perawat.physician_team.index')
            ->with($context);
    }

    function nurse_obgyn_bedah(Request $request)
    {
        $pengkajian_awal_bidan = DB::connection('mysql')
            ->table('pengkajian_awal_bidan')
            ->where('no_reg', $request->reg_no)
            ->first();

        $skor_sad_person = DB::connection('mysql')
            ->table('skor_sad_person')
            ->where('no_reg', $request->reg_no)
            ->first();

        $riwayat_menstruasi = DB::connection('mysql')
            ->table('riwayat_menstruasi')
            ->where('no_reg', $request->reg_no)
            ->first();

        $riwayat_perkawinan = DB::connection('mysql')
            ->table('riwayat_perkawinan')
            ->where('no_reg', $request->reg_no)
            ->first();

        $riwayat_kehamilan = DB::connection('mysql')
            ->table('riwayat_kehamilan')
            ->where('no_reg', $request->reg_no)
            ->first();

        $skrining_gizi_obgyn = DB::connection('mysql')
            ->table('skrining_gizi_obgyn')
            ->where('no_reg', $request->reg_no)
            ->first();

        $skala_wong_baker = DB::connection('mysql')
            ->table('skala_wong_baker')
            ->where('no_reg', $request->reg_no)
            ->first();

        $behavior_pain_scale_obgyn = DB::connection('mysql')
            ->table('behavior_pain_scale_obgyn')
            ->where('no_reg', $request->reg_no)
            ->first();

        $adl_obgyn = DB::connection('mysql')
            ->table('adl_obgyn')
            ->where('no_reg', $request->reg_no)
            ->first();

        $skrining_resiko_jatuh_obgyn = DB::connection('mysql')
            ->table('skrining_resiko_jatuh_obgyn')
            ->where('no_reg', $request->reg_no)
            ->first();

        $pengkajian_kulit = DB::connection('mysql')
            ->table('pengkajian_kulit')
            ->where('no_reg', $request->reg_no)
            ->first();

        $pengkajian_kebutuhan_aktifitas = DB::connection('mysql')
            ->table('pengkajian_kebutuhan_aktifitas')
            ->where('no_reg', $request->reg_no)
            ->first();

        $pengkajian_kebutuhan_nutrisi = DB::connection('mysql')
            ->table('pengkajian_kebutuhan_nutrisi')
            ->where('no_reg', $request->reg_no)
            ->first();

        $pengkajian_kebutuhan_eliminasi = DB::connection('mysql')
            ->table('pengkajian_kebutuhan_eliminasi')
            ->where('no_reg', $request->reg_no)
            ->first();

        $laporan_persalinan = DB::connection('mysql')
            ->table('laporan_persalinan')
            ->where('reg_no', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'pengkajian_awal_bidan' => optional($pengkajian_awal_bidan),
            'skor_sad_person' => optional($skor_sad_person),
            'riwayat_menstruasi' => optional($riwayat_menstruasi),
            'riwayat_perkawinan' => optional($riwayat_perkawinan),
            'riwayat_kehamilan' => optional($riwayat_kehamilan),
            'skrining_gizi_obgyn' => optional($skrining_gizi_obgyn),
            'skala_wong_baker' => optional($skala_wong_baker),
            'behavior_pain_scale_obgyn' => optional($behavior_pain_scale_obgyn),
            'adl_obgyn' => optional($adl_obgyn),
            'skrining_resiko_jatuh_obgyn' => optional($skrining_resiko_jatuh_obgyn),
            'pengkajian_kulit' => optional($pengkajian_kulit),
            'pengkajian_kebutuhan_aktifitas' => optional($pengkajian_kebutuhan_aktifitas),
            'pengkajian_kebutuhan_nutrisi' => optional($pengkajian_kebutuhan_nutrisi),
            'pengkajian_kebutuhan_eliminasi' => optional($pengkajian_kebutuhan_eliminasi),
            'laporan_persalinan' => optional($laporan_persalinan),
        );
        return view('new_perawat.obgyn.index_bedah')
            ->with($context);
    }

    function nurse_pra_tindakan(Request $request)
    {
        $pra_tindakan = DB::connection('mysql')
            ->table('rs_catatan_keperawatan_pra_tindakan')
            ->where('reg_no', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'pra_tindakan' => optional($pra_tindakan),

        );
        return view('new_perawat.catatan_keperawatan-v2.index')
            ->with($context);
    }

    function riwayat(Request $request)
    {
        $asessment_awal = DB::connection('mysql')
            ->table('pengkajian_awal_pasien_perawat')
            ->where('reg_no', $request->reg_no)
            ->first();

        $skrining_gizi = DB::connection('mysql')
            ->table('skrining_gizi')
            ->where('reg_no', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'asessment_awal' => optional($asessment_awal),
            'skrining_gizi' => optional($skrining_gizi),

        );
        return view('new_perawat.riwayat-v2.index')
            ->with($context);
    }

    function cathlab(Request $request)
    {
        $cathlab = DB::connection('mysql')
            ->table('cathlab')
            ->where('cathlab_reg', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            // 'medrec' => $request->medrec,
            'cathlab' => optional($cathlab),

        );
        return view('new_perawat.cath_lab.index')
            ->with($context);
    }

    function paska_tindakan(Request $request)
    {
        $paska_tindakan = DB::connection('mysql')
            ->table('rs_paska_tindakan')
            ->where('reg_no', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'paska_tindakan' => optional($paska_tindakan),
        );
        return view('new_perawat.catatan_keperawatan_intra.index_paska_tindakan')
            ->with($context);
    }

    function observasi_paska_tindakan(Request $request)
    {
        $observasi_paska = DB::connection('mysql')
            ->table('rs_observasi_paska_tindakan')
            ->where('reg_no', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'observasi_paska' => optional($observasi_paska),
        );
        return view('new_perawat.catatan_keperawatan_intra.index_observasi_paska_tindakan')
            ->with($context);
    }

    function assesment_bayi(Request $request)
    {
        $assesment_bayi = DB::connection('mysql')
            ->table('rs_assesment_bayi')
            ->where('reg_no', $request->reg_no)
            ->first();

        $pemeriksaan_bayi = DB::connection('mysql')
            ->table('rs_pemeriksaan_bayi')
            ->where('reg_no', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'assesment_bayi' => optional($assesment_bayi),
            'pemeriksaan_bayi' => optional($pemeriksaan_bayi),
        );
        return view('new_perawat.bayi.index_bayi')
            ->with($context);
    }

    function cathlab_v2(Request $request)
    {
        $sign_in = DB::table('rs_cathlab_sign_in')
            ->where('reg_no', $request->reg_no)
            ->first();

        $time_out = DB::table('rs_cathlab_time_out')
            ->where('reg_no', $request->reg_no)
            ->first();

        $sign_out = DB::table('rs_cathlab_sign_out')
            ->where('reg_no', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'sign_in' => optional($sign_in),
            'time_out' => optional($time_out),
            'sign_out' => optional($sign_out),
        );
        return view('new_perawat.cath_lab_v2.index')
            ->with($context);
    }

    function pemulangan_pasien(Request $request)
    {
        $pemulangan_pasien = DB::connection('mysql')
            ->table('rs_pemulangan_pasien')
            ->where('reg_no', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'pemulangan_pasien' => optional($pemulangan_pasien),
        );
        return view('new_perawat.form_pemulangan.index')
            ->with($context);
    }

    function monitoring_news(Request $request)
    {
        $jam_sekarang = Carbon::now()->format('H');
        $tanggal_sekarang = Carbon::now()->format('Y-m-d');
        $monitoring_news = DB::connection('mysql')
            ->table('rs_monitoring_news')
            ->where('reg_no', $request->reg_no)
            ->where('news_jam', $jam_sekarang)
            ->where('news_tanggal', $tanggal_sekarang)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'monitoring_news' => optional($monitoring_news),
            'jam_sekarang' => ($jam_sekarang),
            'tanggal_sekarang' => ($tanggal_sekarang),
        );
        return view('new_perawat.monitoring_news.index')
            ->with($context);
    }

    function checklist_kepulangan(Request $request)
    {
        $ceklis_pulang = DB::connection('mysql')
            ->table('rs_checklist_kepulangan')
            ->where('reg_no', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'ceklis_pulang' => optional($ceklis_pulang),

        );
        return view('new_perawat.checklist_kepulangan.index')
            ->with($context);
    }

    /**
     * Get the
     *
     * @param Request
     * @return view
     */
    function intruksi_harian()
    {

        $tanda_vital = [
            'count' => 25,
        ];
        $context = [
            'reg' => request()->reg_no,
            'medrec' => request()->medrec,
            'tanda_vital' => $tanda_vital,
        ];
        return view('new_perawat-v2.intruksi-harian.index')
            ->with($context);
    }

    function persetujuan_penolakan(Request $request)
    {
        $dataPasien=DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien','m_registrasi.reg_medrec','=','m_pasien.MedicalNo')
            ->where(['m_registrasi.reg_no'=> $request->reg_no])
            ->first();

        $informasi = DB::connection('mysql')
            ->table('rs_tindakan_medis_informasi')
            ->join('rs_m_paramedic', 'rs_tindakan_medis_informasi.paramediccode', '=', 'rs_m_paramedic.paramediccode')
            ->select('rs_tindakan_medis_informasi.*', 'rs_m_paramedic.ParamedicName')
            ->where('reg_no', $request->reg_no)
            ->first();

        $persetujuan = DB::connection('mysql')
            ->table('rs_tindakan_medis_persetujuan')
            ->where('reg_no', $request->reg_no)
            ->first();

        $penolakan = DB::connection('mysql')
            ->table('rs_tindakan_medis_penolakan')
            ->where('reg_no', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'informasi' => optional($informasi),
            'persetujuan' => $persetujuan,
            'penolakan' => $penolakan,
            'dataPasien' => $dataPasien,

        );
        return view('new_perawat.persetujuan_penolakan.index')
            ->with($context);
    }

    function surat_rujukan(Request $request)
    {
        $datapasien = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('m_ruangan_baru', 'm_registrasi.service_unit', '=', 'm_ruangan_baru.id')
            ->leftJoin('m_kelas_ruangan_baru', 'm_registrasi.bed', '=', 'm_kelas_ruangan_baru.id')
            ->where('m_registrasi.reg_medrec', $request->medrec)
            ->where('m_registrasi.reg_no', $request->reg_no)
            ->select([
                'm_registrasi.*',
                'm_pasien.*',
                'm_paramedis.ParamedicName',
                'm_paramedis.FeeAmount',
                'm_ruangan_baru.*',
                'm_kelas_ruangan_baru.*',
            ])
            ->first();

        $surat_rujukan = DB::connection('mysql')
            ->table('rs_rujukan_persiapan_pasien')
            ->where('reg_no', $request->reg_no)
            ->first();

        $surat_rujukan_terima = DB::connection('mysql')
            ->table('rs_rujukan_serah_terima')
            ->where('reg_no', $request->reg_no)
            ->first();

        $surat_rujukan_prosedur_operasi = DB::connection('mysql')
            ->table('rs_rujukan_prosedur_operasi')
            ->where('reg_no', $request->reg_no)
            // ->where('kode_surat_rujukan', $surat_rujukan->kode_surat_rujukan)
            ->when($surat_rujukan && $surat_rujukan->kode_surat_rujukan, function ($query) use ($surat_rujukan) {
                return $query->where('kode_surat_rujukan', $surat_rujukan->kode_surat_rujukan);
            })
            ->get();

        $surat_rujukan_alat_terpasang = DB::connection('mysql')
            ->table('rs_rujukan_alat_terpasang')
            ->where('reg_no', $request->reg_no)
            ->when($surat_rujukan && $surat_rujukan->kode_surat_rujukan, function ($query) use ($surat_rujukan) {
                return $query->where('kode_surat_rujukan', $surat_rujukan->kode_surat_rujukan);
            })
            ->get();

        $surat_rujukan_obat_diterima = DB::connection('mysql')
            ->table('rs_rujukan_obat_diterima')
            ->where('reg_no', $request->reg_no)
            ->when($surat_rujukan && $surat_rujukan->kode_surat_rujukan, function ($query) use ($surat_rujukan) {
                return $query->where('kode_surat_rujukan', $surat_rujukan->kode_surat_rujukan);
            })
            ->get();

        $surat_rujukan_obat_dibawa = DB::connection('mysql')
            ->table('rs_rujukan_obat_cairan_dibawa')
            ->where('reg_no', $request->reg_no)
            ->when($surat_rujukan && $surat_rujukan->kode_surat_rujukan, function ($query) use ($surat_rujukan) {
                return $query->where('kode_surat_rujukan', $surat_rujukan->kode_surat_rujukan);
            })
            ->get();

        $surat_rujukan_status_pasien = DB::connection('mysql')
            ->table('rs_rujukan_status_pasien')
            ->where('reg_no', $request->reg_no)
            ->when($surat_rujukan && $surat_rujukan->kode_surat_rujukan, function ($query) use ($surat_rujukan) {
                return $query->where('kode_surat_rujukan', $surat_rujukan->kode_surat_rujukan);
            })
            ->get();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'datapasien' => optional($datapasien),
            'surat_rujukan' => optional($surat_rujukan),
            'surat_rujukan_terima' => optional($surat_rujukan_terima),
            'surat_rujukan_prosedur_operasi' => $surat_rujukan_prosedur_operasi,
            'surat_rujukan_alat_terpasang' => $surat_rujukan_alat_terpasang,
            'surat_rujukan_obat_diterima' => $surat_rujukan_obat_diterima,
            'surat_rujukan_obat_dibawa' => $surat_rujukan_obat_dibawa,
            'surat_rujukan_status_pasien' => $surat_rujukan_status_pasien,

        );
        return view('new_perawat.surat_rujukan.index')
            ->with($context);
    }

    function show_qrcode(Request $request)
    {
        $data = DB::connection('mysql')
            ->table('rs_pasien_cppt')
            ->where('soapdok_id', $request->soap_id)
            ->first();


        return view('new_perawat.qrcode.show', compact('data'));
    }
}
