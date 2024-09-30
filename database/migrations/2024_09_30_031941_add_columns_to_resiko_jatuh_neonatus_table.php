<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToResikoJatuhNeonatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resiko_jatuh_neonatus', function (Blueprint $table) {
            $table->string('created_by');
            $table->string('nama_keluarga')->nullable();
            $table->string('nama_petugas')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resiko_jatuh_neonatus', function (Blueprint $table) {
            //
        });
    }
}
