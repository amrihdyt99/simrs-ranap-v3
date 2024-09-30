<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengkajianObgynRiwayatKehamilanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengkajian_obgyn_riwayat_kehamilan', function (Blueprint $table) {
            $table->bigIncrements('pengkajian_obgyn_id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('tgl_tahun_partus')->nullable();
            $table->string('tempat_partus')->nullable();
            $table->string('umur_hamil')->nullable();
            $table->string('jenis_persalinan')->nullable();
            $table->string('penolong_persalinan')->nullable();
            $table->string('penyulit')->nullable();
            $table->string('bb_anak')->nullable();
            $table->string('keadaan_sekarang')->nullable();
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
        Schema::dropIfExists('pengkajian_obgyn_riwayat_kehamilan');
    }
}
