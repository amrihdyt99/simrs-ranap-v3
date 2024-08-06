<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDrugDisplay extends Model
{
    use HasFactory;

    protected $table = 'rs_m_item_drug_display';
    protected $primaryKey = 'ItemID';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $connection = 'mysql';
}
