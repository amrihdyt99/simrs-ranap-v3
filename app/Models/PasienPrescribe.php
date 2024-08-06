<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienPrescribe extends Model
{
    use HasFactory;

    protected $table = 'rs_pasien_prescribe';
    protected $primaryKey = 'prescribe_id';
    protected $connection = 'mysql';
    protected $guarded = [];

    public function physician()
    {
        return $this->belongsTo(Paramedic::class, 'prescribe_dokter', 'ParamedicID');
    }

    public function drug()
    {
        return $this->belongsTo(ItemDrugDisplay::class, 'prescribe_item', 'ItemID');
    }
}
