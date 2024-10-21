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
        Schema::create('rs_ringkasan_kondisi_pasien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no')->nullable();
            $table->string('reg_medrec')->nullable();
            $table->date('tanggal_mrs')->nullable();
            $table->time('jam')->nullable();
            $table->string('keluhan')->nullable();
            $table->string('alergi')->nullable();
            $table->string('kewaspadaan')->nullable();
            $table->string('tanda_vital')->nullable();
            $table->string('gcs')->nullable();
            $table->string('td')->nullable();
            $table->string('n')->nullable();
            $table->string('skala_nyeri')->nullable();
            $table->string('e')->nullable();
            $table->string('m')->nullable();
            $table->string('v')->nullable();
            $table->string('suhu')->nullable();
            $table->string('p')->nullable();
            $table->string('spo2')->nullable();
            $table->string('pemeriksaan_fisik')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('pemeriksaan_penunjang_pasien')->nullable();
            $table->string('prosedur_operasi')->nullable();
            $table->string('alat_terpasang')->nullable();
            $table->date('tanggal_alat_terpasang')->nullable();
            $table->string('obat_yang_diterima')->nullable();
            $table->string('obat_yang_dibawah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_ringkasan_kondisi_pasien');
    }
};
