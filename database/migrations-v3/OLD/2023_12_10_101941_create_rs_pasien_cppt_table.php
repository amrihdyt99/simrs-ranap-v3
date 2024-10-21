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
        Schema::create('rs_pasien_cppt', function (Blueprint $table) {
            $table->bigIncrements('soapdok_id');
            $table->string('soapdok_dokter')->nullable();
            $table->string('nama_ppa', 500);
            $table->string('soapdok_poli')->nullable();
            $table->string('soapdok_reg')->nullable();
            $table->text('soapdok_subject')->nullable();
            $table->text('soapdok_object')->nullable();
            $table->text('soapdok_assesment')->nullable();
            $table->text('soapdok_planning')->nullable();
            $table->text('soapdok_instruksi')->nullable();
            $table->date('soap_tanggal')->nullable();
            $table->time('soap_waktu')->nullable();
            $table->string('med_rec', 150);
            $table->integer('soapdok_deleted')->nullable();
            $table->string('status_review')->comment('0=baru kirim;1=diterima;2=ditolak');
            $table->timestamps();
            $table->date('tanggal_verifikasi')->nullable();
            $table->string('nama_verifikasi', 150)->nullable();
            $table->string('is_dokter', 10)->nullable();
            $table->string('soapdok_bed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_pasien_cppt');
    }
};
