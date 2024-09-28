<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnRegCttnInMRegistrasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->table('m_registrasi', function (Blueprint $table) {
            $table->dropColumn('reg_cttn');
        });

        Schema::connection('mysql2')->table('m_registrasi', function (Blueprint $table) {
            $table->text('reg_cttn')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_registrasi', function (Blueprint $table) {
            //
        });
    }
}
