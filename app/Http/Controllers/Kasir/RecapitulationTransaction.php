<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecapitulationTransaction extends Controller
{
    public function index()
    {
        return view('kasir.pages.recapitulation-transaction.index');
    }
}
