<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedHistory extends Model
{
    use HasFactory;
    protected $table = 'm_bed_history';
    protected $connection = 'mysql2';
    protected $guarded = [];
    public $timestamps = false;
}
