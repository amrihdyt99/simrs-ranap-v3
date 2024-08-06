<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienDischarge extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_discharge';
    protected $primaryKey = 'pdischarge_id';
    protected $connection = 'mysql';

    protected $guarded = [];

    public function paramedic()
    {
        return $this->belongsTo(Paramedic::class, 'pdischarge_dokter', 'ParamedicID');
    }

}
