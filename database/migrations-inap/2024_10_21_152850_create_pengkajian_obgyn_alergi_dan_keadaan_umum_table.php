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
        Schema::create('pengkajian_obgyn_alergi_dan_keadaan_umum', function (Blueprint $table) {
            $table->bigIncrements('pengkajian_obgyn_id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('alergi')->nullable();
            $table->string('alergi_obat')->nullable();
            $table->string('bentuk_reaksi_obat')->nullable();
            $table->string('alergi_makanan')->nullable();
            $table->string('bentuk_reaksi_makanan')->nullable();
            $table->string('alergi_lainnya')->nullable();
            $table->string('bentuk_reaksi_lainnya')->nullable();
            $table->text('diberitahukan')->nullable();
            $table->string('diberitahukan_status')->nullable();
            $table->time('diberitahukan_jam')->nullable();
            $table->string('kesadaran')->nullable();
            $table->string('kondisi_umum')->nullable();
            $table->string('kondisi_umum_lainnya_text')->nullable();
            $table->integer('tekanan_darah')->nullable();
            $table->integer('nadi')->nullable();
            $table->integer('suhu')->nullable();
            $table->integer('pernafasan')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->text('kebutuhan_khusus')->nullable();
            $table->string('kebutuhan_khusus_lainnya_text')->nullable();
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
        Schema::dropIfExists('pengkajian_obgyn_alergi_dan_keadaan_umum');
    }
};
