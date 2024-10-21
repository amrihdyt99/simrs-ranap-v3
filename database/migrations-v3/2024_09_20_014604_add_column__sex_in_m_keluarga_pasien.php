<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSexInMKeluargaPasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->table('m_keluarga_pasien', function (Blueprint $table) {
            $table->string('Sex', 1)->nullable()->after('DateOfBirth');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_keluarga_pasien', function (Blueprint $table) {
            //
        });
    }
}
