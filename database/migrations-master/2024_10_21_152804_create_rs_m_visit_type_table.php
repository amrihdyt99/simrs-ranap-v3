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
        Schema::connection('mysql2')->create('rs_m_visit_type', function (Blueprint $table) {
            $table->string('VisitTypeCode')->primary();
            $table->string('VisitTypeName')->nullable();
            $table->string('Remarks')->nullable();
            $table->string('DefaultVisitDuration')->nullable();
            $table->tinyInteger('IsActive')->nullable();
            $table->tinyInteger('IsDeleted')->nullable();
            $table->unsignedBigInteger('LastUpdatedBy')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('rs_m_visit_type');
    }
};
