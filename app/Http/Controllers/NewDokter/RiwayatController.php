<?php

namespace App\Http\Controllers\NewDokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\NewDokter\OrderObatController;


class RiwayatController extends Controller
{
    public function getRiwayatPenunjang(Request $request)
    {
        try {
            $regno = $request->input('regno');
            
            $penunjang = DB::connection('mysql')
                ->table('job_orders as jo')
                ->join('job_orders_dt as jod', 'jo.order_no', '=', 'jod.order_no')
                ->select('jo.order_no', 'jo.reg_no', 'jo.waktu_order', 'jod.jenis_order', 'jo.kode_dokter')
                ->where('jo.reg_no', $regno)
                ->groupBy('jo.order_no', 'jo.reg_no', 'jo.waktu_order', 'jod.jenis_order', 'jo.kode_dokter')
                ->get();

            // Ambil nama dokter dari database mysql2
            $kodeDokter = $penunjang->pluck('kode_dokter')->unique()->toArray();
            $namaDokter = DB::connection('mysql2')
                ->table('m_paramedis')
                ->whereIn('ParamedicCode', $kodeDokter)
                ->pluck('ParamedicName', 'ParamedicCode')
                ->toArray();

            $result = $penunjang->map(function ($item) use ($namaDokter) {
                return [
                    'order_no' => $item->order_no,
                    'waktu_order' => $item->waktu_order,
                    'jenis_order' => $item->jenis_order,
                    'nama_dokter' => $namaDokter[$item->kode_dokter] ?? 'Tidak diketahui'
                ];
            });

            return response()->json([
                'data' => $result
            ]);
        } catch (\Exception $e) {
            Log::error('Error in getPenunjang: ' . $e->getMessage());
            return response()->json([
                'error' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getRiwayatSoap(Request $request)
    {
        try {
            $regno = $request->input('regno');
            
            $riwayatSoap = DB::connection('mysql')
                ->table('rs_pasien_cppt')
                ->select(
                    'soapdok_id',
                    'soap_tanggal',
                    'soap_waktu',
                    'nama_ppa',
                    'soapdok_subject',
                    'soapdok_object',
                    'soapdok_assesment',
                    'soapdok_planning',
                    'soapdok_instruksi',
                    'bertindak_sebagai',
                    'is_dokter'
                )
                ->where('soapdok_reg', $regno)
                ->where('status_review', '!=', '99')
                ->where('is_dokter', 1)
                ->orderBy('soap_tanggal', 'desc')
                ->orderBy('soap_waktu', 'desc')
                ->get();

            $call_tindakan = new OrderObatController;

            $result = $riwayatSoap->map(function ($item) use ($request, $call_tindakan) {
                $request->merge([
                    'plain_data' => true,
                    'id_cppt' => $item->soapdok_id,
                ]);

                $tindakanPenunjang = [];
                foreach (['lab', 'radiologi', 'obat', 'lainnya'] as $jenis_order) {
                    $request->merge(['jenisorder' => $jenis_order]);
                    $tindakanPenunjang[$jenis_order] = $call_tindakan->getOrderTindakanJenis($request);
                }

                return [
                    'tanggal_kunjungan' => $item->soap_tanggal . ' ' . $item->soap_waktu,
                    'ppa' => $item->nama_ppa,
                    'pemeriksaan' => [
                        'S' => $item->soapdok_subject,
                        'O' => $item->soapdok_object,
                        'A' => $item->soapdok_assesment,
                        'P' => $item->soapdok_planning
                    ],
                    'instruksi_ppa' => $item->soapdok_instruksi,
                    'tindakan_penunjang' => $tindakanPenunjang,
                    'bertindak_sebagai' => $item->bertindak_sebagai,
                    'is_dokter' => $item->is_dokter
                ];
            });

            return response()->json([
                'data' => $result
            ]);
        } catch (\Exception $e) {
            Log::error('Error in getRiwayatSoap: ' . $e->getMessage());
            return response()->json([
                'error' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getRiwayatObat(Request $request)
    {
        try {
            $regno = $request->input('regno');
            
            $riwayatObat = DB::connection('mysql')
                ->table('job_orders as jo')
                ->join('job_orders_dt as jod', 'jo.order_no', '=', 'jod.order_no')
                ->select(
                    'jo.order_no',
                    'jo.reg_no',
                    'jo.waktu_order',
                    'jod.item_name',
                    'jod.qty',
                    'jod.dosis',
                    'jod.hari',
                    'jod.ket_dosis',
                    'jod.instruksi_khusus',
                    'jod.dokter_order'
                )
                ->where('jo.reg_no', $regno)
                ->where('jod.jenis_order', 'obat')
                ->orderBy('jo.waktu_order', 'desc')
                ->get();

            $kodeDokter = $riwayatObat->pluck('dokter_order')->unique()->filter()->values();

            $namaDokter = DB::connection('mysql2')
                ->table('m_paramedis')
                ->whereIn('ParamedicCode', $kodeDokter)
                ->pluck('ParamedicName', 'ParamedicCode')
                ->toArray();

            $result = $riwayatObat->map(function ($item) use ($namaDokter) {
                return [
                    'waktu_order' => $item->waktu_order,
                    'item_name' => $item->item_name,
                    'qty' => $item->qty,
                    'aturan_pakai' => $item->dosis . ' ' . $item->hari . ' ' . $item->ket_dosis,
                    'keterangan' => $item->instruksi_khusus,
                    'dpjp' => $namaDokter[$item->dokter_order] ?? 'Tidak diketahui'
                ];
            });

            return response()->json([
                'data' => $result
            ]);
        } catch (\Exception $e) {
            Log::error('Error in getRiwayatObat: ' . $e->getMessage());
            return response()->json([
                'error' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}
