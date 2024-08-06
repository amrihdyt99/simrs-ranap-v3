<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $table = 'm_medicine';
    protected $primaryKey = 'id';
    protected $connection = 'mysql2';

    protected $guarded = [];
}
