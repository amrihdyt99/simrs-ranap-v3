<?php

namespace App\Repository;

use App\Utils\ConnectionDB;

class ICD9Repository
{
    protected $db;
    public function __construct(ConnectionDB $connectionDb)
    {
        $this->db = $connectionDb;
    }

    public function findOne($id)
    {
        try {
            return $this->db->connDbRanap()->table('icd9cm_bpjs')->where('ID_TIND', $id)->first();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
