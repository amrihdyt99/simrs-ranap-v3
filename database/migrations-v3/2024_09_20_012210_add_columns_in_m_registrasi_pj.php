<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInMRegistrasiPj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->table('m_registrasi_pj', function (Blueprint $table) {
            $table->date('tanggal_lahir')->nullable()->after('reg_pjawab_nama');
            $table->string('jenis_kelamin')->nullable()->after('tanggal_lahir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_registrasi_pj', function (Blueprint $table) {
            //
        });
    }
}
