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
        Schema::create('rs_edukasi_pasien_farmasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('edukasi_obat_diberikan')->nullable();
            $table->string('edukasi_efek_samping')->nullable();
            $table->string('edukasi_interaksi')->nullable();
            $table->string('edukasi_lain_lain')->nullable();
            $table->date('tgl_obat_diberikan')->nullable();
            $table->date('tgl_efek_samping')->nullable();
            $table->date('tgl_interaksi')->nullable();
            $table->date('tgl_lain_lain')->nullable();
            $table->string('tingkat_paham_obat_diberikan')->nullable();
            $table->string('tingkat_paham_efek_samping')->nullable();
            $table->string('tingkat_paham_interaksi')->nullable();
            $table->string('tingkat_paham_lain_lain')->nullable();
            $table->string('tingkat_paham_lain_lain_text')->nullable();
            $table->string('metode_edukasi_obat_diberikan')->nullable();
            $table->string('metode_edukasi_efek_samping')->nullable();
            $table->string('metode_edukasi_interaksi')->nullable();
            $table->string('metode_edukasi_lain_lain')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_edukasi_pasien_farmasi');
    }
};
