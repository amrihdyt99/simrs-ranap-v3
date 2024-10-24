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
        Schema::create('skrining_nyeri_anak', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->tinyInteger('skala_wong_baker')->nullable();
            $table->tinyInteger('nyeri_skala')->nullable();
            $table->tinyInteger('merasa_nyeri')->nullable();
            $table->string('lokasi_nyeri')->nullable();
            $table->string('detail_skala_nyeri')->nullable();
            $table->string('durasi_nyeri', 30)->nullable();
            $table->string('frekuensi_nyeri', 30)->nullable();
            $table->string('pencetus_nyeri')->nullable();
            $table->string('tipe_nyeri')->nullable();
            $table->string('menjalar_ket')->nullable();
            $table->string('ekspresi_wajah', 30)->nullable();
            $table->tinyInteger('skala_flacc')->nullable();
            $table->tinyInteger('wajah')->nullable();
            $table->tinyInteger('ekstremitas')->nullable();
            $table->tinyInteger('gerakan')->nullable();
            $table->tinyInteger('menangis')->nullable();
            $table->tinyInteger('ketenangan')->nullable();
            $table->integer('total_skor_flacc')->nullable();
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
        Schema::dropIfExists('skrining_nyeri_anak');
    }
};
