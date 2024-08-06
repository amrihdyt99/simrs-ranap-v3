<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $table = 'm_diagnosis';
    public $timestamps = false;

    protected $connection = 'mysql2';
    protected $guarded = [];

    public function clinicalPathway()
    {
        return $this->belongsTo(ClinicalPathway::class, 'kode_path', 'kode_path');
    }
}
