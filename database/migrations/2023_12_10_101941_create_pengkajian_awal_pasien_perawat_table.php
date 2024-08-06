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
            $table->string('berat_badan', 10)->nullable();
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
            $table->string('asper_poli')->nullable();
            $table->string('asper_kondisi_umum_lain');
            $table->string('asper_hpht');
            $table->string('asper_tp');
            $table->string('asper_kbthn_khusus_lain');
            $table->string('asper_status_emosi_lain');
            $table->string('asper_hambatan_ekonomi_lain');
            $table->string('bunuh_diri_depresi');
            $table->string('bunuh_diri_cerai');
            $table->string('nyeri_status')->nullable();
            $table->string('nyeri_durasi_waktu')->nullable();
            $table->string('nyeri_penyebab')->nullable();
            $table->string('nyeri_deskripsi')->nullable();
            $table->string('nyeri_deskripsi_lain')->nullable();
            $table->string('lokasi_penjalaran')->nullable();
            $table->string('nyeri_skala_ukur')->nullable();
            $table->string('nyeri_skala')->nullable();
            $table->string('nyeri_waktu')->nullable();
            $table->string('nyeri_frekuensi')->nullable();
            $table->string('asper_brjln_seimbang')->nullable();
            $table->string('asper_altban_duduk')->nullable();
            $table->string('asper_hasil')->nullable();
            $table->string('asper_keluhan_nutrisi')->nullable();
            $table->string('asper_keluhan_nutrisi_lain')->nullable();
            $table->string('asper_haus_berlebih')->nullable();
            $table->string('asper_mukosa_mulut')->nullable();
            $table->string('asper_turgor_kulit')->nullable();
            $table->string('asper_edema')->nullable();
            $table->string('asper_diagnosa_kprwtn_text')->nullable();
            $table->string('asper_diagnosa_kprwtn')->nullable();
            $table->string('kebutuhan_konseling_spiritual_lain')->nullable();
            $table->string('bantuan_menjalankan_ibadah_lain')->nullable();
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
