<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienInformasi extends Model
{
    use HasFactory;

    // Koneksi database yang digunakan
    protected $connection = 'mysql2';
    protected $table = 'm_keluarga_pasien';
    protected $fillable = [
        'MedicalNo',
        'SequenceNo',
        'FamilyMedicalNo',
        'FamilyName',
        'DateOfBirth',
        'Job',
        'Address',
        'PhoneNo',
        'MobilePhoneNo',
        'GCRelationShip',
        'SSN',
        'Picture',
        'IsEmergencyContact',
    ];
    public $timestamps = true;

    public static function insertMultiple(array $data)
    {
        return self::insert($data);
    }
}
