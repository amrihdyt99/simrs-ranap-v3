<?php

namespace App\Repository;

use App\Models\RegistrationInap;
use App\Traits\Ranap\RanapRegistrationTrait;
use Illuminate\Support\Facades\DB;

class MasterRegistrationRepository
{
    use RanapRegistrationTrait;
    /**
     * Store registration data
     * @param object $data
     */
    public function storeRegistration($data)
    {
        try {
            DB::beginTransaction();
            $register = new RegistrationInap();
            $register->reg_no = $register->generateCode();
            $register->reg_lama = $data->reg_lama;
            $register->reg_lama_igd = $data->reg_igd;
            $register->reg_medrec = $data->reg_medrec;
            $register->departemen_asal = $this->getDepartemenAsalPasien($data->reg_no_asal);
            $register->reg_tgl = date('Y-m-d');
            $register->reg_jam = date('H:i:s');
            $register->reg_poli = $data->kode_poli;
            $register->reg_dokter = $data->reg_dokter;
            $register->reg_cttn = $data->ranap_diagnosa;
            $register->reg_class = $data->reg_class;
            $register->charge_class_code = $data->charge_class_code;
            $register->reg_cara_bayar = $data->reg_cara_bayar;
            $register->save();
            DB::commit();
            return $register;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
