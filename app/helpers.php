<?php

use App\Http\Controllers\Kasir\BillingController;
use App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

function keyPharmacy(){
    return '229470a5-fe98-479e-ba3f-5c5b8eec7c88';
}

function domain($path = 1) {
    if ($path == 1) {
        $domain = 'https://rsud.sumselprov.go.id/';
    } else {
        $domain = 'http://192.168.80.113/';
    }

    return $domain;
    
}

function urlPharmacy($path, $location = ''){
    return domain(1).'farmasi/web-apis/'.$path.'?akseskunci='.keyPharmacy().''.$location;
}

function urlLabRadiology() {
    return domain(1).'labor';
}

function urlSimrsRanap() {
    return domain(1).'simrs_ranap/';
}

function urlSimrs() {
    return domain(1).'simrs-rajal/';
}

function getService($url, $array = false) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Cookie: XSRF-TOKEN=eyJpdiI6ImQvdmtEVi9OSk5iNTl1OFFiQnZDNkE9PSIsInZhbHVlIjoiY256TkV3bGRTSld0bHZBdS9SZzdrelRWNXNvMUdrTFhBN3pON1RKamZ3MmFGTFN0dVNIaW9raDZpeGQ5L3VsMWtBZjdqMjFrdTJZR0lobG9VelpWSHNZcWd0VW5pODlqeTlWS2xrMkZCY3IzWDY2VU5pMGx4TithYjYvbVBkMXMiLCJtYWMiOiJlZTY1M2Q0ZmYyNTgxY2NjYTc1MzkwZTZiZmQ0MDNhZWI3NDM0ZDVlNDYzODVlZjg3NzYyZTNkOWEzZDNhMDY3IiwidGFnIjoiIn0%3D; farmasi_session=eyJpdiI6IlFSQWFrL2ZiNVRqS0hxbU5JaElWQlE9PSIsInZhbHVlIjoiWU5rTXM5bzRkOTkyZElCd2VMNSs3VTVMTjdMQi9zTjc0RHdBZG1IUnAxc2VIZ0RPd09YSjZSSnBIdWxtaCtFZEtkR0dQQ2Z5akxjRUljVDJMYW10bGZuZ3FQOXQzU3VDTzNsRVpuRDBlbUdJaGliS2ZMbXFUTitVdHNxMUtLZngiLCJtYWMiOiJkODgyNTFkZjg1YWU1Mzk1ZDAwYmEzYWIzNWUzMTM4NmVjYWEyNjJmZjMzYjMzYzMzYWJjMGRkZjdjNTUwNTFiIiwidGFnIjoiIn0%3D'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    
    if ($array == true) {
        return json_decode($response, 1);
    } else {
        return $response;
    }
}

function postService($url, $data, $header = '') {
    $curl = curl_init();

    if ($header != '') {
        $header = $header;
    } else {
        $header = array(
            'Content-Type: application/json'
        );
    }

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => $header,
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
}

function getDataKeyValue($table, $field, $id, $column = ['*']) {
    $data = $table->where($field, $id)->select($column)->get();

    foreach ($data as $key => $value) {
        $item[$key] = $value;
    }

    if (isset($item)) {
        return $item[0];
    } else {
        return [];
    }
}
function genKode($table = null, $field = null, $condition = null, $data = null, $kode = null){
    try {
        $where = [];
        if ($data != null) {
            $where[$condition] = $data; 
        }

        // $kode = 'RLAB';
        // $table = 'App\Models\PLab';
        // $field = 'created_at';

        if ($kode == 'RLAB') {
            $gen_kode = json_decode(getService(urlLabRadiology().'/api/last-order-v2'));

            if ($gen_kode->success == true) {
                $gen_kode = $gen_kode->data->NextNoOrder;
            } else {
                $gen_kode = '-';
            }
            
            return $gen_kode;
        } else {
            if ($kode == 'RIMG') {
                $gen_kode = json_decode(getService(urlLabRadiology().'/api/last-order-radiologi-v2'));

                if ($gen_kode->success == true) {
                    $gen_kode = $gen_kode->data->NextNoOrder;
                } else {
                    $gen_kode = '-';
                }

                return $gen_kode;
                
                
            } else {
                if ($kode == 'FARM') {
                    $gen_kode = json_decode(getService(urlPharmacy('get-no-order-insertable', '&location=ranap')));
    
                    if ($gen_kode->status_kode == 200) {
                        $gen_kode = $gen_kode->data->order_no;

                        return $gen_kode;
                    }
                } else if ($kode == 'K.U') {
                    $kode_ = 'kontrol_nomor'; 
                } else if ($kode == 'I.R.I') {
                    $kode_ = 'ranap_nomor'; 
                } else if ($kode == 'QARP') {
                    $kode_ = 'pvalidation_code'; 
                } else {
                    $kode_ = 'order_no';
                }
                
                $check = $table->whereDate('created_at', Carbon::today())
                                    ->max($kode_);

                $subs = 0;

                if (isset($check)) {
                    $subs = (int) substr($check, 16, 7);
                }

                $prefix = 'RI/';
            }
            
            if ($subs == null || $subs < 1) {
                $count = 1;
            } else {
                $count = $subs+1;
            }
            
            // $number = str_pad($count, 7, '0', STR_PAD_LEFT);
            $number = mt_rand(0000000,9999999);
            $gen_kode = $kode.'/'.$prefix.''.str_replace('-', '', date('Y-m-d')).$number;
        }

        return $gen_kode;
        
    } catch (\Throwable $th) {
        throw $th;
    }
}

function getUni(){
    $uni = new UniversalFunctionController;
    return $uni;
}

function getDatabase($name){
    $db = [
        'master' => DB::connection('mysql2')->getDatabaseName(),
        'inap' => DB::connection('mysql')->getDatabaseName(),
    ];

    return $db[$name];
}

function checkPaymentStatus($reg){
    $callBill = new BillingController;

    $request = new Request;

    $request->merge([
        'reg_no' => $reg
    ]);

    $data = $callBill->checkStatus($request);

    return $data;
}

function getLimit($local = true){
    $top = '';
    $limit = '';

    if (str_contains(env('DB_HOST'), '192.168.80.114')) {
        $top = 'top 1';
    } else {
        $limit = 'limit 1';
    }

    return [$top, $limit];
}

function getCurrentLocation($reg, $skipLast = false){
    $data = [];

    $getLatestBedHistory = DB::connection('mysql2')
            ->table('m_bed_history as a')
            ->join('m_bed as b', 'ToBedID', 'bed_id')
            ->where('RegNo', $reg)
            ->orderBy(DB::raw("CONCAT(ReceiveTransferDate, ' ', ReceiveTransferTime)"), 'desc')
            ->select([
                'a.*',
                'b.room_id',
                'b.bed_code',
                DB::raw("
                    (select ServiceUnitCode 
                        from m_unit_departemen
                        where ServiceUnitID = service_unit_id
                    ) as ServiceUnitCode"
                )
            ]);

        if ($skipLast) {
            $getLatestBedHistory = $getLatestBedHistory->skip(1);
        }

        $getLatestBedHistory = $getLatestBedHistory->first();

    if ($getLatestBedHistory) {
        if (isset($getLatestBedHistory->ServiceUnitCode)) {
            $data['ServiceUnitName'] = DB::connection('mysql2')
                ->table('m_unit')
                ->where('ServiceUnitCode', $getLatestBedHistory->ServiceUnitCode)
                ->first()->ServiceUnitName ?? '-';
        }

        if (isset($getLatestBedHistory->room_id)) {
            $data['RoomName'] = DB::connection('mysql2')
                ->table('m_ruangan')
                ->where('RoomID', $getLatestBedHistory->room_id)
                ->first()->RoomName ?? '-';
        }
        
        if (isset($getLatestBedHistory->ToChargeClassCode)) {
            $data['ChargeClassCodeName'] = DB::connection('mysql2')
                ->table('m_room_class')
                ->where('ClassCode', $getLatestBedHistory->ToChargeClassCode)
                ->first()->ClassName ?? '-';
        }

        $data['ServiceUnitID'] = $getLatestBedHistory->ToUnitServiceID;
        $data['ServiceUnitCode'] = $getLatestBedHistory->ServiceUnitCode;
        $data['ClassCode'] = $getLatestBedHistory->ToClassCode;
        $data['ChargeClassCode'] = $getLatestBedHistory->ToChargeClassCode;
        $data['BedID'] = $getLatestBedHistory->ToBedID;
        $data['BedCode'] = $getLatestBedHistory->bed_code;
    }

    return $data;
}

function mergeObject($first, $second){
    $firstArray = (array) $first;
    $secondArray = (array) $second;

    $mergedData = array_merge($firstArray, $secondArray);

    $mergedDataObject = (object) $mergedData;

    return $mergedDataObject;
}

function sortData($data, $field, $arrange = true){
    usort($data, function ($a, $b) use ($field, $arrange) {
        if ($arrange) {
            return strcmp($a[$field], $b[$field]);
        } else {
            return strcmp($b[$field], $a[$field]);
        }
    });

    return $data;
}

function getItemTindakan($reg, $class, $type, $params){
    $data = getService(urlSimrs().'api/emr/cpoe/data_all_item/'.$type.'/'.str_replace('/', '_', $reg).'?classParams='.$class.'&searchParams='.$params);

    return json_decode($data);
}

function getCurrentBPJSPrice($currentData = []){
    if (is_array($currentData) && !isset($currentData['regNo'])) {
        $tarif = $currentData['currentPrice'];
    } else {
        $convertChargeClass = DB::connection('mysql2')
            ->table('m_room_class')
            ->where('ClassCode', $currentData['ChargeClassCode'])
            ->select([
                'ClassCategoryCode as ChargeClassCode'
            ])
            ->first();
            
        if ($currentData['payer'] == 2 && $convertChargeClass->ChargeClassCode != '005') {
            // COMPARE PREVIOUS AND CURRENT CHARGE CLASS TO DECIDE IF GET NEW PRICE OR NOT
            if (isset($currentData['PreviousChargeClassCode']) && $currentData['PreviousChargeClassCode'] != $currentData['ChargeClassCode']) {
                $tarif = getItemTindakan($currentData['regNo'], $convertChargeClass->ChargeClassCode, $currentData['itemType'], $currentData['itemCode']);
                
                $tarif = count($tarif) > 0 ? (float) $tarif[0]->PersonalPrice : 0;
            } else {
                $tarif = $currentData['currentPrice'];
            }
        } else {
            $tarif = $currentData['currentPrice'];
        }
    }

    return (float) $tarif;
}

function countInpatientDays($reg){
    $data = DB::connection('mysql2')
        ->table('m_bed_history')
        ->where('regNo', $reg);
        
    $first = $data->orderBy(DB::raw("CONCAT(ReceiveTransferDate, ' ', ReceiveTransferTime)"), 'asc')
        ->select([
            DB::raw("CONCAT(ReceiveTransferDate, ' ', ReceiveTransferTime) as validateDate")
        ])
        ->first();

    $last = $data->orderBy(DB::raw("CONCAT(ReceiveTransferDate, ' ', ReceiveTransferTime)"), 'desc')
        ->where('Description', 'Pasien Pulang')
        ->select([
            DB::raw("CONCAT(ReceiveTransferDate, ' ', ReceiveTransferTime) as validateDate")
        ])
        ->first();

    if (!$last) {
        return [
            'success' => false,
            'data' => [
                'duration' => ['days' => 0]
            ], 
            'msg' => 'Total perhitungan tarif kamar belum bisa dilakukan, dikarenakan pasien belum pulang. Mohon koordinasikan dengan perawat untuk penutupan bed dan pemulangan pasien ini.'
        ];
    }

    return [
        'success' => true,
        'data' => [
            'duration' => countDurationBetweenDates($first->validateDate, $last->validateDate, true)
        ], 
        'msg' => 'Durasi rawat inap pasien berhasil ditentukan'
    ];
}

function countDurationBetweenDates($start, $end, $countFirstDay = false){
    $datetime1 = Carbon::parse($start);
    $datetime2 = Carbon::parse($end);

    if ($countFirstDay) {
        $datetime1 = $datetime1->copy()->subDay(2);
    }

    $diff = $datetime1->diff($datetime2);

    return [
        'months' => $diff->m,
        'days' => $diff->d,
        'hours' => $diff->h,
        'minutes' => $diff->i,
        'seconds' => $diff->s, 
    ];
}

function paymentMethod(){
    $data_method = [
        'Cash', 'Transfer', 'Discount Global', 'Debit', 'Kredit', 'QRIS', 'Multipayer'
    ];

    return $data_method;
}