<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPersetujuanMedis extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'surat_persetujuan_medis';
    protected $fillable = [
        'reg_no',
        'penanggung_jawab',
        'umur_penanggung_jawab',
        'alamat_penanggung_jawab',
        'hubungan_penanggung_jawab',
        'penanggung_jawab_2',
        'umur_penanggung_jawab_2',
        'alamat_penanggung_jawab_2',
        'hubungan_penanggung_jawab_2',
        'kondisi_medis',
        'kondisi_medis_lain_lain',
        'signature1',
        'witness1',
        'witness2',
        'nama_witness2',
    ];

    protected $casts = [
        'kondisi_medis' => 'array',
    ];
}
