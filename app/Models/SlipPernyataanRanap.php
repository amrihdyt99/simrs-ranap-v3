<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlipPernyataanRanap extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';
    protected $table = 'slip_pernyataan_ranap';

    protected $fillable = [
        'reg_no',
        'medrec',
        'ttd_dokter',
    ];
}
