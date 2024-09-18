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
            $table->string('TableRef')->nullable()->change();
            $table->date('ReceiveTransferDate')->nullable()->change();
            $table->time('ReceiveTransferTime')->nullable()->change();
            $table->string('Description')->nullable()->change();
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
