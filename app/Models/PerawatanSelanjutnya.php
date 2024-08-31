<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerawatanSelanjutnya extends Model
{
    use HasFactory;

    protected $table = 'perawatan_selanjutnya';

    protected $fillable = [
        'id_dokter',
        'reg_no',
        'tipe',
        'klinik',
        'dokter',
        'tanggal_kontrol_rsud',
        'tanggal_rs_lain',
        'nama_rs_lain',
        'tanggal_rujuk_balik',
        'nama_rs_rujuk_balik',
        'puskesmas',
        'dokter_pribadi',
        'pergantian_catheter_detail',
        'tanggal_pergantian_catheter',
        'terapi_rehabilitan_detail',
        'tanggal_terapi_rehabilitan',
        'rawat_luka_detail',
        'tanggal_rawat_luka',
        'perawatan_lainnya_detail',
        'tanggal_perawatan_lainnya',
    ];
}
