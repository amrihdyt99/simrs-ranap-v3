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
        Schema::create('pengkajian_kulit', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no_reg', 150)->nullable();
            $table->string('med_rec', 150)->nullable();
            $table->string('skor_presepsi_sensori', 150)->nullable();
            $table->string('skor_kelembaban', 150)->nullable();
            $table->string('skor_aktivitas', 150)->nullable();
            $table->string('skor_mobilitas', 150)->nullable();
            $table->string('skor_nutrisi', 150)->nullable();
            $table->string('skor_friksi_gesekan', 150)->nullable();
            $table->text('gambar_dilingkar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengkajian_kulit');
    }
};
