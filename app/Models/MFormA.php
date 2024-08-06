<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MFormA extends Model
{
    use HasFactory;

    protected $table = "m_form_a";

    public function form_a()
    {
        $this->hasMany(FormA::class,"m_form_a_id","id");
    }
}
