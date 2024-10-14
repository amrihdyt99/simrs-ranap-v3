<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;

use App\Http\Controllers\ZxcNyaaUniversal\AaaBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SuratRujukanController extends AaaBaseController
{
    function surat_rujukan_dokter(Request $request)
    {
        Log::info('Request data:', $request->all());

        $datapasien = DB::connection('mysql2')
            ->table('m_registrasi')
            ->leftJoin('m_pasien', 'm_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo')
            ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
            ->leftJoin('m_ruangan_baru', 'm_registrasi.service_unit', '=', 'm_ruangan_baru.id')
            ->leftJoin('m_kelas_ruangan_baru', 'm_registrasi.bed', '=', 'm_kelas_ruangan_baru.id')
            ->where('m_registrasi.reg_medrec', $request->medrec)
            ->where('m_registrasi.reg_no', $request->reg_no)
            ->select([
                'm_registrasi.*',
                'm_pasien.*',
                'm_paramedis.ParamedicName',
                'm_paramedis.FeeAmount',
                'm_ruangan_baru.*',
                'm_kelas_ruangan_baru.*',
            ])
            ->first();

        Log::info('Datapasien:', ['data' => $datapasien]);

        if (!$datapasien) {
            return response()->json(['message' => 'Data pasien tidak ditemukan'], 404);
        }

        $surat_rujukan = DB::connection('mysql')
            ->table('rs_rujukan_persiapan_pasien')
            ->join('rs_m_paramedic', 'rs_rujukan_persiapan_pasien.paramediccode', '=', 'rs_m_paramedic.paramediccode')
            ->where('reg_no', $request->reg_no)
            ->select('rs_rujukan_persiapan_pasien.*', 'rs_m_paramedic.ParamedicName')
            ->first();

        Log::info('Surat rujukan:', ['data' => $surat_rujukan]);

        $surat_rujukan_terima = DB::connection('mysql')
            ->table('rs_rujukan_serah_terima')
            ->where('reg_no', $request->reg_no)
            ->first();

        $surat_rujukan_prosedur_operasi = DB::connection('mysql')
            ->table('rs_rujukan_prosedur_operasi')
            ->where('reg_no', $request->reg_no)
            ->when($surat_rujukan && $surat_rujukan->kode_surat_rujukan, function ($query) use ($surat_rujukan) {
                return $query->where('kode_surat_rujukan', $surat_rujukan->kode_surat_rujukan);
            })
            ->get()
            ->map(function ($item) {
                $item->waktu_prosedur_operasi_formatted = $this->universal_function()->carbon_format_day_datetime_id($item->waktu_prosedur_operasi);
                return $item;
            });

        $surat_rujukan_alat_terpasang = DB::connection('mysql')
            ->table('rs_rujukan_alat_terpasang')
            ->where('reg_no', $request->reg_no)
            ->when($surat_rujukan && $surat_rujukan->kode_surat_rujukan, function ($query) use ($surat_rujukan) {
                return $query->where('kode_surat_rujukan', $surat_rujukan->kode_surat_rujukan);
            })
            ->get()
            ->map(function ($item) {
                $item->waktu_alat_terpasang_formatted = $this->universal_function()->carbon_format_day_datetime_id($item->waktu_alat_terpasang);
                return $item;
            });

        $surat_rujukan_obat_diterima = DB::connection('mysql')
            ->table('rs_rujukan_obat_diterima')
            ->where('reg_no', $request->reg_no)
            ->when($surat_rujukan && $surat_rujukan->kode_surat_rujukan, function ($query) use ($surat_rujukan) {
                return $query->where('kode_surat_rujukan', $surat_rujukan->kode_surat_rujukan);
            })
            ->get();

        $surat_rujukan_obat_dibawa = DB::connection('mysql')
            ->table('rs_rujukan_obat_cairan_dibawa')
            ->where('reg_no', $request->reg_no)
            ->when($surat_rujukan && $surat_rujukan->kode_surat_rujukan, function ($query) use ($surat_rujukan) {
                return $query->where('kode_surat_rujukan', $surat_rujukan->kode_surat_rujukan);
            })
            ->get();

        $surat_rujukan_status_pasien = DB::connection('mysql')
            ->table('rs_rujukan_status_pasien')
            ->where('reg_no', $request->reg_no)
            ->when($surat_rujukan && $surat_rujukan->kode_surat_rujukan, function ($query) use ($surat_rujukan) {
                return $query->where('kode_surat_rujukan', $surat_rujukan->kode_surat_rujukan);
            })
            ->get()
            ->map(function ($item) {
                $item->waktu_formatted = $this->universal_function()->carbon_format_day_datetime_id($item->waktu);
                return $item;
            });

        return response()->json(
            [
                'status' => true,
                'data' => [
                    'datapasien' => $datapasien,
                    'surat_rujukan' => $surat_rujukan,
                    'surat_rujukan_terima' => $surat_rujukan_terima,
                    'surat_rujukan_prosedur_operasi' => $surat_rujukan_prosedur_operasi,
                    'surat_rujukan_alat_terpasang' => $surat_rujukan_alat_terpasang,
                    'surat_rujukan_obat_diterima' => $surat_rujukan_obat_diterima,
                    'surat_rujukan_obat_dibawa' => $surat_rujukan_obat_dibawa,
                    'surat_rujukan_status_pasien' => $surat_rujukan_status_pasien,
                ]
            ],
            200
        );
    }

    public function simpanProsedurOperasi(Request $request)
    {
        if ($request->dt_mode === 'add') {
            try {
                // Log received data
                Log::info('Received data:', $request->all());

                $validator = Validator::make($request->all(), [
                    'reg_no' => 'required',
                    'med_rec' => 'required',
                    'kode_surat_rujukan' => 'required',
                    'detailProsedurOperasi' => 'required',
                    'waktuProsedurOperasi' => 'required|date',
                ]);

                if ($validator->fails()) {
                    Log::warning('Validation failed:', $validator->errors()->toArray());
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Validasi gagal',
                        'errors' => $validator->errors()
                    ], 422);
                }

                // Mengambil nama user yang sedang login
                $userName = Auth::check() ? Auth::user()->name : 'Unknown User';
                $currentDateTime = $this->universal_function()->carbon_generate_datetime_now();

                Log::info('Current user:', ['name' => $userName, 'auth_check' => Auth::check()]);

                $id = DB::connection('mysql')->table('rs_rujukan_prosedur_operasi')->insertGetId([
                    'reg_no' => $request->reg_no,
                    'med_rec' => $request->med_rec,
                    'kode_surat_rujukan' => $request->kode_surat_rujukan,
                    'detail_prosedur_operasi' => $request->detailProsedurOperasi,
                    'waktu_prosedur_operasi' => $request->waktuProsedurOperasi,
                    'aktif' => 1,
                    'aktif_at' => $currentDateTime,
                    'aktif_by_user_name' => $userName,
                    'created_at' => $currentDateTime,
                    'created_by_user_name' => $userName,
                    'updated_at' => $currentDateTime,
                    'updated_by_user_name' => $userName,
                ]);

                return response()->json([
                    'status' => 'success', 
                    'message' => 'Data berhasil disimpan',
                    'id' => $id
                ]);
            } catch (\Exception $e) {
                Log::error('Error saving prosedur operasi: ' . $e->getMessage());
                return response()->json(['status' => 'error', 'message' => 'Gagal menyimpan data: ' . $e->getMessage()], 500);
            }
        } elseif ($request->dt_mode === 'hapus') {
            try {
                $currentUser = Auth::user();
                $userName = $currentUser ? $currentUser->name : 'System';
                $currentDateTime = $this->universal_function()->carbon_generate_datetime_now();

                // Validasi ID
                $id = $request->input('dtid');
                Log::info('Received ID for deletion: ' . $id); // Tambahkan log ini

                if (!$id || $id === 'undefined' || !is_numeric($id)) {
                    return response()->json(['status' => 'error', 'message' => 'ID tidak valid'], 400);
                }

                $affected = DB::connection('mysql')->table('rs_rujukan_prosedur_operasi')
                    ->where('id', $id)
                    ->update([
                        'aktif' => 0,
                        'aktif_at' => $currentDateTime,
                        'aktif_by_user_name' => $userName,
                        'hapus' => 1,
                        'hapus_at' => $currentDateTime,
                        'hapus_by_user_name' => $userName,
                    ]);

                if ($affected === 0) {
                    return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan'], 404);
                }

                return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus']);
            } catch (\Exception $e) {
                Log::error('Error deleting prosedur operasi: ' . $e->getMessage());
                return response()->json(['status' => 'error', 'message' => 'Gagal menghapus data: ' . $e->getMessage()], 500);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Mode tidak valid'], 400);
        }
    }

    public function simpanAlatTerpasang(Request $request)
    {
        if ($request->dt_mode === 'add') {
            try {
                // Log received data
                Log::info('Received data:', $request->all());

                $validator = Validator::make($request->all(), [
                    'reg_no' => 'required',
                    'med_rec' => 'required',
                    'kode_surat_rujukan' => 'required',
                    'nama_alat_terpasang' => 'required',
                    'waktu_alat_terpasang' => 'required|date',
                ]);

                if ($validator->fails()) {
                    Log::warning('Validation failed:', $validator->errors()->toArray());
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Validasi gagal',
                        'errors' => $validator->errors()
                    ], 422);
                }

                // Mengambil nama user yang sedang login
                $userName = Auth::check() ? Auth::user()->name : 'Unknown User';
                $currentDateTime = $this->universal_function()->carbon_generate_datetime_now();

                Log::info('Current user:', ['name' => $userName, 'auth_check' => Auth::check()]);

                $id = DB::connection('mysql')->table('rs_rujukan_alat_terpasang')->insertGetId([
                    'reg_no' => $request->reg_no,
                    'med_rec' => $request->med_rec,
                    'kode_surat_rujukan' => $request->kode_surat_rujukan,
                    'nama_alat_terpasang' => $request->nama_alat_terpasang,
                    'waktu_alat_terpasang' => $request->waktu_alat_terpasang,
                    'aktif' => 1,
                    'aktif_at' => $currentDateTime,
                    'aktif_by_user_name' => $userName,
                    'created_at' => $currentDateTime,
                    'created_by_user_name' => $userName,
                    'updated_at' => $currentDateTime,
                    'updated_by_user_name' => $userName,
                ]);

                return response()->json([
                    'status' => 'success', 
                    'message' => 'Data berhasil disimpan',
                    'id' => $id
                ]);
            } catch (\Exception $e) {
                Log::error('Error saving alat terpasang: ' . $e->getMessage());
                return response()->json(['status' => 'error', 'message' => 'Gagal menyimpan data: ' . $e->getMessage()], 500);
            }
        } elseif ($request->dt_mode === 'hapus') {
            try {
                $currentUser = Auth::user();
                $userName = $currentUser ? $currentUser->name : 'System';
                $currentDateTime = $this->universal_function()->carbon_generate_datetime_now();

                // Validasi ID
                $id = $request->input('dtid');
                Log::info('Received ID for deletion: ' . $id);

                if (!$id || $id === 'undefined' || !is_numeric($id)) {
                    return response()->json(['status' => 'error', 'message' => 'ID tidak valid'], 400);
                }

                $affected = DB::connection('mysql')->table('rs_rujukan_alat_terpasang')
                    ->where('id', $id)
                    ->update([
                        'aktif' => 0,
                        'aktif_at' => $currentDateTime,
                        'aktif_by_user_name' => $userName,
                        'hapus' => 1,
                        'hapus_at' => $currentDateTime,
                        'hapus_by_user_name' => $userName,
                    ]);

                if ($affected === 0) {
                    return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan'], 404);
                }

                return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus']);
            } catch (\Exception $e) {
                Log::error('Error deleting alat terpasang: ' . $e->getMessage());
                return response()->json(['status' => 'error', 'message' => 'Gagal menghapus data: ' . $e->getMessage()], 500);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Mode tidak valid'], 400);
        }
    }

    public function simpanObatDiterima(Request $request)
    {
        if ($request->dt_mode === 'add') {
            try {
                // Log received data
                Log::info('Received data:', $request->all());

                $validator = Validator::make($request->all(), [
                    'reg_no' => 'required',
                    'med_rec' => 'required',
                    'kode_surat_rujukan' => 'required',
                    'item_id_terima' => 'required',
                    'quantity_terima' => 'required|numeric',
                    'item_unit_code_terima' => 'required',
                ]);

                if ($validator->fails()) {
                    Log::warning('Validation failed:', $validator->errors()->toArray());
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Validasi gagal',
                        'errors' => $validator->errors()
                    ], 422);
                }

                // Mengambil nama user yang sedang login
                $userName = Auth::check() ? Auth::user()->name : 'Unknown User';
                $currentDateTime = $this->universal_function()->carbon_generate_datetime_now();

                Log::info('Current user:', ['name' => $userName, 'auth_check' => Auth::check()]);

                $id = DB::connection('mysql')->table('rs_rujukan_obat_diterima')->insertGetId([
                    'reg_no' => $request->reg_no,
                    'med_rec' => $request->med_rec,
                    'kode_surat_rujukan' => $request->kode_surat_rujukan,
                    'item_id_terima' => $request->item_id_terima,
                    'quantity_terima' => $request->quantity_terima,
                    'item_unit_code_terima' => $request->item_unit_code_terima,
                    'aktif' => 1,
                    'aktif_at' => $currentDateTime,
                    'aktif_by_user_name' => $userName,
                    'created_at' => $currentDateTime,
                    'created_by_user_name' => $userName,
                    'updated_at' => $currentDateTime,
                    'updated_by_user_name' => $userName,
                ]);

                return response()->json([
                    'status' => 'success', 
                    'message' => 'Data berhasil disimpan',
                    'id' => $id
                ]);
            } catch (\Exception $e) {
                Log::error('Error saving obat diterima: ' . $e->getMessage());
                return response()->json(['status' => 'error', 'message' => 'Gagal menyimpan data: ' . $e->getMessage()], 500);
            }
        } elseif ($request->dt_mode === 'hapus') {
            try {
                $currentUser = Auth::user();
                $userName = $currentUser ? $currentUser->name : 'System';
                $currentDateTime = $this->universal_function()->carbon_generate_datetime_now();

                // Validasi ID
                $id = $request->input('dtid');
                Log::info('Received ID for deletion: ' . $id);

                if (!$id || $id === 'undefined' || !is_numeric($id)) {
                    return response()->json(['status' => 'error', 'message' => 'ID tidak valid'], 400);
                }

                $affected = DB::connection('mysql')->table('rs_rujukan_obat_diterima')
                    ->where('id', $id)
                    ->update([
                        'aktif' => 0,
                        'aktif_at' => $currentDateTime,
                        'aktif_by_user_name' => $userName,
                        'hapus' => 1,
                        'hapus_at' => $currentDateTime,
                        'hapus_by_user_name' => $userName,
                    ]);

                if ($affected === 0) {
                    return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan'], 404);
                }

                return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus']);
            } catch (\Exception $e) {
                Log::error('Error deleting obat diterima: ' . $e->getMessage());
                return response()->json(['status' => 'error', 'message' => 'Gagal menghapus data: ' . $e->getMessage()], 500);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Mode tidak valid'], 400);
        }
    }

    public function simpanObatCairanDibawa(Request $request)
    {
        if ($request->dt_mode === 'add') {
            try {
                // Log received data
                Log::info('Received data:', $request->all());

                $validator = Validator::make($request->all(), [
                    'reg_no' => 'required',
                    'med_rec' => 'required',
                    'kode_surat_rujukan' => 'required',
                    'item_id' => 'required',
                    'quantity' => 'required|numeric',
                    'item_unit_code' => 'required',
                ]);

                if ($validator->fails()) {
                    Log::warning('Validation failed:', $validator->errors()->toArray());
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Validasi gagal',
                        'errors' => $validator->errors()
                    ], 422);
                }

                // Mengambil nama user yang sedang login
                $userName = Auth::check() ? Auth::user()->name : 'Unknown User';
                $currentDateTime = $this->universal_function()->carbon_generate_datetime_now();

                Log::info('Current user:', ['name' => $userName, 'auth_check' => Auth::check()]);

                $id = DB::connection('mysql')->table('rs_rujukan_obat_cairan_dibawa')->insertGetId([
                    'reg_no' => $request->reg_no,
                    'med_rec' => $request->med_rec,
                    'kode_surat_rujukan' => $request->kode_surat_rujukan,
                    'item_id' => $request->item_id,
                    'quantity' => $request->quantity,
                    'item_unit_code' => $request->item_unit_code,
                    'aktif' => 1,
                    'aktif_at' => $currentDateTime,
                    'aktif_by_user_name' => $userName,
                    'created_at' => $currentDateTime,
                    'created_by_user_name' => $userName,
                    'updated_at' => $currentDateTime,
                    'updated_by_user_name' => $userName,
                ]);

                return response()->json([
                    'status' => 'success', 
                    'message' => 'Data berhasil disimpan',
                    'id' => $id
                ]);
            } catch (\Exception $e) {
                Log::error('Error saving obat cairan dibawa: ' . $e->getMessage());
                return response()->json(['status' => 'error', 'message' => 'Gagal menyimpan data: ' . $e->getMessage()], 500);
            }
        } elseif ($request->dt_mode === 'hapus') {
            try {
                $currentUser = Auth::user();
                $userName = $currentUser ? $currentUser->name : 'System';
                $currentDateTime = $this->universal_function()->carbon_generate_datetime_now();

                // Validasi ID
                $id = $request->input('dtid');
                Log::info('Received ID for deletion: ' . $id);

                if (!$id || $id === 'undefined' || !is_numeric($id)) {
                    return response()->json(['status' => 'error', 'message' => 'ID tidak valid'], 400);
                }

                $affected = DB::connection('mysql')->table('rs_rujukan_obat_cairan_dibawa')
                    ->where('id', $id)
                    ->update([
                        'aktif' => 0,
                        'aktif_at' => $currentDateTime,
                        'aktif_by_user_name' => $userName,
                        'hapus' => 1,
                        'hapus_at' => $currentDateTime,
                        'hapus_by_user_name' => $userName,
                    ]);

                if ($affected === 0) {
                    return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan'], 404);
                }

                return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus']);
            } catch (\Exception $e) {
                Log::error('Error deleting obat cairan dibawa: ' . $e->getMessage());
                return response()->json(['status' => 'error', 'message' => 'Gagal menghapus data: ' . $e->getMessage()], 500);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Mode tidak valid'], 400);
        }
    }

    public function simpanStatusPasien(Request $request)
    {
        if ($request->dt_mode === 'add') {
            try {
                // Log received data
                Log::info('Received data:', $request->all());

                $validator = Validator::make($request->all(), [
                    'reg_no' => 'required',
                    'med_rec' => 'required',
                    'kode_surat_rujukan' => 'required',
                    'waktu' => 'required',
                    'kesadaran' => 'required',
                    'td' => 'required',
                    'hr' => 'required',
                    'rr' => 'required',
                ]);

                if ($validator->fails()) {
                    Log::warning('Validation failed:', $validator->errors()->toArray());
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Validasi gagal',
                        'errors' => $validator->errors()
                    ], 422);
                }

                // Mengambil nama user yang sedang login
                $userName = Auth::check() ? Auth::user()->name : 'Unknown User';
                $currentDateTime = $this->universal_function()->carbon_generate_datetime_now();

                Log::info('Current user:', ['name' => $userName, 'auth_check' => Auth::check()]);

                $id = DB::connection('mysql')->table('rs_rujukan_status_pasien')->insertGetId([
                    'reg_no' => $request->reg_no,
                    'med_rec' => $request->med_rec,
                    'kode_surat_rujukan' => $request->kode_surat_rujukan,
                    'waktu' => $request->waktu,
                    'kesadaran' => $request->kesadaran,
                    'td' => $request->td,
                    'hr' => $request->hr,
                    'rr' => $request->rr,
                    'aktif' => 1,
                    'aktif_at' => $currentDateTime,
                    'aktif_by_user_name' => $userName,
                    'created_at' => $currentDateTime,
                    'created_by_user_name' => $userName,
                    'updated_at' => $currentDateTime,
                    'updated_by_user_name' => $userName,
                ]);

                return response()->json([
                    'status' => 'success', 
                    'message' => 'Data berhasil disimpan',
                    'id' => $id
                ]);
            } catch (\Exception $e) {
                Log::error('Error saving status pasien: ' . $e->getMessage());
                return response()->json(['status' => 'error', 'message' => 'Gagal menyimpan data: ' . $e->getMessage()], 500);
            }
        } elseif ($request->dt_mode === 'hapus') {
            try {
                $currentUser = Auth::user();
                $userName = $currentUser ? $currentUser->name : 'System';
                $currentDateTime = $this->universal_function()->carbon_generate_datetime_now();

                // Validasi ID
                $id = $request->input('dtid');
                Log::info('Received ID for deletion: ' . $id);

                if (!$id || $id === 'undefined' || !is_numeric($id)) {
                    return response()->json(['status' => 'error', 'message' => 'ID tidak valid'], 400);
                }

                $affected = DB::connection('mysql')->table('rs_rujukan_status_pasien')
                    ->where('id', $id)
                    ->update([
                        'aktif' => 0,
                        'aktif_at' => $currentDateTime,
                        'aktif_by_user_name' => $userName,
                        'hapus' => 1,
                        'hapus_at' => $currentDateTime,
                        'hapus_by_user_name' => $userName,
                    ]);

                if ($affected === 0) {
                    return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan'], 404);
                }

                return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus']);
            } catch (\Exception $e) {
                Log::error('Error deleting status pasien: ' . $e->getMessage());
                return response()->json(['status' => 'error', 'message' => 'Gagal menghapus data: ' . $e->getMessage()], 500);
            }
        } else {
            return response()->json(['status' => 'error', 'message' => 'Mode tidak valid'], 400);
        }
    }


}