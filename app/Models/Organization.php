<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $table = 'm_organization';
    protected $primaryKey = 'OrganizationCode';
    protected $connection = 'mysql2';
    public $timestamps = false;

    protected $guarded = [];
}
