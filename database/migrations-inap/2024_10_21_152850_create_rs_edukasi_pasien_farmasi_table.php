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
            $table->string('edukasi_obat_diberikan_farmasi')->nullable();
            $table->string('edukasi_efek_samping_farmasi')->nullable();
            $table->string('edukasi_interaksi_farmasi')->nullable();
            $table->string('edukasi_lain_lain_farmasi')->nullable();
            $table->date('tgl_obat_diberikan_farmasi')->nullable();
            $table->date('tgl_efek_samping_farmasi')->nullable();
            $table->date('tgl_interaksi_farmasi')->nullable();
            $table->date('tgl_lain_lain_farmasi')->nullable();
            $table->string('tingkat_paham_obat_diberikan_farmasi')->nullable();
            $table->string('tingkat_paham_efek_samping_farmasi')->nullable();
            $table->string('tingkat_paham_interaksi_farmasi')->nullable();
            $table->string('tingkat_paham_lain_lain_farmasi')->nullable();
            $table->string('tingkat_paham_lain_lain_text_farmasi')->nullable();
            $table->string('metode_edukasi_obat_diberikan_farmasi')->nullable();
            $table->string('metode_edukasi_efek_samping_farmasi')->nullable();
            $table->string('metode_edukasi_interaksi_farmasi')->nullable();
            $table->string('metode_edukasi_lain_lain_farmasi')->nullable();
            $table->text('ttd_sasaran')->nullable();
            $table->text('ttd_edukator')->nullable();
            $table->string('nama_sasaran')->nullable();
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
        Schema::dropIfExists('rs_edukasi_pasien_farmasi');
    }
};
