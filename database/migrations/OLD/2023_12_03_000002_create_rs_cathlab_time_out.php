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
        Schema::create('rs_cathlab_time_out', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('cath_timeout_pukul')->nullable();
            $table->string('cath_timeout_nama_pasien')->nullable();
            $table->string('cath_timeout_tgl_lahir')->nullable();
            $table->string('cath_timeout_diagnostik')->nullable();
            $table->string('cath_timeout_intervensi')->nullable();
            $table->string('cath_timeout_tim')->nullable();
            $table->string('cath_timeout_tim_dokter')->nullable();
            $table->string('cath_timeout_tim_scrub')->nullable();
            $table->string('cath_timeout_tim_circulating')->nullable();
            $table->string('cath_timeout_tim_dokter_anastesi')->nullable();
            $table->string('cath_timeout_tim_perawat_anastesi')->nullable();
            $table->string('cath_timeout_tim_petugas_lain')->nullable();
            $table->string('cath_timeout_obat')->nullable();
            $table->string('cath_timeout_ureum')->nullable();
            $table->string('cath_timeout_kreatinin')->nullable();
            $table->string('cath_timeout_akses')->nullable();
            $table->string('cath_timeout_estimasi')->nullable();
            $table->string('cath_timeout_tindakan')->nullable();
            $table->string('cath_timeout_pertanyaan')->nullable();
            $table->string('cath_timeout_tim_siap')->nullable();
            $table->string('cath_timeout_perawat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_cathlab_time_out');
    }
};
