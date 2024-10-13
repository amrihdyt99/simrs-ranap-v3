<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    use HasFactory;
    protected $table = 'm_draft';
    protected $primaryKey = 'draft_id';
    protected $connection = 'mysql2';
    protected $guarded = [];
}
