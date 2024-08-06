<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienPemberianObat extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_pemberian_obat';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $connection = 'mysql';

    public function paramedic()
    {
        return $this->belongsTo(Paramedic::class, 'kode_dokter', 'ParamedicID');
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'kode_obat', 'id');
    }

    public function nurse()
    {
        return $this->belongsTo(User::class, 'verifikasi_nurse', 'id');
    }

}
