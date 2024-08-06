<?php

namespace App\Http\Controllers\ICU;

use App\Http\Controllers\Controller;
use App\Models\IhTandaVital;
use App\Models\IhGkp;
use Illuminate\Http\Request;

class IntruksiHarianController extends Controller
{
    public function saveTandaVital()
    {
        try {
            request()->validate([
                'reg_no' => 'required',
                'reg_medrec' => 'required',
                'data' => 'required',
            ],[
                'required' => 'Data :attribute tidak boleh kosong'
            ]);
            $data = [
                'reg_no' => request('reg_no'),
                'reg_medrec' => request('reg_medrec'),
                'tanda_vital' => request('data'),
                'tanda_vital_date' => date('Y-m-d'),
                'tanda_vital_time' => date('H:i:s'),
            ];
            $checkDate = IhTandaVital::where('reg_no', request('reg_no'))->whereDate('tanda_vital_date', date('Y-m-d'))->first();
            if ($checkDate) {
                $checkDate->update($data);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Berhasil menyimpan tanda vital',
                    'data' => $checkDate
                ]);
            }
            $tandaVital = IhTandaVital::create($data);
            if (!$tandaVital) throw new \Exception('Gagal menyimpan tanda vital');
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menyimpan tanda vital',
                'data' => $tandaVital
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function saveGkp()
    {
        try {
            request()->validate([
                'reg_no' => 'required',
                'reg_medrec' => 'required',
                'data' => 'required',
            ],[
                'required' => 'Data :attribute tidak boleh kosong'
            ]);
            $data = [
                'reg_no' => request('reg_no'),
                'reg_medrec' => request('reg_medrec'),
                'gkp' => request('data'),
                'gkp_date' => date('Y-m-d'),
                'gkp_time' => date('H:i:s'),
            ];
            $checkDate = IhGkp::where('reg_no', request('reg_no'))->whereDate('gkp_date', date('Y-m-d'))->first();
            if ($checkDate) {
                $checkDate->update($data);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Berhasil menyimpan gkp',
                    'data' => $checkDate
                ]);
            }
            $tandaVital = IhGkp::create($data);
            if (!$tandaVital) throw new \Exception('Gagal menyimpan gkp');
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menyimpan gkp',
                'data' => $tandaVital
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function getTandaVital()
    {
        try {
            request()->validate([
                'reg_no' => 'required',
                'reg_medrec' => 'required',
                'date' => 'required',
            ],[
                'required' => 'Data :attribute tidak boleh kosong'
            ]);

            $tandaVital = IhTandaVital::where('reg_no', request('reg_no'))->whereDate('tanda_vital_date', request('date'))->first();

            if (!$tandaVital) throw new \Exception('Tanda vital tidak ditemukan');

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mendapatkan tanda vital',
                'data' => $tandaVital
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function getGkp()
    {
        try {
            request()->validate([
                'reg_no' => 'required',
                'reg_medrec' => 'required',
                'date' => 'required',
            ],[
                'required' => 'Data :attribute tidak boleh kosong'
            ]);

            $gkp = IhGkp::where('reg_no', request('reg_no'))->whereDate('gkp_date', request('date'))->first();

            if (!$gkp) throw new \Exception('Gkp tidak ditemukan');

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mendapatkan gkp',
                'data' => $gkp
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }
}
