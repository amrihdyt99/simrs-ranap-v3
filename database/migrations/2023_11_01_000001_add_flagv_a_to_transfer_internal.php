<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFlagvAToTransferInternal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transfer_internal', function (Blueprint $table) {

            $table->string('transfer_unit_asal')->nullable();
            $table->string('transfer_unit_tujuan')->nullable();
            $table->string('transfer_unit_tujuan_petugas')->nullable();
            $table->string('transfer_waktu_hubungi')->nullable();
            $table->string('transfer_kategori')->nullable();

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
