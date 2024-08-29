<?php

namespace App\Http\Controllers\InformasiPasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\PasienInformasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterDataController extends Controller
{
    public function index()
    {
        $dataPasien = Pasien::all();
        return view('register.informasi-pasien.index', compact('dataPasien'));
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

            $keluargaData = array_map(function($key) use ($request, $newMRN) {
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

            return redirect()->route('register.informasi-pasien.create')->with('success', 'Data berhasil disimpan!');
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
}