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
        Schema::create('rs_pasien_asdok', function (Blueprint $table) {
            $table->bigIncrements('asdok_id');
            $table->string('asdok_reg')->nullable();
            $table->string('asdok_amnesis')->nullable();
            $table->string('asdok_amnesis_lain')->nullable();
            $table->string('asdok_keluhan_utama')->nullable();
            $table->string('asdok_penyakit_sekarang')->nullable();
            $table->string('asdok_penyakit_dahulu')->nullable();
            $table->string('asdok_penyakit_dahulu_ket')->nullable();
            $table->string('asdok_pengobatan')->nullable();
            $table->string('asdok_pengobatan_ket')->nullable();
            $table->string('asdok_implant')->nullable();
            $table->string('asdok_implant_lain')->nullable();
            $table->string('asdok_penyakit_dlm_klrg')->nullable();
            $table->string('asdok_penyakit_dlm_klrg_ket')->nullable();
            $table->string('asdok_penyakit_multiorgan')->nullable();
            $table->string('asdok_diagnosis_medik')->nullable();
            $table->string('asdok_instruksi_awal')->nullable();
            $table->string('asdok_kontrol_ulang')->nullable();
            $table->string('asdok_kontrol_ulang_tgl')->nullable();
            $table->string('asdok_rawat_inap')->nullable();
            $table->string('asdok_rawat_inap_ket')->nullable();
            $table->integer('asdok_dokter');
            $table->string('asdok_poli', 20)->nullable();
            $table->integer('asdok_deleted');
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
        Schema::dropIfExists('rs_pasien_asdok');
    }
};
