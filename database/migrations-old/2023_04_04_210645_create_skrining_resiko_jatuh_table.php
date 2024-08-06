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
        Schema::create('skrining_resiko_jatuh', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_medrec');
            $table->string('reg_no');
            $table->string('resiko_jatuh_bulan_terakhir');
            $table->string('resiko_jatuh_medis_sekunder');
            $table->string('resiko_jatuh_alat_bantu_jalan');
            $table->string('resiko_jatuh_infus');
            $table->string('resiko_jatuh_berjalan');
            $table->string('resiko_jatuh_mental');
            $table->string('resiko_jatuh_geriatri_gangguan_gaya_berjalan');
            $table->string('resiko_jatuh_geriatri_pusing');
            $table->string('resiko_jatuh_geriatri_kebingungan');
            $table->string('resiko_jatuh_geriatri_nokturia');
            $table->string('resiko_jatuh_geriatri_kebingungan_intermiten');
            $table->string('resiko_jatuh_geriatri_kelemahan_umum');
            $table->string('resiko_jatuh_geriatri_obat_beresiko_tinggi');
            $table->string('resiko_jatuh_geriatri_riwayat_jatuh_12_bulan');
            $table->string('resiko_jatuh_geriatri_osteoporosis');
            $table->string('resiko_jatuh_geriatri_pendengaran_dan_pengeliatan');
            $table->string('resiko_jatuh_geriatri_70_tahun_keatas');
            $table->enum('kode_input', ['IA', 'CC', 'WT', 'PF'])->nullable();
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
        Schema::dropIfExists('skrining_resiko_jatuh');
    }
};
