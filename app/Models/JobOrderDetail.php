<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOrderDetail extends Model
{
    use HasFactory;

    protected $table = 'job_orders_dt';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $connection = 'mysql';
}
