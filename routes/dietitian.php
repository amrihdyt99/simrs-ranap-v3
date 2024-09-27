<?php


use App\Http\Controllers\Dietitian\DashboardController;
use App\Http\Controllers\Dietitian\DetailPasienDietitianController;
use App\Http\Controllers\NewPerawat\NewNursingController;
use Illuminate\Support\Facades\Route;


// Route::middleware(['auth', 'role:nutritionist,dietitian,dokter_gizi'])->group(function () {
Route::middleware(['auth', 'role:perawat,dokter,nutritionist,dietitian,dokter_gizi,farmasi', 'shift'])->group(function () {

    Route::get('/dietitian/dashboard', [DashboardController::class,'index'])->name('dietitian.dashboard');
    Route::get('/dietitian/detail_pasien', [DetailPasienDietitianController::class, 'index'])->name('dietitian.detail_pasien_list');
    Route::get('/dietitian/detail_pasien/{MedicalNo}', [DetailPasienDietitianController::class, 'show'])->where('MedicalNo','(.*)')->name('dietitian.patient_detail');
    Route::get('/dietitian/detail_pasien_register/{reg_no}', [DetailPasienDietitianController::class,"show2"])->where('reg_no','(.*)')->name('dietitian.patient_detail_registrasi');
    Route::post('/save-shift', [DashboardController::class, 'saveShift'])->name('save.shift');
    Route::prefix('dietitian/patient')->group(function () {

    
        // summary V2
    Route::get('/summary-v2/{reg_no}', [\App\Http\Controllers\Perawat\SummaryV2Controller::class, 'summary'])->where('reg_no','(.*)')->name('dietitian.patient.summary-v2');


    });

});
