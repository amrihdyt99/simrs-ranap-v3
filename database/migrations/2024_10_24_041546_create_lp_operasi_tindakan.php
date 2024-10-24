<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLpOperasiTindakan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lp_operasi_tindakan', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('reg_no')->nullable();
            $table->date('tanggal_operasi')->nullable();
            $table->time('mulai_jam_operasi')->nullable();
            $table->time('selesai_jam_operasi')->nullable();
            $table->string('dokter_bedah')->nullable();
            $table->string('dokter_anastesi')->nullable();
            $table->string('asisten_1')->nullable();
            $table->string('asisten_2')->nullable();
            $table->string('perawat_instrumen')->nullable();
            $table->string('tipe_operasi')->nullable();
            $table->longText('diagnosa_pasca_bedah')->nullable();
            $table->string('tipe_anestesi')->nullable();
            $table->boolean('pengirim_spesimen_klinik_patologi')->nullable();
            $table->string('ket_spesimen_klinik_patologi')->nullable();
            $table->string('ket_spesimen_klinik_patologi_lainnya')->nullable();
            $table->string('asal_spesimen')->nullable();
            $table->boolean('kultur')->nullable();
            $table->double('perkiraan_jumlah_pendarahan')->nullable();
            $table->double('jumlah_transfusi_wb')->nullable();
            $table->double('jumlah_transfusi_ffp')->nullable();
            $table->double('jumlah_transfusi_prc')->nullable();
            $table->double('jumlah_transfusi_cyro')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lp_operasi_tindakan');
    }
}
