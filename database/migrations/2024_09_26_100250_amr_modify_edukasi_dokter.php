<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AmrModifyEdukasiDokter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::connection('mysql')->table('rs_edukasi_pasien_dokter', function (Blueprint $table) {
            $table->dropColumn([
                'ttd_dokter',
                'ttd_pasien',
            ]);
        });
        
        Schema::connection('mysql')->table('rs_edukasi_pasien_dokter', function (Blueprint $table) {

            $table->longText('ttd_dokter')->nullable();
            $table->longText('ttd_pasien')->nullable();
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
