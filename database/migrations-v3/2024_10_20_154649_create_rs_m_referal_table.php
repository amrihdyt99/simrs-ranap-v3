<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsMReferalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('rs_m_referal', function (Blueprint $table) {
            $table->id('ReferralTypeID');
            $table->string('ReferralTypeCode')->nullable();
            $table->string('ReferralTypeName')->nullable();
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
        Schema::dropIfExists('rs_m_referal');
    }
}
