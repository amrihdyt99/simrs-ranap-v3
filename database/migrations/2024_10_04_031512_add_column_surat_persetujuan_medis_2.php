<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSuratPersetujuanMedis2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->table('surat_persetujuan_medis', function (Blueprint $table) {
            $table->string('kondisi_medis')->change(); 
            $table->string('kondisi_medis_lain_lain')->nullable()->after('kondisi_medis'); 
            $table->string('nama_witness2')->nullable()->after('witness2'); 
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
