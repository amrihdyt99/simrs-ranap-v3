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
        Schema::create('rs_pasien_soapdok', function (Blueprint $table) {
            $table->bigIncrements('soapdok_id');
            $table->string('soapdok_dokter', 10)->nullable();
            $table->string('soapdok_poli', 20)->nullable();
            $table->string('soapdok_reg')->nullable();
            $table->text('soapdok_subject')->nullable();
            $table->text('soapdok_object')->nullable();
            $table->text('soapdok_assesment')->nullable();
            $table->text('soapdok_planning')->nullable();
            $table->text('soapdok_instruksi');
            $table->date('soap_tanggal');
            $table->time('soap_waktu');
            $table->string('med_rec', 150);
            $table->integer('soapdok_deleted')->nullable();
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
        Schema::dropIfExists('rs_pasien_soapdok');
    }
};
