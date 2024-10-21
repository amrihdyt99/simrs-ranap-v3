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
        Schema::create('rs_pasien_asper', function (Blueprint $table) {
            $table->bigIncrements('asper_id');
            $table->string('asper_reg')->nullable();
            $table->string('asper_kesadaran')->nullable();
            $table->string('asper_kondisi_umum')->nullable();
            $table->string('asper_kondisi_umum_lain')->nullable();
            $table->string('asper_tekanan_darah')->nullable();
            $table->string('asper_nadi')->nullable();
            $table->string('asper_suhu')->nullable();
            $table->string('asper_pernapasan')->nullable();
            $table->string('asper_tinggi_bdn')->nullable();
            $table->string('asper_berat_bdn')->nullable();
            $table->string('asper_kbthn_khusus')->nullable();
            $table->string('asper_kbthn_khusus_lain')->nullable();
            $table->string('asper_riwayat_alergi')->nullable();
            $table->string('asper_riwayat_alergi_lain')->nullable();
            $table->string('asper_brjln_seimbang')->nullable();
            $table->string('asper_altban_duduk')->nullable();
            $table->string('asper_hasil')->nullable();
            $table->string('asper_keluhan_nutrisi')->nullable();
            $table->string('asper_keluhan_nutrisi_lain')->nullable();
            $table->string('asper_haus_berlebih')->nullable();
            $table->string('asper_mukosa_mulut')->nullable();
            $table->string('asper_turgor_kulit')->nullable();
            $table->string('asper_edema')->nullable();
            $table->string('asper_status_emosi')->nullable();
            $table->string('asper_status_emosi_lain')->nullable();
            $table->string('asper_kondisi_umum_b')->nullable();
            $table->string('asper_hambatan_ekonomi')->nullable();
            $table->string('asper_hambatan_ekonomi_lain')->nullable();
            $table->integer('asper_deleted')->default(0);
            $table->integer('asper_perawat')->nullable();
            $table->string('asper_poli', 20)->nullable();
            $table->timestamps();
            $table->string('asper_masalah')->nullable();
            $table->string('asper_intervensi_kolaborasi')->nullable();
            $table->string('asper_intervensi_observasi')->nullable();
            $table->string('asper_intervensi_teraupetik')->nullable();
            $table->string('asper_intervensi_edukasi')->nullable();
            $table->string('asper_penurunan_bb_dewasa')->nullable();
            $table->string('asper_penurunan_nafsu_dewasa')->nullable();
            $table->string('asper_skor_dewasa')->nullable();
            $table->string('asper_kategori_dewasa')->nullable();
            $table->string('asper_kurus_anak')->nullable();
            $table->string('asper_penurunan_bb_anak')->nullable();
            $table->string('asper_kondisi_anak')->nullable();
            $table->string('asper_penyakit_anak')->nullable();
            $table->string('asper_skor_anak')->nullable();
            $table->string('asper_sebab_malnutrisi')->nullable();
            $table->string('asper_sebab_malnutrisi_lain')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_pasien_asper');
    }
};
