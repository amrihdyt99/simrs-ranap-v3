<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChargeClassAtHistoryBedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->table('m_bed_history', function (Blueprint $table) {
            // $table->dropColumn([
            //     'FromClassCode',
            //     'FromChargeClassCode',
            //     'ToClassCode',
            //     'ToChargeClassCode',
            // ]);
        });

        Schema::connection('mysql2')->table('m_bed_history', function (Blueprint $table) {
            $table->string('FromClassCode', 50)->nullable()->after('FromBedID');
            $table->string('FromChargeClassCode', 50)->nullable()->after('FromClassCode');
            $table->string('ToClassCode', 50)->nullable()->after('ToBedID');
            $table->string('ToChargeClassCode', 50)->nullable()->after('ToClassCode');
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
