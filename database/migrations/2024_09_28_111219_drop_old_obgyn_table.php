<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropOldObgynTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('pengkajian_awal_bidan');
        Schema::dropIfExists('skor_sad_person');
        Schema::dropIfExists('riwayat_menstruasi');
        Schema::dropIfExists('riwayat_perkawinan');
        Schema::dropIfExists('riwayat_kehamilan');
        Schema::dropIfExists('skrining_gizi_obgyn');
        Schema::dropIfExists('skala_wong_baker');
        Schema::dropIfExists('behavior_pain_scale_obgyn');
        Schema::dropIfExists('adl_obgyn');
        Schema::dropIfExists('skrining_resiko_jatuh_obgyn');
        Schema::dropIfExists('pengkajian_kulit');
        Schema::dropIfExists('pengkajian_kebutuhan_aktifitas');
        Schema::dropIfExists('pengkajian_kebutuhan_nutrisi');
        Schema::dropIfExists('pengkajian_kebutuhan_eliminasi');
        Schema::dropIfExists('laporan_persalinan');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
