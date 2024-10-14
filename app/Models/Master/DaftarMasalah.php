<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarMasalah extends Model
{
    use HasFactory;

    protected $table = 'm_daftar_masalah';
    protected $primaryKey = 'masalah_kode';
    protected $keyType = 'string';
    protected $connection = 'mysql2';
    protected $guarded = [];
}
