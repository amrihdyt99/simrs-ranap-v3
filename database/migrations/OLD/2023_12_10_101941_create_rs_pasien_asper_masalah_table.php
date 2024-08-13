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
        Schema::create('rs_pasien_asper_masalah', function (Blueprint $table) {
            $table->bigIncrements('pmasalah_id');
            $table->string('pmasalah_reg');
            $table->text('pmasalah_masalah')->nullable();
            $table->text('pmasalah_lain')->nullable();
            $table->text('pmasalah_perawat')->nullable();
            $table->timestamps();
            $table->string('pmasalah_medrec');
            $table->text('pintervensi_intervensi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_pasien_asper_masalah');
    }
};
