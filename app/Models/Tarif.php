<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    protected $table = 'm_tarif';
    protected $primaryKey = 'tarif_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $connection = 'mysql2';

    protected $guarded = [];
}
