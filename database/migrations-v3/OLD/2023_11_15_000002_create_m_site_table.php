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
        Schema::connection('mysql2')->create('m_site', function (Blueprint $table) {
            $table->string('SiteCode');
            $table->string('SiteName')->nullable();
            $table->string('ShortName')->nullable();
            $table->string('Initial')->nullable();
            $table->string('TaxRegistrantNo')->nullable();
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
        Schema::dropIfExists('m_site');
    }
};
