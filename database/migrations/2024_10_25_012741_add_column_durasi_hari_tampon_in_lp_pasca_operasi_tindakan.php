<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDurasiHariTamponInLpPascaOperasiTindakan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lp_pasca_operasi_tindakan', function (Blueprint $table) {
            $table->string('durasi_hari_tampon')->nullable()->after('tampon_letak');
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
