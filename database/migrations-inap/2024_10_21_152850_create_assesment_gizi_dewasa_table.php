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
        Schema::create('assesment_gizi_dewasa', function (Blueprint $table) {
            $table->bigIncrements('dewasa_id');
            $table->string('dewasa_reg')->nullable();
            $table->string('dewasa_bb')->nullable();
            $table->string('dewasa_tl')->nullable();
            $table->string('dewasa_lla')->nullable();
            $table->string('dewasa_tb')->nullable();
            $table->string('dewasa_imt')->nullable();
            $table->string('dewasa_lla_lainnya')->nullable();
            $table->string('dewasa_biokimia')->nullable();
            $table->string('dewasa_fisik')->nullable();
            $table->text('dewasa_riwayat_dahulu')->nullable();
            $table->text('dewasa_riwayat_sekarang')->nullable();
            $table->string('dewasa_panenteral')->nullable();
            $table->string('dewasa_panenteral_lainnya')->nullable();
            $table->text('dewasa_sekarang_lainnya')->nullable();
            $table->string('dewasa_lain_lain')->nullable();
            $table->text('dewasa_penyakit_dahulu')->nullable();
            $table->string('dewasa_penyakit_dahulu_lainnya')->nullable();
            $table->string('dewasa_penyakit_sekarang')->nullable();
            $table->string('dewasa_diet')->nullable();
            $table->string('dewasa_diet_preskripsi')->nullable();
            $table->text('dewasa_tindak_lanjut')->nullable();
            $table->text('dewasa_user')->nullable();
            $table->timestamps();
            $table->string('bbi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assesment_gizi_dewasa');
    }
};