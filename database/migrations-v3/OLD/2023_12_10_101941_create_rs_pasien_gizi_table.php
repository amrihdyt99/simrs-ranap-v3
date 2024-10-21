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
        Schema::create('rs_pasien_gizi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('berat_badan');
            $table->string('tinggi_badan');
            $table->string('bbi');
            $table->string('imt');
            $table->string('tl');
            $table->string('lla');
            $table->string('lla1');
            $table->string('status_gizi');
            $table->string('biokimia');
            $table->string('fisik_klinik');
            $table->string('riwayat_gizi_dahulu');
            $table->string('riwayat_gizi_sekarang');
            $table->string('riwayat_penyakit_dahulu');
            $table->string('riwayat_penyakit_sekarang');
            $table->string('diet');
            $table->date('updated_at');
            $table->date('created_at');
            $table->string('med_rec', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_pasien_gizi');
    }
};
