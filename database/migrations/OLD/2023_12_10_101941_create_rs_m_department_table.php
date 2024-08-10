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
        Schema::create('rs_m_department', function (Blueprint $table) {
            $table->string('DepartmentCode');
            $table->string('DepartmentName')->nullable();
            $table->string('ShortName')->nullable();
            $table->string('Initial')->nullable();
            $table->string('DisplayOrder')->nullable();
            $table->string('IsHasRegistration')->nullable();
            $table->string('IsHasPrescription')->nullable();
            $table->string('IsGenerateMedicalNo')->nullable();
            $table->string('IsActive')->nullable();
            $table->string('IsDeleted')->nullable();
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
        Schema::dropIfExists('rs_m_department');
    }
};
