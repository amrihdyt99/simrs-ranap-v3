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
        Schema::connection('mysql2')->create('m_bed_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('RegNo', 50);
            $table->string('MedicalNo', 50);
            $table->string('HistoryRefCode')->nullable();
            $table->unsignedBigInteger('FromServiceUnitID')->nullable();
            $table->unsignedBigInteger('FromBedID')->nullable();
            $table->string('FromClassCode', 50)->nullable();
            $table->string('FromChargeClassCode', 50)->nullable();
            $table->unsignedBigInteger('ToUnitServiceID')->nullable();
            $table->unsignedBigInteger('ToBedID')->nullable();
            $table->string('ToClassCode', 50)->nullable();
            $table->string('ToChargeClassCode', 50)->nullable();
            $table->date('RequestTransferDate')->nullable();
            $table->time('RequestTransferTime')->nullable();
            $table->string('CreatedBy', 100);
            $table->string('RequestedBy', 100)->nullable();
            $table->string('ReceivedBy', 100)->nullable();
            $table->timestamps();
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
        Schema::connection('mysql2')->dropIfExists('m_bed_history');
    }
};
