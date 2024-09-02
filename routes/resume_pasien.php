<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\NewDokter\ResumeController;

Route::get('resume', function () {
    return view('resume_pasien.index');
});
Route::get('/resume/dokumen', [ResumeController::class, 'showDokumenResume'])->name('resume.dokumen');
// Route::post('resume/save-signature/{reg_no}', [ResumeController::class, 'saveSignature'])->name('resume.saveSignature');
Route::post('resume/save-signature', [ResumeController::class, 'saveSignature'])->name('resume.saveSignature');

