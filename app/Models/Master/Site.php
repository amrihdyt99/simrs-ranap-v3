<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    protected $table = 'm_site';
    protected $primaryKey = 'SiteCode';
    protected $keyType = 'string';
    protected $connection = 'mysql2';
    public $incrementing = FALSE;
    protected $guarded = [];
}
