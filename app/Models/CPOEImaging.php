<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPOEImaging extends Model
{
    use HasFactory;

    protected $table = 'rs_m_cpoe_imaging';
    protected $connection = 'mysql';
}
