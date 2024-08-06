<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\PasienSoapDok;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DiagnoseController extends Controller
{
    public function diagnose(RegistrationInap $patient)
    {
        $data['patient'] = $patient;
        $data['soap'] = PasienSoapDok::where('soapdok_reg', $patient->reg_no)->latest()->get();

        return view('dokter.pages.patient.diagnose', $data);
    }

    public function storeSOAP(Request $request, RegistrationInap $patient)
    {
        $val_data = $request->validate([
            'soapdok_subject' => ['string'],
            'soapdok_object' => ['string'],
            'soapdok_assesment' => ['string'],
            'soapdok_planning' => ['string'],
            'soapdok_reg' => [''],
            'soapdok_dokter' => [''],
            'soapdok_poli' => ['']
        ]);

        $val_data['soapdok_deleted'] = $request->input('soapdok_deleted', 0);

        PasienSoapDok::create($val_data);
        return redirect()->back();
    }

    function storeSoapApi(Request $request){
        //var_dump($request->arrayLabor);
        $arrayLabor=$request->arrayLabor;
        $arrayImaging=$request->arrayImaging;
        $val_data = $request->validate([
            'soapdok_subject' => ['string'],
            'soapdok_object' => ['string'],
            'soapdok_assesment' => ['string'],
            'soapdok_planning' => ['string'],
            'soapdok_reg' => [''],
            'soapdok_dokter' => [''],
            'soapdok_poli' => ['']
        ]);

        $val_data['soapdok_deleted'] = $request->input('soapdok_deleted', 0);

        if(count($arrayLabor)>0){
            foreach ($arrayLabor as $lab){
                $namalabor=$lab['namalabor'];
                $pricelabor=$lab['pricelabor'];
                $kodelabor=$lab['kodelabor'];
                $reg_medrec=$request->soapdok_reg;

                $sql="INSERT INTO m_orders (user_order,order_name,kategori,price,tanggal_order,reg_medrec,status_bayar,kode_tindakan,isDeleted)
                    VALUES(?,?,?,?,?,?,?,?,?)";
                $simpanorder=DB::connection("mysql2")->insert($sql,
                    [$request->soapdok_dokter,$namalabor,"laboratorium",$pricelabor,date('Y-m-d'),$reg_medrec,'0',$kodelabor,'0']);
            }

        }

        if(count($arrayImaging)>0){
            foreach ($arrayImaging as $rad){
                $namarad=$rad['namaimaging'];
                $pricerad=$rad['priceimaging'];
                $reg_medrec=$request->soapdok_reg;
                $kodeimaging=$rad['kodeimaging'];
                $sql="INSERT INTO m_orders (user_order,order_name,kategori,price,tanggal_order,reg_medrec,status_bayar,kode_tindakan,isDeleted)
                    VALUES(?,?,?,?,?,?,?,?,?)";
                $simpanorder=DB::connection("mysql2")->insert($sql,
                    [$request->soapdok_dokter,$namarad,"radiologi",$pricerad,date('Y-m-d'),$reg_medrec,'0',$kodeimaging,'0']);
            }

        }



        PasienSoapDok::create($val_data);
        $response=array();
        $response['status']=true;
        $response['message']="tester";
        return response()->json($response);
    }
}
