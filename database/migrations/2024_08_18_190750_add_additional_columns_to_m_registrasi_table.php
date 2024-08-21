<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalColumnsToMRegistrasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->table('m_registrasi', function (Blueprint $table) {
            $table->string('reg_pjawab_nik')->nullable()->after('reg_pjawab');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->table('m_registrasi', function (Blueprint $table) {
            //
        });
    }
}
