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
        Schema::connection('mysql2')->create('surat_rawat_intensif', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_no');
            $table->string('penanggung_jawab')->nullable();
            $table->integer('umur_penanggung_jawab')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->text('alamat_penanggung_jawab')->nullable();
            $table->text('keluarga_signature')->nullable();
            $table->text('keluarga_signature_2')->nullable();
            $table->string('penanggung_jawab_2')->nullable();
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
        Schema::connection('mysql2')->dropIfExists('surat_rawat_intensif');
    }
};
