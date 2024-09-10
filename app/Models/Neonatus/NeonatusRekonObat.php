<?php

namespace App\Models\Neonatus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeonatusRekonObat extends Model
{
    use HasFactory;
    protected $table = 'pengkajian_neonatus_rekon_obat';
    public $timestamps = false;
    protected $connection = 'mysql';
    protected $guarded = [];
}
