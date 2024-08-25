<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use App\Http\Controllers\NewDokter\OrderObatController;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BillingController extends Controller
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
            ->get()->first();
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
        $data['reg_rj'] = 'QREG/RJ/202310190049';
        $data['pasien'] = $datamypatient;
        $data['diagnosis'] = $diagnosisPasien;
        $data['visit'] = $ceksoapdokter;
        $data['paket'] = $historypaket;

        // dd($datamypatient);

        return view('new_kasir.view', $data);
        // return view('kasir/billing/daftar_tagihan',$data);
    }

    public function detailOrders(Request $request)
    {
        $order_penunjang = [];

        $lainnya = DB::table('job_orders_dt as a')
            ->where('a.reg_no', $request->reg_ri)
            ->where('jenis_order', 'lainnya')
            ->leftjoin('job_orders as b', 'a.order_no', 'b.order_no')
            ->select([
                'a.*',
                'b.*',
                DB::raw("(select ParamedicName from rs_m_paramedic where ParamedicCode = kode_dokter) as ParamedicName")
            ])
            ->get();

        // return $lainnya;

        foreach ($lainnya as $key => $value) {
            $item['ItemReg'] = $value->reg_no;
            $item['ItemCode'] = $value->id;
            $item['ItemOrder'] = $value->order_no;
            $item['ItemOrderCode'] = $value->order_no;
            $item['ItemTanggal'] = $value->waktu_order;
            $item['ItemName1'] = $value->item_name;
            $item['ItemBundle'] = null;
            $item['ItemTindakan'] = $value->jenis_order;
            $item['ItemTarif'] = $value->harga_jual;
            $item['ItemTarifAwal'] = $value->harga_jual;
            $item['ItemJumlah'] = $value->qty;
            $item['ItemDokter'] = $value->ParamedicName;
            $item['ItemPoli'] = '';
            $item['ItemReview'] = '-';

            array_push($order_penunjang, $item);
        }

        $call_obat = new OrderObatController;

        $request->merge([
            'reg_no' => $request->reg_ri,
        ]);

        $obat_ = $call_obat->getFinalOrder($request);

        foreach ($obat_ as $key => $value) {
            foreach ($value->job_order_dt as $k => $v) {
                $item['ItemReg'] = $value->reg_no;
                $item['ItemCode'] = $v->item_code;
                $item['ItemOrderCode'] = $value->order_no;
                $item['ItemOrder'] = $v->id;
                $item['ItemTanggal'] = $value->waktu_order;
                $item['ItemName1'] = $v->item->item_name;
                $item['ItemBundle'] = 0;
                $item['ItemTindakan'] = 'Obat';
                $item['ItemTarif'] = $v->harga_jual;
                $item['ItemTarifAwal'] = $v->harga_jual;
                $item['ItemJumlah'] = $v->quantity;
                $item['ItemDokter'] = $value->kode_dokter;
                $item['ItemPoli'] = $value->kode_poli;
                $item['ItemReview'] = $value->is_review == false ? 0 : 1;

                array_push($order_penunjang, $item);
            }
        }

        $lab = json_decode(getService(urlLabRadiology() . '/api/status-order-v2?regno=' . $request->reg_rj));

        if (isset($lab->code) && $lab->code == 200) {
            foreach ($lab->data as $key => $value) {
                foreach ($value->item_order as $sub_key => $sub_value) {
                    $item['ItemReg'] = $value->no_reg;
                    $item['ItemCode'] = $sub_value->kode_tindakan;
                    $item['ItemOrderCode'] = $value->no_order;
                    $item['ItemOrder'] = '';
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

                    if ($sub_value->status_cancel == 'N') {
                        array_push($order_penunjang, $item);
                    }
                }
            }
        }

        return [
            'order' => $order_penunjang,
            // 'validation' => DB::table('rs_pasien_billing_validation')->where('pvalidation_reg', $request->reg_ri)->first()
        ];
    }

    function addTindakan(Request $request)
    {
        //        $user=Auth::user();
        $ordername = $request->itemTindakan;
        $kategori = $request->jenisTindakan;
        $price = $request->tarifItem;
        $regmedrec = $request->regmedrec;
        $kodetindakan = $request->kodetindakan;

        $countorder = DB::connection('mysql')
            ->table("job_orders")
            ->get()
            ->count();
        $newDateFormat = str_replace('-', '', now()->toDateString());
        $jenis = "";
        if ($kategori == "Laboratorium") {
            $jenis = "lab";
            $orderNumberFormat = 'LAB/RI/' . $newDateFormat . $countorder;
        } else if ($kategori == "Radiologi") {
            $jenis = "radiologi";
            $orderNumberFormat = 'RAD/RI/' . $newDateFormat . $countorder;
        } else if ($kategori == "fisio") {
            $jenis = "fisio";
            $orderNumberFormat = 'FIS/RI/' . $newDateFormat . $countorder;
        } else if ($kategori == "lainnya") {
            $jenis = "lainnya";
            $orderNumberFormat = 'ANY/RI/' . $newDateFormat . $countorder;
        }
        $jobOrder['reg_no'] = $request->reg_no;
        $jobOrder['kode_dokter'] = $request->kode_dokter;
        $jobOrder['waktu_order'] = now()->toDateTimeString();
        //$jobOrder['service_unit'] = $request->service_unit;
        $jobOrder['order_no'] = $orderNumberFormat;

        $jobOrderDetail['jenis_order'] = $jenis;
        $jobOrderDetail['reg_no'] = $request->reg_no;
        $jobOrderDetail['item_code'] = $request->kodetindakan;
        $jobOrderDetail['item_name'] = $request->itemTindakan;
        $jobOrderDetail['qty'] = "1";
        $jobOrderDetail['harga_jual'] = $request->tarifItem;
        $jobOrderDetail['order_no'] = $orderNumberFormat;

        $simpan = DB::connection('mysql')->table('job_orders')->insert($jobOrder);
        if ($simpan == true) {
            $simpan2 = DB::connection('mysql')->table('job_orders_dt')->insert($jobOrderDetail);
            return response()->json(['status' => $simpan2, 'message' => 'Data berhasil disimpan']);
        } else {
            return response()->json(['status' => $simpan, 'message' => 'Gagal Menyimpan Data']);
        }

        /*$sql="INSERT INTO m_orders (user_order,order_name,kategori,price,tanggal_order,reg_medrec,status_bayar,kode_tindakan,isDeleted)
                    VALUES(?,?,?,?,?,?,?,?,?)";

        $simpan=DB::connection('mysql2')->insert($sql,[$user->getAuthIdentifier(),$ordername,$kategori,$price,date('Y-m-d'),$regmedrec,'0',$kodetindakan,"0"]);*/
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
                ->select('pvalidation_status')
                ->first();

            return response()->json($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function storePayment(Request $request)
    {
        try {
            $data = [
                'pvalidation_code' => genKode(DB::table('rs_pasien_billing_validation'), 'created_at', null, null, 'QARP'),
                'pvalidation_reg' => $request->reg,
                'pvalidation_total' => $request->total,
                'pvalidation_detail' => $request->payment_detail,
                'pvalidation_user' => auth()->user()->id,
                'pvalidation_status' => 1,
                'pvalidation_selected' => $request->selected_orders,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $check_ = DB::table('rs_pasien_billing_validation')->where('pvalidation_reg', $request->reg)->count();

            if ($check_ > 0) {
                $delete = DB::table('rs_pasien_billing_validation')->where('pvalidation_reg', $request->reg)
                    ->delete();

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
}
