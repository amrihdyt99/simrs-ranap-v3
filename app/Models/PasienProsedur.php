<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienProsedur extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_prosedur';
    protected $primaryKey = 'pprosedur_id';
    protected $guarded = [];
    protected $connection = 'mysql';

    public function paramedic()
    {
        return $this->belongsTo(Paramedic::class, 'pprosedur_dokter', 'ParamedicID');
    }

    public function icd9()
    {
        return $this->belongsTo(ICD9CM::class, 'pprosedur_prosedur', 'ID_TIND');
    }
}
