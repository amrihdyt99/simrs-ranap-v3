<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KetersediaanRuanganPerawatController extends Controller
{
    function index(Request $request){
        if($request->ajax()){
            return $this->ajax_index($request);
        }

        return view('master.pages.ketersediaan_ruangan_perawat.index');
    }

    public function ajax_index($request)
    {
        $ruangan = DB::connection('mysql2')->table("ketersediaan_ruangan");
        return DataTables()
            ->queryBuilder($ruangan)
            ->editColumn('aksi_data', function ($query) use ($request) {
                return
                ( '<a href="'
                . route('perawat.menu.ketersediaanruangan.edit', [$query->id])
                . '" class="btn btn-sm"><i class="fas fa-edit text-info"></i></a>' )
                ;
            })
            ->editColumn('status_ketersediaan', function ($query) use ($request) {
                return $this->status_ketersediaan($query->status_ketersediaan);
            })
            ->editColumn('is_temporary', function ($query) use ($request) {
                return app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->request_ya_tidak_parser($query->is_temporary);
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function edit(Request $request, $id){
        $ruangansaatini = DB::connection('mysql2')
        ->table("ketersediaan_ruangan")
        ->where('id', $id)
        ->first();
        // $ruangan_tersedia = DB::connection('mysql2')
        // ->table("ketersediaan_ruangan")
        // ->get();
        $ruangan=DB::connection('mysql2')
        ->table('m_ruangan_baru')
        ->get();
        $serviceunit=DB::connection('mysql')
        ->table('rs_m_service_room')
        ->get();
        return view('master.pages.ketersediaan_ruangan_perawat.update', compact('ruangan','serviceunit','ruangansaatini'));
    }

    public function update(Request $request, $id)
    {
        $ruangan_tersedia = DB::connection('mysql2')
        ->table("ketersediaan_ruangan")
        ->where('id', $id)
        ->first();

        if(
            !$ruangan_tersedia
        ){
            return abort(404);
        }

        // $rules = [
        //     'id_paviliun' => 'required',
        //     'id_ruangan' => 'required',
        //     'nomor_bed' => 'required',
        //     'status_ketersediaan' => 'required',
        //     'is_temporary' => 'required',
        //     'id_kelas' => 'required',
        //     'harga_perhari' => 'required',
        // ];

        // $validator = Validator::make($request->all(),$rules);
        // if($validator->fails())
        // {
        //     return redirect()->route('master.ketersediaanruangan.edit', [$ruangan_tersedia->id]);
        // }

        $exPaviliun=explode('::',$request->id_paviliun);
        //var_dump($exPaviliun[0]);
        // $idpaviliun=$exPaviliun[0];
        // $namapaviliun=$exPaviliun[1];
        // $exRuangan=explode('::',$request->id_ruangan);
        // $roomcode=$exRuangan[0];
        // $roomname=$exRuangan[1];
        // $nomor_bed=$request->nomor_bed;
        $status_ketersediaan=$request->status_ketersediaan;
        $is_temporary=$request->is_temporary;

        $params=array();
        // $params['id_paviliun']=$idpaviliun;
        // $params['nama_pavilun']=$namapaviliun;
        // $params['room_code']=$roomcode;
        // $params['nama_ruangan']=$roomname;
        // $params['nomor_bed']=$nomor_bed;
        // $nama_kelas="";
        // if($request->id_kelas=="1"){
        //     $nama_kelas="Kelas I";
        // }else if($request->id_kelas=="2"){
        //     $nama_kelas="Kelas II";
        // }else if($request->id_kelas=="3"){
        //     $nama_kelas="Kelas III";
        // }else if($request->id_kelas=="4"){
        //     $nama_kelas="VIP";
        // }else if($request->id_kelas=="5"){
        //     $nama_kelas="VVIP";
        // }
        // $params['nama_kelas']=$nama_kelas;
        $params['status_ketersediaan']=$status_ketersediaan;
        $params['is_temporary']=$is_temporary;
        // $params['harga_perhari']=$request->harga_perhari;
        $simpan=DB::connection('mysql2')->table('ketersediaan_ruangan')
        ->where('id', $id)
        ->update($params);

        return redirect()->route('perawat.menu.ketersediaanruangan.index')->with("success", "Data User Berhasil Disimpan.");
    }

    public function status_ketersediaan($id)
    {
        $status_ketersediaan = [
            1 => 'Kosong',
            2 => 'Sedang Dipakai',
            3 => 'Cleaning',
        ];
        if(array_key_exists($id,$status_ketersediaan)){
            return $status_ketersediaan[$id];
        }
        return '';
    }
}
