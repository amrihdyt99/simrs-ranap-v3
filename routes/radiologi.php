<?php


use App\Http\Controllers\NewRadiologi\DashboardController;
use App\Http\Controllers\NewRadiologi\DetailPasienRadiologiController;
use App\Http\Controllers\NewPerawat\NewNursingController;
use Illuminate\Support\Facades\Route;


// Route::middleware(['auth', 'role:nutritionist,dietitian,dokter_gizi'])->group(function () {
Route::middleware(['auth', 'role:perawat,dokter,nutritionist,dietitian,dokter_gizi,farmasi,radiologi'])->group(function () {

    Route::match(['get', 'post'], '/radiologi/dashboard', [DashboardController::class,'index'])->name('radiologi.dashboard');
    Route::get('/radiologi/detail_pasien', [DetailPasienRadiologiController::class, 'index'])->name('radiologi.detail_pasien_list');
    Route::get('/radiologi/detail_pasien/{MedicalNo}', [DetailPasienRadiologiController::class, 'show'])->where('MedicalNo','(.*)')->name('radiologi.patient_detail');
    Route::get('/radiologi/detail_pasien_register/{reg_no}', [DetailPasienRadiologiController::class,"show2"])->where('reg_no','(.*)')->name('radiologi.patient_detail_registrasi');
    
    Route::prefix('radiologi/patient')->group(function () {

    
        // summary V2
    Route::get('/summary-v2/{reg_no}', [\App\Http\Controllers\Perawat\SummaryV2Controller::class, 'summary'])->where('reg_no','(.*)')->name('radiologi.patient.summary-v2');


    });

   // Route::get('/radiologi/get-radiology-result', [DashboardController::class, 'getRadiologiResult'])->name('radiologi.get_radiology_result');
    Route::get('/radiologi/hasil-radiologi', [DashboardController::class, 'getRadiologiResult'])->name('radiologi.hasil_radiologi');

    
});
