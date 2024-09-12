<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use App\Models\PasienSoaper;
use App\Models\RegistrationInap;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SummaryV2Controller extends Controller
{
    public function summary($reg_no)
    {
        // dd(auth()->user());
        // $data['registrationInap'] = RegistrationInap::find($reg_no);
        // $data['soap'] = PasienSoaper::where('soaper_reg',$reg_no)->latest()->get();
        $data = [];
        $reg = $reg_no;
        $dataPasien = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->where(['m_registrasi.reg_no' => $reg])
            ->first();
        if (!$dataPasien) {
            $dataPasien = optional((object)[]);
        }

        if ($dataPasien->reg_dokter) {
            $paracode = DB::connection('mysql2')->table('m_paramedis')->where('ParamedicCode', $dataPasien->reg_dokter)->first();
        }
        if (!$paracode) {
            $paracode = optional((object)[]);
        }

        // $dateDiff = Carbon::now()->diff($dataPasien->DateOfBirth);
        // $age = '';
        // if ($dateDiff->y == 0 && $dateDiff->m == 0 && $dateDiff->d <= 28) {
        //     $age = 'bayi';
        // } else if (($dateDiff->y > 0 && $dateDiff->y <= 18) || $dateDiff->y <= 18 ||  $dateDiff->m > 0 || $dateDiff->d >= 29) {
        //     $age = 'anak';
        // } else if ($dateDiff->y > 18) {
        //     $age = 'dewasa';
        // }

        // dd($dataPasien->DateOfBirth);


        return view('new_perawat-v2.assesment', compact('data', 'reg', 'dataPasien', 'paracode'));
    }

    // public function detail_pc_compare(RegistrationInap $patient) {
    //     return view('perawat.pages.patient.detail-pc-compare',compact('patient'));
    // }

    public function detail_prev_episode(RegistrationInap $patient)
    {
        return view('perawat.pages.patient.detail-prev-episode', compact('patient'));
    }

    public function detail() {}
}
