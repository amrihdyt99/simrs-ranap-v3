<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentServiceUnit extends Model
{
    use HasFactory;

    protected $table = 'm_unit_departemen';
    protected $primaryKey = 'ServiceUnitID';
    protected $connection = 'mysql2';
    protected $guarded = [];
    public $timestamps = false;
}
