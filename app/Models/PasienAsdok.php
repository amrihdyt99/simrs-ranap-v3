<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienAsdok extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_asdok';
    protected $primaryKey = 'asdok_id';
    protected $connection = 'mysql';
}
