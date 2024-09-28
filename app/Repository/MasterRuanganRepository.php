<?php
namespace App\Repository;

use App\Utils\ConnectionDB;

class MasterRuanganRepository{
    protected $connection;
    public function __construct(ConnectionDB $connection)
    {
        $this->connection = $connection;
    }

    public function findOneByRoomID(string $room_id){
        return $this->connection->connDbMaster()->table('m_ruangan')
            ->where('RoomID', $room_id)
            ->where('IsActive', 1)
            ->select('RoomID', 'RoomCode', 'RoomName', 'IsActive')
            ->first();
    }
}