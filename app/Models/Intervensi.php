<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervensi extends Model
{
    use HasFactory;

    protected $table = 'rs_m_intervensi';
    protected $primaryKey = 'intervensi_id';
    protected $connection = 'mysql';
}
