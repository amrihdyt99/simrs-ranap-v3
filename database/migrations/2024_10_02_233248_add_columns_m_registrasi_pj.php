<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsMRegistrasiPj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::connection('mysql2')->table('m_registrasi_pj', function (Blueprint $table) {
        $table->string('pekerjaan_keluarga')->nullable()->after('reg_pjawab_nik');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
