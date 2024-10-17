<?php

namespace App\Repository;

use App\Utils\ConnectionDB;

class LaporanOperasiRepository
{
    protected $db;
    public function __construct(ConnectionDB $conn)
    {
        $this->db = $conn;
    }
}
