<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyMasterBedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->table('m_bed', function (Blueprint $table) {
            $table->dropColumn('service_unit_id');
            $table->dropColumn('SiteDepartmentID');
            $table->dropColumn('ServiceUnitCode');
            $table->dropColumn('ContactPerson1');
            $table->dropColumn('ContactPerson2');
            $table->dropColumn('LocationID');
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
