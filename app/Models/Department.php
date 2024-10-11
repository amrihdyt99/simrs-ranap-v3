<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'm_departemen';
    protected $primaryKey = 'DepartmentCode';
    protected $keyType = 'string';
    protected $connection = 'mysql2';
    public $incrementing = FALSE;
    protected $guarded = [];
}
