<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienCPOEImaging extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_cpoe_imaging';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $connection = 'mysql';

    public function imaging()
    {
        return $this->belongsTo(CPOEImaging::class, 'cpoe_imaging_id', 'id');
    }

    public function paramedic()
    {
        return $this->belongsTo(Paramedic::class, 'order_by', 'ParamedicID');
    }
}
