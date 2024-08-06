<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\CPOEImaging;
use App\Models\CPOELaboratory;
use App\Models\ItemDrugDisplay;
use App\Models\JobOrders;
use App\Models\Paramedic;
use App\Models\PasienCPOEImaging;
use App\Models\PasienCPOELaboratory;
use App\Models\PasienKonsultasi;
use App\Models\PasienPrescribe;
use App\Models\RegistrationInap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TreatmentController extends Controller
{
    public function treatment(RegistrationInap $patient)
    {
        $data['obat'] = JobOrders::where('reg_no', $patient->reg_no)->get();
        $data['konsultasi'] = PasienKonsultasi::where('pkonsultasi_reg', $patient->reg_no)->where('pkonsultasi_dokter_kirim', $patient->physician->ParamedicID)->latest()->get();
        $data['available_physician'] = PasienKonsultasi::where('pkonsultasi_dokter_tujuan', $patient->reg_dokter)->get();
        $data['patient'] = $patient;
//        $data['cpoe_labor'] = PasienCPOELaboratory::where('reg_no', $patient->reg_no)->get();
//        $data['cpoe_img'] = PasienCPOEImaging::where('reg_no', $patient->reg_no)->get();
        $data['cpoe_labor'] = CPOELaboratory::all();
        $data['cpoe_img'] = CPOEImaging::all();
        $data['listobat'] = ItemDrugDisplay::all();

        return view('dokter.pages.patient.treatment', $data);
    }

    public function create_refer_to_consult(RegistrationInap $patient)
    {
        $data['patient'] = $patient;
        $data['physician'] = Paramedic::all();

        return view('dokter.pages.refer-to-consult.create', $data);
    }

    public function create_e_prescription(RegistrationInap $patient)
    {
        $data['patient'] = $patient;
        $data['obat'] = ItemDrugDisplay::all();

        return view('dokter.pages.e-prescription.create', $data);
    }

    public function create_cpoe_imaging(RegistrationInap $patient)
    {
        $data['cpoe_imaging'] = CPOEImaging::all();
        $data['patient'] = $patient;
        return view('dokter.pages.cpoe.create-imaging', $data);
    }

    public function create_cpoe_laboratory(RegistrationInap $patient)
    {
        $data['cpoe_labor'] = CPOELaboratory::all();
        $data['patient'] = $patient;
        return view('dokter.pages.cpoe.create-laboratory', $data);
    }

    public function storeCPOEImaging(Request $request)
    {
        $patient = $request->input('reg_no');
        $valData = $request->validate([
            'planing_start_date' => ['required']
        ]);
        $cpoe_imaging = $request->input('cpoe_imaging_id');
        foreach ($cpoe_imaging as $row) {
            $valData['reg_no'] = $request->input('reg_no');
            $valData['medical_diagnose'] = $request->input('medical_diagnose');
            $valData['order_type'] = $request->input('order_type');
            $valData['gestraditional_age'] = $request->input('gestraditional_age');
            $valData['notes'] = $request->input('notes');
            $valData['order_by'] = $request->input('order_by');
            $valData['cpoe_imaging_id'] = $row;

            PasienCPOEImaging::create($valData);
        }
        return redirect()->route('dokter.patient.treatment', $patient);
    }

    public function storeCPOELabor(Request $request)
    {
        $patient = $request->input('reg_no');
        $valData = $request->validate([
            'planing_start_date' => ['required']
        ]);
        $cpoe_laboratory = $request->input('cpoe_laboratory_id');
        foreach ($cpoe_laboratory as $row) {
            $valData['reg_no'] = $request->input('reg_no');
            $valData['medical_diagnose'] = $request->input('medical_diagnose');
            $valData['order_type'] = $request->input('order_type');
            $valData['gestraditional_age'] = $request->input('gestraditional_age');
            $valData['notes'] = $request->input('notes');
            $valData['order_by'] = $request->input('order_by');
            $valData['cpoe_laboratory_id'] = $row;

            PasienCPOELaboratory::create($valData);
        }
        return redirect()->route('dokter.patient.treatment', $patient);
    }

    public function storePrescription(Request $request)
    {
        $patient = $request->input('prescribe_reg');
        $valData = $request->validate([
            'prescribe_dosage' => ['required'],
            'prescribe_frequency' => ['required'],
            'prescribe_item_unit' => ['required']
        ]);
        $prescribe_number = $request->input('prescribe_number');
        foreach ($prescribe_number as $row) {
            $valData['prescribe_reg'] = $request->input('prescribe_reg');
            $valData['prescribe_item'] = $request->input('prescribe_item');
            $valData['prescribe_method'] = $request->input('prescribe_method');
            $valData['prescribe_required'] = $request->input('prescribe_required');
            $valData['prescribe_duration'] = $request->input('prescribe_duration');
            $valData['prescribe_qty'] = $request->input('prescribe_qty');
            $valData['prescribe_route'] = $request->input('prescribe_route');
            $valData['prescribe_number'] = $row;
            $valData['prescribe_date'] = date_format(date_create($request->input('prescribe_date')), "Y/m/d");
            $valData['prescribe_time'] = $request->input('prescribe_time');
            $valData['prescribe_instruction'] = $request->input('prescribe_instruction');
            $valData['prescribe_type'] = $request->input('prescribe_type');
            $valData['prescribe_iteration'] = $request->input('prescribe_iteration');
            $valData['prescribe_note'] = $request->input('prescribe_note');
            $valData['prescribe_price'] = $request->input('prescribe_price');
            $valData['prescribe_deleted'] = $request->input('prescribe_deleted', 0);
            $valData['prescribe_dokter'] = $request->input('prescribe_dokter');
            $valData['prescribe_poli'] = $request->input('prescribe_poli');

            PasienPrescribe::create($valData);
        }
        return redirect()->route('dokter.patient.treatment', $patient);
    }

    public function createAvailablePhysician($id)
    {
        $data['availablePhysician'] = PasienKonsultasi::find($id);
        return view('dokter.pages.available-physician.create', $data);
    }

    public function responseAvailablePhysician(Request $request, $id)
    {
        $pasien = $request->input('pkonsultasi_reg');
        $availablePhysician = PasienKonsultasi::find($id);
        $validation = $request->validate([
            'pkonsultasi_response' => ['string']
        ]);
        $availablePhysician->update($validation);

        return redirect()->route('dokter.patient.treatment', $pasien);
    }


    public function storeReferToConsult(Request $request)
    {
        $pasien = $request->input('pkonsultasi_reg');
        $valData = $request->validate([
            'pkonsultasi_dokter_tujuan' => ['required'],
            'pkonsultasi_request' => ['required']
        ]);

        $valData['pkonsultasi_reg'] = $request->input('pkonsultasi_reg');
        $valData['pkonsultasi_dokter_kirim'] = $request->input('pkonsultasi_dokter_kirim');
        $valData['pkonsultasi_poli_tujuan'] = $request->input('pkonsultasi_poli_tujuan');
        $valData['pkonsultasi_delete'] = $request->input('pkonsutlasi_delete', 0);

        PasienKonsultasi::create($valData);
        return redirect()->route('dokter.patient.treatment', $pasien);
    }

    public function deleteCPOELabor($id)
    {
        $cpoeLabor = PasienCPOELaboratory::find($id);
        $cpoeLabor->delete();

        return redirect()->back();
    }

    public function deleteCPOEImaging($id)
    {
        $cpoeImaging = PasienCPOEImaging::find($id);
        $cpoeImaging->delete();

        return redirect()->back();
    }
}
