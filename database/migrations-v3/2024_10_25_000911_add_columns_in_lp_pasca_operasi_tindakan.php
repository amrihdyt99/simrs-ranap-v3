<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInLpPascaOperasiTindakan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lp_pasca_operasi_tindakan', function (Blueprint $table) {
            $table->string('catatan_instruksi_posisi')->nullable()->after('instruksi_posisi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lp_pasca_operasi_tindakan', function (Blueprint $table) {
            //
        });
    }
}
