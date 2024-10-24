<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyMUnitDepartemenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->table('m_unit_departemen', function (Blueprint $table) {
            $table->dropColumn('ServiceUnitID');
            $table->dropColumn('SiteDepartmentID');
            $table->dropColumn('ServiceUnitCode');
            $table->dropColumn('ContactPerson1');
            $table->dropColumn('ContactPerson2');
            $table->dropColumn('LocationID');
        });

        Schema::connection('mysql2')->table('m_unit_departemen', function (Blueprint $table) {
            $table->id('ServiceUnitID');
            $table->unsignedBigInteger('SiteDepartmentID');
            $table->string('ServiceUnitCode');
            $table->string('ContactPerson1')->nullable();
            $table->string('ContactPerson2')->nullable();
            $table->unsignedBigInteger('LocationID')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
