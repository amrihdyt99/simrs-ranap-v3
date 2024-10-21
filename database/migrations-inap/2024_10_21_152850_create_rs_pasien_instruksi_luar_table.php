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
        Schema::create('rs_pasien_instruksi_luar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no')->nullable();
            $table->string('dokter_code')->nullable();
            $table->string('type')->nullable();
            $table->text('instruksi')->nullable();
            $table->integer('id_cppt')->nullable();
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
        Schema::dropIfExists('rs_pasien_instruksi_luar');
    }
};
