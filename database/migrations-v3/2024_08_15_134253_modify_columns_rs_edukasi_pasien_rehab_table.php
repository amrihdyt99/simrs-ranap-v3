<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyColumnsRsEdukasiPasienRehabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rs_edukasi_pasien_rehab', function (Blueprint $table) {
            $table->renameColumn('edukasi_lain_lain', 'edukasi_lain_lain_rehabilitasi');
            $table->renameColumn('tgl_lain_lain', 'tgl_lain_lain_rehabilitasi');
            $table->renameColumn('tingkat_paham_lain_lain', 'tingkat_paham_lain_lain_rehabilitasi');
            $table->renameColumn('tingkat_paham_lain_lain_text', 'tingkat_paham_lain_lain_text_rehabilitasi');
            $table->renameColumn('metode_edukasi_lain_lain', 'metode_edukasi_lain_lain_rehabilitasi');
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
