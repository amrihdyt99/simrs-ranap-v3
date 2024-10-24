<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Exception;
use Carbon\Carbon;

class TarifController extends Controller
{
    public function index()
    {
        $data['tarif'] = DB::connection("mysql2")->select("SELECT * FROM m_tarif");
        return view('master.pages.tarif.index', $data);
    }


    public function create()
    {
        return view('master.pages.tarif.create');
    }

    public function store(Request $request)
    {
        $dataSubHarga = $request->subHarga;
        $dataNamaSub = $request->judulSubHarga;
        if (isset($dataSubHarga)) {
            $createJSONSubHarga = array();
            for ($i = 0; $i < count($dataSubHarga); $i++) {
                $createJSONObj = array();
                $createJSONObj['nama'] = $dataNamaSub[$i];
                $createJSONObj['harga'] = $dataSubHarga[$i];

                array_push($createJSONSubHarga, $createJSONObj);
            }
            $response['data'] = $createJSONSubHarga;
            $subHarga = json_encode($response);

            $sql = "INSERT INTO m_tarif (tarif_item,tarif_kelas,tarif_harga,tarif_tindakan,tarif_sub_tindakan,sub_harga)
                    VALUES(?,?,?,?,?,?)";
            DB::connection("mysql2")->insert($sql, [$request->tarif_item, $request->tarif_kelas, $request->tarif_harga, $request->tarif_tindakan, $request->tarif_sub_tindakan, $subHarga]);
        } else {
            $sql = "INSERT INTO m_tarif (tarif_item,tarif_kelas,tarif_harga,tarif_tindakan,tarif_sub_tindakan)
                    VALUES(?,?,?,?,?)";
            DB::connection("mysql2")->insert($sql, [$request->tarif_item, $request->tarif_kelas, $request->tarif_harga, $request->tarif_tindakan, $request->tarif_sub_tindakan]);
        }


        return redirect()->route('master.tarif.index');
    }

    public function edit($id)
    {
        //echo $id;
        $sql = "SELECT * FROM m_tarif WHERE tarif_id=?";
        $data['tarif'] = DB::connection("mysql2")->select($sql, [$id]);

        //var_dump($data['tarif']);
        return view('master.pages.tarif.update', $data);
    }
    public function update(Request $request, Tarif $tarif)
    {
    }

    public function destroy($id)
    {
    }

    function data_tindakan_baru(Request $request)
    {
        $type = $request->type;
        $class = $request->class;
        $reg = $request->reg;

        $reg = preg_replace('/\//', '_', $reg);
        
        if ($type == 'X0001^04') {
            $type = 'LAB';
        } else if ($type == 'X0001^05') {
            $type = 'RAD';
        } else if ($type == 'X0001^08') {
            $type = 'FISIO';
        } else {
            $type = 'LAIN';
        }
        
        $data = getService(urlSimrs().'api/emr/cpoe/data_all_item/'.$type.'/'.$reg.'?classParams='.$class);

        return response()->json([
            'data' => json_decode($data)
        ]);

        // $dataItem = DB::connection('mysql')
        //     ->table('rs_m_item')
        //     ->leftJoin("rs_m_item_tarif", "rs_m_item.ItemID", '=', 'rs_m_item_tarif.ItemID')
        //     ->where([
        //         'rs_m_item.GCItemType' => $type,
        //         'rs_m_item_tarif.ClassCategoryCode' => $class,
        //         'rs_m_item.IsActive' => '1',
        //         'rs_m_item.IsDeleted' => '0',
        //         // 'rs_m_item.Remarks ' => '0',
        //     ])->get();

        // return response()->json([
        //     'data' => $dataItem
        // ]);
    }

    public function data_tindakan(Request $request)
    {
        $type = $request->type;
        $class = $request->class;
        //var_dump($type);
        try {
            //KETERANGAN TIPE
            // X0001^01 = Other Services (Termasuk biaya konsultasi dokter)
            // X0001^02 = Medication / Obat
            // X0001^05 = Imaging / Radiologi
            // X0001^04 = Laboratory

            if ($class) {
                $class_['rs_m_item_tarif.ClassCategoryCode'] = $class;
            } else {
                $class_ = [];
            }

            if ($type == 'X0001^04' || $type == 'X0001^05' || $type == 'X0001^02') { //JIKA KODENYA ADALAH RADIOLOGI, LAB, OBAT
                $group = DB::connection('mysql')
                    ->table('rs_m_item_group')
                    ->where('GCItemType', $type)
                    ->select([
                        'ItemGroupCode',
                        'GCItemType',
                        'ItemGroupName1',
                        'IsActive',
                        'IsDeleted'
                    ])
                    ->get();

                $data_ = [];

                foreach ($group as $value) {

                    $data['ItemGroupCode'] = $value->ItemGroupCode;
                    $data['GCItemType'] = $value->GCItemType;
                    $data['ItemGroupName1'] = $value->ItemGroupName1;
                    $data['IsActive'] = $value->IsActive;
                    $data['IsDeleted'] = $value->IsDeleted;
                    //connection onspaira:sqlsrv_sphaira
                    $data['item_tindakan'] = DB::connection('mysql')
                        ->table('rs_m_item')
                        ->leftjoin('rs_m_item_tarif', 'rs_m_item.ItemID', 'rs_m_item_tarif.ItemID')
                        ->leftjoin('rs_m_kelas_kategori', 'rs_m_item_tarif.ClassCategoryCode', 'rs_m_kelas_kategori.ClassCategoryCode')
                        ->where('GCItemType', $type)
                        ->where($class_)
                        ->where('rs_m_item.ItemGroupCode', $value->ItemGroupCode)
                        ->select([
                            'rs_m_item_tarif.ClassCategoryCode',
                            'rs_m_item.ItemID',
                            'ItemCode',
                            'ItemName1',
                            'GCItemType',
                            'StandardPrice',
                            'CustomerPrice',
                            'PersonalPrice',
                            'DiscountPrice',
                            'StartingDate',
                            'EndingDate',
                            'rs_m_item.IsActive',
                            'rs_m_item.IsDeleted',
                            'rs_m_item.IsAllowCito',
                            'rs_m_item.IsAllowComplication',
                            'rs_m_item.IsAllowVariable',
                            'rs_m_item.IsAllowOrder',
                        ])
                        ->get();

                    array_push($data_, $data);
                }
            } else { //UNTUK TARIF LAINNYA
                $data_ = DB::connection('mysql')
                    ->table('rs_m_item')
                    ->leftjoin('rs_m_item_tarif', 'rs_m_item.ItemID', 'rs_m_item_tarif.ItemID')
                    ->leftjoin('rs_m_kelas_kategori', 'rs_m_item_tarif.ClassCategoryCode', 'rs_m_kelas_kategori.ClassCategoryCode')
                    ->where('GCItemType', $type)
                    ->where($class_)
                    ->select([
                        'rs_m_item_tarif.ClassCategoryCode',
                        'rs_m_item.ItemID',
                        'ItemCode',
                        'ItemName1',
                        'GCItemType',
                        'StandardPrice',
                        'CustomerPrice',
                        'PersonalPrice',
                        'DiscountPrice',
                        'StartingDate',
                        'EndingDate',
                        'rs_m_item.IsActive',
                        'rs_m_item.IsDeleted',
                        'rs_m_item.IsAllowCito',
                        'rs_m_item.IsAllowComplication',
                        'rs_m_item.IsAllowVariable',
                        'rs_m_item.IsAllowOrder',
                    ])
                    ->get();
            }


            return response()->json($data_);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    function ordertindakannurse(Request $request)
    {
        // var_dump(Auth::user()->level_user);
        $userid = $request->userid;
        $regno = $request->regno;
        $datajson = $request->datajson;
        $perawat_name = $request->perawat_name;
        //$datajson=json_decode($datajson,true);
        $countorder = DB::connection('mysql')
            ->table("job_orders")
            ->whereBetween(
                'waktu_order',
                [
                    Carbon::now()->startOfDay(),
                    Carbon::now()->endOfDay()
                ]
            )
            ->count();
        $newDateFormat = str_replace('-', '', now()->toDateString());
        $orderNumberFormat = genKode(DB::table('job_orders_dt')->where('jenis_order', 'lainnya'), null, null, null, 'ANY');
        $jobOrder['reg_no'] = $regno;
        $jobOrder['kode_dokter'] = $userid;
        $jobOrder['waktu_order'] = now()->toDateTimeString();
        //$jobOrder['service_unit'] = $request->service_unit;
        $jobOrder['order_no'] = $orderNumberFormat;

        $detailBatch = array();
        for ($i = 0; $i < count($datajson); $i++) {
            $itemcode = $datajson[$i]['item_code'];
            $qty = $datajson[$i]['qty'];
            $itemName = $datajson[$i]['item_name'];
            $price = $datajson[$i]['price'];
            $total = $datajson[$i]['total'];


            $jobOrderDetail['jenis_order'] = "lainnya";
            $jobOrderDetail['reg_no'] = $regno;
            $jobOrderDetail['item_code'] = $itemcode;
            $jobOrderDetail['qty'] = $qty;
            //$jobOrderDetail['dosis'] = $request->dosis[$i];
            $jobOrderDetail['item_name'] = $itemName;
            //$jobOrderDetail['hari'] = $request->hari[$i];
            //$jobOrderDetail['durasi_hari'] = $request->durasi_hari[$i];
            //$jobOrderDetail['ket_dosis'] = $request->ket_dosis[$i];
            $jobOrderDetail['harga_jual'] = $price;
            $jobOrderDetail['order_no'] = $orderNumberFormat;
            // $jobOrderDetail['flag'] = 0;
            $jobOrderDetail['created_by_id'] = $userid;
            $jobOrderDetail['deleted'] = 0;
            $jobOrderDetail['flag_billing_perawat'] = 1;
            $jobOrderDetail['created_by_name'] = $perawat_name;
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
                'success' => true,
                'message' => 'order berhasil'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'order gagal'
            ]);
        }
    }
}
