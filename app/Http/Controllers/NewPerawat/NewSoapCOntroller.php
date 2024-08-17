<?php

namespace App\Http\Controllers\NewPerawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewSoapCOntroller extends Controller
{
    function addsoap(Request $request)
    {
        $params = array(
            'soaper_reg' => $request->soaper_reg,
            'soaper_subject' => $request->soaper_subject,
            'soaper_object' => $request->soaper_object,
            'soaper_assesment' => $request->soaper_assesment,
            'soaper_planning' => $request->soaper_planning,
            'soaper_perawat' => $request->soaper_perawat,
            'soaper_poli' => "",
            'nama_ppa' => $request->nama_ppa,

        );

        $getDpjpUtama = DB::connection('mysql2')
        ->table('m_registrasi')
        ->leftJoin('m_paramedis', 'm_registrasi.reg_dokter', '=', 'm_paramedis.ParamedicCode')
        ->where('m_registrasi.reg_no', '=', $request->soaper_reg)
        ->select('m_paramedis.ParamedicCode')
        ->first();

        $dpjpUtama = $getDpjpUtama ? $getDpjpUtama->ParamedicCode : null;

        $simpan = DB::connection('mysql')
            ->table('rs_pasien_soaper')
            ->insert($params);

        if ($simpan == true) {

            $paramscppt = array(
                'soapdok_reg' => $request->soaper_reg,
                'soap_tanggal' => date('Y-m-d'),
                'soapdok_subject' => $request->soaper_subject,
                'soapdok_object' => $request->soaper_object,
                'soapdok_assesment' => $request->soaper_assesment,
                'soapdok_planning' => $request->soaper_planning,
                'soap_waktu' => date('H:i:s'),
                'soapdok_dokter' => $request->soaper_perawat,
                'med_rec' => $request->med_rec_no,
                'soapdok_instruksi' => "",
                'nama_ppa' => $request->nama_ppa,
                'status_review' => '0',
                'dpjp_utama' => $dpjpUtama,
            );

            $simpancppt = DB::connection('mysql')
                ->table('rs_pasien_cppt')
                ->insert($paramscppt);

            if ($simpancppt == true) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data berhasil disimpan'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data gagal disimpan'
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data gagal disimpan'
            ]);
        }
    }

    //get data from rs_pasien_soaper from mysql database
    function getsoapbyreg(Request $request)
    {
        $data = DB::connection('mysql')
            ->table('rs_pasien_cppt')
            ->where('soapdok_reg', $request->regno)
            ->get();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
