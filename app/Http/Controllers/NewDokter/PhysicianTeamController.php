<?php

namespace App\Http\Controllers\NewDokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhysicianTeamController extends Controller
{

    public function addPhysicianTeamDokter(Request $request)
    {
        $data = $request->validate([
            'kode_dokter' => 'required',
            'kategori' => 'required',
            'regno' => 'required',
        ]);

        try {
            DB::connection('mysql2')->table('m_physician_team')->insert([
                'kode_dokter' => $data['kode_dokter'],
                'kategori' => $data['kategori'],
                'reg_no' => $data['regno'],
                'created_at' => now(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data tim dokter berhasil ditambahkan',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function deletePhysicianTeamDokter($id)
    {
        try {
            $deleted = DB::connection('mysql2')->table('m_physician_team')
                ->where('id', $id)
                ->delete();

            if ($deleted) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data tim dokter berhasil dihapus',
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function saveKonsul(Request $request)
    {
        $data = $request->validate([
            'reg_no' => 'required',
            'tanggal_konsul' => 'nullable|date',
            'isi_konsul' => 'nullable|string',
            'tanggal_jawaban_konsul' => 'nullable|date',
            'jawaban_konsul' => 'nullable|string',
        ]);

        try {
            // Cari dokter konsul untuk registrasi ini
            $konsulDokter = DB::connection('mysql2')->table('m_physician_team')
                ->where('reg_no', $data['reg_no'])
                ->where('kategori', 'Konsul')
                ->first();

            if (!$konsulDokter) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak ada Dokter Konsul yang terdaftar untuk registrasi ini.',
                ], 422);
            }

            $konsulData = [
                'reg_no' => $data['reg_no'],
                'kode_dokter' => $konsulDokter->kode_dokter,
                'updated_at' => now(),
            ];

            if (isset($data['tanggal_konsul'])) {
                $konsulData['tanggal_konsul'] = $data['tanggal_konsul'];
            }
            if (isset($data['isi_konsul'])) {
                $konsulData['isi_konsul'] = $data['isi_konsul'];
            }
            if (isset($data['tanggal_jawaban_konsul'])) {
                $konsulData['tanggal_jawaban_konsul'] = $data['tanggal_jawaban_konsul'];
            }
            if (isset($data['jawaban_konsul'])) {
                $konsulData['jawaban_konsul'] = $data['jawaban_konsul'];
            }

            DB::connection('mysql2')->table('m_physician_team_konsul')->updateOrInsert(
                ['reg_no' => $data['reg_no'], 'kode_dokter' => $konsulDokter->kode_dokter],
                $konsulData
            );

            return response()->json([
                'success' => true,
                'message' => 'Data konsul berhasil disimpan',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function getKonsul(Request $request)
    {
        $data = $request->validate([
            'reg_no' => 'required',
        ]);

        try {
            $konsulDokter = DB::connection('mysql2')->table('m_physician_team')
                ->where('reg_no', $data['reg_no'])
                ->where('kategori', 'Konsul')
                ->first();

            if (!$konsulDokter) {
                return response()->json([
                    'success' => true,
                    'data' => null,
                    'message' => 'Belum ada dokter konsul yang terdaftar untuk registrasi ini.',
                ]);
            }

            $konsul = DB::connection('mysql2')->table('m_physician_team_konsul')
                ->where('reg_no', $data['reg_no'])
                ->where('kode_dokter', $konsulDokter->kode_dokter)
                ->first();

            if (!$konsul) {
                return response()->json([
                    'success' => true,
                    'data' => null,
                    'message' => 'Belum ada data konsul untuk registrasi ini.',
                ]);
            }

            $jawabanEnabled = !empty($konsul->isi_konsul);

            return response()->json([
                'success' => true,
                'data' => $konsul,
                'jawabanEnabled' => $jawabanEnabled,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function addKonsulDokter(Request $request)
    {
        $data = $request->validate([
            'parent_id' => 'required',
            'kode_dokter' => 'required',
            'catatan' => 'nullable',
            'regno' => 'required',
        ]);

        try {
            $parentDokter = DB::connection('mysql2')->table('m_physician_team')
                ->where('id', $data['parent_id'])
                ->first();

            if (!$parentDokter) {
                return response()->json([
                    'success' => false,
                    'message' => 'Dokter konsul tidak ditemukan',
                ], 404);
            }

            DB::connection('mysql2')->table('m_physician_team')->insert([
                'kode_dokter' => $data['kode_dokter'],
                'kategori' => $parentDokter->kategori,
                'reg_no' => $data['regno'],
                'parent_id' => $data['parent_id'],
                'catatan' => $data['catatan'],
                'created_at' => now(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data konsul dokter berhasil ditambahkan',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function getPhysicianTeam(Request $request)
    {
        $data = $request->validate([
            'regno' => 'required',
        ]);

        try {
            $physicianTeam = DB::connection('mysql2')
                ->table('m_physician_team as mpt')
                ->leftJoin('m_paramedic as mp', 'mpt.kode_dokter', '=', 'mp.ParamedicCode')
                ->where('mpt.reg_no', $data['regno'])
                ->select('mpt.*', 'mp.ParamedicName')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $physicianTeam,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }
}