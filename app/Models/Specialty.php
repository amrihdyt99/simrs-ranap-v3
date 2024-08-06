<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;

    protected $table = 'rs_m_specialty';
    protected $primaryKey = 'SpecialtyCode';
    protected $connection = 'mysql';
}
