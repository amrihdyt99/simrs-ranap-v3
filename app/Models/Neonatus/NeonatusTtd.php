<?php

namespace App\Models\Neonatus;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeonatusTtd extends Model
{
    use HasFactory;
    protected $table = 'pengkajian_neonatus_ttd';
    protected $primaryKey = 'pengkajian_neonatus_id';
    public $timestamps = true;
    protected $connection = 'mysql';
    protected $guarded = [];
}
