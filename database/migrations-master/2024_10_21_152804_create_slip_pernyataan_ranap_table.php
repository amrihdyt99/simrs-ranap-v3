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
        Schema::connection('mysql2')->create('slip_pernyataan_ranap', function (Blueprint $table) {
            $table->bigIncrements('slip_pernyataan_id');
            $table->string('reg_no')->nullable();
            $table->string('medrec')->nullable();
            $table->string('ttd_dokter')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('slip_pernyataan_ranap');
    }
};
