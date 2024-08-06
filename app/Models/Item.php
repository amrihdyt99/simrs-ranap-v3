<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'rs_m_item';
    protected $primaryKey = 'ItemID';
    protected $connection = 'mysql';


}
