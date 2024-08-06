<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienDiagnosa extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_diagnosa';
    protected $primaryKey = 'pdiag_id';
    protected $connection = 'mysql';

    protected $guarded = [];

    public function paramedic()
    {
        return $this->belongsTo(Paramedic::class, 'pdiag_dokter', 'ParamedicID');
    }

    public function icd10()
    {
        return $this->belongsTo(ICD10::class, 'pdiag_diagnosa', 'ID_ICD10');
    }
}
