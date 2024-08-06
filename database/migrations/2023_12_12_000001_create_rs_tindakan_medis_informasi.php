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
        Schema::create('rs_tindakan_medis_informasi', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('informasi_kode_tindakan')->nullable();
            $table->string('informasi_nama_tindakan')->nullable();
            $table->string('ParamedicCode')->nullable();
            $table->string('informasi_pemberi_info')->nullable();
            $table->string('informasi_penerima_info')->nullable();
            $table->dateTime('informasi_diberikan_pada')->nullable();
            $table->string('informasi_diagnosis_text')->nullable();
            $table->string('informasi_dasar_diagnosis_text')->nullable();
            $table->string('informasi_tindakan_kedokteran_text')->nullable();
            $table->string('informasi_indikasi_tindakan_text')->nullable();
            $table->string('informasi_tata_cara_text')->nullable();
            $table->string('informasi_tujuan_text')->nullable();
            $table->string('informasi_risiko_text')->nullable();
            $table->string('informasi_komplikasi_text')->nullable();
            $table->string('informasi_prognosis_text')->nullable();
            $table->string('informasi_alternatif_text')->nullable();
            $table->string('informasi_lain_lain_text')->nullable();
            $table->string('informasi_diagnosis_paraf')->nullable();
            $table->string('informasi_dasar_diagnosis_paraf')->nullable();
            $table->string('informasi_tindakan_kedokteran_paraf')->nullable();
            $table->string('informasi_indikasi_tindakan_paraf')->nullable();
            $table->string('informasi_tata_cara_paraf')->nullable();
            $table->text('informasi_tujuan_paraf')->nullable();
            $table->text('informasi_risiko_paraf')->nullable();
            $table->text('informasi_komplikasi_paraf')->nullable();
            $table->text('informasi_prognosis_paraf')->nullable();
            $table->text('informasi_alternatif_paraf')->nullable();
            $table->text('informasi_lain_lain_paraf')->nullable();
            $table->text('informasi_ttd_dokter')->nullable();
            $table->text('informasi_ttd_penerima_informasi')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_tindakan_medis_informasi');
    }
};
