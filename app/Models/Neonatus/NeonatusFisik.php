<?php

namespace App\Models\Neonatus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeonatusFisik extends Model
{
    use HasFactory;


    protected $table = 'pengkajian_neonatus_fisik';
    protected $primaryKey = 'pengkajian_neonatus_id';
    public $timestamps = true;
    protected $connection = 'mysql';
    protected $guarded = [];
}
