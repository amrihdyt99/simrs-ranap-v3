<?php

namespace App\Http\Controllers\ZxcNyaaUniversal;

use App\Http\Controllers\Controller;

class AaaBaseController extends Controller
{
    public function universal_function()
    {
        $x = new \App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController;
        return $x;
    }

    public function dd_user_now()
    {
        dd(auth()->user());
    }

    public function viewtest_user_now()
    {
        return view('zxc-nyaa-universal.dummy.index-onlycontent')
        ->with(get_object_vars($this));
    }

}
