<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FluidBalanceData extends Model
{
    use HasFactory;

    protected $table = 'fluid_balance_data';
    protected $connection = 'mysql';
    protected $guarded = [];

    public function fluid_balance()
    {
        return $this->belongsTo(FluidBalance::class,"fluid_balance_id","id");
    }
}
