<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FinChangeSepNoMRegistrasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->table('m_registrasi', function (Blueprint $table) {
            $table->dropColumn('reg_sep_no');
        });

        Schema::connection('mysql2')->table('m_registrasi', function (Blueprint $table) {
            $table->string('reg_sep_no')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
