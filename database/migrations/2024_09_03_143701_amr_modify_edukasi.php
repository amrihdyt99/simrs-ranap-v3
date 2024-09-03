<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AmrModifyEdukasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rs_edukasi_pasien', function (Blueprint $table) {
            $table->string('bahasa')->nullable()->change();
            $table->string('kebutuhan_penerjemah')->nullable()->change();
            $table->string('baca_tulis')->nullable()->change();
            $table->string('pendidikan_pasien')->nullable()->change();
            $table->string('pilihan_tipe_belajar')->nullable()->change();
            $table->string('hambatan_belajar')->nullable()->change();
            $table->string('kebutuhan_belajar')->nullable()->change();
            $table->string('kesediaan_pasien')->nullable()->change();
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
