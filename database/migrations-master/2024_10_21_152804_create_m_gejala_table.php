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
        Schema::connection('mysql2')->create('m_gejala', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode', 50)->unique('kode_UNIQUE');
            $table->text('gejala');
            $table->timestamps();
            $table->string('username', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('m_gejala');
    }
};
