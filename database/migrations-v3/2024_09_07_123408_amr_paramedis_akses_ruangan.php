<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AmrParamedisAksesRuangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('m_paramedis_ruangan', function (Blueprint $table) {
            $table->id();
            $table->string('ParamedicType')->nullable();
            $table->string('ParamedicCode')->nullable();
            $table->text('ParamedicAccessRoom')->nullable();
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
        //
    }
}
