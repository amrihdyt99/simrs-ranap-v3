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
        Schema::create('skrining_gizi_anak', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->tinyInteger('tampak_kurus')->nullable();
            $table->tinyInteger('penurunan_bb')->nullable();
            $table->tinyInteger('kondisi_anak')->nullable();
            $table->tinyInteger('resiko_malnutrisi')->nullable();
            $table->integer('skor_gizi_anak')->nullable();
            $table->string('kategori_gizi', 5)->nullable();
            $table->tinyInteger('diketahui_dietisien')->nullable();
            $table->time('diketahui_pukul')->nullable();
            $table->text('sebab_malnutrisi')->nullable();
            $table->string('sebab_malnutrisi_lain')->nullable();
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
        Schema::dropIfExists('skrining_gizi_anak');
    }
};
