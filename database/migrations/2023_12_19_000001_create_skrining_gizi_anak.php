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
        Schema::create('skrining_gizi_anak', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('reg_medrec');
            $table->string('asper_kurus_anak')->nullable();
            $table->string('asper_penurunan_bb_anak')->nullable();
            $table->string('asper_kondisi_anak')->nullable();
            $table->string('asper_penyakit_anak')->nullable();
            $table->string('asper_skor_anak')->nullable();
            $table->text('asper_sebab_malnutrisi')->nullable();
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
        Schema::dropIfExists('rs_tindakan_medis_persetujuan');
    }
};
