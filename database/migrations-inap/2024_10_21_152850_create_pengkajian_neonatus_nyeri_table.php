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
        Schema::create('pengkajian_neonatus_nyeri', function (Blueprint $table) {
            $table->bigIncrements('pengkajian_neonatus_id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->tinyInteger('ekspresi')->nullable();
            $table->tinyInteger('menangis')->nullable();
            $table->tinyInteger('pola_nafas')->nullable();
            $table->tinyInteger('lengan')->nullable();
            $table->tinyInteger('kaki')->nullable();
            $table->tinyInteger('rangsangan')->nullable();
            $table->tinyInteger('heart_rate')->nullable();
            $table->tinyInteger('saturasi_oksigen')->nullable();
            $table->integer('frekuensi_bab')->nullable();
            $table->string('frekuensi_bab_no')->nullable();
            $table->string('gangguan_bab')->nullable();
            $table->string('gangguan_bab_ket')->nullable();
            $table->string('karakter_bab')->nullable();
            $table->string('frekuensi_bab_hari')->nullable();
            $table->string('frekuensi_bab_jumlah')->nullable();
            $table->string('warna_feces')->nullable();
            $table->string('warna_urin')->nullable();
            $table->string('bahasa')->nullable();
            $table->string('bahasa_lain')->nullable();
            $table->string('penerjemah_ortu')->nullable();
            $table->string('hambatan_ortu')->nullable();
            $table->string('hambatan_ortu_lain')->nullable();
            $table->string('edukasi_ortu')->nullable();
            $table->string('edukasi_ortu_ket')->nullable();
            $table->timestamps();
            $table->string('skala_nips')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengkajian_neonatus_nyeri');
    }
};
