<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class SuratRawatIntensif extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'surat_rawat_intensif';
    protected $fillable = [
        'reg_no',
        'penanggung_jawab',
        'umur_penanggung_jawab',
        'jenis_kelamin',
        'alamat_penanggung_jawab',
        'keluarga_signature',
        'keluarga_signature_2',
        'penanggung_jawab_2',
    ];
}