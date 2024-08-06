<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\JobOrderDetail;
use App\Models\JobOrders;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DrugController extends Controller
{
    public function storeObatSatuan(Request $request)
    {
        $patient = $request->reg_no;
        $userorder=Auth::user()->getAuthIdentifier();
        $sql="INSERT INTO m_orders (user_order,order_name,kategori,price,tanggal_order,reg_medrec,status_bayar,kode_tindakan,isDeleted)
                    VALUES(?,?,?,?,?,?,?,?,?)";
        for ($i = 0; $i < count($request->item_code);$i++) {
            $simpan=DB::connection('mysql2')->insert($sql,[$userorder,$request->item_code[$i],'obat',$request->harga_jual[$i],
                date('Y-m-d'),$patient,'0',$request->item_code[$i],'0']);
        }

        /*$countOrderNo = JobOrders::all()->count();
        $newDateFormat = str_replace('-','',now()->toDateString());
        $orderNumberFormat = 'FARM/RI/'.$newDateFormat.$countOrderNo;

        $jobOrder['reg_no'] = $request->reg_no;
        $jobOrder['kode_dokter'] = $request->kode_dokter;
        $jobOrder['waktu_order'] = now()->toDateTimeString();
        $jobOrder['service_unit'] = $request->service_unit;
        $jobOrder['order_no'] = $orderNumberFormat;
        JobOrders::create($jobOrder);

        for ($i = 0; $i < count($request->item_code);$i++) {
            $jobOrderDetail['reg_no'] = $request->reg_no;
            $jobOrderDetail['item_code'] = $request->item_code[$i];
            $jobOrderDetail['qty'] = $request->qty[$i];
            $jobOrderDetail['dosis'] = $request->dosis[$i];
            $jobOrderDetail['hari'] = $request->hari[$i];
            $jobOrderDetail['durasi_hari'] = $request->durasi_hari[$i];
            $jobOrderDetail['ket_dosis'] = $request->ket_dosis[$i];
            $jobOrderDetail['harga_jual'] = $request->harga_jual[$i];
            $jobOrderDetail['order_no'] = $orderNumberFormat;
            $jobOrderDetail['flag'] = 0;
            JobOrderDetail::create($jobOrderDetail);
        }*/

        return redirect()->route('dokter.patient.treatment', $patient);
    }

    public function detailObat(RegistrationInap $patient, $id)
    {
        $orderNo= JobOrders::where('id', $id)->first();

        $data['jobOrderDetail'] = JobOrderDetail::where('order_no', $orderNo->order_no)->get();
        $data['patient'] = $patient;

        return view('dokter.pages.e-prescription.detail', $data);
    }

    public function storeObatRacikan(Request $request)
    {
        $patient = $request->reg_no;

        /*
        $countOrderNo = JobOrders::all()->count();
        */
        $nomor_now_data = JobOrders::all()->count();
        $padding_length = 7;
        $length = strlen((string)$nomor_now_data);
        for($i = $length;$i<$padding_length;$i++)
        {
            $nomor_now_data = '0'.$nomor_now_data;
        }
        $countOrderNo = $nomor_now_data;
        $newDateFormat = str_replace('-','',now()->toDateString());
        $orderNumberFormat = 'FARM/RI/'.$newDateFormat.$countOrderNo;

        $jobOrder['reg_no'] = $request->reg_no;
        $jobOrder['kode_dokter'] = $request->kode_dokter;
        $jobOrder['waktu_order'] = now()->toDateTimeString();
        $jobOrder['service_unit'] = $request->service_unit;
        $jobOrder['order_no'] = $orderNumberFormat;
        JobOrders::create($jobOrder);

        for ($i = 0; $i < count($request->item_code);$i++) {
            $jobOrderDetail['reg_no'] = $request->reg_no;
            $jobOrderDetail['item_code'] = $request->item_code[$i];
            $jobOrderDetail['qty'] = $request->qty[$i];
            $jobOrderDetail['dosis'] = $request->dosis[$i];
            $jobOrderDetail['hari'] = $request->hari[$i];
            $jobOrderDetail['durasi_hari'] = $request->durasi_hari[$i];
            $jobOrderDetail['ket_dosis'] = $request->ket_dosis[$i];
            $jobOrderDetail['harga_jual'] = $request->harga_jual[$i];
            $jobOrderDetail['order_no'] = $orderNumberFormat;
            $jobOrderDetail['flag'] = 1;
            JobOrderDetail::create($jobOrderDetail);
        }

        return redirect()->route('dokter.patient.treatment', $patient);
    }
}
