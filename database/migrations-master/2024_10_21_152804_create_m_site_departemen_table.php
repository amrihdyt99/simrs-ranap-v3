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
        Schema::connection('mysql2')->create('m_site_departemen', function (Blueprint $table) {
            $table->bigIncrements('SiteDepartmentID');
            $table->string('SiteCode', 50);
            $table->string('DepartmentCode');
            $table->string('OfficerName')->nullable();
            $table->boolean('IsActive')->nullable();
            $table->boolean('IsDeleted')->default(false);
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
        Schema::connection('mysql2')->dropIfExists('m_site_departemen');
    }
};
