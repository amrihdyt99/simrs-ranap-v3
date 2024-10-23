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
        Schema::create('rs_tindakan_medis_persetujuan', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('persetujuan_nama_1')->nullable();
            $table->string('persetujuan_jenis_kelamin_1')->nullable();
            $table->string('persetujuan_tanggal_lahir_1')->nullable();
            $table->string('persetujuan_alamat_1')->nullable();
            $table->string('persetujuan_pernyataan')->nullable();
            $table->string('persetujuan_terhadap')->nullable();
            $table->string('persetujuan_nama_2')->nullable();
            $table->string('persetujuan_jenis_kelamin_2')->nullable();
            $table->string('persetujuan_tanggal_lahir_2')->nullable();
            $table->string('persetujuan_alamat_2')->nullable();
            $table->dateTime('persetujuan_tanggal_waktu_ttd')->nullable();
            $table->text('persetujuan_ttd_yg_menyatakan')->nullable();
            $table->text('persetujuan_ttd_dokter')->nullable();
            $table->text('persetujuan_ttd_keluarga')->nullable();
            $table->text('persetujuan_ttd_perawat')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_tindakan_medis_persetujuan');
    }
};
