<?php

namespace App\Http\Controllers\Radiologi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RadiologiController extends Controller
{
    function getPesanRadiologi(Request $request)
    {
        $no_reg=$request->no_reg;
        $data = DB::connection('mysql')
            ->table('pesan_radiologi')
            ->where('reg_no', $no_reg)
            ->get();
        return response()->json($data);
    }

    //upload file to table pesan radiologi
    function uploadFile(Request $request)
    {
        $no_reg=$request->no_reg;
        $file=$request->file('file');
        $file_name=$file->getClientOriginalName();
        $file->move('file_radiologi',$file_name);
        $data = DB::connection('mysql')
            ->table('pesan_radiologi')
            ->where('id', $request->id)
            ->update([
                'dokumen' => $file_name,
                'status'=>1
            ]);
        return response()->json($data);
    }

}
