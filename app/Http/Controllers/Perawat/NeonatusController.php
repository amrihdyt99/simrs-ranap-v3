<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use App\Models\Neonatus\NeonatusFisik;
use App\Models\Neonatus\NeonatusNyeri;
use App\Models\Neonatus\NeonatusTtd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class NeonatusController extends Controller
{

    public function store(Request $request)
    {
        extract($request->all());
        $fisik['reg_no'] = $request->reg_no;
        $fisik['med_rec'] = $request->med_rec;
        $skrinning['reg_no'] = $request->reg_no;
        $skrinning['med_rec'] = $request->med_rec;
        $ttd['reg_no'] = $request->reg_no;
        $ttd['med_rec'] = $request->med_rec;
        if (isset($skrinning['bahasa'])) {
            $skrinning['bahasa'] = implode(', ', $skrinning['bahasa']);
        } else {
            $skrinning['bahasa'] = '';
        }
        if (isset($skrinning['hambatan_ortu'])) {
            $skrinning['hambatan_ortu'] = implode(', ', $skrinning['hambatan_ortu']);
        } else {
            $skrinning['hambatan_ortu'] = '';
        }
        if (isset($skrinning['edukasi_ortu'])) {
            $skrinning['edukasi_ortu'] = implode(', ', $skrinning['edukasi_ortu']);
        } else {
            $skrinning['edukasi_ortu'] = '';
        }
        DB::beginTransaction();
        try {

            $validator = Validator::make($request->all(), []);


            if ($validator->passes()) {

                $cek = NeonatusFisik::where('reg_no', $reg_no)->count();
                if ($cek > 0) {
                    $fisikData = NeonatusFisik::where('reg_no', $reg_no)->first();
                    $fisikData->update($fisik);
                    $skrinning['pengkajian_neonatus_id'] = $fisikData->pengkajian_neonatus_id;
                    $skrinningData = NeonatusNyeri::where('reg_no', $reg_no)->first();
                    $skrinningData->update($skrinning);
                } else {
                    $fisikData = NeonatusFisik::create($fisik);
                    $skrinning['pengkajian_neonatus_id'] = $fisikData->pengkajian_neonatus_id;
                    Neonatus::create($skrinning);
                }

                $ttd['pengkajian_neonatus_id'] = $fisikData->pengkajian_neonatus_id;
                NeonatusTtd::create($ttd);


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
}
