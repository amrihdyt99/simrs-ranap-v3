<?php

use App\Http\Controllers\Master\KetersediaanRuanganController;
use App\Http\Controllers\Perawat\DashboardController;
use App\Http\Controllers\Perawat\DiagnoseController;
use App\Http\Controllers\Perawat\NursingController;
use App\Http\Controllers\Perawat\SummaryController;
use App\Http\Controllers\Perawat\DetailPasienPerawatController;
use App\Http\Controllers\Perawat\TransferInternalController;
use Illuminate\Support\Facades\Route;

Route::post('/perawat/patient/save_signature', [NursingController::class, 'saveSignature'])->name('saveSignature');
Route::post('/perawat/save-signature', [NursingController::class, 'saveSignature'])->name('perawat.saveSignature');
Route::middleware(['auth', 'role:perawat,dokter,nutritionist,dietitian,dokter_gizi', 'shift'])->group(function () {

    Route::get('/perawat/dashboard', [DashboardController::class, 'index'])->name('perawat.dashboard');
    Route::post('/save-shift', [DashboardController::class, 'saveShift'])->name('save.shift');
    // Route::get('/perawat/ketersediaanruangan', [KetersediaanRuanganController::class, 'index'])->name('perawat.ketersediaanruangan.index');
    Route::get('/perawat/detail_pasien', [DetailPasienPerawatController::class, 'index'])->name('perawat.detail_pasien_list');
    Route::get('/perawat/detail_pasien/{MedicalNo}', [DetailPasienPerawatController::class, 'show'])->where('MedicalNo', '(.*)')->name('perawat.patient_detail');
    Route::get('/perawat/detail_pasien_register/{reg_no}', [DetailPasienPerawatController::class, "show2"])->where('reg_no', '(.*)')->name('perawat.patient_detail_registrasi');
    Route::get('/perawat/get_qr_code_pasien/', [DetailPasienPerawatController::class, 'get_qrcode'])->name('perawat.get_patient_qrcode');
    Route::get('/perawat/detail_qrcode_pasien/', [DetailPasienPerawatController::class, 'detail_qrcode'])->name('perawat.patient_detail_qrcode');


    Route::prefix('/perawat/menu')->name('perawat.menu.')->group(function () {
        Route::resource('/ketersediaanruangan', \App\Http\Controllers\Master\KetersediaanRuanganPerawatController::class);
    });

    Route::prefix('perawat/patient')->group(function () {

        Route::get('/detail/{reg_no}', [SummaryController::class, "detail"])->where('reg_no', '(.*)')->name('perawat.patient.detail');

        Route::get('/detail/prev-episode/{reg_no}', [SummaryController::class, "prev-episode"])->where('reg_no', '(.*)')->name('perawat.patient.detail.prev.episode');

        Route::get('/summary/{reg_no}', [SummaryController::class, "summary"])->where('reg_no', '(.*)')->name('perawat.patient.summary');

        Route::get('/diagnose/{reg_no}/', [DiagnoseController::class, "diagnose"])->where('reg_no', '(.*)')->name('perawat.patient.diagnose');
        Route::post('/diagnose', [DiagnoseController::class, 'storeSOAP'])->name('perawat.diagnose.store');

        Route::get('/nursing/{reg_no}', [NursingController::class, "nursing"])->where('reg_no', '(.*)')->name('perawat.patient.nursing');

        Route::post('/fluid_balance', [NursingController::class, "add_fluid_balance"])->name("perawat.patient.add_fluid_balance");
        Route::post('/fluid_balance_data', [NursingController::class, "add_fluid_balance_data"])->name("perawat.patient.add_fluid_balance_data");

        Route::post('/nursing/vital', [NursingController::class, 'addVitalSign'])->name('perawat.patient.addvital');

        Route::get('/drugs/create/{patient}', [NursingController::class, 'create_drugs'])->where('patient', '(.*)')->name('perawat.drugs.create');
        Route::post('/drugs/create', [NursingController::class, 'store_drugs'])->name('perawat.drugs.store');
        Route::post('/careplandiagnose', [\App\Http\Controllers\Perawat\NurserCarePlanController::class, 'diagnosapenyakit'])->name('perawat.careplan.diagnose');
        Route::get('/drugs/edit/{id}', [NursingController::class, 'update_drugs'])->where('id', '(.*)')->name('perawat.drugs.edit');
        Route::post('/drugs/ubah', [NursingController::class, 'ubah_drugs'])->name('perawat.drugs.ubah');
        Route::get('/newnursing/{reg_no}', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'nursing'])->where('reg_no', '(.*)')->name('newperawat.patient.nursing');
        Route::post('/nursing-drugs/store', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'nursing_drugs_store'])->name('perawat.nursing_drugs_store');
        Route::post('/store_assesment_gizi', [NursingController::class, 'store_assesment_gizi'])->name('perawat.store_assesment_gizi_dewasa');
        Route::post('/data_assesment_gizi', [NursingController::class, 'data_assesment_gizi'])->name('perawat.get_data_assesment_gizi');

        Route::post('/store_assesment_dewasa', [NursingController::class, 'store_assesment_dewasa'])->name('perawat.store_assesment_dewasa');
        Route::post('/data_assesment_dewasa', [NursingController::class, 'data_assesment_dewasa'])->name('perawat.get_data_assesment_dewasa');

        Route::post('/data_pengkajian_dewasa', [NursingController::class, 'data_pengkajian_dewasa']);
        Route::post('/addchecklist', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'simpan_rm3'])->name('perawat.addchecklist');

        Route::post('/store_transfer_internal', [NursingController::class, 'store_transfer_internal'])->name('perawat.store_transfer_internal');
        Route::post('/data_transfer_internal', [NursingController::class, 'data_transfer_internal']);

        Route::post('/store_cathlab', [NursingController::class, 'store_cathlab'])->name('perawat.store_cathlab');
        Route::post('/data_cathlab', [NursingController::class, 'data_cathlab'])->name('perawat.get_cathlab');

        Route::post('/store_pra_tindakan', [NursingController::class, 'store_pra_tindakan']);
        Route::post('/data_pra_tindakan', [NursingController::class, 'data_pra_tindakan']);
        // Route::post('/save_signature', [NursingController::class, 'saveSignature'])->name('perawat.saveSignature');
        // Route::post('/save-signature', [NursingController::class, 'saveSignature'])->name('saveSignature');
        Route::post('/perawat/patient/save_signature', [NursingController::class, 'saveSignature']);
        // summary V2
        Route::get('/summary-v2/{reg_no}', [\App\Http\Controllers\Perawat\SummaryV2Controller::class, 'summary'])->where('reg_no', '(.*)')->name('perawat.patient.summary-v2');

        // new route 
        Route::get('/get-history-transfer-internal', [TransferInternalController::class, 'getRiwayatTransferInternal'])->name('perawat.get_history_tf_internal');
        Route::get('/get-history-serah-terima', [TransferInternalController::class, 'getTerimaTerimaPasienData'])->name('perawat.get_serah_terima_data');
    });

    /**
     * Route for new perawat ICU
     */
    Route::prefix('perawat/icu')->group(function () {
        Route::prefix('intruksi-harian')->group(function () {
            Route::post('/save-tanda-vital', [\App\Http\Controllers\ICU\IntruksiHarianController::class, 'saveTandaVital'])->name('perawat.icu.intruks-harian.save-tanda-vital');
            Route::post('/save-gkp', [\App\Http\Controllers\ICU\IntruksiHarianController::class, 'saveGkp'])->name('perawat.icu.intruks-harian.save-gkp');
            Route::get('/get-tanda-vital', [\App\Http\Controllers\ICU\IntruksiHarianController::class, 'getTandaVital'])->name('perawat.icu.intruks-harian.get-tanda-vital');
            Route::get('/get-gkp', [\App\Http\Controllers\ICU\IntruksiHarianController::class, 'getGkp'])->name('perawat.icu.intruks-harian.get-gkp');
        });
    });
});
