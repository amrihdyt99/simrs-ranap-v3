<?php

namespace App\Repository;

use App\Utils\ConnectionDB;

class MasterBusinessPartnerRepository
{
    protected $connection;

    public function __construct(ConnectionDB $connection)
    {
        $this->connection = $connection;
    }

    public function findOneById($id)
    {
        return $this->connection->connDbMaster()
            ->table('businesspartner')
            ->where('id', $id)
            ->where('aktif', 1)
            ->first();
    }
}
