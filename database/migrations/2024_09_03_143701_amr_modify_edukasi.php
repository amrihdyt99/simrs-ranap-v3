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
            $table->dropColumn([
                'bahasa', 
                'kebutuhan_penerjemah', 
                'baca_tulis', 
                'pendidikan_pasien', 
                'pilihan_tipe_belajar', 
                'hambatan_belajar', 
                'kebutuhan_belajar', 
                'kesediaan_pasien'
            ]);
        });

        Schema::table('rs_edukasi_pasien', function (Blueprint $table) {
            $table->string('bahasa')->nullable();
            $table->string('kebutuhan_penerjemah')->nullable();
            $table->string('baca_tulis')->nullable();
            $table->string('pendidikan_pasien')->nullable();
            $table->string('pilihan_tipe_belajar')->nullable();
            $table->string('hambatan_belajar')->nullable();
            $table->string('kebutuhan_belajar')->nullable();
            $table->string('kesediaan_pasien')->nullable();
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
