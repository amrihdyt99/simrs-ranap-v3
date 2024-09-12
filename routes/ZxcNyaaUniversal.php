<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\ZxcNyaaUniversal\NyaaSelectTwoHandlerController;
use App\Http\Controllers\Profil\ProfilController;

Route::middleware(['auth'])->get('/dd-user_now', [\App\Http\Controllers\ZxcNyaaUniversal\AaaBaseController::class, 'dd_user_now'])->name('dd_user_now');
Route::middleware(['auth'])->get('/viewtest-user_now', [\App\Http\Controllers\ZxcNyaaUniversal\AaaBaseController::class, 'viewtest_user_now'])->name('viewtest_user_now');

Route::prefix('nyx-sistem')
    ->middleware(['auth'])
    ->name('nyaa_universal.')
    ->group(function () {

        Route::prefix('select2')->name('select2.')->group(function () {
            Route::get('/businesspartner', [NyaaSelectTwoHandlerController::class, 'businesspartner'])->name('businesspartner');
            Route::get('/corporate', [NyaaSelectTwoHandlerController::class, 'corporate'])->name('corporate');
            Route::get('/m-paramedic', [NyaaSelectTwoHandlerController::class, 'm_paramedic'])->name('m_paramedic');
            Route::get('/m-ruangan-baru', [NyaaSelectTwoHandlerController::class, 'm_ruangan_baru'])->name('m_ruangan_baru');
            Route::get('/m-ruangan-baru-all', [NyaaSelectTwoHandlerController::class, 'm_ruangan_baru_all'])->name('m_ruangan_baru_all');
            Route::get('/data-tindakan-baru', [NyaaSelectTwoHandlerController::class, 'data_tindakan_baru'])->name('data_tindakan_baru');
        });

        Route::prefix('data-master')->middleware(['role:adminmaster'])->name('data_master.')->group(function () {
            Route::prefix('businesspartner')->name('businesspartner.')->group(function () {
                Route::get('/', [\App\Http\Controllers\ZxcNyaaUniversal\DataInduk\MnjDtIdkXxBusinesspartnerController::class, 'index'])->name('get_handler');
                Route::post('/', [\App\Http\Controllers\ZxcNyaaUniversal\DataInduk\MnjDtIdkXxBusinesspartnerController::class, 'post_handler'])->name('post_handler');
            });
            Route::prefix('businesspartner-address')->name('businesspartner_address.')->group(function () {
                Route::get('/{businesspartner_id}', [\App\Http\Controllers\ZxcNyaaUniversal\DataInduk\MnjDtIdkXxBusinesspartnerAddressController::class, 'index'])->name('get_handler');
                Route::post('/{businesspartner_id}', [\App\Http\Controllers\ZxcNyaaUniversal\DataInduk\MnjDtIdkXxBusinesspartnerAddressController::class, 'post_handler'])->name('post_handler');
            });
            Route::prefix('corporate')->name('corporate.')->group(function () {
                Route::get('/', [\App\Http\Controllers\ZxcNyaaUniversal\DataInduk\MnjDtIdkXxCorporateController::class, 'index'])->name('get_handler');
                Route::post('/', [\App\Http\Controllers\ZxcNyaaUniversal\DataInduk\MnjDtIdkXxCorporateController::class, 'post_handler'])->name('post_handler');
            });
            Route::prefix('customercontract')->name('customercontract.')->group(function () {
                Route::get('/', [\App\Http\Controllers\ZxcNyaaUniversal\DataInduk\MnjDtIdkXxCustomercontractController::class, 'index'])->name('get_handler');
                Route::post('/', [\App\Http\Controllers\ZxcNyaaUniversal\DataInduk\MnjDtIdkXxCustomercontractController::class, 'post_handler'])->name('post_handler');
            });
        });

        Route::prefix('view-injector')->name('view_injector.')->group(function () {
            Route::prefix('perawat')->name('perawat.')->middleware(['auth', 'shift'])->group(function () {
                Route::post('checklistpasien', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'checklist'])->name('checklist_pasien');
                Route::post('assesment_perawat', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'assesment_perawat'])->name('assesment_perawat');
                Route::post('assesment_entry_skrinning_nyeri', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'assesment_entry_skrinning_nyeri'])->name('assesment_entry_skrinning_nyeri');
                Route::post('assesment_entry_edukasi_pasien', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'assesment_entry_edukasi_pasien'])->name('assesment_entry_edukasi_pasien');
                Route::post('assesment_resiko_jatuh_geriatri', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'assesment_resiko_jatuh_geriatri'])->name('assesment_resiko_jatuh_geriatri');
                Route::post('assesment_cppt_soap_perawat', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'assesment_cppt_soap_perawat'])->name('assesment_cppt_soap_perawat');
                Route::post('assesment_awal_dewasa', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'assesment_awal_dewasa'])->name('assesment_awal_dewasa');
                Route::post('assesment_awal_anak', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'assesment_awal_anak'])->name('assesment_awal_anak');
                Route::post('assesment_awal_neonatus', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'assesment_awal_neonatus'])->name('assesment_awal_neonatus');
                Route::post('assesment_gizi_dewasa', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'assesment_gizi_dewasa'])->name('assesment_gizi_dewasa');
                Route::post('assesment_nurrse_note', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'assesment_nurrse_note'])->name('assesment_nurrse_note');
                Route::post('nurse_transfer_internal', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'nurse_transfer_internal'])->name('nurse_transfer_internal');
                Route::post('nurse_admin_nurse', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'nurse_admin_nurse'])->name('nurse_admin_nurse');
                Route::post('nurse_transfusi_darah', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'nurse_transfusi_darah'])->name('nurse_transfusi_darah');
                Route::post('nurse_obgyn', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'nurse_obgyn'])->name('nurse_obgyn');
                Route::post('nyaa_dokumen_kelengkapan_pasien', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'nyaa_dokumen_kelengkapan_pasien'])->name('nyaa_dokumen_kelengkapan_pasien');
                Route::post('nyaa_dokumen_tindakan', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'nyaa_dokumen_tindakan'])->name('nyaa_dokumen_tindakan');
                Route::post('nursing_full', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'nursing_full'])->name('nursing_full');
                Route::post('nurse_intra_tindakan_kateterisasi', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'nurse_intra_tindakan_kateterisasi'])->name('nurse_intra_tindakan_kateterisasi');
                Route::post('nurse_pemantauan_hemodinamik_intra', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'nurse_pemantauan_hemodinamik_intra'])->name('nurse_pemantauan_hemodinamik_intra');
                Route::post('nurse_physician_team', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'nurse_physician_team'])->name('nurse_physician_team');
                Route::post('nurse_obgyn_bedah', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'nurse_obgyn_bedah'])->name('nurse_obgyn_bedah');
                Route::post('nurse_pra_tindakan', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'nurse_pra_tindakan'])->name('nurse_pra_tindakan');
                Route::post('riwayat', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'riwayat'])->name('riwayat');
                Route::post('cathlab', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'cathlab'])->name('cathlab');
                Route::post('cathlab_v2', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'cathlab_v2'])->name('cathlab_v2');
                Route::post('paska_tindakan', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'paska_tindakan'])->name('paska_tindakan');
                Route::post('observasi_paska_tindakan', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'observasi_paska_tindakan'])->name('observasi_paska_tindakan');
                Route::post('assesment_bayi', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'assesment_bayi'])->name('assesment_bayi');
                Route::post('pemulangan_pasien', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'pemulangan_pasien'])->name('pemulangan_pasien');
                Route::post('intruksi_harian', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'intruksi_harian'])->name('intruksi_harian');
                Route::post('MonitoringNews', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'monitoring_news'])->name('monitoring_news');
                Route::post('checklist_kepulangan', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'checklist_kepulangan'])->name('checklist_kepulangan');
                Route::post('persetujuan_penolakan', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'persetujuan_penolakan'])->name('persetujuan_penolakan');
                Route::post('surat_rujukan', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'surat_rujukan'])->name('surat_rujukan');
                Route::post('show_qrcode', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'show_qrcode'])->name('show_qrcode');
            });
        });

        Route::prefix('view-injector-support')->name('view_injector_support.')->group(function () {
            Route::prefix('perawat')->name('perawat.')->group(function () {
                Route::post('hapus_joborderdt', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorSupportController::class, 'hapus_joborderdt'])->name('hapus_joborderdt');
                Route::post('hapus_monitoringtransfusidarah', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorSupportController::class, 'hapus_monitoringtransfusidarah'])->name('hapus_monitoringtransfusidarah');
                Route::post('hapus_mphysicianteam', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorSupportController::class, 'hapus_mphysicianteam'])->name('hapus_mphysicianteam');

                Route::any('nyaa_dokumen_kelengkapan_pasien', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorSupportController::class, 'nyaa_dokumen_kelengkapan_pasien'])->name('nyaa_dokumen_kelengkapan_pasien');
                Route::any('nyaa_dokumen_tindakan', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorSupportController::class, 'nyaa_dokumen_tindakan'])->name('nyaa_dokumen_tindakan');

                Route::any('nyaa_transfer_internal/{x}', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorSupportController::class, 'nyaa_transfer_internal'])->name('nyaa_transfer_internal');
                Route::any('nyaa_surat_rujukan/{x}', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorSupportController::class, 'nyaa_surat_rujukan'])->name('nyaa_surat_rujukan');
            });
        });
    });

Route::prefix('/profil-saya')->middleware(['auth'])->name('profil_saya.')->group(function () {
    Route::get('/', [ProfilController::class, 'index'])->name('index');
    Route::post('/update-password', [ProfilController::class, 'update_password'])->name('update_password');
});
