<?php

namespace App\Http\Services;

use App\Utils\ConnectionDB;
use Illuminate\Support\Facades\DB;

class TarifKamarService
{


    public function getDataTarifAkomodasi($charge_class)
    {
        $chargeClasses = [
            'AKM1' => [
                'codes' => ['001', '002', '003', '004', '005', '006', 'anak01', 'anak02', 'anak03'],
                'name' => 'Tarif akomodasi kamar'
            ],
            'AKM2' => [
                'codes' => ['hcu'],
                'name' => 'Tarif akomodasi kamar HCU'
            ],
            'AKM3' => [
                'codes' => ['icu01'],
                'name' => 'Tarif akomodasi kamar ICU / ICCU'
            ],
            'AKM5' => [
                'codes' => ['iso1', 'iso2', 'iso3', 'isoicu'],
                'name' => 'Tarif akomodasi kamar Isolasi'
            ],
            'AKM6' => [
                'codes' => ['NEO1', 'ikb'],
                'name' => 'Tarif akomodasi kamar Neonatus'
            ],
            'AKM9' => [
                'codes' => ['picu01'],
                'name' => 'Tarif akomodasi kamar PICU'
            ],
            'AKM10' => [
                'codes' => ['nicu01'],
                'name' => 'Tarif akomodasi kamar NICU'
            ]
        ];

        foreach ($chargeClasses as $code => $details) {
            if (in_array($charge_class, $details['codes'])) {
                return [
                    'kode' => $code,
                    'nama' => $details['name']
                ];
            }
        }
    }

    public function storeTarifKamar($data)
    {
        $order_no = genKode(DB::table('job_orders_dt')->where('jenis_order', 'lainnya'), null, null, null, 'ANY');
        $current_location = getCurrentLocation($data['reg_no']);
        $data_akomodasi = $this->getDataTarifAkomodasi($data['charge_class']);

        $tarif = getItemTindakan($data['reg_no'], $data['charge_class'], 'LAIN', $data_akomodasi['kode']);
        $tarif = count($tarif) > 0 ? (float) $tarif[0]->PersonalPrice : 0;
        $dataTarifKamarHD = [
            'reg_no' => $data['reg_no'],
            'order_no' => $order_no,
            'waktu_order' => date('Y-m-d H:i:s'),
            'service_unit' => $current_location['ServiceUnitID'],
            'created_at' => date('Y-m-d H:i:s')
        ];

        $dataTarifKamarDt = [
            'reg_no' => $data['reg_no'],
            'order_no' => $order_no,
            'item_code' => $data_akomodasi['kode'],
            'item_name' => $data_akomodasi['nama'],
            'jenis_order' => 'lainnya',
            'qty' => 1,
            'harga_jual' => $tarif,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by_id' => auth()->user()->id,
            'created_by_name' => auth()->user()->name,
        ];

        try {
            if (!$this->checkTarifKamarRegistrationExist($data['reg_no'], $data_akomodasi['kode'])) {
                DB::beginTransaction();
                DB::table('job_orders')->insert($dataTarifKamarHD);
                DB::table('job_orders_dt')->insert($dataTarifKamarDt);
                DB::commit();
            }
        } catch (\Throwable $th) {
            DB::rollBack();

            throw $th;
        }
    }

    private function checkTarifKamarRegistrationExist($reg_no, $kode)
    {
        return DB::table('job_orders_dt')->where('reg_no', $reg_no)->where('item_code', $kode)->exists();
    }
}
