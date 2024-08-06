<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienSoapDok extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_soapdok';
    protected $primaryKey = 'soapdok_id';
    protected $connection = 'mysql';
    protected $guarded = [];

    public function paramedic()
    {
        return $this->belongsTo(Paramedic::class, 'soapdok_dokter', 'ParamedicID');
    }

}
