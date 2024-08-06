<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienAsperIntervensi extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_asper_intervensi';
    protected $primaryKey = 'pintervensi_id';
    protected $connection = 'mysql';
}
