<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use App\Models\Obgyn\ObgynAlergiKeadaanUmum;
use App\Models\Obgyn\ObgynDataPsikologis;
use App\Models\Obgyn\ObgynPengkajianKebutuhan;
use App\Models\Obgyn\ObgynPengkajianKulit;
use App\Models\Obgyn\ObgynRiwayatKehamilan;
use App\Models\Obgyn\ObgynRiwayatMenstruasiDanPerkawinan;
use App\Models\Obgyn\ObgynSkriningFungsional;
use App\Models\Obgyn\ObgynSkriningGizi;
use App\Models\Obgyn\ObgynSkriningNyeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ObgynController extends Controller
{
    public function store(Request $request)
    {
        extract($request->all());
        $table1['reg_no'] = $request->reg_no;
        $table1['med_rec'] = $request->med_rec;
        $table2['reg_no'] = $request->reg_no;
        $table2['med_rec'] = $request->med_rec;
        $table3['reg_no'] = $request->reg_no;
        $table3['med_rec'] = $request->med_rec;
        $table5['reg_no'] = $request->reg_no;
        $table5['med_rec'] = $request->med_rec;
        $table6['reg_no'] = $request->reg_no;
        $table6['med_rec'] = $request->med_rec;
        $table7['reg_no'] = $request->reg_no;
        $table7['med_rec'] = $request->med_rec;
        $table8['reg_no'] = $request->reg_no;
        $table8['med_rec'] = $request->med_rec;
        $table9['reg_no'] = $request->reg_no;
        $table9['med_rec'] = $request->med_rec;

       
        if (isset($table1['diberitahukan'])) {
            $table1['diberitahukan'] = implode(', ', $table1['diberitahukan']);
        } else {
            $table1['diberitahukan'] = '';
        }

        if (isset($table1['kebutuhan_khusus'])) {
            $table1['kebutuhan_khusus'] = implode(', ', $table1['kebutuhan_khusus']);
        } else {
            $table1['kebutuhan_khusus'] = '';
        }

        if (isset($table2['status_emosional'])) {
            $table2['status_emosional'] = implode(', ', $table2['status_emosional']);
        } else {
            $table2['status_emosional'] = '';
        }

        if (isset($table2['riwayat_trauma_psikis_detail'])) {
            $table2['riwayat_trauma_psikis_detail'] = implode(', ', $table2['riwayat_trauma_psikis_detail']);
        } else {
            $table2['riwayat_trauma_psikis_detail'] = '';
        }

        if (isset($table3['gangguan_haid'])) {
            $table3['gangguan_haid'] = implode(', ', $table3['gangguan_haid']);
        } else {
            $table3['gangguan_haid'] = '';
        }

        if (isset($table6['tipe_nyeri'])) {
            $table6['tipe_nyeri'] = implode(', ', $table6['tipe_nyeri']);
        } else {
            $table6['tipe_nyeri'] = '';
        }
        
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), []);

            if ($validator->passes()) {
                $cekTable1 = ObgynAlergiKeadaanUmum::where('reg_no', $request->reg_no)->count();
                $cekTable2 = ObgynDataPsikologis::where('reg_no', $request->reg_no)->count();
                $cekTable3 = ObgynRiwayatMenstruasiDanPerkawinan::where('reg_no', $request->reg_no)->count();
                $cekTable5 = ObgynSkriningGizi::where('reg_no', $request->reg_no)->count();
                $cekTable6 = ObgynSkriningNyeri::where('reg_no', $request->reg_no)->count();
                $cekTable7 = ObgynSkriningFungsional::where('reg_no', $request->reg_no)->count();
                $cekTable8 = ObgynPengkajianKulit::where('reg_no', $request->reg_no)->count();
                $cekTable9 = ObgynPengkajianKebutuhan::where('reg_no', $request->reg_no)->count();

                if ($cekTable1 > 0) {
                    $table1Data = ObgynAlergiKeadaanUmum::where('reg_no', $request->reg_no)->first();
                    $table1Data->update($table1);
                } else {
                    $table1Data = ObgynAlergiKeadaanUmum::create($table1);
                }

                if ($cekTable2 > 0) {
                    $table2Data = ObgynDataPsikologis::where('reg_no', $request->reg_no)->first();
                    $table2Data->update($table2);
                } else {
                    $table2Data = ObgynDataPsikologis::create($table2);
                }

                if ($cekTable3 > 0) {
                    $table3Data = ObgynRiwayatMenstruasiDanPerkawinan::where('reg_no', $request->reg_no)->first();
                    $table3Data->update($table3);
                } else {
                    $table3Data = ObgynRiwayatMenstruasiDanPerkawinan::create($table3);
                }

                if ($cekTable5 > 0) {
                    $table5Data = ObgynSkriningGizi::where('reg_no', $request->reg_no)->first();
                    $table5Data->update($table5);
                } else {
                    $table5Data = ObgynSkriningGizi::create($table5);
                }

                if ($cekTable6 > 0) {
                    $table6Data = ObgynSkriningNyeri::where('reg_no', $request->reg_no)->first();
                    $table6Data->update($table6);
                } else {
                    $table6Data = ObgynSkriningNyeri::create($table6);
                }

                if ($cekTable7 > 0) {
                    $table7Data = ObgynSkriningFungsional::where('reg_no', $request->reg_no)->first();
                    $table7Data->update($table7);
                } else {
                    $table7Data = ObgynSkriningFungsional::create($table7);
                }

                if ($cekTable8 > 0) {
                    $table8Data = ObgynPengkajianKulit::where('reg_no', $request->reg_no)->first();
                    $table8Data->update($table8);
                } else {
                    $table8Data = ObgynPengkajianKulit::create($table8);
                }

                if ($cekTable9 > 0) {
                    $table9Data = ObgynPengkajianKebutuhan::where('reg_no', $request->reg_no)->first();
                    $table9Data->update($table9);
                } else {
                    $table9Data = ObgynPengkajianKebutuhan::create($table9);
                }

                ObgynRiwayatKehamilan::where('reg_no', $request->reg_no)->delete();

                $table4 = $request->input('table4', []);

                foreach ($table4 as $row) {
                    $tgl_tahun_partus = $row['tgl_tahun_partus'];
                    $tempat_partus = $row['tempat_partus'];
                    $umur_hamil = $row['umur_hamil'];
                    $jenis_persalinan = $row['jenis_persalinan'];
                    $penolong_persalinan = $row['penolong_persalinan'];
                    $penyulit = $row['penyulit'];
                    $bb_anak = $row['bb_anak'];
                    $keadaan_sekarang = $row['keadaan_sekarang'];
                
                    ObgynRiwayatKehamilan::create([
                        'reg_no' => $request->reg_no,
                        'med_rec' => $request->med_rec,
                        'tgl_tahun_partus' => $tgl_tahun_partus,
                        'tempat_partus' => $tempat_partus,
                        'umur_hamil' => $umur_hamil,
                        'jenis_persalinan' => $jenis_persalinan,
                        'penolong_persalinan' => $penolong_persalinan,
                        'penyulit' => $penyulit,
                        'bb_anak' => $bb_anak,
                        'keadaan_sekarang' => $keadaan_sekarang,
                    ]);
                }
                


            } else {
                abort(402, json_encode($validator->errors()->all()));
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // dd($e->getMessage());
            abort(500, $e->getMessage());
        }
    }
}
