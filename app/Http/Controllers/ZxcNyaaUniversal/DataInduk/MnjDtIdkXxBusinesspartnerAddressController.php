<?php

namespace App\Http\Controllers\ZxcNyaaUniversal\DataInduk;

use App\Http\Controllers\ZxcNyaaUniversal\AaaBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class MnjDtIdkXxBusinesspartnerAddressController extends AaaBaseController
{
    protected $nama_model;
    public function __construct()
    {
        $this->nama_model = DB::table('businesspartner_address');
    }

    // fungsi
    public function datatable_list($sort='a')
    {
        if($sort==='sort'){
            return [
                'data'     => 'GCAddressType',
                'tb_query' => 'GCAddressType',
                'order_by' => 'asc',
            ];
        }
        $x = [
            [
                'nama'     => 'Jenis Alamat',
                'data'     => 'GCAddressType',
                'tb_query' => 'GCAddressType',
            ],
            [
                'nama'     => 'Negara',
                'data'     => 'Country',
                'tb_query' => 'Country',
            ],
            [
                'nama'     => 'Provinsi',
                'data'     => 'Province',
                'tb_query' => 'Province',
            ],
            [
                'nama'     => 'Kabupaten/Kota',
                'data'     => 'City',
                'tb_query' => 'City',
            ],
        ];
        return $x;
    }

    public function form_list()
    {
        $x = [
            [
                'data'     => 'GCAddressType',
            ],
            [
                'data'     => 'Line1',
            ],
            [
                'data'     => 'Line2',
            ],
            [
                'data'     => 'District',
            ],
            [
                'data'     => 'City',
            ],
            [
                'data'     => 'Province',
            ],
            [
                'data'     => 'ZipCode',
            ],
            [
                'data'     => 'Country',
            ],
            [
                'data'     => 'PhoneNo1',
            ],
            [
                'data'     => 'PhoneNo2',
            ],
            [
                'data'     => 'FaxNo1',
            ],
            [
                'data'     => 'FaxNo2',
            ],
            [
                'data'     => 'Email1',
            ],
            [
                'data'     => 'Email2',
            ],
            [
                'data'     => 'Remarks',
            ],
        ];
        return $x;
    }

    public function index(Request $request, $businesspartner_id){
        if($request->ajax()){
            return $this->ajax_index($request, $businesspartner_id);
        }

        $d_businesspartner = DB::table('businesspartner')->where('id',$businesspartner_id)->first();
        if(!$d_businesspartner){
            return abort(404);
        }

        $context = array(
            'nyaa_unfc' => app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class),
            // view
            'form_view' => 'nyaa-universal.data-induk.form.businesspartner-address',
            'form_js' => null,
            'form_js_act' => null,

            'dt_judul' => 'Data Master - '.'Alamat BusinessPartner / PartnerBisnis - '.$d_businesspartner->BusinessPartnerName,
            // default
            'datatable_sort' => $this->datatable_list('sort'),
            'datatable_list' => $this->datatable_list(),
            'form_list' => $this->form_list(),
            // config
            'add_button' => true,
            'business_partner' => false,
        );
        return view('nyaa-universal.data-induk.general-noindex',$context)
        ->with(get_object_vars($this));
    }

    public function ajax_index($request, $businesspartner_id){
        $dcv = (clone $this->nama_model)->where('hapus',0)->where('businesspartner_id',$businesspartner_id);
        $form_list = $this->form_list();
        return DataTables()
        ->queryBuilder($dcv)
        ->editColumn('GCAddressType', function($query){
            return $this->universal_function()->GCAddressType($query->GCAddressType);
        })
        ->editColumn('aksi_data', function($query) use($form_list){
            $dtx_form = '';
            foreach($form_list as $form_list_x){
                $dtx_form_data = $form_list_x['data'];
                $dtx_form = $dtx_form.('nyaa-'.$dtx_form_data.'="'.e($query->$dtx_form_data).'" ');
            }
            return ('<button type="button" class="protecc btn btn-sm btn-info mr-2 mb-2" onclick="nyaa_act(this)" nyaa-mode="edit" '.
            'nyaa-dtid="'.$query->id.'" '.
            $dtx_form.
            '>Edit</button>')
            .
            ('<button type="button" class="protecc btn btn-sm btn-danger mr-2 mb-2" onclick="nyaa_dlt(this)" nyaa-mode="hapus" '.
            'nyaa-dtid="'.$query->id.'" '.
            '>Hapus</button>');
        })
        ->escapeColumns([])
        ->toJson();
    }

    public function post_handler(Request $request, $businesspartner_id){
        if($request->ajax()){
            return $this->post_ajax_handler($request, $businesspartner_id);
        }

        return url('/');
    }

    public function post_ajax_handler($request, $businesspartner_id){
        if($request->dt_mode==='add'){
            $cnf = [
                'mode' => 'add',
                'data_key' => null,
                'text1' => 'ditambahkan',
            ];
        }
        elseif($request->dt_mode==='edit'){
            if(!$request->dtid){
                return response()->json(["error_pesan" => 'Terjadi kesalahan! Data ID tidak terisi untuk mode edit.'], 422);
            }
            $cnf = [
                'mode' => 'edit',
                'data_key' => $request->dtid,
                'text1' => 'diperbarui',
            ];
        }
        elseif($request->dt_mode==='hapus'){
            // hapus data
            $dt_dlt = (clone $this->nama_model)
            ->where('id',$request->dtid)
            ->where('businesspartner_id',$businesspartner_id)
            ->update([
                // log
                'aktif' => 0,
                'aktif_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'aktif_by_user_name' => Auth::user()->name,

                'hapus' => 1,
                'hapus_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'hapus_by_user_name' => auth()->user()->name,
            ]);
            return response()->json(["sukses_pesan" => 'Sukses! Data berhasil dihapus.'], 200);
        }
        else{
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Data Mode tidak ditemukan'], 422);
        };
        
        $rules = [
            'GCAddressType' => 'required',
            'Line1' => 'required',
            'City' => 'required',
            'Province' => 'required',
            'Country' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) 
        {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Mohon untuk melengkapi data lalu coba kembali.'], 422);
        }

        if($cnf['mode']==='add'){

            (clone $this->nama_model)->insert([
                'businesspartner_id' => $businesspartner_id,
                'GCAddressType' => $request->GCAddressType,
                'Line1' => $request->Line1,
                'Line2' => $request->Line2,
                'District' => $request->District,
                'City' => $request->City,
                'Province' => $request->Province,
                'ZipCode' => $request->ZipCode,
                'Country' => $request->Country,
                'PhoneNo1' => $request->PhoneNo1,
                'PhoneNo2' => $request->PhoneNo2,
                'FaxNo1' => $request->FaxNo1,
                'FaxNo2' => $request->FaxNo2,
                'Email1' => $request->Email1,
                'Email2' => $request->Email2,
                'Remarks' => $request->Remarks,
                
                // log
                'aktif' => 1,
                'aktif_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'aktif_by_user_name' => Auth::user()->name,
                
                'created_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'created_by_user_name' => Auth::user()->name,
                
                'updated_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'updated_by_user_name' => Auth::user()->name,
            ]);
        }

        if($cnf['mode']==='edit'){
            (clone $this->nama_model)->where(function($query) use($request,$cnf){
                $query->where('id', $cnf['data_key']);
            })
            ->where('businesspartner_id',$businesspartner_id)
            ->update([
                'GCAddressType' => $request->GCAddressType,
                'Line1' => $request->Line1,
                'Line2' => $request->Line2,
                'District' => $request->District,
                'City' => $request->City,
                'Province' => $request->Province,
                'ZipCode' => $request->ZipCode,
                'Country' => $request->Country,
                'PhoneNo1' => $request->PhoneNo1,
                'PhoneNo2' => $request->PhoneNo2,
                'FaxNo1' => $request->FaxNo1,
                'FaxNo2' => $request->FaxNo2,
                'Email1' => $request->Email1,
                'Email2' => $request->Email2,
                'Remarks' => $request->Remarks,
                
                // log
                'updated_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'updated_by_user_name' => Auth::user()->name,
            ]);
        }
        return response()->json(["sukses_pesan" => 'Sukses! Data berhasil '.$cnf['text1'].'.'], 200);
    }

}
