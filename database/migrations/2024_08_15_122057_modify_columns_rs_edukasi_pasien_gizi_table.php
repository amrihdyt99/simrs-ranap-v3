<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsRsEdukasiPasienGiziTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rs_edukasi_pasien_gizi', function (Blueprint $table) {
            $table->renameColumn('edukasi_pentingnya_nutrisi', 'edukasi_pentingnya_nutrisi_gizi');
            $table->renameColumn('edukasi_diet', 'edukasi_diet_gizi');
            $table->renameColumn('edukasi_lain_lain', 'edukasi_lain_lain_gizi');

            $table->renameColumn('tgl_pentingnya_nutrisi', 'tgl_pentingnya_nutrisi_gizi');
            $table->renameColumn('tgl_diet', 'tgl_diet_gizi');
            $table->renameColumn('tgl_lain_lain', 'tgl_lain_lain_gizi');

            $table->renameColumn('tingkat_paham_pentingnya_nutrisi', 'tingkat_paham_pentingnya_nutrisi_gizi');
            $table->renameColumn('tingkat_paham_diet', 'tingkat_paham_diet_gizi');
            $table->renameColumn('tingkat_paham_lain_lain', 'tingkat_paham_lain_lain_gizi');
            $table->renameColumn('tingkat_paham_lain_lain_text', 'tingkat_paham_lain_lain_text_gizi');
            
            $table->renameColumn('metode_edukasi_pentingnya_nutrisi', 'metode_edukasi_pentingnya_nutrisi_gizi');
            $table->renameColumn('metode_edukasi_diet', 'metode_edukasi_diet_gizi');
            $table->renameColumn('metode_edukasi_lain_lain', 'metode_edukasi_lain_lain_gizi');
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
