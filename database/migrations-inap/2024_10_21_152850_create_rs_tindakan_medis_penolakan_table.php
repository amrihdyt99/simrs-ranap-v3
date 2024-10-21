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
        Schema::create('rs_tindakan_medis_penolakan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('penolakan_nama_1')->nullable();
            $table->string('penolakan_jenis_kelamin_1')->nullable();
            $table->string('penolakan_tanggal_lahir_1')->nullable();
            $table->string('penolakan_alamat_1')->nullable();
            $table->string('penolakan_pernyataan')->nullable();
            $table->string('penolakan_terhadap')->nullable();
            $table->string('penolakan_nama_2')->nullable();
            $table->string('penolakan_jenis_kelamin_2')->nullable();
            $table->string('penolakan_tanggal_lahir_2')->nullable();
            $table->string('penolakan_alamat_2')->nullable();
            $table->dateTime('penolakan_tanggal_ttd')->nullable();
            $table->text('penolakan_ttd_yg_menyatakan')->nullable();
            $table->text('penolakan_ttd_dokter')->nullable();
            $table->text('penolakan_ttd_keluarga')->nullable();
            $table->text('penolakan_ttd_perawat')->nullable();
            $table->string('kode_tindakan_medis_setuju_tolak')->nullable();
            $table->string('nama_penolakan_penerima')->nullable();
            $table->string('nama_penolakan_dokter')->nullable();
            $table->string('nama_penolakan_keluarga')->nullable();
            $table->string('nama_penolakan_perawat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_tindakan_medis_penolakan');
    }
};
