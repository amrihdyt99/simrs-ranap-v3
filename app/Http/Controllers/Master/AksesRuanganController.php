<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\ApiMasterController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AksesRuanganController extends Controller
{
    protected $table = 'm_paramedis_ruangan';

    public function index(Request $request){
        return view('master.pages.aksesRuangan.index');
    }

    public function data(Request $request){
        try {
            $data = DB::connection('mysql2')
                ->table('m_paramedis_ruangan');

            if (isset($request->params)) {
                foreach ($request->params as $key => $value) {
                    $data = $data->where($value['key'], $value['value']);
                }
            }

            $data = $data->get();

            $mainData = [];

            foreach ($data as $key => $value) {
                $call_paramedic = new ApiMasterController;
                $call_service = new DepartementController;

                $item['id'] = $value->id;
                $item['ParamedicCode'] = $value->ParamedicCode;
                $item['ParamedicType'] = $value->ParamedicType;

                if ($value->ParamedicType == 'X0055^001') {
                    $type = 'Dokter';
                } else if ($value->ParamedicType == 'X0055^003') {
                    $type = 'Perawat';
                } else {
                    $type = 'Tidak diketahui';
                }
                

                $item['ParamedicTypeName'] = $type;

                $request->merge([
                    'paramedic_type' => $value->ParamedicType,
                    'params' => $value->ParamedicCode,
                ]);

                $paramedic = $call_paramedic->paramedic($request);

                $item['ParamedicName'] = $paramedic ? $paramedic[0]->ParamedicName : null;

                $item['ParamedicAccessRoom'] = [];

                foreach (json_decode($value->ParamedicAccessRoom) as $room_value) {
                    $item_room['ServiceId'] = $room_value;

                    $request->merge([
                        'serviceCode' => $room_value
                    ]);

                    $service = $call_service->getServiceUnitLantai($request);

                    $item_room['ServiceName'] = $service ? $service[0]->ServiceUnitName : '';

                    $item['ParamedicAccessRoom'][] = $item_room;
                }

                $mainData[] = $item;
            }

            return $mainData;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request){
        try {
            if ($request->selected_ruangan) {
                $data = [
                    'ParamedicCode' => $request->paramedis,
                    'ParamedicAccessRoom' => json_encode($request->selected_ruangan),
                    'ParamedicType' => $request->paramedic_type,
                ];

                $check = DB::connection('mysql2')->table($this->table)
                    ->where('ParamedicCode', $request->paramedis)
                    ->first();

                if (isset($check)) {
                    $data['updated_at'] = date('Y-m-d H:i:s');

                    $store = DB::connection('mysql2')->table($this->table)
                        ->where('id', $check->id)
                        ->update($data);
                } else {
                    $data['created_at'] = date('Y-m-d H:i:s');

                    $store = DB::connection('mysql2')->table($this->table)
                        ->insert($data);
                }

                return [
                    'code' => 200,
                    'success' => true,
                    'message' => 'Berhasil menambah data'
                ];
            } else {
                return [
                    'code' => 500,
                    'success' => false,
                    'message' => 'tipe dokter, nama dokter, dan ruangan harus dipilih'
                ];
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete(Request $request){
        try {
            $delete = DB::connection('mysql2')
                ->table($this->table);

            if (isset($request->params)) {
                foreach ($request->params as $key => $value) {
                    $delete = $delete->where($value['key'], $value['value']);
                }

                $delete = $delete->delete();

                return [
                    'code' => 200,
                    'success' => true,
                    'message' => 'Berhasil menghapus data'
                ];
            } else {
                return [
                    'code' => 500,
                    'success' => false,
                    'message' => 'Parameter hapus tidak ditemukan'
                ];
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
