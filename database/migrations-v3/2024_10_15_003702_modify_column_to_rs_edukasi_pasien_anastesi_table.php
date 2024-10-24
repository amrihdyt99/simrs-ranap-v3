<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnToRsEdukasiPasienAnastesiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rs_edukasi_pasien_anastesi', function (Blueprint $table) {
            $table->dropColumn('ttd_pihak_pasien');
            $table->dropColumn('ttd_dokter');
        });

        Schema::table('rs_edukasi_pasien_anastesi', function (Blueprint $table) {
            $table->text('ttd_pihak_pasien')->nullable();
            $table->text('ttd_dokter')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rs_edukasi_pasien_anastesi', function (Blueprint $table) {
            //
        });
    }
}
