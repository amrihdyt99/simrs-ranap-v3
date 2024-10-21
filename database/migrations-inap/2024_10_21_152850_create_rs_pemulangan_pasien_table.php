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
        Schema::create('rs_pemulangan_pasien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index('rs_pemulangan_pasien_user_id_foreign');
            $table->string('reg_no');
            $table->string('reg_medrec');
            $table->string('bantuan_dalam_aktifitas')->nullable()->default('0');
            $table->string('edukasi_gizi')->nullable()->default('0');
            $table->string('penanganan_nyeri_kronis')->nullable()->default('0');
            $table->string('pengelolaan_penyakit_secara_berkelanjutan')->nullable();
            $table->string('kebutuhan_lainnya')->nullable()->default('0');
            $table->date('tanggal')->nullable();
            $table->time('waktu')->nullable();
            $table->timestamps();
            $table->string('diagnosis_utama')->nullable();
            $table->string('diagnosis_sekunder')->nullable();
            $table->string('ppsb_tujuan')->nullable();
            $table->string('ppsb_tempat')->nullable();
            $table->string('kebutuhan_lainnya_check')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_pemulangan_pasien');
    }
};
