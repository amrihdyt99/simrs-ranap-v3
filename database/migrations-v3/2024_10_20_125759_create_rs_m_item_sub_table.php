<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsMItemSubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('rs_m_item_sub', function (Blueprint $table) {
            $table->id('sub_id');
            $table->unsignedBigInteger('ItemID')->nullable();
            $table->unsignedBigInteger('ItemSubID')->nullable();
            $table->string('ItemType')->nullable();
            $table->text('ItemDetail')->nullable();
            $table->dateTime('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_m_item_sub');
    }
}
