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
        Schema::connection('mysql2')->create('rs_m_ppk', function (Blueprint $table) {
            $table->string('ppk_id')->primary();
            $table->string('ppk_nama')->nullable();
            $table->string('ppk_jenis')->nullable();
            $table->string('ppk_kabupaten')->nullable();
            $table->string('ppk_alamat')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('rs_m_ppk');
    }
};
