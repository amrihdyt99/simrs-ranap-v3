<?php

use App\Http\Controllers\NewDokter\AssesmentAwalDokterController;
use App\Http\Controllers\TarikDataController;
use Illuminate\Support\Facades\Route;

Route::prefix('tarik')->group(function () {
    Route::get('unit_room', [TarikDataController::class, 'unit_ruang']);
    Route::get('unit_item', [TarikDataController::class, 'unit_item']);
    Route::get('kelas', [TarikDataController::class, 'kelas']);
    Route::get('room', [TarikDataController::class, 'room']);
    Route::get('unit', [TarikDataController::class, 'unit']);
    Route::get('bed', [TarikDataController::class, 'bed']);
    Route::get('regis', [TarikDataController::class, 'regis']);
    Route::get('paramedic', [TarikDataController::class, 'paramedic']);
    Route::get('departemen', [TarikDataController::class, 'site_departement']);
    Route::get('location', [TarikDataController::class, 'location']);
    Route::get('bisnis', [TarikDataController::class, 'bisnis_partner']);
    Route::get('nomed/{no}', [TarikDataController::class, 'nomed']);
    Route::get('user_rajal', [TarikDataController::class, 'user_rajal']);
});

Route::get('kirim_rad/{no}', [AssesmentAwalDokterController::class, 'kirim_rad']);
