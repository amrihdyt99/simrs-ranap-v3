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
        Schema::connection('mysql2')->create('rs_m_mcu_pemeriksaan', function (Blueprint $table) {
            $table->bigIncrements('periksa_id');
            $table->string('periksa_nama')->nullable();
            $table->tinyInteger('periksa_deleted')->nullable();
            $table->integer('sket_user')->nullable();
            $table->string('periksa_nama_file')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('rs_m_mcu_pemeriksaan');
    }
};
