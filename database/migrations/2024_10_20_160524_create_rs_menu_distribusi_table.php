<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsMenuDistribusiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('rs_menu_distribusi', function (Blueprint $table) {
            $table->id('distribusi_id');
            $table->string('distribusi_reg')->nullable();
            $table->text('distribusi_menu')->nullable();
            $table->unsignedBigInteger('distribusi_user')->nullable();
            $table->string('distribusi_keterangan')->nullable();
            $table->tinyInteger('distribusi_approve')->nullable();
            $table->string('distribusi_approve_keterangan')->nullable();
            $table->string('distribusi_approve_user')->nullable();
            $table->date('distribusi_approve_tgl')->nullable();
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
        Schema::dropIfExists('rs_menu_distribusi');
    }
}
