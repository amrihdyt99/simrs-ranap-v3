<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AssesmentDewasaController extends Controller
{
    public function store_assesment_awal_dewasa(Request $request)
    {
        
        extract($request->all());
        $awal['reg_no'] = $request->reg_no;
        $awal['med_rec'] = $request->med_rec;
        $sad_person['reg_no'] = $request->reg_no;
        $sad_person['med_rec'] = $request->med_rec;
        $adl['reg_no'] = $request->reg_no;
        $adl['med_rec'] = $request->med_rec;

        if (isset($awal['diberitahukan_kpd'])) {
            $awal['diberitahukan_kpd'] = $this->combine_array($awal['diberitahukan_kpd']);
        }
        if (isset($awal['kebutuhan_khusus'])) {
            $awal['kebutuhan_khusus'] = $this->combine_array($awal['kebutuhan_khusus']);
        }
        if (isset($awal['status_emosional'])) {
            $awal['status_emosional'] = $this->combine_array($awal['status_emosional']);
        }
        if (isset($awal['riwayat_trauma_psikis_detail'])) {
            $awal['riwayat_trauma_psikis_detail'] = $this->combine_array($awal['riwayat_trauma_psikis_detail']);
        }

        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), []);
            if ($validator->passes()) {

                $cekAwal = DB::connection('mysql')->table('pengkajian_dewasa_awal')->where('reg_no', $request->reg_no)->count();
                $cekSadPerson = DB::connection('mysql')->table('pengkajian_dewasa_skor_sad_person')->where('reg_no', $request->reg_no)->count();
                $cekAdl = DB::connection('mysql')->table('pengkajian_dewasa_adl')->where('reg_no', $request->reg_no)->count();

                if ($cekAwal > 0) {
                    $awal['updated_by'] = $username;
                    $awal['updated_at'] = Carbon::now();
                    $awalData = DB::connection('mysql')->table('pengkajian_dewasa_awal')->where('reg_no', $awal['reg_no'])
                    ->update($awal);
                } else {
                    $awal['created_by'] = $username;
                    $awal['created_at'] = Carbon::now();
                    $awalData = DB::connection('mysql')->table('pengkajian_dewasa_awal')
                    ->insert($awal);
                }

                if ($cekSadPerson > 0) {
                    $sad_person['updated_by'] = $username;
                    $sad_person['updated_at'] = Carbon::now();
                    $sad_personData = DB::connection('mysql')->table('pengkajian_dewasa_skor_sad_person')->where('reg_no', $sad_person['reg_no'])
                    ->update($sad_person);
                } else {
                    $sad_person['created_by'] = $username;
                    $sad_person['created_at'] = Carbon::now();
                    $sad_personData = DB::connection('mysql')->table('pengkajian_dewasa_skor_sad_person')
                    ->insert($sad_person);
                }

                if ($cekAdl > 0) {
                    $adl['updated_by'] = $username;
                    $adl['updated_at'] = Carbon::now();
                    $adlData = DB::connection('mysql')->table('pengkajian_dewasa_adl')->where('reg_no', $adl['reg_no'])
                    ->update($adl);
                } else {
                    $adl['created_by'] = $username;
                    $adl['created_at'] = Carbon::now();
                    $adlData = DB::connection('mysql')->table('pengkajian_dewasa_adl')
                    ->insert($adl);
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

    public function store_skrining_nyeri_dewasa(Request $request)
    {
        extract($request->all());
        $nyeri['reg_no'] = $request->reg_no;
        $nyeri['med_rec'] = $request->med_rec;

        if (isset($nyeri['tipe_nyeri'])) {
            $nyeri['tipe_nyeri'] = $this->combine_array($nyeri['tipe_nyeri']);
        }
        
        DB::beginTransaction();
        try{
            $validator = Validator::make($request->all(), []);

            if ($validator->passes()) {
                $cekNyeri = DB::connection('mysql')->table('pengkajian_dewasa_skrining_nyeri')->where('reg_no', $request->reg_no)->count();
                if ($cekNyeri > 0) {
                    $nyeri['updated_by'] = $username;
                    $nyeri['updated_at'] = Carbon::now();
                    $nyeriData = DB::connection('mysql')->table('pengkajian_dewasa_skrining_nyeri')->where('reg_no', $nyeri['reg_no'])
                    ->update($nyeri);
                } else {
                    $nyeri['created_by'] = $username;
                    $nyeri['created_at'] = Carbon::now();
                    $nyeriData = DB::connection('mysql')->table('pengkajian_dewasa_skrining_nyeri')
                    ->insert($nyeri);
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
            DB::rollBack();
            abort(500, $throw->getMessage());
        }
    }
    
    public function store_skrining_gizi_dewasa(Request $request)
    {
        extract($request->all());
        $gizi['reg_no'] = $request->reg_no;
        $gizi['med_rec'] = $request->med_rec;

        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), []);

            if ($validator->passes()) {
                $cekGizi = DB::connection('mysql')->table('pengkajian_dewasa_skrining_gizi')->where('reg_no', $request->reg_no)->count();
                if ($cekGizi > 0) {
                    $gizi['updated_by'] = $username;
                    $gizi['updated_at'] = Carbon::now();
                    $giziData = DB::connection('mysql')->table('pengkajian_dewasa_skrining_gizi')->where('reg_no', $gizi['reg_no'])
                    ->update($gizi);
                } else {
                    $gizi['created_by'] = $username;
                    $gizi['created_at'] = Carbon::now();
                    $giziData = DB::connection('mysql')->table('pengkajian_dewasa_skrining_gizi')
                    ->insert($gizi);
                }
                DB::commit();
                $response = response()->json([
                    'status' => 'success',
                    'message' => 'Data skrining gizi berhasil disimpan',
                ]);
            } else {
                abort(402, json_encode($validator->errors()->all()));
            }
            return $response;
        } catch (\Throwable $throw) {
            DB::rollBack();
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
