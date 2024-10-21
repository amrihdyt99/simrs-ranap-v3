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
        Schema::create('pengkajian_dewasa_adl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no')->nullable();
            $table->string('med_rec')->nullable();
            $table->integer('bab')->nullable();
            $table->integer('bak')->nullable();
            $table->integer('membersihkan_diri')->nullable();
            $table->integer('wc')->nullable();
            $table->integer('makan_minum')->nullable();
            $table->integer('bergerak')->nullable();
            $table->integer('berjalan')->nullable();
            $table->integer('berpakaian')->nullable();
            $table->integer('tangga')->nullable();
            $table->integer('mandi')->nullable();
            $table->integer('total_skor_adl')->nullable();
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
        Schema::dropIfExists('pengkajian_dewasa_adl');
    }
};
