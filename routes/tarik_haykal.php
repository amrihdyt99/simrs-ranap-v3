<?php

use App\Http\Controllers\NewDokter\AssesmentAwalDokterController;
use App\Http\Controllers\TarikDataController;
use App\Http\Controllers\TarikDataRajalController;
use Illuminate\Support\Facades\Route;

Route::prefix('tarik')->group(function () {
    Route::get('unit_room', [TarikDataController::class, 'unit_ruang']);
    Route::get('unit_item', [TarikDataController::class, 'unit_item']);
    Route::get('class-category', [TarikDataController::class, 'classCategory']);
    Route::get('kelas', [TarikDataController::class, 'kelas']);
    Route::get('room', [TarikDataController::class, 'room']);
    Route::get('unit', [TarikDataController::class, 'unit']);
    Route::get('bed', [TarikDataController::class, 'bed']);
    Route::get('regis', [TarikDataController::class, 'regis']);
    Route::get('paramedic', [TarikDataController::class, 'paramedic']);
    Route::get('site-departemen', [TarikDataController::class, 'site_departement']);
    Route::get('departement-service-unit', [TarikDataController::class, 'departement_service_unit']);
    Route::get('departement', [TarikDataController::class, 'departement']);
    Route::get('location', [TarikDataController::class, 'location']);
    Route::get('bisnis', [TarikDataController::class, 'bisnis_partner']);
    Route::get('nomed/{no}', [TarikDataController::class, 'nomed']);
    Route::get('user_rajal', [TarikDataController::class, 'user_rajal']);
});


Route::prefix('tarik-rajal')->group(function () {
    Route::get('daftar-masalah', [TarikDataRajalController::class, 'daftar_masalah']);
    Route::get('draft', [TarikDataRajalController::class, 'draft']);
    Route::get('dtd', [TarikDataRajalController::class, 'dtd']);
    Route::get('education', [TarikDataRajalController::class, 'education']);
    Route::get('item-group', [TarikDataRajalController::class, 'm_item_group']);
    Route::get('item', [TarikDataRajalController::class, 'm_item']);
    Route::get('item-tarif', [TarikDataRajalController::class, 'm_item_tarif']);
});



Route::get('kirim_rad/{no}', [AssesmentAwalDokterController::class, 'kirim_rad']);
