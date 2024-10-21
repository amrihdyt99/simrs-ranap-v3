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
        Schema::connection('mysql2')->create('m_poliklinik', function (Blueprint $table) {
            $table->bigIncrements('RoomID');
            $table->string('RoomCode')->nullable();
            $table->string('RoomName')->nullable();
            $table->string('IP')->nullable();
            $table->string('IsActive')->nullable();
            $table->string('IsUsed')->nullable();
            $table->string('IsDeleted')->nullable();
            $table->string('LastUpdatedBy')->nullable();
            $table->string('LastUpdatedDateTime')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('m_poliklinik');
    }
};
