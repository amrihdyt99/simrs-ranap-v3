<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienSoaper extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_soaper';
    protected $primaryKey = 'soaper_id';
    protected $connection = 'mysql';
    protected $guarded = [];
}
