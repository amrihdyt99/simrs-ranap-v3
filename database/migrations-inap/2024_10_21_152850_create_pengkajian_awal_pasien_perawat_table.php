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
            $table->string('alergi')->nullable();
            $table->string('nama_alergi')->nullable();
            $table->string('reaksi_alergi')->nullable();
            $table->string('diberitauhkan_dokter')->nullable();
            $table->string('kesadaran')->nullable();
            $table->string('kondisi_umum')->nullable();
            $table->string('tekanan_darah')->nullable();
            $table->string('nadi')->nullable();
            $table->string('suhu')->nullable();
            $table->string('penafasan')->nullable();
            $table->string('tinggi_badan')->nullable();
            $table->string('berat_badan', 10)->nullable();
            $table->string('kebutuhan_khusus')->nullable();
            $table->string('status_emosional')->nullable();
            $table->string('kebiasaan')->nullable();
            $table->string('frekuensi_kebiasaan')->nullable();
            $table->string('riwayat_gangguan_jiwa')->nullable();
            $table->string('keinginan_percobaan_bunuh_diri')->nullable();
            $table->string('ketegori_percobaan_bunuh_diri')->nullable();
            $table->string('bunuh_diri_sex')->nullable();
            $table->string('bunuh_diri_age')->nullable();
            $table->string('bunuh_diri_previous_suicide')->nullable();
            $table->string('bunuh_diri_alkohol')->nullable();
            $table->string('bunuh_diri_loss')->nullable();
            $table->string('bunuh_diri_terorganisir')->nullable();
            $table->string('bunuh_diri_pendukung')->nullable();
            $table->string('bunuh_diri_penyakit_kronis')->nullable();
            $table->string('riwayat_trauma')->nullable();
            $table->string('hambatan_sosial_ekonomi')->nullable();
            $table->string('kebutuhan_konseling_spiritual')->nullable();
            $table->string('bantuan_menjalankan_ibadah')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->string('asper_poli')->nullable();
            $table->string('asper_kondisi_umum_lain')->nullable();
            $table->string('asper_hpht')->nullable();
            $table->string('asper_tp')->nullable();
            $table->string('asper_kbthn_khusus_lain')->nullable();
            $table->string('asper_status_emosi_lain')->nullable();
            $table->string('asper_hambatan_ekonomi_lain')->nullable();
            $table->string('bunuh_diri_depresi')->nullable();
            $table->string('bunuh_diri_cerai')->nullable();
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
