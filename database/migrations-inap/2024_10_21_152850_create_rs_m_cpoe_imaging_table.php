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
        Schema::create('rs_m_cpoe_imaging', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('kategori', 19)->nullable();
            $table->string('sub_kategori', 18)->nullable();
            $table->string('nama', 71)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_m_cpoe_imaging');
    }
};
