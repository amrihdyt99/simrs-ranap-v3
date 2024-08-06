<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemGroup extends Model
{
    use HasFactory;

    protected $table = 'rs_m_item_group';
    protected $primaryKey = 'ItemGroupCode';
    protected $connection = 'mysql';
}
