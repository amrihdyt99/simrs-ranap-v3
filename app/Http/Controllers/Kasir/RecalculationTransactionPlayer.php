<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecalculationTransactionPlayer extends Controller
{
    public function index()
    {
        return view('kasir.pages.recalculation-transaction-player.index');
    }
}
