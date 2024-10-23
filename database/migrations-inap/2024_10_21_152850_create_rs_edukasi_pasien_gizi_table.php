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
        Schema::create('rs_edukasi_pasien_gizi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('edukasi_pentingnya_nutrisi_gizi')->nullable();
            $table->string('edukasi_diet_gizi')->nullable();
            $table->string('edukasi_lain_lain_gizi')->nullable();
            $table->date('tgl_pentingnya_nutrisi_gizi')->nullable();
            $table->date('tgl_diet_gizi')->nullable();
            $table->date('tgl_lain_lain_gizi')->nullable();
            $table->string('tingkat_paham_pentingnya_nutrisi_gizi')->nullable();
            $table->string('tingkat_paham_diet_gizi')->nullable();
            $table->string('tingkat_paham_lain_lain_gizi')->nullable();
            $table->string('tingkat_paham_lain_lain_text_gizi')->nullable();
            $table->string('metode_edukasi_pentingnya_nutrisi_gizi')->nullable();
            $table->string('metode_edukasi_diet_gizi')->nullable();
            $table->string('metode_edukasi_lain_lain_gizi')->nullable();
            $table->text('ttd_sasaran')->nullable();
            $table->string('nama_sasaran')->nullable();
            $table->text('ttd_edukator')->nullable();
            $table->string('nama_edukator')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_edukasi_pasien_gizi');
    }
};
