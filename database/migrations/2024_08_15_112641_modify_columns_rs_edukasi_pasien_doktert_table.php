<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsRsEdukasiPasienDoktertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rs_edukasi_pasien_dokter', function (Blueprint $table) {
            $table->renameColumn('edukasi_diagnosa_penyebab', 'edukasi_diagnosa_penyebab_dokter');
            $table->renameColumn('edukasi_penatalaksanaan', 'edukasi_penatalaksanaan_dokter');
            $table->renameColumn('edukasi_prosedur_diagnostik', 'edukasi_prosedur_diagnostik_dokter');
            $table->renameColumn('edukasi_manajemen_nyeri', 'edukasi_manajemen_nyeri_dokter');
            $table->renameColumn('edukasi_lain_lain', 'edukasi_lain_lain_dokter');

            $table->renameColumn('tgl_diagnosa_penyebab', 'tgl_diagnosa_penyebab_dokter');
            $table->renameColumn('tgl_penatalaksanaan', 'tgl_penatalaksanaan_dokter');
            $table->renameColumn('tgl_prosedur_diagnostik', 'tgl_prosedur_diagnostik_dokter');
            $table->renameColumn('tgl_manajemen_nyeri', 'tgl_manajemen_nyeri_dokter');
            $table->renameColumn('tgl_lain_lain', 'tgl_lain_lain_dokter');

            $table->renameColumn('tingkat_paham_diagnosa_penyebab', 'tingkat_paham_diagnosa_penyebab_dokter');
            $table->renameColumn('tingkat_paham_penatalaksanaan', 'tingkat_paham_penatalaksanaan_dokter');
            $table->renameColumn('tingkat_paham_prosedur_diagnostik', 'tingkat_paham_prosedur_diagnostik_dokter');
            $table->renameColumn('tingkat_paham_manajemen_nyeri', 'tingkat_paham_manajemen_nyeri_dokter');
            $table->renameColumn('tingkat_paham_lain_lain', 'tingkat_paham_lain_lain_dokter');
            $table->renameColumn('tingkat_paham_lain_lain_text', 'tingkat_paham_lain_lain_text_dokter');
            
            $table->renameColumn('metode_edukasi_diagnosa_penyebab', 'metode_edukasi_diagnosa_penyebab_dokter');
            $table->renameColumn('metode_edukasi_penatalaksanaan', 'metode_edukasi_penatalaksanaan_dokter');
            $table->renameColumn('metode_edukasi_prosedur_diagnostik', 'metode_edukasi_prosedur_diagnostik_dokter');
            $table->renameColumn('metode_edukasi_manajemen_nyeri', 'metode_edukasi_manajemen_nyeri_dokter');
            $table->renameColumn('metode_edukasi_lain_lain', 'metode_edukasi_lain_lain_dokter');
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
