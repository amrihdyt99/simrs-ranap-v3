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
        Schema::create('rs_rujukan_serah_terima', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('kode_surat_rujukan')->nullable();
            $table->date('rujukan_terima_tanggal')->nullable();
            $table->time('rujukan_terima_jam')->nullable();
            $table->string('rujukan_terima_kondisi')->nullable();
            $table->string('rujukan_terima_gcs_e')->nullable();
            $table->string('rujukan_terima_gcs_m')->nullable();
            $table->string('rujukan_terima_gcs_v')->nullable();
            $table->string('rujukan_terima_td')->nullable();
            $table->string('rujukan_terima_n')->nullable();
            $table->string('rujukan_terima_suhu')->nullable();
            $table->string('rujukan_terima_p')->nullable();
            $table->string('rujukan_terima_sp02')->nullable();
            $table->string('rujukan_terima_skala_nyeri')->nullable();
            $table->string('rujukan_terima_lab')->nullable();
            $table->string('rujukan_terima_xray')->nullable();
            $table->string('rujukan_terima_mri')->nullable();
            $table->string('rujukan_terima_ct_scan')->nullable();
            $table->string('rujukan_terima_ekg')->nullable();
            $table->string('rujukan_terima_echo')->nullable();
            $table->bigInteger('diserahkan_oleh_user_id')->nullable();
            $table->string('diserahkan_oleh_nama')->nullable();
            $table->dateTime('diserahkan_waktu')->nullable();
            $table->bigInteger('diterima_oleh_user_id')->nullable();
            $table->string('diterima_oleh_nama')->nullable();
            $table->dateTime('diterima_waktu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_rujukan_serah_terima');
    }
};
