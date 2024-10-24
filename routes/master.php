﻿<?php

use App\Http\Controllers\ApiMasterController;
use App\Http\Controllers\Master\AksesRuanganController;
use App\Http\Controllers\Master\PatientController;
use App\Http\Controllers\Master\BedController;
use App\Http\Controllers\Master\ClinicalPathwayController;
use App\Http\Controllers\Master\DiagnosisController;
use App\Http\Controllers\Master\EducationController;
use App\Http\Controllers\Master\RoomClassController;
use App\Http\Controllers\Master\MedicineController;
use App\Http\Controllers\Master\IndicationController;
use App\Http\Controllers\Master\InterventionController;
use App\Http\Controllers\Master\ItemGroupController;
use App\Http\Controllers\Master\LogActivityController;
use App\Http\Controllers\Master\OrganizationController;
use App\Http\Controllers\Master\OutcomeController;
use App\Http\Controllers\Master\RuanganController;
use App\Http\Controllers\Master\ServiceUnitController;
use App\Http\Controllers\Master\UnitController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Master\PractitionerController;
use App\Http\Controllers\Master\v2\ClassCategoryController;
use App\Http\Controllers\Master\v2\DaftarMasalahController;
use App\Http\Controllers\Master\v2\DepartmentServiceUnitController;
use App\Http\Controllers\Master\v2\DepartmentV2Controller;
use App\Http\Controllers\Master\v2\DraftController;
use App\Http\Controllers\Master\v2\DTDController;
use App\Http\Controllers\Master\v2\ItemController;
use App\Http\Controllers\Master\v2\ItemTarifController;
use App\Http\Controllers\Master\v2\NewServiceUnitController;
use App\Http\Controllers\Master\v2\SiteDepartmentController;
use Illuminate\Support\Facades\Route;

Route::prefix('master')->name('master.')->middleware(['auth', 'role:adminmaster,adminregister,dokter,perawat,farmasi'])->group(function () {
    /*
    Route::get('/', function () {
        return redirect()->route('master.bed.index');
    });
    */
    Route::get('/', [\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class, 'nyaa_default_index'])->name('nyaa_default_index');

    Route::resource('patient', PatientController::class);
    Route::resource('bed', BedController::class);
    Route::patch('bed/change-status-active/{id}', [BedController::class, 'changeStatusActive'])->name('bed.changeStatusActive');
    Route::resource('class-category', ClassCategoryController::class);
    Route::resource('class', RoomClassController::class);
    Route::resource('medicine', MedicineController::class);
    Route::resource('indication', IndicationController::class);
    Route::resource('clinical_pathway', ClinicalPathwayController::class);
    Route::resource('clinical_pathway.diagnosis', DiagnosisController::class)->shallow();
    Route::resource('clinical_pathway.outcome', OutcomeController::class)->shallow();
    Route::resource('clinical_pathway.intervention', InterventionController::class)->shallow();
    Route::resource('ruangan', RuanganController::class);
    Route::patch('ruangan/change-status-active/{id}', [RuanganController::class, 'changeStatusActive'])->name('ruangan.changeStatusActive');
    Route::resource('unit', UnitController::class);
    Route::resource('tarif', \App\Http\Controllers\Master\TarifController::class);
    Route::resource('user', \App\Http\Controllers\Master\UserController::class);
    Route::resource('ketersediaanruangan', \App\Http\Controllers\Master\KetersediaanRuanganController::class);
    // Route::resource('serviceunit', \App\Http\Controllers\Master\ServiceUnitController::class);
    Route::resource('serviceunit', NewServiceUnitController::class);
    Route::resource('site-departement', SiteDepartmentController::class);
    Route::resource('departement-service-unit', DepartmentServiceUnitController::class);
    Route::resource('departement', DepartmentV2Controller::class);
    Route::resource('location', \App\Http\Controllers\Master\LocationController::class);
    Route::resource('site', \App\Http\Controllers\Master\SiteController::class);
    Route::post('user/processor', [\App\Http\Controllers\master\UserController::class, 'processor'])->name('user.processor');
    Route::resource('practitioner', PractitionerController::class);
    Route::patch('practitioner/change-status-active/{id}', [PractitionerController::class, 'changeStatusActive'])->name('practitioner.changeStatusActive');
    Route::resource('organization', OrganizationController::class);
    Route::patch('organization/change-status-active/{id}', [OrganizationController::class, 'changeStatusActive'])->name('organization.changeStatusActive');
    Route::resource('daftar-masalah', DaftarMasalahController::class);
    Route::resource('draft', DraftController::class);
    Route::resource('dtd', DTDController::class);
    Route::resource('education', EducationController::class);
    Route::resource('item-group', ItemGroupController::class);
    Route::resource('item', ItemController::class);
    Route::resource('item-tarif', ItemTarifController::class);

    Route::prefix('aksesRuangan')->group(function () {
        Route::get('/', [AksesRuanganController::class, 'index']);
        Route::get('/data', [AksesRuanganController::class, 'data']);
        Route::post('/store', [AksesRuanganController::class, 'store']);
        Route::post('/delete', [AksesRuanganController::class, 'delete']);
    });

    Route::prefix('base')->group(function () {
        Route::get('/paramedic', [ApiMasterController::class, 'paramedic']);
    });
});