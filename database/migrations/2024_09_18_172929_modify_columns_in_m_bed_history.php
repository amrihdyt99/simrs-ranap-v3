<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsInMBedHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->table('m_bed_history', function (Blueprint $table) {
            $table->dropColumn([
                'TableRef',
                'ReceiveTransferDate',
                'ReceiveTransferTime',
                'Description',
            ]);
        });

        Schema::connection('mysql2')->table('m_bed_history', function (Blueprint $table) {
            $table->string('TableRef')->nullable();
            $table->date('ReceiveTransferDate')->nullable();
            $table->time('ReceiveTransferTime')->nullable();
            $table->string('Description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_bed_history', function (Blueprint $table) {
            //
        });
    }
}
