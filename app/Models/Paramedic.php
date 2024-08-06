<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paramedic extends Model
{
    use HasFactory;

    protected $table = 'm_paramedis';
    protected $primaryKey = 'ParamedicID';
    protected $connection = 'mysql2';

    public static function all($columns = ['*'])
    {
        return parent::where('IsDeleted',0)->get();
    }
}
