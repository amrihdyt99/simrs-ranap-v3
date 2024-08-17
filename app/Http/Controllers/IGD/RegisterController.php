<?php

namespace App\Http\Controllers\IGD;

use App\Http\Controllers\Controller;
use App\Models\ICD10;
use App\Models\Paramedic;
use App\Models\RegistrationIGD;
use App\Models\RegistrationInap;
use App\Models\RoomClass;
use App\Models\ServiceRoom;
use App\Models\ServiceUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Yajra\DataTables\Contracts\DataTable;

class RegisterController extends Controller
{
    public function index()
    {
        $data['igd'] = RegistrationIGD::all();
        return view('register.pages.igd.index', $data);
    }

    public function formRegisterIGD()
    {
        $data['service_unit'] = ServiceUnit::all();
        $data['service_room'] = ServiceRoom::all();
        $data['room_class'] = RoomClass::all();
        $data['physician'] = Paramedic::all();
        $data['icd10'] = ICD10::all();
        return view('register.pages.igd.create', $data);
    }

    public function storeRegisterIGD(Request $request)
    {
        $registrasi = $request->validate([
            'reg_medrec' => "required",
            'service_unit' => "required",
            'reg_dokter' => "required",
            'reg_ruangan' => "required",
            'room_class' => "required",
            'reg_cara_bayar' => "required",
            'reg_no_dokumen' => "",
            'reg_diagnosis' => "",
            'reg_no_kartu' => "",
            'reg_pjawab' => "",
            'reg_cttn' => "",
            'reg_cttn_kunj' => "",
            'reg_referal' => "",
            'reg_corp' => "",
            'reg_class' => ""
        ]);

        $registrasi['reg_no'] = RegistrationIGD::generateCode();
        $registrasi['reg_tgl'] = date('Y-m-d');
        $registrasi['reg_jam'] = date('H:i:s');

        RegistrationIGD::create($registrasi);

        return redirect()->route('register.igd.index');
    }
}
