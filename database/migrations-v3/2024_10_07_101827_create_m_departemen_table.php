<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMDepartemenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('m_departemen', function (Blueprint $table) {
            $table->string('DepartmentCode', 20)->primary();
            $table->string('DepartmentName');
            $table->string('ShortName')->nullable();
            $table->string('Initial', 30)->nullable();
            $table->tinyInteger('DisplayOrder')->nullable();
            $table->tinyInteger('IsHasRegistration')->nullable();
            $table->tinyInteger('IsHasPrescription')->nullable();
            $table->tinyInteger('IsGenerateMedicalNo')->nullable();
            $table->boolean('IsActive')->nullable();
            $table->boolean('IsDeleted')->default(0);
            $table->string('LastUpdatedBy', 50)->nullable();
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
        Schema::dropIfExists('m_departemen');
    }
}
