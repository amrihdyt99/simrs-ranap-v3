<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewDokter\OrderObatController;
use App\Http\Controllers\ZxcNyaaUniversal\AaaBaseController;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BillingController extends AaaBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    {
        return view('kasir/billing/daftar_tagihan');
    }*/

    public function detailtagihan(Request $request, $reg_no)
    {
        $datamypatient = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('m_ruangan_baru', 'm_registrasi.service_unit', '=', 'm_ruangan_baru.id')
            ->leftJoin('m_kelas_ruangan_baru', 'm_registrasi.bed', '=', 'm_kelas_ruangan_baru.id')
            ->leftJoin('m_unit', 'm_unit.ServiceUnitCode', '=', 'm_registrasi.service_unit')
            ->where(['m_registrasi.reg_no' => $reg_no])
            ->select([
                'reg_medrec',
                'reg_tgl',
                'reg_status',
                'reg_cara_bayar',
                'reg_cara_bayar',
                'charge_class_code',
                'reg_diagnosis',
                'reg_lama',
                'reg_cara_bayar',

                'PatientName',
                'm_pasien.SSN',
                'm_pasien.PatientAddress',
                'm_pasien.MobilePhoneNo1',
                'm_pasien.DateOfBirth',
                'm_pasien.GCSex',

                'ParamedicCode',
                'ParamedicName',
                'ServiceUnitName',
            ])
            ->first();

        $datamypatient = mergeObject($datamypatient, getCurrentLocation($reg_no));

        $diagnosisPasien = DB::connection('mysql')->table('icd10_bpjs')->where('ID_ICD10', $datamypatient->reg_diagnosis)->first();
        $ceksoapdokter = DB::connection('mysql')
            ->table('rs_pasien_soapdok')
            ->where(['soapdok_reg' => $reg_no, 'soapdok_dokter' => $datamypatient->ParamedicCode])
            ->get();
        $historypaket = DB::connection('mysql')
            ->table('history_paket')
            ->where(['no_reg' => $reg_no])
            ->get();

        $data['reg_no'] = $reg_no;
        $data['reg_rj'] = $datamypatient->reg_lama;
        $data['pasien'] = $datamypatient;
        $data['diagnosis'] = $diagnosisPasien;
        $data['visit'] = $ceksoapdokter;
        $data['paket'] = $historypaket;
        $data['payer_name'] = DB::connection('mysql2')
            ->table('businesspartner')
            ->where('id', $datamypatient->reg_cara_bayar)
            ->first();

        return view('new_kasir.view', $data);
        // return view('kasir/billing/daftar_tagihan',$data);
    }

    public function detailOrders(Request $request)
    {
        $order_penunjang = [];
        $order_penunjang_prev = [];

        $lainnya = DB::table('job_orders_dt as a')
            ->where('a.reg_no', $request->reg_ri)
            ->where('jenis_order', 'lainnya')
            ->where('a.deleted', 0)
            ->leftjoin('job_orders as b', 'a.order_no', 'b.order_no')
            ->select([
                'a.*',
                'a.id as id_dt',
                'b.*',
                DB::raw("(select ParamedicName from " . getDatabase('master') . ".m_paramedis where ParamedicCode = kode_dokter) as ParamedicName"),
                DB::raw("(select name from " . getDatabase('master') . ".users where id = created_by_id) as UserName"),
            ])
            ->get();

        // return $lainnya;

        foreach ($lainnya as $key => $value) {
            $item['ItemUId'] = Str::random(5);
            $item['ItemReg'] = $value->reg_no;
            $item['ItemCode'] = $value->item_code;
            $item['ItemOrder'] = $value->id_dt;
            $item['ItemOrderCode'] = $value->order_no;
            $item['ItemTanggal'] = $value->waktu_order;
            $item['ItemName1'] = $value->item_name;
            $item['ItemBundle'] = null;
            $item['ItemTindakan'] = $value->jenis_order;
            $item['ItemTarif'] = $value->harga_jual;
            $item['ItemTarifAwal'] = $value->harga_jual;
            $item['ItemJumlah'] = $value->qty;
            $item['ItemDokter'] = $value->ParamedicName ?? $value->UserName;
            $item['ItemPoli'] = '';
            $item['ItemReview'] = '-';
            $item['NonBPJS'] = $value->non_bpjs;

            array_push($order_penunjang, $item);
        }

        $order_penunjang = array_merge($order_penunjang, $this->getOrderFromLab($request->reg_ri));
        $order_penunjang = array_merge($order_penunjang, $this->getOrderFromRadiology($request->reg_ri));
        $order_penunjang = array_merge($order_penunjang, $this->getOrderFromPharmacy($request->reg_ri));

        if (str_contains($request->reg_rj, '/ER/')) {
            $order_penunjang_prev = array_merge($order_penunjang_prev, $this->getOrderFromSphaira($request->reg_rj, $request->class));
            $order_penunjang_prev = array_merge($order_penunjang_prev, $this->physicianBillFromSphaira($request->reg_rj, $request->class));
        } else {
            $order_penunjang_prev = array_merge($order_penunjang_prev, $this->getOrderFromLab($request->reg_rj));
            $order_penunjang_prev = array_merge($order_penunjang_prev, $this->getOrderFromRadiology($request->reg_rj));
            $order_penunjang_prev = array_merge($order_penunjang_prev, $this->getOrderFromPharmacy($request->reg_rj));
        }

        $recap_penunjang = [
            ['source' => 'Rawat Inap', 'data' => $order_penunjang],
            ['source' => str_contains($request->reg_rj, '/RJ/') ? 'Rawat Jalan' : 'IGD', 'data' => $order_penunjang_prev],
        ];

        $validation = DB::table('rs_pasien_billing_validation as a')
            ->where('pvalidation_reg', $request->reg_ri)
            ->where('pvalidation_status', 1)
            ->select([
                'a.*',
                DB::raw("(select name from ".getDatabase('master').".users where id = a.pvalidation_user) as pvalidation_name")
            ])
            ->get();

        return [
            'order' => $recap_penunjang,
            'validation' => $validation,
            // 'validation' => DB::table('rs_pasien_billing_validation')->where('pvalidation_reg', $request->reg_ri)->first()
        ];
    }

    public function getOrderFromLab($reg_no)
    {
        $lab = json_decode(getService(urlLabRadiology() . '/api/status-order-v2?regno=' . $reg_no));

        $order_penunjang = [];

        if (isset($lab->code) && $lab->code == 200) {
            foreach ($lab->data as $key => $value) {
                foreach ($value->item_order as $sub_key => $sub_value) {
                    $item['ItemUId'] = Str::random(5);
                    $item['ItemReg'] = $value->no_reg;
                    $item['ItemCode'] = $sub_value->kode_tindakan;
                    $item['ItemOrderCode'] = $value->no_order;
                    $item['ItemOrder'] = $value->no_order;
                    $item['ItemTanggal'] = $value->waktu_tanggal_order;
                    $item['ItemName1'] = $sub_value->nama_tindakan;
                    $item['ItemBundle'] = 0;
                    $item['ItemTindakan'] = 'Laboratorium';
                    $item['ItemTarif'] = $sub_value->tarif_personal;
                    $item['ItemTarifAwal'] = $sub_value->tarif_personal;
                    $item['ItemJumlah'] = 1;
                    $item['ItemDokter'] = $value->dokter_order;
                    $item['ItemPoli'] = $value->poli_order;
                    $item['ItemReview'] = $value->status_approve == 'Y' ? 1 : 0;
                    // $item['ItemReview'] = 1;

                    if ($sub_value->status_cancel == 'N' && $sub_value->status_failed == 'N') {
                        array_push($order_penunjang, $item);
                    }
                }
            }
        }

        return $order_penunjang;
    }

    public function getOrderFromRadiology($reg_no)
    {
        $rad = json_decode(getService(urlLabRadiology() . '/api/status-order-radiologi-v2?regno=' . $reg_no));

        $order_penunjang = [];

        if (isset($rad->code) && $rad->code == 200) {
            foreach ($rad->data as $key => $value) {
                foreach ($value->item_order as $sub_key => $sub_value) {
                    $item['ItemUId'] = Str::random(5);
                    $item['ItemReg'] = $value->no_reg;
                    $item['ItemCode'] = $sub_value->kode_tindakan;
                    $item['ItemOrderCode'] = $value->no_order;
                    $item['ItemOrder'] = $value->no_order;
                    $item['ItemTanggal'] = $value->waktu_tanggal_order;
                    $item['ItemName1'] = $sub_value->nama_tindakan;
                    $item['ItemBundle'] = 0;
                    $item['ItemTindakan'] = 'Radiologi';
                    $item['ItemTarif'] = $sub_value->tarif_personal;
                    $item['ItemTarifAwal'] = $sub_value->tarif_personal;
                    $item['ItemJumlah'] = 1;
                    $item['ItemDokter'] = $value->dokter_order;
                    $item['ItemPoli'] = $value->poli_order;
                    $item['ItemReview'] = $value->status_approve == 'Y' ? 1 : 0;
                    // $item['ItemReview'] = 1;

                    if ($sub_value->status_cancel == 'N' && $sub_value->status_failed == 'N') {
                        array_push($order_penunjang, $item);
                    }
                }
            }
        }

        return $order_penunjang;
    }

    public function getOrderFromPharmacy($reg_no)
    {
        $call_obat = new OrderObatController;
        $request = new Request;
        $order_penunjang = [];

        $request->merge([
            'reg_no' => $reg_no,
        ]);

        $obat_ = $call_obat->getFinalOrder($request);

        foreach ($obat_ as $key => $value) {
            foreach ($value->job_order_dt as $k => $v) {
                $item['ItemUId'] = Str::random(5);
                $item['ItemReg'] = $value->reg_no;
                $item['ItemCode'] = $v->item_code;
                $item['ItemOrderCode'] = $value->order_no;
                $item['ItemOrder'] = $v->id;
                $item['ItemTanggal'] = $value->waktu_order;
                $item['ItemName1'] = $v->item->item_name;
                $item['ItemBundle'] = 0;
                $item['ItemTindakan'] = 'Obat';
                $item['ItemTarif'] = $v->quantity * $v->harga_jual;
                $item['ItemTarifAwal'] = $v->harga_jual;
                $item['ItemJumlah'] = $v->quantity;
                $item['ItemDokter'] = DB::connection('mysql2')->table('m_paramedis')->where('ParamedicCode', $value->kode_dokter)->first()->ParamedicName;
                $item['ItemPoli'] = $value->kode_poli;
                $item['ItemReview'] = $value->is_review == false ? 0 : 1;
                // $item['ItemReview'] = 0;

                array_push($order_penunjang, $item);
            }
        }

        return $order_penunjang;
    }

    public function getOrderFromSphaira($reg_no, $class)
    {
        $itemOrder = json_decode(getService(urlSimrs() . 'api/igd/itemOrder?reg_no=' . $reg_no . '&class=' . $class));

        $order_penunjang = [];

        if (count($itemOrder) > 0) {
            foreach ($itemOrder as $key => $value) {
                foreach ($value->detailOrder as $sub_key => $sub_value) {

                    $dokter_order = '';

                    if (isset($sub_value->Prescriber)) {
                        $dokter_order = $sub_value->Prescriber;
                    } else {
                        $get_dokter_order = DB::connection('mysql2')->table('m_paramedis')->where('ParamedicID', $value->ParamedicID)->first();

                        $dokter_order = $get_dokter_order ? $get_dokter_order->ParamedicName : '';
                    }

                    $item['ItemUId'] = Str::random(5);
                    $item['ItemReg'] = $value->RegistrationNo;
                    $item['ItemCode'] = $sub_value->ItemCode;
                    $item['ItemOrderCode'] = $value->JobOrderNo;
                    $item['ItemOrder'] = $value->JobOrderNo;
                    $item['ItemTanggal'] = $value->JobOrderDateTime;
                    $item['ItemName1'] = $sub_value->ItemName1;
                    $item['ItemBundle'] = 0;
                    $item['ItemTindakan'] = $value->JobOrderType;
                    $item['ItemTarif'] = (float) $sub_value->StandardPriceItem;
                    $item['ItemTarifAwal'] = (float) (isset($sub_value->DispenseQty) ? $sub_value->DispenseQty : 1) * $sub_value->StandardPriceItem;
                    $item['ItemJumlah'] = (float) isset($sub_value->DispenseQty) ? $sub_value->DispenseQty : 1;
                    $item['ItemDokter'] = $dokter_order;
                    $item['ItemPoli'] = $value->ServiceUnitID;
                    // $item['ItemReview'] = $value->status_approve == 'Y' ? 1 : 0;
                    $item['ItemReview'] = 1;

                    if ($value->IsCanceled == 0 && $value->IsReviewed == 1 && $value->IsSelected == 1) {
                        array_push($order_penunjang, $item);
                    }
                }
            }

            usort($order_penunjang, function ($a, $b) {
                return strcmp($a['ItemTindakan'], $b['ItemTindakan']);
            });
        }

        return $order_penunjang;
    }

    public function physicianBillFromSphaira($reg_no, $class){
        $itemOrder = json_decode(getService(urlSimrs() . 'api/igd/itemOrder/physicianBill?reg_no=' . $reg_no . '&class=' . $class));
        
        $order_penunjang = [];

        foreach ($itemOrder as $key => $value) {
            $item['ItemUId'] = Str::random(5);
            $item['ItemReg'] = $value->RegistrationNo;
            $item['ItemCode'] = $value->ItemCode;
            $item['ItemOrder'] = $value->ItemID;
            $item['ItemOrderCode'] = $value->ItemCode;
            $item['ItemTanggal'] = $value->TransactionDateTime;
            $item['ItemName1'] = $value->ItemName1;
            $item['ItemBundle'] = null;
            $item['ItemTindakan'] = 'lainnya';
            $item['ItemTarif'] = $value->TotalPersonal;
            $item['ItemTarifAwal'] = $value->TotalPersonal;
            $item['ItemJumlah'] = $value->DispenseQty;
            $item['ItemDokter'] = $value->ParamedicName;
            $item['ItemPoli'] = '';
            $item['ItemReview'] = '-';
            $item['NonBPJS'] = 0;

            array_push($order_penunjang, $item);
        }
        
        return $order_penunjang;
    }

    function addBillingReview(Request $request)
    {
        $reg_no = $request->reg_no;
        $dokterkode = $request->kode_dokter;
        $feeamount = $request->feeamount;
        $cekstatus = DB::connection('mysql2')
            ->table('m_registrasi')
            ->where('reg_no', '=', $reg_no)
            ->where('reg_discharge', '=', '2')
            ->get()->count();

        if ($cekstatus > 0) {
            return response()->json([
                'success' => false,
                'message' => "billing telah direview sebelumnya"
            ]);
        } else {
            //add review
            //get job_order_dt
            $jobOrderDt = DB::connection('mysql')
                ->table('job_orders_dt')
                ->where(['reg_no' => $reg_no])
                ->get();

            $ceksoapdokter = DB::connection('mysql')
                ->table('rs_pasien_soapdok')
                ->where(['soapdok_reg' => $reg_no, 'soapdok_dokter' => $dokterkode])
                ->get();

            $arrayBatchReview = array();
            foreach ($jobOrderDt as $item) {
                $paramsitem = array(
                    'reg_no' => $item->reg_no,
                    'order_no' => $item->order_no,
                    'item_code' => $item->item_code,
                    'jenis_order' => $item->jenis_order,
                    'item_name' => $item->item_name,
                    'qty' => $item->qty,
                    'harga_jual' => $item->harga_jual
                );
                array_push($arrayBatchReview, $paramsitem);
            }

            foreach ($ceksoapdokter as $visit) {
                $paramsvisit = array(
                    'reg_no' => $reg_no,
                    'order_no' => $reg_no,
                    'item_code' => $dokterkode,
                    'jenis_order' => "visit",
                    'item_name' => "Visit Dokter",
                    'qty' => "1",
                    'harga_jual' => $feeamount
                );

                array_push($arrayBatchReview, $paramsvisit);
            }

            $simpanreview = DB::connection('mysql')
                ->table('rs_pasien_tagihan_review')
                ->insert($arrayBatchReview);

            if ($simpanreview == true) {
                //update status register
                $paramsupdate = array(
                    'reg_selesai' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                    'reg_discharge' => '2'
                );

                $update = DB::connection('mysql2')
                    ->table('m_registrasi')
                    ->where(['reg_no' => $reg_no])
                    ->update($paramsupdate);

                return response()->json([
                    'status' => $update,
                    'message' => "berhasil"
                ]);
            } else {
                return response()->json([
                    'status' => $simpanreview,
                    'message' => "gagal mereview"
                ]);
            }
        }
    }

    function invoice(Request $request)
    {
        $regno = $request->regno;
        $tanggungan_asuransi = $request->tanggungan_asuransi;
        $selisih_bayar = $request->selisih_bayar;
        $cara_bayar = $request->cara_bayar;
        $nomor_kartu = $request->nomor_kartu;
        $status_bayar = $request->status_bayar;
        $cektransaksi = DB::connection('mysql')
            ->table('rs_pasien_transaksi')
            ->where('reg_no', '=', $regno)
            ->get()->count() + 1;
        $newDateFormat = str_replace('-', '', now()->toDateString());
        $no_faktur = 'TRS/RI/' . $newDateFormat . $cektransaksi;

        $params = array(
            'kasir_id' => $request->kasir_id,
            'nama_kasir' => $request->nama_kasir,
            'reg_no' => $regno,
            'no_faktur' => $no_faktur,
            'tanggungan_asuransi' => $tanggungan_asuransi,
            'selisih_bayar' => $selisih_bayar,
            'cara_bayar' => $cara_bayar,
            'nomor_kartu' => $nomor_kartu,
            'status_bayar' => $status_bayar,
            'tgl_bayar' => date('Y-m-d H:i:s'),
            'jam_bayar' => date('H:i:s'),
        );
        $simpan = DB::connection('mysql')
            ->table('rs_pasien_transaksi')
            ->insert($params);
        if ($simpan == true) {
            //get data rs_pasien_tagihan_review
            $dataTagihanReview = DB::connection('mysql')
                ->table('rs_pasien_tagihan_review')
                ->where('reg_no', '=', $regno)
                ->get();
            $arrayBatchDetailtagihan = array();
            foreach ($dataTagihanReview as $item) {
                $paramsitem = array(
                    'no_faktur' => $no_faktur,
                    'order_no' => $item->order_no,
                    'item_code' => $item->item_code,
                    'jenis_order' => $item->jenis_order,
                    'item_name' => $item->item_name,
                    'qty' => $item->qty,
                    'harga_jual' => $item->harga_jual,
                    'created_at' => date('Y-m-d H:i:s')
                );
                array_push($arrayBatchDetailtagihan, $paramsitem);
            }

            $simpanDetailTagihan = DB::connection('mysql')
                ->table('rs_pasien_det_transaksi')
                ->insert($arrayBatchDetailtagihan);
            //update data ruangan
            $paramruangan = array(
                'status_ketersediaan' => '1'
            );
            //kurang where id_ketersediaan
            $updateruangan = DB::connection('mysql2')
                ->table('ketersediaan_ruangan')
                ->update($paramruangan);
            if ($simpanDetailTagihan == true) {
                $update = DB::connection('mysql2')
                    ->table('m_registrasi')
                    ->where(['reg_no' => $regno])
                    ->update(['reg_discharge' => '3']);
                return response()->json([
                    'status' => $update,
                    'message' => "berhasil"
                ]);
            } else {
                return response()->json([
                    'status' => $simpanDetailTagihan,
                    'message' => "gagal"
                ]);
            }
        } else {
            return response()->json([
                'status' => $simpan,
                'message' => "gagal mencetak invoice periksa koneksi anda"
            ]);
        }
    }

    function cetakinvoice($regno)
    {
        $datamypatient = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('m_ruangan_baru', 'm_registrasi.service_unit', '=', 'm_ruangan_baru.id')
            ->leftJoin('m_kelas_ruangan_baru', 'm_registrasi.bed', '=', 'm_kelas_ruangan_baru.id')
            ->where(['m_registrasi.reg_no' => $regno])
            ->get()->first();

        $datatransaksi = DB::connection('mysql')
            ->table('rs_pasien_transaksi')
            ->where(['reg_no' => $regno])
            ->get()->first();

        $datadetail = DB::connection('mysql')
            ->table('rs_pasien_det_transaksi')
            ->where(['no_faktur' => $datatransaksi->no_faktur])
            ->get();

        $historypaket = DB::connection('mysql')
            ->table('history_paket')
            ->where(['no_reg' => $regno])
            ->get();

        return view('kasir.billing.invoice', [
            'pasien' => $datamypatient,
            'transaksi' => $datatransaksi,
            'detail' => $datadetail,
            'paket' => $historypaket
        ]);
    }

    public function checkStatus(Request $request)
    {
        try {
            $data = DB::table('rs_pasien_billing_validation')
                ->where('pvalidation_reg', $request->reg_no)
                ->where('pvalidation_status', 1)
                ->select([
                    'pvalidation_status',
                    'id'
                ])
                ->first();

            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function storePayment(Request $request)
    {
        try {
            // return $request;
            $data = [
                'pvalidation_code' => genKode(DB::table('rs_pasien_billing_validation'), 'created_at', null, null, 'QARP'),
                'pvalidation_reg' => $request->reg,
                'pvalidation_total' => $request->total,
                'pvalidation_detail' => $request->payment_detail,
                'pvalidation_user' => auth()->user()->id,
                'pvalidation_status' => 1,
                'pvalidation_selected' => $request->selected_orders,
                'created_at' => date('Y-m-d H:i:s'),
                'non_bpjs' => 0
            ];

            $check_ = DB::table('rs_pasien_billing_validation')
                ->where('pvalidation_reg', $request->reg)
                ->where('pvalidation_status', 1)
                ->count();

            if ($check_ > 0) {
                // $delete = DB::table('rs_pasien_billing_validation')->where('pvalidation_reg', $request->reg)
                //     ->delete();

                $store = DB::table('rs_pasien_billing_validation')->insert($data);
            } else {
                $store = DB::table('rs_pasien_billing_validation')->insert($data);
            }

            //SEND PAYMENT STATUS TO RADIOLOGY
            // if ($request->selected_radiology) {
            //     foreach ($request->selected_radiology as $key => $value) {
            //         $data_rad = [
            //             'payer_by' => auth()->user()->name,
            //             'payer_datetime' => date('Y-m-d H:i:s'),
            //             'ono' => $value['ItemOrderCode']
            //         ];

            //         $send_radiology = postService(urlLabRadiology().'/api/send-payer-radiologi', $data_rad);

            //         $sent_response = [
            //             'radiologi' => json_decode($send_radiology)
            //         ];

            //         DB::table('rs_pasien_billing_validation')->where('pvalidation_reg', $request->reg)
            //                             ->where('pvalidation_code', $data['pvalidation_code'])
            //                             ->update([
            //                                 'pvalidation_response' => json_encode($sent_response)
            //                             ]);
            //     }
            // }

            return response()->json(200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function cetakKwitansi(Request $request)
    {
        $billing = DB::connection('mysql')->table('rs_pasien_billing_validation')->where('pvalidation_reg', $request->pvalidation_reg)->first();
        $datamypatient = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->where(['m_registrasi.reg_no' => $request->pvalidation_reg])
            ->first();

        $terbilang = $this->terbilang($billing->pvalidation_total);

        $user = DB::connection('mysql2')->table('users')->where('id', auth()->user()->id)->select('name', 'signature')->first();


        return view('kasir.billing.kwitansi', [
            'billing'           => $billing,
            'patient'           => $datamypatient,
            'terbilang'         => $terbilang,
            'pic'               => strtoupper($request->pic_pengesahan),
            'pic_name'          => $request->pvalidation_legitimate,
        ]);
    }

    public function cetakInvoiceNew(Request $request)
    {
        $billing_detail = DB::connection('mysql')->table('rs_pasien_billing_validation')->where('pvalidation_reg', $request->reg_no)->first();
        $datamypatient = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('businesspartner', 'm_registrasi.reg_cara_bayar', '=', 'businesspartner.id')
            ->where(['m_registrasi.reg_no' => $request->reg_no])
            ->get()->first();

        $all_item = json_decode($billing_detail->pvalidation_selected, true);
        $payer_detail = json_decode($billing_detail->pvalidation_detail, true);

        $billing_ri_item = array_filter($all_item, function ($item) {
            return $item['ItemSource'] == 'Rawat Inap';
        });
        $billing_rj_item = array_filter($all_item, function ($item) {
            return $item['ItemSource'] == 'Rawat Jalan';
        });
        $billing_igd_item = array_filter($all_item, function ($item) {
            return $item['ItemSource'] == 'IGD';
        });

        $ri_item_by_type = [];
        $ri_sub_tot = 0;
        $rj_item_by_type = [];
        $rj_sub_tot = 0;
        $igd_item_by_type = [];
        $igd_sub_tot = 0;
        $payer_by_method = [];

        foreach ($billing_ri_item as $item) {
            if ($item['ItemTindakan'] == 'Radiologi') {
                $type = $item['ItemTindakan'];
                $ri_item_by_type[$type][] = $item;
            } else if ($item['ItemTindakan'] == 'Laboratorium') {
                $type = $item['ItemTindakan'];
                $ri_item_by_type[$type][] = $item;
            } else if ($item['ItemTindakan'] == 'lainnya') {
                $type = $item['ItemTindakan'];
                $ri_item_by_type[$type][] = $item;
            } else if ($item['ItemTindakan'] == 'Medication') {
                $type = $item['ItemTindakan'];
                $ri_item_by_type[$type][] = $item;
            }
            $ri_sub_tot += ($item['ItemTarif'] * $item['ItemJumlah']);
        }
        $ri_item_by_type['subtotal'] = $ri_sub_tot;

        foreach ($billing_rj_item as $item) {
            if ($item['ItemTindakan'] == 'Radiologi') {
                $type = $item['ItemTindakan'];
                $rj_item_by_type[$type][] = $item;
            } else if ($item['ItemTindakan'] == 'Laboratorium') {
                $type = $item['ItemTindakan'];
                $rj_item_by_type[$type][] = $item;
            } else if ($item['ItemTindakan'] == 'lainnya') {
                $type = $item['ItemTindakan'];
                $rj_item_by_type[$type][] = $item;
            } else if ($item['ItemTindakan'] == 'Medication') {
                $type = $item['ItemTindakan'];
                $rj_item_by_type[$type][] = $item;
            }
            $rj_sub_tot += ($item['ItemTarif'] * $item['ItemJumlah']);
        }
        $rj_item_by_type['subtotal'] = $rj_sub_tot;

        foreach ($billing_igd_item as $item) {
            if ($item['ItemTindakan'] == 'Radiologi') {
                $type = $item['ItemTindakan'];
                $igd_item_by_type[$type][] = $item;
            } else if ($item['ItemTindakan'] == 'Laboratory') {
                $type = $item['ItemTindakan'];
                $igd_item_by_type[$type][] = $item;
            } else if ($item['ItemTindakan'] == 'lainnya') {
                $type = $item['ItemTindakan'];
                $igd_item_by_type[$type][] = $item;
            } else if ($item['ItemTindakan'] == 'Medication') {
                $type = $item['ItemTindakan'];
                $igd_item_by_type[$type][] = $item;
            } else if ($item['ItemTindakan'] == 'Imaging') {
                $type = $item['ItemTindakan'];
                $igd_item_by_type[$type][] = $item;
            }
            $igd_sub_tot += ($item['ItemTarif'] * $item['ItemJumlah']);
        }
        $igd_item_by_type['subtotal'] = $igd_sub_tot;

        foreach ($payer_detail as $item) {
            $type = $item['method'];
            $payer_by_method[$type] = $item;
        }

        $ruangan = DB::connection('mysql2')
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

        $user = DB::connection('mysql2')->table('users')->where('id', auth()->user()->id)->select('name', 'signature')->first();

        return view('kasir.billing.invoice_new', [
            'patient'           => $datamypatient,
            'ri_item'           => $ri_item_by_type,
            'rj_item'           => $rj_item_by_type,
            'igd_item'          => $igd_item_by_type,
            'ruangan'           => $ruangan,
            'billing'           => $billing_detail,
            'payer'             => $payer_by_method,
            'user'              => $user,
        ]);
    }

    public function cetakInvoiceSummary(Request $request)
    {
        $billing_detail = DB::connection('mysql')->table('rs_pasien_billing_validation')->where('pvalidation_reg', $request->reg_no)->first();
        $datamypatient = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('businesspartner', 'm_registrasi.reg_cara_bayar', '=', 'businesspartner.id')
            ->where(['m_registrasi.reg_no' => $request->reg_no])
            ->get()->first();

        $all_item = json_decode($billing_detail->pvalidation_selected, true);
        $payer_detail = json_decode($billing_detail->pvalidation_detail, true);

        $billing_ri_item = array_filter($all_item, function ($item) {
            return $item['ItemSource'] == 'Rawat Inap';
        });
        $billing_rj_item = array_filter($all_item, function ($item) {
            return $item['ItemSource'] == 'Rawat Jalan';
        });
        $billing_igd_item = array_filter($all_item, function ($item) {
            return $item['ItemSource'] == 'IGD';
        });

        $ri_sub_tot = 0;
        $rj_sub_tot = 0;
        $igd_sub_tot = 0;

        foreach ($billing_ri_item as $item) {
            $ri_sub_tot += ($item['ItemTarif'] * $item['ItemJumlah']);
        }

        foreach ($billing_rj_item as $item) {
            $rj_sub_tot += ($item['ItemTarif'] * $item['ItemJumlah']);
        }

        foreach ($billing_igd_item as $item) {
            $igd_sub_tot += ($item['ItemTarif'] * $item['ItemJumlah']);
        }

        foreach ($payer_detail as $item) {
            $type = $item['method'];
            $payer_by_method[$type] = $item;
        }

        $user = DB::connection('mysql2')->table('users')->where('id', auth()->user()->id)->select('name', 'signature')->first();

        $ruangan = DB::connection('mysql2')
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

        return view('kasir.billing.summary', [
            'ri_total'      => $ri_sub_tot,
            'rj_total'      => $rj_sub_tot,
            'igd_total'     => $igd_sub_tot,
            'user'          => $user,
            'patient'       => $datamypatient,
            'ruangan'       => $ruangan,
            'billing'       => $billing_detail,
        ]);
    }

    public function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = $this->penyebut($nilai - 10) . " Belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai / 10) . " Puluh" . $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " Seratus" . $this->penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai / 100) . " ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " Seribu" . $this->penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai / 1000) . " Ribu" . $this->penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai / 1000000) . " Juta" . $this->penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai / 1000000000) . " Milyar" . $this->penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai / 1000000000000) . " Trilyun" . $this->penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    public function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim($this->penyebut($nilai));
        } else {
            $hasil = trim($this->penyebut($nilai));
        }
        return $hasil;
    }

    public function storeCancelation(Request $request)
    {
        try {
            $data = [
                'pvalidation_cancel_at' => date('Y-m-d H:i:s'),
                'pvalidation_cancel_by' => auth()->user()->id,
                'pvalidation_cancel_by_name' => auth()->user()->name,
                'pvalidation_cancel_image' => $request->cancel_image,
                'pvalidation_cancel_desc' => $request->open_desc,
                'pvalidation_status' => 0
            ];

            $store = DB::table('rs_pasien_billing_validation')
                ->where('id', $request->open_id)
                ->where('pvalidation_status', 1)
                ->update($data);

            if ($store) {
                return [
                    'success' => true,
                    'msg' => 'Pembayaran berhasil dibatalkan'
                ];
            }

            return [
                'success' => true,
                'msg' => 'Pembayaran gagal dibatalkan'
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteItem(Request $request)
    {
        try {
            $delete = DB::table('job_orders_dt')
                ->where('id', $request->item_kode)
                ->update([
                    'deleted' => 1,
                    'deleted_by' => auth()->user()->id,
                    'deleted_at' => date('Y-m-d H:i:s'),
                    'deleted_requester' => $request->item_peminta,
                    'deleted_reason' => $request->item_alasan,
                ]);

            if ($delete) {
                return [
                    'success' => true,
                    'msg' => 'Item berhasil dibatalkan'
                ];
            }

            return [
                'success' => true,
                'msg' => 'Item gagal dibatalkan'
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
