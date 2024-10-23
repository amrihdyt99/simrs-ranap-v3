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
        Schema::connection('mysql2')->create('surat_persetujuan_medis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no')->nullable();
            $table->string('penanggung_jawab')->nullable();
            $table->integer('umur_penanggung_jawab')->nullable();
            $table->text('alamat_penanggung_jawab')->nullable();
            $table->string('hubungan_penanggung_jawab')->nullable();
            $table->string('penanggung_jawab_2')->nullable();
            $table->integer('umur_penanggung_jawab_2')->nullable();
            $table->text('alamat_penanggung_jawab_2')->nullable();
            $table->string('hubungan_penanggung_jawab_2')->nullable();
            $table->string('kondisi_medis')->nullable();
            $table->string('kondisi_medis_lain_lain')->nullable();
            $table->longText('signature1')->nullable();
            $table->longText('witness1')->nullable();
            $table->longText('witness2')->nullable();
            $table->string('nama_witness2')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('surat_persetujuan_medis');
    }
};
