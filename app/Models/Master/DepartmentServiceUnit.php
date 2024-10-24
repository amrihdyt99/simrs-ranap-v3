<?php

namespace App\Models\Master;

use App\Models\ServiceUnit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentServiceUnit extends Model
{
    use HasFactory;

    protected $table = 'm_unit_departemen';
    protected $primaryKey = 'ServiceUnitID';
    protected $connection = 'mysql2';
    public $timestamps = false;

    protected $guarded = [];

    public function unit()
    {
        return $this->belongsTo(ServiceUnit::class, 'ServiceUnitCode', 'ServiceUnitCode');
    }
}
