<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaPasienKeluargaToRsPasienResume extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rs_pasien_resume', function (Blueprint $table) {
            $table->string('nama_pasien_keluarga')->nullable()->after('ttd_pasien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rs_pasien_resume', function (Blueprint $table) {
            $table->dropColumn('nama_pasien_keluarga');
        });
    }
}
