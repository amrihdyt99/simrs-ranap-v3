<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienAsperMasalah extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_asper_masalah';
    protected $primaryKey = 'pmasalah_id';
    protected $connection = 'mysql';
}
