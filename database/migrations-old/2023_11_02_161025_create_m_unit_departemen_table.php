<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMUnitDepartemenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('m_unit_departemen', function (Blueprint $table) {
            $table->integer('ServiceUnitID');
            $table->integer('SiteDepartmentID');
            $table->string('ServiceUnitCode', 255);
            $table->string('ContactPerson1', 255);
            $table->string('ContactPerson2', 255);
            $table->string('LocationID', 255);
            $table->string('GcDefaultOrderType', 255)->nullable();
            $table->integer('IsLockedLocation')->nullable();
            $table->integer('IsActive')->nullable();
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
        Schema::dropIfExists('m_unit_departemen');
    }
}
