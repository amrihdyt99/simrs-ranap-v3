<?php

namespace App\Repository;

use App\Utils\ConnectionDB;

class MasterPyschianRepository
{
    protected $db;
    public function __construct(ConnectionDB $db)
    {
        $this->db = $db;
    }

    public function findOneByCode($paramedic_code)
    {
        return $this->db->connDbMaster()->table('m_paramedis')
            ->leftJoin('users', 'm_paramedis.ParamedicCode', '=', 'users.dokter_id')
            ->where('ParamedicCode', $paramedic_code)
            ->where('IsActive', 1)
            ->select('m_paramedis.*', 'users.signature')
            ->first();
    }
}
