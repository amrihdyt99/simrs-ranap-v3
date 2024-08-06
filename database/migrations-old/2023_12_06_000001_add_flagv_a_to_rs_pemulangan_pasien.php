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
        Schema::table('rs_pemulangan_pasien', function (Blueprint $table) {
            $table->string('diagnosis_utama')->nullable();
            $table->string('diagnosis_sekunder')->nullable();
            $table->string('ppsb_tujuan')->nullable();
            $table->string('ppsb_tempat')->nullable();
            $table->string('bantuan_dalam_aktifitas')->nullable()->change();
            $table->string('edukasi_gizi')->nullable()->change();
            $table->string('penanganan_nyeri_kronis')->nullable()->change();
            $table->string('kebutuhan_lainnya_check')->nullable();
            $table->string('kebutuhan_lainnya')->nullable()->change();
            $table->string('pengelolaan_penyakit_secara_berkelanjutan')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
