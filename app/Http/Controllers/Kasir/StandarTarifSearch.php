<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StandarTarifSearch extends Controller
{
    public function index()
    {
        return view('kasir.pages.standard-tarif-search.index');
    }
}
