<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTtdColumnsAtRekonsiliasiObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('rekonsiliasi_obat', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no')->nullable();
            $table->string('med_rec')->nullable();
            $table->tinyInteger('penggunaan_sebelum_admisi')->nullable();
            $table->text('ttd_dpjp')->nullable();
            $table->dateTime('time_ttd_dpjp')->nullable();
            $table->text('ttd_farmasi')->nullable();
            $table->dateTime('time_ttd_farmasi')->nullable();
            $table->text('ttd_perawat')->nullable();
            $table->dateTime('time_ttd_perawat')->nullable();
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
        //
    }
}
