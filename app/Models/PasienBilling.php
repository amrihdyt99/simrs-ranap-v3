<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienBilling extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_billing';
    protected $primaryKey = 'pbill_id';
    protected $connection = 'mysql';
}
