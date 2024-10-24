<?php

namespace App\Http\Controllers\ZxcNyaaUniversal;

use App\Http\Controllers\ZxcNyaaUniversal\AaaBaseController;
use App\Models\Neonatus\NeonatusFisik;
use App\Models\Neonatus\NeonatusNyeri;
use App\Models\Neonatus\NeonatusRekonObat;
use App\Models\Neonatus\NeonatusTtd;
use App\Models\Obgyn\ObgynAlergiKeadaanUmum;
use App\Models\Obgyn\ObgynDataPsikologis;
use App\Models\Obgyn\ObgynPengkajianKebutuhan;
use App\Models\Obgyn\ObgynPengkajianKulit;
use App\Models\Obgyn\ObgynRiwayatKehamilan;
use App\Models\Obgyn\ObgynRiwayatMenstruasiDanPerkawinan;
use App\Models\Obgyn\ObgynSkriningFungsional;
use App\Models\Obgyn\ObgynSkriningGizi;
use App\Models\Obgyn\ObgynSkriningNyeri;
use App\Models\Pasien;
use App\Models\RegistrasiPJawab;
use App\Models\RegistrationInap;
use App\Traits\Master\MasterBedTraits;
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
    use MasterBedTraits;

    function checklist(Request $request)
    {
        $regno = $request->reg_no;
        $medrec = $request->medrec;
        $cek = DB::table('rm3')->where('MedicalNo', $medrec);
        $hitung = $cek->count();
        $tgl_assesment = DB::table('pengkajian_neonatus_fisik')
            ->where('reg_no', $regno)
            ->select('created_at')
            ->unionAll(
                DB::table('pengkajian_dewasa_awal')
                    ->where('reg_no', $regno)
                    ->select('created_at'),
                DB::table('pengkajian_obgyn_alergi_dan_keadaan_umum')
                    ->where('reg_no', $regno)
                    ->select('created_at'),
                DB::table('pengkajian_awal_anak_perawat')
                    ->where('reg_no', $regno)
                    ->select('created_at')
            )
            ->first();

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
        $registrasi_pj = RegistrasiPJawab::where('reg_no', $request->reg_no)->get();

        return view('new_perawat.checklist.checklist_index', [
            'datapasien' => $datamypatient,
            'hitung' => $hitung,
            'data' => $datacek,
            'registrasi_pj' => $registrasi_pj,
            'tgl_assesment' => $tgl_assesment,
        ]);
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

        $edukasi_pasien_anastesi = DB::connection('mysql')
            ->table('rs_edukasi_pasien_anastesi')
            ->where('reg_no', $request->reg_no)
            ->first();

        $dbMaster = DB::connection('mysql2')->getDatabaseName();
        $dbInap = DB::connection('mysql')->getDatabaseName();

        $datamypatient = DB::table($dbMaster . '.m_registrasi')
            ->leftJoin($dbMaster . '.m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin($dbMaster . '.m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin($dbInap . '.icd10_bpjs', 'm_registrasi.reg_diagnosis', '=', 'icd10_bpjs.ID_ICD10')
            ->select('m_registrasi.*', 'm_pasien.*', 'm_paramedis.ParamedicName', 'icd10_bpjs.NM_ICD10')
            ->where(['m_registrasi.reg_no' => $request->reg_no])
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'edukasi_pasien' => optional($edukasi_pasien),
            'edukasi_pasien_dokter' => $edukasi_pasien_dokter ?? (object) null,
            'edukasi_pasien_perawat' => optional($edukasi_pasien_perawat),
            'edukasi_pasien_gizi' => optional($edukasi_pasien_gizi),
            'edukasi_pasien_farmasi' => optional($edukasi_pasien_farmasi),
            'edukasi_pasien_rehab' => optional($edukasi_pasien_rehab),
            'datamypatient' => optional($datamypatient) ?? (object) null,
            'edukasi_pasien_anastesi' => optional($edukasi_pasien_anastesi) ?? (object) null,
        );

        if (isset($request->type)) {
            return view('new_perawat.edukasi.components.edukasi_' . $request->type)
                ->with($context);
        }

        return view('new_perawat.edukasi.entry_edukasi_pasien')
            ->with($context);
    }

    function assesment_resiko_jatuh_geriatri(Request $request)
    {

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
        );
        return view('new_perawat.resiko_jatuh.geriatri.resiko_jatuh_geritatri')
            ->with($context);
    }

    function assesment_resiko_jatuh_humpty_dumpty(Request $request)
    {
        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
        );
        return view('new_perawat.resiko_jatuh.humpty_dumpty.resiko_jatuh_humpty_dumpty')
            ->with($context);
    }

    function assesment_resiko_jatuh_neonatus(Request $request)
    {
        $registrasi_pj = RegistrasiPJawab::where('reg_no', $request->reg_no)->get();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'registrasi_pj' => $registrasi_pj,
        );
        return view('new_perawat.resiko_jatuh.neonatus.resiko_jatuh_neonatus')
            ->with($context);
    }

    function assesment_resiko_jatuh_skala_morse(Request $request)
    {
        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
        );
        return view('new_perawat.resiko_jatuh.skala_morse.resiko_jatuh_skala_morse')
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
        $awal = DB::connection('mysql')
            ->table('pengkajian_dewasa_awal')
            ->where('reg_no', $request->reg_no)
            ->first();

        $sad_person = DB::connection('mysql')
            ->table('pengkajian_dewasa_skor_sad_person')
            ->where('reg_no', $request->reg_no)
            ->first();

        $adl = DB::connection('mysql')
            ->table('pengkajian_dewasa_adl')
            ->where('reg_no', $request->reg_no)
            ->first();

        $nyeri = DB::connection('mysql')
            ->table('pengkajian_dewasa_skrining_nyeri')
            ->where('reg_no', $request->reg_no)
            ->first();

        $gizi = DB::connection('mysql')
            ->table('pengkajian_dewasa_skrining_gizi')
            ->where('reg_no', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'awal' => optional($awal),
            'sad_person' => optional($sad_person),
            'adl' => optional($adl),
            'nyeri' => optional($nyeri),
            'gizi' => optional($gizi),
        );

        return view('new_perawat.assesment.assesment_dewasa.index_dewasa')
            ->with($context);
    }

    function assesment_awal_anak_old(Request $request)
    {

        $reg = RegistrationInap::find($request->reg_no);
        $pasien = Pasien::find($reg->reg_medrec);
        $dateDiff = Carbon::now()->diff($pasien->DateOfBirth);
        // dd($dateDiff->y . ' Year ' . $dateDiff->m . ' Month ' . $dateDiff->d . ' Day');
        // if (($dateDiff->y > 0 && $dateDiff->y <= 18) ||  $dateDiff->m > 0 || $dateDiff->d >= 28) {
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
        // } else {
        //     return view('new_perawat.assesment.error.assesment_anak');
        // }
    }

    function assesment_awal_anak(Request $request)
    {

        $reg = RegistrationInap::find($request->reg_no);
        $pasien = Pasien::find($reg->reg_medrec);
        $dateDiff = Carbon::now()->diff($pasien->DateOfBirth);
        // dd($dateDiff->y . ' Year ' . $dateDiff->m . ' Month ' . $dateDiff->d . ' Day');
        // if (($dateDiff->y > 0 && $dateDiff->y <= 18) ||  $dateDiff->m > 0 || $dateDiff->d >= 28) {
        $assesment_awal_anak = DB::connection('mysql')
            ->table('pengkajian_awal_anak_perawat')
            ->where('reg_no', $request->reg_no)
            ->first();

        $skor_sad = DB::connection('mysql')
            ->table('skor_sad_person_anak')
            ->where('reg_no', $request->reg_no)
            ->first();

        $adl_anak = DB::connection('mysql')
            ->table('activity_daily_living_anak')
            ->where('reg_no', $request->reg_no)
            ->first();

        $gizi = DB::connection('mysql')
            ->table('skrining_gizi_anak')
            ->where('reg_no', $request->reg_no)
            ->first();

        $nyeri = DB::connection('mysql')
            ->table('skrining_nyeri_anak')
            ->where('reg_no', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'assesment' => optional($assesment_awal_anak),
            'skor_sad' => optional($skor_sad),
            'adl_anak' => optional($adl_anak),
            'gizi'  => optional($gizi),
            'nyeri'  => optional($nyeri),
        );
        return view('new_perawat.assesment.assesment_anak.index')
            ->with($context);
        // } else {
        //     return view('new_perawat.assesment.error.assesment_anak');
        // }
    }

    function assesment_awal_neonatus(Request $request)
    {
        $reg = RegistrationInap::find($request->reg_no);
        $fisik = NeonatusFisik::where('reg_no', $request->reg_no)->first();
        $nyeri = NeonatusNyeri::where('reg_no', $request->reg_no)->first();
        $ttd = NeonatusTtd::where('reg_no', $request->reg_no)->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'fisik' => optional($fisik),
            'skrinning' => optional($nyeri),
            'ttd'   => optional($ttd),
        );
        return view("new_perawat.assesment.neonatus")->with($context);
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

        $diagnosa_gizi_dewasa = DB::connection('mysql')
            ->table('diagnosa_gizi_dewasa')
            ->where('reg_no', $request->reg_no)
            ->get();

        $monitoring_evaluasi_gizi_dewasa = DB::connection('mysql')
            ->table('monitoring_evaluasi_gizi_dewasa')
            ->where('reg_no', $request->reg_no)
            ->get();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'assesment_gizi_dewasa' => optional($assesment_gizi_dewasa),
            'asuhan_gizi_dewasa' => optional($asuhan_gizi_dewasa),
            'diagnosa_gizi_dewasa' => $diagnosa_gizi_dewasa,
            'monitoring_evaluasi_gizi_dewasa' => $monitoring_evaluasi_gizi_dewasa,
        );
        return view('new_perawat.gizi.dewasa.index_dewasa')
            ->with($context);
    }

    function assesment_gizi_anak(Request $request)
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

        $diagnosa_gizi_dewasa = DB::connection('mysql')
            ->table('diagnosa_gizi_dewasa')
            ->where('reg_no', $request->reg_no)
            ->get();

        $monitoring_evaluasi_gizi_dewasa = DB::connection('mysql')
            ->table('monitoring_evaluasi_gizi_dewasa')
            ->where('reg_no', $request->reg_no)
            ->get();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'assesment_gizi_dewasa' => optional($assesment_gizi_dewasa),
            'asuhan_gizi_dewasa' => optional($asuhan_gizi_dewasa),
            'diagnosa_gizi_dewasa' => $diagnosa_gizi_dewasa,
            'monitoring_evaluasi_gizi_dewasa' => $monitoring_evaluasi_gizi_dewasa,
        );
        return view('new_perawat.gizi.anak.index_anak')
            ->with($context);
    }

    function assesment_gizi_obgyn(Request $request)
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

        $diagnosa_gizi_dewasa = DB::connection('mysql')
            ->table('diagnosa_gizi_dewasa')
            ->where('reg_no', $request->reg_no)
            ->get();

        $monitoring_evaluasi_gizi_dewasa = DB::connection('mysql')
            ->table('monitoring_evaluasi_gizi_dewasa')
            ->where('reg_no', $request->reg_no)
            ->get();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'assesment_gizi_dewasa' => optional($assesment_gizi_dewasa),
            'asuhan_gizi_dewasa' => optional($asuhan_gizi_dewasa),
            'diagnosa_gizi_dewasa' => $diagnosa_gizi_dewasa,
            'monitoring_evaluasi_gizi_dewasa' => $monitoring_evaluasi_gizi_dewasa,
        );
        return view('new_perawat.gizi.obgyn.index_obgyn')
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
        $cek_transfer_ongoing = DB::connection('mysql')
            ->table('transfer_internal')
            ->where([
                ['transfer_reg', $request->reg_no],
                ['status_transfer', 0],
            ])
            ->count();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'cek_transfer_ongoing'  => $cek_transfer_ongoing,
        );

        return view('new_perawat.transfer_internal.v3.riwayat_transfer')
            ->with($context);
    }

    function edit_transfer_internal(Request $request)
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

        $class_bed = DB::connection('mysql2')->table('m_room_class')->where('isActive', 1)->get();

        $cek_transfer_ongoing = DB::connection('mysql')
            ->table('transfer_internal')
            ->where([
                ['transfer_reg', $request->reg_no],
                ['status_transfer', 0],
            ])
            ->count();

        $transfer_internal = DB::connection('mysql')
            ->table('transfer_internal')
            ->where([
                ['transfer_reg', $request->reg_no],
                ['kode_transfer_internal', $request->kode_transfer_internal],
            ])
            ->first();

        $ruangan_asal = DB::connection('mysql2')
            ->table('m_registrasi')
            ->join('m_bed_history', 'm_bed_history.RegNo', '=', 'm_registrasi.reg_no')
            ->join('m_bed', 'm_bed.bed_id', '=', 'm_bed_history.ToBedID')
            ->leftJoin('m_ruangan', 'm_ruangan.RoomID', '=', 'm_bed.room_id')
            ->leftJoin('m_room_class', 'm_room_class.ClassCode', '=', 'm_bed.class_code')
            // ->join('m_unit_departemen', 'm_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitCode')
            ->leftJoin('m_unit_departemen', function ($join) {
                $join->on('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitID');
            })
            ->leftJoin('m_unit', 'm_unit_departemen.ServiceUnitCode', '=', 'm_unit.ServiceUnitCode')
            ->select('bed_id', 'bed_code', 'room_id', 'class_code', 'RoomName as ruang', 'ServiceUnitName as kelompok', 'm_room_class.ClassName as kelas')
            ->where('m_registrasi.reg_no', $request->reg_no)
            ->orderBy('m_bed_history.ReceiveTransferDate', 'desc')
            ->orderBy('m_bed_history.ReceiveTransferTime', 'desc')
            ->first();

        $ruangan_tujuan = DB::connection('mysql2')
            ->table('m_bed')
            ->leftJoin('m_ruangan', 'm_ruangan.RoomID', '=', 'm_bed.room_id')
            ->leftJoin('m_room_class', 'm_room_class.ClassCode', '=', 'm_bed.class_code')
            // ->join('m_unit_departemen', 'm_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitCode')
            ->leftJoin('m_unit_departemen', function ($join) {
                $join->on('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitID');
            })
            ->leftJoin('m_unit', 'm_unit_departemen.ServiceUnitCode', '=', 'm_unit.ServiceUnitCode')
            ->select('bed_id', 'bed_code', 'room_id', 'class_code', 'RoomName as ruang', 'ServiceUnitName as kelompok', 'm_room_class.ClassName as kelas')
            ->where('bed_id', $transfer_internal->transfer_unit_tujuan)
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
            'cek_transfer_ongoing'  => $cek_transfer_ongoing,
            'ruangan_asal' => $ruangan_asal,
            'ruangan_tujuan' => $ruangan_tujuan,
            'class_bed' => $class_bed,
            'type'  => $request->type,
        );

        if ($transfer_internal->transfer_rawat_intensif == 1) {
            $context['type'] = 'intensif';
        }

        return view('new_perawat.transfer_internal.v3.index')
            ->with($context);
    }

    function nurse_transfer_internal_old(Request $request)
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
        return view('new_perawat.transfer_internal.v3.index')
            ->with($context);
    }

    function create_transfer_internal(Request $request)
    {
        DB::beginTransaction();

        try {

            $data = [
                'transfer_reg'  => $request->reg_no,
                'medrec'        => $request->medrec,
            ];

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

            $ruangan_asal = DB::connection('mysql2')
                ->table('m_registrasi')
                ->join('m_bed_history', 'm_bed_history.RegNo', '=', 'm_registrasi.reg_no')
                ->select('ToBedID')
                ->where('m_registrasi.reg_no', $request->reg_no)
                ->orderBy('m_bed_history.ReceiveTransferDate', 'DESC')
                ->orderBy('m_bed_history.ReceiveTransferTime', 'DESC')
                ->first();

            // $data['kode_transfer_internal'] = 'TI20240913112430346';
            $data['kode_transfer_internal'] = app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->generate_code_transfer_internal();
            $data['transfer_unit_asal'] = $datapasien->bed;
            $data['ditransfer_oleh_user_id'] = auth()->user()->username;
            $data['ditransfer_oleh_nama'] = auth()->user()->name;

            if ($request->type == 'intensif') {
                $data['transfer_rawat_intensif'] = 1;
            }


            DB::connection('mysql')->table('transfer_internal')
                ->insert($data);

            $class_bed = DB::connection('mysql2')->table('m_room_class')->where('isActive', 1)->get();

            $transfer_internal = DB::connection('mysql')
                ->table('transfer_internal')
                ->where('transfer_reg', $request->reg_no)
                ->where('kode_transfer_internal', $data['kode_transfer_internal'])
                ->first();

            $ruangan_asal = DB::connection('mysql2')
                ->table('m_registrasi')
                ->join('m_bed_history', 'm_bed_history.RegNo', '=', 'm_registrasi.reg_no')
                ->join('m_bed', 'm_bed.bed_id', '=', 'm_bed_history.ToBedID')
                ->leftJoin('m_ruangan', 'm_ruangan.RoomID', '=', 'm_bed.room_id')
                ->leftJoin('m_room_class', 'm_room_class.ClassCode', '=', 'm_bed.class_code')
                // ->join('m_unit_departemen', 'm_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitCode')
                ->leftJoin('m_unit_departemen', function ($join) {
                    $join->on('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitCode')
                        ->orOn('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitID');
                })
                ->leftJoin('m_unit', 'm_unit_departemen.ServiceUnitCode', '=', 'm_unit.ServiceUnitCode')
                ->select('bed_id', 'bed_code', 'room_id', 'class_code', 'RoomName as ruang', 'ServiceUnitName as kelompok', 'm_room_class.ClassName as kelas')
                ->where('m_registrasi.reg_no', $request->reg_no)
                ->orderBy('m_bed_history.ReceiveTransferDate', 'desc')
                ->orderBy('m_bed_history.ReceiveTransferTime', 'desc')
                ->first();

            $context = array(
                'reg' => $request->reg_no,
                'medrec' => $request->medrec,
                'transfer_internal' => optional($transfer_internal),
                'datapasien' => optional($datapasien),
                'ruangan_asal'  => optional($ruangan_asal),
                'class_bed' => $class_bed,
                'type'  => 'edit',
            );

            if ($request->type == 'intensif') {
                $context['type'] = 'intensif';
            }

            DB::commit();

            return view('new_perawat.transfer_internal.v3.index')
                ->with($context);
        } catch (\Throwable $throw) {
            //throw $th;
            DB::rollBack();
            //dd($th->getMessage());
            abort(500, $throw->getMessage());
        }
    }

    function terima_transfer_internal(Request $request)
    {

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
        );
        return view('new_perawat.transfer_internal.v3.serah_terima')
            ->with($context);
    }

    function confirm_view_terima(Request $request)
    {
        DB::beginTransaction();

        try {

            $data = [
                'transfer_reg'  => $request->reg_no,
                'medrec'        => $request->medrec,
            ];
            // $data['kode_transfer_internal'] = 'TI20240913112430346';
            // $data['kode_transfer_internal'] = app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->generate_code_transfer_internal();

            // DB::connection('mysql')->table('transfer_internal')
            //     ->insert($data);

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
                ->where('kode_transfer_internal', $request->kode_transfer)
                ->first();

            $class_bed = DB::connection('mysql2')->table('m_room_class')->where('isActive', 1)->get();


            $ruangan_asal = DB::connection('mysql2')
                ->table('m_registrasi')
                ->join('m_bed_history', 'm_bed_history.RegNo', '=', 'm_registrasi.reg_no')
                ->join('m_bed', 'm_bed.bed_id', '=', 'm_bed_history.ToBedID')
                ->leftJoin('m_ruangan', 'm_ruangan.RoomID', '=', 'm_bed.room_id')
                ->leftJoin('m_room_class', 'm_room_class.ClassCode', '=', 'm_bed.class_code')
                ->leftJoin('m_unit_departemen', function ($join) {
                    $join->on('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitCode')
                        ->orOn('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitID');
                })
                ->leftJoin('m_unit', 'm_unit_departemen.ServiceUnitCode', '=', 'm_unit.ServiceUnitCode')
                ->select('bed_id', 'bed_code', 'room_id', 'class_code', 'RoomName as ruang', 'ServiceUnitName as kelompok', 'm_room_class.ClassName as kelas')
                ->where('m_registrasi.reg_no', $request->reg_no)
                ->orderBy('m_bed_history.ReceiveTransferDate', 'desc')
                ->orderBy('m_bed_history.ReceiveTransferTime', 'desc')
                ->first();

            $ruangan_tujuan = DB::connection('mysql2')
                ->table('m_bed')
                ->leftJoin('m_ruangan', 'm_ruangan.RoomID', '=', 'm_bed.room_id')
                ->leftJoin('m_room_class', 'm_room_class.ClassCode', '=', 'm_bed.class_code')
                ->leftJoin('m_unit_departemen', function ($join) {
                    $join->on('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitCode')
                        ->orOn('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitID');
                })
                ->leftJoin('m_unit', 'm_unit_departemen.ServiceUnitCode', '=', 'm_unit.ServiceUnitCode')
                ->select('bed_id', 'bed_code', 'room_id', 'class_code', 'RoomName as ruang', 'ServiceUnitName as kelompok', 'm_room_class.ClassName as kelas')
                ->where('bed_id', $transfer_internal->transfer_unit_tujuan)
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
                'ruangan_asal' => $ruangan_asal,
                'ruangan_tujuan' => $ruangan_tujuan,
                'class_bed' => $class_bed,
                'type'  => 'terima'
            );

            DB::commit();

            return view('new_perawat.transfer_internal.v3.index')
                ->with($context);
        } catch (\Throwable $throw) {
            //throw $th;
            DB::rollBack();
            //dd($th->getMessage());
            abort(500, $throw->getMessage());
        }
    }

    function print_transfer_internal(Request $request)
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
            ->where([
                ['transfer_reg', $request->reg_no],
                ['kode_transfer_internal', $request->kode_transfer_internal],
            ])
            ->first();

        $ruangan_asal = DB::connection('mysql2')
            ->table('m_registrasi')
            ->join('m_bed_history', 'm_bed_history.RegNo', '=', 'm_registrasi.reg_no')
            ->join('m_bed', 'm_bed.bed_id', '=', 'm_bed_history.ToBedID')
            ->leftJoin('m_ruangan', 'm_ruangan.RoomID', '=', 'm_bed.room_id')
            ->leftJoin('m_room_class', 'm_room_class.ClassCode', '=', 'm_bed.class_code')
            // ->join('m_unit_departemen', 'm_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitCode')
            ->leftJoin('m_unit_departemen', function ($join) {
                $join->on('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitCode')
                    ->orOn('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitID');
            })
            ->leftJoin('m_unit', 'm_unit_departemen.ServiceUnitCode', '=', 'm_unit.ServiceUnitCode')
            ->select('bed_id', 'bed_code', 'room_id', 'class_code', 'RoomName as ruang', 'ServiceUnitName as kelompok', 'm_room_class.ClassName as kelas')
            ->where('m_registrasi.reg_no', $request->reg_no)
            ->orderBy('m_bed_history.ReceiveTransferDate', 'desc')
            ->orderBy('m_bed_history.ReceiveTransferTime', 'desc')
            ->first();


        $ruangan_tujuan = DB::connection('mysql2')
            ->table('m_bed')
            ->leftJoin('m_ruangan', 'm_ruangan.RoomID', '=', 'm_bed.room_id')
            ->leftJoin('m_room_class', 'm_room_class.ClassCode', '=', 'm_bed.class_code')
            // ->join('m_unit_departemen', 'm_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitCode')
            ->leftJoin('m_unit_departemen', function ($join) {
                $join->on('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitCode')
                    ->orOn('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitID');
            })
            ->leftJoin('m_unit', 'm_unit_departemen.ServiceUnitCode', '=', 'm_unit.ServiceUnitCode')
            ->select('bed_id', 'bed_code', 'room_id', 'class_code', 'RoomName as ruang', 'ServiceUnitName as kelompok', 'm_room_class.ClassName as kelas')
            ->where('bed_id', $transfer_internal->transfer_unit_tujuan)
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

        $transfer_internal_diagnostik = DB::connection('mysql')
            ->table('transfer_internal_diagnostik')
            ->where('reg_no', $request->reg_no)
            ->when($transfer_internal && $transfer_internal->kode_transfer_internal, function ($query) use ($transfer_internal) {
                return $query->where('kode_transfer_internal', $transfer_internal->kode_transfer_internal);
            })
            ->get();

        $dokter = DB::connection('mysql2')->table('users')->where('dokter_id', $datapasien->reg_dokter)->first();
        $perawat_asal = DB::connection('mysql2')->table('users')->where('username', $transfer_internal->ditransfer_oleh_user_id)->first();
        $perawat_tujuan = DB::connection('mysql2')->table('users')->where('username', $transfer_internal->diterima_oleh_user_id)->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'transfer_internal' => optional($transfer_internal),
            'datapasien' => optional($datapasien),
            'transfer_internal_alat_terpasang' => $transfer_internal_alat_terpasang,
            'transfer_internal_obat_dibawa' => $transfer_internal_obat_dibawa,
            'transfer_internal_status_pasien' => $transfer_internal_status_pasien,
            'transfer_internal_kejadian' => $transfer_internal_kejadian,
            'transfer_internal_diagnostik' => $transfer_internal_diagnostik,
            'ruangan_asal' => $ruangan_asal,
            'ruangan_tujuan' => $ruangan_tujuan,
            'dokter'    => $dokter,
            'perawat_asal' => $perawat_asal,
            'perawat_tujuan' => $perawat_tujuan,
        );

        return view('new_perawat.transfer_internal.v3.print_transfer')
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
        $alergi_keadaan_umum = ObgynAlergiKeadaanUmum::where('reg_no', $request->reg_no)->first();
        $data_psikologis = ObgynDataPsikologis::where('reg_no', $request->reg_no)->first();
        $menstruasi_dan_perkawinan = ObgynRiwayatMenstruasiDanPerkawinan::where('reg_no', $request->reg_no)->first();
        $riwayat_kehamilan = ObgynRiwayatKehamilan::where('reg_no', $request->reg_no)->get();
        $skrining_gizi = ObgynSkriningGizi::where('reg_no', $request->reg_no)->first();
        $skrining_nyeri = ObgynSkriningNyeri::where('reg_no', $request->reg_no)->first();
        $skrining_fungsional = ObgynSkriningFungsional::where('reg_no', $request->reg_no)->first();
        $pengkajian_kulit = ObgynPengkajianKulit::where('reg_no', $request->reg_no)->first();
        $pengkajian_kebutuhan = ObgynPengkajianKebutuhan::where('reg_no', $request->reg_no)->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'alergi_keadaan_umum' => optional($alergi_keadaan_umum),
            'data_psikologis' => optional($data_psikologis),
            'menstruasi_dan_perkawinan' => optional($menstruasi_dan_perkawinan),
            'riwayat_kehamilan' => $riwayat_kehamilan,
            'skrining_gizi' => optional($skrining_gizi),
            'skrining_nyeri' => optional($skrining_nyeri),
            'skrining_fungsional' => optional($skrining_fungsional),
            'pengkajian_kulit' => optional($pengkajian_kulit),
            'pengkajian_kebutuhan' => optional($pengkajian_kebutuhan),
        );

        return view('new_perawat.assesment.obgyn.index_obgyn')
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
        $obat = DB::connection('mysql')->table('nursing_drugs')
            ->where([
                ['reg_no', $request->reg_no],
                ['is_deleted', 0]
            ])->get();

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

        // $nurse_transfusi_darah = DB::connection('mysql')
        // ->table('monitoring_transfusi_darah')
        // ->where('reg_no', $request->reg_no)
        // ->where('reg_medrec', $request->medrec)
        // ->orderBy('waktu_transfusi', 'desc')
        // ->orderBy('id', 'desc')
        // ->first();

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
                "datamypatient",
                "reg_no",
                // "nurse_transfusi_darah",
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
        $data_pasien = DB::connection('mysql2')
            ->table('m_registrasi')
            ->where('reg_no', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'data_pasien' => optional($data_pasien),
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

        $rs_pasien_intra_tindakan = DB::connection('mysql')
            ->table('rs_pasien_intra_tindakan')
            ->where('no_reg', $request->reg_no)
            ->first();

        $pra_tindakan = DB::connection('mysql')
            ->table('rs_catatan_keperawatan_pra_tindakan')
            ->where('reg_no', $request->reg_no)
            ->first();

        $paska_tindakan = DB::connection('mysql')
            ->table('rs_paska_tindakan')
            ->where('reg_no', $request->reg_no)
            ->first();

        $observasi_paska = DB::connection('mysql')
            ->table('rs_observasi_paska_tindakan')
            ->where('reg_no', $request->reg_no)
            ->first();

        $pemantauan_hemodinamik = DB::connection('mysql')
            ->table('rs_pasien_intra_pemantuan')
            ->where('no_reg', $request->reg_no)
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'sign_in' => optional($sign_in),
            'time_out' => optional($time_out),
            'sign_out' => optional($sign_out),
            'rs_pasien_intra_tindakan' => optional($rs_pasien_intra_tindakan),
            'pra_tindakan' => optional($pra_tindakan),
            'paska_tindakan' => optional($paska_tindakan),
            'observasi_paska' => optional($observasi_paska),
            'pemantauan_hemodinamik' => optional($pemantauan_hemodinamik),
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
        // $jam_sekarang = Carbon::now()->format('H');
        // $tanggal_sekarang = Carbon::now()->format('Y-m-d');
        // $monitoring_news = DB::connection('mysql')
        //     ->table('rs_monitoring_news')
        //     ->where('reg_no', $request->reg_no)
        //     ->where('news_jam', $jam_sekarang)
        //     ->where('news_tanggal', $tanggal_sekarang)
        //     ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            // 'monitoring_news' => optional($monitoring_news),
            // 'jam_sekarang' => ($jam_sekarang),
            // 'tanggal_sekarang' => ($tanggal_sekarang),
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
        $dataPasien = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->where(['m_registrasi.reg_no' => $request->reg_no])
            ->select('m_pasien.*', 'm_paramedis.ParamedicName', 'm_registrasi.*')
            ->first();

        $registrasi_pj = RegistrasiPJawab::where('reg_no', $request->reg_no)->get();


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
            'registrasi_pj' => $registrasi_pj,

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

    function form_Case_manager(Request $request)
    {
        $case_manager = DB::connection('mysql')->table('case_manager')
            ->where('reg_no', $request->reg_no)
            ->where('med_rec', $request->medrec)
            ->first();

        $case_manager_akumulasi = DB::connection('mysql')->table('case_manager_akumulasi')
            ->where('reg_no', $request->reg_no)
            ->where('med_rec', $request->medrec)
            ->first();

        $datamypatient = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->where(['m_registrasi.reg_no' => $request->reg_no])
            ->first();

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'case_manager' => optional($case_manager),
            'datamypatient' => optional($datamypatient),
            'case_manager_akumulasi' => optional($case_manager_akumulasi),
        );

        return view('new_perawat.case_manager.index')
            ->with($context);
    }

    function persetujuan_penolakan_dokter(Request $request)
    {
        $dataPasien = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->where(['m_registrasi.reg_no' => $request->reg_no])
            ->select('m_pasien.*', 'm_paramedis.ParamedicName','m_registrasi.*')
            ->first();

        $registrasi_pj = RegistrasiPJawab::where('reg_no', $request->reg_no)->get();

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

        if (!$informasi) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json(
            [
                'status' => true,
                'data' => [
                  
                    'informasi' => $informasi,
                    'persetujuan' => $persetujuan,
                    'penolakan' => $penolakan,
                    'dataPasien' => $dataPasien,
                    'registrasi_pj' => $registrasi_pj,
                ]
            ],
            200
        );
    }

    public function pemeriksaan_penunjang(Request $request)
    {
        return view('new_dokter.pemeriksaan_penunjang.index');
    }
}
