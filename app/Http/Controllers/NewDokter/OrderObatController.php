<?php

namespace App\Http\Controllers\NewDokter;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ForeignController;
use App\Models\JobOrders;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderObatController extends Controller
{
    function orderobat(Request $request)
    {
        try {
            $data_to_store = [];
            $store_details = false;

            $checkPayment = checkPaymentStatus($request->prescribe_reg);

            if (isset($checkPayment) && $checkPayment->pvalidation_status == 1) {
                return [
                    'code' => 500,
                    'success' => false,
                    'message' => 'Data gagal disimpan, pembayaran sudah diselesaikan oleh bagian kasir'
                ];
            }

            if ($request->prescribe_item) {
                $flag_racikan = null;

                if ($request->prescribe_flag == 1) {
                    $check_flag_racikan = DB::table('job_orders_dt')
                        ->where([
                            'reg_no' => $request->prescribe_reg,
                            'flag' => 1,
                        ])
                        ->latest()
                        ->first();

                    if (isset($check_flag_racikan)) {
                        $flag_racikan = $check_flag_racikan->flag_racikan + 1;
                    } else {
                        $flag_racikan = 1;
                    }

                    if (isset($request->prescribe_flag_racikan) && $request->prescribe_flag_racikan) {
                        $flag_racikan = $request->prescribe_flag_racikan;
                    }
                }

                foreach ($request->prescribe_item as $key => $value) {
                    $items = [
                        'jenis_order' => 'obat',
                        'reg_no' => $request->prescribe_reg,
                        'item_code' => $request->prescribe_item[$key],
                        'dokter_order' => $request->dokter_order,
                        'flag' => $request->prescribe_flag,
                        'flag_racikan' => $flag_racikan,
                        'id_cppt' => $request->id_cppt,
                        'obat_pulang' => isset($request->obat_pulang) ? 1 : null,
                        'deleted' => 0,
                    ];

                    $main_items = [
                        'item_name' => DB::connection('mysql2')->table('m_medicine')->where('item_id', $request->prescribe_item[$key])->select('item_name')->first()->item_name ?? '-',
                        'qty' => $request->prescribe_quantity[$key],
                        'dosis' => $request->prescribe_dosis[$key] ?? null,
                        'hari' => $request->prescribe_hari[$key] ?? null,
                        'jumlah_perhari' => $request->prescribe_jumlah_perhari[$key] ?? null,
                        'durasi_hari' => $request->prescribe_durasi_hari[$key] ?? null,
                        'ket_dosis' => $request->prescribe_ket_dosis[$key] ?? null,
                        'harga_awal' => $request->prescribe_harga_awal[$key] ?? null,
                        'harga_jual' => $request->prescribe_harga_jual[$key] ?? null,
                        'dosis_kode' => $request->prescribe_dosis_satuan[$key] ?? null,
                        'instruksi_khusus' => $request->prescribe_special_instruction[$key] ?? null,
                        'bentuk_obat' => $request->prescribe_form ?? null,
                        'rute' => $request->prescribe_route ?? null,
                    ];

                    $check_ = DB::table('job_orders_dt')
                        ->where($items)
                        ->whereDate('created_at', date('Y-m-d'))
                        ->first();

                    $items = array_merge($items, $main_items);

                    if ($request->prescribe_item[$key] != null) {
                        if (!isset($check_)) {
                            // array_push($data_to_store, $items);
                            DB::table('job_orders_dt')->insert($items);
                        } else {
                            DB::table('job_orders_dt')
                                ->where('id', $check_->id)
                                ->update($items);
                        }
                    }
                }

                $m_medicine = array_chunk($data_to_store, 5);
                foreach ($m_medicine as $init) {
                    $store_details = DB::table('job_orders_dt')->insert($init);
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'order berhasil',
                'data' => $data_to_store
            ]);
        } catch (\Throwable $th) {
            // throw $th;
            return response()->json([
                'success' => true,
                'message' => 'order gagal',
                'data' => $th
            ]);
        }
    }

    public function storeFinalOrder(Request $request)
    {
        try {
            $data = json_decode($request->data);

            if (count($data) < 1) {
                return response()->json([
                    'code' => 404,
                    'success' => false,
                    'message' => 'Tidak ada data obat yang dikirim',
                ]);
            }

            $data_to_pharmacy = [];

            $registration = getDataKeyValue(DB::connection('mysql2')->table('m_registrasi'), 'reg_no', $request->reg);
            $paramedic = getDataKeyValue(DB::connection('mysql2')->table('m_paramedis'), 'ParamedicCode', $request->dokter);
            $get_room_master = getDataKeyValue(
                DB::connection('mysql2')
                    ->table('m_unit as a')
                    ->join('m_unit_departemen as b', 'a.ServiceUnitCode', 'b.ServiceUnitCode'),
                'b.ServiceUnitID',
                $request->service_unit,
                ['a.*', DB::raw("(select ServiceUnitID from m_unit_departemen where ServiceUnitCode = a.ServiceUnitCode limit 1) as ServiceUnitID")]
            );

            $service_room = [
                'RoomID' => $get_room_master->ServiceUnitID,
                'RoomCode' => $get_room_master->ServiceUnitCode,
                'RoomName' => $get_room_master->ServiceUnitName,
                'IP' => null,
                'IsActive' => "1",
                'IsUsed' => "1",
                'IsDeleted' => "0",
                'LastUpdatedBy' => $get_room_master->LastUpdatedBy,
                'LastUpdatedDateTime' => "2021-12-19 23:07:11",
                'created_at' => "2021-12-19T15:52:24.000000Z",
                'updated_at' => "2021-12-19T16:07:11.000000Z",
            ];

            if (!isset($get_room_master->ServiceUnitID)) {
                return response()->json([
                    'code' => 404,
                    'success' => false,
                    'message' => 'Data ruangan tidak ditemukan',
                    'data' => $get_room_master
                ]);
            }

            $registration->reg_dokter_care = null;

            $patient = getDataKeyValue(DB::connection('mysql2')->table('m_pasien'), 'MedicalNo', $request->medrec);
            $patient->Since = null;
            $patient->FirstName = null;
            $patient->MiddleName = null;
            $patient->LastName = null;
            $patient->PreferredName = null;
            $patient->PatientNameOnCard = null;
            $patient->IsApproximateDOB = null;
            $patient->Title = null;
            $patient->Suffix = null;
            $patient->OldMedicalNo = null;
            $patient->Picture = null;
            $patient->PictureFileName = null;
            $patient->IsBlackList = null;
            $patient->BlackListBy = null;
            $patient->BlackListDateTime = null;
            $patient->BlackListNotes = null;
            $patient->LastVisitDate = null;
            $patient->NumberOfVisit = null;

            $orderNumberFormat = genKode(null, null, null, null, 'FARM');

            foreach ($data as $key => $value) {
                $update_order = DB::table('job_orders_dt')
                    ->where('id', $value->id)
                    ->update([
                        'order_no' => $orderNumberFormat,
                    ]);

                $data_pharmacy = [
                    'item_code' => $value->temp_kode,
                    'quantity' => $value->temp_quantity,
                    'temp_flag' => $value->temp_flag,
                    'temp_flag_racikan' => $value->temp_flag_racikan,
                    'dosis' => $value->temp_dosis,
                    'dosis_unitcode' => $value->dosis_kode,
                    'hari' => $value->temp_hari,
                    'durasi_hari' => (int) $value->temp_durasi_hari,
                    'harga_jual' => (int) $value->harga_awal,
                    'ket_dosis' => $value->temp_ket_dosis,
                    'spesial_instruksi' => $value->temp_special_instruction,
                    'bentukan_sediaan' => str_contains($value->bentuk_obat, '-- Pilih') ? null : $value->bentuk_obat,
                    'medication_route' => str_contains($value->rute, '-- Pilih') ? null : $value->rute
                ];

                array_push($data_to_pharmacy, $data_pharmacy);
            }

            // Send Pharmacy
            $send_pharmacy = [
                'order_no' => $orderNumberFormat,
                'reg_no' => $request->reg,
                'is_editable' => 1,
                'kode_dokter' => $request->dokter,
                'waktu_order' => date('Y-m-d H:i:s'),
                'kode_poli' => $request->service_unit,
                'data_bb' => '',
                'data_tb' => '',
                'data_alergi' => '',
                'catatan' => $request->catatan_dokter ?? null,
                'job_order_dt' => $data_to_pharmacy,
                'm_registrasi' => $registration,
                'm_pasien' => $patient,
                'paramedic' => $paramedic,
                'serviceroom' => $service_room
            ];

            $send_pharmacy = [
                'data' => json_encode($send_pharmacy),
            ];

            $url = urlPharmacy('job-order/order');

            $response_pharmacy = postService($url, $send_pharmacy);

            if (json_decode($response_pharmacy)->sukses == false) {
                return response()->json(json_decode($response_pharmacy));
            } else {
                $jobOrder['order_no'] = $orderNumberFormat;
                $jobOrder['reg_no'] = $request->reg;
                $jobOrder['kode_dokter'] = $request->dokter;
                $jobOrder['waktu_order'] = date('Y-m-d H:i:s');
                $jobOrder['service_unit'] = $request->service_unit;
                $jobOrder['catatan_dokter'] = $request->catatan_dokter ?? null;
                $jobOrder['id_cppt'] = $request->id_cppt;
                $jobOrder['dikirim_ke_farmasi'] = 1;
                $jobOrder['status_kirim'] = $response_pharmacy;
                $jobOrder['obat_pulang'] = isset($request->obat_pulang) ? 1 : null;

                $store_jor = DB::table('job_orders')
                    ->insert($jobOrder);
            }

            return response()->json([
                'code' => 200,
                'success' => true,
                'message' => 'order berhasil',
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function getOrderObat(Request $request)
    {
        try {
            $reg_no = $request->reg_no;

            $joborderdetail = DB::connection('mysql')
                ->table('job_orders_dt as a')
                ->leftjoin('job_orders as b', 'a.order_no', 'b.order_no');

            if ($request->type == 'temp') {
                $joborderdetail = $joborderdetail->where('dikirim_ke_farmasi', null)
                    // ->where('a.obat_pulang', null)
                ;
            } else if ($request->type == 'take_home') {
                $joborderdetail = $joborderdetail
                    ->where('a.obat_pulang', 1);
            } else {
                return $this->getFinalOrder($request);
            }

            if (isset($request->params)) {
                foreach ($request->params as $key => $value) {
                    $joborderdetail = $joborderdetail->where($value['key'], $value['value']);
                }
            }

            $joborderdetail = $joborderdetail
                ->where('a.dokter_order', $request->dokter)
                ->where([
                    ['a.reg_no', '=', $reg_no],
                    ['jenis_order', 'LIKE', '%obat%']
                ])
                ->select([
                    'a.*'
                ])
                ->get();

            $groupedData = [];
            foreach ($joborderdetail as $itemToGroup) {
                $flag = $itemToGroup->flag;
                $flag_racikan = $itemToGroup->flag_racikan ?? null; // gunakan 'null' untuk nilai null

                // Ambil satu item per grup (flag dan flag_racikan)
                if (!isset($groupedData[$flag][$flag_racikan])) {
                    $groupedData[$flag][$flag_racikan] = $itemToGroup;
                }
            }

            // Flatten the array to get a single array of objects
            $result = [];
            foreach ($groupedData as $itemsByFlag) {
                foreach ($itemsByFlag as $itemToGroup) {
                    $result[] = $itemToGroup;
                }
            }

            $joborderdetail = $result;

            // return $joborderdetail;

            $array_data = [];

            if (count($joborderdetail) > 0) {
                foreach ($joborderdetail as $key => $value) {
                    $item['flag'] = $value->flag;
                    $item['flag_racikan'] = $value->flag_racikan;
                    $item['dosis'] = $value->dosis;
                    $item['hari'] = $value->hari;
                    $item['deleted'] = $value->deleted;
                    $item['durasi_hari'] = $value->durasi_hari;

                    $item['obat'] = DB::table('job_orders_dt as a')
                        ->where([
                            ['a.reg_no', $value->reg_no],
                            ['a.jenis_order', 'LIKE', 'obat%'],
                            ['a.flag', $value->flag],
                            ['a.flag_racikan', $value->flag_racikan],
                            ['a.deleted', 0],
                        ])
                        ->leftjoin('job_orders as b', 'a.order_no', 'b.order_no');

                    if ($request->type == 'temp') {
                        $item['obat'] = $item['obat']->where('dikirim_ke_farmasi', null);
                    } else if ($request->type == 'take_home') {
                        $item['obat'] = $item['obat']
                            ->where('a.obat_pulang', 1);
                    } else {
                        $item['obat'] = $item['obat']->where('dikirim_ke_farmasi', 1);
                    }

                    $item['obat'] = $item['obat']
                        ->where('a.dokter_order', $request->dokter)
                        ->select([
                            'a.*',

                            // Use for edit temporary data
                            'a.flag as temp_flag',
                            'a.id as temp_id',
                            'a.item_code as temp_kode',
                            'a.item_name as ItemName1',
                            'a.harga_awal as ItemPrice',
                            'a.harga_jual as temp_harga_jual',
                            'a.qty as temp_quantity',

                            'a.hari as temp_hari',
                            'a.jumlah_perhari as temp_per_hari',
                            'a.dosis as temp_dosis',
                            'a.dosis_kode as ItemDosageUnit',
                            DB::raw("(select satuan_dasar from " . env('DB_DATABASE2') . ".m_medicine where item_id = a.item_code) as ItemBasicUnit"),
                            'a.durasi_hari as temp_durasi_hari',
                            DB::raw("(select dosis from " . env('DB_DATABASE2') . ".m_medicine where item_id = a.item_code) as ItemUnit"),
                            'a.ket_dosis as temp_ket_dosis',
                            'a.instruksi_khusus as temp_special_instruction',
                            DB::raw("(select total from " . env('DB_DATABASE2') . ".m_medicine where item_id = a.item_code) as ItemStock"),
                        ])
                        ->get();

                    $item['count'] = count($item['obat']);

                    if (count($item['obat']) > 0) {
                        array_push($array_data, $item);
                    }
                }
            }

            if (count($joborderdetail) > 0) {
                return response()->json([
                    'success' => true,
                    'message' => 'ada data obat',
                    'data' => $array_data
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'tidak ada order obat',
                    'data' => [],
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function getFinalOrder(Request $request)
    {
        try {
            $flag = DB::table('job_orders_dt')
                ->where('reg_no', $request->reg_no)
                ->select([
                    'reg_no as reg',
                    'order_no as code',
                ])
                ->orderBy('order_no', 'asc')
                ->where('deleted', 0)
                ->where('jenis_order', 'obat')
                ->get()
                ->unique('code');

            $flag = array_values($flag->toArray());

            // $flag = [
            //     ['reg' => 'QREG/RJ/202408230027', 'code' => 'FARM/RJ/202408230000001'],
            //     ['reg' => 'QREG/RJ/202408230135', 'code' => 'FARM/RJ/202408230000024'],
            // ];

            $data = [];
            foreach ($flag as $key => $value) {
                $order_data = [
                    'order_no' => $value->code,
                    'reg_no' => $value->reg,
                ];

                $send_pharmacy = [
                    'data' => json_encode($order_data),
                ];

                $url = urlPharmacy('job-order/status-order');

                $response_pharmacy['order'] = postService($url, $send_pharmacy);

                $response = json_decode($response_pharmacy['order']);

                if ($response->sukses == true) {
                    array_push($data, $response->data);
                }
            }

            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getFinalOrderDetail(Request $request)
    {
        try {
            $url = urlPharmacy('job-order/status-order');

            $data_status = [
                'order_no' => 'FARM/RJ/202408230000001',
                'reg_no' => 'QREG/RJ/202408230027'
            ];
            // $data_status = [
            //     'order_no' => $request->order_code,
            //     'reg_no' => $request->reg_no
            // ];

            $data_status = [
                'data' => json_encode($data_status),
            ];

            $response_pharmacy = json_decode(postService($url, $data_status));

            if ($response_pharmacy->sukses == true) {
                if ($response_pharmacy->data->waktu_mulai && $response_pharmacy->data->waktu_selesai) {
                    return response()->json([
                        'status' => 409,
                        'data' => 'Tidak bisa di edit, data sudah di proses oleh bagian farmasi'
                    ]);
                } else {
                    $order_data = [
                        'order_no' => $request->order_code,
                        'reg_no' => $request->reg_no
                    ];

                    $send_pharmacy = [
                        'data' => json_encode($order_data),
                    ];

                    $url = urlPharmacy('job-order/status-order');

                    $response_pharmacy_status = postService($url, $send_pharmacy);

                    $response = json_decode($response_pharmacy_status);
                    $data = [];

                    if ($response->sukses == 200) {
                        foreach ($response->data->job_order_dt as $key => $value) {
                            $item['prescribe_item'] = $value->item_code;
                            $item['prescribe_id'] = $value->id;
                            $item['prescribe_order_code'] = $value->order_no;
                            $item['prescribe_reg'] = $value->reg_no;
                            $item['prescribe_qty'] = $value->quantity;
                            $item['prescribe_dosage'] = $value->dosis;
                            $item['prescribe_dosage_prep'] = $value->item->Dosage;
                            $item['prescribe_dosage_unit'] = $value->item->DosageUnitCode;
                            $item['prescribe_basic_unit'] = $value->item->satuan_dasar;
                            $item['prescribe_frequency'] = $value->hari;
                            $item['prescribe_duration'] = $value->durasi_hari;
                            $item['prescribe_instruction'] = $value->ket_dosis;
                            $item['prescribe_price'] = $value->spesial_instruksi;
                            $item['prescribe_flag'] = $value->temp_flag;
                            $item['prescribe_flag_racikan'] = $value->temp_flag_racikan;
                            $item['prescribe_dokter'] = $response->data->kode_dokter;
                            $item['prescribe_poli'] = $response->data->kode_poli;
                            $item['prescribe_deleted'] = $response->data->deleted_at ? 1 : 0;
                            $item['prescribe_sent'] = '';
                            $item['prescribe_special_instruction'] = $value->spesial_instruksi;
                            $item['prescribe_form'] = $value->bentukan_sediaan;
                            $item['prescribe_route'] = $value->medication_route;
                            $item['created_at'] = $response->data->waktu_order;
                            $item['updated_at'] = $response->data->waktu_order;
                            $item['ItemName1'] = $value->item->item_name;
                            $item['ItemPrice'] = $value->harga_jual;
                            $item['ItemStock'] = 0;
                            $item['ItemDosageList'] = $value->item->listdosis;

                            if ($value->temp_flag_racikan == $request->flag_racikan) {
                                array_push($data, $item);
                            }
                        }
                    }

                    return response()->json([
                        'status' => 200,
                        'data' => $data
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 404,
                    'data' => 'Data order obat tidak ditemukan'
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getDataObat(Request $request, $limit = 20)
    {
        try {
            $url = urlPharmacy('get-stokdepo', '&location=rajal&limit=' . $limit . '&keyword=' . urlencode($request->params));
            // $url = urlPharmacy('get-stokdepo', '&location=ranap&limit='.$limit.'&keyword='.urlencode($request->params));

            $data = getService($url, true);

            if ($data['sukses'] == true) {
                $data = $data['data'];
            } else {
                $data = [];
            }

            $data_ = [];
            foreach ($data as $value) {
                $items = [
                    'item_id' => $value['item_id'],
                    'item_name' => $value['item_name'],
                    'satuan_dosis' => $value['satuan_dosis_nama'],
                    'satuan_dasar' => $value['satuan_dasar'],
                    'total' => $value['total'] == 0 ?  100 : $value['total'],
                    'dosis' => $value['dosis'],
                    'expired_date' => $value['expired_date'],
                    'komposisi' => json_encode($value['komposisi']),
                    'harga_jual' => (float) $value['harga_jual'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];

                $check_obat = DB::connection('mysql2')
                    ->table('m_medicine')
                    ->where('item_id', $value['item_id'])
                    ->first();

                if (isset($check_obat)) {
                    $delete = DB::connection('mysql2')->table('m_medicine')->where('item_id', $value['item_id'])->delete();
                }

                array_push($data_, $items);
            }

            $m_medicine = array_chunk($data_, 5);
            foreach ($m_medicine as $init) {
                $store = DB::connection('mysql2')->table('m_medicine')->insert($init);
            }

            if ($request->params) {
                return response()->json($data);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function deleteOrderObat(Request $request)
    {
        try {
            $delete = DB::table('job_orders_dt')
                ->where('id', $request->data_id)
                ->update([
                    'deleted' => 1,
                    'deleted_by' => $request->deleted_by,
                    'deleted_at' => date('Y-m-d H:i:s')
                ]);

            return response()->json([
                'code' => 200,
                'success' => true,
                'message' => 'Data berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 500,
                'success' => true,
                'message' => 'Data gagal dihapus',
                'msg' => $th
            ]);
        }
    }


    // TINDAKAKAN

    function ordertindakan(Request $request)
    {
        // $cekrad = 0;
        // for ($i = 0; $i < count($request->cpoe_jenis); $i++) {
        //     if ($request->cpoe_jenis[$i] == 'radiologi') {
        //         $cekrad += 1;
        //     }
        // }
        // if ($cekrad > 0) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Tindakan Radiologi Maksimal 1x Dalam 1 CPPT'
        //     ]);
        // }

        $checkPayment = checkPaymentStatus($request->cpoe_reg);

        if (isset($checkPayment) && $checkPayment->pvalidation_status == 1) {
            return [
                'code' => 500,
                'success' => false,
                'message' => 'Data gagal disimpan, pembayaran sudah diselesaikan oleh bagian kasir'
            ];
        }

        $data_pasien = DB::connection('mysql2')->table('m_bed')->where('registration_no', $request->cpoe_reg)->first();

        $jenisorder = $request->jenisorder;
        $countorder = DB::connection('mysql')
            ->table("job_orders")
            ->get()
            ->count();

        if ($request->cpoe_tindakan) {
            $job_orders_dt = [];

            if ($jenisorder == 'lab') {
                $kode = 'RLAB';
            } else if ($jenisorder == 'radiologi') {
                $kode = 'RIMG';
            } else if ($jenisorder == 'fisio') {
                $kode = 'REHAB';
            } else {
                $kode = 'ANY';
            }

            if ($jenisorder == 'lab' || $jenisorder == 'radiologi') {
                $order_no = null;
            } else {
                $order_no = genKode(DB::table('job_orders_dt')->where('jenis_order', $jenisorder), null, null, null, $kode);
            }

            foreach ($request->cpoe_tindakan as $key => $value) {
                $item_to_store = [
                    'reg_no' => $request->cpoe_reg,
                    'item_code' => $request->cpoe_tindakan[$key],
                    'id_cppt' => $request->cpoe_cppt,
                    'dokter_order' => $request->kode_dokter,
                    'deleted' => 0,
                    'created_by_id' => $request->user_id ?? null,
                ];

                $sub_item = [
                    'order_no' => $order_no,
                    'jenis_order' => $request->jenisorder,
                    'item_name' => $request->cpoe_nama[$key],
                    'harga_jual' => $request->cpoe_tarif[$key],
                    'qty' => 1,
                    'created_by_name' => $request->name ?? null,
                ];

                $check_existing_item = DB::table('job_orders_dt')
                    ->where($item_to_store)
                    ->first();

                $item_to_store = array_merge($item_to_store, $sub_item);

                if (!isset($check_existing_item)) {
                    $job_orders_dt[] = $item_to_store;
                }
            }


            if ($jenisorder != 'lab' && $jenisorder != 'radiologi') {
                $jobOrder['order_no'] = $order_no;
                $jobOrder['reg_no'] = $request->cpoe_reg;
                $jobOrder['kode_dokter'] = $request->kode_dokter;
                $jobOrder['waktu_order'] = date('Y-m-d H:i:s');
                $jobOrder['service_unit'] = $data_pasien->service_unit_id;
                $jobOrder['id_cppt'] = $request->cpoe_cppt;

                $store_jor = DB::table('job_orders')
                    ->insert($jobOrder);
            }

            $job_orders_dt = array_chunk($job_orders_dt, 5);
            foreach ($job_orders_dt as $init) {
                $store = DB::table('job_orders_dt')->insert($init);
            }

            return [
                'code' => 200,
                'success' => true,
                'message' => 'Data berhasil disimpan'
            ];
        } else {
            return [
                'code' => 500,
                'success' => false,
                'message' => ''
            ];
        }
    }

    function del_order($id)
    {
        try {
            $data = DB::connection('mysql')->table('job_orders_dt')->where('id', $id)->first();
            DB::connection('mysql')->table('job_orders')->where('order_no', $data->order_no)->delete();
            DB::connection('mysql')->table('job_orders_dt')->where('id', $id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'ada data tindakan'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'kesalahan silakan refresh dan coba lagi',
                'msg' => $th
            ]);
        }
    }

    function getOrderTindakanJenis(Request $request)
    {
        $regno = $request->id_cppt;
        $jenisorder = $request->jenisorder;

        $joborderdetail = DB::connection('mysql')
            ->table('job_orders_dt')
            ->leftJoin('job_orders', 'job_orders_dt.order_no', '=', 'job_orders.order_no')
            ->leftJoin('rs_m_paramedic', 'job_orders_dt.dokter_order', '=', 'rs_m_paramedic.ParamedicCode')
            ->where([
                ['job_orders_dt.id_cppt', '=', $regno],
                ['job_orders_dt.jenis_order', '=', $jenisorder]
            ])
            ->select('job_orders_dt.id', 'job_orders_dt.created_at as waktu_order', 'jenis_order', 'job_orders_dt.order_no', 'item_name', 'harga_jual', 'ParamedicName')
            ->get();

        if (isset($request->plain_data)) {
            return $joborderdetail;
        }

        if (count($joborderdetail) > 0) {
            return response()->json([
                'success' => true,
                'message' => 'ada data tindakan',
                'data' => $joborderdetail
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'tidak ada order tindakan'
            ]);
        }
    }



    function getOrderTindakanDokter(Request $request)
    {
        $regno = $request->reg_no;
        $joborderdetail = DB::connection('mysql')
            ->table('job_orders_dt')
            //            ->leftJoin('job_orders','job_orders_dt.order_no','=','job_orders.order_no')
            //            ->leftJoin('rs_m_paramedic','job_orders.kode_dokter','=','rs_m_paramedic.ParamedicCode')
            ->where([
                ['job_orders_dt.reg_no', '=', $regno],
                ['job_orders_dt.jenis_order', '!=', 'obat']
            ])
            ->get();

        if (count($joborderdetail) > 0) {
            return response()->json([
                'success' => true,
                'message' => 'ada data tindakan',
                'data' => $joborderdetail
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'tidak ada order tindakan'
            ]);
        }
    }


    function orderPaket(Request $request)
    {
        $detailpaket = json_decode($request->data);
        $arraypaket = $detailpaket->detail;
        $arrayHarga = array();
        $planning = "";
        $rincianpaket = "";
        foreach ($arraypaket as $detail) {
            //cari harga pada tabel m_tarif
            $planning = $planning . $detail->ItemName1 . ",";
            $rincianpaket = $rincianpaket . "<li>" . $detail->ItemName1 . "</li>";
            //            $harga=DB::connection('mysql')
            //                ->table('rs_m_item_tarif')
            //                ->where('ItemId','=',$detail->ItemSubID)
            //                ->first();
            //            if($harga!=null){
            //                array_push($arrayHarga,$harga);
            //            }else{
            //                $paramssementara=array(
            //                    "tarif_id" => "",
            //                    "SiteCode" => "1",
            //                    "GCMember" => "X0103^004",
            //                    "DocumentNo" => "PERGUB2021RIRJ",
            //                    "ItemID" => "1866",
            //                    "ClassCategoryCode" => "2",
            //                    "RevisionNo" => "1",
            //                    "DocumentDate" => "29:43.3",
            //                    "StartingDate" => "8/3/2021",
            //                    "EndingDate" => "9/6/2033",
            //                    "StandardPrice" => "100000",
            //                    "CustomerPrice" => "0",
            //                    "PersonalPrice" => "100000",
            //                    "DiscountPrice" => "0",
            //                    "MinVariablePrice" => "0",
            //                    "MaxVariablePrice" => "0",
            //                    "StandardPriceBefore" => "100000",
            //                    "CustomerPriceBefore" => "0",
            //                    "PersonalPriceBefore" => "100000",
            //                    "DiscountPriceBefore" => "0",
            //                    "Remarks" => "PERGUB 2021 RANAP DAN RAJAL",
            //                    "IsDeleted" => "0",
            //                    "LastUpdatedBy" => "riza94",
            //                    "LastUpdatedDateTime" => "38:57.8"
            //                );
            //                array_push($arrayHarga,json_decode(json_encode($paramssementara)));
            //           }

        }
        //hilangkan null
        /* return response()->json([
            'success'=>true,
            'message'=>'ada data tindakan',
            'data'=>$arrayHarga[2]->StandardPrice
        ]);*/
        //memulai masukkan data ke job order dan job order detail
        $countorder = DB::connection('mysql')
            ->table("job_orders")
            ->get()
            ->count();
        $newDateFormat = str_replace('-', '', now()->toDateString());
        $orderNumberFormat = 'PKT/RI/' . $newDateFormat . $countorder;

        $jobOrder['reg_no'] = $request->reg_no;
        $jobOrder['kode_dokter'] = $request->soapdok_dokter;
        $jobOrder['waktu_order'] = now()->toDateTimeString();
        //$jobOrder['service_unit'] = $request->service_unit;
        $jobOrder['order_no'] = $orderNumberFormat;
        $detailBatch = array();
        $jobOrderDetail['jenis_order'] = "paket";
        $jobOrderDetail['reg_no'] = $request->reg_no;
        $jobOrderDetail['item_code'] = $request->item_code;
        $jobOrderDetail['qty'] = "1";
        //$jobOrderDetail['dosis'] = $request->dosis[$i];
        $jobOrderDetail['item_name'] = $request->nama_paket;
        //$jobOrderDetail['hari'] = $request->hari[$i];
        //$jobOrderDetail['durasi_hari'] = $request->durasi_hari[$i];
        //$jobOrderDetail['ket_dosis'] = $request->ket_dosis[$i];
        $jobOrderDetail['harga_jual'] = $request->harga_paket;
        $jobOrderDetail['order_no'] = $orderNumberFormat;
        $jobOrderDetail['flag'] = 0;
        array_push($detailBatch, $jobOrderDetail);
        $simpan = DB::connection('mysql')
            ->table('job_orders')
            ->insert($jobOrder);

        if ($simpan == TRUE) {
            DB::connection('mysql')
                ->table('job_orders_dt')
                ->insert($detailBatch);
            $paramssoap = array(
                'soapdok_reg' => $request->reg_no,
                'soap_tanggal' => date('Y-m-d'),
                'soapdok_subject' => $request->ranap_diagnosa,
                'soapdok_object' => $request->ranap_indikasi,
                'soapdok_assesment' => "",
                'soapdok_planning' => $planning,
                'soap_waktu' => date('H:i:s'),
                'soapdok_dokter' => $request->soapdok_dokter,
                'med_rec' => $request->med_rec,
                'nama_ppa' => $request->nama_ppa,
                'soapdok_instruksi' => "",
                'status_review' => "1",
                'is_dokter' => "1"
            );

            $simpancppt = DB::connection('mysql')
                ->table('rs_pasien_cppt')
                ->insert($paramssoap);
            if ($simpancppt == TRUE) {
                $paramshistorypaket = array(
                    'no_reg' => $request->reg_no,
                    'item_code' => $request->item_code,
                    'item_name' => $request->nama_paket,
                    'price' => $request->harga_paket,
                    'rincian_paket' => $rincianpaket,
                );
                $simpanhistorypaket = DB::connection('mysql')
                    ->table('history_paket')
                    ->insert($paramshistorypaket);
                if ($simpanhistorypaket == TRUE) {
                    return response()->json([
                        'success' => true,
                        'message' => 'berhasil simpan data'
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'gagal simpan history paket'
                    ]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'gagal simpan data cppt'
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'gagal simpan'
            ]);
        }
    }

    function getHasilLab()
    {
        //use curl
        $url = 'http://rsud.sumselprov.go.id/labor/api/result-lab?ono=QLAB/202303160000136';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $err = curl_error($ch);  //if you need
        curl_close($ch);

        return view('new_dokter.pemeriksaan_penunjang.hasil_lab', compact('response'));
    }

    function getHasilRadiologi()
    {
        $url = 'http://rsud.sumselprov.go.id/labor/api/report-ris?ono=QIMG/202201190000025';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        $err = curl_error($ch);  //if you need
        curl_close($ch);

        return view('new_dokter.pemeriksaan_penunjang.hasil_radiologi', compact('response'));
    }

    // $newDateFormat = str_replace('-', '', now()->toDateString());

    // if ($jenisorder == "lab") {
    //     $orderNumberFormat = 'LAB/RI/' . $newDateFormat . $countorder;
    // } else if ($jenisorder == "radiologi") {
    //     $orderNumberFormat = 'RAD/RI/' . $newDateFormat . $countorder;
    // } else if ($jenisorder == "fisio") {
    //     $orderNumberFormat = 'FIS/RI/' . $newDateFormat . $countorder;
    // } else if ($jenisorder == "lainnya") {
    //     $orderNumberFormat = 'ANY/RI/' . $newDateFormat . $countorder;
    // }

    public function getOtherInstructions(Request $request)
    {
        try {
            $data = DB::table('rs_pasien_instruksi_luar');

            if (isset($request->params)) {
                foreach ($request->params as $key => $value) {
                    $data = $data->where($value['key'], $value['value']);
                }
            }


            $data = $data->get();

            return $data;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function sendOtherInstructions(Request $request)
    {
        try {
            $check = DB::table('rs_pasien_instruksi_luar')
                ->where('id_cppt', $request->id_cppt)
                ->first();

            $data = [
                'reg_no' => $request->reg_no,
                'dokter_code' => $request->dokter_code,
                'type' => $request->type,
                'instruksi' => $request->instruksi,
                'id_cppt' => $request->id_cppt,
            ];

            if (isset($check)) {
                $data['updated_at'] = date('Y-m-d H:i:s');

                $store = DB::table('rs_pasien_instruksi_luar')
                    ->where('id', $check->id)
                    ->update($data);
            } else {
                $data['created_at'] = date('Y-m-d H:i:s');

                $store = DB::table('rs_pasien_instruksi_luar')
                    ->insert($data);
            }

            $callForeign = new ForeignController;

            if ($request->type == 'rehab') {
                $request->merge([
                    'reg_no' => $request->reg_no,
                    'poli_kode' => 'fisio',
                    'dokter_kode' => 'drxigd',
                ]);

                $sendData = $callForeign->sendRegistrationToRajal($request);
            }

            if (isset($sendData)) {
                if (!$sendData->success) {
                    return $sendData;
                }
            }

            return [
                'code' => 200,
                'success' => true,
                'message' => 'Data berhasil disimpan'
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
