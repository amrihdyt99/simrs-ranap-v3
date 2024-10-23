<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsMParamedicTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('rs_m_paramedic_type', function (Blueprint $table) {
            $table->id('ParamedicTypeID');
            $table->string('ParamedicTypeCode')->nullable();
            $table->string('ParamedicTypeName')->nullable();
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
        Schema::dropIfExists('rs_m_paramedic_type');
    }
}
