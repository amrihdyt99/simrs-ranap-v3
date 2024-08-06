<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDrug extends Model
{
    use HasFactory;

    protected $table = 'rs_m_item_drug';
    protected $primaryKey = 'ItemID';
    protected $connection = 'mysql';
}
