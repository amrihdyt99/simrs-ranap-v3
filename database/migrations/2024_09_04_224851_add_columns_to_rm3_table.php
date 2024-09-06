<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToRm3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rm3', function (Blueprint $table) {
            $table->text('ttd_perawat');
            $table->text('ttd_pasien');
            $table->string('nama_pihak_pasien');
            $table->string('sebagai_pihak_pasien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rm3', function (Blueprint $table) {
            //
        });
    }
}
