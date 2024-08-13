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
        Schema::create('pengkajian_kebutuhan_nutrisi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no_reg', 150)->nullable();
            $table->string('med_rec', 150)->nullable();
            $table->string('keluhan', 150)->nullable();
            $table->string('rasa_haus_berlebihan', 150)->nullable();
            $table->string('mukosa_mulut', 150)->nullable();
            $table->string('turgor_kulit', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengkajian_kebutuhan_nutrisi');
    }
};
