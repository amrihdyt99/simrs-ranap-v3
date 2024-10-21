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
        Schema::create('monitoring_news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->unsignedBigInteger('user_id');
            $table->string('aktual_pernafasaan')->nullable();
            $table->string('aktual_saturasi_oksigen')->nullable();
            $table->integer('pernafasaan');
            $table->integer('saturasi_oksigen');
            $table->integer('o2_tambahan');
            $table->string('aktual_suhu')->nullable();
            $table->integer('suhu');
            $table->string('aktual_tekanan_darah')->nullable();
            $table->integer('tekanan_darah');
            $table->string('aktual_nadi')->nullable();
            $table->integer('nadi');
            $table->integer('tingkat_kesadaran');
            $table->integer('news_total');
            $table->string('news_kategori');
            $table->string('news_gula_darah');
            $table->string('news_analisa_gas_darah');
            $table->string('news_penilaian_tik');
            $table->string('tanggal_dan_waktu');
            $table->string('shift')->nullable();
            $table->dateTime('created_at')->nullable();
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
};
