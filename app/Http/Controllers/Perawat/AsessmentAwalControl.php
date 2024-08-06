<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsessmentAwalControl extends Controller
{
    function index()
    {
        return view('assessment/pages/awal/entry');
    }
}
