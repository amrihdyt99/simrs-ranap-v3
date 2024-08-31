<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerawatanSelanjutnyaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perawatan_selanjutnya', function (Blueprint $table) {
            $table->id(); 
            $table->string('id_dokter', 200)->nullable();
            $table->string('reg_no', 200)->nullable();
            $table->string('tipe', 200)->nullable();
            $table->string('klinik', 200)->nullable();
            $table->string('dokter', 200)->nullable();
            $table->date('tanggal_kontrol_rsud')->nullable();
            $table->date('tanggal_rs_lain')->nullable();
            $table->string('nama_rs_lain', 200)->nullable();
            $table->date('tanggal_rujuk_balik')->nullable();
            $table->string('nama_rs_rujuk_balik', 200)->nullable();
            $table->string('puskesmas', 200)->nullable();
            $table->string('dokter_pribadi', 200)->nullable();
            $table->string('pergantian_catheter_detail', 200)->nullable();
            $table->date('tanggal_pergantian_catheter')->nullable();
            $table->string('terapi_rehabilitan_detail', 200)->nullable();
            $table->date('tanggal_terapi_rehabilitan')->nullable();
            $table->string('rawat_luka_detail', 200)->nullable();
            $table->date('tanggal_rawat_luka')->nullable();
            $table->string('perawatan_lainnya_detail', 200)->nullable();
            $table->date('tanggal_perawatan_lainnya')->nullable();

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
        Schema::dropIfExists('perawatan_selanjutnya');
    }
}
