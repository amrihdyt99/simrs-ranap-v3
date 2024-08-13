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
        Schema::create('rs_pasien_prosedur', function (Blueprint $table) {
            $table->bigIncrements('pprosedur_id');
            $table->string('pprosedur_reg');
            $table->string('pprosedur_prosedur');
            $table->string('pprosedur_dokter', 10);
            $table->integer('pprosedur_deleted');
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
        Schema::dropIfExists('rs_pasien_prosedur');
    }
};
