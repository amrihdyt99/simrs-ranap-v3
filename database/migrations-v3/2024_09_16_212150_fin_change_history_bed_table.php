<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FinChangeHistoryBedTable extends Migration
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
                'HistoryRefCode',
                'RequestTransferDate',
                'RequestTransferTime',
                'RequestedBy',
                'ReceivedBy',
            ]);
        });

        Schema::connection('mysql2')->table('m_bed_history', function (Blueprint $table) {
            $table->string('HistoryRefCode')->nullable();
            $table->date('RequestTransferDate')->nullable();
            $table->time('RequestTransferTime')->nullable();
            $table->string('RequestedBy', 100)->nullable();
            $table->string('ReceivedBy', 100)->nullable();
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
