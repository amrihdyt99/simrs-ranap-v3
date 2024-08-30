<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiPJawab extends Model
{
    use HasFactory;

    protected $table = 'm_registrasi_pj';
    public $timestamps = true;
    protected $connection = 'mysql2';
    protected $guarded = [];
}
