<?php

namespace App\Http\Controllers\InformasiPasien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\PasienInformasi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Milon\Barcode\Facades\DNS1DFacade;
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
            $newMRN = $request->mrn ?? $this->generateMRN();

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

            Log::info('Data keluarga:', $request->all());

            $keluargaData = array_map(function ($key) use ($request, $newMRN) {
                return [
                    'MedicalNo' => $newMRN,
                    'FamilyMedicalNo' => $request->FamilyMedicalNo[$key] ?? null,
                    'GCRelationShip' => $request->GCRelationShip[$key],
                    'PhoneNo' => $request->PhoneNo[$key] ?? null,
                    'SSN' => $request->SSN[$key] ?? null,
                    'FamilyName' => $request->FamilyName[$key] ?? null,
                    'Address' => $request->Address[$key] ?? null,
                    'DateOfBirth' => $request->DateOfBirth[$key] ?? null,
                    'Job' => $request->Job[$key] ?? '', // Pastikan 'Job' tidak null
                    'MobilePhoneNo' => $request->MobilePhoneNo[$key] ?? null,
                    'Picture' => $request->Picture[$key] ?? null,
                    'IsEmergencyContact' => $request->IsEmergencyContact[$key] ?? null,
                    'Sex' => $request->Sex[$key] ?? null,
                ];
            }, array_keys($request->GCRelationShip));

            Log::info('Keluarga Data:', $keluargaData);

            DB::connection('mysql2')->table('m_keluarga_pasien')->insert($keluargaData);

            return redirect()->route('register.informasi-pasien.index');
        } catch (\Throwable $th) {
            Log::error('Error:', ['message' => $th->getMessage()]);
            return back()->withErrors('Terjadi kesalahan: ' . $th->getMessage());
        }
    }

    private function generateMRN()
    {
        $latestMRN = DB::connection('mysql2')->table('m_pasien')->orderByDesc('MedicalNo')->first()->MedicalNo;
        $parts = explode('-', $latestMRN);
        $parts[3] = str_pad((int)$parts[3] + 1, 2, '0', STR_PAD_LEFT);
        $newMRN = implode('-', $parts);

        while (DB::connection('mysql2')->table('m_pasien')->where('MedicalNo', $newMRN)->exists()) {
            $parts[3] = str_pad((int)$parts[3] + 1, 2, '0', STR_PAD_LEFT);
            $newMRN = implode('-', $parts);
        }

        return $newMRN;
    }

    public function checkMRN(Request $request)
    {
        $mrn = $request->query('mrn');
        Log::info('Checking MRN:', ['mrn' => $mrn]);

        $pasienData = DB::connection('mysql2')->table('m_pasien')
            ->where('MedicalNo', 'like', "%{$mrn}%")
            ->select('MedicalNo', 'PatientName', 'SSN', 'DateOfBirth', 'GCSex', 'PatientAddress', 'MobilePhoneNo1')
            ->get()
            ->toArray();

        $keluargaData = DB::connection('mysql2')->table('m_keluarga_pasien')
            ->where('MedicalNo', 'like', "%{$mrn}%")
            ->select('MedicalNo', 'FamilyName as PatientName', 'SSN', 'DateOfBirth', 'Sex as GCSex', 'Address as PatientAddress', 'PhoneNo as MobilePhoneNo1')
            ->get()
            ->toArray();

        $data = array_merge($pasienData, $keluargaData);

        Log::info('MRNs found:', ['data' => $data]); // Debug log

        return response()->json($data);
    }
    public function getData()
    {

        //    $pasien = Pasien::select(['m_pasien.MedicalNo', 'm_pasien.PatientName', 'm_pasien.DateOfBirth', 'm_pasien.GCSex', 'm_pasien.PatientAddress', 'm_pasien.MobilePhoneNo1'])
        //         ->leftJoin('m_registrasi', 'm_pasien.MedicalNo', '=', 'm_registrasi.reg_medrec')
        //         ->whereNull('m_registrasi.reg_no');
        //     return DataTables::of($pasien)
        $pasien = Pasien::select(['m_pasien.MedicalNo', 'm_pasien.PatientName', 'm_pasien.DateOfBirth', 'm_pasien.GCSex', 'm_pasien.PatientAddress', 'm_pasien.MobilePhoneNo1'])
            ->leftJoin('m_registrasi', 'm_pasien.MedicalNo', '=', 'm_registrasi.reg_medrec');
        return DataTables::of($pasien)
            ->addColumn('action', function ($row) {
                $btn_visit_history = '<a href="' . route('register.informasi-pasien.riwayat-kunjungan', $row->MedicalNo) . '" class="btn btn-primary btn-sm">Visit History</a>';
                $action = $btn_visit_history . '
                    <div class="dropdown ml-2">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aksi
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="' . route('register.informasi-pasien.barcode', $row->MedicalNo) . '">Barcode</a>
                            <a class="dropdown-item" href="' . route('register.informasi-pasien.edit', $row->MedicalNo) . '">Edit</a>
                            <button class="dropdown-item btn-delete" data-id="' . $row->MedicalNo . '">Hapus</button>
                        </div>
                    </div>
                ';
                return '<div class="btn-group" role="group" aria-label="Basic example">' . $action . '</div>';
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
            $keluargaData = array_map(function ($key) use ($request, $medicalNo) {
                $job = $request->Job[$key] ?? null;
                if (strlen($job) > 50) {
                    throw new \Exception('Panjang data Job melebihi batas yang diizinkan.');
                }
                return [
                    'MedicalNo' => $medicalNo,
                    'GCRelationShip' => $request->GCRelationShip[$key],
                    'FamilyMedicalNo' => $request->FamilyMedicalNo[$key] ?? null,
                    'PhoneNo' => $request->PhoneNo[$key] ?? null,
                    'SSN' => $request->SSN[$key] ?? null,
                    'FamilyName' => $request->FamilyName[$key] ?? null,
                    'Address' => $request->Address[$key] ?? null,
                    'DateOfBirth' => $request->DateOfBirth[$key] ?? null,
                    'Job' => $job,
                    'MobilePhoneNo' => $request->MobilePhoneNo[$key] ?? null,
                    'Picture' => $request->Picture[$key] ?? null,
                    'IsEmergencyContact' => $request->IsEmergencyContact[$key] ?? null,
                    'Sex' => $request->Sex[$key] ?? null,
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
            PasienInformasi::where('MedicalNo', $id)->delete();
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

    public function barcodePasien($medical_no)
    {
        $pasien = Pasien::where('MedicalNo', $medical_no)->first();
        if (!$pasien) {
            return back()->withErrors('Data pasien tidak ditemukan.');
        }
        $data_pasien = [
            'nama_lengkap' => $pasien->PatientName,
            'medical_no' => $pasien->MedicalNo,
            'tgl_lahir' => $pasien->DateOfBirth,
            'jenis_kelamin' => $pasien->GCSex,
            'usia' => $this->formatUsia($pasien->DateOfBirth),
            'barcode' => DNS1DFacade::getBarcodeSVG($pasien->MedicalNo, 'C128', 1, 48),
        ];
        return view('register.pages.informasi-pasien.barcode-pasien', compact('data_pasien'));
    }

    private function formatUsia($dateOfBirth)
    {
        $date1 = new \DateTime($dateOfBirth);
        $date2 = new \DateTime();
        $diff = $date1->diff($date2);
        return "{$diff->y} Y {$diff->m} m {$diff->d} d";
    }
}
