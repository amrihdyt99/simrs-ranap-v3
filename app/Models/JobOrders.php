<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOrders extends Model
{
    use HasFactory;

    protected $table = 'job_orders';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $connection = 'mysql';

    public function physician()
    {
        return $this->belongsTo(Paramedic::class, 'kode_dokter', 'ParamedicCode');
    }
}
