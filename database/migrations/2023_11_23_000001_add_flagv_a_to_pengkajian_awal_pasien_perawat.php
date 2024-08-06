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
        Schema::table('pengkajian_awal_pasien_perawat', function (Blueprint $table) {

            $table->string('nyeri_status')->nullable();
            $table->string('nyeri_durasi_waktu')->nullable();
            $table->string('nyeri_penyebab')->nullable();
            $table->string('nyeri_deskripsi')->nullable();
            $table->string('nyeri_deskripsi_lain')->nullable();
            $table->string('lokasi_penjalaran')->nullable();
            $table->string('nyeri_skala_ukur')->nullable();
            $table->string('nyeri_skala')->nullable();
            $table->string('nyeri_waktu')->nullable();
            $table->string('nyeri_frekuensi')->nullable();
            $table->string('asper_brjln_seimbang')->nullable();
            $table->string('asper_altban_duduk')->nullable();
            $table->string('asper_hasil')->nullable();
            $table->string('asper_keluhan_nutrisi')->nullable();
            $table->string('asper_keluhan_nutrisi_lain')->nullable();
            $table->string('asper_haus_berlebih')->nullable();
            $table->string('asper_mukosa_mulut')->nullable();
            $table->string('asper_turgor_kulit')->nullable();
            $table->string('asper_edema')->nullable();
            $table->string('asper_diagnosa_kprwtn_text')->nullable();
            $table->string('asper_diagnosa_kprwtn')->nullable();
            $table->string('kebutuhan_konseling_spiritual_lain')->nullable();
            $table->string('bantuan_menjalankan_ibadah_lain')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
