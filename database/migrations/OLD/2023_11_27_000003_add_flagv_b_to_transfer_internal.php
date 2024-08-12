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
            $table->date('transfer_terima_tanggal')->nullable();
            $table->string('transfer_terima_kondisi')->nullable();
            $table->string('transfer_terima_gcs_e')->nullable();
            $table->string('transfer_terima_gcs_m')->nullable();
            $table->string('transfer_terima_gcs_v')->nullable();
            $table->string('transfer_terima_td')->nullable();
            $table->string('transfer_terima_n')->nullable();
            $table->string('transfer_terima_suhu')->nullable();
            $table->string('transfer_terima_p')->nullable();
            $table->string('transfer_terima_lab')->nullable();
            $table->string('transfer_terima_xray')->nullable();
            $table->string('transfer_terima_mri')->nullable();
            $table->string('transfer_terima_ct_scan')->nullable();
            $table->string('transfer_terima_ekg')->nullable();
            $table->string('transfer_terima_echo')->nullable();

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
