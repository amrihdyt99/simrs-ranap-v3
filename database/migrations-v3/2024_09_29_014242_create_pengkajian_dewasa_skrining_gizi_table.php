<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengkajianDewasaSkriningGiziTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengkajian_dewasa_skrining_gizi', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('med_rec');
            $table->tinyInteger('penurunan_bb')->nullable();
            $table->tinyInteger('penurunan_bb_jumlah')->nullable();
            $table->tinyInteger('asupan_makan')->nullable();
            $table->tinyInteger('diagnosis_khusus')->nullable();
            $table->integer('total_skor_gizi')->nullable();
            $table->string('kategori_gizi')->nullable();
            $table->tinyInteger('diketahui_dietisien')->nullable();
            $table->time('diketahui_pukul')->nullable();
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
        Schema::dropIfExists('pengkajian_dewasa_skrining_gizi');
    }
}
