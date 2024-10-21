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
        Schema::connection('mysql2')->create('m_dtd', function (Blueprint $table) {
            $table->string('DTDNo', 100)->primary();
            $table->string('DTDName')->nullable();
            $table->string('DTDLabel')->nullable();
            $table->tinyInteger('IsActive')->nullable();
            $table->tinyInteger('IsDeleted')->default(0);
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
        Schema::connection('mysql2')->dropIfExists('m_dtd');
    }
};
