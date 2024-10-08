<?php

namespace App\Repository;

use App\Utils\ConnectionDB;

class ICD10Repository
{
    protected $db;
    public function __construct(ConnectionDB $connectionDb)
    {
        $this->db = $connectionDb;
    }
    public function findOne($id)
    {
        try {
            return $this->db->connDbRanap()->table('icd10_bpjs')->where('ID_ICD10', $id)->first();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
