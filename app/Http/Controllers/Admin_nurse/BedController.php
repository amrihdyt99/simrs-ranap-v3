<?php

namespace App\Http\Controllers\Admin_nurse;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index($MedicalNo)
    {
        //


        return view('nurse.bed-management.index', [
            'pasien' => Pasien::find($MedicalNo)
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
    public function show($MedicalNo)
    {
        //
        // $data['pasien'] = Pasien::find($MedicalNo)->get()->first();
        $myArea = RegistrationInap::first();
        return view('nurse.bed-management.index', [
            'pasien' => Pasien::find($MedicalNo),
            'myArea' => $myArea
        ]);
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
