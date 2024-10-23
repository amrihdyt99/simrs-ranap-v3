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
        Schema::create('pengkajian_obgyn_riwayat_menstruasi_dan_perkawinan', function (Blueprint $table) {
            $table->bigIncrements('pengkajian_obgyn_id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->integer('umur_menarche')->nullable();
            $table->integer('lamanya_haid')->nullable();
            $table->integer('jumlah_darah_haid')->nullable();
            $table->date('hpht')->nullable();
            $table->date('tp')->nullable();
            $table->text('gangguan_haid')->nullable();
            $table->string('gangguan_haid_text')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('usia_perkawinan')->nullable();
            $table->string('jumlah_perkawinan')->nullable();
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
        Schema::dropIfExists('pengkajian_obgyn_riwayat_menstruasi_dan_perkawinan');
    }
};
