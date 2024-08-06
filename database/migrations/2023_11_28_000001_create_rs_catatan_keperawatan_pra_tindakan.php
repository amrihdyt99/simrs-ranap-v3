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
        Schema::create('rs_catatan_keperawatan_pra_tindakan', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('pra_suhu')->nullable();
            $table->string('pra_nadi')->nullable();
            $table->string('pra_rr')->nullable();
            $table->string('pra_td')->nullable();
            $table->string('pra_skor_nyeri')->nullable();
            $table->string('pra_tb')->nullable();
            $table->string('pra_bb')->nullable();
            $table->string('pra_status_mental')->nullable();
            $table->string('pra_penyakit_dahulu')->nullable();
            $table->string('pra_pengobatan_saat_ini')->nullable();
            $table->string('pra_katerisasi')->nullable();
            $table->string('pra_stent')->nullable();
            $table->string('pra_stent_di')->nullable();
            $table->string('pra_jenis')->nullable();
            $table->string('pra_kapan')->nullable();
            $table->string('pra_di')->nullable();
            $table->string('pra_alergi')->nullable();
            $table->string('pra_alergi_text')->nullable();
            $table->string('cath_signin_ureum')->nullable();
            $table->string('cath_signin_creatinin')->nullable();
            $table->string('cath_signin_hbsag')->nullable();
            $table->string('cath_signin_gds')->nullable();
            $table->string('cath_signin_hb')->nullable();
            $table->string('cath_signin_trombosit')->nullable();
            $table->string('cath_signin_pt')->nullable();
            $table->string('cath_signin_aptt')->nullable();
            $table->string('ceklist_kesiapan_ruang')->nullable();

            $table->string('verif_ruangan_1', 10)->nullable();
            $table->string('verif_cathlab_1', 10)->nullable();
            $table->string('verif_keterangan_1', 10)->nullable();
            $table->string('verif_ruangan_2', 10)->nullable();
            $table->string('verif_cathlab_2', 10)->nullable();
            $table->string('verif_keterangan_2', 10)->nullable();
            $table->string('verif_ruangan_3', 10)->nullable();
            $table->string('verif_cathlab_3', 10)->nullable();
            $table->string('verif_keterangan_3', 10)->nullable();
            $table->string('verif_ruangan_4', 10)->nullable();
            $table->string('verif_cathlab_4', 10)->nullable();
            $table->string('verif_keterangan_4', 10)->nullable();
            $table->string('verif_ruangan_5', 10)->nullable();
            $table->string('verif_cathlab_5', 10)->nullable();
            $table->string('verif_keterangan_5', 10)->nullable();
            $table->string('verif_ruangan_6', 10)->nullable();
            $table->string('verif_cathlab_6', 10)->nullable();
            $table->string('verif_keterangan_6', 10)->nullable();
            $table->string('verif_ruangan_7', 10)->nullable();
            $table->string('verif_cathlab_7', 10)->nullable();
            $table->string('verif_keterangan_7', 10)->nullable();
            $table->string('verif_ruangan_8', 10)->nullable();
            $table->string('verif_cathlab_8', 10)->nullable();
            $table->string('verif_keterangan_8', 10)->nullable();
            $table->string('persiapan_ruangan_1', 10)->nullable();
            $table->string('persiapan_cathlab_1', 10)->nullable();
            $table->string('persiapan_keterangan_1', 10)->nullable();
            $table->string('persiapan_ruangan_2', 10)->nullable();
            $table->string('persiapan_cathlab_2', 10)->nullable();
            $table->string('persiapan_keterangan_2', 10)->nullable();
            $table->string('persiapan_ruangan_3', 10)->nullable();
            $table->string('persiapan_cathlab_3', 10)->nullable();
            $table->string('persiapan_keterangan_3', 10)->nullable();
            $table->string('persiapan_ruangan_4', 10)->nullable();
            $table->string('persiapan_cathlab_4', 10)->nullable();
            $table->string('persiapan_keterangan_4', 10)->nullable();
            $table->string('persiapan_ruangan_5', 10)->nullable();
            $table->string('persiapan_cathlab_5', 10)->nullable();
            $table->string('persiapan_keterangan_5', 10)->nullable();
            $table->string('persiapan_ruangan_6', 10)->nullable();
            $table->string('persiapan_cathlab_6', 10)->nullable();
            $table->string('persiapan_keterangan_6', 10)->nullable();
            $table->string('persiapan_ruangan_7', 10)->nullable();
            $table->string('persiapan_cathlab_7', 10)->nullable();
            $table->string('persiapan_keterangan_7', 10)->nullable();
            $table->string('persiapan_ruangan_8', 10)->nullable();
            $table->string('persiapan_cathlab_8', 10)->nullable();
            $table->string('persiapan_keterangan_8', 10)->nullable();
            $table->string('persiapan_ruangan_9', 10)->nullable();
            $table->string('persiapan_cathlab_9', 10)->nullable();
            $table->string('persiapan_keterangan_9', 10)->nullable();
            $table->string('persiapan_ruangan_10', 10)->nullable();
            $table->string('persiapan_cathlab_10', 10)->nullable();
            $table->string('persiapan_keterangan_10', 10)->nullable();
            $table->string('persiapan_ruangan_11', 10)->nullable();
            $table->string('persiapan_cathlab_11', 10)->nullable();
            $table->string('persiapan_keterangan_11', 10)->nullable();
            $table->string('persiapan_ruangan_12', 10)->nullable();
            $table->string('persiapan_cathlab_12', 10)->nullable();
            $table->string('persiapan_keterangan_12', 10)->nullable();

            $table->string('tgl_jam_ruangan')->nullable();
            $table->string('perawat_ruangan')->nullable();
            $table->string('tgl_jam_cathlab')->nullable();
            $table->string('perawat_cathlab')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_catatan_keperawatan_pra_tindakan');
    }
};
