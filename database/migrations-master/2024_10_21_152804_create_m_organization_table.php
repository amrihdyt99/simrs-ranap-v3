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
        Schema::connection('mysql2')->create('m_organization', function (Blueprint $table) {
            $table->string('OrganizationCode')->primary();
            $table->string('OrganizationName');
            $table->string('OrganizationHead')->nullable();
            $table->string('OrganizationLevel');
            $table->string('ParentOrganization')->nullable();
            $table->string('OrganizationPercentage')->nullable();
            $table->string('IsActive');
            $table->string('IsDeleted');
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
        Schema::connection('mysql2')->dropIfExists('m_organization');
    }
};
