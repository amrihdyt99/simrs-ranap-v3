<?php

namespace App\Http\Controllers\ZxcNyaaUniversal;

use App\Http\Controllers\ZxcNyaaUniversal\AaaBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Exception;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use Illuminate\Support\Facades\Schema;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Facades\Validator;

class NyaaViewInjectorSupportController extends AaaBaseController
{

    public function hapus_joborderdt(Request $request)
    {
        $rules = [
            'id' => ['required',],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Mohon untuk melengkapi data lalu coba kembali. Detail: ' . $validator->errors()], 422);
        }

        $dt_dlt = DB::table('job_orders_dt')
            ->where('id', $request->id)
            ->first();

        if (!$dt_dlt) {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Data tidak ditemukan.'], 422);
        }

        DB::table('job_orders_dt')
            ->where('id', $request->id)
            ->delete();

        return response()->json(["sukses_pesan" => 'Sukses! Data berhasil dihapus.'], 200);
    }

    public function hapus_monitoringtransfusidarah(Request $request)
    {
        $rules = [
            'id' => ['required',],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Mohon untuk melengkapi data lalu coba kembali. Detail: ' . $validator->errors()], 422);
        }

        $dt_dlt = DB::table('monitoring_transfusi_darah')
            ->where('id', $request->id)
            ->first();

        if (!$dt_dlt) {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Data tidak ditemukan.'], 422);
        }

        DB::table('monitoring_transfusi_darah')
            ->where('id', $request->id)
            ->delete();

        return response()->json(["sukses_pesan" => 'Sukses! Data berhasil dihapus.'], 200);
    }

    public function hapus_mphysicianteam(Request $request)
    {
        $rules = [
            'id' => ['required',],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Mohon untuk melengkapi data lalu coba kembali. Detail: ' . $validator->errors()], 422);
        }

        $dt_dlt = app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->db_connection_mysql2()
            ->table('m_physician_team')
            ->where('id', $request->id)
            ->first();

        if (!$dt_dlt) {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Data tidak ditemukan.'], 422);
        }

        app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class)->db_connection_mysql2()
            ->table('m_physician_team')
            ->where('id', $request->id)
            ->delete();

        return response()->json(["sukses_pesan" => 'Sukses! Data berhasil dihapus.'], 200);
    }

    // ================================================================================================================
    // nyaa_dokumen_kelengkapan_pasien
    public function nyaa_dokumen_kelengkapan_pasien(Request $request)
    {
        if ($request->isMethod('get')) {
            return $this->nyaa_dokumen_kelengkapan_pasien_get_handler($request);
        }
        if ($request->isMethod('post')) {
            return $this->nyaa_dokumen_kelengkapan_pasien_post_handler($request);
        } else {
            return redirect('/');
        }
    }
    public function nyaa_dokumen_kelengkapan_pasien_get_handler($request)
    {
        if ($request->ajax()) {
            return $this->nyaa_dokumen_kelengkapan_pasien_getajax_handler($request);
        }
        return redirect('/');
    }
    public function nyaa_dokumen_kelengkapan_pasien_getajax_handler($request)
    {
        $dcv = DB::table('dokumen_kelengkapan_pasien')
            ->where('reg_no',  $request->reg_no)
            ->where('med_rec',  $request->medrec)
            ->where('hapus', 0);
        return DataTables()
            ->of($dcv)
            ->editColumn('aksi_data', function ($query) use ($request) {
                return
                    // START
                    ('<button type="button" class="protecc btn btn-sm btn-danger m-1" onclick="nyaa_dlt(this)" nyaa-mode="hapus" ' .
                        'nyaa-dtid="' . $query->id . '" ' .
                        'nyaa-urlhapus="' . route('nyaa_universal.view_injector_support.perawat.nyaa_dokumen_kelengkapan_pasien') . '" ' .
                        '>Hapus</button>')
                    // END
                ;
            })
            ->editColumn('file_path', function ($query) use ($request) {
                return
                    // START
                    $this->universal_function()->button_lampiran_generator($query->file_path);
                    // END
                ;
            })
            ->escapeColumns([])
            ->toJson();
    }
    public function nyaa_dokumen_kelengkapan_pasien_post_handler($request)
    {
        if ($request->ajax()) {
            return $this->nyaa_dokumen_kelengkapan_pasien_postajax_handler($request);
        }
        return redirect('/');
    }
    public function nyaa_dokumen_kelengkapan_pasien_postajax_handler($request)
    {
        if ($request->dt_mode === 'add') {
            $cnf = [
                'mode' => 'add',
                'data_key' => null,
                'text1' => 'ditambahkan',
            ];
        } elseif ($request->dt_mode === 'edit') {
            if (!$request->dtid) {
                return response()->json(["error_pesan" => 'Terjadi kesalahan! Data ID tidak terisi untuk mode edit.'], 422);
            }
            $cnf = [
                'mode' => 'edit',
                'data_key' => $request->dtid,
                'text1' => 'diperbarui',
            ];
        } elseif ($request->dt_mode === 'hapus') {
            // hapus data
            $dt_dlt = DB::table('dokumen_kelengkapan_pasien')
                ->where('id', $request->dtid)->update([
                    // log
                    'aktif' => 0,
                    'aktif_at' => $this->universal_function()->carbon_generate_datetime_now(),
                    'aktif_by_user_name' => auth()->user()->name,

                    'hapus' => 1,
                    'hapus_at' => $this->universal_function()->carbon_generate_datetime_now(),
                    'hapus_by_user_name' => auth()->user()->name,
                ]);
            return response()->json(["sukses_pesan" => 'Sukses! Data berhasil dihapus.'], 200);
        } else {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Data Mode tidak ditemukan'], 422);
        };

        $rules = [
            'reg_no' => ['required',],
            'med_rec' => ['required',],

            'nama_dokumen' => ['required',],
            'file_path' => ['required',],
            // 'catatan' => ['required',],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Mohon untuk melengkapi data lalu coba kembali. Detail: ' . $validator->errors()], 422);
        }

        if ($cnf['mode'] === 'add') {
            $dtx_a_add = [
                'reg_no' => $request->reg_no,
                'med_rec' => $request->med_rec,
                'nama_dokumen' => $request->nama_dokumen,
                'catatan' => $request->catatan,

                // log
                'aktif' => 1,
                'aktif_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'aktif_by_user_name' => Auth::user()->name,

                'created_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'created_by_user_name' => Auth::user()->name,

                'updated_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'updated_by_user_name' => Auth::user()->name,
            ];
            if ($request->file_path) {
                $dtx_a_add['file_path'] = $this->universal_function()->upload_file($request->file_path);
            }
            DB::table('dokumen_kelengkapan_pasien')->insert($dtx_a_add);
        }

        if ($cnf['mode'] === 'edit') {
            // cek
            $ed_cek = DB::table('dokumen_kelengkapan_pasien')->where(function ($query) use ($request, $cnf) {
                $query->where('id', $cnf['data_key']);
            })->first();
            if (!$ed_cek) {
                return response()->json(["error_pesan" => 'Terjadi kesalahan! Data tidak ditemukan. Mohon untuk coba kembali.'], 422);
            }

            $dtx_a_edt = [
                'nama_dokumen' => $request->nama_dokumen,
                'catatan' => $request->catatan,
                // log
                'updated_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'updated_by_user_name' => Auth::user()->name,
            ];
            if ($request->file_path) {
                $dtx_a_edt['file_path'] = $this->universal_function()->upload_file($request->file_path);
            }
            DB::table('dokumen_kelengkapan_pasien')->where(function ($query) use ($request, $cnf) {
                $query->where('id', $cnf['data_key']);
            })
                ->update($dtx_a_edt);
        }
        return response()->json(["sukses_pesan" => 'Sukses! Data berhasil ' . $cnf['text1'] . '.'], 200);
    }
    // ================================================================================================================



    // ================================================================================================================
    // nyaa_dokumen_tindakan
    public function nyaa_dokumen_tindakan(Request $request)
    {
        if ($request->isMethod('get')) {
            return $this->nyaa_dokumen_tindakan_get_handler($request);
        }
        if ($request->isMethod('post')) {
            return $this->nyaa_dokumen_tindakan_post_handler($request);
        } else {
            return redirect('/');
        }
    }
    public function nyaa_dokumen_tindakan_get_handler($request)
    {
        if ($request->ajax()) {
            return $this->nyaa_dokumen_tindakan_getajax_handler($request);
        }
        return redirect('/');
    }
    public function nyaa_dokumen_tindakan_getajax_handler($request)
    {
        $dcv = DB::table('dokumen_tindakan')
            ->where('reg_no',  $request->reg_no)
            ->where('med_rec',  $request->medrec)
            ->where('hapus', 0);
        return DataTables()
            ->of($dcv)
            ->editColumn('aksi_data', function ($query) use ($request) {
                return
                    // START
                    ('<button type="button" class="protecc btn btn-sm btn-danger m-1" onclick="nyaa_dlt(this)" nyaa-mode="hapus" ' .
                        'nyaa-dtid="' . $query->id . '" ' .
                        'nyaa-urlhapus="' . route('nyaa_universal.view_injector_support.perawat.nyaa_dokumen_tindakan') . '" ' .
                        '>Hapus</button>')
                    // END
                ;
            })
            ->editColumn('file_path', function ($query) use ($request) {
                return
                    // START
                    $this->universal_function()->button_lampiran_generator($query->file_path);
                    // END
                ;
            })
            ->escapeColumns([])
            ->toJson();
    }
    public function nyaa_dokumen_tindakan_post_handler($request)
    {
        if ($request->ajax()) {
            return $this->nyaa_dokumen_tindakan_postajax_handler($request);
        }
        return redirect('/');
    }
    public function nyaa_dokumen_tindakan_postajax_handler($request)
    {
        if ($request->dt_mode === 'add') {
            $cnf = [
                'mode' => 'add',
                'data_key' => null,
                'text1' => 'ditambahkan',
            ];
        } elseif ($request->dt_mode === 'edit') {
            if (!$request->dtid) {
                return response()->json(["error_pesan" => 'Terjadi kesalahan! Data ID tidak terisi untuk mode edit.'], 422);
            }
            $cnf = [
                'mode' => 'edit',
                'data_key' => $request->dtid,
                'text1' => 'diperbarui',
            ];
        } elseif ($request->dt_mode === 'hapus') {
            // hapus data
            $dt_dlt = DB::table('dokumen_tindakan')
                ->where('id', $request->dtid)->update([
                    // log
                    'aktif' => 0,
                    'aktif_at' => $this->universal_function()->carbon_generate_datetime_now(),
                    'aktif_by_user_name' => auth()->user()->name,

                    'hapus' => 1,
                    'hapus_at' => $this->universal_function()->carbon_generate_datetime_now(),
                    'hapus_by_user_name' => auth()->user()->name,
                ]);
            return response()->json(["sukses_pesan" => 'Sukses! Data berhasil dihapus.'], 200);
        } else {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Data Mode tidak ditemukan'], 422);
        };

        $rules = [
            'reg_no' => ['required',],
            'med_rec' => ['required',],

            'nama_dokumen' => ['required',],
            'file_path' => ['required',],
            // 'catatan' => ['required',],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Mohon untuk melengkapi data lalu coba kembali. Detail: ' . $validator->errors()], 422);
        }

        if ($cnf['mode'] === 'add') {
            $dtx_a_add = [
                'reg_no' => $request->reg_no,
                'med_rec' => $request->med_rec,
                'nama_dokumen' => $request->nama_dokumen,
                'catatan' => $request->catatan,

                // log
                'aktif' => 1,
                'aktif_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'aktif_by_user_name' => Auth::user()->name,

                'created_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'created_by_user_name' => Auth::user()->name,

                'updated_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'updated_by_user_name' => Auth::user()->name,
            ];
            if ($request->file_path) {
                $dtx_a_add['file_path'] = $this->universal_function()->upload_file($request->file_path);
            }
            DB::table('dokumen_tindakan')->insert($dtx_a_add);
        }

        if ($cnf['mode'] === 'edit') {
            // cek
            $ed_cek = DB::table('dokumen_tindakan')->where(function ($query) use ($request, $cnf) {
                $query->where('id', $cnf['data_key']);
            })->first();
            if (!$ed_cek) {
                return response()->json(["error_pesan" => 'Terjadi kesalahan! Data tidak ditemukan. Mohon untuk coba kembali.'], 422);
            }

            $dtx_a_edt = [
                'nama_dokumen' => $request->nama_dokumen,
                'catatan' => $request->catatan,
                // log
                'updated_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'updated_by_user_name' => Auth::user()->name,
            ];
            if ($request->file_path) {
                $dtx_a_edt['file_path'] = $this->universal_function()->upload_file($request->file_path);
            }
            DB::table('dokumen_tindakan')->where(function ($query) use ($request, $cnf) {
                $query->where('id', $cnf['data_key']);
            })
                ->update($dtx_a_edt);
        }
        return response()->json(["sukses_pesan" => 'Sukses! Data berhasil ' . $cnf['text1'] . '.'], 200);
    }
    // ================================================================================================================

    // ================================================================================================================
    // nyaa_transfer_internal
    public function nyaa_transfer_internal(Request $request, $mode)
    {
        if ($request->isMethod('get')) {
            return $this->nyaa_transfer_internal_get_handler($request, $mode);
        }
        if ($request->isMethod('post')) {
            return $this->nyaa_transfer_internal_post_handler($request, $mode);
        } else {
            return redirect('/');
        }
    }
    public function nyaa_transfer_internal_get_handler($request, $mode)
    {
        if ($request->ajax()) {
            return $this->nyaa_transfer_internal_getajax_handler($request, $mode);
        }
        return redirect('/');
    }
    public function nyaa_transfer_internal_getajax_handler($request, $mode)
    {

        if ($mode == '1') {
            $dcv = DB::table('transfer_internal_alat_terpasang')
                ->where('reg_no',  $request->reg_no)
                ->where('med_rec',  $request->medrec)
                ->where('kode_transfer_internal', $request->kode_transfer_internal)
                ->where('hapus', 0);
            return DataTables()
                ->of($dcv)
                ->editColumn('aksi_data', function ($query) use ($request, $mode) {
                    return
                        // START
                        ('<button type="button" class="protecc btn btn-sm btn-danger m-1" onclick="nyaa_dlt(this)" nyaa-mode="hapus" ' .
                            'nyaa-dtid="' . $query->id . '" ' .
                            'nyaa-urlhapus="' . route('nyaa_universal.view_injector_support.perawat.nyaa_transfer_internal', [$mode]) . '" ' .
                            '>Hapus</button>')
                        // END
                    ;
                })
                ->editColumn('waktu_alat_terpasang', function ($query) use ($request, $mode) {
                    return
                        // START
                        $this->universal_function()->carbon_format_day_datetime_id($query->waktu_alat_terpasang);
                        // END
                    ;
                })
                ->escapeColumns([])
                ->toJson();
        } elseif ($mode == '2') {
            $dcv = DB::table('transfer_internal_obat_dibawa')
                ->select('*', 'item_id as nama_obat', 'item_unit_code as satuan_obat')
                ->where('reg_no',  $request->reg_no)
                ->where('med_rec',  $request->medrec)
                ->where('kode_transfer_internal', $request->kode_transfer_internal)
                ->where('hapus', 0)->get();
            return DataTables()
                ->of($dcv)
                ->editColumn('aksi_data', function ($query) use ($request, $mode) {
                    return
                        // START
                        ('<button type="button" class="protecc btn btn-sm btn-danger m-1" onclick="nyaa_dlt(this)" nyaa-mode="hapus" ' .
                            'nyaa-dtid="' . $query->id . '" ' .
                            'nyaa-urlhapus="' . route('nyaa_universal.view_injector_support.perawat.nyaa_transfer_internal', [$mode]) . '" ' .
                            '>Hapus</button>')
                        // END
                    ;
                })
                ->editColumn('item_id', function ($query) use ($request, $mode) {
                    return
                        // START
                        $this->universal_function()->get_nama_item_farmasi($query->item_id);
                        // END
                    ;
                })
                // item_unit_code
                ->editColumn('item_unit_code', function ($query) use ($request, $mode) {
                    return
                        // START
                        $this->universal_function()->get_nama_itemunit($query->item_unit_code);
                        // END
                    ;
                })
                ->escapeColumns([])
                ->toJson();
        } elseif ($mode == '3') {
            $dcv = DB::table('transfer_internal_status_pasien')
                ->where('reg_no',  $request->reg_no)
                ->where('med_rec',  $request->medrec)
                ->where('kode_transfer_internal', $request->kode_transfer_internal)
                ->where('hapus', 0);
            return DataTables()
                ->of($dcv)
                ->editColumn('aksi_data', function ($query) use ($request, $mode) {
                    return
                        // START
                        ('<button type="button" class="protecc btn btn-sm btn-danger m-1" onclick="nyaa_dlt(this)" nyaa-mode="hapus" ' .
                            'nyaa-dtid="' . $query->id . '" ' .
                            'nyaa-urlhapus="' . route('nyaa_universal.view_injector_support.perawat.nyaa_transfer_internal', [$mode]) . '" ' .
                            '>Hapus</button>')
                        // END
                    ;
                })
                ->editColumn('waktu', function ($query) use ($request, $mode) {
                    return
                        // START
                        $this->universal_function()->carbon_format_day_datetime_id($query->waktu);
                        // END
                    ;
                })
                ->escapeColumns([])
                ->toJson();
        } elseif ($mode == '4') {
            $dcv = DB::table('transfer_internal_kejadian')
                ->where('reg_no',  $request->reg_no)
                ->where('med_rec',  $request->medrec)
                ->where('kode_transfer_internal', $request->kode_transfer_internal)
                ->where('hapus', 0);
            return DataTables()
                ->of($dcv)
                ->editColumn('aksi_data', function ($query) use ($request, $mode) {
                    return
                        // START
                        ('<button type="button" class="protecc btn btn-sm btn-danger m-1" onclick="nyaa_dlt(this)" nyaa-mode="hapus" ' .
                            'nyaa-dtid="' . $query->id . '" ' .
                            'nyaa-urlhapus="' . route('nyaa_universal.view_injector_support.perawat.nyaa_transfer_internal', [$mode]) . '" ' .
                            '>Hapus</button>')
                        // END
                    ;
                })
                ->editColumn('waktu', function ($query) use ($request, $mode) {
                    return
                        // START
                        $this->universal_function()->carbon_format_day_datetime_id($query->waktu);
                        // END
                    ;
                })
                ->escapeColumns([])
                ->toJson();
        } else if ($mode == '5') {
            $dcv = DB::table('transfer_internal_diagnostik')
                ->where('reg_no',  $request->reg_no)
                ->where('med_rec',  $request->medrec)
                ->where('kode_transfer_internal', $request->kode_transfer_internal)
                ->where('hapus', 0);
            return DataTables()
                ->of($dcv)
                ->editColumn('aksi_data', function ($query) use ($request, $mode) {
                    return
                        // START
                        ('<button type="button" class="protecc btn btn-sm btn-danger m-1" onclick="nyaa_dlt(this)" nyaa-mode="hapus" ' .
                            'nyaa-dtid="' . $query->id . '" ' .
                            'nyaa-urlhapus="' . route('nyaa_universal.view_injector_support.perawat.nyaa_transfer_internal', [$mode]) . '" ' .
                            '>Hapus</button>')
                        // END
                    ;
                })
                ->escapeColumns([])
                ->toJson();
        }

        // tidak ada yang match
        return redirect('/');
    }
    public function nyaa_transfer_internal_post_handler($request, $mode)
    {
        if ($request->ajax()) {
            return $this->nyaa_transfer_internal_postajax_handler($request, $mode);
        }
        return redirect('/');
    }
    public function nyaa_transfer_internal_postajax_handler($request, $mode)
    {

        if ($mode == '1') {
            $nama_db = 'transfer_internal_alat_terpasang';
        } elseif ($mode == '2') {
            $nama_db = 'transfer_internal_obat_dibawa';
        } elseif ($mode == '3') {
            $nama_db = 'transfer_internal_status_pasien';
        } elseif ($mode == '4') {
            $nama_db = 'transfer_internal_kejadian';
        } elseif ($mode == '5') {
            $nama_db = 'transfer_internal_diagnostik';
        } else {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Data Mode tidak ditemukan'], 422);
        }

        if ($request->dt_mode === 'add') {
            $cnf = [
                'mode' => 'add',
                'data_key' => null,
                'text1' => 'ditambahkan',
            ];
        } elseif ($request->dt_mode === 'hapus') {
            // hapus data
            if ($mode == '5') {
                $dt_dlt = DB::table($nama_db)
                    ->where('id', $request->dtid)->update([
                        // log
                        'hapus' => 1,
                        'hapus_at' => $this->universal_function()->carbon_generate_datetime_now(),
                        'deleted_by_username' => auth()->user()->username,
                    ]);
            } else {
                $dtx_a_add = [
                    'reg_no' => $request->reg_no,
                    'med_rec' => $request->med_rec,
                    'kode_transfer_internal' => $request->kode_transfer_internal,

                    // log
                    'aktif' => 1,
                    'aktif_at' => $this->universal_function()->carbon_generate_datetime_now(),
                    'aktif_by_user_name' => Auth::user()->name,

                    'created_at' => $this->universal_function()->carbon_generate_datetime_now(),
                    'created_by_user_name' => Auth::user()->name,

                    'updated_at' => $this->universal_function()->carbon_generate_datetime_now(),
                    'updated_by_user_name' => Auth::user()->name,
                ];

                $dt_dlt = DB::table($nama_db)
                    ->where('id', $request->dtid)->update([
                        // log
                        'aktif' => 0,
                        'aktif_at' => $this->universal_function()->carbon_generate_datetime_now(),
                        'aktif_by_user_name' => auth()->user()->name,

                        'hapus' => 1,
                        'hapus_at' => $this->universal_function()->carbon_generate_datetime_now(),
                        'hapus_by_user_name' => auth()->user()->name,
                    ]);
            }

            return response()->json(["sukses_pesan" => 'Sukses! Data berhasil dihapus.'], 200);
        } else {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Data Mode tidak ditemukan'], 422);
        };

        $rules = [
            'reg_no' => ['required',],
            'med_rec' => ['required',],
            'kode_transfer_internal' => ['required',],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Mohon untuk melengkapi data lalu coba kembali. Detail: ' . $validator->errors()], 422);
        }

        if ($cnf['mode'] === 'add') {
            $dtx_a_add = [
                'reg_no' => $request->reg_no,
                'med_rec' => $request->med_rec,
                'kode_transfer_internal' => $request->kode_transfer_internal,

                // log
                'aktif' => 1,
                'aktif_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'aktif_by_user_name' => Auth::user()->name,

                'created_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'created_by_user_name' => Auth::user()->name,

                'updated_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'updated_by_user_name' => Auth::user()->name,
            ];

            if ($mode == '1') {
                $dtx_a_add['nama_alat_terpasang'] = $request->nama_alat_terpasang;
                $dtx_a_add['waktu_alat_terpasang'] = $request->waktu_alat_terpasang;
            } elseif ($mode == '2') {
                $dtx_a_add['item_id'] = $request->item_id;
                $dtx_a_add['quantity'] = $request->quantity;
                $dtx_a_add['item_unit_code'] = $request->item_unit_code;
            } elseif ($mode == '3') {
                $dtx_a_add['waktu'] = $request->waktu;
                $dtx_a_add['kesadaran'] = $request->kesadaran;
                $dtx_a_add['td'] = $request->td;
                $dtx_a_add['hr'] = $request->hr;
                $dtx_a_add['rr'] = $request->rr;
                $dtx_a_add['spo2'] = $request->spo2;
            } elseif ($mode == '4') {
                $dtx_a_add['waktu'] = $request->waktu;
                $dtx_a_add['kejadian'] = $request->kejadian;
                $dtx_a_add['tindakan'] = $request->tindakan;
            } elseif ($mode == '5') {
                unset($dtx_a_add['aktif']);
                unset($dtx_a_add['aktif_at']);
                unset($dtx_a_add['aktif_by_user_name']);
                unset($dtx_a_add['created_by_user_name']);
                unset($dtx_a_add['updated_by_user_name']);
                $dtx_a_add['created_by_username'] = Auth::user()->username;
                $dtx_a_add['lab'] = $request->transfer_terima_lab;
                $dtx_a_add['lab'] = $request->transfer_terima_lab;
                $dtx_a_add['xray'] = $request->transfer_terima_xray;
                $dtx_a_add['mri'] = $request->transfer_terima_mri;
                $dtx_a_add['ct_scan'] = $request->transfer_terima_ct_scan;
                $dtx_a_add['ekg'] = $request->transfer_terima_ekg;
                $dtx_a_add['echo'] = $request->transfer_terima_echo;
            } else {
                return response()->json(["error_pesan" => 'Terjadi kesalahan! Data Mode tidak ditemukan'], 422);
            }
            DB::table($nama_db)->insert($dtx_a_add);
        }
        return response()->json(["sukses_pesan" => 'Sukses! Data berhasil ' . $cnf['text1'] . '.'], 200);
    }
    // ================================================================================================================
    // nyaa_surat_rujukan
    public function nyaa_surat_rujukan(Request $request, $mode)
    {
        if ($request->isMethod('get')) {
            return $this->nyaa_surat_rujukan_get_handler($request, $mode);
        }
        if ($request->isMethod('post')) {
            return $this->nyaa_surat_rujukan_post_handler($request, $mode);
        } else {
            return redirect('/');
        }
    }
    public function nyaa_surat_rujukan_get_handler($request, $mode)
    {
        if ($request->ajax()) {
            return $this->nyaa_surat_rujukan_getajax_handler($request, $mode);
        }
        return redirect('/');
    }
    public function nyaa_surat_rujukan_getajax_handler($request, $mode)
    {

        if ($mode == '1') {
            $dcv = DB::table('rs_rujukan_alat_terpasang')
                ->where('reg_no',  $request->reg_no)
                ->where('med_rec',  $request->medrec)
                ->where('kode_surat_rujukan', $request->kode_surat_rujukan)
                ->where('hapus', 0);
            return DataTables()
                ->of($dcv)
                ->editColumn('aksi_data', function ($query) use ($request, $mode) {
                    return
                        // START
                        ('<button type="button" class="protecc btn btn-sm btn-danger m-1" onclick="nyaa_dlt(this)" nyaa-mode="hapus" ' .
                            'nyaa-dtid="' . $query->id . '" ' .
                            'nyaa-urlhapus="' . route('nyaa_universal.view_injector_support.perawat.nyaa_surat_rujukan', [$mode]) . '" ' .
                            '>Hapus</button>')
                        // END
                    ;
                })
                ->editColumn('waktu_alat_terpasang', function ($query) use ($request, $mode) {
                    return
                        // START
                        $this->universal_function()->carbon_format_day_datetime_id($query->waktu_alat_terpasang);
                        // END
                    ;
                })
                ->escapeColumns([])
                ->toJson();
        } elseif ($mode == '2') {
            $dcv = DB::table('rs_rujukan_obat_cairan_dibawa')
                ->where('reg_no',  $request->reg_no)
                ->where('med_rec',  $request->medrec)
                ->where('kode_surat_rujukan', $request->kode_surat_rujukan)
                ->where('hapus', 0);
            return DataTables()
                ->of($dcv)
                ->editColumn('aksi_data', function ($query) use ($request, $mode) {
                    return
                        // START
                        ('<button type="button" class="protecc btn btn-sm btn-danger m-1" onclick="nyaa_dlt(this)" nyaa-mode="hapus" ' .
                            'nyaa-dtid="' . $query->id . '" ' .
                            'nyaa-urlhapus="' . route('nyaa_universal.view_injector_support.perawat.nyaa_surat_rujukan', [$mode]) . '" ' .
                            '>Hapus</button>')
                        // END
                    ;
                })
                ->editColumn('item_id', function ($query) use ($request, $mode) {
                    $item_name = $this->universal_function()->get_nama_item_farmasi($query->item_id);
                    return $query->item_id;
                })
                // item_unit_code
                ->editColumn('item_unit_code', function ($query) use ($request, $mode) {
                    $unit_code = $this->universal_function()->get_nama_itemunit($query->item_unit_code);

                    return $query->item_unit_code;
                })
                ->escapeColumns([])
                ->toJson();
        } elseif ($mode == '3') {
            $dcv = DB::table('rs_rujukan_obat_diterima')
                ->where('reg_no',  $request->reg_no)
                ->where('med_rec',  $request->medrec)
                ->where('kode_surat_rujukan', $request->kode_surat_rujukan)
                ->where('hapus', 0);
            return DataTables()
                ->of($dcv)
                ->editColumn('aksi_data', function ($query) use ($request, $mode) {
                    return
                        // START
                        ('<button type="button" class="protecc btn btn-sm btn-danger m-1" onclick="nyaa_dlt(this)" nyaa-mode="hapus" ' .
                            'nyaa-dtid="' . $query->id . '" ' .
                            'nyaa-urlhapus="' . route('nyaa_universal.view_injector_support.perawat.nyaa_surat_rujukan', [$mode]) . '" ' .
                            '>Hapus</button>')
                        // END
                    ;
                })
                ->editColumn('item_id_terima', function ($query) use ($request, $mode) {
                    // $nama_item = $this->universal_function()->get_nama_item_farmasi($query->item_id_terima);

                    return $query->item_id_terima;
                })
                // item_unit_code
                ->editColumn('item_unit_code_terima', function ($query) use ($request, $mode) {
                    $unit_code = $this->universal_function()->get_nama_itemunit($query->item_unit_code_terima);

                    return $query->item_unit_code_terima;
                })
                ->escapeColumns([])
                ->toJson();
        } elseif ($mode == '4') {
            $dcv = DB::table('rs_rujukan_prosedur_operasi')
                ->where('reg_no',  $request->reg_no)
                ->where('med_rec',  $request->medrec)
                ->where('kode_surat_rujukan', $request->kode_surat_rujukan)
                ->where('hapus', 0);
            return DataTables()
                ->of($dcv)
                ->editColumn('aksi_data', function ($query) use ($request, $mode) {
                    return
                        // START
                        ('<button type="button" class="protecc btn btn-sm btn-danger m-1" onclick="nyaa_dlt(this)" nyaa-mode="hapus" ' .
                            'nyaa-dtid="' . $query->id . '" ' .
                            'nyaa-urlhapus="' . route('nyaa_universal.view_injector_support.perawat.nyaa_surat_rujukan', [$mode]) . '" ' .
                            '>Hapus</button>')
                        // END
                    ;
                })
                ->editColumn('waktu_prosedur_operasi', function ($query) use ($request, $mode) {
                    return
                        // START
                        $this->universal_function()->carbon_format_day_datetime_id($query->waktu_prosedur_operasi);
                        // END
                    ;
                })
                ->escapeColumns([])
                ->toJson();
        } elseif ($mode == '5') {
            $dcv = DB::table('rs_rujukan_status_pasien')
                ->where('reg_no',  $request->reg_no)
                ->where('med_rec',  $request->medrec)
                ->where('kode_surat_rujukan', $request->kode_surat_rujukan)
                ->where('hapus', 0);
            return DataTables()
                ->of($dcv)
                ->editColumn('aksi_data', function ($query) use ($request, $mode) {
                    return
                        // START
                        ('<button type="button" class="protecc btn btn-sm btn-danger m-1" onclick="nyaa_dlt(this)" nyaa-mode="hapus" ' .
                            'nyaa-dtid="' . $query->id . '" ' .
                            'nyaa-urlhapus="' . route('nyaa_universal.view_injector_support.perawat.nyaa_surat_rujukan', [$mode]) . '" ' .
                            '>Hapus</button>')
                        // END
                    ;
                })
                ->editColumn('waktu', function ($query) use ($request, $mode) {
                    return
                        // START
                        $this->universal_function()->carbon_format_day_datetime_id($query->waktu);
                        // END
                    ;
                })
                ->escapeColumns([])
                ->toJson();
        }

        // tidak ada yang match
        return redirect('/');
    }
    public function nyaa_surat_rujukan_post_handler($request, $mode)
    {
        if ($request->ajax()) {
            return $this->nyaa_surat_rujukan_postajax_handler($request, $mode);
        }
        return redirect('/');
    }
    public function nyaa_surat_rujukan_postajax_handler($request, $mode)
    {

        if ($mode == '1') {
            $nama_db = 'rs_rujukan_alat_terpasang';
        } elseif ($mode == '2') {
            $nama_db = 'rs_rujukan_obat_cairan_dibawa';
        } elseif ($mode == '3') {
            $nama_db = 'rs_rujukan_obat_diterima';
        } elseif ($mode == '4') {
            $nama_db = 'rs_rujukan_prosedur_operasi';
        } elseif ($mode == '5') {
            $nama_db = 'rs_rujukan_status_pasien';
        } else {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Data Mode tidak ditemukan'], 422);
        }

        if ($request->dt_mode === 'add') {
            $cnf = [
                'mode' => 'add',
                'data_key' => null,
                'text1' => 'ditambahkan',
            ];
        } elseif ($request->dt_mode === 'hapus') {
            // hapus data
            $dtx_a_add = [
                'reg_no' => $request->reg_no,
                'med_rec' => $request->med_rec,
                'kode_surat_rujukan' => $request->kode_surat_rujukan,

                // log
                'aktif' => 1,
                'aktif_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'aktif_by_user_name' => Auth::user()->name,

                'created_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'created_by_user_name' => Auth::user()->name,

                'updated_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'updated_by_user_name' => Auth::user()->name,
            ];

            $dt_dlt = DB::table($nama_db)
                ->where('id', $request->dtid)->update([
                    // log
                    'aktif' => 0,
                    'aktif_at' => $this->universal_function()->carbon_generate_datetime_now(),
                    'aktif_by_user_name' => auth()->user()->name,

                    'hapus' => 1,
                    'hapus_at' => $this->universal_function()->carbon_generate_datetime_now(),
                    'hapus_by_user_name' => auth()->user()->name,
                ]);
            return response()->json(["sukses_pesan" => 'Sukses! Data berhasil dihapus.'], 200);
        } else {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Data Mode tidak ditemukan'], 422);
        };

        $rules = [
            'reg_no' => ['required',],
            'med_rec' => ['required',],
            'kode_surat_rujukan' => ['required',],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Mohon untuk melengkapi data lalu coba kembali. Detail: ' . $validator->errors()], 422);
        }

        if ($cnf['mode'] === 'add') {
            $dtx_a_add = [
                'reg_no' => $request->reg_no,
                'med_rec' => $request->med_rec,
                'kode_surat_rujukan' => $request->kode_surat_rujukan,

                // log
                'aktif' => 1,
                'aktif_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'aktif_by_user_name' => Auth::user()->name,

                'created_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'created_by_user_name' => Auth::user()->name,

                'updated_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'updated_by_user_name' => Auth::user()->name,
            ];

            if ($mode == '1') {
                $dtx_a_add['nama_alat_terpasang'] = $request->nama_alat_terpasang;
                $dtx_a_add['waktu_alat_terpasang'] = $request->waktu_alat_terpasang;
            } elseif ($mode == '2') {
                $dtx_a_add['item_id'] = $request->item_id;
                $dtx_a_add['quantity'] = $request->quantity;
                $dtx_a_add['item_unit_code'] = $request->item_unit_code;
            } elseif ($mode == '3') {
                $dtx_a_add['item_id_terima'] = $request->item_id_terima;
                $dtx_a_add['quantity_terima'] = $request->quantity_terima;
                $dtx_a_add['item_unit_code_terima'] = $request->item_unit_code_terima;
            } elseif ($mode == '4') {
                $dtx_a_add['detail_prosedur_operasi'] = $request->detail_prosedur_operasi;
                $dtx_a_add['waktu_prosedur_operasi'] = $request->waktu_prosedur_operasi;
            } elseif ($mode == '5') {
                $dtx_a_add['waktu'] = $request->waktu;
                $dtx_a_add['kesadaran'] = $request->kesadaran;
                $dtx_a_add['td'] = $request->td;
                $dtx_a_add['hr'] = $request->hr;
                $dtx_a_add['rr'] = $request->rr;
            } else {
                return response()->json(["error_pesan" => 'Terjadi kesalahan! Data Mode tidak ditemukan'], 422);
            }


            $data = DB::table($nama_db)->insert($dtx_a_add);
        }
        return response()->json(["sukses_pesan" => 'Sukses! Data berhasil ' . $cnf['text1'] . '.'], 200);
    }
}
