<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormA extends Model
{
    use HasFactory;
    protected $table = "form_a";

    public function m_form_a()
    {
        return $this->belongsTo(MFormA::class,"m_form_a_id","id");
    }

    public function registrationInap()
    {
        return $this->belongsTo(registrationInap::class,"reg_no","id");
    }
}
