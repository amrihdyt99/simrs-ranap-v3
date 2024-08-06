<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionEntry extends Controller
{
    public function index()
    {
        return view('kasir.pages.transaction-entry.index');
    }
}
