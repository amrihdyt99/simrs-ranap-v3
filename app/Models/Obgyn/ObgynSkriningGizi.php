<?php

namespace App\Models\Obgyn;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObgynSkriningGizi extends Model
{
    use HasFactory;

    protected $table = 'pengkajian_obgyn_skrining_gizi';
    protected $primaryKey = 'pengkajian_obgyn_id';
    public $timestamps = true;
    protected $connection = 'mysql';
    protected $guarded = [];
}
