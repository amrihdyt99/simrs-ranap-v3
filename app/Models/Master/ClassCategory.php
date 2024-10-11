<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassCategory extends Model
{
    use HasFactory;


    protected $table = 'm_class_category';
    protected $primaryKey = 'ClassCategoryCode';
    protected $keyType = 'string';
    protected $connection = 'mysql2';
    public $incrementing = FALSE;
    protected $guarded = [];
}
