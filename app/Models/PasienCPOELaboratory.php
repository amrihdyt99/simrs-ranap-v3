<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienCPOELaboratory extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_cpoe_laboratory';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $connection = 'mysql';

    public function laboratory()
    {
        return $this->belongsTo(CPOELaboratory::class, 'cpoe_laboratory_id', 'id');
    }

    public function paramedic()
    {
        return $this->belongsTo(Paramedic::class, 'order_by', 'ParamedicID');
    }
}
