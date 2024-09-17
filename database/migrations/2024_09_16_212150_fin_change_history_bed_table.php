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
            $table->string('HistoryRefCode')->nullable()->change();
            $table->date('RequestTransferDate')->nullable()->change();
            $table->time('RequestTransferTime')->nullable()->change();
            $table->string('RequestedBy', 100)->nullable()->change();
            $table->string('ReceivedBy', 100)->nullable()->change();
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
