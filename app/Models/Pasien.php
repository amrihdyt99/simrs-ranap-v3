<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'm_pasien';
    protected $primaryKey = 'MedicalNo';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    public $appends = ['age'];
    protected $connection = 'mysql2';

    protected $guarded = [];

    public function getGCSexAttribute($value)
    {
        return ($value == '0001^F') ? 'Female' : 'Male';
    }

    public function getAgeAttribute()
    {
        $today = date("Y-m-d");
        $diff = date_diff(date_create($this->DateOfBirth), date_create($today));
        return $diff->format('%y');
    }

    public static function all($columns = ['*'])
    {
        return parent::where('IsDeleted', 0)->get();
    }

    public function reg()
    {
        return $this->hasMany(RegistrationInap::class, 'reg_medrec', 'reg_no');
    }
}
