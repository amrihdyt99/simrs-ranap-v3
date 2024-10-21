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
        Schema::create('rs_paska_tindakan', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('dokter_yang_merawat')->nullable();
            $table->string('diagnosa_medis')->nullable();
            $table->string('masalah_keperawatan')->nullable();
            $table->string('prosedur_yang_dilakukan')->nullable();
            $table->string('hasil_prosedur')->nullable();
            $table->string('keadaan_umum')->nullable();
            $table->string('gcs')->nullable();
            $table->string('pupil_reaksi_kanan')->nullable();
            $table->string('pupil_reaksi_kiri')->nullable();
            $table->string('td')->nullable();
            $table->string('nadi')->nullable();
            $table->string('rr')->nullable();
            $table->string('suhu')->nullable();
            $table->string('spo2')->nullable();
            $table->string('skala_nyeri')->nullable();
            $table->string('akses')->nullable();
            $table->string('akses_femoralis_text')->nullable();
            $table->string('sheat_aff')->nullable();
            $table->string('teknik_hemostasis')->nullable();
            $table->string('teknik_hemostasis_text')->nullable();
            $table->string('komplikasi')->nullable();
            $table->string('total_kontras')->nullable();
            $table->string('diet')->nullable();
            $table->string('diet_khusus_text')->nullable();
            $table->string('bab')->nullable();
            $table->string('bak')->nullable();
            $table->string('mobilisasi')->nullable();
            $table->string('hal_istimewa_pasien')->nullable();
            $table->string('assessment')->nullable();
            $table->string('recommendations')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_paska_tindakan');
    }
};
