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
        Schema::create('rs_rujukan_persiapan_pasien', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('kode_surat_rujukan')->nullable();
            $table->string('rujukan_rs_asal')->nullable();
            $table->string('rujukan_pemberi_informasi')->nullable();
            $table->string('ParamedicCode')->nullable();
            $table->string('rujukan_rs_tujuan')->nullable();
            $table->string('rujukan_penerima_informasi')->nullable();
            $table->string('rujukan_nama_petugas')->nullable();
            $table->date('rujukan_hubungi_tanggal')->nullable();
            $table->time('rujukan_hubungi_jam')->nullable();
            $table->string('rujukan_alasan_transfer')->nullable();
            $table->date('rujukan_transfer_tanggal')->nullable();
            $table->time('rujukan_transfer_jam')->nullable();
            $table->string('rujukan_kategori')->nullable();
            $table->string('rujukan_transportasi')->nullable();
            $table->date('rujukan_ringkasan_tanggal')->nullable();
            $table->time('rujukan_ringkasan_jam')->nullable();
            $table->string('rujukan_keluhan')->nullable();
            $table->string('rujukan_alergi')->nullable();
            $table->string('rujukan_kewaspaan')->nullable();
            $table->string('rujukan_gcs_e')->nullable();
            $table->string('rujukan_gcs_m')->nullable();
            $table->string('rujukan_gcs_v')->nullable();
            $table->string('rujukan_td')->nullable();
            $table->string('rujukan_N')->nullable();
            $table->string('rujukan_skala_nyeri')->nullable();
            $table->string('rujukan_suhu')->nullable();
            $table->string('rujukan_p')->nullable();
            $table->string('rujukan_spo2')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_rujukan_persiapan_pasien');
    }
};
