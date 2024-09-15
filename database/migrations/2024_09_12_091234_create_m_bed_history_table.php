<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMBedHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_bed_history', function (Blueprint $table) {
            $table->id();
            $table->string('HistoryRefCode');
            $table->string('MedicalNo', 30);
            $table->unsignedBigInteger('FromServiceUnitID')->nullable();
            $table->unsignedBigInteger('FromBedID')->nullable();
            $table->unsignedBigInteger('ToUnitServceUnitID');
            $table->unsignedBigInteger('ToBedID');
            $table->date('RequestTransferDate')->nullable();
            $table->time('RequestTransferTime')->nullable();
            $table->time('ReceiveTransferDate');
            $table->time('ReceiveTransferTime');
            $table->string('description', 100)->nullable();
            $table->string('CreatedBy', 100);
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
        Schema::dropIfExists('m_bed_history');
    }
}
