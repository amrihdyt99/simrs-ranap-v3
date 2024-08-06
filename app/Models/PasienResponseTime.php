<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienResponseTime extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_responsetime';
    protected $primaryKey = 'response_id';
    protected $connection = 'mysql';
}
