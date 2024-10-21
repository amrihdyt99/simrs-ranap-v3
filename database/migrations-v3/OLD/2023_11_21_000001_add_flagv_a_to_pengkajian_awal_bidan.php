<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengkajian_awal_bidan', function (Blueprint $table) {

            $table->string('nadi')->nullable();
            $table->string('suhu')->nullable();
            $table->string('pernafasan')->nullable();
            $table->string('berat_badan')->nullable();

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
};
