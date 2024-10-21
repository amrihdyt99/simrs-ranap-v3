<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToRsPasienPemberianObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rs_pasien_pemberian_obat', function (Blueprint $table) {
            $table->string('shift');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rs_pasien_pemberian_obat', function (Blueprint $table) {
            //
        });
    }
}
