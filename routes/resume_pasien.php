<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('resume', function () {
    return view('resume_pasien.index');
});
