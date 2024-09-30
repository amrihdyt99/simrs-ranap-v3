<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToResikoJatuhSkalaMorseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resiko_jatuh_skala_morse', function (Blueprint $table) {
            $table->string('resiko_jatuh_morse_kategori')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resiko_jatuh_skala_morse', function (Blueprint $table) {
            //
        });
    }
}
