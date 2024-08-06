<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/assessment/bayi')->group(function() {
    Route::get('/dashboard', function () {
        return view('assessment.pages.assessment-bayi-lahir.dashboard');
    })->name('assessment.bayi.dashboard');
    Route::get('/identitas/bayi', function () {
        return view('assessment.pages.assessment-bayi-lahir.identitas-bayi');
    })->name('assessment.bayi.identitas');
});

Route::prefix('assessment/anak')->group(function(){
    Route::get('/form1',function(){
        return view('assessment/pages/anak/form1');
    })->name("assessment.anak.form1");
    Route::get('/form2',function(){
        return view('assessment/pages/anak/form2');
    })->name("assessment.anak.form2");
});

Route::prefix('assessment/awal')->group(function(){
    Route::get('/form',[\App\Http\Controllers\Perawat\AsessmentAwalControl::class,'index'])
        ->name('assessment.awal.form');
});
