<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\RegistrationInap;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function index()
    {
        $data['patients'] = Pasien::limit(1000)->get();
        return view('master.pages.patient.index', $data);
    }

    public function create()
    {
        return view('register.pages.ranap.patient');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'SSN' => ['required', 'string'],
            'MedicalNo' => ['required', 'string'],
            'FirstName' => ['required', 'string'],
            'MiddleName' => ['required', 'string'],
            'LastName' => ['required', 'string'],
            'PatientName' => ['required', 'string'],
            'PatientNameOnCard' => ['required', 'string'],
            'CityOfBirth' => ['required', 'string'],
            'DateOfBirth' => ['required', 'string'],
        ]);
        $input['PatientCity']="";
        $input['PatientProvince']="";
        $input['PatientAddress']="";
        Pasien::create($input);

        return redirect()->route('master.patient.index');
    }

    public function edit(Pasien $patient)
    {
        return view('master.pages.patient.update', ['patient' => $patient]);
    }

    public function update(Request $request, Pasien $patient)
    {
        $input = $request->validate([
            'SSN' => ['required', 'string'],
            'MedicalNo' => ['required', 'string'],
            'FirstName' => ['required', 'string'],
            'MiddleName' => ['required', 'string'],
            'LastName' => ['required', 'string'],
            'PatientName' => ['required', 'string'],
            'PatientNameOnCard' => ['required', 'string'],
            'CityOfBirth' => ['required', 'string'],
            'DateOfBirth' => ['required', 'string'],
        ]);

        $patient->update($input);
        return redirect()->route('master.patient.index');
    }

    public function destroy(Pasien $patient)
    {
        $patient->delete();
        return redirect()->route('master.patient.index');
    }
    public function sinkronpasien(Request $request){
        $data=$request->data;
        $datajson=json_decode($data);

        $arrayBatch=array();
        foreach ($datajson as $d){
            $arrayPasien=[
                'SSN'=>$d->SSN,
                'MedicalNo'=>$d->MedicalNo,
                'PatientName'=>$d->PatientName,
                'CityOfBirth'=>$d->CityOfBirth,
                'DateOfBirth'=>$d->DateOfBirth,
                'PatientCity'=>$d->PatientCity,
                'PatientProvince'=>$d->PatientProvince,
                'PatientAddress'=>$d->PatientAddress,
                'GCSex'=>$d->GCSex,
            ];
            array_push($arrayBatch,$arrayPasien);
        }
        $simpan=DB::connection('mysql2')
            ->table("m_pasien")
            ->insert($arrayBatch);
        if($simpan){
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan'
            ]);
        }

       // return $datajson;
//       $sql="INSERT INTO m_pasien (pasien_id,pasien_ssn,pasien_medical_no,pasien_first_name,pasien_middle_name,pasien_last_name,pasien_name,pasien_name_on_card,pasien_city,pasien_province,pasien_address,pasien_date_of_birth,pasien_city_of_birth)
//                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
//        foreach($datajson as $d){
//            $pasien=Pasien::where('medical_no',$d->pasien_id)->first();
//            if($pasien){
//                $pasien->update([
//                    'pasien_ssn'=>$d->pasien_ssn,
//                    'pasien_medical_no'=>$d->pasien_medical_no,
//                    'pasien_first_name'=>$d->pasien_first_name,
//                    'pasien_middle_name'=>$d->pasien_middle_name,
//                    'pasien_last_name'=>$d->pasien_last_name,
//                    'pasien_name'=>$d->pasien_name,
//                    'pasien_name_on_card'=>$d->pasien_name_on_card,
//                    'pasien_city'=>$d->pasien_city,
//                    'pasien_province'=>$d->pasien_province,
//                    'pasien_address'=>$d->pasien_address,
//                    'pasien_date_of_birth'=>$d->pasien_date_of_birth,
//                    'pasien_city_of_birth'=>$d->pasien_city_of_birth,
//                ]);
//            }else{
//                DB::connection("mysql2")->insert($sql,[$d->pasien_id,$d->pasien_ssn,$d->pasien_medical_no,$d->pasien_first_name,$d->pasien_middle_name,$d->pasien_last_name,$d->pasien_name,$d->pasien_name_on_card,$d->pasien_city,$d->pasien_province,$d->pasien_address,$d->pasien_date_of_birth,$d->pasien_city_of_birth]);
//            }
//        }
//        return response()->json(['status'=>'success']);
    }

    function sinkronpasienspaira(){
        $datapasien=DB::connection('sqlsrv_sphaira')
            ->table('Patient')
            ->limit(1000)
            ->get();
        $arrayBatch=array();
        foreach ($datapasien as $d){
            $arrayPasien=[
                'SSN'=>$d->SSN,
                'MedicalNo'=>$d->MedicalNo,
                'PatientName'=>$d->PatientName,
                'CityOfBirth'=>$d->CityOfBirth,
                'DateOfBirth'=>$d->DateOfBirth,
                'PatientCity'=>"",
                'PatientProvince'=>"",
                'PatientAddress'=>"",
                'GCSex'=>$d->GCSex,
            ];
            array_push($arrayBatch,$arrayPasien);
        }
        /*$cleardatapasienlama = DB::connection('mysql2')
            ->table('m_pasien')
            ->truncate();*/

        //simpan data pasien
        $simpan = DB::connection('mysql2')
            ->table('m_pasien')
            ->insert($arrayBatch);

        if($simpan){
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan'
            ]);
        }else {
            return response()->json([
                'status' => 'gagal',
                'message' => 'Data failed',
                'pasien' => $datapasien
            ]);
        }

    }
    function sinkronRegister(Request $request){
        //dummy dulu
        $pasien=DB::connection('mysql2')->table('m_pasien')->limit(1000)->get();

        $simpan=false;
        foreach ($pasien as $p){
            $registerNumber=RegistrationInap::generateCode();
            $registrasi['reg_no'] = $registerNumber;
            $registrasi['reg_medrec']=$p->MedicalNo;
            $registrasi['reg_tgl'] = date('Y-m-d');
            $registrasi['reg_jam'] = date('H:i:s');
            $registrasi['bed']="";
            $registrasi['service_unit']="1";
            $registrasi['reg_pjawab_alamat']="";
            $registrasi['reg_pjawab_nohp']="";
            $registrasi['reg_pjawab_hub']="";
            $registrasi['reg_dokter']="A0006";

            $registrasi['reg_ketersidaan_kamar']="1";
            $registrasi['reg_info_kewajiban']="1";
            $registrasi['reg_info_general_consent']="1";
            $registrasi['reg_info_carabayar']="1";
            $simpan=DB::connection('mysql2')
                ->table('m_registrasi')
                ->insert($registrasi);
        }


//        $datacek=DB::connection('sqlsrv_sphaira')
//            ->table('Registration')
//            ->whereDate('RegistrationDateTime',Carbon::yesterday())->get();
//
//
//        if($datacek->count()>0){
//          /*  return response()->json([
//                    'status' => 'success',
//                    'message' => 'Data berhasil disimpan',
//                    'data'=>$datacek
//                ]);*/
//            $arraybatch=array();
//            for ($i=0;$i<$datacek->count();$i++){
//                $registrasi=array();
//                $registrasi['reg_no'] = $datacek[$i]->RegistrationNo;
//                $registrasi['reg_medrec']=$datacek[$i]->MedicalNo;
//                $registrasi['reg_tgl'] = $datacek[$i]->RegistrationDateTime;
//                $registrasi['reg_jam'] = $datacek[$i]->RegistrationDateTime;
//                $registrasi['bed']="";
//                $registrasi['service_unit']="1";
//                $registrasi['reg_pjawab_alamat']="";
//                $registrasi['reg_pjawab_nohp']="";
//                $registrasi['reg_pjawab_hub']="";
//                $registrasi['reg_dokter']=$datacek[$i]->ParamedicID;
//
//                array_push($arraybatch,$registrasi);
//                //$registrasi['reg_ketersidaan_kamar']=$request->reg_ketersidaan_kamar;
//                //$registrasi['reg_info_kewajiban']=$request->reg_info_hak_kewajiban;
//                //$registrasi['reg_info_general_consent']=$request->reg_info_general_consent;
//                //$registrasi['reg_info_carabayar']=$request->reg_info_carabayar;
//            }

            if($simpan){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data berhasil disimpan'
                ]);
            }else{
                return response()->json([
                    'status' => 'gagal',
                    'message' => 'Data failed',
                    'pasien'=>$pasien
                ]);


            }
//        }else{
//            return response()->json([
//                'message' => 'Data belum ada',
//                'data'=>null
//            ]);
//        }

    }
}
