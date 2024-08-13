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
        Schema::create('rs_pemeriksaan_bayi', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('keadaan_umum')->nullable();
            $table->string('suhu')->nullable();
            $table->string('pernafasan')->nullable();
            $table->string('denyut_nadi')->nullable();
            $table->string('berat_badan')->nullable();
            $table->string('panjang_badan')->nullable();
            $table->string('bentuk_kepala')->nullable();
            $table->string('fontanel')->nullable();
            $table->string('molding')->nullable();
            $table->string('caput_succedaneum')->nullable();
            $table->string('chepal_hematoom')->nullable();
            $table->string('muka')->nullable();
            $table->string('conjungtiva')->nullable();
            $table->string('sklera')->nullable();
            $table->string('bola_mata')->nullable();
            $table->string('gerakan_bola_mata')->nullable();
            $table->string('bentuk_telinga')->nullable();
            $table->string('posisi_telinga')->nullable();
            $table->string('lobang_telinga')->nullable();
            $table->string('bibir')->nullable();
            $table->string('leher')->nullable();
            $table->string('dada')->nullable();
            $table->string('tali_pusat')->nullable();
            $table->string('posisi_punggung')->nullable();
            $table->string('fleksibilitas_tulang_punggung')->nullable();
            $table->string('kelainan_punggung')->nullable();
            $table->string('ekstermitas_atas')->nullable();
            $table->string('ekstermitas_bawah')->nullable();
            $table->string('abdomen_bentuk')->nullable();
            $table->string('abdomen_palpasi')->nullable();
            $table->string('kelainan_abdomen')->nullable();
            $table->string('genetalia_jenis_kelamin')->nullable();
            $table->string('genetalia_kelainan')->nullable();
            $table->string('anus')->nullable();
            $table->string('menghisap')->nullable();
            $table->string('menoleh')->nullable();
            $table->string('menggenggam')->nullable();
            $table->string('babinski')->nullable();
            $table->string('moro')->nullable();
            $table->string('tonic_nack')->nullable();
            $table->string('lingkar_kepala')->nullable();
            $table->string('lingkar_dada')->nullable();
            $table->string('lingkar_lengan_atas')->nullable();
            $table->string('miksi')->nullable();
            $table->string('meconeum')->nullable();
            $table->string('hb')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('ht')->nullable();
            $table->string('pengobatan')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_pemeriksaan_bayi');
    }
};
