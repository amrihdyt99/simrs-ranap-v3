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
        Schema::create('pengkajian_obgyn_skrining_gizi', function (Blueprint $table) {
            $table->bigIncrements('pengkajian_obgyn_id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('asupan_makan')->nullable();
            $table->string('gangguan_metabolisme')->nullable();
            $table->string('pertambahan_bb')->nullable();
            $table->string('nilai_hb')->nullable();
            $table->integer('total_skor_gizi_obgyn')->nullable();
            $table->string('kategori_gizi')->nullable();
            $table->string('diketahui_dietisien')->nullable();
            $table->time('waktu_diketahui')->nullable();
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
        Schema::dropIfExists('pengkajian_obgyn_skrining_gizi');
    }
};
