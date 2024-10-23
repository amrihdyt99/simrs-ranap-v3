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
            $table->dropColumn([
                'transfer_unit_asal', 
                'transfer_unit_tujuan', 
                'transfer_unit_tujuan_petugas', 
                'transfer_waktu_hubungi', 
                'transfer_kategori', 
                'transfer_alasan_masuk', 
                'transfer_diagnosis', 
                'transfer_temuan', 
                'transfer_alergi', 
                'transfer_kewaspaan', 
                'transfer_gcs_e', 
                'transfer_gcs_m', 
                'transfer_gcs_v', 
                'transfer_td', 
                'transfer_N', 
                'transfer_skala_nyeri', 
                'transfer_suhu', 
                'transfer_p', 
                'transfer_spo2'
            ]);
        });

        Schema::table('transfer_internal', function (Blueprint $table) {
            $table->string('transfer_unit_asal')->nullable();
            $table->string('transfer_unit_tujuan')->nullable();
            $table->string('transfer_unit_tujuan_petugas')->nullable();
            $table->string('transfer_waktu_hubungi')->nullable();
            $table->string('transfer_kategori')->nullable();
            $table->string('transfer_alasan_masuk')->nullable();
            $table->string('transfer_diagnosis')->nullable();
            $table->string('transfer_temuan')->nullable();
            $table->string('transfer_alergi')->nullable();
            $table->string('transfer_kewaspaan')->nullable();
            $table->string('transfer_gcs_e')->nullable();
            $table->string('transfer_gcs_m')->nullable();
            $table->string('transfer_gcs_v')->nullable();
            $table->string('transfer_td')->nullable();
            $table->string('transfer_N')->nullable();
            $table->string('transfer_skala_nyeri')->nullable();
            $table->string('transfer_suhu')->nullable();
            $table->string('transfer_p')->nullable();
            $table->string('transfer_spo2')->nullable();
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
