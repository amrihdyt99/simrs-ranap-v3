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
        Schema::create('pengkajian_awal_pasien_perawat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_medrec');
            $table->string('reg_no');
            $table->string('alergi');
            $table->string('nama_alergi');
            $table->string('reaksi_alergi');
            $table->string('diberitauhkan_dokter');
            $table->string('kesadaran');
            $table->string('kondisi_umum');
            $table->string('tekanan_darah');
            $table->string('nadi');
            $table->string('suhu');
            $table->string('penafasan');
            $table->string('tinggi_badan');
            $table->string('kebutuhan_khusus');
            $table->string('status_emosional');
            $table->string('kebiasaan');
            $table->string('frekuensi_kebiasaan');
            $table->string('riwayat_gangguan_jiwa');
            $table->string('keinginan_percobaan_bunuh_diri');
            $table->string('ketegori_percobaan_bunuh_diri');
            $table->string('bunuh_diri_sex');
            $table->string('bunuh_diri_age');
            $table->string('bunuh_diri_previous_suicide');
            $table->string('bunuh_diri_alkohol');
            $table->string('bunuh_diri_loss');
            $table->string('bunuh_diri_terorganisir');
            $table->string('bunuh_diri_pendukung');
            $table->string('bunuh_diri_penyakit_kronis');
            $table->string('riwayat_trauma');
            $table->string('hambatan_sosial_ekonomi');
            $table->string('kebutuhan_konseling_spiritual');
            $table->string('bantuan_menjalankan_ibadah');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengkajian_awal_pasien_perawat');
    }
};
