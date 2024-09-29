<?php

use App\Http\Controllers\Farmasi\DashboardController;
use App\Http\Controllers\Farmasi\DetailPasienFarmasiController;
use Illuminate\Support\Facades\Route;


// Route::middleware(['auth', 'role:nutritionist,dietitian,dokter_gizi'])->group(function () {
Route::middleware(['auth', 'role:perawat,dokter,nutritionist,dietitian,dokter_gizi,farmasi', 'shift'])->group(function () {

    Route::get('/farmasi/dashboard', [DashboardController::class, 'index'])->name('farmasi.dashboard');
    Route::get('/farmasi/detail_pasien', [DetailPasienFarmasiController::class, 'index'])->name('farmasi.detail_pasien_list');
    Route::get('/farmasi/detail_pasien/{MedicalNo}', [DetailPasienFarmasiController::class, 'show'])->where('MedicalNo','(.*)')->name('farmasi.patient_detail');
    Route::get('/farmasi/detail_pasien_register/{reg_no}', [DetailPasienFarmasiController::class, 'show2'])->where('reg_no','(.*)')->name('farmasi.patient_detail_registrasi');
    Route::post('/save-shift', [DashboardController::class, 'saveShift'])->name('save.shift');
    Route::prefix('farmasi/patient')->group(function () {

    
        // summary V2
    Route::get('/summary-v2/{reg_no}', [\App\Http\Controllers\Perawat\SummaryV2Controller::class, 'summary'])->where('reg_no','(.*)')->name('farmasi.patient.summary-v2');


    });

});
