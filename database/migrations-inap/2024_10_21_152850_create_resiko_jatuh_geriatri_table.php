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
        Schema::create('resiko_jatuh_geriatri', function (Blueprint $table) {
            $table->bigIncrements('resiko_jatuh_geriatri_id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->unsignedBigInteger('user_id');
            $table->text('intervensi_resiko_jatuh_rendah');
            $table->text('intervensi_resiko_jatuh_sedang');
            $table->text('intervensi_resiko_jatuh_tinggi');
            $table->integer('resiko_jatuh_geriatri_gangguan_gaya_berjalan');
            $table->integer('resiko_jatuh_geriatri_pusing');
            $table->integer('resiko_jatuh_geriatri_kebingungan');
            $table->integer('resiko_jatuh_geriatri_nokturia');
            $table->integer('resiko_jatuh_geriatri_kebingungan_intermiten');
            $table->integer('resiko_jatuh_geriatri_kelemahan_umum');
            $table->integer('resiko_jatuh_geriatri_obat_beresiko_tinggi');
            $table->integer('resiko_jatuh_geriatri_riwayat_jatuh_12_bulan');
            $table->integer('resiko_jatuh_geriatri_osteoporosis');
            $table->integer('resiko_jatuh_geriatri_pendengaran_dan_pengeliatan');
            $table->integer('resiko_jatuh_geriatri_70_tahun_keatas');
            $table->integer('skor_total_geriatri');
            $table->string('kategori_geriatri');
            $table->string('shift');
            $table->string('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resiko_jatuh_geriatri');
    }
};
