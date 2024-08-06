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
        Schema::create('adl_obgyn', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no_reg', 150)->nullable();
            $table->string('med_rec', 150)->nullable();
            $table->string('skor_bab', 150)->nullable();
            $table->string('skor_bak', 150)->nullable();
            $table->string('skor_membersihkan_diri', 150)->nullable();
            $table->string('skor_penggunaan_wc', 150)->nullable();
            $table->string('skor_makan_minum', 150)->nullable();
            $table->string('skor_bergerak_kursi_roda', 150)->nullable();
            $table->string('skor_berjalan', 150)->nullable();
            $table->string('skor_berpakaian', 150)->nullable();
            $table->string('skor_naik_turun_tangga', 150)->nullable();
            $table->string('skor_mandi', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adl_obgyn');
    }
};
