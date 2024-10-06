<?php

namespace App\Repository;

use App\Utils\ConnectionDB;

class MasterRegistrationPasienPJ
{

    protected $db;
    public function __construct(ConnectionDB $conn)
    {
        $this->db = $conn;
    }

    public function getPjPasien($reg_no)
    {
        return $this->db->connDbMaster()->table('m_registrasi_pj')->where('reg_no', $reg_no)->get();
    }
}
