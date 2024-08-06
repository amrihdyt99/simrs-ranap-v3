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
        Schema::connection('mysql2')->create('m_service_unit_room', function (Blueprint $table) {
            $table->integer('RoomID');
            $table->integer('ServiceUnitID');
            $table->string('LastUpdatedBy');
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
        Schema::connection('mysql2')->dropIfExists('m_service_unit_room');
    }
};
