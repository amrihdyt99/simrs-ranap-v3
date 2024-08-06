<?php

namespace App\Http\Controllers\Admin_nurse;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($MedicalNo)
    {
        //
        $sql="SELECT m_orders.*,users.name as ParamedicName FROM m_orders LEFT JOIN users ON
                m_orders.user_order=users.id
                WHERE m_orders.med_rec=?";
        $order=DB::connection('mysql2')->select($sql,[$MedicalNo]);
         $data['pasien']=Pasien::find($MedicalNo);
        $data['tagihan']=$order;
        return view('nurse.billing.index', $data);
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
    public function show($MedicalNo)
    {
        //
        $sql="SELECT m_orders.*,users.name as ParamedicName FROM m_orders LEFT JOIN users ON
                m_orders.user_order=users.id
                WHERE m_orders.med_rec=?";

        $sqlpasien="SELECT m_registrasi.*,m_pasien.* FROM m_registrasi JOIN m_pasien ON
                m_registrasi.reg_medrec=m_pasien.MedicalNo WHERE
                m_registrasi.reg_no=?";
        $order=DB::connection('mysql2')->select($sql,[$MedicalNo]);
        $pasien=DB::connection('mysql2')->selectOne($sqlpasien,[$MedicalNo]);

        $data['pasien']=$pasien;
        $data['tagihan']=$order;
        return view('nurse.billing.index', $data);
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
