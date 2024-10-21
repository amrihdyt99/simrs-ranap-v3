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
        Schema::create('cathlab', function (Blueprint $table) {
            $table->bigIncrements('cathlab_id');
            $table->string('cathlab_reg');
            $table->text('cathlab_data')->nullable();
            $table->integer('cathlab_deleted');
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
        Schema::dropIfExists('cathlab');
    }
};
