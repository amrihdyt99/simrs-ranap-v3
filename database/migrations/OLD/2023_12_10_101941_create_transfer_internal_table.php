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
        Schema::create('transfer_internal', function (Blueprint $table) {
            $table->bigIncrements('transfer_id');
            $table->string('transfer_reg');
            $table->string('transfer_unit_asal');
            $table->string('transfer_unit_tujuan');
            $table->string('transfer_unit_tujuan_petugas');
            $table->string('transfer_waktu_hubungi');
            $table->string('transfer_kategori');
            $table->string('transfer_alasan_masuk');
            $table->string('transfer_diagnosis');
            $table->string('transfer_temuan');
            $table->string('transfer_alergi');
            $table->string('transfer_kewaspaan');
            $table->string('transfer_gcs_e');
            $table->string('transfer_gcs_m');
            $table->string('transfer_gcs_v');
            $table->string('transfer_td');
            $table->string('transfer_N');
            $table->string('transfer_skala_nyeri');
            $table->string('transfer_suhu');
            $table->string('transfer_p');
            $table->string('transfer_spo2');
            $table->text('transfer_dokumen_yang_disertakan')->nullable();
            $table->string('transfer_alat_terpasang')->nullable();
            $table->text('transfer_data')->nullable();
            $table->integer('transfer_deleted')->nullable();
            $table->timestamps();
            $table->string('kode_transfer_internal')->nullable();
            $table->string('medrec')->nullable();
            $table->bigInteger('ditransfer_oleh_user_id')->nullable();
            $table->string('ditransfer_oleh_nama')->nullable();
            $table->dateTime('ditransfer_waktu')->nullable();
            $table->bigInteger('diterima_oleh_user_id')->nullable();
            $table->string('diterima_oleh_nama')->nullable();
            $table->dateTime('diterima_waktu')->nullable();
            $table->dateTime('transfer_terima_tanggal')->nullable();
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
        Schema::dropIfExists('transfer_internal');
    }
};
