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
        Schema::create('activity_daily_living_anak', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->tinyInteger('rangsang_bab')->nullable();
            $table->tinyInteger('rangsang_bak')->nullable();
            $table->tinyInteger('membersihkan_diri')->nullable();
            $table->tinyInteger('penggunaan_wc')->nullable();
            $table->tinyInteger('makan_minum')->nullable();
            $table->tinyInteger('bergerak_kursi_roda')->nullable();
            $table->tinyInteger('berjalan')->nullable();
            $table->tinyInteger('berpakaian')->nullable();
            $table->tinyInteger('tangga')->nullable();
            $table->tinyInteger('mandi')->nullable();
            $table->integer('total_skor_adl')->nullable();
            $table->string('created_by', 100)->nullable();
            $table->string('updated_by', 100)->nullable();
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
        Schema::dropIfExists('activity_daily_living_anak');
    }
};
