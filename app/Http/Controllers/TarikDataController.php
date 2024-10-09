<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Master\ClassCategory;
use App\Models\Master\DepartmentServiceUnit;
use App\Models\Master\Room;
use App\Models\Master\SiteDepartment;
use App\Models\RoomClass;
use App\Models\ServiceUnit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarikDataController extends Controller
{

    public function unit_ruang()
    {
        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/unit_ruang');
        DB::connection('mysql2')->table('m_service_unit_room')->delete();
        foreach ($data['data'] as $kue) {
            DB::connection('mysql2')
                ->table('m_service_unit_room')->insert([$kue]);
        }
        echo 'Alhamdulillah';
    }
    public function unit_item()
    {
        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/unit_item');
        DB::connection('mysql2')->table('m_unit_item')->delete();
        foreach ($data['data'] as $kue) {
            DB::connection('mysql2')
                ->table('m_unit_item')->insert([$kue]);
        }
        echo 'Alhamdulillah';
    }
    public function paramedic()
    {
        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs-rajal/data_paramedic');
        DB::connection('mysql2')->table('m_paramedis')->delete();
        foreach ($data as $kue) {
            DB::connection('mysql2')
                ->table('m_paramedis')->insert([$kue]);
        }
        echo 'Alhamdulillah';
    }
    public function departement()
    {
        $response = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/department');
        DB::connection('mysql2')->table('m_departemen')->delete();
        foreach ($response['data'] as $kue) {
            unset($kue['LastUpdatedDateTime']);
            $cek = Department::find($kue['DepartmentCode']);
            if (!$cek) {
                DB::connection('mysql2')
                    ->table('m_departemen')->insert([$kue]);
            }
        }
        return response()->json(['status' => 'success', 'message' => 'Data Departemen berhasil ditarik']);
    }

    public function site_departement_old()
    {
        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/site_departemen');
        DB::connection('mysql2')->table('m_unit_departemen')->delete();
        foreach ($data['data']  as $kue) {
            DB::connection('mysql2')
                ->table('m_unit_departemen')->insert([$kue]);
        }
        echo 'Alhamdulillah';
    }

    public function site_departement()
    {
        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/site_departemen');
        foreach ($data['data']  as $kue) {
            unset($kue['LastUpdatedDateTime']);
            $cek = SiteDepartment::find($kue['SiteDepartmentID']);
            if (!$cek) {
                DB::connection('mysql2')
                    ->table('m_site_departemen')->insert([$kue]);
            }
        }
        echo 'Alhamdulillah';
    }

    public function departement_service_unit()
    {
        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/departemen_service_unit');
        foreach ($data['data']  as $kue) {
            $cek = DepartmentServiceUnit::find($kue['ServiceUnitID']);
            if (!$cek) {
                DB::connection('mysql2')
                    ->table('m_unit_departemen')->insert([$kue]);
            }
        }
        echo 'Alhamdulillah';
    }

    public function classCategory()
    {
        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/class-category');
        DB::connection('mysql2')->table('m_class_category')->delete();
        foreach ($data['data']  as $kue) {
            unset($kue['LastUpdatedDateTime']);
            $cek = ClassCategory::find($kue['ClassCategoryCode']);
            if (!$cek) {
                DB::connection('mysql2')
                    ->table('m_class_category')->insert([$kue]);
            }
        }
        echo 'Alhamdulillah';
    }

    public function kelas()
    {
        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/kelas');


        foreach ($data['data'] as $kue) {
            $cek = RoomClass::find($kue['ClassCode']);
            if (!$cek) {
                $insertData = [
                    'ClassCode' => $kue['ClassCode'],
                    'ClassName' => $kue['ClassName'],
                    'ShortName' => $kue['ShortName'],
                    'Initial' => $kue['Initial'],
                    'ClassCategoryCode' => $kue['ClassCategoryCode'],
                    'GCClassRL' => $kue['GCClassRL'],
                    'ClassLevel' => $kue['ClassLevel'],
                    'IsAdministrationChargeByClass' => (int) $kue['IsAdministrationChargeByClass'],
                    'MinAdministrationCharge' => $kue['MinAdministrationCharge'],
                    'MaxAdministrationCharge' => $kue['MaxAdministrationCharge'],
                    'PercentageAdministrationCharge' => $kue['PercentageAdministrationCharge'],
                    'PhysicianChargesItemID' => $kue['PhysicianChargesItemID'] ?? null,
                    'DisplayPrice' => $kue['DisplayPrice'] ?? null,
                    'PictureFileName' => $kue['PictureFileName'],
                    'PatientPerRoomQty' => (int) $kue['PatientPerRoomQty'],
                    'IsHasAC' => (int) $kue['IsHasAC'],
                    'IsHasPrivateBathRoom' => (int) $kue['IsHasPrivateBathRoom'],
                    'IsHasRefrigerator' => (int) $kue['IsHasRefrigerator'],
                    'IsHasTV' => (int) $kue['IsHasTV'],
                    'IsHasWifi' => (int) $kue['IsHasWifi'],
                    'Remarks' => $kue['Remarks'] ?? null,
                    'IsActive' => (int) $kue['IsActive'],
                    'IsDeleted' => (int) $kue['IsDeleted'],
                    'LastUpdatedBy' => $kue['LastUpdatedBy'],
                    'LastUpdatedDateTime' => $kue['LastUpdatedDateTime'],
                ];
                DB::connection('mysql2')->table('m_room_class')->insert($insertData);
            }
        }


        echo 'Alhamdulillah';
    }

    public function room()
    {
        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/room');
        DB::connection('mysql2')->table('m_ruangan')->delete();
        foreach ($data['data'] as $kue) {
            $cek = Room::find($kue['RoomID']);
            if (!$cek) {
                DB::connection('mysql2')
                    ->table('m_ruangan')->insert([$kue]);
            }
        }
        echo 'Alhamdulillah';
    }
    public function unit()
    {
        $data = $this->curl_nih('http://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/unit');
        DB::connection('mysql2')->table('m_unit')->delete();
        foreach ($data['data'] as $kue) {
            $cek = ServiceUnit::find($kue['ServiceUnitCode']);
            if (!$cek) {
                DB::connection('mysql2')
                    ->table('m_unit')->insert([$kue]);
            }
        }
        echo 'Alhamdulillah';
    }

    public function location()
    {
        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/location');
        DB::connection('mysql2')->table('m_location')->delete();
        foreach ($data['data'] as $kue) {
            DB::connection('mysql2')
                ->table('m_location')->insert([$kue]);
        }
        echo 'Alhamdulillah';
    }

    public function bisnis_partner()
    {
        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/business');
        DB::connection('mysql2')->table('businesspartner')->delete();
        foreach ($data['data'] as $kue) {
            DB::connection('mysql2')
                ->table('businesspartner')->insert([
                    'id' => $kue['BusinessPartnerID'],
                    'BusinessPartnerCode' => $kue['BusinessPartnerCode'],
                    'BusinessPartnerName' => $kue['BusinessPartnerName'],
                    'ShortName' => $kue['ShortName'],
                    'Initial' => $kue['Initial'],
                    'BusinessPartnerType' => $kue['BusinessPartnerType'],
                    'ContactPerson1Name' => $kue['ContactPerson1Name'],
                    'ContactPerson1PhoneNo' => $kue['ContactPerson1PhoneNo'],
                    'ContactPerson2Name' => $kue['ContactPerson2Name'],
                    'ContactPerson2PhoneNo' => $kue['ContactPerson2PhoneNo'],
                    'IsTaxRegistrant' => $kue['IsTaxRegistrant'],
                    'TaxRegistrantNo' => $kue['TaxRegistrantNo'],
                    'TermCode' => $kue['TermCode'],
                    'Remarks' => $kue['Remarks'],
                    'aktif' => $kue['IsActive'],
                    'hapus' => $kue['IsDeleted'],
                ]);
        }
        echo 'Alhamdulillah';
    }
    public function bed()
    {
        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/bed');
        foreach ($data['data'] as $kue) {
            $cek = DB::connection('mysql2')->table('m_bed')->where('bed_id', $kue['BedID'])->count();
            if ($cek == 0) {
                DB::connection('mysql2')->table('m_bed')->Insert([
                    'bed_id' => $kue['BedID'],
                    'service_unit_id' => $kue['ServiceUnitID'],
                    'room_id' => $kue['RoomID'],
                    'class_code' => $kue['ClassCode'],
                    'bed_code' => $kue['BedCode'],
                    'site_code' => $kue['SiteCode'],
                    // 'registration_no' => $kue['RegistrationNo'],
                    'reservation_no' => $kue['ReservationNo'],
                    'phone_extension_no' => $kue['PhoneExtensionNo'],
                    'bed_status' => $kue['GCBedStatus'],
                    'gc_type_of_bed' => $kue['GCTypeOfBed'],
                    'created_date_time' => $kue['CreatedDatetime'],
                    'item_id_automation_charges' => $kue['ItemIdAutomationCharges'],
                    'item_id_automation_charge_nurse' => $kue['ItemIdAutomationChargesNurse'],
                    'is_booked' => $kue['IsBooked'],
                    'is_temporary' => $kue['IsTemporary'],
                    'is_active' => $kue['IsActive'],
                    'is_deleted' => $kue['IsDeleted'],
                    'last_updated_by' => $kue['LastUpdatedBy'],
                    'last_updated_datetime' => $kue['LastUpdatedDateTime'],
                ]);
            } else {
                DB::connection('mysql2')->table('m_bed')->where('bed_id', $kue['BedID'])->update([
                    'bed_id' => $kue['BedID'],
                    'service_unit_id' => $kue['ServiceUnitID'],
                    'room_id' => $kue['RoomID'],
                    'class_code' => $kue['ClassCode'],
                    'bed_code' => $kue['BedCode'],
                    'site_code' => $kue['SiteCode'],
                    // 'registration_no' => $kue['RegistrationNo'],
                    'reservation_no' => $kue['ReservationNo'],
                    'phone_extension_no' => $kue['PhoneExtensionNo'],
                    'bed_status' => $kue['GCBedStatus'],
                    'gc_type_of_bed' => $kue['GCTypeOfBed'],
                    'created_date_time' => $kue['CreatedDatetime'],
                    'item_id_automation_charges' => $kue['ItemIdAutomationCharges'],
                    'item_id_automation_charge_nurse' => $kue['ItemIdAutomationChargesNurse'],
                    'is_booked' => $kue['IsBooked'],
                    'is_temporary' => $kue['IsTemporary'],
                    'is_active' => $kue['IsActive'],
                    'is_deleted' => $kue['IsDeleted'],
                    'last_updated_by' => $kue['LastUpdatedBy'],
                    'last_updated_datetime' => $kue['LastUpdatedDateTime'],
                ]);
            }
        }
    }

    public function regis()
    {
        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/register');
        foreach ($data['data'] as $kue) {
            $cek = DB::connection('mysql2')->table('m_registrasi')->where('reg_no', $kue['RegistrationNo'])->count();
            if ($cek == 0) {
                $paracode = DB::connection('mysql2')->table('m_paramedis')->where('ParamedicID', $kue['ParamedicID'])->first();
                $paramedic = null;
                if ($paracode) {
                    $paramedic = $paracode->ParamedicCode;
                }
                if ($kue['GCOriginOfPatientReg'] == 'X0133^02') {
                    $asal = 'From Outpatient';
                } else if ($kue['GCOriginOfPatientReg'] == 'X0133^03') {
                    $asal = 'From Emergency';
                } else if ($kue['GCOriginOfPatientReg'] == 'X0133^01') {
                    $asal = 'Directly To The Inpatient';
                }
                $rc = DB::connection('mysql2')->table('m_bed')->where('bed_id', $kue['BedID'])->first();
                $room_class = null;
                $service_unit = null;
                $kategori_kelas = null;
                if ($rc) {
                    $room_class = $rc->class_code;
                    $service_unit = $rc->service_unit_id;
                    $kategori_kelas = DB::connection('mysql2')->table('m_room_class')->where('ClassCode', $room_class)->first()->ClassCategoryCode;
                }
                $this->nomed($kue['MedicalNo']);

                $tgl_lahir = DB::connection('mysql2')->table('m_pasien')->where('MedicalNo', $kue['MedicalNo'])->first()->DateOfBirth;
                $date1 = date_create($tgl_lahir);
                $date2 = date_create(date('Y-m-d'));
                $diff = date_diff($date1, $date2);
                $tahun = $diff->y;
                $bulan = $diff->m;
                $hari = $diff->d;
                if ($tahun == 0 && $bulan == 0 && $hari <= 28) {
                    $kategori = "A";
                } elseif ($tahun <= 17) {
                    $kategori = "R";
                } else {
                    $kategori = "D";
                }




                DB::connection('mysql2')->table('m_registrasi')->insert([
                    'reg_no' => $kue['RegistrationNo'],
                    'reg_medrec' => $kue['MedicalNo'],
                    'reg_class' => $kategori_kelas,
                    'reg_lama' => $kue['LinkRegistrationNo'],
                    'reg_tgl' => date('Y-m-d', strtotime($kue['RegistrationDateTime'])),
                    'reg_jam' => date('H:i:s', strtotime($kue['RegistrationDateTime'])),
                    'reg_dokter' => $paramedic,
                    'reg_cara_bayar' => $kue['BusinessPartnerID'],
                    'departemen_asal' => $asal,
                    'link_regis' => $kue['LinkRegistrationNo'],
                    'bed' => $kue['BedID'],
                    'reg_kategori' => $kategori,
                    'room_class' => $room_class,
                    'service_unit' => $service_unit
                ]);
            }
        }
        $this->bed();
        return response()->json(200);
    }

    public function nomed($no)
    {
        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs_ranap/api/sphaira/patient/' . $no);
        $arr = $data['data'];
        $cek = DB::connection('mysql2')->table('m_pasien')->where('MedicalNo', $no)->count();
        if ($cek == 0) {
            DB::connection('mysql2')->table('m_pasien')->insert($arr);
        } else {
            DB::connection('mysql2')->table('m_pasien')->where('MedicalNo', $no)->update($arr);
        }
    }

    public function user_rajal()
    {
        $data = $this->curl_nih('https://rsud.sumselprov.go.id/simrs-rajal/api/master/users');
        //delete data yg baru ditarik jika double
        // DB::connection('mysql2')->table('users')->whereYear('created_at', 2024)->delete();

        foreach ($data as $kue) {
            DB::connection('mysql2')->table('users')->updateOrInsert(
                ['name' => $kue['name']],
                [
                    'level_user' => $kue['level_user'],
                    'username' => $kue['username'],
                    'email_verified_at' => $kue['email_verified_at'],
                    'password' => $kue['password'],
                    'dokter_id' => $kue['dokter_id'],
                    'perawat_id' => $kue['perawat_id'],
                    'signature' => $kue['signature'],
                    'is_active' => $kue['is_active'],
                    'remember_token' => $kue['remember_token'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'user_active_by' => $kue['updated_at'],
                    'user_active_at' => Carbon::now(),
                    'is_deleted' => 0,
                ]
            );
        }

        echo 'Alhamdulillah';
    }


    public function curl_nih($url)
    {
        ini_set('max_execution_time', 3600);
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $r = curl_exec($curl);

        curl_close($curl);
        $data = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $r), true);
        return $data;
    }
}
