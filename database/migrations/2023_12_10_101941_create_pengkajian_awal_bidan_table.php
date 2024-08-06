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
        Schema::create('pengkajian_awal_bidan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('no_reg', 150)->nullable();
            $table->string('med_rec', 150)->nullable();
            $table->string('alergi', 150)->nullable();
            $table->string('alergi_obat_nama', 150)->nullable();
            $table->string('alergi_obat_rekasi', 150)->nullable();
            $table->string('alergi_makanan_nama', 150)->nullable();
            $table->string('alergi_makanan_reaksi', 150)->nullable();
            $table->string('alergi_lainnya_nama', 150)->nullable();
            $table->string('alergi_lainnya_rekasi', 150)->nullable();
            $table->string('kesadaran', 150)->nullable();
            $table->string('kondisi_umum', 150)->nullable();
            $table->string('tekanan_darah', 150)->nullable();
            $table->string('tinggi_badan', 150)->nullable();
            $table->string('kebutuhan_khusus', 150)->nullable();
            $table->string('status_emosional', 150)->nullable();
            $table->string('kebiasaan', 150)->nullable();
            $table->string('kebiasaan_frekuensi', 150)->nullable();
            $table->string('riwayat_gangguan_jiwa', 150)->nullable();
            $table->string('nadi')->nullable();
            $table->string('suhu')->nullable();
            $table->string('pernafasan')->nullable();
            $table->string('berat_badan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengkajian_awal_bidan');
    }
};
