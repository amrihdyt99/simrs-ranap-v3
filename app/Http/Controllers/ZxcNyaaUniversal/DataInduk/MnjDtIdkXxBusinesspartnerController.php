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

class MnjDtIdkXxBusinesspartnerController extends AaaBaseController
{
    protected $nama_model;
    public function __construct()
    {
        $this->nama_model = DB::table('businesspartner');
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
                'nama'     => 'Kode BusinessPartner',
                'data'     => 'BusinessPartnerCode',
                'tb_query' => 'BusinessPartnerCode',
            ],
            [
                'nama'     => 'Nama BusinessPartner',
                'data'     => 'BusinessPartnerName',
                'tb_query' => 'BusinessPartnerName',
            ],
            [
                'nama'     => 'Nama Kontak 1',
                'data'     => 'ContactPerson1Name',
                'tb_query' => 'ContactPerson1Name',
            ],
            [
                'nama'     => 'No.HP Kontak 1',
                'data'     => 'ContactPerson1PhoneNo',
                'tb_query' => 'ContactPerson1PhoneNo',
            ],
        ];
        return $x;
    }

    public function form_list()
    {
        $x = [
            [
                'data'     => 'BusinessPartnerCode',
            ],
            [
                'data'     => 'BusinessPartnerName',
            ],
            [
                'data'     => 'ContactPerson1Name',
            ],
            [
                'data'     => 'ContactPerson1PhoneNo',
            ],
            [
                'data'     => 'ContactPerson2Name',
            ],
            [
                'data'     => 'ContactPerson2PhoneNo',
            ],
            [
                'data'     => 'ShortName',
            ],
            [
                'data'     => 'Initial',
            ],
            [
                'data'     => 'IsTaxRegistrant',
            ],
            [
                'data'     => 'TaxRegistrantNo',
            ],
            [
                'data'     => 'TermCode',
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
            // view
            'form_view' => 'nyaa-universal.data-induk.form.businesspartner',
            'form_js' => null,
            'form_js_act' => null,

            'dt_judul' => 'Data Master - '.'BusinessPartner / PartnerBisnis',
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
            '>Hapus</button>')
            .
            ('<br><a class="btn btn-sm btn-secondary mr-2 mb-2" '.
            'href="'.route('nyaa_universal.data_master.businesspartner_address.get_handler',[$query->id]).'" '.
            '>Data Alamat</a>');
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
            'BusinessPartnerCode' => 'required',
            'BusinessPartnerName' => 'required',
            'ContactPerson1Name' => 'required',
            'ContactPerson1PhoneNo' => 'required',
            'IsTaxRegistrant' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) 
        {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Mohon untuk melengkapi data lalu coba kembali.'], 422);
        }

        if($cnf['mode']==='add'){
            $cek_kode = (clone $this->nama_model)->where('BusinessPartnerCode',$request->BusinessPartnerCode)->first();
            if( $cek_kode ){
                return response()->json(["error_pesan" => 'Terjadi kesalahan! Kode BusinessPartner telah dipakai. Mohon input kode lain.'], 422);
            }

            (clone $this->nama_model)->insert([
                'BusinessPartnerCode' => $request->BusinessPartnerCode,
                'BusinessPartnerName' => $request->BusinessPartnerName,
                'ContactPerson1Name' => $request->ContactPerson1Name,
                'ContactPerson2Name' => $request->ContactPerson2Name,
                'ContactPerson1PhoneNo' => $request->ContactPerson1PhoneNo,
                'ContactPerson2PhoneNo' => $request->ContactPerson2PhoneNo,
                'Initial' => $request->Initial,
                'ShortName' => $request->ShortName,
                'IsTaxRegistrant' => $request->IsTaxRegistrant,
                'TaxRegistrantNo' => $request->TaxRegistrantNo,
                'TermCode' => $request->TermCode,
                'Remarks' => $request->Remarks,
                // default
                'BusinessPartnerType' => 0,
                
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
            $cek_dtx = (clone $this->nama_model)->where('id',$cnf['data_key'])->first();
            if( !$cek_dtx ){
                return response()->json(["error_pesan" => 'Terjadi kesalahan! Data tidak ditemukan.'], 422);
            }
            $cek_kode = (clone $this->nama_model)->where('id','!=',$cnf['data_key'])->where('BusinessPartnerCode',$request->BusinessPartnerCode)->first();
            if( $cek_kode ){
                return response()->json(["error_pesan" => 'Terjadi kesalahan! Kode BusinessPartner telah dipakai. Mohon input kode lain.'], 422);
            }
            (clone $this->nama_model)->where(function($query) use($request,$cnf){
                $query->where('id', $cnf['data_key']);
            })
            ->update([
                'BusinessPartnerCode' => $request->BusinessPartnerCode,
                'BusinessPartnerName' => $request->BusinessPartnerName,
                'ContactPerson1Name' => $request->ContactPerson1Name,
                'ContactPerson2Name' => $request->ContactPerson2Name,
                'ContactPerson1PhoneNo' => $request->ContactPerson1PhoneNo,
                'ContactPerson2PhoneNo' => $request->ContactPerson2PhoneNo,
                'Initial' => $request->Initial,
                'ShortName' => $request->ShortName,
                'IsTaxRegistrant' => $request->IsTaxRegistrant,
                'TaxRegistrantNo' => $request->TaxRegistrantNo,
                'TermCode' => $request->TermCode,
                'Remarks' => $request->Remarks,
                // default
                'BusinessPartnerType' => 0,
                
                // log
                'updated_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'updated_by_user_name' => Auth::user()->name,
            ]);
        }
        return response()->json(["sukses_pesan" => 'Sukses! Data berhasil '.$cnf['text1'].'.'], 200);
    }

}
