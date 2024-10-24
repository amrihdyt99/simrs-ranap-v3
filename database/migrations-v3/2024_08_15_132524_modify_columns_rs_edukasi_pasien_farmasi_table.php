<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsRsEdukasiPasienFarmasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rs_edukasi_pasien_farmasi', function (Blueprint $table) {
            $table->renameColumn('edukasi_obat_diberikan', 'edukasi_obat_diberikan_farmasi');
            $table->renameColumn('edukasi_efek_samping', 'edukasi_efek_samping_farmasi');
            $table->renameColumn('edukasi_interaksi', 'edukasi_interaksi_farmasi');
            $table->renameColumn('edukasi_lain_lain', 'edukasi_lain_lain_farmasi');

            $table->renameColumn('tgl_obat_diberikan', 'tgl_obat_diberikan_farmasi');
            $table->renameColumn('tgl_efek_samping', 'tgl_efek_samping_farmasi');
            $table->renameColumn('tgl_interaksi', 'tgl_interaksi_farmasi');
            $table->renameColumn('tgl_lain_lain', 'tgl_lain_lain_farmasi');

            $table->renameColumn('tingkat_paham_obat_diberikan', 'tingkat_paham_obat_diberikan_farmasi');
            $table->renameColumn('tingkat_paham_efek_samping', 'tingkat_paham_efek_samping_farmasi');
            $table->renameColumn('tingkat_paham_interaksi', 'tingkat_paham_interaksi_farmasi');
            $table->renameColumn('tingkat_paham_lain_lain', 'tingkat_paham_lain_lain_farmasi');
            $table->renameColumn('tingkat_paham_lain_lain_text', 'tingkat_paham_lain_lain_text_farmasi');
            
            $table->renameColumn('metode_edukasi_obat_diberikan', 'metode_edukasi_obat_diberikan_farmasi');
            $table->renameColumn('metode_edukasi_efek_samping', 'metode_edukasi_efek_samping_farmasi');
            $table->renameColumn('metode_edukasi_interaksi', 'metode_edukasi_interaksi_farmasi');
            $table->renameColumn('metode_edukasi_lain_lain', 'metode_edukasi_lain_lain_farmasi');
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
