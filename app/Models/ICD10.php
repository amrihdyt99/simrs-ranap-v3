<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ICD10 extends Model
{
    use HasFactory;

    protected $table = 'icd10_bpjs';
    protected $primaryKey = 'ID_ICD10';
    protected $keyType = 'string';
    protected $connection = 'mysql';
    public $incrementing = false;
}
