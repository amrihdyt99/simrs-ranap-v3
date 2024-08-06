<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTarif extends Model
{
    use HasFactory;

    protected $table = 'rs_m_item_tarif';
    protected $primaryKey = 'tarif_id';
    protected $connection = 'mysql';
}
