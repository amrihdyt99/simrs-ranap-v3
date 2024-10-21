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
        Schema::create('monitoring_evaluasi_gizi_dewasa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->date('tanggal')->nullable();
            $table->text('monitoring_evaluasi')->nullable();
            $table->text('terapi_diet')->nullable();
            $table->string('nama_dietisien')->nullable();
            $table->text('paraf_dietisien')->nullable();
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
        Schema::dropIfExists('monitoring_evaluasi_gizi_dewasa');
    }
};
