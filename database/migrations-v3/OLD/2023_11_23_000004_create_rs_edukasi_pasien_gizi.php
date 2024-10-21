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
        Schema::create('rs_edukasi_pasien_gizi', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('edukasi_pentingnya_nutrisi')->nullable();
            $table->string('edukasi_diet')->nullable();
            $table->string('edukasi_lain_lain')->nullable();
            $table->date('tgl_pentingnya_nutrisi')->nullable();
            $table->date('tgl_diet')->nullable();
            $table->date('tgl_lain_lain')->nullable();
            $table->string('tingkat_paham_pentingnya_nutrisi')->nullable();
            $table->string('tingkat_paham_diet')->nullable();
            $table->string('tingkat_paham_lain_lain')->nullable();
            $table->string('tingkat_paham_lain_lain_text')->nullable();
            $table->string('metode_edukasi_pentingnya_nutrisi')->nullable();
            $table->string('metode_edukasi_diet')->nullable();
            $table->string('metode_edukasi_lain_lain')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_edukasi_pasien_gizi');
    }
};
