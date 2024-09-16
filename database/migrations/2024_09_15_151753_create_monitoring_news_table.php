<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoringNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoring_news', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('med_rec');
            $table->unsignedBigInteger('user_id');
            $table->integer('pernafasaan');
            $table->integer('saturasi_oksigen');
            $table->integer('o2_tambahan');
            $table->integer('suhu');
            $table->integer('tekanan_darah');
            $table->integer('nadi');
            $table->integer('tingkat_kesadaran');
            $table->integer('news_total');
            $table->string('news_kategori');
            $table->string('news_gula_darah');
            $table->string('news_analisa_gas_darah');
            $table->string('news_penilaian_tik');
            $table->string('tanggal_dan_waktu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitoring_news');
    }
}
