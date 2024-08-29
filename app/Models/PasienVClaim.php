<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienVClaim extends Model
{
    use HasFactory;

    protected $table = 'm_pasien_vclaim';
    public $timestamps = true;
    protected $connection = 'mysql2';
    protected $guarded = [];
}
