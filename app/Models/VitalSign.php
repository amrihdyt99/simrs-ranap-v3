<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    use HasFactory;

    protected $table = 'vital_sign';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';

    protected $guarded = [];
}
