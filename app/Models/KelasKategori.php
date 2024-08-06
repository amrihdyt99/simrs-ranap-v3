<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasKategori extends Model
{
    use HasFactory;

    protected $table = 'rs_m_kelas_kategori';
    protected $primaryKey = 'ClassCategoryCode';
    protected $connection = 'mysql';
}
