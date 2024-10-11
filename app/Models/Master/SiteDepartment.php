<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteDepartment extends Model
{
    use HasFactory;

    protected $table = 'm_site_departemen';
    protected $primaryKey = 'SiteDepartmentID';
    protected $connection = 'mysql2';
    protected $guarded = [];
}
