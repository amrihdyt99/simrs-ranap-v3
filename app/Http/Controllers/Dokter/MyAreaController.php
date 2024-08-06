<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyAreaController extends Controller
{
    public function index()
    {
        $data['myArea'] = RegistrationInap::all();
        return view('dokter.pages.my-area.index', $data);
    }
}
