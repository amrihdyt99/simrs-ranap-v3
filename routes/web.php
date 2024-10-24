<?php

use App\Utils\TagElementHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class, 'nyaa_default_redirect_index_route'])->name('nyaa_default_redirect_index_route');
Route::get('/halaman-utama', [\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class, 'nyaa_default_redirect_index_route'])->name('nyaa_default_redirect_index_route_halamanutama');

Route::get('fd1', function ($id = '') {
    return view('emr.form_dewasa_1');
});
Route::get('fd2', function ($id = '') {
    return view('emr.form_dewasa_2');
});
Route::get('fd3', function ($id = '') {
    return view('emr.form_dewasa_3');
});
Route::get('fd4', function ($id = '') {
    return view('emr.form_dewasa_4');
});

require __DIR__ . '/master.php';
require __DIR__ . '/dokter.php';
require __DIR__ . '/register.php';
require __DIR__ . '/perawat.php';
require __DIR__ . '/assessment.php';
require __DIR__ . '/case-manager.php';
require __DIR__ . '/kasir.php';
require __DIR__ . '/auth.php';
require __DIR__ . '/admin_nurse.php';
require __DIR__ . '/resume_pasien.php';
require __DIR__ . '/dietitian.php';
require __DIR__ . '/farmasi.php';
require __DIR__ . '/radiologi.php'; 
require __DIR__ . '/laboratorium.php'; 
// ZxcNyaaUniversal
require __DIR__ . '/ZxcNyaaUniversal.php';
require __DIR__ . '/tarik_haykal.php';

// use \Milon\Barcode\Facades\DNS1DFacade;

// Route::get('test-barcode', function () {
//     return DNS1DFacade::getBarcodeSVG('QREG/RI/2024090100001', 'C128', 1, 48);
// });

Route::get('test-log-activity-helper', function () {
    $tag = new TagElementHelper();
    $list = $tag->createList('List of Items', ['Item 1', 'Item 2', 'Item 3']);
    $table = $tag->createTable('Table of Items', ['Column 1', 'Column 2', 'Column 3'], [
        ['Row 1 Cell 1', 'Row 1 Cell 2', 'Row 1 Cell 3'],
        ['Row 2 Cell 1', 'Row 2 Cell 2', 'Row 2 Cell 3'],
        ['Row 3 Cell 1', 'Row 3 Cell 2', 'Row 3 Cell 3'],
    ]);
    $collapse = $tag->createBootstrapCollapse('Collapse Caption', 'Element inside collapse');
    $flex = $tag->createFlexRow('Flex Caption', [
        $list,
        $table,
        $collapse
    ]);
    $grid = $tag->createGridRow('Grid Caption', 4, [
        $list,
        $table,
        $collapse
    ]);
    $data_json = (object)[
        'name' => 'John Doe',
        'age' => 30,
        'sex' => 'Male'
    ];
    $json_element = $tag->createCodeJson('View JSON', $data_json);

    $context = [
        'list' => $list,
        'table' => $table,
        'collapse' => $collapse,
        'flex' => $flex,
        'grid' => $grid,
        'data_json' => json_encode($data_json),
        'json_element' => $json_element,
        'badge' => [
            'primary' => $tag->createBootstrapBadge('primary', 'Primary'),
            'secondary' => $tag->createBootstrapBadge('secondary', 'Secondary'),
            'success' => $tag->createBootstrapBadge('success', 'Success'),
            'danger' => $tag->createBootstrapBadge('danger', 'Danger'),
            'warning' => $tag->createBootstrapBadge('warning', 'Warning'),
            'info' => $tag->createBootstrapBadge('info', 'Info'),
            'light' => $tag->createBootstrapBadge('light', 'Light'),
            'dark' => $tag->createBootstrapBadge('dark', 'Dark'),
        ],
        'blockquote' => $tag->createBoostrapBlockquote('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.', 'Author'),
    ];
    // dd($context);
    return view('test-view-element-helper', $context);
});
