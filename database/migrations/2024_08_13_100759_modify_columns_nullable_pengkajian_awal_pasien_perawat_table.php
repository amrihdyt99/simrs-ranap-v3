<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsNullablePengkajianAwalPasienPerawatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengkajian_awal_pasien_perawat', function (Blueprint $table) {
            $table->string('reg_medrec')->nullable(false)->change();
            $table->string('reg_no')->nullable(false)->change();
            $table->string('alergi')->nullable()->change();
            $table->string('nama_alergi')->nullable()->change();
            $table->string('reaksi_alergi')->nullable()->change();
            $table->string('diberitauhkan_dokter')->nullable()->change();
            $table->string('kesadaran')->nullable()->change();
            $table->string('kondisi_umum')->nullable()->change();
            $table->string('tekanan_darah')->nullable()->change();
            $table->string('nadi')->nullable()->change();
            $table->string('suhu')->nullable()->change();
            $table->string('penafasan')->nullable()->change();
            $table->string('tinggi_badan')->nullable()->change();
            $table->string('berat_badan', 10)->nullable()->change();
            $table->string('kebutuhan_khusus')->nullable()->change();
            $table->string('status_emosional')->nullable()->change();
            $table->string('kebiasaan')->nullable()->change();
            $table->string('frekuensi_kebiasaan')->nullable()->change();
            $table->string('riwayat_gangguan_jiwa')->nullable()->change();
            $table->string('keinginan_percobaan_bunuh_diri')->nullable()->change();
            $table->string('ketegori_percobaan_bunuh_diri')->nullable()->change();
            $table->string('bunuh_diri_sex')->nullable()->change();
            $table->string('bunuh_diri_age')->nullable()->change();
            $table->string('bunuh_diri_previous_suicide')->nullable()->change();
            $table->string('bunuh_diri_alkohol')->nullable()->change();
            $table->string('bunuh_diri_loss')->nullable()->change();
            $table->string('bunuh_diri_terorganisir')->nullable()->change();
            $table->string('bunuh_diri_pendukung')->nullable()->change();
            $table->string('bunuh_diri_penyakit_kronis')->nullable()->change();
            $table->string('riwayat_trauma')->nullable()->change();
            $table->string('hambatan_sosial_ekonomi')->nullable()->change();
            $table->string('kebutuhan_konseling_spiritual')->nullable()->change();
            $table->string('bantuan_menjalankan_ibadah')->nullable()->change();
            $table->string('asper_poli')->nullable()->change();
            $table->string('asper_kondisi_umum_lain')->nullable()->change();
            $table->string('asper_hpht')->nullable()->change();
            $table->string('asper_tp')->nullable()->change();
            $table->string('asper_kbthn_khusus_lain')->nullable()->change();
            $table->string('asper_status_emosi_lain')->nullable()->change();
            $table->string('asper_hambatan_ekonomi_lain')->nullable()->change();
            $table->string('bunuh_diri_depresi')->nullable()->change();
            $table->string('bunuh_diri_cerai')->nullable()->change();
            $table->string('nyeri_status')->nullable()->change();
            $table->string('nyeri_durasi_waktu')->nullable()->change();
            $table->string('nyeri_penyebab')->nullable()->change();
            $table->string('nyeri_deskripsi')->nullable()->change();
            $table->string('nyeri_deskripsi_lain')->nullable()->change();
            $table->string('lokasi_penjalaran')->nullable()->change();
            $table->string('nyeri_skala_ukur')->nullable()->change();
            $table->string('nyeri_skala')->nullable()->change();
            $table->string('nyeri_waktu')->nullable()->change();
            $table->string('nyeri_frekuensi')->nullable()->change();
            $table->string('asper_brjln_seimbang')->nullable()->change();
            $table->string('asper_altban_duduk')->nullable()->change();
            $table->string('asper_hasil')->nullable()->change();
            $table->string('asper_keluhan_nutrisi')->nullable()->change();
            $table->string('asper_keluhan_nutrisi_lain')->nullable()->change();
            $table->string('asper_haus_berlebih')->nullable()->change();
            $table->string('asper_mukosa_mulut')->nullable()->change();
            $table->string('asper_turgor_kulit')->nullable()->change();
            $table->string('asper_edema')->nullable()->change();
            $table->string('asper_diagnosa_kprwtn_text')->nullable()->change();
            $table->string('asper_diagnosa_kprwtn')->nullable()->change();
            $table->string('kebutuhan_konseling_spiritual_lain')->nullable()->change();
            $table->string('bantuan_menjalankan_ibadah_lain')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
