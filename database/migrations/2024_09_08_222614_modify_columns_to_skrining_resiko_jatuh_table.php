<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsToSkriningResikoJatuhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skrining_resiko_jatuh', function (Blueprint $table) {
            $table->string('resiko_jatuh_bulan_terakhir')->nullable()->change();
            $table->string('resiko_jatuh_medis_sekunder')->nullable()->change();
            $table->string('resiko_jatuh_alat_bantu_jalan')->nullable()->change();
            $table->string('resiko_jatuh_infus')->nullable()->change();
            $table->string('resiko_jatuh_berjalan')->nullable()->change();
            $table->string('resiko_jatuh_mental')->nullable()->change();
            $table->string('resiko_jatuh_geriatri_gangguan_gaya_berjalan')->nullable()->change();
            $table->string('resiko_jatuh_geriatri_pusing')->nullable()->change();
            $table->string('resiko_jatuh_geriatri_kebingungan')->nullable()->change();
            $table->string('resiko_jatuh_geriatri_nokturia')->nullable()->change();
            $table->string('resiko_jatuh_geriatri_kebingungan_intermiten')->nullable()->change();
            $table->string('resiko_jatuh_geriatri_kelemahan_umum')->nullable()->change();
            $table->string('resiko_jatuh_geriatri_obat_beresiko_tinggi')->nullable()->change();
            $table->string('resiko_jatuh_geriatri_riwayat_jatuh_12_bulan')->nullable()->change();
            $table->string('resiko_jatuh_geriatri_osteoporosis')->nullable()->change();
            $table->string('resiko_jatuh_geriatri_pendengaran_dan_pengeliatan')->nullable()->change();
            $table->string('resiko_jatuh_geriatri_70_tahun_keatas')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skrining_resiko_jatuh', function (Blueprint $table) {
            //
        });
    }
}
