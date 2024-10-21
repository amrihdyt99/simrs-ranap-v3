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
            $table->string('edukasi_penggunaan_peralatan_perawat')->nullable();
            $table->string('edukasi_pencegahan_perawat')->nullable();
            $table->string('edukasi_manajemen_nyeri_ringan_perawat')->nullable();
            $table->string('edukasi_lain_lain_perawat')->nullable();
            $table->date('tgl_penggunaan_peralatan_perawat')->nullable();
            $table->date('tgl_pencegahan_perawat')->nullable();
            $table->date('tgl_manajemen_nyeri_ringan_perawat')->nullable();
            $table->date('tgl_lain_lain_perawat')->nullable();
            $table->string('tingkat_paham_penggunaan_peralatan_perawat')->nullable();
            $table->string('tingkat_paham_pencegahan_perawat')->nullable();
            $table->string('tingkat_paham_manajemen_nyeri_ringan_perawat')->nullable();
            $table->string('tingkat_paham_lain_lain_perawat')->nullable();
            $table->string('tingkat_paham_lain_lain_text_perawat')->nullable();
            $table->string('metode_edukasi_penggunaan_peralatan_perawat')->nullable();
            $table->string('metode_edukasi_pencegahan_perawat')->nullable();
            $table->string('metode_edukasi_manajemen_nyeri_ringan_perawat')->nullable();
            $table->string('metode_edukasi_lain_lain_perawat')->nullable();
            $table->text('ttd_sasaran');
            $table->text('ttd_edukator');
            $table->string('nama_sasaran')->nullable();
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
        Schema::dropIfExists('rs_edukasi_pasien_perawat');
    }
};
