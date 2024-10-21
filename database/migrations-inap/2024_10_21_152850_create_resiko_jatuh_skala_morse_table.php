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
        Schema::create('resiko_jatuh_skala_morse', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->unsignedBigInteger('user_id');
            $table->integer('resiko_jatuh_morse_bulan_terakhir');
            $table->integer('resiko_jatuh_morse_medis_sekunder');
            $table->integer('resiko_jatuh_morse_alat_bantu_jalan');
            $table->integer('resiko_jatuh_morse_infus');
            $table->integer('resiko_jatuh_morse_berjalan');
            $table->integer('resiko_jatuh_morse_mental');
            $table->integer('resiko_jatuh_morse_total_skor');
            $table->text('intervensi_resiko_jatuh_skala_morse_rendah');
            $table->text('intervensi_resiko_jatuh_skala_morse_sedang');
            $table->text('intervensi_resiko_jatuh_skala_morse_tinggi');
            $table->string('shift');
            $table->dateTime('created_at');
            $table->string('resiko_jatuh_morse_kategori')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resiko_jatuh_skala_morse');
    }
};
