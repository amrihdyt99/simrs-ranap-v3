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
        Schema::create('rs_pasien_discharge', function (Blueprint $table) {
            $table->bigIncrements('pdischarge_id');
            $table->string('pdischarge_reg', 20)->nullable();
            $table->string('pdischarge_dokter', 150)->nullable();
            $table->date('pdischarge_tgl')->nullable();
            $table->time('pdischarge_jam')->nullable();
            $table->string('pdischarge_tgl_mati')->nullable();
            $table->string('pdischarge_jam_mati')->nullable();
            $table->string('pdischarge_condition')->nullable();
            $table->string('pdischarge_method')->nullable();
            $table->text('pdischarge_med_notes')->nullable();
            $table->text('pdischarge_notes')->nullable();
            $table->integer('pdischarge_deleted')->default(0);
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
        Schema::dropIfExists('rs_pasien_discharge');
    }
};
