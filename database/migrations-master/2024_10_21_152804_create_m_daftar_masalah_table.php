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
        Schema::connection('mysql2')->create('m_daftar_masalah', function (Blueprint $table) {
            $table->string('masalah_kode', 50)->primary();
            $table->string('masalah_nama')->nullable();
            $table->string('masalah_layanan', 50)->nullable();
            $table->string('updated_by', 150)->nullable();
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
        Schema::connection('mysql2')->dropIfExists('m_daftar_masalah');
    }
};
