<?php

use App\Http\Controllers\Master\PatientController;
use App\Http\Controllers\Ranap as Ranap;
use App\Http\Controllers\IGD as IGD;
use App\Http\Controllers\IGD\RegisterController;
use App\Http\Controllers\Rajal\RegistrationRajalController;
use App\Http\Controllers\InformasiPasien\RegisterDataController;
use Illuminate\Support\Facades\Route;

Route::prefix('ranap')->middleware(['auth', 'role:adminregister'])->group(function () {
    Route::get('/', [Ranap\RegisterController::class, 'index'])->name('register.ranap.index');
    Route::get('batal/{no}', [Ranap\RegisterController::class, 'batal_ranap'])->name('register.ranap.batal');

    Route::get('/api/generate-newborn-mrn', [RegisterController::class, 'generateNewbornMRN']);

    // Route::get('/formnew', [Ranap\RegisterController::class, 'formRegisterInap'])->name('register.ranap.newpatient');
    Route::get('/form', [Ranap\RegisterController::class, 'formRegisterInap'])->name('register.ranap.create');
    Route::post('/form', [Ranap\RegisterController::class, 'storeRegisterInap'])->name('register.ranap.store');
    Route::get('/cetak/{reg_no}', [Ranap\RegisterController::class, 'cetakRegistrasi'])->where('reg_no', '(.*)')->name('register.ranap.cetak');
    Route::resource('patient', PatientController::class);
    Route::get('slipadmisi/{reg_no}', [Ranap\RegisterController::class, 'cetakSlipAdmisi'])->where('reg_no', '(.*)')->name('register.ranap.slipadmisi');
    Route::get('gc2/{reg_no}', [Ranap\RegisterController::class, 'gc2'])->where('reg_no', '(.*)')->name('register.ranap.gc2');
    Route::get('gc1/{reg_no}', [Ranap\RegisterController::class, 'gc1'])->where('reg_no', '(.*)')->name('register.ranap.gc1');
    Route::post('/uploadTtdAdmisi', [Ranap\RegisterController::class, 'uploadTtdAdmisi'])->name('register.ranap.uploadTtdAdmisi');
    Route::post('/uploadGcdua', [Ranap\RegisterController::class, 'uploadGc2'])->name('register.ranap.uploadGcdua');

    Route::get('lengkapi-pendaftaran/{reg_no}', [Ranap\RegisterController::class, 'lengkapiPendaftaran'])->where('reg_no', '(.*)')->name('register.ranap.lengkapi-pendaftaran');
    Route::post('lengkapi-pendaftaran', [Ranap\RegisterController::class, 'storeLengkapiPendaftaran'])->where('reg_no', '(.*)')->name('register.ranap.lengkapi-pendaftaran.store');
    Route::get('vclaim-manual', [Ranap\RegisterController::class, 'viewVClaimManual'])->name('register.vclaim');
    Route::get('vclaim-manual/create', [Ranap\RegisterController::class, 'viewFormVClaimManual'])->name('register.vclaim.form');
    Route::post('vclaim-manual', [Ranap\RegisterController::class, 'storeVClaim'])->name('register.vclaim.store');
    Route::get('vclaim-manual/edit/{reg_no}', [Ranap\RegisterController::class, 'viewFormEditVClaimManual'])->where('reg_no', '(.*)')->name('register.vclaim.edit');
    Route::post('vclaim-manual/update/{id}', [Ranap\RegisterController::class, 'updateVclaim'])->name('register.vclaim.update');
    Route::post('vclaim-manual/delete/{id}', [Ranap\RegisterController::class, 'deleteVclaim'])->name('register.vclaim.delete');
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

//informasi pasien
// Rute yang langsung menampilkan view 'index' dari direktori 'register/informasi-pasien'
//Route::view('/informasi-pasien', 'register.informasi-pasien.index')->name('register.informasi-pasien.index');
Route::view('/informasi-pasien', 'register.pages.informasi-pasien.index')->name('register.pages.informasi-pasien.index');
Route::view('/informasi-pasien/create', 'register.pages.informasi-pasien.create')->name('register.pages.informasi-pasien.create');
Route::post('/register/informasi-pasien', [RegisterDataController::class, 'store'])->name('register.informasi-pasien.store');
//Route::get('/informasi-pasien/patientnew', 'register.pages.informasi-pasien.patientnew')->name('register.pages.informasi-pasien.patientnew');
//Route::get('/informasi-pasien', [InformasiPasien\RegisterDataController::class, 'index'])->name('register.informasi-pasien.index');