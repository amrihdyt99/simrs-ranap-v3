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
        Schema::create('rs_m_kelas_kategori', function (Blueprint $table) {
            $table->string('ClassCategoryCode')->primary();
            $table->string('ClassCategoryName')->nullable();
            $table->integer('IsActive')->nullable();
            $table->integer('IsDeleted')->nullable();
            $table->string('Remarks')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_m_kelas_kategori');
    }
};
