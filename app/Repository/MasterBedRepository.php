<?php

namespace App\Repository;

use App\Utils\ConnectionDB;

class MasterBedRepository
{
    protected $db;
    public function __construct(ConnectionDB $connectionDb)
    {
        $this->db = $connectionDb;
    }
    public function getBedByClassCode($class_code)
    {
        return $this->db->connDbMaster()
            ->table('m_bed')
            ->leftJoin('m_ruangan', 'm_ruangan.RoomID', '=', 'm_bed.room_id')
            ->leftJoin('m_room_class', 'm_room_class.ClassCode', '=', 'm_bed.class_code')
            // ->join('m_unit_departemen', 'm_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitCode')
            ->leftJoin('m_unit_departemen', function ($join) {
                $join->on('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitCode')
                    ->orOn('m_bed.service_unit_id', '=', 'm_unit_departemen.ServiceUnitID');
            })
            ->leftJoin('m_unit', 'm_unit_departemen.ServiceUnitCode', '=', 'm_unit.ServiceUnitCode')
            ->select('bed_id', 'bed_code', 'room_id', 'class_code', 'RoomName as ruang', 'ServiceUnitName as kelompok', 'm_room_class.ClassName as kelas')
            ->whereNull('registration_no')
            ->where(function ($query) {
                $query->where('is_active', 1)
                    ->orWhereNull('is_active'); // menambahkan kondisi manampilkan data jika NULL
            })
            ->where(function ($query) {
                $query->where('bed_status', 'ready') // menampilkan data dengan status ready
                    ->orWhere('bed_status', '0116^R'); // menampilkan jika status 0116^R
            })
            ->where('m_bed.class_code', $class_code)
            ->get();
    }
}
