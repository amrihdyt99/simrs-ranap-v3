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
        Schema::create('keperawatan_pra_tindakan', function (Blueprint $table) {
            $table->bigIncrements('pra_id');
            $table->string('pra_reg');
            $table->text('pra_data')->nullable();
            $table->integer('pra_deleted');
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
        Schema::dropIfExists('keperawatan_pra_tindakan');
    }
};
