<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationIGD extends Model
{
    use HasFactory;
    protected $table = 'm_registrasi';
    protected $primaryKey = 'reg_no';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $connection = 'mysql2';
    protected $guarded = [];

    public static function generateCode()
    {
        $count = self::whereDate('reg_tgl',date('Y-m-d'))->get()->count() + 1;
        return  "QREG/ER/".date('Ymd').sprintf("%04d",$count);
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'reg_medrec', 'MedicalNo');
    }

    public function physician()
    {
        return $this->belongsTo(Paramedic::class, 'reg_dokter', 'ParamedicCode');
    }

}
