<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicalPathway extends Model
{
    use HasFactory;

    protected $table = 'm_clinical_pathway';
    public $timestamps = false;
    protected $connection = 'mysql2';

    protected $guarded = [];

    public function diagnosis()
    {
        return $this->hasMany(Diagnosis::class, 'kode_path', 'kode_path');
    }

    public function outcomes()
    {
        return $this->hasMany(Outcome::class, 'kode_path', 'kode_path');
    }

    public function interventions()
    {
        return $this->hasMany(Intervention::class, 'kode_path', 'kode_path');
    }
}
