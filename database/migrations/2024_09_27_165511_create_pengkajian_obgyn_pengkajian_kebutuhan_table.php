<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengkajianObgynPengkajianKebutuhanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengkajian_obgyn_pengkajian_kebutuhan', function (Blueprint $table) {
            $table->bigIncrements('pengkajian_obgyn_id');
            $table->string('reg_no');
            $table->string('med_rec');
            $table->string('rentang_gerak')->nullable();
            $table->string('deformitas')->nullable();
            $table->string('deformitas_text')->nullable();
            $table->string('gangguan_tidur')->nullable();
            $table->string('gangguan_tidur_text')->nullable();
            $table->string('keluhan_nutrisi')->nullable();
            $table->string('rasa_haus_berlebih')->nullable();
            $table->string('mukosa_mulut')->nullable();
            $table->string('turgor_kulit')->nullable();
            $table->string('endema')->nullable();
            $table->string('frekuensi_bab')->nullable();
            $table->string('keluhan_bab')->nullable();
            $table->string('keluhan_bab_text')->nullable();
            $table->string('karakteristik_feces')->nullable();
            $table->string('warna_feces')->nullable();
            $table->string('frekuensi_bak')->nullable();
            $table->string('jumlah_bak')->nullable();
            $table->string('warna_urin')->nullable();
            $table->string('keluhan_bak')->nullable();
            $table->string('keluhan_bak_lainnya')->nullable();
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
        Schema::dropIfExists('pengkajian_obgyn_pengkajian_kebutuhan');
    }
}
