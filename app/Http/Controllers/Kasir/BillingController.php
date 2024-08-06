<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
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

    public function detailtagihan($reg_no){
        $sql="SELECT * FROM job_orders_dt
                LEFT JOIN job_orders ON
                job_orders_dt.order_no=job_orders.order_no LEFT JOIN
                rs_m_paramedic ON
                rs_m_paramedic.ParamedicCode=job_orders.kode_dokter
                WHERE job_orders_dt.reg_no=?";

        //$sqlobat="SELECT * FROM job_orders_dt WHERE reg_no=?";
       /* $sqlpasien="SELECT m_pasien.* FROM m_registrasi JOIN m_pasien ON
                    m_registrasi.reg_medrec=m_pasien.MedicalNo WHERE
                    m_registrasi.reg_no=?";*/

        $datamypatient=DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien','m_registrasi.reg_medrec','=','m_pasien.MedicalNo')
            ->leftJoin('m_paramedis','m_registrasi.reg_dokter','=','m_paramedis.ParamedicCode')
            ->leftJoin('m_ruangan_baru','m_registrasi.service_unit','=','m_ruangan_baru.id')
            ->leftJoin('m_kelas_ruangan_baru','m_registrasi.bed','=','m_kelas_ruangan_baru.id')
            ->where(['m_registrasi.reg_no'=>$reg_no])
            ->get()->first();
        $ceksoapdokter=DB::connection('mysql')
            ->table('rs_pasien_soapdok')
            ->where(['soapdok_reg'=>$reg_no,'soapdok_dokter'=>$datamypatient->ParamedicCode])
            ->get();
        $historypaket=DB::connection('mysql')
            ->table('history_paket')
            ->where(['no_reg'=>$reg_no])
            ->get();




        //$data['tagihanobat']=DB::connection("mysql")->select($sqlobat,[$reg_no]);
        $data['tagihan']=DB::connection('mysql')->select($sql,[$reg_no]);
        $data['reg_no']=$reg_no;
        $data['pasien']=$datamypatient;
        $data['visit']=$ceksoapdokter;
        $data['paket']=$historypaket;
        return view('kasir/billing/daftar_tagihan',$data);
    }


    function addTindakan(Request $request){
//        $user=Auth::user();
        $ordername=$request->itemTindakan;
        $kategori=$request->jenisTindakan;
        $price=$request->tarifItem;
        $regmedrec=$request->regmedrec;
        $kodetindakan=$request->kodetindakan;

        $countorder=DB::connection('mysql')
            ->table("job_orders")
            ->get()
            ->count();
        $newDateFormat = str_replace('-','',now()->toDateString());
        $jenis="";
        if($kategori=="Laboratorium"){
            $jenis="lab";
            $orderNumberFormat = 'LAB/RI/'.$newDateFormat.$countorder;
        }else if($kategori=="Radiologi"){
            $jenis="radiologi";
            $orderNumberFormat = 'RAD/RI/'.$newDateFormat.$countorder;
        }else if($kategori=="fisio"){
            $jenis="fisio";
            $orderNumberFormat = 'FIS/RI/'.$newDateFormat.$countorder;
        }else if($kategori=="lainnya"){
            $jenis="lainnya";
            $orderNumberFormat = 'ANY/RI/'.$newDateFormat.$countorder;
        }
        $jobOrder['reg_no'] = $request->reg_no;
        $jobOrder['kode_dokter'] = $request->kode_dokter;
        $jobOrder['waktu_order'] = now()->toDateTimeString();
        //$jobOrder['service_unit'] = $request->service_unit;
        $jobOrder['order_no'] = $orderNumberFormat;

        $jobOrderDetail['jenis_order']=$jenis;
        $jobOrderDetail['reg_no']=$request->reg_no;
        $jobOrderDetail['item_code'] = $request->kodetindakan;
        $jobOrderDetail['item_name'] = $request->itemTindakan;
        $jobOrderDetail['qty'] = "1";
        $jobOrderDetail['harga_jual'] = $request->tarifItem;
        $jobOrderDetail['order_no'] = $orderNumberFormat;

        $simpan=DB::connection('mysql')->table('job_orders')->insert($jobOrder);
        if($simpan==true){
            $simpan2=DB::connection('mysql')->table('job_orders_dt')->insert($jobOrderDetail);
            return response()->json(['status'=>$simpan2,'message'=>'Data berhasil disimpan']);
        }else{
            return response()->json(['status'=>$simpan,'message'=>'Gagal Menyimpan Data']);
        }

        /*$sql="INSERT INTO m_orders (user_order,order_name,kategori,price,tanggal_order,reg_medrec,status_bayar,kode_tindakan,isDeleted)
                    VALUES(?,?,?,?,?,?,?,?,?)";

        $simpan=DB::connection('mysql2')->insert($sql,[$user->getAuthIdentifier(),$ordername,$kategori,$price,date('Y-m-d'),$regmedrec,'0',$kodetindakan,"0"]);*/


    }

    function addBillingReview(Request $request){
        $reg_no=$request->reg_no;
        $dokterkode=$request->kode_dokter;
        $feeamount=$request->feeamount;
        $cekstatus=DB::connection('mysql2')
            ->table('m_registrasi')
            ->where('reg_no','=',$reg_no)
            ->where('reg_discharge','=','2')
            ->get()->count();

        if($cekstatus>0){
            return response()->json([
                'success'=>false,
                'message'=>"billing telah direview sebelumnya"
            ]);
        }else{
            //add review
            //get job_order_dt
            $jobOrderDt=DB::connection('mysql')
                ->table('job_orders_dt')
                ->where(['reg_no'=>$reg_no])
                ->get();

            $ceksoapdokter=DB::connection('mysql')
                ->table('rs_pasien_soapdok')
                ->where(['soapdok_reg'=>$reg_no,'soapdok_dokter'=>$dokterkode])
                ->get();

            $arrayBatchReview=array();
            foreach ($jobOrderDt as $item){
                $paramsitem=array(
                    'reg_no'=>$item->reg_no,
                    'order_no'=>$item->order_no,
                    'item_code'=>$item->item_code,
                    'jenis_order'=>$item->jenis_order,
                    'item_name'=>$item->item_name,
                    'qty'=>$item->qty,
                    'harga_jual'=>$item->harga_jual
                );
                array_push($arrayBatchReview,$paramsitem);
            }

            foreach ($ceksoapdokter as $visit){
                $paramsvisit=array(
                    'reg_no'=>$reg_no,
                    'order_no'=>$reg_no,
                    'item_code'=>$dokterkode,
                    'jenis_order'=>"visit",
                    'item_name'=>"Visit Dokter",
                    'qty'=>"1",
                    'harga_jual'=>$feeamount
                );

                array_push($arrayBatchReview,$paramsvisit);
            }

            $simpanreview=DB::connection('mysql')
                ->table('rs_pasien_tagihan_review')
                ->insert($arrayBatchReview);

            if($simpanreview==true){
                //update status register
                $paramsupdate=array(
                    'reg_selesai'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                    'reg_discharge'=>'2'
                );

                $update=DB::connection('mysql2')
                    ->table('m_registrasi')
                    ->where(['reg_no'=>$reg_no])
                    ->update($paramsupdate);

                return response()->json([
                    'status'=>$update,
                    'message'=>"berhasil"
                ]);
            }else{
                return response()->json([
                    'status'=>$simpanreview,
                    'message'=>"gagal mereview"
                ]);
            }


        }


    }

    function invoice(Request $request){
        $regno=$request->regno;
        $tanggungan_asuransi=$request->tanggungan_asuransi;
        $selisih_bayar=$request->selisih_bayar;
        $cara_bayar=$request->cara_bayar;
        $nomor_kartu=$request->nomor_kartu;
        $status_bayar=$request->status_bayar;
        $cektransaksi=DB::connection('mysql')
            ->table('rs_pasien_transaksi')
            ->where('reg_no','=',$regno)
            ->get()->count()+1;
        $newDateFormat = str_replace('-','',now()->toDateString());
        $no_faktur='TRS/RI/'.$newDateFormat.$cektransaksi;

        $params=array(
            'kasir_id'=>$request->kasir_id,
            'nama_kasir'=>$request->nama_kasir,
            'reg_no'=>$regno,
            'no_faktur'=>$no_faktur,
            'tanggungan_asuransi'=>$tanggungan_asuransi,
            'selisih_bayar'=>$selisih_bayar,
            'cara_bayar'=>$cara_bayar,
            'nomor_kartu'=>$nomor_kartu,
            'status_bayar'=>$status_bayar,
            'tgl_bayar'=>date('Y-m-d H:i:s'),
            'jam_bayar'=>date('H:i:s'),
        );
        $simpan=DB::connection('mysql')
            ->table('rs_pasien_transaksi')
            ->insert($params);
        if($simpan==true) {
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
            $paramruangan=array(
                'status_ketersediaan'=>'1'
            );
            //kurang where id_ketersediaan
            $updateruangan=DB::connection('mysql2')
                ->table('ketersediaan_ruangan')
                ->update($paramruangan);
            if($simpanDetailTagihan==true){
                $update=DB::connection('mysql2')
                    ->table('m_registrasi')
                    ->where(['reg_no'=>$regno])
                    ->update(['reg_discharge'=>'3']);
                return response()->json([
                    'status'=>$update,
                    'message'=>"berhasil"
                ]);
            }else{
                return response()->json([
                    'status'=>$simpanDetailTagihan,
                    'message'=>"gagal"
                ]);
            }

        }else{
            return response()->json([
                'status' => $simpan,
                'message' => "gagal mencetak invoice periksa koneksi anda"
            ]);
        }
    }

    function cetakinvoice($regno){
        $datamypatient=DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien','m_registrasi.reg_medrec','=','m_pasien.MedicalNo')
            ->leftJoin('m_paramedis','m_registrasi.reg_dokter','=','m_paramedis.ParamedicCode')
            ->leftJoin('m_ruangan_baru','m_registrasi.service_unit','=','m_ruangan_baru.id')
            ->leftJoin('m_kelas_ruangan_baru','m_registrasi.bed','=','m_kelas_ruangan_baru.id')
            ->where(['m_registrasi.reg_no'=>$regno])
            ->get()->first();

        $datatransaksi=DB::connection('mysql')
            ->table('rs_pasien_transaksi')
            ->where(['reg_no'=>$regno])
            ->get()->first();

        $datadetail=DB::connection('mysql')
            ->table('rs_pasien_det_transaksi')
            ->where(['no_faktur'=>$datatransaksi->no_faktur])
            ->get();

        $historypaket=DB::connection('mysql')
            ->table('history_paket')
            ->where(['no_reg'=>$regno])
            ->get();

        return view('kasir.billing.invoice',[
            'pasien'=>$datamypatient,
            'transaksi'=>$datatransaksi,
            'detail'=>$datadetail,
            'paket'=>$historypaket
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('kasir/billing/daftar_tagihan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
