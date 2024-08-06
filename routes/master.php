<?php

use App\Http\Controllers\Master\PatientController;
use App\Http\Controllers\Master\BedController;
use App\Http\Controllers\Master\ClinicalPathwayController;
use App\Http\Controllers\Master\DiagnosisController;
use App\Http\Controllers\Master\RoomClassController;
use App\Http\Controllers\Master\MedicineController;
use App\Http\Controllers\Master\IndicationController;
use App\Http\Controllers\Master\InterventionController;
use App\Http\Controllers\Master\OutcomeController;
use App\Http\Controllers\Master\RuanganController;
use App\Http\Controllers\Master\ServiceUnitController;
use App\Http\Controllers\Master\UnitController;
use App\Http\Controllers\Master\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('master')->name('master.')->middleware(['auth', 'role:adminmaster,adminregister'])->group(function () {
    /*
    Route::get('/', function () {
        return redirect()->route('master.bed.index');
    });
    */
    Route::get('/', [\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class, 'nyaa_default_index'])->name('nyaa_default_index');

    Route::resource('patient', PatientController::class);
    Route::resource('bed', BedController::class);
    Route::resource('class', RoomClassController::class);
    Route::resource('medicine', MedicineController::class);
    Route::resource('indication', IndicationController::class);
    Route::resource('clinical_pathway', ClinicalPathwayController::class);
    Route::resource('clinical_pathway.diagnosis', DiagnosisController::class)->shallow();
    Route::resource('clinical_pathway.outcome', OutcomeController::class)->shallow();
    Route::resource('clinical_pathway.intervention', InterventionController::class)->shallow();
    Route::resource('ruangan', RuanganController::class);
    Route::resource('unit', UnitController::class);
    Route::resource('tarif',\App\Http\Controllers\Master\TarifController::class);
    Route::resource('user',\App\Http\Controllers\Master\UserController::class);
    Route::resource('ketersediaanruangan', \App\Http\Controllers\Master\KetersediaanRuanganController::class);
    Route::resource('serviceunit', \App\Http\Controllers\Master\ServiceUnitController::class);
    Route::resource('departement', \App\Http\Controllers\Master\DepartementController::class);
    Route::resource('location', \App\Http\Controllers\Master\LocationController::class);
    Route::resource('site', \App\Http\Controllers\Master\SiteController::class);
    Route::post('user/processor', [\App\Http\Controllers\master\UserController::class, 'processor'])->name('user.processor');
});
