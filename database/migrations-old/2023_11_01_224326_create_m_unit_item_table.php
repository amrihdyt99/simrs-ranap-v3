<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMUnitItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('m_unit_item', function (Blueprint $table) {
            $table->integer('ServiceUnitID');
            $table->integer('ItemID');
            $table->string('LastUpdatedBy', 255);
            $table->dateTime('LastUpdatedDateTime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_unit_item');
    }
}
