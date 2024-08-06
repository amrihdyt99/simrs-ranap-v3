<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienAsper extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_asper';
    protected $primaryKey = 'asper_id';
    protected $connection = 'mysql';
}
