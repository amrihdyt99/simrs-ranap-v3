<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienRehab extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_rehab';
    protected $primaryKey = 'prehab_kode';
    protected $connection = 'mysql';
}
