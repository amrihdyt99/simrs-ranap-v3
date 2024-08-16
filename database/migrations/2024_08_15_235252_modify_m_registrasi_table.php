<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyMRegistrasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->table('m_registrasi', function (Blueprint $table) {
            $table->string('reg_pjawab_alamat', 150)->nullable()->change();
            $table->string('reg_pjawab_nohp', 150)->nullable()->change();
            $table->string('reg_ketersidaan_kamar', 1)->nullable()->change();
            $table->string('reg_info_kewajiban', 150)->nullable()->change();
            $table->string('reg_info_general_consent', 150)->nullable()->change();
            $table->string('reg_info_carabayar', 150)->nullable()->change();
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
