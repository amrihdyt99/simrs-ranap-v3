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
        Schema::create('assesment_awal_dokter', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no_reg', 150);
            $table->string('anamnesis', 100)->nullable();
            $table->string('keluhan_utama', 200)->nullable();
            $table->string('riwayat_penyakit_sekarang', 200)->nullable();
            $table->string('riwayat_penyakit_dahulu', 200)->nullable();
            $table->string('riwayat_pengobatan', 200)->nullable();
            $table->string('riwayat_penyakit_keluarga', 200)->nullable();
            $table->string('pemeriksaan_multi_organ', 100)->nullable();
            $table->string('toraks', 200)->nullable();
            $table->string('jantung', 200)->nullable();
            $table->string('abdomen', 100)->nullable();
            $table->string('ekstremitas_atas_bawah', 200)->nullable();
            $table->string('genetalia_dan_anus', 200)->nullable();
            $table->string('hasil_pemeriksaan_penunjang', 200)->nullable();
            $table->string('daftar_masalah_medik', 200)->nullable();
            $table->string('tata_laksana_awal', 200)->nullable();
            $table->date('tanggal_pemberian')->nullable();
            $table->integer('deleted')->default(0);
            $table->string('dokter_id', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assesment_awal_dokter');
    }
};
