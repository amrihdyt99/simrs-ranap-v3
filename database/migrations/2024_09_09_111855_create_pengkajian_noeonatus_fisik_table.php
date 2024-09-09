<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengkajianNoeonatusFisikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengkajian_noeonatus_fisik', function (Blueprint $table) {
            $table->bigIncrements('pengkajian_neonatus_id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('riwayat_penyakit_ibu')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->integer('berat_fisik')->nullable();
            $table->integer('panjang_fisik')->nullable();
            $table->integer('lingkar_kepala')->nullable();
            $table->integer('lingkar_perut')->nullable();
            $table->string('aktifitas')->nullable();
            $table->string('tangis')->nullable();
            $table->string('refleks_hisap')->nullable();
            $table->string('anemia')->nullable();
            $table->string('ikterus')->nullable();
            $table->string('sianosis')->nullable();
            $table->string('dispnoe')->nullable();
            $table->string('denyut_jantung')->nullable();
            $table->string('pernafasan')->nullable();
            $table->integer('temperatur')->nullable();
            $table->string('spesifik_kepala')->nullable();
            $table->string('spesifik_kepala_ket')->nullable();
            $table->string('spesifik_leher')->nullable();
            $table->string('spesifik_thoraks')->nullable();
            $table->string('spesifik_abdomen')->nullable();
            $table->string('spesifik_ekstremitas')->nullable();
            $table->string('spesifik_anus')->nullable();
            $table->string('spesifik_genitalia')->nullable();
            $table->string('spesifik_penunjang')->nullable();
            $table->string('spesifik_daftar_masalah')->nullable();
            $table->string('spesifik_tata_laksana')->nullable();
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
        Schema::dropIfExists('pengkajian_noeonatus_fisik');
    }
}
