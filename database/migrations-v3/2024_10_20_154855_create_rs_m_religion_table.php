<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsMReligionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('rs_m_religion', function (Blueprint $table) {
            $table->id('ReligionID');
            $table->string('ReligionCode')->nullable();
            $table->string('ReligionName')->nullable();
            $table->date('EffectiveDate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_m_religion');
    }
}
