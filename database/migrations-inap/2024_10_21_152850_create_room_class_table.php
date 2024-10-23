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
        Schema::create('room_class', function (Blueprint $table) {
            $table->string('ClassCode', 10)->primary();
            $table->string('ClassName', 100)->nullable();
            $table->string('ShortName', 35)->nullable();
            $table->string('Initial', 5)->nullable();
            $table->string('ClassCategoryCode', 10)->nullable();
            $table->string('GCClassRL', 20)->nullable();
            $table->tinyInteger('ClassLevel')->nullable();
            $table->boolean('IsAdministrationChargeByClass')->nullable();
            $table->decimal('MinAdministrationCharge', 18, 4)->nullable();
            $table->decimal('MaxAdministrationCharge', 18, 4)->nullable();
            $table->decimal('PercentageAdministrationCharge', 10)->nullable();
            $table->integer('PhysicianChargesItemID')->nullable();
            $table->decimal('DisplayPrice', 18, 4)->nullable();
            $table->string('PictureFileName', 500)->nullable();
            $table->integer('PatientPerRoomQty')->nullable();
            $table->boolean('IsHasAC')->nullable();
            $table->boolean('IsHasPrivateBathRoom')->nullable();
            $table->boolean('IsHasRefrigerator')->nullable();
            $table->boolean('IsHasTV')->nullable();
            $table->boolean('IsHasWifi')->nullable();
            $table->string('Remarks')->nullable();
            $table->boolean('IsActive')->nullable();
            $table->boolean('IsDeleted')->nullable();
            $table->string('LastUpdatedBy', 10)->nullable();
            $table->dateTime('LastUpdatedDateTime')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_class');
    }
};
