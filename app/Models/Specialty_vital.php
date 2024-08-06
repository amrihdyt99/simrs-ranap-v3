<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty_vital extends Model
{
    use HasFactory;

    protected $table = 'specialty';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';

    protected $guarded = [];
}
