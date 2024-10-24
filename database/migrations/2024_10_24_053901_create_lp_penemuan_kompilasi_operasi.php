<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLpPenemuanKompilasiOperasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lp_penemuan_komplikasi_operasi', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('reg_no')->nullable();
            $table->text('catatan_prosedur')->nullable();
            $table->boolean('is_komplikasi')->nullable();
            $table->text('catatan_komplikasi')->nullable();
            $table->boolean('is_implant')->nullable();
            $table->text('catatan_implant')->nullable();
            $table->string('kode_dokter_operator')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('lp_penemuan_kompilasi_operasi');
    }
}
