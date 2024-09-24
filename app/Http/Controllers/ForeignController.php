<?php

namespace App\Http\Controllers;

use App\Models\RegistrationInap;
use App\Models\User;
use Illuminate\Http\Request;

class ForeignController extends Controller
{
    public function sendRegistrationToRajal(Request $request){
        try {
            $getData = RegistrationInap::where('reg_no', $request->reg_no)
                ->first();

            $getUser = User::where('dokter_id', $request->dokter_code)->first();

            $data = [
                "reg_no" => $getData->reg_no,
                "reg_medrec" => $getData->reg_medrec,
                "reg_poli" => $request->poli_kode,
                "reg_dokter" => $request->dokter_kode,
                "reg_tipe_kunj" => "",
                "reg_cara_bayar" => "Corporate",
                "reg_no_dokumen" => 1,
                "reg_class" => '00'.$getData->charge_class_code ?? $getData->reg_class,
                "reg_no_kartu" => $getData->reg_no_kartu,
                "reg_corporate" => $getData->reg_cara_bayar,
                "reg_user" => $getUser->name
            ];

            $sendData = postService(urlSimrs().'api/rajal/pendaftaran/storeRegistrationFromOthers', $data);

            return json_decode($sendData);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
