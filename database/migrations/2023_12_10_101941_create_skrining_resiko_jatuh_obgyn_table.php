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
        Schema::create('skrining_resiko_jatuh_obgyn', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no_reg', 150)->nullable();
            $table->string('med_rec', 150)->nullable();
            $table->string('skor_riwayat_jatuh', 150)->nullable();
            $table->string('skor_diagnosis_medis', 150)->nullable();
            $table->string('skor_alat_bantu', 150)->nullable();
            $table->string('skor_infus', 150)->nullable();
            $table->string('skor_cara_berjalan', 150)->nullable();
            $table->string('skor_mental', 150)->nullable();
            $table->enum('diberitahukan_dokter', ['tidak', 'ya'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skrining_resiko_jatuh_obgyn');
    }
};
