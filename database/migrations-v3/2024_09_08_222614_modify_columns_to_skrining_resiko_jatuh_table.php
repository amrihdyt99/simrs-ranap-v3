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
            $table->dropColumn([
                'resiko_jatuh_bulan_terakhir', 
                'resiko_jatuh_medis_sekunder', 
                'resiko_jatuh_alat_bantu_jalan', 
                'resiko_jatuh_infus', 
                'resiko_jatuh_berjalan', 
                'resiko_jatuh_mental', 
                'resiko_jatuh_geriatri_gangguan_gaya_berjalan', 
                'resiko_jatuh_geriatri_pusing', 
                'resiko_jatuh_geriatri_kebingungan', 
                'resiko_jatuh_geriatri_nokturia', 
                'resiko_jatuh_geriatri_kebingungan_intermiten', 
                'resiko_jatuh_geriatri_kelemahan_umum', 
                'resiko_jatuh_geriatri_obat_beresiko_tinggi', 
                'resiko_jatuh_geriatri_riwayat_jatuh_12_bulan', 
                'resiko_jatuh_geriatri_osteoporosis', 
                'resiko_jatuh_geriatri_pendengaran_dan_pengeliatan', 
                'resiko_jatuh_geriatri_70_tahun_keatas'
            ]);
        });

        Schema::table('skrining_resiko_jatuh', function (Blueprint $table) {
            $table->string('resiko_jatuh_bulan_terakhir')->nullable();
            $table->string('resiko_jatuh_medis_sekunder')->nullable();
            $table->string('resiko_jatuh_alat_bantu_jalan')->nullable();
            $table->string('resiko_jatuh_infus')->nullable();
            $table->string('resiko_jatuh_berjalan')->nullable();
            $table->string('resiko_jatuh_mental')->nullable();
            $table->string('resiko_jatuh_geriatri_gangguan_gaya_berjalan')->nullable();
            $table->string('resiko_jatuh_geriatri_pusing')->nullable();
            $table->string('resiko_jatuh_geriatri_kebingungan')->nullable();
            $table->string('resiko_jatuh_geriatri_nokturia')->nullable();
            $table->string('resiko_jatuh_geriatri_kebingungan_intermiten')->nullable();
            $table->string('resiko_jatuh_geriatri_kelemahan_umum')->nullable();
            $table->string('resiko_jatuh_geriatri_obat_beresiko_tinggi')->nullable();
            $table->string('resiko_jatuh_geriatri_riwayat_jatuh_12_bulan')->nullable();
            $table->string('resiko_jatuh_geriatri_osteoporosis')->nullable();
            $table->string('resiko_jatuh_geriatri_pendengaran_dan_pengeliatan')->nullable();
            $table->string('resiko_jatuh_geriatri_70_tahun_keatas')->nullable();
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
