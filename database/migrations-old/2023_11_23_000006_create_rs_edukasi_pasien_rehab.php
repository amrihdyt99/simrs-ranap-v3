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
        Schema::create('rs_edukasi_pasien_rehab', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('edukasi_tehnik_rehabilitasi')->nullable();
            $table->string('edukasi_lain_lain')->nullable();
            $table->date('tgl_tehnik_rehabilitasi')->nullable();
            $table->date('tgl_lain_lain')->nullable();
            $table->string('tingkat_paham_tehnik_rehabilitasi')->nullable();
            $table->string('tingkat_paham_lain_lain')->nullable();
            $table->string('tingkat_paham_lain_lain_text')->nullable();
            $table->string('metode_edukasi_tehnik_rehabilitasi')->nullable();
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
        Schema::dropIfExists('rs_edukasi_pasien_rehab');
    }
};
