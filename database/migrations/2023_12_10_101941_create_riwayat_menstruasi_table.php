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
        Schema::create('riwayat_menstruasi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no_reg', 150)->nullable();
            $table->string('med_rec', 150)->nullable();
            $table->string('umur_menarche_tahun', 150)->nullable();
            $table->string('umur_menarche_lama_haid', 150)->nullable();
            $table->string('umur_menarche_jumlah_darah_haid', 150)->nullable();
            $table->string('umur_menarche_ganti_pembalut', 150)->nullable();
            $table->string('hpht', 150)->nullable();
            $table->string('tp', 150)->nullable();
            $table->string('gangguan_haid', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_menstruasi');
    }
};
