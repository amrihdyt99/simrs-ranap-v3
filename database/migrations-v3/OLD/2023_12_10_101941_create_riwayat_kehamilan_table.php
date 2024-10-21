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
        Schema::create('riwayat_kehamilan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no_reg', 150)->nullable();
            $table->string('med_rec', 150)->nullable();
            $table->string('tanggal_tahun_partus', 150)->nullable();
            $table->string('tempat_partus', 150)->nullable();
            $table->string('umur_hamil', 150)->nullable();
            $table->string('jenis_persalinan', 150)->nullable();
            $table->string('penolong_persalinan', 150)->nullable();
            $table->string('penyulit', 150)->nullable();
            $table->string('bb_anak', 150)->nullable();
            $table->string('keadaan_sekarang', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_kehamilan');
    }
};
