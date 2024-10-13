<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'm_education';
    protected $primaryKey = 'EducationID';
    protected $connection = 'mysql2';
    public $timestamps = false;

    protected $guarded = [];
}
