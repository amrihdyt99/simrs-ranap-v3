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
        Schema::create('pengkajian_obgyn_skrining_status_fungsional', function (Blueprint $table) {
            $table->bigIncrements('pengkajian_obgyn_id');
            $table->string('reg_no');
            $table->string('med_rec');
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
            $table->string('nilai_aks')->nullable();
            $table->string('kategori_perawatan')->nullable();
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
        Schema::dropIfExists('pengkajian_obgyn_skrining_status_fungsional');
    }
};
