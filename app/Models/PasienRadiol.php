<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienRadiol extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_radiol';
    protected $primaryKey = 'pradiol_kode';
    protected $connection = 'mysql';
}
