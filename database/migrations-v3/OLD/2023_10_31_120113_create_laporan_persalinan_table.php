<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanPersalinanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_persalinan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('reg_medrec')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('jam_mulai')->nullable();
            $table->string('jam_selesai')->nullable();
            $table->string('tindakan')->nullable();
            $table->string('diagnosa_pasca_persalinan')->nullable();
            $table->string('perkiraan_jumlah_pendarahan')->nullable();
            $table->string('transfusi_prc')->nullable();
            $table->string('transfusi_wb')->nullable();
            $table->string('transfusi_ffp')->nullable();
            $table->string('transfusi_cryo')->nullable();
            $table->string('laporan')->nullable();
            $table->string('keterangan_bayi_lahir')->nullable();
            $table->string('jam_lahir')->nullable();
            $table->string('bb_bayi')->nullable();
            $table->string('lk_bayi')->nullable();
            $table->string('pb_bayi')->nullable();
            $table->string('ld_bayi')->nullable();
            $table->string('as_bayi')->nullable();
            $table->string('anus_bayi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_persalinan');
    }
}
