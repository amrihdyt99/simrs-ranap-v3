<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsInMKeluargaPasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->table('m_keluarga_pasien', function (Blueprint $table) {
            $table->dropColumn([
                'Sex'
            ]);
        });
        Schema::connection('mysql2')->table('m_keluarga_pasien', function (Blueprint $table) {
            $table->string('Sex')->nullable()->after('DateOfBirth');
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
