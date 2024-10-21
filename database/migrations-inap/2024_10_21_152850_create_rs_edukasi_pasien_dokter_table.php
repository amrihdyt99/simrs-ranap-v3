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
        Schema::create('rs_edukasi_pasien_dokter', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('edukasi_diagnosa_penyebab_dokter')->nullable();
            $table->string('edukasi_penatalaksanaan_dokter')->nullable();
            $table->string('edukasi_prosedur_diagnostik_dokter')->nullable();
            $table->string('edukasi_manajemen_nyeri_dokter')->nullable();
            $table->string('edukasi_lain_lain_dokter')->nullable();
            $table->date('tgl_diagnosa_penyebab_dokter')->nullable();
            $table->date('tgl_penatalaksanaan_dokter')->nullable();
            $table->date('tgl_prosedur_diagnostik_dokter')->nullable();
            $table->date('tgl_manajemen_nyeri_dokter')->nullable();
            $table->date('tgl_lain_lain_dokter')->nullable();
            $table->string('tingkat_paham_diagnosa_penyebab_dokter')->nullable();
            $table->string('tingkat_paham_penatalaksanaan_dokter')->nullable();
            $table->string('tingkat_paham_prosedur_diagnostik_dokter')->nullable();
            $table->string('tingkat_paham_manajemen_nyeri_dokter')->nullable();
            $table->string('tingkat_paham_lain_lain_dokter')->nullable();
            $table->string('tingkat_paham_lain_lain_text_dokter')->nullable();
            $table->string('metode_edukasi_diagnosa_penyebab_dokter')->nullable();
            $table->string('metode_edukasi_penatalaksanaan_dokter')->nullable();
            $table->string('metode_edukasi_prosedur_diagnostik_dokter')->nullable();
            $table->string('metode_edukasi_manajemen_nyeri_dokter')->nullable();
            $table->string('metode_edukasi_lain_lain_dokter')->nullable();
            $table->timestamps();
            $table->longText('ttd_dokter')->nullable();
            $table->longText('ttd_pasien')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_edukasi_pasien_dokter');
    }
};
