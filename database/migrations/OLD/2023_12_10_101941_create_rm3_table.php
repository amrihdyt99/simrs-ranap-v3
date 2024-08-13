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
        Schema::create('rm3', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('reg_no');
            $table->string('MedicalNo', 20);
            $table->text('satu');
            $table->text('dua');
            $table->text('tiga');
            $table->text('empat');
            $table->string('file', 50)->nullable();
            $table->text('kepada');
            $table->string('sampai')->nullable();
            $table->string('tidak')->nullable();
            $table->string('alasan_tidak')->nullable();
            $table->string('gigi', 20)->nullable();
            $table->string('lokasi_gigi', 20)->nullable();
            $table->string('bawa_gigi', 20)->nullable();
            $table->string('alat', 20)->nullable();
            $table->string('lokasi_alat', 20)->nullable();
            $table->string('uang', 20)->nullable();
            $table->text('uang_bawa')->nullable();
            $table->text('barang_lain')->nullable();
            $table->string('bawa_alat', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rm3');
    }
};
