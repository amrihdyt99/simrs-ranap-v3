<?php

use App\Http\Controllers\Kasir\Invoicing;
use App\Http\Controllers\Kasir\PaymentCashier;
use App\Http\Controllers\Kasir\RecalculationTransactionPlayer;
use App\Http\Controllers\Kasir\RecalculationTransactionClass;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kasir\RecapitulationTransaction;
use App\Http\Controllers\Kasir\StandarTarifSearch;
use App\Http\Controllers\Kasir\TransactionEntry;

/*Route::get('/kasir/recapitulation-transaction', [RecapitulationTransaction::class, 'index'])->name('kasir.recapitulation-transaction');
Route::get('/kasir/transaction-entry', [TransactionEntry::class, 'index'])->name('kasir.transaction-entry');
Route::get('/kasir/invoicing', [Invoicing::class, 'index'])->name('kasir.invoicing');
Route::get('/kasir/payment-cashier', [PaymentCashier::class, 'index'])->name('kasir.payment-cashier');
Route::get('/kasir/recalculation-transaction-player', [RecalculationTransactionPlayer::class, 'index'])->name('kasir.recalculation-transaction-player');
Route::get('/kasir/recalculation-transaction-class', [RecalculationTransactionClass::class, 'index'])->name('kasir.recalculation-transaction-class');
Route::get('/kasir/standard-tarif-search', [StandarTarifSearch::class, 'index'])->name('kasir.standard-tarif-search');
Route::get('/kasir/home',[\App\Http\Controllers\Kasir\HomeController::class,'index']);*/

Route::prefix('kasir')->middleware(['auth', 'role:kasir'])->group(function () {
    Route::get('/', [\App\Http\Controllers\Kasir\HomeController::class, 'index']);
    Route::get('/kasir/billing/{reg_no}', [\App\Http\Controllers\Kasir\BillingController::class, 'detailtagihan'])->where('reg_no', '(.*)')->name('kasir.tagihan');

    Route::get('/billing/detail_order', [\App\Http\Controllers\Kasir\BillingController::class, 'detailOrders'])->where('reg_no', '(.*)')->name('kasir.detail.order');
    Route::get('/billing/status', [\App\Http\Controllers\Kasir\BillingController::class, 'checkStatus']);
    Route::post('/billing/store_payment', [\App\Http\Controllers\Kasir\BillingController::class, 'storePayment'])->where('reg_no', '(.*)');
    Route::post('/billing/storeCancelation', [\App\Http\Controllers\Kasir\BillingController::class, 'storeCancelation']);
    Route::post('/billing/deleteItem', [\App\Http\Controllers\Kasir\BillingController::class, 'deleteItem']);

    Route::post('/kasir/billing/addtindakan', [\App\Http\Controllers\Kasir\BillingController::class, 'addTindakan'])->name('kasir.addtindakan');
    Route::get('/kasir/invoice/{regno}', [\App\Http\Controllers\Kasir\BillingController::class, 'cetakinvoice'])->where('regno', '(.*)')->name('kasir.cetak.invoice-old');
    Route::get('/cetak-kwitansi', [\App\Http\Controllers\Kasir\BillingController::class, 'cetakKwitansi'])->name('kasir.cetak.kwitansi');
    Route::get('/cetak-invoice', [\App\Http\Controllers\Kasir\BillingController::class, 'cetakInvoiceNew'])->name('kasir.cetak.invoice');
    Route::get('/cetak-summary', [\App\Http\Controllers\Kasir\BillingController::class, 'cetakInvoiceSummary'])->name('kasir.cetak.summary');
    Route::get('/get-bills', [\App\Http\Controllers\Kasir\BillingController::class, 'getListBilling'])->name('kasir.billing-list.get');
    Route::post('/cetak-review', [\App\Http\Controllers\Kasir\BillingController::class, 'cetakReview'])->name('kasir.cetak.review');
    Route::get('/cetak-all-invoice', [\App\Http\Controllers\Kasir\BillingController::class, 'cetakAllInvoice'])->name('kasir.cetak.all-invoice');

    Route::prefix('report')->group(function () {
        Route::get('/', [\App\Http\Controllers\Kasir\HomeController::class, 'indexReport']);
        Route::get('/print', [\App\Http\Controllers\Kasir\HomeController::class, 'indexReportPrint']);
        Route::get('/data', [\App\Http\Controllers\Kasir\BillingController::class, 'dataReport']);
    });
});
