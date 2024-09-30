<?php

namespace App\Repository;

use App\Utils\ConnectionDB;

class RoomClassRepository
{
    protected $connection;
    public function __construct(ConnectionDB $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Find single Room Class by ClassCode
     * @param string $classCode
     * @return mixed
     */
    public function findOne(string $classCode)
    {
        $conn = $this->connection->connDbMaster();
        return $conn->table('m_room_class')->where('ClassCode', $classCode)
            ->where('IsActive', 1)
            ->where('IsDeleted', 0)
            ->first();
    }
}
