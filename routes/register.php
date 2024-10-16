<?php

use App\Http\Controllers\Master\PatientController;
use App\Http\Controllers\Ranap as Ranap;
use App\Http\Controllers\IGD as IGD;
use App\Http\Controllers\IGD\RegisterController;
use App\Http\Controllers\Rajal\RegistrationRajalController;
use App\Http\Controllers\InformasiPasien\RegisterDataController;
use App\Http\Controllers\Master\PasienController;
use App\Http\Controllers\RegistrationCancelationController;
use Illuminate\Support\Facades\Route;

Route::prefix('ranap')->middleware(['auth', 'role:adminregister'])->group(function () {
    Route::get('/', [Ranap\RegisterController::class, 'index'])->name('register.ranap.index');
    Route::get('/barcode/{reg_no}', [Ranap\RegisterController::class, 'barcode'])->where('reg_no', '(.*)')->name('register.ranap.barcode');
    Route::get('batal/{no}', [Ranap\RegisterController::class, 'batal_ranap'])->name('register.ranap.batal');
    Route::get('/rawat-intensif/{reg_no}', [Ranap\RegisterController::class, 'rawatIntensif'])->where('reg_no', '(.*)')->name('register.ranap.rawat-intensif');
    Route::get('/api/generate-newborn-mrn', [RegisterController::class, 'generateNewbornMRN']);
    Route::get('persetujuan-medis/{reg_no}', [Ranap\RegisterController::class, 'persetujuanMedis'])->where('reg_no', '(.*)')->name('register.ranap.persetujuan-medis');
    Route::post('/ranap/persetujuan-medis', [Ranap\RegisterController::class, 'storeSuratPersetujuanMedis'])->name('register.ranap.persetujuan-medis.store');    
    Route::post('/ranap/rawat-intensif', [Ranap\RegisterController::class, 'storeSuratRawatIntensif'])->name('register.ranap.rawat-intensif.store');
    Route::get('/persetujuan-medis/{reg_no}', [Ranap\AgreementController::class, 'persetujuanMedis'])->where('reg_no', '(.*)')->name('register.ranap.persetujuan-medis');
    // Route::get('/formnew', [Ranap\RegisterController::class, 'formRegisterInap'])->name('register.ranap.newpatient');
    Route::get('/form', [Ranap\RegisterController::class, 'formRegisterInap'])->name('register.ranap.create');
    Route::post('/form', [Ranap\RegisterController::class, 'storeRegisterInap'])->name('register.ranap.store');
    Route::get('/cetak/{reg_no}', [Ranap\RegisterController::class, 'cetakRegistrasi'])->where('reg_no', '(.*)')->name('register.ranap.cetak');
    Route::resource('patient', PatientController::class);
    Route::get('slipadmisi/{reg_no}', [Ranap\RegisterController::class, 'cetakSlipAdmisi'])->where('reg_no', '(.*)')->name('register.ranap.slipadmisi');
    Route::get('gc2/{reg_no}', [Ranap\RegisterController::class, 'gc2'])->where('reg_no', '(.*)')->name('register.ranap.gc2');
    Route::get('gc1/{reg_no}', [Ranap\RegisterController::class, 'gc1'])->where('reg_no', '(.*)')->name('register.ranap.gc1');
    Route::post('/uploadTtdAdmisi', [Ranap\RegisterController::class, 'uploadTtdAdmisi'])->name('register.ranap.uploadTtdAdmisi');
    Route::post('/uploadGcdua', [Ranap\RegisterController::class, 'uploadGc2'])->name('register.ranap.uploadGcdua');

    Route::get('lengkapi-pendaftaran/{reg_no}', [Ranap\RegisterController::class, 'lengkapiPendaftaran'])->where('reg_no', '(.*)')->name('register.ranap.lengkapi-pendaftaran');
    Route::post('lengkapi-pendaftaran', [Ranap\RegisterController::class, 'storeLengkapiPendaftaran'])->where('reg_no', '(.*)')->name('register.ranap.lengkapi-pendaftaran.store');
    Route::get('vclaim-manual', [Ranap\RegisterController::class, 'viewVClaimManual'])->name('register.vclaim');
    Route::get('vclaim-manual/create', [Ranap\RegisterController::class, 'viewFormVClaimManual'])->name('register.vclaim.form');
    Route::post('vclaim-manual', [Ranap\RegisterController::class, 'storeVClaim'])->name('register.vclaim.store');
    Route::get('vclaim-manual/edit/{reg_no}', [Ranap\RegisterController::class, 'viewFormEditVClaimManual'])->where('reg_no', '(.*)')->name('register.vclaim.edit');
    Route::post('vclaim-manual/update/{id}', [Ranap\RegisterController::class, 'updateVclaim'])->name('register.vclaim.update');
    Route::post('vclaim-manual/delete/{id}', [Ranap\RegisterController::class, 'deleteVclaim'])->name('register.vclaim.delete');
    Route::get('ringkasan-masuk-keluar/{reg_no}', [Ranap\RegisterController::class, 'ringkasanMasukKeluarPasien'])->where('reg_no', '(.*)')->name('register.ranap.ringkasan-masuk-keluar');
});

Route::prefix('igd')->middleware(['auth', 'role:adminregister'])->group(function () {
    Route::get('/', [IGD\RegisterController::class, 'index'])->name('register.igd.index');
    Route::post('/', [IGD\RegisterController::class, 'storeRegistration'])->name('register.igd.store-registration');

    Route::get('/form', [IGD\RegisterController::class, 'formRegisterIGD'])->name('register.igd.create');
    Route::post('/form', [IGD\RegisterController::class, 'storeRegisterIGD'])->name('register.igd.store');
});

Route::prefix('rajal')->name('register.rajal.')->middleware(['auth', 'role:adminregister'])->group(function () {
    Route::get('/', [RegistrationRajalController::class, 'indexRajal'])->name('index');
    Route::post('/', [RegistrationRajalController::class, 'storeRajal'])->name('store');
});
Route::post('/save_signature', [RegistrationRajalController::class, 'saveSignature'])->name('save_signature');

Route::get("/pdf", function () {
    return view('pdf');
});

Route::get('/register/informasi-pasien/create', [RegisterDataController::class, 'create'])->name('register.informasi-pasien.create'); //create
Route::delete('/register/pages/informasi-pasien/{id}', [RegisterDataController::class, 'destroy'])->name('register.informasi-pasien.destroy'); //hapos
Route::post('/register/informasi-pasien', [RegisterDataController::class, 'store'])->name('register.informasi-pasien.store');

Route::get('/register/pages/informasi-pasien/{MedicalNo}/edit', [RegisterDataController::class, 'edit'])->name('register.informasi-pasien.edit');
Route::put('/register/pages/informasi-pasien/{MedicalNo}', [RegisterDataController::class, 'update'])->name('register.informasi-pasien.update'); //edit
Route::resource('informasi-pasien', RegisterDataController::class); // Route untuk menampilkan data pasien
Route::get('register/informasi-pasien', [RegisterDataController::class, 'index'])->name('register.informasi-pasien.index');
Route::get('register/informasi-pasien/riwayat-kunjungan/{medrec}', [PasienController::class, 'visitHistoryPatient'])->name('register.informasi-pasien.riwayat-kunjungan');
Route::get('register/informasi-pasien/getData', [RegisterDataController::class, 'getData'])->name('register.informasi-pasien.getData');
Route::get('register/informasi-pasien/generateMRN', [RegisterDataController::class, 'generateMRN'])->name('register.informasi-pasien.generateMRN');
Route::get('register/informasi-pasien/checkMRN', [RegisterDataController::class, 'checkMRN'])->name('register.informasi-pasien.checkMRN');
//Route::get('/informasi-pasien/patientnew', 'register.pages.informasi-pasien.patientnew')->name('register.pages.informasi-pasien.patientnew');
//Route::get('/informasi-pasien', [InformasiPasien\RegisterDataController::class, 'index'])->name('register.informasi-pasien.index');
Route::get('register/informasi-pasien/{mrn}/barcode', [RegisterDataController::class, 'barcodePasien'])->name('register.informasi-pasien.barcode');
Route::get('/register/cancelation', [RegistrationCancelationController::class, 'index'])->name('cancelation.index');
Route::post('/register/cancelation/{reg_no}', [RegistrationCancelationController::class, 'cancelRegistration'])->where('reg_no', '(.*)')->name('cancel_registration');
Route::delete('/register/cancelation/{id}', [RegistrationCancelationController::class, 'cancelRegistrationCancelation'])->name('cancelation.delete');

Route::prefix('register')->name('register.')->group(function () {
    Route::prefix('slip-register')->name('slip-register.')->group(function () {
        Route::get('/rajal/{reg_no}', [RegistrationRajalController::class, 'slipRegister'])->where('reg_no', '(.*)')->name('rajal');
    });
});

Route::prefix('agreement')->name('agreement.')->group(function () {
    Route::get('/admisi/{reg_no}', [Ranap\AgreementController::class, 'slipAdmisi'])->where('reg_no', '(.*)')->name('admisi');
    Route::get('/general-consent/{reg_no}', [Ranap\AgreementController::class, 'generalConsent'])->where('reg_no', '(.*)')->name('general-consent');
    Route::get('/rawat-intensif/{reg_no}', [Ranap\AgreementController::class, 'rawatIntensif'])->where('reg_no', '(.*)')->name('rawat-intensif');
    Route::get('/persetujuan-medis/{reg_no}', [Ranap\AgreementController::class, 'persetujuanMedis'])->where('reg_no', '(.*)')->name('persetujuan-medis');
});