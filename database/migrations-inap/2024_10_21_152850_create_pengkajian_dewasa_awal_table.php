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
        Schema::create('pengkajian_dewasa_awal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('alergi')->nullable();
            $table->string('alergi_obat')->nullable();
            $table->string('bentuk_reaksi_obat')->nullable();
            $table->string('alergi_makanan')->nullable();
            $table->string('bentuk_reaksi_makanan')->nullable();
            $table->string('alergi_lainnya')->nullable();
            $table->string('bentuk_reaksi_lainnya')->nullable();
            $table->string('diberitahukan_kpd')->nullable();
            $table->string('diberitahukan_status')->nullable();
            $table->time('diberitahukan_jam')->nullable();
            $table->string('kesadaran')->nullable();
            $table->string('kondisi_umum')->nullable();
            $table->string('kondisi_umum_lainnya_text')->nullable();
            $table->integer('tekanan_darah')->nullable();
            $table->integer('nadi')->nullable();
            $table->integer('suhu')->nullable();
            $table->integer('pernafasan')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->text('kebutuhan_khusus')->nullable();
            $table->string('kebutuhan_khusus_lainnya_text')->nullable();
            $table->text('status_emosional')->nullable();
            $table->string('status_emosional_text')->nullable();
            $table->string('merokok')->nullable();
            $table->string('frekuensi_merokok')->nullable();
            $table->string('minuman_alkohol')->nullable();
            $table->string('riwayat_gangguan_jiwa')->nullable();
            $table->string('riwayat_bunuh_diri')->nullable();
            $table->string('riwayat_bunuh_diri_text')->nullable();
            $table->string('riwayat_trauma_psikis')->nullable();
            $table->string('riwayat_trauma_psikis_detail')->nullable();
            $table->string('riwayat_trauma_psikis_detail_kriminal_text')->nullable();
            $table->string('riwayat_trauma_psikis_detail_lain_text')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('hambatan_sosial_ekonomi')->nullable();
            $table->string('konseling_spiritual')->nullable();
            $table->string('konseling_spiritual_text')->nullable();
            $table->string('bantuan_ibadah')->nullable();
            $table->string('bantuan_ibadah_text')->nullable();
            $table->string('nilai_aks')->nullable();
            $table->string('kategori_perawatan')->nullable();
            $table->string('rentang_gerak')->nullable();
            $table->string('deformitas')->nullable();
            $table->string('deformitas_text')->nullable();
            $table->string('gangguan_tidur')->nullable();
            $table->string('gangguan_tidur_text')->nullable();
            $table->string('keluhan_nutrisi')->nullable();
            $table->string('rasa_haus_berlebih')->nullable();
            $table->string('mukosa_mulut')->nullable();
            $table->string('turgor_kulit')->nullable();
            $table->string('endema')->nullable();
            $table->string('frekuensi_bab')->nullable();
            $table->string('keluhan_bab')->nullable();
            $table->string('keluhan_bab_text')->nullable();
            $table->string('karakteristik_feces')->nullable();
            $table->string('warna_feces')->nullable();
            $table->string('frekuensi_bak')->nullable();
            $table->string('jumlah_bak')->nullable();
            $table->string('warna_urin')->nullable();
            $table->string('keluhan_bak')->nullable();
            $table->string('keluhan_bak_lainnya')->nullable();
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
        Schema::dropIfExists('pengkajian_dewasa_awal');
    }
};
