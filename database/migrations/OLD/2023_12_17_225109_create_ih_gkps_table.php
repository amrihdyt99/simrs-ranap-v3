<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIhGkpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ih_gkps', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('reg_medrec');
            $table->date('gkp_date');
            $table->time('gkp_time');
            $table->longText('gkp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ih_gkps');
    }
}
