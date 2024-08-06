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
        Schema::connection('mysql2')->create('m_location', function (Blueprint $table) {
            $table->integer('LocationID');
            $table->string('SiteCode')->nullable();
            $table->string('LocationCode')->nullable();
            $table->string('LocationName')->nullable();
            $table->string('ShortName')->nullable();
            $table->string('Initial')->nullable();
            $table->string('PermissionCode')->nullable();
            $table->string('ParentID')->nullable();
            $table->string('Remarks')->nullable();
            $table->integer('IsAllowOverIssued')->nullable();
            $table->integer('IsNettable')->nullable();
            $table->integer('IsHoldForTransaction')->nullable();
            $table->integer('IsDisplayStock')->nullable();
            $table->integer('IsActive')->nullable();
            $table->integer('IsDeleted')->nullable();
            $table->string('LastUpdatedBy')->nullable();
            $table->string('LastUpdatedDateTime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql2')->dropIfExists('m_location');
    }
};
