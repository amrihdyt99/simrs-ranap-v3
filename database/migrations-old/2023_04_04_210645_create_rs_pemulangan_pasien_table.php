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
        Schema::create('rs_pemulangan_pasien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index('rs_pemulangan_pasien_user_id_foreign');
            $table->string('reg_no');
            $table->string('reg_medrec');
            $table->boolean('bantuan_dalam_aktifitas')->default(false);
            $table->boolean('edukasi_gizi')->default(false);
            $table->boolean('penanganan_nyeri_kronis')->default(false);
            $table->string('pengelolaan_penyakit_secara_berkelanjutan');
            $table->boolean('kebutuhan_lainnya')->default(false);
            $table->date('tanggal')->nullable();
            $table->time('waktu')->nullable();
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
        Schema::dropIfExists('rs_pemulangan_pasien');
    }
};
