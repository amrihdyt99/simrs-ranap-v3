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
        Schema::table('transfer_internal', function (Blueprint $table) {
            $table->string('kode_transfer_internal')->nullable();
            $table->string('medrec')->nullable();

            $table->bigInteger('ditransfer_oleh_user_id')->nullable();
            $table->string('ditransfer_oleh_nama')->nullable();
            $table->dateTime('ditransfer_waktu')->nullable();

            $table->bigInteger('diterima_oleh_user_id')->nullable();
            $table->string('diterima_oleh_nama')->nullable();
            $table->dateTime('diterima_waktu')->nullable();

            $table->text('transfer_alat_terpasang')->nullable()->change();

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
};
