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
        Schema::create('rs_assesment_bayi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('no_rm_bayi')->nullable();
            $table->string('no_rm_ibu')->nullable();
            $table->string('nama_bayi')->nullable();
            $table->string('tempat_lahir_bayi')->nullable();
            $table->date('tanggal_lahir_bayi')->nullable();
            $table->string('jenis_kelamin_bayi')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('umur_ibu')->nullable();
            $table->string('agama_ibu')->nullable();
            $table->string('suku_bangsa_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('alamat_ibu')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('umur_ayah')->nullable();
            $table->string('agama_ayah')->nullable();
            $table->string('suku_bangsa_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('alamat_ayah')->nullable();
            $table->string('pendarahan')->nullable();
            $table->string('pre_eklampsia')->nullable();
            $table->string('eklampsia')->nullable();
            $table->string('penyakit_kelamin')->nullable();
            $table->string('lain_lain_riwayat_kehamilan')->nullable();
            $table->string('makanan')->nullable();
            $table->string('obat_obatan')->nullable();
            $table->string('merokok')->nullable();
            $table->string('lain_lain_kebiasaan')->nullable();
            $table->string('jenis_persalinan')->nullable();
            $table->string('ditolong_oleh')->nullable();
            $table->string('kala_satu')->nullable();
            $table->string('kala_dua')->nullable();
            $table->string('ketuban_Pecah')->nullable();
            $table->string('warna')->nullable();
            $table->string('bau')->nullable();
            $table->string('komplikasi_persalinan_ibu')->nullable();
            $table->string('komplikasi_persalinan_bayi')->nullable();
            $table->string('warna_kulit_1_menit')->nullable();
            $table->string('denyut_nadi_1_menit')->nullable();
            $table->string('reaksi_rangsangan_1_menit')->nullable();
            $table->string('warna_kulit_5_menit')->nullable();
            $table->string('denyut_nadi_5_menit')->nullable();
            $table->string('reaksi_rangsangan_5_menit')->nullable();
            $table->string('pengisapan_lendir')->nullable();
            $table->string('ambu')->nullable();
            $table->string('lama_ambu')->nullable();
            $table->string('massage_jantung')->nullable();
            $table->string('lama_massage_jantung')->nullable();
            $table->string('intubasi')->nullable();
            $table->string('lama_intubasi')->nullable();
            $table->string('pemakaian_oksigen')->nullable();
            $table->string('lama_pemakaian_oksigen')->nullable();
            $table->string('therapy')->nullable();
            $table->string('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_assesment_bayi');
    }
};
