<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddedSkriningResikoJatuhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skrining_resiko_jatuh', function (Blueprint $table) {
            $table->string('total_resiko_jatuh_dewasa')->nullable();
            $table->string('total_resiko_jatuh_geriatri')->nullable();
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
