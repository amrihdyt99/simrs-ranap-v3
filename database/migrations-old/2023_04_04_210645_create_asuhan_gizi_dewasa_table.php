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
        Schema::create('asuhan_gizi_dewasa', function (Blueprint $table) {
            $table->bigIncrements('asdewasa_id');
            $table->string('asdewasa_reg')->nullable();
            $table->text('asdewasa_assesment')->nullable();
            $table->text('asdewasa_diagnosa')->nullable();
            $table->text('asdewasa_tujuan')->nullable();
            $table->string('asdewasa_energi')->nullable();
            $table->string('asdewasa_protein')->nullable();
            $table->string('asdewasa_kh')->nullable();
            $table->string('asdewasa_rute')->nullable();
            $table->string('asdewasa_jenis_makanan')->nullable();
            $table->string('asdewasa_frekuensi')->nullable();
            $table->string('asdewasa_jadwal_makanan')->nullable();
            $table->text('asdewasa_monitoring_evaluasi')->nullable();
            $table->string('asdewasa_user')->nullable();
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
        Schema::dropIfExists('asuhan_gizi_dewasa');
    }
};
