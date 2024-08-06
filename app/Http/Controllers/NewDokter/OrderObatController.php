<?php

namespace App\Http\Controllers\NewDokter;

use App\Http\Controllers\Controller;
use App\Models\JobOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderObatController extends Controller
{
    function orderobat(Request $request)
    {
        /*
        $countOrderNo = JobOrders::all()->count();
        */
        $nomor_now_data = JobOrders::all()->count();
        $padding_length = 7;
        $length = strlen((string)$nomor_now_data);
        for ($i = $length; $i < $padding_length; $i++) {
            $nomor_now_data = '0' . $nomor_now_data;
        }
        $countOrderNo = $nomor_now_data;

        $newDateFormat = str_replace('-', '', now()->toDateString());
        $orderNumberFormat = 'FARM/RI/' . $newDateFormat . $countOrderNo;

        $jobOrder['reg_no'] = $request->reg_no;
        $jobOrder['kode_dokter'] = $request->kode_dokter;
        $jobOrder['waktu_order'] = now()->toDateTimeString();
        $jobOrder['service_unit'] = $request->service_unit;
        $jobOrder['order_no'] = $orderNumberFormat;
        $detailBatch = array();
        for ($i = 0; $i < count($request->item_code); $i++) {
            $jobOrderDetail['jenis_order'] = 'obat';
            $jobOrderDetail['reg_no'] = $request->reg_no;
            $jobOrderDetail['item_code'] = $request->item_code[$i];
            $jobOrderDetail['qty'] = $request->qty[$i];
            $jobOrderDetail['dosis'] = $request->dosis[$i];
            $jobOrderDetail['item_name'] = $request->item_name[$i];
            $jobOrderDetail['hari'] = $request->hari[$i];
            $jobOrderDetail['durasi_hari'] = $request->durasi[$i];
            $jobOrderDetail['ket_dosis'] = $request->ket_dosis[$i];
            $jobOrderDetail['harga_jual'] = $request->harga_jual[$i];
            $jobOrderDetail['order_no'] = $orderNumberFormat;
            $jobOrderDetail['flag'] = 0;
            $jobOrderDetail['temp_flag'] = 'false';
            $jobOrderDetail['temp_flag_racikan'] = 0;

            //tambahan penyesuain dengan data farmasi
            $jobOrderDetail['quantity'] = $request->qty[$i];
            $jobOrderDetail['spesial_instruksi'] = "";
            $jobOrderDetail['bentukan_sediaan'] = "";
            $jobOrderDetail['medication_route'] = "";
            array_push($detailBatch, $jobOrderDetail);
        }
        $mregistrasi = DB::connection('mysql2')
            ->table('m_registrasi')
            ->where(['reg_no' => $request->reg_no])->first();
        $medicalNo = $mregistrasi->reg_medrec;
        $mpasien = DB::connection('mysql2')
            ->table('m_pasien')
            ->where(['MedicalNo' => $medicalNo])->first();

        $paramedic = DB::connection('mysql2')
            ->table('m_paramedis')
            ->where(['ParamedicCode' => $mregistrasi->reg_dokter])->first();
        //ambil data detail dari ruangan baru
        $bed = DB::connection('mysql2')
            ->table('m_bed')
            ->where(['bed_id' => $mregistrasi->bed])->first();

        $room = DB::connection('mysql2')
            ->table('m_ruangan')
            ->where(['RoomID' => $bed->room_id])->first();

        //service room yang masih nyangkut
        $serviceRoom = DB::connection('mysql')
            ->table('rs_m_service_room')
            ->where(['RoomCode' => $room->RoomCode])->first();

        //        $serviceRoom=array();
        //        $serviceRoom['RoomCode']="602";
        //        $serviceRoom['RoomName']="RUANG 602";
        //        $serviceRoom['IP']="192.168.80.1";
        //        $serviceRoom['IsActive']="1";
        //        $serviceRoom['IsUsed']="";
        //        $serviceRoom['IsDeleted']="0";
        //        $serviceRoom['LastUpdatedBy']="";
        //        $serviceRoom['LastUpdatedDateTime']="";
        //        $serviceRoom['created_at']="";
        //        $serviceRoom['updated_at']="";

        //tambahan sementara yang tidak ada
        $jobOrder['kode_poli'] = "";
        $jobOrder['data_bb'] = "";
        $jobOrder['data_tb'] = "";
        $jobOrder['data_alergi'] = "";


        $jobOrder['job_order_dt'] = $detailBatch;
        $jobOrder['m_registrasi'] = $mregistrasi;
        $jobOrder['m_pasien'] = $mpasien;
        $jobOrder['paramedic'] = $paramedic;
        $jobOrder['serviceroom'] = $serviceRoom;

        //        array_push($jsonFarmasi,$detailBatch);

        return response()->json([
            'success' => true,
            'message' => 'order berhasil',
            'data' => $jobOrder
        ]);
        //        $simpan=DB::connection('mysql')
        //            ->table('job_orders')
        //            ->insert($jobOrder);

        //        if($simpan==TRUE){
        //            DB::connection('mysql')
        //                ->table('job_orders_dt')
        //                ->insert($detailBatch);
        //
        //            //get data untuk order ke api farmasi
        ////            $joborder_dt=DB::connection('mysql')
        ////                ->table('job_orders_dt')
        ////                ->where('order_no',$orderNumberFormat)
        ////                ->get();
        ////
        ////            foreach ($joborder_dt as $j){
        ////                $j['quantity']=$j->qty;
        ////                $j['spesial_instruksi']="";
        ////            }
        //
        //            return response()->json([
        //                'success'=>true
        //            ]);
        //        }else{
        //            return response()->json([
        //                'success'=>false
        //            ]);
        //        }

    }
    //ini untuk simpan order obat ke database sendiri
    function simpanorder(Request $request)
    {
        $orderNumberFormat = $request->ordernumber;

        $jobOrder['reg_no'] = $request->reg_no;
        $jobOrder['kode_dokter'] = $request->kode_dokter;
        $jobOrder['waktu_order'] = now()->toDateTimeString();
        $jobOrder['service_unit'] = $request->service_unit;
        $jobOrder['order_no'] = $orderNumberFormat;
        $detailBatch = array();
        $itemsToLab = array();
        for ($i = 0; $i < count($request->item_code); $i++) {
            $jobOrderDetail['jenis_order'] = 'obat';
            $jobOrderDetail['reg_no'] = $request->reg_no;
            $jobOrderDetail['item_code'] = $request->item_code[$i];
            $jobOrderDetail['qty'] = $request->qty[$i];
            $jobOrderDetail['dosis'] = $request->dosis[$i];
            $jobOrderDetail['item_name'] = $request->item_name[$i];
            $jobOrderDetail['hari'] = $request->hari[$i];
            $jobOrderDetail['durasi_hari'] = $request->durasi[$i];
            $jobOrderDetail['ket_dosis'] = $request->ket_dosis[$i];
            $jobOrderDetail['harga_jual'] = $request->harga_jual[$i];
            $jobOrderDetail['order_no'] = $orderNumberFormat;
            $jobOrderDetail['flag'] = 0;
            $jobOrderDetail['temp_flag'] = 'false';
            $jobOrderDetail['temp_flag_racikan'] = 0;



            //tambahan penyesuain dengan data farmasi
            //$jobOrderDetail['quantity']=$request->qty[$i];
            // $jobOrderDetail['spesial_instruksi']=$request->ket_dosis[$i];
            array_push($detailBatch, $jobOrderDetail);
        }

        $simpan = DB::connection('mysql')
            ->table('job_orders')
            ->insert($jobOrder);

        if ($simpan == TRUE) {
            DB::connection('mysql')
                ->table('job_orders_dt')
                ->insert($detailBatch);

            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }

    function getOrderObat(Request $request)
    {
        $reg_no = $request->reg_no;
        $joborderdetail = DB::connection('mysql')
            ->table('job_orders_dt')
            ->where([
                ['reg_no', '=', $reg_no],
                ['jenis_order', 'LIKE', 'obat%']
            ])
            ->get();

        if (count($joborderdetail) > 0) {
            return response()->json([
                'success' => true,
                'message' => 'ada data obat',
                'data' => $joborderdetail
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'tidak ada order obat'
            ]);
        }
    }

    function ordertindakan(Request $request)
    {
        $cekrad = 0;
        for ($i = 0; $i < count($request->cpoe_jenis); $i++) {
            if ($request->cpoe_jenis[$i] == 'radiologi') {
                $cekrad += 1;
            }
        }
        if ($cekrad > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Tindakan Radiologi Maksimal 1x Dalam 1 CPPT'
            ]);
        }
        $data_pasien = DB::connection('mysql2')->table('m_bed')->where('registration_no', $request->cpoe_reg)->first();
        $jenisorder = $request->jenisorder;
        $countorder = DB::connection('mysql')
            ->table("job_orders")
            ->get()
            ->count();
        $newDateFormat = str_replace('-', '', now()->toDateString());

        if ($jenisorder == "lab") {
            $orderNumberFormat = 'LAB/RI/' . $newDateFormat . $countorder;
        } else if ($jenisorder == "radiologi") {
            $orderNumberFormat = 'RAD/RI/' . $newDateFormat . $countorder;
        } else if ($jenisorder == "fisio") {
            $orderNumberFormat = 'FIS/RI/' . $newDateFormat . $countorder;
        } else if ($jenisorder == "lainnya") {
            $orderNumberFormat = 'ANY/RI/' . $newDateFormat . $countorder;
        }
        $jobOrder['reg_no'] = $request->cpoe_reg;
        $jobOrder['kode_dokter'] = $request->kode_dokter;
        $jobOrder['waktu_order'] = now()->toDateTimeString();
        //$jobOrder['service_unit'] = $request->service_unit;
        $jobOrder['order_no'] = $orderNumberFormat;
        $jobOrder['service_unit'] = $data_pasien->service_unit_id;
        $jobOrder['id_cppt'] = $request->cpoe_cppt;
        $detailBatch = array();
        $itemsToLab = array();
        for ($i = 0; $i < count($request->cpoe_tindakan); $i++) {
            $jobOrderDetail['jenis_order'] = $jenisorder;
            $jobOrderDetail['reg_no'] = $request->cpoe_reg;
            $jobOrderDetail['item_code'] = $request->cpoe_tindakan[$i];
            $jobOrderDetail['qty'] = "1";
            //$jobOrderDetail['dosis'] = $request->dosis[$i];
            $jobOrderDetail['item_name'] = $request->cpoe_nama[$i];
            //$jobOrderDetail['hari'] = $request->hari[$i];
            //$jobOrderDetail['durasi_hari'] = $request->durasi_hari[$i];
            //$jobOrderDetail['ket_dosis'] = $request->ket_dosis[$i];
            $jobOrderDetail['harga_jual'] = $request->cpoe_tarif[$i];
            $jobOrderDetail['order_no'] = $orderNumberFormat;
            $jobOrderDetail['flag'] = 0;

            $items['item_id'] = $request->cpoe_tindakan[$i];
            $items['qty'] = "1";
            $items['item_unit'] = "X";
            $items['personal_price'] = $request->cpoe_tarif[$i];
            $items['corporate_price'] = "0";

            array_push($itemsToLab, $items);
            array_push($detailBatch, $jobOrderDetail);
        }
        $simpan = DB::connection('mysql')
            ->table('job_orders')
            ->insert($jobOrder);

        if ($simpan == TRUE) {
            $simpandetail = DB::connection('mysql')
                ->table('job_orders_dt')
                ->insert($detailBatch);
            if ($simpandetail == TRUE) {

                // $mregistrasi = DB::connection('mysql2')
                //     ->table('m_registrasi')
                //     ->where(['reg_no' => $request->cpoe_reg])->first();

                // //ambil data detail dari ruangan baru
                // $ketersediaan_ruangan = DB::connection('mysql2')
                //     ->table('ketersediaan_ruangan')
                //     ->where(['id' => $mregistrasi->reg_ruangan])->first();

                // //service room yang masih nyangkut
                // $serviceRoom = DB::connection('mysql')
                //     ->table('rs_m_service_room')
                //     ->where(['RoomCode' => $ketersediaan_ruangan->room_code])->first();

                if ($jenisorder == "lab") {


                    $responselab = array();
                    $responselab['job_order_no'] = $orderNumberFormat;
                    $responselab['registration_no'] = $request->cpoe_reg;
                    $responselab['job_order_datetime'] = now()->toDateTimeString();
                    $responselab['paramedic_id'] = $request->kode_dokter;
                    $responselab['items'] = $itemsToLab;

                    return response()->json([
                        'success' => true,
                        'message' => 'data berhasil disimpan',
                        'data' => $responselab
                    ]);
                } else if ($jenisorder == "radiologi") {
                    $pesanradiologi = DB::connection('mysql')
                        ->table('pesan_radiologi')
                        ->insert($detailBatch);
                    if ($pesanradiologi == TRUE) {
                        $responeradiologi = array();
                        $responeradiologi['job_order_no'] = $orderNumberFormat;
                        $responeradiologi['registration_no'] = $request->cpoe_reg;
                        $responeradiologi['transaction_no'] = "JOR-RAD";
                        $responeradiologi['job_order_datetime'] = now()->toDateTimeString();
                        $responeradiologi['paramedic_id'] = $request->kode_dokter;
                        $responeradiologi['items'] = $itemsToLab;
                        // BELUM
                        $responeradiologi['service_unit_id'] = "TEST";

                        return response()->json([
                            'success' => true,
                            'message' => 'data berhasil disimpan'
                        ]);
                    } else {
                        return response()->json([
                            'success' => false,
                            'message' => 'data gagal disimpan'
                        ]);
                    }
                } else {
                    return response()->json([
                        'success' => true,
                        'message' => 'order berhasil'
                    ]);
                }
            } else {
                DB::connection('mysql')
                    ->table('job_orders')
                    ->where('order_no', '=', $orderNumberFormat)
                    ->delete();
                return response()->json([
                    'success' => false,
                    'message' => 'order gagal'
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'order gagal'
            ]);
        }
    }

    function del_order($id)
    {
        try {
            $data = DB::connection('mysql')->table('job_orders_dt')->where('id', $id)->first();
            DB::connection('mysql')->table('job_orders')->where('order_no', $data->order_no)->delete();
            DB::connection('mysql')->table('job_orders_dt')->where('id', $id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'ada data tindakan'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'kesalahan silakan refresh dan coba lagi'
            ]);
        }
    }

    function getOrderTindakanJenis(Request $request)
    {
        $regno = $request->id_cppt;
        $jenisorder = $request->jenisorder;
        $joborderdetail = DB::connection('mysql')
            ->table('job_orders_dt')
            ->leftJoin('job_orders', 'job_orders_dt.order_no', '=', 'job_orders.order_no')
            ->leftJoin('rs_m_paramedic', 'job_orders.kode_dokter', '=', 'rs_m_paramedic.ParamedicCode')
            ->where([
                ['job_orders.id_cppt', '=', $regno],
                ['job_orders_dt.jenis_order', '=', $jenisorder]
            ])
            ->select('job_orders_dt.id', 'waktu_order', 'jenis_order', 'job_orders_dt.order_no', 'item_name', 'harga_jual', 'ParamedicName')
            ->get();

        if (count($joborderdetail) > 0) {
            return response()->json([
                'success' => true,
                'message' => 'ada data tindakan',
                'data' => $joborderdetail
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'tidak ada order tindakan'
            ]);
        }
    }



    function getOrderTindakanDokter(Request $request)
    {
        $regno = $request->reg_no;
        $joborderdetail = DB::connection('mysql')
            ->table('job_orders_dt')
            //            ->leftJoin('job_orders','job_orders_dt.order_no','=','job_orders.order_no')
            //            ->leftJoin('rs_m_paramedic','job_orders.kode_dokter','=','rs_m_paramedic.ParamedicCode')
            ->where([
                ['job_orders_dt.reg_no', '=', $regno],
                ['job_orders_dt.jenis_order', '!=', 'obat']
            ])
            ->get();

        if (count($joborderdetail) > 0) {
            return response()->json([
                'success' => true,
                'message' => 'ada data tindakan',
                'data' => $joborderdetail
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'tidak ada order tindakan'
            ]);
        }
    }


    function orderPaket(Request $request)
    {
        $detailpaket = json_decode($request->data);
        $arraypaket = $detailpaket->detail;
        $arrayHarga = array();
        $planning = "";
        $rincianpaket = "";
        foreach ($arraypaket as $detail) {
            //cari harga pada tabel m_tarif
            $planning = $planning . $detail->ItemName1 . ",";
            $rincianpaket = $rincianpaket . "<li>" . $detail->ItemName1 . "</li>";
            //            $harga=DB::connection('mysql')
            //                ->table('rs_m_item_tarif')
            //                ->where('ItemId','=',$detail->ItemSubID)
            //                ->first();
            //            if($harga!=null){
            //                array_push($arrayHarga,$harga);
            //            }else{
            //                $paramssementara=array(
            //                    "tarif_id" => "",
            //                    "SiteCode" => "1",
            //                    "GCMember" => "X0103^004",
            //                    "DocumentNo" => "PERGUB2021RIRJ",
            //                    "ItemID" => "1866",
            //                    "ClassCategoryCode" => "2",
            //                    "RevisionNo" => "1",
            //                    "DocumentDate" => "29:43.3",
            //                    "StartingDate" => "8/3/2021",
            //                    "EndingDate" => "9/6/2033",
            //                    "StandardPrice" => "100000",
            //                    "CustomerPrice" => "0",
            //                    "PersonalPrice" => "100000",
            //                    "DiscountPrice" => "0",
            //                    "MinVariablePrice" => "0",
            //                    "MaxVariablePrice" => "0",
            //                    "StandardPriceBefore" => "100000",
            //                    "CustomerPriceBefore" => "0",
            //                    "PersonalPriceBefore" => "100000",
            //                    "DiscountPriceBefore" => "0",
            //                    "Remarks" => "PERGUB 2021 RANAP DAN RAJAL",
            //                    "IsDeleted" => "0",
            //                    "LastUpdatedBy" => "riza94",
            //                    "LastUpdatedDateTime" => "38:57.8"
            //                );
            //                array_push($arrayHarga,json_decode(json_encode($paramssementara)));
            //           }

        }
        //hilangkan null
        /* return response()->json([
            'success'=>true,
            'message'=>'ada data tindakan',
            'data'=>$arrayHarga[2]->StandardPrice
        ]);*/
        //memulai masukkan data ke job order dan job order detail
        $countorder = DB::connection('mysql')
            ->table("job_orders")
            ->get()
            ->count();
        $newDateFormat = str_replace('-', '', now()->toDateString());
        $orderNumberFormat = 'PKT/RI/' . $newDateFormat . $countorder;

        $jobOrder['reg_no'] = $request->reg_no;
        $jobOrder['kode_dokter'] = $request->soapdok_dokter;
        $jobOrder['waktu_order'] = now()->toDateTimeString();
        //$jobOrder['service_unit'] = $request->service_unit;
        $jobOrder['order_no'] = $orderNumberFormat;
        $detailBatch = array();
        $jobOrderDetail['jenis_order'] = "paket";
        $jobOrderDetail['reg_no'] = $request->reg_no;
        $jobOrderDetail['item_code'] = $request->item_code;
        $jobOrderDetail['qty'] = "1";
        //$jobOrderDetail['dosis'] = $request->dosis[$i];
        $jobOrderDetail['item_name'] = $request->nama_paket;
        //$jobOrderDetail['hari'] = $request->hari[$i];
        //$jobOrderDetail['durasi_hari'] = $request->durasi_hari[$i];
        //$jobOrderDetail['ket_dosis'] = $request->ket_dosis[$i];
        $jobOrderDetail['harga_jual'] = $request->harga_paket;
        $jobOrderDetail['order_no'] = $orderNumberFormat;
        $jobOrderDetail['flag'] = 0;
        array_push($detailBatch, $jobOrderDetail);
        $simpan = DB::connection('mysql')
            ->table('job_orders')
            ->insert($jobOrder);

        if ($simpan == TRUE) {
            DB::connection('mysql')
                ->table('job_orders_dt')
                ->insert($detailBatch);
            $paramssoap = array(
                'soapdok_reg' => $request->reg_no,
                'soap_tanggal' => date('Y-m-d'),
                'soapdok_subject' => $request->ranap_diagnosa,
                'soapdok_object' => $request->ranap_indikasi,
                'soapdok_assesment' => "",
                'soapdok_planning' => $planning,
                'soap_waktu' => date('H:i:s'),
                'soapdok_dokter' => $request->soapdok_dokter,
                'med_rec' => $request->med_rec,
                'nama_ppa' => $request->nama_ppa,
                'soapdok_instruksi' => "",
                'status_review' => "1",
                'is_dokter' => "1"
            );

            $simpancppt = DB::connection('mysql')
                ->table('rs_pasien_cppt')
                ->insert($paramssoap);
            if ($simpancppt == TRUE) {
                $paramshistorypaket = array(
                    'no_reg' => $request->reg_no,
                    'item_code' => $request->item_code,
                    'item_name' => $request->nama_paket,
                    'price' => $request->harga_paket,
                    'rincian_paket' => $rincianpaket,
                );
                $simpanhistorypaket = DB::connection('mysql')
                    ->table('history_paket')
                    ->insert($paramshistorypaket);
                if ($simpanhistorypaket == TRUE) {
                    return response()->json([
                        'success' => true,
                        'message' => 'berhasil simpan data'
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'gagal simpan history paket'
                    ]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'gagal simpan data cppt'
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'gagal simpan'
            ]);
        }
    }

    function getHasilLab()
    {
        //use curl
        $url = 'http://rsud.sumselprov.go.id/labor/api/result-lab?ono=QLAB/202303160000136';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $err = curl_error($ch);  //if you need
        curl_close($ch);

        return view('new_dokter.pemeriksaan_penunjang.hasil_lab', compact('response'));
    }

    function getHasilRadiologi()
    {
        $url = 'http://rsud.sumselprov.go.id/labor/api/report-ris?ono=QIMG/202201190000025';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $err = curl_error($ch);  //if you need
        curl_close($ch);

        return view('new_dokter.pemeriksaan_penunjang.hasil_radiologi', compact('response'));
    }
}
