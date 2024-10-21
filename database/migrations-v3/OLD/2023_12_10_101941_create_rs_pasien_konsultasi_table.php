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
        Schema::create('rs_pasien_konsultasi', function (Blueprint $table) {
            $table->bigIncrements('pkonsultasi_id');
            $table->string('pkonsultasi_reg');
            $table->integer('pkonsultasi_dokter_kirim');
            $table->string('pkonsultasi_dokter_tujuan')->nullable();
            $table->string('pkonsultasi_poli_tujuan', 20)->nullable();
            $table->text('pkonsultasi_request');
            $table->text('pkonsultasi_response')->nullable();
            $table->integer('pkonsultasi_delete')->nullable()->default(0);
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
        Schema::dropIfExists('rs_pasien_konsultasi');
    }
};
