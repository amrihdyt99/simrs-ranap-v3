<?php

namespace App\Http\Controllers\Lab;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\PasienCPOEImaging;
use App\Models\PasienCPOELaboratory;
use App\Models\PasienSoapDok;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailPasienLabController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()){
            return $this->ajax_index($request);
        }
        return view('perawat.pages.detail_pasien.index');
    }

    public function ajax_index($request)
    {
        $pasien = DB::connection('mysql2')->table("m_pasien");
        return DataTables()
        ->queryBuilder($pasien)
        ->editColumn('aksi_data', function ($query) use ($request) {
                return
                ( '<a href="'
                . route('lab.patient_detail', ['MedicalNo' => $query->MedicalNo])
                . '" class="btn btn-sm btn-outline-primary"><i class="mr-2 mdi mdi-account-search menu-icon"></i>Detail Pasien</a>');
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function show(Request $request, $id)
    {
        $pasien = DB::connection('mysql2')
        ->table("m_pasien")
        ->where('MedicalNo', $id)
        ->first();
        if(!$pasien){
            return redirect()->route('lab.detail_pasien_list')->with('error_message', 'Pasien Tidak Ditemukan.');
        }

        if($request->ajax()){
            return $this->ajax_index2 ($request, $id);
        }

        return view('perawat.pages.detail_pasien.show', compact('pasien'));
    }

    public function ajax_index2($request, $id)
    {
        $registrasi = DB::connection('mysql2')
        ->table("m_registrasi")
        ->leftJoin('m_pasien','m_registrasi.reg_medrec','=','m_pasien.MedicalNo')
        ->leftJoin('m_paramedis','m_registrasi.reg_dokter','=','m_paramedis.ParamedicCode')
        ->leftJoin('m_ruangan_baru','m_registrasi.service_unit','=','m_ruangan_baru.id')
        ->leftJoin('m_kelas_ruangan_baru','m_registrasi.bed','=','m_kelas_ruangan_baru.id')
        ->where('m_registrasi.reg_medrec', $id)
        ->select([
            'm_pasien.PatientName',
            'm_registrasi.reg_medrec',
            'm_registrasi.reg_tgl',
            'm_registrasi.reg_no',
            'm_paramedis.ParamedicName',
            'm_ruangan_baru.nama_ruangan',
            'm_registrasi.reg_cara_bayar',
        ]);
        return DataTables()
        ->queryBuilder($registrasi)
        ->editColumn('aksi_data', function ($query) use ($request) {
                return
                ( '<a href="'
                . route('lab.patient_detail_registrasi', [$query->reg_no])
                . '" class="btn btn-sm btn-outline-primary" target="_blank"><i class="mr-2 mdi mdi-account-search menu-icon"></i>Detail Registrasi</a>');
            })
            ->escapeColumns([])
            ->toJson();
    }

    public function show2(Request $request, $id)
    {
        $registrasi = DB::connection('mysql2')
        ->table("m_registrasi")
        ->leftJoin('m_ruangan_baru', function($join){
            $join->on('m_registrasi.reg_ruangan', '=', 'm_ruangan_baru.id');
        })
        ->leftJoin('m_paramedis', function($join){
            $join->on('m_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode');
        })
        // ->leftJoin('rs_m_kelas_kategori', function($join){
        //     $join->on('m_registrasi.reg_class', '=', 'rs_m_kelas_kategori.ClassCategoryCode');
        // })
        ->leftJoin('m_pasien', function($join){
            $join->on('m_registrasi.reg_medrec', '=', 'm_pasien.MedicalNo');
        })
        ->where('m_registrasi.reg_no', $id)
        ->select([
            "m_registrasi.*",
            "m_ruangan_baru.nama_ruangan as nama_ruangan_registrasi",
            "m_paramedis.ParamedicName as nama_dokter_registrasi",
            // "rs_m_kelas_kategori.ClassCategoryName as nama_kelas_registrasi",
            "m_pasien.PatientName as nama_pasien_registrasi",
        ])
        ->first();
        if(!$registrasi){
            return redirect()->route('lab.detail_pasien_list')->with('error_message', 'Pasien Tidak Ditemukan.');
        }

        $kelas = DB::connection('mysql')
        ->table("rs_m_kelas_kategori")
        ->where('ClassCategoryCode', $registrasi->reg_class)
        ->first();
        if(!$kelas){
            return redirect()->route('lab.detail_pasien_list')->with('error_message', 'Kelas Tidak Ditemukan.');
        }

        return view('perawat.pages.detail_pasien.show_registrasi', compact('registrasi','kelas'));
    }
}
