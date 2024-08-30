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

class MnjDtIdkXxCustomercontractController extends AaaBaseController
{
    protected $nama_model;
    public function __construct()
    {
        $this->nama_model = DB::table('customercontract');
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
                'nama'     => 'No.Kontrak',
                'data'     => 'ContractNo',
                'tb_query' => 'ContractNo',
            ],
            [
                'nama'     => 'No.Dokumen',
                'data'     => 'DocumentNo',
                'tb_query' => 'DocumentNo',
            ],
            [
                'nama'     => 'Business Partner',
                'data'     => 'BusinessPartnerName',
                'tb_query' => 'BusinessPartnerName',
            ],
            [
                'nama'     => 'Bill To Business Partner',
                'data'     => 'billto_BusinessPartnerName',
                'tb_query' => 'billto_BusinessPartnerName',
            ],
            [
                'nama'     => 'Hospital Signed',
                'data'     => 'HospitalSigned_name',
                'tb_query' => 'HospitalSigned_name',
            ],
            [
                'nama'     => 'Corporate Signed',
                'data'     => 'CorporateSigned_name',
                'tb_query' => 'CorporateSigned_name',
            ],
        ];
        return $x;
    }

    public function form_list()
    {
        $x = [
            [
                'data'     => 'DocumentNo',
            ],

            [
                'data'     => 'DocumentDate',
                'ignore_auto'   => true,
            ],

            [
                'data'     => 'ContractNo',
            ],

            [
                'data'     => 'RevisionNo',
            ],

            [
                'data'     => 'ContractSummary',
            ],

            [
                'data'     => 'StartingDate',
                'ignore_auto'   => true,
            ],

            [
                'data'     => 'EndingDate',
                'ignore_auto'   => true,
            ],

            [
                'data'     => 'businesspartner_id',
            ],

            [
                'data'     => 'BusinessPartnerName',
            ],

            [
                'data'     => 'billto_businesspartner_id',
            ],

            [
                'data'     => 'billto_BusinessPartnerName',
            ],

            [
                'data'     => 'HospitalSigned_id',
            ],

            [
                'data'     => 'HospitalSigned_name',
            ],

            [
                'data'     => 'CorporateSigned_id',
            ],

            [
                'data'     => 'CorporateSigned_name',
            ],

            [
                'data'     => 'GCCoverageType',
            ],

            [
                'data'     => 'GCCoverAdministrationType',
            ],

            [
                'data'     => 'AdministrationFeePercentage',
            ],

            [
                'data'     => 'IsAdministrationChargesByClass',
            ],

            [
                'data'     => 'MinAdministration',
            ],

            [
                'data'     => 'MaxAdministration',
            ],

            [
                'data'     => 'GCCoverCitoType',
            ],

            [
                'data'     => 'CitoPercentage',
            ],

            [
                'data'     => 'GCCoverComplicationType',
            ],

            [
                'data'     => 'ComplicationPercentage',
            ],

            [
                'data'     => 'GCCoverCitoComplicationType',
            ],

            [
                'data'     => 'CitoComplicationPercentage',
            ],

            [
                'data'     => 'IsDiscountInCorporateInvoice',
            ],

            [
                'data'     => 'DiscountCorporateInvoice',
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
            'form_view' => 'nyaa-universal.data-induk.form.customercontract',
            'form_js' => null,
            'form_js_act' => 'nyaa-universal.data-induk.form.customercontract-js-act',

            'dt_judul' => 'Data Master - '.'Contract Management',
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

    public function ajax_index($request){
        $dcv = (clone $this->nama_model)->where('hapus',0);
        $form_list = $this->form_list();
        return DataTables()
        ->queryBuilder($dcv)
        ->editColumn('aksi_data', function($query) use($form_list){
            $dtx_form = '';
            foreach($form_list as $form_list_x){
                if(!array_key_exists('ignore_auto', $form_list_x)){
                    $dtx_form_data = $form_list_x['data'];
                    $dtx_form = $dtx_form.('nyaa-'.$dtx_form_data.'="'.e($query->$dtx_form_data).'" ');
                }
            }
            // custom
            $dtx_form = $dtx_form.('nyaa-DocumentDate="'.$this->universal_function()->carbon_format_date_htmlform($query->DocumentDate).'" ');
            $dtx_form = $dtx_form.('nyaa-StartingDate="'.$this->universal_function()->carbon_format_date_htmlform($query->StartingDate).'" ');
            $dtx_form = $dtx_form.('nyaa-EndingDate="'.$this->universal_function()->carbon_format_date_htmlform($query->EndingDate).'" ');

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
            'DocumentNo' => 'required',
            
            'ContractNo' => 'required',
            'ContractSummary' => 'required',
            'StartingDate' => 'required',
            'EndingDate' => 'required',
            
            'GCCoverageType' => 'required',
            'businesspartner_id' => 'required',
            'billto_businesspartner_id' => 'required',
            'HospitalSigned_id' => 'required',
            'CorporateSigned_id' => 'required',
            
            'GCCoverAdministrationType' => 'required',
            'AdministrationFeePercentage' => 'required',
            'IsAdministrationChargesByClass' => 'required',
            'MinAdministration' => 'required',
            'MaxAdministration' => 'required',
            
            'GCCoverCitoType' => 'required',
            'CitoPercentage' => 'required',
            'GCCoverComplicationType' => 'required',
            'ComplicationPercentage' => 'required',
            'GCCoverCitoComplicationType' => 'required',
            'CitoComplicationPercentage' => 'required',
            'IsDiscountInCorporateInvoice' => 'required',
            'DiscountCorporateInvoice' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()) 
        {
            return response()->json(["error_pesan" => 'Terjadi kesalahan! Mohon untuk melengkapi data lalu coba kembali. Detail: '.$validator->errors()], 422);
        }

        //'businesspartner_id'
        //'billto_businesspartner_id'
        //'HospitalSigned_id'
        //'CorporateSigned_id'
        $datamissing = '';

        $businesspartner_id = DB::table('businesspartner')->where('id',$request->businesspartner_id)->first();
        if( !$businesspartner_id ){
            $datamissing = $datamissing . '(BusinessPartner)';
        }
        $billto_businesspartner_id = DB::table('businesspartner')->where('id',$request->billto_businesspartner_id)->first();
        if( !$billto_businesspartner_id ){
            $datamissing = $datamissing . '(Bill to BusinessPartner)';
        }
        $HospitalSigned_id = DB::table('businesspartner')->where('id',$request->HospitalSigned_id)->first();
        if( !$HospitalSigned_id ){
            $datamissing = $datamissing . '(Hospital Signed)';
        }
        $CorporateSigned_id = DB::table('businesspartner')
            ->leftJoin('corporate', function($join){
                $join->on('businesspartner.id', '=', 'corporate.businesspartner_id');
            })
            ->where('corporate.id',$request->CorporateSigned_id)
            ->select([
                'businesspartner.*',
            ])
            ->first();
        if( !$CorporateSigned_id ){
            $datamissing = $datamissing . '(Corporate Signed)';
        }

        if( $datamissing !== '' ){
            return response()->json(["error_pesan" => 'Terjadi kesalahan! '.$datamissing.' yang dipilih tidak ada. Mohon periksa ulang lalu coba kembali.'], 422);
        }

        if($cnf['mode']==='add'){

            (clone $this->nama_model)->insert([
                'DocumentNo' => $request->DocumentNo,
                'DocumentDate' => $request->DocumentDate ? Carbon::createFromFormat('d/m/Y',$request->DocumentDate) : null,
                'ContractNo' => $request->ContractNo,
                'RevisionNo' => $request->RevisionNo,
                'ContractSummary' => $request->ContractSummary,
                'StartingDate' => $request->StartingDate ? Carbon::createFromFormat('d/m/Y',$request->StartingDate) : null,
                'EndingDate' => $request->EndingDate ? Carbon::createFromFormat('d/m/Y',$request->EndingDate) : null,
                'businesspartner_id' => $request->businesspartner_id,
                'BusinessPartnerName' => $businesspartner_id->BusinessPartnerName,
                'billto_businesspartner_id' => $request->billto_businesspartner_id,
                'billto_BusinessPartnerName' => $billto_businesspartner_id->BusinessPartnerName,
                'HospitalSigned_id' => $request->HospitalSigned_id,
                'HospitalSigned_name' => $HospitalSigned_id->BusinessPartnerName,
                'CorporateSigned_id' => $request->CorporateSigned_id,
                'CorporateSigned_name' => $CorporateSigned_id->BusinessPartnerName,
                'GCCoverageType' => $request->GCCoverageType,
                'GCCoverAdministrationType' => $request->GCCoverAdministrationType,
                'AdministrationFeePercentage' => $request->AdministrationFeePercentage,
                'IsAdministrationChargesByClass' => $request->IsAdministrationChargesByClass,
                'MinAdministration' => $request->MinAdministration,
                'MaxAdministration' => $request->MaxAdministration,
                'GCCoverCitoType' => $request->GCCoverCitoType,
                'CitoPercentage' => $request->CitoPercentage,
                'GCCoverComplicationType' => $request->GCCoverComplicationType,
                'ComplicationPercentage' => $request->ComplicationPercentage,
                'GCCoverCitoComplicationType' => $request->GCCoverCitoComplicationType,
                'CitoComplicationPercentage' => $request->CitoComplicationPercentage,
                'IsDiscountInCorporateInvoice' => $request->IsDiscountInCorporateInvoice,
                'DiscountCorporateInvoice' => $request->DiscountCorporateInvoice,
                
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
            ->update([
                'DocumentNo' => $request->DocumentNo,
                'DocumentDate' => $request->DocumentDate ? Carbon::createFromFormat('d/m/Y',$request->DocumentDate) : null,
                'ContractNo' => $request->ContractNo,
                'RevisionNo' => $request->RevisionNo,
                'ContractSummary' => $request->ContractSummary,
                'StartingDate' => $request->StartingDate ? Carbon::createFromFormat('d/m/Y',$request->StartingDate) : null,
                'EndingDate' => $request->EndingDate ? Carbon::createFromFormat('d/m/Y',$request->EndingDate) : null,
                'businesspartner_id' => $request->businesspartner_id,
                'BusinessPartnerName' => $businesspartner_id->BusinessPartnerName,
                'billto_businesspartner_id' => $request->billto_businesspartner_id,
                'billto_BusinessPartnerName' => $billto_businesspartner_id->BusinessPartnerName,
                'HospitalSigned_id' => $request->HospitalSigned_id,
                'HospitalSigned_name' => $HospitalSigned_id->BusinessPartnerName,
                'CorporateSigned_id' => $request->CorporateSigned_id,
                'CorporateSigned_name' => $CorporateSigned_id->BusinessPartnerName,
                'GCCoverageType' => $request->GCCoverageType,
                'GCCoverAdministrationType' => $request->GCCoverAdministrationType,
                'AdministrationFeePercentage' => $request->AdministrationFeePercentage,
                'IsAdministrationChargesByClass' => $request->IsAdministrationChargesByClass,
                'MinAdministration' => $request->MinAdministration,
                'MaxAdministration' => $request->MaxAdministration,
                'GCCoverCitoType' => $request->GCCoverCitoType,
                'CitoPercentage' => $request->CitoPercentage,
                'GCCoverComplicationType' => $request->GCCoverComplicationType,
                'ComplicationPercentage' => $request->ComplicationPercentage,
                'GCCoverCitoComplicationType' => $request->GCCoverCitoComplicationType,
                'CitoComplicationPercentage' => $request->CitoComplicationPercentage,
                'IsDiscountInCorporateInvoice' => $request->IsDiscountInCorporateInvoice,
                'DiscountCorporateInvoice' => $request->DiscountCorporateInvoice,
                
                // log
                'updated_at' => $this->universal_function()->carbon_generate_datetime_now(),
                'updated_by_user_name' => Auth::user()->name,
            ]);
        }
        return response()->json(["sukses_pesan" => 'Sukses! Data berhasil '.$cnf['text1'].'.'], 200);
    }

}
