<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsMParamedicScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('rs_m_paramedic_schedule', function (Blueprint $table) {
            $table->id('schedule_id');
            $table->string('schedule_paramedic')->nullable();
            $table->string('schedule_room')->nullable();
            $table->time('schedule_time_start')->nullable();
            $table->time('schedule_time_end')->nullable();
            $table->string('schedule_day')->nullable();
            $table->date('schedule_date')->nullable();
            $table->string('schedule_service')->nullable();
            $table->tinyInteger('schedule_deleted')->nullable();
            $table->unsignedBigInteger('schedule_user')->nullable();
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
        Schema::dropIfExists('rs_m_paramedic_schedule');
    }
}
