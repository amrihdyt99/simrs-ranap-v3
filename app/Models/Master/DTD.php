<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DTD extends Model
{
    use HasFactory;
    protected $table = 'm_dtd';
    protected $primaryKey = 'DTDNo';
    protected $keyType = 'string';
    protected $connection = 'mysql2';
    public $timestamps = false;

    protected $guarded = [];
}
