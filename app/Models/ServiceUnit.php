<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceUnit extends Model
{
    use HasFactory;

    protected $table = 'm_unit';
    protected $primaryKey = 'ServiceUnitCode';
    protected $keyType = 'string';
    protected $connection = 'mysql2';
    public $incrementing = FALSE;
    public $timestamps = false;
    protected $guarded = [];

    public static function all($columns = ['*'])
    {
        return parent::where('IsDeleted',0)->get();
    }
}
