<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NurseNoteController extends Controller
{
    function storenote(Request $request)
    {
        $userid=Auth::user()->id;
        $params['id_nurse']=$userid;
        $params['catatan']=$request->catatan;
        $params['tgl_note']=$request->tgl_pemberian;


    }
}
