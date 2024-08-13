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
        Schema::create('rs_edukasi_pasien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index('rs_edukasi_pasien_user_id_foreign');
            $table->string('reg_no');
            $table->string('reg_medrec');
            $table->string('bahasa');
            $table->string('kebutuhan_penerjemah');
            $table->string('pendidikan_pasien');
            $table->string('baca_tulis');
            $table->string('pilihan_tipe_belajar');
            $table->string('hambatan_belajar');
            $table->string('kebutuhan_belajar');
            $table->string('kesediaan_pasien');
            $table->string('topik_dianogsa')->nullable();
            $table->string('topik_penyakit')->nullable();
            $table->string('topik_prosedur')->nullable();
            $table->string('topik_manajemen_nyeri')->nullable();
            $table->string('topik_lain_lain_dokter')->nullable();
            $table->string('topik_peralatan_perawat')->nullable();
            $table->string('topik_infeksi_perawat')->nullable();
            $table->string('topik_nyeri_perawat')->nullable();
            $table->string('topik_lain_lain_perawat')->nullable();
            $table->string('topik_nutrisi_gizi')->nullable();
            $table->string('topik_diet_gizi')->nullable();
            $table->string('topik_lain_lain_gizi')->nullable();
            $table->string('topik_obat_farmasi')->nullable();
            $table->string('topik_efek_samping_farmasi')->nullable();
            $table->string('topik_interaksi_obat_farmasi')->nullable();
            $table->string('topik_lain_lain_farmasi')->nullable();
            $table->string('topik_teknik_rehab')->nullable();
            $table->string('topik_lain_lain_rehab')->nullable();
            $table->date('tanggal_edukasi_diagnosa')->nullable();
            $table->date('tanggal_edukasi_penyakit')->nullable();
            $table->date('tanggal_edukasi_prosedur')->nullable();
            $table->date('tanggal_edukasi_nyeri')->nullable();
            $table->date('tanggal_edukasi_lain_lain')->nullable();
            $table->date('tanggal_edukasi_peralatan_perawat')->nullable();
            $table->date('tanggal_edukasi_infeksi_perawat')->nullable();
            $table->date('tanggal_edukasi_nyeri_perawat')->nullable();
            $table->date('tanggal_edukasi_lain_lain_perawat')->nullable();
            $table->date('tanggal_edukasi_nutrisi_gizi')->nullable();
            $table->date('tanggal_edukasi_diet_gizi')->nullable();
            $table->date('tanggal_edukasi_lain_lain_gizi')->nullable();
            $table->date('tanggal_edukasi_obat_farmasi')->nullable();
            $table->date('tanggal_edukasi_efek_samping_farmasi')->nullable();
            $table->date('tanggal_edukasi_interaksi_obat_farmasi')->nullable();
            $table->date('tanggal_edukasi_lain_lain_farmasi')->nullable();
            $table->date('tanggal_edukasi_teknik_rehab')->nullable();
            $table->date('tanggal_edukasi_lain_lain_rehab')->nullable();
            $table->string('tingkat_pemahaman_diagnosa')->nullable();
            $table->string('tingkat_pemahaman_penyakit')->nullable();
            $table->string('tingkat_pemahaman_prosedur')->nullable();
            $table->string('tingkat_pemahaman_nyeri')->nullable();
            $table->string('tingkat_pemahaman_lain_lain')->nullable();
            $table->string('tingkat_pemahaman_peralatan_perawat')->nullable();
            $table->string('tingkat_pemahaman_infeksi_perawat')->nullable();
            $table->string('tingkat_pemahaman_nyeri_perawat')->nullable();
            $table->string('tingkat_pemahaman_lain_lain_perawat')->nullable();
            $table->string('tingkat_pemahaman_nutrisi_gizi')->nullable();
            $table->string('tingkat_pemahaman_diet_gizi')->nullable();
            $table->string('tingkat_pemahaman_lain_lain_gizi')->nullable();
            $table->string('tingkat_pemahaman_obat_farmasi')->nullable();
            $table->string('tingkat_pemahaman_efek_samping_farmasi')->nullable();
            $table->string('tingkat_pemahaman_interaksi_obat_farmasi')->nullable();
            $table->string('tingkat_pemahaman_lain_lain_farmasi')->nullable();
            $table->string('tingkat_pemahaman_teknik_rehab')->nullable();
            $table->string('tingkat_pemahaman_lain_lain_rehab')->nullable();
            $table->string('metode_edukasi_diagnosa')->nullable();
            $table->string('metode_edukasi_penyakit')->nullable();
            $table->string('metode_edukasi_prosedur')->nullable();
            $table->string('metode_edukasi_nyeri')->nullable();
            $table->string('metode_edukasi_lain_lain')->nullable();
            $table->string('metode_edukasi_peralatan_perawat')->nullable();
            $table->string('metode_edukasi_infeksi_perawat')->nullable();
            $table->string('metode_edukasi_nyeri_perawat')->nullable();
            $table->string('metode_edukasi_lain_lain_perawat')->nullable();
            $table->string('metode_edukasi_nutrisi_gizi')->nullable();
            $table->string('metode_edukasi_diet_gizi')->nullable();
            $table->string('metode_edukasi_lain_lain_gizi')->nullable();
            $table->string('metode_edukasi_obat_farmasi')->nullable();
            $table->string('metode_edukasi_efek_samping_farmasi')->nullable();
            $table->string('metode_edukasi_interaksi_obat_farmasi')->nullable();
            $table->string('metode_edukasi_lain_lain_farmasi')->nullable();
            $table->string('metode_edukasi_teknik_rehab')->nullable();
            $table->string('metode_edukasi_lain_lain_rehab')->nullable();
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
        Schema::dropIfExists('rs_edukasi_pasien');
    }
};
