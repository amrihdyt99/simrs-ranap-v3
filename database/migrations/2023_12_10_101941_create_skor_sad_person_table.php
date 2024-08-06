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
        Schema::create('skor_sad_person', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no_reg', 150)->nullable();
            $table->string('med_rec', 150)->nullable();
            $table->string('sex', 150)->nullable();
            $table->string('age', 150)->nullable();
            $table->string('depresi', 150)->nullable();
            $table->string('previous_suicide', 150)->nullable();
            $table->string('excessive_alcohol', 150)->nullable();
            $table->string('rational_thingking_loss', 150)->nullable();
            $table->string('separated', 150)->nullable();
            $table->string('organized_plan', 150)->nullable();
            $table->string('no_social_support', 150)->nullable();
            $table->string('sickness', 150)->nullable();
            $table->string('skor_sad_person', 10)->nullable();
            $table->string('kategori', 10)->nullable();
            $table->string('riwayat_trauma', 150)->nullable();
            $table->string('hambatan_sosial_ekonomi', 150)->nullable();
            $table->string('pasien_butuh_konseling', 150)->nullable();
            $table->string('pasien_butuh_bantuan_ibadah', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skor_sad_person');
    }
};
