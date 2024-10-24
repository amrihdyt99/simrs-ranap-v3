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
        Schema::create('rs_pasien_diagnosa', function (Blueprint $table) {
            $table->bigIncrements('pdiag_id');
            $table->string('pdiag_reg');
            $table->string('pdiag_diagnosa');
            $table->string('pdiag_dokter', 10);
            $table->integer('pdiag_deleted');
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
        Schema::dropIfExists('rs_pasien_diagnosa');
    }
};
