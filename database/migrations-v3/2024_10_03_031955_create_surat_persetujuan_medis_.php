<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratPersetujuanMedis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('surat_persetujuan_medis', function (Blueprint $table) {
            $table->id(); 
            $table->string('reg_no')->nullable(); 
            $table->string('penanggung_jawab')->nullable(); 
            $table->integer('umur_penanggung_jawab')->nullable(); 
            $table->text('alamat_penanggung_jawab')->nullable(); 
            $table->string('hubungan_penanggung_jawab')->nullable(); 
            $table->string('penanggung_jawab_2')->nullable(); 
            $table->integer('umur_penanggung_jawab_2')->nullable(); 
            $table->text('alamat_penanggung_jawab_2')->nullable(); 
            $table->string('hubungan_penanggung_jawab_2')->nullable(); 
            $table->text('kondisi_medis')->nullable(); 
            $table->longText('signature1')->nullable(); 
            $table->longText('witness1')->nullable(); 
            $table->longText('witness2')->nullable(); 
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
}
