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
        Schema::create('rs_edukasi_pasien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('reg_medrec');
            $table->string('bahasa')->nullable();
            $table->string('kebutuhan_penerjemah')->nullable();
            $table->string('pendidikan_pasien')->nullable();
            $table->string('baca_tulis')->nullable();
            $table->string('pilihan_tipe_belajar')->nullable();
            $table->string('hambatan_belajar')->nullable();
            $table->string('kebutuhan_belajar')->nullable();
            $table->string('kesediaan_pasien')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_edukasi_pasien');
    }
};
