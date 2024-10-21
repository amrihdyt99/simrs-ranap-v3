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
        Schema::create('rs_pasien_resume', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no')->nullable();
            $table->string('riwayat_alergi')->nullable();
            $table->string('riwayat_alergi_lain')->nullable();
            $table->text('keluhan_utama')->nullable();
            $table->text('riwayat_penyakit')->nullable();
            $table->text('pemeriksaan_fisik')->nullable();
            $table->string('temuan_klinik')->nullable();
            $table->string('pemeriksaan_lab')->nullable();
            $table->string('pemeriksaan_radiologi')->nullable();
            $table->string('radiologi_keterangan')->nullable();
            $table->string('pemeriksaan_pa')->nullable();
            $table->string('pa_keterangan')->nullable();
            $table->string('terpasang_implant')->nullable();
            $table->string('implant_keterangan')->nullable();
            $table->string('lain_lain')->nullable();
            $table->string('pemeriksaan_penunjang_yang_tertunda')->nullable();
            $table->string('penunjang_keterangan')->nullable();
            $table->string('alasan_penundaan')->nullable();
            $table->string('tanggal_pengembalian')->nullable();
            $table->string('lokasi_pengembalian')->nullable();
            $table->text('indikasi_rawat')->nullable();
            $table->text('diagnosis_masuk')->nullable();
            $table->text('penyebab_luar')->nullable();
            $table->string('penyebab_luar_icd')->nullable();
            $table->longText('diagnosa')->nullable();
            $table->longText('prosedur')->nullable();
            $table->longText('terapi')->nullable();
            $table->longText('tindakan')->nullable();
            $table->text('alasan_pulang')->nullable();
            $table->string('rs_lain_ke')->nullable();
            $table->string('rs_lain_alasan')->nullable();
            $table->text('kondisi_pulang')->nullable();
            $table->string('alat_bantu_sebutkan')->nullable();
            $table->string('td')->nullable();
            $table->string('hr')->nullable();
            $table->string('rr')->nullable();
            $table->string('t')->nullable();
            $table->string('edukasi_penyakit')->nullable();
            $table->string('edukasi_diet')->nullable();
            $table->string('edukasi_alat_bantu')->nullable();
            $table->string('dokter_id')->nullable();
            $table->timestamps();
            $table->text('ttd_dokter')->nullable();
            $table->text('ttd_pasien')->nullable();
            $table->string('nama_pasien_keluarga')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_pasien_resume');
    }
};
