<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienLab extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_lab';
    protected $primaryKey = 'plab_kode';
    protected $connection = 'mysql';
}
