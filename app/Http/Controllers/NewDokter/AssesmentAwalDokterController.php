<?php

namespace App\Http\Controllers\NewDokter;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssesmentAwalDokterController extends Controller
{
    function del_diagnosa($id)
    {
        try {
            DB::connection('mysql')->table('rs_pasien_diagnosa')->where('pdiag_id', $id)->update([
                'pdiag_deleted' => 1,
                'updated_at' => now(),
            ]);
            return response()->json(
                ['success' => true]
            );
        } catch (\Throwable $th) {
            return response()->json(
                ['success' => false]
            );
        }
    }
    function del_prosedur($id)
    {
        try {
            DB::connection('mysql')->table('rs_pasien_prosedur')->where('pprosedur_id', $id)->update([
                'pprosedur_deleted' => 1,
                'updated_at' => now(),
            ]);
            return response()->json(
                ['success' => true]
            );
        } catch (\Throwable $th) {
            return response()->json(
                ['success' => false]
            );
        }
    }

    function get_diagnosa(Request $request, $reg)
    {
        $reg = str_replace("_", "/", $reg);
        $data =  DB::connection('mysql')->table('rs_pasien_diagnosa')
            ->select('NM_ICD10', 'pdiag_id', 'ID_ICD10', 'pdiag_kategori')
            ->join('icd10_bpjs', 'ID_ICD10', 'pdiag_diagnosa')
            ->where('pdiag_reg', $reg)
            ->where('pdiag_deleted', 0)
            ->orderBy('pdiag_id', 'asc')->get();

        if (isset($request->plain_data)) {
            return $data;
        }

        return response()->json($data);
    }
    function get_prosedur($reg)
    {
        $reg = str_replace("_", "/", $reg);
        $data =  DB::connection('mysql')->table('rs_pasien_prosedur')->select('NM_TINDAKAN', 'pprosedur_id', 'ID_TIND')
            ->join('icd9cm_bpjs', 'ID_TIND', 'pprosedur_prosedur')
            ->where('pprosedur_reg', $reg)->where('pprosedur_deleted', 0)->orderBy('pprosedur_id', 'asc')->get();
        return response()->json($data);
    }
    function add_diagnosa(Request $r)
    {
        $param = array(
            'pdiag_reg' => str_replace("_", "/", $r->reg),
            'pdiag_kategori' => $r->pdiag_kategori,
            'pdiag_deleted' => 0,
        );

        $main_params = [
            'pdiag_dokter' => $r->pdiag_dokter,
            'pdiag_diagnosa' => $r->diagnosa,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $check_ = DB::table('rs_pasien_diagnosa')
                    ->where($param)
                    ->first();

        $param = array_merge($param, $main_params);

        try {
            if (!isset($check_)) {
                DB::connection('mysql')->table('rs_pasien_diagnosa')->insert($param);

                return response()->json(
                    ['success' => true]
                );
            } else {
                DB::connection('mysql')
                    ->table('rs_pasien_diagnosa')
                    ->where('pdiag_id', $check_->pdiag_id)
                    ->update($param);

                return response()->json(
                    ['success' => true]
                );
            }
        } catch (\Throwable $th) {
            return response()->json(
                ['success' => false, 'msg' => $th]
            );
        }
    }

    function add_prosedur(Request $r)
    {
        $param = array(
            'pprosedur_reg' => str_replace("_", "/", $r->reg),
            'pprosedur_prosedur' => $r->prosedur,
            'pprosedur_dokter' => $r->pprosedur_dokter,
            'created_at' => now(),
            'pprosedur_deleted' => 0
        );
        try {
            $cek =  DB::connection('mysql')->table('rs_pasien_prosedur')->where('pprosedur_reg', str_replace("_", "/", $r->reg))
                ->where('pprosedur_prosedur', $r->prosedur)->where('pprosedur_deleted', 0)->count();
            if ($cek == 0) {
                DB::connection('mysql')->table('rs_pasien_prosedur')->insert($param);
                return response()->json(
                    ['success' => true]
                );
            } else {
                return response()->json(
                    ['success' => false]
                );
            }
        } catch (\Throwable $th) {
            return response()->json(
                ['success' => false]
            );
        }
    }

    function add_edukasi(Request $request)
    {
        $params = $request->except('_token');
        $cek = DB::connection('mysql')
            ->table('rs_edukasi_pasien')->where('reg_no', $request->reg_no)->first();
        if ($cek) {
            $simpan = DB::connection('mysql')
                ->table('rs_edukasi_pasien')->where('id', $cek->id)
                ->update($params);
        } else {
            $simpan = DB::connection('mysql')
                ->table('rs_edukasi_pasien')
                ->insert($params);
        }

        if ($simpan == true) {
            return response()->json(
                ['success' => true]
            );
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }
    function reset_edukasi($id)
    {
        $reset = DB::connection('mysql')
            ->table('rs_edukasi_pasien')->where('id', $id)
            ->update([
                'topik_dianogsa' => null,
                'tanggal_edukasi_diagnosa' => null,
                'tingkat_pemahaman_diagnosa' => null,
                'metode_edukasi_diagnosa' => null,
                'topik_penyakit' => null,
                'tanggal_edukasi_penyakit' => null,
                'tingkat_pemahaman_penyakit' => null,
                'metode_edukasi_penyakit' => null,
                'topik_prosedur' => null,
                'tanggal_edukasi_prosedur' => null,
                'tingkat_pemahaman_prosedur' => null,
                'metode_edukasi_prosedur' => null,
                'topik_manajemen_nyeri' => null,
                'tanggal_edukasi_nyeri' => null,
                'tingkat_pemahaman_nyeri' => null,
                'metode_edukasi_nyeri' => null,
                'topik_lain_lain_dokter' => null,
                'tanggal_edukasi_lain_lain' => null,
                'tingkat_pemahaman_lain_lain' => null,
                'metode_edukasi_lain_lain' => null,
            ]);
        if ($reset == true) {
            return response()->json(
                ['success' => true]
            );
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }
    function reset_assesment($id)
    {
        $reset = DB::connection('mysql')
            ->table('assesment_awal_dokter')->where('id', $id)->delete();
        if ($reset == true) {
            return response()->json(
                ['success' => true]
            );
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }
    function add_assesment(Request $request)
    {
        if ($request->asdok_penyakit_dahulu_ket[0] == 'Tidak') {
            $asdok_penyakit_dahulu_ket = 'Tidak';
        } else {
            $asdok_penyakit_dahulu_ket =  implode(",", $request->asdok_penyakit_dahulu_ket);
        }

        if ($request->asdok_penyakit_dlm_klrg_ket[0] == 'Tidak') {
            $asdok_penyakit_dlm_klrg_ket = 'Tidak';
        } else {
            $asdok_penyakit_dlm_klrg_ket =  implode(",", $request->asdok_penyakit_dlm_klrg_ket);
        }

        if ($request->asdok_pengobatan_ket[0] == 'Tidak') {
            $asdok_pengobatan_ket = 'Tidak';
        } else {
            $asdok_pengobatan_ket =  implode(",", $request->asdok_pengobatan_ket);
        }
        $tanggal_pemberian = $request->input('asdok_rawat_inap_ket', date('Y-m-d'));
        $params = array(
            'no_reg' => $request->asdok_reg,
            'anamnesis' => $request->asdok_amnesis,
            'keluhan_utama' => $request->asdok_keluhan_utama,
            'riwayat_penyakit_sekarang' => $request->asdok_penyakit_sekarang,
            'riwayat_penyakit_dahulu' => $asdok_penyakit_dahulu_ket,
            'riwayat_penyakit_keluarga' => $asdok_penyakit_dlm_klrg_ket,
            'pemeriksaan_multi_organ' => $request->asdok_pemeriksaan_multiorgan,
            'toraks' => $request->asdok_toraks,
            'jantung' => $request->asdok_jantung,
            'abdomen' => $request->asdok_abdomen,
            'riwayat_pengobatan' => $asdok_pengobatan_ket,
            'genetalia_dan_anus' => $request->asdok_genitalia_anus,
            'hasil_pemeriksaan_penunjang' => $request->asdok_pemeriksaan_penunjang,
            'tanggal_pemberian' => $request->asdok_rawat_inap_ket,
            'tata_laksana_awal' => $request->asdok_tata_laksana_awal,
            'daftar_masalah_medik' => $request->asdok_diagnosis_medik
        );

        $simpan = DB::connection('mysql')
            ->table('assesment_awal_dokter')
            ->insert($params);
        if ($simpan == true) {
            return response()->json(
                ['success' => true]
            );
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }

    function getCPOEDokter(Request $request)
    {
        $reg_no = $request->id_cppt;
        $tanggalsekarang = date('Y-m-d');
        $dataLab = DB::connection('mysql')
            ->table('job_orders_dt')
            ->join('job_orders', 'job_orders.order_no', 'job_orders_dt.order_no')
            ->where(['job_orders_dt.id_cppt' => $reg_no, 'jenis_order' => 'lab'])
            ->get();

        $dataradiologi = DB::connection('mysql')
            ->table('job_orders_dt')
            ->join('job_orders', 'job_orders.order_no', 'job_orders_dt.order_no')
            ->where(['job_orders_dt.id_cppt' => $reg_no, 'jenis_order' => 'radiologi'])
            ->get();

        $datafisio = DB::connection('mysql')
            ->table('job_orders_dt')
            ->join('job_orders', 'job_orders.order_no', 'job_orders_dt.order_no')
            ->where(['job_orders_dt.id_cppt' => $reg_no, 'jenis_order' => 'fisio'])
            ->get();


        $dataobat = DB::connection('mysql')
            ->table('job_orders_dt')
            ->join('job_orders', 'job_orders.order_no', 'job_orders_dt.order_no')
            ->where(['job_orders_dt.id_cppt' => $reg_no, 'jenis_order' => 'obat'])
            ->get();

        //        $datasoap=DB::connection('mysql')
        //            ->table('rs_m_soap');

        return response()->json([
            'success' => true,
            'dataLab' => $dataLab,
            'dataradiologi' => $dataradiologi,
            'datafisio' => $datafisio,
            'dataobat' => $dataobat
        ]);
    }

    //add data soap

    function get_ono_rad()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://rsud.sumselprov.go.id/labor/api/last-order-radiologi-v2',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        if ($data['code'] == 200) {
            $no = $data['data']['NextNoOrder'];
            return $no;
        }
    }
    function get_ono_lab()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://rsud.sumselprov.go.id/labor/api/last-order-v2',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response, true);
        if ($data['code'] == 200) {
            $no = $data['data']['NextNoOrder'];
            return $no;
        }
    }

    function kirim_rad($id, $user)
    {
        $cek_rad = DB::connection('mysql')->table('job_orders')->where('id_cppt', $id)->where('order_no', 'like', 'RAD%')->first();

        if ($cek_rad) {
            $reg = DB::connection('mysql2')->table('m_registrasi')->where('reg_no', $cek_rad->reg_no)->first();
            $cito = 1;
            $no_rad = $cek_rad->order_no;
            $detail_rad = DB::connection('mysql')->table('job_orders_dt')->where('order_no', $no_rad)->first();
            $get_item = DB::connection('mysql')->table('rs_m_item')->join('rs_m_item_tarif', 'rs_m_item_tarif.ItemID', '=', 'rs_m_item.ItemID')->where('ItemCode', $detail_rad->item_code)->where('ClassCategoryCode', $reg->reg_class)->select('ItemCode as item_id', 'PersonalPrice as personal_price')->first();
            $item = [];
            $i['item_id'] = $get_item->item_id;
            $i['qty'] = 1;
            $i['item_unit'] = "X";
            $i['personal_price'] = $get_item->personal_price;
            $i['corporate_price'] = 0;
            array_push($item, $i);
            $data_service_code = DB::connection('mysql2')->table('m_unit_departemen')->where('ServiceUnitID', $reg->service_unit)->first();
            $diag_pasien = DB::connection('mysql')->table('rs_pasien_diagnosa')->where('pdiag_reg', $cek_rad->reg_no)->where('pdiag_deleted', 0)->orderBy('pdiag_id', 'asc')->first();
            if ($diag_pasien) {
                $latin_icd10 =  DB::connection('mysql')->table('icd10_bpjs')->where('ID_ICD10', $diag_pasien->pdiag_diagnosa)->first()->NM_ICD10;
            } else {
                $latin_icd10 = '-';
            }
            $room_code = DB::connection('mysql2')->table('m_ruangan')->join('m_bed', 'm_bed.room_id', '=', 'm_ruangan.RoomID')->where('bed_id', $reg->bed)->first();
            $ono = $this->get_ono_rad();

            $a = [];
            $a['job_order_no'] = $ono;
            $a['registration_no'] = $cek_rad->reg_no;
            $a['transaction_no'] = 'JOR-RAD';
            $a['paramedic_id'] = $cek_rad->kode_dokter;
            $a['service_unit_id'] = $data_service_code->ServiceUnitCode;
            $a['location_id'] = $data_service_code->LocationID;
            $a['job_order_datetime'] = date('Y-m-d H:i:s');
            $a['remarks'] = $latin_icd10;
            $a['is_cito'] = $cito;
            $a['user_id'] = $user;
            $a['gc_order_type'] = 'X0151^004';
            $a['is_testing'] = 1;
            $a['payer_type'] = $reg->reg_cara_bayar;
            $a['room_no'] = $room_code->RoomCode;
            $a['items'] = json_encode($item);
            $a['order_type'] = 'Imaging';
            $a['medical_no'] = $reg->reg_medrec;
            $a['scheduled_dttm'] = date('YmdHis');

            DB::connection('mysql')->table('job_orders')->where('order_no', $no_rad)->update([
                'send_api' => json_encode($a)
            ]);
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://rsud.sumselprov.go.id/labor/api/order-radiologi-sim',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $a,
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $resp = json_decode($response);
            if ($resp->success) {
                DB::connection('mysql')->table('job_orders')->where('order_no', $no_rad)->update([
                    'response_api' => json_encode($resp->data),
                    'status_api' => 1
                ]);
            } else {
                DB::connection('mysql')->table('job_orders')->where('order_no', $no_rad)->update([
                    'response_api' => json_encode($resp->data),
                    'status_api' => 0
                ]);
            }
        }
    }
    function kirim_lab($id, $user)
    {
        $cek_lab = DB::connection('mysql')->table('job_orders')->where('id_cppt', $id)->where('order_no', 'like', 'LAB%')->first();

        if ($cek_lab) {
            $reg = DB::connection('mysql2')->table('m_registrasi')->where('reg_no', $cek_lab->reg_no)->first();
            $cito = 1;
            $no_rad = $cek_lab->order_no;
            $detail_rad = DB::connection('mysql')->table('job_orders_dt')->where('order_no', $no_rad)->first();
            $get_item = DB::connection('mysql')->table('rs_m_item')->join('rs_m_item_tarif', 'rs_m_item_tarif.ItemID', '=', 'rs_m_item.ItemID')->where('ItemCode', $detail_rad->item_code)->where('ClassCategoryCode', $reg->reg_class)->select('ItemCode as item_id', 'PersonalPrice as personal_price')->get();
            $item = [];
            foreach ($get_item as $a) {
                $i['item_id'] = $a->item_id;
                $i['qty'] = 1;
                $i['item_unit'] = "X";
                $i['personal_price'] = $a->personal_price;
                $i['corporate_price'] = 0;
                array_push($item, $i);
            }
            $data_service_code = DB::connection('mysql2')->table('m_unit_departemen')->where('ServiceUnitID', $reg->service_unit)->first();
            $diag_pasien = DB::connection('mysql')->table('rs_pasien_diagnosa')->where('pdiag_reg', $cek_lab->reg_no)->where('pdiag_deleted', 0)->orderBy('pdiag_id', 'asc')->first();
            if ($diag_pasien) {
                $latin_icd10 =  DB::connection('mysql')->table('icd10_bpjs')->where('ID_ICD10', $diag_pasien->pdiag_diagnosa)->first()->NM_ICD10;
            } else {
                $latin_icd10 = '-';
            }
            $room_code = DB::connection('mysql2')->table('m_ruangan')->join('m_bed', 'm_bed.room_id', '=', 'm_ruangan.RoomID')->where('bed_id', $reg->bed)->first();
            $ono = $this->get_ono_rad();

            $a = [];
            $a['job_order_no'] = $ono;
            $a['registration_no'] = $cek_lab->reg_no;
            $a['transaction_no'] = 'JOR-LAB';
            $a['paramedic_id'] = $cek_lab->kode_dokter;
            $a['service_unit_id'] = $data_service_code->ServiceUnitCode;
            $a['location_id'] = $data_service_code->LocationID;
            $a['job_order_datetime'] = date('Y-m-d H:i:s');
            $a['remarks'] = $latin_icd10;
            $a['is_cito'] = $cito;
            $a['user_id'] = $user;
            $a['gc_order_type'] = 'X0151^004';
            $a['is_testing'] = 1;
            $a['payer_type'] = $reg->reg_cara_bayar;
            $a['room_no'] = $room_code->RoomCode;
            $a['items'] = json_encode($item);
            $a['order_type'] = 'Laboratory';
            $a['medical_no'] = $reg->reg_medrec;
            $a['scheduled_dttm'] = date('YmdHis');

            DB::connection('mysql')->table('job_orders')->where('order_no', $no_rad)->update([
                'send_api' => json_encode($a)
            ]);
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://rsud.sumselprov.go.id/labor/api/order-radiologi-sim',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => $a,
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $resp = json_decode($response);
            if ($resp->success) {
                DB::connection('mysql')->table('job_orders')->where('order_no', $no_rad)->update([
                    'response_api' => json_encode($resp->data),
                    'status_api' => 1
                ]);
            } else {
                DB::connection('mysql')->table('job_orders')->where('order_no', $no_rad)->update([
                    'response_api' => json_encode($resp->data),
                    'status_api' => 0
                ]);
            }
        }
    }

    function klik_soap(Request $request)
    {
        $cek = DB::connection('mysql')->table('rs_pasien_cppt')->where('status_review', '99')->where('soapdok_reg', $request->reg_no)->where('soapdok_dokter', $request->soapdok_dokter)->first();
        if ($cek) {
            return response()->json([
                'success' => true,
                'kode' => $cek->soapdok_id
            ]);
        }
        $paramscppt = array(
            'dpjp_utama' => $request->dpjp_utama,
            'soapdok_reg' => $request->reg_no,
            'med_rec' => $request->med_rec,
            'status_review' => '99',
            'soapdok_dokter' => $request->soapdok_dokter,
            'nama_ppa' => $request->nama_ppa,
            'soapdok_bed' => $request->bed,
        );

        $simpancppt = DB::connection('mysql')
            ->table('rs_pasien_cppt')
            ->insert($paramscppt);

        $data = DB::connection('mysql')
            ->table('rs_pasien_cppt')
            ->where($paramscppt)->first();

        if ($simpancppt == true) {
            return response()->json([
                'success' => true,
                'kode' => $data->soapdok_id
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }
    function add_soap_dokter(Request $request)
    {
        $paramscppt = array(
            'soap_tanggal' => date('Y-m-d'),
            'soapdok_subject' => $request->soapdok_subject,
            'soapdok_object' => $request->soapdok_object,
            'soapdok_assesment' => $request->soapdok_assesment,
            'soapdok_planning' => $request->soapdok_planning,
            'soap_waktu' => date('H:i:s'),
            'soapdok_dokter' => $request->soapdok_dokter,
            'soapdok_instruksi' => $request->soapdok_instruksi,
            'nama_ppa' => $request->nama_ppa,
            'status_review' => '0',
            'is_dokter' => '1',
        );

        $simpancppt = DB::connection('mysql')
            ->table('rs_pasien_cppt')
            ->where('soapdok_id', $request->soapdok_id)
            ->update($paramscppt);

        if ($simpancppt == true) {
            // $this->kirim_rad($request->soapdok_id, $request->id);
            // $this->kirim_lab($request->soapdok_id, $request->id);
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }

    //get data soap
    function get_soap_dokter(Request $request)
    {
        $reg_no = $request->reg_no;
        /*$data_soap=DB::connection('mysql')
            ->table('rs_pasien_soapdok')
            ->leftJoin('rs_m_paramedic','rs_m_paramedic.ParamedicCode','=','rs_pasien_soapdok.soapdok_dokter')
            ->where('soapdok_reg',$reg_no)
            ->get();*/
        $data = DB::connection('mysql')
            ->table('rs_pasien_cppt')
            ->where('soapdok_reg', $request->reg_no)
            ->where('status_review', '!=', '99')
            ->get();

        $data_soap = [];
        foreach ($data as $key => $value) {
            $item['soapdok_id'] = $value->soapdok_id;
            $item['soapdok_dokter'] = $value->soapdok_dokter;
            $item['nama_ppa'] = $value->nama_ppa;
            $item['soapdok_poli'] = $value->soapdok_poli;
            $item['soapdok_reg'] = $value->soapdok_reg;
            $item['soapdok_subject'] = $value->soapdok_subject;
            $item['soapdok_object'] = $value->soapdok_object;
            $item['soapdok_assesment'] = $value->soapdok_assesment;
            $item['soapdok_planning'] = $value->soapdok_planning;
            $item['soapdok_instruksi'] = $value->soapdok_instruksi;
            $item['soap_tanggal'] = $value->soap_tanggal;
            $item['soap_waktu'] = $value->soap_waktu;
            $item['med_rec'] = $value->med_rec;
            $item['soapdok_deleted'] = $value->soapdok_deleted;
            $item['status_review'] = $value->status_review;
            $item['created_at'] = $value->created_at;
            $item['updated_at'] = $value->updated_at;
            $item['tanggal_verifikasi'] = $value->tanggal_verifikasi;
            $item['nama_verifikasi'] = $value->nama_verifikasi;
            $item['is_dokter'] = $value->is_dokter;
            $item['soapdok_bed'] = $value->soapdok_bed;
            $item['dpjp_utama'] = $value->dpjp_utama;
            $item['reg_dokter'] = DB::connection('mysql2')->table('m_registrasi')->where('reg_no', $value->soapdok_reg)->first()->reg_dokter ?? '';

            $request->merge([
                'plain_data' => true
            ]);

            $call_tindakan = new OrderObatController;

            $jenis_order = ['lab', 'radiologi', 'obat', 'lainnya'];

            foreach ($jenis_order as $v_order) {
                $request->merge([
                    'id_cppt' => $value->soapdok_id,
                    'jenisorder' => $v_order,
                ]);

                $item['order_' . $v_order] = $call_tindakan->getOrderTindakanJenis($request);
            }

            $item['diagnosa'] = $this->get_diagnosa($request, $value->soapdok_reg);

            array_push($data_soap, $item);
        }

        return response()->json([
            'success' => true,
            'data_soap' => $data_soap
        ]);
    }

    //verifikasi data soap
    function get_ttd($id_dokter)
    {
        ini_set('max_execution_time', 3600);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/tdd/' . $id_dokter,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $r = curl_exec($curl);

        curl_close($curl);
        $data = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $r), true);
        return $data['data'];
    }
    function verifikasi_soap_dokter(Request $request)
    {
        $id = $request->id;
        $utama = $request->dpjp_utama;
        // $ttd = $this->get_ttd($utama);
        $ttd = '-';

        if (!$ttd) {
            return response()->json([
                'success' => false,
                'msg' => 'Ttd belum tersedia silakan menginput di akun simrs rawat jalan'
            ]);
        } else {
            $params = array(
                'status_review' => '1',
                'tanggal_verifikasi' => date('Y-m-d'),
                'ttd_verifikasi' => $ttd,
                'nama_verifikasi' => $request->nama_ppa,
            );
            $update = DB::connection('mysql')
                ->table('rs_pasien_cppt')
                ->where('soapdok_id', $id)
                ->update($params);
            if ($update == true) {
                return response()->json([
                    'success' => true
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'msg' => 'Kesalahan coba lagi!'
                ]);
            }
        }
    }


    function addpemulanganpasien(Request $request)
    {
        if (!$request->pengelolaan_penyakit_secara_berkelanjutan) {
            $pengelolaan_penyakit_secara_berkelanjutan = null;
        } else {
            $pengelolaan_penyakit_secara_berkelanjutan = implode(",", $request->pengelolaan_penyakit_secara_berkelanjutan);
        }
        if (!$request->bantuan_dalam_aktifitas) {
            $bantuan_dalam_aktifitas = null;
        } else {
            $bantuan_dalam_aktifitas = implode(",", $request->bantuan_dalam_aktifitas);
        }
        if (!$request->edukasi_gizi) {
            $edukasi_gizi = null;
        } else {
            $edukasi_gizi = implode(",", $request->edukasi_gizi);
        }
        if (!$request->penanganan_nyeri_kronis) {
            $penanganan_nyeri_kronis = null;
        } else {
            $penanganan_nyeri_kronis = implode(",", $request->penanganan_nyeri_kronis);
        }
        if (!$request->kebutuhan_lainnya) {
            $kebutuhan_lainnya = null;
        } else {
            $kebutuhan_lainnya = implode(",", $request->kebutuhan_lainnya);
        }
        $params = array(
            'user_id' => $request->user_id,
            'reg_no' => $request->regno,
            'reg_medrec' => $request->medrec,
            'pengelolaan_penyakit_secara_berkelanjutan' => $pengelolaan_penyakit_secara_berkelanjutan,
            'bantuan_dalam_aktifitas' => $bantuan_dalam_aktifitas,
            'edukasi_gizi' => $edukasi_gizi,
            'penanganan_nyeri_kronis' => $penanganan_nyeri_kronis,
            'kebutuhan_lainnya' => $kebutuhan_lainnya,
            'waktu' => $request->waktu,
            'tanggal' => $request->tanggal,

        );
        $simapn = DB::connection('mysql')
            ->table('rs_pemulangan_pasien')
            ->insert($params);

        if ($simapn == true) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false
            ]);
        }
    }


    function getPemulanganPasien(Request $request)
    {
        $reg_no = $request->reg_no;
        $data_pemulangan = DB::connection('mysql')
            ->table('rs_pemulangan_pasien')
            ->where('reg_no', $reg_no)
            ->get();

        return response()->json([
            'success' => true,
            'data_pemulangan' => $data_pemulangan
        ]);
    }
}
