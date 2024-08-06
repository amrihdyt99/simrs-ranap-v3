<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\ServiceRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangan = ServiceRoom::all();

        return view('master.pages.ruangan.index', ['ruangan' => $ruangan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.pages.ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params=$request->all();
        unset($params['_token']);
        $nama_kelas="";
        if($request->id_kelas=="1"){
            $nama_kelas="Kelas I";
        }else if($request->id_kelas="2"){
            $nama_kelas="Kelas II";
        }else if($request->id_kelas="3"){
            $nama_kelas="Kelas III";
        }else if($request->id_kelas="4"){
            $nama_kelas="VIP";
        }else if($request->id_kelas="5"){
            $nama_kelas="VVIP";
        }
        $params['nama_kelas']=$nama_kelas;
        $simpan=DB::connection('mysql2')->table('ketersediaan_ruangan')
            ->insert($params);

       /* $validation = $request->validate([
            'RoomCode' => ['required', 'string'],
            'RoomName' => ['required', 'string'],
        ]);

        $validation['IsDeleted'] = $request->input('IsDeleted', 0);

        ServiceRoom::create($validation);*/
        return redirect()->route('master.ruangan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceRoom  $serviceRoom
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceRoom $serviceRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceRoom  $serviceRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceRoom $ruangan)
    {
        return view('master.pages.ruangan.update', ['ruangan' => $ruangan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceRoom  $serviceRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceRoom $ruangan)
    {
        $validation = $request->validate([
            'RoomCode' => ['required', 'string'],
            'RoomName' => ['required', 'string'],
            'IP' => ['string']
        ]);

        $ruangan->update($validation);
        return redirect()->route('master.ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceRoom  $serviceRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceRoom $ruangan)
    {
        $ruangan->delete();
        return redirect()->route('master.ruangan.index');
    }
}
