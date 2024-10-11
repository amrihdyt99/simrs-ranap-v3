<?php

namespace App\Models;

use App\Models\Master\BedHistory;
use App\Models\Master\DepartmentServiceUnit;
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

    public function d_service_unit()
    {
        return $this->belongsTo(DepartmentServiceUnit::class, 'service_unit_id', 'ServiceUnitID');
    }

    public function class()
    {
        return $this->belongsTo(RoomClass::class, 'class_code', 'ClassCode');
    }

    public function registration()
    {
        return $this->hasOne(RegistrationInap::class, 'bed', 'bed_id');
    }

    public function bed_history()
    {
        return $this->hasOne(BedHistory::class, 'ToBedID')
            ->orderBy('ReceiveTransferDate', 'desc')
            ->orderBy('ReceiveTransferTime', 'desc');
    }
}
