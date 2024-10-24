<?php

use App\Http\Controllers\Ranap\RegisterController;
use App\Http\Controllers\ApiMasterController;
use App\Http\Controllers\ApiMasterRajalController;
use App\Http\Controllers\Master\BedController;
use App\Http\Controllers\Master\PasienController;
use App\Http\Controllers\NewDokter\ResumeController;
use App\Http\Controllers\Perawat\NeonatusController;
use App\Http\Controllers\Master\DepartementController;
use App\Http\Controllers\Master\LogActivityController;
use App\Http\Controllers\Master\v2\ItemController;
use App\Http\Controllers\NewDokter\EdukasiAnastesiController;
use App\Http\Controllers\NewPerawat\NewNursingController;
use App\Http\Controllers\Perawat\AssesmentAnakController;
use App\Http\Controllers\Perawat\AssesmentDewasaController;
use App\Http\Controllers\Perawat\CaseManagerController;
use App\Http\Controllers\Perawat\ObgynController;
use App\Http\Controllers\Perawat\RekonsiliasiObatController;
use App\Http\Controllers\Perawat\RiwayatController;
use App\Http\Controllers\Perawat\TransferInternalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
	return $request->user();
});

Route::get('get-pasien', [RegisterController::class, "getPasien"]);
Route::get('get-icd10', [RegisterController::class, "getICD10"]);
Route::get('get-pasien-keluarga', [RegisterController::class, "getPasienKeluarga"])->name('api.get-pasien-keluarga');
Route::get('get-registrasi-inap', [RegisterController::class, "getRegistrasiInap"]);
Route::post('gettindakan', [\App\Http\Controllers\Master\TarifController::class, 'data_tindakan'])->name('tarif.tindakan');
Route::post('storesoapapi', [\App\Http\Controllers\Dokter\DiagnoseController::class, 'storeSoapApi'])->name('soap.api.store');
Route::post('/newnursing/addvital', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addVitalSign'])->name('newperawat.addvitalsign');
Route::post('/newnursing/addvitalv2', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addNursingSpecialtyAll'])->name('newperawat.addNursingSpecialtyAll');
Route::post('gettindakanbaru', [\App\Http\Controllers\Master\TarifController::class, 'data_tindakan_baru'])->name('tarif.tindakanbaru');
Route::post('/asessment_dokter', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'add_assesment'])->name('assesment.dokter');
Route::get('/reset_asessment_dokter/{id}', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'reset_assesment'])->name('reset.assesment.dokter');
Route::get('/getAssesmentDokter', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'getAssesmentDokter'])->name('reset.assesment.dokter');
Route::post('/edukasi_dokter', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'add_edukasi'])->name('edukasi.dokter');
Route::get('/reset_edukasi_dokter/{id}', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'reset_edukasi'])->name('reset.edukasi.dokter');
Route::post('/newstorediagnosa', [\App\Http\Controllers\NewDokter\NewDiagnoseController::class, 'storeDiagnose'])->name('newstore.diagnosa');
Route::post('/newstoreprosedur', [\App\Http\Controllers\NewDokter\NewDiagnoseController::class, 'storeProcedure'])->name('newstore.prosedur');

Route::prefix('resume')->controller(ResumeController::class)->group(function () {
	Route::get('/data', 'data');
	Route::get('/baseData', 'baseData');
	Route::post('/store', 'store')->name('resume.store');
	Route::post('/storePerawatanSelanjutnya', 'storePerawatanSelanjutnya')->name('resume.storePerawatanSelanjutnya');
});

Route::post('/orderobatnew', [\App\Http\Controllers\NewDokter\OrderObatController::class, 'orderobat'])->name('dokter.order.obat');
Route::post('/storeFinalOrder', [\App\Http\Controllers\NewDokter\OrderObatController::class, 'storeFinalOrder'])->name('dokter.final.obat');
Route::get('/getorderobatnew', [\App\Http\Controllers\NewDokter\OrderObatController::class, 'getOrderObat'])->name('dokter.getobat');
Route::get('/getFinalOrderDetail', [\App\Http\Controllers\NewDokter\OrderObatController::class, 'getFinalOrderDetail']);
Route::post('/simpanorderobat', [\App\Http\Controllers\NewDokter\OrderObatController::class, 'simpanorder'])->name('simpan.order.obat');
Route::post('/deleteOrderobat', [\App\Http\Controllers\NewDokter\OrderObatController::class, 'deleteOrderObat'])->name('delete.order.obat');
Route::get('/getDataObat/{limit?}', [\App\Http\Controllers\NewDokter\OrderObatController::class, 'getDataObat'])->name('get.data.obat');

Route::post('/ordertindakan', [\App\Http\Controllers\NewDokter\OrderObatController::class, 'ordertindakan'])->name('order.tindakan');
Route::post('getOrderTindakan', [\App\Http\Controllers\NewDokter\OrderObatController::class, 'getOrderTindakanJenis'])->name('get.order.tindakan');
Route::get('hapus/tindakan/{id}', [\App\Http\Controllers\NewDokter\OrderObatController::class, 'del_order'])->name('del.order.tindakan');
Route::post('getPemeriksaanDokter', [\App\Http\Controllers\NewDokter\OrderObatController::class, 'getOrderTindakanDokter'])->name('get.pemeriksaan.dokter');

Route::get('getOtherInstructions', [\App\Http\Controllers\NewDokter\OrderObatController::class, 'getOtherInstructions']);
Route::post('sendOtherInstructions', [\App\Http\Controllers\NewDokter\OrderObatController::class, 'sendOtherInstructions']);

Route::post('/getCpoe', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'getCPOEDokter'])->name('get.cpoe.dokter');
Route::post('addSoapDokter', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'add_soap_dokter'])->name('add.soap.dokter');
Route::post('getDataHistorySoap', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'get_data_history_soap'])->name('get.data.history.soap');
Route::post('addDiagnosa', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'add_diagnosa'])->name('add.diagnosa');
Route::post('addProsedur', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'add_prosedur'])->name('add.prosedur');
Route::get('getDiagnosa/{noreg}', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'get_diagnosa'])->name('get.diagnosa');
Route::get('getProsedur/{noreg}', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'get_prosedur'])->name('get.prosedur');
Route::get('delDiagnosa/{noreg}', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'del_diagnosa'])->name('del.diagnosa');
Route::get('delProsedur/{noreg}', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'del_prosedur'])->name('del.prosedur');
Route::post('addSoap', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'klik_soap'])->name('add.soap');
Route::post('getSoapDokter', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'get_soap_dokter'])->name('get.soap.dokter');
Route::post('dischargeDokter', [\App\Http\Controllers\NewDokter\NewDischargeController::class, 'add_discharge'])->name('discharge.dokter');
Route::get('hapus/discharge/{id}', [\App\Http\Controllers\NewDokter\NewDischargeController::class, 'reset_discharge'])->name('reset.discharge.dokter');
Route::post('addPemulanganPasien', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'addpemulanganpasien'])->name('add.pemulangan.pasien');
Route::post('getPemulanganPasien', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'getpemulanganpasien'])->name('get.pemulangan.pasien');
Route::post('/verifikasicppt', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'verifikasi_soap_dokter'])->name('dokter.verifikasicppt');
Route::get('/getAlertAlergi', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'getAlertAlergi'])->name('dokter.getAlertAlergi');
Route::get('/getAlertJatuh', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'getAlertJatuh'])->name('dokter.getAlertJatuh');
Route::get('/checkPemeriksaan', [\App\Http\Controllers\NewDokter\AssesmentAwalDokterController::class, 'checkPemeriksaan'])->name('dokter.checkPemeriksaan');
Route::get('/dataOpenDischargeRequest', [\App\Http\Controllers\NewDokter\NewDischargeController::class, 'dataOpenDischargeRequest']);
Route::post('/openDischargeRequest', [\App\Http\Controllers\NewDokter\NewDischargeController::class, 'openDischargeRequest']);
Route::post('/openDischargeApprove', [\App\Http\Controllers\NewDokter\NewDischargeController::class, 'openDischargeApprove']);
//api perawat

Route::get('getLastCpptData', [\App\Http\Controllers\NewPerawat\NewSoapController::class, 'getLastCpptData']);
Route::post('addSoapNewPerawat', [\App\Http\Controllers\NewPerawat\NewSoapCOntroller::class, 'addsoap'])->name('add.soap.new.perawat');
Route::post('getSoapNewPerawat', [\App\Http\Controllers\NewPerawat\NewSoapCOntroller::class, 'getsoapbyreg'])->name('get.soap.new.perawat');
Route::post('addFluidBalanceBaru', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addFluidBalanceBaru'])->name('add.fluidbalance.new.perawat');
Route::get('getFluidBalanceTransfusi', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getFluidBalanceTransfusi'])->name('get.transfusi');
Route::post('getFludiBalanceBaru', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getFluidBalance'])->name('get.fluidbalance.baru');
Route::post('addassesmetawal', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addasessmentawal'])->name('add.assesmentawal');
Route::post('perawat_addPemulanganPasien', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addpemulanganpasien'])->name('add.perawat.pemulangan.pasien');
Route::post('addMonitoringNews', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addmonitoring_news'])->name('add.monitoringnews');
Route::get('getMonitoringNews', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getMonitoringNews'])->name('get.monitoringnews');
Route::get('getMonitoringNewsDetail{id}', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getMonitoringNewsDetail'])->name('get.detail.monitoringnews');
Route::post('addChecklistKepulangan', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addchecklist_kepulangan'])->name('add.checklist_kepulangan');
Route::post('addInformasiTindakanMedis', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addInformasiTindakanMedis'])->name('add.addInformasiTindakanMedis');
Route::post('addPersetujuanTindakanMedis', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addPersetujuanTindakanMedis'])->name('add.PersetujuanTindakanMedis');
Route::post('addPenolakanTindakanMedis', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addPenolakanTindakanMedis'])->name('add.PenolakanTindakanMedis');
Route::post('addRujukanPersiapanPasien', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addRujukanPersiapanPasien'])->name('add.RujukanPersiapanPasien');
Route::post('addRujukanSerahTerima', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addRujukanSerahTerima'])->name('add.RujukanSerahTerima');

//baru
// Route::post('/saveDokterKonsul', [\App\Http\Controllers\NewDokter\PhysicianTeamController::class, 'saveDokterKonsul'])->name('save.dokter.konsul');

Route::post('/addKonsulDokter', [\App\Http\Controllers\NewDokter\PhysicianTeamController::class, 'addKonsulDokter']);
Route::post('/getKonsul', [\App\Http\Controllers\NewDokter\PhysicianTeamController::class, 'getKonsul']);

Route::post('addassesmetawalanak', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addPengkajianPasienAnak'])->name('add.assesmentawalanak');
Route::post('addmonitoringtransfusidarah', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addMonitoringTransfusiDarah'])->name('add.monitoringtransfusidarah');
Route::post('addlaporanpersalinanobgyn', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addLaporanPersalinanObgyn'])->name('add.laporanpersalinanobgyn');
Route::post('getlaporanpersalinanobgyn', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getLaporanPersalinanObgyn'])->name('get.laporanpersalinanobgyn');

Route::post('addskrinninggizi', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addSkrinningGizi'])->name('add.skrinninggizi');
Route::post('addskrinninggizianak', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addSkrinningGiziAnak'])->name('add.skrinninggizianak');
Route::post('addMasalah', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addMasalah'])->name('add.Masalah');
Route::post('addskrinningnyeri', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addSkrinningNyeri'])->name('add.skrinningnyeri');
Route::post('addEdukasiPasien', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addedukasipasien'])->name('add.edukasipasien');
Route::post('addEdukasiPasienPerawat', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addEdukasiPasienPerawat'])->name('add.edukasi_pasien_perawat');
Route::post('addEdukasiPasienGizi', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addEdukasiPasienGizi'])->name('add.edukasi_pasien_gizi');
Route::post('getRsEdukasiPasien', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getRsEdukasiPasien'])->name('get.edukasipasien');
Route::post('getRsEdukasiGizi', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getRsEdukasiGizi'])->name('get.edukasigizi');


Route::post('addEdukasiPasienFarmasi', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addEdukasiPasienFarmasi'])->name('add.edukasi_pasien_farmasi');
Route::post('getRsEdukasiFarmasi', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getRsEdukasiFarmasi'])->name('get.edukasifarmasi');
// Route::post('addEdukasiPasienGizi', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addEdukasiPasienGizi'])->name('add.edukasi_pasien_gizi');
// Route::post('getRsEdukasiGizi', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getRsEdukasiGizi'])->name('get.edukasigizi');
// Route::get('showEdukasiGiziForm/{reg_no}/{med_rec}', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'showEdukasiGiziForm'])->name('show.edukasi_gizi_form');

Route::post('checklistpasien', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'checklist'])->name('checklist.pasien');
Route::post('getNursingNote', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getNursingNote'])->name('get.nursing.note');
Route::post('addNursingNote', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addNursingNote'])->name('add.nursing.note');
Route::post('addChecklist', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'simpan_rm3'])->name('add.checklist');
Route::post('perawat_add_pra_tindakan', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'simpan_pra_tindakan'])->name('add.perawat_pra_tindakan');
Route::post('perawat_paska_tindakan', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'simpan_paska_tindakan'])->name('add.perawat_paska_tindakan');
Route::post('perawat_observasi_paska_tindakan', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'simpan_observasi_paska_tindakan'])->name('add.perawat_observasi_paska_tindakan');
Route::post('assesment_bayi', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'simpan_assesment_bayi'])->name('add.assesment_bayi');
Route::post('addCathlabSignIn', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'simpan_cathlab_signin'])->name('add.cathlab_sign_in');
Route::post('addCathlabTimeOut', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'simpan_cathlab_timeout'])->name('add.cathlab_time_out');
Route::post('addCathlabSignOut', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'simpan_cathlab_signout'])->name('add.cathlab_sign_out');
Route::post('pemeriksaan_bayi', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'simpan_pemeriksaan_bayi'])->name('add.pemeriksaan_bayi');
Route::get('getdokter', [App\Http\Controllers\NewPerawat\NewNursingController::class, 'getPhysician'])->name('get.dokter');
Route::post('addphysicianteamDokter', [\App\Http\Controllers\NewDokter\PhysicianTeamController::class, 'addPhysicianTeamDokter'])->name('add.physicianteam.dokter');
Route::post('/getKonsul', [\App\Http\Controllers\NewDokter\PhysicianTeamController::class, 'getKonsul']);
Route::post('/saveKonsul', [\App\Http\Controllers\NewDokter\PhysicianTeamController::class, 'saveKonsul']);
Route::delete('/deletePhysicianTeamDokter/{id}', [\App\Http\Controllers\NewDokter\PhysicianTeamController::class, 'deletePhysicianTeamDokter'])->name('delete.physicianteam.dokter');
Route::post('addphysicianteam', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addPhysicianTeam'])->name('add.physicianteam');
Route::post('getphysicianteam', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getPhysicianTeam'])->name('get.physicianteam');
Route::post('addTindakanIntra', [App\Http\Controllers\NewPerawat\NewNursingController::class, 'addTindakanIntra'])->name('add.tindakan.intra');
Route::post('addPemantauanIntra', [App\Http\Controllers\NewPerawat\NewNursingController::class, 'addIntraPemantauan'])->name('add.pemantauan.intra');
Route::post('addResikoJatuhGeriatri', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addResikoJatuhGeriatri'])->name('add.resiko.jatuh.geriatri');
Route::post('getListResikoJatuhGeriatri', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getListResikoJatuhGeriatri'])->name('get.resiko.jatuh.geriatri');
Route::post('getDetailResikoJatuhGeriatri', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getDetailResikoJatuhGeriatri'])->name('get.detail.resiko.jatuh.geriatri');
Route::post('deleteResikoJatuhGeriatri', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'deleteResikoJatuhGeriatri'])->name('delete.resiko.jatuh.geriatri');
Route::post('addReskoJatuhHumptyDumpty', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addReskoJatuhHumptyDumpty'])->name('add.resiko.jatuh.humptydumpty');
Route::post('getListReskoJatuhHumptyDumpty', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getListResikoJatuhHumptyDumpty'])->name('get.resiko.jatuh.humptydumpty');
Route::post('getDetailReskoJatuhHumptyDumpty', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getDetailResikoJatuhHumptyDumpty'])->name('get.detail.resiko.jatuh.humptydumpty');
Route::post('deleteResikoJatuhHumptyDumpty', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'deleteResikoJatuhHumptyDumpty'])->name('delete.resiko.jatuh.humptydumpty');
Route::post('addResikoJatuhNeonatus', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addResikoJatuhNeonatus'])->name('add.resiko.jatuh.neonatus');
Route::post('getListResikoJatuhNeonatus', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getListResikoJatuhNeonatus'])->name('get.resiko.jatuh.neonatus');
Route::post('getDetailResikoJatuhNeonatus', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getDetailResikoJatuhNeonatus'])->name('get.detail.resiko.jatuh.neonatus');
Route::post('deleteResikoJatuhNeonatus', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'deleteResikoJatuhNeonatus'])->name('delete.resiko.jatuh.neonatus');
Route::post('addResikoJatuhSkalaMorse', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addResikoJatuhSkalaMorse'])->name('add.resiko.jatuh.skalamorse');
Route::post('getListResikoJatuhSkalaMorse', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getListResikoJatuhSkalaMorse'])->name('get.resiko.jatuh.skalamorse');
Route::post('getDetailResikoJatuhSkalaMorse', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getDetailResikoJatuhSkalaMorse'])->name('get.detail.resiko.jatuh.skalamorse');
Route::post('deleteResikoJatuhSkalaMorse', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'deleteResikoJatuhSkalaMorse'])->name('delete.resiko.jatuh.skalamorse');
Route::post('addordertindakanperawat', [\App\Http\Controllers\Master\TarifController::class, 'ordertindakannurse'])->name('add.ordertindakanperawat');
//api register
Route::get('registrasi/sphaira', [App\Http\Controllers\Ranap\RegisterController::class, 'get_data_sphaira'])->name('tarik.sphaira');
Route::post('cekTarifRuanganBaru', [RegisterController::class, 'cekTarifRuanganBaru'])->name('cek.tarif.ruangan.baru');
Route::get('cekketersediaanruangan', [RegisterController::class, 'getRuangan'])->name('ketersediaan.ruangan');
Route::get('listruangranap', [RegisterController::class, 'getRuanganRawat'])->name('ketersediaan.ruangan.rawat');
//api pasien baru
Route::post('addpasienbaru', [RegisterController::class, 'addPasienBaru'])->name('add.pasien.baru');
//api kasir
Route::post('addreview', [\App\Http\Controllers\Kasir\BillingController::class, 'addBillingReview'])->name('add.billing.review');
Route::post('invoice', [\App\Http\Controllers\Kasir\BillingController::class, 'invoice'])->name('invoice');
//api obgyn
Route::post('addassesmentobgyn', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addAssesmentObgyn'])->name('add.assesmentobgyn');
Route::post('getassesmentobgyn', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getAssesmentObgyn'])->name('get.assesmentobgyn');
Route::post('addskorsadperson', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addSkorSadPerson'])->name('add.skorsadperson');
Route::post('getskorsadperson', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getSkorSadPerson'])->name('get.skorsadperson');
Route::post('addriwayatmenstruasi', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addriwayatmensturasi'])->name('add.riwayatmenstruasi');
Route::post('getriwayatmenstruasi', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getriwayatmenstruasi'])->name('get.riwayatmenstruasi');
Route::post('addstatusperkawinan', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addstatusperkawinan'])->name('add.statusperkawinan');
Route::post('getstatusperkawinan', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getstatusperkawinan'])->name('get.statusperkawinan');
Route::post('addriwayatkehamilan', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addriwayatkehamilan'])->name('add.riwayatkehamilan');
Route::post('getriwayatkehamilan', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getriwayatkehamilan'])->name('get.riwayatkehamilan');
Route::post('addskrininggiziobgyn', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addskrininggiziobgyn'])->name('add.skrininggiziobgyn');
Route::post('getskrininggiziobgyn', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getskrininggiziobgyn'])->name('get.skrininggiziobgyn');
Route::post('addskalawongbeker', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addskalawongbaker'])->name('add.skalawongbeker');
Route::post('getskalawongbeker', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getskalawongbaker'])->name('get.skalawongbeker');
Route::post('addbehaviorscaleobgyn', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addbehaviorscalepainobgyn'])->name('add.behaviorscaleobgyn');
Route::post('getbehaviorscaleobgyn', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getbehaviorscalepainobgyn'])->name('get.behaviorscaleobgyn');
Route::post('addadlobgyn', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addadlobgyn'])->name('add.adlobgyn');
Route::post('getadlobgyn', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getadlobgyn'])->name('get.adlobgyn');
Route::post('addskriningresikojatuhobgyn', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addskriningresikojatuhobgyn'])->name('add.skriningresikojatuhobgyn');
Route::post('getskriningresikojatuhobgyn', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getskriningresikojatuhobgyn'])->name('get.skriningresikojatuhobgyn');
Route::post('addpengkajiankulit', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addpengkajiankulit'])->name('add.pengkajiankulit');
Route::post('getpengkajiankulit', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getpengkajiankulit'])->name('get.pengkajiankulit');
Route::post('addpengkajiankebutuhanaktifitas', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addpengkajiankebutuhanaktifitas'])->name('add.pengkajiankebutuhanaktifitas');
Route::post('getpengkaiankebutuhanaktifitas', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getpengkajiankebutuhanaktifitas'])->name('get.pengkaiankebutuhanaktifitas');
Route::post('addpengkajiankebutuhannutrisi', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addpengkajiankebutuhannutrisi'])->name('add.pengkajiankebutuhannutrisi');
Route::post('getpengkajiankebutuhannutrisi', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getpengkajiankebutuhannutrisi'])->name('get.pengkajiankebutuhannutrisi');
Route::post('addpengkajiankebutuhaneliminasi', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'addpengkajiankebutuhaneliminasi'])->name('add.pengkajiankebutuhaneliminasi');
Route::post('getpengkajiankebutuhaneliminasi', [\App\Http\Controllers\NewPerawat\NewNursingController::class, 'getpengkajiankebutuhaneliminasi'])->name('get.pengkajiankebutuhaneliminasi');
Route::post('pasiensinkron', [\App\Http\Controllers\Master\PatientController::class, 'sinkronpasien'])->name('pasien.sinkronisasi');
Route::post('registersinkron', [\App\Http\Controllers\Master\PatientController::class, 'sinkronRegister'])->name('register.sinkronisasi');
Route::post('sinkronspaira', [\App\Http\Controllers\Master\PatientController::class, 'sinkronpasienspaira'])->name('pasien.spaira');
Route::post('orderpaket', [\App\Http\Controllers\NewDokter\OrderObatController::class, 'orderPaket'])->name('order.paket');
//api baru
Route::post('store.pasien', [RegisterController::class, 'simpanDataPasien'])->name('store.pasien');
Route::post('get.pesan.radiologin', [\App\Http\Controllers\Radiologi\RadiologiController::class, 'getPesanRadiologi'])->name('get.pesan.radiologi');
Route::post('upload.radiologi', [\App\Http\Controllers\Radiologi\RadiologiController::class, 'uploadFile'])->name('upload.radiologi');
Route::get('getBussinessPartner', [RegisterController::class, 'getBussinessPartner'])->name('get.bussinesspartner');
Route::post('getDokumen', [RegisterController::class, 'getNoDocument'])->name('get.document');
Route::get('transfer-internal/getRoom', [TransferInternalController::class, 'getUnitRoom'])->name('transfer-internal.getRoom');
Route::get('transfer-internal/getPerawat', [TransferInternalController::class, 'getPerawat'])->name('transfer-internal.getPerawat');
Route::get('get-ews-info', [NewNursingController::class, 'getEWSScore'])->name('get.ews-info');

Route::get('getProvinsi', [RegisterController::class, 'getProvinsi'])->name('get.provinsi');
Route::post('getRegency', [RegisterController::class, 'getRegency'])->name('get.regency');
Route::post('getDistrict', [RegisterController::class, 'getDistricts'])->name('get.district');
Route::post('getVillage', [RegisterController::class, 'getVillages'])->name('get.village');

//api datamaster
Route::get('getserviceunitlantai', [DepartementController::class, 'getServiceUnitLantai'])->name('get.service.unit.lantai');

// api data master
Route::group(['prefix' => 'sphaira'], function () {
	Route::get('register', [ApiMasterController::class, 'registrasi'])->name('register.sphairaa');
	Route::get('register/{thn}/{bln}', [ApiMasterController::class, 'registrasi'])->name('register.sphaira.param');
	Route::get('business', [ApiMasterController::class, 'business_partner'])->name('sphaira.bp');
	Route::get('cleaning', [ApiMasterController::class, 'bed_cleaning'])->name('sphaira.bc');
	Route::get('cleaning/{thn}/{bln}', [ApiMasterController::class, 'bed_cleaning'])->name('sphaira.bcc');
	Route::get('transfer', [ApiMasterController::class, 'bed_transfer'])->name('sphaira.bt');
	Route::get('transfer/{thn}/{bln}', [ApiMasterController::class, 'bed_transfer'])->name('sphaira.btt');
	Route::get('unit', [ApiMasterController::class, 'service_unit'])->name('sphaira.su');
	Route::get('room', [ApiMasterController::class, 'service_room'])->name('sphaira.sr');
	Route::get('kelas', [ApiMasterController::class, 'kelas'])->name('sphaira.kls');
	Route::get('kelas_kategori', [ApiMasterController::class, 'kelas_kategori'])->name('sphaira.ket');
	Route::get('bed', [ApiMasterController::class, 'bed'])->name('sphaira.b');
	Route::get('general', [ApiMasterController::class, 'general_code'])->name('sphaira.g');
	Route::get('physician/{thn}/{bln}', [ApiMasterController::class, 'physician_team'])->name('sphaira.p');
	Route::get('patient/{no}', [ApiMasterController::class, 'patient'])->name('sphaira.patient');
	Route::get('patient/register/{no}', [ApiMasterController::class, 'reg_by_nomed'])->name('register.sphaira');
	Route::get('unit_ruang', [ApiMasterController::class, 'unit_ruang'])->name('sphaira.ur');
	Route::get('unit_item', [ApiMasterController::class, 'unit_item'])->name('sphaira.ui');
	Route::get('location', [ApiMasterController::class, 'location'])->name('sphaira.lc');
	Route::get('site_departement', [ApiMasterController::class, 'site_department'])->name('sphaira.site-department');
	Route::get('departemen_service_unit', [ApiMasterController::class, 'departemen_service_unit'])->name('sphaira.departement-service-unit');
	Route::get('contract', [ApiMasterController::class, 'contract'])->name('sphaira.cc');
	Route::get('contract/{bisnis}', [ApiMasterController::class, 'contract'])->name('sphaira.ccb');
	Route::get('icd9', [ApiMasterController::class, 'icd_9'])->name('sphaira.i9');
	Route::get('icd10', [ApiMasterController::class, 'icd_10'])->name('sphaira.i10');
	Route::get('tdd/{id}', [ApiMasterController::class, 'get_ttd'])->name('sphaira.ttd');
	Route::get('daftarmasalah', [ApiMasterController::class, 'daftarmasalah'])->name('sphaira.daftarmasalah');
	Route::get('get-tables', [ApiMasterController::class, 'getTableList'])->name('sphaira.get-table-list');
	Route::get('departement', [ApiMasterController::class, 'department'])->name('sphaira.department');
	Route::get('class-category', [ApiMasterController::class, 'classCategory'])->name('sphaira.classCategory');
	Route::get('check-table', [ApiMasterController::class, 'checkTable'])->name('sphaira.check-table');
	Route::get('check-sys-gen-code', [ApiMasterController::class, 'checkSysGenCode'])->name('sphaira.check-sys-code');
});


// api data master RAJAL
Route::group(['prefix' => 'sphaira-rajal'], function () {
	Route::get('daftarmasalah', [ApiMasterRajalController::class, 'daftar_masalah'])->name('sphaira-rajal.daftarmasalah');
	Route::get('draft', [ApiMasterRajalController::class, 'draft'])->name('sphaira-rajal.draft');
	Route::get('dtd', [ApiMasterRajalController::class, 'dtd'])->name('sphaira-rajal.dtd');
	Route::get('education', [ApiMasterRajalController::class, 'education'])->name('sphaira-rajal.education');
	Route::get('m_item', [ApiMasterRajalController::class, 'm_item'])->name('sphaira-rajal.m_item');
	Route::get('m_item_group', [ApiMasterRajalController::class, 'm_item_group'])->name('sphaira-rajal.m_item_group');
	Route::get('check_table', [ApiMasterRajalController::class, 'check_table'])->name('sphaira-rajal.check_table');
	Route::get('m_item_tarif', [ApiMasterRajalController::class, 'm_item_tarif'])->name('sphaira-rajal.m_item_tarif');
	Route::get('m_item_sub', [ApiMasterRajalController::class, 'm_item_sub'])->name('sphaira-rajal.m_item_sub');
	Route::get('m_item_tarif_mcu', [ApiMasterRajalController::class, 'm_item_tarif_mcu'])->name('sphaira-rajal.m_item_tarif_mcu');
	Route::get('speciality', [ApiMasterRajalController::class, 'speciality'])->name('sphaira-rajal.speciality');
	Route::get('infectious_desease', [ApiMasterRajalController::class, 'infectious_desease'])->name('sphaira-rajal.infectious_desease');
});

// api data master

Route::prefix('master')->name('api-master.')->group(function () {
	Route::get('select2Item', [ItemController::class, 'select2Item'])->name('item.select2');
});

Route::prefix('pasien')->name('pasien.')->group(function () {
	Route::get('visit-history/{medicalRecord}', [PasienController::class, 'visitHistory'])->name('visit.history');
	Route::get('visit-history/{medicalRecord}/ranap', [PasienController::class, 'visitHistoryRanap'])->name('visit.history.ranap');
	Route::get('visit-history/{medicalRecord}/rajal', [PasienController::class, 'visitHistoryRajal'])->name('visit.history.rajal');
	Route::get('visit-history/{medicalRecord}/igd', [PasienController::class, 'visitHistoryIGD'])->name('visit.history.igd');
	Route::get('web-visit-history/{medicalRecord}', [PasienController::class, 'webVisitHistory'])->name('web.visit.history');
});

Route::prefix('perawat')->name('perawat.')->group(function () {
	Route::post('add-assesment-neonatus', [NeonatusController::class, 'store'])->name('neonatus.store');
	Route::post('add-assesment-awal-anak', [AssesmentAnakController::class, 'store_assesment_awal_anak'])->name('assesment-anak-awal.store');
	Route::post('add-skrining-gizi-anak', [AssesmentAnakController::class, 'store_skrining_gizi_anak'])->name('skrining-gizi-anak.store');
	Route::post('add-skrining-nyeri-anak', [AssesmentAnakController::class, 'store_skrining_nyeri_anak'])->name('skrining-nyeri-anak.store');
	Route::post('add-assesment-obgyn', [ObgynController::class, 'store'])->name('obgyn.store');
	Route::post('add-assesment-awal-dewasa', [AssesmentDewasaController::class, 'store_assesment_awal_dewasa'])->name('assesment-dewasa-awal.store');
	Route::post('add-skrining-nyeri-dewasa', [AssesmentDewasaController::class, 'store_skrining_nyeri_dewasa'])->name('skrining-nyeri-dewasa.store');
	Route::post('add-skrining-gizi-dewasa', [AssesmentDewasaController::class, 'store_skrining_gizi_dewasa'])->name('skrining-gizi-dewasa.store');
	Route::get('get-rekonsiliasi-obat-item', [RekonsiliasiObatController::class, 'get_rekon_obat_data'])->name('rekon-obat-item.get');
	Route::post('store-rekon-obat-item', [RekonsiliasiObatController::class, 'store_rekon_obat_item'])->name('rekon-obat-item.store');
	Route::post('delete-rekon-obat-item', [RekonsiliasiObatController::class, 'delete_rekon_obat_item'])->name('rekon-obat-item.delete');
	Route::get('get-rekon-ttd', [RekonsiliasiObatController::class, 'get_ttd_verif_obat'])->name('get-rekon-ttd.get');
	Route::post('store-rekonsiliasi-obat', [RekonsiliasiObatController::class, 'store_rekonsiliasi_obat'])->name('rekonsiliasi-obat.store');
	Route::post('store-case-manager', [CaseManagerController::class, 'store_case_manager'])->name('case-manager.store');
	Route::get('get-nursing-durgs', [NewNursingController::class, 'getDrugsDatatable'])->name('nursing-drugs.get');
	Route::post('store-case-manager-akumulasi', [CaseManagerController::class, 'store_case_manager_akumulasi'])->name('case-manager-akumulasi.store');
	Route::get('get-kamar-ready', [TransferInternalController::class, 'getKetersediaanKamar'])->name('transfer-internal.getKamar');
	Route::post('store-asuhan-gizi-dewasa', [NewNursingController::class, 'StoreAsuhanGiziDewasa'])->name('asuhan-gizi-dewasa.store');
});

Route::prefix('bed')->name('bed.')->group(function () {
	Route::get('/class/{class_code}', [BedController::class, 'getBedByClassCode'])->name('class');
});

Route::prefix('logActivity')->group(function () {
	Route::get('/', [LogActivityController::class, 'data']);
	Route::post('/store', [LogActivityController::class, 'store']);
});

//api form perawat
Route::prefix('perawat')->name('perawat.')->group(function () {
	Route::get('/assesment-dewasa', [RiwayatController::class, 'getAssesmentDewasa'])->name('assesment-dewasa');
	Route::get('/assesment-neonatus', [RiwayatController::class, 'getAssesmentNeonatus'])->name('assesment-neonatus');
	Route::get('/assesment-anak', [RiwayatController::class, 'getAssesmentAnak'])->name('assesment-anak');
	Route::get('/assesment-obgyn', [RiwayatController::class, 'getAssesmentObgyn'])->name('assesment-obgyn');
	Route::get('/edukasi-pasien', [RiwayatController::class, 'getEdukasiPasien'])->name('edukasi-pasien');
	Route::get('/rekonsiliasi-obat', [RiwayatController::class, 'getRekonObat'])->name('rekonsiliasi-obat');
	Route::get('/checklist-orientasi', [RiwayatController::class, 'getChecklistOrientasi'])->name('checklist-orientasi');
	Route::get('/resiko-jatuh-morse', [RiwayatController::class, 'getResikoJatuhMorse'])->name('resiko-jatuh-morse');
	Route::get('/resiko-jatuh-humpty', [RiwayatController::class, 'getResikoJatuhHumpty'])->name('resiko-jatuh-humpty');
	Route::get('/resiko-jatuh-geriatri', [RiwayatController::class, 'getResikoJatuhGeriatri'])->name('resiko-jatuh-geriatri');
	Route::get('/resiko-jatuh-neonatus', [RiwayatController::class, 'getResikoJatuhNeonatus'])->name('resiko-jatuh-neonatus');
	Route::get('/nurse-note', [RiwayatController::class, 'getNurseNote'])->name('nurse-note');
	Route::get('/monitoring-news', [RiwayatController::class, 'getDatatableMoniNews'])->name('dt-monitoring-news');
	Route::get('/fluid-balance', [RiwayatController::class, 'getFluidBalance'])->name('fluid-balance');
	Route::get('/drug-history', [RiwayatController::class, 'getDtDrugHistory'])->name('dt-drug-history');
	Route::get('/monitoring-transfusi-darah', [RiwayatController::class, 'getMonitoringTransfusiDarah'])->name('monitoring-transfusi-darah');
	Route::get('/persetujuan-tindakan-medis', [RiwayatController::class, 'getPersetujuanTindakanMedis'])->name('persetujuan-tindakan-medis');
	Route::get('/case-manager', [RiwayatController::class, 'getCaseManager'])->name('case-manager');
	Route::get('/riwayat-tf-internal', [RiwayatController::class, 'getDtRiwayatTfInternal'])->name('dt-riwayat-tf-internal');
	Route::get('/persiapan-pasien-ti', [RiwayatController::class, 'getPersiapanPasienTI'])->name('persiapan-pasien-ti');
	Route::get('/riwayat-ti-alat', [RiwayatController::class, 'getDtRiwayatTiAlat'])->name('dt-riwayat-ti-alat');
	Route::get('/riwayat-ti-obat', [RiwayatController::class, 'getDtRiwayatTiObat'])->name('dt-riwayat-ti-obat');
	Route::get('/riwayat-ti-status', [RiwayatController::class, 'getDtRiwayatTiStatus'])->name('dt-riwayat-ti-status');
	Route::get('/serah-terima-ti', [RiwayatController::class, 'getSerahTerimaTI'])->name('serah-terima-ti');
	Route::get('/riwayat-ti-diagnostik', [RiwayatController::class, 'getDtRiwayatTiDiagnostik'])->name('dt-riwayat-ti-diagnostik');



	Route::get('/catatan-pra-tindakan-cathlab', [RiwayatController::class, 'getCatatanPraTindakanCathlab'])->name('catatan-pra-tindakan-cathlab');
	Route::get('/catatan-intra-tindakan-cathlab', [RiwayatController::class, 'getCatatanIntraTindakanCathlab'])->name('catatan-intra-tindakan-cathlab');
	Route::get('/pemantauan-hemodinamik', [RiwayatController::class, 'getPemantauanHemodinamik'])->name('pemantauan-hemodinamik');
	Route::get('/cathlab-sign-in', [RiwayatController::class, 'getCathlabSignIn'])->name('cathlab-sign-in');
	Route::get('/cathlab-time-out', [RiwayatController::class, 'getCathlabTimeOut'])->name('cathlab-time-out');
	Route::get('/cathlab-sign-out', [RiwayatController::class, 'getCathlabSignOut'])->name('cathlab-sign-out');
	Route::get('/pemantauan-paska-tindakan-cathlab', [RiwayatController::class, 'getPemantauanPaskaTindakanCathlab'])->name('pemantauan-paska-tindakan-cathlab');
	Route::get('/observasi-paska-tindakan-cathlab', [RiwayatController::class, 'getObaservasiPaskaTindakanCathlab'])->name('observasi-paska-tindakan-cathlab');
	Route::get('/physician-team', [RiwayatController::class, 'getPhysicianTeam'])->name('physician-team');
	Route::get('/riwayat-admin-nurse', [RiwayatController::class, 'getDtRiwayatAdminNurse'])->name('admin-nurse');
	Route::get('/bayi-baru-lahir-anamnesa', [RiwayatController::class, 'getBayiBaruLahirAnamnesa'])->name('bayi-baru-lahir-anamnesa');
	Route::get('/bayi-baru-lahir-pemeriksaan', [RiwayatController::class, 'getBayiBaruLahirPemeriksaan'])->name('bayi-baru-lahir-pemeriksaan');
	Route::get('/checklist-pulang', [RiwayatController::class, 'getChecklistPulang'])->name('checklist-pulang');
});

Route::get('/persetujuan-penolakan-dokter', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'persetujuan_penolakan_dokter'])->name('dokter.persetujuan-penolakan');

// Route::get('surat-rujukan-dokter', [\App\Http\Controllers\ZxcNyaaUniversal\NyaaViewInjectorController::class, 'surat_rujukan_dokter'])->name('surat.rujukan.dokter');
Route::prefix('dokter')->name('dokter.')->group(function () {
	Route::get('/surat-rujukan-dokter', [\App\Http\Controllers\Dokter\SuratRujukanController::class, 'surat_rujukan_dokter'])->name('surat.rujukan.dokter');
	Route::post('/simpan-prosedur-operasi', [\App\Http\Controllers\Dokter\SuratRujukanController::class, 'simpanProsedurOperasi'])->name('simpan.prosedur.operasi');
	Route::post('/simpan-alat-terpasang', [\App\Http\Controllers\Dokter\SuratRujukanController::class, 'simpanAlatTerpasang'])->name('simpan.alat.terpasang');
	Route::post('/simpan-obat-diterima', [\App\Http\Controllers\Dokter\SuratRujukanController::class, 'simpanObatDiterima'])->name('simpan.obat.diterima');
	Route::post('/simpan-obat-dibawa', [\App\Http\Controllers\Dokter\SuratRujukanController::class, 'simpanObatCairanDibawa'])->name('simpan.obat.dibawa');
	Route::post('/simpan-status-pasien', [\App\Http\Controllers\Dokter\SuratRujukanController::class, 'simpanStatusPasien'])->name('simpan.status.pasien');
});

Route::post('/add-edukasi-anastesi', [EdukasiAnastesiController::class, 'addEdukasiAnastesi'])->name('add.edukasi.anastesi');
Route::get('/get-edukasi-anastesi', [EdukasiAnastesiController::class, 'getEdukasiAnastesi'])->name('get.edukasi.anastesi');
Route::get('getPPALainnya', [\App\Http\Controllers\NewDokter\PhysicianTeamController::class, 'getPPALainnya'])->name('getPPALainnya');
// Riwayat Dokter
Route::get('/getRiwayatPenunjang', [App\Http\Controllers\NewDokter\RiwayatController::class, 'getRiwayatPenunjang']);
// Route::get('/getRiwayatSOAP', [App\Http\Controllers\NewDokter\RiwayatController::class, 'getRiwayatSOAP']);

Route::get('/getRiwayatSoap', [App\Http\Controllers\NewDokter\RiwayatController::class, 'getRiwayatSoap']);
Route::get('/getRiwayatObat', [App\Http\Controllers\NewDokter\RiwayatController::class, 'getRiwayatObat']);

//assesment awal dokterrrr
Route::get('/assesment-awal-dokter', [App\Http\Controllers\NewDokter\RiwayatController::class, 'getAssesmentData'])->name('assesment-awal-dokter');
//edukasi dokter
Route::get('/edukasi-dokter', [App\Http\Controllers\NewDokter\RiwayatController::class, 'getEdukasiData'])->name('edukasi-dokter');

Route::prefix('laporan-operasi')->name('laporan-operasi.')->group(function () {
	Route::get('/patient/{reg_no}', [Api\Dokter\LaporanOperasiController::class, 'index'])->where('reg_no', '(.*)')->name('index');
});
