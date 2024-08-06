<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienAsperNyeri extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_asper_nyeri';
    protected $primaryKey = 'nyeri_id';
    protected $connection = 'mysql';
}
