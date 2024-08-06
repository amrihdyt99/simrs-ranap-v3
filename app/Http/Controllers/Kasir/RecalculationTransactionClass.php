<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecalculationTransactionClass extends Controller
{
    public function index()
    {
        return view('kasir.pages.recalculation-transaction-class.index');
    }
}
