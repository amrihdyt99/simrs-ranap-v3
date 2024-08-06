<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTarifMCU extends Model
{
    use HasFactory;

    protected $table = 'rs_m_item_tarif_mcu';
    protected $primaryKey = 'TariffId';
    protected $connection = 'mysql';
}
