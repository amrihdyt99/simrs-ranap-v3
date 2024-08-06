<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FluidBalance extends Model
{
    use HasFactory;

    protected $table = 'fluid_balance';

    protected $connection = 'mysql';
    protected $guarded = [];

    public function fluid_balance_data()
    {
        return $this->hasMany(FluidBalanceData::class,"fluid_balance_id","id");
    }
}
