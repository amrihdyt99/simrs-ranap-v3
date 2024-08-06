<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienRehabFisio extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_rehab_fisio';
    protected $primaryKey = 'fisio_id';
    protected $connection = 'mysql';
}
