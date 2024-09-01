<?php

namespace App\Http\Controllers\InformasiPasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\PasienInformasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class RegisterDataController extends Controller
{
    public function index()
    {
        return view('register.pages.informasi-pasien.index');
    }
    public function store(Request $request)
    {
        try {
            $newMRN = $this->generateMRN();
            $pasienData = [
                'MedicalNo' => $newMRN,
                'SSN' => $request->ssn,
                'PatientName' => $request->nama,
                'PreferredName' => $request->preferred_name,
                'PatientNameOnCard' => $request->name_on_card,
                'CityOfBirth' => $request->tempat_lahir,
                'DateOfBirth' => $request->tanggal_lahir,
                'GCSex' => $request->jenis_kelamin,
                'BloodRhesus' => $request->rhesus,
                'GCBloodType' => $request->gol_darah,
                'GCReligion' => $request->agama,
                'MobilePhoneNo1' => $request->telepon_1,
                'PatientAddress' => $request->alamat,
                'OldMedicalNo' => $request->old_mrn ?? null,
                'IsActive' => true,
            ];
            Pasien::create($pasienData);

            $keluargaData = array_map(function ($key) use ($request, $newMRN) {
                return [
                    'MedicalNo' => $newMRN,
                    'GCRelationShip' => $request->GCRelationShip[$key],
                    'PhoneNo' => $request->PhoneNo[$key] ?? null,
                    'SSN' => $request->SSN[$key] ?? null,
                    'FamilyName' => $request->FamilyName[$key] ?? null,
                    'Address' => $request->Address[$key] ?? null,
                    'DateOfBirth' => $request->DateOfBirth[$key] ?? null,
                    'Job' => $request->Job[$key] ?? null,
                    'MobilePhoneNo' => $request->MobilePhoneNo[$key] ?? null,
                    'Picture' => $request->Picture[$key] ?? null,
                    'IsEmergencyContact' => $request->IsEmergencyContact[$key] ?? null,
                ];
            }, array_keys($request->GCRelationShip));
            PasienInformasi::insert($keluargaData);
            return redirect()->route('register.informasi-pasien.index');
            
        } catch (\Throwable $th) {
            return back()->withErrors('Terjadi kesalahan: ' . $th->getMessage());
        }
    }
    private function generateMRN()
    {
        $latestMRN = DB::connection('mysql2')->table('m_pasien')->orderByDesc('MedicalNo')->first()->MedicalNo;
        $parts = explode('-', $latestMRN);
        $parts[3] = str_pad((int)$parts[3] + 1, 2, '0', STR_PAD_LEFT);
        $newMRN = implode('-', $parts);

        return $newMRN;
    }


    public function getData()
    {
        $pasien = Pasien::select(['MedicalNo', 'PatientName', 'DateOfBirth', 'GCSex', 'PatientAddress', 'MobilePhoneNo1']);
        return DataTables::of($pasien)
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('register.informasi-pasien.edit', $row->MedicalNo) . '" class="btn btn-primary btn-sm">Edit</a>
                    <a href="' . route('register.ranap.create', $row->MedicalNo) . '" class="btn btn-warning btn-sm">Registrasi Ranap</a>
                    <button class="btn btn-danger btn-sm btn-delete" data-id="' . $row->MedicalNo . '">Hapus</button>
                ';
            })
            ->make(true);
    }
    

    public function edit($id)
    {
        $pasien = Pasien::where('MedicalNo', $id)->first();
        $keluarga = PasienInformasi::where('MedicalNo', $id)->get();
        return view('register.pages.informasi-pasien.update', compact('pasien', 'keluarga'));
    }

    public function update(Request $request, $medicalNo)
    {
        try {
            $pasien = Pasien::where('MedicalNo', $medicalNo)->first();
            $pasien->update([
                'SSN' => $request->ssn,
                'PatientName' => $request->nama,
                'PreferredName' => $request->preferred_name,
                'PatientNameOnCard' => $request->name_on_card,
                'CityOfBirth' => $request->tempat_lahir,
                'DateOfBirth' => $request->tanggal_lahir,
                'GCSex' => $request->jenis_kelamin,
                'BloodRhesus' => $request->rhesus,
                'GCBloodType' => $request->gol_darah,
                'GCReligion' => $request->agama,
                'MobilePhoneNo1' => $request->telepon_1,
                'PatientAddress' => $request->alamat,
                'OldMedicalNo' => $request->old_mrn ?? null,
                'IsActive' => true,
            ]);

            PasienInformasi::where('MedicalNo', $medicalNo)->delete();
            $keluargaData = array_map(function($key) use ($request, $medicalNo) {
                return [
                    'MedicalNo' => $medicalNo,
                    'GCRelationShip' => $request->GCRelationShip[$key],
                    'PhoneNo' => $request->PhoneNo[$key] ?? null,
                    'SSN' => $request->SSN[$key] ?? null,
                    'FamilyName' => $request->FamilyName[$key] ?? null,
                    'Address' => $request->Address[$key] ?? null,
                    'DateOfBirth' => $request->DateOfBirth[$key] ?? null,
                    'Job' => $request->Job[$key] ?? null,
                    'MobilePhoneNo' => $request->MobilePhoneNo[$key] ?? null,
                    'Picture' => $request->Picture[$key] ?? null,
                    'IsEmergencyContact' => $request->IsEmergencyContact[$key] ?? null,
                ];
            }, array_keys($request->GCRelationShip));
            PasienInformasi::insert($keluargaData);

            return redirect()->route('register.informasi-pasien.index');
        } catch (\Throwable $th) {
            return back()->withErrors('Terjadi kesalahan: ' . $th->getMessage());
        }
    }
    

    public function destroy($id)
    {
        $pasien = Pasien::where('MedicalNo', $id)->first();
        if ($pasien) {
            $pasien->delete();
            return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Data tidak ditemukan.'], 404);
        }
    }

    public function create()
    {
        return view('register.pages.informasi-pasien.create');
    }
}