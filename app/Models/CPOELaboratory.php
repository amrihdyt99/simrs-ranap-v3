<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPOELaboratory extends Model
{
    use HasFactory;

    protected $table = 'rs_m_cpoe_laboratory';
    protected $connection = 'mysql';
}
