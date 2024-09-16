<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FinChangeMBedHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Drop m_bed_history at db ranap
        Schema::connection('mysql')->dropIfExists('m_bed_history');
        // create m_bed_history on db_master
        Schema::connection('mysql2')->create('m_bed_history', function (Blueprint $table) {
            $table->id();
            $table->string('RegNo', 50);
            $table->string('MedicalNo', 50);
            $table->string('HistoryRefCode');
            $table->string('TableRef');
            $table->unsignedBigInteger('FromServiceUnitID')->nullable();
            $table->unsignedBigInteger('FromBedID')->nullable();
            $table->unsignedBigInteger('ToUnitServceUnitID');
            $table->unsignedBigInteger('ToBedID');
            $table->date('RequestTransferDate');
            $table->time('RequestTransferTime');
            $table->date('ReceiveTransferDate');
            $table->time('ReceiveTransferTime');
            $table->string('Description', 100);
            $table->string('CreatedBy', 100);
            $table->string('RequestedBy', 100);
            $table->string('ReceivedBy', 100);
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
        //
    }
}
