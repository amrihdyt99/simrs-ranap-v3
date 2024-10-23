<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosaGiziDewasaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosa_gizi_dewasa', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('masalah')->nullable();
            $table->string('berkaitan_dengan')->nullable();
            $table->string('ditandai_dengan')->nullable();
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
        Schema::dropIfExists('diagnosa_gizi_dewasa');
    }
}
