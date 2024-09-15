<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FinChangeColumnTransferInternalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transfer_internal', function (Blueprint $table) {
            $table->string('transfer_unit_asal')->nullable()->change();
            $table->string('transfer_unit_tujuan')->nullable()->change();
            $table->string('transfer_unit_tujuan_petugas')->nullable()->change();
            $table->string('transfer_waktu_hubungi')->nullable()->change();
            $table->string('transfer_kategori')->nullable()->change();
            $table->string('transfer_alasan_masuk')->nullable()->change();
            $table->string('transfer_diagnosis')->nullable()->change();
            $table->string('transfer_temuan')->nullable()->change();
            $table->string('transfer_alergi')->nullable()->change();
            $table->string('transfer_kewaspaan')->nullable()->change();
            $table->string('transfer_gcs_e')->nullable()->change();
            $table->string('transfer_gcs_m')->nullable()->change();
            $table->string('transfer_gcs_v')->nullable()->change();
            $table->string('transfer_td')->nullable()->change();
            $table->string('transfer_N')->nullable()->change();
            $table->string('transfer_skala_nyeri')->nullable()->change();
            $table->string('transfer_suhu')->nullable()->change();
            $table->string('transfer_p')->nullable()->change();
            $table->string('transfer_spo2')->nullable()->change();
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
