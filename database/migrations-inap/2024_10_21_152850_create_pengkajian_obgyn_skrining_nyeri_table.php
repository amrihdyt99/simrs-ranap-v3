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
        Schema::create('pengkajian_obgyn_skrining_nyeri', function (Blueprint $table) {
            $table->bigIncrements('pengkajian_obgyn_id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->integer('nyeri_skala')->nullable();
            $table->string('onset')->nullable();
            $table->string('pencetus_nyeri')->nullable();
            $table->text('tipe_nyeri')->nullable();
            $table->string('menjalar')->nullable();
            $table->string('skala_nyeri')->nullable();
            $table->string('treatment')->nullable();
            $table->string('understanding')->nullable();
            $table->string('value')->nullable();
            $table->integer('ekspresi_wajah')->nullable();
            $table->integer('ekstremitas_atas')->nullable();
            $table->integer('compliance_ventilator')->nullable();
            $table->integer('skor_total_bps')->nullable();
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
        Schema::dropIfExists('pengkajian_obgyn_skrining_nyeri');
    }
};