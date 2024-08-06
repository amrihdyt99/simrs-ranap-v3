<?php

use App\Http\Controllers\Admin_nurse\BedController;
use App\Http\Controllers\Admin_nurse\BillingController;
use App\Http\Controllers\Admin_nurse\DashboardController;
use App\Http\Controllers\Admin_nurse\PhysicianController;
use App\Models\Pasien;
use Illuminate\Support\Facades\Route;

Route::prefix('adminnurse')->middleware(['auth', 'role:admin_nurse'])->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
// Route::resource('admin_nurse/billing', BillingController::class);
    Route::get('admin_nurse/billing/{MedicalNo}', [BillingController::class, 'show'])->where('MedicalNo','(.*)')->name('admin_nurse/billing');
// Route::get('admin_nurse/bed', [BedController::class, 'index'])->name('admin_nurse/bed');
    Route::get('admin_nurse/bed/{MedicalNo}', [BedController::class, 'show'])->where('MedicalNo','(.*)')->name('admin_nurse/bed');
    Route::resource('admin_nurse/physician', PhysicianController::class);
    Route::get('admin_nurse/dashboard', [DashboardController::class, 'index'])->name('admin_nurse/dashboard');

});


