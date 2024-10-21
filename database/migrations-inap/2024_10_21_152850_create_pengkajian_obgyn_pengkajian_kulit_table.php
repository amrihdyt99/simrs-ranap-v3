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
        Schema::create('pengkajian_obgyn_pengkajian_kulit', function (Blueprint $table) {
            $table->bigIncrements('pengkajian_obgyn_id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->integer('persepsi_sensori')->nullable();
            $table->integer('kelembaban')->nullable();
            $table->integer('aktivitas')->nullable();
            $table->integer('mobilitas')->nullable();
            $table->integer('nutrisi')->nullable();
            $table->integer('friksi_gesekan')->nullable();
            $table->integer('total_parameter')->nullable();
            $table->integer('skor_braden')->nullable();
            $table->string('resiko_braden')->nullable();
            $table->string('terdapat_luka')->nullable();
            $table->text('lokasi_luka')->nullable();
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
        Schema::dropIfExists('pengkajian_obgyn_pengkajian_kulit');
    }
};
