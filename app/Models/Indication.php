<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indication extends Model
{
    use HasFactory;

    protected $table = 'm_gejala';
    protected $primaryKey = 'id';
    protected $connection = 'mysql2';

    protected $guarded = [];
}
