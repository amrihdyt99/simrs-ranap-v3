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
        Schema::create('skala_wong_baker', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no_reg', 150)->nullable();
            $table->string('med_rec', 150)->nullable();
            $table->string('onset', 150)->nullable();
            $table->string('provocating', 150)->nullable();
            $table->string('quality', 150)->nullable();
            $table->string('region', 150)->nullable();
            $table->string('saverity', 150)->nullable();
            $table->string('treatment', 150)->nullable();
            $table->string('understanding', 150)->nullable();
            $table->string('value', 150)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skala_wong_baker');
    }
};
