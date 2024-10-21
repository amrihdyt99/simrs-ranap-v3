<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Form extends Model
{
    use HasFactory;
    protected $table = 'rs_m_form';
    protected $primaryKey = 'form_id';
    protected $connection = 'mysql2';
    public $timestamps = false;

    protected $guarded = [];
}
