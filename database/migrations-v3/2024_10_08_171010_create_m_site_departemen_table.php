<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSiteDepartemenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('m_site_departemen', function (Blueprint $table) {
            $table->id('SiteDepartmentID');
            $table->string('SiteCode', 50);
            $table->string('DepartmentCode');
            $table->string('OfficerName')->nullable();
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
        Schema::dropIfExists('m_site_departemen');
    }
}
