<?php

use App\Http\Controllers\CaseManager\PatientController;
use App\Http\Controllers\NewCaseManager\DashboardController;
use App\Http\Controllers\NewCaseManager\DetailPasienCaseManagerController;
use Illuminate\Support\Facades\Route;

// Route::get('/casemanager/dashboard', [\App\Http\Controllers\CaseManager\PatientController::class, 'index'])->name('casemanager.dashboard');
Route::middleware(['auth', 'role:perawat,dokter,nutritionist,dietitian,dokter_gizi,farmasi,case_manager', 'shift'])->group(function () {
    Route::get('/casemanager/dashboard', [DashboardController::class, 'index'])->name('casemanager.dashboard');
    Route::get('/casemanager/detail_pasien', [DetailPasienCaseManagerController::class, 'index'])->name('casemanager.detail_pasien_list');
    Route::get('/casemanager/detail_pasien/{MedicalNo}', [DetailPasienCaseManagerController::class, 'show'])->where('MedicalNo', '(.*)')->name('casemanager.patient_detail');
    Route::get('/casemanager/detail_pasien_register/{reg_no}', [DetailPasienCaseManagerController::class, 'show2'])->where('reg_no', '(.*)')->name('casemanager.patient_detail_registrasi');
    Route::post('/save-shift', [DashboardController::class, 'saveShift'])->name('save.shift');
    
    Route::prefix('casemanager/patient')->group(function () {
        // summary V2
        Route::get('/summary-v2/{reg_no}', [\App\Http\Controllers\Perawat\SummaryV2Controller::class, 'summary'])->where('reg_no', '(.*)')->name('casemanager.patient.summary-v2');
    });
});

Route::prefix('case-manager')->group(function () {

    Route::get('/paramedic/{paramedic}/patient-list',[PatientController::class,'patientList'])->name("casemanager.patientList");

    Route::get('/summary/{patient}', [\App\Http\Controllers\CaseManager\SummaryController::class, 'summary'])->where('patient', '(.*)')->name('casemanager.patient.summary');

    Route::get('/recapitulation-transaction/{patient}', [\App\Http\Controllers\CaseManager\RecapitulationController::class, 'recapitulation'])->where('patient', '(.*)')->name('casemanager.patient.recapitulation');

    Route::get('/diagnose/{patient}', [\App\Http\Controllers\CaseManager\DiagnoseController::class, 'diagnose'])->where('patient', '(.*)')->name('casemanager.patient.diagnose');
    Route::post('/diagnose', [\App\Http\Controllers\CaseManager\DiagnoseController::class, 'storeSOAP'])->name('casemanager.diagnose.store');

    Route::get('/discharge/info/{patient}', [\App\Http\Controllers\CaseManager\DischargeController::class, 'dischargeInfo'])->where('patient','(.*)')->name('casemanager.create.discharge.info');

    Route::get('/discharge/{patient}', [\App\Http\Controllers\CaseManager\DischargeController::class, 'discharge'])->where('patient', '(.*)')->name('casemanager.patient.discharge');

    Route::post('/discharge', [\App\Http\Controllers\CaseManager\DischargeController::class, 'storeDischargeInfo'])->name('casemanager.store.discharge.info');

    Route::get('/icd9cm/{patient}', [\App\Http\Controllers\CaseManager\DischargeController::class, 'createProcedure'])->where('patient', '(.*)')->name('casemanager.create.icd9cm');
    Route::post('/icd9cm', [\App\Http\Controllers\CaseManager\DischargeController::class, 'storeProcedure'])->name('casemanager.store.icd9cm');

    Route::post('/icd10', [\App\Http\Controllers\CaseManager\DischargeController::class, 'storeDiagnose'])->name('casemanager.store.icd10');
    Route::get('/icd10/{patient}', [\App\Http\Controllers\CaseManager\DischargeController::class, 'createDiagnose'])->where('patient', '(.*)')->name('casemanager.create.icd10');

    Route::get('/detail/{reg_no}', [\App\Http\Controllers\CaseManager\PatientController::class, 'show'])->where('reg_no','(.*)')->name('casemanager.patient.detail');

    Route::get('/formb/{patient}', [\App\Http\Controllers\CaseManager\FormBController::class, 'index'])->where('patient', '(.*)')->name('casemanager.patient.formB');

    Route::post("/forma/{reg_no}",[\App\Http\Controllers\CaseManager\DiagnoseController::class,"save_form_a"])->where('reg_no','(.*)')->name("casemanager.forma.store");
});

