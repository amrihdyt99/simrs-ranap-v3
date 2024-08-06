<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntervensiItem extends Model
{
    use HasFactory;

    protected $table = 'rs_m_intervensi_item';
    protected $primaryKey = 'item_id';
    protected $connection = 'mysql';
}
