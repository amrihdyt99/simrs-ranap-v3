<?php

namespace App\Http\Controllers\IGD;

use App\Models\RegistrationCancelation;
use App\Repository\MasterBusinessPartnerRepository;
use App\Repository\MasterRegistrationRepository;
use App\Repository\MasterRuanganRepository;
use App\Repository\RoomClassRepository;
use App\Traits\Master\MasterPasienTrait;
use App\Traits\Ranap\RanapRegistrationTrait;
use App\Traits\ResponseDataTraits;
use App\Utils\ConnectionDB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class IGDServices
{
    use ResponseDataTraits, RanapRegistrationTrait, MasterPasienTrait;
    protected $connection, $roomClass, $masterRuangan, $masterBusinessPartner, $masterRegistrationRepo;
    public function __construct(
        ConnectionDB $connectionDb,
        RoomClassRepository $roomClass,
        MasterRuanganRepository $masterRuangan,
        MasterBusinessPartnerRepository $masterBusinessPartner,
        MasterRegistrationRepository $masterRegistrationRepository,
    ) {
        $this->connection = $connectionDb;
        $this->roomClass = $roomClass;
        $this->masterRuangan = $masterRuangan;
        $this->masterBusinessPartner = $masterBusinessPartner;
        $this->masterRegistrationRepo = $masterRegistrationRepository;
    }

    private function getDataStoreRegistration()
    {
        return (object)[
            'reg_lama' => request()->original_reg,
            'reg_igd' => request()->ranap_reg,
            'reg_medrec' => request()->reg_medrec,
            'reg_no_asal' => request()->original_reg,
            'kode_poli' => request()->original_poli_kode,
            'reg_dokter' => request()->original_dokter_poli_kode,
            'ranap_diagnosa' => request()->original_indikasi,
            'reg_class' => request()->ranap_class,
            'charge_class_code' => request()->ranap_charge_class,
            'reg_cara_bayar' => request()->ranap_business_partner,
        ];
    }


    public function getDataIGD()
    {
        try {
            $start_date = request()->query('start') ?? Carbon::now()->format('Y-m-d');
            $end_date = request()->query('end') ?? Carbon::now()->format('Y-m-d');
            $req_query = http_build_query(['start' => $start_date, 'end' => $end_date]);
            $response = Http::get('http://rsud.sumselprov.go.id/simrs-rajal/api/igd/pendaftaran?' . $req_query);
            $data = json_decode($response->body(), true);
            $data = collect($data)->filter(function ($item) {
                return !$this->checkExistInRegistration($item['ranap_reg']) && !$this->checkExistInCancelation($item['ranap_reg']);
            })->values()->all();
        } catch (\Throwable $th) {
            $data = [];
        }
        return $data;
    }

    public function getDataIGDByMedrec($medrec)
    {
        try {
            $data = Http::get('https://rsud.sumselprov.go.id/simrs-rajal/api/igd/pendaftaran?medrec=' . $medrec);
            $data = json_decode($data->body(), true);
            return collect($data)->map(function ($item) {
                $business_partner = $this->masterBusinessPartner->findOneById($item['ranap_business_partner']);
                $room =  $this->masterRuangan->findOneByRoomID($item['ranap_room']);
                $reg_class = $this->roomClass->findOne($item['ranap_class']);
                $charge_class =  $this->roomClass->findOne($item['ranap_charge_class']);
                return (object)[
                    'reg_medrec' => $item['reg_medrec'],
                    'reg_lama' => $item['original_reg'],
                    'ranap_class' => $reg_class->ClassName ?? '-',
                    'ranap_charge_class' => $charge_class->ClassName ?? '-',
                    'ranap_room' => $room->RoomName ?? '-',
                    'ranap_business_partner' => $business_partner->BusinessPartnerName ?? '-',
                    'ranap_diagnosa' => $item['original_indikasi'],
                    'reg_tgl' => Carbon::parse($this->getDateFromRegistrationNumber($item['ranap_reg']))->format('d-M-Y'),
                    'dokter_dpjp' => $item['ranap_dpjp'],
                ];
            })->all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function checkExistInRegistration($reg_no)
    {
        $conn = $this->connection->connDbMaster();
        return $conn->table('m_registrasi')->where('reg_lama_igd', $reg_no)->exists();
    }

    public function checkExistInCancelation($reg_no)
    {
        return RegistrationCancelation::where('reg_no', $reg_no)->exists();
    }

    public function indexDataTable()
    {
        $data = $this->getDataIGD();
        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $btn_batal = '<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancelRegModal" onclick="cancelRegistration(\'' . $data['reg_medrec'] . '\')">Batalkan</button>';
                $btn_daftar = '<button type="button" class="btn btn-primary btn-sm"  onclick="registerIGD(\'' . $data['reg_medrec'] . '\')">Daftar</button>';
                $div = '<div class="btn-group" role="group" aria-label="Basic example">'  . $btn_daftar . $btn_batal . '</div>';
                return $div;
            })
            ->addColumn('reg_tgl', function ($data) {
                return Carbon::parse($this->getDateFromRegistrationNumber($data['ranap_reg']))->format('d-M-Y');
            })
            ->editColumn('original_class', function ($data) {
                $roomClass = $this->roomClass->findOne($data['original_class']);
                return $roomClass->ClassName ?? '-';
            })
            ->editColumn('original_charge_class', function ($data) {
                $roomClass = $this->roomClass->findOne($data['original_charge_class']);
                return $roomClass->ClassName ?? '-';
            })
            // ->editColumn('ranap_class', function ($data) {
            //     $roomClass = $this->roomClass->findOne($data['ranap_class']);
            //     return $roomClass->ClassName ?? '-';
            // })
            // ->editColumn('ranap_charge_class', function ($data) {
            //     $roomClass = $this->roomClass->findOne($data['ranap_charge_class']);
            //     return $roomClass->ClassName ?? '-';
            // })
            ->editColumn('ranap_room', function ($data) {
                $room = $this->masterRuangan->findOneByRoomID($data['ranap_room']);
                return $room->RoomName ?? '-';
            })
            ->editColumn('ranap_business_partner', function ($data) {
                $businessPartner = $this->masterBusinessPartner->findOneById($data['ranap_business_partner']);
                return $businessPartner->BusinessPartnerName ?? '-';
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    /**
     * * Get date from registration number
     * @param string $reg_no ex: QREG/RI/202409270021
     * @return string ex: 2024-09-27
     */
    public function getDateFromRegistrationNumber(string $reg_no)
    {
        if (!is_string($reg_no)) return null;
        $date = explode('/', $reg_no)[2]; // 202409270021
        $date = substr($date, 0, 8); // 20240927
        return $date;
    }



    public function storeRegistration()
    {
        try {
            $pasien = $this->getPatientByMedicalRecord(request()->reg_medrec);
            if (!$pasien) $this->storePatientByMedicalRecord(request()->reg_medrec);
            $data = $this->getDataStoreRegistration();
            $this->masterRegistrationRepo->storeRegistration($data);
            return $this->responseData(200, 'OK', request()->all());
        } catch (\Throwable $th) {
            return $this->internalServerError($th->getMessage());
        }
    }
}
