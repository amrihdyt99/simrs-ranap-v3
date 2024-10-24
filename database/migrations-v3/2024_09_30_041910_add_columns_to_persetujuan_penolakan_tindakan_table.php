<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPersetujuanPenolakanTindakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rs_tindakan_medis_informasi', function (Blueprint $table) {
            $table->string('nama_dokter')->nullable();
            $table->string('nama_penerima_informasi')->nullable();
        });

        Schema::table('rs_tindakan_medis_penolakan', function (Blueprint $table) {
            $table->string('nama_penolakan_penerima')->nullable();
            $table->string('nama_penolakan_dokter')->nullable();
            $table->string('nama_penolakan_keluarga')->nullable();
            $table->string('nama_penolakan_perawat')->nullable();
        });

        Schema::table('rs_tindakan_medis_persetujuan', function (Blueprint $table) {
            $table->string('nama_persetujuan_penerima')->nullable();
            $table->string('nama_persetujuan_dokter')->nullable();
            $table->string('nama_persetujuan_keluarga')->nullable();
            $table->string('nama_persetujuan_perawat')->nullable();       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('persetujuan_penolakan_tindakan', function (Blueprint $table) {
            //
        });
    }
}
