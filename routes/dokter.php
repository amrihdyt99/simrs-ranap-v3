<?php

use App\Http\Controllers\Dokter\PatientController;
use App\Http\Controllers\Dokter\SummaryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dokter\DetailPasienController;

Route::get('/dokter', [\App\Http\Controllers\Dokter\PatientController::class, 'index']);
Route::get('/dokter/dashboard', [\App\Http\Controllers\Dokter\PatientController::class, 'index'])->name('dokter.dashboard');
Route::get('/dokter/detail_pasien', [DetailPasienController::class, 'index'])->name('dokter.detail_pasien_list');
Route::get('/dokter/detail_pasien/{MedicalNo}', [DetailPasienController::class, 'show'])->where('MedicalNo', '(.*)')->name('dokter.patient_detail');
Route::get('/dokter/detail_pasien_register/{reg_no}', [DetailPasienController::class, "show2"])->where('reg_no', '(.*)')->name('dokter.patient_detail_registrasi');
Route::get('/dokter/data/{type}/{ruang}', [\App\Http\Controllers\Dokter\PatientController::class, 'data_table'])->name('dokter.patient_data');


Route::prefix('dokter')->group(function () {
    Route::prefix('takeOver')->group(function () {
        Route::post('/', [PatientController::class, 'takeOver']);
    });

    Route::get('/cpoe/imaging/{patient}', [\App\Http\Controllers\Dokter\TreatmentController::class, 'create_cpoe_imaging'])->where('patient', '(.*)')->name('create.cpoe.imaging');
    Route::post('/cpoe/imaing', [\App\Http\Controllers\Dokter\TreatmentController::class, 'storeCPOEImaging'])->name('store.cpoe.imaging');
    Route::delete('/cpoe/imaging/{id}', [\App\Http\Controllers\Dokter\TreatmentController::class, 'deleteCPOEImaging'])->name('delete.cpoe.imaging');


    Route::get('/cpoe/laboratory/{patient}', [\App\Http\Controllers\Dokter\TreatmentController::class, 'create_cpoe_laboratory'])->where('patient', '(.*)')->name('create.cpoe.laboratory');
    Route::post('/cpoe/laboratory', [\App\Http\Controllers\Dokter\TreatmentController::class, 'storeCPOELabor'])->name('store.cpoe.laboratory');
    Route::delete('/cpoe/laboratory/{id}', [\App\Http\Controllers\Dokter\TreatmentController::class, 'deleteCPOELabor'])->name('delete.cpoe.laboratory');

    Route::get('/discharge/info/{patient}', [\App\Http\Controllers\Dokter\DischargeController::class, 'dischargeInfo'])->where('patient', '(.*)')->name('dokter.create.discharge.info');
    Route::post('/discharge', [\App\Http\Controllers\Dokter\DischargeController::class, 'storeDischargeInfo'])->name('store.discharge.info');

    Route::get('/icd9cm/{patient}', [\App\Http\Controllers\Dokter\DischargeController::class, 'createProcedure'])->where('patient', '(.*)')->name('create.icd9cm');
    Route::post('/icd9cm', [\App\Http\Controllers\Dokter\DischargeController::class, 'storeProcedure'])->name('store.icd9cm');
    Route::put('/icd9cm/{id}', [\App\Http\Controllers\Dokter\DischargeController::class, 'deleteProcedure'])->name('delete.icd9cm');

    Route::post('/icd10', [\App\Http\Controllers\Dokter\DischargeController::class, 'storeDiagnose'])->name('store.icd10');
    Route::get('/icd10/{patient}', [\App\Http\Controllers\Dokter\DischargeController::class, 'createDiagnose'])->where('patient', '(.*)')->name('create.icd10');
    Route::put('/icd10/{id}', [\App\Http\Controllers\Dokter\DischargeController::class, 'deleteDiagnose'])->name('delete.icd10');

    Route::get('/diagnose/{patient}', [\App\Http\Controllers\Dokter\DiagnoseController::class, 'diagnose'])->where('patient', '(.*)')->name('dokter.patient.diagnose');
    Route::post('/diagnose', [\App\Http\Controllers\Dokter\DiagnoseController::class, 'storeSOAP'])->name('diagnose.store');

    Route::get('/refer-to-consult/create/{patient}', [\App\Http\Controllers\Dokter\TreatmentController::class, 'create_refer_to_consult'])->where('patient', '(.*)')->name('refer-to-consult.create');
    Route::post('/refer-to-consult/create', [\App\Http\Controllers\Dokter\TreatmentController::class, 'storeReferToConsult'])->name('refer-to-consult.store');

    Route::get('/e-prescription/create/{patient}', [\App\Http\Controllers\Dokter\TreatmentController::class, 'create_e_prescription'])->where('patient', '(.*)')->name('e-prescription.create');
    Route::post('/e-prescription/create', [\App\Http\Controllers\Dokter\TreatmentController::class, 'storePrescription'])->name('e-prescription.store');

    Route::get('/discharge/{patient}', [\App\Http\Controllers\Dokter\DischargeController::class, 'discharge'])->where('patient', '(.*)')->name('dokter.patient.discharge');

    Route::get('/treatment/{patient}', [\App\Http\Controllers\Dokter\TreatmentController::class, 'treatment'])->where('patient', '(.*)')->name('dokter.patient.treatment');

    Route::get('/detail/pc-compare/{patient}', [SummaryController::class, "detail_pc_compare"])->where('patient', '(.*)')->name('dokter.patient.detail.pc.compare');

    Route::get('/detail/prev-episode/{patient}', [SummaryController::class, "detail_prev_episode"])->where('patient', '(.*)')->name('dokter.patient.detail.prev.episode');

    Route::get('/summary/{patient}', [SummaryController::class, "summary"])->where('patient', '(.*)')->name('dokter.patient.summary');
    Route::get('/mysummary/{patient}', [SummaryController::class, "summaryteam"])->where('patient', '(.*)')->name('dokter.patient.summaryteam');
    Route::get('/detail/{reg_no}', [\App\Http\Controllers\Dokter\PatientController::class, 'show'])->where('reg_no', '(.*)')->name('dokter.patient.detail');

    Route::post('/obat-satuan/create', [\App\Http\Controllers\Dokter\DrugController::class, 'storeObatSatuan'])->name('dokter.obat.satuan.store');
    Route::post('/obat-racikan/create', [\App\Http\Controllers\Dokter\DrugController::class, 'storeObatRacikan'])->name('dokter.obat.racikan.store');

    Route::get('/obat-detail/{patient}/{id}', [\App\Http\Controllers\Dokter\DrugController::class, 'detailObat'])->where('patient', '(.*)')->name('dokter.obat.detail');

    Route::get('/available-physician/{id}', [\App\Http\Controllers\Dokter\TreatmentController::class, 'createAvailablePhysician'])->name('dokter.available.physician.create');
    Route::put('/available-physician/{id}', [\App\Http\Controllers\Dokter\TreatmentController::class, 'responseAvailablePhysician'])->name('dokter.available.physician.update');
    Route::get('/getHasillab', [\App\Http\Controllers\NewDokter\OrderObatController::class, 'getHasilLab'])->name('get.hasil.lab');
    Route::get('/getHasilRad', [\App\Http\Controllers\NewDokter\OrderObatController::class, 'getHasilRadiologi'])->name('get.hasil.radiologi');
});
