<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienKonsultasi extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_konsultasi';
    protected $primaryKey = 'pkonsultasi_id';
    protected $casts = ['pkonsultasi_dokter_tujuan' => 'integer'];
    protected $guarded = [];
    protected $connection = 'mysql';

    public function dokter_tujuan()
    {
        return $this->belongsTo(Paramedic::class, 'pkonsultasi_dokter_tujuan', 'ParamedicCode');
    }

    public function dokter_kirim()
    {
        return $this->belongsTo(Paramedic::class, 'pkonsultasi_dokter_kirim', 'ParamedicID');
    }
}
