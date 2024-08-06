<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;

    protected $table = 'm_bed';
    protected $primaryKey = 'bed_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $connection = 'mysql2';

    protected $guarded = [];

    public function room()
    {
        return $this->belongsTo(ServiceRoom::class, 'room_id', 'RoomID');
    }

    public function unit()
    {
        return $this->belongsTo(ServiceUnit::class, 'service_unit_id', 'ServiceUnitCode');
    }

    public function class_category()
    {
        return $this->belongsTo(RoomClass::class, 'class_code', 'ClassCode');
    }

    public function registration()
    {
        return $this->hasOne(RegistrationInap::class, 'bed', 'bed_id');
    }
}
