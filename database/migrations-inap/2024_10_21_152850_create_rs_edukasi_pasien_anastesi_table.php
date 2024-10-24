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
        Schema::create('rs_edukasi_pasien_anastesi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('medrec');
            $table->string('dilakukan_ke')->nullable();
            $table->string('nama')->nullable();
            $table->string('umur')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('no_rekam_medis')->nullable();
            $table->string('diagonsa')->nullable();
            $table->string('tindakan')->nullable();
            $table->string('jenis_anastesi')->nullable();
            $table->string('tgl_ttd')->nullable();
            $table->string('nama_pihak_pasien')->nullable();
            $table->string('nama_dokter')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->text('ttd_pihak_pasien')->nullable();
            $table->text('ttd_dokter')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_edukasi_pasien_anastesi');
    }
};
