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
        Schema::create('rs_pasien_asper_nyeri', function (Blueprint $table) {
            $table->bigIncrements('nyeri_id');
            $table->string('nyeri_reg');
            $table->string('nyeri_status')->nullable();
            $table->string('nyeri_durasi_waktu')->nullable();
            $table->string('nyeri_penyebab')->nullable();
            $table->string('nyeri_deskripsi')->nullable();
            $table->string('nyeri_deskripsi_lain')->nullable();
            $table->string('nyeri_penyebab_b')->nullable();
            $table->string('nyeri_skala_ukur')->nullable();
            $table->string('nyeri_skala')->nullable();
            $table->string('nyeri_waktu')->nullable();
            $table->string('nyeri_frekuensi')->nullable();
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
        Schema::dropIfExists('rs_pasien_asper_nyeri');
    }
};
