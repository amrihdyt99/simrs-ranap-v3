<?php


use App\Http\Controllers\Lab\DashboardController;
use App\Http\Controllers\Lab\DetailPasienLabController;
use App\Http\Controllers\NewPerawat\NewNursingController;
use Illuminate\Support\Facades\Route;


// Route::middleware(['auth', 'role:nutritionist,dietitian,dokter_gizi'])->group(function () {
Route::middleware(['auth', 'role:perawat,dokter,nutritionist,dietitian,dokter_gizi,farmasi,radiologi,lab', 'shift'])->group(function () {

    Route::get('/lab/dashboard', [DashboardController::class,'index'])->name('lab.dashboard');
    Route::get('/lab/detail_pasien', [DetailPasienLabController::class, 'index'])->name('lab.detail_pasien_list');
    Route::get('/lab/detail_pasien/{MedicalNo}', [DetailPasienLabController::class, 'show'])->where('MedicalNo','(.*)')->name('lab.patient_detail');
    Route::get('/lab/detail_pasien_register/{reg_no}', [DetailPasienLabController::class,"show2"])->where('reg_no','(.*)')->name('lab.patient_detail_registrasi');
    Route::post('/save-shift', [DashboardController::class, 'saveShift'])->name('save.shift');
    
    Route::prefix('lab/patient')->group(function () {

    
        // summary V2
    Route::get('/summary-v2/{reg_no}', [\App\Http\Controllers\Perawat\SummaryV2Controller::class, 'summary'])->where('reg_no','(.*)')->name('lab.patient.summary-v2');


    });

});
