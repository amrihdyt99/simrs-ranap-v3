<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'm_ruangan';
    protected $primaryKey = 'RoomID';
    protected $connection = 'mysql2';
    public $timestamps = false;

    protected $guarded = [];
}
