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
        Schema::create('fluid_balance_data_baru', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('cairan_transfusi', 200)->nullable();
            $table->integer('jumlah_cairan')->nullable();
            $table->string('minum', 200)->nullable();
            $table->string('sonde', 200)->nullable();
            $table->string('urine', 150)->nullable();
            $table->string('drain', 150)->nullable();
            $table->string('iwl_muntah', 100)->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('nama_perawat', 200)->nullable();
            $table->date('tanggal')->nullable();
            $table->time('jam')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->string('no_reg', 150);
            $table->string('med_rec', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fluid_balance_data_baru');
    }
};
