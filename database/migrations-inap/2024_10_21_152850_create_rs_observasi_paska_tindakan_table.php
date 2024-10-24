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
        Schema::create('rs_observasi_paska_tindakan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->date('tanggal_observasi')->nullable();
            $table->time('waktu_observasi')->nullable();
            $table->string('tekanan_darah')->nullable();
            $table->string('nadi')->nullable();
            $table->string('pernapasan')->nullable();
            $table->string('spo2')->nullable();
            $table->date('tanggal_sirkulasi')->nullable();
            $table->time('waktu_sirkulasi')->nullable();
            $table->string('nadi_sirkulasi')->nullable();
            $table->string('suhu_kulit')->nullable();
            $table->string('warna')->nullable();
            $table->string('isi_nadi')->nullable();
            $table->string('sensasi')->nullable();
            $table->string('pergerakan')->nullable();
            $table->string('pendarahan_lipat_paha')->nullable();
            $table->string('hematoma')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_observasi_paska_tindakan');
    }
};
