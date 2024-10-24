<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ZxcNyaaUniversal\AaaBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class RekonsiliasiObatController extends AaaBaseController
{
    public function index(Request $request)
    {

        $rekon_data = DB::connection('mysql')->table('rekonsiliasi_obat')
            ->where([
                ['reg_no', $request->reg_no],
                ['med_rec', $request->medrec],
            ])->first();

        $dpjp = DB::connection('mysql2')->table('users')
            ->leftJoin('m_registrasi', 'm_registrasi.reg_dokter', '=', 'users.dokter_id')
            ->where('m_registrasi.reg_no', $request->reg_no)
            ->select('users.username', 'users.name', 'users.signature')
            ->first();

        $perawat = null;
        $farmasi = null;


        if (!empty($rekon_data)) {
            $perawat = DB::connection('mysql2')->table('users')->where('username', $rekon_data->perawat_username)->select('name')->first();
            $farmasi = DB::connection('mysql2')->table('users')->where('username', $rekon_data->farmasi_username)->select('name')->first();
        }

        $context = array(
            'reg' => $request->reg_no,
            'medrec' => $request->medrec,
            'rekon_data' => optional($rekon_data),
            'perawat' => optional($perawat),
            'farmasi' => optional($farmasi),
            'dokter' => optional($dpjp),
        );


        return view("new_perawat.rekonsiliasi_obat.index")->with($context);
    }

    public function get_rekon_obat_data(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::connection('mysql')->table('rekonsiliasi_obat_item')
                ->where([
                    ['reg_no', $request->reg_no],
                    ['med_rec', $request->med_rec],
                    ['is_deleted', 0]
                ])->get();

            return DataTables()
                ->of($data)
                ->addColumn('action', function ($row) {
                    $actionBtn = "<button type='button' class='btn btn-danger btn-delete-item-obat' data-id='$row->id'><i class='fas fa-trash'></i></button>";
                    return $actionBtn;
                })
                ->escapeColumns([])
                ->toJson();
        }
    }

    public function store_rekonsiliasi_obat(Request $request)
    {
        extract($request->all());

        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), []);


            if ($validator->passes()) {

                $cekRekon = DB::connection('mysql')->table('rekonsiliasi_obat')
                    ->where([
                        ['reg_no', $rekon_data['reg_no']],
                        ['med_rec', $rekon_data['med_rec']],
                    ])->count();

                $rekon_data['time_ttd_dpjp'] = Carbon::parse($rekon_data['time_ttd_dpjp'])->toDateTimeString();
                $rekon_data['time_ttd_farmasi'] = Carbon::parse($rekon_data['time_ttd_farmasi'])->toDateTimeString();
                $rekon_data['time_ttd_perawat'] = Carbon::parse($rekon_data['time_ttd_perawat'])->toDateTimeString();

                if ($cekRekon > 0) {
                    $rekon_data['updated_at'] = Carbon::now();
                    $rekonData = DB::connection('mysql')->table('rekonsiliasi_obat')->where('reg_no', $rekon_data['reg_no'])->update($rekon_data);
                } else {
                    $rekon_data['created_at'] = Carbon::now();
                    $rekonData = DB::connection('mysql')->table('rekonsiliasi_obat')->insert($rekon_data);
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

    public function store_rekon_obat_item(Request $request)
    {
        extract($request->all());

        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), []);

            if ($validator->passes()) {
                $obat['waktu_beri_terakhir'] = Carbon::parse($obat['waktu_beri_terakhir'])->toDateTimeString();
                $obat['created_at'] = Carbon::now();
                DB::connection('mysql')->table('rekonsiliasi_obat_item')->insert($obat);



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

    public function delete_rekon_obat_item(Request $request)
    {
        DB::beginTransaction();
        try {
            $validator = Validator::make($request->all(), []);

            if ($validator->passes()) {
                DB::connection('mysql')->table('rekonsiliasi_obat_item')->where('id', $request->id)
                    ->update([
                        'is_deleted' => 1,
                        'deleted_by' => $request->username,
                        'updated_at' => Carbon::now(),
                    ]);

                DB::commit();
                $response = response()->json([
                    'status' => 'success',
                    'message' => 'Data berhasil dihapus',
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

    public function get_ttd_verif_obat(Request $request)
    {

        $user = DB::connection('mysql2')->table('users')->where('username', $request->username)->first();

        if ($user->signature != null) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil didapatkan',
                'signature' => $user->signature,
                'user_name' => $user->name,
                'username' => $user->username,
            ]);
        } else {
            abort(500, "Data tanda tangan kosong !");
        }
    }
}
