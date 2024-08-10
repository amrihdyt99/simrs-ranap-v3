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
        Schema::create('assesment_dewasa', function (Blueprint $table) {
            $table->bigIncrements('asdew_id');
            $table->string('asdew_reg')->nullable();
            $table->string('asdew_sensori')->nullable();
            $table->string('asdew_lembab')->nullable();
            $table->string('asdew_aktivitas')->nullable();
            $table->string('asdew_mobilitas')->nullable();
            $table->string('asdew_nutrisi')->nullable();
            $table->string('asdew_friksi')->nullable();
            $table->string('asdew_skor_braden')->nullable();
            $table->string('asdew_kategori')->nullable();
            $table->string('asdew_luka')->nullable();
            $table->string('asdew_rom')->nullable();
            $table->string('asdew_deformitas')->nullable();
            $table->string('asdew_deformitas_lainnya')->nullable();
            $table->string('asdew_ggtidur')->nullable();
            $table->string('asdew_ggtidur_lainnya')->nullable();
            $table->text('asdew_keluhan')->nullable();
            $table->string('asdew_keluhan_lainnya')->nullable();
            $table->string('asdew_haus')->nullable();
            $table->string('asdew_mukosa')->nullable();
            $table->string('asdew_tugor')->nullable();
            $table->string('asdew_edema')->nullable();
            $table->string('asdew_bab_kali')->nullable();
            $table->string('asdew_bab')->nullable();
            $table->string('asdew_keluhan_bab')->nullable();
            $table->string('asdew_keluhan_bab_lainnya')->nullable();
            $table->string('asdew_feces')->nullable();
            $table->string('asdew_feces_lainnya')->nullable();
            $table->string('asdew_frekuensi_bak')->nullable();
            $table->string('asdew_jumlah_bak')->nullable();
            $table->string('asdew_warna_urin')->nullable();
            $table->string('asdew_keluhan_bak')->nullable();
            $table->string('asdew_keluhan_bak_lainnya')->nullable();
            $table->string('asdew_bahasa')->nullable();
            $table->string('asdew_bahasa_lainnya')->nullable();
            $table->string('asdew_penterjemah')->nullable();
            $table->string('asdew_pendidikan')->nullable();
            $table->string('asdew_pendidikan_lainnya')->nullable();
            $table->string('asdew_baca')->nullable();
            $table->string('asdew_belajar')->nullable();
            $table->string('asdew_budaya')->nullable();
            $table->text('asdew_hambatan')->nullable();
            $table->string('asdew_hambatan_lainnya')->nullable();
            $table->integer('asdew_user')->nullable();
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
        Schema::dropIfExists('assesment_dewasa');
    }
};
