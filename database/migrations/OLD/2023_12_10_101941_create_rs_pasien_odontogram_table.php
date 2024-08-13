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
        Schema::create('rs_pasien_odontogram', function (Blueprint $table) {
            $table->bigIncrements('podonto_id');
            $table->string('podonto_reg');
            $table->string('podonto_poli');
            $table->integer('podonto_dokter');
            $table->text('podonto_image');
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
        Schema::dropIfExists('rs_pasien_odontogram');
    }
};
