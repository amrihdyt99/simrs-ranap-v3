<?php

namespace App\Utils;

use Illuminate\Support\Facades\DB;

class ConnectionDB
{
    public function connDbMaster()
    {
        return DB::connection('mysql2');
    }

    public function connDbRanap()
    {
        return DB::connection('mysql');
    }

    public function nameDbMaster()
    {
        return $this->connDbMaster()->getDatabaseName();
    }

    public function nameDbRanap()
    {
        return $this->connDbRanap()->getDatabaseName();
    }
}
