<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRoom extends Model
{
    use HasFactory;

    protected $table = 'm_ruangan';
    protected $primaryKey = 'RoomID';
    protected $connection = 'mysql2';
    protected $guarded = [];
    public $timestamps = false;

    public static function all($columns = ['*'])
    {
        return parent::where('IsDeleted',0)->get();
    }
}
