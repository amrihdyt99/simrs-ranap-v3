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
        Schema::connection('mysql2')->create('rs_m_infectious_desease', function (Blueprint $table) {
            $table->string('InfectiousDiseaseCode')->primary();
            $table->string('InfectiousDiseaseName')->nullable();
            $table->string('CausativeAgent')->nullable();
            $table->string('InfectiousDiseaseLabel')->nullable();
            $table->string('GCInfectiousDiseaseType')->nullable();
            $table->string('GCInfectiousDiseaseCategory')->nullable();
            $table->tinyInteger('IsActive')->nullable();
            $table->tinyInteger('IsDeleted')->nullable();
            $table->string('LastUpdatedBy')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('rs_m_infectious_desease');
    }
};
