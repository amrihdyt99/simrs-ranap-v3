<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIhTandaVitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ih_tanda_vitals', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('reg_medrec');
            $table->date('tanda_vital_date');
            $table->time('tanda_vital_time');
            $table->longText('tanda_vital');
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
        Schema::dropIfExists('ih_tanda_vitals');
    }
}
