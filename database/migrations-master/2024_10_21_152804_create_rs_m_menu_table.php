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
        Schema::connection('mysql2')->create('rs_m_menu', function (Blueprint $table) {
            $table->bigIncrements('menu_id');
            $table->string('menu_nama')->nullable();
            $table->string('menu_inisial')->nullable();
            $table->string('menu_poli')->nullable();
            $table->string('menu_akses')->nullable();
            $table->string('menu_active')->nullable();
            $table->string('menu_kode')->nullable();
            $table->integer('menu_urutan')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('rs_m_menu');
    }
};
