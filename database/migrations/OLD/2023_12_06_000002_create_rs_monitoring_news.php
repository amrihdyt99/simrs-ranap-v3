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
        Schema::create('rs_monitoring_news', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('med_rec');
            $table->date('news_tanggal');
            $table->integer('news_jam');
            $table->string('pernafasaan_3')->nullable();
            $table->string('pernafasaan_2')->nullable();
            $table->string('pernafasaan_1')->nullable();
            $table->string('pernafasaan_0')->nullable();
            $table->string('saturasi_3')->nullable();
            $table->string('saturasi_2')->nullable();
            $table->string('saturasi_1')->nullable();
            $table->string('saturasi_0')->nullable();
            $table->string('O2_tambahan_0')->nullable();
            $table->string('O2_tambahan_2')->nullable();
            $table->string('suhu_3')->nullable();
            $table->string('suhu_2')->nullable();
            $table->string('suhu_1')->nullable();
            $table->string('suhu_0')->nullable();
            $table->string('tekanan_darah_3')->nullable();
            $table->string('tekanan_darah_2')->nullable();
            $table->string('tekanan_darah_1')->nullable();
            $table->string('tekanan_darah_0')->nullable();
            $table->string('nadi_3')->nullable();
            $table->string('nadi_2')->nullable();
            $table->string('nadi_1')->nullable();
            $table->string('nadi_0')->nullable();
            $table->string('tingkat_kesadaran_3')->nullable();
            $table->string('tingkat_kesadaran_0')->nullable();
            $table->string('news_total')->nullable();
            $table->string('news_kategori')->nullable();
            $table->string('news_gula_darah')->nullable();
            $table->string('news_analisa_gas_darah')->nullable();
            $table->string('news_penilaian_tik')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_monitoring_news');
    }
};
