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
        Schema::create('rs_pasien_asper_intervensi', function (Blueprint $table) {
            $table->bigIncrements('pintervensi_id');
            $table->string('pintervensi_reg');
            $table->integer('pintervensi_intervensi')->nullable();
            $table->text('pintervensi_lain')->nullable();
            $table->integer('pintervensi_perawat')->nullable();
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
        Schema::dropIfExists('rs_pasien_asper_intervensi');
    }
};
