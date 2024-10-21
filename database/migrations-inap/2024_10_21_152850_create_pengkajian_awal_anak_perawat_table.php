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
        Schema::create('pengkajian_awal_anak_perawat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->tinyInteger('alergi')->nullable();
            $table->string('alergi_obat', 100)->nullable();
            $table->string('reaksi_alergi_obat')->nullable();
            $table->string('alergi_makanan')->nullable();
            $table->string('reaksi_alergi_makanan')->nullable();
            $table->string('alergi_lainnya')->nullable();
            $table->string('reaksi_alergi_lainnya')->nullable();
            $table->tinyInteger('diberitahukan')->nullable();
            $table->string('diberitahukan_kpd')->nullable();
            $table->time('diberitahukan_pukul')->nullable();
            $table->string('kondisi_umum')->nullable();
            $table->string('kondisi_umum_lainnya')->nullable();
            $table->integer('tekanan_darah')->nullable();
            $table->integer('nadi')->nullable();
            $table->integer('suhu')->nullable();
            $table->integer('pernafasan')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->string('kebutuhan_khusus')->nullable();
            $table->string('kebutuhan_khusus_lainnya')->nullable();
            $table->string('status_emosional')->nullable();
            $table->string('status_emosi_lainnya')->nullable();
            $table->tinyInteger('merokok')->nullable();
            $table->integer('frekuensi_merokok')->nullable();
            $table->tinyInteger('alkohol')->nullable();
            $table->tinyInteger('riwayat_gangguan_jiwa')->nullable();
            $table->string('gangguan_jiwa_waktu')->nullable();
            $table->tinyInteger('kategori')->nullable();
            $table->tinyInteger('riwayat_bunuh_diri')->nullable();
            $table->string('riwayat_bunuh_diri_ket')->nullable();
            $table->string('riwayat_trauma_psikis')->nullable();
            $table->string('tindakan_kriminal_ket')->nullable();
            $table->string('riwayat_trauma_psikis_ket')->nullable();
            $table->tinyInteger('hambatan_sosial_ekonomi')->nullable();
            $table->tinyInteger('konseling_spiritual')->nullable();
            $table->string('konseling_spiritual_ket')->nullable();
            $table->tinyInteger('bantuan_ibadah')->nullable();
            $table->string('bantuan_ibadah_ket')->nullable();
            $table->tinyInteger('resiko_riwayat_ibu')->nullable();
            $table->string('list_res_riwayat_ibu')->nullable();
            $table->string('res_ibu_ket_infeksi')->nullable();
            $table->tinyInteger('perinatal')->nullable();
            $table->string('perinatal_detail')->nullable();
            $table->tinyInteger('postnatal')->nullable();
            $table->string('list_postnatal')->nullable();
            $table->string('hospitalisasi')->nullable();
            $table->string('hospitalisasi_lainnya')->nullable();
            $table->string('hospitalisasi_times')->nullable();
            $table->string('pola_asuh')->nullable();
            $table->string('org_terdekat')->nullable();
            $table->string('org_terdekat_lainnya')->nullable();
            $table->string('tipe_anak')->nullable();
            $table->string('tipe_anak_lainnya')->nullable();
            $table->tinyInteger('perilaku_unik')->nullable();
            $table->string('perilaku_unik_lainnya')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->tinyInteger('kategori_status_fungsional')->nullable();
            $table->tinyInteger('rentang_gerak')->nullable();
            $table->tinyInteger('deformitas')->nullable();
            $table->string('deformitas_ket')->nullable();
            $table->tinyInteger('gangguan_tidur')->nullable();
            $table->string('gangguan_tidur_ket')->nullable();
            $table->string('keluhan_nutrisi')->nullable();
            $table->tinyInteger('rasa_haus_berlebih')->nullable();
            $table->string('mukosa_mulut')->nullable();
            $table->string('turgor_kulit')->nullable();
            $table->tinyInteger('endema')->nullable();
            $table->string('created_by', 100)->nullable();
            $table->string('updated_by', 100)->nullable();
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
        Schema::dropIfExists('pengkajian_awal_anak_perawat');
    }
};
