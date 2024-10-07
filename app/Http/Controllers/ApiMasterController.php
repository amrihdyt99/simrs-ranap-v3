<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiMasterController extends Controller
{

	public function registrasi($tahun = 0, $bulan = 0)
	{
		if ($bulan == 0) {
			$dat = DB::connection('sqlsrv_sphaira')->table('registration')
				->whereDate('RegistrationDateTime', date('Y-m-d'))
				->where('RegistrationNo', 'like', 'QREG/RI%')
				->get();
		} else {
			$dat = DB::connection('sqlsrv_sphaira')->table('registration')
				->whereYear('RegistrationDateTime', $tahun)->whereMonth('RegistrationDateTime', $bulan)
				->where('RegistrationNo', 'like', 'QREG/RI%')
				->get();
		}
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada pasien';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function get_ttd($no)
	{
		$dat = DB::connection('sqlsrv_rajal')->table('users')->where('dokter_id ', $no)->first();
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat->signature;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada pasien';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function patient($no)
	{
		$dat = DB::connection('sqlsrv_sphaira')->table('patient')->where('MedicalNo', $no)->first();
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada pasien';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function reg_by_nomed($nomed)
	{
		$dat =  DB::connection('sqlsrv_sphaira')->table('registration')->where('MedicalNo', $nomed)->orderBy('RegistrationDateTime', 'desc')
			->select('RegistrationNo', 'GCPatientInType', 'RegistrationDateTime')->get();
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada pasien';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function business_partner()
	{
		$dat = DB::connection('sqlsrv_sphaira')->table('BusinessPartner')->where('IsActive', '1')->get();
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada data';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function icd_9(Request $r)
	{

		if (!isset($r->searchParams)) {
			$data =  DB::connection('mysql')->table('icd9cm_bpjs')->take(50)->get();
		} else {
			$data =  DB::connection('mysql')->table('icd9cm_bpjs')->where('NM_TINDAKAN', 'like', '%' . $r->searchParams . '%')
				->orWhere('ID_TIND', 'like', '%' . $r->searchParams . '%')
				->get();
		}
		$dat = $data;
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada data';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}
	public function icd_10(Request $r)
	{
		$query = DB::connection('mysql')->table('icd10_bpjs');

		if (isset($r->category)) {
			$query->where(function($q) use ($r) {
				$q->where('ID_ICD10', 'like', 'X%')
				  ->orWhere('ID_ICD10', 'like', 'V%');
				
				if ($r->category === 'C') {
					$q->orWhere('ID_ICD10', 'like', 'C%');
				}
			});
		}
	
		if (isset($r->searchParams)) {
			$query->where(function($q) use ($r) {
				$q->where('NM_ICD10', 'like', '%' . $r->searchParams . '%')
				  ->orWhere('ID_ICD10', 'like', '%' . $r->searchParams . '%');
			});
		}
		$data = $query->take(50)->get();
		$dat = $data;
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada data';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

    function daftarmasalah(Request $r)
    {
		$query = DB::connection('mysql2')->table('m_daftar_diagnosa_keperawatan');

		if (isset($r->searchParams)) {
			$query->where(function($q) use ($r) {
				$q->where('diagnosa_keperawatan', 'like', '%' . $r->searchParams . '%')
				  ->orWhere('kode', 'like', '%' . $r->searchParams . '%');
			});
		}

		$data = $query->take(50)->get();
		$dat = $data;
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada data';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function unit_item()
	{
		$dat = DB::connection('sqlsrv_sphaira')->table('ServiceUnitItem')->get();
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada data';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function location()
	{
		$dat = DB::connection('sqlsrv_sphaira')->table('Location')->get();
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada data';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function contract($bisnis = 0)
	{
		if ($bisnis == 0) {
			$dat = DB::connection('sqlsrv_sphaira')->table('CustomerContract')->get();
		} else {
			$dat = DB::connection('sqlsrv_sphaira')->table('CustomerContract')->where('BusinessPartnerID', $bisnis)
				->whereDate('EndingDate', '>=', date('Y-m-d'))->get();
		}

		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada data';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function departemen_unit()
	{
		$dat = DB::connection('sqlsrv_sphaira')->table('DepartmentServiceUnit')->get();
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada data';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}


	public function bed_cleaning($tahun = 0, $bulan = 0)
	{
		if ($bulan == 0) {
			$dat = DB::connection('sqlsrv_sphaira')->table('BedCleaning')
				->whereDate('CleaningDateTime', date('Y-m-d'))
				->get();
		} else {
			$dat = DB::connection('sqlsrv_sphaira')->table('BedCleaning')
				->whereYear('CleaningDateTime', $tahun)->whereMonth('CleaningDateTime', $bulan)
				->get();
		}
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada pasien';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function bed_transfer($tahun = 0, $bulan = 0)
	{
		if ($bulan == 0) {
			$dat = DB::connection('sqlsrv_sphaira')->table('BedTransfer')
				->whereDate('TransferDate ', date('Y-m-d'))
				->get();
		} else {
			$dat = DB::connection('sqlsrv_sphaira')->table('BedTransfer')
				->whereYear('TransferDate ', $tahun)->whereMonth('TransferDate ', $bulan)
				->get();
		}
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada pasien';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function service_unit()
	{
		$dat = DB::connection('sqlsrv_sphaira')->table('ServiceUnit')->get();
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada data';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function service_room()
	{
		$dat = DB::connection('sqlsrv_sphaira')->table('ServiceRoom')->get();
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada data';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function bed()
	{
		$dat = DB::connection('sqlsrv_sphaira')->table('Bed')->get();
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada data';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function kelas()
	{
		$dat = DB::connection('sqlsrv_sphaira')->table('Class')->get();
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada data';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}


	public function unit_ruang()
	{
		$dat = DB::connection('sqlsrv_sphaira')->table('ServiceUnitRoom')->get();
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada data';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function kelas_kategori()
	{
		$dat = DB::connection('sqlsrv_sphaira')->table('ClassCategory')->get();
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada data';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function customer_contract()
	{
		$dat = DB::connection('sqlsrv_sphaira')->table('CustomerContract')->get();
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada data';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function general_code()
	{
		$dat = DB::connection('sqlsrv_sphaira')->table('sysGeneralCode')->get();
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada data';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function physician_team($thn, $bln)
	{
		$dat = DB::connection('sqlsrv_sphaira')->table('PhysicianTeam')
			->whereYear('LastUpdatedDateTime', $thn)->whereMonth('LastUpdatedDateTime', $bln)
			->where('RegistrationNo', 'like', 'QREG/RI%')
			->get();
		if ($dat) {
			$json['code'] = 200;
			$json['msg'] = 'Ok';
			$json['data'] = $dat;
		} else {
			$json['code'] = 201;
			$json['msg'] = 'Tidak ada data';
			$json['data'] = null;
		}
		return response()->json($json, $json['code']);
	}

	public function paramedic(Request $request)
	{
		// X0055^003
		// X0055^001
		$dat = DB::connection('mysql2')
			->table('m_paramedis');

		if (isset($request->params)) {
			$dat = $dat
				->whereRaw("
					GCParamedicType = ? 
					and (lower(FirstName) like ? or lower(LastName) like ? or ParamedicCode like ?)", 
					[$request->paramedic_type, '%'.$request->params.'%', '%'.$request->params.'%', '%'.$request->params.'%']
				);
		}

		$dat = $dat->get();

		return $dat;
	}
}
