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
        Schema::create('pengkajian_kebutuhan_eliminasi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no_reg', 150)->nullable();
            $table->string('med_rec', 150)->nullable();
            $table->string('frekuensi_bab', 150)->nullable();
            $table->string('keluhan_bab', 150)->nullable();
            $table->string('karakteristik_faces', 150)->nullable();
            $table->string('frekuensi_bak', 150)->nullable();
            $table->string('keluhan_bak', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengkajian_kebutuhan_eliminasi');
    }
};
