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
}
