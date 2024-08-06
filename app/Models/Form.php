<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'rs_m_form';
    protected $primaryKey = 'form_id';
    protected $connection = 'mysql';
}
