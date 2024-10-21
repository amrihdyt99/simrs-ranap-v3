<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToRm3Table3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rm3', function (Blueprint $table) {
            $table->string('kepada_lain')->nullable();
            $table->dateTime('tgl_ttd')->nullable();
            $table->dateTime('tgl_assesment_awal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rm3_table_3', function (Blueprint $table) {
            //
        });
    }
}
