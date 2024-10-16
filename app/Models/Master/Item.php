<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'm_item';
    protected $primaryKey = 'ItemID';
    protected $connection = 'mysql2';
    public $timestamps = false;

    protected $guarded = [];
}
