<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ICD9CM extends Model
{
    use HasFactory;

    protected $table = 'icd9cm_bpjs';
    protected $primaryKey = 'ID_TIND';
    protected $keyType = 'string';
    protected $connection = 'mysql';
    public $incrementing = false;

}
