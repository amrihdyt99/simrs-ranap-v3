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
        Schema::create('rs_m_service_unit', function (Blueprint $table) {
            $table->string('ServiceUnitCode');
            $table->string('ServiceUnitName')->nullable();
            $table->string('ShortName')->nullable();
            $table->string('Initial')->nullable();
            $table->string('IconFileName')->nullable();
            $table->string('IsUsingJobOrder')->nullable();
            $table->string('PatientServiceInterval')->nullable();
            $table->string('IsBor')->nullable();
            $table->string('IsActive')->nullable();
            $table->string('IsDeleted')->nullable();
            $table->string('LastUpdatedBy')->nullable();
            $table->string('LastUpdatedDateTime')->nullable();
            $table->string('IsExecutive')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_m_service_unit');
    }
};
