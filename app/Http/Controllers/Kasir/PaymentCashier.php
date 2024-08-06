<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentCashier extends Controller
{
    public function index()
    {
        return view('kasir.pages.payment-cashier.index');
    }
}
