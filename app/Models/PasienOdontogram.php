<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienOdontogram extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_odontogram';
    protected $primaryKey = 'podonto_id';
    protected $connection = 'mysql';
}
