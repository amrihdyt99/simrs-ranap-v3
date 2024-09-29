<?php

namespace App\Http\Controllers\NewDokter;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewDischargeController extends Controller
{
    function reset_discharge($no)
    {
        $no = str_replace("_", "/", $no);
        try {
            DB::connection('mysql')->table('rs_pasien_discharge')->where('pdischarge_reg', $no)->delete();
            // DB::connection('mysql')->table('rs_pasien_resume')->where('reg_no', $no)->delete();
            return response()->json([
                'success' => true
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false
            ]);
        }
    }

    function add_discharge(Request $request)
    {
        $paramsdischarge = array(
            'pdischarge_reg' => $request->reg_no,
            'pdischarge_dokter' => $request->kode_dokter,
            'pdischarge_tgl_mati' => $request->tgl_mati,
            'pdischarge_jam_mati' => $request->jam_mati,
            'pdischarge_condition' => $request->condition,
            'pdischarge_method' => $request->alasan,
            'pdischarge_med_notes' => $request->med_note,
            'pdischarge_notes' => $request->note,
            'pdischarge_tgl' => $request->tgl,
            'pdischarge_jam' => $request->jam,
            'created_at' => date('Y-m-d')
        );

        $simpandischarge = DB::connection('mysql')
            ->table('rs_pasien_discharge')
            ->insert($paramsdischarge);

        if ($simpandischarge) {
            // Update status reg_discharge pada tabel m_registrasi
            $updateRegDischarge = DB::connection('mysql2')
                ->table('m_registrasi')
                ->where('reg_no', $request->reg_no)
                ->update(['reg_discharge' => 1]);

            if ($updateRegDischarge) {
                return response()->json([
                    'success' => true
                ]);
            } else {
                return response()->json([
                    'success' => false
                ]);
            }
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }

    public function dataOpenDischargeRequest(Request $request){
        try {
            $data = DB::table('rs_pasien_discharge_open as a');

            if ($request->start && $request->end) {
                $data = $data->whereDate('created_at', '>=', $request->start)
                    ->whereDate('created_at', '>=', $request->end);
            }

            if (isset($request->reg_no)) {
                $data = $data->whereDate('reg_no', $request->reg_no);
            }

            $data = $data
                ->select([
                    'a.*',
                    DB::raw("(select reg_medrec from ".getDatabase('master').".m_registrasi where reg_no = reg_no limit 1) as reg_medrec"),
                ])
                ->get();

            foreach ($data as $key => $value) {
                $data[$key]->requester_name = $value->created_by;
                $data[$key]->patient_name = DB::connection('mysql2')
                    ->table('m_pasien')
                    ->where('MedicalNo', $value->reg_medrec)
                    ->first()
                    ->PatientName;
            }

            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function openDischargeRequest(Request $request){
        try {
            $check_ = DB::table('rs_pasien_discharge_open')
                ->where('reg_no', $request->reg_no)
                ->where('is_open', 0)
                ->where('status', 'waiting')
                ->first();
                
            if (isset($check_)) {
                return [
                    'success' => false,
                    'msg' => 'Permintaan tidak bisa diproses, saat ini masih ada pengajuan open discharge yang aktif. Mohon hubungi bagian Rekam Medis.'
                ];
            }

            $data = [
                'reg_no' => $request->reg_no,
                'requester' => $request->requester,
                'reason' => $request->reason,
                'status' => 'waiting',
                'created_by' => $request->name,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $store = DB::table('rs_pasien_discharge_open')
                ->insert($data);

            if (isset($store)) {
                return [
                    'success' => true,
                    'msg' => 'Data berhasil disimpan'
                ];
            }

            return [
                'success' => true,
                'msg' => 'Data gagal disimpan'
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    public function openDischargeApprove(Request $request){
        try {
            if (!$request->id && !$request->reg_no) {
                return [
                    'code' => 500,
                    'success' => false,
                    'message' => 'Approval gagal disimpan, tidak ada id & nomor registrasi yang dikirimkan'
                ];
            }

            $checkPayment = checkPaymentStatus($request->prescribe_reg);

            if (isset($checkPayment) && $checkPayment->pvalidation_status == 1) {
                return [
                    'code' => 500,
                    'success' => false,
                    'message' => 'Approval gagal disimpan, pembayaran sudah diselesaikan oleh bagian kasir'
                ];
            }

            $check_ = DB::table('rs_pasien_discharge_open')
                ->where('id', $request->id)
                ->where('is_open', 1)
                ->first();
                
            if (isset($check_)) {
                return [
                    'success' => false,
                    'msg' => 'Permintaan open discharge ini sudah disetujui'
                ];
            }

            $data = [
                'is_open' => $request->is_open,
                'status' => $request->is_open == 1 ? 'success' : 'failed',
                'open_by' => $request->open_by,
                'open_at' => $request->open_at,
                'open_text' => $request->open_text,
                'updated_by' => $request->open_by,
            ];

            $store = DB::table('rs_pasien_discharge_open')
                ->where('id', $request->id)
                ->update($data);

            if (isset($store)) {
                $updateDischarge = DB::connection('mysql2')
                    ->table('m_registrasi')
                    ->where('reg_no', $request->reg_no)
                    ->update([
                        'reg_discharge' => 0
                    ]);

                return [
                    'success' => true,
                    'msg' => 'Data berhasil disimpan'
                ];
            }

            return [
                'success' => true,
                'msg' => 'Data gagal disimpan'
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
