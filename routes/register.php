<?php

use App\Http\Controllers\Master\PatientController;
use App\Http\Controllers\Ranap as Ranap;
use App\Http\Controllers\IGD as IGD;
use App\Http\Controllers\IGD\RegisterController;
use App\Http\Controllers\Rajal\RegistrationRajalController;
use Illuminate\Support\Facades\Route;

Route::prefix('ranap')->middleware(['auth', 'role:adminregister'])->group(function () {
    Route::get('/', [Ranap\RegisterController::class, 'index'])->name('register.ranap.index');
    Route::get('batal/{no}', [Ranap\RegisterController::class, 'batal_ranap'])->name('register.ranap.batal');

    Route::get('/form', [Ranap\RegisterController::class, 'formRegisterInap'])->name('register.ranap.create');
    Route::post('/form', [Ranap\RegisterController::class, 'storeRegisterInap'])->name('register.ranap.store');
    Route::get('/cetak/{reg_no}', [Ranap\RegisterController::class, 'cetakRegistrasi'])->where('reg_no', '(.*)')->name('register.ranap.cetak');
    Route::resource('patient', PatientController::class);
    Route::get('slipadmisi/{reg_no}', [Ranap\RegisterController::class, 'cetakSlipAdmisi'])->where('reg_no', '(.*)')->name('register.ranap.slipadmisi');
    Route::get('gc2/{reg_no}', [Ranap\RegisterController::class, 'gc2'])->where('reg_no', '(.*)')->name('register.ranap.gc2');
    Route::get('gc1/{reg_no}', [Ranap\RegisterController::class, 'gc1'])->where('reg_no', '(.*)')->name('register.ranap.gc1');
    Route::post('/uploadTtdAdmisi', [Ranap\RegisterController::class, 'uploadTtdAdmisi'])->name('register.ranap.uploadTtdAdmisi');
    Route::post('/uploadGcdua', [Ranap\RegisterController::class, 'uploadGc2'])->name('register.ranap.uploadGcdua');
});

Route::prefix('igd')->middleware(['auth', 'role:adminregister'])->group(function () {
    Route::get('/', [IGD\RegisterController::class, 'index'])->name('register.igd.index');

    Route::get('/form', [IGD\RegisterController::class, 'formRegisterIGD'])->name('register.igd.create');
    Route::post('/form', [IGD\RegisterController::class, 'storeRegisterIGD'])->name('register.igd.store');
});

Route::prefix('rajal')->name('register.rajal.')->middleware(['auth', 'role:adminregister'])->group(function () {
    Route::get('/', [RegistrationRajalController::class, 'indexRajal'])->name('index');
    Route::post('/', [RegistrationRajalController::class, 'storeRajal'])->name('store');
});


Route::get("/pdf", function () {
    return view('pdf');
});
