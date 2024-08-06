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

class MnjDtIdkXxCorporateController extends AaaBaseController
{
    protected $nama_model;
    public function __construct()
    {
        $this->nama_model = DB::table('corporate');
    }

    // fungsi
    public function datatable_list($sort='a')
    {
        if($sort==='sort'){
            return [
                'data'     => 'BusinessPartnerName',
                'tb_query' => 'BusinessPartnerName',
                'order_by' => 'asc',
            ];
        }
        $x = [
            [
                'nama'     => 'Nama BusinessPartner',
                'data'     => 'BusinessPartnerName',
                'tb_query' => 'BusinessPartnerName',
            ],
            [
                'nama'     => 'Type',
                'data'     => 'GCCustomerType',
                'tb_query' => 'GCCustomerType',
            ],
            [
                'nama'     => 'Credit Limit',
                'data'     => 'CreditLimit',
                'tb_query' => 'CreditLimit',
            ],
            [
                'nama'     => 'Credit Balance',
                'data'     => 'CreditBalance',
                'tb_query' => 'CreditBalance',
            ],
            [
                'nama'     => 'BlackList',
                'data'     => 'IsBlackList',
                'tb_query' => 'IsBlackList',
            ],
            [
                'nama'     => 'BlackList Reason',
                'data'     => 'BlackListReason',
                'tb_query' => 'BlackListReason',
            ],
        ];
        return $x;
    }

    public function form_list()
    {
        $x = [
            [
                'data'     => 'businesspartner_id',
            ],
            [
                'data'     => 'BusinessPartnerName',
            ],
            [
                'data'     => 'GCCustomerType',
            ],
            [
                'data'     => 'CreditLimit',
            ],
            [
                'data'     => 'CreditBalance',
            ],
            [
                'data'     => 'IsBlackList',
            ],
            [
                'data'     => 'BlackListReason',
            ],
            [
                'data'     => 'Remarks',
            ],
        ];
        return $x;
    }

    public function index(Request $request){
        if($request->ajax()){
            return $this->ajax_index($request);
        }

        $context = array(
            'nyaa_unfc' => app(\App\Http\Controllers\ZxcNyaaUniversal\UniversalFunctionController::class),
            // view
            'form_view' => 'nyaa-universal.data-induk.form.corporate',
            'form_js' => null,
            'form_js_act' => 'nyaa-universal.data-induk.form.corporate-js-act',

            'dt_judul' => 'Data Master - '.'Corporate',
            // default
            'datatable_sort' => $this->datatable_list('sort'),
            'datatable_list' => $this->datatable_list(),
            'form_list' => $this->form_list(),
            // config
            'add_button' => true,
        );
        return view('nyaa-universal.data-induk.general-noindex',$context)
        ->with(get_object_vars($this));
    }

    public function ajax_index($request){
        $dcv = (clone $this->nama_model)->where('hapus',0);
        $form_list = $this->form_list();
        return DataTables()
        ->queryBuilder($dcv)
        ->editColumn('CreditLimit', function($query){
            return $this->universal_function()->rupiah_formatter($query->CreditLimit);
        })
        ->editColumn('CreditBalance', function($query){
            return $this->universal_function()->rupiah_formatter($query->CreditBalance);
        })
        ->editColumn('GCCustomerType', function($query){
            return $this->universal_function()->GCCustomerType($query->GCCustomerType);
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

    public function post_handler(Request $request){
        if($request->ajax()){
            return $this->post_ajax_handler($request);
        }

        return url('/');
    }

    public function post_ajax_handler($request){
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
            $dt_dlt = (clone $this->nama_model)->where('id',$request->dtid)->update([
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
            'businesspartner_id' => 'required',
            'GCCustomerType' => 'required',
            'CreditLimit' => 'required',
            'CreditBalance' => 'required',
            'IsBlackList' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) 
        {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Mohon untuk melengkapi data lalu coba kembali.'], 422);
        }

        $d_businesspartner = DB::table('businesspartner')->where('id',$request->businesspartner_id)->first();
        if( !$d_businesspartner ){
            return response()->json(["error_pesan" => 'Terjadi kesalahan! BusinessPartner yang dipilih tidak ada. Mohon input BusinessPartner terlebih dahulu.'], 422);
        }

        if($cnf['mode']==='add'){
            $cek_kode = (clone $this->nama_model)->where('businesspartner_id',$request->businesspartner_id)->first();
            if( $cek_kode ){
                return response()->json(["error_pesan" => 'Terjadi kesalahan! BusinessPartner yang dipilih telah ada data. Mohon input BusinessPartner lain.'], 422);
            }

            (clone $this->nama_model)->insert([
                'businesspartner_id' => $request->businesspartner_id,
                'BusinessPartnerName' => $d_businesspartner->BusinessPartnerName,
                'GCCustomerType' => $request->GCCustomerType,
                'CreditLimit' => $request->CreditLimit,
                'CreditBalance' => $request->CreditBalance,
                'IsBlackList' => $request->IsBlackList,
                'BlackListReason' => $request->BlackListReason,
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
            $cek_kode = (clone $this->nama_model)->where('id','!=',$cnf['data_key'])->where('businesspartner_id',$request->businesspartner_id)->first();
            if( $cek_kode ){
                return response()->json(["error_pesan" => 'Terjadi kesalahan! BusinessPartner yang dipilih telah ada data. Mohon input BusinessPartner lain.'], 422);
            }
            (clone $this->nama_model)->where(function($query) use($request,$cnf){
                $query->where('id', $cnf['data_key']);
            })
            ->update([
                'businesspartner_id' => $request->businesspartner_id,
                'BusinessPartnerName' => $d_businesspartner->BusinessPartnerName,
                'GCCustomerType' => $request->GCCustomerType,
                'CreditLimit' => $request->CreditLimit,
                'CreditBalance' => $request->CreditBalance,
                'IsBlackList' => $request->IsBlackList,
                'BlackListReason' => $request->BlackListReason,
                'Remarks' => $request->Remarks,
                
                // log
                'updated_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'updated_by_user_name' => Auth::user()->name,
            ]);
        }
        return response()->json(["sukses_pesan" => 'Sukses! Data berhasil '.$cnf['text1'].'.'], 200);
    }

}
