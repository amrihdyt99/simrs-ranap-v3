<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoringTransfusiDarahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring_transfusi_darah', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('reg_medrec')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('nomor_kantong')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('jenis_darah')->nullable();
            $table->string('tanggal_kadarluarsa')->nullable();
            $table->string('penerima_darah')->nullable();
            $table->string('waktu_transfusi')->nullable();
            $table->string('keadaan_umum')->nullable();
            $table->string('suhu_tubuh')->nullable();
            $table->string('nadi')->nullable();
            $table->string('tekanan_darah')->nullable();
            $table->string('respiratory_rate')->nullable();
            $table->string('volume_warna_urin')->nullable();
            $table->string('gejala_reaksi_transfusi')->nullable();
            $table->string('pilihan_menit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitoring_transfusi_darah');
    }
}
