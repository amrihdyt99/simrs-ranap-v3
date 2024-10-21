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
            $table->string('transfer_unit_asal')->nullable();
            $table->string('transfer_unit_tujuan')->nullable();
            $table->string('class', 50)->nullable();
            $table->string('charge_class', 50)->nullable();
            $table->boolean('transfer_rawat_intensif')->nullable()->default(false);
            $table->string('transfer_unit_tujuan_petugas')->nullable();
            $table->dateTime('transfer_waktu_hubungi')->nullable();
            $table->string('transfer_kategori')->nullable();
            $table->string('transfer_alasan_masuk')->nullable();
            $table->string('transfer_diagnosis')->nullable();
            $table->string('transfer_temuan')->nullable();
            $table->string('transfer_alergi')->nullable();
            $table->text('transfer_alergi_text')->nullable();
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
            $table->string('transfer_alat_terpasang')->nullable();
            $table->text('transfer_data')->nullable();
            $table->tinyInteger('status_transfer')->default(0);
            $table->integer('transfer_deleted')->nullable();
            $table->timestamps();
            $table->string('kode_transfer_internal')->nullable();
            $table->string('medrec')->nullable();
            $table->string('ditransfer_oleh_user_id', 50)->nullable();
            $table->string('ditransfer_oleh_nama')->nullable();
            $table->dateTime('ditransfer_waktu')->nullable();
            $table->string('diterima_oleh_user_id', 50)->nullable();
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
            $table->text('transfer_dokumen_yang_disertakan')->nullable();
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
        Schema::dropIfExists('transfer_internal');
    }
};
