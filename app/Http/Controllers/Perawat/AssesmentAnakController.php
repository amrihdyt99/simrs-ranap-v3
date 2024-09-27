<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ZxcNyaaUniversal\AaaBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AssesmentAnakController extends AaaBaseController
{
    public function store_assesment_awal_anak(Request $request)
    {
        extract($request->all());

        if (isset($awal['diberitahukan_kpd'])) {
            $awal['diberitahukan_kpd'] = $this->combine_array($awal['diberitahukan_kpd']);
        }
        if (isset($awal['kebutuhan_khusus'])) {
            $awal['kebutuhan_khusus'] = $this->combine_array($awal['kebutuhan_khusus']);
        }
        if (isset($awal['riwayat_trauma_psikis'])) {
            $awal['riwayat_trauma_psikis'] = $this->combine_array($awal['riwayat_trauma_psikis']);
        }
        if (isset($awal['list_res_riwayat_ibu'])) {
            $awal['list_res_riwayat_ibu'] = $this->combine_array($awal['list_res_riwayat_ibu']);
        }
        if (isset($awal['list_postnatal'])) {
            $awal['list_postnatal'] = $this->combine_array($awal['list_postnatal']);
        }
        if (isset($awal['hospitalisasi'])) {
            $awal['hospitalisasi'] = $this->combine_array($awal['hospitalisasi']);
        }

        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), []);
            if ($validator->passes()) {

                $cekAwal = DB::connection('mysql')->table('pengkajian_awal_anak_perawat')->where('reg_no', $awal['reg_no'])->count();
                $cekSkorSad = DB::connection('mysql')->table('skor_sad_person_anak')->where('reg_no', $awal['reg_no'])->count();
                $cekAdl = DB::connection('mysql')->table('activity_daily_living_anak')->where('reg_no', $awal['reg_no'])->count();

                if ($cekAwal > 0) {
                    $awal['updated_by'] = $username;
                    $awal['updated_at'] = Carbon::now();
                    $awalData = DB::connection('mysql')->table('pengkajian_awal_anak_perawat')->where('reg_no', $awal['reg_no'])->update($awal);
                } else {
                    $awal['created_by'] = $username;
                    $awal['created_at'] = Carbon::now();
                    $awalData = DB::connection('mysql')->table('pengkajian_awal_anak_perawat')->insert($awal);
                }

                if ($cekSkorSad > 0) {
                    $skor_sad['updated_by'] = $username;
                    $skor_sad['updated_at'] = Carbon::now();
                    $skorSadData = DB::connection('mysql')->table('skor_sad_person_anak')->where('reg_no', $awal['reg_no'])->update($skor_sad);
                } else {
                    $skor_sad['created_by'] = $username;
                    $skor_sad['created_at'] = Carbon::now();
                    $skor_sad['reg_no'] = $awal['reg_no'];
                    $skor_sad['med_rec'] = $awal['med_rec'];
                    $skorSadData = DB::connection('mysql')->table('skor_sad_person_anak')->insert($skor_sad);
                }

                if ($cekAdl > 0) {
                    $adl['updated_by'] = $username;
                    $adl['updated_at'] = Carbon::now();
                    $adlData = DB::connection('mysql')->table('activity_daily_living_anak')->where('reg_no', $awal['reg_no'])->update($adl);
                } else {
                    $adl['created_by'] = $username;
                    $adl['created_at'] = Carbon::now();
                    $adl['reg_no'] = $awal['reg_no'];
                    $adl['med_rec'] = $awal['med_rec'];
                    $adlData = DB::connection('mysql')->table('activity_daily_living_anak')->insert($adl);
                }

                DB::commit();
                $response = response()->json([
                    'status' => 'success',
                    'message' => 'Data berhasil diperbarui',
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

    public function store_skrining_gizi_anak(Request $request)
    {
        extract($request->all());
        $gizi['sebab_malnutrisi'] = json_encode($gizi['sebab_malnutrisi']);
        // dd($gizi);
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), []);
            if ($validator->passes()) {
                $cekGizi = DB::connection('mysql')->table('skrining_gizi_anak')->where('reg_no', $gizi['reg_no'])->count();
                if ($cekGizi > 0) {
                    $gizi['updated_by'] = $username;
                    $gizi['updated_at'] = Carbon::now();
                    $giziData = DB::connection('mysql')->table('skrining_gizi_anak')->where('reg_no', $gizi['reg_no'])->update($gizi);
                } else {
                    $gizi['created_by'] = $username;
                    $gizi['created_at'] = Carbon::now();
                    $giziData = DB::connection('mysql')->table('skrining_gizi_anak')->insert($gizi);
                }

                DB::commit();
                $response = response()->json([
                    'status' => 'success',
                    'message' => 'Data berhasil diperbarui',
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

    public function combine_array($arr)
    {
        if (count($arr) > 0) {
            $arr =  implode(', ', $arr);
        } else {
            $arr = '';
        }

        return $arr;
    }
}
