<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMServiceUnitRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //php artisan migrate --path=database\migrations\2023_10_31_235805_create_m_service_unit_room_table.php --database="mysql2"
        Schema::connection('mysql2')->create('m_service_unit_room', function (Blueprint $table) {
            $table->integer('RoomID');
            $table->integer('ServiceUnitID');
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
        Schema::dropIfExists('m_service_unit_room');
    }
}
