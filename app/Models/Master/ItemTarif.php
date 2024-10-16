<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemTarif extends Model
{
    use HasFactory;
    protected $table = 'm_item_tarif';
    protected $primaryKey = 'tarif_id';
    protected $connection = 'mysql2';
    public $timestamps = false;

    protected $guarded = [];
}
