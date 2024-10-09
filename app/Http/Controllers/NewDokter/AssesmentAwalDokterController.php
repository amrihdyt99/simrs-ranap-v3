<?php

namespace App\Http\Controllers\NewDokter;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
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
    function get_prosedur(Request $request, $reg)
    {
        $reg = str_replace("_", "/", $reg);

        $data =  DB::table('rs_pasien_prosedur')
            ->select('NM_TINDAKAN', 'pprosedur_id', 'ID_TIND')
            ->join('icd9cm_bpjs', 'ID_TIND', 'pprosedur_prosedur')
            ->where('pprosedur_reg', $reg)
            ->where('pprosedur_deleted', 0)
            ->orderBy('pprosedur_id', 'asc')
            ->get();

        if (isset($request->plain_data)) {
            return $data;
        }

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
            if ($r->pdiag_dokter != $r->dpjp_utama) {
                return response()->json([
                    'success' => false,
                    'message' => 'Diagnosa hanya bisa ditambahkan oleh DPJP utama'
                ]);
            } else {
                if (!isset($check_)) {
                    DB::table('rs_pasien_diagnosa')->insert($param);
                } else {
                    if ($r->pdiag_kategori != 'utama') {
                        DB::table('rs_pasien_diagnosa')->insert($param);
                    } else {
                        DB::table('rs_pasien_diagnosa')
                            ->where('pdiag_id', $check_->pdiag_id)
                            ->update($param);
                    }
                }

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
            ->table('rs_edukasi_pasien_dokter')->where('reg_no', $request->reg_no)->first();
            
        $params['ttd_dokter'] = $request->ttd_edukator;
        $params['ttd_pasien'] = $request->ttd_sasaran;
        $params['med_rec'] = $request->medrec;

        unset($params['ttd_edukator']);
        unset($params['ttd_sasaran']);
        unset($params['medrec']);
        unset($params['type']);

        if ($cek) {
            $simpan = DB::connection('mysql')
                ->table('rs_edukasi_pasien_dokter')->where('id', $cek->id)
                ->update($params);
        } else {
            $simpan = DB::connection('mysql')
                ->table('rs_edukasi_pasien_dokter')
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
            ->table('rs_edukasi_pasien_dokter')->where('id', $id)
            ->update([
                'edukasi_diagnosa_penyebab_dokter' => null,
                'tgl_diagnosa_penyebab_dokter' => null,
                'tingkat_paham_diagnosa_penyebab_dokter' => null,
                'metode_edukasi_diagnosa_penyebab_dokter' => null,
                'edukasi_penatalaksanaan_dokter' => null,
                'tgl_penatalaksanaan_dokter' => null,
                'tingkat_paham_penatalaksanaan_dokter' => null,
                'metode_edukasi_penatalaksanaan_dokter' => null,
                'edukasi_prosedur_diagnostik_dokter' => null,
                'tgl_prosedur_diagnostik_dokter' => null,
                'tingkat_paham_prosedur_diagnostik_dokter' => null,
                'metode_edukasi_prosedur_diagnostik_dokter' => null,
                'edukasi_manajemen_nyeri_dokter' => null,
                'tgl_manajemen_nyeri_dokter' => null,
                'tingkat_paham_manajemen_nyeri_dokter' => null,
                'metode_edukasi_manajemen_nyeri_dokter' => null,
                'edukasi_lain_lain_dokter' => null,
                'tgl_lain_lain_dokter' => null,
                'tingkat_paham_lain_lain_dokter' => null,
                'metode_edukasi_lain_lain_dokter' => null,
                'ttd_dokter' => null,
                'ttd_pasien' => null,
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

    function getAssesmentDokter(Request $request){
        try {
            $data = DB::table('assesment_awal_dokter')
                ->where('no_reg', $request->reg_no)
                ->where('dokter_id', $request->dokter_id)
                ->first();

            return $data;

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function reset_assesment($id)
    {
        $reset = DB::connection('mysql')
            ->table('assesment_awal_dokter')->where('id', $id)->update(['deleted' => 1]);
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
            'daftar_masalah_medik' => $request->asdok_diagnosis_medik,
            'dokter_id' => $request->dokter_id
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

    function kirim_rad($id, $user)
    {
        $cek_rad = DB::table('job_orders_dt as a')
            ->leftjoin('job_orders as b', 'a.order_no', 'b.order_no')
            ->where('jenis_order', 'radiologi')
            ->whereRaw("(a.id_cppt = ? AND a.order_no is null) OR (a.id_cppt = ? AND dikirim_ke_farmasi = 0)", [$id, $id])
            ->select([
                'a.*',
                'dikirim_ke_farmasi',
                'status_kirim'
            ])
            ->get();

        if (count($cek_rad) > 0) {
            $ono = genKode(null, null, null, null, 'RIMG');

            $reg = DB::connection('mysql2')
                ->table('m_registrasi')
                ->where('reg_no', $cek_rad[0]->reg_no)
                ->select([
                    'reg_no',
                    'service_unit',
                    'bed',
                    'reg_cara_bayar',
                    'reg_medrec',
                ])
                ->first();

            $data_service_code = DB::connection('mysql2')
                ->table('m_unit_departemen')
                ->where('ServiceUnitID', $reg->service_unit)
                ->first();

            $diag_pasien = DB::table('rs_pasien_diagnosa')
                ->where('pdiag_reg', $reg->reg_no)
                ->where('pdiag_kategori', 'utama')
                ->where('pdiag_deleted', 0)
                ->select([
                    DB::raw("(select NM_ICD10 from icd10_bpjs where ID_ICD10 = pdiag_diagnosa) as NM_ICD10")
                ])
                ->first();

            if ($diag_pasien) {
                $latin_icd10 =  $diag_pasien->NM_ICD10;
            } else {
                $latin_icd10 = '-';
            }

            $room_code = DB::connection('mysql2')
                ->table('m_ruangan')
                ->join('m_bed', 'm_bed.room_id', '=', 'm_ruangan.RoomID')
                ->where('bed_id', $reg->bed)
                ->first();

            $cito = 1;

            foreach ($cek_rad as $key => $value) {
                $ono = genKode(null, null, null, null, 'RIMG');

                $item = [];
                foreach ($cek_rad as $sub_key => $sub_value) {
                    $i['item_id'] = $sub_value->item_code;
                    $i['qty'] = 1;
                    $i['item_unit'] = "X";
                    $i['personal_price'] = $sub_value->harga_jual;
                    $i['corporate_price'] = 0;

                    array_push($item, $i);
                }

                $a = [];
                $a['job_order_no'] = $ono;
                $a['registration_no'] = $value->reg_no;
                $a['transaction_no'] = 'JOR-RAD';
                $a['paramedic_id'] = $value->dokter_order;
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

                $send_to_radiology = postService(urlLabRadiology().'/api/order-radiologi', $a);

                $resp = json_decode($send_to_radiology);

                foreach ($cek_rad as $value_rad) {
                    DB::table('job_orders_dt')
                        ->where('id', $value_rad->id)
                        ->update([
                            'order_no' => $a['job_order_no']
                        ]);
                }

                if ($resp->success) {
                    $jobOrder['dikirim_ke_farmasi'] = 1;
                } else {
                    $jobOrder['dikirim_ke_farmasi'] = 0;
                }

                $jobOrder['order_no'] = $a['job_order_no'];
                $jobOrder['reg_no'] = $reg->reg_no;
                $jobOrder['kode_dokter'] = $value->dokter_order;
                $jobOrder['waktu_order'] = date('Y-m-d H:i:s');
                $jobOrder['service_unit'] = $reg->service_unit;
                $jobOrder['id_cppt'] = $id;
                $jobOrder['status_kirim'] = $send_to_radiology;

                $store_jor = DB::table('job_orders')
                                ->insert($jobOrder);

                if ($resp->success == false) {
                    return [
                        'code' => 500,
                        'success'=> false,
                        'message' => $resp->message,
                        'data' => $resp->data
                    ];
                }
            }
        }
    }
    function kirim_lab($id, $user)
    {
        $cek_lab = DB::table('job_orders_dt as a')
            ->leftjoin('job_orders as b', 'a.order_no', 'b.order_no')
            ->where('jenis_order', 'lab')
            ->whereRaw("(a.id_cppt = ? AND a.order_no is null) OR (a.id_cppt = ? AND dikirim_ke_farmasi = 0)", [$id, $id])
            ->select([
                'a.*',
                'dikirim_ke_farmasi',
                'status_kirim'
            ])
            ->get();

        if (count($cek_lab) > 0) {
            $ono = genKode(null, null, null, null, 'RLAB');

            $reg = DB::connection('mysql2')
                ->table('m_registrasi')
                ->where('reg_no', $cek_lab[0]->reg_no)
                ->select([
                    'reg_no',
                    'service_unit',
                    'bed',
                    'reg_cara_bayar',
                    'reg_medrec',
                ])
                ->first();

            $cito = 1;
            $item = [];

            foreach ($cek_lab as $a) {
                $i['item_id'] = $a->item_code;
                $i['qty'] = 1;
                $i['item_unit'] = "X";
                $i['personal_price'] = $a->harga_jual;
                $i['corporate_price'] = 0;
                
                array_push($item, $i);
            }

            $data_service_code = DB::connection('mysql2')
                ->table('m_unit_departemen')
                ->where('ServiceUnitID', $reg->service_unit)
                ->first();

            $diag_pasien = DB::table('rs_pasien_diagnosa')
                ->where('pdiag_reg', $reg->reg_no)
                ->where('pdiag_kategori', 'utama')
                ->where('pdiag_deleted', 0)
                ->select([
                    DB::raw("(select NM_ICD10 from icd10_bpjs where ID_ICD10 = pdiag_diagnosa) as NM_ICD10")
                ])
                ->first();

            if ($diag_pasien) {
                $latin_icd10 =  $diag_pasien->NM_ICD10;
            } else {
                $latin_icd10 = '-';
            }

            $room_code = DB::connection('mysql2')
                ->table('m_ruangan')
                ->join('m_bed', 'm_bed.room_id', '=', 'm_ruangan.RoomID')
                ->where('bed_id', $reg->bed)
                ->first();

            $a = [];
            $a['job_order_no'] = $ono;
            $a['registration_no'] = $reg->reg_no;
            $a['transaction_no'] = 'JOR-LAB';
            $a['paramedic_id'] = $cek_lab[0]->dokter_order;
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

            $send_to_laboratory = postService(urlLabRadiology().'/api/order-lab', $a);

            $resp = json_decode($send_to_laboratory);

            foreach ($cek_lab as $value_lab) {
                DB::table('job_orders_dt')
                    ->where('id', $value_lab->id)
                    ->update([
                        'order_no' => $a['job_order_no']
                    ]);
            }

            if ($resp->success) {
                $jobOrder['dikirim_ke_farmasi'] = 1;
            } else {
                $jobOrder['dikirim_ke_farmasi'] = 0;
            }

            $jobOrder['order_no'] = $a['job_order_no'];
            $jobOrder['reg_no'] = $reg->reg_no;
            $jobOrder['kode_dokter'] = $cek_lab[0]->dokter_order;
            $jobOrder['waktu_order'] = date('Y-m-d H:i:s');
            $jobOrder['service_unit'] = $reg->service_unit;
            $jobOrder['id_cppt'] = $id;
            $jobOrder['status_kirim'] = $send_to_laboratory;

            $store_jor = DB::table('job_orders')
                            ->insert($jobOrder);

            if ($resp->success == false) {
                return [
                    'code' => 500,
                    'success'=> false,
                    'message' => $resp->message,
                    'data' => $resp->data
                ];
            }
        }
    }

    function klik_soap(Request $request)
    {
        $paramscppt = array(
            'dpjp_utama' => $request->dpjp_utama,
            'soapdok_reg' => $request->reg_no,
            'med_rec' => $request->med_rec,
            'status_review' => '99',
            'soapdok_dokter' => $request->soapdok_dokter,
            'nama_ppa' => $request->nama_ppa,
            'soapdok_bed' => $request->bed,
            'bertindak_sebagai' => $request->bertindak_sebagai
        );

        $cek = DB::connection('mysql')->table('rs_pasien_cppt')->where('status_review', '99')->where('soapdok_reg', $request->reg_no)->where('soapdok_dokter', $request->soapdok_dokter)->first();
        
        if ($cek) {
            $simpancppt = DB::connection('mysql')
                ->table('rs_pasien_cppt')
                ->where('soapdok_id', $cek->soapdok_id)
                ->update($paramscppt);

            return response()->json([
                'success' => true,
                'kode' => $cek->soapdok_id
            ]);
        }

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
            $this->kirim_rad($request->soapdok_id, $request->id);
            $this->kirim_lab($request->soapdok_id, $request->id);
            
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
            $item['soapdok_posisi'] = $value->is_dokter == 1 ? 'Dokter' : 'Perawat';
            $item['soapdok_bed'] = $value->soapdok_bed;
            $item['dpjp_utama'] = $value->dpjp_utama;
            $item['bertindak_sebagai'] = $value->bertindak_sebagai;
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

        foreach ($data_soap as $new_key => $new_value) {
            $data_soap[$new_key]['updated_at'] = $new_value['soap_tanggal'].' '.$new_value['soap_waktu'];
        }
        
        // GET DATA SOAP FROM RAJAL
        $dataSoapFromRajal = getService(urlSimrs().'api/emr/cppt/latest/'.str_replace('/', '_', $request->reg_no), true);

        $dataSoapFromRajal = count($dataSoapFromRajal[0]) > 0 ? $dataSoapFromRajal[0] : [];


        $dataTindakanFromRajal = getService(urlSimrs().'api/rajal/tagihan/perItem?reg_no='.$request->reg_no, true);

        if (count($dataTindakanFromRajal) > 0) {
            foreach ($dataTindakanFromRajal as $key_tindakan => $value_tindakan) {
                $dataTindakanFromRajal[$key_tindakan]['id'] = $value_tindakan['cpoe_kode'];
                $dataTindakanFromRajal[$key_tindakan]['waktu_order'] = $value_tindakan['cpoe_created'];
                $dataTindakanFromRajal[$key_tindakan]['jenis_order'] = $value_tindakan['cpoe_jenis'];
                $dataTindakanFromRajal[$key_tindakan]['order_no'] = $value_tindakan['cpoe_kode'];
                $dataTindakanFromRajal[$key_tindakan]['item_name'] = $value_tindakan['cpoe_name'];
                $dataTindakanFromRajal[$key_tindakan]['harga_jual'] = $value_tindakan['cpoe_tarif'];
                $dataTindakanFromRajal[$key_tindakan]['ParamedicName'] = $value_tindakan['cpoe_dokter'];
            }
        }

        if (count($dataSoapFromRajal)) {
            foreach ($dataSoapFromRajal as $key_soap_rajal => $value_soap_rajal) {
                $filteredData = array_filter($dataTindakanFromRajal, function($item_tindakan) use ($value_soap_rajal) {
                    return $item_tindakan['cpoe_dokter_kode'] == $value_soap_rajal['reg_dokter_kode'];
                });
                
                $dataSoapFromRajal[$key_soap_rajal]['soapdok_posisi'] = ucfirst($value_soap_rajal['level_user']);
                $dataSoapFromRajal[$key_soap_rajal]['order_lainnya'] = $filteredData;
            }
        }

        $dataSoapMerged =  array_merge($data_soap, $dataSoapFromRajal);

        usort($dataSoapMerged, function ($a, $b) {
            return strtotime($b['updated_at']) - strtotime($a['updated_at']);
        });

        return response()->json([
            'success' => true,
            'data_soap' => $dataSoapMerged,
        ]);
    }

    function get_data_history_soap(Request $request)
    {
        $reg_no = $request->reg_no;
        $reg_lama = DB::connection('mysql2')->table('m_registrasi')->where('reg_no', $reg_no)->first()->reg_lama ?? $reg_no;
    
        $historySoap = getService(urlSimrs().'api/emr/cppt/latest/'.str_replace('/', '_', $reg_lama), true);
        $historySoap = count($historySoap[0]) > 0 ? $historySoap[0] : [];
    
        // Mengambil data tindakan
        $dataTindakanFromRajal = getService(urlSimrs().'api/rajal/tagihan/perItem?reg_no='.$reg_lama, true);
    
        if (count($dataTindakanFromRajal) > 0) {
            foreach ($dataTindakanFromRajal as $key_tindakan => $value_tindakan) {
                $dataTindakanFromRajal[$key_tindakan]['id'] = $value_tindakan['cpoe_kode'];
                $dataTindakanFromRajal[$key_tindakan]['waktu_order'] = $value_tindakan['cpoe_created'];
                $dataTindakanFromRajal[$key_tindakan]['jenis_order'] = $value_tindakan['cpoe_jenis'];
                $dataTindakanFromRajal[$key_tindakan]['order_no'] = $value_tindakan['cpoe_kode'];
                $dataTindakanFromRajal[$key_tindakan]['item_name'] = $value_tindakan['cpoe_name'];
                $dataTindakanFromRajal[$key_tindakan]['harga_jual'] = $value_tindakan['cpoe_tarif'];
                $dataTindakanFromRajal[$key_tindakan]['ParamedicName'] = $value_tindakan['cpoe_dokter'];
            }
        }
    
        if (count($historySoap) > 0) {
            foreach ($historySoap as $key_soap => $value_soap) {
                $filteredData = array_filter($dataTindakanFromRajal, function($item_tindakan) use ($value_soap) {
                    return $item_tindakan['cpoe_dokter_kode'] == $value_soap['reg_dokter_kode'];
                });
                
                $historySoap[$key_soap]['soapdok_posisi'] = ucfirst($value_soap['level_user']);
                $historySoap[$key_soap]['order_lainnya'] = array_values($filteredData);
            }
        }
    
        // usort($historySoap, function ($a, $b) {
        //     return strtotime($b['updated_at']) - strtotime($a['updated_at']);
        // });
    
        return response()->json([
            'success' => true,
            'data_soap' => $historySoap,
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

    function getPengkajianAwalUmumPerawat(Request $request)
    {
        try {
            $data = DB::connection('mysql')
                ->table('pengkajian_awal_pasien_perawat as p')
                ->leftJoin('rs_pasien_cppt as c', 'p.reg_no', '=', 'c.soapdok_reg')
                // ->where('p.reg_no', 'c.soapdok_reg')
                ->get();
    
            return response()->json([
                'success' => true,
                'data' => $data,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }

    public function getAlertAlergi(Request $request){
        try {
            $pengkajian_awal = null;

            if($request->kategori_pasien === "dewasa"){
                $pengkajian_awal = DB::connection('mysql')
                    ->table('pengkajian_dewasa_awal')
                    ->select([
                        'alergi',
                        'alergi_obat',
                        'alergi_makanan',
                        'alergi_lainnya',
                    ])
                    ->where('reg_no', $request->reg_no)
                    ->first();
            } else if($request->kategori_pasien === "kebidanan"){
                $pengkajian_awal = DB::connection('mysql')
                    ->table('pengkajian_obgyn_alergi_dan_keadaan_umum')
                    ->select([
                        'alergi',
                        'alergi_obat',
                        'alergi_makanan',
                        'alergi_lainnya',
                    ])
                    ->where('reg_no', $request->reg_no)
                    ->first();
            } else if($request->kategori_pasien === "anak"){
                $pengkajian_awal = DB::connection('mysql')
                    ->table('pengkajian_awal_anak_perawat')
                    ->select([
                        'alergi',
                        'alergi_obat',
                        'alergi_makanan',
                        'alergi_lainnya',
                    ])
                    ->where('reg_no', $request->reg_no)
                    ->first();
            }

            return $pengkajian_awal;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAlertJatuh(Request $request){
        try {
            $resiko_jatuh = null;

            if ($request->kategori_pasien === "dewasa") {
                $resiko_jatuh_geriatri = DB::connection('mysql')
                    ->table('resiko_jatuh_geriatri')
                    ->select([
                        'skor_total_geriatri',
                        'kategori_geriatri',
                    ])
                    ->where('reg_no', $request->reg_no)
                    ->latest()
                    ->first();
                
                $resiko_jatuh_morse = DB::connection('mysql')
                    ->table('resiko_jatuh_skala_morse')
                    ->select([
                        'resiko_jatuh_morse_total_skor',
                        'resiko_jatuh_morse_kategori',
                    ])
                    ->where('reg_no', $request->reg_no)
                    ->latest()
                    ->first();
                
                $resiko_jatuh = [
                    'geriatri' => $resiko_jatuh_geriatri,
                    'morse' => $resiko_jatuh_morse
                ];
            } else if ($request->kategori_pasien === "kebidanan") {
                $resiko_jatuh_geriatri = DB::connection('mysql')
                    ->table('resiko_jatuh_geriatri')
                    ->select([
                        'skor_total_geriatri',
                        'kategori_geriatri',
                    ])
                    ->where('reg_no', $request->reg_no)
                    ->latest()
                    ->first();
                
                $resiko_jatuh_morse = DB::connection('mysql')
                    ->table('resiko_jatuh_skala_morse')
                    ->select([
                        'resiko_jatuh_morse_total_skor',
                        'resiko_jatuh_morse_kategori',
                    ])
                    ->where('reg_no', $request->reg_no)
                    ->latest()
                    ->first();
                
                $resiko_jatuh = [
                    'geriatri' => $resiko_jatuh_geriatri,
                    'morse' => $resiko_jatuh_morse
                ];
            } elseif ($request->kategori_pasien === "anak") {
                $resiko_jatuh_dumpty = DB::connection('mysql')
                    ->table('resiko_jatuh_humpty_dumpty')
                    ->select([
                        'total_skor_humpty_dumpty',
                        'kategori_humpty_dumpty',
                    ])
                    ->where('reg_no', $request->reg_no)
                    ->latest()
                    ->first();

                    $resiko_jatuh_morse = DB::connection('mysql')
                    ->table('resiko_jatuh_skala_morse')
                    ->select([
                        'resiko_jatuh_morse_total_skor',
                        'resiko_jatuh_morse_kategori',
                    ])
                    ->where('reg_no', $request->reg_no)
                    ->latest()
                    ->first();

                $resiko_jatuh = [
                    'dumpty' => $resiko_jatuh_dumpty,
                    'morse' => $resiko_jatuh_morse
                ];
            } elseif ($request->kategori_pasien === "bayi") {
                $resiko_jatuh = [
                    'bayi' => true,
                    'keterangan' => 'Semua bayi berisiko jatuh tinggi'
                ];
            }
            return $resiko_jatuh;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function checkPemeriksaan(Request $request){
        try {
            $cppt = DB::table('rs_pasien_cppt')
                ->where('soapdok_reg', $request->reg_no)
                ->first();

            $tindakan = DB::table('job_orders_dt')
                ->where('reg_no', $request->reg_no)
                ->first();

            $data = [
                'cppt' => [
                    'status' => isset($cppt) ? 200 : 404,
                    'msg' => (isset($cppt) ? 'Sudah' : 'Belum'). ' ada pemeriksaan dari dokter atau perawat'
                ],
                'tindakan' => [
                    'status' => isset($tindakan) ? 200 : 404,
                    'msg' => (isset($tindakan) ? 'Sudah' : 'Belum'). ' ada pemeriksaan dari dokter atau perawat'
                ],
            ];

            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
