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
        Schema::create('case_manager', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->text('identifikasi_masalah')->nullable();
            $table->string('keadaan_fungsional')->nullable();
            $table->string('riwayat_kesehatan')->nullable();
            $table->string('perilaku_psiko_sosial')->nullable();
            $table->string('masalah_isu_sosial')->nullable();
            $table->string('kendala_pembiayaan')->nullable();
            $table->string('kebutuhan_discharge')->nullable();
            $table->string('potensi_penundaan')->nullable();
            $table->string('potensi_komplain')->nullable();
            $table->string('perencanaan_manegemen')->nullable();
            $table->string('target_hasil')->nullable();
            $table->timestamp('tanggal_ttd')->nullable();
            $table->text('ttd_perawat')->nullable();
            $table->string('perawat_name')->nullable();
            $table->text('ttd_pasien')->nullable();
            $table->string('pasien_name')->nullable();
            $table->text('ttd_saksi')->nullable();
            $table->string('saksi_name')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('case_manager');
    }
};
