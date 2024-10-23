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
        Schema::create('rs_m_specialty', function (Blueprint $table) {
            $table->string('SpecialtyCode')->primary();
            $table->string('SpecialtyName1')->nullable();
            $table->string('SpecialtyName2')->nullable();
            $table->string('GCSpecialtyGroup')->nullable();
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
        Schema::dropIfExists('rs_m_specialty');
    }
};
