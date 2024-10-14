<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemGroup extends Model
{
    use HasFactory;
    protected $table = 'm_item_group';
    protected $primaryKey = 'ItemGroupCode';
    protected $keyType = 'string';
    protected $connection = 'mysql2';
    public $incrementing = FALSE;
    public $timestamps = false;

    protected $guarded = [];
}
