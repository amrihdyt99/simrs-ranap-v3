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
        Schema::connection('mysql2')->create('m_unit_departemen', function (Blueprint $table) {
            $table->string('GcDefaultOrderType')->nullable();
            $table->integer('IsLockedLocation')->nullable();
            $table->integer('IsActive')->nullable();
            $table->string('LastUpdatedBy');
            $table->dateTime('LastUpdatedDateTime');
            $table->bigIncrements('ServiceUnitID');
            $table->unsignedBigInteger('SiteDepartmentID');
            $table->string('ServiceUnitCode');
            $table->string('ContactPerson1')->nullable();
            $table->string('ContactPerson2')->nullable();
            $table->unsignedBigInteger('LocationID')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('m_unit_departemen');
    }
};
