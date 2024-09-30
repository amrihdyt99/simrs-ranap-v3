<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToRm3Table2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rm3', function (Blueprint $table) {
            $table->string('nama_perawat')->nullable();
            $table->string('nama_keluarga_pasien')->nullable();
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
