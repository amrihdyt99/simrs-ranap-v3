<?php

namespace App\Models\Obgyn;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObgynRiwayatKehamilan extends Model
{
    use HasFactory;
    protected $table = 'pengkajian_obgyn_riwayat_kehamilan';
    protected $primaryKey = 'pengkajian_obgyn_id';
    public $timestamps = true;
    protected $connection = 'mysql';
    protected $guarded = [];
}
