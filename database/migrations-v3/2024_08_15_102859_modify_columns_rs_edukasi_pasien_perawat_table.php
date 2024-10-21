<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsRsEdukasiPasienPerawatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rs_edukasi_pasien_perawat', function (Blueprint $table) {
            $table->renameColumn('edukasi_penggunaan_peralatan', 'edukasi_penggunaan_peralatan_perawat');
            $table->renameColumn('edukasi_pencegahan', 'edukasi_pencegahan_perawat');
            $table->renameColumn('edukasi_manajemen_nyeri', 'edukasi_manajemen_nyeri_ringan_perawat');
            $table->renameColumn('edukasi_lain_lain', 'edukasi_lain_lain_perawat');

            $table->renameColumn('tgl_penggunaan_peralatan', 'tgl_penggunaan_peralatan_perawat');
            $table->renameColumn('tgl_pencegahan', 'tgl_pencegahan_perawat');
            $table->renameColumn('tgl_manajemen_nyeri', 'tgl_manajemen_nyeri_ringan_perawat');
            $table->renameColumn('tgl_lain_lain', 'tgl_lain_lain_perawat');

            $table->renameColumn('tingkat_paham_penggunaan_peralatan', 'tingkat_paham_penggunaan_peralatan_perawat');
            $table->renameColumn('tingkat_paham_pencegahan', 'tingkat_paham_pencegahan_perawat');
            $table->renameColumn('tingkat_paham_manajemen_nyeri', 'tingkat_paham_manajemen_nyeri_ringan_perawat');
            $table->renameColumn('tingkat_paham_lain_lain', 'tingkat_paham_lain_lain_perawat');
            $table->renameColumn('tingkat_paham_lain_lain_text', 'tingkat_paham_lain_lain_text_perawat');

            $table->renameColumn('metode_edukasi_penggunaan_peralatan', 'metode_edukasi_penggunaan_peralatan_perawat');
            $table->renameColumn('metode_edukasi_pencegahan', 'metode_edukasi_pencegahan_perawat');
            $table->renameColumn('metode_edukasi_manajemen_nyeri', 'metode_edukasi_manajemen_nyeri_ringan_perawat');
            $table->renameColumn('metode_edukasi_lain_lain', 'metode_edukasi_lain_lain_perawat');
        });
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
