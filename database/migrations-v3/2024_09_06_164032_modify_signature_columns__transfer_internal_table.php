<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySignatureColumnsTransferInternalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transfer_internal', function (Blueprint $table) {
            $table->text('signature_doctor')->nullable();
            $table->text('signature_nurse')->nullable();
            $table->text('signature_doctor_2')->nullable();
            $table->text('signature_nurse_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transfer_internal', function (Blueprint $table) {
            $table->text('signature_doctor')->nullable();
            $table->text('signature_nurse')->nullable();
            $table->text('signature_doctor_2')->nullable();
            $table->text('signature_nurse_2')->nullable();
        });
    }
}