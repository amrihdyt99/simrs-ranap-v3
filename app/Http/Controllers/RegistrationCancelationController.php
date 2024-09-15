<?php

namespace App\Http\Controllers;

use App\Models\RegistrationCancelation;
use App\Traits\NanoIDTraits;
use App\Traits\ResponseDataTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistrationCancelationController extends Controller
{
    use NanoIDTraits, ResponseDataTraits;

    public function index()
    {
        if (request()->ajax()) {
            $data = RegistrationCancelation::all();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="cancelRegistration(\'' . $row->reg_no . '\')">Batalkan</a>';
                    return $btn;
                })
                ->addColumn('asal', function ($row) {
                    $asal = explode('/', $row->reg_no);
                    $asal_reg = $asal[1];
                    if ($asal_reg == 'RJ') return 'Rawat Jalan';
                    else if ($asal_reg == 'RI') return 'Rawat Inap';
                    else return 'IGD';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('register.pages.cancel-registration.index');
    }

    public function cancelRegistration($reg_no)
    {
        try {
            DB::beginTransaction();
            $parse_reg_no = str_replace('_', '/', $reg_no);
            $reg_cancel = new RegistrationCancelation();
            $reg_cancel->id = $this->generateID();
            $reg_cancel->reg_no = $parse_reg_no;
            $reg_cancel->medrec_no = request()->medrec_no;
            $reg_cancel->patient_name = request()->patient_name;
            $reg_cancel->cancelation_date = now();
            $reg_cancel->cancelation_reason = request()->cancelation_reason;
            $reg_cancel->cancelation_by = auth()->user()->id;
            $reg_cancel->cancelation_by_name = auth()->user()->name;
            $reg_cancel->save();
            DB::commit();

            return $this->responseData(200, 'Registrasi berhasil dibatalkan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->internalServerError($th->getMessage());
        }
    }
}
