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
        Schema::create('rs_pasien_responsetime', function (Blueprint $table) {
            $table->bigIncrements('response_id');
            $table->string('response_reg');
            $table->integer('response_user');
            $table->string('response_poli', 11);
            $table->integer('response_konsultasi')->default(0);
            $table->time('response_jam_datang');
            $table->time('response_jam_layanan')->nullable();
            $table->time('response_jam_selesai')->nullable();
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
        Schema::dropIfExists('rs_pasien_responsetime');
    }
};
