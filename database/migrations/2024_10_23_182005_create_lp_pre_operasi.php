<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLpPreOperasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lp_pre_operasi', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('reg_no')->nullable();
            $table->boolean('alergi')->nullable();
            $table->string('catatan_alergi')->nullable();
            $table->longText('pemeriksaan_fisik')->nullable();
            $table->longText('diagnosa_pre_operasi')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('lp_pre_operasi');
    }
}
