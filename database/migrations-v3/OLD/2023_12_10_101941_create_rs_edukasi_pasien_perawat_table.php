<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_edukasi_pasien_perawat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('edukasi_penggunaan_peralatan')->nullable();
            $table->string('edukasi_pencegahan')->nullable();
            $table->string('edukasi_manajemen_nyeri')->nullable();
            $table->string('edukasi_lain_lain')->nullable();
            $table->date('tgl_penggunaan_peralatan')->nullable();
            $table->date('tgl_pencegahan')->nullable();
            $table->date('tgl_manajemen_nyeri')->nullable();
            $table->date('tgl_lain_lain')->nullable();
            $table->string('tingkat_paham_penggunaan_peralatan')->nullable();
            $table->string('tingkat_paham_pencegahan')->nullable();
            $table->string('tingkat_paham_manajemen_nyeri')->nullable();
            $table->string('tingkat_paham_lain_lain')->nullable();
            $table->string('tingkat_paham_lain_lain_text')->nullable();
            $table->string('metode_edukasi_penggunaan_peralatan')->nullable();
            $table->string('metode_edukasi_pencegahan')->nullable();
            $table->string('metode_edukasi_manajemen_nyeri')->nullable();
            $table->string('metode_edukasi_lain_lain')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_edukasi_pasien_perawat');
    }
};
