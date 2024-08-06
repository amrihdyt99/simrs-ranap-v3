<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienResume extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_resume';
    protected $primaryKey = 'resume_id';
    protected $connection = 'mysql';
}
