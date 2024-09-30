<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToRsEdukasiPasienGiziTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rs_edukasi_pasien_gizi', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->text('ttd_sasaran')->nullable();
            $table->string('nama_sasaran')->nullable();
            $table->text('ttd_edukator')->nullable();
            $table->string('nama_edukator')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rs_edukasi_pasien_gizi', function (Blueprint $table) {
            //
        });
    }
}
